<?php

require($_SERVER['DOCUMENT_ROOT']."/clashofclans/database.php"); 

// Check if user is logged in
if (empty($_SESSION['user']) || $_SESSION['user']['privilege'] !== 'administrator') { 
    // If they are not, we redirect them to the login page. 
    header("Location: login.php"); 
  
    // Remember that this die statement is absolutely critical.  Without it, 
    // people can view your members-only content without logging in. 
    die("Redirecting to login.php"); 
}

// Class to store and process member statistics fields/attributes
class Player {
    var $id; // In-game unique ID
    var $name;
    var $attacksUsed = 0;
    var $starsEarned = 0;
    var $starsWon = 0;
    var $totalDamage = 0;

    function Player($rosterEntry) {
        $this->id = $rosterEntry['id'];
        $this->name = $rosterEntry['name'];
        $this->updateStats($rosterEntry);
    }

    function updateStats($rosterEntry) {
        $this->attacksUsed += $rosterEntry['attacksUsed'];

        for ($i = 1; $i <= $rosterEntry['attacksUsed']; $i++) {
	        $this->starsEarned += $rosterEntry['attack'.$i]['starsEarned'];
        	$this->starsWon += $rosterEntry['attack'.$i]['starsWon'];
        	$this->totalDamage += $rosterEntry['attack'.$i]['damage'];
        }
    }
}

// Main
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

	foreach ($scannedDirectory as $warFile) {
	    $str = file_get_contents($directory.$warFile);
	    $json = json_decode($str, true);

	    foreach ($json['home']['roster'] as $rosterEntry) {
	        $id = strval($rosterEntry['id']);

	        // Update member statistics
	        if (array_key_exists($id, $players)) {
	            $players[$id]->updateStats($rosterEntry);
	        } else {
	            $players[$id] = new Player($rosterEntry);
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
		            starsEarned
		        ) VALUES ( 
		        	:warId,
		        	:playerId,
		            :attackNumber,
		            :damage,
		            :target,
		            :enemyClan,
		            :starsWon,
		            :starsEarned
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
			        ':starsEarned' => $rosterEntry['attack'.$i]['starsEarned']
			    );

				$result = $stmt->execute($queryParams);
		    }
	    }
	}

	if (!empty($players)) {
		// Add member stats to database
		foreach ($players as $player) {
			$query = "
		        INSERT INTO members_statistics (
		        	playerId,
		            name,
		            totalAttacks,
		            starsEarned,
		            starsWon,
		            damage,
		            avgStarsEarned,
		            offenseValCalc,
		            defenseValCalc
		        ) VALUES (
		        	:playerId, 
		            :name,
		            :totalAttacks,
		            :starsEarned,
		            :starsWon,
		            :damage,
		            :avgStarsEarned,
		            :offenseValCalc,
		            :defenseValCalc
		        ) 
		    ";

		    $queryParams = array( 
		    	':playerId' => $player->id,
		        ':name' => $player->name,
		        ':totalAttacks' => $player->attacksUsed,
		        ':starsEarned' => $player->starsEarned,
		        ':starsWon' => $player->starsWon,
		        ':damage' => $player->totalDamage / $player->attacksUsed,
		        ':avgStarsEarned' => $player->starsEarned / $player->attacksUsed,
		        ':offenseValCalc' => null,
		        ':defenseValCalc' => null
		    ); 
		     
			$stmt = $db->prepare($query); 
		    $result = $stmt->execute($queryParams); 
		}

		header("Location: redirect.php?class=success&message=Please wait to be redirected"); 
		die(); 
	} else {
	    header("Location: redirect.php?class=warning&message=An error has occured"); 
	    die(); 
	}
} catch (PDOException $ex) { 
    // Note: On a production website, you should not output $ex->getMessage(). 
    // It may provide an attacker with helpful information about your code.  
    die("Failed to run query: " . $ex->getMessage()); 
} 

?>