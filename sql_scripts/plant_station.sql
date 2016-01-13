-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 09, 2015 at 07:59 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `plant_station`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_soil`()
BEGIN

INSERT INTO `plant_station`.`soil` (name) VALUES ('loam');
INSERT INTO `plant_station`.`soil` (name) VALUES ('clay');
INSERT INTO `plant_station`.`soil` (name) VALUES ('sand');
INSERT INTO `plant_station`.`soil` (name) VALUES ('loam');


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `new_procedure`()
BEGIN
-- insert user
INSERT INTO user (name, email) values ('Darren', 'darren@xtremecartoon.com');

END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `new_function`() RETURNS int(11)
BEGIN

-- insert a new user
INSERT INTO user (name, email) values ('Darren', 'darren@adrnln.com');

-- 


RETURN 1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
`id` int(11) NOT NULL,
  `created` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `longitude` decimal(5,2) NOT NULL,
  `latitude` decimal(5,2) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `weather_id` int(11) DEFAULT NULL,
  `weather` varchar(255) NOT NULL,
  `soil_id` int(11) DEFAULT NULL,
  `soil` varchar(255) NOT NULL,
  `temperature` int(10) DEFAULT NULL,
  `wind` decimal(5,2) NOT NULL,
  `humidity` int(10) NOT NULL,
  `notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `soil`
--

CREATE TABLE `soil` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL COMMENT 'optional',
  `pass` varchar(128) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `weather`
--

CREATE TABLE `weather` (
`id` int(11) NOT NULL,
  `condition` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
 ADD PRIMARY KEY (`id`), ADD KEY `soil_id_idx` (`soil_id`), ADD KEY `user_id_idx` (`user_id`), ADD KEY `weather_id_idx` (`weather_id`);

--
-- Indexes for table `soil`
--
ALTER TABLE `soil`
 ADD PRIMARY KEY (`id`,`name`), ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`,`email`), ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `weather`
--
ALTER TABLE `weather`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `soil`
--
ALTER TABLE `soil`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `weather`
--
ALTER TABLE `weather`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
