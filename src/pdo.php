<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if(isset($_POST['username']) && isset($_POST['password'])) {
        // Connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "arcadia_bdd";

        // Création de la connexion
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérification de la connexion
        if ($conn->connect_error) {
            die("La connexion a échoué: " . $conn->connect_error);
        }

        // Récupération des données du formulaire
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Vérification des informations de connexion dans la base de données
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Connexion réussie
            $_SESSION['username'] = $username; // Stocke le nom d'utilisateur dans une variable
            $response = array("success" => true);
        } else {
            // Connexion échouée
            $response = array("success" => false, "message" => "Nom d'utilisateur ou mot de passe incorrect");
        }

        echo json_encode($response);

        $conn->close();
    } else {
        // Les données du formulaire ne sont pas fournies
        echo json_encode(array("success" => false, "message" => "Les informations de connexion ne sont pas fournies"));
    }
}
?>
