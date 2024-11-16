-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2024 at 02:59 AM
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
-- Database: `new_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `receiver`
--

CREATE TABLE `receiver` (
  `id` int(11) NOT NULL,
  `jang` varchar(255) DEFAULT NULL,
  ` recv_date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `num` int(50) NOT NULL,
  `home` varchar(50) NOT NULL,
  `soy` varchar(50) NOT NULL,
  `tambon` varchar(255) NOT NULL,
  `aum` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receiver`
--

INSERT INTO `receiver` (`id`, `jang`, ` recv_date`, `name`, `num`, `home`, `soy`, `tambon`, `aum`) VALUES
(1, 'กรุงเทพ', '2024-11-28', 'ไม่มี', 145, 'ไม่รุ้', 'ไม่บอก', 'เมือง', 'เมือง');

-- --------------------------------------------------------

--
-- Table structure for table `sender`
--

CREATE TABLE `sender` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `num` varchar(50) NOT NULL,
  `home` varchar(255) NOT NULL,
  `soy` varchar(255) DEFAULT NULL,
  `tambon` varchar(255) DEFAULT NULL,
  `aum` varchar(255) DEFAULT NULL,
  `jang` varchar(255) DEFAULT NULL,
  `send_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sender`
--

INSERT INTO `sender` (`id`, `name`, `num`, `home`, `soy`, `tambon`, `aum`, `jang`, `send_date`) VALUES
(3, 'โม', '123', 'ไม่มี', 'มี', 'ไม่บอก', 'ไม่บอก', 'กรุงธน', '2547-01-02'),
(4, 'โม', '123', 'ไม่มี', 'มี', 'ไม่บอก', 'ไม่บอก', 'กรุงธน', '2547-01-02'),
(5, 'โม', '123', 'ไม่มี', 'มี', 'ไม่บอก', 'ไม่บอก', 'กรุงธน', '2547-01-02'),
(6, 'โม', '123', 'ไม่มี', 'มี', 'ไม่บอก', 'ไม่บอก', 'กรุงธน', '2547-01-02'),
(7, 'โม', '123', 'ไม่มี', 'มี', 'ไม่บอก', 'ไม่บอก', 'กรุงธน', '2547-01-02'),
(8, 'โม', '123', 'ไม่มี', 'มี', 'ไม่บอก', 'ไม่บอก', 'กรุงธน', '2547-01-02'),
(9, 'โม', '123', 'ไม่มี', 'มี', 'ไม่บอก', 'ไม่บอก', 'กรุงธน', '2547-01-02'),
(10, 'โม', '123', 'ไม่มี', 'มี', 'ไม่บอก', 'ไม่บอก', 'กรุงธน', '2547-01-02'),
(11, 'โม', '123', 'ไม่มี', 'มี', 'ไม่บอก', 'ไม่บอก', 'กรุงธน', '2547-01-02'),
(12, 'โม', '123', 'ไม่มี', 'มี', 'ไม่บอก', 'ไม่บอก', 'กรุงธน', '2547-01-02'),
(13, 'โม', '123', 'ไม่มี', 'มี', 'ไม่บอก', 'ไม่บอก', 'กรุงธน', '0000-00-00'),
(14, 'โม', '123', 'ไม่มี', 'มี', 'ไม่บอก', 'ไม่บอก', 'กรุงธน', '0000-00-00'),
(15, 'โม', '123', 'ไม่มี', 'มี', 'ไม่บอก', 'ไม่บอก', 'กรุงธน', '0000-00-00'),
(17, 'โม', '123', 'ไม่มี', 'มี', 'ไม่บอก', 'ไม่บอก', 'กรุงธน', '0000-00-00'),
(18, 'โม', '123', 'ไม่มี', 'มี', 'ไม่บอก', 'ไม่บอก', 'กรุงธน', '0000-00-00'),
(19, 'โม', '123', 'ไม่มี', 'มี', 'ไม่บอก', 'ไม่บอก', 'กรุงธน', '0000-00-00'),
(20, 'โม', '123', 'ไม่มี', 'มี', 'ไม่บอก', 'ไม่บอก', 'กรุงธน', '0000-00-00'),
(21, 'casdc', '545แ', 'กหแกห', 'กแหกแ', 'แหกแป', 'กหแหกแ', 'กหแหกแ', '2024-11-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sender`
--
ALTER TABLE `sender`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `receiver`
--
ALTER TABLE `receiver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sender`
--
ALTER TABLE `sender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
