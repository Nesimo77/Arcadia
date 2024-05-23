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
        <h2>Ajouter Employé</h2>
        <form id="ajouterEmployeForm">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="poste">Poste:</label>
                <input type="text" id="poste" name="poste" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date_embauche">Date d'embauche:</label>
                <input type="date" id="date_embauche" name="date_embauche" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="salaire">Salaire:</label>
                <input type="number" id="salaire" name="salaire" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="role">Rôle:</label>
                <select id="role" name="role" class="form-control" required>
                    <option value="employe">Employé</option>
                    <option value="veterinaire">Vétérinaire</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
        <div id="responseMessage"></div>
    </div>

    <script>
        $(document).ready(function() {
            $("#ajouterEmployeForm").on("submit", function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "ajouterEmployer.php", // Le nom de votre fichier PHP
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        $("#responseMessage").html("<div class='alert alert-success'>" + response.message + "</div>");
                    },
                    error: function() {
                        $("#responseMessage").html("<div class='alert alert-danger'>Erreur lors de l'ajout de l'employé.</div>");
                    }
                });
            });
        });
    </script>
    </div>

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
                        echo "<td>" . $row["email"] . "</td>";
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
