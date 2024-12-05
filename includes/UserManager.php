<?php
class UserManager
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Crée un nouvel utilisateur
    public function createUser($firstName, $lastName, $email, $password)
    {
        // Vérifie si l'email existe déjà
        if ($this->emailExists($email)) {
            throw new Exception("Cet email est déjà utilisé.");
        }

        // Hachage sécurisé du mot de passe
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insertion dans la base de données
        $stmt = $this->pdo->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$firstName, $lastName, $email, $hashedPassword]);

        return $this->pdo->lastInsertId(); // Retourne l'ID de l'utilisateur
    }

    // Vérifie si un email existe déjà
    private function emailExists($email)
    {
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch() !== false;
    }
}
?>
