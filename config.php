<?php

// include google client library for PHP autoload file
require_once 'vendor/autoload.php';
include("api_keys.php");
// include("library.php");
$api_keys = new API();



// // make object of google api client to call Google API
$google_client = new Google_Client();
// // load authorization credentials from client_secret json file
// $google_client->setAuthConfig('client_secret.json');

// // set the OAuth 2.0 client ID
$google_client->setClientId($api_keys->clientID());
// // secret key
$google_client->setClientSecret($api_keys->secretkey());

// // redurect uri for local environment
$google_client->setRedirectUri('http://localhost/msservice2/user/homepage.php');
// redirect uri for server testing
// $google_client->setRedirectUri('https://lakesidecreditunion.com/user/homepage.php');
$google_client->addScope("email");
$google_client->addScope("profile");

// database connection
// $hostname = "localhost";
// $username = "";
// $password = "";
// $database = "banking";

// $conn = mysqli_connect($hostname,$username,$password,$database);






 ?>