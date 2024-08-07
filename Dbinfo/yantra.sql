-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 02, 2024 at 08:50 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yantra`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `catID` int NOT NULL AUTO_INCREMENT,
  `catTitle` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `picFilename` varchar(266) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`catID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catID`, `catTitle`, `picFilename`) VALUES
(1, 'Premium Table', 'background.jpeg'),
(2, 'Window View Table', 'window.jpeg'),
(3, 'Couple Table', 'couple.jpg'),
(4, 'Family Table', 'family.jpg'),
(5, 'VIP Table', 'Tables.jpg'),
(6, 'Regular Table', 'download.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

DROP TABLE IF EXISTS `orderitems`;
CREATE TABLE IF NOT EXISTS `orderitems` (
  `orderItemID` int NOT NULL AUTO_INCREMENT,
  `orderFK` int NOT NULL,
  `seatItemFK` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`orderItemID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`orderItemID`, `orderFK`, `seatItemFK`) VALUES
(1, 1, 'P001'),
(2, 2, 'P002'),
(3, 3, 'P002'),
(4, 4, 'P002'),
(5, 5, 'W003'),
(6, 6, 'W003'),
(7, 7, 'W003'),
(8, 8, 'W002'),
(9, 10, 'P002'),
(10, 11, 'P002'),
(11, 12, 'P001'),
(12, 13, 'P005'),
(13, 14, 'P005'),
(14, 15, 'P004'),
(15, 16, 'P003'),
(16, 17, 'P005');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderID` int NOT NULL AUTO_INCREMENT,
  `userFK` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_date` date NOT NULL,
  `num_people` int NOT NULL,
  `special_requests` text,
  PRIMARY KEY (`orderID`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `userFK`, `orderDate`, `order_date`, `num_people`, `special_requests`) VALUES
(1, 'brandon', '2024-07-31 14:08:37', '2024-07-16', 2, 'allergic'),
(2, 'blackboi', '2024-07-31 14:11:00', '2024-07-17', 3, 'allergic to seafood'),
(3, 'blackboi', '2024-07-31 14:11:56', '2024-07-17', 3, 'allergic to seafood'),
(4, 'blackboi', '2024-07-31 14:12:07', '2024-07-17', 3, 'allergic to seafood'),
(5, 'blackboi', '2024-07-31 14:12:57', '2024-07-17', 8, 'allergic to seafooda'),
(6, '', '2024-08-01 09:32:20', '2024-08-21', 2, 'faefea'),
(16, 'blackboi', '2024-08-02 06:58:23', '2024-08-20', 8, 'FiX CSS DAMN IT'),
(17, 'blackboi', '2024-08-02 07:11:02', '2024-08-27', 4, 'iiihgggg'),
(10, 'blackboi', '2024-08-01 16:30:22', '2024-07-29', 3, 'im donneeee'),
(11, 'blackboi', '2024-08-01 16:30:42', '2024-07-29', 3, 'im donneeee'),
(12, 'blackboi', '2024-08-01 16:31:29', '2024-07-29', 3, 'im donneeee');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

DROP TABLE IF EXISTS `seat`;
CREATE TABLE IF NOT EXISTS `seat` (
  `itemID` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `categoryFK` int NOT NULL,
  PRIMARY KEY (`itemID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`itemID`, `title`, `categoryFK`) VALUES
('P001', 'Table for 2', 1),
('P002', 'Table for 4', 2),
('P003', 'Table for 10', 4),
('P004', 'Table for 2', 3),
('P005', 'Table for 4', 6),
('P006', 'Table for 10', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `password`, `mobile`, `email`) VALUES
('ahkow', 'password123', 11223344, 'ahkow@gmail.com'),
('blackboi', '12345678', 88066759, 'ksuren2806@gmail.com'),
('ahhh', '12345678', 88066759, 'ksuren2808@gmail.com'),
('blackboi123', '12345678', 88066759, 'ksuren2809@gmail.com'),
('aahuhuh', '12345678', 12345674, 'ksuren280622@gmail.com'),
('ahhhag', '12345678', 85733234, 'ksuren280w6@gmail.com'),
('mukesh ambani', '12345678', 82005531, 'arivukettamunram@gmail.com'),
('blackboi11', '12345678', 12345678, 'ksuren280q6@gmail.com'),
('blackboi34', '12345678', 12345678, 'ksuren28066@gmail.com'),
('kartik ', '12345678', 12345678, 'kartikloosukoodhi@gmail.com'),
('brandon', '12345678', 84880654, 'brandonlim9950@gmail.com'),
('blackboi2', '12345678', 88882222, 'ksuren280ww6@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
