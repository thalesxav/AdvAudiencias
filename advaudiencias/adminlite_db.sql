-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 27, 2019 at 05:07 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_adminlite_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_admin`
--

DROP TABLE IF EXISTS `ci_admin`;
CREATE TABLE IF NOT EXISTS `ci_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_role_id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `image` varchar(300) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `is_verify` tinyint(4) NOT NULL DEFAULT '1',
  `is_admin` tinyint(4) NOT NULL DEFAULT '1',
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `is_supper` tinyint(4) NOT NULL DEFAULT '0',
  `token` varchar(255) NOT NULL,
  `password_reset_code` varchar(255) NOT NULL,
  `last_ip` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_admin`
--

INSERT INTO `ci_admin` (`admin_id`, `admin_role_id`, `username`, `firstname`, `lastname`, `email`, `mobile_no`, `image`, `password`, `last_login`, `is_verify`, `is_admin`, `is_active`, `is_supper`, `token`, `password_reset_code`, `last_ip`, `created_at`, `updated_at`) VALUES
(24, 1, 'superadmin', 'SuperAdmin', 'User', 'sa@g.com', '324234234', 'ff993fc6bcf2d42a9f4e42446d8e45ea.png', '$2y$10$7Oi1GNFZbgD0W5/hiqw3Auu1wAsbBHHI.VugQamXAwvd4xO51XedK', '2019-01-04 11:18:36', 1, 1, 1, 1, '', '', '', '2018-03-17 00:00:00', '2019-01-26 08:01:50'),
(25, 2, 'admin', 'Admin', 'User', 'admin@gmail.com', '544354353', '', '$2y$10$qlAzDhBEqkKwP3OykqA7N.ZQk6T67fxD9RHfdv3zToxa9Mtwu9C/e', '2019-01-09 00:00:00', 1, 1, 1, 0, '', '', '', '2018-03-19 00:00:00', '2019-01-16 23:33:26'),
(26, 3, 'bush', 'jorge', 'bush', 'bush@gmail.com', '5446546545665', '1c576d254c9f8a23c9243702bdb45a11.png', '$2y$10$qlAzDhBEqkKwP3OykqA7N.ZQk6T67fxD9RHfdv3zToxa9Mtwu9C/e', '2018-11-01 09:46:23', 1, 1, 1, 0, '', '', '', '2018-03-19 00:00:00', '2019-01-26 02:01:11'),
(27, 5, 'schoo43543', 'rewr', 'erew', 'erew@dfsfs', 'ewre43543', '', '0a7eab610f12cb73aa0a4aa7c0acf691', '2019-01-02 00:00:00', 1, 1, 0, 0, '', '', '', '2018-03-18 00:00:00', '2019-01-16 23:33:26'),
(29, 4, 'mangoman', 'Mango', 'Man', 'mangoman@gmail.com', '06985214562', '', '698d51a19d8a121ce581499d7b701668', '2019-01-03 00:00:00', 1, 1, 1, 0, '', '', '', '2018-03-15 00:00:00', '2019-01-26 02:01:16'),
(30, 2, 'johnsmith', 'John', 'Smith', 'johnsmith@gmail.com', '9940314725', '38f33530cd54631c5e43a8fca3510a10.jpg', 'f15e7aff5767e72157587302eea58bf4', '2018-04-05 17:00:47', 1, 1, 1, 0, '', '', '', '2018-04-04 00:00:00', '2019-01-27 08:01:44'),
(31, 6, 'naumanit', 'Nauman', 'Ahmed', 'naumanahmedcs@gmail.com', '123456', '', '$2y$10$Yic.I/YRnKVycqPIJW5O2er1wTiHtIt7SMXQnNI6oH9XH5Ap8vrgS', '0000-00-00 00:00:00', 1, 1, 0, 0, '', '', '', '2019-01-16 06:01:58', '2019-01-26 09:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `ci_admin_roles`
--

DROP TABLE IF EXISTS `ci_admin_roles`;
CREATE TABLE IF NOT EXISTS `ci_admin_roles` (
  `admin_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_role_title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `admin_role_status` int(11) NOT NULL,
  `admin_role_created_by` int(1) NOT NULL,
  `admin_role_created_on` datetime NOT NULL,
  `admin_role_modified_by` int(11) NOT NULL,
  `admin_role_modified_on` datetime NOT NULL,
  PRIMARY KEY (`admin_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_admin_roles`
--

INSERT INTO `ci_admin_roles` (`admin_role_id`, `admin_role_title`, `admin_role_status`, `admin_role_created_by`, `admin_role_created_on`, `admin_role_modified_by`, `admin_role_modified_on`) VALUES
(1, 'Super Admin', 1, 0, '2018-03-15 12:48:04', 0, '2018-03-17 12:53:16'),
(2, 'Admin', 1, 0, '2018-03-15 12:53:19', 0, '2019-01-26 08:27:34'),
(3, 'Accountant', 1, 0, '2018-03-15 01:46:54', 0, '2019-01-26 02:17:38'),
(4, 'Operator', 1, 0, '2018-03-16 05:52:45', 0, '2019-01-26 02:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `ci_companies`
--

DROP TABLE IF EXISTS `ci_companies`;
CREATE TABLE IF NOT EXISTS `ci_companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_companies`
--

INSERT INTO `ci_companies` (`id`, `name`, `email`, `mobile_no`, `address1`, `address2`, `created_date`) VALUES
(9, 'Codeglamour', 'codeglamour1@gmail.com', '44785566952', '27 new jersey - Level 58 - CA 444 United State ', '', '2018-04-26 09:04:18'),
(8, 'Codeglamour', 'codeglamour1@gmail.com', '44785566952', '27 new jersey - Level 58 - CA 444 United State ', '', '2018-04-26 09:04:30'),
(7, 'Codeglamour', 'codeglamour1@gmail.com', '44785566952', '27 new jersey - Level 58 - CA 444 United State ', '', '2018-04-26 09:04:59'),
(6, 'Codeglamour', 'codeglamour1@gmail.com', '44785566952', '27 new jersey - Level 58 - CA 444  United State LLC', '', '2017-12-11 08:12:15'),
(10, 'Codeglamour', 'codeglamour1@gmail.com', '44785566952', '27 new jersey - Level 58 - CA 444 United State ', '', '2019-01-27 10:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `ci_payments`
--

DROP TABLE IF EXISTS `ci_payments`;
CREATE TABLE IF NOT EXISTS `ci_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `invoice_no` varchar(30) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `items_detail` longtext NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `total_tax` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `client_note` longtext NOT NULL,
  `termsncondition` longtext NOT NULL,
  `due_date` date NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_payments`
--

INSERT INTO `ci_payments` (`id`, `admin_id`, `user_id`, `company_id`, `invoice_no`, `txn_id`, `items_detail`, `sub_total`, `total_tax`, `discount`, `grand_total`, `currency`, `payment_method`, `payment_status`, `client_note`, `termsncondition`, `due_date`, `created_date`, `updated_date`) VALUES
(4, 3, 34, 9, 'INV-2001', '', 'a:5:{s:19:\"product_description\";a:1:{i:0;s:17:\"Samsung Galaxy S3\";}s:8:\"quantity\";a:1:{i:0;s:1:\"1\";}s:5:\"price\";a:1:{i:0;s:4:\"1000\";}s:3:\"tax\";a:1:{i:0;s:1:\"2\";}s:5:\"total\";a:1:{i:0;s:7:\"1000.00\";}}', '1000.00', '20.00', '5.00', '1015.00', 'USD', '', 'Paid', 'Will be delivered within next 24 hours', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-11-29', '2017-12-06', '2018-04-26'),
(2, 3, 32, 7, 'INV-1001', '', 'a:5:{s:19:\"product_description\";a:2:{i:0;s:9:\"Galaxy S6\";i:1;s:9:\"Galaxy S5\";}s:8:\"quantity\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}s:5:\"price\";a:2:{i:0;s:4:\"1000\";i:1;s:3:\"800\";}s:3:\"tax\";a:2:{i:0;s:1:\"5\";i:1;s:1:\"5\";}s:5:\"total\";a:2:{i:0;s:7:\"1000.00\";i:1;s:6:\"800.00\";}}', '1800.00', '90.00', '2.00', '1888.00', 'USD', '', 'Paid', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-12-20', '2017-12-12', '2018-04-26'),
(3, 3, 33, 8, 'INV-2002', '', 'a:5:{s:19:\"product_description\";a:1:{i:0;s:17:\"Samsung Galaxy S3\";}s:8:\"quantity\";a:1:{i:0;s:1:\"1\";}s:5:\"price\";a:1:{i:0;s:2:\"10\";}s:3:\"tax\";a:1:{i:0;s:1:\"2\";}s:5:\"total\";a:1:{i:0;s:5:\"10.00\";}}', '10.00', '0.20', '1.00', '9.20', 'USD', '', 'Paid', 'test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-12-06', '2017-12-06', '2018-04-26'),
(5, 24, 3, 10, '10021', '', 'a:5:{s:19:\"product_description\";a:2:{i:0;s:9:\"Galaxy S7\";i:1;s:9:\"Galaxy S8\";}s:8:\"quantity\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"3\";}s:5:\"price\";a:2:{i:0;s:3:\"300\";i:1;s:3:\"700\";}s:3:\"tax\";a:2:{i:0;s:1:\"0\";i:1;s:1:\"2\";}s:5:\"total\";a:2:{i:0;s:6:\"300.00\";i:1;s:7:\"2100.00\";}}', '2400.00', '42.00', '1.00', '2441.00', 'USD', '', 'Paid', 'Will be delivered on next Friday', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-04-20', '2018-04-11', '2019-01-27');

-- --------------------------------------------------------

--
-- Table structure for table `ci_users`
--

DROP TABLE IF EXISTS `ci_users`;
CREATE TABLE IF NOT EXISTS `ci_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '1',
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_verify` tinyint(4) NOT NULL DEFAULT '0',
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `token` varchar(255) NOT NULL,
  `password_reset_code` varchar(255) NOT NULL,
  `last_ip` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_users`
--

INSERT INTO `ci_users` (`id`, `username`, `firstname`, `lastname`, `email`, `mobile_no`, `password`, `address`, `role`, `is_active`, `is_verify`, `is_admin`, `token`, `password_reset_code`, `last_ip`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'admin', 'admin', 'admin@admin.com', '12345', '$2y$10$qlAzDhBEqkKwP3OykqA7N.ZQk6T67fxD9RHfdv3zToxa9Mtwu9C/e', '27 new jersey - Level 58 - CA 444 \r\nUnited State ', 1, 1, 1, 1, '', '', '', '2017-09-29 10:09:44', '2017-12-14 10:12:41'),
(32, 'user', 'user', 'user', 'user@user.com', '44897866462', '$2y$10$sU5msVdifYie7cZbCEnyku6hLH8Sef0VCHqO9UIOg6rsBsDtsLcyS', '', 1, 1, 1, 0, '352fe25daf686bdb4edca223c921acea', '', '', '2018-04-24 07:04:07', '2019-01-26 03:01:30'),
(33, 'john123', 'john', 'smith', 'johnsmith@gmail.com', '445889654656', '$2y$10$CcBiQrcW597s5muOP2blhOev48gzBv2VvAVp83NsXbLo7cZM7tjGm', 'USA', 7, 1, 0, 0, '', '', '', '2018-04-25 06:04:25', '2019-01-24 04:01:33'),
(34, 'naumancs', 'nauman', 'ahmed', 'nacreativeprogrammer@gmail.com', '4456545632215', '$2y$10$Mo6FHIusHr9oDWZxJPaTC.DWZBRom7SfEryk66BbXs25OLYsmKkrK', '', 1, 1, 1, 0, '', '', '', '2018-04-25 07:04:12', '2018-04-25 07:04:28'),
(35, 'alire', 'ali', 'raza', 'ali@gmail.com', '12345', '$2y$10$fq5VZXpOxnzv7uZADBSBA.cg1fip8xRDuoTAsuLC8O5SHGYTjgZXG', 'wwe', 1, 1, 0, 0, '', '', '', '2019-01-24 05:01:14', '2019-01-24 05:01:14'),
(36, 'zohaib', 'zohaib', 'rana', 'zohaibrana@gmail.com', '12345988444', '$2y$10$UGpdlIob/e1gBsE2yQ/OEeqKwGGymuYFlhHogw19/SgQYRo2OqA/S', 'wwe', 1, 1, 0, 0, '', '', '', '2019-01-24 05:01:01', '2019-01-24 05:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) NOT NULL,
  `controller_name` varchar(255) NOT NULL,
  `fa_icon` varchar(100) NOT NULL,
  `operation` text NOT NULL,
  `sort_order` tinyint(4) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_id`, `module_name`, `controller_name`, `fa_icon`, `operation`, `sort_order`) VALUES
(1, 'Admin List', 'admin', '', 'view|add|edit|delete|change_status|access', 0),
(2, 'Role & Permissions', 'admin_roles', '', 'view|add|edit|delete|change_status|access', 0),
(3, 'User Manage', 'users', '', 'view|add|edit|delete|change_status|access', 0),
(4, 'Invoice List', 'invoices', '', 'view|add|edit|delete|access', 0),
(5, 'CI Examples', 'example', '', 'access', 0),
(6, 'Joins', 'joins', '', 'access', 0),
(7, 'Export', 'export', '', 'access', 0);

-- --------------------------------------------------------

--
-- Table structure for table `module_access`
--

DROP TABLE IF EXISTS `module_access`;
CREATE TABLE IF NOT EXISTS `module_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_role_id` int(11) NOT NULL,
  `module` varchar(255) NOT NULL,
  `operation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `RoleId` (`admin_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_access`
--

INSERT INTO `module_access` (`id`, `admin_role_id`, `module`, `operation`) VALUES
(1, 1, 'admin', 'view'),
(2, 1, 'admin', 'add'),
(3, 1, 'admin', 'edit'),
(4, 1, 'admin', 'delete'),
(5, 1, 'admin', 'change_status'),
(6, 1, 'admin', 'access'),
(7, 1, 'admin_roles', 'view'),
(8, 1, 'admin_roles', 'add'),
(9, 1, 'admin_roles', 'edit'),
(10, 1, 'admin_roles', 'delete'),
(11, 1, 'admin_roles', 'change_status'),
(12, 1, 'admin_roles', 'access'),
(13, 1, 'users', 'view'),
(14, 1, 'users', 'add'),
(15, 1, 'users', 'edit'),
(16, 1, 'users', 'delete'),
(17, 1, 'users', 'change_status'),
(18, 1, 'users', 'access'),
(23, 1, 'invoices', 'view'),
(24, 1, 'invoices', 'add'),
(25, 1, 'invoices', 'edit'),
(26, 1, 'invoices', 'delete'),
(27, 1, 'invoices', 'access'),
(28, 1, 'example', 'access'),
(29, 1, 'joins', 'access'),
(30, 1, 'export', 'access'),
(31, 2, 'admin', 'view'),
(35, 2, 'admin', 'access'),
(36, 2, 'users', 'view'),
(37, 2, 'users', 'add'),
(38, 2, 'users', 'edit'),
(39, 2, 'users', 'delete'),
(40, 2, 'invoices', 'delete'),
(41, 2, 'invoices', 'edit'),
(42, 2, 'invoices', 'add'),
(43, 2, 'invoices', 'view'),
(44, 2, 'invoices', 'access'),
(45, 2, 'example', 'access'),
(46, 2, 'joins', 'access'),
(47, 2, 'export', 'access'),
(48, 3, 'users', 'view'),
(49, 3, 'users', 'add'),
(50, 3, 'users', 'edit'),
(51, 3, 'users', 'delete'),
(52, 3, 'users', 'change_status'),
(53, 3, 'users', 'access'),
(54, 3, 'invoices', 'view'),
(55, 3, 'invoices', 'access'),
(56, 3, 'invoices', 'add'),
(57, 3, 'invoices', 'delete'),
(58, 3, 'invoices', 'edit'),
(59, 3, 'example', 'access'),
(60, 3, 'joins', 'access'),
(61, 3, 'export', 'access'),
(62, 4, 'users', 'view'),
(63, 4, 'users', 'add'),
(64, 4, 'users', 'edit'),
(65, 4, 'users', 'delete'),
(66, 4, 'users', 'access'),
(67, 4, 'users', 'change_status'),
(68, 4, 'invoices', 'view'),
(69, 4, 'invoices', 'add'),
(70, 4, 'invoices', 'edit'),
(71, 4, 'invoices', 'delete'),
(72, 4, 'invoices', 'access'),
(73, 4, 'example', 'access'),
(74, 4, 'joins', 'access'),
(75, 4, 'export', 'access');

-- --------------------------------------------------------

--
-- Table structure for table `test_user`
--

DROP TABLE IF EXISTS `test_user`;
CREATE TABLE IF NOT EXISTS `test_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_user`
--

INSERT INTO `test_user` (`id`, `username`, `email`, `mobile_no`) VALUES
(1, 'nauman', 'naumanahmedcs@gmail.com', '3468548054'),
(2, 'ahmed', 'ahmed@gmail.com', '445684332545');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
