<!doctype html>
<html lang="fr">
    <head>
        <title>Arcadia - parc zoologique</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        
        <link rel="stylesheet" href="src/home.css">
    </head>

    <body>
        
        <!-- Intégration de la navbar -->
        <?php require 'src/navbar.html' ?>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Massa enim nec dui nunc mattis. Molestie at elementum eu facilisis sed odio morbi. Mi eget mauris pharetra et ultrices neque ornare aenean euismod. Sollicitudin tempor id eu nisl nunc mi.</p>
        

        <div class="container">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-12">
                <?php require 'src/carousel.html' ?>
                </div>
                
                <div class="col-1"></div>
            </div>
            <div>
            <?php require 'src/horaires.php' ?>
            </div>
        </div>

        
    
        
        
        
        <!-- Bootstrap JavaScript Libraries -->
        <script 
        
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
