<?php
include '../includes/session.php'; // Inclusion de session.php

// Afficher le contenu de la session avant la déconnexion
echo "<pre>";
print_r($session->all()); // Affiche toutes les variables de session
echo "</pre>";

$session->clear(); // Efface toutes les données de session
$session->invalidate(); // Invalide la session actuelle

// Afficher le contenu de la session après la déconnexion
echo "<pre>";
print_r($session->all()); // La session est vide
echo "</pre>";

// Rediriger l'utilisateur vers la page d'accueil
header("Location: home.php");
exit();
?>
