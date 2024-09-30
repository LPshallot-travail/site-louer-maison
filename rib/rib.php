<?php
session_start();
include '../includes/header.php';

// Affichage du RIB (à définir dans la base de données pour chaque propriétaire)
$rib = "FR76 1234 5678 9101 1121 3141 5161";

echo "<h1>Informations de paiement</h1>";
echo "<p>Voici le RIB pour effectuer le virement : <strong>$rib</strong></p>";

include '../includes/footer.php';
?>
