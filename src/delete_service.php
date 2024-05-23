<?php
include 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $sql = "DELETE FROM services WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
