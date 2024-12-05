<?php
require_once '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;

$sessionStorage = new NativeSessionStorage();
$session = new Session($sessionStorage);
$session->start();

// Fonction pour afficher les sessions actives
function getActiveSessions($session) {
    $activeSessions = [];
    if ($session->has('user_id')) {
        $activeSessions['user_id'] = $session->get('user_id');
    }
    if ($session->has('secret_verified')) {
        $activeSessions['secret_verified'] = $session->get('secret_verified');
    }
    return $activeSessions;
}

// Si la session "user_id" est définie, rediriger vers index.html (uniquement à la création)
if ($session->has('user_id') && !isset($_SESSION['redirected'])) {
    $_SESSION['redirected'] = true; // Marque que la redirection a eu lieu
    header("Location: ../index.html");
    exit();
}

// Gestion de la session utilisateur (connexion)
if ($session->has('user_id')) {
    $currentFile = basename($_SERVER['PHP_SELF']);

    // Message si sur une page publique
    if (in_array($currentFile, ['signup.php', 'login.html'])) {
        echo "<p>Vous êtes connecté. Accédez à vos pages principales.</p>";
    }
}

// Supprimer la session `user_id` et réinitialiser le timer si demandé
if (isset($_GET['action']) && $_GET['action'] === 'remove_user_session') {
    if ($session->has('user_id')) {
        $session->remove('user_id'); // Supprime la session user_id
        $session->set('LAST_ACTIVITY', time()); // Réinitialise le timer
        echo "<p>La session utilisateur a été supprimée et le timer a été réinitialisé.</p>";
    }
}

// Vérification d'inactivité
$sessionTimeout = 1209600; // 2 semaines
if ($session->has('LAST_ACTIVITY')) {
    if (time() - $session->get('LAST_ACTIVITY') > $sessionTimeout) {
        if ($session->has('user_id')) {
            $session->remove('user_id'); // Supprime uniquement la session user_id
        }
        echo "<p>Votre session a expiré. Veuillez vous reconnecter.</p>";
    }
}

// Met à jour l'activité de la session uniquement pour l'utilisateur connecté
if ($session->has('user_id')) {
    $session->set('LAST_ACTIVITY', time());
}

// Suppression de la session "secret_verified" si demandé
if (isset($_GET['action']) && $_GET['action'] === 'clear_secret') {
    $session->remove('secret_verified');
    echo "<p>Session du mot de passe secret supprimée.</p>";
}
?>
