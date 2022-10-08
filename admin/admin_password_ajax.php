<?php 
session_start(); 
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../library.php");
$bank = new Banking();


$password ="";
$cpwd = "";
$id = "";

if (isset($_SESSION['id'])) {
	$id = $_SESSION['id'];
	// echo $id;
}

if (isset($_POST['password'])) {
	$password = $_POST['password'];
	// echo $password;
}

if (isset($_POST['confirm_password'])) {
	$cpwd = $_POST['confirm_password'];
	// echo $cpwd;
}

$updated = $bank->changeAdminPassword($id,$password);
if ($updated) {
	echo "<script>alert('Password updated')</script>";
}else {
	echo "<script>alert('Failed in updating password')</script>";
}






?>