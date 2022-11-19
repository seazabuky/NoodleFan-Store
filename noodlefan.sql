-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 10:37 AM
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
(1, 'seazabuky1', '_LUA0354.JPG', '2022-11-14 22:28:36', '1', 'user', 'loremmmmmmmmmmmmmmmmm'),
(2, 'seazabuky1', '_LUA0874.JPG', '2022-11-14 22:28:41', '1', 'user', 'asdasdasdasdada'),
(3, 'seazabuky1', '000040.JPG', '2022-11-14 22:28:45', '1', 'user', 'afasdffsfsdfsfsdfsdfsd'),
(4, 'seazabuky1', 'IMG_2338.JPG', '2022-11-14 22:28:51', '1', 'user', ''),
(5, 'seazabuky1', 'IMG_3016.JPG', '2022-11-14 22:28:56', '1', 'user', ''),
(6, 'seazabuky1', 'IMG_7244.JPG', '2022-11-14 22:29:01', '1', 'user', ''),
(7, 'seazabuky1', 'LUA_9917.JPG', '2022-11-14 22:29:08', '1', 'user', ''),
(8, 'seazabuky1', 'LUA-24.JPG', '2022-11-14 22:29:15', '1', 'user', '');

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

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `username_req`, `status`, `approved_by`, `role_req`, `current_role`, `upload_on`, `file_name`) VALUES
(1, 'demo', b'1', 'seazabuky1', 'premium', 'user', '2022-11-17 18:35:13', 'C19FAC4D-84C2-4F28-9124-A7F7DA984BBE-min.jpg');

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
('demo', '$2y$10$bVZFqOatmKNlFTk2FpNZhO4ZgbypE0zJXxK8RcE8Z3JSzzc19n0r2', 'premium', 'demo@gmail.com'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;