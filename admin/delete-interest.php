<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include("../database.php");
$dbh = DB();

$id = $_GET["del"];

$stmt = $dbh->prepare("DELETE  FROM interest WHERE id = ?");
	$stmt->execute([$id]);
	$trashed = $stmt->rowCount();
	if ($trashed>0) {
		echo "deleted";
	}else{
		echo "delete failed";
	}



?>