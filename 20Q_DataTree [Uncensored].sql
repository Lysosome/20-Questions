-- phpMyAdmin SQL Dump
-- version 3.4.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2016 at 12:17 PM
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
-- Table structure for table `20Q_DataTree`
--

CREATE TABLE IF NOT EXISTS `20Q_DataTree` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `value` varchar(128) NOT NULL,
  `leftChild` int(32) NOT NULL,
  `rightChild` int(32) NOT NULL,
  `deleted` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=141 ;

--
-- Dumping data for table `20Q_DataTree`
--

INSERT INTO `20Q_DataTree` (`id`, `value`, `leftChild`, `rightChild`, `deleted`) VALUES
(1, 'a living thing', 2, 3, 0),
(2, 'a physical object', 4, 5, 0),
(3, 'an animal', 6, 7, 0),
(4, 'a feeling', 8, 9, 0),
(5, 'bigger than a refrigerator', 10, 11, 0),
(6, 'a plant', 12, 13, 0),
(7, 'a mammal', 14, 15, 0),
(8, 'a scientific concept', 16, 17, 0),
(9, 'a positive feeling', 18, 19, 0),
(10, 'bigger than a soccer ball', 20, 21, 0),
(11, 'an object that weighs over a ton', 22, 23, 0),
(12, 'a bacterium', 24, 25, 0),
(13, 'a type of tree', 26, 27, 0),
(14, 'a vertebrate', 28, 29, 0),
(15, 'a primate', 30, 31, 0),
(16, 'Mr. Lindemann', 81, 16, 0),
(17, 'from the field of philosophy', 121, 122, 0),
(18, 'focused at oneself', 89, 90, 0),
(19, 'physical feeling', 59, 60, 0),
(20, 'a food', 49, 50, 0),
(21, 'heavy', 69, 70, 0),
(22, 'a large inflatable santa', 0, 0, 0),
(23, 'an astrological body', 77, 78, 0),
(24, 'a dick', 43, 44, 0),
(25, 'E. Coli', 0, 0, 0),
(26, 'my bush', 99, 26, 0),
(27, 'tree', 47, 27, 0),
(28, 'a mollusk', 39, 40, 0),
(29, 'an amphibian', 123, 124, 0),
(30, 'a feline', 41, 42, 0),
(31, 'a human', 51, 52, 1),
(39, 'a centipede', 0, 0, 0),
(40, 'an octopus', 0, 0, 0),
(41, 'a dog', 0, 0, 0),
(42, 'a cat', 0, 0, 0),
(43, 'a person', 55, 56, 0),
(44, 'Dick', 0, 0, 0),
(45, 'a human', 51, 52, 1),
(46, '', 0, 0, 0),
(47, 'an oak tree', 0, 0, 0),
(48, 'tree', 0, 0, 0),
(49, 'something you wear', 87, 88, 0),
(50, 'a pastry', 63, 64, 0),
(51, 'Pravin', 75, 51, 1),
(52, 'the developer of PHP', 65, 66, 0),
(53, 'a protist', 0, 0, 0),
(54, 'cheeseburger', 0, 0, 0),
(55, 'teacher', 57, 55, 0),
(56, 'Karl Marx', 0, 0, 0),
(57, 'an inanimate object which has been endowed with consciousness', 125, 126, 0),
(58, 'teacher', 0, 0, 0),
(59, 'happiness', 0, 0, 0),
(60, 'orgasm', 0, 0, 0),
(61, 'Dick', 0, 0, 1),
(62, '', 0, 0, 0),
(63, 'cheese', 0, 0, 0),
(64, 'a donut', 0, 0, 0),
(65, 'the developer of Linux', 72, 74, 0),
(66, 'Rasmus Lehrdorf', 0, 0, 0),
(67, 'the developer of Linux', 72, 74, 1),
(68, 'Yo mama', 0, 0, 1),
(69, 'for sitting', 115, 116, 0),
(70, 'Rahul''s sweatpants', 83, 70, 0),
(71, 'Rick Astley', 0, 0, 0),
(72, 'Mr. Lindemann', 51, 72, 0),
(73, 'Pravin', 0, 0, 0),
(74, 'LInus Torvalds', 0, 0, 0),
(75, 'Mr. Lindemann''s Mom', 85, 75, 1),
(76, 'Pravin', 0, 0, 0),
(77, 'a vehicle', 131, 132, 0),
(78, 'in our solar system', 119, 120, 0),
(79, 'Pravin', 0, 0, 0),
(80, 'Mr. Lindemann', 0, 0, 0),
(81, 'a female', 95, 92, 0),
(82, 'Mr. Lindemann', 0, 0, 0),
(83, 'an anvil', 0, 0, 0),
(84, 'Rahul''s sweatpants', 0, 0, 0),
(85, 'a female', 91, 92, 1),
(86, 'Mr. Lindemann''s Mom', 0, 0, 0),
(87, 'a body part', 97, 98, 0),
(88, 'made of cloth', 109, 110, 0),
(89, 'depression', 0, 0, 0),
(90, 'self-hatred', 0, 0, 0),
(91, 'evil', 93, 94, 1),
(92, 'Alex Yoooooooooooooooo', 96, 92, 1),
(93, 'a profession', 101, 102, 1),
(94, 'Hitler', 0, 0, 1),
(95, 'fame', 0, 0, 0),
(96, 'Lindy''s wife', 0, 0, 1),
(97, 'a drug', 111, 112, 0),
(98, 'on your chest', 113, 114, 0),
(99, 'a rosebush', 0, 0, 0),
(100, 'my bush', 0, 0, 0),
(101, 'a gorilla', 105, 106, 1),
(102, 'a DJ', 0, 0, 1),
(103, 'Lindy''s wife', 0, 0, 0),
(104, 'Alex Yoooooooooooooooo', 0, 0, 0),
(105, 'a meme', 107, 108, 1),
(106, 'Harambe', 0, 0, 1),
(107, 'a debater', 133, 134, 1),
(108, 'Ken Bone', 0, 0, 1),
(109, 'shoe', 0, 0, 0),
(110, 'a sock', 0, 0, 0),
(111, 'a personal computing device', 135, 136, 0),
(112, 'cocaine', 0, 0, 0),
(113, 'a toe', 0, 0, 0),
(114, 'nipple', 0, 0, 0),
(115, 'a lamp', 0, 0, 0),
(116, 'for more than one person at a time', 117, 118, 0),
(117, 'chair', 0, 0, 0),
(118, 'a couch', 0, 0, 0),
(119, 'a black hole', 0, 0, 0),
(120, 'Jupiter', 0, 0, 0),
(121, 'the field of mathematics', 0, 0, 0),
(122, 'consciousness', 0, 0, 0),
(123, 'a shark', 0, 0, 0),
(124, 'a frog', 0, 0, 0),
(125, 'burger', 0, 0, 0),
(126, 'a chair', 127, 128, 0),
(127, 'a form of currency', 129, 130, 0),
(128, 'a sentient chair', 0, 0, 0),
(129, 'a sentient pencil', 0, 0, 0),
(130, 'a sentient nickel', 0, 0, 0),
(131, 'a building', 0, 0, 0),
(132, 'a car', 0, 0, 0),
(133, 'a political philosopher', 137, 138, 1),
(134, 'Rishi Balakrishnan', 0, 0, 1),
(135, 'made of rock', 139, 140, 0),
(136, 'a laptop', 0, 0, 0),
(137, 'an orangutan', 0, 0, 1),
(138, 'Robert Nozick', 0, 0, 1),
(139, 'a computer mouse', 0, 0, 0),
(140, 'pebble', 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
