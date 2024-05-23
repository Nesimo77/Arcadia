<!doctype html>
<html lang="fr">

<head>
    <title>Arcadia - parc zoologique</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />


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
    <div class="container">
        <h3>Arcadia - Parc zoologique écologique</h3>
        <p>Arcadia est un parc zoologique, un endroit magique où des animaux du monde entier se sont donné rendez-vous.
            Ouvert depuis 1896, le zoo d'Arcadia a été un des premiers
            parcs zoologiques de France et d'Europe. Son histoire fût jalonnée d'événements et d'avancées technologiques lui permettant de toujours coller
            aux attentes des visiteurs. Aujourd'hui, le zoo d'Arcadia est un parc zoologique moderne, qui s'engage pour la protection de la biodiversité et la préservation des espèces menacées. Notre mission est de sensibiliser le public à la protection de la faune et de la flore, tout en offrant un lieu de détente et de découverte pour tous.
            Notre équipe de passionnés s'engage chaque jour pour offrir aux animaux un environnement adapté à leurs besoins et pour garantir la sécurité de nos visiteurs. Nous sommes fiers de notre parc et de notre mission, et nous espérons vous accueillir bientôt pour une visite inoubliable!</p>




    </div>


    <!-- Conteneur Bootstrap pour le carousel -->
    <!--Code du carousel-->
    <div id="carouselExampleCaptions" class="carousel slide mx-auto w-75">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/carousel/lions.jpg" class=" w-100 h-50 img-fluid carousel-image" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Nos lions</h5>
                    <p>Moufassa à gauche et Simba à droite.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/carousel/zebra.jpg" class=" w-100 h-50 img-fluid carousel-image" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Nos Zèbres</h5>
                    <p>Figurant dans le dernier film de Charlie Chaplin</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/carousel/fox.jpg" class=" w-100 h-50 img-fluid carousel-image" alt="...">
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
    <div class="container-fluid container-infoHome text-center border mt-4 ">
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
            <!-- Placeholder pour les horaires -->
            <div class="col-md-5 mb-4">
                <?php require 'src/horaires.php' ?>
            </div>
            <!-- Placeholder pour les informations -->
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Information:</h2>
                        <?php
                        include 'src/config.php';
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("La connexion a échoué: " . $conn->connect_error);
                        }

                        $sql = "SELECT content FROM informations WHERE type='information'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo '<p>' . $row['content'] . '</p>';
                        } else {
                            echo "<p>Aucune information disponible.</p>";
                        }

                        $conn->close();
                        ?>
                    </div>

                    <div class="col-md-6">
                        <h2>Nouveauté:</h2>
                        <?php
                        include 'src/config.php';
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("La connexion a échoué: " . $conn->connect_error);
                        }

                        $sql = "SELECT content FROM informations WHERE type='nouveaute'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo '<p>' . $row['content'] . '</p>';
                        } else {
                            echo "<p>Aucune nouveauté disponible.</p>";
                        }

                        $conn->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- Formulaire de commentaire -->
            <h2>Laissez un commentaire</h2>
            <form action="src/submit_comment.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Commentaire</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>

            <!-- Affichage des commentaires approuvés -->
            <h2>Commentaires</h2>
            <?php
            include 'src/config.php';
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("La connexion a échoué: " . $conn->connect_error);
            }

            $sql = "SELECT nom, commentaire, date FROM commentaires WHERE approuve = 1 ORDER BY date DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="comment">';
                    echo '<h5>' . htmlspecialchars($row['nom']) . ' <small>' . $row['date'] . '</small></h5>';
                    echo '<p>' . nl2br(htmlspecialchars($row['commentaire'])) . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>Aucun commentaire pour le moment.</p>';
            }

            $conn->close();
            ?>
        </div>







        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>