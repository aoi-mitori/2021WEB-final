-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:3306
-- 產生時間： 2021 年 06 月 15 日 14:50
-- 伺服器版本： 10.3.16-MariaDB
-- PHP 版本： 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `id16924826_database`
--

-- --------------------------------------------------------

--
-- 資料表結構 `my_dice`
--

CREATE TABLE `my_dice` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `thread_id` int(11) NOT NULL DEFAULT 0,
  `number` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `my_dice`
--

INSERT INTO `my_dice` (`id`, `type`, `thread_id`, `number`) VALUES
(16, 1, 97, 1),
(17, 3, 97, 1),
(18, 2, 97, 3),
(37, 2, 128, 2),
(38, 2, 129, 5),
(39, 1, 136, 0),
(40, 1, 137, 2),
(41, 3, 137, 1),
(42, 2, 137, 3),
(43, 1, 139, 0),
(44, 1, 141, 2),
(45, 1, 142, 1),
(46, 1, 144, 1),
(47, 1, 145, 0),
(48, 1, 146, 0),
(49, 1, 148, 1),
(50, 3, 149, 0),
(51, 1, 150, 0),
(52, 1, 150, 2),
(53, 1, 150, 0),
(54, 1, 150, 1),
(55, 1, 150, 0),
(56, 3, 152, 2),
(57, 3, 154, 0),
(58, 1, 157, 1),
(59, 1, 158, 1),
(60, 1, 159, 1),
(61, 1, 160, 1),
(62, 1, 162, 2),
(63, 1, 162, 2),
(64, 1, 162, 0),
(65, 3, 163, 3),
(66, 2, 166, 5),
(67, 2, 167, 5),
(68, 2, 168, 1),
(69, 2, 169, 0),
(70, 1, 170, 0),
(71, 1, 171, 1),
(72, 1, 172, 2),
(73, 3, 176, 5),
(74, 1, 176, 0),
(75, 3, 177, 4),
(76, 1, 177, 0),
(77, 2, 178, 4),
(79, 1, 181, 0),
(80, 1, 181, 0),
(81, 1, 181, 1),
(82, 1, 181, 0),
(83, 3, 182, 2),
(84, 3, 183, 0),
(85, 3, 185, 4),
(86, 1, 186, 1),
(87, 1, 187, 0),
(88, 1, 188, 2),
(89, 1, 189, 1),
(90, 3, 194, 5),
(91, 3, 195, 5),
(92, 3, 196, 2),
(93, 3, 197, 4),
(94, 3, 197, 1),
(95, 3, 197, 2),
(96, 3, 197, 1),
(97, 3, 197, 4),
(98, 3, 197, 1),
(99, 3, 197, 4),
(100, 3, 197, 4),
(101, 3, 197, 1),
(102, 3, 197, 2),
(103, 3, 199, 5),
(104, 3, 200, 5),
(105, 2, 203, 2),
(106, 2, 205, 0),
(107, 2, 206, 2),
(108, 1, 208, 1),
(109, 3, 209, 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
