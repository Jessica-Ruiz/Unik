<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'Catálogo | UNIK';
$category = trim($_GET['category'] ?? '');
$search = trim($_GET['q'] ?? '');
$sql = "SELECT * FROM products WHERE active=1";
$params = [];
if ($category !== '') { $sql .= " AND category=?"; $params[] = $category; }
if ($search !== '') { $sql .= " AND (name LIKE ? OR description LIKE ?)"; $params[]="%$search%"; $params[]="%$search%"; }
$sql .= " ORDER BY created_at DESC";
$stmt = $pdo->prepare($sql); $stmt->execute($params); $products = $stmt->fetchAll();
require __DIR__ . '/includes/header.php';
?>
<section class="page-intro"><span class="eyebrow">ENCUENTRA TU INSPIRACIÓN</span><h1>Catálogo de <span>productos</span></h1><p>Explora, elige y transforma cada producto en una pieza única.</p></section>
<form class="catalog-toolbar" method="get"><div class="search-box"><span>⌕</span><input name="q" value="<?= e($search) ?>" placeholder="Busca camisas, tazas, accesorios..."></div><select name="category"><option value="">Todas las categorías</option><?php foreach(['Camisas','Gorras','Tazas','Busos','Accesorios','Stickers'] as $c): ?><option <?= $category===$c?'selected':'' ?> value="<?= e($c) ?>"><?= e($c) ?></option><?php endforeach; ?></select><button class="btn btn-primary">Buscar</button></form>
<div class="catalog-layout"><aside class="filter-panel"><h3>Categorías</h3><?php foreach(['Camisas','Gorras','Tazas','Busos','Accesorios','Stickers'] as $c): ?><a class="<?= $category===$c?'active':'' ?>" href="catalog.php?category=<?= urlencode($c) ?>"><?= e($c) ?><span>→</span></a><?php endforeach; ?><a href="catalog.php">Ver todas</a><div class="filter-note"><span>✦</span><strong>¿Tienes una idea?</strong><p>Elige un producto y comienza a personalizarlo.</p></div></aside>
<section><div class="results-heading"><strong><?= count($products) ?> productos</strong><span>Diseña algo que hable de ti</span></div><div class="product-grid catalog-products">
<?php foreach($products as $p): ?><article class="product-card"><a class="product-image" href="product.php?id=<?= (int)$p['id'] ?>"><span class="product-tag"><?= e($p['category']) ?></span><div class="product-placeholder"><?= e(strtoupper(substr($p['name'],0,1))) ?></div><span class="quick-view">Ver producto ↗</span></a><div class="product-info"><div><h3><?= e($p['name']) ?></h3><p><?= e($p['description']) ?></p></div><strong><?= money($p['price']) ?></strong></div><a class="btn btn-outline btn-full" href="product.php?id=<?= (int)$p['id'] ?>">Personalizar</a></article><?php endforeach; ?>
<?php if(!$products): ?><div class="empty-state">No encontramos productos con esos filtros. Prueba otra búsqueda.</div><?php endif; ?>
</div></section></div>
<?php require __DIR__ . '/includes/footer.php'; ?>
