<?php
// Informations de connexion à la base de données
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');  // Changez si vous avez un autre utilisateur
define('DB_PASSWORD', '!*64yRHFaB*8M6fCb');      // Mettez votre mot de passe MyAdmin
define('DB_NAME', 'test_location');  // Le nom de votre base de données

// Connexion à la base de données
try {
    global $pdo;
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    die("Erreur de connexion: ". $e->getMessage());
}
?>
