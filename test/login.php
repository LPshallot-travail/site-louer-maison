<?php
include '../config/config.php';
include '../includes/security.php';

session_start();

// Vérifie si l'utilisateur est déjà connecté
if (isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && verifyPassword($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['LAST_ACTIVITY'] = time(); // Met à jour le temps d'activité

        header("Location: index.html");
        exit();
    } else {
        echo "<p class='error'>Identifiants incorrects.</p>"; // Message d'erreur plus convivial
    }
}
?>
