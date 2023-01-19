<?php

// include google client library for PHP autoload file
require_once 'vendor/autoload.php';
include("api_keys.php");
$api_keys = new API();



// make object of google api client to call Google API
$google_client = new Google_Client();
// load authorization credentials from client_secret json file
$google_client->setAuthConfig('client_secret.json');


// set the OAuth 2.0 client ID
$google_client->setClientId($api_keys->clientID());
// secret key
$google_client->setClientSecret($api_keys->secretkey());

// redurect uri
$google_client->setRedirectUri('https://lakesidecreditunion.com/create_account.php');
$google_client->addScope("email");
$google_client->addScope("profile");

//start session on webpage
// session_start();



 ?>