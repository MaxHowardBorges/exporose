<?php
require_once "bd.php";
$db = createDbConnection();
$table = $_POST['table'];
$column = $_POST['column'];
$value = $_COOKIE['value'];
mysqli_query($db, "DELETE FROM $table WHERE $column = $value;");
header("Location: table.php?table=" . $table);
exit();

    // require_once "bd.php";
    // $db = createDbConnection();
    // $table = $_POST['table'];
    // $columns = $_POST['columns'];
    // $columnsArray = explode(",", $columns);
    // $values = $_POST['values'];
    // $valuesArray = explode(",", $values);
    // for ($i = 1; $i <= count($columnsArray); $i++) {
    //     echo "UPDATE $table SET $columnsArray[$i] = $values[$i] WHERE $columnsArray[0]=$values[0]";
    //     $query = mysqli_query($db, "UPDATE $table SET $columnsArray[$i] = $values[$i] WHERE $columnsArray[0]=$values[0]");
    // }
    // // header("Location: table.php?table=" . $table);
    // // exit();
