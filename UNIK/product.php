<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';
$id=(int)($_GET['id']??0); $stmt=$pdo->prepare("SELECT * FROM products WHERE id=? AND active=1"); $stmt->execute([$id]); $product=$stmt->fetch();
if(!$product){http_response_code(404);exit('Producto no encontrado.');}
if($_SERVER['REQUEST_METHOD']==='POST'){verify_csrf();$qty=max(1,min(20,(int)($_POST['quantity']??1)));$_SESSION['cart'][$id]=($_SESSION['cart'][$id]??0)+$qty;flash('Producto agregado al carrito.');header('Location: cart.php');exit;}
$pageTitle=$product['name'].' | UNIK';require __DIR__.'/includes/header.php';
?>
<div class="breadcrumb"><a href="catalog.php">Catálogo</a> / <?= e($product['name']) ?></div>
<section class="product-detail"><div class="detail-visual"><span class="product-tag"><?= e($product['category']) ?></span><div class="detail-letter"><?= e(strtoupper(substr($product['name'],0,1))) ?></div><span class="detail-caption">TU DISEÑO · TU ESTILO</span></div><div class="detail-copy"><span class="eyebrow">PERSONALIZA TU PRODUCTO</span><h1><?= e($product['name']) ?></h1><p><?= e($product['description']) ?></p><div class="detail-price"><?= money($product['price']) ?></div><div class="stock-line"><span class="stock-dot"></span><?= (int)$product['stock'] ?> disponibles</div><form method="post" class="purchase-form"><input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>"><label for="quantity">Cantidad</label><input id="quantity" type="number" name="quantity" min="1" max="20" value="1"><button class="btn btn-primary btn-lg btn-full">Agregar al carrito →</button></form><div class="detail-benefits"><span>✓ Compra segura (modo demostración)</span><span>✓ Personalización disponible</span><span>✓ Seguimiento de tu pedido</span></div></div></section>
<?php require __DIR__.'/includes/footer.php'; ?>
