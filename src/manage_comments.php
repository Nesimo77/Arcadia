<?php
include 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['approve'])) {
        foreach ($_POST['approve'] as $id) {
            $stmt = $conn->prepare("UPDATE commentaires SET approuve = 1 WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
        }
    }

    if (isset($_POST['delete'])) {
        foreach ($_POST['delete'] as $id) {
            $stmt = $conn->prepare("DELETE FROM commentaires WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
        }
    }
}

$conn->close();
header("Location: dashboard.php");
exit();
?>
