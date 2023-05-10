<?php
require "bd.php";
$db = createDbConnection();
$email = $_POST['mail'] ?? $_GET['mail'];
$password = $_POST['mdp'] ?? $_GET['mdp'];
$query = mysqli_query($db, "SELECT * FROM utilisateur WHERE email ='$email' AND mot_de_passe = '$password' AND est_admin = 1;");
if (mysqli_num_rows($query) > 0) {
    header("Location: admin.html");
    exit();
} else {
    header("Location: connexion.html");
    exit();
}
?>
