<?php
declare(strict_types=1);
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

function e(?string $value): string {
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}
function money($value): string {
    return '$' . number_format((float)$value, 0, ',', '.');
}
function logged_in(): bool {
    return isset($_SESSION['user']);
}
function require_login(): void {
    if (!logged_in()) {
        header('Location: login.php');
        exit;
    }
}
function current_user(): ?array {
    return $_SESSION['user'] ?? null;
}
function csrf_token(): string {
    if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(32));
    return $_SESSION['csrf'];
}
function verify_csrf(): void {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sent = $_POST['csrf'] ?? '';
        if (!hash_equals(csrf_token(), $sent)) {
            http_response_code(419);
            exit('La sesión del formulario expiró. Regresa e inténtalo nuevamente.');
        }
    }
}
function flash(string $message, string $type = 'success'): void {
    $_SESSION['flash'] = ['message' => $message, 'type' => $type];
}
function get_flash(): ?array {
    $f = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);
    return $f;
}
