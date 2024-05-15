<?php
// Inclure le fichier de configuration
include 'config.php';

// Vérifier si des données de formulaire ont été soumises
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $specialite = $_POST['specialite'];
    $date_embauche = $_POST['date_embauche'];
    $salaire = $_POST['salaire'];

    // Connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué: " . $conn->connect_error);
    }

    // Préparer une déclaration d'insertion
    $stmt = $conn->prepare("INSERT INTO veterinaires (nom, prenom, specialite, date_embauche, salaire) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssd", $nom, $prenom, $specialite, $date_embauche, $salaire);

    // Exécuter la déclaration
    if ($stmt->execute()) {
        echo "Nouveau vétérinaire ajouté avec succès";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    // Fermer la connexion
    $stmt->close();
    $conn->close();
}

// Rediriger vers la page principale
header("Location: employes.php");
exit();
?>
