<?php
// Inclure le fichier de configuration
include 'config.php';

// Vérifier si des données de formulaire ont été soumises
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données du formulaire
    $race = $_POST['race'];
    $prenom = $_POST['prenom'];
    $nom_scientifique = $_POST['nom_scientifique'];
    
    $date_derniere_visite = $_POST['derniere_visite_veto'];
    $nom_enclos = $_POST['enclos'];

    // Connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué: " . $conn->connect_error);
    }

    // Préparer une déclaration d'insertion
    $stmt = $conn->prepare("INSERT INTO animaux (race, prenom, nom_scientifique, derniere_visite_veto, enclos) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $race, $prenom, $nom_scientifique, $date_derniere_visite, $nom_enclos);

    // Exécuter la déclaration
    if ($stmt->execute()) {
        echo "Nouvel animal ajouté avec succès";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    // Fermer la connexion
    $stmt->close();
    $conn->close();
}

// Rediriger vers la page principale
header("Location: dashboard.php");
exit();
?>
