<?php
require_once "bd.php";
require_once "increment.php";
$db = createDbConnection();
InitialiserIncrement("jury");
InitialiserIncrement("note");
$note = $_POST['note'] ?? $_GET['note'];
$nomjuryResult = mysqli_query($db, "SELECT nom_jury FROM jury WHERE id_jury= (SELECT MAX(id_jury) FROM jury);");
$nomjuryRow = mysqli_fetch_assoc($nomjuryResult);
if ($nomjuryRow) {
    $nomjury = $nomjuryRow['nom_jury'];
    $numerojury = substr($nomjury, -1);
    $nom = "J" . $numerojury + 1;
} else {
    $nom = 'J1';
}
$query = mysqli_query($db, "INSERT INTO jury(nom_jury) VALUES('$nom');");
$idResult = mysqli_query($db, "SELECT id_jury FROM jury WHERE nom_jury='$nom';");
$idRow = mysqli_fetch_assoc($idResult);
$id_jury = $idRow['id_jury'];
$note = is_array($note) ? $note : array($note);
for ($i = 0; $i < count($note); $i++) {
    $query = mysqli_query($db, "INSERT INTO note(id_jury,id_bouquet,valeur_note) VALUES('$id_jury', '" . $i + 1 . "', '$note[$i]');");
}

header("Location: index.html");
exit();
