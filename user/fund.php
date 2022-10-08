<?php  

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../library.php");
$bank = new Banking();

$account_number = "";
$amount = "";

if (isset($_POST['account_number'])) {
	$account_number = $_POST['account_number'];
	
}

if (isset($_POST['money'])) {
	$amount = $_POST['money'];
	// echo(gettype($amount));
}

$funded_account = $bank->fundAccount($amount,$account_number);
if ($funded_account) {
	echo '<div class="alert alert-success" role="alert">Account Funded</div>';
}else {
	echo '<div class="alert alert-success" role="alert">Failed in funding account</div>';
}

?>