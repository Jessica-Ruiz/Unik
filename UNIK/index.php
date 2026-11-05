<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'UNIK | Crea algo único';
$stmt = $pdo->query("SELECT * FROM products WHERE active=1 ORDER BY created_at DESC LIMIT 4");
$products = $stmt->fetchAll();
require __DIR__ . '/includes/header.php';
?>
<section class="hero">
  <div class="hero-copy">
    <span class="eyebrow"><span class="eyebrow-dot"></span> TU IDEA, TU ESTILO</span>
    <h1>Convierte tus ideas<br>en algo <span>único.</span></h1>
    <p>Personaliza productos que hablan de ti. Explora diseños, crea el tuyo y encuentra proveedores con talento.</p>
    <div class="hero-actions">
      <a class="btn btn-primary btn-lg" href="catalog.php">Explorar catálogo <span>→</span></a>
      <a class="text-link" href="catalog.php#personalizados">Quiero personalizar <span>↗</span></a>
    </div>
    <div class="hero-proof"><div class="proof-avatars"><i>J</i><i>M</i><i>A</i></div><span><strong>Diseños con personalidad</strong><br>Hechos para expresar quién eres.</span></div>
  </div>
  <div class="hero-art">
    <div class="art-orbit orbit-one"></div><div class="art-orbit orbit-two"></div>
    <div class="art-label label-top">HECHO A TU MANERA ✦</div>
    <div class="product-mockup mug"><div class="mug-handle"></div><span>be<br>unique<span class="spark">✦</span></span></div>
    <div class="product-mockup shirt"><span>YOUR<br>IDEA.</span></div>
    <div class="art-label label-bottom">CREA · DISEÑA · COMPARTE</div>
    <span class="floating-star star-a">✳</span><span class="floating-star star-b">✦</span>
  </div>
</section>
<section class="section">
  <div class="section-heading"><div><span class="eyebrow">DESCUBRE UNIK</span><h2>Un mundo de posibilidades</h2><p>Encuentra el producto perfecto para darle vida a tu creatividad.</p></div><a class="text-link" href="catalog.php">Ver catálogo completo →</a></div>
  <div class="category-grid">
    <a class="category-card cat-blue" href="catalog.php?category=Camisas"><span class="category-icon">✳</span><strong>Camisas</strong><small>Diseña a tu manera</small><span class="category-arrow">↗</span></a>
    <a class="category-card cat-lilac" href="catalog.php?category=Gorras"><span class="category-icon">⌂</span><strong>Gorras</strong><small>Tu estilo, tu sello</small><span class="category-arrow">↗</span></a>
    <a class="category-card cat-peach" href="catalog.php?category=Tazas"><span class="category-icon">☕</span><strong>Tazas</strong><small>Un detalle especial</small><span class="category-arrow">↗</span></a>
    <a class="category-card cat-mint" href="catalog.php?category=Accesorios"><span class="category-icon">◇</span><strong>Accesorios</strong><small>Pequeños grandes detalles</small><span class="category-arrow">↗</span></a>
  </div>
</section>
<section class="section">
  <div class="section-heading"><div><span class="eyebrow">SELECCIÓN UNIK</span><h2>Productos para inspirarte</h2><p>Personaliza los detalles y crea algo que sea verdaderamente tuyo.</p></div><a class="text-link" href="catalog.php">Explorar todo →</a></div>
  <div class="product-grid">
  <?php foreach ($products as $p): ?>
    <article class="product-card">
      <a class="product-image" href="product.php?id=<?= (int)$p['id'] ?>"><span class="product-tag"><?= e($p['category']) ?></span><div class="product-placeholder"><?= e(strtoupper(substr($p['name'],0,1))) ?></div><span class="quick-view">Ver producto ↗</span></a>
      <div class="product-info"><div><h3><?= e($p['name']) ?></h3><p><?= e($p['description']) ?></p></div><strong><?= money($p['price']) ?></strong></div>
      <a class="btn btn-outline btn-full" href="product.php?id=<?= (int)$p['id'] ?>">Personalizar producto</a>
    </article>
  <?php endforeach; ?>
  <?php if (!$products): ?><div class="empty-state">Aún no hay productos publicados. Importa los datos iniciales de <code>database/schema.sql</code>.</div><?php endif; ?>
  </div>
</section>
<section class="custom-banner" id="personalizados"><div><span class="eyebrow">TU CREATIVIDAD NO TIENE LÍMITES</span><h2>Lo imaginas.<br><span>Lo hacemos UNIK.</span></h2><p>Elige un producto, agrega tus ideas y crea un diseño que te represente.</p><a class="btn btn-light btn-lg" href="catalog.php">Comenzar a crear →</a></div><div class="banner-symbol">U<span>✦</span></div></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
