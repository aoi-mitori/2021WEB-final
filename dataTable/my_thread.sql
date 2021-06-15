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
  `point` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `my_thread`
--

INSERT INTO `my_thread` (`id`, `root_thread_id`, `board_id`, `time`, `nickname`, `title`, `content`, `account`, `point`) VALUES
(93, 0, 1, '2021-06-14 15:29:45', '助教', '好像掉圖了？', '好像掉圖了？\r\n下面的權限是什麼意思？', 'TA', 0),
(97, 0, 3, '2021-06-14 22:16:14', '安安', '今天吃什麼', '早餐(oj)\r\n午餐(dice-six)\r\n晚餐(queen-rainbow)', 'ann', 0),
(107, 93, 0, '2021-06-15 01:24:28', 'LeeDong', NULL, '就是設定高於權限的人才可以閱讀', 'LeeDong', 0),
(126, 0, 7, '2021-06-15 05:45:23', '助教', '<script>alert(\"OAO\");</script>', '12313213213', 'TA', 10),
(127, 126, 0, '2021-06-15 05:45:55', '助教', NULL, '字被擋住了看不到', 'TA', 0),
(128, 126, 0, '2021-06-15 05:46:07', '助教', NULL, '(queen-rainbow)', 'TA', 0),
(129, 126, 0, '2021-06-15 05:46:13', '助教', NULL, '(queen-rainbow)', 'TA', 0),
(131, 0, 1, '2021-06-15 05:49:06', '助教', '<script>alert(\"OAO\");</script>', 'ㄉˇ', 'TA', 0),
(136, 97, 0, '2021-06-15 07:02:08', '卡比', NULL, '(oj)今天天氣晴，當然要吃蛋餅ＸＤ\r\n', '123', 0),
(137, 97, 0, '2021-06-15 07:04:04', 'Tim', NULL, '可樂餅(oj)\r\n炒泡麵(dice-six)\r\n火鍋(queen-rainbow)', '234', 0),
(138, 97, 0, '2021-06-15 07:05:29', 'ann', NULL, '午餐吃炒泡麵，晚餐吃火鍋\r\n好像有點不健康owo\r\n剩早餐ㄌ 我豪餓• ࡇ •', 'ann', 0),
(139, 97, 0, '2021-06-15 07:07:22', 'OAO', NULL, '泡芙(oj)', '345', 0),
(140, 97, 0, '2021-06-15 07:07:40', 'OAO', NULL, '泡芙hen好吃耶\r\n', '345', 0),
(141, 97, 0, '2021-06-15 07:08:41', 'OAO', NULL, '不要吃(oj)', '345', 0),
(142, 97, 0, '2021-06-15 07:09:22', '@@', NULL, '喝水就好(oj)', '456', 0),
(143, 97, 0, '2021-06-15 07:10:12', 'ann', NULL, '為什麼要這樣ＱＱ我好餓ㄟ', 'ann', 0),
(144, 0, 1, '2021-06-15 07:18:23', 'LOL', '小番茄大冒險', '你是一顆(oj)（品種）小番茄', '678', 0),
(145, 144, 0, '2021-06-15 07:19:22', '@@', NULL, '(oj)聖女小蕃茄 （我不知道別的品種ㄌ）', '456', 0),
(146, 144, 0, '2021-06-15 07:20:00', 'Tim', NULL, '(oj)推推聖女小蕃茄', '234', 0),
(147, 144, 0, '2021-06-15 07:20:12', 'Tim', NULL, 'ＡＣ耶好感動（', '234', 0),
(148, 144, 0, '2021-06-15 07:21:08', 'OAO', NULL, '紅寶石(oj)', '345', 0),
(149, 144, 0, '2021-06-15 07:23:51', 'LOL', NULL, '你是一顆晶瑩剔透的紅寶石小番茄，剛被洗乾淨放在盤子上。\r\n「可惡！我就要這樣被吃掉了嗎？我都還沒(dice-six)就要死了嗎ＱＱ」你看著窗外不禁感到一陣淒涼', '678', 0),
(150, 0, 2, '2021-06-15 07:25:33', 'HIHI', '神ㄚ', '演算法作業好難好難ＱＱＱＱ\r\n(oj)\r\n(oj)\r\n(oj)\r\n(oj)\r\n(oj)', '567', 0),
(151, 150, 0, '2021-06-15 07:25:53', 'HIHI', NULL, '哇塞\r\n三個AC耶', '567', 0),
(152, 0, 7, '2021-06-15 07:26:52', '卡比', '比我小的去睡覺', '(dice-six)', '123', 0),
(153, 150, 0, '2021-06-15 07:28:29', '助教', NULL, '現在是在寫轉乘問題ㄇ\r\n\r\nby 去年修演算法的助教', 'TA', 0),
(154, 152, 0, '2021-06-15 07:29:21', '助教', NULL, '(dice-six)\r\n<script>alert(\"你已遭到助教的 XSS 攻擊\");</script>', 'TA', 0),
(155, 152, 0, '2021-06-15 07:29:38', '助教', NULL, 'ＱＱ立刻去睡', 'TA', 0),
(156, 0, 3, '2021-06-15 07:30:17', '助教', '<script>alert(\"你已遭到助教的 XSS 攻擊\");</script>', 'attack', 'TA', 0),
(157, 0, 2, '2021-06-15 07:31:19', '助教', '助教今年可以畢業嗎', '(oj)', 'TA', 0),
(158, 157, 0, '2021-06-15 07:32:00', '助教', NULL, '研究所要放棄嗎\r\n(oj)', 'TA', 0),
(159, 157, 0, '2021-06-15 07:32:37', '助教', NULL, '該不會是要我簽博吧(oj)', 'TA', 0),
(160, 157, 0, '2021-06-15 07:37:14', '簽！', NULL, '簽博！(oj)', '789', 0),
(161, 157, 0, '2021-06-15 07:37:28', '簽！', NULL, 'ㄟ怎麼都是RE', '789', 0),
(162, 157, 0, '2021-06-15 07:37:46', '簽！', NULL, '(oj)(oj)(oj)測試測試', '789', 0),
(163, 152, 0, '2021-06-15 07:40:46', 'LOL', NULL, '(dice-six)', '678', 0),
(164, 0, 1, '2021-06-15 07:40:52', 'SLMT', 'Gogo!', '起飛', 'slmt', 0),
(165, 152, 0, '2021-06-15 07:40:59', 'LOL', NULL, '哈哈哈', '678', 0),
(166, 164, 0, '2021-06-15 07:41:30', 'SLMT', NULL, '(queen-rainbow)', 'slmt', 0),
(167, 164, 0, '2021-06-15 07:41:33', 'SLMT', NULL, '(queen-rainbow)', 'slmt', 0),
(168, 164, 0, '2021-06-15 07:41:35', 'SLMT', NULL, '(queen-rainbow)', 'slmt', 0),
(169, 164, 0, '2021-06-15 07:41:38', 'SLMT', NULL, '(queen-rainbow)', 'slmt', 0),
(170, 164, 0, '2021-06-15 07:41:42', 'SLMT', NULL, '(oj)', 'slmt', 0),
(171, 164, 0, '2021-06-15 07:41:45', 'SLMT', NULL, '(oj)', 'slmt', 0),
(172, 164, 0, '2021-06-15 07:41:47', 'SLMT', NULL, '(oj)', 'slmt', 0),
(173, 164, 0, '2021-06-15 07:41:53', 'SLMT', NULL, '(haha)', 'slmt', 0),
(174, 164, 0, '2021-06-15 07:42:02', 'SLMT', NULL, '(ojjjjjjjjj)', 'slmt', 0),
(175, 164, 0, '2021-06-15 07:42:13', 'SLMT', NULL, '( o j )', 'slmt', 0),
(176, 164, 0, '2021-06-15 07:42:25', 'SLMT', NULL, '(dice-six)(oj)', 'slmt', 0),
(177, 164, 0, '2021-06-15 07:42:32', 'SLMT', NULL, '(dice-six)(oj)', 'slmt', 0),
(178, 157, 0, '2021-06-15 07:47:10', 'tes', NULL, ' (queen-rainbow)', 'test1', 0),
(179, 156, 0, '2021-06-15 07:53:10', 'LOL', NULL, '無駄無駄無駄無駄', '678', 0),
(181, 150, 0, '2021-06-15 08:20:30', 'LeeDong', NULL, '(oj)\r\n(oj)\r\n(oj)\r\n(oj)\r\n快掛惹QQQQ', 'LeeDong', 0),
(182, 144, 0, '2021-06-15 08:29:06', 'LeeDong', NULL, '爆漿\r\n(dice-six)', 'LeeDong', 0),
(183, 144, 0, '2021-06-15 08:31:17', 'LeeDong', NULL, '巨大化\r\n(dice-six)', 'LeeDong', 0),
(184, 152, 0, '2021-06-15 08:32:22', 'LeeDong', NULL, '<script>alert(\"QQ\");</script>', 'LeeDong', 0),
(185, 152, 0, '2021-06-15 08:32:46', 'LeeDong', NULL, '(dice-six)六星骰攻擊！', 'LeeDong', 0),
(186, 97, 0, '2021-06-15 08:34:54', 'LeeDong', NULL, '(oj)', 'LeeDong', 0),
(187, 157, 0, '2021-06-15 09:28:22', '助教', NULL, '(oj)', 'TA', 0),
(188, 157, 0, '2021-06-15 09:28:26', '助教', NULL, '(oj)', 'TA', 0),
(189, 157, 0, '2021-06-15 09:55:39', '龜', NULL, '簽博簽起來(oj)', 'cc125487', 0),
(191, 164, 0, '2021-06-15 10:54:26', 'tim', NULL, 'AAA', 'tim', 0),
(192, 164, 0, '2021-06-15 10:54:46', 'tim', NULL, 'dice-six', 'tim', 0),
(193, 164, 0, '2021-06-15 10:55:13', 'tim', NULL, 'queen-rainbow', 'tim', 0),
(194, 164, 0, '2021-06-15 10:56:11', 'tim', NULL, '(dice-six)', 'tim', 0),
(195, 164, 0, '2021-06-15 10:56:18', 'tim', NULL, '(dice-six)', 'tim', 0),
(196, 164, 0, '2021-06-15 10:56:25', 'tim', NULL, '(dice-six)', 'tim', 0),
(197, 164, 0, '2021-06-15 10:57:03', 'tim', NULL, '(dice-six)(dice-six)(dice-six)(dice-six)(dice-six)(dice-six)(dice-six)(dice-six)(dice-six)(dice-six)', 'tim', 0),
(198, 0, 1, '2021-06-15 11:01:34', '1111', '1111', '1111', '1111', 0),
(199, 152, 0, '2021-06-15 11:16:25', 'li', NULL, '(dice-six)', 'li', 0),
(200, 152, 0, '2021-06-15 11:19:44', 'AAAAA', NULL, '(dice-six)no', 'aaa', 0),
(201, 198, 0, '2021-06-15 11:28:23', 'O-O', NULL, '22222222', '987', 0),
(202, 156, 0, '2021-06-15 11:28:38', 'O-O', NULL, 'wryyyyyyyy', '987', 0),
(203, 150, 0, '2021-06-15 11:30:52', 'HIHI', NULL, '對呀 是轉乘問題\r\n不過我放棄ㄌ(\r\n(queen-rainbow)', '567', 0),
(204, 150, 0, '2021-06-15 11:31:32', 'HIHI', NULL, '助教有ACㄇ', '567', 0),
(205, 144, 0, '2021-06-15 11:33:08', 'LOL', NULL, '「可惡！我就要這樣被吃掉了嗎？我都還沒巨大化就要死了嗎ＱＱ」你看著窗外不禁感到一陣淒涼\r\n這時，你身旁的一顆芒果對你說「(queen-rainbow)」', '678', 0),
(206, 150, 0, '2021-06-15 11:35:51', 'wow', NULL, '(queen-rainbow)', 'wow', 0),
(207, 152, 0, '2021-06-15 13:32:06', 'aloha', NULL, 'oj\r\n', 'aloha123', 0),
(208, 152, 0, '2021-06-15 13:32:21', 'aloha', NULL, '(oj)\r\n', 'aloha123', 0),
(209, 152, 0, '2021-06-15 13:32:36', 'aloha', NULL, '(dice-six)', 'aloha123', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
