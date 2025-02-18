<!DOCTYPE html>
<html>

<head>
  <title>Exporose - Administrateur</title>
  <link rel="stylesheet" href="css/admin.css" />
</head>

<body>
  <div class="titre">
    <img id="logo" src="assets/img/exporose.png" onclick="window.location.href = 'index.html'" />
    <h1>EXPOROSE</h1>
  </div>
  <h3>EXPOSITION INTERNATIONALE DE ROSES</h3>

  <h3 id="titre">Base de donnees</h3>
  <div id="div">
    <div id="div1">
      <class id="buttons1">
        <?php
        require_once "bd.php";
        $db = createDbConnection();
        $query = mysqli_query($db, "SHOW TABLES");
        while ($row = mysqli_fetch_assoc($query)) {
          $table = $row['Tables_in_db_exporose2_1'];
          echo '<button onclick="window.location.href = \'table.php?table=' . $table . '\'">' . $table . '</button>';
        }
        ?>
      </class>
    </div>
    <div id="div2">
      <class id="buttons2">
        <button id="etiquette" onclick="window.location.href = 'pdf_avant_vote.php'">Etiquette</button>
        <button id="etiquette_resultat" onclick="window.location.href = 'pdf_prix.php'">Etiquette resultat</button>
        <button id="pdf_resultat" onclick="window.location.href = 'pdf_resultat.php'">Resultat</button>
      </class>
    </div>
  </div>
</body>

</html>