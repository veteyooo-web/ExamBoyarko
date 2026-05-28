-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.4:3306
-- Время создания: Май 28 2026 г., 19:10
-- Версия сервера: 8.4.7
-- Версия PHP: 8.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `techforge`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int DEFAULT '0',
  `image` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `category`, `price`, `stock`, `image`, `description`, `created_at`) VALUES
(1, 'ASUS ROG Strix G16', 'ASUS', 'Прочее', 164990.00, 12, 'asusrogstrixg16.jpg', 'Игровой ноутбук с RTX 4070 и Intel Core i7 14 поколения.', '2026-05-28 15:15:53'),
(2, 'Apple MacBook Air M3', 'Apple', 'Прочее', 189990.00, 8, 'applemacbookairm3.jpg', 'Тонкий и мощный ноутбук для работы и учебы.', '2026-05-28 15:15:53'),
(3, 'Logitech G Pro X Superlight 2', 'Logitech', 'Периферия', 14990.00, 25, 'logitechgproxsuperlight2.jpg', 'Легкая беспроводная игровая мышь для киберспорта.', '2026-05-28 15:15:53'),
(4, 'Razer Huntsman V3 Pro', 'Razer', 'Периферия', 22990.00, 14, 'razerhuntsmanv3pro.jpg', 'Механическая клавиатура с оптическими переключателями.', '2026-05-28 15:15:53'),
(5, 'Samsung Odyssey G6 27', 'Samsung', 'Аксессуары', 38990.00, 9, 'samsungodysseyg627.jpg', 'Игровой монитор 240 Гц с QHD разрешением.', '2026-05-28 15:15:53'),
(6, 'NVIDIA GeForce RTX 4080 SUPER', 'NVIDIA', 'Компоненты', 129990.00, 5, 'nvidiageforcertx4080super.jpg', 'Мощная видеокарта для 4K-гейминга.', '2026-05-28 15:15:53'),
(7, 'AMD Ryzen 7 7800X3D', 'AMD', 'Компоненты', 42990.00, 17, 'amdryzen77800x3d.jpg', 'Один из лучших процессоров для игр.', '2026-05-28 15:15:53'),
(8, 'Kingston Fury Beast DDR5 32GB', 'Kingston', 'Компоненты', 12990.00, 30, 'kingstonfurybeastddr532gb.jpg', 'Быстрая DDR5 память с RGB подсветкой.', '2026-05-28 15:15:53'),
(9, 'Samsung 990 PRO 2TB', 'Samsung', 'Компоненты', 18990.00, 20, 'samsung990pro2tb.jpg', 'Сверхбыстрый NVMe SSD накопитель.', '2026-05-28 15:15:53'),
(10, 'Sony WH-1000XM5', 'Sony', 'Периферия', 29990.00, 11, 'sonywh-1000xm5.jpg', 'Премиальные беспроводные наушники с шумоподавлением.', '2026-05-28 15:15:53'),
(11, 'PlayStation 5 Slim', 'Sony', 'Прочее', 64990.00, 6, 'playstation5slim.jpg', 'Игровая консоль нового поколения.', '2026-05-28 15:15:53'),
(12, 'Xbox Series X', 'Microsoft', 'Прочее', 59990.00, 7, 'xboxseriesx.jpg', 'Мощная игровая консоль Xbox.', '2026-05-28 15:15:53'),
(13, 'SteelSeries Arctis Nova 7', 'SteelSeries', 'Периферия', 17990.00, 13, 'steelseriesarctisnova7.jpg', 'Игровая гарнитура с объемным звуком.', '2026-05-28 15:15:53'),
(14, 'HyperX QuadCast S', 'HyperX', 'Периферия', 14990.00, 18, 'hyperxquadcasts.jpg', 'USB микрофон для стримов и общения.', '2026-05-28 15:15:53'),
(15, 'Secretlab TITAN Evo', 'Secretlab', 'Аксессуары', 58990.00, 4, 'secretlabtitanevo.jpg', 'Премиальное игровое кресло с поддержкой спины.', '2026-05-28 15:15:53'),
(16, 'Attack Shark X3', 'Attack Shark', 'Периферия', 4990.00, 22, 'attacksharkx3.jpg', 'Легкая беспроводная мышь с топовым сенсором.', '2026-05-28 15:16:13'),
(17, 'ATK F1 Extreme', 'ATK', 'Периферия', 8990.00, 15, 'atkf1extreme.jpg', 'Игровая мышка для шутеров и киберспорта.', '2026-05-28 15:16:13'),
(18, 'IO Nova V2', 'IO', 'Периферия', 6990.00, 18, 'ionovav2.jpg', 'Популярная китайская игровая мышь.', '2026-05-28 15:16:13'),
(19, 'Wooting 60HE', 'Wooting', 'Периферия', 28990.00, 7, 'wooting60he.jpg', 'Клавиатура с магнитными свитчами и rapid trigger.', '2026-05-28 15:16:13'),
(20, 'DrunkDeer A75', 'DrunkDeer', 'Периферия', 14990.00, 10, 'drunkdeera75.jpg', 'Механическая клавиатура с Hall Effect переключателями.', '2026-05-28 15:16:13'),
(21, 'LG UltraGear 27GR95QE', 'LG', 'Периферия', 79990.00, 5, 'lgultragear27gr95qe.jpg', 'OLED игровой монитор 240 Гц.', '2026-05-28 15:16:13'),
(22, 'AOC 24G2SPU', 'AOC', 'Периферия', 18990.00, 19, 'aoc24g2spu.jpg', 'Популярный бюджетный монитор для игр.', '2026-05-28 15:16:13'),
(23, 'RTX 5070 Ti', 'NVIDIA', 'Компоненты', 99990.00, 3, 'rtx5070ti.jpg', 'Новое поколение видеокарт NVIDIA.', '2026-05-28 15:16:13'),
(24, 'RX 8800 XT', 'AMD', 'Компоненты', 84990.00, 6, 'rx8800xt.jpg', 'Мощная игровая видеокарта AMD.', '2026-05-28 15:16:13'),
(25, 'Intel Core i7-14700KF', 'Intel', 'Компоненты', 46990.00, 13, 'intelcorei7-14700kf.jpg', 'Процессор Intel для игр и работы.', '2026-05-28 15:16:13'),
(26, 'Corsair Vengeance RGB DDR5 32GB', 'Corsair', 'Компоненты', 13990.00, 16, 'corsairvengeancergbddr532gb.jpg', 'DDR5 память с RGB подсветкой.', '2026-05-28 15:16:13'),
(27, 'WD Black SN850X 2TB', 'Western Digital', 'Компоненты', 17490.00, 21, 'wdblacksn850x2tb.jpg', 'Быстрый SSD для игр и Windows.', '2026-05-28 15:16:13'),
(28, 'AirPods Pro 2', 'Apple', 'Периферия', 23990.00, 28, 'airpodspro2.jpg', 'Беспроводные наушники Apple с шумоподавлением.', '2026-05-28 15:16:13'),
(29, 'HyperX Cloud III', 'HyperX', 'Периферия', 10990.00, 17, 'hyperxcloudiii.jpg', 'Игровая гарнитура с хорошим микрофоном.', '2026-05-28 15:16:13'),
(30, 'Elgato Wave 3', 'Elgato', 'Периферия', 16990.00, 9, 'elgatowave3.jpg', 'USB микрофон для стримов и записи голоса.', '2026-05-28 15:16:13'),
(31, 'Secretlab Magnus Pro', 'Secretlab', 'Аксессуары', 89990.00, 4, 'secretlabmagnuspro.jpg', 'Премиальный компьютерный стол.', '2026-05-28 15:16:13'),
(32, 'DXRacer Air', 'DXRacer', 'Аксессуары', 44990.00, 8, 'dxracerair.jpg', 'Игровое кресло с сетчатой спинкой.', '2026-05-28 15:16:13'),
(33, 'Nintendo Switch OLED', 'Nintendo', 'Прочее', 39990.00, 12, 'nintendoswitcholed.jpg', 'Портативная игровая консоль Nintendo.', '2026-05-28 15:16:13'),
(34, 'Meta Quest 3', 'Meta', 'Периферия', 64990.00, 5, 'metaquest3.jpg', 'VR шлем нового поколения.', '2026-05-28 15:16:13'),
(35, 'Blue Yeti X', 'Logitech', 'Периферия', 18990.00, 11, 'blueyetix.jpg', 'Популярный микрофон для стриминга и Discord.', '2026-05-28 15:16:13');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
