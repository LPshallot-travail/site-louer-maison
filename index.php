<?php
session_start();
include 'includes/header.php';
?>

<h1>Bienvenue sur Test - Location de maisons</h1>

<form action="annonces/view.php" method="GET">
    <label for="location">Localisation :</label>
    <input type="text" id="location" name="location" required>

    <label for="checkin">Date d'arrivée :</label>
    <input type="date" id="checkin" name="checkin" required>

    <label for="checkout">Date de départ :</label>
    <input type="date" id="checkout" name="checkout" required>

    <label for="guests">Nombre de personnes :</label>
    <input type="number" id="guests" name="guests" required>

    <button type="submit">Rechercher</button>
</form>

<?php include 'includes/footer.php'; ?>
