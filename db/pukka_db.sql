-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2019 at 12:13 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pukka_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `banner_category` varchar(255) NOT NULL,
  `label_banner` varchar(100) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `banner_desc` varchar(255) NOT NULL,
  `alt_text` varchar(50) NOT NULL,
  `i_status` enum('Y','N') NOT NULL,
  `i_is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `banner_category`, `label_banner`, `banner`, `banner_desc`, `alt_text`, `i_status`, `i_is_deleted`) VALUES
(20, 'home', 'PT. Pukka Solusi Indonesia', 'PT. Pukka Solusi Indonesia_2901191158.jpg', 'PT. Pukka Solusi Indonesia merupakan perusahaan yang bergerak di bidang teknologi dan informasi', 'teknologi informasi', 'Y', 0),
(21, 'Features', 'Creative Ideas', 'ion-ios-bookmarks-outline', 'PT. Pukka Solusi Indonesia has creative ideas to help solve the problems that you are currently facing. \"Easy solution, No complicated use\"', '', 'Y', 0),
(22, 'Features', 'Wonderful Design', 'ion-ios-stopwatch-outline', 'A very attractive, contemporary, cool, elegant design is presented by PT. Pukka Solusi Indonesia so that it provides its own charm.', '', 'Y', 0),
(23, 'Features', 'Update and Sync', 'ion-ios-heart-outline', 'PT. Pukka Solusi Indonesia has always been the foremost and newest in the field of technology and synchronized with each other.', '', 'Y', 0),
(24, 'greeting', 'GREETINGS', 'greeting.jpg', '', '', 'Y', 0),
(25, 'company profile', 'COMPANY PROFILE', 'company_profile.jpg', '', '', 'Y', 0),
(26, 'manajemen', 'BOARD OF MANAGEMENT 2019', 'manajemen.jpg', '', '', 'Y', 0),
(27, 'holding company', 'HOLDING COMPANY', 'holding.jpg', '', '', 'Y', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_group` varchar(50) NOT NULL,
  `c_status` enum('Y','N') NOT NULL,
  `c_is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category_name`, `category_group`, `c_status`, `c_is_deleted`) VALUES
(9, 'Information Technology', 'service', 'Y', 0),
(11, 'Design', 'service', 'Y', 0),
(13, 'Consulting', 'service', 'Y', 0),
(15, 'greeting', 'static_page', 'Y', 0),
(16, 'company_profile', 'static_page', 'Y', 0),
(17, 'management', 'static_page', 'Y', 0),
(18, 'holding_company', 'static_page', 'Y', 0),
(19, 'News', 'news', 'Y', 0),
(20, 'Popular News', 'news', 'Y', 0),
(22, 'advantage', 'static_page', 'Y', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contact_status` int(2) DEFAULT '1' COMMENT '1=Belum dilihat, 0=Telah dilihat ',
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_contact`, `name`, `email`, `subject`, `message`, `date_received`, `contact_status`, `is_deleted`) VALUES
(3, 'ayu', 'diyanayu28@gmail.com', 'tanya', 'dummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummydummy', '2018-12-03 13:42:35', 0, 0),
(4, 'diyan', 'diyanayu@gmail.com', 'magang', 'apakah ada lowongan magang ', '2018-12-16 16:10:56', 0, 1),
(6, 'endah', 'endah5mei@gmail.com', 'Tanya kabar', 'piye kabar e dik ? ', '2018-12-25 17:00:00', 0, 0),
(8, 'joko', 'jokowaluyo@gmail.com', 'sms pae', 'apa kabar cah ayu', '2018-12-25 21:20:00', 0, 0),
(10, 'andre', 'andreburhan@gmail.com', 'annyeog haseyo', 'annyeong haseyo dayu', '2018-12-26 04:09:22', 0, 0),
(11, 'Ulfa Intania', 'ulfaintania1@gmail.com', 'Pengajuan Project', 'Selamat siang, Saya Ulfa dari PT. Indah Sejahtera ingin mengajukan project pengembangan website perusahaan kami, kira-kira apakah kami dapat mendapatkan informasi terkait hal itu? Terimakasih', '2019-01-31 07:41:31', 0, 0),
(12, 'Pukka', 'suhendrajuniar@gmail.com', 'Pengajuan Project', 'Selamat malam mas', '2019-01-31 12:47:15', 0, 0),
(13, 'Ulfa Intania', 'ulfaintania1@gmail.com', 'coba mutiara', 'jjjhk', '2019-03-05 15:14:32', 0, 0),
(14, 'Ulfa Intania', 'ulfaintania1@gmail.com', 'coba mutiara', 'asdadafda', '2019-03-06 00:32:26', 0, 0),
(15, 'Ulfa Intania', 'ulfaintania1@gmail.com', 'Pengajuan Project', 'adsadsd', '2019-03-06 00:34:23', 0, 0),
(16, 'DIAN AYU', 'diyanayu28@gmail.com', 'Pengajuan Project', 'HELLOOO', '2019-03-06 00:46:13', 0, 0),
(17, 'Ulfa Intania', 'ulfaintania1@gmail.com', 'coba mutiara', 'asadad', '2019-03-06 01:43:21', 0, 0),
(18, 'NAMA', 'diyanayu28@gmail.com', 'SUBJECT LAGIAA', 'OYAAAA', '2019-03-06 02:00:00', 0, 0),
(19, 'Ulfa Intania', 'ulfaintania1@gmail.com', 'coba', 'ADADAD', '2019-03-06 02:01:43', 0, 0),
(20, 'Ulfa Intania', 'nurharyani2407@gmail.com', 'coba mutiara', 'sadadad', '2019-03-06 08:42:43', 0, 0),
(21, 'Ulfa Intania', 'ulfaintania1@gmail.com', 'Pengajuan Project', 'Hello', '2019-03-06 10:21:15', 0, 0),
(22, 'Ulfa Intania', 'ulfaintania1@gmail.com', 'Pengajuan Project', 'add', '2019-03-06 10:25:42', 0, 0),
(23, 'Ulfa Intania', 'ulfaintania1@gmail.com', 'INI SUBJECT', 'sadsdasf', '2019-03-07 06:44:46', 0, 0),
(24, 'Ulfa Intania', 'ulfaintania1@gmail.com', 'INI SUBJECT', 'uhut', '2019-03-07 06:47:37', 0, 0),
(25, 'Ulfa Intania', 'ulfaintania1@gmail.com', 'Pengajuan Project', 'aasad', '2019-03-07 06:52:26', 0, 0),
(26, 'suhendra', 'suhendrajuniar@gmail.com', 'Testing', 'testing Form', '2019-03-11 10:14:44', 0, 0),
(27, 'Ulfa Intania', 'ulfaintania1@gmail.com', 'INI SUBJECT', 'dssffsf', '2019-05-06 06:00:15', 0, 0),
(28, 'Ulfa Intania', 'ulfaintania1@gmail.com', 'INI SUBJECT', 'adsadasf', '2019-05-06 06:02:15', 0, 0),
(29, 'Ulfa Intania', 'ulfaintania1@gmail.com', 'PENGAJUAN PEMBUATAN SISTEM', 'sadsd', '2019-05-07 02:23:39', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `default_group`
--

CREATE TABLE `default_group` (
  `groupId` bigint(20) NOT NULL,
  `groupName` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `default_group`
--

INSERT INTO `default_group` (`groupId`, `groupName`, `description`) VALUES
(1, 'Superadmin', 'Memiliki akses sebagai Superadmin, memiliki otoritas atas manajemen pengguna dan sistem selain manajemen konten'),
(2, 'Admin', 'Memiliki akses sebagai Admin, memiliki otoritas atas manajemen konten, tidak dapat melakukan manajemen pengguna dan sistem'),
(3, 'Public', 'Akses yang digunakan untuk meregistrasikan menu dan halaman front office');

-- --------------------------------------------------------

--
-- Table structure for table `default_group_menu`
--

CREATE TABLE `default_group_menu` (
  `groupId` bigint(20) DEFAULT NULL,
  `menuId` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `default_group_menu`
--

INSERT INTO `default_group_menu` (`groupId`, `menuId`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 7),
(1, 8),
(1, 17),
(2, 8),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(2, 20),
(2, 22),
(2, 21),
(2, 23),
(2, 7),
(2, 17),
(2, 19),
(1, 26),
(1, 27),
(1, 28),
(2, 28),
(1, 29),
(2, 26),
(2, 29),
(3, 30),
(3, 31),
(3, 32),
(3, 36),
(3, 33),
(3, 39),
(3, 38),
(3, 37),
(3, 35),
(3, 34),
(3, 40),
(3, 19),
(3, 42),
(1, 44),
(2, 44),
(3, 45),
(3, 41);

-- --------------------------------------------------------

--
-- Table structure for table `default_group_page`
--

CREATE TABLE `default_group_page` (
  `groupId` bigint(20) DEFAULT NULL,
  `pageId` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `default_group_page`
--

INSERT INTO `default_group_page` (`groupId`, `pageId`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 13),
(1, 12),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 27),
(1, 26),
(1, 25),
(1, 30),
(1, 29),
(1, 28),
(1, 35),
(1, 38),
(1, 37),
(1, 36),
(1, 39),
(1, 40),
(2, 43),
(1, 46),
(1, 45),
(1, 44),
(1, 47),
(1, 51),
(1, 50),
(1, 49),
(1, 48),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(2, 59),
(2, 58),
(2, 57),
(2, 60),
(2, 63),
(2, 64),
(2, 65),
(2, 66),
(2, 67),
(2, 68),
(2, 69),
(2, 72),
(2, 70),
(2, 71),
(2, 76),
(2, 75),
(2, 74),
(2, 73),
(2, 80),
(2, 79),
(2, 78),
(2, 77),
(2, 81),
(2, 82),
(2, 83),
(2, 84),
(2, 86),
(2, 85),
(1, 87),
(3, 88),
(3, 89),
(3, 90),
(3, 99),
(3, 98),
(3, 97),
(3, 96),
(3, 95),
(3, 94),
(3, 91),
(3, 92),
(3, 93),
(1, 106),
(1, 105),
(1, 104),
(2, 108),
(2, 111),
(2, 109),
(1, 112),
(1, 113),
(1, 114),
(1, 115),
(2, 116),
(2, 117),
(2, 118),
(2, 119),
(2, 121),
(1, 120),
(1, 123),
(2, 122),
(3, 124),
(1, 126),
(2, 125);

-- --------------------------------------------------------

--
-- Table structure for table `default_menu`
--

CREATE TABLE `default_menu` (
  `menuId` bigint(20) NOT NULL,
  `menuName` varchar(255) NOT NULL,
  `menuDefaultPage` bigint(20) DEFAULT NULL,
  `iconMenu` varchar(255) DEFAULT NULL,
  `menuOrder` int(11) DEFAULT NULL,
  `menuStyle` enum('single','parent','sub') NOT NULL DEFAULT 'single',
  `menuColor` varchar(20) NOT NULL DEFAULT '#555555',
  `menuParentId` bigint(20) DEFAULT NULL,
  `menuDescription` text,
  `menuPosition` enum('sidebar','content') NOT NULL DEFAULT 'sidebar',
  `menuTimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `default_menu`
--

INSERT INTO `default_menu` (`menuId`, `menuName`, `menuDefaultPage`, `iconMenu`, `menuOrder`, `menuStyle`, `menuColor`, `menuParentId`, `menuDescription`, `menuPosition`, `menuTimestamp`) VALUES
(1, 'Pengaturan Sistem', 1, 'gear', 2, 'parent', '#555555', 0, '-', 'sidebar', '2018-11-16 20:44:07'),
(2, 'Pengaturan Halaman', 2, 'gear', 1, 'sub', '#555555', 1, '-', 'sidebar', '2018-11-16 20:18:34'),
(3, 'Pengaturan Menu', 3, 'gear', 2, 'sub', '#555555', 1, '-', 'sidebar', '2018-11-16 20:24:56'),
(4, 'Pengaturan Pengguna', 8, 'people', 1, 'single', '#555555', 0, '-', 'sidebar', '2018-11-16 20:44:20'),
(5, 'Pengaturan Group', 11, 'gear', 3, 'sub', '#555555', 1, '-', 'sidebar', '2018-11-16 20:53:11'),
(7, 'Manajemen Kategori', 14, 'cog', 3, 'single', '#555555', 0, '-', 'sidebar', '2019-01-28 06:46:45'),
(8, 'Beranda', 1, 'home', 0, 'single', '#555555', 0, '-', 'sidebar', '2018-11-16 21:23:03'),
(17, 'Manajemen Statis', 36, 'paper', 4, 'single', '#555555', 0, '-', 'sidebar', '2019-01-28 06:46:56'),
(19, 'Manajemen News', 44, 'bookmarks', 6, 'single', '#555555', 0, '-', 'sidebar', '2019-01-28 06:47:18'),
(20, 'Master', 1, 'more', 7, 'parent', '#555555', 0, '-', 'sidebar', '2019-01-28 06:47:30'),
(21, 'Contact', 35, 'contact', 8, 'single', '#555555', 20, '-', 'sidebar', '2019-01-28 06:47:44'),
(22, 'Manajemen Tag', 19, '', 2, 'sub', '#555555', 20, '-', 'sidebar', '2019-01-28 06:38:05'),
(23, 'Subscribe', 40, '', 3, 'sub', '#555555', 20, '-', 'sidebar', '2018-12-13 11:07:39'),
(26, 'Manajemen Service', 48, 'briefcase', 5, 'single', '#555555', 0, '-', 'sidebar', '2019-01-28 06:47:07'),
(27, 'Manajemen Identity', 28, '', 4, 'sub', '#555555', 20, '-', 'sidebar', '2019-01-27 13:22:11'),
(28, 'Manajemen Video', 25, '', 5, 'sub', '#555555', 20, '-', 'sidebar', '2019-01-27 13:21:59'),
(29, 'Manajemen Banner', 53, 'image', 6, 'sub', '#555555', 20, '-', 'sidebar', '2019-01-27 13:20:29'),
(30, 'Home', 88, '', 0, 'single', '#555555', 0, '', 'content', '2019-01-27 10:51:14'),
(31, 'About', 89, '', 1, 'parent', '#555555', 0, '', 'content', '2019-01-27 10:51:00'),
(32, 'Greeting', 90, '', 1, 'sub', '#555555', 31, '', 'content', '2019-01-27 10:50:42'),
(33, 'Company Profile', 91, '', 2, 'sub', '#555555', 31, '', 'content', '2019-01-27 10:50:28'),
(34, 'Management', 92, '', 3, 'sub', '#555555', 31, '', 'content', '2019-03-06 11:29:44'),
(35, 'Holding Company', 93, '', 4, 'sub', '#555555', 31, '', 'content', '2019-01-27 10:50:01'),
(36, 'Services', 94, '', 2, 'parent', '#555555', 0, '', 'content', '2019-01-27 10:49:48'),
(37, 'Design', 95, '', 1, 'sub', '#555555', 36, '', 'content', '2019-01-27 10:49:34'),
(38, 'Consulting', 96, '', 2, 'sub', '#555555', 36, '', 'content', '2019-01-27 10:49:15'),
(39, 'Technology Information', 97, '', 3, 'sub', '#555555', 36, '', 'content', '2019-01-27 10:49:05'),
(40, 'News & Blog', 98, '', 3, 'parent', '#555555', 0, '', 'content', '2019-01-27 10:48:54'),
(41, 'News', 98, '', 1, 'sub', '#555555', 40, '', 'content', '2019-01-27 10:48:32'),
(42, 'Contact', 99, '', 4, 'single', '#555555', 0, '', 'content', '2019-01-27 10:48:21'),
(44, 'Manajemen Link', 104, 'link', 6, 'sub', '#555555', 20, '-', 'sidebar', '2019-01-28 08:44:51'),
(45, 'Blog', 124, '', 2, 'sub', '#555555', 40, '-', 'content', '2019-01-30 06:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `default_page`
--

CREATE TABLE `default_page` (
  `pageId` bigint(20) NOT NULL,
  `page` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `labelPage` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `subPage` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `action` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `status` enum('Yes','No') CHARACTER SET latin1 DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `default_page`
--

INSERT INTO `default_page` (`pageId`, `page`, `labelPage`, `subPage`, `action`, `status`, `timestamp`) VALUES
(1, 'home', 'home view root', 'view', 'view', 'Yes', '2018-11-16 23:06:54'),
(2, 'conf_page', 'conf_page view root', 'view', 'view', 'Yes', '2018-11-16 20:32:35'),
(3, 'conf_menu', 'conf_menu view root', 'view', 'view', 'Yes', '2018-11-16 20:32:29'),
(4, 'conf_page', 'conf_page add root', 'add', 'view', 'Yes', '2018-11-16 20:23:55'),
(5, 'conf_page', 'conf_page edit root', 'edit', 'view', 'Yes', '2018-11-16 20:23:55'),
(6, 'conf_menu', 'conf_menu add root', 'add', 'view', 'Yes', '2018-11-16 20:23:55'),
(7, 'conf_menu', 'conf_menu edit root', 'edit', 'view', 'Yes', '2018-11-16 20:23:55'),
(8, 'user', 'user view root', 'view', 'view', 'Yes', '2018-11-16 20:42:41'),
(9, 'user', 'user add root', 'add', 'view', 'Yes', '2018-11-16 20:47:48'),
(10, 'user', 'user edit root', 'edit', 'view', 'Yes', '2018-11-16 20:48:34'),
(11, 'group', 'group view root', 'view', 'view', 'Yes', '2018-11-16 20:52:36'),
(12, 'group', 'group add root', 'add', 'view', 'Yes', '2018-11-16 20:58:07'),
(13, 'group', 'group edit root', 'edit', 'view', 'Yes', '2018-11-16 20:58:26'),
(14, 'ref_kategori', 'ref_kategori view root', 'view', 'view', 'Yes', '2018-11-16 21:12:38'),
(15, 'ref_kategori', 'ref_kategori add root', 'add', 'view', 'Yes', '2018-11-16 21:14:13'),
(16, 'ref_kategori', 'ref_kategori edit root', 'edit', 'view', 'Yes', '2018-11-16 21:15:04'),
(17, 'akun', 'akun view root', 'view', 'view', 'Yes', '2018-11-16 22:58:49'),
(18, 'akun', 'akun editPassword root', 'editPassword', 'view', 'Yes', '2018-11-16 22:59:35'),
(19, 'tag', 'tag view root', 'view', 'view', 'Yes', '2018-11-24 04:12:23'),
(20, 'tag', 'tag edit root', 'edit', 'view', 'Yes', '2018-11-24 04:12:13'),
(21, 'tag', 'tag add root', 'add', 'view', 'Yes', '2018-11-24 04:13:09'),
(25, 'video', 'video view root', 'view', 'view', 'Yes', '2018-11-24 11:53:58'),
(26, 'video', 'video edit root', 'edit', 'view', 'Yes', '2018-11-24 11:54:31'),
(27, 'video', 'video add root', 'add', 'view', 'Yes', '2018-11-24 11:54:59'),
(28, 'identity', 'identity view root', 'view', 'view', 'Yes', '2018-11-25 14:51:58'),
(29, 'identity', 'identity edit root', 'edit', 'view', 'Yes', '2018-11-25 14:52:49'),
(30, 'identity', 'identity add root', 'add', 'view', 'Yes', '2018-11-25 14:53:27'),
(35, 'contact', 'contact view root', 'view', 'view', 'Yes', '2018-12-01 13:46:23'),
(36, 'statis', 'statis view root', 'view', 'view', 'Yes', '2018-12-02 13:51:23'),
(37, 'statis', 'statis edit root', 'edit', 'view', 'Yes', '2018-12-02 13:51:46'),
(38, 'statis', 'statis add root', 'add', 'view', 'Yes', '2018-12-02 13:52:09'),
(39, 'contact', 'contact detail root', 'detail', 'view', 'Yes', '2018-12-03 14:54:00'),
(40, 'subscribe', 'subscribe view root', 'view', 'view', 'Yes', '2018-12-04 05:41:00'),
(43, 'home', 'home view admin', 'view', 'view', 'Yes', '2018-12-05 08:40:39'),
(44, 'news', 'news view root', 'view', 'view', 'Yes', '2018-12-08 01:44:50'),
(45, 'news', 'news edit root', 'edit', 'view', 'Yes', '2018-12-08 01:45:16'),
(46, 'news', 'news add root', 'add', 'view', 'Yes', '2018-12-08 01:45:39'),
(47, 'statis', 'statis detail root', 'detail', 'view', 'Yes', '2018-12-19 07:04:33'),
(48, 'service', 'service view root', 'view', 'view', 'Yes', '2018-12-21 09:30:40'),
(49, 'service', 'service edit root', 'edit', 'edit', 'Yes', '2018-12-21 09:31:06'),
(50, 'service', 'service add', 'add', 'add', 'Yes', '2018-12-21 09:31:31'),
(51, 'service', 'service detail', 'detail', 'detail', 'Yes', '2018-12-21 09:31:55'),
(52, 'news', 'news detail', 'detail', 'detail', 'Yes', '2019-01-05 08:51:34'),
(53, 'banner', 'banner view root', 'view', 'view', 'Yes', '2019-01-21 15:51:50'),
(54, 'banner', 'banner edit root', 'edit', 'view', 'Yes', '2019-01-21 15:51:37'),
(55, 'banner', 'banner add root', 'add', 'view', 'Yes', '2019-01-21 15:51:24'),
(56, 'banner', 'banner detail root', 'detail', 'view', 'Yes', '2019-01-21 15:51:09'),
(57, 'tag', 'tag view root', 'view', 'view', 'Yes', '2019-01-14 07:29:17'),
(58, 'tag', 'tag add root', 'add', 'view', 'Yes', '2019-01-14 07:29:39'),
(59, 'tag', 'tag edit root', 'edit', 'view', 'Yes', '2019-01-14 07:30:01'),
(60, 'subscribe', 'subscribe view admin', 'view', 'view', 'Yes', '2019-01-14 07:31:49'),
(63, 'video', 'video view admin', 'view', 'view', 'Yes', '2019-01-14 07:34:43'),
(64, 'video', 'video add root', 'add', 'view', 'Yes', '2019-01-14 07:35:28'),
(65, 'video', 'video edit root', 'edit', 'view', 'Yes', '2019-01-14 07:35:50'),
(66, 'banner', 'banner view admin', 'view', 'view', 'Yes', '2019-01-21 15:50:51'),
(67, 'banner', 'banner add admin', 'add', 'view', 'Yes', '2019-01-21 15:50:37'),
(68, 'banner', 'banner edit admin', 'edit', 'view', 'Yes', '2019-01-21 15:50:22'),
(69, 'banner', 'banner detail admin', 'detail', 'view', 'Yes', '2019-01-21 15:50:00'),
(70, 'ref_kategori', 'ref_kategori view admin', 'view', 'view', 'Yes', '2019-01-14 07:42:03'),
(71, 'ref_kategori', 'ref_kategori add admin', 'add', 'view', 'Yes', '2019-01-14 07:42:19'),
(72, 'ref_kategori', 'ref_kategori edit admin', 'edit', 'view', 'Yes', '2019-01-14 07:41:48'),
(73, 'statis', 'statis view admin', 'view', 'view', 'Yes', '2019-01-14 07:43:14'),
(74, 'statis', 'statis add admin', 'add', 'view', 'Yes', '2019-01-14 07:43:34'),
(75, 'statis', 'statis edit admin', 'edit', 'view', 'Yes', '2019-01-14 07:44:00'),
(76, 'statis', 'statis detail admin', 'detail', 'view', 'Yes', '2019-01-14 07:44:23'),
(77, 'service', 'service view admin', 'view', 'view', 'Yes', '2019-01-14 07:45:05'),
(78, 'service', 'service add admin', 'add', 'view', 'Yes', '2019-01-14 07:45:34'),
(79, 'service', 'service edit admin', 'edit', 'view', 'Yes', '2019-01-14 07:45:55'),
(80, 'service', 'service detail admin', 'detail', 'view', 'Yes', '2019-01-14 07:46:17'),
(81, 'news', 'news view admin', 'view', 'view', 'Yes', '2019-01-14 07:47:33'),
(82, 'news', 'news add admin', 'add', 'view', 'Yes', '2019-01-14 07:47:55'),
(83, 'news', 'news edit admin', 'edit', 'view', 'Yes', '2019-01-14 07:48:17'),
(84, 'news', 'news detail admin', 'detail', 'view', 'Yes', '2019-01-14 07:48:41'),
(85, 'contact', 'contact view admin', 'view', 'view', 'Yes', '2019-01-14 07:49:28'),
(86, 'contact', 'contact detail admin', 'detail', 'view', 'Yes', '2019-01-14 07:49:50'),
(87, 'user', 'resetpassword root', 'resetpassword', 'resetpassword', 'Yes', '2019-01-15 09:27:40'),
(88, 'homepage', 'homepage index public', 'index', 'view', 'Yes', '2019-01-25 07:05:06'),
(89, 'about', 'about greeting public', 'greeting', 'view', 'Yes', '2019-01-25 07:11:21'),
(90, 'about', 'about greeting public', 'greeting', 'view', 'Yes', '2019-01-27 10:27:58'),
(91, 'about', 'about company_profile public', 'company_profile', 'view', 'Yes', '2019-01-27 10:24:13'),
(92, 'about', 'about manajemen public', 'manajemen', 'view', 'Yes', '2019-01-27 10:23:42'),
(93, 'about', 'about holding_company public', 'holding_company', 'view', 'Yes', '2019-01-27 10:23:56'),
(94, 'services', 'services design public', 'design', 'view', 'Yes', '2019-01-25 07:08:03'),
(95, 'services', 'services design public', 'design', 'view', 'Yes', '2019-01-27 10:28:18'),
(96, 'services', 'services consulting public', 'consulting', 'view', 'Yes', '2019-01-27 10:29:40'),
(97, 'services', 'services technology_information public', 'technology_information', 'view', 'Yes', '2019-01-27 10:31:31'),
(98, 'newsblog', 'newsblog news public', 'news', 'view', 'Yes', '2019-01-25 07:06:21'),
(99, 'contact', 'contact index public', 'index', 'view', 'Yes', '2019-01-25 07:05:40'),
(104, 'link', 'link view root', 'view', 'view', 'Yes', '2019-01-27 12:55:16'),
(105, 'link', 'link add root', 'add', 'view', 'Yes', '2019-01-27 12:55:48'),
(106, 'link', 'link edit root', 'edit', 'view', 'Yes', '2019-01-27 12:56:11'),
(108, 'link', 'link add admin', 'add', 'view', 'Yes', '2019-01-27 12:57:43'),
(109, 'link', 'link edit admin', 'edit', 'view', 'Yes', '2019-01-27 12:58:03'),
(111, 'link', 'link view admin', 'view', 'view', 'Yes', '2019-01-27 12:58:51'),
(112, 'statis', 'statis restore root', 'restore', 'restore', 'Yes', '2019-01-29 08:29:22'),
(113, 'service', 'service restore root', 'restore', 'restore', 'Yes', '2019-01-29 09:06:40'),
(114, 'news', 'news restore root', 'restore', 'restore', 'Yes', '2019-01-29 12:00:09'),
(115, 'ref_kategori', 'ref_kategori restore root', 'restore', 'restore', 'Yes', '2019-01-29 12:00:33'),
(116, 'statis', 'service restore admin', 'restore', 'restore', 'Yes', '2019-01-29 12:01:52'),
(117, 'service', 'service restore admin', 'restore', 'restore', 'Yes', '2019-01-29 12:02:14'),
(118, 'news', 'news restore admin', 'restore', 'restore', 'Yes', '2019-01-29 12:02:33'),
(119, 'ref_kategori', 'ref_kategori restore admin', 'restore', 'restore', 'Yes', '2019-01-29 12:02:53'),
(120, 'video', 'video restore root', 'restore', 'view', 'Yes', '2019-01-29 13:51:47'),
(121, 'video', 'video restore admin', 'restore', 'view', 'Yes', '2019-01-29 13:52:10'),
(122, 'banner', 'banner restore admin', 'restore', 'view', 'Yes', '2019-01-29 14:15:09'),
(123, 'banner', 'banner restore root', 'restore', 'view', 'Yes', '2019-01-29 14:15:36'),
(124, 'blog', 'blog news public', 'https://blog.gamatechno.com/', 'view', 'Yes', '2019-01-30 06:19:36'),
(125, 'contact', 'contact restore admin', 'restore', 'view', 'Yes', '2019-01-30 06:39:23'),
(126, 'contact', 'contact restore root', 'restore', 'view', 'Yes', '2019-01-30 06:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `default_user`
--

CREATE TABLE `default_user` (
  `userId` bigint(20) NOT NULL,
  `groupId` bigint(20) NOT NULL,
  `realname` varchar(100) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `active` enum('Yes','No') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `default_user`
--

INSERT INTO `default_user` (`userId`, `groupId`, `realname`, `username`, `password`, `foto`, `active`) VALUES
(1, 1, 'Superadmin', 'root', 'c5f6f584b79463f58c223f18fef206ef', '1801191721.jpg', 'Yes'),
(2, 2, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1301194340.jpg', 'Yes'),
(18, 1, 'diyan ayu', 'ayu', 'fd7edab115ca8fce3462417d77a7e0ef', '', 'No'),
(19, 1, 'admin2', 'ayu1', '5080265ebb234309fcc748b5d213af7a', '', 'Yes'),
(20, 1, 'novianto yes', 'masmeks', '6684b487984512d4128310505eafe81b', '1103191942.jpg', 'Yes'),
(21, 1, 'suhendra', 'suhendra', 'cab73b61d338412339e924b18555c05a', '', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `identity`
--

CREATE TABLE `identity` (
  `id_identity` int(11) NOT NULL,
  `website_name` varchar(100) NOT NULL,
  `website_address` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `phone` char(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `google_plus` varchar(20) NOT NULL,
  `twitter` varchar(20) NOT NULL,
  `facebook` varchar(20) NOT NULL,
  `linkedin` varchar(20) NOT NULL,
  `instagram` varchar(20) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `favicon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identity`
--

INSERT INTO `identity` (`id_identity`, `website_name`, `website_address`, `description`, `address`, `phone`, `email`, `google_plus`, `twitter`, `facebook`, `linkedin`, `instagram`, `meta_description`, `meta_keyword`, `favicon`) VALUES
(2, 'PT. Pukka Solusi Indonesia', 'http://pukka.com', 'PT. Pukka Solusi Indonesia adalah perusahaan yang memiliki fokus pada pengembangan produk dan solusi teknologi informasi yang bergerak pada layanan desain, konsultasi dan teknologi informasi                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     ', 'Jalan Cik Di Tiro no. 34, Yogyakarta 55223, Indonesia\r\n                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ', '+8222 23421', 'pukka@mail.ac.id', 'pukka', 'pukka', 'pukka', 'pukkacom', 'pukkacom', 'PT. Pukka Solusi Indonesia adalah perusahaan yang memiliki fokus pada pengembangan produk dan solusi teknologi informasi yang bergerak pada layanan desain, konsultasi dan teknologi informasi                                                                 ', 'Portal PT. Pukka Solusi Indonesia', 'PT. Pukka Solusi Indonesia_1201192209.png');

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE `link` (
  `id_link` int(11) NOT NULL,
  `link_title` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`id_link`, `link_title`, `link`, `label`, `status`) VALUES
(2, 'Home', 'homepage', 'Home', 'Y'),
(3, 'About Us', 'about/company_profile', 'About Us', 'Y'),
(4, 'service', 'services/design', 'Services', 'Y'),
(5, 'News', 'newsblog/news', 'News', 'Y'),
(6, 'Contact', 'contact', 'Contact', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `fk_id_category` int(11) NOT NULL,
  `fk_userId` bigint(20) NOT NULL,
  `news_title` varchar(100) NOT NULL,
  `headline` text NOT NULL,
  `news_content` text NOT NULL,
  `news_seo` varchar(255) NOT NULL,
  `meta_desc` varchar(100) NOT NULL,
  `meta_keyword` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `posted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Y','N') NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `fk_id_category`, `fk_userId`, `news_title`, `headline`, `news_content`, `news_seo`, `meta_desc`, `meta_keyword`, `image`, `posted_at`, `status`, `is_deleted`) VALUES
(1, 20, 1, 'SEMANTIC JAWARA KOMPETISI OJK FINTECH DAYS 2018', 'Gamatechno.com 28/10/2018 OJK dan Asosiasi Fintech Indonesia (AFTECH) kembali selenggarakan “OJK Fintech Days 2018” di beberapa kota di Indonesia. Setelah Medan, Manado dan Batam, event ini digelar di Bali yang merupakan kota terakhir untuk rangkaian kegiatan tahun ini.', '<p>Gamatechno.com 28/10/2018 OJK dan Asosiasi Fintech Indonesia (AFTECH) kembali selenggarakan &ldquo;OJK Fintech Days 2018&rdquo; di beberapa kota di Indonesia. Setelah Medan, Manado dan Batam, event ini digelar di Bali yang merupakan kota terakhir untuk rangkaian kegiatan tahun ini.<br />\n<br />\nAcara ini berlangsung di Discovery Shopping Mall mulai pukul 10.00 WITA dan diharapkan dapat menjadi tempat mempertemukan para pelaku dan penggiat teknologi finansial sehingga mampu menghasilkan kesepakatan dan komitmen bersama untuk memajukan dan mengembangkan industri kecil di Indonesia.<br />\n<br />\n&ldquo;Fintech Days 2018&rdquo; mengusung tema &ldquo;Indonesia Digital Paradise&rdquo; dan berlangsung selama tiga hari, 25-27 Oktober. Sebanyak 60 perusahaan fintech dari 73 penyelenggara layanan pinjam meminjam uang berbasis teknologi informasi yang tercatat di OJK ikut terlibat dalam kegiatan ini. Dalam event ini juga diadakan kompetisi untuk fintech startup, untuk tahap awal setiap startup mengirimkan proposal secara online. 5 startup terpilih berhak menghadiri coaching clinic serta berkesempatan untuk pitching di depan dewan juri. Semantic yang merupakan produk inkubasi yang dikembangkan oleh Datains (subsidiary company Gamatechno) berhasil keluar sebagai juara 1 dalam kompetisi tersebut. &ldquo;Kami bersyukur dapat memenangkan acara ini dan berharap dengan ikut acara ini, kita bisa mendapatkan exposure ke venture capital dan calon klien&rdquo; ungkap I Gede Putu Rahman Desyanta (Senior Manager Datains)<br />\n<br />\nSemantic menjadi solusi dalam mencari, memantau, mengukur, menganalisa lebih banyak berita dan media sosial sehingga mampu memberikan insight dalam bidang branding, social behavioral mapping dan electoral campaign.</p>\n', 'semantic-jawara-kompetisi-ojk-fintech-days-2018', 'OJK dan Asosiasi Fintech Indonesia (AFTECH) kembali selenggarakan “OJK Fintech Days 2018” di beberap', 'fintech days', 'ojk.jpeg', '2019-01-31 08:37:37', 'Y', 0),
(2, 20, 1, 'SAFE TRAVEL JADI KEBANGGAAN KEMENLU DALAM HASSAN WIRAJUDA AWARD 2018', 'Jakarta: Malam Penganugerahan “The Hassan Wirajuda Award (HPWA) 2018 kembali digelar untuk ke-4 kalinya pada Jum’at (07/12/2018) bertempat di Ruang Nusantara, Kementerian Luar Negeri Republik Indonesia. 19 orang menerima penghargaan ini mewakili tujuh kategori', '<p>Jakarta: Malam Penganugerahan &ldquo;The Hassan Wirajuda Award (HPWA) 2018 kembali digelar untuk ke-4 kalinya pada Jum&rsquo;at (07/12/2018) bertempat di Ruang Nusantara, Kementerian Luar Negeri Republik Indonesia. 19 orang menerima penghargaan ini mewakili tujuh kategori, yaitu pemerintah daerah, masyarakat madani Indonesia, jurnalis dan media, kepala perwakilan RI, staff perwakilan RI, mitra kerja Kemenlu dan mitra kerja perwakilan RI.<br />\r\n<br />\r\nHPWA merupakan event tahunan Kemenlu untuk memberikan apresiasi terhadap pejuang perlindungan Warga Negara Indonesia (WNI). Penghargaan ini diberikan kepada berbagai pihak, induvidu dan lembaga yang berkontribusi terhadap upaya perlindungan Warga Negara Indonesia di luar negeri.<br />\r\n<br />\r\nNurianto Kama selaku Branch Manager Gamatechno Jakarta hadir memenuhi undangan Kemenlu mengungkapkan rasa bangga dapat menjadi bagian dalam upaya perlindungan WNI.<br />\r\n<br />\r\n&ldquo;Bangga Gamatechno menjadi bagian dari pengembangan aplikasi Safe Travel dan yang tak kalah penting aplikasi ini dapat membawa manfaat dan mendukung program pemerintah khususnya terhadap perlindungan WNI.&rdquo; ungkap Kama.<br />\r\n<br />\r\nSeperti yang kita ketahui, Safe Travel diluncurkan oleh Menteri Luar Negeri Retno L.P. Marsudi pada April 2018 lalu. Safe Travel menjadi platform teknologi yang diukung dengan berbagai fitur untuk keselamatan WNI yang sedang maupun hendak bepergian ke luar negeri.<br />\r\n<br />\r\nDalam kesempatan ini pula Kemenlu mengajak seluruh undangan untuk mengunduh dan menggunakan aplikasi Safe Travel. Tidak hanya itu, art performer juga membawakan cerita dengan apik seorang WNI yang mengalami kondisi darurat/kecelakaan kemudian menggunakan Safe Travel untuk langsung terhubung ke Kedutaan RI di Negara tersebut.</p>\r\n', 'safe-travel-jadi-kebanggaan-kemenlu-dalam-hassan-wirajuda-award-2018', 'Seperti yang kita ketahui, Safe Travel diluncurkan oleh Menteri Luar Negeri Retno L.P. Marsudi pada ', 'safe travel', 'travel.jpg', '2019-01-31 08:36:56', 'Y', 0),
(3, 20, 1, 'LEBIH TRANSPARAN DAN EFISIEN, PEMERINTAH KOTA SALATIGA LUNCURKAN SIM ULP', 'Pemerintah Kota Salatiga luncurkan  Sistem Informasi Manajemen Unit Layanan Pengadaan (SIM ULP). Acara ini digelar Kamis lalu, bertempat di ruang Sekretariat Kota Salatiga  yang dihadiri langsung oleh H. Yulianto, S.E. M.M selaku wali kota Salatiga serta perwakilan dari ODP daerah tersebut yang berjumlah 120 peserta.', '<p>Pemerintah Kota Salatiga luncurkan Sistem Informasi Manajemen Unit Layanan Pengadaan (SIM ULP). Acara ini digelar Kamis lalu, bertempat di ruang Sekretariat Kota Salatiga yang dihadiri langsung oleh H. Yulianto, S.E. M.M selaku wali kota Salatiga serta perwakilan dari ODP daerah tersebut yang berjumlah 120 peserta.<br />\r\n<br />\r\nDalam kesempatan ini Walikota meluncurkan aplikasi pengiriman berkas pengadaan sampai dengan pelaporan hasil pengadaan. Aplikasi tersebut dapat diakses melalui pbj.salatiga.go.id. Peluncuran sistem ini dilatarbelakangi oleh permasalahan permohonan dokumen secara cetak manual yang memakan waktu lebih lama, sehingga dibuatlah sistem ini untuk mempermudah pengajuan dokumen pengadaan sebelum dilelangkan.<br />\r\n<br />\r\n&ldquo;Pemanfaatan teknologi informasi di bidang pengadaan barang/jasa telah mengembalikan kepercayaan masyarakat, karena dinilai lebih transparan dan lebih efisien. Terbukti jika melalui Layanan Pengadaan Secara Elektronik (LPSE), telah diperoleh efisiensi pengadaan sebesar 10% setiap tahunnya,&rdquo; papar Yuliyanto.<br />\r\n<br />\r\nHal senada juga diungkapkan oleh Taufik Suryawan Edyna (Government Solution Manager Gamatechno), Ia berharap launching ini dapat menjadi menjadi solusi akan kemudahan dan transparansi pada proses lelang, sehingga lebih efektif dan efisien.<br />\r\n<br />\r\nSIM ULP ini dikembangkan oleh Gamatechno yang dimulai pada bulan Oktober tahun ini. Aplikasi ini memiliki banyak kelebihan yaitu adanya notifikasi sms kepada pengguna untuk setiap proses, serta dapat menggunakan tanda tangan digital dan terintegrasi dengan Sistem Informasi Rencana Umum Pengadaan (SIRUP) pada Layanan Pengadaan Secara Elektronik (LPSE).<br />\r\n<br />\r\n<br />\r\n<br />\r\n&ldquo;Aplikasi ini memiliki fitur-fitur yang mempermudah dan mempercepat pekerjaan pengadaan barang/jasa. Diantaranya, pembuatan surat dan dokumentasi secara digital, menu kaji ulang paket, reminder jadwal pemilihan penyedia, dan lain sebagainya. Diharapkan dengan adanya aplikasi ini, pengadaan barang/jasa dapat berjalan cepat dan terdokumentasi,&rdquo; pungkas Kabag Pembangunan Setda.<br />\r\n<br />\r\nPopular News Gamatechno Adakan Training Big Data untuk Diskominfo Kediri Dari Jogja untuk Indonesia Pintar LAN Sosialisasikan Aplikasi SIPKA Untuk Tingkatkan Pelayanan Kunjungan Industri ke Gamatechno Dari Yogyakarta untuk Indonesia Aplikasi Anti Plagiarism di UGM Benefit Digitalisasi Persuratan IT Roadshow In Europe Refreshing Di Tengah Rutinitas Bekerja Kemitraan dengan Integrasia Utama Latest News</p>\r\n', 'lebih-transparan-dan-efisien-pemerintah-kota-salatiga-luncurkan-sim-ulp', 'Pemerintah Kota Salatiga luncurkan Sistem Informasi Manajemen Unit Layanan Pengadaan (SIM ULP).', 'pemkot salatiga', 'sim.jpeg', '2019-01-31 08:35:01', 'Y', 0),
(4, 20, 1, 'LAN SOSIALISASIKAN APLIKASI SIPKA UNTUK TINGKATKAN PELAYANAN', 'Lembaga Administrasi Negara (LAN) Republik Indonesia selenggarakan sosialisasi aplikasi SIPKA, Sistem Informasi Pengembangan Kompetensi Aparatur Sipil Negara (ASN) di kantor LAN Pusat, Gedung B Lantai 8 dan dihadiri oleh 133 peserta yang terdiri dari Person In Charge (PIC) Pusat/Badan Sumber Daya Manusia (P/BSDM) Kementerian/Lembaga/Daerah (K/L/D)', '<p>Lembaga Administrasi Negara (LAN) Republik Indonesia selenggarakan sosialisasi aplikasi SIPKA, Sistem Informasi Pengembangan Kompetensi Aparatur Sipil Negara (ASN) di kantor LAN Pusat, Gedung B Lantai 8 dan dihadiri oleh 133 peserta yang terdiri dari Person In Charge (PIC) Pusat/Badan Sumber Daya Manusia (P/BSDM) Kementerian/Lembaga/Daerah (K/L/D).<br />\r\n<br />\r\nTujuan pada sosialisasi ini untuk mengenalkan sistem manajemen kediklatan dan pengembangan SIPKA. SIPKA merupakan pengembangan lanjutan dari SIDA (Sistem Informasi Diklat Aparatur) yang telah dilakukan penyusunan grand design pada tahun 2016 oleh Gamatechno sedangkan pembangunan SIPKA dimulai dari tahun 2017 dan pengembangannya di tahun 2018.<br />\r\n<br />\r\nBerdasarkan Undang Undang No. 5 tahun 2014 tentang Aparatur Sipil Negara pasal 43 disebutkan salah satu fungsi LAN adalah pembinaan pendidikan dan pelatihan kompetensi manajerial pegawai ASN dengan berbagai gugus tugas di bidang diklat yang tertuang pada pasal 44. Salah satu butirnya adalah melalui membina dan menyelenggarakan pendidikan dan pelatihan pegawai ASN berbasis kompetensi.<br />\r\n<br />\r\nSejalan dengan itu, PP No.11 tahun 2017 dengan tegas disebutkan dalam pasal 219 Lembaga Administrasi Negara (LAN) bertanggung jawab atas pengaturan, koordinasi dan penyelenggaraan pengembangan kompetensi, dan di pasal 220 pelaksanaan pengembangan kompetensi diinformasikan melalui sistem informasi pelatihan yang terintegrasi dengan sistem informasi ASN.<br />\r\n<br />\r\nDengan demikian untuk memenuhi kebutuhan tersebut, LAN berkewajiban untuk mengembangkan sistem informasi. Pengembangan SIPKA adalah untuk lebih memberikan peningkatan pelayanan stakeholder dan peningkatan mutu pada SI/TI di lingkungan Lembaga Administrasi Negara.<br />\r\n<br />\r\n&ldquo;SIPKA ini juga mengakomodasi proses pengembangan kompetensi pegawai. Karena data pengembangan kompetensi pegawai akan terintegrasi secara nasional dan dimonitor&rdquo; tutur Rudi Masthofani selaku Kepala Bidang Akreditasi dan SIDA Pusat Pengembangan Program dan Pembinaan Diklat LAN<br />\r\n<br />\r\nSelain aplikasi SIPKA, Gamatechno juga mengembagkan e-learning yang terintegrasi untuk ASN/PNS dan aplikasi Feeder Pengembangan Kompetensi (Bangkom) untuk menginventarisir dan mengevaluasi kompetensi ASN/PNS.</p>\r\n', 'lan-sosialisasikan-aplikasi-sipka-untuk-tingkatkan-pelayanan', 'Lembaga Administrasi Negara (LAN) Republik Indonesia selenggarakan sosialisasi aplikasi SIPKA, Siste', 'aplikasi sipka', 'sipka.jpeg', '2019-01-31 08:33:32', 'Y', 0),
(5, 19, 1, 'PERMUDAH PERJALANAN DINAS BUMN DENGAN XPLORIN BUMN TRAVEL FORM', 'Gamatechno - Memiliki kekayaan alam dan budaya yang beragam dan melimpah menjadikan pariwasata sebagai sektor yang diharapkan memberikan kontribusi positif terutama dalam segi perekenomian. Dalam hal ini, BUMN berperan penting dalam kemajuan sektor pariwisata di Indonesia', '<p>Gamatechno - Memiliki kekayaan alam dan budaya yang beragam dan melimpah menjadikan pariwasata sebagai sektor yang diharapkan memberikan kontribusi positif terutama dalam segi perekenomian. Dalam hal ini, BUMN berperan penting dalam kemajuan sektor pariwisata di Indonesia.<br />\r\n<br />\r\nFocus Group Discussion dan Go Live &ldquo;XPLORIN BUMN Travel&rdquo; digelar pada Jum&rsquo;at (07/12/2018) bertempat di Grand Dafam Rohan Hotel, Yogyakarta. Kegiatan ini adalah wujud sinergi perusahaan BUMN dalam inisiasi bisnis digital dari Kedeputian Bidang Usaha Energi, Logistik, Kawasan, dan Pariwisata untuk Kementerian Badan Usaha Milik Negara Republik Indonesia.<br />\r\n<br />\r\nSebagaimana diketahui bahwa Xplorin telah diluncurkan pada Januari 2017 lalu. Xplorin merupakan platform digital pariwisata yang menjadi penghubung ekosistem antara wisatawan dengan produk-produk layanan milik BUMN dan pelaku industri pariwisata di Indonesia melalui fitur unggulan seperti community forum dan attraction &amp; tour planner yang bisa menampilkan customized ittinerary sendiri. Xplorin diinisiasi oleh Indonesia Tourism Development Corporation (ITDC) yang bekerjasama dengan PT Gamatechno Indonesia.<br />\r\n<br />\r\nKegiatan ini dihadiri oleh 32 perwakilan anak perusahaan BUMN sebagai peserta forum diskusi yang berlangsung selama 2 hari. Sebagai narasumber dalam forum ini, Hendrika Nora O. Sinaga (Asisten Deputi Bidang Usaha Energi, Logistik, Kawasan dan Pariwisata Kementerian BUMN), Wiganggo (Direktur Xplorin), Rofik (Direktur ITDC Nusantara Utilitas dan founder Xplorin), Toto Priyono (Manager Corporate Business Solution Gamatechno), Hidayat (Lead Developer Gamatechno untuk Xplorin) sedang memaparkan platform Xplorin<br />\r\n<br />\r\nTerdapat pula agenda soft launching untuk 2 produk Xplorin yaitu Xplorin untuk B2C berupa mobile apps dan website serta Xplorin untuk B2B atau yang disebut dengan BUMN Travel. BUMN Travel mengkolaborasikan antara Travel Form atau SPPD dengan sistem online ticketing atau OTA (Online Travel Agent) dimana BUMN bisa melakukan pengajuan perjalanan dinas serta pembelian tiket di dalam satu platform.<br />\r\n<br />\r\nToto Priyono selaku Manager Corporate Business Solution Gamatechno berharap fitur Xplorin BUMN Travel ini dapat membantu dan mempermudah dalam pengelolaan SPPD (perjalanan dinas) karena tidak perlu switching ke aplikasi lain untuk urusan ticketing, cukup dalam satu aplikasi dan satu laporan yang terintegrasi.<br />\r\n<br />\r\nXplorin adalah wujud nyata Pokja Digital dalam mendukung target pemerintah khususnya BUMN untuk mendatangkan wisatawan mancanegara sejumlah 20 Juta orang pada tahun 2019. Gamatechno berperan penting dalam proses development dan implementasi aplikasi Xplorin sebagai Tourism Digital Platform baik pada platform B2C maupun B2B sejak 2017 lalu.<br />\r\n<br />\r\nPopular News Gamatechno Adakan Training Big Data untuk Diskominfo Kediri Dari Jogja untuk Indonesia Pintar LAN Sosialisasikan Aplikasi SIPKA Untuk Tingkatkan Pelayanan Kunjungan Industri ke Gamatechno Dari Yogyakarta untuk Indonesia Aplikasi Anti Plagiarism di UGM Benefit Digitalisasi Persuratan IT Roadshow In Europe Refreshing Di Tengah Rutinitas Bekerja Kemitraan dengan Integrasia Utama Latest News</p>\r\n', 'permudah-perjalanan-dinas-bumn-dengan-xplorin-bumn-travel-form', 'Focus Group Discussion dan Go Live “XPLORIN BUMN Travel” digelar pada Jum’at (07/12/2018) bertempat ', 'bumn travel', 'xplorin.jpeg', '2019-01-31 08:32:56', 'Y', 0),
(6, 19, 1, 'HUT KE-14 GAMATECHNO LAHIRKAN 2 ANAK PERUSAHAAN BARU', 'Selain menyandang gelar sebagai kota pelajar, Yogyakarta juga tidak bisa lepas dari predikat sebagai gudang-nya kreativitas. Apalagi memasuki era industri 4.0 yang menuntut berkembangnya bisnis kreatif dan inovatif dengan terobosan teknologi', '<p>Selain menyandang gelar sebagai kota pelajar, Yogyakarta juga tidak bisa lepas dari predikat sebagai gudang-nya kreativitas. Apalagi memasuki era industri 4.0 yang menuntut berkembangnya bisnis kreatif dan inovatif dengan terobosan teknologi, Yogyakarta semakin terdorong melalui pusat-pusat inkubasi baik dari pemerintah maupun inisiatif pihak swasta.<br />\r\n<br />\r\nSejak 2005 Gamatechno mulai merintis memberi layanan solusi teknologi informasi untuk dunia perguruan tinggi. Hingga saat ini Gamatechno memiliki lebih dari 200 klien B2B (business to business) baik kampus, pemerintahan, pengelola transportasi hingga korporasi dalam daftar panjang portfolio Gamatechno.<br />\r\n<br />\r\nSolusi teknologi multi produk dan multi segmen ini kemudian diusung dengan brand Gamatechno Smart City Solution pada 2014. Sejak saat itu pula Gamatechno mulai dikenal sebagai salah satu perusahaan pengembang kota cerdas di Indonesia dan fokus pada implementasi teknologi untuk mendukung terciptanya konsep smart city di seluruh Indonesia.<br />\r\n<br />\r\nPada sektor pendidikan tinggi, Gamatechno berkontribusi di 200 kampus di seluruh Indonesia baik negeri maupun swasta untuk kebutuhan teknologi informasi pengelolaan kampus. Sedangkan untuk sektor pariwisata dan pelayanan publik, pemerintah daerah/kabupaten telah banyak menggunakan platform mCity.<br />\r\n<br />\r\nBertepatan dengan ulang tahun ke-14, Gamatechno menggelar perayaan di Prambanan Ballroom Cavinton Hotel pada 4 Januari 2019 dan dihadiri oleh oleh seluruh karyawan, direksi, komisaris dan management.<br />\r\n<br />\r\nPada momentum yang sama Gamatechno secara resmi mengumumkan dua anak perusahaan baru di bawah holding Gamatechno Group yaitu PT Solusi Kampus Indonesia (SKI) dan Global Data Inspirasi (Datains). SKI akan mengakselerasi produk dan layanan khususnya untuk kebutuhan sistem untuk perguruan tinggi. Sedangkan Datains akan berfokus pada layanan dan pengelolaan big data.<br />\r\n<br />\r\nSejalan dengan tema yang diusung pada ulang tahun kali ini, &ldquo;Hatch the Dream&rdquo; yang berarti melahirkan mimpi. Dua perusahaan baru ini diharapkan dapat membawa kontribusi positif bagi segmen bisnisnya. Secara luas dapat membawa manfaat dari penerapan teknologi baru di industri-industri di Indonesia dan dalam acara ini dihadiri oleh seluruh karyawan, direksi, komisaris dan management.<br />\r\n<br />\r\nSeperti tahun-tahun sebelumnya perayaan ulang tahun ini juga dimanfaatkan sebagai momen evaluasi dan apresiasi bagi seluruh kinerja karyawan yang berjumlah kurang lebih 200 orang. Dimeriahkan oleh performer dari internal karyawan dengan menampilkan berbagai aksi panggung seperti band, lipsync, dance dan opera komedi.<br />\r\n<br />\r\n14 tahun merupakan pencapaian yang luar biasa bagi Gamatechno. Berbagai apresiasi dan penghargaan dari berbagai pihak mewarnai perjalanan panjang dalam berinovasi dan berkontribusi untuk Indonesia. Bermula dari Yogyakarta membawa misi besar untuk meraih mimpi-mimpi baru dan menjadi kebanggaan bagi bangsa.</p>\r\n', 'hut-ke14-gamatechno-lahirkan-2-anak-perusahaan-baru', 'Bertepatan dengan ulang tahun ke-14, Gamatechno menggelar perayaan di Prambanan Ballroom Cavinton Ho', 'hut gamatechno', 'hutgt14.jpg', '2019-01-31 08:30:58', 'Y', 0),
(7, 19, 1, 'APLIKASI ANTI PLAGIARISM DI UGM', 'Semakin maju teknologi dan berkembangnya jaringan internet membuat semakin mudah bagi kita untuk mendapatkan berbagai macam informasi baik dari buku, jurnal, maupun blog. Kemudahan tersebut sayangnya juga diiringi dengan tumbuh berkembangnya aksi plagiarisme yang menodai dapat menodai integritas', '<p>Semakin maju teknologi dan berkembangnya jaringan internet membuat semakin mudah bagi kita untuk mendapatkan berbagai macam informasi baik dari buku, jurnal, maupun blog. Kemudahan tersebut sayangnya juga diiringi dengan tumbuh berkembangnya aksi plagiarisme yang menodai dapat menodai integritas. Plagiarisme merupakan tindak kejahatan intelektual. Pelakunya dapat terseret ke ranah hukum dan sekaligus bisa mendapat sanksi sosial, berupa berkurangnya integritas, tercemarnya nama baik dst. Lebih fatal lagi jika plagiarisme terjadi di lingkungan kampus dan berhubungan dengan tugas akhir, skripsi, tesis, ataupun disertasi. Pekerjaan mahasiswa yang seharusnya orisinil menjadi sia-sia karena menyadur dari karya orang lain. Kampus mempunyai tugas berat untuk menjaga integritasnya dengan menekan se-minimal mungkin aksi-aksi plagiarisme dilingkungannya, dan hal itu bukanlah sebuah tugas yang mudah untuk kampus.<br />\r\n<br />\r\nGamatechno memahami keresahan itu dengan memperkenalkan aplikasi berbasis web yang diberi nama gtPlagiarismTest. Aplikasi ini telah mendapatkan banyak apresiasi, baik dari dalam dan luar negeri, sejak dikembangkan di lingkungan UGM dalam versi desktop-application dengan nama TESSY (Test of Literature Similarity). Salah satunya adalah predikat juara satu lomba e-Learning yang diadakan oleh Acer Intel pada tahun 2008, dan masuk kedalam buku 106 Inovasi Indonesia di tahun 2013 yang lalu.<br />\r\n<br />\r\nSebagai tahap awal dalam mengimplementasikan gtPlagiarismTest di seluruh lingkungan Universitas Gadjah Mada, dimulasi dengan melakukan kegiatan sosialisasi di Fakultas Kedokteran UGM. Untuk versi yang digunakan di UGM, gtPlagiarismeTest dibranding dengan nama AIMOS (Academic Integrity Monitoring System). AIMOS diharapkan mampu membantu institusi pendidikan dalam mendeteksi lebih dini adanya aktifitas plagiasi pada karya-karya literatur yang ada di UGM. Aplikasi ini mampu menangkap kemiripan dari tingkat kata, kalimat, hingga paragraf antar literatur dalam satu kategori maupun multikategori. Hasil komparasinya disajikan dalam bentuk nilai prosentase kemiripan dimana detil daripada kalimat maupun paragraf yang mirip juga dapat di tampilkan. Hasil akhirnya berupa suggesstion dimana keputusan bahwa pada sebuah literatur yang sudah di uji mengindikasikan plagiasi atau tidak diserahkan kepada pihak universitas.<br />\r\n<br />\r\nAcara sosialisasi AIMOS tersebut dilaksanakan tanggal 2 Maret 2015 dan direncanakan akan gelar kembali pada tanggal 9 Maret untuk lebih mematangkan pemahaman peserta terhadap AIMOS. Peserta yang hadir, termasuk diantaranya adalah Wakil Dekan bagian Akademik Fakultas Kedokteran UGM, yang memberikan apresiasi positif terhadap acara ini dan berkenan mencoba secara langsung &quot;full-cycle&quot; aplikasi anti plagiarisme ini. Diharapkan aplikasi yang sangat handal ini dapat meningkatkan kualitas dan orisinalitas karya tulis mahasiswa.</p>\r\n', 'aplikasi-anti-plagiarism-di-ugm', 'Gamatechno memahami keresahan itu dengan memperkenalkan aplikasi berbasis web yang diberi nama gtPla', 'anti plagiarism', 'aplikasi.jpg', '2019-01-31 08:30:05', 'Y', 0),
(8, 19, 1, 'IT ROADSHOW IN EUROPE', 'Diawali dengan partisipasi dalam pameran ICT terbesar di dunia yaitu CeBIT, 15 pelaku IT Indonesia termasuk Gamatechno juga mengikuti \"IT Roadshow in Europe\" ke Belgia, Belanda, dan Irlandia. Roadshow ini difasilitasi oleh Kementerian Perindustrian RI bersama KBRI Brussel, KBRI Den Haag, KBRI London, dan KJRI Hamburg', '<p>Diawali dengan partisipasi dalam pameran ICT terbesar di dunia yaitu CeBIT, 15 pelaku IT Indonesia termasuk Gamatechno juga mengikuti &quot;IT Roadshow in Europe&quot; ke Belgia, Belanda, dan Irlandia. Roadshow ini difasilitasi oleh Kementerian Perindustrian RI bersama KBRI Brussel, KBRI Den Haag, KBRI London, dan KJRI Hamburg. Tujuan roadshow ini adalah untuk mempromosikan produk dan layanan teknologi komunikasi dan informasi Indonesia di Eropa.<br />\r\n<br />\r\nDi Belgia, mereka berkunjung ke Centre of Excellence in Information and Communication Technologies (CETIC) dan bertemu dengan pelaku usaha IT Belgia dalam forum business gathering yang diadakan KBRI Brussel bekerjasama dengan Kamar Dagang Belgia Indonesia (BICC). Wakil Menteri Perdagangan RI Bayu Krisnamurthi juga hadir dalam acara business gathering tersebut.<br />\r\n<br />\r\nCETIC merupakan pusat riset terapan Belgia yang didedikasikan untuk mendukung perusahaan di sektor teknologi informasi dan komunikasi. Dari pertemuan di CETIC tersebut, baik pihak Indonesia maupun Belgia melihat adanya beberapa peluang kerjasama, dimana Indonesia sebagai sumber tenaga outsourcing Eropa maupun sebagai mitra dalam mengembangkan akses pasar ke Asia.<br />\r\n<br />\r\nDalam roadshow di Belanda, pelaku IT Indonesia berpartisipasi dalam Indonesian Day di High Tech Campus, Eindhoven. Kemudian dalam kunjungan ke Dublin - Irlandia, pelaku IT Indonesia juga bertemu dengan pelaku IT di negara tersebut. Pertemuan ini diharapkan akan membuka peluang kerjasama dengan pelaku IT terkemuka seperti Google, Microsoft dan Yahoo!.<br />\r\n<br />\r\nTak dapat dipungkiri, kini IT merupakan sektor penting dalam perekonomian Indonesia dan menjadi salah satu elemen dalam upaya peningkatan hubungan RI dengan Uni Eropa. Seperti yang dikutip www.antaranews.com, Dubes Arif Havas Oegroseno menekankan kemampuan SDM Indonesia dalam hal produk dan layanan IT tidak kalah dibandingkan dengan negara lain seperti India yang sudah terlebih dahulu dikenal dalam hal produk dan layanannya.<br />\r\n<br />\r\nUntuk itu, sudah waktunya Eropa melihat ke Indonesia tidak hanya sebagai pasar namun sebagai penyedia produk dan layanan IT yang patut diperhitungkan. Diharapkan melalui penyelenggaraan roadshow ini akan membuka peluang-peluang kerjasama, baik Indonesia sebagai pasar maupun mitra dalam pengembangan berbagai produk dan layanan untuk pasar regional maupun global.<br />\r\n<br />\r\nTautan: <a href=\"http://www.antaranews.com/berita/424796/industri-ti-indonesia-berperan-tumbuhkan-ekonomi\"> http://www.antaranews.com/berita/424796/industri-ti-indonesia-berperan-tumbuhkan-ekonomi</a></p>\r\n', 'it-roadshow-in-europe', 'Diawali dengan partisipasi dalam pameran ICT terbesar di dunia yaitu CeBIT, 15 pelaku IT Indonesia t', 'it roadshow', 'roadshow.jpg', '2019-01-31 08:29:07', 'Y', 0),
(9, 20, 1, 'REFRESHING DI TENGAH RUTINITAS BEKERJA', 'Menghadapi kesibukan sehari-hari terutama dalam melakukan aktifitas pekerjaan, sering kali waktu untuk berbagi bersama keluarga dan bahkan sesama karyawan menjadi berkurang. Oleh karena itu, menyadari pentingnya menjaga keseimbangan dalam bekerja (worklife balance), PT Gamatechno Indonesia kembali melaksanakan Family Gathering yang telah menjadi kegiatan rutin setiap tahun', '<p>Menghadapi kesibukan sehari-hari terutama dalam melakukan aktifitas pekerjaan, sering kali waktu untuk berbagi bersama keluarga dan bahkan sesama karyawan menjadi berkurang. Oleh karena itu, menyadari pentingnya menjaga keseimbangan dalam bekerja (worklife balance), PT Gamatechno Indonesia kembali melaksanakan Family Gathering yang telah menjadi kegiatan rutin setiap tahun. Kali ini Family Gathering diadakan pada hari Minggu, tanggal 15 Desember 2013 di Taman Kyai Langgeng Magelang.<br />\r\n<br />\r\nTujuan kegiatan ini antara lain untuk menjaga hubungan baik antara sesama karyawan, saling mempererat hubungan pertemanan dan kekerabatan antara keluarga karyawan yang satu dengan yang lainnya, mempererat kerja sama antara sesama karyawan, serta menghilangkan beban pekerjaan yang selama ini dilakukan.<br />\r\n<br />\r\nDi tengah lokasi yang asri dengan pemandangan indah dan udara yang sejuk, panitia menggelar beragam kegiatan, mulai dari perkenalan keluarga hingga permainan menarik yang membuat para keluarga dan karyawan terhibur. Pukul 07.30, rombongan karyawan beserta keluarga berangkat dari kantor menuju lokasi acara dengan menggunakan bis dan mobil. Pukul 9.00 rombongan tiba di lokasi Taman Kyai Langgeng Magelang. Acara diawali dengan pembagian makanan kecil, perkenalan keluarga karyawan, dan arahan dari Direktur Utama PT Gamatechno Indonesia.<br />\r\n<br />\r\nDalam sambutannya, Pak Aditya selaku Direktur Utama menyampaikan apresiasi terhadap kegiatan Family Gathering ini. Harapannya, dengan kegiatan ini keluarga karyawan dapat melihat secara langsung bagaimana lingkungan kerja anggota keluarganya sehingga tetap terjalin hubungan yang harmonis. Selain itu juga semakin eratnya hubungan kekeluargaan antar karyawan PT Gamatechno Indonesia.<br />\r\n<br />\r\nAcara dilanjutkan dengan permainan yang dibagi menjadi dua kelompok, yaitu permainan anak-anak didampingi orang tua dan permainan orang dewasa. Permainan anak-anak diperuntukkan bagi karyawan yang telah memiliki keluarga. Permainan ini terdiri dari lomba mewarnai untuk TK dan SD kelas 1, lomba melukis di celengan tanah liat untuk kelas 4-6 SD, dan lomba melukis caping untuk kelas 2-3 SD. Sedangkan, permainan orang dewasa untuk karyawan yang belum berkeluarga. Dalam permainan ini peserta dewasa diharuskan memecahkan 5 clue dan mengikuti petunjuknya. Target terakhir tim akan mendapatkan Pusaka Gamatechno jika dapat memecahkan clue dengan benar. Meski sempat diguyur hujan, semua permainan dilakukan dengan penuh keceriaan. Tawa lepas pun menggema ketika peserta permainan tanpa sengaja mengundang kelucuan.<br />\r\n<br />\r\nPukul 12.00 seluruh peserta menyelesaikan permainan dan dilanjutkan dengan pembagian doorprize dan pengumuman pemenang lomba diselingi live music dan makan siang. Tidak ketinggalan, beberapa karyawan turut menyumbangkan lagu sambil bergoyang. Keseruan ditambah dengan partisipasi dari keluarga besar Direktur Gamatechno, Pak Adityo beserta istri dan anak-anaknya yang ikut menyumbangkan suaranya. Dalam kegiatan ini, sama sekali tidak terlihat hubungan atasan dan bawahan, yang ada hanyalah hubungan kekerabatan yang membaur jadi satu.<br />\r\n<br />\r\nAcara selanjutnya bebas, seluruh karyawan dan keluarga dipersilahkan untuk menikmati area permainan di Taman Kyai Langgeng. Ada yang bermain flying fox, jet coaster, perahu motor, baling-baling, kincir angin atau sekedar foto-foto. Tak terasa, di penghujung siang, kegiatan Family Gathering PT Gamatechno Indonesia berakhir.<br />\r\n<br />\r\nDari seluruh rangkaian kegiatan family gathering tersebut, diharapkan dapat meningkatkan kinerja para karyawan di tengah kompetisi perusahaan yang semakin ketat. Oleh karena itu, Family Gathering diciptakan dengan suasana kekerabatan yang diwujudkan melalui silaturahmi untuk mempererat komitmen dan persahabatan yang menumbuhkan kebersamaan dalam pelaksanaan tugas masing-masing, antar karyawan dengan mitra kerja di PT Gamatechno Indonesia.</p>\r\n', 'refreshing-di-tengah-rutinitas-bekerja', 'PT Gamatechno Indonesia kembali melaksanakan Family Gathering yang telah menjadi kegiatan rutin seti', 'refreshing', 'refreshing.jpg', '2019-01-31 08:28:03', 'Y', 0),
(10, 19, 1, 'DARI JOGJA UNTUK INDONESIA PINTAR', 'PT Gamatechno Indonesia (Gamatechno) adalah perusahaan yang bergerak di bidang penyedia solusi teknologi informasi. Gamatechno resmi berdiri pada tanggal 4 Januari 2005 dan berkantor pusat di Yogyakarta. Guna meningkatkan layanan kepada lebih dari 244 klien di seluruh Indonesia yang tersebar dari Banda Aceh hingga Papua', '<p>PT Gamatechno Indonesia (Gamatechno) adalah perusahaan yang bergerak di bidang penyedia solusi teknologi informasi. Gamatechno resmi berdiri pada tanggal 4 Januari 2005 dan berkantor pusat di Yogyakarta. Guna meningkatkan layanan kepada lebih dari 244 klien di seluruh Indonesia yang tersebar dari Banda Aceh hingga Papua, pada tahun 2013 Gamatechno membuka kantor cabang di Jakarta.<br />\r\n<br />\r\nDalam rangka ulang tahun perusahaan ke-9 yang membawa tema Nineovation, Gamatechno meluncurkan inovasi baru berupa konsep gtSmartCity Solution sebagai umbrella brand seluruh produk-produk Gamatechno. Inti dari gtSmartCity Solution adalah implementasi sistem dan teknologi informasi yang berfokus pada 4 sektor yaitu pendidikan, layanan pemerintah, industri transportasi dan logistik, serta industri lifestyle, yang akan mewujudkan sebuah kota cerdas dan memberikan kenyamanan bagi masyarakatnya dengan ciri less paper, less time, less cash dan less complexity.<br />\r\n<br />\r\nUntuk segmen Perguruan tinggi, produk unggulan Gamatechno adalah gtCampus Suite yaitu sistem informasi terintegrasi untuk perguruan tinggi yang terdiri atas berbagai software modular yang dirancang sesuai dengan proses bisnis perguruan tinggi mulai dari pengelolaan penerimaan calon mahasiswa, pengelolaan perkuliahan mahasiswa hingga lulus, pengelolaan aset kampus yang meliputi aset sumber daya manusia, keuangan dan aset barang, perpustakaan, penelitian dan beasiswa hingga dashboard system untuk pimpinan kampus. Selain itu sistem untuk perguruan tinggi ini juga tersedia dalam versi mobile untuk kemudahan mahasiswa dalam mengakses informasi dan layanan kampus.<br />\r\n<br />\r\nUntuk segmen Lembaga pemerintah Gamatechno memiliki beberapa produk unggulan, diantaranya adalah gtPerizinan (sistem informasi perijinan satu atap/pintu), gtAspirasi (sistem informasi aspirasi masyarakat), serta aplikasi gtGroupware (sistem kolaborasi dan arsip perkantoran). Selain produk-produk tersebut, Gamatechno juga melayani pengembangan portal website lembaga dengan konsep citizen centric, serta pengembangan berbagai aplikasi berbasis web dan mobile apps lainnya sesuai dengan kebutuhan lembaga.<br />\r\n<br />\r\nUntuk segmen Transportasi dan Logistik, Gamatechno mengembangkan beberapa produk unggulan bagi perusahaan/organisasi yang bergerak dibidang layanan transportasi dan logistik, yaitu gtFleet (aplikasi manajemen armada transportasi), gtSmartTicket System (Sistem tiket elektronik berbasis smartcard), serta aplikasi mTransport (aplikasi mobile untuk informasi dan layanan transportasi publik).<br />\r\n<br />\r\nPada segmen Lifestyle, Gamatechno mengembangkan produk-produk aplikasi back-end dan front-end untuk beberapa sub industri diantaranya taman hiburan dan wisata, pusat belanja dan entertainment, micro finance, dan industri kesehatan. Beberapa portofolio produk untuk segmen lifestyle ini antara lain Eoviz.com (Small &amp; medium enterprises resource planning system), mEvent (aplikasi mobile informasi event), serta mCatalog (aplikasi mobile informasi katalog produk).<br />\r\n<br />\r\nDalam kesempatan Launching gtSmartCity Solution pada hari Rabu, 7 Mei 2014 kemarin di Gedung Samator UGM juga disampaikan bahwa saat ini pengembangan produk dan layanan sistem berbasis teknologi smartcard, RFId dan NFC yang sebelumnya dilakukan Gamatechno dialihkan untuk dikelola anak perusahaan Gamatechno yaitu yaitu PT Aino Indonesia. Produk-produk yang dikembangkan Aino ini nantinya yang akan menjadi salah satu platform integrasi antar segmen hingga dapat mewujudkan konsep smartcity yang sesungguhnya.<br />\r\n<br />\r\nBerbagai kemudahan integrasi sistem dalam konsep gtSmartCity Solution didemokan secara langsung oleh Direktur Utama Gamatechno, Muhammad Aditya pada saat acara launching, yaitu kombinasi penggunaan aplikasi mobile City dengan perangkat smartcity access berupa wristband untuk melakukan pencarian informasi dan proses transaksi di bandara, layanan transportasi publik, aktivitas belanja dan sarana hiburan.<br />\r\n<br />\r\nMelalui Launching gtSmartCity Solution tersebut, Gamatechno juga berharap dapat meningkatkan kerjasama dengan para mitra untuk bersama-sama mewujudkan kota cerdas di Indonesia terutama pada sektor pendidikan, layanan pemerintahan, transportasi serta industri gaya hidup guna meningkatkan kualitas hidup masyarakat. Inilah yang menjadi spirit utama Gamatechno, dari Jogja untuk Indonesia Pintar.</p>\r\n', 'dari-jogja-untuk-indonesia-pintar', 'Dalam rangka ulang tahun perusahaan ke-9 yang membawa tema Nineovation, Gamatechno meluncurkan inova', 'indonesia pintar', 'darijogja.jpg', '2019-01-31 08:27:27', 'Y', 0),
(11, 19, 1, 'PEMKAB PATI LUNCURKAN 4 APLIKASI PENDUKUNG PATI SMART CITY', 'Selasa (23/09/2018) Pemerintah Kabupaten Pati diwakili Haryanto, Bupati Pati gelar launching Pati Smart City bertempat di pendopo kantor Bupati. Beberapa aplikasi pendukung Pati Smart City diantaranya E-office, E-sakip, Gage Nda dan Aplikasi Pati Smart City diperkenalkan dalam acara tersebut', '<p><strong>Gamatechno.com</strong> Selasa (23/09/2018) Pemerintah Kabupaten Pati diwakili Haryanto, Bupati Pati gelar launching Pati Smart City bertempat di pendopo kantor Bupati. Beberapa aplikasi pendukung Pati Smart City diantaranya E-office, E-sakip, Gage Nda dan Aplikasi Pati Smart City diperkenalkan dalam acara tersebut.<br />\r\n<br />\r\nTujuan dari program ini adalah untuk memperkenalkan Kabupaten Pati ke dunia luar, selain itu juga kebutuhan Pati untuk beradaptasi dengan era digital seperti sekarang untuk pelayanan publik yang lebih baik. Konsep smart city ini bukan hanya berbicara tentang kinerja Pemkab, tapi juga semua hal terkait potensi daerah hingga perpajakan.<br />\r\n<br />\r\nDari empat solusi diatas, Gage Nda merupakan hasil kolaborasi apik antara Kabupaten Pati dengan Gamatechno dalam pengembangan teknologi. Sebelumnya Gamatechno terlibat di beberapa pengembangan aplikasi pemerintah Pati seperi, sistem perijinan satu pintu dan sim ULP.<br />\r\n<br />\r\nGage Nda (Sistem Informasi Ringkasan Data Terpadu) merupakan aplikasi yang berfungsi untuk menyediakan data dan informasi seragam, lengkap, aktual dan valid. Gage Nda Pati menerapkan sebuah inovasi pengelolaan data dengan pendekatan matrix ketugasan RACI (Responsible Accountable Consulted Informed) yang menjadi bagian dari COBIT (Control Objective for Information and related Technology) yang merupakan standar praktik manajemen teknologi informasi.<br />\r\n<br />\r\n&ldquo;Saya berharap aplikasi ini dapat ditindaklanjuti oleh SPKD serta mampu tingkatan pelayanan kepada masyarakat dan saya juga berharap jangan hanya berhenti di launching tapi ada update pelaksana, dewan pembina untuk mewujudkan pati smart city bisa berjalan dengan baik dan lancar&rdquo; tutur Haryanto kepada awak media.</p>\r\n\r\n<p><br />\r\nDalam kesempatan ini, Gamatechno turut berpartisipasi dalam pameran yang digelar pemerintah setempat. Sejalan dengan konsistensi dan komitmen Gamatechno dalam membantu pemerintah untuk mewujudkan kota cerdas di Indonesia, Gamatechno membawa beberapa solusi teknologi khususnya segmen pemerintahan seperti platform layanan publik &amp; pariwisata mCity, sistem informasi persuratan kantor gtPLO, dan beberapa produk dan solusi lainnya.</p>\r\n', 'pemkab-pati-luncurkan-4-aplikasi-pendukung-pati-smart-city', 'Pemerintah Kabupaten Pati diwakili Haryanto, Bupati Pati gelar launching Pati Smart City bertempat d', 'pati smart city', 'pemkabpati.jpg', '2019-01-31 08:25:59', 'Y', 0),
(12, 19, 1, 'DISKOMINFO KABUPATEN GARUT SUSUN RENCANA SMART CITY GARUT 2018', 'Dinas Komunikasi dan Informatika (Diskominfo) Kabupaten Garut adakan rapat pembahasan Penyusunan Rencana Induk Pengelolaan Teknologi Informasi dan Komunikasi di lingkungan Pemerintah Kabupaten Garut. Bertempat di ruang rapat Sekretariat Daerah Kabupaten Garut.', '<p>Dinas Komunikasi dan Informatika (Diskominfo) Kabupaten Garut adakan rapat pembahasan Penyusunan Rencana Induk Pengelolaan Teknologi Informasi dan Komunikasi di lingkungan Pemerintah Kabupaten Garut. Bertempat di ruang rapat Sekretariat Daerah Kabupaten Garut.<br />\r\n<br />\r\nRapat ini dihadiri oleh Drs. H. Nurdin Yana (Kadiskominfo), Asep Nugraha , S.T,M.Kom (Kepala Bidang Egov), Ahmad Hasyim, ST. MT (Kepala Bidang TIK) dan seluruh SKPD Kabupaten Garut serta 2 Kecamatan Garut Kota dan Tarogong Kidul. Dalam agenda ini turut mengundang Triasmono (Consulting &amp; Training Manager Gamatechno) sebagai narasumber.<br />\r\n<br />\r\nAcara ini diselenggarakan untuk membahas hal yang berkaitan dengan teknologi informasi pada perencanaan publik dalam rangka menyongsong smart city Garut 2018. Kabupaten Garut baru akan memulai rencana TIK pada tahun 2018. Garut sudah memulai pembangunan infrastruktur yang sesuai dengan harapan masyarakat, sedangkan Kominfo baru berdiri di tahun 2017 mengacu dari perda no 9 tahun 2016.<br />\r\n<br />\r\n&quot;Semoga dengan adanya acara ini bisa membuka wawasan kita mengenai perencanaan pada Teknologi Informasi dan komunikasi,&quot; ungkap H. Nurdin Yana (Kadiskominfo). Nurdin juga menambahkan dengan adanya smart city Garut, perkembangan dibidang IT akan lebih berkembang sehingga akan mengakselerasi kemajuan Kabupaten Garut.<br />\r\n<br />\r\nSementara itu menurut hasil survei yang dilakukan Triasmono di SKPD dan kecamatan di Garut menunjukan bahwa 60% perangkat telah terhubung koneksi internet. Hal tersebut tentunya menunjukan kemudahan implementasi teknologi di Kabupaten Garut kedepannya.<br />\r\n<br />\r\n&ldquo;Objek yang dipandang pada smart city adalah mengoptimalkan teknologi agar bisa keberlanjutan setiap pertumbuhannya. Selain smart city, dalam konteks SPBE membagi berbagai clustering teknologi yang harus dipenuhi&quot; ungkap Triasmono .<br />\r\n<br />\r\nDiakhir acara Asep Nugraha (Kabid Egov) mengatakan Diskominfo Garut memiliki harapan besar untuk mengintegrasikan seluruh aplikasi dan sistem yang ada.</p>\r\n', 'diskominfo-kabupaten-garut-susun-rencana-smart-city-garut-2018', 'Dinas Komunikasi dan Informatika (Diskominfo) Kabupaten Garut adakan rapat pembahasan Penyusunan Ren', 'diskominfo garut susun rencana smart city', 'diskominfopemkab.jpeg', '2019-01-31 08:25:02', 'Y', 0),
(13, 19, 1, 'GAMATECHNO AJAK SELURUH KARYAWAN DAN KELUARGA HADIRI BUKA BERSAMA 1439H', 'Dalam rangka memperingati bulan suci Ramadhan 1439 H, PT Gamatechno Indonesia mengadakan acara buka bersama dengan seluruh karyawan dan bertempat di Gadjah Mada University Club. Dalam kesempatan ini seluruh direksi, manajemen, komisaris dan tamu undangan dari perusahaan dibawah holding Gama Multi Usaha Mandiri turut hadir dalam acara ini.', '<p>Dalam rangka memperingati bulan suci Ramadhan 1439 H, PT Gamatechno Indonesia mengadakan acara buka bersama dengan seluruh karyawan dan bertempat di Gadjah Mada University Club. Dalam kesempatan ini seluruh direksi, manajemen, komisaris dan tamu undangan dari perusahaan dibawah holding Gama Multi Usaha Mandiri turut hadir dalam acara ini.<br />\r\n<br />\r\n&ldquo;Kita sangat menyadari dukungan dari keluarga sangat luar biasa untuk kita semua, oleh karena itu tahun ini kita adakan acara buka bersama dengan mengundang karyawan beserta keluarga&rdquo; Muhammad Aditya A.N. (Direktur Utama PT Gamatechno Indonesia) dalam sambutan yang ia sampaikan diawal acara.<br />\r\n<br />\r\nSeiring dengan perkembangan perusahaan dan banyaknya jumlah karyawan yang hampir mencapai 200 orang, acara ini merupakan momentum yang tepat untuk mempererat silaturahmi dan perkenalan antar karyawan dan keluarga. Meskipun pada kesempatan ini kantor Gamatechno Branch Jakarta belum bisa hadir dalam acara tahunan kali ini.<br />\r\n<br />\r\nAcara yang dimulai pukul 16.00 WIB ini menghadirkan Ust. Agung Budiyanto sebagai pengisi materi tausiyah. Dalam tausiyahnya banyak pesan moral yang ingin disampaikan melalui tayangan video salah satunya adalah mengajak berpikir positif dan selalu rendah hati dalam menghadapi berbagai hal dalam hidup. Selama acara berlangsung seluruh undangan dihibur dengan lagu-lagu religi yang di bawakan apik oleh band internal karyawan.<br />\r\n<br />\r\nBuka bersama 2018 ini ditutup dengan ibadah sholat maghrib dan santap hidangan berbuka puasa. Harapannya dengan diadakan acara rutin semacam ini semakin menumbuhkan persaudaraan antar karyawan dan keluarga. Selain itu juga dapat dijadikan sebagai motivasi dan penyemangat etos kerja untuk mencapai sukses perusahaan di tahun-tahun berikutnya.</p>\r\n', 'gamatechno-ajak-seluruh-karyawan-dan-keluarga-hadiri-buka-bersama-1439h', 'Gamatechno ajak seluruh karyawan dan keluarga hadiri buka bersama 1439H di Gadjah Mada University Cl', 'gamatechno buka bersama', 'bukabersama.jpeg', '2019-01-31 08:24:18', 'Y', 0),
(14, 19, 1, 'KEMITRAAN DENGAN INTEGRASIA UTAMA', 'Setelah acara peluncuran umberella brand gtSmartcity Solution pada Mei 2014 yang lalu, Gamatechno semakin berusaha memperkuat produk-produknya untuk mendukung konsep smart city tersebut. Salah satu segmen yang menjadi fokus dalam gtSmartcity Solution adalah industri transportasi dan logistik. Gamatechno memperkenalkan brand gtFleet untuk segmen transportasi dan logistik', '<p>Setelah acara peluncuran umberella brand gtSmartcity Solution pada Mei 2014 yang lalu, Gamatechno semakin berusaha memperkuat produk-produknya untuk mendukung konsep smart city tersebut. Salah satu segmen yang menjadi fokus dalam gtSmartcity Solution adalah industri transportasi dan logistik. Gamatechno memperkenalkan brand gtFleet untuk segmen transportasi dan logistik, yaitu aplikasi yang ditujukan untuk mengelola aset kendaraan. Dengan berbasis pada analisa dan pemrosesan data yang terkumpul dari hasil tracking kendaraan dan pengemudinya, serta serangkaian modul-modul yang saling terintegrasi (tracking, SMS gateway, dan web API), gtFleets mampu membantu pengelolaan aset kendaraan perusahaan, meminimalisir terjadinya resiko, meningkatkan efisiensi penggunaan armada, serta membantu memberikan layanan yang lebih baik bagi pelanggannya.<br />\r\n<br />\r\nPada bulan September ini, Gamatechno dan Integrasia Utama telah menandatangani Memorandum of Understanding (MoU) untuk saling mendukung dan bersinergi dalam menciptakan nilai tambah yang kompetitif bagi produk di segmen transportasi dan logistik, khususnya bagi pengembangan kemampuan produk gtFleet dari Gamatechno. Integrasia Utama yang berdiri sejak tahun 2001, pada awalnya memiliki core business di bidang Remote Sensing &amp; Digital Mapping Consulting Service. Dalam perjalanannya Integrasia Utama memperluas portofolio bisnisnya ke sektor transportasi dan logistik dengan mengembangkan solusi OSLOG.<br />\r\n<br />\r\nDalam MoU tersebut disepakati bahwa produk-produk Gamatechno di sektor transportasi dan logistik akan didukung oleh produk OSLOG dari Integrasia Utama. Penandatanganan MoU dilakukan di kantor pusat Gamatechno Yogyakarta, diwakili oleh Bayu Wedha sebagai Direktur Utama Integrasia Utama dan Muhammad Aditya sebagai Direktur Utama Gamatechno. Selain itu tim Integrasia Utama juga berkesempatan mengunjungi kantor pusat PT Aino Indonesia, yang memiliki produk unggulan sistem e-Ticketing untuk layanan transportasi. PT Aino Indonesia adalah anak perusahaan Gamatechno yang memiliki fokus bisnis di bidang Smart Card, RFId dan mobile NFC.<br />\r\n<br />\r\nDengan ditandatanganinya MoU antara Gamatechno dan Integrasia Utama diharapkan kedua pihak dapat saling memperkuat daya saing masing-masing perusahaan di era persaingan global, dengan mengembangkan solusi hasil karya asli Indonesia.</p>\r\n', 'kemitraan-dengan-integrasia-utama', 'kemitraan dengan integrasia utama ditandai dengan penandatanganan MoUuntuk saling mendukung dan bers', 'kemitraan gamatechno dengan integrasia utama', 'kemitraan.jpg', '2019-05-09 15:45:06', 'Y', 0),
(15, 19, 1, 'MEMILIKI BANYAK CABANG DAN KARYAWAN, LUWES PERCAYAKAN GTHR UNTUK PENGELOLAAN SDM', 'Luwes merupakan salah satu perusahaan retail terbesar di Jawa Tengah yang berdiri sejak 51 tahun lalu. Kini Luwes telah memiliki 10 cabang dan mempunyai lebih dari 3000 karyawan yang tersebar diberbagai daerah. Bukan perkara mudah untuk mengelola SDM dalam jumlah banyak, apalagi tersebar menjadi banyak cabang.', '<p>Luwes merupakan salah satu perusahaan retail terbesar di Jawa Tengah yang berdiri sejak 51 tahun lalu. Kini Luwes telah memiliki 10 cabang dan mempunyai lebih dari 3000 karyawan yang tersebar diberbagai daerah. Bukan perkara mudah untuk mengelola SDM dalam jumlah banyak, apalagi tersebar menjadi banyak cabang.</p>\r\n\r\n<p><br />\r\n2014 Luwes memutuskan untuk beralih menggunakan sistem informasi pengelolaan SDM. Semakin berkembangnya bisnis menuntut pengelolaan SDM yang efektif dan efisien tanpa terbebani masalah pengelolaan administrasi dan operasional perusahaan.</p>\r\n\r\n<p><br />\r\nKini semua proses pengelolaan karyawan dapat dilakukan jauh lebih mudah. Dalam penggajian karyawan misalnya, Luwes sebelumnya menghitung absensi secara manual setiap cabang untuk menentukan besaran gaji setiap karyawannya. Integrasi dengan berbagai sistem absensi seperti finger print, barcode scanner, door acces hingga smart ID card juga memudahkan otomasi kalkulasi perhitungan gaji karyawan.</p>\r\n\r\n<p><br />\r\nProses rekruitmen dan pengelolaan data karyawan pun lebih mudah dilakukan. Layanan mandiri karyawan seperti pengajuan cuti, lembur, cetak slip gaji, hingga urusan CV dapat diakses dengan mudah. Jika dibandingkan sebelum menggunakan sistem, proses rekruitmen karyawan masih tidak terkontrol untuk tiap cabang, masih banyak karyawan yang masuk dan keluar tanpa sepengetahuan manajemen pusat, yang tentunya hal ini berimbas di sektor keuangan perusahaan.</p>\r\n\r\n<p><br />\r\n&ldquo;Sistem yang digunakan adalah berbasis online, keuntungan untuk kami yang mempunyai banyak cabang yang berada di lokasi yang berbeda, yaitu semua cabang bisa terakomodir tanpa harus mengunjungi tiap cabang.&rdquo; Ujar Cahyo, mewakili bagian Human Resource Luwes Grup.</p>\r\n', 'memiliki-banyak-cabang-dan-karyawan-luwes-percayakan-gthr-untuk-pengelolaan-sdm', 'luwes', 'luwes', 'MEMILIKI BANYAK CABANG DAN KARYAWAN, LUWES PERCAYAKAN GTHR UNTUK PENGELOLAAN SDM_3101193800.jpg', '2019-01-31 10:10:45', 'Y', 1);
INSERT INTO `news` (`id_news`, `fk_id_category`, `fk_userId`, `news_title`, `headline`, `news_content`, `news_seo`, `meta_desc`, `meta_keyword`, `image`, `posted_at`, `status`, `is_deleted`) VALUES
(16, 19, 1, 'Penting! Mengapa Perusahaan Harus Memiliki Tata Kelola TI', 'Kelangsungan operasional perusahaan tak lepas dari peran Tata Kelola TI perusahaan yang dimiliki dalam internal organisasi. Perusahaan memiliki standar dan menjalankan prosedur operasional untuk mencapai tujuan yang memiliki nilai strategis. ', '<p>Kelangsungan operasional perusahaan tak lepas dari peran Tata Kelola TI perusahaan yang dimiliki dalam internal organisasi. Perusahaan memiliki standar dan menjalankan prosedur operasional untuk mencapai tujuan yang memiliki nilai strategis. Tata kelola TI menjadi tanggung jawab dan bentuk praktik kerja yang biasanya digunakan para eksekutif bisnis untuk dapat memiliki pandangan pada sasaran perusahaan. Tata kelola TI bisa digunakan oleh organisasi pada level eksekutif untuk&nbsp;mengendalikan risiko yang bisa terjadi dan memastikan segala bentuk sumber daya perusahaan agar dapat digunakan dengan sesuai. Pada akhirnya tata kelola perusahaan yang lakukan secara baik bisa mempengaruhi tingkat kepercayaan serta perlindungan investasi di masa depan yang lebih terjamin.</p>\r\n\r\n<p>Definisi menurut&nbsp;<em>IT Governance Institute</em>&nbsp;(ITGI) menjelaskan bahwa Tata kelola TI merupakan tanggung jawab dari manajemen eksekutif atau direksi, dan merupakan bagian dari&nbsp;<em>enterprise governance</em>. Tata kelola TI berfokus pada dua hal yaitu bagaimana upaya TI memberikan nilai tambah bagi bisnis dan penanganan risiko ketika sudah dilaksanakan. Pelaksanaan tata kelola teknologi informasi dalam sebuah organisasi, dibangun dengan memberikan nilai tambah yang mungkin akan bermanfaat bagi&nbsp;<em>stakeholder</em>. Contoh riil yang mungkin bisa diaplikasikan adalah berupa jaminan dalam hal akurasi dan ketepatan waktu laporan manajemen selama proses pengembangan teknologi informasi. Selain itu, pengembangan teknologi informasi harus bisa mengurangi risiko adanya kemungkinan terjadi&nbsp;<em>fraud</em>.&nbsp;</p>\r\n\r\n<p>Apa itu&nbsp;<em>fraud</em>?&nbsp;<em>Fraud</em>&nbsp;merupakan istilah yang memiliki arti perbuatan kecurangan yang melanggar hukum (<em>illegal-acts</em>) yang dilakukan secara sengaja dan sifatnya dapat merugikan pihak lain dalam bidang TI. Bentuk dari kecurangan ini seperti tindakan pencurian, penyerobotan, pemerasan, penjiplakan, pengelapan dan lain-lain.</p>\r\n\r\n<p>Upaya pencegahan&nbsp;<em>fraud</em>&nbsp;sangat berkaitan dengan praktik&nbsp;<em>IT Governance</em>&nbsp;yang menerapkan pemilihan dan pengembangan TI agar memadai. Banyaknya kasus&nbsp;<em>fraud</em>&nbsp;yang terjadi karena lemah dalam pemilihan dan pengembangan TI sehingga menghasilkan MIS (<em>Management Information System</em>) yang tidak handal. Ketidak-handalan ini yang dapat menciptakan peluang kecurangan kecil yang mulanya dilakukan secara iseng lalu membesar menjadi kecurangan besar karena adanya &ldquo;kesempatan&rdquo; sehingga pelaku mengetahui kelemahan dalam hal pengawasan yang ada dalam organisasi. Pada intinya,&nbsp;<em>fraud</em>&nbsp;adalah kondisi yang dapat merusak, merugikan dan mengancam kelangsungan perusahaan di masa depan.</p>\r\n\r\n<p>Perusahaan bisa mengantisipasi peluang adanya&nbsp;<em>fraud</em>&nbsp;ini dengan tata kelola yang baik karena alasan didalamnya cukup penting terutama bagi manajemen dalam organisasi. Berikut terdapat beberapa alasan mengapa tata kelola TI menjadi baik dan harus dilakukan oleh perusahaan, diantaranya:</p>\r\n', 'penting-mengapa-perusahaan-harus-memiliki-tata-kelola-ti', 'Kelangsungan operasional perusahaan tak lepas dari peran Tata Kelola TI perusahaan yang dimiliki dal', 'perusahaan it', 'Penting! Mengapa Perusahaan Harus Memiliki Tata Kelola TI_3101194152.jpg', '2019-01-31 12:53:38', 'N', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `pengunjung_id` int(11) NOT NULL,
  `pengunjung_tanggal` date DEFAULT NULL,
  `pengunjung_ip` varchar(40) DEFAULT NULL,
  `hitung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`pengunjung_id`, `pengunjung_tanggal`, `pengunjung_ip`, `hitung`) VALUES
(481, '2019-03-12', '103.31.109.2', 0),
(482, '2019-04-12', '168.235.202.213', 0),
(483, '2019-09-12', '120.188.85.102', 0),
(484, '2019-04-12', '61.5.84.239', 0),
(485, '2019-10-12', '36.73.220.140', 0),
(961, '2019-01-30', '::1', 6),
(962, '2019-01-31', '::1', 15),
(963, '2019-02-11', '::1', 1),
(964, '2019-03-01', '::1', 2),
(965, '2019-03-02', '::1', 20),
(966, '2019-03-03', '::1', 3),
(967, '2019-03-06', '::1', 2),
(968, '2019-03-07', '::1', 2),
(969, '2019-03-08', '::1', 1),
(970, '2019-03-11', '::1', 2),
(971, '2019-04-07', '::1', 5),
(972, '2019-04-27', '::1', 1),
(973, '2019-05-01', '::1', 2),
(974, '2019-05-02', '::1', 1),
(975, '2019-05-05', '::1', 1),
(976, '2019-05-06', '::1', 2),
(977, '2019-05-19', '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `fk_id_category` int(11) NOT NULL,
  `fk_userId` bigint(20) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `service_seo` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `meta_desc` varchar(100) NOT NULL,
  `meta_keyword` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `posted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Y','N') NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id_service`, `fk_id_category`, `fk_userId`, `service_name`, `service_seo`, `description`, `meta_desc`, `meta_keyword`, `image`, `posted_at`, `status`, `is_deleted`) VALUES
(1, 11, 1, 'DESIGN', 'design', '<p><em><strong>Desain Grafis</strong></em></p>\r\n\r\n<p>Desain Grafis merupakan suatu pekerjaan yang erat kaitannya dengan seni. Banyak Perusahaan yang sekarang ini membutuhkan tenaga desain grafis dalam merancang produknya maupun untuk mempromosikan produk-produknya. Karena itu jasa desain grafis dapat menjadi salah satu peluang usaha yang menjanjikan bagi mereka yang mempunyai keahliaan di bidang desain grafis dan multimedia.</p>\r\n\r\n<p><strong><em>Kebutuhan</em></strong><br />\r\nDesain grafis memang saat ini telah menjadi kebutuhan, terutama dalam bidang usaha, industri dan ekonomi. Persaingan bisnis dan perkembangan industri saat ini menuntut upaydaa-upaya kreatif untuk dapat menjangkau minat pasar. Suksesnya marketing dari suatu produk akan ditentukan oleh ide kreatif dari perusahaan tersebut. Untuk itulah keahlian dibidang grafis menjadi penting dan dibutuhkan. Misalnya contoh paling sederhana adalah penggunaan keahlian desain grafis untuk mendesain baju, logo, Situs Web, Antarmuka aplikasi dll. Hal ini menjadi peluang bagi mahasiswa maupun mereka yang menekuni bidang multimedia atau grafis untuk melakukan bisnis jasa dibidang desain grafis. Namun untuk memulai bisnis jasa desain grafis, ada beberapa hal yang harus diperhatikan, termasuk persiapan agar nantinya usaha jasa yang akan dibuka dapat berjalan dengan lancar.</p>\r\n', '', 'design', 'desain.jpg', '2019-01-31 09:51:13', 'Y', 0),
(2, 13, 1, 'CONSULTING', 'consulting', '<p>Technical Consultant atau Konsultan IT memberikan masukan mengenai permasalahan IT. Umumnya para konsultan IT meng-handle masalah problem domain. Jika di-analogi-kan, consultant IT mirip dengan analis sistem yang memikirkan konsep proses bisnis daripada menjalankannya seperti yang dilakukan oleh bagian desain atau coding. Pada umumnya, para penyedia jasa konsultan IT menguasai permasalahan software development dalam artian luas dan pada level yang lebih tinggi. Tugas yang diembannya masuk dalam kategori software consulting.</p>\r\n\r\n<p>\r\nKonsultan IT lebih banyak memberikan konsultasi kepada pelanggan dan berada di luar perusahaan. Untuk itu, konsultan IT juga dituntut memiliki kemampuan komunikasi dan kemampuan interpersonal yang baik. Karena pekerjaannya juga berbungan dengan tulis-menulis, konsultan IT harus memiliki keahlian menulis yang memadai. Gambaran lain, jika konsultan IT bekerja dalam perusahaan yang memproduksi software, konsultan IT berperan dalam proses pre-sales, perubahan proses bisnis, perubahan modul yang cukup rumit, dan juga melakukan modifikasi.</p>\r\n\r\n<p>\r\nDengan mengoptimalkan peran konsultan IT, perusahaan yang sedang berkembang lebih mudah dapat menjadi perusahaan maju dalam hitungan tahun. Konsultan IT tidak hanya kolega bisnis yang memecahkan masalah hardware dan software IT, tapi juga terlibat langsung dalam proses bisnis yang ditekuni klien sekaligus praktisi yang handal.</p>\r\n', 'consulting', 'consulting', 'consulting.jpg', '2019-01-30 06:59:05', 'Y', 0),
(3, 9, 1, 'TECHNOLOGY INFORMATION', 'technology-information', '<p>Untuk beberapa perusahaan besar, IT Support sangat penting. Jasa IT Support merupakan sebuah jasa yang akan membantu atau memberikan dukungan atau support kepada siapa saja atau pihak manapun dalam ruang lingkup perusahaan atau tempat kerja. Dukungan yang diberikan adalah berupa dukungan terhadap segala hal yang berkaitan dengan teknologi Infomasi. Jasa IT Support memberikan layanan pendukung IT sebagian besar adalah untuk memantau dan memelihara jaringan komputer dan sistem yang terkait.Tugas-tugas yang terlibat dapat bervariasi dari menginstal dan mengkonfigurasi sistem komputer, mendiagnosa hardware dan kesalahan perangkat lunak. Beberapa tugas yang lebih penting juga dapat mencakup pemeliharaan preventif dan upgrade sistem.</p>\r\n\r\n<p>Jasa IT Support yang kami berikan antara lain: pembangunan jaringan internet (networking) untuk Hotel, Apartemen, Restaurant, Perumahan, Sekolah Perkantoran, pusat perbelanjaan beserta pengembangannya dan perawatannya termasuk juga jasa web desain, jasa SEO, jasa iklan Google, jasa iklan social media (internet marketing) pembuatan aplikasi berbasis Android dan iOS.</p>\r\n\r\n<ul>\r\n	<li><strong>Pembangunan Networking</strong></li>\r\n</ul>\r\n\r\n<p>Jasa networking meliputi pembangunan infrastruktur untuk jaringan internet lokal dan online yang di optimasi dengan baik sehingga bisa meningkatkan kinerja karyawan dan memaksimalkan anggaran pengeluaran perusahaan Anda secara terus menerus dan berkesinambungan.</p>\r\n\r\n<ul>\r\n	<li><strong>Jasa Pembuatan Website</strong></li>\r\n</ul>\r\n\r\n<p>Meliputi jasa pembuatan website (company profile, online shop, aplikasi)&nbsp;&nbsp;berbasis CMS menggunakan PHP/Java, APP Android, maintenance dan pengelolaan website dengan sistem kontrak dengan biaya yang terjangkau tapi dengan hasil yang maksimal dan menguntungkan anda.</p>\r\n\r\n<ul>\r\n	<li><strong>Jasa Periklanan Online</strong></li>\r\n</ul>\r\n\r\n<p>Meliputi search engine optimization jasa SEO, periklanan PPC Google, periklanan media sosial (FB, Instagram, Twitter) serta melalui pemasaran konten yang terarah. Layanan ini tepat untuk perusahaan startup maupun yang sudah berjalan dan ingin lebih berkembang dan maju lagi.</p>\r\n\r\n<ul>\r\n	<li><strong>Jasa Perawatan &amp; Perbaikan Komputer</strong></li>\r\n</ul>\r\n\r\n<p>Meliputi service pemeliharaan perangkat komputer/server dan laptop, pembersihan komputer dari serangan virus, malware, trojan, adware dll. Upgrade, downgrade, tune-up, tweaking RAM, Power supply, Prosesor, update/upgrade OS secara menyeluruh dan berkala.</p>\r\n', 'Information technology', 'technology_information', 'techno.jpg', '2019-05-19 15:43:52', 'Y', 0);

-- --------------------------------------------------------

--
-- Table structure for table `static_page`
--

CREATE TABLE `static_page` (
  `id_page` int(11) NOT NULL,
  `fk_id_category` int(11) NOT NULL,
  `page_title` varchar(100) NOT NULL,
  `page_content` text NOT NULL,
  `meta_desc` varchar(100) NOT NULL,
  `meta_keyword` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `posted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Y','N') NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `static_page`
--

INSERT INTO `static_page` (`id_page`, `fk_id_category`, `page_title`, `page_content`, `meta_desc`, `meta_keyword`, `image`, `posted_at`, `status`, `is_deleted`) VALUES
(51, 15, 'Remarks by the Director', '<p>&quot;Dengan gtSmartCity Solution, Gamatechno berkomitmen untuk berperan aktif dalam peningkatan tatanan hidup masyarakat berbasis teknologi&quot;<br />\r\n<br />\r\n<tt><em>Assalamu&#39;alaikum Wr. Wb.</em></tt><br />\r\n<em><tt>Pelanggan dan mitra yang kami cintai, Tak terasa telah 10 tahun kiprah Gamatechno mewarnai industri digital di Indonesia. Kurun waktu tersebut tentunya bukanlah sebuah perjalanan yang singkat, terutama bagi kami perusahaan yang dibangun dari semangat anak-anak muda. Banyak sekali pembelajaran yang kami dapatkan sepanjang proses pengembangan produk dan kerjasama dengan seluruh pelanggan dan mitra yang senantiasa setia memberi kami kesempatan untuk terus berbenah diri. Berbagai pengalaman yang kami dapatkan, tentu saja menjadi landasan inovasi yang senantiasa kami lakukan sepanjang perjalanan bisnis Gamatechno. Hal ini tidak lain kami lakukan untuk terus meningkatkan value yang dapat kami berikan untuk seluruh stakeholder. Di tahun yang ke-10 ini, Gamatechno mendedikasikan sebuah solusi yang kami sebut gtSmartCity Solution untuk para pelanggan dan mitra. </tt></em></p>\r\n\r\n<p><tt><em>Solusi ini merupakan inovasi lanjutan dari portofolio produk dan jasa perusahaan yang telah dikembangkan di tahun-tahun sebelumnya. Ide utama dari gtSmartCity Solution adalah bagaimana membangun sebuah kota cerdas dipandang dari perspektif kehidupan masyarakat dengan value utama less paper, less cash, less time dan less complexity. Kami membagi gtSmartCity Solution ke dalam 4 segmen industri utama yaitu Pendidikan, Pemerintahan, Transportasi, dan Business, karena pada segmen-segmen industri tersebutlah aktifitas masyarakat perkotaan berjalan sangat masif. Dengan kata lain, gtSmartCity Solution terdiri atas produk dan solusi teknologi tepat guna untuk memberikan kemudahan bagi masyarakat perkotaan terkait dengan aktifitas di bidang pendidikan, layanan pemerintahan, transportasi dan business. Mengingat cakupan solusi yang cukup luas, tentu saja dapat dibayangkan kompleksitas teknologi yang digunakan sebagai komponen produk dan solusi gtSmartCity Solution. </em></tt></p>\r\n\r\n<p><tt><em>Maka selain inovasi teknologi web, mobile, smartcard, RFId, NFC, GPS serta beberapa teknologi lain yang kami kuasai, saat ini kami terus berupaya meningkatkan kerjasama dan kolaborasi dengan para pihak untuk memberikan kualitas produk dan jasa terbaik bagi seluruh pelanggan dan masyarakat. Prinsip inovasi, kerjasama dan kolaborasi ini akan terus menjadi semangat kami dalam memberikan value bagi industri dan masyarakat. Dan kami mengucapkan terima kasih dan apresiasi yang sebesar-besarnya kepada seluruh pelanggan dan mitra atas kepercayaan yang telah diberikan kepada kami selama ini. Dengan kolaborasi yang lebih baik, kami semakin percaya diri dan yakin untuk dapat menciptakan value yang lebih tinggi kepada seluruh stakeholder sekaligus meningkatkan peran dalam pengembangan industri digital di Indonesia, bahkan hingga kancah global.</em></tt><br />\r\n<em><tt>Wassalamu&#39;alaikum Wr. Wb.</tt></em></p>\r\n', '', 'Muhammad Aditya A.N', 'Aditya_batik.jpg', '2019-05-01 18:00:26', 'Y', 0),
(52, 16, 'PT. PUKKA SOLUSI INDONESIA', '<p>Sebagai perusahaan yang bergerak di bidang penyedia solusi teknologi informasi, PT Gamatechno Indonesia (Gamatechno) resmi berdiri pada tanggal 4 Januari 2005 dan berkantor pusat di Yogyakarta. Guna meningkatkan layanan kepada lebih dari 240 klien di seluruh Indonesia yang tersebar dari Banda Aceh hingga Papua, pada tahun 2013 Gamatechno membuka kantor cabang di Jakarta.?</p>\r\n\r\n<p>Seiring dengan perkembangan perusahaan, saat ini Gamatechno memiliki fokus pada pengembangan produk dan solusi teknologi informasi untuk segmen perguruan tinggi, lembaga pemerintah, perusahaan penyedia jasa transportasi dan logistik, serta industri business. Layanan yang berfokus pada 4 segmen utama tersebut selanjutnya didefinisikan sebagai gtSmartCity Solution, yaitu solusi berbasis sistem dan teknologi informasi guna mewujudkan sebuah kota cerdas dengan ciri less paper, less time, less cash dan less complexity untuk meningkatkan tatanan hidup masyarakat.</p>\r\n\r\n<p>Untuk segmen transportasi dan logistik, Gamatechno mengembangkan beberapa produk unggulan bagi perusahaan atau organisasi yang bergerak dibidang layanan transportasi dan logistik, yaitu gtFleets (sistem informasi pengelolaan armada), gtSmartTicket System (sistem tiket elektronik berbasis smartcard), serta aplikasi mTransport (aplikasi mobile untuk informasi dan layanan transportasi publik).</p>\r\n\r\n<hr />\r\n<ul>\r\n	<li>\r\n	<h3><strong>Visi &amp; Misi</strong></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p><em>Vision 2020</em>&nbsp;:&nbsp;</p>\r\n\r\n<p>To be a market leader in national smart city&nbsp;development</p>\r\n\r\n<p><em>Misi :&nbsp;</em></p>\r\n\r\n<p>Dalam rangka pencapaian visi dan tujuan&nbsp;perusahaan, maka Gamatechno menjabarkan&nbsp;misi-misi perusahaan sebagai berikut :</p>\r\n\r\n<p>1. Mengakomodasi kebutuhan, sumber daya, dan&nbsp;tujuan Universitas Gadjah Mada</p>\r\n\r\n<p>2. Menciptakan masyarakat cerdas melalui&nbsp;produk-produk TI yang digunakan sehari-hari</p>\r\n\r\n<p>3. Berpartisipasi aktif dalam komunitas global&nbsp;untuk membangun industri kreatif digital</p>\r\n\r\n<hr />\r\n<ul>\r\n	<li><strong>Corporate Values</strong></li>\r\n</ul>\r\n\r\n<p><em>Innovative Mindset</em></p>\r\n\r\n<p>gtHeroes (karyawan Gamatechno) harus memiliki innovative mindset, yaitu kreatif dalam memecahkan setiap masalah, serta selalu memiliki inisiatif dan aktif untuk mencari ide-ide baru yang lebih baik.&nbsp;</p>\r\n\r\n<p><em>Agile Behavior</em></p>\r\n\r\n<p>gtHeroes adalah seorang yang mudah untuk beradaptasi terhadap beragam situasi dan perubahan, mudah bekerjasama dengan siapa saja, cepat belajar dan sigap dalam menyelesaikan setiap pekerjaan.</p>\r\n\r\n<p><em>Balanced Life</em><br />\r\ngtHeroes harus mampu membangun keseimbangan antara ketekunan dalam bekerja dengan kebahagiaan pribadi, selalu bersemangat dalam karir tanpa mengesampingkan aktifitas sosial dan spiritual. Seorang gtHeroes tidak hanya baik untuk dirinya sendiri melainkan juga memberi energi positif dan manfaat bagi banyak orang</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', '', 'PT. PUKKA SOLUSI INDONESIA_3101191116.png', '2019-05-02 07:10:04', 'Y', 0),
(53, 17, 'BOARD OF MANAGEMENT 2018', '<hr>\r\nKomisaris Utama	:	DR. Didi Achjari, S.E., M.Com., Akt\r\n<hr>\r\nKomisaris	:	Widyawan, S.T., M.Sc., Ph.D.\r\n<hr>\r\nKomisaris	:	M. Afrizal Hernandar, S.T., MBA.\r\n<hr>	 	 \r\nPresident Director	:	Muhammad Aditya A.N.\r\n<hr>\r\nDirector     	:	Adityo Hidayat St. Majo Kayo, CISA\r\n<hr>\r\nTechnology & Business Innovation General Manager	:	Novan Hartadi\r\n<hr>\r\nMultimedia General Manager	:	Nanang Ruswianto\r\n<hr>\r\nConsulting General Manager	:	Nugroho Setio Wibowo\r\n<hr>\r\nFinance General Manager	:	Reni Nurika Andayani\r\n<hr>\r\nCorporate Services General Manager	:	R. Sumarwan Ismunu\r\n<hr>\r\nAcademic Solution Manager	:	Awaludin Zakaria\r\n<hr>\r\nGovernment Solution Manager	:	Taufik Suryawan Edyna\r\n<hr>\r\nCorporate Business Solution Manager	:	A. Toto Priyono\r\n<hr>\r\nConsulting and Training Manager	:	Triasmono\r\n<hr>\r\nHuman Capital and Legal Manager	:	Andri Kushendarto\r\n<hr>\r\nEmerging Business Solution Manager	:	IGP Rahman Desyanta\r\n<hr>\r\nCorporate Branding & Communication Manager	:	Danang Wicaksono Ardhi\r\n<hr>\r\nJakarta Branch Manager	:	Nurianto Kama\r\n<hr>', '', '', 'Board_Of_Management.png', '2019-01-10 07:36:56', 'Y', 0),
(54, 18, 'HOLDING COMPANY', '<p>PT Gamatechno Indonesia termasuk kedalam Gama Multi Group, dimana dikelola oleh PT Gama Multi Usaha Mandiri (Gama Multi), yaitu&nbsp; perusahaan holding dan investasi yang bergerak di berbagai bidang. Gama Multi dimiliki oleh Universitas Gadjah Mada dan mengembangkan unit-unit usaha dan anak-anak perusahaan, untuk mengelola dan meningkatkan nilai sumber daya dan potensi yang ada, baik di UGM maupun dari stakeholder lain, dengan profesional, terpercaya, dan bertanggungjawab.<br />\r\n<br />\r\nGama Multi didirikan sebagai upaya UGM mewujudkan kemandirian sebagai sebuah Badan Hukum Milik Negara (BHMN). Secara resmi didirikan berdasarkan Akta Pendirian Nomor 54 tertanggal 24 Juni 2000, dan telah disahkan berdasarkan Keputusan Menteri Kehakiman dan Hak Asasi Manusia Republik Indonesia Nomor C-1.333.HT.01.01.TH.2001 tertanggal 21 Februari 2001, dan telah dimuat dalam Berita Negara Republik Indonesia Nomor 56 tertanggal 13 Juli 2001, Tambahan Lembaran Negara Nomor 4519.<br />\r\n<br />\r\nGama Multi bertekad untuk membangun reputasi dan kompetensi sebagai perusahaan holding dan investasi berskala nasional melalui usaha-usaha yang menghasilkan produk terbaik dan layanan prima kepada para konsumen serta pelaksanaan good corporate governance dalam setiap lini usahanya. Saat ini, Gama Multi mempekerjakan &plusmn;300 karyawan yang tersebar dalam 6 unit usaha dan 5 anak perusahaan.</p>\r\n\r\n<p><br />\r\nSejak pendirian dan dalam masa perkembangan, Gama Multi telah memberikan kontribusi finansial maupun non finansial kepada UGM, antara lain melalui management fee pengelolaan jasa keuangan (Reksa Dana Gadjah Mada) dan peningkatan nilai aset properti maupun ekuitas yang dimiliki oleh UGM. Diharapkan dengan semakin berkembangnya usaha-usaha yang didirikan oleh Gama Multi, dapat mendorong kontribusi yang lebih besar kepada UGM sehingga dapat membantu UGM untuk meningkatkan kualitas layanan pendidikan kepada mahasiswa.<br />\r\n<br />\r\nSelain itu, Gama Multi juga berperan sebagai Project Management Center bagi UGM dan memfasilitasi kontribusi aktif civitas akademika UGM dalam pelaksanaan proyek-proyek dengan pihak luar. Sebagai jembatan akses, diharapkan dapat membantu pemberdayaan dan pemanfaatan potensi besar UGM seluas-luasnya bagi kepentingan semua pihak.<br />\r\n<br />\r\nWebsite resmi :&nbsp;<a href=\"http://gamamulti.com/\" target=\"_blank\">http://gamamulti.com</a></p>\r\n\r\n<p>&nbsp;</p>\r\n', 'company', 'holding', 'visi_misi.png', '2019-05-02 07:27:12', 'Y', 0),
(56, 22, 'In a healthy body - mind!', '<p>Human resources policy in the company is based on compliance of all existing laws and regulations of the Ukrainian government, as well as standards of conduction within the company - corporate ethics.</p>\r\n', 'healthy body', 'mind, healthy', 'In a healthy body - mind!_2301191110.jpg', '2019-01-23 08:10:11', 'Y', 0),
(57, 22, 'Regular personnel training', '<p>Department of HR implements human resources policy, and strategic direction for the staff. Department of HR implements human resources policy, and strategic direction for the staff.</p>\r\n', 'regular personel', 'personel', 'Regular personnel training_2301194406.jpg', '2019-01-23 08:06:44', 'Y', 0),
(58, 22, 'Positive morale', '<p>The activity of enterprises under the trademark of GC &quot;Foxtrot&quot; is based on the unconditional power, respect for other cultures, dignity and human rights.</p>\r\n', 'morale positive', 'morale', 'Positive morale_2301193004.jpg', '2019-01-30 07:12:31', 'Y', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id_subscribe` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subscribe_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subscribe_status` int(2) NOT NULL DEFAULT '1' COMMENT '1=belum dilihat, 0=sudah dilihat',
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id_subscribe`, `email`, `subscribe_date`, `subscribe_status`, `is_deleted`) VALUES
(56, 'ulfaintania1@gmail.com', '2019-03-06 06:41:30', 0, 0),
(57, 'ulfaintania1@gmail.com', '2019-03-06 06:45:16', 0, 0),
(58, 'ulfaintania1@gmail.com', '2019-03-06 07:14:26', 0, 0),
(59, 'ulfaintania1@gmail.com', '2019-03-06 07:16:29', 0, 0),
(60, 'ulfaintania1@gmail.com', '2019-03-06 07:30:54', 0, 0),
(61, 'ulfaintania1@gmail.com', '2019-03-06 07:43:56', 0, 0),
(62, 'nurharyani2407@gmail.com', '2019-03-06 07:45:01', 0, 0),
(63, 'ulfaintania1@gmail.com', '2019-03-06 07:53:17', 0, 0),
(64, 'ulfaintania1@gmail.com', '2019-03-06 08:20:41', 0, 0),
(65, 'ulfaintania1@gmail.com', '2019-03-06 08:21:14', 0, 0),
(66, 'ulfaintania1@gmail.com', '2019-03-06 08:22:45', 0, 0),
(67, 'ulfaintania1@gmail.com', '2019-03-06 08:42:23', 0, 0),
(68, 'diyanayu28@gmail.com', '2019-03-06 08:44:34', 0, 0),
(69, 'ulfaintania1@gmail.com', '2019-03-06 08:57:53', 0, 0),
(70, 'diyanayu28@gmail.com', '2019-03-06 09:01:07', 0, 0),
(71, 'ulfaintania1@gmail.com', '2019-03-06 15:42:13', 0, 0),
(72, 'ugm.proceeding@mail.com', '2019-03-06 16:11:37', 0, 0),
(73, 'arimurtif@gmail.com', '2019-03-06 17:32:45', 0, 0),
(74, 'ulfaintania1@gmail.com', '2019-03-06 17:53:53', 0, 0),
(75, 'sintiyadewi@mail.ugm.ac.id', '2019-03-06 17:56:02', 0, 0),
(76, 'bagus.satria@mail.ugm.ac.id', '2019-03-06 18:07:20', 0, 0),
(77, 'ulfaintania1@gmail.com', '2019-03-06 18:47:00', 0, 0),
(78, 'ulfaintania1@gmail.com', '2019-03-07 13:43:55', 0, 0),
(79, 'ulfaintania1@gmail.com', '2019-03-07 13:46:57', 0, 0),
(80, 'yusiseptiyani@gmail.com', '2019-03-07 14:39:21', 0, 0),
(81, 'luthfi1718@gmail.com', '2019-03-07 14:50:05', 0, 0),
(82, 'ulfaintania1@gmail.com', '2019-03-07 16:20:18', 0, 0),
(83, 'arinamaulie@gmail.com', '2019-03-07 16:30:18', 0, 0),
(84, 'ulfaintania1@gmail.com', '2019-03-07 18:43:03', 0, 0),
(85, '97orlandoriko@gmail.com', '2019-03-07 18:56:14', 0, 0),
(86, 'ulfaintania1@gmail.com', '2019-03-07 19:14:10', 0, 0),
(87, 'alfianbima00@mail.ugm.ac.id', '2019-03-07 19:47:11', 0, 0),
(88, 'ulfaintania1@gmail.com', '2019-03-08 12:00:35', 0, 0),
(89, 'untuksimpanfileima@gmail.com', '2019-03-08 12:26:42', 0, 0),
(90, 'ulfaintania1@gmail.com', '2019-03-11 16:57:51', 0, 0),
(91, 'te@G.d', '2019-03-11 17:00:25', 0, 0),
(92, 'te@G.d', '2019-03-11 17:00:48', 0, 0),
(93, 'suhendrajuniar@gmail.com', '2019-03-11 17:16:52', 0, 0),
(94, 'ulfaintania1@gmail.com', '2019-04-07 18:42:54', 0, 0),
(95, 'ulfaintania1@gmail.com', '2019-05-05 08:21:41', 0, 0),
(96, 'ulfaintania1@gmail.com', '2019-05-05 08:23:42', 0, 0),
(97, 'ulfa.intania.ramadhani@mail.ugm.ac.id', '2019-05-05 08:25:08', 0, 0),
(98, 'ulfaintania1@gmail.com', '2019-05-05 08:28:13', 0, 0),
(99, 'ulfaintania1@gmail.com', '2019-05-05 08:34:31', 0, 0),
(100, 'ulfaintania1@gmail.com', '2019-05-05 18:51:27', 0, 0),
(101, 'ulfaintania1@gmail.com', '2019-05-07 08:58:58', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `tag_seo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `tag_name`, `tag_seo`) VALUES
(35, 'kaligrafi arab', 'kaligrafi-arab'),
(36, 'advantage', 'advantage'),
(37, 'healthy', 'healthy'),
(38, 'company', 'company'),
(39, 'information', 'information'),
(40, 'consulting', 'consulting'),
(41, 'design', 'design'),
(42, 'gamatechno', 'gamatechno'),
(43, 'smart city', 'smart-city'),
(44, 'indonesia pintar', 'indonesia-pintar'),
(46, 'berita satu', 'berita-satu');

-- --------------------------------------------------------

--
-- Table structure for table `tag_news`
--

CREATE TABLE `tag_news` (
  `id_tagnews` int(11) NOT NULL,
  `fk_id_tag` int(11) NOT NULL,
  `fk_id_news` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag_news`
--

INSERT INTO `tag_news` (`id_tagnews`, `fk_id_tag`, `fk_id_news`) VALUES
(1, 25, 1),
(2, 26, 2),
(3, 27, 3),
(4, 29, 4),
(10, 42, 13),
(11, 43, 12),
(12, 43, 11),
(13, 44, 10),
(14, 39, 5),
(23, 47, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tag_service`
--

CREATE TABLE `tag_service` (
  `id_tagservice` int(11) NOT NULL,
  `fk_id_service` int(11) NOT NULL,
  `fk_id_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag_service`
--

INSERT INTO `tag_service` (`id_tagservice`, `fk_id_service`, `fk_id_tag`) VALUES
(6, 5, 29),
(10, 6, 29),
(11, 6, 26),
(12, 7, 33),
(15, 2, 33),
(16, 2, 40),
(21, 1, 41),
(31, 3, 39);

-- --------------------------------------------------------

--
-- Table structure for table `tag_staticpage`
--

CREATE TABLE `tag_staticpage` (
  `id_staticpage` int(11) NOT NULL,
  `fk_id_tag` int(11) NOT NULL,
  `fk_id_page` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag_staticpage`
--

INSERT INTO `tag_staticpage` (`id_staticpage`, `fk_id_tag`, `fk_id_page`) VALUES
(3, 27, 53),
(5, 33, 55),
(31, 29, 57),
(32, 36, 57),
(33, 29, 56),
(34, 37, 56),
(39, 29, 58),
(56, 45, 51),
(60, 45, 52),
(61, 29, 54),
(62, 38, 54),
(63, 47, 59);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `video_title` varchar(255) NOT NULL,
  `link_embed` varchar(255) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `is_deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `video_title`, `link_embed`, `status`, `is_deleted`) VALUES
(12, 'How To Build Startup', '<iframe width=\"100%\" height=\"504\" src=\"https://www.youtube.com/embed/7tz4Ya6gzG4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Y', 0),
(16, 'Academic Management System', '<iframe width=\"914\" height=\"514\" src=\"https://www.youtube.com/embed/TtPLeztfx9o\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'N', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `default_group`
--
ALTER TABLE `default_group`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `default_group_menu`
--
ALTER TABLE `default_group_menu`
  ADD KEY `menuId` (`menuId`),
  ADD KEY `groupId` (`groupId`);

--
-- Indexes for table `default_group_page`
--
ALTER TABLE `default_group_page`
  ADD KEY `pageId` (`pageId`),
  ADD KEY `groupId` (`groupId`);

--
-- Indexes for table `default_menu`
--
ALTER TABLE `default_menu`
  ADD PRIMARY KEY (`menuId`),
  ADD KEY `menuDefaultPage` (`menuDefaultPage`);

--
-- Indexes for table `default_page`
--
ALTER TABLE `default_page`
  ADD PRIMARY KEY (`pageId`);

--
-- Indexes for table `default_user`
--
ALTER TABLE `default_user`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `identity`
--
ALTER TABLE `identity`
  ADD PRIMARY KEY (`id_identity`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id_link`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`pengunjung_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `static_page`
--
ALTER TABLE `static_page`
  ADD PRIMARY KEY (`id_page`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id_subscribe`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `tag_news`
--
ALTER TABLE `tag_news`
  ADD PRIMARY KEY (`id_tagnews`);

--
-- Indexes for table `tag_service`
--
ALTER TABLE `tag_service`
  ADD PRIMARY KEY (`id_tagservice`);

--
-- Indexes for table `tag_staticpage`
--
ALTER TABLE `tag_staticpage`
  ADD PRIMARY KEY (`id_staticpage`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `default_group`
--
ALTER TABLE `default_group`
  MODIFY `groupId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `default_menu`
--
ALTER TABLE `default_menu`
  MODIFY `menuId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `default_page`
--
ALTER TABLE `default_page`
  MODIFY `pageId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `default_user`
--
ALTER TABLE `default_user`
  MODIFY `userId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `identity`
--
ALTER TABLE `identity`
  MODIFY `id_identity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `pengunjung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=978;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `static_page`
--
ALTER TABLE `static_page`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id_subscribe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tag_news`
--
ALTER TABLE `tag_news`
  MODIFY `id_tagnews` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tag_service`
--
ALTER TABLE `tag_service`
  MODIFY `id_tagservice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tag_staticpage`
--
ALTER TABLE `tag_staticpage`
  MODIFY `id_staticpage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `default_group_menu`
--
ALTER TABLE `default_group_menu`
  ADD CONSTRAINT `default_group_menu_ibfk_1` FOREIGN KEY (`menuId`) REFERENCES `default_menu` (`menuId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `default_group_menu_ibfk_2` FOREIGN KEY (`groupId`) REFERENCES `default_group` (`groupId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `default_group_page`
--
ALTER TABLE `default_group_page`
  ADD CONSTRAINT `default_group_page_ibfk_1` FOREIGN KEY (`pageId`) REFERENCES `default_page` (`pageId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `default_group_page_ibfk_2` FOREIGN KEY (`groupId`) REFERENCES `default_group` (`groupId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `default_menu`
--
ALTER TABLE `default_menu`
  ADD CONSTRAINT `default_menu_ibfk_2` FOREIGN KEY (`menuDefaultPage`) REFERENCES `default_page` (`pageId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
