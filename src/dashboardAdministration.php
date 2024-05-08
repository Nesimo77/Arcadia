<div class="container">
        <h2>Modifier les horaires</h2>
        <form action="updateHoraires.php" method="post">
            <?php
            // Connexion à la base de données
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "arcadia_bdd";

            // Création de la connexion
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Vérification de la connexion
            if ($conn->connect_error) {
                die("La connexion a échoué: " . $conn->connect_error);
            }

            // Sélectionnez les horaires actuels depuis la base de données
            $sql = "SELECT jour, horaire FROM horaires";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Afficher un formulaire pour modifier les horaires
                while($row = $result->fetch_assoc()) {
                    echo '<div class="form-group">';
                    echo '<label for="' . $row['jour'] . '">' . $row['jour'] . '</label>';
                    echo '<input type="text" class="form-control" id="' . $row['jour'] . '" name="horaires[' . $row['jour'] . ']" value="' . $row['horaire'] . '">';
                    echo '</div>';
                }
                echo '<button type="submit" class="btn btn-primary">Enregistrer</button>';
            } else {
                echo "Aucun résultat trouvé";
            }

            // Ferme la connexion à la base de données
            $conn->close();
            ?>
        </form>
    </div>