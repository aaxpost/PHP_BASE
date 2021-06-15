-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 15 2021 г., 21:01
-- Версия сервера: 5.6.41
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `board`
--

-- --------------------------------------------------------

--
-- Структура таблицы `board_data`
--

CREATE TABLE `board_data` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `date_publication` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `text` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `board_data`
--

INSERT INTO `board_data` (`id`, `order`, `date_publication`, `date_update`, `text`, `user_id`, `category_id`) VALUES
(1, 1, '2021-04-04 00:00:00', '2021-06-12 22:00:00', 'Первое объявление.Первое объявление.Первое объявление.Первое объявление.Первое объявление.Первое объявление.Первое объявление.Первое объявление.Первое объявление.', 1, 2),
(2, 2, '2021-04-06 00:00:00', '2021-06-15 20:52:58', 'Второе объявление.Второе объявление.Второе объявление.Второе объявление.Второе объявление.Второе объявление.Второе объявление.Второе объявление.', 1, 2),
(3, 1, '2021-06-01 00:00:00', '2021-06-13 22:13:47', 'Третье объявление.Третье объявление.Третье объявление.Третье объявление.Третье объявление.Третье объявление.Третье объявление.Третье объявление.', 1, 1),
(4, 8, '2021-04-13 00:00:00', '2021-06-13 22:14:11', 'Четвертое объявление.Четвертое объявление.Четвертое объявление.Четвертое объявление.Четвертое объявление.Четвертое объявление.', 1, 2),
(5, 0, '2021-06-13 22:33:09', '2021-06-13 22:33:09', 'Продам трактор. Тест объявления 13/06/2021 / 22/32/10', 1, 2),
(6, 0, '2021-06-13 22:50:47', '2021-06-13 22:50:47', 'Продам бу мотоблок. Цена 10000 грн. Тест 13/06 22/50', 1, 3),
(7, 0, '2021-06-15 20:59:15', '2021-06-15 20:59:15', 'Продам бу мотоблока. Проверка перед отправкой. 15 июля.', 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Все объявления'),
(2, 'Продажа тракторов'),
(3, 'Б/у мотоблоки');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(1, 'admin', '$2y$10$49kWUNi1/PjttBLYzGgzN.xRMCD7wXlg6aDv8OTc3Mi596qJsQaK2');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `board_data`
--
ALTER TABLE `board_data`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `board_data`
--
ALTER TABLE `board_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
