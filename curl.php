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

// Completely clear table 'members'
$truncate = "TRUNCATE TABLE members";
$stmt = $db->prepare($truncate); 
$result = $stmt->execute(); 

// Create a curl handle to a non-existing location
$ch = curl_init('https://set7z18fgf.execute-api.us-east-1.amazonaws.com/prod/?route=getClanDetails&clanTag=%232J0G90RR');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

// Used for debugging purposes
// if(curl_exec($ch) === false)
// {
//     echo 'Curl error: ' . curl_error($ch);
// }
// else
// {
//     echo 'Operation completed without any errors';
// }

$contents = curl_exec($ch);

// Close handle
curl_close($ch);

//convert json object to php associative array
$data = json_decode($contents, true);

// Example
// Echos the first member of memberList
// echo $data['clanDetails']['results']['memberList'][0]['name'];

// Echos the name of each member
foreach ($data['clanDetails']['results']['memberList'] as $member) {

	$query = " 
	    INSERT INTO members ( 
	        name, 
	        role, 
	        expLevel, 
	        trophies,
	        clanRank,
	        previousClanRank,
	        donations,
	        donationsReceived 
	    ) VALUES ( 
	        :name, 
	        :role, 
	        :expLevel, 
	        :trophies,
	        :clanRank,
	        :previousClanRank,
	        :donations,
	        :donationsReceived 
	    ) 
	"; 

	$query_params = array( 
	    ':name' => $member['name'], 
	    ':role' => $member['role'], 
	    ':expLevel' => $member['expLevel'], 
	    ':trophies' => $member['trophies'], 
	    ':clanRank' => $member['clanRank'], 
	    ':previousClanRank' => $member['previousClanRank'], 
	    ':donations' => $member['donations'], 
	    ':donationsReceived' => $member['donationsReceived'] 
	); 
	 
	try 
	{ 
	    // Execute the query to create the user 
	    $stmt = $db->prepare($query); 
	    $result = $stmt->execute($query_params); 
	} 
	catch(PDOException $ex) 
	{ 
	    // Note: On a production website, you should not output $ex->getMessage(). 
	    // It may provide an attacker with helpful information about your code.  
	    die("Failed to run query: " . $ex->getMessage()); 
	} 

}

header("Location: index.php"); 
die(); 

?>