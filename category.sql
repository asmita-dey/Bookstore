-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 19, 2022 at 05:50 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstoredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `book_isbn` varchar(20) NOT NULL,
  `category` varchar(30) NOT NULL,
  `genre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`book_isbn`, `category`, `genre`) VALUES
('978-0-321-94786-4', 'Best seller', 'Web/App development'),
('978-0-7303-1484-4', 'Best seller', 'Others'),
('978-1-118-94924-5', 'Recommended', 'Hardware/Networking'),
('978-1-1180-2669-4', 'Recommended', 'Coding'),
('978-1-44937-019-0', 'Recommended', 'Web/App development'),
('978-1-484216-40-8', 'Limited edition', 'Web/App Development'),
('978-1-44937-075-6', 'None', 'Coding'),
('978-1-4571-0402-2', 'None', 'Web/App development'),
('978-1-484217-26-9', 'Best Seller', 'Coding');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
