<?php
require_once "bd.php";
require_once "increment.php";

$db = createDbConnection();
$table = $_POST['table'];
$columns = $_POST['columns'];
$values = '';

foreach ($_POST['value'] as $value) {
    $escapedValue = mysqli_real_escape_string($db, $value);
    $values .= "'" . $escapedValue . "',";
}

$values = rtrim($values, ',');

InitialiserIncrement($table);

$query = "INSERT INTO $table ($columns) VALUES ($values)";

if (mysqli_query($db, $query)) {
    header("Location: table.php?table=" . $table);
    exit();
} else {
    echo "Erreur lors de l'exécution de la requête : " . mysqli_error($db);
}
