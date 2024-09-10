-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 10, 2024 at 04:38 AM
-- Server version: 10.11.8-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u162889419_trips`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('09cbf8d415496d13427a6606692f6465', 'i:1;', 1720374093),
('09cbf8d415496d13427a6606692f6465:timer', 'i:1720374093;', 1720374093),
('0e23e4fcb45c4402cdb96f3aa66cf74a', 'i:1;', 1721507830),
('0e23e4fcb45c4402cdb96f3aa66cf74a:timer', 'i:1721507830;', 1721507830),
('1078f8dd8a6e4a00614863eed2006a47', 'i:1;', 1722588939),
('1078f8dd8a6e4a00614863eed2006a47:timer', 'i:1722588939;', 1722588939),
('14f8bcc75c03c15287369566b23e0eeb', 'i:1;', 1722347414),
('14f8bcc75c03c15287369566b23e0eeb:timer', 'i:1722347414;', 1722347414),
('159abb8ddcb16b6ee6338e4154f080df', 'i:1;', 1720359088),
('159abb8ddcb16b6ee6338e4154f080df:timer', 'i:1720359088;', 1720359088),
('164feaf474f084b1c56c4c32296b671a', 'i:1;', 1722870069),
('164feaf474f084b1c56c4c32296b671a:timer', 'i:1722870069;', 1722870069),
('235651717cc183c22a9dce7c50681639', 'i:1;', 1724932914),
('235651717cc183c22a9dce7c50681639:timer', 'i:1724932914;', 1724932914),
('29280658cc763663740389a2491a5264', 'i:1;', 1720078846),
('29280658cc763663740389a2491a5264:timer', 'i:1720078846;', 1720078846),
('292d4134d6b4c6ef628b68b19445d284', 'i:1;', 1720346157),
('292d4134d6b4c6ef628b68b19445d284:timer', 'i:1720346157;', 1720346157),
('2a5b0e5db2c69f5e26f6f55f89a77f3b', 'i:1;', 1724266938),
('2a5b0e5db2c69f5e26f6f55f89a77f3b:timer', 'i:1724266938;', 1724266938),
('30f375cbe3288efc9948719158dc65a0', 'i:1;', 1724842858),
('30f375cbe3288efc9948719158dc65a0:timer', 'i:1724842858;', 1724842858),
('34266de70cfbbfb735fd923d9a6636a3', 'i:1;', 1721459795),
('34266de70cfbbfb735fd923d9a6636a3:timer', 'i:1721459795;', 1721459795),
('422abfb4f38b98cd29afc334faf1a2b1', 'i:1;', 1720522035),
('422abfb4f38b98cd29afc334faf1a2b1:timer', 'i:1720522035;', 1720522035),
('5145511c6ddad26936996810f70c0b3d', 'i:1;', 1722935394),
('5145511c6ddad26936996810f70c0b3d:timer', 'i:1722935394;', 1722935394),
('59dc38dca317f21436708b6adc8589f0', 'i:1;', 1722256325),
('59dc38dca317f21436708b6adc8589f0:timer', 'i:1722256325;', 1722256325),
('5a8196d3e01784aafc6392bb34331818', 'i:1;', 1722357800),
('5a8196d3e01784aafc6392bb34331818:timer', 'i:1722357800;', 1722357800),
('6f61a612e7a83f2521d4c22884705c7e', 'i:1;', 1721508775),
('6f61a612e7a83f2521d4c22884705c7e:timer', 'i:1721508775;', 1721508775),
('6f6ceb8ad4a0397e2186bca146928e3c', 'i:1;', 1723715962),
('6f6ceb8ad4a0397e2186bca146928e3c:timer', 'i:1723715962;', 1723715962),
('7dafd51809fadfb9154c959c81f000fe', 'i:1;', 1719945342),
('7dafd51809fadfb9154c959c81f000fe:timer', 'i:1719945342;', 1719945342),
('83943cd3abe6e98603e43b2195613ab6', 'i:1;', 1725878268),
('83943cd3abe6e98603e43b2195613ab6:timer', 'i:1725878268;', 1725878268),
('86ed20012f2f717eaf68700b016fdacd', 'i:1;', 1722086269),
('86ed20012f2f717eaf68700b016fdacd:timer', 'i:1722086269;', 1722086269),
('8a845f7731e4f870a5364ee4e584a402', 'i:1;', 1722164117),
('8a845f7731e4f870a5364ee4e584a402:timer', 'i:1722164117;', 1722164117),
('8a90a1965e9fcd653b0388700e42a31f', 'i:1;', 1721739020),
('8a90a1965e9fcd653b0388700e42a31f:timer', 'i:1721739020;', 1721739020),
('8ac6c268f2fa6bbfbb7f1575d4cbb3bd', 'i:1;', 1720176276),
('8ac6c268f2fa6bbfbb7f1575d4cbb3bd:timer', 'i:1720176276;', 1720176276),
('8b4c67728eb8012cad2752fd91a1583a', 'i:3;', 1720078790),
('8b4c67728eb8012cad2752fd91a1583a:timer', 'i:1720078790;', 1720078790),
('928ebb45da1a91d528b614db2509db48', 'i:1;', 1721993549),
('928ebb45da1a91d528b614db2509db48:timer', 'i:1721993549;', 1721993549),
('9888ede02fb8ebdb02ecbe5d8523929b', 'i:1;', 1720346316),
('9888ede02fb8ebdb02ecbe5d8523929b:timer', 'i:1720346316;', 1720346316),
('a061f649a9254a6aebb414f3ec67d7fa', 'i:1;', 1724932910),
('a061f649a9254a6aebb414f3ec67d7fa:timer', 'i:1724932910;', 1724932910),
('a5d04e9dc413767de883344dcb8e70ac', 'i:1;', 1721287924),
('a5d04e9dc413767de883344dcb8e70ac:timer', 'i:1721287924;', 1721287924),
('af2745908c1ce4d97d4caf25c6176bcd', 'i:2;', 1720433732),
('af2745908c1ce4d97d4caf25c6176bcd:timer', 'i:1720433732;', 1720433732),
('b76366c1d07e9c7407dee707d27a6b61', 'i:1;', 1723715942),
('b76366c1d07e9c7407dee707d27a6b61:timer', 'i:1723715942;', 1723715942),
('bc04dc33499c781a81d8706a120c5bf9', 'i:1;', 1721904063),
('bc04dc33499c781a81d8706a120c5bf9:timer', 'i:1721904063;', 1721904063),
('c4d30d2b8a629167eec2afc7836bbdc8', 'i:1;', 1724139227),
('c4d30d2b8a629167eec2afc7836bbdc8:timer', 'i:1724139227;', 1724139227),
('c75457e5ce077d9d3a4687f820ab2269', 'i:2;', 1719945728),
('c75457e5ce077d9d3a4687f820ab2269:timer', 'i:1719945728;', 1719945728),
('cbeaf484deb69dd2c960d2a97ce397ef', 'i:2;', 1720176083),
('cbeaf484deb69dd2c960d2a97ce397ef:timer', 'i:1720176083;', 1720176083),
('d41341ff02e872583a488317b27ce980', 'i:1;', 1722342032),
('d41341ff02e872583a488317b27ce980:timer', 'i:1722342032;', 1722342032),
('d98036ed3655da6d7562f767a2307a66', 'i:1;', 1723462205),
('d98036ed3655da6d7562f767a2307a66:timer', 'i:1723462205;', 1723462205),
('e06d6eaded40fb2d495ff8f413c0c1a0', 'i:1;', 1723740350),
('e06d6eaded40fb2d495ff8f413c0c1a0:timer', 'i:1723740350;', 1723740350),
('e159e7800a3d9c3793e2ecdb73e3f6c5', 'i:1;', 1720429407),
('e159e7800a3d9c3793e2ecdb73e3f6c5:timer', 'i:1720429407;', 1720429407),
('e51da3c0338f6bc411b2be830b13fc62', 'i:1;', 1720346141),
('e51da3c0338f6bc411b2be830b13fc62:timer', 'i:1720346141;', 1720346141),
('edf3bebf888cf22e6fbd26e66ff493d7', 'i:1;', 1725207785),
('edf3bebf888cf22e6fbd26e66ff493d7:timer', 'i:1725207785;', 1725207785),
('f3e7d8549718c9ea5b93b3a77174a313', 'i:1;', 1720521987),
('f3e7d8549718c9ea5b93b3a77174a313:timer', 'i:1720521987;', 1720521987),
('f7b718f5801390a1065b2097a5e8f575', 'i:1;', 1720433836),
('f7b718f5801390a1065b2097a5e8f575:timer', 'i:1720433836;', 1720433836),
('f9ceb92106ad6f32f7313ad9d15a37c7', 'i:1;', 1720434058),
('f9ceb92106ad6f32f7313ad9d15a37c7:timer', 'i:1720434058;', 1720434058),
('fa2bd6ad0ca63ad704fbe56acf4e8673', 'i:1;', 1720774019),
('fa2bd6ad0ca63ad704fbe56acf4e8673:timer', 'i:1720774019;', 1720774019),
('fd2bfe43ebd76d622d677c560e235f14', 'i:1;', 1722345069),
('fd2bfe43ebd76d622d677c560e235f14:timer', 'i:1722345069;', 1722345069),
('info@imusafir.pk|2a09:bac2:18b:105::1a:9d', 'i:2;', 1720433732),
('info@imusafir.pk|2a09:bac2:18b:105::1a:9d:timer', 'i:1720433732;', 1720433732),
('info@imusafir.pk|2a09:bac3:188:105::1a:d3', 'i:1;', 1720433836),
('info@imusafir.pk|2a09:bac3:188:105::1a:d3:timer', 'i:1720433836;', 1720433836),
('khnouman@gmail.com|103.137.24.217', 'i:1;', 1720346141),
('khnouman@gmail.com|103.137.24.217:timer', 'i:1720346141;', 1720346141),
('khnouman@gmail.com|118.107.130.226', 'i:1;', 1724932910),
('khnouman@gmail.com|118.107.130.226:timer', 'i:1724932910;', 1724932910),
('khnouman@gmail.com|138.199.60.173', 'i:1;', 1723715942),
('khnouman@gmail.com|138.199.60.173:timer', 'i:1723715942;', 1723715942),
('khnouman@gmail.com|159.196.168.255', 'i:2;', 1720176083),
('khnouman@gmail.com|159.196.168.255:timer', 'i:1720176083;', 1720176083),
('khnouman@gmail.com|182.177.165.10', 'i:1;', 1720521987),
('khnouman@gmail.com|182.177.165.10:timer', 'i:1720521987;', 1720521987),
('khnouman@gmail.com|182.177.167.1', 'i:1;', 1721739020),
('khnouman@gmail.com|182.177.167.1:timer', 'i:1721739020;', 1721739020),
('khnouman@gmail.com|182.177.193.155', 'i:2;', 1719945728),
('khnouman@gmail.com|182.177.193.155:timer', 'i:1719945728;', 1719945728),
('khnouman@gmail.con|2a09:bac3:189:105::1a:a4', 'i:1;', 1720429407),
('khnouman@gmail.con|2a09:bac3:189:105::1a:a4:timer', 'i:1720429407;', 1720429407),
('khnouman@gmail.con|2a09:bac3:18e:105::1a:cb', 'i:3;', 1720078790),
('khnouman@gmail.con|2a09:bac3:18e:105::1a:cb:timer', 'i:1720078790;', 1720078790);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `trip_id`, `description`, `created_at`, `updated_at`) VALUES
(4, 14, 'Advance received 100,000\r\nDriver  30,000\r\nSnow palace 10,000', '2024-07-04 14:45:37', '2024-07-04 14:45:37'),
(5, 14, 'Remaining balance received 130,000', '2024-07-05 12:53:37', '2024-07-05 12:53:37'),
(6, 10, 'Total Cost = 189,000 ( All Received )\r\n29 June Mzd stay = 7000 Paid\r\n2 July  Taobutt Stay = 7000 Paid', '2024-07-05 13:01:10', '2024-07-05 13:01:10'),
(7, 10, 'Shangrila Sharda = 14000 paid', '2024-07-05 14:47:27', '2024-07-05 14:47:27'),
(8, 10, '7000 more paid to muzaffarabad hotel', '2024-07-05 14:47:49', '2024-07-05 14:47:49'),
(9, 9, 'Total Cost 370,000 All Received', '2024-07-05 16:55:27', '2024-07-05 16:55:27'),
(10, 9, 'Transport 150,000 All Paid', '2024-07-05 16:55:40', '2024-07-05 16:55:40'),
(11, 9, 'Hotel Hunza Guest House for 2 Days 60,000 pkr paid', '2024-07-05 16:56:07', '2024-07-05 16:56:07'),
(12, 9, 'Hotel Carvan serai in hunza 23,000 paid', '2024-07-05 16:56:21', '2024-07-05 16:56:21'),
(13, 9, 'Hotel Jovial gold 1 night payment 22,000 paid', '2024-07-05 16:56:41', '2024-07-05 16:56:41'),
(14, 15, 'Tax 4000', '2024-07-05 17:11:29', '2024-07-05 17:11:29'),
(15, 15, 'vadi resort 1200', '2024-07-05 17:11:47', '2024-07-05 17:11:47'),
(16, 15, 'vadi resort 15500', '2024-07-05 17:12:05', '2024-07-05 17:12:05'),
(17, 15, 'Total Hotel Cost 88700', '2024-07-05 17:12:33', '2024-07-05 17:12:33'),
(18, 15, 'Total Transportation 76000', '2024-07-05 17:12:53', '2024-07-05 17:12:53'),
(19, 16, 'Total Transportation 155,000', '2024-07-05 17:18:06', '2024-07-05 17:18:06'),
(20, 16, 'Total Accommodation Expense 155000', '2024-07-05 17:18:43', '2024-07-05 17:18:43'),
(21, 7, 'Taj Hills Resort: 4500', '2024-07-05 17:20:16', '2024-07-05 17:20:16'),
(22, 16, 'Total accommodation 134000', '2024-07-05 17:20:58', '2024-07-05 17:20:58'),
(23, 17, 'Transport:  160,000', '2024-07-05 17:47:00', '2024-07-05 17:47:00'),
(24, 17, 'Hotels: 184840', '2024-07-05 17:47:50', '2024-07-05 17:47:50'),
(25, 17, 'Jeeps+LOI=20000+10000+6000+4500=40500', '2024-07-05 17:48:25', '2024-07-05 17:48:25'),
(26, 17, 'Total Expenses: 385340', '2024-07-05 17:49:04', '2024-07-05 17:49:04'),
(27, 17, 'Profit: 46600', '2024-07-05 17:49:38', '2024-07-05 17:49:38'),
(28, 18, 'Hotels: 57780', '2024-07-05 18:05:47', '2024-07-05 18:05:47'),
(29, 18, 'Transport: 106000', '2024-07-05 18:05:58', '2024-07-05 18:05:58'),
(30, 18, 'Profit: 134220', '2024-07-05 18:06:34', '2024-07-05 18:06:34'),
(31, 19, 'Naran Heritage Hotel: 17000', '2024-07-05 18:12:38', '2024-07-05 18:12:38'),
(32, 14, 'Jovial Gold Naran 66000', '2024-07-06 18:09:32', '2024-07-06 18:09:32'),
(33, 14, 'Driver remaining balance 32000', '2024-07-08 14:03:37', '2024-07-08 14:03:37'),
(34, 10, '13000 paid to Keran Retreat', '2024-07-08 14:09:21', '2024-07-08 14:09:21'),
(36, 10, 'Car + Fuel + Jeeps = 77,500', '2024-07-08 15:16:39', '2024-07-08 15:16:39'),
(37, 10, 'Hotels = 48000', '2024-07-08 15:16:51', '2024-07-08 15:16:51'),
(38, 10, 'Total Cost 189,000 Expenses = 125,500\r\nTotal Profit = 63,500', '2024-07-08 15:18:02', '2024-07-08 15:18:02'),
(39, 14, 'Refund 25000', '2024-07-08 15:22:51', '2024-07-08 15:22:51'),
(40, 9, 'Jovial Gold more 11,000 paid', '2024-07-08 15:37:50', '2024-07-08 15:37:50'),
(41, 9, '29,400 Paid to Mulberry Hotel', '2024-07-08 15:41:44', '2024-07-08 15:41:44'),
(42, 9, 'Total Expenses = 150,000 ( Transport ) + 145,400 ( Hotels )= 295,400', '2024-07-08 15:43:51', '2024-07-08 15:43:51'),
(43, 11, 'Total Cost 280000', '2024-07-08 15:58:54', '2024-07-08 15:58:54'),
(44, 11, '500000 advance received', '2024-07-08 15:59:05', '2024-07-08 15:59:05'),
(45, 27, '60,000 advance received', '2024-07-09 12:40:37', '2024-07-09 12:40:37'),
(46, 29, '25000 advance received', '2024-07-09 15:09:44', '2024-07-09 15:09:44'),
(49, 29, '20000 car vendor advance paid', '2024-07-09 15:48:01', '2024-07-09 15:48:01'),
(50, 7, 'Kashmir Lodges: 4500', '2024-07-09 15:49:26', '2024-07-09 15:49:26'),
(51, 7, 'Transport: 34500', '2024-07-09 15:49:34', '2024-07-09 15:49:34'),
(52, 19, 'Transport: 35400', '2024-07-09 15:51:36', '2024-07-09 15:51:36'),
(53, 19, 'Jeep: 5000', '2024-07-09 15:52:59', '2024-07-09 15:52:59'),
(54, 19, 'Total Expense: 56500', '2024-07-09 15:53:54', '2024-07-09 15:53:54'),
(55, 19, 'Profit: 42500', '2024-07-09 15:54:12', '2024-07-09 15:54:12'),
(56, 29, 'All payment 99000 received', '2024-07-10 18:06:34', '2024-07-10 18:06:34'),
(57, 29, '6000 paid to Green recedencia', '2024-07-10 18:06:56', '2024-07-10 18:06:56'),
(58, 36, '35000 advance received', '2024-07-10 18:19:19', '2024-07-10 18:19:19'),
(59, 37, 'Air Tickets 182511', '2024-07-11 13:15:12', '2024-07-11 13:15:12'),
(60, 36, '8000 paid to Niaz shah relax hotel Kalam', '2024-07-11 13:26:45', '2024-07-11 13:26:45'),
(61, 37, 'Lalazar Shogran 7000', '2024-07-11 14:24:27', '2024-07-11 14:24:27'),
(62, 38, 'Advance by Client: 50000', '2024-07-11 19:29:34', '2024-07-11 19:29:34'),
(63, 38, 'J. Hotel: 5000\r\nadvance', '2024-07-11 19:29:37', '2024-07-11 19:29:37'),
(64, 38, 'Saadain: 30000', '2024-07-11 19:29:47', '2024-07-11 19:29:47'),
(65, 29, '11000 paid to Keran retreat', '2024-07-13 13:51:51', '2024-07-13 13:51:51'),
(66, 29, 'Car Fuel rent Total = 31500', '2024-07-13 13:59:58', '2024-07-13 13:59:58'),
(67, 29, 'Remaining 11500 paid', '2024-07-13 14:00:09', '2024-07-13 14:00:09'),
(68, 37, '6500 lalazar Shogran', '2024-07-18 13:00:21', '2024-07-18 13:00:21'),
(69, 41, 'Total Cost 399000\r\nAdvance Received 80,000', '2024-07-18 15:33:57', '2024-07-18 15:33:57'),
(70, 37, 'Remaining balance received 190,000', '2024-07-22 12:33:19', '2024-07-22 12:33:19'),
(71, 37, '9500 jeeps Expense', '2024-07-22 12:34:40', '2024-07-22 12:34:40'),
(72, 37, 'Fuel and rent 44000', '2024-07-22 12:35:21', '2024-07-22 12:35:21'),
(73, 37, 'Jovial Gold 22000', '2024-07-22 12:35:45', '2024-07-22 12:35:45'),
(74, 37, '7000 Tax', '2024-07-22 14:04:09', '2024-07-22 14:04:09'),
(75, 41, 'Ceedarwood total cost for 2 days = 62000\r\nadvance paid = 20,000', '2024-07-22 15:02:43', '2024-07-22 15:02:43'),
(76, 44, '27500 paid to Pluto Cottage nathiagali', '2024-07-24 15:44:49', '2024-07-24 15:44:49'),
(77, 44, '35000 to Avari xpress', '2024-07-24 15:45:10', '2024-07-24 15:45:10'),
(78, 27, 'Remaining Balance Received 60000', '2024-07-25 15:41:53', '2024-07-25 15:41:53'),
(79, 27, 'Advance Received 60000', '2024-07-25 15:42:41', '2024-07-25 15:42:41'),
(80, 47, 'Advance: 250000', '2024-07-25 16:02:25', '2024-07-25 16:02:25'),
(81, 47, 'Avari Xpress: 23200', '2024-07-25 16:03:48', '2024-07-25 16:03:48'),
(82, 47, 'Roomy Batakundi: 32000', '2024-07-25 16:05:20', '2024-07-25 16:05:20'),
(83, 47, 'Famree Resort 44000', '2024-07-25 16:05:49', '2024-07-25 16:05:49'),
(84, 47, 'Roomy Batakundi: 30790', '2024-07-26 16:31:54', '2024-07-26 16:31:54'),
(85, 44, 'Marjan Hotel 27000', '2024-07-27 18:17:48', '2024-07-27 18:17:48'),
(86, 48, 'Advance: 10000\r\nbalance: 45000', '2024-07-27 18:30:52', '2024-07-27 18:30:52'),
(87, 48, 'Transport: 29400', '2024-08-02 13:55:43', '2024-08-02 13:55:43'),
(88, 48, 'Green Residence: 8000', '2024-08-02 13:56:02', '2024-08-02 13:56:02'),
(89, 47, 'BRV Transport: 38000 Fuel\r\nRent: 59500+4000\r\nTotal: 101500', '2024-08-03 14:54:52', '2024-08-03 14:54:52'),
(90, 47, 'Hotels: \r\nAvari: 23200\r\nBatakundi: 63000\r\nFarmree: 87550\r\nHimmel+Qayyam: 95000\r\nTotal: 268750', '2024-08-03 15:05:02', '2024-08-03 15:05:02'),
(91, 47, 'Total: 370250', '2024-08-03 15:06:16', '2024-08-03 15:06:16'),
(92, 44, 'Islamabad Hotel: 50000', '2024-08-03 15:11:15', '2024-08-03 15:11:15'),
(93, 44, 'Avari Express Total Paid: 69600', '2024-08-03 15:11:29', '2024-08-03 15:11:29'),
(94, 44, 'AVARI: 70,000\r\nISLAMABAD HOTEL: 50000\r\nNATHIAGALI: 28000\r\nSHARDA: 120,000\r\nKERAN: 78000\r\nMARJAN RAWALAKOT: 27000\r\nHOTELS TOTAL: 373,000', '2024-08-05 13:30:17', '2024-08-05 13:30:17'),
(95, 44, 'JEEP:10000', '2024-08-05 13:31:06', '2024-08-05 13:31:06'),
(96, 42, '45,000 Pkr Paid to Zakawat Vendor', '2024-08-06 13:09:57', '2024-08-06 13:09:57'),
(97, 42, '22,500 Paid to Qayam Hunza', '2024-08-06 13:10:46', '2024-08-06 13:10:46'),
(98, 42, '10,000 Paid to Indus lodge gilgit', '2024-08-06 13:10:59', '2024-08-06 13:10:59'),
(99, 42, 'Total Expenses = 45000 + 10,000 + 22,500 =77,500\r\nTotal Trip 95,000\r\n77,500 - 95,000 = 17,500', '2024-08-06 13:12:21', '2024-08-06 13:12:21'),
(100, 44, 'Transport plus jeep: 15550', '2024-08-06 14:10:28', '2024-08-06 14:10:28'),
(101, 44, 'Total Expenses: 509100', '2024-08-06 14:10:53', '2024-08-06 14:10:53'),
(102, 44, 'Total Expenses: 530,000', '2024-08-06 14:11:19', '2024-08-06 14:11:19'),
(103, 50, 'Total Transportation expense 105240', '2024-08-20 11:26:00', '2024-08-20 11:26:00'),
(104, 50, 'Mulberry 63600', '2024-08-20 11:28:41', '2024-08-20 11:28:41'),
(105, 50, 'Killesto Resort 30000', '2024-08-20 11:29:21', '2024-08-20 11:29:21'),
(106, 50, 'Jovial Gold Naran 18000', '2024-08-20 11:44:49', '2024-08-20 11:44:49'),
(107, 50, 'Qayam skardu 74000', '2024-08-22 00:03:18', '2024-08-22 00:03:18'),
(108, 50, 'Total Expenses: 290840', '2024-08-24 17:06:22', '2024-08-24 17:06:22'),
(109, 51, 'Hotels Bill: 338660', '2024-08-26 14:40:11', '2024-08-26 14:40:11'),
(110, 51, 'Transport Bill: 105000', '2024-08-26 14:40:52', '2024-08-26 14:40:52'),
(111, 51, 'Fuel: 84570', '2024-08-26 14:41:01', '2024-08-26 14:41:01'),
(112, 51, 'Lunch + Bottles: 2550+14700=17250', '2024-08-26 14:41:33', '2024-08-26 14:41:33'),
(113, 51, 'Challan + Drivers: 12000', '2024-08-26 14:45:05', '2024-08-26 14:45:05'),
(114, 55, '50,000 advanced received', '2024-08-27 14:43:07', '2024-08-27 14:43:07'),
(115, 55, '10,000 Advance Paid to grand taj Murree', '2024-08-27 14:43:37', '2024-08-27 14:43:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_06_29_093253_add_two_factor_columns_to_users_table', 1),
(5, '2024_06_29_093309_create_personal_access_tokens_table', 1),
(6, '2024_06_29_093959_create_trips_table', 1),
(7, '2024_07_01_100821_create_comments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('khnouman@gmail.com', '$2y$12$5NKReCAeoLxF7m2UYd52lOmx75.paui/U4BZti.8wVGvZfkpaHKNq', '2024-07-03 15:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('04n8yYtQbRMQ83KTPkeW3H2wJbkc4mfLVQOrxJZF', NULL, '167.172.232.142', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVm4wTjdEdnV5M1luQzdMdVVWYVRzTXJmVjk5Njd4b0p6YTJ5YWZsSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725314653),
('0Dwl1nsORx4HHcwrXyDbV3J4QWQlEkAEbceEJmu2', NULL, '2a02:4780:b:7::9', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMExSVWZwWlBEdDNGMHBJNDN3TlhwUWZvOUpBNXBWaUVNcWVwaUl3biI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725510545),
('0tK0ljRII8yLz5fY935MkQNHT5MUtyMj18yJo3pl', NULL, '206.168.34.58', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidUg5UXRUTzhlWk1WdzRTZERhQVcxdVI4a2hBVGVLNnJBOXNRUFQwUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725453102),
('1ik0LrPLXw5JrnriiXTOa6iNi5lKdipalkh2qrjz', NULL, '146.190.242.161', 'Mozilla/5.0 (Linux; Android 6.0; HTC One M9 Build/MRA615981) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.3161.98 Mobile Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUDlLVmx6emZnQ2pRU05CMk1QUFhZMFJvUXVIb1dXSEx3cDR0d0t2TiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725489998),
('1IPD5ukeoQdQLlNqBDs70Uj4vd22hlKa7qxbYzPK', NULL, '2a02:4780:b:7::9', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiN2hKQm1Ramk0SWI1eVVzM1dCZXBHNE1Bb1VSelkzZUVhRmY0OWVMRCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725866538),
('2I7l7dDfbG5ULYePLIm5enSKCxr2R57aXC4BZVSS', NULL, '2a02:4780:b:7::9', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiaWtFckx6dTZCUzVmNmFUREVTd3RNRFVjQW40elUwTVg4UU5QcFJiSiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725683345),
('3sABWisdA1m7RAcnCIYQqYcULWnuWP6aoeWZ2bz8', NULL, '164.92.244.132', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNjZnSkdlZnkwV0Rtak1JWmR3TUVPdHI1bllSMFJyb3h1Sm9oWkJMdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725780707),
('3xae8VITpefxNy3775GlSSNWeI2XwUZELPKxN3eG', NULL, '167.71.175.236', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicjlGS25aRHI1S2gyZGxaTEF3b2tLelc0VnJIMHBBWlhBc3BCVUtOaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsvP3Jlc3Rfcm91dGU9JTJGd3AlMkZ2MiUyRnVzZXJzJTJGIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725316904),
('4NMSTMpUK0iVlPKc58POkGcvhpgidXYkTL2sNW6V', NULL, '164.92.244.132', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaHNZUVZDZTh5NXVKVjJ3Qkt1Qkhkbm8yVDhsbG9hc0FnM1l2aFhOayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsvP3Jlc3Rfcm91dGU9JTJGd3AlMkZ2MiUyRnVzZXJzJTJGIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725780716),
('6OcokxBK0qaTto8wJHyKdhr2uxxegYZu6cpz7fhp', NULL, '162.142.125.46', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTmhyek9CNm00bVo0M09IaEtCMXBwY0l4T1BWdEhHVWt3ZUtxNHp5UCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725458752),
('9DbtYQJLe4FMvNAzak9nEVODFktpn6TqpodsBMBl', NULL, '167.71.175.236', 'Mozilla/5.0 (Linux; Android 6.0; HTC One M9 Build/MRA615981) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.3161.98 Mobile Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTXAzeWMyN2pZU21iQzJzYkx3amxuUWRYSUtLdDRiQ3N1NXgzRVp2UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725316900),
('9DkCYc3foRz3UQ1RqeeygZhquRZfNZRCnMcThvG6', NULL, '2a02:4780:b:7::9', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMVhGSzhpdWRDSmloYVA0emxCUUFQZlB4NkZURnp3WjA3SjRVZlMyNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725337745),
('A9pLLjDPLylMn7hCJBwuzfw3urqO9tE8T4ynhwzb', NULL, '205.210.31.18', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHlTZDNORnh2M3F6Q3ZXQTJndWVReWRRMUhhaUdYZkU0VWp5ZjdKWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725831197),
('aGjoWJUy7TLbagJ5vmyqt9qyeGRfXce5YZ6wlkdh', NULL, '198.235.24.130', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVXZzMjNKYU9UQUdWWVcyRkM5MVlRT1k4RXRxdzJkWkdtQjVmbEp1OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725834128),
('AoT8vHefs8PW5Ys1vrpONFBjO7gCF6u5KSDzTMI5', NULL, '198.235.24.177', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia2ROdjdaYk5HMFFPZVo0Y1cxdjlPTHM5Q0pUN0UxYkZkTjN1UnF2QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725783448),
('ayYb63e4iDN464iY9NaZpKdqb5X5fi3AUTVelgMB', NULL, '46.17.174.172', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:98.0) Gecko/20100101 Firefox/98.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ3VNaGl4ZkF6QlNubjlWM2pCN0FlUG8yMTF5b3NTanBnOVlWR1VGQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725528936),
('bDJdw4ONGJMdtNeYtTgTXwnl9H8D8A9AUWTR3pGO', 1, '182.177.248.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:130.0) Gecko/20100101 Firefox/130.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZHpqZWgzeGdkUE1hNjdGdDhmcHo3c0pDOUc2dlNmWjE5UHpOa0lJbiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwczovL2FkbWluLmltdXNhZmlyLnBrL3RyaXBzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiRaOS85OTNpWFd4WmJWTWVad3A5VVR1ekRoWkptc1p5WDhFWVRpZTRpYnFsYzRoOG1xc1g2bSI7fQ==', 1725878343),
('Bk82M0IV3qTj3E9OBlNmZd7JSWbW3xGwR6DA8vfL', NULL, '209.38.248.17', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUXZwUkR2N0dFdlJzbUFNNHBnNmpoRmY0ZHFIcTlHVUVyR3lPNDhaMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725590308),
('BMDjpE7lwwBSS0LkJQirGpQhJYo0ljpFAkmVgFzM', NULL, '2a02:4780:b:7::9', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiNU5ZRlBwVFlmZG43VG9tUDY5eTRxdmVaVGJaRGpVRk1SellrUVpyaSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725866539),
('bO3JhcjcSTkdOh7ZHFuUDhN6CJMF4IIdhXGei8BT', NULL, '209.38.248.17', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTmptalpxcFBMOUxoV3REZTdVdDBRUXF0V3lja0dac3hEN0tDVHFxeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsvP3Jlc3Rfcm91dGU9JTJGd3AlMkZ2MiUyRnVzZXJzJTJGIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725590316),
('cCV4F5V1TMOdHLYgYP3GkeGPUArem6Hxkf9XT5ol', NULL, '188.165.87.101', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidUo0T0J6Q1drNXVZaHEyeWhldlB2RUpOUFZnOHZCRnE1OXBscVZ0RyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725920208),
('cegPkHeTfo2AwNHHHluK66OHHm4VRISTpr33a8gZ', NULL, '2a02:4780:b:7::9', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMUxUN3FEdU1xdGhWNzR1NWpuRFhoRjA4QU1pY2RNaGVtQUZ4SDJ2WSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725337745),
('clY92tzePg0BGLtLnDmqMquK36YZVGurcYig33rb', NULL, '159.89.17.243', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYU1kOE41Vm55YVA5S2NycDB0Q3AyODVCUE9JM25vRDF1V1kzSXo1TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsvP3Jlc3Rfcm91dGU9JTJGd3AlMkZ2MiUyRnVzZXJzJTJGIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725590316),
('ctsQVfklSyKsCLcEkoIMdSspVtk9UgJ8zeK4CJRJ', NULL, '118.107.130.226', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSkJoZGFYVjVUUFllaGxwYUdqZWFvOTdHQ0FlMTB0R09RUjJYMHRJNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725942901),
('DfnHyU4aQiZoP0LGCDb0OFaow5JSHtdYX6ihz0Tg', NULL, '138.197.191.87', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ0x3ZzE5cExHVWJmMTR6bHgxdDZMdkpOeVFNbVRJMnQ1UnNTNVJXaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725780707),
('E6rtc72DL8CUkuUMjuuYO5kXEat5XpvFzENZCiQ0', NULL, '209.38.248.17', 'Mozilla/5.0 (Linux; Android 6.0; HTC One M9 Build/MRA615981) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.3161.98 Mobile Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiazJoWjVzeUduMFFOZUtIY3RYM203QlFBckN1NEVEZ0ttQ0FQanNpOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725590309),
('Epe54AglkJ3mpZdm3U2GCxvSKLyyU1CcrwWNrhLN', NULL, '164.92.244.132', 'Mozilla/5.0 (Linux; Android 6.0; HTC One M9 Build/MRA615981) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.3161.98 Mobile Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaW03TlY4MndhSHB4blBzbUpHTENLcW55WVhvbG5zMTZkRHdJbzY5MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725780708),
('Fzu9VL2lIkWAOO0LEkQfYEKN3jdKGoym5aqk39J5', NULL, '139.59.136.184', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNVFyS1NkSjl2R01OR1pWa0pqa1dQY2RFNks3V0dHMGZZUHZMUkxhaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725206531),
('G3amB6lEsdS1BDf3cBkYicqw9l9PQLiEVtMBnG0I', NULL, '2a02:4780:b:7::9', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiZ2pmWWZGUXB2VVJnMjA0Ynh5OXdyYWZIbXdYNDMyanZtNXVVOUNrbSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725596945),
('GAn89FfpC5FbAPsUoQZMgWhYWaJP3KAZcLoqtnf2', NULL, '37.187.215.253', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNVFHSU4ySnNzcWhuQmR3THpxM3JqUXpqYVc2MzFURjFyOXdvSFNxNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725928305),
('H6hsfhI5dQN6Eox5TF5c893oqdHrsskamZd9Fnp5', NULL, '146.190.242.161', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibnNKdENnQWtKMmt0SWhFSW5tdldxYmVlVDdiQWZKOUlWV2c1UFd2SiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsvP3Jlc3Rfcm91dGU9JTJGd3AlMkZ2MiUyRnVzZXJzJTJGIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725490001),
('htPheqrhIA4VIiC5RQI8WSPfOisR59Sl0sq97md0', NULL, '3.16.50.169', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.36 Safari/535.7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZE05bGJhbjU0NW1sd1BOZFZ4VmlGWFRzT2hGV1AxeWpsa0s1MlZETyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725913184),
('I6rFfup4VeNAhCPzxBRjHxs8X2s6Ixxzqhz9BO7E', NULL, '198.235.24.44', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidGlibm9MdEFXcHFEUFJJUE1OWk1HR0tCNFpsZVlPb2g4a0NraVNyTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725659368),
('IMPP2irbOrMpyx2KtZtMie7sLWvH9KcJfDkwSZDo', NULL, '198.235.24.130', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYmh3VFpmM0tvcEE3YWw1WUEwSThuazJrZ1pINmJiUm9KQnUwOEVndCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725834127),
('imsCRgAKeCEmTXuFgUALMoZF4BFje20aIJPF5IMm', NULL, '2a02:4780:b:7::9', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMzFWZmx0VVprblRjdTVMcG9XNW0zSXBhQ3p2c3BiS0VpMVB5QlFHdCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725780138),
('Jq2QDpp4UTXijNFGwWZfR8S8dFD31HY3d3u6o4nP', NULL, '172.105.16.117', 'Mozilla/5.0 (Linux; Android 6.0; HTC One M9 Build/MRA615981) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.3161.98 Mobile Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRVpTQUdZUUxEaHExSWV5TEpjWTRxSjZvUmg0eUxuVkFuRFlkbFhGeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725489998),
('Jt51ObrcUnYvqi1d4NHUrTAr72ciRjVCDnQ4bfYy', NULL, '2a02:4780:b:7::9', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiYk5rSUpkbDZTQVd6Q2xaSlN3SW5mSU5Vd1c3cURGejlqMHlaaGRnbiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725683345),
('jyHyfeDRknz8krbddbGkCqqdaI1VTslFumU5p5Fx', NULL, '64.227.187.79', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNnJDeG5paW5ZODBvTXZYZ2hsakQ2MTAxNUJ4OFVRcnppT1M1S0lWUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725367363),
('kGOO1zirpupzLqEW4zCyKLlZAer9XqW2H3RFjhN7', NULL, '3.112.36.181', 'Mozilla/4.1 (compatible; MSIE 5.0; Symbian OS; Nokia 6600;452) Opera 6.20 [en-US]', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRE1kV2luZnRlUkZsR0FoSmhCMGoxb1VseXdtUDE3ZVBzUzlNU3k5SyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725213553),
('kuYbZGlhvHIZsC2BjWsFPnfQwAKf9JM5YjjaBwdN', NULL, '46.17.174.172', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:98.0) Gecko/20100101 Firefox/98.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTTMyZmtNNzBMMFFwMExJMllnZHVJWHN4M29DU3kxYjRUQUJNSVI1bSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725528936),
('lzU51hUrlxURCS6InnLWpS65oDAd6Ept0LC6NTVL', NULL, '167.71.175.236', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSnZPOXdGandtZDFUVkRXbkV3elA4SHNnRm5ZVjgwYXp6dkdDaWdLTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725316900),
('N4SHWXI2lddRMeoL8s60I0FuLWgHVl45POMV9YdO', NULL, '146.190.242.161', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOFhUb2JqV3hCMklvYVYxeDZrR1VWQ3U4RkpkQmR3V21vT2tYR0NFYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725489998),
('OQdT1Q9d269d9AdUHigQhC1wLdKmXLCMuxD9QUB2', NULL, '139.59.136.184', 'Mozilla/5.0 (Linux; Android 6.0; HTC One M9 Build/MRA615981) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.3161.98 Mobile Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTDRhZkg5VFlIZ1VDQmlrdGFTNHR5RXh3Y0JiZktFMDJYV2NRU2l6byI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725206533),
('oRj79hjD8OuZ9UJPtvXiFcCbHBBDYgiThZzcjADz', NULL, '2a02:4780:b:7::9', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiN2FqdFk4U09DdWpyVTd1cm9qVW9TOUN5dVA5blRxa0RjR0NCWWNRTSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725251345),
('OrWEr2Bf1KhMfcSwbfcCeyi9vmk6ebaFIMOyFqtS', NULL, '64.227.32.66', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOHh2NFlaZjRHblpkY1F4SUE3S0hGTlNSMVk5SDNMalM5RklFeFFBdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsvP3Jlc3Rfcm91dGU9JTJGd3AlMkZ2MiUyRnVzZXJzJTJGIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725206539),
('PjB9LlDsw3UqrYCztgV5CYNOBdOQD8GUx74K7K7B', NULL, '2a02:4780:b:7::9', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiZHdYVlFiM1A4TW02d2xSNzhqYnFrbmw1S0ZqSE1xVFgxQU5uT2xpRCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725251345),
('QKJMKT9ohEhOoigpfSXqH9e8YLynI2FDo22OkICA', NULL, '20.55.61.179', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMGpxeERmaTNmcTBLU0RHOHFFaGJNclJyamdza1VXdDZMd1J4NkE2SiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725942895),
('QmATLICOCx6EsUiD0gqPVslDyXD2Fth6xGLt9Nzc', NULL, '146.190.243.20', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSHNQUDFxWXdDTHVQalhYUnBsTnVMWmZLVFoxSXJub2NJenhPY2s5cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725416988),
('qzEDetz8qJ3R0ugNJXyQMOlgPn6Fog09tUp2VjZi', NULL, '162.142.125.46', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZzlITURKU3BoNXVOMjN0Ukx1V1FDSW4zdXE1S3pRdnNsbDhiTlhhaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725458702),
('RIJYCgOisawlt4ignRJEsxLJXKCInQW3sAGc3e2L', NULL, '2a02:4780:b:7::9', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiSkJVbTdJTTNrdDRhaUR1Y0ZLSGhVZklrcjlWYlNFMWFmQkp6WUhjSSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725780139),
('RKtfrq9HRNLZFXnAk2iq2WXaBvv0fZs4QphMCH0w', NULL, '2a02:4780:b:7::9', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiVEs0RWptZ3Q0OHNKVXNRQmFGZjZpeHNpcVl6akUzeldpWGd0dDVNQiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725596945),
('rwQzH65Re1rQKCST4ScxHry4Wql0yqZbvxMq57kw', NULL, '172.105.16.117', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUVGcUFuUW5hQnBVakFxd2xoMVJkMExGR0FDQkRORmJjSGx6YzBYZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725489998),
('s8N7FNTtijgJjlcWcrAzW1qopvQUploL0kkr29TC', NULL, '138.197.191.87', 'Mozilla/5.0 (Linux; Android 6.0; HTC One M9 Build/MRA615981) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.3161.98 Mobile Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZk1jUkYzRFp2VzhleDZhbG5JSEl0N0gyVGJuY25TdGxZRExPcXVqSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725780708),
('seISDjOi6P4ATNS3QvH1MDYXhxxIYaA18IkZcAW6', NULL, '172.105.16.117', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUmRyVUNRQ1hYMmpzS3RnMVlFUkYyYWZmWHM3bDl4Rmc1eFAwMWJNUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsvP3Jlc3Rfcm91dGU9JTJGd3AlMkZ2MiUyRnVzZXJzJTJGIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725490001),
('sKnEctMCo5V9MQjBorXFdWKutgTr2XsqD6FCllrw', NULL, '64.227.32.66', 'Mozilla/5.0 (Linux; Android 6.0; HTC One M9 Build/MRA615981) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.3161.98 Mobile Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOEo5QndCSDU5b0NXdEJLaFZ4TEFDT0xlZnJFVFVGdmQyZUlhd1FBMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725206531),
('sxRLORun8erpnfRBWcDelgizvLLoFUVFkE0sz4Pe', NULL, '2a02:4780:b:7::9', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoic29VRDlpRUhWd0pEWjlmOEJ2WlBTUmljQ3R0OEtFU002R2NmVU0zTCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725510545),
('sYeNmRi1ZGG8coCnIoUWvARKaR1qjzgRtNWDZ16X', NULL, '205.210.31.18', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaDVsdnBQZnlMT3l5SnZuaHdFRjNEU0UyZnh5YmJYSTRycGh5RGVDNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725831197),
('tfjjOJWhoAmAxq38NWa9geESjzBXplkWBTShIuTQ', NULL, '206.168.34.58', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR2dqdE1NMW1zOGN4YW9jVnBoQkJWNEFzR1Q3TU9mc2RqZmMzaHEwNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725453065),
('TOQWSgpAwLR4GQdCkwGHLDEdEy5XPqFcQhIalbyk', NULL, '205.210.31.86', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customers&#39; presences on the Internet. If you would like to be excluded from our scans, please send IP addresses/domains to: scaninfo@paloaltonetworks.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTzlock8ycnRSczRENXgyaU5sZ1VJQVY0NDhpTHExR3F1MDRvYTRqcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725609119),
('TYOH0vBz0onRKoU5FIw7sD3e9fdCOwFKUBK8Q1M0', NULL, '146.190.243.20', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS2l3NkpjZjJhcm1SRHJtR2xOeG8xOUdmOVBZZ2Z2SDl3V3RPbVJWWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725416988),
('u88JsPiBSNzQkxtEQQDepoSKR1hr5Nz6E9V0yq7k', 1, '182.177.188.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMDJlSmJmR2pzaldkUWUwbDRnM0QzQ2R2UVlWT3RqYnZPb043eVMyZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk1OiJodHRwczovL2FkbWluLmltdXNhZmlyLnBrL3RyaXBzP2ZpbHRlciU1QmlkJTVEPSZmaWx0ZXIlNUJ0cmlwX25hbWUlNUQ9JmZpbHRlciU1Qmd1ZXN0X25hbWUlNUQ9JmZpbHRlciU1Qmd1ZXN0X2VtYWlsJTVEPSZmaWx0ZXIlNUJjaGVja19pbl9kYXRlJTVEJTVCZnJvbSU1RD0mZmlsdGVyJTVCY2hlY2tfaW5fZGF0ZSU1RCU1QnRvJTVEPSZmaWx0ZXIlNUJib29raW5nX2RhdGUlNUQlNUJmcm9tJTVEPSZmaWx0ZXIlNUJib29raW5nX2RhdGUlNUQlNUJ0byU1RD0mZmlsdGVyJTVCdG90YWxfY29zdCU1RCU1QjAlNUQ9JmZpbHRlciU1QnRvdGFsX2Nvc3QlNUQlNUIxJTVEPSZmaWx0ZXIlNUJhZ2VudF9uYW1lJTVEPUFtYWFkJTIwWW91bmFzJmZpbHRlciU1QmJvb2tpbmdfc3RhdHVzJTVEPSZzb3J0PSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTIkWjkvOTkzaVhXeFpiVk1lWndwOVVUdXpEaFpKbXNaeVg4RVlUaWU0aWJxbGM0aDhtcXNYNm0iO30=', 1725207789),
('UAzga8QunxTQZftZ565v73bw8csXXyCXeDjJjGoy', NULL, '198.235.24.44', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMnM5cmhETlVEWnQwdXJOeHU2UmxKTmZLZGxCcXFQV2N0ZjZtWkRxMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725659368),
('ubLA7D00Np5ZH9ywmDZ8U8gU4TeXZc6DqyIVLLeA', NULL, '79.137.65.46', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTmZWb0pqZzllQ1ZWaUtTdG9uS2ZieFNVc3E2SFlFS3docHpjaW5jTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725925270),
('VfGq3kZVDg6P0onlq9vRtjzpiaPSrK2JJdeNMUFx', NULL, '138.197.191.87', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOGZSenJuN1kyak9ZZDVEY2RDVkpKTHpLYXlJZlFjVGpta0VOREJtbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsvP3Jlc3Rfcm91dGU9JTJGd3AlMkZ2MiUyRnVzZXJzJTJGIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725780715),
('vjbx3681Iv6IocLsuLaHxB0YYZGJqdsKvXM4AMYJ', NULL, '64.227.187.79', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNUwwNEdGUWZlUHJ0cEZWYWE5NE1CZkpXdUJ5NWNCRnJLMXBGS1gwRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725367362),
('vjSArz83FRPfPoXBRK7CUUlV5PGPnL5UWsKZ9b6O', NULL, '139.59.136.184', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVTdmUURDQVVDZGNTZ3pqRkFSbVNaTGZXNzh0VTVaU094Y3lxQjlsViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsvP3Jlc3Rfcm91dGU9JTJGd3AlMkZ2MiUyRnVzZXJzJTJGIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725206541),
('WUlVmWHYPs0VVHDPd9qNpsNFPqiQDWKbjoPMwzC4', NULL, '64.227.32.66', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVkdyUU5oNGphS2d5V1JDYlB4MDRiaEpGRzBkYjlkR3FHMkl2NGxWWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725206531),
('WZRBgYvPsNDZnY6ah8hoVTi2KDqeJDc71Jjj1Etd', NULL, '2a02:4780:b:7::9', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiUWpQWFl3V2lYZjdQdlM4SXZsRGVqdDhIdjlmZ1FTN0J4TGEyTjZsVSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725424145),
('Y7eAGC4Bsz4vG1nczjkOPwP79is2T2T8avORINDZ', NULL, '159.89.17.243', 'Mozilla/5.0 (Linux; Android 6.0; HTC One M9 Build/MRA615981) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.3161.98 Mobile Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZU42QkFOd083WWo2Yjg2VnhLUVdIb1B4dklGR2FvazFONFVtY3ljcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725590308),
('YQlVpsE5BAWphzhHfC592xsHEhOrlZrjbKRjPjAY', NULL, '198.235.24.251', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customers&#39; presences on the Internet. If you would like to be excluded from our scans, please send IP addresses/domains to: scaninfo@paloaltonetworks.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUE9aTGNsZnZuaUpYQ1FPejdvT21CV3ZkNEJYZmVuaWxUdTE0VVNsZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725584385),
('Yz8gGersIdRUKhE1hBUZa4yTHRYcN8wWFCOAWTAJ', NULL, '198.235.24.177', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMzM5MFE2S1hRZVJXUTJKeUg3bHRXUUJtWDRvcUpOQ3luMk5VOUEyRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725783449),
('z51rna2eqxD4LJKNqdmq5M7JaLG9m1eJkEjdmLAM', NULL, '182.177.188.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVnJVS3BkckRKd2k5elkxeEtqUXQ4cHkxQ1g5aVlydVVReUlQZWZUNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYWRtaW4uaW11c2FmaXIucGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725207674),
('zijmeRDUKcJxaNSz0QSV34hr0l22DBZ6Wfl7vzha', NULL, '2a02:4780:b:7::9', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiT3lVQUpOZmhCT1BDWkVmUUF2bWxnT2hNazIwWm1YcFpiUFpIZXZKNCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1725424145);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_name` varchar(255) DEFAULT NULL,
  `guest_name` varchar(255) DEFAULT NULL,
  `guest_email` varchar(255) DEFAULT NULL,
  `guest_contact` varchar(255) DEFAULT NULL,
  `check_in_date` date DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `total_expenses` decimal(10,2) DEFAULT NULL,
  `profit` decimal(10,2) DEFAULT NULL,
  `agent_name` varchar(255) DEFAULT NULL,
  `booking_status` enum('Pending','Booked') DEFAULT NULL,
  `path_attachment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `trip_name`, `guest_name`, `guest_email`, `guest_contact`, `check_in_date`, `booking_date`, `total_cost`, `total_expenses`, `profit`, `agent_name`, `booking_status`, `path_attachment`, `created_at`, `updated_at`) VALUES
(7, '3 Days Trip to Neelum Valley from Islamabad', 'Mr. Ansaar', 'NA@gmail.com', '03453587863', '2024-07-01', '2024-07-01', '50000.00', '43500.00', '6500.00', 'Khawaja Nouman', 'Booked', NULL, '2024-07-03 16:52:35', '2024-07-09 15:49:49'),
(8, '4 days trip to neelum valley from lahore', 'Mr Naeem', NULL, '03363477553', '2024-07-03', '2024-07-01', '265000.00', '248210.00', '16790.00', 'Shayan Qureshi', 'Booked', NULL, '2024-07-03 16:56:09', '2024-07-09 14:58:22'),
(9, '7 Days Hunza Skardu', 'Mr Ibrahim', NULL, '+258 86 281 1279', '2024-07-14', '2024-07-01', '370000.00', '306400.00', '63600.00', 'Shayan Qureshi', 'Booked', NULL, '2024-07-03 17:01:38', '2024-07-09 15:00:46'),
(10, '7 Days Neelum Valley', 'Mr Taha', NULL, '0333 4313525', '2024-06-29', '2024-06-22', '189000.00', '125500.00', '63500.00', 'Shayan Qureshi', 'Booked', NULL, '2024-07-03 17:04:28', '2024-07-08 15:19:21'),
(11, '7 Days Hunza', '~Hakimi Ismail', NULL, '+60 13-935 9550', '2024-07-14', '2024-06-24', '486000.00', '388360.00', '97640.00', 'Shayan Qureshi', 'Booked', NULL, '2024-07-03 17:05:49', '2024-07-22 15:00:06'),
(12, '4 Days Neelum Valley', 'Dr Hasnain', NULL, '+92 333 7580507', '2024-06-26', '2024-06-13', '160000.00', '141000.00', '21000.00', 'Shayan Qureshi', 'Booked', NULL, '2024-07-03 17:08:34', '2024-07-03 17:08:34'),
(13, 'Rent a car + Loi', 'Misc', NULL, 'Na', '2024-06-26', '2024-06-22', '50000.00', '30300.00', '19700.00', 'Shayan Qureshi', 'Booked', NULL, '2024-07-03 17:13:55', '2024-07-03 17:13:55'),
(14, '5 Days Naran tour', 'Syed Yasir', NULL, '03332209787', '2024-07-03', '2024-07-02', '230000.00', '128000.00', '77000.00', 'Amaad Younas', 'Booked', NULL, '2024-07-04 14:43:59', '2024-07-08 15:23:56'),
(15, '9 Days Neelum Valley from Islamabad', 'Syed Haris', NULL, '03008260321', '2024-06-15', '2024-06-23', '215000.00', '168700.00', '46300.00', 'Amaad Younas', 'Booked', NULL, '2024-07-05 17:10:53', '2024-07-05 17:10:53'),
(16, '7 Days Hunza from islamabad', 'Mr Adnan', NULL, '+447816449166', '2024-06-23', '2024-06-29', '380000.00', '289000.00', '91000.00', 'Amaad Younas', 'Booked', NULL, '2024-07-05 17:17:22', '2024-07-05 17:17:22'),
(17, '12 Days Pakistan Tour', 'Ammar Shoukar', 'NA@gmail.com', '+97450603006', '2024-06-23', '2024-06-03', '432000.00', '385340.00', '46660.00', 'Ahmed Raza', 'Booked', NULL, '2024-07-05 17:46:23', '2024-07-05 17:50:45'),
(18, '7 Days Hunza Lahore Tour', 'Hurraira', 'NA@gmail.com', '+6590221767', '2024-06-06', '2024-06-01', '298000.00', '163780.00', '134220.00', 'Khawaja Nouman', 'Booked', NULL, '2024-07-05 18:05:14', '2024-07-05 18:05:14'),
(19, '3 Days Naran Trip', 'Mr. Ali Hassan', 'NA@gmail.com', '03470562402', '2024-06-12', '2024-06-03', '99000.00', '56500.00', '42500.00', 'Khawaja Nouman', 'Booked', NULL, '2024-07-05 18:12:23', '2024-07-09 15:55:04'),
(20, '3 Days Neelum Valley Tour from Muzaffarabad', 'Engr Waqas', 'NA@gmail.com', '03168887524', '2024-06-25', '2024-05-20', '42000.00', '37000.00', '5000.00', 'Khawaja Nouman', 'Booked', NULL, '2024-07-05 18:16:58', '2024-07-05 18:16:58'),
(22, '3 Days Neelum Tour Package from Islamabad', 'Mr. Abid', 'NA@gmail.com', '+97470415338', '2022-06-21', '2024-06-18', '130000.00', '98000.00', '32000.00', 'Ahmed Raza', 'Booked', NULL, '2024-07-05 18:22:30', '2024-07-05 18:22:39'),
(27, '7 Day Hunza Tour', 'Mr. Omar', NULL, '+971564776485', '2024-07-21', '2024-07-09', '120000.00', '77650.00', '42350.00', 'Amaad Younas', 'Booked', NULL, '2024-07-09 12:40:06', '2024-07-29 17:32:37'),
(28, '3 Days Naran', 'Miss Moiza', NULL, '+92 332 3360331', '2024-07-07', '2024-07-03', '320000.00', '272560.00', '47440.00', 'Shayan Qureshi', 'Booked', NULL, '2024-07-09 14:43:26', '2024-07-09 16:00:14'),
(29, '3 Days Neelum', '~sameera matar9', NULL, '+92 315 9439059', '2024-07-10', '2024-07-03', '99000.00', '48500.00', '50500.00', 'Shayan Qureshi', 'Booked', NULL, '2024-07-09 15:08:56', '2024-07-13 14:00:48'),
(30, '8 Swat Neelum trip', 'Bashir', NULL, '03342616343', '2024-06-08', '2024-06-12', '290000.00', '193000.00', '97000.00', 'Sadain Qureshi', 'Booked', NULL, '2024-07-09 15:54:53', '2024-07-09 15:54:53'),
(31, '9 days Murree Naran', 'Mr Zulqarnain', NULL, '+971543001777', '2024-06-18', '2024-06-20', '475000.00', '320194.00', '154806.00', 'Sadain Qureshi', 'Booked', NULL, '2024-07-09 16:00:47', '2024-07-09 16:00:47'),
(32, '4 Days neelum', 'Imran Raja', NULL, '+97433481784', '2024-06-25', '2024-06-28', '200000.00', '122000.00', '78000.00', 'Sadain Qureshi', 'Booked', NULL, '2024-07-09 16:08:30', '2024-07-09 16:08:30'),
(33, '3 Days Trip Naran', 'Shehryar', NULL, '03315141311', '2024-06-29', '2024-06-30', '75000.00', '54500.00', '20500.00', 'Sadain Qureshi', 'Booked', NULL, '2024-07-09 16:27:43', '2024-07-09 16:27:43'),
(34, '3 days neelum', 'Ahmed', NULL, '03335684387', '2024-06-22', '2024-06-23', '76565.00', '40940.00', '35625.00', 'Sadain Qureshi', 'Booked', NULL, '2024-07-09 16:35:38', '2024-07-09 16:35:38'),
(35, '3 days neelum', 'shahwar', NULL, '03362080777', '2024-06-23', '2024-06-24', '72000.00', '52500.00', '19500.00', 'Sadain Qureshi', 'Booked', NULL, '2024-07-09 16:46:53', '2024-07-09 16:49:18'),
(36, '5 Days Swat Kalam', 'Mr Saad', NULL, '+92 345 2310950', '2024-07-13', '2024-07-10', '170000.00', '152000.00', '18000.00', 'Shayan Qureshi', 'Booked', 'path_attachment_create/EybiQzSjxzxCLmfyCuwQfQuP1ZDhCzojQBn89WJH.pdf', '2024-07-10 18:18:46', '2024-07-22 13:06:04'),
(37, '4 Days Naran Kaghan tour', 'Husamuddin Ghor', NULL, '+255784606353', '2024-07-17', '2024-07-10', '360000.00', '271500.00', '81500.00', 'Amaad Younas', 'Booked', NULL, '2024-07-11 13:13:54', '2024-07-22 14:03:16'),
(38, '4 Days trip to Leepa Valley from Lahroe', 'Mr. Tayyab', 'NA@gmail.com', '+923004986061', '2024-07-11', '2024-07-09', '110000.00', '74300.00', '35700.00', 'Khawaja Nouman', 'Booked', NULL, '2024-07-11 19:29:01', '2024-07-19 15:56:31'),
(39, '12 Days trip to Neelum, Murree, nathaigali', 'Mr. Muhammad Aftab Rathore', 'NA@gmail.com', '03412328881', '2024-07-14', '2024-07-12', '435000.00', '347000.00', '88000.00', 'Nouman Rafique', 'Booked', 'path_attachment_create/HCOPhqjdv0kzvvvWXkoz6BDFUqwMMIlEgmjifS1A.pdf', '2024-07-12 14:03:15', '2024-07-26 14:25:55'),
(40, '3 Days Neelum Valley', 'Asim Siddique', NULL, '03228205650', '2024-07-16', '2024-07-15', '60000.00', '45400.00', '14600.00', 'Amaad Younas', 'Booked', NULL, '2024-07-18 12:59:26', '2024-07-29 18:36:05'),
(41, '7 Days Naran Shogran', 'Mr waheed', NULL, '+92 321 2700256', '2024-07-29', '2024-07-14', '399000.00', NULL, NULL, 'Shayan Qureshi', 'Booked', 'path_attachment_create/LWH0Hes0tFjwkaGgYM1VnxbsNwWONl1NKDGf2PUW.pdf', '2024-07-18 15:33:21', '2024-07-18 15:33:21'),
(42, '5 Days Hunza by AIr', 'Mr Hamza', NULL, '+92 302 5336193', '2024-07-27', '2024-07-20', '95000.00', '77500.00', '17500.00', 'Shayan Qureshi', 'Booked', 'path_attachment_create/EbY9cqPhiDjFl3VM1NdLos6GmBlpwbfBklrMLBz7.pdf', '2024-07-22 15:06:56', '2024-08-06 13:13:06'),
(43, 'Loi', 'Miss Barbara Marisel', NULL, '+39 333 344 6189', '2024-07-09', '2024-07-08', '40000.00', '25000.00', '15000.00', 'Shayan Qureshi', 'Booked', NULL, '2024-07-22 16:26:15', '2024-07-23 17:43:47'),
(44, 'Neelum Valley 8 Days Isb Nathiagali', 'Mr. Danish', 'NA@gmail.com', '+923360831628', '2024-07-28', '2024-07-20', '675000.00', '530000.00', '145000.00', 'Khawaja Nouman', 'Booked', 'path_attachment_create/6E4H1cMaky9Q6yaQWf2fSVscgPlESNkc3CFtSRrP.pdf', '2024-07-23 16:56:07', '2024-08-06 14:12:40'),
(45, '8 Days Hunza', 'Tahir Irfan', 'info@imusafir.pk', '03192860120', '2024-07-09', '2024-06-19', '240000.00', '172400.00', '67600.00', 'Ahmed Raza', 'Booked', NULL, '2024-07-23 17:53:11', '2024-07-23 17:55:45'),
(46, 'Loi', 'n/a', 'n/a@gmail.com', '03158699948', '2024-07-11', '2024-07-07', '40310.00', '16047.00', '24263.00', 'Sadain Qureshi', 'Booked', NULL, '2024-07-25 14:04:24', '2024-07-25 14:06:39'),
(47, '10 Days GB Tour', 'Mr. Zubai c/o Faizan Wajiha Travels', 'NA@gmail.com', '03455889948', '2024-07-25', '2024-07-24', '490000.00', '370250.00', '119750.00', 'Khawaja Nouman', 'Booked', 'path_attachment_create/K99ss8pShY4qwyN64o3oALt5gnX4y3CO58hA0rJu.pdf', '2024-07-25 15:34:28', '2024-08-03 15:10:14'),
(48, '3 Days Neelum Valley Honeymoon', 'Mr. Habib', 'NA@gmail.com', '03333379970', '2024-07-29', '2024-07-27', '55000.00', '37400.00', '17600.00', 'Khawaja Nouman', 'Booked', NULL, '2024-07-27 18:30:23', '2024-08-02 13:57:34'),
(49, 'Letter of invitation', 'Priscila Angeline and Frolov Alexandr', NULL, '+7 909 822-44-32  +55 19 99667-3207', NULL, NULL, '45097.00', '24464.00', '20633.00', 'Shayan Qureshi', 'Booked', NULL, '2024-08-06 14:53:44', '2024-08-06 14:55:49'),
(50, '8 Days 7 Nights Hunza Skardu', 'Mr. Faheem', 'NA@gmail.com', '03452025556', '2024-08-12', '2024-08-19', '410000.00', '290840.00', '119160.00', 'Amaad Younas', 'Booked', NULL, '2024-08-12 17:58:48', '2024-08-24 15:53:41'),
(51, '3 Days Corporate Trip to Kumrat', 'Troon Technologies', 'NA@gmail.com', '03000000000', '2024-08-16', '2024-08-18', '775000.00', '558000.00', '217000.00', 'Khawaja Nouman', 'Booked', NULL, '2024-08-24 15:58:04', '2024-08-26 14:46:03'),
(52, 'Rent a car in Islamabad to Murree', 'TMC', 'NA@gmail.com', '03000000000', '2024-08-08', '2024-08-09', '60000.00', '45000.00', '15000.00', 'Khawaja Nouman', 'Booked', NULL, '2024-08-24 15:59:41', '2024-08-24 15:59:41'),
(53, 'Rent a car Faisalbad to Rwp', 'TMC', 'NA@gmail.com', '03000000000', '2024-08-22', '2024-08-22', '140000.00', '115000.00', '25000.00', 'Khawaja Nouman', 'Booked', NULL, '2024-08-24 16:00:45', '2024-08-24 16:00:45'),
(54, '2 Days Murree', 'Momoh Aliah', NULL, '+234 813 384 0308', '2024-08-08', '2024-08-02', '45600.00', '35600.00', '10000.00', 'Shayan Qureshi', 'Booked', NULL, '2024-08-26 13:25:08', '2024-08-26 13:25:08'),
(55, '6 days Murree Neelum', 'Mr Jaffer', NULL, '+92 333 1441230', '2024-09-01', '2024-08-05', '225000.00', '157000.00', '68000.00', 'Shayan Qureshi', 'Booked', NULL, '2024-08-27 14:42:37', '2024-09-09 15:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Sonya Alford', 'info@imusafir.pk', NULL, '$2y$12$Z9/993iXWxZbVMeZwp9UTuzDhZJmsZyX8EYTie4ibqlc4h8mqsX6m', NULL, NULL, NULL, 'SjTgRnr6QkgUkWi60prVgPTzMXOaryznAWu7eUh6KoHmf4sG4ZhTVxCldUHE', NULL, NULL, '2024-07-02 13:13:54', '2024-07-05 13:56:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_trip_id_foreign` (`trip_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
