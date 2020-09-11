-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 11, 2020 at 02:41 PM
-- Server version: 8.0.12
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reklampiksel`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `image`, `header`, `content`, `created_at`, `updated_at`) VALUES
(1, '1597936357.jpeg', 'Reklam Piksel Dijital Baski Merkezi', '<p>Doğru mesaj ile istenilen hedef kitlesine ulaşın ve rakiplerinizin bir adım &ouml;tesine ge&ccedil;in.</p>\r\n\r\n<p>PİXEL REKLAM ekibi olarak kuruluşumuzdan bu yana i&ccedil; mimari tasarım/uygulama, dış cephe tasarım/uygulama, t&uuml;m indoor - outdoor reklam ve uygulama faaliyet alanlarında &ccedil;&ouml;z&uuml;m ortaklarımıza kurumsal hizmet sunmaktayız.</p>\r\n\r\n<p>Reklamcılık alanında &uuml;retimden montaja 7 seneyi aşkın tecr&uuml;bemiz ve yenilik&ccedil;i fikirlerimiz ile firmaların gelişen rekabet ortamına uyum sağlayabilmeleri i&ccedil;in &ccedil;alışıyoruz.</p>', '2020-07-29 12:53:43', '2020-08-20 12:12:37');

-- --------------------------------------------------------

--
-- Table structure for table `additional_options`
--

CREATE TABLE `additional_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `additional_options`
--

INSERT INTO `additional_options` (`id`, `parent_id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(10, NULL, 'Baskı', NULL, '2020-08-27 20:02:52', '2020-08-27 20:02:52'),
(11, 10, 'İç Mekan baskı ($1.00)', 1, '2020-08-27 20:03:24', '2020-08-27 20:03:24'),
(12, 10, 'Dış Mekan Baskı (Ücretsiz)', NULL, '2020-08-27 20:03:48', '2020-08-27 20:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sold` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`id`, `user_id`, `created_at`, `updated_at`, `sold`) VALUES
(60, 4, '2020-08-25 19:51:58', '2020-09-10 22:08:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `basket_products`
--

CREATE TABLE `basket_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `basket_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED DEFAULT NULL,
  `additional_options` json DEFAULT NULL,
  `quantity` tinyint(4) NOT NULL,
  `square_meter` json DEFAULT NULL,
  `price` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basket_products`
--

INSERT INTO `basket_products` (`id`, `basket_id`, `product_id`, `option_id`, `additional_options`, `quantity`, `square_meter`, `price`, `created_at`, `updated_at`) VALUES
(38, 60, 14, 17, '[\"11\"]', 1, '{\"total\": \"1.00\", \"width\": 1, \"height\": 1}', 2.3, '2020-09-07 10:10:37', '2020-09-07 10:10:37'),
(39, 60, 14, 17, '[\"11\"]', 2, '{\"total\": \"10.12\", \"width\": 10.12, \"height\": 1}', 23.276, '2020-09-07 10:10:47', '2020-09-07 10:10:47'),
(43, 60, 17, NULL, '[\"11\"]', 1, NULL, 26, '2020-09-10 10:14:19', '2020-09-10 10:14:19'),
(44, 60, 17, NULL, '[\"11\"]', 1, NULL, 26, '2020-09-10 10:15:18', '2020-09-10 10:15:18'),
(45, 60, 17, NULL, '[\"11\"]', 1, NULL, 26, '2020-09-10 10:16:40', '2020-09-10 10:16:40'),
(47, 60, 18, NULL, '[\"11\"]', 3, '{\"total\": \"5.50\", \"width\": 5, \"height\": 1.1}', 5.5, '2020-09-10 10:28:55', '2020-09-10 10:28:55'),
(52, 60, 19, 17, NULL, 1, NULL, 1, '2020-09-10 12:01:22', '2020-09-10 12:01:22'),
(53, 60, 20, 28, NULL, 1, '{\"total\": \"1.01\", \"width\": 1.01, \"height\": 1}', 2.121, '2020-09-10 12:03:38', '2020-09-10 12:03:38'),
(54, 60, 19, 17, NULL, 1, NULL, 1, '2020-09-11 08:40:50', '2020-09-11 08:40:50'),
(55, 60, 20, 28, NULL, 1, '{\"total\": \"1.00\", \"width\": 1, \"height\": 1}', 2.1, '2020-09-11 08:40:56', '2020-09-11 08:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `catalogue`
--

CREATE TABLE `catalogue` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_inform`
--

CREATE TABLE `company_inform` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vergino` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vergidairesi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_inform`
--

INSERT INTO `company_inform` (`id`, `company_name`, `user_id`, `address1`, `address2`, `postcode`, `vergino`, `vergidairesi`, `created_at`, `updated_at`) VALUES
(1, 'DIJIPR', 4, 'Mahalle', 'city', '10208', '1230128930', '123u12898123u', NULL, '2020-08-22 09:23:19'),
(2, 'Lumusoft', 12, 'Mahalle', 'city', '123456789', '123456789', '789451848', '2020-09-04 11:03:58', '2020-09-04 11:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `adsoyad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baslik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deger` double NOT NULL,
  `tarih` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aciklama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `created_at`, `updated_at`, `name`, `deger`, `tarih`, `saat`, `aciklama`) VALUES
(1, '2020-09-05 20:26:05', '2020-09-05 20:26:05', 'USD', 7.4378, '04.09.2020', '12.00', '04.09.2020 Günü Belirlenen Gösterge Niteliğindeki Türkiye Cumhuriyet Merkez Bankası USD Kuru Değeri: 7.4378'),
(2, '2020-09-05 20:28:51', '2020-09-05 20:28:51', 'USD', 7.4378, '04.09.2020', '12.00', '04.09.2020 Günü Belirlenen Gösterge Niteliğindeki Türkiye Cumhuriyet Merkez Bankası USD Kuru Değeri: 7.4378');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `district_no` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `province_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district_no`, `name`, `province_no`) VALUES
(1, 1, 'SEYHAN', 1),
(2, 2, 'CEYHAN', 1),
(3, 3, 'FEKE', 1),
(4, 4, 'KARAİSALI', 1),
(5, 5, 'KARATAŞ', 1),
(6, 6, 'KOZAN', 1),
(7, 7, 'POZANTI', 1),
(8, 8, 'SAİMBEYLİ', 1),
(9, 9, 'TUFANBEYLİ', 1),
(10, 10, 'YUMURTALIK', 1),
(11, 11, 'YÜREĞİR', 1),
(12, 12, 'ALADAĞ', 1),
(13, 13, 'İMAMOĞLU', 1),
(14, 14, 'ADIYAMAN MERKEZ', 2),
(15, 15, 'BESNİ', 2),
(16, 16, 'ÇELİKHAN', 2),
(17, 17, 'GERGER', 2),
(18, 18, 'GÖLBAŞI', 2),
(19, 19, 'KAHTA', 2),
(20, 20, 'SAMSAT', 2),
(21, 21, 'SİNCİK', 2),
(22, 22, 'TUT', 2),
(23, 23, 'AFYONMERKEZ', 3),
(24, 24, 'BOLVADİN', 3),
(25, 25, 'ÇAY', 3),
(26, 26, 'DAZKIRI', 3),
(27, 27, 'DİNAR', 3),
(28, 28, 'EMİRDAĞ', 3),
(29, 29, 'İHSANİYE', 3),
(30, 30, 'SANDIKLI', 3),
(31, 31, 'SİNANPAŞA', 3),
(32, 32, 'SULDANDAĞI', 3),
(33, 33, 'ŞUHUT', 3),
(34, 34, 'BAŞMAKÇI', 3),
(35, 35, 'BAYAT', 3),
(36, 36, 'İŞCEHİSAR', 3),
(37, 37, 'ÇOBANLAR', 3),
(38, 38, 'EVCİLER', 3),
(39, 39, 'HOCALAR', 3),
(40, 40, 'KIZILÖREN', 3),
(41, 41, 'AKSARAY MERKEZ', 68),
(42, 42, 'ORTAKÖY', 68),
(43, 43, 'AĞAÇÖREN', 68),
(44, 44, 'GÜZELYURT', 68),
(45, 45, 'SARIYAHŞİ', 68),
(46, 46, 'ESKİL', 68),
(47, 47, 'GÜLAĞAÇ', 68),
(48, 48, 'AMASYA MERKEZ', 5),
(49, 49, 'GÖYNÜÇEK', 5),
(50, 50, 'GÜMÜŞHACIKÖYÜ', 5),
(51, 51, 'MERZİFON', 5),
(52, 52, 'SULUOVA', 5),
(53, 53, 'TAŞOVA', 5),
(54, 54, 'HAMAMÖZÜ', 5),
(55, 55, 'ALTINDAĞ', 6),
(56, 56, 'AYAS', 6),
(57, 57, 'BALA', 6),
(58, 58, 'BEYPAZARI', 6),
(59, 59, 'ÇAMLIDERE', 6),
(60, 60, 'ÇANKAYA', 6),
(61, 61, 'ÇUBUK', 6),
(62, 62, 'ELMADAĞ', 6),
(63, 63, 'GÜDÜL', 6),
(64, 64, 'HAYMANA', 6),
(65, 65, 'KALECİK', 6),
(66, 66, 'KIZILCAHAMAM', 6),
(67, 67, 'NALLIHAN', 6),
(68, 68, 'POLATLI', 6),
(69, 69, 'ŞEREFLİKOÇHİSAR', 6),
(70, 70, 'YENİMAHALLE', 6),
(71, 71, 'GÖLBAŞI', 6),
(72, 72, 'KEÇİÖREN', 6),
(73, 73, 'MAMAK', 6),
(74, 74, 'SİNCAN', 6),
(75, 75, 'KAZAN', 6),
(76, 76, 'AKYURT', 6),
(77, 77, 'ETİMESGUT', 6),
(78, 78, 'EVREN', 6),
(79, 79, 'ANSEKİ', 7),
(80, 80, 'ALANYA', 7),
(81, 81, 'ANTALYA MERKEZİ', 7),
(82, 82, 'ELMALI', 7),
(83, 83, 'FİNİKE', 7),
(84, 84, 'GAZİPAŞA', 7),
(85, 85, 'GÜNDOĞMUŞ', 7),
(86, 86, 'KAŞ', 7),
(87, 87, 'KORKUTELİ', 7),
(88, 88, 'KUMLUCA', 7),
(89, 89, 'MANAVGAT', 7),
(90, 90, 'SERİK', 7),
(91, 91, 'DEMRE', 7),
(92, 92, 'İBRADI', 7),
(93, 93, 'KEMER', 7),
(94, 94, 'ARDAHAN MERKEZ', 75),
(95, 95, 'GÖLE', 75),
(96, 96, 'ÇILDIR', 75),
(97, 97, 'HANAK', 75),
(98, 98, 'POSOF', 75),
(99, 99, 'DAMAL', 75),
(100, 100, 'ARDANUÇ', 8),
(101, 101, 'ARHAVİ', 8),
(102, 102, 'ARTVİN MERKEZ', 8),
(103, 103, 'BORÇKA', 8),
(104, 104, 'HOPA', 8),
(105, 105, 'ŞAVŞAT', 8),
(106, 106, 'YUSUFELİ', 8),
(107, 107, 'MURGUL', 8),
(108, 108, 'AYDIN MERKEZ', 9),
(109, 109, 'BOZDOĞAN', 9),
(110, 110, 'ÇİNE', 9),
(111, 111, 'GERMENCİK', 9),
(112, 112, 'KARACASU', 9),
(113, 113, 'KOÇARLI', 9),
(114, 114, 'KUŞADASI', 9),
(115, 115, 'KUYUCAK', 9),
(116, 116, 'NAZİLLİ', 9),
(117, 117, 'SÖKE', 9),
(118, 118, 'SULTANHİSAR', 9),
(119, 119, 'YENİPAZAR', 9),
(120, 120, 'BUHARKENT', 9),
(121, 121, 'İNCİRLİOVA', 9),
(122, 122, 'KARPUZLU', 9),
(123, 123, 'KÖŞK', 9),
(124, 124, 'DİDİM', 9),
(125, 125, 'AĞRI MERKEZ', 4),
(126, 126, 'DİYADİN', 4),
(127, 127, 'DOĞUBEYAZIT', 4),
(128, 128, 'ELEŞKİRT', 4),
(129, 129, 'HAMUR', 4),
(130, 130, 'PATNOS', 4),
(131, 131, 'TAŞLIÇAY', 4),
(132, 132, 'TUTAK', 4),
(133, 133, 'AYVALIK', 10),
(134, 134, 'BALIKESİR MERKEZ', 10),
(135, 135, 'BALYA', 10),
(136, 136, 'BANDIRMA', 10),
(137, 137, 'BİGADİÇ', 10),
(138, 138, 'BURHANİYE', 10),
(139, 139, 'DURSUNBEY', 10),
(140, 140, 'EDREMİT', 10),
(141, 141, 'ERDEK', 10),
(142, 142, 'GÖNEN', 10),
(143, 143, 'HAVRAN', 10),
(144, 144, 'İVRİNDİ', 10),
(145, 145, 'KEPSUT', 10),
(146, 146, 'MANYAS', 10),
(147, 147, 'SAVAŞTEPE', 10),
(148, 148, 'SINDIRGI', 10),
(149, 149, 'SUSURLUK', 10),
(150, 150, 'MARMARA', 10),
(151, 151, 'GÖMEÇ', 10),
(152, 152, 'BARTIN MERKEZ', 74),
(153, 153, 'KURUCAŞİLE', 74),
(154, 154, 'ULUS', 74),
(155, 155, 'AMASRA', 74),
(156, 156, 'BATMAN MERKEZ', 72),
(157, 157, 'BEŞİRİ', 72),
(158, 158, 'GERCÜŞ', 72),
(159, 159, 'KOZLUK', 72),
(160, 160, 'SASON', 72),
(161, 161, 'HASANKEYF', 72),
(162, 162, 'BAYBURT MERKEZ', 69),
(163, 163, 'AYDINTEPE', 69),
(164, 164, 'DEMİRÖZÜ', 69),
(165, 165, 'BOLU MERKEZ', 14),
(166, 166, 'GEREDE', 14),
(167, 167, 'GÖYNÜK', 14),
(168, 168, 'KIBRISCIK', 14),
(169, 169, 'MENGEN', 14),
(170, 170, 'MUDURNU', 14),
(171, 171, 'SEBEN', 14),
(172, 172, 'DÖRTDİVAN', 14),
(173, 173, 'YENİÇAĞA', 14),
(174, 174, 'AĞLASUN', 15),
(175, 175, 'BUCAK', 15),
(176, 176, 'BURDUR MERKEZ', 15),
(177, 177, 'GÖLHİSAR', 15),
(178, 178, 'TEFENNİ', 15),
(179, 179, 'YEŞİLOVA', 15),
(180, 180, 'KARAMANLI', 15),
(181, 181, 'KEMER', 15),
(182, 182, 'ALTINYAYLA', 15),
(183, 183, 'ÇAVDIR', 15),
(184, 184, 'ÇELTİKÇİ', 15),
(185, 185, 'GEMLİK', 16),
(186, 186, 'İNEGÖL', 16),
(187, 187, 'İZNİK', 16),
(188, 188, 'KARACABEY', 16),
(189, 189, 'KELES', 16),
(190, 190, 'MUDANYA', 16),
(191, 191, 'MUSTAFA K. PAŞA', 16),
(192, 192, 'ORHANELİ', 16),
(193, 193, 'ORHANGAZİ', 16),
(194, 194, 'YENİŞEHİR', 16),
(195, 195, 'BÜYÜK ORHAN', 16),
(196, 196, 'HARMANCIK', 16),
(197, 197, 'NÜLİFER', 16),
(198, 198, 'OSMAN GAZİ', 16),
(199, 199, 'YILDIRIM', 16),
(200, 200, 'GÜRSU', 16),
(201, 201, 'KESTEL', 16),
(202, 202, 'BİLECİK MERKEZ', 11),
(203, 203, 'BOZÜYÜK', 11),
(204, 204, 'GÖLPAZARI', 11),
(205, 205, 'OSMANELİ', 11),
(206, 206, 'PAZARYERİ', 11),
(207, 207, 'SÖĞÜT', 11),
(208, 208, 'YENİPAZAR', 11),
(209, 209, 'İNHİSAR', 11),
(210, 210, 'BİNGÖL MERKEZ', 12),
(211, 211, 'GENÇ', 12),
(212, 212, 'KARLIOVA', 12),
(213, 213, 'KİGI', 12),
(214, 214, 'SOLHAN', 12),
(215, 215, 'ADAKLI', 12),
(216, 216, 'YAYLADERE', 12),
(217, 217, 'YEDİSU', 12),
(218, 218, 'ADİLCEVAZ', 13),
(219, 219, 'AHLAT', 13),
(220, 220, 'BİTLİS MERKEZ', 13),
(221, 221, 'HİZAN', 13),
(222, 222, 'MUTKİ', 13),
(223, 223, 'TATVAN', 13),
(224, 224, 'GÜROYMAK', 13),
(225, 225, 'DENİZLİ MERKEZ', 20),
(226, 226, 'ACIPAYAM', 20),
(227, 227, 'BULDAN', 20),
(228, 228, 'ÇAL', 20),
(229, 229, 'ÇAMELİ', 20),
(230, 230, 'ÇARDAK', 20),
(231, 231, 'ÇİVRİL', 20),
(232, 232, 'GÜNEY', 20),
(233, 233, 'KALE', 20),
(234, 234, 'SARAYKÖY', 20),
(235, 235, 'TAVAS', 20),
(236, 236, 'BABADAĞ', 20),
(237, 237, 'BEKİLLİ', 20),
(238, 238, 'HONAZ', 20),
(239, 239, 'SERİNHİSAR', 20),
(240, 240, 'AKKÖY', 20),
(241, 241, 'BAKLAN', 20),
(242, 242, 'BEYAĞAÇ', 20),
(243, 243, 'BOZKURT', 20),
(244, 244, 'DÜZCE MERKEZ', 81),
(245, 245, 'AKÇAKOCA', 81),
(246, 246, 'YIĞILCA', 81),
(247, 247, 'CUMAYERİ', 81),
(248, 248, 'GÖLYAKA', 81),
(249, 249, 'ÇİLİMLİ', 81),
(250, 250, 'GÜMÜŞOVA', 81),
(251, 251, 'KAYNAŞLI', 81),
(252, 252, 'DİYARBAKIR MERKEZ', 21),
(253, 253, 'BİSMİL', 21),
(254, 254, 'ÇERMİK', 21),
(255, 255, 'ÇINAR', 21),
(256, 256, 'ÇÜNGÜŞ', 21),
(257, 257, 'DİCLE', 21),
(258, 258, 'ERGANİ', 21),
(259, 259, 'HANİ', 21),
(260, 260, 'HAZRO', 21),
(261, 261, 'KULP', 21),
(262, 262, 'LİCE', 21),
(263, 263, 'SİLVAN', 21),
(264, 264, 'EĞİL', 21),
(265, 265, 'KOCAKÖY', 21),
(266, 266, 'EDİRNE MERKEZ', 22),
(267, 267, 'ENEZ', 22),
(268, 268, 'HAVSA', 22),
(269, 269, 'İPSALA', 22),
(270, 270, 'KEŞAN', 22),
(271, 271, 'LALAPAŞA', 22),
(272, 272, 'MERİÇ', 22),
(273, 273, 'UZUNKÖPRÜ', 22),
(274, 274, 'SÜLOĞLU', 22),
(275, 275, 'ELAZIĞ MERKEZ', 23),
(276, 276, 'AĞIN', 23),
(277, 277, 'BASKİL', 23),
(278, 278, 'KARAKOÇAN', 23),
(279, 279, 'KEBAN', 23),
(280, 280, 'MADEN', 23),
(281, 281, 'PALU', 23),
(282, 282, 'SİVRİCE', 23),
(283, 283, 'ARICAK', 23),
(284, 284, 'KOVANCILAR', 23),
(285, 285, 'ALACAKAYA', 23),
(286, 286, 'ERZURUM MERKEZ', 25),
(287, 287, 'PALANDÖKEN', 25),
(288, 288, 'AŞKALE', 25),
(289, 289, 'ÇAT', 25),
(290, 290, 'HINIS', 25),
(291, 291, 'HORASAN', 25),
(292, 292, 'OLTU', 25),
(293, 293, 'İSPİR', 25),
(294, 294, 'KARAYAZI', 25),
(295, 295, 'NARMAN', 25),
(296, 296, 'OLUR', 25),
(297, 297, 'PASİNLER', 25),
(298, 298, 'ŞENKAYA', 25),
(299, 299, 'TEKMAN', 25),
(300, 300, 'TORTUM', 25),
(301, 301, 'KARAÇOBAN', 25),
(302, 302, 'UZUNDERE', 25),
(303, 303, 'PAZARYOLU', 25),
(304, 304, 'ILICA', 25),
(305, 305, 'KÖPRÜKÖY', 25),
(306, 306, 'ÇAYIRLI', 24),
(307, 307, 'ERZİNCAN MERKEZ', 24),
(308, 308, 'İLİÇ', 24),
(309, 309, 'KEMAH', 24),
(310, 310, 'KEMALİYE', 24),
(311, 311, 'REFAHİYE', 24),
(312, 312, 'TERCAN', 24),
(313, 313, 'OTLUKBELİ', 24),
(314, 314, 'ESKİŞEHİR MERKEZ', 26),
(315, 315, 'ÇİFTELER', 26),
(316, 316, 'MAHMUDİYE', 26),
(317, 317, 'MİHALIÇLIK', 26),
(318, 318, 'SARICAKAYA', 26),
(319, 319, 'SEYİTGAZİ', 26),
(320, 320, 'SİVRİHİSAR', 26),
(321, 321, 'ALPU', 26),
(322, 322, 'BEYLİKOVA', 26),
(323, 323, 'İNÖNÜ', 26),
(324, 324, 'GÜNYÜZÜ', 26),
(325, 325, 'HAN', 26),
(326, 326, 'MİHALGAZİ', 26),
(327, 327, 'ARABAN', 27),
(328, 328, 'İSLAHİYE', 27),
(329, 329, 'NİZİP', 27),
(330, 330, 'OĞUZELİ', 27),
(331, 331, 'YAVUZELİ', 27),
(332, 332, 'ŞAHİNBEY', 27),
(333, 333, 'ŞEHİT KAMİL', 27),
(334, 334, 'KARKAMIŞ', 27),
(335, 335, 'NURDAĞI', 27),
(336, 336, 'GÜMÜŞHANE MERKEZ', 29),
(337, 337, 'KELKİT', 29),
(338, 338, 'ŞİRAN', 29),
(339, 339, 'TORUL', 29),
(340, 340, 'KÖSE', 29),
(341, 341, 'KÜRTÜN', 29),
(342, 342, 'ALUCRA', 28),
(343, 343, 'BULANCAK', 28),
(344, 344, 'DERELİ', 28),
(345, 345, 'ESPİYE', 28),
(346, 346, 'EYNESİL', 28),
(347, 347, 'GİRESUN MERKEZ', 28),
(348, 348, 'GÖRELE', 28),
(349, 349, 'KEŞAP', 28),
(350, 350, 'ŞEBİNKARAHİSAR', 28),
(351, 351, 'TİREBOLU', 28),
(352, 352, 'PİPAZİZ', 28),
(353, 353, 'YAĞLIDERE', 28),
(354, 354, 'ÇAMOLUK', 28),
(355, 355, 'ÇANAKÇI', 28),
(356, 356, 'DOĞANKENT', 28),
(357, 357, 'GÜCE', 28),
(358, 358, 'HAKKARİ MERKEZ', 30),
(359, 359, 'ÇUKURCA', 30),
(360, 360, 'ŞEMDİNLİ', 30),
(361, 361, 'YÜKSEKOVA', 30),
(362, 362, 'ALTINÖZÜ', 31),
(363, 363, 'DÖRTYOL', 31),
(364, 364, 'HATAY MERKEZ', 31),
(365, 365, 'HASSA', 31),
(366, 366, 'İSKENDERUN', 31),
(367, 367, 'KIRIKHAN', 31),
(368, 368, 'REYHANLI', 31),
(369, 369, 'SAMANDAĞ', 31),
(370, 370, 'YAYLADAĞ', 31),
(371, 371, 'ERZİN', 31),
(372, 372, 'BELEN', 31),
(373, 373, 'KUMLU', 31),
(374, 374, 'ISPARTA MERKEZ', 32),
(375, 375, 'ATABEY', 32),
(376, 376, 'KEÇİBORLU', 32),
(377, 377, 'EĞİRDİR', 32),
(378, 378, 'GELENDOST', 32),
(379, 379, 'SİNİRKENT', 32),
(380, 380, 'ULUBORLU', 32),
(381, 381, 'YALVAÇ', 32),
(382, 382, 'AKSU', 32),
(383, 383, 'GÖNEN', 32),
(384, 384, 'YENİŞAR BADEMLİ', 32),
(385, 385, 'IĞDIR MERKEZ', 76),
(386, 386, 'ARALIK', 76),
(387, 387, 'TUZLUCA', 76),
(388, 388, 'KARAKOYUNLU', 76),
(389, 389, 'AFŞİN', 46),
(390, 390, 'ANDIRIN', 46),
(391, 391, 'ELBİSTAN', 46),
(392, 392, 'GÖKSUN', 46),
(393, 393, 'KAHRAMANMARAŞ MERKEZ', 46),
(394, 394, 'PAZARCIK', 46),
(395, 395, 'TÜRKOĞLU', 46),
(396, 396, 'ÇAĞLAYANCERİT', 46),
(397, 397, 'EKİNÖZÜ', 46),
(398, 398, 'NURHAK', 46),
(399, 399, 'EFLANİ', 78),
(400, 400, 'ESKİPAZAR', 78),
(401, 401, 'KARABÜK MERKEZ', 78),
(402, 402, 'OVACIK', 78),
(403, 403, 'SAFRANBOLU', 78),
(404, 404, 'YENİCE', 78),
(405, 405, 'ERMENEK', 70),
(406, 406, 'KARAMAN MERKEZ', 70),
(407, 407, 'AYRANCI', 70),
(408, 408, 'KAZIMKARABEKİR', 70),
(409, 409, 'BAŞYAYLA', 70),
(410, 410, 'SARIVELİLER', 70),
(411, 411, 'KARS MERKEZ', 36),
(412, 412, 'ARPAÇAY', 36),
(413, 413, 'DİGOR', 36),
(414, 414, 'KAĞIZMAN', 36),
(415, 415, 'SARIKAMIŞ', 36),
(416, 416, 'SELİM', 36),
(417, 417, 'SUSUZ', 36),
(418, 418, 'AKYAKA', 36),
(419, 419, 'ABANA', 37),
(420, 420, 'KASTAMONU MERKEZ', 37),
(421, 421, 'ARAÇ', 37),
(422, 422, 'AZDAVAY', 37),
(423, 423, 'BOZKURT', 37),
(424, 424, 'CİDE', 37),
(425, 425, 'ÇATALZEYTİN', 37),
(426, 426, 'DADAY', 37),
(427, 427, 'DEVREKANİ', 37),
(428, 428, 'İNEBOLU', 37),
(429, 429, 'KÜRE', 37),
(430, 430, 'TAŞKÖPRÜ', 37),
(431, 431, 'TOSYA', 37),
(432, 432, 'İHSANGAZİ', 37),
(433, 433, 'PINARBAŞI', 37),
(434, 434, 'ŞENPAZAR', 37),
(435, 435, 'AĞLI', 37),
(436, 436, 'DOĞANYURT', 37),
(437, 437, 'HANÖNÜ', 37),
(438, 438, 'SEYDİLER', 37),
(439, 439, 'BÜNYAN', 38),
(440, 440, 'DEVELİ', 38),
(441, 441, 'FELAHİYE', 38),
(442, 442, 'İNCESU', 38),
(443, 443, 'PINARBAŞI', 38),
(444, 444, 'SARIOĞLAN', 38),
(445, 445, 'SARIZ', 38),
(446, 446, 'TOMARZA', 38),
(447, 447, 'YAHYALI', 38),
(448, 448, 'YEŞİLHİSAR', 38),
(449, 449, 'AKKIŞLA', 38),
(450, 450, 'TALAS', 38),
(451, 451, 'KOCASİNAN', 38),
(452, 452, 'MELİKGAZİ', 38),
(453, 453, 'HACILAR', 38),
(454, 454, 'ÖZVATAN', 38),
(455, 455, 'DERİCE', 71),
(456, 456, 'KESKİN', 71),
(457, 457, 'KIRIKKALE MERKEZ', 71),
(458, 458, 'SALAK YURT', 71),
(459, 459, 'BAHŞİLİ', 71),
(460, 460, 'BALIŞEYH', 71),
(461, 461, 'ÇELEBİ', 71),
(462, 462, 'KARAKEÇİLİ', 71),
(463, 463, 'YAHŞİHAN', 71),
(464, 464, 'KIRKKLARELİ MERKEZ', 39),
(465, 465, 'BABAESKİ', 39),
(466, 466, 'DEMİRKÖY', 39),
(467, 467, 'KOFÇAY', 39),
(468, 468, 'LÜLEBURGAZ', 39),
(469, 469, 'VİZE', 39),
(470, 470, 'KIRŞEHİR MERKEZ', 40),
(471, 471, 'ÇİÇEKDAĞI', 40),
(472, 472, 'KAMAN', 40),
(473, 473, 'MUCUR', 40),
(474, 474, 'AKPINAR', 40),
(475, 475, 'AKÇAKENT', 40),
(476, 476, 'BOZTEPE', 40),
(477, 477, 'KOCAELİ MERKEZ', 41),
(478, 478, 'GEBZE', 41),
(479, 479, 'GÖLCÜK', 41),
(480, 480, 'KANDIRA', 41),
(481, 481, 'KARAMÜRSEL', 41),
(482, 482, 'KÖRFEZ', 41),
(483, 483, 'DERİNCE', 41),
(484, 484, 'KONYA MERKEZ', 42),
(485, 485, 'AKŞEHİR', 42),
(486, 486, 'BEYŞEHİR', 42),
(487, 487, 'BOZKIR', 42),
(488, 488, 'CİHANBEYLİ', 42),
(489, 489, 'ÇUMRA', 42),
(490, 490, 'DOĞANHİSAR', 42),
(491, 491, 'EREĞLİ', 42),
(492, 492, 'HADİM', 42),
(493, 493, 'ILGIN', 42),
(494, 494, 'KADINHANI', 42),
(495, 495, 'KARAPINAR', 42),
(496, 496, 'KULU', 42),
(497, 497, 'SARAYÖNÜ', 42),
(498, 498, 'SEYDİŞEHİR', 42),
(499, 499, 'YUNAK', 42),
(500, 500, 'AKÖREN', 42),
(501, 501, 'ALTINEKİN', 42),
(502, 502, 'DEREBUCAK', 42),
(503, 503, 'HÜYÜK', 42),
(504, 504, 'KARATAY', 42),
(505, 505, 'MERAM', 42),
(506, 506, 'SELÇUKLU', 42),
(507, 507, 'TAŞKENT', 42),
(508, 508, 'AHIRLI', 42),
(509, 509, 'ÇELTİK', 42),
(510, 510, 'DERBENT', 42),
(511, 511, 'EMİRGAZİ', 42),
(512, 512, 'GÜNEYSINIR', 42),
(513, 513, 'HALKAPINAR', 42),
(514, 514, 'TUZLUKÇU', 42),
(515, 515, 'YALIHÜYÜK', 42),
(516, 516, 'KÜTAHYA  MERKEZ', 43),
(517, 517, 'ALTINTAŞ', 43),
(518, 518, 'DOMANİÇ', 43),
(519, 519, 'EMET', 43),
(520, 520, 'GEDİZ', 43),
(521, 521, 'SİMAV', 43),
(522, 522, 'TAVŞANLI', 43),
(523, 523, 'ASLANAPA', 43),
(524, 524, 'DUMLUPINAR', 43),
(525, 525, 'HİSARCIK', 43),
(526, 526, 'ŞAPHANE', 43),
(527, 527, 'ÇAVDARHİSAR', 43),
(528, 528, 'PAZARLAR', 43),
(529, 529, 'KİLİS MERKEZ', 79),
(530, 530, 'ELBEYLİ', 79),
(531, 531, 'MUSABEYLİ', 79),
(532, 532, 'POLATELİ', 79),
(533, 533, 'MALATYA MERKEZ', 44),
(534, 534, 'AKÇADAĞ', 44),
(535, 535, 'ARAPGİR', 44),
(536, 536, 'ARGUVAN', 44),
(537, 537, 'DARENDE', 44),
(538, 538, 'DOĞANŞEHİR', 44),
(539, 539, 'HEKİMHAN', 44),
(540, 540, 'PÜTÜRGE', 44),
(541, 541, 'YEŞİLYURT', 44),
(542, 542, 'BATTALGAZİ', 44),
(543, 543, 'DOĞANYOL', 44),
(544, 544, 'KALE', 44),
(545, 545, 'KULUNCAK', 44),
(546, 546, 'YAZIHAN', 44),
(547, 547, 'AKHİSAR', 45),
(548, 548, 'ALAŞEHİR', 45),
(549, 549, 'DEMİRCİ', 45),
(550, 550, 'GÖRDES', 45),
(551, 551, 'KIRKAĞAÇ', 45),
(552, 552, 'KULA', 45),
(553, 553, 'MANİSA MERKEZ', 45),
(554, 554, 'SALİHLİ', 45),
(555, 555, 'SARIGÖL', 45),
(556, 556, 'SARUHANLI', 45),
(557, 557, 'SELENDİ', 45),
(558, 558, 'SOMA', 45),
(559, 559, 'TURGUTLU', 45),
(560, 560, 'AHMETLİ', 45),
(561, 561, 'GÖLMARMARA', 45),
(562, 562, 'KÖPRÜBAŞI', 45),
(563, 563, 'DERİK', 47),
(564, 564, 'KIZILTEPE', 47),
(565, 565, 'MARDİN MERKEZ', 47),
(566, 566, 'MAZIDAĞI', 47),
(567, 567, 'MİDYAT', 47),
(568, 568, 'NUSAYBİN', 47),
(569, 569, 'ÖMERLİ', 47),
(570, 570, 'SAVUR', 47),
(571, 571, 'YEŞİLLİ', 47),
(572, 572, 'MERSİN MERKEZ', 33),
(573, 573, 'ANAMUR', 33),
(574, 574, 'ERDEMLİ', 33),
(575, 575, 'GÜLNAR', 33),
(576, 576, 'MUT', 33),
(577, 577, 'SİLİFKE', 33),
(578, 578, 'TARSUS', 33),
(579, 579, 'AYDINCIK', 33),
(580, 580, 'BOZYAZI', 33),
(581, 581, 'ÇAMLIYAYLA', 33),
(582, 582, 'BODRUM', 48),
(583, 583, 'DATÇA', 48),
(584, 584, 'FETHİYE', 48),
(585, 585, 'KÖYCEĞİZ', 48),
(586, 586, 'MARMARİS', 48),
(587, 587, 'MİLAS', 48),
(588, 588, 'MUĞLA MERKEZ', 48),
(589, 589, 'ULA', 48),
(590, 590, 'YATAĞAN', 48),
(591, 591, 'DALAMAN', 48),
(592, 592, 'KAVAKLI DERE', 48),
(593, 593, 'ORTACA', 48),
(594, 594, 'BULANIK', 49),
(595, 595, 'MALAZGİRT', 49),
(596, 596, 'MUŞ MERKEZ', 49),
(597, 597, 'VARTO', 49),
(598, 598, 'HASKÖY', 49),
(599, 599, 'KORKUT', 49),
(600, 600, 'NEVŞEHİR MERKEZ', 50),
(601, 601, 'AVANOS', 50),
(602, 602, 'DERİNKUYU', 50),
(603, 603, 'GÜLŞEHİR', 50),
(604, 604, 'HACIBEKTAŞ', 50),
(605, 605, 'KOZAKLI', 50),
(606, 606, 'ÜRGÜP', 50),
(607, 607, 'ACIGÖL', 50),
(608, 608, 'NİĞDE MERKEZ', 51),
(609, 609, 'BOR', 51),
(610, 610, 'ÇAMARDI', 51),
(611, 611, 'ULUKIŞLA', 51),
(612, 612, 'ALTUNHİSAR', 51),
(613, 613, 'ÇİFTLİK', 51),
(614, 614, 'AKKUŞ', 52),
(615, 615, 'AYBASTI', 52),
(616, 616, 'FATSA', 52),
(617, 617, 'GÖLKÖY', 52),
(618, 618, 'KORGAN', 52),
(619, 619, 'KUMRU', 52),
(620, 620, 'MESUDİYE', 52),
(621, 621, 'ORDU MERKEZ', 52),
(622, 622, 'PERŞEMBE', 52),
(623, 623, 'ULUBEY', 52),
(624, 624, 'ÜNYE', 52),
(625, 625, 'GÜLYALI', 52),
(626, 626, 'GÜRGENTEPE', 52),
(627, 627, 'ÇAMAŞ', 52),
(628, 628, 'ÇATALPINAR', 52),
(629, 629, 'ÇAYBAŞI', 52),
(630, 630, 'İKİZCE', 52),
(631, 631, 'KABADÜZ', 52),
(632, 632, 'KABATAŞ', 52),
(633, 633, 'BAHÇE', 80),
(634, 634, 'KADİRLİ', 80),
(635, 635, 'OSMANİYE MERKEZ', 80),
(636, 636, 'DÜZİÇİ', 80),
(637, 637, 'HASANBEYLİ', 80),
(638, 638, 'SUMBAŞ', 80),
(639, 639, 'TOPRAKKALE', 80),
(640, 640, 'RİZE MERKEZ', 53),
(641, 641, 'ARDEŞEN', 53),
(642, 642, 'ÇAMLIHEMŞİN', 53),
(643, 643, 'ÇAYELİ', 53),
(644, 644, 'FINDIKLI', 53),
(645, 645, 'İKİZDERE', 53),
(646, 646, 'KALKANDERE', 53),
(647, 647, 'PAZAR', 53),
(648, 648, 'GÜNEYSU', 53),
(649, 649, 'DEREPAZARI', 53),
(650, 650, 'HEMŞİN', 53),
(651, 651, 'İYİDERE', 53),
(652, 652, 'AKYAZI', 54),
(653, 653, 'GEYVE', 54),
(654, 654, 'HENDEK', 54),
(655, 655, 'KARASU', 54),
(656, 656, 'KAYNARCA', 54),
(657, 657, 'SAKARYA MERKEZ', 54),
(658, 658, 'PAMUKOVA', 54),
(659, 659, 'TARAKLI', 54),
(660, 660, 'FERİZLİ', 54),
(661, 661, 'KARAPÜRÇEK', 54),
(662, 662, 'SÖĞÜTLÜ', 54),
(663, 663, 'ALAÇAM', 55),
(664, 664, 'BAFRA', 55),
(665, 665, 'ÇARŞAMBA', 55),
(666, 666, 'HAVZA', 55),
(667, 667, 'KAVAK', 55),
(668, 668, 'LADİK', 55),
(669, 669, 'SAMSUN MERKEZ', 55),
(670, 670, 'TERME', 55),
(671, 671, 'VEZİRKÖPRÜ', 55),
(672, 672, 'ASARCIK', 55),
(673, 673, 'ONDOKUZMAYIS', 55),
(674, 674, 'SALIPAZARI', 55),
(675, 675, 'TEKKEKÖY', 55),
(676, 676, 'AYVACIK', 55),
(677, 677, 'YAKAKENT', 55),
(678, 678, 'AYANCIK', 57),
(679, 679, 'BOYABAT', 57),
(680, 680, 'SİNOP MERKEZ', 57),
(681, 681, 'DURAĞAN', 57),
(682, 682, 'ERGELEK', 57),
(683, 683, 'GERZE', 57),
(684, 684, 'TÜRKELİ', 57),
(685, 685, 'DİKMEN', 57),
(686, 686, 'SARAYDÜZÜ', 57),
(687, 687, 'DİVRİĞİ', 58),
(688, 688, 'GEMEREK', 58),
(689, 689, 'GÜRÜN', 58),
(690, 690, 'HAFİK', 58),
(691, 691, 'İMRANLI', 58),
(692, 692, 'KANGAL', 58),
(693, 693, 'KOYUL HİSAR', 58),
(694, 694, 'SİVAS MERKEZ', 58),
(695, 695, 'SU ŞEHRİ', 58),
(696, 696, 'ŞARKIŞLA', 58),
(697, 697, 'YILDIZELİ', 58),
(698, 698, 'ZARA', 58),
(699, 699, 'AKINCILAR', 58),
(700, 700, 'ALTINYAYLA', 58),
(701, 701, 'DOĞANŞAR', 58),
(702, 702, 'GÜLOVA', 58),
(703, 703, 'ULAŞ', 58),
(704, 704, 'BAYKAN', 56),
(705, 705, 'ERUH', 56),
(706, 706, 'KURTALAN', 56),
(707, 707, 'PERVARİ', 56),
(708, 708, 'SİİRT MERKEZ', 56),
(709, 709, 'ŞİRVARİ', 56),
(710, 710, 'AYDINLAR', 56),
(711, 711, 'TEKİRDAĞ MERKEZ', 59),
(712, 712, 'ÇERKEZKÖY', 59),
(713, 713, 'ÇORLU', 59),
(714, 714, 'HAYRABOLU', 59),
(715, 715, 'MALKARA', 59),
(716, 716, 'MURATLI', 59),
(717, 717, 'SARAY', 59),
(718, 718, 'ŞARKÖY', 59),
(719, 719, 'MARAMARAEREĞLİSİ', 59),
(720, 720, 'ALMUS', 60),
(721, 721, 'ARTOVA', 60),
(722, 722, 'TOKAT MERKEZ', 60),
(723, 723, 'ERBAA', 60),
(724, 724, 'NİKSAR', 60),
(725, 725, 'REŞADİYE', 60),
(726, 726, 'TURHAL', 60),
(727, 727, 'ZİLE', 60),
(728, 728, 'PAZAR', 60),
(729, 729, 'YEŞİLYURT', 60),
(730, 730, 'BAŞÇİFTLİK', 60),
(731, 731, 'SULUSARAY', 60),
(732, 732, 'TRABZON MERKEZ', 61),
(733, 733, 'AKÇAABAT', 61),
(734, 734, 'ARAKLI', 61),
(735, 735, 'ARŞİN', 61),
(736, 736, 'ÇAYKARA', 61),
(737, 737, 'MAÇKA', 61),
(738, 738, 'OF', 61),
(739, 739, 'SÜRMENE', 61),
(740, 740, 'TONYA', 61),
(741, 741, 'VAKFIKEBİR', 61),
(742, 742, 'YOMRA', 61),
(743, 743, 'BEŞİKDÜZÜ', 61),
(744, 744, 'ŞALPAZARI', 61),
(745, 745, 'ÇARŞIBAŞI', 61),
(746, 746, 'DERNEKPAZARI', 61),
(747, 747, 'DÜZKÖY', 61),
(748, 748, 'HAYRAT', 61),
(749, 749, 'KÖPRÜBAŞI', 61),
(750, 750, 'TUNCELİ MERKEZ', 62),
(751, 751, 'ÇEMİŞGEZEK', 62),
(752, 752, 'HOZAT', 62),
(753, 753, 'MAZGİRT', 62),
(754, 754, 'NAZİMİYE', 62),
(755, 755, 'OVACIK', 62),
(756, 756, 'PERTEK', 62),
(757, 757, 'PÜLÜMÜR', 62),
(758, 758, 'BANAZ', 64),
(759, 759, 'EŞME', 64),
(760, 760, 'KARAHALLI', 64),
(761, 761, 'SİVASLI', 64),
(762, 762, 'ULUBEY', 64),
(763, 763, 'UŞAK MERKEZ', 64),
(764, 764, 'BAŞKALE', 65),
(765, 765, 'VAN MERKEZ', 65),
(766, 766, 'EDREMİT', 65),
(767, 767, 'ÇATAK', 65),
(768, 768, 'ERCİŞ', 65),
(769, 769, 'GEVAŞ', 65),
(770, 770, 'GÜRPINAR', 65),
(771, 771, 'MURADİYE', 65),
(772, 772, 'ÖZALP', 65),
(773, 773, 'BAHÇESARAY', 65),
(774, 774, 'ÇALDIRAN', 65),
(775, 775, 'SARAY', 65),
(776, 776, 'YALOVA MERKEZ', 77),
(777, 777, 'ALTINOVA', 77),
(778, 778, 'ARMUTLU', 77),
(779, 779, 'ÇINARCIK', 77),
(780, 780, 'ÇİFTLİKKÖY', 77),
(781, 781, 'TERMAL', 77),
(782, 782, 'AKDAĞMADENİ', 66),
(783, 783, 'BOĞAZLIYAN', 66),
(784, 784, 'YOZGAT MERKEZ', 66),
(785, 785, 'ÇAYIRALAN', 66),
(786, 786, 'ÇEKEREK', 66),
(787, 787, 'SARIKAYA', 66),
(788, 788, 'SORGUN', 66),
(789, 789, 'ŞEFAATLI', 66),
(790, 790, 'YERKÖY', 66),
(791, 791, 'KADIŞEHRİ', 66),
(792, 792, 'SARAYKENT', 66),
(793, 793, 'YENİFAKILI', 66),
(794, 794, 'ÇAYCUMA', 67),
(795, 795, 'DEVREK', 67),
(796, 796, 'ZONGULDAK MERKEZ', 67),
(797, 797, 'EREĞLİ', 67),
(798, 798, 'ALAPLI', 67),
(799, 799, 'GÖKÇEBEY', 67),
(800, 800, 'ÇANAKKALE MERKEZ', 17),
(801, 801, 'AYVACIK', 17),
(802, 802, 'BAYRAMİÇ', 17),
(803, 803, 'BİGA', 17),
(804, 804, 'BOZCAADA', 17),
(805, 805, 'ÇAN', 17),
(806, 806, 'ECEABAT', 17),
(807, 807, 'EZİNE', 17),
(808, 808, 'LAPSEKİ', 17),
(809, 809, 'YENİCE', 17),
(810, 810, 'ÇANKIRI MERKEZ', 18),
(811, 811, 'ÇERKEŞ', 18),
(812, 812, 'ELDİVAN', 18),
(813, 813, 'ILGAZ', 18),
(814, 814, 'KURŞUNLU', 18),
(815, 815, 'ORTA', 18),
(816, 816, 'ŞABANÖZÜ', 18),
(817, 817, 'YAPRAKLI', 18),
(818, 818, 'ATKARACALAR', 18),
(819, 819, 'KIZILIRMAK', 18),
(820, 820, 'BAYRAMÖREN', 18),
(821, 821, 'KORGUN', 18),
(822, 822, 'ALACA', 19),
(823, 823, 'BAYAT', 19),
(824, 824, 'ÇORUM MERKEZ', 19),
(825, 825, 'İKSİPLİ', 19),
(826, 826, 'KARGI', 19),
(827, 827, 'MECİTÖZÜ', 19),
(828, 828, 'ORTAKÖY', 19),
(829, 829, 'OSMANCIK', 19),
(830, 830, 'SUNGURLU', 19),
(831, 831, 'DODURGA', 19),
(832, 832, 'LAÇİN', 19),
(833, 833, 'OĞUZLAR', 19),
(834, 834, 'ADALAR', 34),
(835, 835, 'BAKIRKÖY', 34),
(836, 836, 'BEŞİKTAŞ', 34),
(837, 837, 'BEYKOZ', 34),
(838, 838, 'BEYOĞLU', 34),
(839, 839, 'ÇATALCA', 34),
(840, 840, 'EMİNÖNÜ', 34),
(841, 841, 'EYÜP', 34),
(842, 842, 'FATİH', 34),
(843, 843, 'GAZİOSMANPAŞA', 34),
(844, 844, 'KADIKÖY', 34),
(845, 845, 'KARTAL', 34),
(846, 846, 'SARIYER', 34),
(847, 847, 'SİLİVRİ', 34),
(848, 848, 'ŞİLE', 34),
(849, 849, 'ŞİŞLİ', 34),
(850, 850, 'ÜSKÜDAR', 34),
(851, 851, 'ZEYTİNBURNU', 34),
(852, 852, 'BÜYÜKÇEKMECE', 34),
(853, 853, 'KAĞITHANE', 34),
(854, 854, 'KÜÇÜKÇEKMECE', 34),
(855, 855, 'PENDİK', 34),
(856, 856, 'ÜMRANİYE', 34),
(857, 857, 'BAYRAMPAŞA', 34),
(858, 858, 'AVCILAR', 34),
(859, 859, 'BAĞCILAR', 34),
(860, 860, 'BAHÇELİEVLER', 34),
(861, 861, 'GÜNGÖREN', 34),
(862, 862, 'MALTEPE', 34),
(863, 863, 'SULTANBEYLİ', 34),
(864, 864, 'TUZLA', 34),
(865, 865, 'ESENLER', 34),
(866, 866, 'ALİAĞA', 35),
(867, 867, 'BAYINDIR', 35),
(868, 868, 'BERGAMA', 35),
(869, 869, 'BORNOVA', 35),
(870, 870, 'ÇEŞME', 35),
(871, 871, 'DİKİLİ', 35),
(872, 872, 'FOÇA', 35),
(873, 873, 'KARABURUN', 35),
(874, 874, 'KARŞIYAKA', 35),
(875, 875, 'KEMALPAŞA', 35),
(876, 876, 'KINIK', 35),
(877, 877, 'KİRAZ', 35),
(878, 878, 'MENEMEN', 35),
(879, 879, 'ÖDEMİŞ', 35),
(880, 880, 'SEFERİHİSAR', 35),
(881, 881, 'SELÇUK', 35),
(882, 882, 'TİRE', 35),
(883, 883, 'TORBALI', 35),
(884, 884, 'URLA', 35),
(885, 885, 'BEYDAĞ', 35),
(886, 886, 'BUCA', 35),
(887, 887, 'KONAK', 35),
(888, 888, 'MENDERES', 35),
(889, 889, 'BALÇOVA', 35),
(890, 890, 'ÇİGLİ', 35),
(891, 891, 'GAZİEMİR', 35),
(892, 892, 'NARLIDERE', 35),
(893, 893, 'GÜZELBAHÇE', 35),
(894, 894, 'ŞANLIURFA MERKEZ', 63),
(895, 895, 'AKÇAKALE', 63),
(896, 896, 'BİRECİK', 63),
(897, 897, 'BOZOVA', 63),
(898, 898, 'CEYLANPINAR', 63),
(899, 899, 'HALFETİ', 63),
(900, 900, 'HİLVAN', 63),
(901, 901, 'SİVEREK', 63),
(902, 902, 'SURUÇ', 63),
(903, 903, 'VİRANŞEHİR', 63),
(904, 904, 'HARRAN', 63),
(905, 905, 'BEYTÜŞŞEBAP', 73),
(906, 906, 'ŞIRNAK MERKEZ', 73),
(907, 907, 'CİZRE', 73),
(908, 908, 'İDİL', 73),
(909, 909, 'SİLOPİ', 73),
(910, 910, 'ULUDERE', 73),
(911, 911, 'GÜÇLÜKONAK', 73);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filesurl`
--

CREATE TABLE `filesurl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `basket_id` int(11) NOT NULL,
  `fileurl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '271596057465.jpg', '2020-07-29 18:17:46', '2020-07-29 18:17:46'),
(2, '531596057465.jpg', '2020-07-29 18:17:46', '2020-07-29 18:17:46'),
(3, '1401596057464.jpg', '2020-07-29 18:17:46', '2020-07-29 18:17:46'),
(4, '1741596057467.PNG', '2020-07-29 18:17:47', '2020-07-29 18:17:47'),
(5, '441596057475.jpg', '2020-07-29 18:17:56', '2020-07-29 18:17:56'),
(6, '6331596895085.jpg', '2020-08-08 10:58:06', '2020-08-08 10:58:06'),
(7, '19711596895106.jpg', '2020-08-08 10:58:27', '2020-08-08 10:58:27'),
(8, '13711596895106.jpg', '2020-08-08 10:58:28', '2020-08-08 10:58:28'),
(9, '10031596895107.jpg', '2020-08-08 10:58:28', '2020-08-08 10:58:28'),
(10, '10811597702978.jpg', '2020-08-17 19:22:59', '2020-08-17 19:22:59'),
(14, '6301597937027.jpg', '2020-08-20 12:23:48', '2020-08-20 12:23:48'),
(17, '12071598270454.jpg', '2020-08-24 09:00:55', '2020-08-24 09:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `InformationCats_id` bigint(20) UNSIGNED NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `InformationCats_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 3, '<p>Firma Hakkında i&ccedil;ea Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsinizriği bu alandan gire bilirsiniz .</p>\r\n\r\n<p>&nbsp;&nbsp;</p>\r\n\r\n<p>Firma Hakkında i&ccedil;eriği bu alandan gire bilirsiniz .</p>\r\n\r\n<p>Firma Hakkında i&ccedil;eriği bu alandan gire bilirsiniz .</p>\r\n\r\n<p>Firma Hakkında i&ccedil;eriği bu alandan gire bilirsiniz .</p>\r\n\r\n<p>a Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniz</p>', '2020-08-12 21:39:54', '2020-08-12 21:39:54'),
(2, 4, '<p>&nbsp;</p>\r\n\r\n<p>Firma Hakkında i&ccedil;eriği bu alandan gire bilirsiniz .</p>\r\n\r\n<p>Firma Hakkında i&ccedil;eriği bu alandan gire bilirsiniz .</p>\r\n\r\n<p>Firma Hakkında i&ccedil;eriği bu alandan gire bilirsiniz .</p>\r\n\r\n<p>a Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniz</p>', '2020-08-17 16:21:51', '2020-08-17 16:21:51'),
(3, 5, '<p>a Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu aland</p>\r\n\r\n<p>a Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bili&nbsp;</p>\r\n\r\n<p>a Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniza Hakkında i&ccedil;eriği bu alandan gire bilirsiniz</p>', '2020-08-17 16:22:20', '2020-08-17 16:22:20'),
(4, 6, '<p>Doğru mesaj ile istenilen hedef kitlesine ulaşın ve rakiplerinizin bir adım &ouml;tesine ge&ccedil;in.</p>\r\n\r\n<p>PİXEL REKLAM ekibi olarak kuruluşumuzdan bu yana i&ccedil; mimari tasarım/uygulama, dış cephe tasarım/uygulama, t&uuml;m indoor - outdoor reklam ve uygulama faaliyet alanlarında &ccedil;&ouml;z&uuml;m ortaklarımıza kurumsal hizmet sunmaktayız.</p>\r\n\r\n<p>Reklamcılık alanında &uuml;retimden montaja 7 seneyi aşkın tecr&uuml;bemiz ve yenilik&ccedil;i fikirlerimiz ile firmaların gelişen rekabet ortamına uyum sağlayabilmeleri i&ccedil;in &ccedil;alışıyoruz.</p>\r\n\r\n<p>Doğru mesaj ile istenilen hedef kitlesine ulaşın ve rakiplerinizin bir adım &ouml;tesine ge&ccedil;in.</p>\r\n\r\n<p>PİXEL REKLAM ekibi olarak kuruluşumuzdan bu yana i&ccedil; mimari tasarım/uygulama, dış cephe tasarım/uygulama, t&uuml;m indoor - outdoor reklam ve uygulama faaliyet alanlarında &ccedil;&ouml;z&uuml;m ortaklarımıza kurumsal hizmet sunmaktayız.</p>\r\n\r\n<p>Reklamcılık alanında &uuml;retimden montaja 7 seneyi aşkın tecr&uuml;bemiz ve yenilik&ccedil;i fikirlerimiz ile firmaların gelişen rekabet ortamına uyum sağlayabilmeleri i&ccedil;in &ccedil;alışıyoruz.</p>\r\n\r\n<p>Doğru mesaj ile istenilen hedef kitlesine ulaşın ve rakiplerinizin bir adım &ouml;tesine ge&ccedil;in.</p>\r\n\r\n<p>PİXEL REKLAM ekibi olarak kuruluşumuzdan bu yana i&ccedil; mimari tasarım/uygulama, dış cephe tasarım/uygulama, t&uuml;m indoor - outdoor reklam ve uygulama faaliyet alanlarında &ccedil;&ouml;z&uuml;m ortaklarımıza kurumsal hizmet sunmaktayız.</p>\r\n\r\n<p>Reklamcılık alanında &uuml;retimden montaja 7 seneyi aşkın tecr&uuml;bemiz ve yenilik&ccedil;i fikirlerimiz ile firmaların gelişen rekabet ortamına uyum sağlayabilmeleri i&ccedil;in &ccedil;alışıyoruz.</p>\r\n\r\n<p>Doğru mesaj ile istenilen hedef kitlesine ulaşın ve rakiplerinizin bir adım &ouml;tesine ge&ccedil;in.</p>\r\n\r\n<p>PİXEL REKLAM ekibi olarak kuruluşumuzdan bu yana i&ccedil; mimari tasarım/uygulama, dış cephe tasarım/uygulama, t&uuml;m indoor - outdoor reklam ve uygulama faaliyet alanlarında &ccedil;&ouml;z&uuml;m ortaklarımıza kurumsal hizmet sunmaktayız.</p>\r\n\r\n<p>Reklamcılık alanında &uuml;retimden montaja 7 seneyi aşkın tecr&uuml;bemiz ve yenilik&ccedil;i fikirlerimiz ile firmaların gelişen rekabet ortamına uyum sağlayabilmeleri i&ccedil;in &ccedil;alışıyoruz.</p>', '2020-08-17 16:27:12', '2020-08-17 16:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `informationcats`
--

CREATE TABLE `informationcats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informationcats`
--

INSERT INTO `informationcats` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Guvenlik konusu', '2020-08-10 23:41:03', '2020-08-17 18:23:09'),
(4, 'deneme 2', '2020-08-10 23:41:11', '2020-08-10 23:41:11'),
(5, 'deneme3', '2020-08-10 23:41:19', '2020-08-10 23:41:19'),
(6, 'deneme4', '2020-08-10 23:41:27', '2020-08-10 23:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_07_09_204413__create_about_table', 1),
(4, '2020_07_10_005932__create_setting_table', 1),
(5, '2020_07_12_215532__create_gallery_table', 1),
(6, '2020_07_13_010938__create_information_cats_table', 1),
(7, '2020_07_13_010939__create_information_table', 1),
(8, '2020_07_14_125344__table__inform', 1),
(9, '2020_07_16_112158__create_product_categories_table', 1),
(10, '2020_07_16_173623__create_options_table', 1),
(11, '2020_07_16_174136__create_products_table', 1),
(12, '2020_07_18_182958__create_additionaloption_table', 1),
(13, '2020_07_20_230237__create_services_table', 1),
(14, '2020_07_26_103837__create_table_productimages', 1),
(15, '2020_07_27_141239__table_product_foreign', 1),
(16, '2020_08_06_084047_create_references_table', 2),
(21, '2014_10_12_000000_create_users_table', 3),
(22, '2020_08_15_004925__create_user_information_table', 3),
(23, '2020_08_17_123022__create_slider_table_', 4),
(24, '2020_08_20_220735__create_table_basket', 5),
(25, '2020_08_20_221105__create_table_basket_products', 6),
(28, '2020_08_22_001800__create_corporativeinform_table', 7),
(29, '2020_08_29_194941_catalogue-table', 8),
(30, '2020_09_05_083319___create_currency', 9),
(31, '2020_09_05_142036___create_contact', 9),
(32, '2020_09_05_153027__table_products_newcolumns', 9),
(33, '2020_09_07_092635___create_subscriptions', 10),
(35, '2020_09_07_172113__table_basket_columns', 11),
(36, '2020_09_07_215817__create_table_filesurl', 12),
(37, '2020_09_08_003153__create_table_order', 12);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double DEFAULT NULL,
  `stock` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `parent_id`, `name`, `option_code`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(16, NULL, 'Vinil Menşei', 'VNLMENSEİ', NULL, 0, '2020-08-27 19:52:41', '2020-08-27 19:52:41'),
(17, 16, 'Çin280gr', 'CHN280', 1.3, 1, '2020-08-27 19:55:00', '2020-08-27 19:55:00'),
(18, 16, 'Çin440gr', 'CHN440', 1.85, 1, '2020-08-27 19:55:22', '2020-08-27 19:55:22'),
(19, 16, 'Avrupa 440', 'AVR440', 2.5, 1, '2020-08-27 19:55:55', '2020-08-27 19:55:55'),
(20, 16, 'Işıklı Çin', 'İSKCHN', 3.5, 1, '2020-08-27 19:56:28', '2020-08-27 19:56:28'),
(21, 16, 'Işıklı Avrupa', 'İSKAVR', 4.3, 1, '2020-08-27 19:56:59', '2020-08-27 19:56:59'),
(22, 16, 'Arkası Siyah', 'ARKS', 2.7, 1, '2020-08-27 19:57:28', '2020-08-27 19:57:28'),
(23, 16, 'Blockout Vinil', 'BLCKVNL', 6.5, 1, '2020-08-27 19:58:30', '2020-08-27 19:58:30'),
(24, 16, 'Çift Taraf510gr', 'CTRF', 4, 1, '2020-08-27 19:59:17', '2020-08-27 19:59:17'),
(25, 16, '510gr Avrupa vinil', '510AVP', 4, 1, '2020-08-27 19:59:52', '2020-08-27 19:59:52'),
(26, 16, '5mt Avrupa 440', '5mtavp', 3, 1, '2020-08-27 20:00:23', '2020-08-27 20:00:23'),
(27, NULL, 'Folyo Tipi', 'FLY', NULL, 0, '2020-08-27 20:09:12', '2020-08-27 20:09:12'),
(28, 27, 'Folyo-Unifol', 'FLYUNFL', 2.1, 1, '2020-08-27 20:10:08', '2020-08-27 20:10:08'),
(29, 27, 'Şeffaf', 'SFF', 2.75, 1, '2020-08-27 20:10:38', '2020-08-27 20:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `basket_id` int(11) NOT NULL,
  `filesurl` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `basket_id`, `filesurl`, `created_at`, `updated_at`) VALUES
(3, 60, 'http://asdasdasdasdasd.com', '2020-09-10 22:08:44', '2020-09-10 22:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta` json NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_option` int(11) DEFAULT NULL,
  `additional_options` json DEFAULT NULL,
  `stock` tinyint(1) NOT NULL,
  `hasmeter` tinyint(1) NOT NULL DEFAULT '1',
  `category` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `meta`, `slug`, `product_code`, `image`, `parent_option`, `additional_options`, `stock`, `hasmeter`, `category`, `created_at`, `updated_at`) VALUES
(14, 'Vinil', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '{\"title\": \"PVC türünde organik bileşikli bir malzemedir. Dayanıklı, hafif ve üzerine dijital baskı yapılır.\", \"description\": \"Yaptığınız işe yönelik farkındalık yaratmak için reklam tabelaları\"}', 'vinil', 'PR1223453241', '1598710689.jpeg', 16, '[\"10\"]', 1, 1, 4, '2020-08-29 11:18:10', '2020-08-29 11:18:10'),
(17, 'satilan urun', 25, 'satilan urun', '{\"title\": \"satilan urun\", \"description\": \"satilan urun\"}', 'satilan-urun', 'PR1230045', '1599683142.jpeg', NULL, '[\"10\"]', 1, 0, 4, '2020-09-09 17:25:43', '2020-09-09 17:25:43'),
(18, 'asdadasdasdas', 4, 'asdadasdasdasasdad \r\n asdasdasasdada sdasdasasdadasdasda sasdadasda sdasasdadasdas dasas dadasdasdasasda das \r\n dasdasasdada sda sdasasdadasdasd asasdadasdasdasasda dasdasdasa \r\n sdadasdasd asasdadasdasdasasd adasdasdasasdad asdasdasasdad  asdasdasasdadasdasdas', '{\"title\": \"asdadasdasdas\", \"description\": \"asdadasdasdas\"}', 'asdadasdasdas', 'PR1004512', '1599683412.jpeg', NULL, '[\"10\"]', 1, 1, 4, '2020-09-09 17:30:13', '2020-09-10 10:24:06'),
(19, 'Basketbol', 4, 'Basketbol Basketbol Basketbol Baske\r\ntbol Basketbol Basketbol Basketbol Basketbol Basketbol Basketbol Basketbol Basketbol Basketbol Basketbol Basketbol Basketbol Basketbol Basketbol Basketbol Basketbol v', '{\"title\": \"Basketbol\", \"description\": \"Basketbol\"}', 'basketbol', 'PR1229991', '1599746703.jpeg', 16, 'null', 1, 0, 4, '2020-09-10 11:05:04', '2020-09-10 11:05:04'),
(20, 'Valeybol', NULL, 'Valeybo   lValeybolValeyb    olV aley Va eybol  Valeyb olValeybo  lValeybo leybolVale bolValeybo lValeybolValeybolValeybol Valeybo   lValeybolValeyb    olV aley Va eybol  Valeyb olValeybo  lValeybo leybolVale bolValeybo lValeybolValeybolValeyboValeybo   lValeybolValeyb    olV aley Va eybol  Valeyb olValeybo  lValeybo leybolVale bolValeybo lValeybolValeybolValeybo Valeybo   lValeybolValeyb    olV aley Va eybol  Valeyb olValeybo  lValeybo leybolVale bolValeybo lValeybolValeybolValeybo', '{\"title\": \"Valeybo   lValeybolValeyb    olV aley Va eybol  Valeyb olValeybo\", \"description\": \"Valeybo   lValeybolValeyb    olV aley Va eybol  Valeyb olValeybo\"}', 'valeybol', 'PR555555', '1599750174.jpeg', 27, 'null', 1, 1, 4, '2020-09-10 12:02:55', '2020-09-10 12:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `slug`, `meta`, `created_at`, `updated_at`) VALUES
(4, 'Baskı Ürünleri', 'baski-urunleri', '{\"title\": \"Baskı Medya -  Baskı Ürünleri\", \"description\": \"Baskı Medya - Online Baskı Hizmeti Sipariş sitesi\"}', '2020-08-27 19:47:35', '2020-08-27 19:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `name`, `created_at`, `updated_at`) VALUES
(48, 14, '6821598710706.jpg', '2020-08-29 11:18:26', '2020-08-29 11:18:26'),
(49, 14, '6811598710706.jpg', '2020-08-29 11:18:26', '2020-08-29 11:18:26'),
(50, 14, '5011598710706.jpg', '2020-08-29 11:18:27', '2020-08-29 11:18:27'),
(51, 14, '6041598710706.jpg', '2020-08-29 11:18:27', '2020-08-29 11:18:27'),
(53, 18, '7951599683419.jpg', '2020-09-09 17:30:19', '2020-09-09 17:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `province_no` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `province_no`, `name`) VALUES
(1, 1, 'ADANA'),
(2, 2, 'ADIYAMA'),
(3, 3, 'AFYO'),
(4, 4, 'AĞRI'),
(5, 5, 'AMASYA'),
(6, 6, 'ANKARA'),
(7, 7, 'ANTALYA'),
(8, 8, 'ARTVİ'),
(9, 9, 'AYDI'),
(10, 10, 'BALIKESİR'),
(11, 11, 'BİLECİK'),
(12, 12, 'BİNGÖL'),
(13, 13, 'BİTLİS'),
(14, 14, 'BOLU'),
(15, 15, 'BURDUR'),
(16, 16, 'BURSA'),
(17, 17, 'ÇANAKKALE'),
(18, 18, 'ÇANKIRI'),
(19, 19, 'ÇORUM'),
(20, 20, 'DENİZLİ'),
(21, 21, 'DİYARBAKIR'),
(22, 22, 'EDİRNE'),
(23, 23, 'ELAZIĞ'),
(24, 24, 'ERZİNCA'),
(25, 25, 'ERZURUM'),
(26, 26, 'ESKİŞEHİR'),
(27, 27, 'GAZİANTEP'),
(28, 28, 'GİRESU'),
(29, 29, 'GÜMÜŞHANE'),
(30, 30, 'HAKKARİ'),
(31, 31, 'HATAY'),
(32, 32, 'ISPARTA'),
(33, 33, 'İÇEL'),
(34, 34, 'İSTANBUL'),
(35, 35, 'İZMİR'),
(36, 36, 'KARS'),
(37, 37, 'KASTAMONU'),
(38, 38, 'KAYSERİ'),
(39, 39, 'KIRKLARELİ'),
(40, 40, 'KIRŞEHİR'),
(41, 41, 'KOCAELİ'),
(42, 42, 'KONYA'),
(43, 43, 'KÜTAHYA'),
(44, 44, 'MALATYA'),
(45, 45, 'MANİSA'),
(46, 46, 'KAHRAMANMARAŞ'),
(47, 47, 'MARDİ'),
(48, 48, 'MUĞLA'),
(49, 49, 'MUŞ'),
(50, 50, 'NEVŞEHİR'),
(51, 51, 'NİĞDE'),
(52, 52, 'ORDU'),
(53, 53, 'RİZE'),
(54, 54, 'SAKARYA'),
(55, 55, 'SAMSU'),
(56, 56, 'SİİRT'),
(57, 57, 'SİNOP'),
(58, 58, 'SİVAS'),
(59, 59, 'TEKİRDAĞ'),
(60, 60, 'TOKAT'),
(61, 61, 'TRABZO'),
(62, 62, 'TUNCELİ'),
(63, 63, 'ŞANLIURFA'),
(64, 64, 'UŞAK'),
(65, 65, 'VA'),
(66, 66, 'YOZGAT'),
(67, 67, 'ZONGULDAK'),
(68, 68, 'AKSARAY'),
(69, 69, 'BAYBURT'),
(70, 70, 'KARAMA'),
(71, 71, 'KIRIKKALE'),
(72, 72, 'BATMA'),
(73, 73, 'ŞIRNAK'),
(74, 74, 'BARTI'),
(75, 75, 'ARDAHA'),
(76, 76, 'IĞDIR'),
(77, 77, 'YALOVA'),
(78, 78, 'KARABÜK'),
(79, 79, 'KİLİS'),
(80, 80, 'OSMANİYE'),
(81, 81, 'DÜZCE');

-- --------------------------------------------------------

--
-- Table structure for table `references`
--

CREATE TABLE `references` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `references`
--

INSERT INTO `references` (`id`, `image`, `name`, `created_at`, `updated_at`) VALUES
(3, '9861597388501.jpg', 'Gaziantep Büyükşehir Belediyyesi', '2020-08-14 04:01:41', '2020-08-20 10:09:51'),
(4, '16771597388554.jpg', 'Hatem hastenesi', '2020-08-14 04:02:34', '2020-08-14 04:02:34'),
(5, '5991597388577.jpg', 'Medical Park', '2020-08-14 04:02:58', '2020-08-14 04:02:58'),
(6, '9031597388605.jpg', 'Şahinbey Belediyesi', '2020-08-14 04:03:25', '2020-08-14 04:03:25'),
(7, '1911597391295.jpg', 'STRÖER', '2020-08-14 04:48:15', '2020-08-14 04:48:15'),
(8, '1501597391329.jpg', 'PEPSİ', '2020-08-14 04:48:50', '2020-08-14 04:48:50'),
(9, '17151597391346.jpg', 'TİRYAKİ', '2020-08-14 04:49:06', '2020-08-14 04:49:06'),
(10, '4621597391377.jpg', 'UYGAR eğitim kurumları', '2020-08-14 04:49:37', '2020-08-14 04:49:37'),
(11, '19321597391464.jpg', 'HAMMAN TEA', '2020-08-14 04:51:05', '2020-08-14 04:51:05'),
(12, '10101597391487.jpg', 'VESTEL', '2020-08-14 04:51:27', '2020-08-14 04:51:27'),
(13, '13261597391505.jpg', 'TÜRK TELEKOM', '2020-08-14 04:51:45', '2020-08-14 04:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` json NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `slug`, `header`, `meta`, `image`, `content`, `created_at`, `updated_at`) VALUES
(7, 'Tabela', 'tabela', 'Reklam ve pazarlamada Tabela', '{\"title\": \"Yaptığınız işe yönelik farkındalık yaratmak için reklam tabelaları en iyi araçlardan biridir.\", \"description\": \"Yaptığınız işe yönelik farkındalık yaratmak için reklam tabelaları en iyi araçlardan biridir. Kalabalık bir kaldırımdaki bir tabela veya karanlık bir sokakta dikkat çekici ışıklı bir tabela görünür olmanız yanı sıra etkili olmanızı da sağlayacaktır. Potansiyel müşterilerin sizi fark etmesini sağlar.\"}', '1597681363.jpeg', '<p>İşletmenizin b&uuml;y&uuml;kl&uuml;ğ&uuml; ne kadar olursa olsun m&uuml;şterilerinizi y&ouml;nlendirmek veya yeni m&uuml;şteri &ccedil;ekmek i&ccedil;in reklam ve pazarlama faaliyetlerine ihtiya&ccedil; duyarsınız. Bu faaliyetlerin en etkililerinden biri de reklam tabelalarıdır.</p>\r\n\r\n<p>Gelin isterseniz reklam tabelalarının işinize sağlayacağı beş &ouml;nemli faydaya kısaca bir g&ouml;z atalım;</p>\r\n\r\n<p><strong>Marka bilinirliği sağlar.</strong></p>\r\n\r\n<p>Her g&uuml;n bir&ccedil;ok reklam tabelası ile karşı karşıya kalıyoruz. Ancak ilgin&ccedil; ve farklı olan reklamlar veya tanıdığımız &uuml;r&uuml;nlerin tabelaları aklımızda kalır. Reklam tabelaları markanızın bilinirliliğini arttırdığı gibi ve olumlu bir imaj da yaratır. Ancak hasarlı ve k&ouml;t&uuml; bir reklam tabelası markanız i&ccedil;in iyi bir ara&ccedil; olmayacağını da s&ouml;ylememiz gerekir.</p>\r\n\r\n<p><strong>G&ouml;r&uuml;n&uuml;r olmanızı sağlar.</strong></p>\r\n\r\n<p>Yaptığınız işe y&ouml;nelik farkındalık yaratmak i&ccedil;in reklam tabelaları en iyi ara&ccedil;lardan biridir. Kalabalık bir kaldırımdaki bir tabela veya karanlık bir sokakta dikkat &ccedil;ekici ışıklı bir tabela g&ouml;r&uuml;n&uuml;r olmanız yanı sıra etkili olmanızı da sağlayacaktır. Potansiyel m&uuml;şterilerin sizi fark etmesini sağlar.</p>\r\n\r\n<p><strong>7/24 reklamınızı yapar.</strong></p>\r\n\r\n<p>Reklam tabelaları sizin adınıza durmadan reklamınızı yapar. Yani reklam tabelanız m&uuml;şterilerinize işinizi anlatan ve sizinle &ccedil;alışmaya davet eden yılmaz bir satış elemanıdır. Bu satış elemanı s&uuml;rekli m&uuml;şterileriniz ile temas kurur ve onlarla iletişim i&ccedil;erisinde olur.</p>\r\n\r\n<p><strong>G&ouml;rsel kimliğinizdir.</strong></p>\r\n\r\n<p>Reklam tabelanızın kalitesi ve g&ouml;r&uuml;n&uuml;m&uuml; sizin işinizin profesyonelliğini yansıtır. Potansiyel bir m&uuml;şteriyi ilk etkileyecek ara&ccedil; olan reklam tabelasının kalitesi ve profesyonelliği m&uuml;şteriye karşı ilk olumlu mesajı verir. İşinizin itibarının anahtarı tabelanızın kalitesine bağlıdır.</p>\r\n\r\n<p><strong>Maliyeti d&uuml;ş&uuml;kt&uuml;r.</strong></p>\r\n\r\n<p>Reklam tabelaları diğer reklam ara&ccedil;larına g&ouml;re daha uygun fiyatlıdır. &Ccedil;&uuml;nk&uuml; bir kere kaliteli bir şekilde yapıldıktan sonra başka bir maliyet olmayacağından diğerlerine g&ouml;re daha uygun bir b&uuml;t&ccedil;eye sahiptir.</p>\r\n\r\n<p><strong>Organize Sanayi B&ouml;lgelerinde Tabelanın &Ouml;nemi</strong></p>\r\n\r\n<p>Gaziantep b&uuml;y&uuml;k ticari merkezlerden biri olması yanı sıra bir&ccedil;ok organize sanayi b&ouml;lgesine de ev sahipliği yapar.<br />\r\nBu organize sanayi b&ouml;lgelerinde bir&ccedil;ok iş yerinin bir arada bulundurması sebebi ile farkındalık yaratmak i&ccedil;in reklam tabelası &ouml;nemli bir ara&ccedil; olmaktadır.</p>', '2020-08-17 13:22:43', '2020-08-17 13:22:43'),
(8, 'Araç Giydirme', 'arac-giydirme', 'Araç üzerine uygulanan reklam çalışmasına, Reklam sektöründe “Araç Giydirme ( Araç Kaplama )” ismi verilir.', '{\"title\": \"Pixel Reklam olarak Araç Giydirme konusunda 10 yıllık bir tecrübeye sahibiz\", \"description\": \"Pixel Reklam olarak Araç Giydirme konusunda 10 yıllık bir tecrübeye sahibiz, yılların vermiş olduğu bu birikimi müşterilerimizi bilgilendirmek amaçlı, internet sitelerimizde ve diğer basılı organlarda siz değerli müşterilerimizle paylaşacağız.\"}', '1597681650.jpeg', '<p><strong>Ara&ccedil; Giydirme Ne Demektir ?</strong></p>\r\n\r\n<p>Ara&ccedil; &uuml;zerine uygulanan reklam &ccedil;alışmasına, Reklam sekt&ouml;r&uuml;nde &ldquo;Ara&ccedil; Giydirme ( Ara&ccedil; Kaplama )&rdquo; ismi verilir. Ara&ccedil; &uuml;zerine uygulanan reklam &ccedil;alışmasına halk arasında ise &ldquo;Ara&ccedil; &Uuml;st&uuml; Reklam Kaplama&rdquo; denilir. Ara&ccedil; Giydirme konusu &ccedil;ok detaylı bir konu olup &uuml;zerine detaylı bir şekilde eğileceğiz.</p>\r\n\r\n<p>Pixel Reklam olarak Ara&ccedil; Giydirme konusunda 10 yıllık bir tecr&uuml;beye sahibiz, yılların vermiş olduğu bu birikimi m&uuml;şterilerimizi bilgilendirmek ama&ccedil;lı, internet sitelerimizde ve diğer basılı organlarda siz değerli m&uuml;şterilerimizle paylaşacağız.</p>\r\n\r\n<p><strong>Ara&ccedil; Giydirmenin Reklam Etkisi</strong></p>\r\n\r\n<p>Reklam sekt&ouml;r&uuml;nce &ccedil;ok fazla sayıda reklam yapabileceğiniz mecralar bulunmaktadır. Televizyon, Radyo, Gazete, Dergi, Tabela, Billboard, v.s. bu &ccedil;eşitliliğe &ccedil;ok daha fazla &ouml;rnek ekleyebiliriz. Televizyon, Radyo, Gazete reklamları hem zaman a&ccedil;ısından hem de fiyat a&ccedil;ısından maalesef ki firmaları zorlamaktadır. Pixel Reklam olarak, fiyat politikası ve reklamın hedefe ulaşması a&ccedil;ısından en &ouml;nemli reklam mecrasının Ara&ccedil; Giydirme olduğunu d&uuml;ş&uuml;n&uuml;yoruz. Ara&ccedil; Giydirme ( Ara&ccedil; &Uuml;st&uuml; Reklam ) işlemi i&ccedil;in bir araba almanıza gerek yok &ccedil;&uuml;nk&uuml; firmanızın muhakkak bir aracı vardır.</p>\r\n\r\n<p>Bu ara&ccedil; ister şahsi aracınız olsun ister firmanızın ihtiya&ccedil;larını gidermek i&ccedil;in ( nakliye, servis, toplantı ama&ccedil;lı ) bir ara&ccedil; olsun. Bu ara&ccedil; her daim trafikte olduğundan dolayı, s&uuml;rekli gezen bir reklam aracınız olacaktır. Bu sebepten dolayı Ara&ccedil; Giydirme reklamı &ccedil;ok &ouml;nemlidir. Ara&ccedil; Giydirme i&ccedil;in ayıracağınız b&uuml;t&ccedil;e Televizyon, Radyo, Gazete gibi reklam kurumlarına verdiğiniz b&uuml;t&ccedil;enin &ccedil;ok altındadır.</p>\r\n\r\n<p>Bir defaya mahsus vereceğiniz bu &uuml;cret karşılığında aracınızın &uuml;zerindeki reklamı 5-7 yıla kadar kullanabilirsiniz. Daha sonra renklerinde solma meydana gelecektir ve g&ouml;rseli yani aracın &uuml;st&uuml;ndeki imajı değiştirmek gerekecektir.</p>\r\n\r\n<p>G&ouml;r&uuml;ld&uuml;ğ&uuml; &uuml;zere bir defaya mahsus &ouml;demesini yaptığınız ara&ccedil; reklamını 7 yıla kadar kullanabiliyorsunuz. Firma ara&ccedil;ları olup ta Ara&ccedil; Reklamı yaptırmayanların sayısı g&uuml;n ge&ccedil;tik&ccedil;e azalmaktadır. Bu da Ara&ccedil; Giydirmenin ne kadar başarılı olduğunun bir ispatıdır.</p>\r\n\r\n<p>Ara&ccedil; Giydirme konusu hakkında +90 342 323 40 57 numralı telefonumuzu arayarak ayrıntılı bilgiye ulaşabilirsiniz.</p>', '2020-08-17 13:27:33', '2020-08-17 13:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metatitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metadescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `name`, `slogan`, `logo`, `website`, `metatitle`, `metadescription`, `about`, `number`, `phone`, `fax`, `address`, `map`, `email`, `facebook`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'Baskı Medya', 'Çağın Baskı Merkezi', '1598567339.png', 'https://baskimedya.com', 'Baskı Medya dijital baskının ünvanı', 'Baskıda dijital çağ .baskınız kargo ile ayağınıza gelsin', 'Baskıda çağı yakalayn bir takım olarak baskı merkezine gelmek zorunluğunu kaldırdık. baskınız kargo ile ayağınıza gelsin', '+90 342 323 40 57', '+90 342 323 40 57', '+90 342 323 40 57', 'Karacaahmet Mahallesi, Matbaacılar Sit. E/Blok No:3 Şehitkamil - GAZİANTEP', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d12594.230958848679!2d32.491819896288064!3d37.89402425065007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1str!2str!4v1595874623348!5m2!1str!2str\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', 'info@bakimedya.com', 'http://facebook.com', 'http://instagram.com', 'http://www.youtube.com', NULL, '2020-08-27 19:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spamtext` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `queue`, `image`, `spamtext`, `header`, `content`, `url`, `created_at`, `updated_at`) VALUES
(1, 3, '1597671781-min.jpeg', NULL, 'xeber başlıqı', 'Markanıza Değer Katıyoruz...Markanıza Değer Katıyoruz...Markanıza Değer Katıyoruz...Markanıza D', 'http://baskimedya.dev/product/4/valeybol', '2020-08-17 10:44:09', '2020-08-17 10:44:09'),
(2, 1, '1597676612-min.jpeg', 'Doğru Yerde, Doğru Zamanda', 'Bizimle Beraber Kis Keyfini cikarin', 'Markanıza Değer Katıyoruz...Markanıza Değer Katıyoruz...Markanıza Değer Katıyoruz...Markanıza D', 'http://baskimedya.dev/product/4/valeybol', '2020-08-17 11:53:26', '2020-08-17 12:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `online` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `email_verified_at`, `password`, `token`, `online`, `role`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Administrator', 'Ibrahimov', 'baylar@xeber.az', '2020-08-15 23:16:00', '$2y$10$fc41oOkjn0STEtKRkiLPBO0B8WLpMOzNJOIXqyZgxD2yEfM7WnypW', '9cfdf10e8fc047a44b08ed031e1f0ed1', 0, '1', 0, NULL, '2020-08-15 23:16:00', '2020-08-15 23:16:00'),
(4, 'Mehmet', 'Ahmet bas', 'baylar95i@gmail.com', '2020-08-15 23:56:30', '$2y$10$fc41oOkjn0STEtKRkiLPBO0B8WLpMOzNJOIXqyZgxD2yEfM7WnypW', NULL, 0, '0', 1, 'KLRzwvXPmT8w4hnCu6Zc10lF5ypqXAnViNrjCs0xDw3ddE1U0Bn0ym9yK736', '2020-08-15 23:56:30', '2020-08-22 09:06:08'),
(12, 'baylar', 'Ibrahimov', 'edenfilmaz@gmail.com', '2020-09-04 11:03:58', '$2y$10$kJdddGjnWGvYR54WdBMiTuCI4hn9kwsUZXVTv6hkvod2S6roEaZee', NULL, 0, '0', 1, NULL, '2020-09-04 11:03:58', '2020-09-04 11:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_informations`
--

CREATE TABLE `user_informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tckimlik` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_province` int(10) UNSIGNED NOT NULL,
  `user_district` int(10) UNSIGNED NOT NULL,
  `gsm` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gsm2` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_informations`
--

INSERT INTO `user_informations` (`id`, `user_id`, `tckimlik`, `user_province`, `user_district`, `gsm`, `gsm2`, `phone`, `phone2`, `created_at`, `updated_at`) VALUES
(1, 3, '123456789321', 42, 487, '123456', '12345633', '12345621', '123456121', '2020-08-15 23:16:00', '2020-08-22 09:03:47'),
(2, 4, '12341289321', 42, 487, '234234234', '12345633', '12345621', '123456121', '2020-08-15 23:56:30', '2020-08-20 14:36:13'),
(10, 12, '994568514848', 12, 210, '123456789', '123456789', '123456789', '123456789', '2020-09-04 11:03:58', '2020-09-04 11:03:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `additional_options`
--
ALTER TABLE `additional_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `basket_user_id_foreign` (`user_id`);

--
-- Indexes for table `basket_products`
--
ALTER TABLE `basket_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `basket_products_basket_id_foreign` (`basket_id`),
  ADD KEY `basket_products_product_id_foreign` (`product_id`),
  ADD KEY `basket_products_option_id_foreign` (`option_id`);

--
-- Indexes for table `catalogue`
--
ALTER TABLE `catalogue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_inform`
--
ALTER TABLE `company_inform`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_inform_user_id_foreign` (`user_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreignkey` (`province_no`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filesurl`
--
ALTER TABLE `filesurl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informationcats`
--
ALTER TABLE `informationcats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_foreign` (`category`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_informations`
--
ALTER TABLE `user_informations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_informations_gsm_unique` (`gsm`),
  ADD UNIQUE KEY `tckimlik` (`tckimlik`),
  ADD KEY `user_informations_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `additional_options`
--
ALTER TABLE `additional_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `basket_products`
--
ALTER TABLE `basket_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_inform`
--
ALTER TABLE `company_inform`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=912;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `filesurl`
--
ALTER TABLE `filesurl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `informationcats`
--
ALTER TABLE `informationcats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `references`
--
ALTER TABLE `references`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_informations`
--
ALTER TABLE `user_informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `basket_products`
--
ALTER TABLE `basket_products`
  ADD CONSTRAINT `basket_products_basket_id_foreign` FOREIGN KEY (`basket_id`) REFERENCES `basket` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `basket_products_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `basket_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `company_inform`
--
ALTER TABLE `company_inform`
  ADD CONSTRAINT `company_inform_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_foreign` FOREIGN KEY (`category`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_informations`
--
ALTER TABLE `user_informations`
  ADD CONSTRAINT `user_informations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
