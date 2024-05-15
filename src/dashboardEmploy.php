<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    
    
    <!-- CSS Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Gestion des Employés</h2>

        <!-- Formulaire pour ajouter un employé -->
        <h3>Ajouter un Employé</h3>
        <form action="ajouterEmployer.php" method="post">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="mail">mail:</label>
                <input type="email" class="form-control" id="mail" name="mail" required>
            </div>
            <div class="form-group">
                <label for="poste">Poste:</label>
                <input type="text" class="form-control" id="poste" name="poste" required>
            </div>
            <div class="form-group">
                <label for="date_embauche">Date d'embauche:</label>
                <input type="date" class="form-control" id="date_embauche" name="date_embauche" required>
            </div>
            <div class="form-group">
                <label for="salaire">Salaire:</label>
                <input type="number" step="0.01" class="form-control" id="salaire" name="salaire" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>

        <!-- Tableau des employés -->
        
        <h3>Liste des Employés</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Poste</th>
                    <th>Date d'embauche</th>
                    <th>Salaire</th>
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

                // Sélectionner tous les employés de la base de données
                $sql = "SELECT * FROM employes ORDER BY nom";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Afficher chaque employé dans le tableau
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nom"] . "</td>";
                        echo "<td>" . $row["prenom"] . "</td>";
                        echo "<td>" . $row["mail"] . "</td>";
                        echo "<td>" . $row["poste"] . "</td>";
                        echo "<td>" . $row["date_embauche"] . "</td>";
                        echo "<td>" . $row["salaire"] . "</td>";
                        echo "<td>";
                        echo "<a href='modifEmployer.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm'>Modifier</a> ";
                        echo "<a href='suppEmployer.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'>Supprimer</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Aucun employé trouvé</td></tr>";
                }

                // Fermer la connexion à la base de données
                $conn->close();
                ?>
            </tbody>
        </table>


        <!-- Formulaire pour ajouter un vétérinaire -->
        <h3>Ajouter un Vétérinaire</h3>
        <form action="ajouterVeterinaire.php" method="post">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="specialite">Spécialité:</label>
                <input type="text" class="form-control" id="specialite" name="specialite" required>
            </div>
            <div class="form-group">
                <label for="date_embauche">Date d'embauche:</label>
                <input type="date" class="form-control" id="date_embauche" name="date_embauche" required>
            </div>
            <div class="form-group">
                <label for="salaire">Salaire:</label>
                <input type="number" step="0.01" class="form-control" id="salaire" name="salaire" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>

        <!-- Tableau des vétérinaires -->
        <h3>Liste des Vétérinaires</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Spécialité</th>
                    <th>Date d'embauche</th>
                    <th>Salaire</th>
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

                // Sélectionner tous les vétérinaires de la base de données
                $sql = "SELECT * FROM veterinaires ORDER BY nom";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Afficher chaque vétérinaire dans le tableau
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nom"] . "</td>";
                        echo "<td>" . $row["prenom"] . "</td>";
                        echo "<td>" . $row["specialite"] . "</td>";
                        echo "<td>" . $row["date_embauche"] . "</td>";
                        echo "<td>" . $row["salaire"] . "</td>";
                        echo "<td>";
                        echo "<a href='modifVeterinaire.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm'>Modifier</a> ";
                        echo "<a href='suppVeterinaire.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'>Supprimer</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Aucun vétérinaire trouvé</td></tr>";
                }

                // Fermer la connexion à la base de données
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
