<?php
// Traitement de l'inscription
include 'Database.php';
include 'security.php';
include 'session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $hashedPassword = hashPassword($password);

    $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, phone, password) VALUES (:first_name, :last_name, :email, :phone, :password)");
    $stmt->execute([
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email,
        'phone' => $phone,
        'password' => $hashedPassword,
    ]);

    header("Location: login.html");
    exit();
}
