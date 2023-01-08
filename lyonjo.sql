-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 10:53 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lyonjo`
--

-- --------------------------------------------------------

--
-- Table structure for table `shop_details`
--

CREATE TABLE `shop_details` (
  `id` int(11) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `shop_phone` varchar(50) NOT NULL,
  `shop_location` varchar(50) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop_details`
--

INSERT INTO `shop_details` (`id`, `shop_name`, `shop_phone`, `shop_location`, `seller_id`) VALUES
(7, 'shop', '07901525557', 'amman', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `type` enum('buyer','seller') NOT NULL DEFAULT 'buyer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `type`) VALUES
(7, 'muna', 'muna@yahoo.com', 'aaaaaa', '1672854454-woman.jpg', 'seller'),
(8, 'majd', 'majd.jalshanteer@gmail.com', '123123123', '1672861726-Plant-A-Tree-Banner-Image1-1-min.jpg', 'seller');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shop_details`
--
ALTER TABLE `shop_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_id` (`seller_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shop_details`
--
ALTER TABLE `shop_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `shop_details`
--
ALTER TABLE `shop_details`
  ADD CONSTRAINT `shop_details_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
