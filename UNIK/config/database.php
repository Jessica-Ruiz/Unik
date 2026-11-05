<?php
declare(strict_types=1);

$host = getenv('DB_HOST') ?: '127.0.0.1';
$db   = getenv('DB_NAME') ?: 'unik';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '';

try {
    $pdo = new PDO(
        "mysql:host={$host};dbname={$db};charset=utf8mb4",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch (PDOException $e) {
    http_response_code(500);
    exit('No fue posible conectar con la base de datos. Revisa config/database.php y database/schema.sql.');
}
