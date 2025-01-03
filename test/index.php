<?php
// Inclure la gestion de la session
include '../includes/session.php';

// Vérifier si l'utilisateur est connecté
if (!$session->has('user_id')) {
    // Si l'utilisateur n'est pas connecté, rediriger vers home.php
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Bienvenue sur notre site de location de maisons</h1>
        <nav>
            <ul>
                <li><a href="search.php">Rechercher une maison</a></li>
                <li><a href="post_listing.php">Publier une annonce</a></li>
                <li><a href="logout.php">Se déconnecter</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>
