<?php

include("include.php");
require($_SERVER['DOCUMENT_ROOT'].ROOT_PATH."/database.php"); 

// Check if user is logged in
if (empty($_SESSION['user']) || $_SESSION['user']['privilege'] !== 'administrator') { 
    header("Location: login.php"); 
    die("Redirecting to login.php"); 
}

// This file requires serious refactoring


// Class to store and process member statistics fields/attributes
class Player {
    var $id; // In-game unique ID
    var $name;
    var $active;

    var $warsJoined;
    var $attacksUsed;
    var $starsEarned;
    var $starsWon;
    var $totalDamage;
    var $totalRating1;
    var $totalRating2;

    var $townHall;
    var $offenseWeight;
    var $defenseWeight;
    var $goldElixir;
    var $darkElixir;

    var $totalDefenses;
    var $totalDamageDefense;

    private $position;

    function Player($entry) {
        $this->id = $entry['id'];
        $this->name = $entry['name'];

        $this->townHall = $entry['townHall'];
        $this->offenseWeight = $entry['offenseWeight'];
        $this->defenseWeight = $entry['defenseWeight'];
        $this->goldElixir = $entry['goldAndElixir'];
        $this->darkElixir = $entry['darkElixir'];
    }

    function updateStats($entry) {
        $this->warsJoined += 1;
        $this->attacksUsed += $entry['attacksUsed'];
        $this->totalDefenses += $entry['totalDefenses'];
        $this->totalDamageDefense += $entry['totalDamageDefense'];
        $this->position = $entry['position'];
        $this->totalRating1 += $entry['rating1'];
        $this->totalRating2 += $entry['rating2'];

        for ($i = 1; $i <= $entry['attacksUsed']; $i++) {
            $attack = $entry['attack'.$i];
            $this->starsEarned += $attack['starsEarned'];
            $this->starsWon += $attack['starsWon'];
            $this->totalDamage += $attack['damage'];
        }
    }
}

// Store playerId-to-details reference for one war
class PlayerDetailReference {
    private $townHall;
    private $offenseWeight;
    private $defenseWeight;
    private $defenses;
    private $damage;

    public function __construct($townHall, $offenseWeight, $defenseWeight) {
        $this->townHall = $townHall;
        $this->offenseWeight = $offenseWeight;
        $this->defenseWeight = $defenseWeight;
        $this->defenses = 0;
    }

    public function __get($property) {
        if (property_exists($this, $property)) 
            return $this->$property;
    }

    public function __set($property, $value) {
        if (property_exists($this, $property))
            $this->$property = $value;
    }

    public function addDefense($damage) {
        $this->defenses++;
        $this->damage += $damage;
    }
}   

// Helper function
function calcAttackRating1($position, $attack) {
    $earned = $attack['starsEarned'];
    $won = $attack['starsWon'];

    if ($earned == 0)
        return 0;

    $score = ($earned == 3) ? 6 : $won * $earned - ($earned - 1);
    $adjmt = $position - $attack['targetPosition'];
    $rating = $score * (1 + $adjmt * 0.05);

    return $rating;
}

function calcAttackRating2($attack, $myWeight, $enemyWeight, $townHall) {
    $earned = $attack['starsEarned'];
    $won = $attack['starsWon'];

    if ($earned == 0)
        return 0;

    $score = ($earned == 3) ? 6 : $won * $earned - ($earned - 1);

    $adjmt = $enemyWeight - $myWeight;
    $rating = $score * (1 + $adjmt * 0.001);

    if ($townHall > 9 && $enemyWeight > 700)
        $rating *= 1.5;
    elseif ($townHall == 8)
        $rating *= 0.95;
    elseif ($townHall < 8)
        $rating *= 0.6;

    return $rating;
}

// Main

// Recent war participation to be considered active
$activeThresh = 5;

 // Wars required to be processed in descending order, do not change
$directory = 'database/war-history/json/';
$files = array_diff(scandir($directory), array('..', '.')); 
natsort($files);
$files = array_reverse($files);

$players = array();

try {
    $stmt = $db->prepare("TRUNCATE TABLE war_events");
    $stmt->execute();

    // Remove files from parsing if it's in progress
    $fileContents = file_get_contents($directory.$files[0]);
    $json = json_decode($fileContents, true);
    if ($json['summary']['result'] == "progress")
        array_shift($files);

    for ($fileN = 0; $fileN < count($files); $fileN++) {
        $fileContents = file_get_contents($directory.$files[$fileN]);
        $json = json_decode($fileContents, true);
        
        $stmt = $db->prepare(
            "INSERT INTO war_events (
                playerId,
                warId,
                attackId,
                isAttack,
                damage,
                starsWon,
                starsEarned,
                enemyName,
                enemyClan,
                myRank,
                enemyRank,
                myTH,
                enemyTH,
                rating1,
                rating2,
                myWeight,
                enemyWeight
            ) VALUES (
                :playerId,
                :warId,
                :attackId,
                :isAttack,
                :damage,
                :starsWon,
                :starsEarned,
                :enemyName,
                :enemyClan,
                :myRank,
                :enemyRank,
                :myTH,
                :enemyTH,
                :rating1,
                :rating2,
                :myWeight,
                :enemyWeight
            )"
        );

        $detailRef = array();
        foreach ($json['home']['roster'] as $entry) {
            $detailRef[$entry['id']] = new PlayerDetailReference(
                $entry['townHall'],
                $entry['offenseWeight'],
                $entry['defenseWeight']
            );
        }

        // Add defenses to war_events
        foreach ($json['enemy']['roster'] as $entry) {
            $detailRef[$entry['id']] = new PlayerDetailReference(
                $entry['townHall'],
                $entry['offenseWeight'],
                $entry['defenseWeight']
            );

            for ($i = 1; $i <= $entry['attacksUsed']; $i++) {
                $attack = $entry['attack'.$i];
                $myId = $attack['targetId'];
                $detailRef[$myId]->addDefense($attack['damage']);

                $stmt->execute(
                    array(
                        ':playerId'     => $myId,
                        ':warId'        => $json['id'],
                        ':attackId'     => $attack['attackId'],
                        ':isAttack'     => false,
                        ':damage'       => $attack['damage'],
                        ':starsWon'     => $attack['starsWon'],
                        ':starsEarned'  => $attack['starsEarned'],
                        ':enemyName'    => $entry['name'],
                        ':enemyClan'    => $json['enemy']['name'],
                        ':myRank'       => $attack['targetPosition'],
                        ':enemyRank'    => $entry['position'],
                        ':myTH'         => $detailRef[$myId]->townHall,
                        ':enemyTH'      => $entry['townHall'],
                        ':rating1'      => 0,
                        ':rating2'      => 0,
                        ':myWeight'     => $detailRef[$myId]->defenseWeight,
                        ':enemyWeight'  => $entry['offenseWeight']
                    )
                );
            }
        }

        // Add offenses to war_events and record member stats
        foreach ($json['home']['roster'] as $entry) {
            $id = strval($entry['id']);
            $entry['rating1'] = 0;
            $entry['rating2'] = 0;

            // if (!array_key_exists('totalDefenses', $entry))
            //     $entry['totalDefenses'] = 0;

            $entry['totalDefenses'] = $detailRef[$entry['id']]->defenses;
            $entry['totalDamageDefense'] = $detailRef[$entry['id']]->damage;


            for ($i = 1; $i <= $entry['attacksUsed']; $i++) {

                $attack = $entry['attack'.$i];
                $attackRating1 = calcAttackRating1($entry['position'], $attack);
                $entry['rating1'] += $attackRating1;

                $myWeight = $entry['offenseWeight'];
                $enemyWeight = $detailRef[$attack['targetId']]->defenseWeight;
                $enemyTH = $detailRef[$attack['targetId']]->townHall;

                $attackRating2 = calcAttackRating2($attack, $myWeight, $enemyWeight, $enemyTH);
                $entry['rating2'] += $attackRating2;


                $stmt->execute(
                    array(
                        ':playerId'     => $id,
                        ':warId'        => $json['id'],
                        ':attackId'     => $attack['attackId'],
                        ':isAttack'     => true,
                        ':damage'       => $attack['damage'],
                        ':starsWon'     => $attack['starsWon'],
                        ':starsEarned'  => $attack['starsEarned'],
                        ':enemyName'    => $attack['target'],
                        ':enemyClan'    => $json['enemy']['name'],
                        ':myRank'       => $entry['position'],
                        ':enemyRank'    => $attack['targetPosition'],
                        ':myTH'         => $entry['townHall'],
                        ':enemyTH'      => $enemyTH,
                        ':rating1'      => $attackRating1,
                        ':rating2'      => $attackRating2,
                        ':myWeight'     => $myWeight,
                        ':enemyWeight'  => $enemyWeight
                    )
                );
            }

            if (!array_key_exists($id, $players)) {
                $players[$id] = new Player($entry);
                $players[$id]->active = ($fileN < $activeThresh) ? true : false;
            }
            $players[$id]->updateStats($entry);
        }
    }

    // Add stats to members_statistics
    $stmt = $db->prepare("TRUNCATE TABLE members_statistics");
    $stmt->execute();
    $stmt = $db->prepare(
        "INSERT INTO members_statistics (
            active,
            playerId,
            name,
            totalAttacks,
            totalDefenses,
            starsEarned,
            starsWon,
            totalDamage,
            totalDamageDefense,
            totalRating,
            totalRating2,
            warsJoined,
            townHall,
            offenseWeight,
            defenseWeight,
            goldElixir,
            darkElixir
        ) VALUES (
            :active,
            :playerId, 
            :name,
            :totalAttacks,
            :totalDefenses,
            :starsEarned,
            :starsWon,
            :totalDamage,
            :totalDamageDefense,
            :totalRating,
            :totalRating2,
            :warsJoined,
            :townHall,
            :offenseWeight,
            :defenseWeight,
            :goldElixir,
            :darkElixir
        )"
    );

    foreach ($players as $player) {
        $stmt->execute(
            array(
                ':active'           => $player->active,
                ':playerId'         => $player->id,
                ':name'             => $player->name,
                ':totalAttacks'     => $player->attacksUsed,
                ':totalDefenses'    => $player->totalDefenses,
                ':starsEarned'      => $player->starsEarned,
                ':starsWon'         => $player->starsWon,
                ':totalDamage'      => $player->totalDamage,
                ':totalDamageDefense' => $player->totalDamageDefense,
                ':totalRating'      => $player->totalRating1,
                ':totalRating2'     => $player->totalRating2,
                ':warsJoined'       => $player->warsJoined,
                ':townHall'         => $player->townHall,
                ':offenseWeight'    => $player->offenseWeight,
                ':defenseWeight'    => $player->defenseWeight,
                ':goldElixir'       => $player->goldElixir,
                ':darkElixir'       => $player->darkElixir
            )
        );
    }

    header("Location: redirect.php?class=success&message=Please wait to be redirected"); 
    die(); 

} catch (PDOException $ex) { 
    die("Failed to run query: ".$ex->getMessage()); 
} 

?>