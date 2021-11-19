-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 21 2021 г., 22:29
-- Версия сервера: 5.6.41-log
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `training`
--

-- --------------------------------------------------------

--
-- Структура таблицы `course`
--

CREATE TABLE `course` (
  `course_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `course`
--

INSERT INTO `course` (`course_id`, `name`, `description`) VALUES
(1, 'Drupal', 'Content Management System'),
(2, 'Wordpress', 'Content Management System'),
(3, 'php', 'lang php');

-- --------------------------------------------------------

--
-- Структура таблицы `history`
--

CREATE TABLE `history` (
  `history_id` int(10) UNSIGNED NOT NULL COMMENT 'Primary key: unique history ID',
  `trainee_id` int(10) UNSIGNED NOT NULL COMMENT 'Trainee ID',
  `course_id` int(10) UNSIGNED NOT NULL COMMENT 'Course ID',
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `history`
--

INSERT INTO `history` (`history_id`, `trainee_id`, `course_id`, `start`, `end`, `status`) VALUES
(1, 2, 1, 1631642400, 1632248955, 1),
(2, 1, 2, 1632076155, 1632184155, 0),
(3, 3, 3, 1631642400, 1629480894, 1),
(4, 1, 3, 1626802494, 1629480894, 1),
(5, 1, 1, 1631642400, 1632248955, 1),
(6, 1, 1, 1631642400, 1632248955, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `trainee`
--

CREATE TABLE `trainee` (
  `trainee_id` int(10) UNSIGNED NOT NULL COMMENT 'Primary key: unique trainee ID',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `trainee`
--

INSERT INTO `trainee` (`trainee_id`, `name`, `email`) VALUES
(1, 'Sergey', 'keyn620@gmail.com'),
(2, 'Alex', 'd1vinee@vk.com'),
(3, 'Nastya', 'nst4rv@vk.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Индексы таблицы `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`);

--
-- Индексы таблицы `trainee`
--
ALTER TABLE `trainee`
  ADD PRIMARY KEY (`trainee_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `trainee`
--
ALTER TABLE `trainee`
  MODIFY `trainee_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary key: unique trainee ID', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
