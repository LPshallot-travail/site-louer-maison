<?php
session_start();
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: ../dashboard.php');
        exit();
    } else {
        $error = "Identifiants incorrects.";
    }
}
?>
<!-- HTML FORM -->
<form method="POST" action="">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Connexion</button>
    <?php if (isset($error)) { echo $error; } ?>
</form>
