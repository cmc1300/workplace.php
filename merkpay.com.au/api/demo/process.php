<?php

header('Access-Control-Allow-Origin: *');

$dataField = $_REQUEST['data'];

/* $postData = array();

foreach($dataField as $index => $value) {
  $postData[$index] = $value;
} */

$queryURL = "http://api.merkpay.com.au/southbound/wechat/micropay.php";
$ch       = curl_init();

curl_setopt($ch, CURLOPT_URL, $queryURL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $dataField);

$output   = curl_exec($ch);

echo ($output);