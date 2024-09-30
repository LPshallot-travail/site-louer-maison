<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    $stmt->execute([$email, $password]);

    header('Location: login.php');
}
?>

<!-- FORMULAIRE D'INSCRIPTION -->
<form method="POST" action="">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Inscription</button>
</form>
