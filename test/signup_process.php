<?php
require_once '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;

$sessionStorage = new NativeSessionStorage();
$session = new Session($sessionStorage);
$session->start();

// Toutes les redirections supprimées

if ($session->has('secret_verified')) {
    echo "<p>Vous avez déjà validé le mot de passe secret. Passez à l'étape suivante.</p>";
}

// Vérifie si l'utilisateur est connecté
if ($session->has('user_id')) {
    echo "<p>Vous êtes déjà connecté.</p>";
}

// Vérification d'inactivité
if ($session->has('LAST_ACTIVITY')) {
    $sessionTimeout = 1209600; // 2 semaines
    if (time() - $session->get('LAST_ACTIVITY') > $sessionTimeout) {
        $session->clear();
        echo "<p>Votre session a expiré. Veuillez vous reconnecter.</p>";
    }
}

$session->set('LAST_ACTIVITY', time());
?>
