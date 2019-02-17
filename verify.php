<?php
$access_token = 'mBMq4+bnv+GRs4j+OZq71Hd86b539QhX9fDhf0aME1j+aWe73P/bml5eGNnrCC631NVOe4W10DF9CPk0pIAIoU4jtCaKmqcN+9wlCGyT758C8HEpZZ4m6vwR+jobXHYxOlKuJV2qKS2p3aOZDMTC6wdB04t89/1O/w1cDnyilFU=
';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);


$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);
echo $result;

echo $result;
?>
