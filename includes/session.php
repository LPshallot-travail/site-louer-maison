<?php
// Démarre une session
session_start();

// Durée de la session en secondes (par exemple, 30 minutes)
$sessionDuration = 1800; // 30 minutes

// Vérifie si la session est déjà définie
if (isset($_SESSION['LAST_ACTIVITY'])) {
    // Si la durée d'inactivité dépasse la durée de session définie, déconnecte l'utilisateur
    if (time() - $_SESSION['LAST_ACTIVITY'] > $sessionDuration) {
        session_unset();     // Libère toutes les variables de session
        session_destroy();   // Détruit la session
        header("Location: login.html"); // Redirige vers la page de connexion
        exit();
    }
}

// Met à jour la dernière activité
$_SESSION['LAST_ACTIVITY'] = time();
?>
