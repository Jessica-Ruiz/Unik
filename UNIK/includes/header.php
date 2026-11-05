<?php
require_once __DIR__ . '/functions.php';
$pageTitle = $pageTitle ?? 'UNIK | Crea algo único';
$user = current_user();
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($pageTitle) ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<header class="site-header">
  <div class="nav-wrap">
    <a class="brand" href="index.php"><span class="brand-mark">u</span> unik<span class="brand-dot">.</span></a>
    <nav class="main-nav">
      <a href="index.php">Inicio</a>
      <a href="catalog.php">Catálogo</a>
      <a href="catalog.php#personalizados">Personalizar</a>
      <?php if ($user): ?><a href="orders.php">Mis pedidos</a><?php endif; ?>
      <a href="providers.php">Proveedores</a>
    </nav>
    <div class="nav-actions">
      <a class="icon-link" href="favorites.php" aria-label="Favoritos">♡</a>
      <a class="icon-link cart-link" href="cart.php" aria-label="Carrito">▢</a>
      <?php if ($user): ?>
        <a class="user-pill" href="account.php"><span class="avatar"><?= e(strtoupper(substr($user['name'],0,1))) ?></span><?= e($user['name']) ?></a>
        <a class="btn btn-small btn-outline" href="logout.php">Salir</a>
      <?php else: ?>
        <a class="btn btn-small btn-outline" href="login.php">Ingresar</a>
        <a class="btn btn-small btn-primary" href="register.php">Crear cuenta</a>
      <?php endif; ?>
    </div>
  </div>
</header>
<main class="page-shell">
<?php if ($f = get_flash()): ?>
  <div class="alert alert-<?= e($f['type']) ?>"><?= e($f['message']) ?></div>
<?php endif; ?>
