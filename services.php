<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arcadia - parc zoologique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="src/style.css">
</head>
<body class="body-class">
<?php 
    $currentPage = basename($_SERVER['PHP_SELF']);
    require 'src/navbar.html'; 
    ?>

    <div class="container mt-5">
        <h1 class="mb-4">Nos Services</h1>
        <?php
        include 'src/config.php';

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("La connexion a échoué: " . $conn->connect_error);
        }

        $sql = "SELECT nom, description FROM services";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="service mb-4">';
                echo '<h2>' . htmlspecialchars($row['nom']) . '</h2>';
                echo '<p>' . nl2br(htmlspecialchars($row['description'])) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>Aucun service disponible pour le moment.</p>';
        }

        $conn->close();
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>