<?php

include('simple_html_dom.php');

require($_SERVER['DOCUMENT_ROOT']."/clashofclans/database.php"); 

// Check if user is logged in
if(empty($_SESSION['user']) || $_SESSION['user']['privilege'] !== 'administrator') { 
    // If they are not, we redirect them to the login page. 
    header("Location: login.php"); 

    // Remember that this die statement is absolutely critical.  Without it, 
    // people can view your members-only content without logging in. 
    die("Redirecting to login.php"); 
} 

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

// Using file_get_html is probably terrible and not sure if it will work on the live site
$html = file_get_html('http://www.warclans.com/coc-clan/Y9QLPNP50');

$warLosses = null;
$warTies = null;

if (!empty($html->find('div[class=clan-info] li span', 5)->innertext)) {
    $warLosses = $html->find('div[class=clan-info] li span', 5)->innertext; // War Lost
}

if (!empty($html->find('div[class=clan-info] li span', 6)->innertext)) {
    $warTies = $html->find('div[class=clan-info] li span', 6)->innertext; // War Tied
}

// Convert json object to php associative array
$data = json_decode($contents, true);

if (!empty($data['clanDetails']['results']['memberList'])) {

    // Completely clear table 'members'
    $truncateMembers = "TRUNCATE TABLE members";
    $stmt = $db->prepare($truncateMembers); 
    $result = $stmt->execute(); 

    // Completely clear table 'clan_details'
    $truncateDetails = "TRUNCATE TABLE clan_details";
    $stmt = $db->prepare($truncateDetails); 
    $result = $stmt->execute(); 

}

// Example
// Echos the first member of memberList
// echo $data['clanDetails']['results']['memberList'][0]['name'];

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
	        donationsReceived,
	        leagueBadgeImg_s,
	        leagueBadgeImg_xl
	    ) VALUES ( 
	        :name, 
	        :role, 
	        :expLevel, 
	        :trophies,
	        :clanRank,
	        :previousClanRank,
	        :donations,
	        :donationsReceived,
	        :leagueBadgeImg_s,
	        :leagueBadgeImg_xl
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
	    ':donationsReceived' => $member['donationsReceived'],
	    ':leagueBadgeImg_s' => substr($member['leagueBadgeImg']['s'], 0, strrpos($member['leagueBadgeImg']['s'], ',')), //Because the api provides two links for some reason
	    ':leagueBadgeImg_xl' => $member['leagueBadgeImg']['xl'] // And only one link for this
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

$query = " 
    INSERT INTO clan_details ( 
        tag, 
        name, 
        type, 
        description,
        locationName,
        clanBadgeImg_s,
        clanBadgeImg_xl,
        warFrequency,
        clanLevel,
        warWins,
        warLosses,
        warTies,
        clanPoints,
        requiredTrophies,
        members
    ) VALUES ( 
        :tag, 
        :name, 
        :type, 
        :description,
        :locationName,
        :clanBadgeImg_s,
        :clanBadgeImg_xl,
        :warFrequency,
        :clanLevel,
        :warWins,
        :warLosses,
        :warTies,
        :clanPoints,
        :requiredTrophies,
        :members
    ) 
"; 

$query_params = array( 
    ':tag' => $data['clanDetails']['results']['tag'], 
    ':name' => $data['clanDetails']['results']['name'], 
    ':type' => $data['clanDetails']['results']['type'], 
    ':description' => $data['clanDetails']['results']['description'], 
    ':locationName' => $data['clanDetails']['results']['locationName'], 
    ':clanBadgeImg_s' => substr($data['clanDetails']['results']['clanBadgeImg']['s'], 0, strrpos($data['clanDetails']['results']['clanBadgeImg']['s'], ',')), 
    ':clanBadgeImg_xl' => $data['clanDetails']['results']['clanBadgeImg']['xl'], 
    ':warFrequency' => $data['clanDetails']['results']['warFrequency'], 
    ':clanLevel' => $data['clanDetails']['results']['clanLevel'], 
    ':warWins' => $data['clanDetails']['results']['warWins'], 
    ':warLosses' => $warLosses, 
    ':warTies' => $warTies, 
    ':clanPoints' => $data['clanDetails']['results']['clanPoints'], 
    ':requiredTrophies' => $data['clanDetails']['results']['requiredTrophies'],
    ':members' => $data['clanDetails']['results']['members'],
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

header("Location: redirect.php?class=success&message=Please wait to be redirected"); 
die(); 

?>