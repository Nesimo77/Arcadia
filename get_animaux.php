<?php
// Inclusion du fichier de configuration de la base de données
include 'src/config.php';

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupérer la valeur de l'enclos depuis la requête GET
if (isset($_GET['enclos'])) {
    $enclos = $_GET['enclos'];

    // Préparer et exécuter la requête SQL pour récupérer les animaux dans l'enclos spécifié
    $sql = "SELECT * FROM animaux WHERE enclos = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $enclos);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Afficher les animaux sous forme de tableau
        echo "<table class='table table-bordered'>";
        echo "<thead><tr><th>Prénom</th><th>Race</th><th>Nom Scientifique</th><th>Action</th></tr></thead><tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["prenom"] . "</td>";
            echo "<td>" . $row["race"] . "</td>";
            echo "<td>" . $row["nom_scientifique"] . "</td>";
            echo "<td><button class='btn btn-info voir-plus' data-id='" . $row["id"] . "'>Voir plus</button></td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "Aucun animal trouvé dans cet enclos.";
    }
} else {
    echo "Aucun enclos spécifié.";
}

// Fermer la connexion à la base de données
$conn->close();
?>
