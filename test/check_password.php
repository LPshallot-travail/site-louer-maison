<?php
include '../includes/session.php'; // Inclusion de session.php

$secretPassword = "Jean3v16"; // Définir le mot de passe secret
$errorMessage = ""; // Variable pour stocker le message d'erreur
$userInput = ""; // Variable pour stocker l'entrée de l'utilisateur

// Vérifie si la session a déjà été vérifiée
if ($session->has('secret_verified') && $session->get('secret_verified')) {
    header("Location: signup.php"); // Redirige vers signup.php si déjà vérifié
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userInput = $_POST['secret_password']; // Stocker la saisie utilisateur

    if ($userInput === $secretPassword) {
        $session->set('secret_verified', true); // Créer la session si le mot de passe est correct
        header("Location: signup.php");
        exit();
    } else {
        // Afficher un message d'erreur
        $errorMessage = "Mot de passe incorrect.<br>Vous avez entré : " . htmlspecialchars($userInput); // Protéger contre XSS
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
        <input type="password" name="secret_password" value="<?php echo htmlspecialchars($userInput); ?>" required>
        <button type="submit">Valider</button>
        <?php if ($errorMessage): ?>
            <p style='color: red;'><?php echo $errorMessage; ?></p>
        <?php endif; ?>
    </form>
</body>
</html>
