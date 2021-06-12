-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2021 年 06 月 12 日 12:48
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `annlin`
--

-- --------------------------------------------------------

--
-- 資料表結構 `my_dice`
--

CREATE TABLE `my_dice` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `thread_id` int(11) NOT NULL DEFAULT 0,
  `number` int(11) NOT NULL DEFAULT 0,
  `is_title` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `my_dice`
--

INSERT INTO `my_dice` (`id`, `type`, `thread_id`, `number`, `is_title`) VALUES
(81, 1, 160, 0, 0),
(82, 1, 161, 1, 0),
(83, 1, 162, 0, 0),
(84, 3, 165, 5, 0),
(85, 3, 166, 3, 0),
(86, 3, 167, 1, 0),
(87, 3, 168, 5, 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `my_dice`
--
ALTER TABLE `my_dice`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `my_dice`
--
ALTER TABLE `my_dice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;