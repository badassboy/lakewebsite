<?php

include("../database.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM loans");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

	$id = $result['id'];
	
	$block = '<a href="block-account.php?trash='.$id.'">
				<i class="fa fa-lock" aria-hidden="true"></i>
			  </a>';
	$delete = '<a href="delete-interest.php?del='.$id.'">
				<i class="fa fa-trash" aria-hidden="true"></i>
			  </a>';

	$fullname = $result['fullname'];
	$amount = $result['amount'];
	$address = $result['address'];
	$loan_date = $result['loan_date'];
	$loan_type = $result['loan_type'];
	
	
	

	$json[] = array(
		
		"full_name" => $fullname,
		"amount" => $amount,
		"address" => $address,
		"loan_date" => $loan_date,
		"loan_type" => $loan_type,
		"edit" => $delete
		// "delete" => $block
		
	);
		
}

// Echoinh array in json format
echo json_encode($json);

?>







