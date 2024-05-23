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
    

            <!-- Modération des commentaires -->
            <div class="container">
            <h2>Modération des commentaires</h2>   
                    
                
              
                    <?php
                    include 'config.php';
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("La connexion a échoué: " . $conn->connect_error);
                    }
                    $sql = "SELECT id, nom, commentaire, date, approuve FROM commentaires ORDER BY date DESC";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo '<form action="manage_comments.php" method="post">';
                        echo '<table class="table">';
                        echo '<thead><tr><th>Nom</th><th>Commentaire</th><th>Date</th><th>Approuver</th><th>Supprimer</th></tr></thead>';
                        echo '<tbody>';
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($row['nom']) . '</td>';
                            echo '<td>' . nl2br(htmlspecialchars($row['commentaire'])) . '</td>';
                            echo '<td>' . $row['date'] . '</td>';
                            echo '<td><input type="checkbox" name="approve[]" value="' . $row['id'] . '"' . ($row['approuve'] ? ' checked' : '') . '></td>';
                            echo '<td><input type="checkbox" name="delete[]" value="' . $row['id'] . '"></td>';
                            echo '</tr>';
                        }
                        echo '</tbody></table>';
                        echo '<button type="submit" class="btn btn-primary">Mettre à jour les commentaires sélectionnés</button>';
                        echo '</form>';
                    } else {
                        echo '<p>Aucun commentaire trouvé.</p>';
                    }
                    $conn->close();
                    ?>

            </div>
                
                    
                     
                    
            
      

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </body>
</html>
