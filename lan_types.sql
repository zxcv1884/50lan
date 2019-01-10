-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2019 年 01 月 06 日 07:35
-- 伺服器版本: 5.7.20
-- PHP 版本： 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `50lan`
--

-- --------------------------------------------------------

--
-- 資料表結構 `lan_types`
--

CREATE TABLE `lan_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` char(3) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `lan_types`
--

INSERT INTO `lan_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, '找好茶', '2018-12-22 02:41:18', '2018-12-22 02:41:18'),
(2, '找奶茶', '2018-12-22 02:41:18', '2018-12-22 02:41:18'),
(3, '找新鮮', '2018-12-22 02:41:18', '2018-12-22 02:41:18'),
(4, '找拿鐵', '2018-12-22 02:41:18', '2018-12-22 02:41:18');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `lan_types`
--
ALTER TABLE `lan_types`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `lan_types`
--
ALTER TABLE `lan_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
