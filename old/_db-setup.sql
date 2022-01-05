-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 27, 2014 at 09:58 AM
-- Server version: 5.5.38
-- PHP Version: 5.3.10-1ubuntu3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blackcoin`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `address` varchar(50) NOT NULL DEFAULT '',
  `description` tinytext,
  `icon` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`address`),
  UNIQUE KEY `address` (`address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `richlist`
--

CREATE TABLE IF NOT EXISTS `richlist` (
  `address` varchar(50) NOT NULL,
  `update_id` int(11) NOT NULL,
  `position` int(11) DEFAULT NULL,
  `amount` decimal(20,8) DEFAULT NULL,
  PRIMARY KEY (`address`,`update_id`),
  UNIQUE KEY `wallet` (`address`,`update_id`),
  KEY `address` (`address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tx_data`
--

CREATE TABLE IF NOT EXISTS `tx_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `txid` varchar(100) NOT NULL,
  `address` varchar(40) NOT NULL,
  `amount` decimal(20,8) NOT NULL,
  `block` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1852136 ;

-- --------------------------------------------------------

--
-- Table structure for table `update`
--

CREATE TABLE IF NOT EXISTS `update` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cryptocurrency` varchar(255) NOT NULL,
  `update` datetime NOT NULL,
  `finished` tinyint(1) DEFAULT '0',
  `last_processed_block` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
