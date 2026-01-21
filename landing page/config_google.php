<?php
require_once __DIR__ . '/../vendor/autoload.php';

$client = new Google\Client();
$client->setClientId('722256518411-1f8ctemkfkojio9375hh6d9gtet8pdm7.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/atmin/landing%20page/google_callback.php');
$client->addScope('email');
$client->addScope('profile');
?>
