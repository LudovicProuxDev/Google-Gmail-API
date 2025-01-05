<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/consts.php';

session_start();

$client = new Google\Client();
$client->setAuthConfig(GOOGLE_CLIENT_FILE);
$client->addScope(Google\Service\Gmail::GMAIL_METADATA);

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);

    $gmail = new Google\Service\Gmail($client);

    $emails = $gmail->users_messages->listUsersMessages('me')->getMessages();

    $dataEmails = [];
    foreach ($emails as $email) {
        $dataEmails[] = $gmail->users_messages->get('me', $email->getId());
    }

    // Dump to show the data
    dd($dataEmails);
} else {
    header('Location: ' . filter_var(ROUTE_OAUTH2, FILTER_SANITIZE_URL));
}
