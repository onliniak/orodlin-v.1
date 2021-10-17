<?php
// TODO: Create new user in database.
require_once('includes/config.php');
//Include Composer's autoloader
include 'vendor/autoload.php';

//Import Hybridauth's namespace
use Hybridauth\Hybridauth;

//Now we may proceed and instantiate Hybridauth's classes
$instance = new Hybridauth([ /* ... */ ]);

session_start();

$config = [
//Location where to redirect users once they authenticate with Facebook
//For this example we choose to come back to this same script
'callback' => 'http://my_site/social.php',

//Facebook application credentials
'keys' => [
    'id'     => 'key', //Required: your Facebook application id
    'secret' => 'secret_key'  //Required: your Facebook application secret
]
];

$github = new Hybridauth\Provider\GitHub($config);

$github->authenticate();

$userProfile = $github->getUserProfile();


$lenght = rand(8, 15);
$token = openssl_random_pseudo_bytes($lenght);

if (!empty($userProfile->email)) {
    $_SESSION['email'] = $userProfile->email;
    echo 'akaka';
};

$github->disconnect();
