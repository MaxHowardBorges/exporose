<!DOCTYPE html>
<html>

<head>
  <title>Exporose - Vote</title>
  <link rel="stylesheet" href="css/vote.css" />
</head>

<body>
  <div class="titre">
    <img src="assets/img/exporose.png" />
    <h1>EXPOROSE</h1>
  </div>
  <h3>EXPOSITION INTERNATIONALE DE ROSES</h3>
  <div id="container">
    <form action="enregistrerVote.php" method="POST">
      <?php
      require "bd.php";
      $db = createDbConnection();
      $query = mysqli_query($db, "SELECT * FROM bouquet;");
      while ($row = mysqli_fetch_assoc($query)) {
        $id_bouquet = $row['id_bouquet'];
        echo '<div id="bloc">';
        echo '<label for="n_bouquet">' . $id_bouquet . ' </label>';
        echo '<label for="note">Note : </label>';
        echo '<input type="number" id="note" name="note[]" min="0" max="20">';
        echo '</div>';
      }
      ?>
      <input type="submit" value="Envoyer le formulaire">
    </form>
  </div>
</body>

</html>