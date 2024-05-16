<?php
// Inclusion du fichier de configuration de la base de données
include 'src/config.php';

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupérer l'ID de l'animal depuis la requête POST
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Préparer et exécuter la requête SQL pour incrémenter la colonne "Interest"
    $sql = "UPDATE animaux SET Interest = Interest + 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Récupérer la nouvelle valeur de "Interest"
        $sql = "SELECT Interest FROM animaux WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        echo $row['Interest'];
    } else {
        echo "Erreur lors de la mise à jour de l'intérêt.";
    }
} else {
    echo "Aucun ID d'animal spécifié.";
}

// Fermer la connexion à la base de données
$conn->close();
?>
