<?php
$uploadDir = './img/carousel'; // Répertoire de stockage des images

if(isset($_FILES['file'])) {
    $fileNames = array();
    foreach($_FILES['file']['tmp_name'] as $key => $tmp_name) {
        $fileName = $_FILES['file']['name'][$key];
        $fileTmp = $_FILES['file']['tmp_name'][$key];
        $fileType = $_FILES['file']['type'][$key];

        // Vérifiez si le fichier est une image
        if (strpos($fileType, 'image') !== false) {
            // Déplacez le fichier téléchargé vers le répertoire de stockage
            if(move_uploaded_file($fileTmp, $uploadDir . $fileName)) {
                $fileNames[] = $fileName;
            }
        }
    }
    // Afficher les noms des fichiers téléchargés
    echo "Les fichiers suivants ont été téléchargés avec succès : <br>";
    foreach($fileNames as $name) {
        echo $name . "<br>";
    }
}
?>
