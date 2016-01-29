<?php

require($_SERVER['DOCUMENT_ROOT']."/clashofclans/database.php"); 

// Check if user is logged in
if (empty($_SESSION['user']) || $_SESSION['user']['privilege'] !== 'administrator') { 
    header("Location: login.php"); 
    die("Redirecting to login.php"); 
}

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
    var $totalRating;

    var $townHall;
    var $offenseWeight;
    var $defenseWeight;
    var $goldElixir;
    var $darkElixir;

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
        $this->position = $entry['position'];
        $this->totalRating += $entry['rating'];

        for ($i = 1; $i <= $entry['attacksUsed']; $i++) {
            $this->starsEarned += $entry['attack'.$i]['starsEarned'];
            $this->starsWon += $entry['attack'.$i]['starsWon'];
            $this->totalDamage += $entry['attack'.$i]['damage'];
        }
    }
}

// Helper function
function calcAttackRating($position, $attack) {
    $earned = $attack['starsEarned'];
    $won = $attack['starsWon'];

    if ($earned == 0)
        return 0;

    $score = ($earned == 3) ? 6 : $won * $earned - ($earned - 1);
    $adjmt = $position - $attack['targetPosition'];
    $rating = $score * (1 + $adjmt * 0.05);

    return $rating;
}

// Main
$activeThresh = 5; // Recent war participation to be considered active
$directory = 'database/war-history/json/';
$files = array_diff(scandir($directory, SCANDIR_SORT_DESCENDING), array('..', '.')); // latest war required to be processed first
$players = array();

try {
    $stmt = $db->prepare("TRUNCATE TABLE war_events");
    $stmt->execute();

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
                rating
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
                :rating
            )"
        );

        $townHall = array(); // id-to-townHall reference
        foreach ($json['home']['roster'] as $entry)
            $townHall[$entry['id']] = $entry['townHall'];

        // Add defenses to war_events
        foreach ($json['enemy']['roster'] as $entry) {
            $townHall[$entry['id']] = $entry['townHall'];
            for ($i = 1; $i <= $entry['attacksUsed']; $i++) {
                $attack = $entry['attack'.$i];
                $stmt->execute(
                    array(
                        ':playerId'     => $attack['targetId'],
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
                        ':myTH'         => $townHall[$attack['targetId']],
                        ':enemyTH'      => $entry['townHall'],
                        ':rating'       => 0
                    )
                );
            }
        }

        // Add offenses to war_events and record member stats
        foreach ($json['home']['roster'] as $entry) {
            $id = strval($entry['id']);  //?
            $entry['rating'] = 0; // ?
            for ($i = 1; $i <= $entry['attacksUsed']; $i++) {
                $attack = $entry['attack'.$i];
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
                        ':enemyTH'      => $townHall[$attack['targetId']],
                        ':rating'       => ($entry['rating'] += calcAttackRating($entry['position'], $attack))
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
            starsEarned,
            starsWon,
            totalDamage,
            totalRating,
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
            :starsEarned,
            :starsWon,
            :totalDamage,
            :totalRating,
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
                ':active' =>        $player->active,
                ':playerId' =>      $player->id,
                ':name' =>          $player->name,
                ':totalAttacks' =>  $player->attacksUsed,
                ':starsEarned' =>   $player->starsEarned,
                ':starsWon' =>      $player->starsWon,
                ':totalDamage' =>   $player->totalDamage,
                ':totalRating' =>   $player->totalRating,
                ':warsJoined' =>    $player->warsJoined,
                ':townHall' =>      $player->townHall,
                ':offenseWeight' => $player->offenseWeight,
                ':defenseWeight' => $player->defenseWeight,
                ':goldElixir' =>    $player->goldElixir,
                ':darkElixir' =>    $player->darkElixir
            )
        );
    }

    header("Location: redirect.php?class=success&message=Please wait to be redirected"); 
    die(); 

} catch (PDOException $ex) { 
    die("Failed to run query: ".$ex->getMessage()); 
} 

?>