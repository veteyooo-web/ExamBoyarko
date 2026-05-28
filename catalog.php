<?php
session_start();
require_once __DIR__ . '/db/connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $productId = (int)$_POST['product_id'];
    $quantity = max(1, (int)$_POST['quantity']);
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $_SESSION['cart'][$productId] = ($_SESSION['cart'][$productId] ?? 0) + $quantity;
}
$cartCount = array_sum($_SESSION['cart'] ?? []);
$categories = ['all', 'Ноутбуки', 'Компоненты', 'Периферия', 'Аксессуары', 'Прочее'];
$categoryNames = ['all' => 'Все', 'Ноутбуки' => 'Ноутбуки', 'Компоненты' => 'Компоненты', 'Периферия' => 'Периферия', 'Аксессуары' => 'Аксессуары', 'Прочее' => 'Прочее'];
$categoryFilter = isset($_GET['category']) && in_array($_GET['category'], $categories) ? $_GET['category'] : 'all';
$query = 'SELECT * FROM products';
if ($categoryFilter !== 'all') {
    $query .= " WHERE category = '" . $mysqli->real_escape_string($categoryFilter) . "'";
}
$query .= ' ORDER BY id DESC LIMIT 20';
$result = $mysqli->query($query);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог — TechForge</title>
    <link rel="stylesheet" href="css/style.css">
    <script defer src="js\script.js"></script>
</head>
<body>
    <header class="header">
        <div class="container header-inner">
            <a class="logo" href="index.php">TechForge</a>
            <button class="menu-toggle" type="button">Меню</button>
            <nav class="nav">
                <a href="index.php">Главная</a>
                <a href="catalog.php">Каталог</a>
                <a href="autors.php">О нас</a>
                <a href="order.php">Корзина<?php echo $cartCount ? ' (' . $cartCount . ')' : ''; ?></a>
            </nav>
        </div>
    </header>

    <main class="container page-content">
        <section class="section">
            <div class="section-header">
                <h1>Каталог</h1>
                <p>Подберите комплектующие и периферию для вашего компьютера.</p>
            </div>
            <div class="filters">
                <?php foreach ($categories as $category): ?>
                    <a class="tag <?php echo $category === $categoryFilter ? 'tag-active' : ''; ?>"
                       href="?category=<?php echo $category; ?>">
                        <?php echo $categoryNames[$category]; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="products-grid">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <article class="product-card">
                        <img class="product-image" src="assets/image/<?php echo htmlspecialchars($row['image']); ?>"
                             alt="<?php echo htmlspecialchars($row['name']); ?>"
                             onerror="this.src='assets/image/no-image.svg'">
                        <div class="product-info">
                            <span class="product-brand"><?php echo htmlspecialchars($row['brand']); ?></span>
                            <h2 class="product-name"><?php echo htmlspecialchars($row['name']); ?></h2>
                            <span class="product-category"><?php echo $categoryNames[$row['category']] ?? $row['category']; ?></span>
                            <div class="product-price"><?php echo number_format($row['price'], 0, ',', ' '); ?> ₽</div>
                            <form method="POST" class="product-form">
                                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                                <input type="number" name="quantity" value="1" min="1" max="10" class="quantity-input">
                                <button type="submit" name="add_to_cart" class="btn btn-card">В корзину</button>
                            </form>
                            <a class="product-link" href="product.php?id=<?php echo $row['id']; ?>">Подробнее</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="empty-state">
                    <h2>Товары не найдены</h2>
                    <a class="btn btn-primary" href="catalog.php">Показать все</a>
                </div>
            <?php endif; ?>
        </section>
    </main>

    <footer class="footer footer-dark">
        <div class="container footer-inner">
            <p>© 2026 TechForge</p>
        </div>
    </footer>
</body>
</html>
