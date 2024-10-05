<?php
// Traitement de la publication d'annonce
include 'Database.php';
include 'session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $rooms = $_POST['rooms'];
    $images = $_FILES['images'];

    // Traitement des images
    foreach ($images['tmp_name'] as $key => $tmp_name) {
        $image_name = time() . '-' . $images['name'][$key];
        move_uploaded_file($tmp_name, "uploads/$image_name");
        // Ajout de la maison à la base de données
        $stmt = $pdo->prepare("INSERT INTO houses (title, description, price, rooms, image) VALUES (:title, :description, :price, :rooms, :image)");
        $stmt->execute([
            'title' => $title,
            'description' => $description,
            'price' => $price,
            'rooms' => $rooms,
            'image' => $image_name,
        ]);
    }

    header("Location: index.html");
    exit();
}
