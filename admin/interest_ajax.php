<?php

include("../database.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM interest");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

	$id = $result['id'];
	
	$block = '<a href="block-account.php?trash='.$id.'">
				<i class="fa fa-lock" aria-hidden="true"></i>
			  </a>';
	$delete = '<a href="delete-interest.php?del='.$id.'">
				<i class="fa fa-trash" aria-hidden="true"></i>
			  </a>';

	$loan = $result['loan'];
	$rate = $result['rate'];
	
	

	$json[] = array(
		
		"loan" => $loan,
		"rate" => $rate,
		"edit" => $delete,
		"delete" => $block
		
	);
		
}

// Echoinh array in json format
echo json_encode($json);

?>







