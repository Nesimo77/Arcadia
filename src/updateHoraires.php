<?php
// Inclure le fichier de configuration
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arcadia_bdd";

// Vérifier si des données de formulaire ont été soumises
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['horaires'])) {
    // Connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué: " . $conn->connect_error);
    }

    // Préparer une déclaration de mise à jour
    $stmt = $conn->prepare("UPDATE horaires SET horaire = ? WHERE jour = ?");

    // Lie les paramètres
    $stmt->bind_param("ss", $horaire, $jour);

    // Boucle sur les horaires soumis
    foreach ($_POST['horaires'] as $jour => $horaire) {
        // Exécuter la déclaration de mise à jour
        $stmt->execute();
    }

    // Fermer la déclaration
    $stmt->close();

    // Fermer la connexion à la base de données
    $conn->close();

    // Rediriger vers la page horaires.php après la mise à jour des horaires
    header("Location: dashboard.php");
    exit();
} else {
    // Rediriger vers la page horaires.php si aucune donnée de formulaire n'a été soumise
    header("Location: dashboard.php");
    exit();
}
?>
