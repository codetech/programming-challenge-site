-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2013 at 04:04 AM
-- Server version: 5.5.31-0+wheezy1
-- PHP Version: 5.4.4-14+deb7u5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ctcc_programming_challenge`
--
CREATE DATABASE IF NOT EXISTS `ctcc_programming_challenge` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ctcc_programming_challenge`;

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE IF NOT EXISTS `challenges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `winning_submission` int(10) unsigned NOT NULL,
  `submissions` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`id`, `date`, `name`, `description`, `winning_submission`, `submissions`) VALUES
(1, '0000-00-00 00:00:00', 'My Challenge', 'A challenge.', 4, '5,7,8,9'),
(2, '0000-00-00 00:00:00', 'dfsdf', 'A challenge.', 4, '5,7,8,9'),
(3, '0000-00-00 00:00:00', 'dfsdf', 'A challenge.', 4, '5,7,8,9'),
(4, '0000-00-00 00:00:00', 'dfsdf', 'A challenge.', 4, '5,7,8,9'),
(5, '0000-00-00 00:00:00', 'dfsdf', 'A challenge.', 4, '5,7,8,9'),
(6, '0000-00-00 00:00:00', 'dfsdf', 'A challenge.', 4, '5,7,8,9'),
(7, '0000-00-00 00:00:00', 'test', 'A challenge.', 4, '5,7,8,9'),
(8, '0000-00-00 00:00:00', 'test 2', 'A challenge.', 4, '5,7,8,9'),
(9, '0000-00-00 00:00:00', 'test 3', 'A challenge.', 4, '5,7,8,9'),
(10, '2013-12-01 00:00:00', 'Coolio', 'A challenge.', 4, '5,7,8,9'),
(11, '2013-12-01 00:00:00', 'Smoolio', 'A challenge.', 4, '5,7,8,9'),
(12, '2013-12-01 02:54:56', 'Smoolio 3', 'A challenge.', 4, '5,7,8,9'),
(13, '2013-12-01 02:55:59', 'Smoolio 4', 'A challenge.', 4, '5,7,8,9'),
(14, '2013-12-01 02:56:20', 'Smoolio 5', 'A challenge.', 4, '5,7,8,9'),
(15, '2013-12-01 03:43:32', 'Last Test', 'A challenge.', 4, '5,7,8,9');

-- --------------------------------------------------------

--
-- Table structure for table `challenge_submissions`
--

CREATE TABLE IF NOT EXISTS `challenge_submissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `challenge_id` int(10) unsigned NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `repository` varchar(255) NOT NULL,
  `license` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `challenge_submissions`
--

INSERT INTO `challenge_submissions` (`id`, `challenge_id`, `date`, `title`, `description`, `author`, `repository`, `license`) VALUES
(1, 1, '2013-12-01 03:34:41', 'Chal Sub 1', 'A challenge submission.', 'Smitty', 'https://github.com/jquery/jquery.git', 'mit'),
(2, 1, '2013-12-01 03:37:16', 'Chal Sub 3', 'A challenge submission.', 'Smitty', 'https://github.com/jquery/jquery.git', 'mit'),
(3, 1, '2013-12-01 03:38:53', 'Chal Sub 6', 'A challenge submission.', 'Smitty', 'https://github.com/jquery/jquery.git', 'mit'),
(4, 1, '2013-12-01 03:44:10', 'Last Chal Sub', 'A challenge submission.', 'Smitty', 'https://github.com/jquery/jquery.git', 'mit');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
