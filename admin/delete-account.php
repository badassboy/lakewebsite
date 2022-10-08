<?php
include("../database.php");

$db = DB();

if (isset($_GET['del'])) {

	$trashed_id = $_GET['del'];

	// delete user's account
	$sql = "DELETE FROM account WHERE id=$trashed_id";
	$stmt= $db->prepare($sql);
	$result = $stmt->execute([$trashed_id]);

	if ($stmt->rowCount()>0) {
		echo '<div class="alert alert-success" role="alert">Account deleted</div>';
	}

}


?>