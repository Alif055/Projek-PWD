-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2025 at 06:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kamera`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(44) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`) VALUES
(1, 'test', '$2y$10$jmEpZa59Yl3njXKS8GSRsuqTR2Jwig5i/QShY39Cukc1e9ZTtvUrW'),
(2, 'dighea', '$2y$10$7wjNGfiekjwveoPBuZPf1ObZEg.DSyQ2AFIh6bKMRULp96s5YtfI6'),
(4, 'test2', '$2y$10$kxe41G5IOjY7qlRwQ9.fnuQP2YtHSnFQcvu5NRQc41PiWO4iQFl4C');

-- --------------------------------------------------------

--
-- Table structure for table `siap`
--

CREATE TABLE `siap` (
  `id` int(11) NOT NULL,
  `model` varchar(55) NOT NULL,
  `lensa` varchar(55) NOT NULL,
  `harga` int(44) NOT NULL,
  `image` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siap`
--

INSERT INTO `siap` (`id`, `model`, `lensa`, `harga`, `image`) VALUES
(1, 'Nikon D7500', '18-140mm', 75000, 'cams1.jpg'),
(2, 'Nikon D3200', '18-105mm', 35000, 'cams2.jpg'),
(3, 'Nikon Z5II', '24-200mm', 45000, 'cams3.jpg'),
(4, 'Nikon Z50II', '18-140mm', 35000, 'cams4.jpg'),
(5, 'Nikon Z8 ', '24-120mm', 30000, 'cams5.jpg'),
(6, 'Nikon D3500', '18-55mm', 20000, 'cams6.jpg'),
(7, 'Nikon Z7', '24-70mm', 25000, 'cams7.jpg'),
(8, 'Nikon D5600', '18-55mm', 25000, 'cams8.jpg'),
(9, 'Nikon D780', '24-120mm', 22000, 'cams9.jpg'),
(10, 'Nikon D7500', '18-55mm', 40000, 'cams10.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siap`
--
ALTER TABLE `siap`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siap`
--
ALTER TABLE `siap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
