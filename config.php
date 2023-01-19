<?php

// include google client library for PHP autoload file
require_once 'vendor/autoload.php';

$client_ID = "214541182768-c4subfnqbimr9rh4f3hopmvrk6gp6lnh.apps.googleusercontent.com";
$client_secret = "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";

// make object of google api client to call Google API
$google_client = new Google_Client();
// load authorization credentials from client_secret json file
$google_client->setAuthConfig('client_secret.json');


// set the OAuth 2.0 client ID
$google_client->setClientId($client_ID);
// secret key
$google_client->setClientSecret($client_secret);

// redurect uri
$google_client->setRedirectUri('https://lakesidecreditunion.com/user/homepage.php');
$google_client->addScope("email");
$google_client->addScope("profile");

//start session on webpage
// session_start();



 ?>