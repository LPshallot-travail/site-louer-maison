<?php
session_start();

// Vérifiez si l'utilisateur est déjà connecté
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Rediriger vers la page principale si connecté
    header("Location: http://localhost/test-location-maison/test/");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Bienvenue sur notre site de location de maisons</h1>
    <p>Veuillez choisir une option :</p>
    <ul>
        <li><a href="login.html">Se connecter</a></li>
        <li><a href="check_password.php">Créer un compte</a></li>
    </ul>
</body>
</html>
