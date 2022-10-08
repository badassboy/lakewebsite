<?php

include("../database.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM account");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

	$id = $result['id'];
	
	$block = '<a href="edit-account.php?edit='.$id.'">
				<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
			  </a>';
	$delete = '<a href="delete-account.php?del='.$id.'">
				<i class="fa fa-trash" aria-hidden="true"></i>
			  </a>';
	$account_number = $result['account_number'];
	$account_balance = $result['balance'];
	$first_name = $result['first_name'];
	$last_name = $result['last_name'];
	$email = $result['email'];
	$verify = $result['verified'];
	$account_date = $result['account_date'];
	

	$json[] = array(
		
		"account_number" => $account_number,
		"balance" => $account_balance,
		"first" => $first_name,
		"last" => $last_name,
		"email" => $email,
		"verify" => $verify,
		"account_date" => $account_date,
		"edit" => $delete,
		"delete" => $block
		
	);
		
}

// Echoinh array in json format
echo json_encode($json);

?>







