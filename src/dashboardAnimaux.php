<div class="container">
        <h2>Tableau de bord des animaux</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Race</th>
                    <th>Nom Scientifique</th>
                    <th>Prénom</th>
                    <th>Enclos</th>
                    <th>Dernière visite vétérinaire</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Connexion à la base de données
                // Connexion à la base de données
                 $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "arcadia_bdd";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Vérification de la connexion
                if ($conn->connect_error) {
                    die("La connexion a échoué: " . $conn->connect_error);
                }

                // Sélectionner tous les animaux de la base de données
                $sql = "SELECT * FROM animaux";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Afficher chaque animal dans le tableau
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["race"] . "</td>";
                        echo "<td>" . $row["nom_scientifique"] . "</td>";
                        echo "<td contenteditable='true'>" . $row["prenom"] . "</td>";
                        echo "<td contenteditable='true'>" . $row["enclos"] . "</td>";
                        echo "<td contenteditable='true'>" . $row["derniere_visite_veto"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "Aucun résultat trouvé";
                }
                // Fermer la connexion à la base de données
                $conn->close();
                ?>
            </tbody>
        </table>
        <div class="container">
        <table class="table">
            <!-- Tableau affichant les animaux -->
        </table>

        <!-- Formulaire d'ajout d'animal -->
        <h2>Ajouter un animal</h2>
        <form action="ajouterAnimal.php" method="post">
            <div class="form-group">
                <label for="race">Race:</label>
                <input type="text" class="form-control" id="race" name="race" required>
            </div>
            <div class="form-group">
                <label for="nom_scientifique">Nom scientifique:</label>
                <input type="text" class="form-control" id="nom_scientifique" name="nom_scientifique" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="enclos">Enclos:</label>
                <input type="text" class="form-control" id="enclos" name="enclos" required>
            </div>
            <div class="form-group">
                <label for="derniere_visite_veto">Dernière visite vétérinaire:</label>
                <input type="date" class="form-control" id="derniere_visite_veto" name="derniere_visite_veto" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
    </div>