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

$sql = "SELECT * FROM animaux";
$result = $conn->query($sql);

$animaux = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $animaux[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($animaux);

$conn->close();
?>
