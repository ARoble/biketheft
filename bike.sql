-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 22, 2020 at 08:35 AM
-- Server version: 8.0.15
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bike`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `badge_no` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `full_name`, `email`, `badge_no`, `password`, `date`) VALUES
(2, 'John Doe', 'johndoe@police.com', '188273', '$2y$10$EPKn8ZqRJADBzUg2Xrr1NubRjDP5SPVdREBax2nYxci5TtuapXyEC', '2020-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_register_bike`
--

DROP TABLE IF EXISTS `tb_register_bike`;
CREATE TABLE IF NOT EXISTS `tb_register_bike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `mpn` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `wheel` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `gears` varchar(255) NOT NULL,
  `brake` varchar(255) NOT NULL,
  `suspension` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `image` longtext NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_register_bike`
--

INSERT INTO `tb_register_bike` (`id`, `email`, `mpn`, `brand`, `model`, `type`, `wheel`, `color`, `gears`, `brake`, `suspension`, `gender`, `age`, `image`, `date`) VALUES
(7, 'johndoe@gmail.com', 'KUSH2', 'DiamondBack', 'S10', 'Mountain Bike', '20\"', 'black', '7', 'Hydraulic', 'Full', 'Female', '10-12', 'users/johndoe@gmail.com/71QdSN+qC3L._AC_SX425_.jpg', '2020-04-19'),
(8, 'johndoe@gmail.com', 'EGBIKE01', 'Raleigh', 'Motus', 'Electric Bike', '14\"', 'white', '6', 'Direct-Linear Pull', 'Front', 'Male', 'Adult', 'users/johndoe@gmail.com/41fhS0N+9RL._AC_SX355_.jpg', '2020-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_report_bike`
--

DROP TABLE IF EXISTS `tb_report_bike`;
CREATE TABLE IF NOT EXISTS `tb_report_bike` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `bike_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `date_stolen` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `info` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'under investigation',
  `reported_date` date NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_report_bike`
--

INSERT INTO `tb_report_bike` (`report_id`, `bike_id`, `user_email`, `date_stolen`, `location`, `lat`, `lng`, `info`, `status`, `reported_date`) VALUES
(2, 7, 'johndoe@gmail.com', '2020-03-01', ' 28 Tudor Ct N Wembley, England', 51.5524, -0.278391, 'Yeah', 'resolved', '2020-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hash` longtext NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `full_name`, `email`, `user_type`, `password`, `hash`, `date`) VALUES
(2, 'John Doe', 'johndoe@gmail.com', 'public', '$2y$10$a6k9QYFRuPI6ADKNlkngfuO2qhPq7hdMkIfupqiYPMQWVzOV25yHm', '63923f49e5241343aa7acb6a06a751e7', '2020-04-19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
