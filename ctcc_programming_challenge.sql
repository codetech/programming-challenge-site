-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2013 at 05:00 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`id`, `date`, `name`, `description`, `winning_submission`, `submissions`) VALUES
(1, '2013-12-01 16:47:57', 'Challenge Uno', 'A challenge.', 1, '1,2');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE IF NOT EXISTS `submissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `challenge_id` int(10) unsigned NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `repository` varchar(255) NOT NULL,
  `license` varchar(255) NOT NULL,
  `grades` text NOT NULL,
  `winner` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `challenge_id`, `date`, `title`, `description`, `author`, `repository`, `license`, `grades`, `winner`) VALUES
(1, 1, '2013-12-01 16:56:08', 'Submission Uno', 'A submission.', 'Smitty', 'https://github.com/jquery/jquery.git', 'mit', '30,32', 1),
(2, 1, '2013-12-01 16:56:32', 'Submission Dos', 'A submission.', 'Smitty', 'https://github.com/jquery/jquery.git', 'mit', '15,13', 0),
(3, 1, '2013-12-01 16:58:21', 'Submission Tres', 'A submission.', 'Smitty', 'https://github.com/jquery/jquery.git', 'mit', '24,25', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
