<?php
session_start();
require_once __DIR__ . '/db/connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['clear_cart'])) {
        $_SESSION['cart'] = [];
    } elseif (isset($_POST['update_cart']) && isset($_POST['quantities'])) {
        foreach ($_POST['quantities'] as $productId => $quantity) {
            $quantity = max(0, (int)$quantity);
            if ($quantity === 0) {
                unset($_SESSION['cart'][$productId]);
            } else {
                $_SESSION['cart'][$productId] = $quantity;
            }
        }
    }
}
$cartItems = [];
$totalPrice = 0;
$productIds = array_keys($_SESSION['cart'] ?? []);
if ($productIds) {
    $ids = implode(',', array_map('intval', $productIds));
    $result = $mysqli->query("SELECT * FROM products WHERE id IN ($ids)");
    while ($row = $result->fetch_assoc()) {
        $quantity = $_SESSION['cart'][$row['id']] ?? 0;
        if ($quantity > 0) {
            $row['quantity'] = $quantity;
            $row['subtotal'] = $row['price'] * $quantity;
            $totalPrice += $row['subtotal'];
            $cartItems[] = $row;
        }
    }
}
$cartCount = array_sum($_SESSION['cart'] ?? []);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина — TechForge</title>
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
            <h1>Корзина</h1>
            <?php if (!$cartItems): ?>
                <div class="empty-state">
                    <h2>Корзина пуста</h2>
                    <p>Добавьте товары из каталога, чтобы собрать свой набор.</p>
                    <a class="btn btn-primary" href="catalog.php">Перейти в каталог</a>
                </div>
            <?php else: ?>
                <form method="POST" class="cart-table">
                    <div class="cart-head">
                        <span>Товар</span>
                        <span>Кол-во</span>
                        <span>Цена</span>
                        <span>Сумма</span>
                    </div>
                    <?php foreach ($cartItems as $item): ?>
                        <div class="cart-row">
                            <div class="cart-item">
                                <img src="assets/image/<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" onerror="this.src='assets/image/no-image.svg'">
                                <div>
                                    <strong><?php echo htmlspecialchars($item['name']); ?></strong>
                                    <small><?php echo htmlspecialchars($item['brand']); ?></small>
                                </div>
                            </div>
                            <div>
                                <input class="quantity-input" type="number" name="quantities[<?php echo $item['id']; ?>]" value="<?php echo $item['quantity']; ?>" min="0" max="99">
                            </div>
                            <div><?php echo number_format($item['price'], 0, ',', ' '); ?> ₽</div>
                            <div><?php echo number_format($item['subtotal'], 0, ',', ' '); ?> ₽</div>
                        </div>
                    <?php endforeach; ?>
                    <div class="cart-footer">
                        <span>Итого</span>
                        <strong><?php echo number_format($totalPrice, 0, ',', ' '); ?> ₽</strong>
                    </div>
                    <div class="cart-actions">
                        <button class="btn btn-secondary" type="submit" name="update_cart">Обновить</button>
                        <button class="btn btn-outline" type="submit" name="clear_cart">Очистить</button>
                        <a class="btn btn-primary" href="checkout.php">Оформить заказ</a>
                    </div>
                </form>
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
