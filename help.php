<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- Ajouter un utilisateur a la bdd -->
    <form method="post" action="addUser.php">
        <p>
            <label>user:</label>
            <input type="text" name="user">
        </p>
        <p>
            <label>Password:</label>
            <input type="password" name="password">
        </p>
        <p>
            <button name="submit">Validez</button>
        </p>
        

        <?php require 'src/pdo.php' ?>
    </form>
    
</body>
</html>