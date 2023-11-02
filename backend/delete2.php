<?php
require('../config.php');

$id = $_GET['id'];

$cert_coll = $db->certificates;
$cert_coll->deleteOne(['id' => $id]);

$_SESSION['success'] = "Certificate deleted successfully";
header("Location: viewAllcert.php");
