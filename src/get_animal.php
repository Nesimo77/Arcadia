<?php
// Connexion à la base de données
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "arcadia_bdd";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

$sql = "SELECT * FROM animaux WHERE id = $id";
$result = $conn->query($sql);

$animal = $result->fetch_assoc();

header('Content-Type: application/json');
echo json_encode($animal);

$conn->close();
?>
