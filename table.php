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
                        $columnss = '';
                        while ($row = mysqli_fetch_assoc($queryColumns)) {
                            $column = $row['Field'];
                            echo '<th>' . $column . '</th>';
                            $columnss .= $column . ',';
                        }
                        $columns = substr($columnss, strpos($columnss, ",") + 1, strlen($columnss) - strpos($columnss, ",") - 2);
                        ?>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <form action="supprimer.php" method="POST">
                        <?php
                        $query = mysqli_query($db, "SELECT * FROM $table;");
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo '<tr>';
                            $newrow = explode(',', implode(',', $row));
                            foreach ($row as $value) {
                                echo '<td>' . $value . '</td>';
                                if ($value == reset($row)) {
                                    echo '<input type="hidden" name="table" value=' . $table . '>';
                                    $columnsArray = explode(",", $columnss);
                                    $column = $columnsArray[0];
                                    echo '<input type="hidden" name="column" value=' . $column . '>';
                                }
                            }
                            echo '<input type="hidden" id=' . $newrow[0] . ' name="value" value="">';
                            // echo '<input type="hidden" name="values" value="' . implode(',', $row) . '">';
                            // echo '<input type="hidden" name="columns" value=' . $columnss . '>';
                            // echo '<td><button type="button" class="modif" onclick="openPopupTable(\'modif\')"><i class="fa-solid fa-pen"></i>Modifier</button></td>';
                            // echo '<div class="popup" id="popup">';
                            // echo '<div class="popup-container">';
                            // echo '<h2>Confirmation</h2>';
                            // echo '<p id="message-confirm"></p>';
                            // echo '<div class="buttons">';
                            // echo '<button type="submit" id="oui" name="modifier">Oui</button>';
                            // echo '<button type="button" id="non" onclick="closePopup()">Non</button>';
                            // echo '</div>';
                            // echo '</div>';
                            // echo '</div>';
                            echo '<td><button type="button" class="supp" onclick="openPopupTable(\'supp\',' . $newrow[0] . ')"><i class="fa-solid fa-trash"></i>Supprimer</button></td>';
                            echo '<div class="popup" id="popup">';
                            echo '<div class="popup-container">';
                            echo '<h2>Confirmation</h2>';
                            echo '<p id="message-confirm"></p>';
                            echo '<div class="buttons">';
                            echo '<button type="submit" id="oui" name="supprimer">Oui</button>';
                            echo '<button type="button" id="non" onclick="closePopup()">Non</button>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</tr>';
                        }
                        ?>
                    </form>
                    <tr>
                        <td></td>
                        <form action="ajouter.php" method="POST">
                            <?php
                            $queryColumns = mysqli_query($db, "SHOW COLUMNS FROM $table;");
                            while ($row = mysqli_fetch_assoc($queryColumns)) {
                                if ($row['Field'] == "id_" . $table) {
                                    continue;
                                }
                                $type = $row['Type'];
                                if (substr($type, 0, 3) == "int") {
                                    echo '<td><input type="number" name="value[]" required></td>';
                                } else if (substr($type, 0, 7) == "tinyint") {
                                    echo '<td><input type="number" name="value[]" min="0" max="1" required></td>';
                                } else if (substr($type, 0, 7) == "varchar") {
                                    if ($row['Field'] == "email") {
                                        echo '<td><input type="email" name="value[]" required></td>';
                                    } else if ($row['Field'] == "mot_de_passe") {
                                        echo '<td class="password-container"><input type="password" name="value[]" id="password" required><i class="fa-solid fa-eye" id="eye"></i></td>';
                                    } else {
                                        echo '<td><input type="text" name="value[]  " required></td>';
                                    }
                                }
                            }
                            echo '<input type="hidden" name="table" value=' . $table . '>';
                            echo '<input type="hidden" name="columns" value=' . $columns . '>';
                            ?>
                            <td><button type="submit" id="ajout">Ajouter</button></td>;
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
            <script src="js/popup.js"></script>
        </div>
    </body>

    </html>