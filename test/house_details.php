<?php
// Exemple de code pour afficher les détails d'une maison
include 'Database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM houses WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $house = $stmt->fetch();
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Maison - Test</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1><?php echo $house['title']; ?></h1>
    </header>
    <main>
        <img src="uploads/<?php echo $house['image']; ?>" alt="<?php echo $house['title']; ?>">
        <p><?php echo $house['description']; ?></p>
        <p>Prix par nuit: <?php echo $house['price']; ?> €</p>
        <p>Nombre de chambres: <?php echo $house['rooms']; ?></p>
        <a href="contact_owner.php?id=<?php echo $house['id']; ?>">Contacter le propriétaire</a>
    </main>
</body>
</html>
