

<!doctype html>
<html lang="fr">
    <head>
        
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
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        
<div class="accordion" id="accordionAdmin">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
       Modifier les horaires :
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionAdmin">
      <div class="accordion-body container">

        <!-- Modification des horaires -->

        <form action="updateHoraires.php" method="post">
            <?php
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

            // Sélectionnez les horaires actuels depuis la base de données
            $sql = "SELECT jour, horaire FROM horaires";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Afficher un formulaire pour modifier les horaires
                while($row = $result->fetch_assoc()) {
                    echo '<div class="form-group">';
                    echo '<label for="' . $row['jour'] . '">' . $row['jour'] . '</label>' ;
                    echo '<input type="text" class="form-control" id="' . $row['jour'] . '" name="horaires[' . $row['jour'] . ']" value="' . $row['horaire'] . '">';
                    echo '</div>';
                }
                echo '<button type="submit" class="btn btn-primary">Enregistrer</button>';
            } else {
                echo "Aucun résultat trouvé";
            }

            // Ferme la connexion à la base de données
            $conn->close();
            ?>
        </form>
            
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        Information (page d'accueil)
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionAdmin">
      <div class="accordion-body">
        tttt
            <!-- Information de la page d'accueil -->

      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
        Restauration
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionAdmin">
      <div class="accordion-body">
        tttt
        <!-- Restauration -->
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCarousel" aria-expanded="true" aria-controls="collapseCarousel">
        Carousel d'accueil
      </button>
    </h2>
    <div id="collapseCarousel" class="accordion-collapse collapse" data-bs-parent="#accordionAdmin">
      <div class="accordion-body">
        Télécharger une image:
        <!-- Carousel -->
        <form action="uploadImgCarousel.php" method="post" enctype="multipart/form-data">
          <input type="file" name="file[]" multiple accept="image/*">
          <button type="submit">Upload</button>
        </form>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
        Visite accompagné
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionAdmin">
      <div class="accordion-body">
        ttt
        <!-- Visite avec un guide -->
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
        Petit train
      </button>
    </h2>
    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionAdmin">
      <div class="accordion-body">
        tttt
        <!-- Gestion du petit train -->
      </div>
    </div>
  </div>
</div>

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




