<?php
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

// Can output the contents like this
//echo $contents;

//convert json object to php associative array
$data = json_decode($contents, true);

// Echos the first member of memberList
// echo $data['clanDetails']['results']['memberList'][0]['name'];

// Echos the name of each member
// foreach ($data['clanDetails']['results']['memberList'] as $member) {
// 	echo $member['name'].'<br>';
// }

?>