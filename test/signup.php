<?php
include '../includes/session.php'; // Inclusion de session.php

// Stockage des valeurs précédemment saisies
$firstName = $session->get('first_name', '');
$lastName = $session->get('last_name', '');
$email = $session->get('email', '');
$error_message = $session->get('error_message', '');

// Supprimer les valeurs de session une fois utilisées
$session->remove('first_name');
$session->remove('last_name');
$session->remove('email');
$session->remove('error_message');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        /* Ajoute un style simple */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f9f9f9;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        button, input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .error {
            color: red;
            font-size: 0.9em;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<!-- Formulaire d'inscription -->
<form action="signup_process.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="first_name" placeholder="Prénom" value="<?php echo htmlspecialchars($firstName); ?>" required>
    <input type="text" name="last_name" placeholder="Nom" value="<?php echo htmlspecialchars($lastName); ?>" required>
    <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" required>
    
    <!-- Champ pour les photos (fonctionnalité future) -->
    <input type="file" name="profile_picture" accept="image/*">
    
    <button type="submit">Créer un compte</button>
    
    <?php if (!empty($error_message)): ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php endif; ?>
</form>

</body>
</html>
