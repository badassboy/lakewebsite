<?php

include("../database.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM customers");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

	$id = $result['id'];
	
	// $block = '<a href="block-account.php?trash='.$id.'">
	// 			<i class="fa fa-lock" aria-hidden="true"></i>
	// 		  </a>';

	$delete = '<a href="delete-interest.php?del='.$id.'">
				<i class="fa fa-trash" aria-hidden="true"></i>
			  </a>';

	$fullname = $result['fullname'];
	$amount = $result['amount'];
	$address = $result['address'];
	$transfer_date = $result['transfer_date'];
	$reference_number = $result['reference_number'];
	$otp = $result['otp'];
	
	
	

	$json[] = array(
		
		"full_name" => $fullname,
		"amount" => $amount,
		"address" => $address,
		"transfer_date" => $transfer_date,
		"reference" => $reference_number,
		"otp" => $otp,
		"edit" => $delete
		// "delete" => $block
		
	);
		
}

// Echoinh array in json format
echo json_encode($json);

?>







