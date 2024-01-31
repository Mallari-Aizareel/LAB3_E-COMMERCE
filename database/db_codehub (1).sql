-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 04:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_codehub`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `image` blob NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `price`) VALUES
(9, 0x2e2e2f75706c6f6164732f666f6f64696573666565642e636f6d5f63686f636f6c6174652d636869702d636f6f6b6965732d776974682d6f72616e67652d6d61726d616c6164652e6a7067, 'Chocolate Chip Delight', '199.99'),
(10, 0x2e2e2f75706c6f6164732f666f6f64696573666565642e636f6d5f62616e616e612d6f61742d63686f636f6c6174652d636f6f6b6965732e6a7067, 'Vanilla Bliss', '199.99'),
(11, 0x2e2e2f75706c6f6164732f666f6f64696573666565642e636f6d5f63686f636f6c6174652d6372616e62657272792d636f6f6b6965732e6a7067, 'Caramel Swirl', '199.99'),
(12, 0x2e2e2f75706c6f6164732f666f6f64696573666565642e636f6d5f7065616e75742d6275747465722d63686f636f6c6174652d636869702d636f6f6b6965732e6a7067, 'Minty Fresh', '199.99'),
(13, 0x2e2e2f75706c6f6164732f666f6f64696573666565642e636f6d5f636f6f6b6965732d746f7765722e6a7067, 'Fruity Fusion', '199.99');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'aiza@admin', '$2y$10$WzRp7T/ZuatCvtbl260f8ubPN5pWxpTEgaImJOWiHi.zPrhtag6fq'),
(5, 'cecil@admin', '123'),
(6, 'ha', '$2y$10$/GGbh8OisUj.JzlAr5ezv.9V4Rx.YurkAKYDLJeVT8/YrMiUXbqb2');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
