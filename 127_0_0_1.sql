-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 10, 2021 at 11:50 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_todo_list_db`
--
CREATE DATABASE IF NOT EXISTS `my_todo_list_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `my_todo_list_db`;

-- --------------------------------------------------------

--
-- Table structure for table `my_todo_list`
--

DROP TABLE IF EXISTS `my_todo_list`;
CREATE TABLE IF NOT EXISTS `my_todo_list` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_task` varchar(255) NOT NULL,
  `t_date` varchar(255) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `my_todo_list`
--

INSERT INTO `my_todo_list` (`t_id`, `t_task`, `t_date`) VALUES
(49, 'I will complete my internship.sidehustle Week3 task before nightfall. ', '10th  July, 2021 10:54 AM'),
(48, 'Once I return from the U.S. I will visit the legendry confluence town in Lokoja and share pleasantries with the town head', '10th  July, 2021 10:36 AM');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
