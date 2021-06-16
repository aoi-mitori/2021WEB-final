-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:3306
-- 產生時間： 2021 年 06 月 15 日 14:51
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
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `account` varchar(32) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `nickname` varchar(32) NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `point` int(11) NOT NULL DEFAULT 0,
  `path` varchar(258) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `account`, `pwd`, `nickname`, `is_admin`, `point`, `path`) VALUES
(22, 'ann', '7e0d7f8a5d96c24ffcc840f31bce72b2', 'ann', 1, 80, './photos/ann.jpg'),
(27, 'LeeDong', '202cb962ac59075b964b07152d234b70', 'LeeDong', 1, 50, './photos/LeeDong.jpg'),
(28, 'xiang', '341f791ab0ba69957225049573ed560d', 'xiang', 1, 10, './photos/xiang.jpg'),
(29, 'test3', '202cb962ac59075b964b07152d234b70', 'test3', 0, 0, ''),
(30, 'test0614', '09bb9b610c9bdc2393e852c23df1ccf3', '0614', 0, 0, NULL),
(31, 'TA', '81dc9bdb52d04dc20036dbd8313ed055', '助教', 0, 30, NULL),
(32, 'test123', '202cb962ac59075b964b07152d234b70', '123', 0, 5, './photos/test123.png'),
(45, '123', '202cb962ac59075b964b07152d234b70', '卡比', 0, 5, './photos/images/DefaultProfile.png'),
(34, 'tgt', '550a141f12de6341fba65b0ad0433500', '<script>alert(\"RRR\")</script>', 0, 0, './photos/tgt.jpg'),
(35, 'testWeb', '202cb962ac59075b964b07152d234b70', 'web', 0, 0, NULL),
(36, 'testWeb123', '202cb962ac59075b964b07152d234b70', '123123', 0, 0, NULL),
(37, 'ttt', '202cb962ac59075b964b07152d234b70', 'ggg', 0, 5, NULL),
(49, '567', '99c5e07b4d5de9d18c350cdf64c5aa3d', 'HIHI', 0, 5, './photos/images/DefaultProfile.png'),
(48, '456', '250cf8b51c773f3f8dc8b4be867a9a02', '@@', 0, 0, './photos/images/DefaultProfile.png'),
(47, '345', 'd81f9c1be2e08964bf9f24b15f0e4900', 'OAO', 0, 0, './photos/images/DefaultProfile.png'),
(46, '234', '289dff07669d7a23de0ef88d2f7129e7', 'Tim', 0, 0, './photos/images/DefaultProfile.png'),
(50, '678', '9fe8593a8a330607d76796b35c64c600', 'LOL', 0, 5, './photos/678.jpg'),
(54, '987', 'df6d2338b2b8fce1ec2f6dda0a630eb0', 'O-O', 0, 5, './photos/987.jpg'),
(51, 'test1', '202cb962ac59075b964b07152d234b70', 'tes', 0, 0, './photos/images/DefaultProfile.png'),
(52, '789', '68053af2923e00204c3ca7c6a3150cf7', '簽！', 0, 0, './photos/images/DefaultProfile.png'),
(53, 'slmt', '098f6bcd4621d373cade4e832627b4f6', 'SLMT', 0, 5, './photos/slmt.jpg'),
(55, 'cc125487', '324e58da48a3283ecd3d96af1a7d0b3e', '龜', 0, 0, './photos/cc125487.jpg'),
(56, 'tim', '698d51a19d8a121ce581499d7b701668', 'tim', 0, 0, './photos/images/DefaultProfile.png'),
(57, '1111', 'b59c67bf196a4758191e42f76670ceba', '1111', 0, 5, './photos/images/DefaultProfile.png'),
(58, 'li', '699a474e923b8da5d7aefbfc54a8a2bd', 'li', 0, 0, './photos/images/DefaultProfile.png'),
(59, 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', 'AAAAA', 0, 0, './photos/images/DefaultProfile.png'),
(60, 'weeeee', '7f57ff8f1c1ac13393a5b95b902ec33f', 'weeeeee', 0, 0, './photos/images/DefaultProfile.png'),
(61, 'wow', 'bcedc450f8481e89b1445069acdc3dd9', 'wow', 0, 0, './photos/images/DefaultProfile.png'),
(62, 'aloha123', '55dd3d4e4a05c14a505752a8b21632af', 'aloha', 0, 0, './photos/images/DefaultProfile.png');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
