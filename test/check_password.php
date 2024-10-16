<?php
session_start();

$secretPassword = "test";  // Définir le mot de passe secret

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Utilisation de var_dump() pour déboguer la valeur reçue
    var_dump($_POST['secret_password']);  // Affiche la valeur saisie dans le formulaire

    if ($_POST['secret_password'] === $secretPassword) {
        $_SESSION['secret_verified'] = true;
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
    <title>Vérification du mot de passe secret</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <form action="" method="POST">
        <label for="secret_password">Entrez le mot de passe secret :</label>
        <input type="password" name="secret_password" required>
        <button type="submit">Vérifier</button>
    </form>
</body>
</html>
