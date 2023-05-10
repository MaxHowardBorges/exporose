<?php
$dbHost = "mysql5.namebay.com";
$dbUser = "db_exporose2_1";
$dbPassword = "ksS7G5Ue";
$dbName = "db_exporose2_1";

function createDbConnection() {
    global $dbHost;
    global $dbUser;
    global $dbPassword;
    global $dbName;

    if (!isset($dbHost) || !isset($dbName) || !isset($dbPassword) || !isset($dbUser)) {
        trigger_error('Les variables globales nécessaires à la connexion à la base de données ne sont pas définies.', E_USER_ERROR);
    }
    $db = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
    if (!$db) {
        trigger_error('Impossible de se connecter à la base de données.', E_USER_ERROR);
    }
    return $db;
}
