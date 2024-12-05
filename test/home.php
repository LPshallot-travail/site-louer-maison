<?php
include '../includes/session.php'; // Inclusion de session.php

// Récupérer les sessions actives
$activeSessions = getActiveSessions($session);
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
    
    <!-- Lien pour supprimer la session du mot de passe secret -->
    <a href="?action=clear_secret">Supprimer la session du mot de passe secret</a>
    
    <!-- Lien pour supprimer la session utilisateur -->
    <a href="?action=remove_user_session">Supprimer la session utilisateur</a>
    
    <h2>Sessions actives :</h2>
    <ul>
        <?php if (!empty($activeSessions)): ?>
            <?php foreach ($activeSessions as $key => $value): ?>
                <li><strong><?= htmlspecialchars($key) ?> :</strong> <?= htmlspecialchars($value) ?></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Aucune session active</li>
        <?php endif; ?>
    </ul>
</body>
</html>
