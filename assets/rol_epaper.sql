-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2017 at 09:52 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rol_epaper`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE IF NOT EXISTS `attachment` (
`id_attachment` int(11) NOT NULL,
  `attachment` varchar(500) NOT NULL,
  `id_magz_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `magazine`
--

CREATE TABLE IF NOT EXISTS `magazine` (
`id_magazine` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magazine`
--

INSERT INTO `magazine` (`id_magazine`, `title`, `content`, `date`, `image`) VALUES
(4, 'coba2', 'sdgwgvrvv', '2017-06-05', '5_ramadan_wallpaper_preview.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `magazine_detail`
--

CREATE TABLE IF NOT EXISTS `magazine_detail` (
`id_magz_detail` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `page` int(11) NOT NULL,
  `author` varchar(500) NOT NULL,
  `id_magazine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
 ADD PRIMARY KEY (`id_attachment`);

--
-- Indexes for table `magazine`
--
ALTER TABLE `magazine`
 ADD PRIMARY KEY (`id_magazine`);

--
-- Indexes for table `magazine_detail`
--
ALTER TABLE `magazine_detail`
 ADD PRIMARY KEY (`id_magz_detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
MODIFY `id_attachment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `magazine`
--
ALTER TABLE `magazine`
MODIFY `id_magazine` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `magazine_detail`
--
ALTER TABLE `magazine_detail`
MODIFY `id_magz_detail` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
