<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("library.php");
$bank = new Banking();

$dbh = DB();

if (isset($_GET['token'])) {
	
	$token = $_GET['token'];

	$activated = $bank->verificationStatus($token);
	if ($activated) {
		echo '<div class="alert alert-success" role="alert">Account Activated</div>';
	}else {
		echo '<div class="alert alert-danger" role="alert">Activation Failed</div>';
	}
}






?>