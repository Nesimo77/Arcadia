<!-- Script pour effectuer une requête AJAX lors du clic sur un bouton d'enclos -->
    <script>
        function getAnimaux(enclos) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("listeAnimaux").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "get_animaux.php?enclos=" + enclos, true);
            xhttp.send();
        }

                // Récupérer tous les boutons "Voir plus"
        var voirPlusButtons = document.querySelectorAll('.voir-plus');

        // Ajouter un gestionnaire d'événement à chaque bouton
        voirPlusButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Récupérer l'identifiant de l'animal à partir de l'attribut data-id
                var animalId = this.getAttribute('data-id');

                // Faire une requête AJAX pour récupérer les détails de l'animal
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Afficher les détails de l'animal dans la fenêtre modale
                        document.getElementById('modal-content').innerHTML = xhr.responseText;
                        document.getElementById('myModal').style.display = 'block';
                    }
                };
                xhr.open('GET', 'get_animal_details.php?id=' + animalId, true);
                xhr.send();
            });
        });

        // Fermer la fenêtre modale lorsque l'utilisateur clique sur le bouton de fermeture
        document.querySelector('.close').addEventListener('click', function() {
            document.getElementById('myModal').style.display = 'none';
        });

    </script>