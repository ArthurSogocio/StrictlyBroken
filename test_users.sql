-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 02, 2019 at 09:41 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `credit_transactions`
--

DROP TABLE IF EXISTS `credit_transactions`;
CREATE TABLE IF NOT EXISTS `credit_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `transaction_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction_comment` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit_transactions`
--

INSERT INTO `credit_transactions` (`id`, `user_id`, `amount`, `transaction_date`, `transaction_comment`) VALUES
(1, 1, 200, '2019-01-20 13:22:25', 'test fuckery'),
(2, 1, -20, '2019-01-20 13:22:36', NULL),
(3, 1, -34.5, '2019-01-20 13:22:45', NULL),
(4, 2, 350, '2019-01-20 13:23:05', NULL),
(5, 2, -90, '2019-01-20 13:23:12', 'fuck you'),
(6, 1, 7.5, '2019-01-20 13:23:27', 'dick'),
(7, 2, 35, '2019-01-20 13:23:34', NULL),
(8, 2, -280.3, '2019-01-20 13:23:50', NULL),
(9, 1, 20, '2019-01-21 13:59:03', 'this is a test'),
(10, 2, 323, '2019-01-21 13:59:30', 'this is also a test'),
(11, 2, -257, '2019-01-21 13:59:39', ''),
(12, 2, -257, '2019-01-21 14:05:12', ''),
(13, 2, 200, '2019-01-21 14:05:25', ''),
(14, 3, 200, '2019-01-21 14:09:37', 'hayeo'),
(15, 4, 800, '2019-01-21 14:11:52', ''),
(16, 5, -5, '2019-01-21 16:52:51', 'owes sumeet sharetea'),
(17, 4, -900, '2019-03-02 12:07:25', 'fuck you');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `creation_date`) VALUES
(1, 'Arthur', 'Sogocio', '2019-01-20 13:21:16'),
(2, 'Philip', 'Paik', '2019-01-20 13:22:56'),
(3, 'Takumi', 'Sakai', '2019-01-21 14:09:23'),
(4, 'Sumeet', 'Prasad', '2019-01-21 14:11:43'),
(5, 'Anthony', 'Tsang', '2019-01-21 16:52:32');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
