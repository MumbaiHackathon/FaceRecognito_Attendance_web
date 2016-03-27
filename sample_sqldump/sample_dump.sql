-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2016 at 09:02 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `userid` int(11) DEFAULT NULL,
  `lecture_id` varchar(256) DEFAULT NULL,
  `lecture_num` int(11) DEFAULT NULL,
  `status` varchar(256) DEFAULT NULL,
  `dte` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`userid`, `lecture_id`, `lecture_num`, `status`, `dte`) VALUES
(100, 'math101', 1, 'present', '2016-03-26 12:00:00'),
(100, 'some', 3, 'present', '2016-03-26 12:00:00'),
(100, 'some', 4, 'absent', '2016-03-26 12:00:00'),
(100, 'some', 5, 'present', '2016-03-26 12:00:00'),
(100, 'some', 6, 'present', '2016-03-26 12:00:00'),
(100, 'some', 7, 'absent', '2016-03-26 12:00:00'),
(100, 'some', 8, 'absent', '2016-03-26 12:00:00'),
(100, 'some', 2, 'absent', '2016-03-26 12:00:00'),
(100, 'some', 1, 'present', '2016-03-25 12:00:00'),
(100, 'some', 2, 'absent', '2016-03-25 12:00:00'),
(100, 'some', 3, 'present', '2016-03-25 12:00:00'),
(100, 'some', 4, 'present', '2016-03-25 12:00:00'),
(100, 'some', 5, 'present', '2016-03-25 12:00:00'),
(100, 'some', 6, 'absent', '2016-03-25 12:00:00'),
(100, 'some', 7, 'present', '2016-03-25 12:00:00'),
(100, 'some', 8, 'present', '2016-03-25 12:00:00'),
(100, 'some', 1, 'present', '2016-03-24 12:00:00'),
(100, 'some', 2, 'absent', '2016-03-24 12:00:00'),
(100, 'some', 3, 'present', '2016-03-24 12:00:00'),
(100, 'some', 4, 'present', '2016-03-24 12:00:00'),
(100, 'some', 5, 'present', '2016-03-24 12:00:00'),
(100, 'some', 6, 'absent', '2016-03-24 12:00:00'),
(100, 'some', 7, 'present', '2016-03-24 12:00:00'),
(100, 'some', 8, 'present', '2016-03-24 12:00:00'),
(100, 'some', 1, 'present', '2016-03-23 12:00:00'),
(100, 'some', 2, 'absent', '2016-03-23 12:00:00'),
(100, 'some', 3, 'present', '2016-03-23 12:00:00'),
(100, 'some', 4, 'present', '2016-03-23 12:00:00'),
(100, 'some', 5, 'present', '2016-03-23 12:00:00'),
(100, 'some', 6, 'absent', '2016-03-23 12:00:00'),
(100, 'some', 7, 'present', '2016-03-23 12:00:00'),
(100, 'some', 8, 'present', '2016-03-23 12:00:00'),
(100, 'some', 1, 'present', '2016-03-22 12:00:00'),
(100, 'some', 2, 'absent', '2016-03-22 12:00:00'),
(100, 'some', 3, 'present', '2016-03-22 12:00:00'),
(100, 'some', 4, 'present', '2016-03-22 12:00:00'),
(100, 'some', 5, 'present', '2016-03-22 12:00:00'),
(100, 'some', 6, 'absent', '2016-03-22 12:00:00'),
(100, 'some', 7, 'present', '2016-03-22 12:00:00'),
(100, 'some', 8, 'present', '2016-03-22 12:00:00'),
(1, 'math101', 1, 'present', '2016-03-26 12:00:00'),
(1, 'some', 3, 'present', '2016-03-26 12:00:00'),
(1, 'some', 4, 'absent', '2016-03-26 12:00:00'),
(1, 'some', 5, 'present', '2016-03-26 12:00:00'),
(1, 'some', 6, 'present', '2016-03-26 12:00:00'),
(1, 'some', 7, 'absent', '2016-03-26 12:00:00'),
(1, 'some', 8, 'absent', '2016-03-26 12:00:00'),
(1, 'some', 2, 'absent', '2016-03-26 12:00:00'),
(1, 'some', 1, 'present', '2016-03-25 12:00:00'),
(1, 'some', 2, 'absent', '2016-03-25 12:00:00'),
(1, 'some', 3, 'present', '2016-03-25 12:00:00'),
(1, 'some', 4, 'present', '2016-03-25 12:00:00'),
(1, 'some', 5, 'present', '2016-03-25 12:00:00'),
(1, 'some', 6, 'absent', '2016-03-25 12:00:00'),
(1, 'some', 7, 'present', '2016-03-25 12:00:00'),
(1, 'some', 8, 'present', '2016-03-25 12:00:00'),
(1, 'some', 1, 'present', '2016-03-24 12:00:00'),
(1, 'some', 2, 'absent', '2016-03-24 12:00:00'),
(1, 'some', 3, 'present', '2016-03-24 12:00:00'),
(1, 'some', 4, 'present', '2016-03-24 12:00:00'),
(1, 'some', 5, 'present', '2016-03-24 12:00:00'),
(1, 'some', 6, 'absent', '2016-03-24 12:00:00'),
(1, 'some', 7, 'present', '2016-03-24 12:00:00'),
(1, 'some', 8, 'present', '2016-03-24 12:00:00'),
(1, 'some', 1, 'present', '2016-03-23 12:00:00'),
(1, 'some', 2, 'absent', '2016-03-23 12:00:00'),
(1, 'some', 3, 'present', '2016-03-23 12:00:00'),
(1, 'some', 4, 'present', '2016-03-23 12:00:00'),
(1, 'some', 5, 'present', '2016-03-23 12:00:00'),
(1, 'some', 6, 'absent', '2016-03-23 12:00:00'),
(1, 'some', 7, 'present', '2016-03-23 12:00:00'),
(1, 'some', 8, 'present', '2016-03-23 12:00:00'),
(1, 'some', 1, 'present', '2016-03-22 12:00:00'),
(1, 'some', 2, 'absent', '2016-03-22 12:00:00'),
(1, 'some', 3, 'present', '2016-03-22 12:00:00'),
(1, 'some', 4, 'present', '2016-03-22 12:00:00'),
(1, 'some', 5, 'present', '2016-03-22 12:00:00'),
(1, 'some', 6, 'absent', '2016-03-22 12:00:00'),
(1, 'some', 7, 'present', '2016-03-22 12:00:00'),
(1, 'some', 8, 'present', '2016-03-22 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE IF NOT EXISTS `lectures` (
  `lecture_id` varchar(256) DEFAULT NULL,
  `lecture_num` int(11) DEFAULT NULL,
  `date` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`lecture_id`, `lecture_num`, `date`) VALUES
('math101', 1, '2016-03-26'),
('math101', 1, '2016-03-26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) DEFAULT NULL,
  `firstname` varchar(256) DEFAULT NULL,
  `lastname` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `hexsalt` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `resettoken` varchar(256) DEFAULT NULL,
  `resettokenexpiry` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `firstname`, `lastname`, `email`, `hexsalt`, `password`, `resettoken`, `resettokenexpiry`) VALUES
(0, 'David-Schwimmer', 'David', 'Schwimmer', 'david@gmail.com', '7944373e6f7a0b898409dbad7003ba174eb3e6de7efed86790ed97c8a075b82a', '1b5c920d36f90f7ad84c693e77ab59a8c099643463bba505a1fd9d4153db02e95e9fb7828773a1a2971caa210728b38d786a9589e6f6b29496e434934a6eee6b', NULL, NULL),
(1, 'Matthew-Perry', 'Matthew', 'Perry', 'matthew@gmail.com', '07a069aa69a94717953be750aa5bf15c37c9996d9dd8b7549749378e530959c7', '8bfede9500160f3e318fed7a54ece0f0b79efa51a2d235e6f4ea4c2b137f9a1b8b71a6d7bf63f65f045d36c58aad7a9ba7a4f3c5f74aa15d11e7dcb3e1edad42', NULL, NULL),
(2, 'Lisa-Kudrow', 'Lisa', 'Kudrow', 'lisa@gmail.com', 'a295ec12de5d3930ae9a5d7387a828105972a7508738f1059b5e395265dea4a1', 'f4cf7b5b01ffbc97c6d3a76e9fd688d5a1ac447ed220c133fa343f946ebf0f9498b620660a2a406de05a64b1548e106f4e46a972dc6bba1ec77f57ea440f7882', NULL, NULL),
(3, 'Courteney-Cox', 'Courteney ', 'Cox', 'courtney@gmail.com', 'b6b1a6a0379bc9e9e75dc1c0b86a734bb6a8168a4be5caa7aa9ccc7a4e65119e', '0096a3328ffd1c81bf455001d004691c780d65a30702100e3bdd48f8c76f525fe1c2d14a89f09465a371260f60d14505eb1d2ac10c7b0eab59863b9b16430702', NULL, NULL),
(5, 'Jennifer-Aniston', 'Jennifer', 'Aniston', 'jennifer@gmail.com', '7b0920ef623fbec704d30277b65635e6162780dbb6a13cbc1e0a1636ba131527', 'a7206df3e31cd6574e87bb399b2e0c559ce6af1aa2e7f8b99b93c608846d75dc3ffea5c51a05c20c7b150ce6a724ac8a4045acd2b4f7cfa38122f8168d543f7d', NULL, NULL),
(6, 'Matt-LeBlanc', 'Matt', 'LeBlanc', 'matt@gmail.com', 'a9dfa51621c1860afe24c7fecb03c6843d849688fb185d82615044bf849c7194', '76f86d931269775607ae4bc3cff76a70e8999ea91ef0caa44770136aa88b1963ee22bc92a47dc8177d1de724472a13f3672aafecf007823af2cae0cffeffbdff', NULL, NULL),
(100, 'shivam-mishra', 'shivam', 'mishra', 'Scm.mymail@gmail.com', '8302cf6a7679d2844934ed4ffece02a518ca3e25f39daf74f4371af6dd454378', '113955a452c63a820ceea9ea33a8215a379ac3eb4e35b03df337e3e7c01988af3591993b0c3819578d677bde63977935440b464d6e67e337032b9cd045e9b0f4', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
