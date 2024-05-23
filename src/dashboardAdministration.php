<!doctype html>
<html lang="fr">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
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
            // Inclure le fichier de configuration
            include 'config.php';

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
              while ($row = $result->fetch_assoc()) {
                echo '<div class="form-group">';
                echo '<label for="' . $row['jour'] . '">' . $row['jour'] . '</label>';
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
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInformation" aria-expanded="false" aria-controls="collapseInformation">
          Modifier Information (page d'accueil)
        </button>
      </h2>
      <div id="collapseInformation" class="accordion-collapse collapse" data-bs-parent="#accordionAdmin">
        <div class="accordion-body container">
          <form action="updateInformation.php" method="post">
            <?php
            // Inclure le fichier de configuration
            include 'config.php';

            // Création de la connexion
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Vérification de la connexion
            if ($conn->connect_error) {
              die("La connexion a échoué: " . $conn->connect_error);
            }

            // Sélectionnez les informations actuelles depuis la base de données
            $sql = "SELECT content FROM informations WHERE type='information'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              echo '<div class="form-group">';
              echo '<label for="information">Information</label>';
              echo '<textarea class="form-control" id="information" name="information" rows="5">' . $row['content'] . '</textarea>';
              echo '</div>';
            } else {
              echo "Aucune information trouvée";
            }

            $conn->close();
            ?>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Nouveauté Section -->
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNouvelle" aria-expanded="false" aria-controls="collapseNouvelle">
          Modifier Nouveauté
        </button>
      </h2>
      <div id="collapseNouvelle" class="accordion-collapse collapse" data-bs-parent="#accordionAdmin">
        <div class="accordion-body container">
          <form action="updateNouvelle.php" method="post">
            <?php
            // Inclure le fichier de configuration
            include 'config.php';

            // Création de la connexion
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Vérification de la connexion
            if ($conn->connect_error) {
              die("La connexion a échoué: " . $conn->connect_error);
            }

            // Sélectionnez les nouveautés actuelles depuis la base de données
            $sql = "SELECT content FROM informations WHERE type='nouveaute'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              echo '<div class="form-group">';
              echo '<label for="nouveaute">Nouveauté</label>';
              echo '<textarea class="form-control" id="nouveaute" name="nouveaute" rows="5">' . $row['content'] . '</textarea>';
              echo '</div>';
            } else {
              echo "Aucune nouveauté trouvée";
            }

            $conn->close();
            ?>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
          </form>
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


  </div>



  <h2> Gestion des services</h2>

  <h3>Ajouter un service</h3>
  <form action="add_service.php" method="post">
    <div class="mb-3">
      <label for="nom" class="form-label">Nom du service</label>
      <input type="text" class="form-control" id="nom" name="nom" required>
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
  </form>

  <h3>Liste des services</h3>
  <?php
  include 'config.php';
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
  }
  $sql = "SELECT id, nom, description FROM services";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    echo '<table class="table">';
    echo '<thead><tr><th>Nom</th><th>Description</th><th>Actions</th></tr></thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
      echo '<tr>';
      echo '<td>' . htmlspecialchars($row['nom']) . '</td>';
      echo '<td>' . nl2br(htmlspecialchars($row['description'])) . '</td>';
      echo '<td>
        <form action="delete_service.php" method="post" style="display:inline-block;">
        <input type="hidden" name="id" value="' . $row['id'] . '">
        <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
        </td>';
      echo '</tr>';
    }
    echo '</tbody></table>';
  } else {
    echo '<p>Aucun service trouvé.</p>';
  }
  $conn->close();
  ?>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>