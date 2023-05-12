<?php
require_once "bd.php";
require_once "increment.php";
require_once "table.php";
$db = createDbConnection();
InitialiserIncrement($table);