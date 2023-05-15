<?php
require_once "bd.php";
$db = createDbConnection();
$table = $_POST['table'];
$column = $_POST['column'];
$value = $_POST['value'];
mysqli_query($db, "DELETE FROM $table WHERE $column = $value;");
header("Location: table.php?table=" . $table);
exit();
