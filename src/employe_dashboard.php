<?php
session_start();

// Vérifier si l'utilisateur est connecté et est un employé
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'employe') {
    header("Location: login.php"); // Rediriger vers la page de connexion si non autorisé
    exit();
}

// Connexion à la base de données
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "arcadia_bdd";

// Création de la connexion
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Récupération des listes des animaux et des employés
$sql_animaux = "SELECT * FROM animaux";
$result_animaux = $conn->query($sql_animaux);

$sql_employes = "SELECT * FROM employes WHERE poste != 'veterinaire'";
$result_employes = $conn->query($sql_employes);

$sql_veterinaires = "SELECT * FROM employes WHERE poste = 'veterinaire'";
$result_veterinaires = $conn->query($sql_veterinaires);


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Employé</title>
    <!-- Styles Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
        .table {
            margin-top: 20px;
        }
        .scrollable-table {
            max-height: 500px; /* Hauteur maximale du tableau */
            overflow-y: auto; /* Activer la barre de défilement vertical si nécessaire */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenue, <?php echo $_SESSION['username']; ?></h1>
        <h2>Dashboard Employé</h2>
        <div class="row">
            <div class="col-md-6">
                <h3>Liste des Animaux</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Espèce</th>
                            <th>Enclos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result_animaux->num_rows > 0) {
                            while($row = $result_animaux->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["prenom"] . "</td>";
                                echo "<td>" . $row["race"] . "</td>";
                                echo "<td>" . $row["enclos"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>Aucun animal trouvé</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            
            <div class="col-md-6">
    <h3>Liste des Employés et Vétérinaires</h3>
    <div class="scrollable-table">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Poste</th>
                </tr>
            </thead>
            <tbody>
                <?php
                function afficherEmployes($result) {
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["nom"] . "</td>";
                            echo "<td>" . $row["prenom"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["poste"] . "</td>";
                            echo "</tr>";
                        }
                    }
                }

                // Afficher les employés
                afficherEmployes($result_employes);

                // Afficher les vétérinaires
                afficherEmployes($result_veterinaires);
                ?>
            </tbody>
        </table>
    </div>
</div>
                

        </div>
    </div>

    <!-- Inclure Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
$conn->close();
?>
