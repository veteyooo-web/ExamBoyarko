<?php
session_start();
$cartCount = array_sum($_SESSION['cart'] ?? []);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нас — TechForge</title>
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
                <h1>TechForge</h1>
                <p>Мы собираем магазин компьютерных комплектующих, где каждый товар понятен и легко доступен.</p>
            </div>
            <div class="about-grid">
                <article class="about-card">
                    <h2>Наш ассортимент</h2>
                    <p>Процессоры, видеокарты, SSD, память, корпуса, мониторы, мыши и клавиатуры — всё, что нужно вашему компьютеру.</p>
                </article>
                <article class="about-card">
                    <h2>Прозрачные цены</h2>
                    <p>В каталоге вы видите актуальные цены и короткое описание, чтобы быстро сравнить варианты.</p>
                </article>
                <article class="about-card">
                    <h2>Простая логика</h2>
                    <p>Сайт работает на простом PHP. Каталог берёт товары из базы, корзина хранится в сессии, а форма запроса вызывает уведомление через JavaScript.</p>
                </article>
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
