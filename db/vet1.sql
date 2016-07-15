-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2016 at 01:38 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vet1`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` varchar(200) NOT NULL,
  `brand_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `breed1`
--

CREATE TABLE IF NOT EXISTS `breed1` (
  `breed_id` varchar(200) NOT NULL,
  `species_id` varchar(25) NOT NULL,
  `breed_name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`breed_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `breed1`
--

INSERT INTO `breed1` (`breed_id`, `species_id`, `breed_name`, `status`) VALUES
('1', '1', 'beeeee', 'active'),
('2', '1', 'pomeranian', 'inactive'),
('3', '9', 'shitzu', 'active'),
('BR5788c5d6cd921', '0', 'undefined', 'inactive'),
('BR5788c70abc064', '10', 'iuhklj', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `cage`
--

CREATE TABLE IF NOT EXISTS `cage` (
  `cage_id` varchar(200) NOT NULL,
  `cage_name` varchar(100) NOT NULL,
  `length` varchar(200) NOT NULL,
  `width` varchar(200) NOT NULL,
  `height` varchar(200) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`cage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cage`
--

INSERT INTO `cage` (`cage_id`, `cage_name`, `length`, `width`, `height`, `price`, `status`) VALUES
('1', 'Cage A', '', '', '', '20.00', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `user_id` varchar(25) NOT NULL,
  `user_firstname` varchar(200) NOT NULL,
  `user_mi` varchar(200) NOT NULL,
  `user_lastname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `bday` date DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `user_level` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`user_id`, `user_firstname`, `user_mi`, `user_lastname`, `username`, `password`, `position`, `bday`, `address`, `contact_no`, `email`, `user_level`, `status`) VALUES
('1', 'Tre', 'M', 'Baniel', 'tre', '12345', 'manager', '0000-00-00', 'San juan city', '09056095833', 'banieltresha@gmail', 'admin', 'active\r\n'),
('2', 'miriam bettina', 'R', 'jesena', 'bet', '123', 'employee', '0000-00-00', 'onse', '', 'bettina.jesena', 'user', 'active'),
('3', 'Franchesca', '', 'Gaoat', 'chie', 'beatles', 'employee', NULL, 'San Juan City', '', '', 'admin', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `generic`
--

CREATE TABLE IF NOT EXISTS `generic` (
  `generic_id` varchar(25) NOT NULL,
  `generic_name` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generic`
--

INSERT INTO `generic` (`generic_id`, `generic_name`, `status`) VALUES
('1', 'as', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE IF NOT EXISTS `medicines` (
  `medicine_id` varchar(25) NOT NULL DEFAULT '0',
  `medicine_name` varchar(100) DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `packaging` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `generic_name` varchar(200) NOT NULL,
  `content` varchar(200) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`medicine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`medicine_id`, `medicine_name`, `category`, `packaging`, `type`, `brand`, `generic_name`, `content`, `price`, `description`, `status`) VALUES
('1', 'paracetamol', 'pang ubo', '', '', '', '', '', '100.00', 'small', 'inactive'),
('2', 'paracetamol', 'sada', '', '', '', '', '', '12.00', 'djksajd', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE IF NOT EXISTS `owner` (
  `owner_id` varchar(25) NOT NULL DEFAULT '0',
  `firstname` varchar(100) DEFAULT NULL,
  `middle_initial` varchar(5) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `bday` date DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`owner_id`, `firstname`, `middle_initial`, `lastname`, `bday`, `contact_no`, `address`, `sex`, `status`) VALUES
('1', 'Pied Piper', 'M', 'Baniel', '0000-00-00', '09056095833', 'San Juan City', 'M', 'active'),
('2', 'Bettina', '', 'Jesena', '2016-07-12', '09268410117', 'San Juan City', 'F', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `owner_id` varchar(25) DEFAULT NULL,
  `pet_id` int(11) NOT NULL DEFAULT '0',
  `pet_name` varchar(100) DEFAULT NULL,
  `species` varchar(100) DEFAULT NULL,
  `breed` varchar(100) DEFAULT NULL,
  `color` varchar(200) NOT NULL,
  `markings` varchar(200) NOT NULL,
  `birthday` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`pet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`owner_id`, `pet_id`, `pet_name`, `species`, `breed`, `color`, `markings`, `birthday`, `sex`, `status`) VALUES
('1', 1, 'ponyo', 'horse ', 'horse', '0', '', '0000-00-00', 'F', 'active'),
('1', 2, 'ponyo', 'dklwmd', 'mdwlkem', 'mklml', 'kmlm', '0000-00-00', 'M', 'inactive'),
('1', 3, 'sample', 'sam', '', '', '', '0000-00-00', 'M', 'inactive'),
('1', 4, 'Sample', 'Sample', 'Sample', 'Sample', 'Sample', '0000-00-00', 'M', 'inactive'),
('1', 5, 'NALLY', 'KLS;', 'LDKF', 'CKLJDK', 'JLKWJK', '0000-00-00', 'M', 'inactive'),
('1', 6, 'KMLKMKM', 'KMLKM', 'KMLM', 'LKMKL', 'KML', '0000-00-00', 'F', 'active'),
('1', 7, 'kjkklkj', 'kjljk', 'jlkj', 'jkljlk', 'lkjlkj', '0000-00-00', 'M', 'inactive'),
('1', 8, 'kjkhk', 'hjhhk', 'hjk', 'hkjh', 'kjhkj', '0000-00-00', 'M', 'active'),
('1', 9, 'bjkbjk', 'jbjbbkjbj', 'bjkb', 'kjbkjb', 'bkjbk', '0000-00-00', 'M', 'inactive'),
('1', 10, 'bnbm', 'bnmbm', 'nnbnnb', 'n,mn', 'mn,mn', '0000-00-00', 'M', 'inactive'),
('1', 11, 'mb,b', 'nbmbn', 'mnbmn', 'bmnbmnb', 'mnbb', '0000-00-00', 'M', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` varchar(25) NOT NULL DEFAULT '0',
  `product_name` varchar(100) DEFAULT NULL,
  `category` varchar(200) NOT NULL,
  `packaging` varchar(200) NOT NULL,
  `weight` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `category`, `packaging`, `weight`, `description`, `status`) VALUES
('1', 'dog leash', '', '', '', 'large', 'active'),
('2', 'sample', '', '', '', '', 'inactive'),
('3', 'sample', '', '', '', 'large', 'inactive'),
('4', 'med1', '', '', '', 'aadsa', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `service_id` varchar(25) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `category`, `price`, `status`) VALUES
('1', 'cleaning', 'Vet', 400, 'active'),
('2', 'boarding', 'Grooming', 40, 'active'),
('3', 'check up', 'Vet', 500, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE IF NOT EXISTS `species` (
  `species_id` varchar(25) NOT NULL DEFAULT '0',
  `species_name` varchar(100) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`species_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`species_id`, `species_name`, `status`) VALUES
('0', 'asdfsadf', 'inactive'),
('1', 'dog', 'active'),
('10', 'Panda Bear', 'active'),
('2', 'cat', 'inactive'),
('3', 'churva', 'inactive'),
('4', 'Sample', 'inactive'),
('5', 'sample1', 'inactive'),
('6', 'Fish', 'active'),
('7', 'Bee', 'active'),
('8', 'cat', 'active'),
('9', 'dog', 'active'),
('SP5788b88a1a772', 'sssssssssss', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `unit_id` varchar(200) NOT NULL,
  `unit_name` varchar(200) NOT NULL,
  `unit_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `users_name` varchar(15) NOT NULL,
  `users_password` varchar(50) NOT NULL,
  `users_type` varchar(15) NOT NULL,
  `users_status` char(10) NOT NULL,
  PRIMARY KEY (`users_name`),
  UNIQUE KEY `users_name` (`users_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_name`, `users_password`, `users_type`, `users_status`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN', 'active'),
('bets', 'fb7e68e275c31e550a500541d0896cf5', 'ADMIN', 'active'),
('moses', '594aa0a9de0c75cd4d4037b6b65c683e', 'ADMIN', 'inactive'),
('test', '098f6bcd4621d373cade4e832627b4f6', 'USER', 'inactive'),
('tester', 'f5d1278e8109edd94e1e4197e04873b9', 'USER', 'inactive'),
('user1', '24c9e15e52afc47c225b757e7bee1f9d', 'USER', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

CREATE TABLE IF NOT EXISTS `vaccines` (
  `vaccine_id` varchar(25) NOT NULL DEFAULT '0',
  `vaccine_name` varchar(100) DEFAULT NULL,
  `size` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`vaccine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaccines`
--

INSERT INTO `vaccines` (`vaccine_id`, `vaccine_name`, `size`, `price`, `status`) VALUES
('1', 'vaccine 1.1', 'small', '250.00', 'active'),
('2', 'vaccine 2.1', 'small', '300.00', 'inactive');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
