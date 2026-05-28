<?php
session_start();
$cartCount = array_sum($_SESSION['cart'] ?? []);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Запрос обратного звонка — TechForge</title>
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
        <section class="section callback-section">
            <div class="callback-panel">
                <h1>Запрос обратного звонка</h1>
                <p>Оставьте контактные данные. Мы свяжемся с вами и поможем выбрать подходящее оборудование.</p>
                <form id="callbackForm" class="callback-form">
                    <label>
                        ФИО
                        <input type="text" name="fio" placeholder="Иван Иванов" required>
                    </label>
                    <label>
                        Телефон
                        <input type="tel" name="phone" placeholder="+7 (999) 123-45-67" required>
                    </label>
                    <label>
                        Адрес
                        <input type="text" name="address" placeholder="Город, улица, дом" required>
                    </label>
                    <button class="btn btn-primary" type="submit">Отправить</button>
                </form>
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
