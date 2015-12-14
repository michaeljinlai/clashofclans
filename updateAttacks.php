<?php

require($_SERVER['DOCUMENT_ROOT']."/clashofclans/database.php"); 

// Check if user is logged in
if(empty($_SESSION['user']) || $_SESSION['user']['privilege'] !== 'administrator') 
{ 
  // If they are not, we redirect them to the login page. 
  header("Location: login.php"); 

  // Remember that this die statement is absolutely critical.  Without it, 
  // people can view your members-only content without logging in. 
  die("Redirecting to login.php"); 
} 

// Gets an array of all json file names (including '.' and '..')
$directory = 'database/war-history/json';

// Remove the '.' and '..' from the array
$scanned_directory = array_diff(scandir($directory), array('..', '.'));

if (!empty($scanned_directory)) {
	
    $truncateTable = "TRUNCATE TABLE members_attacks";
    $stmt = $db->prepare($truncateTable); 
    $result = $stmt->execute(); 

	foreach ($scanned_directory as $warFile) {

	  	$str = file_get_contents('database/war-history/json/'.$warFile);
	  	$json = json_decode($str, true);

	  	foreach ($json['home']['roster'] as $roster) {

	  		$currentName = $roster['name'];  

	  		$query = " 
			    SELECT * FROM members_statistics WHERE name = '$currentName'
			"; 
			 
			try { 
			    // Execute the query to create the user 
			    $stmt = $db->prepare($query); 
			    $stmt->execute(); 
			} 
			catch (PDOException $ex) { 
			    // Note: On a production website, you should not output $ex->getMessage(). 
			    // It may provide an attacker with helpful information about your code.  
			    die("Failed to run query: " . $ex->getMessage()); 
			} 

			$rows = $stmt->fetchAll();

		  	if ($roster['attack1']['target'] !== "") {

			    $query = " 
			        INSERT INTO members_attacks ( 
			        	war_id,
			        	members_statistics_id,
			            attackNumber,
			            damage,
			            target,
			            enemyClan,
			            starsWon,
			            starsEarned
			        ) VALUES ( 
			        	:war_id,
			        	:members_statistics_id,
			            :attackNumber,
			            :damage,
			            :target,
			            :enemyClan,
			            :starsWon,
			            :starsEarned
			        ) 
			    "; 

			    $query_params = array( 
			        ':war_id' => $json['id'],
			        ':members_statistics_id' => $rows[0]['id'],
			        ':attackNumber' => 1,
			        ':damage' => $roster['attack1']['damage'],
			        ':target' => $roster['attack1']['target'],
			        ':enemyClan' => $json['enemy']['name'],
			        ':starsWon' => $roster['attack1']['starsWon'],
			        ':starsEarned' => $roster['attack1']['starsEarned']
			    ); 
			     
			    try { 
			        // Execute the query to create the user 
			        $stmt = $db->prepare($query); 
			        $result = $stmt->execute($query_params); 
			    } 
			    
			    catch(PDOException $ex) { 
			        // Note: On a production website, you should not output $ex->getMessage(). 
			        // It may provide an attacker with helpful information about your code.  
			        die("Failed to run query: " . $ex->getMessage()); 
			    }

		    }

		  	if ($roster['attack2']['target'] !== "") {

			    $query = " 
			        INSERT INTO members_attacks ( 
			        	war_id,
			        	members_statistics_id,
			            attackNumber,
			            damage,
			            target,
			            enemyClan,
			            starsWon,
			            starsEarned
			        ) VALUES ( 
			        	:war_id,
			        	:members_statistics_id,
			            :attackNumber,
			            :damage,
			            :target,
			            :enemyClan,
			            :starsWon,
			            :starsEarned
			        ) 
			    "; 

			    $query_params = array( 
			        ':war_id' => $json['id'],
			        ':members_statistics_id' => $rows[0]['id'],
			        ':attackNumber' => 2,
			        ':damage' => $roster['attack2']['damage'],
			        ':target' => $roster['attack2']['target'],
			        ':enemyClan' => $json['enemy']['name'],
			        ':starsWon' => $roster['attack2']['starsWon'],
			        ':starsEarned' => $roster['attack2']['starsEarned']
			    ); 
			     
			    try { 
			        // Execute the query to create the user 
			        $stmt = $db->prepare($query); 
			        $result = $stmt->execute($query_params); 
			    } 
			    
			    catch(PDOException $ex) { 
			        // Note: On a production website, you should not output $ex->getMessage(). 
			        // It may provide an attacker with helpful information about your code.  
			        die("Failed to run query: " . $ex->getMessage()); 
			    }

		    } 

	  	}

	}

	header("Location: redirect.php?class=success&message=Please wait to be redirected"); 
	die(); 

}

header("Location: redirect.php?class=warning&message=An error has occured"); 
die(); 

?>