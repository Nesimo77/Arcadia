<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arcadia - parc zoologique</title>
    <link rel="stylesheet" href="src/style.css">
</head>
<body class="body-class">
<?php 
    $currentPage = basename($_SERVER['PHP_SELF']);
    require 'src/navbar.html' 
    ?>

    <div class="container mt-10">
            <div class="row">
                <div class="col"></div>
                <div class="col-12">
                <div class="contact border border-black ">
                    <div class="mb-3 ">
                        <label for="email" class="form-label">Adresse email</label>
                        <input type="email" class="form-control" id="email" placeholder="nom@exemple.com" require>
                    </div>
                    <div class="mb-3 ">
                        <label for="object" class="form-label">Objet</label>
                        <input type="email" class="form-control" id="object" placeholder="J'ai aimé ma visite" require>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Votre message</label>
                        <textarea class="form-control" id="message" rows="3"></textarea require>
                    </div>
                    <div class="contactBtn">
                        <button class="btn"type="delete">Effacer</button>
                        <button class="btn"type="submit">Envoyer</button>
                    </div>
                
                </div>
                
                <div class="col"></div>
            </div>
        </div>
    
    </div>
    
    
    
</body>
</html>