<?php
session_start();
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Enregistrement dans la base de données
    $stmt = $pdo->prepare("INSERT INTO annonces (title, description, price) VALUES (?, ?, ?)");
    $stmt->execute([$title, $description, $price]);

    header('Location: ../dashboard.php');
}
?>

<!-- FORMULAIRE DE CRÉATION D'ANNONCE -->
<form method="POST" action="">
    <label for="title">Titre:</label>
    <input type="text" id="title" name="title" required>
    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea>
    <label for="price">Prix par nuit:</label>
    <input type="number" id="price" name="price" required>
    <button type="submit">Ajouter l'annonce</button>
</form>
