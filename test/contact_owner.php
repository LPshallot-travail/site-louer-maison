<?php
// Exemple de code pour contacter le propriétaire
include 'Database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM houses WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $house = $stmt->fetch();
} else {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacter le Propriétaire - Test</title>
    <link rel="stylesheet" href="css/styles.css">
</head
