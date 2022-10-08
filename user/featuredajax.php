<?php

include("../database.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM branches");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

	$id = $result['id'];
	
	$block = '<a href="block-account.php?trash='.$id.'">
				<i class="fa fa-lock" aria-hidden="true"></i>
			  </a>';
	$delete = '<a href="delete-account.php?del='.$id.'">
				<i class="fa fa-trash" aria-hidden="true"></i>
			  </a>';
	$branch = $result['branch'];
	$address = $result['address'];
	$location = $result['location'];
	$mobile = $result['mobile'];
	

	$json[] = array(
		
		"branch" => $branch,
		"address" => $address,
		"location" => $location,
		"mobile" => $mobile,
		"edit" => $delete,
		"delete" => $block
		
	);
		
}

// Echoinh array in json format
echo json_encode($json);

?>







