<?php
include 'Database.php';
include 'session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = htmlspecialchars(trim($_POST['title']));
    $description = htmlspecialchars(trim($_POST['description']));
    $price = floatval($_POST['price']);
    $rooms = intval($_POST['rooms']);
    $images = $_FILES['images'];

    // Traitement des images
    foreach ($images['tmp_name'] as $key => $tmp_name) {
        $image_name = time() . '-' . htmlspecialchars($images['name'][$key]);
        move_uploaded_file($tmp_name, "uploads/$image_name");

        // Insertion de l'annonce dans la base de données
        $stmt = $pdo->prepare("INSERT INTO listings (title, description, price, rooms, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$title, $description, $price, $rooms, $image_name]);
    }

    header("Location: index.php");
    exit();
}
?>
