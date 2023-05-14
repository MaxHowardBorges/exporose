<?php
require_once "bd.php";
require_once "increment.php";
$db = createDbConnection();
$table = $_POST['table'];
$columns = $_POST['columns'];
$values = '';
foreach ($_POST['value'] as $value)
    $values .= $value . ',';
$values = substr($values, 0, -1);
InitialiserIncrement($table);
mysqli_query($db, "INSERT INTO $table($columns) VALUES($values);");
header("Location: table.php?table=" . $table);
exit();
