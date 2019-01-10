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
-- 資料表結構 `lan_drinks`
--

CREATE TABLE `lan_drinks` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `drink` char(6) CHARACTER SET utf8 NOT NULL,
  `drink_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `lan_drinks`
--

INSERT INTO `lan_drinks` (`id`, `type_id`, `drink`, `drink_price`, `created_at`, `updated_at`) VALUES
(1, 1, '紅茶', 30, '2018-12-22 02:41:18', '2018-12-22 02:41:18'),
(2, 1, '綠茶', 30, '2018-12-22 02:41:18', '2018-12-22 02:41:18'),
(3, 1, '四季春茶', 30, '2018-12-22 02:41:18', '2018-12-22 02:41:18'),
(4, 1, '黃金烏龍', 30, '2018-12-22 02:41:18', '2018-12-22 02:41:18'),
(5, 2, '奶茶', 50, '2018-12-22 02:41:18', '2018-12-22 02:41:18'),
(6, 2, '奶綠', 50, '2018-12-22 02:41:18', '2018-12-22 02:41:18'),
(7, 2, '奶青', 50, '2018-12-22 02:41:18', '2018-12-22 02:41:18'),
(8, 2, '奶烏', 50, '2018-12-22 02:41:18', '2018-12-22 02:41:18'),
(9, 3, '金桔檸檬', 45, '2018-12-22 02:41:18', '2018-12-22 02:41:18'),
(10, 3, '8冰茶', 50, '2018-12-22 02:41:18', '2018-12-22 02:41:18'),
(11, 3, '檸檬梅汁', 50, '2018-12-22 02:41:18', '2018-12-22 02:41:18'),
(12, 4, '紅茶拿鐵', 60, '2018-12-22 02:41:18', '2018-12-22 02:41:18'),
(13, 4, '阿華田拿鐵', 65, '2018-12-22 02:41:18', '2018-12-22 02:41:18'),
(14, 4, '可可芭蕾拿鐵', 70, '2018-12-22 02:41:18', '2018-12-22 02:41:18'),
(15, 4, '烏龍拿鐵', 60, '2018-12-22 02:41:18', '2018-12-22 02:41:18');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `lan_drinks`
--
ALTER TABLE `lan_drinks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `50lan_drinks_type_id_foreign` (`type_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `lan_drinks`
--
ALTER TABLE `lan_drinks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `lan_drinks`
--
ALTER TABLE `lan_drinks`
  ADD CONSTRAINT `50lan_drinks_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `lan_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
