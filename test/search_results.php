<?php
// Exemple de code pour afficher les résultats de la recherche
include 'Database.php';

$location = $_GET['location'];
$check_in = $_GET['check_in'];
$check_out = $_GET['check_out'];
$guests = $_GET['guests'];

$stmt = $pdo->prepare("SELECT * FROM houses WHERE location = :location");
$stmt->execute(['location' => $location]);
$houses = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de Recherche - Test</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Résultats de Recherche</h1>
    </header>
    <main>
        <?php foreach ($houses as $house): ?>
            <div>
                <h2><?php echo $house['title']; ?></h2>
                <p>Prix: <?php echo $house['price']; ?> € par nuit</p>
                <a href="house_details.php?id=<?php echo $house['id']; ?>">Voir les détails</a>
            </div>
        <?php endforeach; ?>
    </main>
</body>
</html>
