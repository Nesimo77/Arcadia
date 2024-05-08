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

// Si le formulaire est soumis, mettre à jour les horaires
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['horaires'])) {
    // Préparez une déclaration de mise à jour
    $stmt = $conn->prepare("UPDATE horaires SET horaire = ? WHERE jour = ?");

    // Lie les paramètres
    $stmt->bind_param("ss", $horaire, $jour);

    // Boucle sur les horaires soumis
    foreach ($_POST['horaires'] as $jour => $horaire) {
        // Exécutez la déclaration de mise à jour
        $stmt->execute();
    }

    // Ferme la déclaration
    $stmt->close();
}
?>

<h2>Modifier les horaires</h2>
<form id="horaires-form" method="post">
    <?php
    // Sélectionnez les horaires actuels depuis la base de données
    $sql = "SELECT jour, horaire FROM horaires";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Afficher un formulaire pour modifier les horaires
        while($row = $result->fetch_assoc()) {
            echo '<div class="form-group row">';
            echo '<label class="col-sm-2 col-form-label">' . $row['jour'] . '</label>';
            echo '<div class="col-sm-10">';
            //echo '<input type="text" class="form-control" name="horaires[' . $row['jour'] . ']" value="' . $row['horaire'] . '">';
            echo '<label class="col-sm-2 col-form-label">' . $row['horaire'] . '</label>';
            echo '</div>';
            echo '</div>';
        }
        
    } else {
        echo "Aucun résultat trouvé";
    }

    // Ferme la connexion à la base de données
    $conn->close();
    ?>
</form>


