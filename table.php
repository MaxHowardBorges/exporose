<!DOCTYPE html>
<html>

<head>
    <title>Exporose - Table</title>
    <link rel="stylesheet" href="css/table.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
    <div class="titre">
        <img id="logo" src="assets/img/exporose.png" onclick="window.location.href = 'index.html'" />
        <h1>EXPOROSE</h1>
    </div>
    <h3>EXPOSITION INTERNATIONALE DE ROSES</h3>

    <div id="table">
        <?php
        $table = $_GET['table'];
        echo '<h3>' . $table . '</h3>';
        ?>
        <table class="styled-table">
            <thead>
                <tr>
                    <?php
                    require_once "bd.php";
                    $db = createDbConnection();
                    $queryColumns = mysqli_query($db, "SHOW COLUMNS FROM $table;");
                    while ($row = mysqli_fetch_assoc($queryColumns)) {
                        $column = $row['Field'];
                        echo '<th>' . $column . '</th>';
                    }
                    ?>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($db, "SELECT * FROM $table;");
                while ($row = mysqli_fetch_assoc($query)) {
                    echo '<tr>';
                    foreach ($row as $value) {
                        echo '<td>' . $value . '</td>';
                    }
                    echo '<td><button>Modifier</button></td>';
                    echo '<td><button class="supp">Supprimer</button></td>';
                    echo '</tr>';
                }
                ?>
                <tr>
                    <td></td>
                    <?php
                    $queryColumns = mysqli_query($db, "SHOW COLUMNS FROM $table;");
                    while ($row = mysqli_fetch_assoc($queryColumns)) {
                        if ($row['Field'] == "id_" . $table) {
                            continue;
                        }
                        $type = $row['Type'];
                        if (substr($type, 0, 3) == "int") {
                            echo '<td><input type="number"></td>';
                        } else if (substr($type, 0, 7) == "tinyint") {
                            echo '<td><input type="number" name="est_admin" min="0" max="1"></td>';
                        } else if (substr($type, 0, 7) == "varchar") {
                            if ($row['Field'] == "email") {
                                echo '<td><input type="email" name="email"></td>';
                            } else if ($row['Field'] == "mot_de_passe") {
                                echo '<td class="password-container"><input type="password" name="mot_de_passe" id="password"><i class="fa-solid fa-eye" id="eye"></i></td>';
                            } else {
                                echo '<td><input type="text"></td>';
                            }
                        }
                    }
                    ?>
                    <td><button id="ajout" onclick="ajouter.php">Ajouter</button></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <script>
            const passwordInput = document.querySelector("#password");
            const eye = document.querySelector("#eye");

            eye.addEventListener("click", function() {
                this.classList.toggle("fa-eye-slash")
                const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
                passwordInput.setAttribute("type", type)
            })
        </script>
    </div>
</body>

</html>