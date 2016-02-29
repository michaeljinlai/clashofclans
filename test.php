<?php

$accesstoken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjcwMzU0NTZhLTRmMjQtNGFkYy04NWQ3LTJhYjdhMjgzYjNkNSIsImlhdCI6MTQ1NjczMjU5OSwic3ViIjoiZGV2ZWxvcGVyLzY3ZjNmMGZjLTIwNzEtZjYyZC0zYTEwLTE2YTNiNmM0M2ViMCIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjE0NC4xMzIuNzAuNTAiXSwidHlwZSI6ImNsaWVudCJ9XX0.iwX95kjuiH0sBro8F-xfpYTPdIum-vLvpkJL20HnV_c9lO1ZPyFscLzXnEsnDcySX2_GaXYOcGIfiD7Gb41ZfQ';

$url = 'https://api.clashofclans.com/v1/clans/%2390GLL8R0';
$ch = curl_init(htmlspecialchars($url));

$headr = array();
$headr[] = 'Accept: application/json';
$headr[] = 'Authorization: Bearer '.$accesstoken;

curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$contents = curl_exec($ch);
var_dump($contents);

