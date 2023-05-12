<?php
function InitialiserIncrement($table)
{
    require_once "bd.php";
    $db = createDbConnection();
    $increment = mysqli_query($db, "SELECT MAX(id_$table) FROM $table");
    $rowincrement = mysqli_fetch_assoc($increment);
    $idincrement = $rowincrement['MAX(id_' . $table . ')'];
    if ($idincrement) {
        mysqli_query($db, "ALTER TABLE $table AUTO_INCREMENT = $idincrement");
    } else {
        mysqli_query($db, "ALTER TABLE $table AUTO_INCREMENT = 1");
    }
}
