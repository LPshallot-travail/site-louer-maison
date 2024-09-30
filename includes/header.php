<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test - Location de maisons</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li><a href="dashboard.php">Mon Tableau de Bord</a></li>
                    <li><a href="auth/logout.php">Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="auth/login.php">Connexion</a></li>
                    <li><a href="auth/register.php">Inscription</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
