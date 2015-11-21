<?php

require($_SERVER['DOCUMENT_ROOT']."/clashofclans/database.php"); 

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
echo substr($data['clanDetails']['results']['memberList'][0]['leagueBadgeImg']['s'], 0, strrpos($data['clanDetails']['results']['memberList'][0]['leagueBadgeImg']['s'], ','));

?>