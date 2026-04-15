-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2026 at 12:05 AM
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
-- Database: `olimp-gnf`
--

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `training_id` int(11) NOT NULL,
  `training_title` varchar(255) NOT NULL,
  `training_text` text NOT NULL,
  `training_price` decimal(10,2) NOT NULL,
  `training_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`training_id`, `training_title`, `training_text`, `training_price`, `training_image`) VALUES
(1, 'Dnevni trening', 'Članarina za jednodnevni trening u teretani koja omogućava pristup svim dostupnim spravama i prostorijama u okviru jednog dana korišćenja.', 500.00, '/olimp/public/images/1.webp'),
(2, 'Polumesečna članarina', 'Polumesečna članarina koja omogućava neograničen pristup teretani u trajanju od 15 dana, uz korišćenje svih sprava i trening zona.', 2500.00, '/olimp/public/images/2.webp'),
(3, 'Mesečna članarina do 15h', 'Mesečna članarina sa ograničenim terminom korišćenja do 15h, koja omogućava neograničen pristup teretani u okviru jutarnjih i ranih popodnevnih termina tokom 30 dana.', 3000.00, '/olimp/public/images/3.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_reg` datetime NOT NULL,
  `user_level` tinyint(3) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `date_reg`, `user_level`) VALUES
(1, 'user', 'user', '', '2025-03-05 11:16:36', 1),
(2, 'admin', 'admin', 'aleksa.spasa@gmail.com', '2025-03-05 11:17:04', 2),
(3, 'boban.rajovic', '123456', 'test@test.com', '2025-03-10 13:12:18', 1),
(4, 'darko.lazic', '123456', 'test1@test.com', '2025-03-10 13:15:42', 1),
(5, 'neda.ukraden', '123456', 'test@test123.com', '2025-03-10 13:54:42', 1),
(6, 'djani', '123456', 'test12@test12.com', '2025-03-10 14:10:54', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`training_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `training_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
