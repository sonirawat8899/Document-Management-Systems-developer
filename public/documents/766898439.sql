-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 28, 2023 at 05:07 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dms_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_name` varchar(150) DEFAULT NULL,
  `description` text,
  `slug` varchar(150) DEFAULT NULL,
  `admin_id` int NOT NULL,
  `manager_d` int DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `description`, `slug`, `admin_id`, `manager_d`, `status`, `created_at`, `update_at`) VALUES
(1, 'alpha', NULL, NULL, 0, 26, 0, '2023-08-05 07:41:35', '2023-08-05 07:41:35'),
(2, 'Pmr', '<p><strong>fffffff</strong></p>', NULL, 0, 25, 1, '2023-08-08 09:46:13', '2023-08-08 09:46:13'),
(3, 'aaaaa', NULL, NULL, 25, 32, 0, '2023-08-09 09:28:49', '2023-08-09 09:28:49'),
(4, 'con sss', '<p>dfgdfgdf</p>', NULL, 25, 32, 0, '2023-08-23 10:26:23', '2023-08-23 10:26:23'),
(5, 'sss hhh', '<p>drgrtghrtygr</p>', 'con-sss', 25, 34, 0, '2023-08-23 10:40:58', '2023-08-23 10:40:58'),
(8, 'cn sss', '<p>vgdfsdsfsf</p>', 'cn-sss', 25, 35, 0, '2023-08-23 11:37:50', '2023-08-23 11:37:50'),
(9, 'con sss', '<p>dvdfss</p>', 'con-sss', 25, 32, 0, '2023-08-23 12:06:22', '2023-08-23 12:06:22'),
(10, 'con sss', NULL, 'con-sss', 25, 32, 0, '2023-08-23 12:06:47', '2023-08-23 12:06:47'),
(11, 'dfgdfg', '<p>fgdfg</p>', 'dfgdfg', 25, 32, 0, '2023-08-23 12:12:06', '2023-08-23 12:12:06'),
(12, 'asdsad dfgdfgd', '<p>sdfsdfdsf</p>', 'asdsad-dfgdfgd', 25, 25, 0, '2023-08-23 12:32:10', '2023-08-23 12:32:10'),
(13, 'con fgfghfh', '<p>sfdsf</p>', 'con-fgfghfh', 25, 37, 1, '2023-08-23 12:37:07', '2023-08-23 12:37:07');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
