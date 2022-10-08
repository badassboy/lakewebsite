<?php  

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../library.php");
$bank = new Banking();

$account_number = "";
$amount = "";
$full_name="";
$purpose = "";
$tcode = "";


if (isset($_POST['receiver'])) {
	$account = $_POST['receiver'];
	// echo $account_number;
}

if (isset($_POST['amount'])) {
	$amount = $_POST['amount'];
	// echo $amount;
}

if (isset($_POST['full_name'])) {
	$full_name = $_POST['full_name'];
	// echo $amount;
}
if (isset($_POST['purpose'])) {
	$purpose = $_POST['purpose'];
	// echo $amount;
}
if (isset($_POST['transfer_code'])) {
	$tcode = $_POST['transfer_code'];
	// echo $amount;
}





$funded_account = $bank->customerTransfer($amount,$account,$full_name,$purpose,$tcode);
if ($funded_account) {
	echo '<script>alert("Transfer Successful")</script>';
}else {
	echo '<script>alert("Transfer failed")</script>';
}

?>