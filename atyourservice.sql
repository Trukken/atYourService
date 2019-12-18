-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 18, 2019 at 08:02 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atyourservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `banned` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_service_id_foreign` (`service_id`),
  KEY `comments_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_05_115514_create_services_table', 1),
(3, '2019_12_05_115628_create_comments_table', 1),
(4, '2019_12_05_160255_create_sessions_table', 1),
(5, '2019_12_11_103644_create_reports_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `report_reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `handled` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reports_service_id_foreign` (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `service_id`, `report_reason`, `handled`, `created_at`, `updated_at`) VALUES
(1, 1, 'Was really rude when we first met!', 0, NULL, NULL),
(2, 1, 'Please check.', 1, NULL, '2019-12-17 15:55:50'),
(3, 2, 'gidshisagdhasgddsahjdgsaj.', 1, NULL, '2019-12-17 15:55:43'),
(4, 2, 'Too smelly.', 0, NULL, NULL),
(5, 3, 'Was lying about his prices.', 1, NULL, '2019-12-17 15:55:46'),
(6, 4, '', 0, NULL, NULL),
(7, 10, 'dsfdsdsf', 0, '2019-12-17 10:25:57', '2019-12-17 10:25:57'),
(8, 1, 'jhfjsadhfaghjagjasd', 1, '2019-12-17 10:30:11', '2019-12-17 15:55:48'),
(9, 1, 'jhfjsadhfaghjagjasd', 1, '2019-12-17 10:32:47', '2019-12-17 15:55:37'),
(10, 1, 'dsgahdsdadsvdasdsdsdsds', 0, '2019-12-17 10:34:01', '2019-12-17 10:34:01'),
(11, 1, 'jhfjsadhfaghjagjasd', 0, '2019-12-17 10:35:13', '2019-12-17 10:35:13'),
(12, 7, 'He is a really naughty boy', 1, '2019-12-17 14:05:10', '2019-12-17 15:54:59'),
(13, 25, '4447444', 0, '2019-12-17 15:47:32', '2019-12-17 15:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` varchar(3000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `banned` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `short_description`, `long_description`, `user_id`, `banned`, `created_at`, `updated_at`) VALUES
(1, 'Plumber', 'Offering plumber services.', 'Hey, I am from Luxembourg and I am offering my plumbing services for a reasonable price.', 2, 0, NULL, NULL),
(2, 'Developer', 'I will develop your web application.', 'Hey, I am John and I will develop any web based application for you, I use PHP and JS.', 2, 0, NULL, NULL),
(3, 'Driver', 'Best driver ever.', 'Hello! I will drive you wherever in Luxembourg or it\'s vicinity.', 3, 0, NULL, NULL),
(4, 'Truck driver', 'Looking to take international deliveries.', 'Hola! I am looking to drive my truck all around Europe.', 4, 0, NULL, NULL),
(5, 'Electrician', 'I will fix stuff.', 'call me if you have broke down electronics i can fix it', 6, 0, NULL, NULL),
(6, 'Receptionist', 'I will wait for your costumers any time!', 'Hello! My name is Jane, I had worked with enterprises before such as BIL as a receptionist and they were content with me. I am looking for a new challenge at another company now.', 1, 0, NULL, NULL),
(7, 'Business manager', 'I will manage your business like no one else before.', 'Good day sir, I have 10 years of experience in my field, I have worked with numerous enterprises before such as BCEE and Weblogistics. I am looking for a new challenge now, give me a call if you are interested.', 2, 1, NULL, '2019-12-17 15:54:59'),
(27, 'Developer', 'I will develop your web application.', 'Hey, I am John and I will develop any web based application for you, I use PHP and JS.', 2, 0, NULL, NULL),
(25, 'Accountant', 'I will do you accounting for you!', 'Hey, my name is David and I will deal with your taxes fast and effectively.', 14, 0, '2019-12-17 14:13:11', '2019-12-18 06:55:21'),
(26, 'Plumber', 'Offering plumber services.', 'Hey, I am from Luxembourg and I am offering my plumbing services for a reasonable price.', 2, 0, NULL, NULL),
(24, 'Cook', 'I will cook the most delicious meals.', 'Hey! I am looking for clients who I can cook for. My prices are reasonable!', 13, 0, '2019-12-17 14:11:12', '2019-12-17 14:11:12'),
(22, 'Eceltrician', 'I will fix stuff.', 'call me if you have broke down electronics i can fix it', 6, 0, NULL, NULL),
(23, 'Receptionist', 'I will wait for your costumers any time!', 'Hello! My name is Jane, I had worked with enterprises before such as BIL as a receptionist and they were content with me. I am looking for a new challenge at another company now.', 1, 0, NULL, NULL),
(20, 'Driver', 'Best driver ever.', 'Hello! I will drive you wherever in Luxembourg or it\'s vicinity.', 3, 0, NULL, NULL),
(21, 'Truck driver', 'Looking to take international deliveries.', 'Hola! I am looking to drive my truck all around Europe.', 4, 0, NULL, NULL),
(19, 'Developer', 'I will develop your web application.', 'Hey, I am John and I will develop any web based application for you, I use PHP and JS.', 2, 0, NULL, NULL),
(18, 'Plumber', 'Offering plumber services.', 'Hey, I am from Luxembourg and I am offering my plumbing services for a reasonable price.', 2, 0, NULL, NULL),
(16, 'Cook', 'I will cook the most delicious meals.', 'Hey! I am looking for clients who I can cook for. My prices are reasonable!', 13, 0, '2019-12-17 14:11:12', '2019-12-17 14:11:12'),
(17, 'Accountant', 'I will do you accounting for you!', 'Hey, my name is David and I will deal with your taxes fast and effectively.', 14, 0, '2019-12-17 14:13:11', '2019-12-18 06:55:21'),
(28, 'Driver', 'Best driver ever.', 'Hello! I will drive you wherever in Luxembourg or it\'s vicinity.', 3, 0, NULL, NULL),
(29, 'Truck driver', 'Looking to take international deliveries.', 'Hola! I am looking to drive my truck all around Europe.', 4, 0, NULL, NULL),
(30, 'Eceltrician', 'I will fix stuff.', 'call me if you have broke down electronics i can fix it', 6, 0, NULL, NULL),
(31, 'Receptionist', 'I will wait for your costumers any time!', 'Hello! My name is Jane, I had worked with enterprises before such as BIL as a receptionist and they were content with me. I am looking for a new challenge at another company now.', 1, 0, NULL, NULL),
(32, 'Business manager', 'I will manage your business like no one else before.', 'Good day sir, I have 10 years of experience in my field, I have worked with numerous enterprises before such as BCEE and Weblogistics. I am looking for a new challenge now, give me a call if you are interested.', 2, 0, NULL, NULL),
(34, 'Accountant', 'I will do you accounting for you!', 'Hey, my name is David and I will deal with your taxes fast and effectively.', 14, 0, '2019-12-17 14:13:11', '2019-12-18 06:55:21'),
(35, 'Cook', 'I will cook the most delicious meals.', 'Hey! I am looking for clients who I can cook for. My prices are reasonable!', 13, 0, '2019-12-17 14:11:12', '2019-12-17 14:11:12'),
(36, 'Eceltrician', 'I will fix stuff.', 'call me if you have broke down electronics i can fix it', 6, 0, NULL, NULL),
(37, 'Receptionist', 'I will wait for your costumers any time!', 'Hello! My name is Jane, I had worked with enterprises before such as BIL as a receptionist and they were content with me. I am looking for a new challenge at another company now.', 1, 0, NULL, NULL),
(38, 'Driver', 'Best driver ever.', 'Hello! I will drive you wherever in Luxembourg or it\'s vicinity.', 3, 0, NULL, NULL),
(39, 'Truck driver', 'Looking to take international deliveries.', 'Hola! I am looking to drive my truck all around Europe.', 4, 0, NULL, NULL),
(40, 'Developer', 'I will develop your web application.', 'Hey, I am John and I will develop any web based application for you, I use PHP and JS.', 2, 0, NULL, NULL),
(41, 'Plumber', 'Offering plumber services.', 'Hey, I am from Luxembourg and I am offering my plumbing services for a reasonable price.', 2, 0, NULL, NULL),
(42, 'Cook', 'I will cook the most delicious meals.', 'Hey! I am looking for clients who I can cook for. My prices are reasonable!', 13, 0, '2019-12-17 14:11:12', '2019-12-17 14:11:12'),
(43, 'Accountant', 'I will do you accounting for you!', 'Hey, my name is David and I will deal with your taxes fast and effectively.', 14, 0, '2019-12-17 14:13:11', '2019-12-18 06:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified` tinyint(1) NOT NULL,
  `verification_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_reset` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `banned` tinyint(1) DEFAULT NULL,
  `reported` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified`, `verification_token`, `password`, `password_reset`, `phone_number`, `image`, `admin`, `banned`, `reported`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jane Doe', 'johndoe@mail.com', 0, NULL, '$2y$10$85EaL5UQ9qldySgJ8tfjXu4d4ayMDnoGGdC3lX9ppy7qdfXfYVZd.', NULL, '661666666', 'https://randomuser.me/api/portraits/men/29.jpg', 1, 0, 0, NULL, NULL, '2019-12-17 17:29:53'),
(2, 'John Doe', 'janedoe@mail.com', 0, NULL, '$2y$10$85EaL5UQ9qldySgJ8tfjXu4d4ayMDnoGGdC3lX9ppy7qdfXfYVZd.', NULL, '661666666', 'https://randomuser.me/api/portraits/men/29.jpg', 0, 0, 0, 'eAguUTvdy46TfXskdw8N5WiI95DfyDqdDICqv3ULxeCNQvO0PZa4elb7whfJ', NULL, NULL),
(3, 'Jérôme Plouffe', 'j.plouffe@mail.com', 0, NULL, '$2y$10$85EaL5UQ9qldySgJ8tfjXu4d4ayMDnoGGdC3lX9ppy7qdfXfYVZd.', NULL, '1111111', 'https://www.chinadaily.com.cn/celebrity/img/attachement/jpg/site1/20131211/001ec97909631412122b07.jpg', 0, 0, 0, NULL, NULL, NULL),
(4, 'Tristan Tourneur', 't.tourner@mail.com', 0, NULL, '$2y$10$85EaL5UQ9qldySgJ8tfjXu4d4ayMDnoGGdC3lX9ppy7qdfXfYVZd.', NULL, '661666666', 'https://ph-files.imgix.net/81c8176a-1b00-4f10-b60f-2ab2729d0a14', 0, 0, 0, NULL, NULL, NULL),
(5, 'Josselin Mace', 'j.mace@mail.com', 1, NULL, '$2y$10$85EaL5UQ9qldySgJ8tfjXu4d4ayMDnoGGdC3lX9ppy7qdfXfYVZd.', NULL, '787897987987', 'https://stackabuse.s3.amazonaws.com/media/introduction-to-gans-with-python-2.jpg', 0, 0, 0, NULL, NULL, NULL),
(6, 'Phil Boffrand', 's.layer@mail.com', 1, NULL, '$2y$10$85EaL5UQ9qldySgJ8tfjXu4d4ayMDnoGGdC3lX9ppy7qdfXfYVZd.', NULL, '999999', 'https://randomuser.me/api/portraits/men/29.jpg', 1, 0, 0, NULL, NULL, NULL),
(7, 'Nicolas Trottier', 'n.trotti@mail.com', 0, NULL, '$2y$10$85EaL5UQ9qldySgJ8tfjXu4d4ayMDnoGGdC3lX9ppy7qdfXfYVZd.', NULL, '661666666', 'https://randomuser.me/api/portraits/men/29.jpg', 0, 0, 0, NULL, NULL, NULL),
(8, 'Phil Vasseur', 'p.vasseur@mail.com', 1, NULL, '$2y$10$85EaL5UQ9qldySgJ8tfjXu4d4ayMDnoGGdC3lX9ppy7qdfXfYVZd.', NULL, '888888888', 'https://randomuser.me/api/portraits/men/29.jpg', 0, 0, 0, NULL, NULL, NULL),
(9, 'Szabolcs Tomolya', 'tomolya12@gmail.com', 1, NULL, '$2y$10$LNDtS8b7tRarPyRrRCEZUufJgQjlaCO0OGdkK1YK9cJx7kJT4m2m.', '1f269cf5145f7b6b133fc10d4802dc65acfac2011354871', '123', 'http://pixsector.com/cache/94bed8d5/av3cbfdc7ee86dab9a41d.png', 1, NULL, NULL, 'fCmXiB0AQqruN8ytrOKl5ibN1zm6JhmEB1a2b6RwxnsgMe8kx4TzrfVNZcme', '2019-12-17 13:59:13', '2019-12-17 14:04:21'),
(10, 'Ronald Rimo', 'zipudanav-2550@yopmail.com', 0, 'fd0b1619919d3ec5de58cad45573c7896256c582621211', '$2y$10$VCLwsnCXNbzSrdUfl8paL.ydzPzcTB7n5deOlVj3sW3eZW9X07pI.', NULL, '111', 'http://pixsector.com/cache/94bed8d5/av3cbfdc7ee86dab9a41d.png', NULL, NULL, NULL, NULL, '2019-12-17 14:07:08', '2019-12-17 14:07:08'),
(11, 'Leonardo Trelawney', 'javifawegu-7556@yopmail.com', 0, 'ae9896f223a2613bff6fb49a8ac21566477a7788644897', '$2y$10$QoxW50FesGz6qInsAw80..fA.7pPKlT/sRUCX0VCqS6ksPnK2Dwh6', NULL, '123', 'http://pixsector.com/cache/94bed8d5/av3cbfdc7ee86dab9a41d.png', NULL, NULL, NULL, NULL, '2019-12-17 14:08:04', '2019-12-17 14:08:04'),
(12, 'Henry Trelawney', 'winnakilej-4251@yopmail.com', 0, 'a196469405b401605f78684fb8ffe6a24a19dfca852366', '$2y$10$pERMjKKpBDxraee1SyeKLOnpVBRaRoFORtGIPpNyzbHaTH3eumEmK', NULL, '123', 'http://pixsector.com/cache/94bed8d5/av3cbfdc7ee86dab9a41d.png', NULL, NULL, NULL, NULL, '2019-12-17 14:08:36', '2019-12-17 14:08:36'),
(13, 'Eunice Mitchell', 'qittecicaki-6716@yopmail.com', 0, '34ac6e7f494f0ae2e7320df45a676407771b1975810637', '$2y$10$a3N8V/Zr3fwpzZR32U59fO4UOppeoSHBAcF/93I69mEtWFJ8SN3/6', NULL, '321321321', 'http://pixsector.com/cache/94bed8d5/av3cbfdc7ee86dab9a41d.png', NULL, NULL, NULL, NULL, '2019-12-17 14:10:32', '2019-12-17 14:10:32'),
(14, 'David Busch', 'ekisoto-9781@yopmail.com', 0, 'd90a9a8b85a4ff4f51c9f4a4aa7fd6efe45db996685486', '$2y$10$yJICjyw3aqY9KQ9ZOMzAr.YQyndVHkm4kTpxILyBiGKM6Jm286Zfi', NULL, '123', 'http://pixsector.com/cache/94bed8d5/av3cbfdc7ee86dab9a41d.png', NULL, 0, NULL, NULL, '2019-12-17 14:11:56', '2019-12-18 06:55:21'),
(15, 'Ji young', 'kuribocorriban@yahoo.de', 0, '74375cef3a4e45167340e502cf7b88c6ed03907e752603', '$2y$10$iM5vUtjjx04lIWX89apfJ.cfKDNywNVgRz4kOR4OKqeSgGa0HyuJG', 'b5e184f9b93b3b5a18092582c8f4fd896de0cba14881162', '123456789', 'http://pixsector.com/cache/94bed8d5/av3cbfdc7ee86dab9a41d.png', NULL, 0, NULL, NULL, '2019-12-17 15:34:12', '2019-12-17 15:47:04');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
