<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Animaux</title>
    <!-- CSS Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Gestion des Animaux</h2>

        <!-- Formulaire pour ajouter un animal -->
        <h3>Ajouter un Animal</h3>
        <form action="ajouterAnimal.php" method="post">
        <div class="form-group">
                <label for="race">Race:</label>
                <input type="text" class="form-control" id="race" name="race" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="nom_scientifique">Nom Scientifique:</label>
                <input type="text" class="form-control" id="nom_scientifique" name="nom_scientifique" required>
            </div>
            <div class="form-group">
                <label for="derniere_visite_veto">Date de la Dernière Visite du Vétérinaire:</label>
                <input type="date" class="form-control" id="derniere_visite_veto" name="derniere_visite_veto" required>
            </div>
            <div class="form-group">

            <!--
                <label for="nom_enclos">Nom de l'Enclos:</label>
                <input type="text" class="form-control" id="nom_enclos" name="nom_enclos" required>
            -->
            <label for="enclos">Enclos :</label>
            <select id="enclos" name="enclos">
                <option value="Savane">Savane</option>
                <option value="Nocturne">Nocturne</option>
                <option value="Jungle">Jungle</option>
                <option value="Voliere">Volière</option>
                <option value="Aquarium">Aquarium</option>
                <option value="Ferme">Ferme</option>
                <option value="Rongeur">Rongeur</option>
                <option value="Banquise">Banquise</option>
            </select>


            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>

        <!-- Tableau des animaux -->
        <h3>Liste des Animaux</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Race</th>
                    <th>Prénom</th>
                    <th>Nom Scientifique</th>
                    <th>Compteur</th>
                    <th>Date de la Dernière Visite du vétérinaire</th>
                    <th>Nom de l'Enclos</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Connexion à la base de données
                include 'config.php';

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Vérification de la connexion
                if ($conn->connect_error) {
                    die("La connexion a échoué: " . $conn->connect_error);
                }

                // Sélectionner tous les animaux de la base de données
                $sql = "SELECT * FROM animaux ORDER BY enclos";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Afficher chaque animal dans le tableau
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["race"] . "</td>";
                        echo "<td>" . $row["prenom"] . "</td>";
                        echo "<td>" . $row["nom_scientifique"] . "</td>";
                        echo "<td>" . $row["Interest"] . "</td>";
                        echo "<td>" . $row["derniere_visite_veto"] . "</td>";
                        echo "<td>" . $row["enclos"] . "</td>";
                        echo "<td>";
                        echo "<a href='modifAnimal.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm'>Modifier</a> ";
                        echo "<a href='suppAnimal.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'>Supprimer</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Aucun animal trouvé</td></tr>";
                }

                // Fermer la connexion à la base de données
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
