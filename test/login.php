<?php  
include '../config/config.php';
include '../includes/security.php';
require_once '../includes/session.php'; // Inclure session.php pour utiliser Symfony

// Vérification de la méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération et validation des données du formulaire
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    // Vérification si l'email est valide
    if ($email === false) {
        $session->set('error', "L'email n'est pas valide.");
        header("Location: login.php"); // Rediriger vers la même page pour afficher l'erreur
        exit();
    }

    // Préparer la requête pour récupérer l'utilisateur correspondant à l'email
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Vérification des identifiants
    if ($user && verifyPassword($password, $user['password'])) {
        // Créer la session "user_id" et le temps d'activité en utilisant Symfony
        $session->set('user_id', $user['id']);
        $session->set('LAST_ACTIVITY', time()); // Met à jour le temps d'activité

        // Rediriger vers index.php pour la suite
        header("Location: index.php");
        exit();
    } else {
        // Message d'erreur en cas d'identifiants incorrects
        $session->set('error', "Identifiants incorrects. Veuillez réessayer.");
        header("Location: login.php"); // Rediriger vers la même page pour afficher l'erreur
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <!-- Affichage du message d'erreur si présent dans la session -->
    <?php if ($session->has('error')): ?>
        <p class="error"><?php echo $session->get('error'); ?></p>
        <?php $session->remove('error'); ?>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
    </form>
    <p>Pas encore de compte ? <a href="check_password.php">Créer un compte</a></p>
</body>
</html>
