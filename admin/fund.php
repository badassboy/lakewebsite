<?php  

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../library.php");
$bank = new Banking();

$account_number = "";
$amount = "";

if (isset($_POST['initial_deposit'])) {
	$deposit = $_POST['initial_deposit'];
	// echo $account_number;
}

if (isset($_POST['money'])) {
	$amount = $_POST['money'];
	// echo $amount;
}

$funded_account = $bank->fundAccount($deposit,$amount);
if ($funded_account) {
	echo '<script>alert("fund added")</script>';
}else {
	echo '<script>alert("fund not added")</script>';
}

?>