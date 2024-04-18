-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 12:07 PM
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
-- Database: `db_chatbot`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add`
--

CREATE TABLE `tbl_add` (
  `id` int(50) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `description` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_add`
--

INSERT INTO `tbl_add` (`id`, `keyword`, `description`) VALUES
(12, 'Mobile', 'A mobile developer is a professional software engineer who specialises in designing, building, and maintaining applications for mobile devices. They leverage their expertise in programming languages such as Java, Swift, or Flutter to code and create apps for your Android or iPhone (more on this later).'),
(13, 'Onam', 'Onam is an annual Indian harvest and cultural festival related to Hinduism celebrated mostly by the people of Kerala. '),
(14, 'Christmas', 'Christmas is a Christian festival that celebrates the birth of Jesus Christ, who Christians believe was the son of God.'),
(15, 'Eid', 'Ramadan 2023 began on Thursday, March 23, with Muslims fasting until Eid al-Fitr which took place from Thursday, April 23, until Friday, April 24. However, many may not be aware that there are, in fact, two Eids every year.'),
(16, 'Flutter', 'A Flutter developer is a software engineer who has proficiency with the Flutter framework to develop mobile, web, and desktop applications.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history`
--

CREATE TABLE `tbl_history` (
  `id` int(100) NOT NULL,
  `user_message` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_history`
--

INSERT INTO `tbl_history` (`id`, `user_message`, `user_id`) VALUES
(73, 'onam', '21'),
(74, 'Eid', '22'),
(75, 'onam', '22'),
(76, 'What is onam', '22'),
(77, 'onam', '21'),
(78, 'onam', '21'),
(79, 'onam', '22'),
(80, 'eid', '22'),
(81, 'onam', '21'),
(82, 'flutter', '21'),
(83, 'flutter', '21'),
(84, 'flutter', '21'),
(85, 'flutter', '21'),
(86, 'flutter', '21'),
(87, 'flutter', '21'),
(88, 'flutter', '21'),
(89, 'What is mobile', '21'),
(90, 'flutter', '21'),
(91, 'christmas', '21'),
(92, 'christmas', '21'),
(93, 'christmas', '21'),
(94, 'what is onam', '21'),
(95, 'What is onam', '21'),
(96, 'What is flutter', '21'),
(97, 'why is flutter', '21'),
(98, 'What is EId', '21'),
(99, 'eid', '26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'Normal',
  `category` varchar(50) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `password`, `user_type`, `category`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', '123', 'admin', 'admin', 0),
(21, 'Benson', 'benson@gmail.com', '123', 'Premium', 'user', 1),
(22, 'Joyal', 'joyal@gmail.com', '456', 'Normal', 'user', 0),
(26, 'Renuu', 'renu@gmail.com', '741', 'Premium', 'user', 1),
(27, 'hii', 'hi@gmail.com', '789', 'Normal', 'user', 0),
(28, 'fox', 'fox@gmail.com', '369', 'Normal', 'user', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_add`
--
ALTER TABLE `tbl_add`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_history`
--
ALTER TABLE `tbl_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_add`
--
ALTER TABLE `tbl_add`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_history`
--
ALTER TABLE `tbl_history`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
