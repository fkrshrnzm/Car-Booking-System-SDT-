-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 05:27 AM
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
-- Database: `db_cbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `b_id` int(11) NOT NULL,
  `b_customer` varchar(20) NOT NULL,
  `b_vehicle` varchar(20) NOT NULL,
  `b_pickupdate` date NOT NULL,
  `b_returndate` date NOT NULL,
  `b_totalprice` decimal(9,2) NOT NULL,
  `b_status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`b_id`, `b_customer`, `b_vehicle`, `b_pickupdate`, `b_returndate`, `b_totalprice`, `b_status`) VALUES
(1, '010203048976', 'VDY911', '2022-11-09', '2022-11-17', '500.00', 2),
(2, '010203048976', 'VDY911', '2022-11-19', '2022-11-20', '150.00', 2),
(3, 'ssssssss', 'PPP999', '2022-11-23', '2022-11-24', '200000.00', 3),
(4, 'ssssssss', 'PPP999', '2022-11-25', '2022-11-28', '600000.00', 1),
(5, 'ssssssss', 'JQW123', '2022-12-03', '2022-12-05', '180000.00', 2),
(6, 'ssssssss', 'MAR9868', '2022-12-01', '2022-12-03', '60000.00', 1),
(8, 'aaaaaaa', 'VDY911', '2023-02-02', '2023-12-12', '9999999.99', 1),
(9, 'aaaaaaa', 'AKQ9955', '2022-12-01', '2022-12-03', '156000.00', 1),
(10, 'aaaaaaa', 'AKQ9955', '2022-12-01', '2022-12-03', '156000.00', 1),
(11, 'aaaaaaa', 'PPP999', '2022-12-08', '2022-12-09', '200000.00', 1),
(12, 'aaaaaaa', 'PPP999', '2022-12-04', '2022-12-06', '400000.00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `s_id` int(5) NOT NULL,
  `s_desc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`s_id`, `s_desc`) VALUES
(1, 'Received'),
(2, 'Approved'),
(3, 'Rejected'),
(4, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `u_id` varchar(15) NOT NULL COMMENT 'user_id',
  `u_pwd` varchar(50) NOT NULL COMMENT 'user_password',
  `u_name` varchar(200) NOT NULL COMMENT 'user_name',
  `u_address` varchar(200) DEFAULT NULL COMMENT 'user_address',
  `u_phone` varchar(20) NOT NULL COMMENT 'user_phone_number',
  `u_license` varchar(15) NOT NULL COMMENT 'user_license',
  `u_type` varchar(2) NOT NULL COMMENT 'user_type'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`u_id`, `u_pwd`, `u_name`, `u_address`, `u_phone`, `u_license`, `u_type`) VALUES
('010203048976', '123456789', 'Harith Hakim Bin Othman', 'Blok MA1, KTDI', '012-1346789', 'L002', '2'),
('020419019876', '123456789', 'Muhammad Amir Jamay Bin Jamlus', 'Blok MA1, KTDI.', '012-3456789', 'L001', '1'),
('aaaaaaa', 'aaaa', 'aaaaaaa', 'aaaaa', 'aaaaaa', 'aaaaa', '2'),
('ssssssss', 'ssss', 'zaim ros', 'sssss', 'sssss', 'ssss', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_usertype`
--

CREATE TABLE `tb_usertype` (
  `ut_id` varchar(5) NOT NULL,
  `ut_desc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_usertype`
--

INSERT INTO `tb_usertype` (`ut_id`, `ut_desc`) VALUES
('1', 'Admin'),
('2', 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_vehicle`
--

CREATE TABLE `tb_vehicle` (
  `vh_registration` varchar(20) NOT NULL,
  `vh_type` varchar(15) NOT NULL,
  `vh_model` varchar(15) NOT NULL,
  `vh_year` year(4) NOT NULL,
  `vh_price` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_vehicle`
--

INSERT INTO `tb_vehicle` (`vh_registration`, `vh_type`, `vh_model`, `vh_year`, `vh_price`) VALUES
('AKQ9955', 'Compact', 'Perodua Myvi', 2020, '78000.00'),
('JQW123', 'SUV', 'Honda HRV', 2020, '90000.00'),
('MAR9868', '4x4', 'Pajero', 2010, '30000.00'),
('PPP999', 'SUV', 'Porsche Careira', 2018, '200000.00'),
('VDY911', 'Compact', 'Perodua Axia', 2019, '70000.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `b_customer` (`b_customer`),
  ADD KEY `b_vehicle` (`b_vehicle`),
  ADD KEY `b_status` (`b_status`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `u_type` (`u_type`);

--
-- Indexes for table `tb_usertype`
--
ALTER TABLE `tb_usertype`
  ADD KEY `ut_id` (`ut_id`);

--
-- Indexes for table `tb_vehicle`
--
ALTER TABLE `tb_vehicle`
  ADD PRIMARY KEY (`vh_registration`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD CONSTRAINT `tb_booking_ibfk_1` FOREIGN KEY (`b_customer`) REFERENCES `tb_users` (`u_id`),
  ADD CONSTRAINT `tb_booking_ibfk_2` FOREIGN KEY (`b_vehicle`) REFERENCES `tb_vehicle` (`vh_registration`),
  ADD CONSTRAINT `tb_booking_ibfk_3` FOREIGN KEY (`b_status`) REFERENCES `tb_status` (`s_id`);

--
-- Constraints for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `tb_users_ibfk_1` FOREIGN KEY (`u_type`) REFERENCES `tb_usertype` (`ut_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
