-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 21 2023 г., 15:48
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `admin2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Bookings`
--

CREATE TABLE `Bookings` (
  `booking_id` int NOT NULL,
  `property_id` int NOT NULL,
  `user_id` int NOT NULL,
  `check_in_date` date DEFAULT NULL,
  `check_out_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `Bookings`
--

INSERT INTO `Bookings` (`booking_id`, `property_id`, `user_id`, `check_in_date`, `check_out_date`) VALUES
(1, 3, 1, NULL, NULL),
(2, 3, 1, '2023-11-22', '2023-11-29'),
(3, 2, 1, '2023-11-22', '2023-11-29'),
(4, 2, 1, '2023-11-22', '2023-11-29'),
(5, 1, 1, '2023-11-22', '2023-11-29'),
(6, 1, 1, '2023-11-22', '2023-11-29');

-- --------------------------------------------------------

--
-- Структура таблицы `properties`
--

CREATE TABLE `properties` (
  `property_id` int NOT NULL,
  `img` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `properties`
--

INSERT INTO `properties` (`property_id`, `img`, `title`, `price`) VALUES
(1, 'img/1.png', '3-комнатная квартира', '45000'),
(2, 'img/2.png', '2-комнатная квартира', '10000'),
(3, 'img/3.png', '4-комнатная квартира', '25000'),
(4, 'img/4.png', '1-комнатная квартира', '15000'),
(5, 'img/5.png', '2-комнатная квартира', '20000');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `email`, `comment`) VALUES
(286, 'Александр', 'alexander.prokhor@mail.ru', 'Лучший магазин товаров'),
(287, 'Кирилл', 'kirik@gmail.com', 'ТОВАРЫ ПРОСТО ТОП!!!!!!'),
(289, 'Данила', 'dankurov@icloud.com', 'ВСЕМ ДРУЗЬЯМ БУДУ СОВЕТОВАТЬ)'),
(290, 'РуZлан ', 'ryzik@mail.com', 'Приобрел у вас комп и что хочу сказать - товар просто лучший!'),
(291, 'РуZZкий', 'ruzik@gmail.com', 'Лучшие товары по низким ценам)'),
(292, 'Александр', 'alexander.prokhor@mail.ru', 'Хорогукпфукпрур');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `name`, `pass`, `email`) VALUES
(152, '', '', ''),
(153, 'gdhgfgfjjfjf', '324757325757657', 'alexander.prokhor@mail.ru'),
(154, 'gdhgfgfjjfjf', '324757325757657', 'alexander.prokhor@mail.ru'),
(155, 'gdhgfgfjjfjf', '324757325757657', 'alexander.prokhor@mail.ru'),
(156, '', '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Bookings`
--
ALTER TABLE `Bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Индексы таблицы `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`property_id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Bookings`
--
ALTER TABLE `Bookings`
  MODIFY `booking_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `properties`
--
ALTER TABLE `properties`
  MODIFY `property_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
