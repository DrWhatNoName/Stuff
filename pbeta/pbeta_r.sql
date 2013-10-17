-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 26, 2011 at 08:53 AM
-- Server version: 5.1.52
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pbeta_r`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `username` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `userip` varchar(64) DEFAULT NULL,
  `logtime` varchar(512) DEFAULT NULL,
  `tokensalt` varchar(64) DEFAULT NULL,
  `keysalt` varchar(64) DEFAULT NULL,
  `ipsalt` varchar(64) DEFAULT NULL,
  `deletehash` varchar(64) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--


-- --------------------------------------------------------

--
-- Table structure for table `notepad`
--

CREATE TABLE IF NOT EXISTS `notepad` (
  `token` varchar(64) NOT NULL,
  `salt` varchar(64) NOT NULL,
  `notepad` varchar(20480) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notepad`
--


-- --------------------------------------------------------

--
-- Table structure for table `passwords`
--

CREATE TABLE IF NOT EXISTS `passwords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(64) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `url` varchar(2000) DEFAULT NULL,
  `password` varchar(2000) DEFAULT NULL,
  `username` varchar(800) DEFAULT NULL,
  `encrypted` varchar(256) DEFAULT NULL,
  `encryptionsalt` varchar(64) DEFAULT NULL,
  `salt` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `passwords`
--


-- --------------------------------------------------------

--
-- Table structure for table `ramtable`
--

CREATE TABLE IF NOT EXISTS `ramtable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(2048) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MEMORY DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ramtable`
--


-- --------------------------------------------------------

--
-- Table structure for table `random`
--

CREATE TABLE IF NOT EXISTS `random` (
  `IV` varchar(64) DEFAULT NULL,
  `counter` varchar(64) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `random`
--

INSERT INTO `random` (`IV`, `counter`) VALUES
('70eb7d99ede8ea6bba0e4daa40b307c73acb0418cd9c315388b22fb49203717b', '0dd9406c4992f15bd31358dc50889cfe97533a88311ccca41eb6807101b73663');

-- --------------------------------------------------------

--
-- Table structure for table `skey`
--

CREATE TABLE IF NOT EXISTS `skey` (
  `token` varchar(64) NOT NULL,
  `enabled` varchar(1024) NOT NULL,
  `salt` varchar(64) NOT NULL,
  `skeysalt` varchar(64) NOT NULL,
  `masterpass` varchar(64) NOT NULL,
  `current` int(11) NOT NULL,
  `last` varchar(64) NOT NULL,
  PRIMARY KEY (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skey`
--

