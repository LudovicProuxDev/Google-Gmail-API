<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/consts.php';

session_start();

$client = new Google\Client();
$client->setAuthConfigFile(GOOGLE_CLIENT_FILE);
$client->setRedirectUri(ROUTE_OAUTH2);
$client->addScope(Google\Service\Gmail::GMAIL_READONLY);

if (! isset($_GET['code'])) {
  header('Location: ' . filter_var($client->createAuthUrl(), FILTER_SANITIZE_URL));
} else {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var(ROUTE_INDEX, FILTER_SANITIZE_URL));
}
