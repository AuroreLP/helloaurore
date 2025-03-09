<?php

// Récupérer les variables d'environnement
$dbname = getenv('MYSQL_DATABASE') ?: 'blog'; // Valeur par défaut si non définie
$username = getenv('MYSQL_USER') ?: 'user';
$password = getenv('MYSQL_PASSWORD') ?: 'userpassword';
$charset = 'utf8mb4';

// Utiliser le nom du service Docker pour MySQL
$host = 'db'; // Nom du service dans Docker Compose

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Test simple pour vérifier la connexion - A SUPPRIMER APRES
    $stmt = $pdo->query("SELECT 1");
    echo "Database connection is successful!";
} catch (PDOException $e) {
    // Loger l'erreur dans un fichier ou un outil de log
    error_log("Connection failed: " . $e->getMessage());
    // Message générique pour l'utilisateur, sans révéler les détails
    echo 'Database connection failed. Please try again later.';
}
