-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2018 at 06:11 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `ordercart`
--

CREATE TABLE `ordercart` (
  `id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `chart` varchar(555) NOT NULL,
  `NameonCard` varchar(255) NOT NULL,
  `CardNumber` int(22) NOT NULL,
  `ExpirationDate` varchar(70) NOT NULL,
  `SecurityCode` int(11) NOT NULL,
  `HomeAddress` varchar(255) NOT NULL,
  `PaymenType` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordercart`
--

INSERT INTO `ordercart` (`id`, `UserID`, `chart`, `NameonCard`, `CardNumber`, `ExpirationDate`, `SecurityCode`, `HomeAddress`, `PaymenType`, `created_at`) VALUES
(8, 2, '3,7,8', 'Suleiman Mamman', 2147483647, '2018-06-13', 987, 'Port Harcourt Nigeria', 'MasterCard', '2018-06-21 18:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `color` text NOT NULL,
  `brand` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `price`, `image`, `color`, `brand`, `category`, `quantity`, `created_at`) VALUES
(3, 'Sandale', 89, 'adidas-originals-sandalen-schwarz-316836.jpg', 'Black', 'Adidas', 'Sports Wear', 93, '2018-06-20 13:35:35'),
(4, 'Polo shirt ', 79, 'adidas-originals-poloshirt-gruen-316854.jpg', 'Yellow', 'Nike', 'Casual Wear', 87, '2018-06-20 18:41:14'),
(5, 'Sneaker', 98, 'adidas-originals-sneaker-gruen-304205(1).jpg', 'Black', 'Adidas', 'Sports Wear', 89, '2018-06-20 18:44:46'),
(6, 'Uebergangs jacket', 67, 'adidas-originals-uebergangsjacke-grau-368730.jpg', 'White', 'Nike', 'Sports Wear', 45, '2018-06-20 18:48:37'),
(7, 'Sneaker', 77, 'adidas-originals-sneaker-schwarz-436928.jpg', 'Black', 'Adidas', 'Sports Wear', 79, '2018-06-20 18:50:45'),
(8, 'Tank Tops', 87, 'adidas-originals-tank-tops-weiss-304830.jpg', 'White', 'Nike', 'Casual Wear', 76, '2018-06-20 19:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `Email`, `password`, `created_at`) VALUES
(2, 'Suleiman Mamman', 'suleimamman@gmail.com', 'fiexNv10opckC5Jcn9RBreGfG+avIYqq1V3Js56A6SU=', '2018-06-19 13:19:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ordercart`
--
ALTER TABLE `ordercart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ordercart`
--
ALTER TABLE `ordercart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
