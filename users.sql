-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2015 at 05:10 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `travelapp_db15`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
  `permission` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `remember_token` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `lms_users`
--

INSERT INTO `users` (`id`, `first`, `last`, `password`, `permission`, `email`, `birthday`, `country`, `token`, `published`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'liu', 'yunfei', '$2y$10$RQg91yxe4IzY8YQiGt6aZeoFpGVrcPeSS/A7JVh9litti/DrFvLmW', 'administrator', 'hym@gmail.com', '', '', '', 1, '2015-05-10 09:21:10', '0000-00-00 00:00:00', ''),
(2, 'teacher', 'teacher', '$2y$10$.sPGKomVCeg2O0EeVCzDnuDCA9MQluJhB8Vq8d5G1Fz6.5YhCHdM2', 'teacher', 'teacher@gmail.com', '', '', '', 1, '2015-05-10 09:21:10', '0000-00-00 00:00:00', ''),
(3, 'student', 'student', '$2y$10$i3bKhFw/qAT3T/x6cLAfKedNfijtn1pt5o5kh3CpSiP4.ZVk/h/Kq', 'student', 'student@gmail.com', '', '', '', 0, '2015-05-10 09:21:10', '0000-00-00 00:00:00', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
