<?php
session_start();
header('Content-Type: application/json');

// Charger les fichiers de Composer
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['poste'], $_POST['date_embauche'], $_POST['salaire'], $_POST['username'], $_POST['password'], $_POST['role'])) {
        // Connexion à la base de données
        $servername = "localhost";
        $username_db = "root";
        $password_db = "";
        $dbname = "arcadia_bdd";

        // Création de la connexion
        $conn = new mysqli($servername, $username_db, $password_db, $dbname);

        // Vérification de la connexion
        if ($conn->connect_error) {
            die(json_encode(["success" => false, "message" => "La connexion a échoué: " . $conn->connect_error]));
        }

        // Récupération des données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $poste = $_POST['poste'];
        $date_embauche = $_POST['date_embauche'];
        $salaire = $_POST['salaire'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role = $_POST['role'];

        // Insérer les données dans la table users
        $sql_users = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt_users = $conn->prepare($sql_users);
        $stmt_users->bind_param("ssss", $username, $email, $password, $role);

        // Insérer les données dans la table appropriée
        if ($role === 'veterinaire') {
            $sql_veterinaires = "INSERT INTO veterinaires (nom, prenom, email, specialite, date_embauche, salaire) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt_veterinaires = $conn->prepare($sql_veterinaires);
            $stmt_veterinaires->bind_param("sssssd", $nom, $prenom, $email, $poste, $date_embauche, $salaire);

            if ($stmt_users->execute() && $stmt_veterinaires->execute()) {
                $message = "Vétérinaire ajouté avec succès";
                sendEmail($email, $username);
                echo json_encode(["success" => true, "message" => $message]);
            } else {
                echo json_encode(["success" => false, "message" => "Erreur lors de l'ajout du vétérinaire"]);
            }

            $stmt_veterinaires->close();
        } else {
            $sql_employes = "INSERT INTO employes (nom, prenom, email, poste, date_embauche, salaire) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt_employes = $conn->prepare($sql_employes);
            $stmt_employes->bind_param("sssssd", $nom, $prenom, $email, $poste, $date_embauche, $salaire);

            if ($stmt_users->execute() && $stmt_employes->execute()) {
                $message = "Employé ajouté avec succès";
                sendEmail($email, $username);
                echo json_encode(["success" => true, "message" => $message]);
            } else {
                echo json_encode(["success" => false, "message" => "Erreur lors de l'ajout de l'employé"]);
            }

            $stmt_employes->close();
        }

        $stmt_users->close();
        $conn->close();
    } else {
        echo json_encode(["success" => false, "message" => "Les informations d'employé ne sont pas complètes"]);
    }
}

// Fonction pour envoyer un email
function sendEmail($toEmail, $username) {
    $mail = new PHPMailer(true);
    try {
        // Paramètres du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Remplacez par votre hôte SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'arcadia.zoo.info@gmail.com'; // Remplacez par votre adresse e-mail
        $mail->Password = 'v6F?t79V=;az@'; // Remplacez par votre mot de passe
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Paramètres de l'email
        $mail->setFrom('arcadia.zoo.info@gmail.com', 'Arcadia Zoo');
        $mail->addAddress($toEmail);

        // Contenu de l'email
        $mail->isHTML(true);
        $mail->Subject = 'Bienvenue à Arcadia Zoo';
        $mail->Body = "<p>Bonjour $username,</p><p>Votre compte a été créé avec succès. Bienvenue à Arcadia Zoo!</p>";

        $mail->send();
    } catch (Exception $e) {
        error_log("L'email n'a pas pu être envoyé. Erreur: {$mail->ErrorInfo}");
    }
}
?>
