<?php
// Exemple de code pour laisser un avis
include 'Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $houseId = $_POST['house_id'];
    $review = $_POST['review'];

    $stmt = $pdo->prepare("INSERT INTO reviews (user_id, house_id, review) VALUES (:user_id, :house_id, :review)");
    $stmt->execute([
        'user_id' => $userId,
        'house_id' => $houseId,
        'review' => $review
    ]);

    header("Location: house_details.php?id=$houseId");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laisser un Avis</title>
</head>
<body>
    <form action="" method="POST">
        <input type="hidden" name="house_id" value="<?php echo $_GET['id']; ?>">
        <textarea name="review" placeholder="Votre avis" required></textarea>
        <button type="submit">Laisser un avis</button>
    </form>
</body>
</html>
