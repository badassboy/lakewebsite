<?php
require("../config.php");
session_start();
session_unset();
$google_client->revokeToken();
header("Location:index.php");
exit;



?>