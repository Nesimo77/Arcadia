<?php
// Inclure le fichier de configuration
include 'config.php';

// Vérifier si des données de formulaire ont été soumises
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $poste = $_POST['poste'];
    $mail = $_POST['mail'];
    $date_embauche = $_POST['date_embauche'];
    $salaire = $_POST['salaire'];

    // Connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué: " . $conn->connect_error);
    }

    // Préparer une déclaration d'insertion
    $stmt = $conn->prepare("INSERT INTO employes (nom, prenom, mail, poste, date_embauche, salaire) VALUES (?, ?, ?, ?, ?, ?)");
    
    // Lie les paramètres
    $stmt->bind_param("sssssd", $nom, $prenom, $mail, $poste, $date_embauche, $salaire);

    // Exécuter la déclaration d'insertion
    if ($stmt->execute()) {
        echo "Nouvel employé ajouté avec succès";
    } else {
        echo "Erreur lors de l'ajout de l'employé: " . $conn->error;
    }

    // Fermer la déclaration
    $stmt->close();

    // Fermer la connexion à la base de données
    $conn->close();

    // Rediriger vers la page principale
    header("Location: dashboard.php");
    exit();
}
?>
