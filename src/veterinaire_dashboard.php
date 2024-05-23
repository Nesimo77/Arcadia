<?php
session_start();

// Vérifier si l'utilisateur est connecté et est un vétérinaire
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'veterinaire') {
    header("Location: login.php"); // Rediriger vers la page de connexion si non autorisé
    exit();
}

// Connexion à la base de données
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "arcadia_bdd";

// Création de la connexion
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Récupération de la liste des animaux
$sql_animaux = "SELECT * FROM animaux";
$result_animaux = $conn->query($sql_animaux);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Vétérinaire</title>
    <!-- Styles Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
        .table {
            margin-top: 20px;
            max-height: 400px;
            overflow-y: scroll;
        }
        .modal-content {
            max-width: 700px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenue, <?php echo $_SESSION['username']; ?></h1>
        <h2>Dashboard Vétérinaire</h2>
        <div class="form-group">
            <input type="text" id="searchInput" class="form-control" placeholder="Rechercher un animal...">
        </div>
        <h3>Liste des Animaux</h3>
        <table class="table table-striped" id="animalTable">
            <thead>
                <tr>
                    <th>Race</th>
                    <th>Nom Scientifique</th>
                    <th>Prénom</th>
                    <th>Enclos</th>
                    <th>Détails</th>
                    <th>Dernière Visite Vétérinaire</th>
                    <th>Détails Vétérinaire</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_animaux->num_rows > 0) {
                    while($row = $result_animaux->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["race"] . "</td>";
                        echo "<td>" . $row["nom_scientifique"] . "</td>";
                        echo "<td>" . $row["prenom"] . "</td>";
                        echo "<td>" . $row["enclos"] . "</td>";
                        echo "<td>" . $row["details"] . "</td>";
                        echo "<td>" . $row["derniere_visite_veto"] . "</td>";
                        echo "<td>" . $row["details_veto"] . "</td>";
                        echo "<td><button class='btn btn-primary' data-toggle='modal' data-target='#editModal' data-id='" . $row["id"] . "'>Modifier</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Aucun animal trouvé</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal de modification -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Modifier les Informations de l'Animal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" id="editId" name="id">
                        <div class="form-group">
                            <label for="editRace">Race:</label>
                            <input type="text" id="editRace" name="race" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="editNomScientifique">Nom Scientifique:</label>
                            <input type="text" id="editNomScientifique" name="nom_scientifique" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="editPrenom">Prénom:</label>
                            <input type="text" id="editPrenom" name="prenom" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="editEnclos">Enclos:</label>
                            <input type="text" id="editEnclos" name="enclos" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="editDetails">Détails:</label>
                            <textarea id="editDetails" name="details" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editDerniereVisite">Dernière Visite Vétérinaire:</label>
                            <input type="date" id="editDerniereVisite" name="derniere_visite_veto" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="editDetailsVeto">Détails Vétérinaire:</label>
                            <textarea id="editDetailsVeto" name="details_veto" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#editModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');

                $.ajax({
                    url: 'get_animal.php',
                    type: 'POST',
                    data: { id: id },
                    dataType: 'json',
                    success: function(response) {
                        $('#editId').val(response.id);
                        $('#editRace').val(response.race);
                        $('#editNomScientifique').val(response.nom_scientifique);
                        $('#editPrenom').val(response.prenom);
                        $('#editEnclos').val(response.enclos);
                        $('#editDetails').val(response.details);
                        $('#editDerniereVisite').val(response.derniere_visite_veto);
                        $('#editDetailsVeto').val(response.details_veto);
                    }
                });
            });

            $('#editForm').on('submit', function(event) {
                event.preventDefault();

                $.ajax({
                    url: 'update_animal.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            location.reload();
                        } else {
                            alert('Erreur lors de la mise à jour.');
                        }
                    }
                });
            });

            // Charger les animaux initiaux
            loadAnimals();

            // Détecter les changements dans le champ de recherche
            $('#searchInput').on('input', function() {
                var searchQuery = $(this).val().toLowerCase();
                filterAnimals(searchQuery);
            });
        });

        function loadAnimals() {
            $.ajax({
                url: 'get_all_animals.php',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    displayAnimals(response);
                },
                error: function(xhr, status, error) {
                    console.error("Erreur lors du chargement des animaux:", error);
                }
            });
        }

        function displayAnimals(animals) {
            var animalTable = $('#animalTable tbody');
            animalTable.empty();

            if (Array.isArray(animals)) {
                if (animals.length > 0) {
                    animals.forEach(function(animal) {
                        var row = "<tr>";
                        row += "<td>" + animal.race + "</td>";
                        row += "<td>" + animal.nom_scientifique + "</td>";
                        row += "<td>" + animal.prenom + "</td>";
                        row += "<td>" + animal.enclos + "</td>";
                        row += "<td>" + animal.details + "</td>";
                        row += "<td>" + animal.derniere_visite_veto + "</td>";
                        row += "<td>" + animal.details_veto + "</td>";
                        row += "<td><button class='btn btn-primary' data-toggle='modal' data-target='#editModal' data-id='" + animal.id + "'>Modifier</button></td>";
                        row += "</tr>";
                        animalTable.append(row);
                    });
                } else {
                    animalTable.append("<tr><td colspan='8'>Aucun animal trouvé</td></tr>");
                }
            } else {
                console.error("La réponse n'est pas un tableau d'animaux.");
            }
        }

        function filterAnimals(query) {
            $.ajax({
                url: 'search_animals.php',
                type: 'GET',
                data: { query: query },
                dataType: 'json',
                success: function(response) {
                    displayAnimals(response);
                },
                error: function(xhr, status, error) {
                    console.error("Erreur lors de la recherche d'animaux:", error);
                }
            });
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>
