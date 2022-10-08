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
	$delete = '<a href="delete-account.php?del='.$id.'">
				<i class="fa fa-trash" aria-hidden="true"></i>
			  </a>';
	$first_name = $result['first_name'];
	$last_name = $result['last_name'];
	$email = $result['email'];
	$amount = $result['amount'];
	$loan_type = $result['loan_type'];

	

	$json[] = array(
		"first" => $first_name,
		"last" => $last_name,
		"email" => $email,
		"amount" => $amount,
		"type" => $loan_type,
		"edit" => $delete,
		"delete" => $block
		
	);
		
}

// Echoinh array in json format
echo json_encode($json);

?>







