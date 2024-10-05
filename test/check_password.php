<?php
// Vérification du mot de passe à la première connexion
include 'session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['password'] === 'Jean3v16') {
        $_SESSION['first_time_login'] = true;
        header("Location: signup.html");
        exit();
    } else {
        echo "Mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification du Mot de Passe</title>
</head>
<body>
    <form action="" method="POST">
        <label for="password">Entrez le mot de passe :</label>
        <input type="password" name="password" required>
        <button type="submit">Vérifier</button>
    </form>
</body>
</html>
