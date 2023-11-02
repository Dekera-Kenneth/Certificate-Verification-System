<?php
session_start();
ob_start();
$timezone = date_default_timezone_set("Africa/Lagos");
require 'vendor/autoload.php';

$client = new MongoDB\Client;

// Selecting database
$db = $client->bsu_everifydb;
?>