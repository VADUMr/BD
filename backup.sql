-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Жов 24 2023 р., 21:04
-- Версія сервера: 10.4.27-MariaDB
-- Версія PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `login_system`
--

-- --------------------------------------------------------

--
-- Структура таблиці `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `authors` varchar(255) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `books`
--

INSERT INTO `books` (`id`, `title`, `authors`, `image_name`) VALUES
(1, 'asdfas', 'dfgs', 'NULL'),
(2, 'dfg', 'wert', '2.jpg'),
(3, 'Крижане серце', 'Дженніфер Лі Арментроут', NULL),
(4, 'Подих вітру', 'Джордж Мартін', NULL),
(5, 'Місто без назви', 'Гаррі Поттер', NULL),
(6, 'Спільнота кільця', 'Джон Р. Р. Толкін', NULL),
(7, 'Після дощу', 'Ніколас Спаркс', NULL),
(8, 'Скляний трон', 'Сара Дж. Мас', NULL),
(9, 'Ангел в тумані', 'Карлос Руїс Сафон', NULL),
(10, 'Соляріс', 'Станіслав Лем', NULL),
(11, 'Таємниця домашнього тапера', 'Донна Тартт', NULL),
(12, 'Останній день літа', 'Марк Леві', NULL),
(13, 'Колір магії', 'Террі Пратчетт', NULL),
(14, 'Холодне серце', 'Біркіта Адріансен', NULL),
(15, 'Західне вітрило', 'Лорена Морган', NULL),
(16, 'Мінливість хмар', 'Джульєт Марілєр', NULL),
(17, 'Під покровом ночі', 'Кейт Мортон', NULL),
(18, 'Місто зі старих вітрин', 'Карлсон Гінн', NULL),
(19, 'Долар від неба', 'Джон Грішем', NULL),
(20, 'Зоряна птиця', 'Алексей Пехов', NULL),
(21, 'Скриня Шерлока Холмса', 'Артур Конан Дойл', NULL),
(22, 'Острови в океані', 'Джоан Дідіон', NULL);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
