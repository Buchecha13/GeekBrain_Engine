-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 11 2021 г., 20:44
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `engine`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `product_name` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `session_id`, `product_name`) VALUES
(20, '07hthtoqhp5kesc1ci0en66ll6q0ai2c', 'Samsung');

-- --------------------------------------------------------

--
-- Структура таблицы `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `feedback`) VALUES
(1, 'admin', 'test'),
(2, 'user', 'user_test'),
(9, 'test', 'asdqw23'),
(12, '123', 'qsdsad');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `file_size` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `file_size`, `views`) VALUES
(72, '01.jpg', 5148, 0),
(73, '02.jpg', 3658, 3),
(74, '03.jpg', 3816, 24),
(75, '04.jpg', 3752, 0),
(76, '05.jpg', 6629, 1),
(77, '06.jpg', 4382, 0),
(78, '07.jpg', 5251, 7),
(79, '08.jpg', 5497, 0),
(80, '09.jpg', 3835, 0),
(81, '10.jpg', 4813, 0),
(82, '11.jpg', 4694, 3),
(83, '12.jpg', 6052, 0),
(84, '13.jpg', 4796, 1),
(85, '14.jpg', 7318, 0),
(86, '15.jpg', 5239, 0),
(87, '1eff8611-ae66-457e-b18b-75e5b6d2d5ad.jpg', 3663, 13),
(88, '6.jpg', 8867, 0),
(89, 'DSC_4731.jpg', 2908, 0),
(90, 'DSC_4866.jpg', 2101, 0),
(91, 'stories.png', 4865, 0),
(92, '2.jpg', 43842, 0),
(93, '8.jpg', 39820, 0),
(94, 'ЦФиолетовый.jpg', 4107, 0),
(95, 'logo_gorizontal.png', 23584, 1),
(96, 'Ноут--первый-экран.png', 1036391, 1),
(97, '1-1.png', 40848, 0),
(98, '3-3.jpg', 43119, 0),
(99, '9.jpg', 37661, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`) VALUES
(1, 'Заголовок новости №1', 'Тект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большой\r\n\r\nТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большой'),
(2, 'Заголовок новости №2', 'Тект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большой\r\n\r\nТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большой\r\n\r\nТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большойТект новости большой');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `image` varchar(256) NOT NULL,
  `price` int(11) NOT NULL,
  `descr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `descr`) VALUES
(1, 'iPhone', 'iphone.jpg', 79990, 'Самый лучший телефон'),
(2, 'Samsung', 'samsung.jpg', 69990, 'Еще один самый лучший телефон');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
