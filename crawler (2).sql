-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 24, 2013 at 10:56 PM
-- Server version: 5.5.32
-- PHP Version: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crawler`
--

-- --------------------------------------------------------

--
-- Table structure for table `searches`
--

CREATE TABLE IF NOT EXISTS `searches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) COLLATE utf8_bin NOT NULL,
  `link` varchar(1000) COLLATE utf8_bin NOT NULL,
  `crawled` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `searches`
--

INSERT INTO `searches` (`id`, `name`, `link`, `crawled`, `user_id`, `created`, `modified`) VALUES
(2, 'test', 'test', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `search_results`
--

CREATE TABLE IF NOT EXISTS `search_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `search_id` int(11) NOT NULL,
  `link` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `twitter` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `facebook` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `crawled` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `search_id` (`search_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `search_results`
--

INSERT INTO `search_results` (`id`, `search_id`, `link`, `name`, `website`, `phone`, `mobile`, `email`, `twitter`, `facebook`, `address`, `crawled`, `created`, `modified`) VALUES
(2, 2, 'http://www.burnhamlawgroup.com/', 'name', 'http://www.burnhamlawgroup.com/', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) COLLATE utf8_bin NOT NULL,
  `password` varchar(200) COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created`, `modified`) VALUES
(1, 'zoki', 'zoki', 'zoki@test.com', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `searches`
--
ALTER TABLE `searches`
  ADD CONSTRAINT `searches_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `search_results`
--
ALTER TABLE `search_results`
  ADD CONSTRAINT `search_results_ibfk_1` FOREIGN KEY (`search_id`) REFERENCES `searches` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
