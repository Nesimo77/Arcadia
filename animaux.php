<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arcadia - parc zoologique</title>

    <!-- Inclusion de votre fichier CSS -->
    <link rel="stylesheet" href="src/style.css">
</head>
<body class="body-class">
    <!-- Intégration de la navbar -->
    <?php 
    $currentPage = basename($_SERVER['PHP_SELF']);
    require 'src/navbar.html' 
    ?>

    <div class="container">
        <div class="row">
            <!-- Image avec une map pour le plan du zoo -->
            <img src="img/map_zoo.jpg" usemap="#image-map">
            <map name="image-map">
                <!-- Les coordonnées de la map vont ici -->
            </map>

            <!-- Boutons d'enclos -->
            <div class="boutonEnclos container px-4 text-center mt-4">
                <div class="d-flex flex-wrap justify-content-center">
                    <div class="p-3">
                        <button class="btnEnclos" type="submit"><img class="btnEnclos" src="img\btn\btnAquarium.jpg"></button>
                    </div>
                    <div class="p-3">
                        <button class="btnEnclos" type="submit"><img class="btnEnclos" src="img\btn\btnBanquise.jpg"></button>
                    </div>
                    <div class="p-3">
                        <button class="btnEnclos" type="submit"><img class="btnEnclos" src="img\btn\btnFerme.jpg"></button>
                    </div>
                    <div class="p-3">
                        <button class="btnEnclos" type="submit"><img class="btnEnclos" src="img\btn\btnJungle.jpg"></button>
                    </div>
                    <div class="p-3">
                        <button class="btnEnclos" type="submit"><img class="btnEnclos" src="img\btn\btnNocturne.jpg"></button>
                    </div>
                    <div class="p-3">
                        <button class="btnEnclos" type="submit"><img class="btnEnclos" src="img\btn\btnRongeurs.jpg"></button>
                    </div>
                    <div class="p-3">
                        <button class="btnEnclos" type="submit"><img class="btnEnclos" src="img\btn\btnSavane.jpg"></button>
                    </div>
                    <div class="p-3">
                        <button class="btnEnclos" type="submit"><img class="btnEnclos" src="img\btn\btnVolière.jpg"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
