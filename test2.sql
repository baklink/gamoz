-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2017 at 08:00 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL,
  `last_log_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `last_log_date`) VALUES
(2, 'emmanu', 'emmanumanu123', '2016-12-10'),
(1, 'sibin', 'sibin', '2016-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `comment_box`
--

CREATE TABLE IF NOT EXISTS `comment_box` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `pid` int(50) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `comment` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

-- --------------------------------------------------------

--
-- Table structure for table `post_project`
--

CREATE TABLE IF NOT EXISTS `post_project` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `pname` varchar(50) NOT NULL,
  `pdesc` varchar(200) NOT NULL,
  `main_desc` varchar(200) NOT NULL,
  `file` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `cid` int(50) NOT NULL,
  `cname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `presentation`
--

CREATE TABLE IF NOT EXISTS `presentation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(50) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `file` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `question` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
