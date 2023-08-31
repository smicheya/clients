-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 31 2023 г., 06:33
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mybd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `job`
--

CREATE TABLE `job` (
  `id_job` int(11) NOT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `job`
--

INSERT INTO `job` (`id_job`, `company_name`, `position`, `user`) VALUES
(129, 'fdvfdv', 'blabladfhdhd', 56),
(132, 'fdvfdv', 'blabladfhdhd', 59),
(133, 'ТКЩ', 'менеджер', 60),
(134, 'OPIml', 'blabladfhdhd', 61),
(136, 'fdvfdv', 'blabladfhdhd', 63),
(137, 'IvP', 'dsvs', 64),
(138, 'UGYUY', 'ihiub', 65),
(139, 'UGYUY', 'fvf', 67),
(140, 'dfvd', 'fdbub', 68),
(141, 'UGYUY', 'developer', 69),
(142, 'fdv', 'ihiub', 70),
(143, 'UGYUY', 'ihiub', 71),
(144, 'dfv', 'eve', 72),
(145, 'UGYUY', 'ihiub', 73),
(146, 'fvd', 'fv', 74),
(147, 'fdvd', 'fdvd', 75),
(148, 'dfvd', 'fv', 76),
(149, 'UGYUY', 'ihiub', 77),
(150, 'fdv', 'fdvd', 78),
(151, 'UGYUY', 'ihiub', 79),
(152, 'dfvdv', 'fvdfv', 80),
(153, 'UGYdfvdUY', 'ihiub', 81),
(154, '5v49f5v', 'ver', 82),
(155, 'UGYUY', 'ihiub', 66),
(157, 'fdvdv', 'dfvd', 84);

-- --------------------------------------------------------

--
-- Структура таблицы `phone`
--

CREATE TABLE `phone` (
  `id_phone` int(11) NOT NULL,
  `area_code` varchar(20) DEFAULT NULL,
  `phone_code` varchar(20) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `phone`
--

INSERT INTO `phone` (`id_phone`, `area_code`, `phone_code`, `phone_number`, `user`) VALUES
(89, '98', '451', '1245', 56),
(92, '', '4566', '565', 59),
(93, '9', '564', '12345', 60),
(94, '', '', '', 61),
(96, '', '', '', 63),
(97, '7', '956', '12345', 64),
(98, '96', '562', '451233', 65),
(99, '96', '562', '451233', 66),
(100, '96', '562', '451233', 67),
(101, '96', '562', '451233', 68),
(102, '96', '562', '451233', 69),
(103, '96', '562', '451233', 70),
(104, '96', '562', '451233', 71),
(105, '96', '562', '451233', 72),
(106, '96', '562', '451233', 73),
(107, '96', '562', '8948', 74),
(108, '96', '562', '516', 75),
(109, '96', '562', '451233', 76),
(110, '96', '562', '451233', 77),
(111, '96', '562', '451233', 78),
(112, '96', '562', '451233', 79),
(113, '', '', '', 80),
(114, '', '', '', 81),
(115, '', '', '', 82),
(117, '', '', '', 84);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `first_name`, `last_name`, `email`) VALUES
(56, 'Аркадий', 'Петров', 'arca@jjjhb.ih'),
(59, 'Максим', 'Романов', 'leon@jjjhb.ih'),
(60, 'Никита', 'Иванов', 'leon@jjjhb.ih'),
(61, 'Иннокентий', 'Миронов', 'mir@jjjhb.ih'),
(63, 'Леон', 'Романов', 'leon@jjjhb.ih'),
(64, 'Иван', 'Петров', 'tfy@fcy.op'),
(65, 'Клиент', 'Петров', 'uhdics@tygvy.sdcnn'),
(66, 'Данил', 'Петров', 'lpo@gmail.ih'),
(67, 'Света', 'Ноева', 'Svet@gmail.ih'),
(68, 'Лена', 'Данилова', 'fdpo@gmail.ih'),
(69, 'Вероника', 'Попова', 'fdfpo@gmail.ih'),
(70, 'Куприян', 'Петров', 'fvfdb@gmail.ih'),
(71, 'Андрей', 'Петров', 'dfdfdfo@gmail.ih'),
(72, 'Петр', 'Петров', 'fd@gmail.ih'),
(73, 'Ирис', 'Ульянова', 'fddo@gmail.ih'),
(74, 'Дима', 'Петров', 'dfgdo@gmail.ih'),
(75, 'Жандор', 'Петров', 'gffgo@gmail.ih'),
(76, 'Михаил', 'Миронов', 'gffb@gmail.ih'),
(77, 'Илья', 'Петров', 'hvy@mail.ih'),
(78, 'Замир', 'Петров', 'dfvdo@gmail.ih'),
(79, 'Жора', 'Андреев', 'jorjoe@gmail.ih'),
(80, 'Куприян', 'Петров', 'kupr@gmail.ih'),
(81, 'Саша', 'Кудрявцева', 'sasha@gmail.ih'),
(82, 'Jared', 'Padaleki', 'jared@gmail.com'),
(84, 'fdv', 'dfvd', 'dfv@fdbfdf.dfbd');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id_job`),
  ADD KEY `job_ibfk_1` (`user`);

--
-- Индексы таблицы `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id_phone`),
  ADD KEY `phone_ibfk_1` (`user`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `job`
--
ALTER TABLE `job`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT для таблицы `phone`
--
ALTER TABLE `phone`
  MODIFY `id_phone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
