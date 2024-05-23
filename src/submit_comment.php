<?php
include 'config.php';

$nom = $_POST['name'];
$commentaire = $_POST['comment'];
$ip_adresse = $_SERVER['REMOTE_ADDR'];

// Vérifier si l'IP a déjà posté aujourd'hui
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) as count FROM commentaires WHERE ip_adresse = ? AND DATE(date) = CURDATE()";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $ip_adresse);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row['count'] > 0) {
    echo "Vous avez déjà posté un commentaire aujourd'hui.";
} else {
    $sql = "INSERT INTO commentaires (nom, commentaire, ip_adresse) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nom, $commentaire, $ip_adresse);

    if ($stmt->execute()) {
        echo "Commentaire soumis pour modération.";
    } else {
        echo "Erreur: " . $conn->error;
    }
}

$conn->close();
?>
