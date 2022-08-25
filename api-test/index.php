<?php

use Inc\Classes\Helper;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Inc/Classes/Helper.php';
$helper = new Helper();
$request = json_decode($helper->sendTestCurlToApi(), true);
$success = $request['success'];
$message = $request['message'];
header('Content-Type: application/json;charset=utf-8');
echo "<p>Success is {$success}</p>";
echo "<p>Message is {$message}</p>";
