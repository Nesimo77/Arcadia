<?php
include 'config.php';

if (isset($_POST['approve'])) {
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("La connexion a échoué: " . $conn->connect_error);
    }

    $ids = $_POST['approve'];
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    $types = str_repeat('i', count($ids));

    $sql = "UPDATE commentaires SET approuve = 1 WHERE id IN ($placeholders)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param($types, ...$ids);

    if ($stmt->execute()) {
        echo "Commentaires approuvés.";
    } else {
        echo "Erreur: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Aucun commentaire sélectionné.";
}
?>
