<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Arcadia Zoo</title>
    <link rel="stylesheet" href="src/admin.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Connexion</h2>
        <form id="loginForm">
            <div class="form-group">
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
        <div id="responseMessage"></div>
    </div>

    <script>
        $(document).ready(function() {
            $("#loginForm").on("submit", function(event) {
                event.preventDefault();

                var username = $("#username").val();
                var password = $("#password").val();

                $.ajax({
                    url: "src/pdo.php",
                    type: "POST",
                    data: {
                        username: username,
                        password: password
                    },
                    success: function(response) {
                        if (response.success) {
                            if (response.role === 'admin') {
                                window.location.href = "src/dashboard.php";
                            } else if (response.role === 'employe') {
                                window.location.href = "src/employe_dashboard.php";
                            } else if (response.role === 'veterinaire') {
                                window.location.href = "src/veterinaire_dashboard.php";
                            } else {
                                $("#responseMessage").html("<div class='alert alert-danger'>Rôle non reconnu.</div>");
                            }
                        } else {
                            $("#responseMessage").html("<div class='alert alert-danger'>" + response.message + "</div>");
                        }
                    },
                    error: function() {
                        $("#responseMessage").html("<div class='alert alert-danger'>Erreur lors de la connexion.</div>");
                    }
                });
            });
        });
    </script>
</body>
</html>
