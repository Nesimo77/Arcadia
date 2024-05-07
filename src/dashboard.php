<?php
session_start(); // Démarre la session

// Vérifie si l'utilisateur est connecté en vérifiant si la variable de session existe
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "<h2>Bienvenue, $username, sur le tableau de bord!</h2>";
    // Ajoute un lien de déconnexion
    echo "<form action='logout.php' method='post'>";
    echo "<input type='submit' value='Déconnexion'>";
    echo "</form>";
} else {
    // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: index.html");
    exit();
}
?>