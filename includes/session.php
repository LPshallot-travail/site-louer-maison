<?php
session_start();

// Redirige l'utilisateur non connecté vers la page de connexion
if (!isset($_SESSION['user_id']) && basename($_SERVER['PHP_SELF']) !== 'login.php' && basename($_SERVER['PHP_SELF']) !== 'signup.html' && basename($_SERVER['PHP_SELF']) !== 'check_password.php') {
    header("Location: login.html");
    exit();
}

// Déconnexion après 60 minutes d'inactivité
$sessionTimeout = 3600;  // 60 minutes
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $sessionTimeout)) {
    session_unset();
    session_destroy();
    header("Location: login.html");
    exit();
}

// Met à jour l'activité de la session
$_SESSION['LAST_ACTIVITY'] = time();
?>
