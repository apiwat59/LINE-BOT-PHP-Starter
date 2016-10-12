<?php
$access_token = 'iHrKTePlPqILV/X59sGJhzuJ0pkWAm/lZrjsG6/FbioFScroH42u6LkD9D5Wg29Qm3y45yTVZMJr4Cv5OBDDMymYk16SCazYbZLBWKoqroZW3YbDFZJSQcNdbkvgFjWaUmGvLocijk9KvaklfYmKsAdB04t89/1O/w1cDnyilFU=';
$proxy = 'velodrome.usefixie.com:80';
$proxyauth = 'fixie:U0hIWNH9iS4zo5W';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>
