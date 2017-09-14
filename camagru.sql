-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 04, 2017 at 04:49 AM
-- Server version: 5.7.11
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camagru`
--

-- --------------------------------------------------------

--
-- Table structure for table `jm`
--

CREATE TABLE `jm` (
  `id-jm` int(11) NOT NULL,
  `id-photo` int(11) NOT NULL,
  `id-user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komentair`
--

CREATE TABLE `komentair` (
  `id-kom` int(11) NOT NULL,
  `id-user` int(11) NOT NULL,
  `id-photo` int(11) NOT NULL,
  `chankometair` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `id-proprio` int(11) NOT NULL,
  `url photo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(10) NOT NULL,
  `mdp` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jm`
--
ALTER TABLE `jm`
  ADD PRIMARY KEY (`id-jm`);

--
-- Indexes for table `komentair`
--
ALTER TABLE `komentair`
  ADD PRIMARY KEY (`id-kom`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jm`
--
ALTER TABLE `jm`
  MODIFY `id-jm` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `komentair`
--
ALTER TABLE `komentair`
  MODIFY `id-kom` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
