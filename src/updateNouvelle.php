<?php
include 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

$nouveaute = isset($_POST['nouveaute']) ? $conn->real_escape_string($_POST['nouveaute']) : '';

$sql = "UPDATE informations SET content='$nouveaute' WHERE type='nouveaute'";
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
