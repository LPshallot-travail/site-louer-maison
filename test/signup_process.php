<?php
require_once '../config/config.php';
require_once '../includes/security.php';
require_once '../includes/session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = htmlspecialchars(trim($_POST['first_name']));
    $last_name = htmlspecialchars(trim($_POST['last_name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validation
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
        $session->set('error_message', 'Tous les champs doivent être remplis.');
        header('Location: signup.php');
        exit();
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $session->set('error_message', 'Adresse email invalide.');
        header('Location: signup.php');
        exit();
    }

    if ($password !== $confirm_password) {
        $session->set('error_message', 'Les mots de passe ne correspondent pas.');
        header('Location: signup.php');
        exit();
    }

    try {
        // Vérifier si l'email existe déjà avec le même nom et prénom
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $existing_user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing_user) {
            if ($existing_user['first_name'] == $first_name && $existing_user['last_name'] == $last_name) {
                $session->set('error_message', 'Un compte avec ces informations existe déjà.');
            } else {
                $session->set('error_message', 'Cet email est déjà utilisé.');
            }
            header('Location: signup.php');
            exit();
        }

        // Hachage du mot de passe
        $hashed_password = hashPassword($password);

        // Insertion dans la base de données
        $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$first_name, $last_name, $email, $hashed_password]);

        // Récupérer l'ID utilisateur après insertion
        $user_id = $pdo->lastInsertId();
        $session->set('user_id', $user_id);

        // Redirection vers la page d'accueil après inscription réussie
        header('Location: home.php');
        exit();
    } catch (PDOException $e) {
        $session->set('error_message', 'Erreur lors de l\'inscription. Veuillez réessayer.');
        header('Location: signup.php');
        exit();
    }
} else {
    header('Location: signup.php');
    exit();
}
