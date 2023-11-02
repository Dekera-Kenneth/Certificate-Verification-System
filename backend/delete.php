<?php
require('../config.php');

$id = $_GET['id'];


$usersColl = $db->users;
$usersColl->deleteOne(['id' => $id]);


$_SESSION['success'] = "User deleted successfully";
header("Location: viewAllregistered.php");

?>