-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2015 at 07:14 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `admin_automator`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcolumn`(IN `tbl` VARCHAR(256))
    NO SQL
BEGIN
    SET @s = CONCAT('describe ',tbl );
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `gettables`()
    NO SQL
begin
show tables;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `auto_user`
--

CREATE TABLE IF NOT EXISTS `auto_user` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(111) NOT NULL,
  `password` varchar(256) NOT NULL,
  `emailcode` varchar(256) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `permission` int(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auto_user`
--

INSERT INTO `auto_user` (`id`, `name`, `username`, `email`, `password`, `emailcode`, `status`, `permission`, `created`, `modified`, `is_delete`) VALUES
(1, 'Admin', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '552ca18146356', 1, 2, '2015-04-14 05:11:29', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `query_param`
--

CREATE TABLE IF NOT EXISTS `query_param` (
`id` int(11) NOT NULL,
  `fields` text NOT NULL,
  `perameter_count` int(11) NOT NULL DEFAULT '0',
  `auth_key` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `opertation` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auto_user`
--
ALTER TABLE `auto_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query_param`
--
ALTER TABLE `query_param`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auto_user`
--
ALTER TABLE `auto_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `query_param`
--
ALTER TABLE `query_param`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
