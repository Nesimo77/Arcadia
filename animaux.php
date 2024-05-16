<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arcadia - parc zoologique</title>
    <!-- Inclusion de votre fichier CSS -->
    <link rel="stylesheet" href="src/style.css">
    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />
</head>
<body class="body-class">
    <!-- Intégration de la navbar -->
    <?php 
    $currentPage = basename($_SERVER['PHP_SELF']);
    require 'src/navbar.html'; 
    ?>

<div class="container-map mt-8">
        <div class="row">
            <!-- Image avec une map pour le plan du zoo -->
            <img src="img/map_zoo.jpg" usemap="#image-map">
            <map name="image-map">
                <!-- Les coordonnées de la map vont ici -->
            </map>
        </div>
    </div>

    <div class="container mt-4">
        <!-- Boutons d'enclos -->
        <div class="containerHabitants container px-4 text-center mt-4">
            <div class="d-flex flex-wrap justify-content-center">
                <div class="p-3">
                    <button class="btnEnclos" type="button" data-enclos="aquarium">Aquarium</button>
                </div>
                <div class="p-3">
                    <button class="btnEnclos" type="button" data-enclos="banquise">Banquise</button>
                </div>
                <div class="p-3">
                <button class="btnEnclos" type="button" data-enclos='savane'>Savane</button>
                </div>
                <div class="p-3">
                    <button class="btnEnclos" type="button" data-enclos='jungle'>Jungle</button>
                </div>
                <div class="p-3">
                    <button class="btnEnclos" type="button" data-enclos='voliere'>Voliere</button>
                </div>
                <div class="p-3">
                    <button class="btnEnclos" type="button" data-enclos='rongeur'>Rongeurs</button>
                </div>
                <div class="p-3">
                    <button class="btnEnclos" type="button" data-enclos='ferme'>Ferme</button>
                </div>
                <div class="p-3">
                    <button class="btnEnclos" type="button" data-enclos='nocturne'>Nocturne</button>
                </div>
                <!-- Ajoutez d'autres boutons enclos ici -->
            </div>
        </div>

        <!-- Conteneur pour afficher les animaux -->
        <div id="listeAnimaux" class="mt-4"></div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="animalModal" tabindex="-1" role="dialog" aria-labelledby="animalModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="animalModalLabel">Détails de l'animal</h5>
                    
                </div>
                <div class="modal-body" id="animalDetails">
                    <!-- Les détails de l'animal seront chargés ici -->
                </div>
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery, Popper.js, and Bootstrap JS -->
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btnEnclos').click(function() {
                var enclos = $(this).data('enclos');
                $.get('get_animaux.php', { enclos: enclos }, function(data) {
                    $('#listeAnimaux').html(data);
                });
            });

            $(document).on('click', '.voir-plus', function() {
                var animalId = $(this).data('id');
                $.get('get_animal_details.php', { id: animalId }, function(data) {
                    $('#animalDetails').html(data);
                    $('#animalModal').modal('show');
                });
            });
            $('#animalModal').on('hidden.bs.modal', function () {
                $('#animalDetails').html('');
            });
            $(document).on('click', '#like-button', function() {
                var animalId = $(this).data('id');
                $.post('like_animal.php', { id: animalId }, function(newInterest) {
                    $('#interest-' + animalId).text(newInterest);
                });
            });
        });
    </script>
</body>
</html>
