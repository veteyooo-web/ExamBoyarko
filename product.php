<?php
session_start();
require_once __DIR__ . '/db/connection.php';
$id = (int)($_GET['id'] ?? 0);
$stmt = $mysqli->prepare('SELECT * FROM products WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();
if (!$product) {
    header('Location: catalog.php');
    exit;
}
$categoryNames = ['all' => 'Все', 'Ноутбуки' => 'Ноутбуки', 'Компоненты' => 'Компоненты', 'Периферия' => 'Периферия', 'Аксессуары' => 'Аксессуары', 'Прочее' => 'Прочее'];
$cartCount = array_sum($_SESSION['cart'] ?? []);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> — TechForge</title>
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
        <section class="product-hero">
            <img class="product-hero-image" src="assets/image/<?php echo htmlspecialchars($product['image']); ?>"
                 alt="<?php echo htmlspecialchars($product['name']); ?>"
                 onerror="this.src='assets/image/no-image.svg'">
            <div class="product-panel">
                <span class="product-brand"><?php echo htmlspecialchars($product['brand']); ?></span>
                <h1><?php echo htmlspecialchars($product['name']); ?></h1>
                <span class="product-category"><?php echo $categoryNames[$product['category']] ?? $product['category']; ?></span>
                <p class="product-description"><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
                <div class="product-bottom">
                    <span class="product-price"><?php echo number_format($product['price'], 0, ',', ' '); ?> ₽</span>
                    <a class="btn btn-primary" href="order.php">Заказать звонок</a>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer footer-dark">
        <div class="container footer-inner">
            <p>© 2026 TechForge</p>
        </div>
    </footer>
</body>
</html>
