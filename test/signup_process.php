<?php
session_start();
include 'Database.php';
include 'security.php';

if (!isset($_SESSION['special_password_verified'])) {
    // Si l'utilisateur n'a pas entré le mot de passe spécial, rediriger vers la page de mot de passe
    header("Location: check_password.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Vérification des mots de passe
    if ($password !== $confirmPassword) {
        echo "Les mots de passe ne correspondent pas.";
        exit();
    }

    // Hachage du mot de passe
    $hashedPassword = hashPassword($password);

    // Insertion des données dans la base
    $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, phone, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$firstName, $lastName, $email, $phone, $hashedPassword]);

    // Connecter l'utilisateur et le rediriger vers la page d'accueil
    $_SESSION['user_id'] = $pdo->lastInsertId();
    header("Location: index.html");
    exit();
}
