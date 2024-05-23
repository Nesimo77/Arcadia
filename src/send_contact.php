<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Destinataire de l'email
    $to = "arcadia.zoo.info@gmail.com";

    // Sujet de l'email
    $email_subject = "Nouveau message de contact: $subject";

    // Corps de l'email
    $email_body = "Vous avez reçu un nouveau message de contact.\n\n".
                  "Nom: $name\n".
                  "Email: $email\n\n".
                  "Message:\n$message";

    // En-têtes de l'email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envoi de l'email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Message envoyé avec succès.";
    } else {
        echo "Échec de l'envoi du message.";
    }
}
?>
