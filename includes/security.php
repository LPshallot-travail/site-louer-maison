<?php
// Hachage des mots de passe
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Vérification des mots de passe
function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}
?>
