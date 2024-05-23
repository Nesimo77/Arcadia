<?php
include 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $conn->real_escape_string($_POST['nom']);
    $description = $conn->real_escape_string($_POST['description']);

    $sql = "INSERT INTO services (nom, description) VALUES ('$nom', '$description')";
    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
