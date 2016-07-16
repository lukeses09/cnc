-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2016 at 02:15 AM
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
  `brand_id` varchar(25) NOT NULL,
  `brand_generic_id` varchar(25) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `brand_status` char(10) NOT NULL,
  PRIMARY KEY (`brand_id`),
  KEY `brand_name` (`brand_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_generic_id`, `brand_name`, `brand_status`) VALUES
('B578936bc4d06a', 'undefined', 'undefined', 'active'),
('B578936d3cafc7', 'Hashtag', '1', 'active'),
('B57893715dad7c', '1', 'Hashtags', 'inactive'),
('B57893b74bfdef', '1', 'Medkol', 'active'),
('BR128397', 'C578933a176117', 'Biogesic', 'active');

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
('1', '10', 'Drarb', 'active'),
('2', '1', 'pomeranian', 'inactive'),
('3', '9', 'Beatle', 'active'),
('BR5788c70abc064', '10', 'Ioen', 'active'),
('BR578910db4280a', '', '', 'active'),
('BR578910e6eae87', '', '', 'active'),
('BR57891107c251a', '', '', 'active'),
('BR578935ad1cc0e', 'undefined', 'undefined', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `cage`
--

CREATE TABLE IF NOT EXISTS `cage` (
  `cage_id` varchar(200) NOT NULL,
  `cage_name` varchar(100) NOT NULL,
  `cage_size` varchar(200) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`cage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cage`
--

INSERT INTO `cage` (`cage_id`, `cage_name`, `cage_size`, `price`, `status`) VALUES
('1', 'Cage A', '12x19x10', '20.00', 'active'),
('SV57894e94bb964', 'Blue Box', '12 x 01 x 190 by Meter', '70.00', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` varchar(25) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_status` char(10) NOT NULL,
  PRIMARY KEY (`cat_id`),
  KEY `cat_name` (`cat_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_status`) VALUES
('C1023', 'Soap n Wash', 'active'),
('C57891c7a35558', '', 'inactive'),
('C57891c9a369bf', 'Shampooo', 'active'),
('C57893ae89a6c7', 'Special Medicine', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `clients_id` varchar(25) NOT NULL,
  `clients_name` varchar(100) NOT NULL,
  `clients_address` varchar(150) NOT NULL,
  `clients_contact` varchar(15) NOT NULL,
  `clients_bdate` date NOT NULL,
  `clients_gender` char(10) NOT NULL,
  `clients_job` varchar(50) NOT NULL,
  `clients_mstatus` varchar(10) NOT NULL,
  `clients_spousename` varchar(100) DEFAULT NULL,
  `clients_dependents` int(99) DEFAULT NULL,
  `clients_status` char(10) NOT NULL,
  PRIMARY KEY (`clients_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clients_id`, `clients_name`, `clients_address`, `clients_contact`, `clients_bdate`, `clients_gender`, `clients_job`, `clients_mstatus`, `clients_spousename`, `clients_dependents`, `clients_status`) VALUES
('CL571883cfe6e21', 'Moses Jerome Lucas', 'Dressrosa, Grandline St.', '09063402308', '1996-10-02', 'male', 'Rails Engineer', 'divorced', '', 0, 'active'),
('CL5718840b4ed1c', 'Jake Finn', 'Arabasta', '0906390928', '1995-11-02', 'male', 'Dogger', 'married', 'Rainbow Ponyia', 8, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `dosage`
--

CREATE TABLE IF NOT EXISTS `dosage` (
  `dosage_id` varchar(25) NOT NULL,
  `dosage_name` varchar(100) NOT NULL,
  `dosage_status` char(10) NOT NULL,
  PRIMARY KEY (`dosage_id`),
  KEY `cat_name` (`dosage_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosage`
--

INSERT INTO `dosage` (`dosage_id`, `dosage_name`, `dosage_status`) VALUES
('D57891c9a369bf', '2 teaspoons', 'inactive'),
('DO578938f772655', '1 Shot Injection', 'active'),
('DS12321', '25 Drops', 'active');

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
('1', 'Noozapi', 'active'),
('C57893380cba17', 'Paracetamon', 'inactive'),
('C578933a176117', 'Paracetamol', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE IF NOT EXISTS `medicines` (
  `medicine_id` varchar(25) NOT NULL DEFAULT '0',
  `medicine_name` varchar(100) DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `packaging` varchar(25) NOT NULL,
  `dosage` varchar(25) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `content` varchar(200) NOT NULL,
  `unit` varchar(25) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`medicine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`medicine_id`, `medicine_name`, `category`, `packaging`, `dosage`, `brand`, `content`, `unit`, `price`, `description`, `status`) VALUES
('1', 'paracetamol', 'pang ubo', '', '', '', '', '', '100.00', 'small', 'inactive'),
('2', 'paracetamol', 'sada', '', '', '', '', '', '12.00', 'djksajd', 'active'),
('MD102398', 'Chemical X', 'C57893ae89a6c7', 'PK12983', 'DO578938f772655', 'BR128397', '17', 'U57893b3d7f15c', '5600.00', 'PPWG', 'active'),
('MD578942ee61930', 'harf', 'C57891c9a369bf', 'PK1238', 'DO578938f772655', 'B57893b74bfdef', '12', 'U102939', '900.00', 'Hugh', 'inactive');

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
-- Table structure for table `packaging`
--

CREATE TABLE IF NOT EXISTS `packaging` (
  `pack_id` varchar(25) NOT NULL,
  `pack_name` varchar(100) NOT NULL,
  `pack_status` char(10) NOT NULL,
  PRIMARY KEY (`pack_id`),
  KEY `cat_name` (`pack_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packaging`
--

INSERT INTO `packaging` (`pack_id`, `pack_name`, `pack_status`) VALUES
('C57891f3095341', 'Cardboard Box Type', 'inactive'),
('PK1238', 'Plastic Saschet', 'active'),
('PK12983', 'Cardboard Box', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `owner_id` varchar(25) DEFAULT NULL,
  `pet_id` varchar(25) NOT NULL DEFAULT '0',
  `pet_name` varchar(100) DEFAULT NULL,
  `breed` varchar(25) DEFAULT NULL,
  `color` varchar(200) NOT NULL,
  `markings` varchar(200) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `status` char(10) NOT NULL,
  PRIMARY KEY (`pet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`owner_id`, `pet_id`, `pet_name`, `breed`, `color`, `markings`, `birthdate`, `sex`, `status`) VALUES
('1', '1', 'ponyo', '1', 'White', 'Left Eye', '2013-09-22', 'F', 'active'),
('1', '10', 'bnbm', '3', 'n,mn', 'mn,mn', '0000-00-00', 'M', 'inactive'),
('1', '11', 'mb,b', '3', 'bmnbmnb', 'mnbb', '0000-00-00', 'M', 'inactive'),
('1', '2', 'ponyo', '2', 'mklml', 'kmlm', '0000-00-00', 'M', 'inactive'),
('1', '3', 'sample', '1', '', '', '0000-00-00', 'M', 'inactive'),
('1', '4', 'Sample', '3', 'Sample', 'Sample', '0000-00-00', 'M', 'inactive'),
('1', '5', 'NALLY', '2', 'CKLJDK', 'JLKWJK', '0000-00-00', 'M', 'inactive'),
('1', '6', 'KMLKMKM', '1', 'LKMKL', 'KML', '2013-01-01', 'F', 'active'),
('1', '7', 'kjkklkj', '1', 'jkljlk', 'lkjlkj', '0000-00-00', 'M', 'inactive'),
('1', '8', 'kjkhk', '3', 'hkjh', 'kjhkj', '2014-06-11', 'M', 'active'),
('1', '9', 'bjkbjk', '2', 'kjbkjb', 'bkjbk', '0000-00-00', 'M', 'inactive'),
(NULL, 'PT578911ed5d824', '', '1', 'Gold', 'Heart', '2015-11-12', 'F', 'inactive'),
(NULL, 'PT57891227d39b6', 'Francesca', '1', 'Silver', 'Sa', '2014-07-07', 'F', 'active'),
(NULL, 'PT57892e2700d84', '', '', '', '', NULL, '', 'active'),
(NULL, 'PT57897b49a6984', 'tre', '1', 'black', 'none', '2016-07-17', 'F', 'inactive');

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
  `unit` varchar(25) NOT NULL,
  `description` varchar(200) NOT NULL,
  `prod_price` decimal(9,2) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `category`, `packaging`, `weight`, `unit`, `description`, `prod_price`, `status`) VALUES
('2', 'sample', '', '', '', '', '', '0.00', 'inactive'),
('3', 'sample', '', '', '', '', 'large', '0.00', 'inactive'),
('4', 'med1', '', '', '', '', 'aadsa', '0.00', 'active'),
('PR1231', 'Dog Wow', 'C57891c9a369bf', 'PK1238', '25', 'U578920740365d\n', 'large', '0.00', 'active'),
('PR12381293', 'Swivel', 'C57891c9a369bf', 'PK1238', '25', 'U578920740365d', 'Ocsilliation', '250.00', 'active'),
('PR57892ed80c498', 'Enuma Elish', 'C1023', 'PK1238', '150', 'U578920740365d', 'Grayth Beginning', '7000.00', 'active'),
('PR578942319cdbc', '', 'C57891c9a369bf', 'PK12983', '', 'U578919c3091fd', 'fuck', '899.00', 'active');

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
('1', 'Cleaning', 'Vet', 900, 'active'),
('2', 'boarding', 'Grooming', 40, 'inactive'),
('3', 'check up', 'Vet', 500, 'inactive'),
('SV57894ad56f5bd', 'Assassination', 'Grooming', 39000, 'active'),
('SV57894af9dede1', 'Boarding', 'Vet', 280, 'active');

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
  `unit_id` varchar(25) NOT NULL,
  `unit_name` varchar(200) NOT NULL,
  `unit_abbreviation` varchar(25) NOT NULL,
  `unit_type` varchar(200) NOT NULL,
  `unit_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `unit_name`, `unit_abbreviation`, `unit_type`, `unit_status`) VALUES
('U12839', 'CM', '', 'Length', ''),
('U102939', 'Meter', 'M', 'Mass', 'active'),
('U57891973ec7c6', 'Centimeter', 'CM', 'length', 'inactive'),
('U578919c3091fd', 'Centimeter', 'CM', 'Length', 'active'),
('U578920740365d', 'Kilogram', 'KG', 'Mass', 'active'),
('U57893b3d7f15c', 'Milimeter', 'ML', 'Mass', 'active');

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
