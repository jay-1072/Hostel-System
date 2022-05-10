-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 07, 2022 at 10:12 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel-portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `warden_login`
--

DROP TABLE IF EXISTS `warden_login`;
CREATE TABLE IF NOT EXISTS `warden_login` (
  `username` varchar(254) NOT NULL,
  `password` char(80) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warden_login`
--

INSERT INTO `warden_login` (`username`, `password`, `email`) VALUES
('Prof. Navin Ganeshan', '$2y$10$G7RmpgXKH6mGFBbalLGtm.wPwpIXEO4vwVc2lCupxVFMbhmao4Po6', 'chimanbhaikoshti@gmail.com'),
('Prof. Ashish Patel', '$2y$10$DWB8k/5gwK0d6OIfliP/me0Gsy2iuNRGEcnmiY9LOD06rWyIDvgKa', 'chimanbhaikoshti@gmail.com'),
('Prof. Sunil Patel', '$2y$10$icsS3DwNefZngX5QW8a2euC07HflFB3iTRsU8bt8Nw.rAmAYu4fky', 'chimanbhaikoshti@gmail.com'),
('Prof. Upendrasingh R. Singh', '$2y$10$qFFsYOS57Ra08ge1Kyx9Sec6ugOwRORdajfn8h8N6S3o6.ulSPCTm', 'chimanbhaikoshti@gmail.com'),
('Prof. Sita S. Agrawal', '$2y$10$ibvRxhqIoO81pOQYuZYnXOdqaOliQZOWMZtk8MaL9nJIIdlOcUGxW', 'chimanbhaikoshti@gmail.com'),
('Prof. Trupti Y. Rathod', '$2y$10$B9CzRkEZOor1isq1lZB9K.NizBnr0ZxQsYp0Ad6Q.kWOEs5famQc6', 'chimanbhaikoshti@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
