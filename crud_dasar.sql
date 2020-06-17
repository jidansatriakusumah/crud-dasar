-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2020 at 10:55 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_dasar`
--
CREATE DATABASE IF NOT EXISTS `crud_dasar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `crud_dasar`;

-- --------------------------------------------------------

--
-- Table structure for table `seluruh_data`
--

CREATE TABLE `seluruh_data` (
  `data_id` int(11) NOT NULL,
  `data_nama` varchar(255) NOT NULL,
  `data_alamat` varchar(500) NOT NULL,
  `data_asal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seluruh_data`
--

INSERT INTO `seluruh_data` (`data_id`, `data_nama`, `data_alamat`, `data_asal`) VALUES
(6, 'Alimudin', 'Panghegar, Bandung', 'Purwakarta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `seluruh_data`
--
ALTER TABLE `seluruh_data`
  ADD PRIMARY KEY (`data_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `seluruh_data`
--
ALTER TABLE `seluruh_data`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
