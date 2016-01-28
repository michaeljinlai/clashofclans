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

    function Player($rosterEntry) {
        $this->id = $rosterEntry['id'];
        $this->name = $rosterEntry['name'];
        $this->updateStats($rosterEntry);

        $this->townHall = $rosterEntry['townHall'];
        $this->offenseWeight = $rosterEntry['offenseWeight'];
        $this->defenseWeight = $rosterEntry['defenseWeight'];
        $this->goldElixir = $rosterEntry['goldAndElixir'];
        $this->darkElixir = $rosterEntry['darkElixir'];
    }

    function updateStats($rosterEntry) {
        $this->warsJoined += 1;
        $this->attacksUsed += $rosterEntry['attacksUsed'];
        $this->position = $rosterEntry['position'];

        for ($i = 1; $i <= $rosterEntry['attacksUsed']; $i++) {
            $this->starsEarned += $rosterEntry['attack'.$i]['starsEarned'];
            $this->starsWon += $rosterEntry['attack'.$i]['starsWon'];
            $this->totalDamage += $rosterEntry['attack'.$i]['damage'];
            $this->totalRating += $this->getAttackRating($rosterEntry['attack'.$i]);
        }
    }

    private function getAttackRating($attack) {
        $earned = $attack['starsEarned'];
        $won = $attack['starsWon'];

        if ($earned == 0)
            return 0;

        $score = ($earned == 3) ? 6 : $won * $earned - ($earned - 1);
        $adjmt = $this->position - $attack['targetPosition'];
        $rating = $score * (1 + $adjmt * 0.05);

        return $rating;
    }
}

// Main
$activeThresh = 5; // Recent war participation to be considered active

$directory = 'database/war-history/json/';
$scannedDirectory = array_diff(scandir($directory), array('..', '.'));
$players = array();

try {
    $truncateTable = "SET FOREIGN_KEY_CHECKS = 0; TRUNCATE TABLE members_statistics; SET FOREIGN_KEY_CHECKS = 1;";
    $stmt = $db->prepare($truncateTable); 
    $result = $stmt->execute();

    $truncateTable = "SET FOREIGN_KEY_CHECKS = 0; TRUNCATE TABLE members_attacks; SET FOREIGN_KEY_CHECKS = 1;";
    $stmt = $db->prepare($truncateTable); 
    $result = $stmt->execute(); 

    // Read wars from newest to oldest
    $files = array_reverse($scannedDirectory);
    for ($fileNum = 0; $fileNum < count($files); $fileNum++) {
        $json = json_decode(file_get_contents($directory.$files[$fileNum]), true);

        // Build id to townHall reference for enemy roster
        $townHall = array();
        foreach ($json['enemy']['roster'] as $rosterEntry) {
            $townHall[$rosterEntry['id']] = $rosterEntry['townHall'];
        }

        // Parse members in home roster
        foreach ($json['home']['roster'] as $rosterEntry) {
            $id = strval($rosterEntry['id']);

            // Update member statistics
            if (array_key_exists($id, $players)) {
                $players[$id]->updateStats($rosterEntry);
            } else {
                $players[$id] = new Player($rosterEntry);
                $players[$id]->active = ($fileNum < $activeThresh) ? true : false;
            }

            // Add member attacks to database
            $query = " 
                INSERT INTO members_attacks ( 
                    warId,
                    playerId,
                    attackNumber,
                    damage,
                    target,
                    enemyClan,
                    starsWon,
                    starsEarned,
                    rank,
                    enemyRank,
                    townHall,
                    enemyTownHall
                ) VALUES ( 
                    :warId,
                    :playerId,
                    :attackNumber,
                    :damage,
                    :target,
                    :enemyClan,
                    :starsWon,
                    :starsEarned,
                    :rank,
                    :enemyRank,
                    :townHall,
                    :enemyTownHall
                ) 
            ";
            $stmt = $db->prepare($query); 

            for ($i = 1; $i <= $rosterEntry['attacksUsed']; $i++) {
                $queryParams = array( 
                    ':warId' => $json['id'],
                    ':playerId' => $id,
                    ':attackNumber' => $i,
                    ':damage' => $rosterEntry['attack'.$i]['damage'],
                    ':target' => $rosterEntry['attack'.$i]['target'],
                    ':enemyClan' => $json['enemy']['name'],
                    ':starsWon' => $rosterEntry['attack'.$i]['starsWon'],
                    ':starsEarned' => $rosterEntry['attack'.$i]['starsEarned'],
                    ':rank' => $rosterEntry['position'],
                    ':enemyRank' => $rosterEntry['attack'.$i]['targetPosition'],
                    ':townHall' => $rosterEntry['townHall'],
                    ':enemyTownHall' => $townHall[$rosterEntry['attack'.$i]['targetId']]
                );
                $stmt->execute($queryParams);
            }
        }
    }

    // Add member stats to database
    $query = "
        INSERT INTO members_statistics (
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
        ) 
    ";
    $stmt = $db->prepare($query); 

    foreach ($players as $player) {
        $queryParams = array(
            ':active' => $player->active,
            ':playerId' => $player->id,
            ':name' => $player->name,
            ':totalAttacks' => $player->attacksUsed,
            ':starsEarned' => $player->starsEarned,
            ':starsWon' => $player->starsWon,
            ':totalDamage' => $player->totalDamage,
            ':totalRating' => $player->totalRating,
            ':warsJoined' => $player->warsJoined,
            ':townHall' => $player->townHall,
            ':offenseWeight' => $player->offenseWeight,
            ':defenseWeight' => $player->defenseWeight,
            ':goldElixir' => $player->goldElixir,
            ':darkElixir' => $player->darkElixir
        ); 
        $stmt->execute($queryParams); 
    }

    header("Location: redirect.php?class=success&message=Please wait to be redirected"); 
    die(); 

} catch (PDOException $ex) { 
    die("Failed to run query: ".$ex->getMessage()); 
} 

?>