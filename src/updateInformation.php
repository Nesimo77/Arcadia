<?php
include 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

$information = isset($_POST['information']) ? $conn->real_escape_string($_POST['information']) : '';

$sql = "UPDATE informations SET content='$information' WHERE type='information'";
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
