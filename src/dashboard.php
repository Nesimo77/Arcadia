<?php
session_start(); // Démarre la session

// Vérifie si l'utilisateur est connecté en vérifiant si la variable de session existe
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    
} else {
    // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: /");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- CSS Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Votre propre CSS -->
    <link href="dashboard.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Barre latérale gauche -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" onclick="loadContent('dashboardHome.php')">
                                Tableau de bord <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadContent('dashboardEmploy.php')">
                                Employer
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadContent('dashboardAdministration.php')">
                                Administration
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadContent('dashboardAnimaux.php')">
                                Animaux
                            </a>
                        </li>

                        <!-- Ajoutez d'autres éléments de menu ici -->
                    </ul>
                </div>
            </nav>

            <!-- Contenu principal -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Tableau de bord</h1>
                </div>
                <!-- Contenu du tableau de bord -->
                <div id="main-content" class="main-content">
                    <?php echo 'Vous etes actuellement connecter en tant que: ' .$username ; ?>
                </div>
                
                
            </main>
        </div>
    </div>

    <!-- JavaScript Bootstrap (nécessaire pour certains composants Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="dashboard.js"></script>
</body>
</html>
