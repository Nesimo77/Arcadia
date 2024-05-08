<?php
// Inclure le fichier de configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "arcadia_bdd";

// Vérifier si des données de formulaire ont été soumises
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données du formulaire
    $race = $_POST['race'];
    $nom_scientifique = $_POST['nom_scientifique'];
    $prenom = $_POST['prenom'];
    $enclos = $_POST['enclos'];
    $derniere_visite_veto = $_POST['derniere_visite_veto'];

    // Connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué: " . $conn->connect_error);
    }

    // Préparer une déclaration d'insertion
    $stmt = $conn->prepare("INSERT INTO animaux (race, nom_scientifique, prenom, enclos, derniere_visite_veto) VALUES (?, ?, ?, ?, ?)");

    // Lie les paramètres
    $stmt->bind_param("sssss", $race, $nom_scientifique, $prenom, $enclos, $derniere_visite_veto);

    // Exécuter la déclaration d'insertion
    if ($stmt->execute()) {
        echo "Nouvel animal ajouté avec succès";
    } else {
        echo "Erreur lors de l'ajout de l'animal: " . $conn->error;
    }

    // Fermer la déclaration
    $stmt->close();

    // Fermer la connexion à la base de données
    $conn->close();
}
?>