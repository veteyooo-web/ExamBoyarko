<?php
session_start();
$cartCount = array_sum($_SESSION['cart'] ?? []);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechForge — компьютерная техника</title>
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

    <main>
        <section class="hero">
            <div class="container hero-grid">
                <div>
                    <span class="eyebrow">Техника для современного компьютера</span>
                    <h1>Быстрый апгрейд вашего рабочего места</h1>
                    <p>SSD, процессоры, видеокарты, периферия и комплектующие — всё для надёжного компьютера.</p>
                </div>
                <div class="hero-panel">
                    <div class="panel-card panel-glow">
                        <h2>10 000+</h2>
                        <p>компонентов в наличии</p>
                    </div>
                    <div class="panel-card panel-dark">
                        <h2>Гарантия</h2>
                        <p>на все товары до 12 месяцев</p>
                    </div>
                    <div class="panel-card panel-border">
                        <h2>Доставка</h2>
                        <p>по России за 1-3 дня</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section container">
            <div class="section-header">
                <h2>Нужная техника</h2>
                <p>Выберите категорию и найдите то, что сделает ваш ПК заметно лучше.</p>
            </div>
            <div class="cards-grid">
                <a class="card card-accent">
                    <strong>Ноутбуки</strong>
                    <span>Мощные и мобильные решения</span>
                </a>
                <a class="card card-accent">
                    <strong>Компоненты</strong>
                    <span>Процессоры, материнские платы, память</span>
                </a>
                <a class="card card-accent">
                    <strong>Периферия</strong>
                    <span>Клавиатуры, мыши, мониторы</span>
                </a>
                <a class="card card-accent">
                    <strong>Аксессуары</strong>
                    <span>Кабели, охлаждение, корпуса</span>
                </a>
            </div>
        </section>

        <section class="section section-dark">
            <div class="container feature-grid">
                <div>
                    <h2>Лучшие решения для вашего ПК</h2>
                    <p>Мы предлагаем только проверенные компоненты, которые обеспечивают высокую производительность и надежность.</p>
                </div>
                <div>
                    <h2>Упрощённый процесс покупки</h2>
                    <p>Вы можете легко выбрать нужные компоненты, добавить их в корзину и оформить заказ в несколько шагов.</p>
                    <p>Не как у наших желтых конкурентов</p>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container footer-inner">
            <p>© 2026 TechForge</p>
        </div>
    </footer>
</body>
</html>
