<?php
require_once __DIR__.'/config/database.php';require_once __DIR__.'/includes/functions.php';require_login();
$pageTitle='Mi cuenta | UNIK';require __DIR__.'/includes/header.php';$u=current_user();?>
<section class="page-intro compact"><span class="eyebrow">TU ESPACIO</span><h1>Mi <span>cuenta</span></h1><p>Información básica de tu perfil.</p></section><div class="account-card"><div class="avatar avatar-large"><?= e(strtoupper(substr($u['name'],0,1))) ?></div><div><h2><?= e($u['name']) ?></h2><p><?= e($u['email']) ?></p><span class="role-chip"><?= e($u['role']) ?></span></div><a class="btn btn-outline" href="logout.php">Cerrar sesión</a></div>
<?php require __DIR__.'/includes/footer.php'; ?>
