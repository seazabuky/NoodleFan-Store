-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 04:36 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noodlefan`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `role_access` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `username`, `file_name`, `uploaded_on`, `status`, `role_access`) VALUES
(1, 'seazabuky1', '_LUA0354.JPG', '2022-11-14 22:28:36', '1', 'user'),
(2, 'seazabuky1', '_LUA0874.JPG', '2022-11-14 22:28:41', '1', 'user'),
(3, 'seazabuky1', '000040.JPG', '2022-11-14 22:28:45', '1', 'user'),
(4, 'seazabuky1', 'IMG_2338.JPG', '2022-11-14 22:28:51', '1', 'user'),
(5, 'seazabuky1', 'IMG_3016.JPG', '2022-11-14 22:28:56', '1', 'user'),
(6, 'seazabuky1', 'IMG_7244.JPG', '2022-11-14 22:29:01', '1', 'user'),
(7, 'seazabuky1', 'LUA_9917.JPG', '2022-11-14 22:29:08', '1', 'user'),
(8, 'seazabuky1', 'LUA-24.JPG', '2022-11-14 22:29:15', '1', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
