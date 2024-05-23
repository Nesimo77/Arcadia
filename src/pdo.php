<?php
session_start();
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['username'], $_POST['password'])) {
        // Connexion à la base de données
        $servername = "localhost";
        $username_db = "root";
        $password_db = "";
        $dbname = "arcadia_bdd";

        // Création de la connexion
        $conn = new mysqli($servername, $username_db, $password_db, $dbname);

        // Vérification de la connexion
        if ($conn->connect_error) {
            die(json_encode(["success" => false, "message" => "La connexion a échoué: " . $conn->connect_error, "role" => ""]));
        }

        // Récupération des données du formulaire
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Préparation de la requête SQL pour éviter les injections SQL
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                // Connexion réussie
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $row['role']; // Stocke le rôle de l'utilisateur dans la session
                $response = ["success" => true, "role" => $row['role']];
            } else {
                // Mot de passe incorrect
                $response = ["success" => false, "message" => "Nom d'utilisateur ou mot de passe incorrect", "role" => ""];
            }
        } else {
            // Utilisateur non trouvé
            $response = ["success" => false, "message" => "Nom d'utilisateur ou mot de passe incorrect", "role" => ""];
        }

        echo json_encode($response);

        $stmt->close();
        $conn->close();
    } else {
        echo json_encode(["success" => false, "message" => "Les informations de connexion ne sont pas fournies", "role" => ""]);
    }
}
?>
