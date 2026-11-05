<?php
require_once __DIR__.'/config/database.php';require_once __DIR__.'/includes/functions.php';require_login();
$id=(int)($_GET['id']??0);$s=$pdo->prepare("SELECT * FROM orders WHERE id=? AND user_id=?");$s->execute([$id,current_user()['id']]);$order=$s->fetch();if(!$order){http_response_code(404);exit('Pedido no encontrado.');}
$pageTitle='Pedido creado | UNIK';require __DIR__.'/includes/header.php';?>
<div class="success-panel"><div class="success-check">✓</div><span class="eyebrow">¡GRACIAS POR ELEGIR UNIK!</span><h1>Tu pedido ha sido <span>creado.</span></h1><p>Registramos tu compra correctamente. Puedes consultar su estado desde Mis pedidos.</p><div class="order-reference">Pedido #UNIK-<?= str_pad((string)$order['id'],5,'0',STR_PAD_LEFT) ?></div><a class="btn btn-primary btn-lg" href="orders.php">Ver mis pedidos →</a></div>
<?php require __DIR__.'/includes/footer.php'; ?>
