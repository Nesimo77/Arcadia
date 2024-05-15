<!doctype html>
<html lang="fr">
<head>
    <title>Arcadia - parc zoologique</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />
    
    
    <link rel="stylesheet" href="src/style.css">
    
</head>

<body class="body-class">
    
    <!-- Intégration de la navbar -->
    <?php 
    $currentPage = basename($_SERVER['PHP_SELF']);
    require 'src/navbar.html' 
    ?>

    <div class="container-fluid ">

        <img src="img/imgHome.png" class="img-fluid" alt="...">

    </div>

    <!-- Placeholder pour le contenu -->
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Massa enim nec dui nunc mattis. Molestie at elementum eu facilisis sed odio morbi. Mi eget mauris pharetra et ultrices neque ornare aenean euismod. Sollicitudin tempor id eu nisl nunc mi.</p>
    <!-- Placeholder de démonstration -->
    vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv


    <p>ddd</p>

    <!-- Conteneur Bootstrap pour le carousel -->
    <!--Code du carousel-->
<div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/carousel/lions.jpg" class="d-block w-100 h-50 img-fluid carousel-image" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Nos lions</h5>
                <p>Moufassa à gauche et Simba à droite.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/carousel/zebra.jpg" class="d-block w-100 h-50 img-fluid carousel-image" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Nos Zèbres</h5>
                <p>Figurant dans le dernier film de Charlie Chaplin</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/carousel/fox.jpg" class="d-block w-100 h-50 img-fluid carousel-image" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Nos renards</h5>
                <p>On a retrouvé Roukie</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


    <!-- Conteneur Bootstrap pour les informations -->
    <div class="container text-center border">
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
            <!-- Placeholder pour les horaires -->
            <div class="p-2">
                <?php require 'src/horaires.php' ?>
            </div>
            <!-- Placeholder pour les informations -->
            <div class="p-2">
                <h2>Information :</h2>

                <p> Créer une base de donnée pour afficher les infos modifiable depuis le panel admin</p>
            </div>
        </div>

        Nouveauté :
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
