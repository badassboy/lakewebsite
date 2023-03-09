<?php
require("../config.php");
session_start();
session_unset($_SESSION['user_token']);
session_destroy();
header("Location:index.php");
exit;



?>