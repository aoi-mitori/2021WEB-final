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
-- 資料表結構 `my_thread`
--

CREATE TABLE `my_thread` (
  `id` int(11) NOT NULL,
  `root_thread_id` int(11) DEFAULT 0,
  `board_id` int(11) DEFAULT 0,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `nickname` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `title` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `content` varchar(1024) DEFAULT NULL,
  `account` varchar(1024) CHARACTER SET utf8 DEFAULT NULL,
  `point` int(11) NOT NULL DEFAULT 0,
  `isAnka` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `my_thread`
--

INSERT INTO `my_thread` (`id`, `root_thread_id`, `board_id`, `time`, `nickname`, `title`, `content`, `account`, `point`, `isAnka`) VALUES
(159, 0, 1, '2021-06-12 10:05:40', '567', '1231', '23', '567', 0, 0),
(160, 0, 4, '2021-06-12 10:34:50', '安安', 'TEST-今天晚餐吃什麼', '今天晚餐吃什麼？？(oj)', 'ann', 0, 0),
(161, 160, 0, '2021-06-12 10:35:34', '123', NULL, '吃米粉湯(oj)', '123', 0, 0),
(162, 160, 0, '2021-06-12 10:36:37', '234', NULL, '(oj)BBQ', '234', 0, 0),
(163, 160, 0, '2021-06-12 10:36:56', '234', NULL, '耶BBQ', '234', 0, 0),
(164, 160, 0, '2021-06-12 10:37:49', '安安', NULL, '晚餐吃BBQ~要喝什麼？？', 'ann', 0, 0),
(165, 160, 0, '2021-06-12 10:38:05', '安安', NULL, '(dice-six)', 'ann', 0, 0),
(166, 160, 0, '2021-06-12 10:38:58', '234', NULL, 'ほろよい!!(dice-six)', '234', 0, 0),
(167, 160, 0, '2021-06-12 10:39:45', '345', NULL, '喝鮮奶茶啦！！(dice-six)', '345', 0, 0),
(168, 160, 0, '2021-06-12 10:40:02', '345', NULL, '(dice-six)西瓜汁', '345', 0, 0),
(169, 160, 0, '2021-06-12 10:40:31', '安安', NULL, '西瓜汁喔～好像也不錯ＸＤ', 'ann', 0, 0),
(170, 160, 0, '2021-06-12 10:41:05', '安安', NULL, '謝謝大家～今天晚餐吃BBQ還有喝西瓜汁～', 'ann', 0, 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `my_thread`
--
ALTER TABLE `my_thread`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `my_thread`
--
ALTER TABLE `my_thread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
