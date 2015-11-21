<?php
// Create a curl handle to a non-existing location
$ch = curl_init('https://set7z18fgf.execute-api.us-east-1.amazonaws.com/prod/?route=getClanDetails&clanTag=%232J0G90RR');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

// Used for debugging purposes
if(curl_exec($ch) === false)
{
    echo 'Curl error: ' . curl_error($ch);
}
else
{
    echo 'Operation completed without any errors';
}


$contents = curl_exec($ch);
// Close handle
curl_close($ch);

// Can output the contents like this
//echo $contents;





?>