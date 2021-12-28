-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2021 年 12 月 28 日 07:53
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `blog`
--

-- --------------------------------------------------------

--
-- 資料表結構 `article`
--

CREATE TABLE `article` (
  `artid` int(3) NOT NULL,
  `arttitle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `artcontent` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `artdate` date NOT NULL DEFAULT current_timestamp(),
  `artposter` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `artclick` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `article`
--

INSERT INTO `article` (`artid`, `arttitle`, `artcontent`, `artdate`, `artposter`, `artclick`) VALUES
(1, '測試標題', '內容內容內容內容內容內容內容內容內容內容內容內容', '2021-12-14', '測試者', 10),
(2, '1228', '新的內容新的內容新的內容新的內容新的內容新的內容新的內容新的內容新的內容新的內容新的內容', '2021-12-14', '測試者', 1),
(5, '測試標題2', '文章內容144555', '2021-12-21', '管理者', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `uid` varchar(50) NOT NULL,
  `upass` varchar(100) NOT NULL,
  `uname` varchar(10) NOT NULL,
  `uauth` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`uid`, `upass`, `uname`, `uauth`) VALUES
('admin', '1234', '管理者', '9');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`artid`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `article`
--
ALTER TABLE `article`
  MODIFY `artid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
