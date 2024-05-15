<?php
// Inclure le fichier de configuration
include 'config.php';

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Récupérer l'ID de l'employé à supprimer
$id = $_GET['id'];

// Préparer une déclaration de suppression
$sql = "DELETE FROM employes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Employé supprimé avec succès";
} else {
    echo "Erreur lors de la suppression de l'employé: " . $conn->error;
}

$stmt->close();
$conn->close();

// Rediriger vers la page principale
header("Location: dashboard.php");
exit();
?>
