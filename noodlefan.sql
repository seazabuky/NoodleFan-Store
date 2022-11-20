-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 02:09 PM
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
  `role_access` enum('user','premium','premium_p','commercial','admin') NOT NULL,
  `dis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `username`, `file_name`, `uploaded_on`, `status`, `role_access`, `dis`) VALUES
(1, 'seazabuky1', '_LUA0354.JPG', '2022-11-14 22:28:36', '1', 'user', ''),
(2, 'seazabuky1', '_LUA0874.JPG', '2022-11-14 22:28:41', '1', 'user', ''),
(3, 'seazabuky1', '000040.JPG', '2022-11-14 22:28:45', '1', 'user', ''),
(4, 'seazabuky1', 'IMG_2338.JPG', '2022-11-14 22:28:51', '1', 'user', ''),
(5, 'seazabuky1', 'IMG_3016.JPG', '2022-11-14 22:28:56', '1', 'user', ''),
(6, 'seazabuky1', 'IMG_7244.JPG', '2022-11-14 22:29:01', '1', 'user', ''),
(8, 'seazabuky1', 'LUA-24.JPG', '2022-11-14 22:29:15', '1', 'user', ''),
(9, 'admin', '_SAL7726.JPG', '2022-11-19 23:33:56', '1', 'premium_p', ''),
(10, 'admin', '_SAL9154.JPG', '2022-11-19 23:33:56', '1', 'premium_p', ''),
(11, 'admin', 'LUA_9514.JPG', '2022-11-19 23:33:56', '1', 'commercial', ''),
(12, 'admin', 'LUA_9832.JPG', '2022-11-19 23:33:56', '1', 'commercial', ''),
(13, 'admin', 'light.jpeg', '2022-11-20 05:23:22', '1', 'premium_p', ''),
(14, 'admin', 'pinkmoon2.png', '2022-11-20 05:23:22', '1', 'premium_p', ''),
(15, 'seazabuky1', '_MG_8753.jpeg', '2022-11-20 20:04:38', '1', 'user', ''),
(16, 'seazabuky1', '_MG_8682.jpeg', '2022-11-20 20:05:28', '1', 'commercial', ''),
(17, 'seazabuky1', '_DSC7557.JPG', '2022-11-20 20:05:28', '1', 'commercial', ''),
(18, 'seazabuky1', '_DSC8350.jpg', '2022-11-20 20:05:28', '1', 'commercial', ''),
(19, 'seazabuky1', '10773559312_IMG_3140.JPG', '2022-11-20 20:05:37', '1', 'premium', ''),
(20, 'seazabuky1', '10773730224_IMG_3141.JPG', '2022-11-20 20:05:37', '1', 'premium', ''),
(21, 'seazabuky1', '10773402640_IMG_3146.JPG', '2022-11-20 20:05:37', '1', 'premium', ''),
(22, 'seazabuky1', '10773694432_IMG_3189.JPG', '2022-11-20 20:05:37', '1', 'premium', ''),
(23, 'seazabuky1', '10773490176_IMG_3190.JPG', '2022-11-20 20:05:37', '1', 'premium', ''),
(24, 'seazabuky1', 'IMG_2508.JPG', '2022-11-20 20:06:15', '1', 'premium', ''),
(25, 'seazabuky1', 'IMG_2513.JPG', '2022-11-20 20:06:15', '1', 'premium', ''),
(26, 'seazabuky1', 'IMG_2512.JPG', '2022-11-20 20:06:15', '1', 'premium', ''),
(27, 'seazabuky1', 'IMG_2511.JPG', '2022-11-20 20:06:15', '1', 'premium', ''),
(28, 'seazabuky1', 'IMG_2515.JPG', '2022-11-20 20:06:15', '1', 'premium', ''),
(29, 'seazabuky1', '_DSC9239.JPG', '2022-11-20 20:07:03', '1', 'user', ''),
(30, 'seazabuky1', 'IMG_1644.JPG', '2022-11-20 20:07:03', '1', 'user', ''),
(31, 'seazabuky1', 'IMG_1652.jpg', '2022-11-20 20:07:03', '1', 'user', ''),
(32, 'seazabuky1', '_DSC3216.jpg', '2022-11-20 20:07:03', '1', 'user', ''),
(33, 'seazabuky1', 'IMG_2530.JPG', '2022-11-20 20:07:29', '1', 'user', ''),
(34, 'seazabuky1', '_DSC7589.jpg', '2022-11-20 20:08:02', '1', 'user', ''),
(35, 'seazabuky1', '_DSC7922.jpg', '2022-11-20 20:08:02', '1', 'user', ''),
(36, 'seazabuky1', '_DSC8920.jpg', '2022-11-20 20:08:02', '1', 'user', ''),
(37, 'seazabuky1', '_DSC8932.jpg', '2022-11-20 20:08:02', '1', 'user', ''),
(38, 'seazabuky1', 'C19FAC4D-84C2-4F28-9124-A7F7DA984BBE-min.jpg', '2022-11-20 20:08:02', '1', 'user', '');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `username_req` varchar(30) NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'0',
  `approved_by` varchar(30) DEFAULT NULL,
  `role_req` enum('user','premium','premium_p','commercial','admin') NOT NULL,
  `current_role` enum('user','premium','premium_p','commercial','admin') NOT NULL,
  `upload_on` datetime NOT NULL,
  `file_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('user','premium','premium_p','commercial','admin') NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `role`, `email`) VALUES
('admin', '$2y$10$I22FIZEPXaJDxilRuu/ysu12pb2MTyqaSQt0bmMH0v1W2hAyb3bPC', 'admin', 'admin@gmail.com'),
('commercial', '$2y$10$C6OT.yRTJ2UEdU/fWPupqOHKXEpk3OPvOR0FyVKwrOYFwhjBxqlgK', 'commercial', 'commercial@gmail.com'),
('premium', '$2y$10$GhTpH4yZhJpx9Che66SBJuOsaVuosh2b55dIAxl3UQd.QCThlJJOW', 'premium', 'premium@gmail.com'),
('premium_p', '$2y$10$Us7SAZjZ.BanZXeEHqC26.eEJp3F/r/wtSpDm3ZAYN7Y8IdkE0Zw6', 'premium_p', 'premium_p@gmail.com'),
('seazabuky1', '$2y$10$Te/MM2H8yl1G1DzIjTZ4hOKRJPDQZFhX8yJwX6UsnigUdqJeGfs72', 'admin', 'seazabuky@gmail.com'),
('user', '$2y$10$qGoT.qKhvrtmUC7ozOkv5efYYWk6JdHexTkR1JKriLt4rD0DwsJau', 'user', 'user@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
