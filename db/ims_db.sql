-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2021 at 03:41 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `goods_table`
--

CREATE TABLE `goods_table` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goods_table`
--

INSERT INTO `goods_table` (`id`, `name`, `quantity`, `price`, `status`) VALUES
(8, 'Coke Kasalo', 10, 25, 1),
(9, 'Coke Mismo', 120, 10, 0),
(10, 'Pansit Canton Kalamansi', 22, 15, 1),
(11, 'Pansit Canton HotnSpicy', 25, 15, 1),
(12, 'Nissin Beef Ramen', 15, 13, 0),
(13, 'Kopiko Black - Twin Pack', 30, 12, 0),
(14, 'Kopiko Blanca - Twin Pack', 23, 12, 1),
(16, 'Safeguard Lemon', 15, 22, 0),
(17, 'Mantika Bottle', 15, 35, 0),
(20, 'Cheese Ring - Big', 5, 15, 0),
(21, 'Lucky Me Beef Spicy', 10, 10, 0),
(22, 'Surf Powder - Yellow', 20, 7, 0),
(23, 'Surf Fabricon - Red', 15, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invent_table`
--

CREATE TABLE `invent_table` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invent_table`
--

INSERT INTO `invent_table` (`id`, `product_id`, `name`, `quantity`, `total`, `date`, `time`) VALUES
(29, 19, 'Piatos Barbequue', 2, 52, '2021-04-02', '2021-04-02 04:52:28.098201'),
(30, 18, 'Chicharon ni Mang Juan - Pula', 1, 25, '2021-04-02', '2021-04-02 04:52:38.773852'),
(31, 14, 'Kopiko Blanca - Twin Pack', 2, 24, '2021-04-02', '2021-04-02 04:52:46.827833'),
(32, 10, 'Pansit Canton Kalamansi', 3, 45, '2021-04-02', '2021-04-02 04:53:02.413259'),
(34, 8, 'Coke Kasalo', 1, 25, '2021-04-02', '2021-04-02 04:55:10.043959'),
(35, 18, 'Chicharon ni Mang Juan - Pula', 2, 50, '2021-04-02', '2021-04-02 04:55:40.990995'),
(36, 8, 'Coke Kasalo', 1, 25, '2021-04-02', '2021-04-02 05:28:28.867220'),
(38, 19, 'Piatos Barbequue', 2, 52, '2021-04-05', '2021-04-04 23:00:23.543217'),
(39, 19, 'Piatos Barbequue', 1, 26, '2021-04-05', '2021-04-04 23:00:56.670045'),
(40, 18, 'Chicharon ni Mang Juan - Pula', 1, 25, '2021-04-24', '2021-04-24 00:27:56.390607'),
(41, 18, 'Chicharon ni Mang Juan - Pula', 1, 25, '2021-05-27', '2021-05-26 08:26:35.372977');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(300) NOT NULL,
  `status` varchar(55) NOT NULL,
  `admin_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `email`, `password`, `status`, `admin_level`) VALUES
(5, 'admin1231', 'admin@admin.com', '0192023a7bbd73250516f069df18b500', 'Super Administrator', 0),
(8, 'staff123', 'staff@staff.com', 'de9bf5643eabf80f4a56fda3bbb84483', 'Sales Staff', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goods_table`
--
ALTER TABLE `goods_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invent_table`
--
ALTER TABLE `invent_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `goods_table`
--
ALTER TABLE `goods_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `invent_table`
--
ALTER TABLE `invent_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
