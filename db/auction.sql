-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2016 at 03:15 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE IF NOT EXISTS `bookmarks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `url` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_key` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `user_id`, `title`, `description`, `url`, `created`, `modified`) VALUES
(1, 1, 'CakePHP', 'Build Fast, Grow Solid', 'http://cakephp.org', '2016-12-01 03:12:11', '2016-12-01 03:12:11'),
(2, 1, 'Mozilla', 'Internet for People, Not Profit', 'http://mozilla.org', '2016-12-01 03:13:03', '2016-12-01 03:13:03'),
(3, 1, 'LetsEncrypt', 'Free open Certificate Authority', 'https://letsencrypt.org', '2016-12-01 03:14:08', '2016-12-01 03:14:08'),
(4, 1, 'CakePHP API', 'API for CakePHP', 'http://api.cakephp.org', '2016-12-01 03:14:53', '2016-12-01 03:14:53'),
(5, 1, 'Mozilla Developer Network', 'MDN', 'https://developer.mozilla.org/en-US/', '2016-12-01 03:15:22', '2016-12-01 03:15:22'),
(6, 2, 'Title1', 'Description1', 'www.google.com', '2016-12-23 03:52:11', '2016-12-23 03:52:11');

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks_tags`
--

CREATE TABLE IF NOT EXISTS `bookmarks_tags` (
  `bookmark_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`bookmark_id`,`tag_id`),
  KEY `tag_key` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookmarks_tags`
--

INSERT INTO `bookmarks_tags` (`bookmark_id`, `tag_id`) VALUES
(1, 1),
(1, 2),
(4, 2),
(1, 3),
(2, 4),
(3, 4),
(5, 4),
(2, 5),
(2, 6),
(2, 7),
(3, 8),
(3, 9),
(4, 10),
(5, 10),
(6, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `created`, `modified`) VALUES
(1, 'php', '2016-12-01 03:12:11', '2016-12-01 03:12:11'),
(2, 'cakephp', '2016-12-01 03:12:11', '2016-12-01 03:12:11'),
(3, 'development', '2016-12-01 03:12:11', '2016-12-01 03:12:11'),
(4, 'opensource', '2016-12-01 03:13:03', '2016-12-01 03:13:03'),
(5, 'firefox', '2016-12-01 03:13:03', '2016-12-01 03:13:03'),
(6, 'rust', '2016-12-01 03:13:03', '2016-12-01 03:13:03'),
(7, 'servo', '2016-12-01 03:13:03', '2016-12-01 03:13:03'),
(8, 'ssl', '2016-12-01 03:14:08', '2016-12-01 03:14:08'),
(9, 'security', '2016-12-01 03:14:08', '2016-12-01 03:14:08'),
(10, 'documentation', '2016-12-01 03:14:53', '2016-12-01 03:14:53'),
(11, 'Tag1', '2016-12-23 03:52:11', '2016-12-23 03:52:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created`, `modified`) VALUES
(1, 'khaled_sfl@yahoo.com', '$2y$10$mC71iGlr.MzYoueQDoOmcOHIq3621JHfUhLy.jT2fvH2fx.6ACwou', '2016-12-01 03:10:35', '2016-12-01 03:10:35'),
(2, 'khaled_sfl@yahoo.com', '$2y$10$tzFAyNGyp9Zvegk43w3fyu0HiBx6XrvwjojEn9xjNItjsXTpT3wmS', '2016-12-23 03:49:21', '2016-12-23 03:49:21');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `bookmarks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `bookmarks_tags`
--
ALTER TABLE `bookmarks_tags`
  ADD CONSTRAINT `bookmarks_tags_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
  ADD CONSTRAINT `bookmarks_tags_ibfk_2` FOREIGN KEY (`bookmark_id`) REFERENCES `bookmarks` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
