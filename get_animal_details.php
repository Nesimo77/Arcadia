<?php
// Inclusion du fichier de configuration de la base de données
include 'src/config.php';

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupérer l'ID de l'animal depuis la requête GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Préparer et exécuter la requête SQL pour récupérer les détails de l'animal spécifié
    $sql = "SELECT * FROM animaux WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Afficher les détails de l'animal
        $row = $result->fetch_assoc();
        echo "<h5>Prénom : " . $row["prenom"] . "</h5>";
        echo "<p>Race : " . $row["race"] . "</p>";
        echo "<p>Nom Scientifique : " . $row["nom_scientifique"] . "</p>";
        if ($row["details"] == "") {
            echo "<p> Aucune description trouvé</p>";
        } else {
            echo "<p>Description : " . $row["details"] . "</p>";
        }
        
        echo "<p>J'aime : <span id='interest-" . $row["id"] . "'>" . $row["Interest"] . "</span></p>";
        echo "<button class='btn btn-primary' id='like-button' data-id='" . $row["id"] . "'>J'aime</button>";
    } else {
        echo "Aucun détail trouvé pour cet animal.";
    }
} else {
    echo "Aucun ID d'animal spécifié.";
}

// Fermer la connexion à la base de données
$conn->close();
?>
