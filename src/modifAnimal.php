<?php
// Inclure le fichier de configuration
include 'config.php';

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Récupérer l'ID de l'animal à modifier
$id = $_GET['id'];

// Récupérer les données actuelles de l'animal
$sql = "SELECT * FROM animaux WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$animal = $result->fetch_assoc();

// Vérifier si des données de formulaire ont été soumises
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les nouvelles données du formulaire
    $prenom = $_POST['prenom'];
    $nom_scientifique = $_POST['nom_scientifique'];
    $date_derniere_visite = $_POST['date_derniere_visite'];
    $nom_enclos = $_POST['nom_enclos'];

    // Préparer une déclaration de mise à jour
    $sql = "UPDATE animaux SET prenom = ?, nom_scientifique = ?, date_derniere_visite = ?, nom_enclos = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $prenom, $nom_scientifique, $date_derniere_visite, $nom_enclos, $id);

    // Exécuter la déclaration
    if ($stmt->execute()) {
        echo "Animal mis à jour avec succès";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    // Rediriger vers la page principale
    header("Location: animaux.php");
    exit();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Animal</title>
    <!-- CSS Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>
<body class="body-class">
    <div class="container">
        <h2>Modifier un Animal</h2>
        <form action="" method="post">
        <div class="form-group">
                <label for="race">Race:</label>
                <input type="text" class="form-control" id="race" name="race" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="nom_scientifique">Nom Scientifique:</label>
                <input type="text" class="form-control" id="nom_scientifique" name="nom_scientifique" required>
            </div>
            <div class="form-group">
                <label for="derniere_visite_veto">Date de la Dernière Visite du Vétérinaire:</label>
                <input type="date" class="form-control" id="derniere_visite_veto" name="derniere_visite_veto" required>
            </div>
            <div class="form-group">

            <!--
                <label for="nom_enclos">Nom de l'Enclos:</label>
                <input type="text" class="form-control" id="nom_enclos" name="nom_enclos" required>
            -->
            <label for="enclos">Enclos :</label>
            <select id="enclos" name="enclos">
                <option value="Savane">Savane</option>
                <option value="Nocturne">Nocturne</option>
                <option value="Jungle">Jungle</option>
                <option value="Voliere">Volière</option>
                <option value="Aquarium">Aquarium</option>
                <option value="Ferme">Ferme</option>
                <option value="Rongeur">Rongeur</option>
                <option value="Banquise">Banquise</option>
            </select>


            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</body>
</html>
