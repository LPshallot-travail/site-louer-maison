<?php
include '../includes/session.php'; // Inclusion de session.php

// Afficher le contenu de la session avant la suppression de 'user_id'
echo "<pre>";
print_r($session->all()); // Affiche toutes les variables de session
echo "</pre>";

// Supprimer uniquement la session 'user_id'
$session->remove('user_id');

// Afficher le contenu de la session après la suppression de 'user_id'
echo "<pre>";
print_r($session->all()); // Affiche la session sans 'user_id'
echo "</pre>";

// Rediriger l'utilisateur vers la page d'accueil
header("Location: home.php");
exit();
?>
