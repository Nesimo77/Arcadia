<?php
// Inclure le fichier de configuration
include 'config.php';

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Récupérer l'ID du vétérinaire à modifier
$id = $_GET['id'];

// Récupérer les données actuelles du vétérinaire
$sql = "SELECT * FROM veterinaires WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$veterinaire = $result->fetch_assoc();

// Vérifier si des données de formulaire ont été soumises
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les nouvelles données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $specialite = $_POST['specialite'];
    $date_embauche = $_POST['date_embauche'];
    $salaire = $_POST['salaire'];

    // Préparer une déclaration de mise à jour
    $sql = "UPDATE veterinaires SET nom = ?, prenom = ?, specialite = ?, date_embauche = ?, salaire = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssdi", $nom, $prenom, $specialite, $date_embauche, $salaire, $id);

    // Exécuter la déclaration
    if ($stmt->execute()) {
        echo "Vétérinaire mis à jour avec succès";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    // Rediriger vers la page principale
    header("Location: employes.php");
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
    <title>Modifier un vétérinaire</title>
    <!-- CSS Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Modifier un vétérinaire</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $veterinaire['nom']; ?>" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $veterinaire['prenom']; ?>" required>
            </div>
            <div class="form-group">
                <label for="specialite">Spécialité:</label>
                <input type="text" class="form-control" id="specialite" name="specialite" value="<?php echo $veterinaire['specialite']; ?>" required>
            </div>
            <div class="form-group">
                <label for="date_embauche">Date d'embauche:</label>
                <input type="date" class="form-control" id="date_embauche" name="date_embauche" value="<?php echo $veterinaire['date_embauche']; ?>" required>
            </div>
            <div class="form-group">
                <label for="salaire">Salaire:</label>
                <input type="number" step="0.01" class="form-control" id="salaire" name="salaire" value="<?php echo $veterinaire['salaire']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</body>
</html>
