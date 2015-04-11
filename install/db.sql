-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2015 at 01:18 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auto_user`
--

INSERT INTO `auto_user` (`id`, `name`, `username`, `email`, `password`, `emailcode`, `status`, `permission`, `created`, `modified`, `is_delete`) VALUES
(1, 'asd', 'asd', '0', 'a3dcb4d229de6fde0db5686dee47145d', '', 0, 0, '2015-04-10 11:45:10', '0000-00-00 00:00:00', 1),
(2, 'admin', 'admin', 'lanetteam.parthshah@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '551a410d245da', 1, 2, '2015-04-08 06:03:12', '0000-00-00 00:00:00', 0),
(3, 'parth shah', 'parth', '0', 'parth', '', 0, 0, '2015-03-18 09:33:04', '0000-00-00 00:00:00', 0),
(4, 'demoi', 'punita', '0', 'demo', '', 0, 0, '2015-04-07 08:19:15', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
`id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(2, 'surat'),
(5, 'asd'),
(7, 'nnnnnnnnn');

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE IF NOT EXISTS `demo` (
`id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `middle_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `branch` varchar(266) NOT NULL,
  `year` year(4) NOT NULL,
  `status` int(11) NOT NULL,
  `email_code` varchar(256) NOT NULL,
  `permission` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demo`
--

INSERT INTO `demo` (`id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `branch`, `year`, `status`, `email_code`, `permission`, `is_deleted`) VALUES
(1, 'parth', 'demo', 'asd', 'asdq', 'qe', 'asd', 0000, 1, 'sdasd', 1, 1),
(2, 'parth', 'demo', 'asd', 'asdq', 'qe', 'asd', 0000, 1, 'sdasd', 1, 1),
(3, 'parth', 'demo', 'asd', 'asdq', 'qe', 'asd', 0000, 1, 'sdasd', 1, 1),
(4, 'parth', 'demo', 'asd', 'asdq', 'qe', 'asd', 0000, 1, 'sdasd', 1, 1),
(5, 'parth', 'demo', 'asd', 'asdq', 'qe', 'asd', 0000, 1, 'sdasd', 1, 1),
(6, 'parth', 'demo', 'asd', 'asdq', 'qe', 'asd', 0000, 1, 'sdasd', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `demo2`
--

CREATE TABLE IF NOT EXISTS `demo2` (
  `id` int(11) NOT NULL,
  `auto_user_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `title` varchar(256) NOT NULL,
  `title2` varchar(256) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demo2`
--

INSERT INTO `demo2` (`id`, `auto_user_id`, `start_date`, `end_date`, `title`, `title2`, `address`) VALUES
(187, 0, '2015-03-31', '0000-00-00', 'Dolores natus ipsum mollit facilis irure quo soluta voluptas adipisicing eos, quo accusamus fugiat quaerat voluptatum atque excepteur.', '0', ''),
(0, 0, '0000-00-00', '0000-00-00', 'root@localhost', '0.15522042769493574', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `query_param`
--

INSERT INTO `query_param` (`id`, `fields`, `perameter_count`, `auth_key`, `user_id`, `created_at`, `is_delete`, `comment`, `opertation`, `name`) VALUES
(1, '{"fields":["city.id","city.name"],"opertation":"SELECT","pri_tab":"city","opcode":["where"],"f1":["city.id"],"op":["="],"f2":["1"],"groupby":"","orderby":"","custom_query":""}', 1, '', 0, '2015-04-03 05:25:27', 1, '', '', ''),
(3, '{"fields":["auto_user.id","auto_user.name","auto_user.username","auto_user.email","auto_user.status"],"opertation":"SELECT","pri_tab":"auto_user","opcode":["where"],"f1":["status"],"op":["="],"f2":["1"],"groupby":"","orderby":"","custom_query":""}', 0, '', 0, '2015-04-03 05:25:27', 0, '', '', ''),
(5, '{"pri_tab":"auto_user","groupby":"","orderby":"","custom_query":""}', 0, '', 0, '2015-04-03 05:25:27', 0, '', '', ''),
(7, '{"opertation":"SELECT","pri_tab":"auto_user","groupby":"","orderby":"","custom_query":""}', 0, '', 0, '2015-04-03 05:25:27', 0, '', '', ''),
(8, '{"fields":["city.id","city.name"],"opertation":"SELECT","pri_tab":"city","groupby":"","orderby":"","custom_query":""}', 0, 'n9LNqZsH7r', 2, '2015-04-03 05:36:37', 0, '', '', ''),
(9, '{"fields":["city.id","city.name"],"opertation":"SELECT","pri_tab":"city","groupby":"","orderby":"","custom_query":""}', 0, 'ygA1SJD1PS', 2, '2015-04-03 05:39:59', 0, '', '', ''),
(10, '{"fields":["auto_user.name","auto_user.username","auto_user.email"],"opertation":"SELECT","pri_tab":"auto_user","opcode":["where"],"f1":["status"],"op":["="],"f2":["1"],"groupby":"","orderby":"","custom_query":""}', 0, 'oLZSoEf8DE', 2, '2015-04-03 09:29:23', 0, '', '', ''),
(11, '{"fields":["auto_user.name","auto_user.username","auto_user.email"],"opertation":"SELECT","pri_tab":"auto_user","opcode":["having"],"f1":["status"],"op":["="],"f2":["1"],"groupby":"","orderby":"","custom_query":""}', 0, 'GhX6lwogx9', 2, '2015-04-06 09:26:14', 0, '', '', ''),
(12, '{"fields":["auto_user.id","auto_user.name","auto_user.username","auto_user.email","auto_user.password","auto_user.status"],"opertation":"SELECT","pri_tab":"auto_user","groupby":"status","orderby":"id","custom_query":""}', 0, 'ZrDjXdDKnC', 2, '2015-04-06 09:53:38', 0, '', '', ''),
(13, '{"opertation":"CUSTOM","groupby":"","orderby":"","custom_query":"select * from auto_user"}', 0, '15wwWYtBNk', 2, '2015-04-06 10:00:28', 0, '', '', ''),
(14, '{"opertation":"SELECT","pri_tab":"auto_user","jtype":["INNER"],"jopcode":["ON"],"jf1":["auto_user.id"],"jop":["="],"jf2":["query_param.id"],"groupby":"","orderby":"","custom_query":"select * from auto_user","comment":"asd"}', 0, 'EfqA6XE5Lg', 2, '2015-04-06 10:51:15', 0, 'asd', '', ''),
(15, '{"opertation":"SELECT","pri_tab":"auto_user","jtype":["INNER"],"jopcode":["ON"],"jf1":["auto_user.id"],"jop":["="],"jf2":["query_param.id"],"groupby":"","orderby":"","custom_query":"select * from auto_user","comment":"asd"}', 0, 'PQw3EHRZi3', 2, '2015-04-06 10:55:36', 0, 'asd', '', ''),
(16, '{"opertation":"SELECT","pri_tab":"auto_user","jtype":["LEFT"],"jtable":["query_param"],"jopcode":["ON"],"jf1":["auto_user.id"],"jop":["="],"jf2":["query_param.id"],"groupby":"","orderby":"","custom_query":"","comment":"Join trial"}', 0, 'IQ4IkShubt', 2, '2015-04-06 11:01:11', 0, 'Join trial', '', ''),
(17, '{"fields":["auto_user.id","auto_user.name","auto_user.username","city.id","city.name"],"opertation":"SELECT","pri_tab":"auto_user","jtype":["LEFT"],"jtable":["city"],"jopcode":["ON"],"jf1":["auto_user.id"],"jop":["="],"jf2":["city.id"],"groupby":"","orderby":"","ins_auto_user_id":"","ins_city_id":"","ins_auto_user_name":"","ins_city_name":"","ins_auto_user_username":"","custom_query":"","comment":"demo"}', 0, 'WdG94lQNO9', 2, '2015-04-06 11:03:51', 0, 'demo', '', ''),
(18, '{"opertation":"SELECT","opcode":["where"],"f1":["id"],"op":["="],"f2":["??1??"],"groupby":"","orderby":"","custom_query":"","comment":""}', 1, '83D0Kge6qO', 2, '2015-04-06 11:42:52', 0, '', '', ''),
(19, '{"fields":["auto_user.id","auto_user.name","auto_user.username","auto_user.email"],"opertation":"SELECT","pri_tab":"auto_user","opcode":["where"],"f1":["id"],"op":["="],"f2":["??1??"],"groupby":"","orderby":"","ins_auto_user_id":"","ins_auto_user_name":"","ins_auto_user_username":"","ins_auto_user_email":"","custom_query":"","comment":""}', 1, 'mvyAnyuV1e', 2, '2015-04-06 11:43:48', 0, '', '', ''),
(20, '{"fields":["auto_user.name","auto_user.username","auto_user.email","auto_user.status"],"opertation":"SELECT","pri_tab":"auto_user","opcode":["where"],"f1":["status"],"op":["="],"f2":["1"],"groupby":"","orderby":"","city_id":"","city_name":"","auto_user_name":"","auto_user_username":"","auto_user_email":"","auto_user_status":"","custom_query":"","comment":"For demo"}', 0, 'ds3T6i9gzJ', 2, '2015-04-07 06:59:36', 0, 'For demo', '', ''),
(21, '{"fields":["auto_user.id","auto_user.name","auto_user.username","auto_user.email"],"opertation":"SELECT","pri_tab":"auto_user","opcode":["where"],"f1":["id"],"op":["="],"f2":["??1??"],"groupby":"","orderby":"","auto_user_id":"","auto_user_name":"","auto_user_username":"","auto_user_email":"","custom_query":"","comment":""}', 1, 'g5H3rEWhE2', 2, '2015-04-07 07:15:40', 0, '', '', ''),
(22, '{"opertation":"SELECT","pri_tab":"auto_user","opcode":["where"],"f1":["username"],"op":["="],"f2":["punita"],"groupby":"","orderby":"","custom_query":"","comment":""}', 0, 'wG0uaQDGJX', 2, '2015-04-07 08:18:54', 0, '', '', ''),
(23, '{"fields":["query_param.id"],"opertation":"DELETE","pri_tab":"query_param","opcode":["where"],"f1":["id"],"op":["="],"f2":["5"],"groupby":"","orderby":"","query_param_id":"","custom_query":"","comment":""}', 0, 'Rcj3rWiqVe', 2, '2015-04-08 06:21:45', 0, '', '', ''),
(24, '{"fields":["auto_user.id","city.id"],"opertation":"DELETE","pri_tab":"auto_user","opcode":["where"],"f1":["auto_user.id"],"op":["="],"f2":["5"],"jtype":["LEFT"],"jtable":["city"],"jopcode":["ON"],"jf1":["city.id"],"jop":["="],"jf2":["auto_user.id"],"groupby":"","orderby":"","auto_user_id":"","city_id":"","custom_query":"","comment":"join delete"}', 0, 'Hdb9n4Whk9', 2, '2015-04-08 06:40:25', 0, 'join delete', '', ''),
(25, '{"fields":["auto_user.name","auto_user.username","auto_user.email"],"opertation":"INSERT","pri_tab":"auto_user","groupby":"","orderby":"","auto_user_name":"asd","auto_user_username":"asd","auto_user_email":"asd","custom_query":"","comment":""}', 0, 'Hv4EMglqTF', 2, '2015-04-08 06:52:30', 0, '', '', ''),
(26, '{"fields":["city.id","city.name"],"opertation":"INSERT","pri_tab":"city","groupby":"","orderby":"","city_id":"11","city_name":"11111111","custom_query":"","comment":"asd"}', 0, 'Q1spUggDrl', 2, '2015-04-08 09:06:51', 0, 'asd', '', ''),
(27, '{"fields":["city.id"],"opertation":"UPDATE","pri_tab":"city","groupby":"","orderby":"","city_id":"2","opcode":["where"],"f1":["city.id"],"op":["="],"f2":["11"],"custom_query":"","comment":"update demo"}', 0, 'WWrn94PKBU', 2, '2015-04-08 09:34:04', 0, 'update demo', '', ''),
(28, '{"fields":["city.name"],"opertation":"UPDATE","pri_tab":"city","groupby":"","orderby":"","city_name":"surat","opcode":["where"],"f1":["city.id"],"op":["="],"f2":["2"],"custom_query":"","comment":"update"}', 0, 'YCX82Bbdwi', 2, '2015-04-08 09:36:25', 0, 'update', '', ''),
(29, '{"fields":["auto_user.name","auto_user.username"],"opertation":"SELECT","pri_tab":"auto_user","groupby":"","orderby":"id","ascdesc":"desc","auto_user_name":"","auto_user_username":"","custom_query":"","comment":"Test select","name":"selectusername"}', 0, 'WhhA14nZuB', 2, '2015-04-09 05:26:26', 0, 'Test select', 'SELECT', 'selectusername'),
(30, '{"fields":["city.id","city.name"],"opertation":"INSERT","pri_tab":"city","groupby":"","orderby":"","ascdesc":"asc","city_id":"","city_name":"??1??","custom_query":"","comment":"Demo insert","name":"insertcity"}', 1, 'J01MP8crWs', 2, '2015-04-09 05:29:35', 0, 'Demo insert', 'INSERT', 'insertcity'),
(31, '{"fields":["city.name"],"opertation":"UPDATE","pri_tab":"city","groupby":"","orderby":"","ascdesc":"asc","city_name":"??2??","opcode":["where"],"f1":["id"],"op":["="],"f2":["??1??"],"custom_query":"","comment":"1=id\\n2=city","name":"updatecity"}', 2, '7nFZZQP8O6', 2, '2015-04-09 05:41:37', 0, '1=id\n2=city', 'UPDATE', 'updatecity'),
(32, '{"fields":["city.id"],"opertation":"DELETE","pri_tab":"city","opcode":["where"],"f1":["id"],"op":["="],"f2":["??1??"],"groupby":"","orderby":"","ascdesc":"asc","city_id":"","custom_query":"","comment":"1=id","name":"deletecity"}', 1, 'Y70kYP58vs', 2, '2015-04-09 05:44:11', 0, '1=id', 'DELETE', 'deletecity'),
(33, '{"fields":["auto_user.id","auto_user.username","query_param.id","query_param.auth_key","query_param.user_id","query_param.comment","query_param.opertation","query_param.name"],"opertation":"SELECT","pri_tab":"auto_user","jtype":["LEFT"],"jtable":["auto_user"],"jopcode":["ON"],"jf1":["auto_user.id"],"jop":["="],"jf2":["query_param.user_id"],"groupby":"","orderby":"","ascdesc":"asc","query_param_id":"","query_param_auth_key":"","query_param_user_id":"","query_param_comment":"","query_param_name":"","query_param_opertation":"","auto_user_username":"","auto_user_id":"","custom_query":"","comment":"Get api list with username","name":"apidetails"}', 0, 'M6Oro6GVc8', 2, '2015-04-09 05:54:15', 0, 'Get api list with username', 'SELECT', 'apidetails'),
(34, '{"fields":["auto_user.username","query_param.id","query_param.auth_key","query_param.user_id","query_param.comment","query_param.opertation","query_param.name"],"opertation":"SELECT","pri_tab":"auto_user","jtype":["INNER"],"jtable":["query_param"],"jopcode":["ON"],"jf1":["auto_user.id"],"jop":["="],"jf2":["query_param.user_id"],"groupby":"","orderby":"","ascdesc":"asc","auto_user_username":"","query_param_id":"","query_param_user_id":"","query_param_auth_key":"","query_param_comment":"","query_param_opertation":"","query_param_name":"","custom_query":"","comment":"apidetails with username","name":"apidetail"}', 0, 'BXQcaDBgTv', 2, '2015-04-09 05:55:57', 0, 'apidetails with username', 'SELECT', 'apidetail'),
(35, '{"fields":["auto_user.name"],"opertation":"UPDATE","pri_tab":"auto_user","groupby":"","orderby":"","ascdesc":"asc","auto_user_name":"","opcode":["where"],"f1":["name"],"op":["LIKE"],"f2":["??1??"],"custom_query":"","comment":"name like","name":"searchname"}', 1, '7op2xP35nl', 2, '2015-04-09 09:56:22', 0, 'name like', 'UPDATE', 'searchname'),
(36, '{"fields":["auto_user.name","auto_user.username","auto_user.email"],"opertation":"SELECT","pri_tab":"auto_user","opcode":["where"],"f1":["name"],"op":["LIKE"],"f2":["??1??"],"groupby":"","orderby":"","ascdesc":"asc","auto_user_name":"","auto_user_username":"","auto_user_email":"","custom_query":"","comment":"namelike","name":"searchname"}', 1, '8lGK3Phl4z', 2, '2015-04-09 09:58:05', 0, 'namelike', 'SELECT', 'searchname'),
(37, '{"fields":["auto_user.id","auto_user.name","auto_user.username","auto_user.email","auto_user.password","auto_user.emailcode","auto_user.status"],"opertation":"SELECT","pri_tab":"auto_user","groupby":"","orderby":"","ascdesc":"asc","auto_user_id":"","auto_user_name":"","auto_user_username":"","auto_user_email":"","auto_user_password":"","auto_user_emailcode":"","auto_user_status":"","custom_query":"","comment":"select all","name":"select_auto_user"}', 0, 'CXrxQ31E8m', 2, '2015-04-09 11:00:35', 0, 'select all', 'SELECT', 'select_auto_user'),
(38, '{"fields":["auto_user.name"],"opertation":"SELECT","pri_tab":"auto_user","groupby":"","orderby":"","ascdesc":"asc","auto_user_name":"","custom_query":"","comment":"asdasd","name":"asd asd q qew123"}', 0, 'i7Qi6fwTrA', 2, '2015-04-09 11:10:08', 0, 'asdasd', 'SELECT', 'asdasdqqew123'),
(39, '{"fields":["auto_user.id","auto_user.name","auto_user.username","auto_user.email"],"opertation":"SELECT","pri_tab":"auto_user","opcode":["where"],"f1":["id"],"op":["="],"f2":["??1??"],"groupby":"","orderby":"","ascdesc":"asc","auto_user_name":"","auto_user_username":"","auto_user_email":"","auto_user_id":"","custom_query":"","comment":"demo","name":"datademo"}', 1, 'v9z11tUZlG', 2, '2015-04-11 06:43:18', 0, 'demo', 'SELECT', 'datademo'),
(40, '{"fields":["auto_user.id","auto_user.name","auto_user.username","auto_user.email"],"opertation":"SELECT","pri_tab":"auto_user","opcode":["where","or_where"],"f1":["id","id"],"op":["=","="],"f2":["??1??","??2??"],"groupby":"","orderby":"","ascdesc":"asc","auto_user_name":"","auto_user_username":"","auto_user_email":"","auto_user_id":"","custom_query":"","comment":"1or2","name":"1or2"}', 2, 'XUo7jM6gwn', 2, '2015-04-11 08:50:02', 0, '1or2', 'SELECT', '1or2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auto_user`
--
ALTER TABLE `auto_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demo`
--
ALTER TABLE `demo`
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `demo`
--
ALTER TABLE `demo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `query_param`
--
ALTER TABLE `query_param`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
