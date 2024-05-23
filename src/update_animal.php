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
$race = isset($_POST['race']) ? $conn->real_escape_string($_POST['race']) : '';
$nom_scientifique = isset($_POST['nom_scientifique']) ? $conn->real_escape_string($_POST['nom_scientifique']) : '';
$prenom = isset($_POST['prenom']) ? $conn->real_escape_string($_POST['prenom']) : '';
$enclos = isset($_POST['enclos']) ? $conn->real_escape_string($_POST['enclos']) : '';
$details = isset($_POST['details']) ? $conn->real_escape_string($_POST['details']) : '';
$derniere_visite_veto = isset($_POST['derniere_visite_veto']) ? $conn->real_escape_string($_POST['derniere_visite_veto']) : '';
$details_veto = isset($_POST['details_veto']) ? $conn->real_escape_string($_POST['details_veto']) : '';

$sql = "UPDATE animaux SET race='$race', nom_scientifique='$nom_scientifique', prenom='$prenom', enclos='$enclos', details='$details', derniere_visite_veto='$derniere_visite_veto', details_veto='$details_veto' WHERE id=$id";

$response = array();
if ($conn->query($sql) === TRUE) {
    $response['success'] = true;
} else {
    $response['success'] = false;
}

header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
