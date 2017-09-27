-- phpMyAdmin SQL Dump
-- version 3.4.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2016 at 01:17 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `playground16`
--

-- --------------------------------------------------------

--
-- Table structure for table `20Q_DataTree_Copy`
--

CREATE TABLE IF NOT EXISTS `20Q_DataTree` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `value` varchar(128) NOT NULL,
  `leftChild` int(32) NOT NULL,
  `rightChild` int(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `20Q_DataTree_Copy`
--

INSERT INTO `20Q_DataTree` (`id`, `value`, `leftChild`, `rightChild`) VALUES
(1, 'a living thing', 2, 3),
(2, 'a physical object', 4, 5),
(3, 'an animal', 6, 7),
(4, 'a feeling', 8, 9),
(5, 'bigger than a refrigerator', 10, 11),
(6, 'a plant', 12, 13),
(7, 'a mammal', 14, 15),
(8, 'a scientific concept', 16, 17),
(9, 'a positive feeling', 18, 19),
(10, 'bigger than a soccer ball', 20, 21),
(11, 'an object that weighs over a ton', 22, 23),
(12, 'a bacterium', 24, 25),
(13, 'a type of tree', 26, 27),
(14, 'a vertebrate', 28, 29),
(15, 'a primate', 30, 31),
(16, 'fame', 0, 0),
(17, 'the field of mathematics', 0, 0),
(18, 'depression', 0, 0),
(19, 'happiness', 0, 0),
(20, 'a computer mouse', 0, 0),
(21, 'a lamp', 0, 0),
(22, 'a large inflatable santa', 0, 0),
(23, 'a building', 0, 0),
(24, 'a protist', 0, 0),
(25, 'E. Coli', 0, 0),
(26, 'a rosebush', 0, 0),
(27, 'an oak tree', 0, 0),
(28, 'a centipede', 0, 0),
(29, 'a shark', 0, 0),
(30, 'a dog', 0, 0),
(31, 'an orangutan', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
