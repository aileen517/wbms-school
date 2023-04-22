-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 06:59 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cnhsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `abID` int(11) NOT NULL,
  `abtdate` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`abID`, `abtdate`, `title`, `details`, `type`, `photo`, `status`) VALUES
(14, '1665676800', '', '<h2>School history will be posted here soon...</h2>', 'his', '', 'post'),
(15, '1665676800', '', '<h2>School mision will be posted here soon...</h2>', 'mis', '', 'post'),
(16, '1665676800', '', '<h2>School vision will be posted here soon...</h2>', 'vis', '', 'post'),
(17, '1666972800', ' Accomplishment of the Day', '<div dir=\"auto\">The SSG asks for help and orients the store owner near the school to stop selling cigarettes for the students especially during class days.</div>\r\n<div dir=\"auto\"><a class=\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xt0b8zv x1qq9wsj xo1l8bm\" tabindex=\"0\" href=\"https://www.facebook.com/hashtag/nosmoking?__eep__=6&amp;__cft__[0]=AZVLhzhqbiAl-bT57RkL1iYV-eefBNYm50QpicbLvJNYYAHi-dM2mozNePjZQBNFh2sVZjl_nh9GCBCb_w2BBAhy7tT7jP3jtPNeiJ1gv7rg2sp_PUUSiBslGntaMJjeJWGBktrTJ5H_t2x4-nD6hN5EwOUqSKuLLKx748ODrrUlbYPxnbV3VZPVBYW_g-YJO7w&amp;__tn__=*NK-R\">#nosmoking</a></div>\r\n<div dir=\"auto\"><a class=\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xt0b8zv x1qq9wsj xo1l8bm\" tabindex=\"0\" href=\"https://www.facebook.com/hashtag/littlewaysgreatimpact?__eep__=6&amp;__cft__[0]=AZVLhzhqbiAl-bT57RkL1iYV-eefBNYm50QpicbLvJNYYAHi-dM2mozNePjZQBNFh2sVZjl_nh9GCBCb_w2BBAhy7tT7jP3jtPNeiJ1gv7rg2sp_PUUSiBslGntaMJjeJWGBktrTJ5H_t2x4-nD6hN5EwOUqSKuLLKx748ODrrUlbYPxnbV3VZPVBYW_g-YJO7w&amp;__tn__=*NK-R\">#littlewaysgreatimpact</a></div>', 'event', '1666235723.png', 'unpost'),
(19, '1669219200', 'Adlaw ng Aurora', '<p>A Week Log Celebration for Araw ng Aurora</p>', 'event', '1666750202.jpg', 'posted'),
(20, '1670774400', 'Christmas Party', '<p>Merry Christmas!!!</p>', 'event', '1666750301.jpg', 'posted'),
(21, '1667232000', 'SSG Contribution Deadline', '<p>Pls pay your SSG Contribution to Maam Ana Fe</p>', 'announce', '1666750522.png', 'unpost'),
(22, '1672329600', 'Rizal Day', '', 'event', '1668608045.jpg', 'posted');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admID` int(11) NOT NULL,
  `usern` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `passw` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admID`, `usern`, `passw`, `fname`) VALUES
(1, 'admin', 'admin', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chatbox`
--

CREATE TABLE `tbl_chatbox` (
  `chatID` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdate` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mtime` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tofrom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `touser` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `toread` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fromread` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `scode` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_chatbox`
--

INSERT INTO `tbl_chatbox` (`chatID`, `title`, `details`, `mdate`, `mtime`, `tofrom`, `touser`, `toread`, `fromread`, `remarks`, `scode`) VALUES
(57, '', 'Accepted online enrollment application.', '1667664000', '1667715540', '1', 'All', 'read', 'read', 'logs', '0'),
(58, '', 'Accepted online enrollment application.', '1667664000', '1667715540', '1', 'All', 'read', 'read', 'logs', '0'),
(62, 'title', '<p>testing</p>', '1667750400', '1667801220', '12314879328', 'B7yhJ', 'unread', 'read', 'msg', '0'),
(64, '', 'Accepted online enrollment application.', '1667750400', '1667809680', '1', 'All', 'read', 'read', 'logs', '0'),
(65, '', 'Accepted online enrollment application.', '1667750400', '1667809680', '1', 'All', 'read', 'read', 'logs', '0'),
(66, '', 'Accepted online enrollment application.', '1667750400', '1667809680', '1', 'All', 'read', 'read', 'logs', '0'),
(67, '', 'Accepted online enrollment application.', '1667750400', '1667809680', '1', 'All', 'read', 'read', 'logs', '0'),
(68, '', 'Accepted online enrollment application.', '1667750400', '1667809680', '1', 'All', 'read', 'read', 'logs', '0'),
(69, '', 'Accepted online enrollment application.', '1667750400', '1667809860', '1', 'All', 'read', 'read', 'logs', '0'),
(70, '', 'Accepted online enrollment application.', '1667750400', '1667809920', '1', 'All', 'read', 'read', 'logs', '0'),
(71, 'Testing', '<p>Testing</p>', '1667836800', '1667878440', '1', 'YRerq', 'unread', 'read', 'msg', '0'),
(73, '', 'Accepted online enrollment application.', '1667836800', '1667884680', '1', 'All', 'read', 'read', 'logs', '0'),
(74, '', 'Accepted online enrollment application.', '1667836800', '1667884680', '1', 'All', 'read', 'read', 'logs', '0'),
(75, '', 'Accepted online enrollment application.', '1667836800', '1667884740', '1', 'All', 'read', 'read', 'logs', '0'),
(76, '', 'Accepted online enrollment application.', '1667836800', '1667884920', '1', 'All', 'read', 'read', 'logs', '0'),
(77, '', 'Accepted online enrollment application.', '1667836800', '1667884920', '1', 'All', 'read', 'read', 'logs', '0'),
(78, '', 'Accepted online enrollment application.', '1667836800', '1667885160', '1', 'All', 'read', 'read', 'logs', '0'),
(79, '', 'Accepted online enrollment application.', '1667836800', '1667885280', '1', 'All', 'read', 'read', 'logs', '0'),
(80, '', 'Accepted online enrollment application.', '1667836800', '1667885280', '1', 'All', 'read', 'read', 'logs', '0'),
(81, '', 'Accepted online enrollment application.', '1667836800', '1667885340', '1', 'All', 'read', 'read', 'logs', '0'),
(82, '', 'Accepted online enrollment application.', '1667836800', '1667885400', '1', 'All', 'read', 'read', 'logs', '0'),
(83, '', 'Accepted online enrollment application.', '1667836800', '1667885580', '1', 'All', 'read', 'read', 'logs', '0'),
(84, '', 'Accepted online enrollment application.', '1667836800', '1667885760', '1', 'All', 'read', 'read', 'logs', '0'),
(85, '', 'Accepted online enrollment application.', '1667836800', '1667901240', '1', 'All', 'read', 'read', 'logs', '0'),
(86, '', 'hi', '1667923200', '1667960700', 'YRerq', 'YRerq', 'unread', 'read', 'msg', '71'),
(87, '', 'hello', '1667923200', '1667960820', 'YRerq', 'YRerq', 'unread', 'read', 'msg', '71'),
(88, 'Testing', 'hello', '1667923200', '1667960880', '1', 'YRerq', 'unread', 'read', 'msg', '71'),
(89, 'lorem', '<p>\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p>', '1667923200', '1667961180', '1', '3WzBZ', 'unread', 'read', 'msg', '0'),
(90, 'a', '<p>classcard</p>\r\n<p>&nbsp;</p>', '1667923200', '1667961420', '1', '0333', 'unread', 'read', 'msg', '0'),
(91, 'copy', '<p>copy</p>', '1667923200', '1667961600', '1', '3WzBZ', 'unread', 'read', 'msg', '0'),
(92, '', 'hello', '1667923200', '1667961780', '3WzBZ', '3WzBZ', 'unread', 'read', 'msg', '89'),
(93, 'lorem', 'hello', '1667923200', '1667961840', '1', '3WzBZ', 'unread', 'read', 'msg', '89'),
(94, '', 'yes Sir', '1667923200', '1667962080', '0333', '0333', 'read', 'read', 'msg', '90'),
(95, '', 'hello', '1667923200', '1667962740', '0333', '0333', 'read', 'read', 'msg', '90'),
(96, 'a', 'admin', '1667923200', '1667962800', '1', '0333', 'read', 'read', 'msg', '90'),
(97, 'Judith', '<p>&nbsp;Hello</p>', '1667923200', '1667962860', '3WzBZ', 'YRerq', 'unread', 'read', 'msg', '0'),
(98, '', 'hello', '1667923200', '1667962920', '3WzBZ', 'YRerq', 'unread', 'read', 'msg', '97'),
(99, '', 'Accepted online enrollment application.', '1667923200', '1667963520', '1', 'All', 'read', 'read', 'logs', '0'),
(100, '', 'rgdef', '1667923200', '1667985360', 'YRerq', 'YRerq', 'unread', 'read', 'msg', '71'),
(101, '', 'Accepted online enrollment application.', '1667923200', '1667992200', '1', 'All', 'read', 'read', 'logs', '0'),
(103, '', 'Accepted online enrollment application.', '1668009600', '1668038040', '1', 'All', 'read', 'read', 'logs', '0'),
(104, '', 'Accepted online enrollment application.', '1668268800', '1668312240', '1', 'All', 'read', 'read', 'logs', '0'),
(105, '', 'Accepted online enrollment application.', '1668268800', '1668312480', '1', 'All', 'read', 'read', 'logs', '0'),
(106, '', 'Accepted online enrollment application.', '1668268800', '1668312480', '1', 'All', 'read', 'read', 'logs', '0'),
(107, '', 'Accepted online enrollment application.', '1668268800', '1668312780', '1', 'All', 'read', 'read', 'logs', '0'),
(108, '', 'Accepted online enrollment application.', '1668268800', '1668312960', '1', 'All', 'read', 'read', 'logs', '0'),
(109, '', 'Accepted online enrollment application.', '1668441600', '1668508200', '1', 'All', 'read', 'read', 'logs', '0'),
(110, '', 'Accepted online enrollment application.', '1668441600', '1668508680', '1', 'All', 'read', 'read', 'logs', '0'),
(111, 'Sale', '<p>Test</p>', '1668441600', '1668509400', '1', 'QbFuy', 'unread', 'read', 'msg', '0'),
(112, '', 'hello', '1668441600', '1668509400', 'QbFuy', 'QbFuy', 'unread', 'read', 'msg', '111'),
(113, 'Testing', 'aaa', '1668614400', '1668648600', '1', 'YRerq', 'unread', 'read', 'msg', '71'),
(114, 'Testing', 'wui', '1668614400', '1668648840', '1', 'YRerq', 'unread', 'read', 'msg', '71'),
(115, '', 'Accepted online enrollment application.', '1668614400', '1668651240', '1', 'All', 'read', 'read', 'logs', '0'),
(116, '', 'Accepted online enrollment application.', '1668614400', '1668651240', '1', 'All', 'read', 'read', 'logs', '0'),
(117, '', 'Accepted online enrollment application.', '1668614400', '1668651480', '1', 'All', 'read', 'read', 'logs', '0'),
(118, '', 'Accepted online enrollment application.', '1668614400', '1668652140', '1', 'All', 'read', 'read', 'logs', '0'),
(119, '', 'Accepted online enrollment application.', '1668614400', '1668652140', '1', 'All', 'read', 'read', 'logs', '0'),
(120, '', 'Accepted online enrollment application.', '1668614400', '1668652980', '1', 'All', 'read', 'read', 'logs', '0'),
(121, '', 'Accepted online enrollment application.', '1668614400', '1668653160', '1', 'All', 'read', 'read', 'logs', '0'),
(122, '', 'Accepted online enrollment application.', '1668614400', '1668653340', '1', 'All', 'read', 'read', 'logs', '0'),
(123, '', 'Accepted online enrollment application.', '1668614400', '1668653460', '1', 'All', 'read', 'read', 'logs', '0'),
(124, '', 'Accepted online enrollment application.', '1668614400', '1668654060', '1', 'All', 'read', 'read', 'logs', '0'),
(125, '', 'Accepted online enrollment application.', '1668614400', '1668654420', '1', 'All', 'read', 'read', 'logs', '0'),
(126, '', 'Accepted online enrollment application.', '1668614400', '1668655260', '1', 'All', 'read', 'read', 'logs', '0'),
(127, '', 'Accepted online enrollment application.', '1668614400', '1668655380', '1', 'All', 'read', 'read', 'logs', '0'),
(128, '', 'Accepted online enrollment application.', '1668614400', '1668686580', '1', 'All', 'read', 'read', 'logs', '0'),
(129, '', 'Accepted online enrollment application.', '1668614400', '1668686820', '1', 'All', 'read', 'read', 'logs', '0'),
(130, '', 'Accepted online enrollment application.', '1668614400', '1668687240', '1', 'All', 'read', 'read', 'logs', '0'),
(131, '', 'Accepted online enrollment application.', '1668614400', '1668687540', '1', 'All', 'read', 'read', 'logs', '0'),
(132, '', 'Accepted online enrollment application.', '1668614400', '1668687720', '1', 'All', 'read', 'read', 'logs', '0'),
(133, '', 'Accepted online enrollment application.', '1668614400', '1668688620', '1', 'All', 'read', 'read', 'logs', '0'),
(134, '', 'Accepted online enrollment application.', '1668614400', '1668689040', '1', 'All', 'read', 'read', 'logs', '0'),
(135, '', 'Accepted online enrollment application.', '1668614400', '1668690840', '1', 'All', 'read', 'read', 'logs', '0'),
(136, '', 'Accepted online enrollment application.', '1668614400', '1668692580', '1', 'All', 'read', 'read', 'logs', '0'),
(137, '', 'Accepted online enrollment application.', '1668614400', '1668692820', '1', 'All', 'read', 'read', 'logs', '0'),
(138, '', 'Accepted online enrollment application.', '1668614400', '1668692940', '1', 'All', 'read', 'read', 'logs', '0'),
(139, 'Joe Apo', '<p>Hello</p>', '1668700800', '1668732780', '1', '04xwH', 'unread', 'read', 'msg', '0'),
(140, '', 'hi', '1668700800', '1668749460', '1', 'All', 'unread', 'read', 'msg', '138'),
(141, 'title', 'hi', '1668700800', '1668749700', '1', 'B7yhJ', 'unread', 'read', 'msg', '62'),
(142, 'try', '<p>hiiii</p>', '1668700800', '1668751920', '1', '3Nkx5', 'unread', 'read', 'msg', '0'),
(143, 'try', 'hi', '1668700800', '1668751920', '1', '3Nkx5', 'unread', 'read', 'msg', '142'),
(144, '', 'Accepted online enrollment application.', '1668700800', '1668755520', '1', 'All', 'read', 'read', 'logs', '0'),
(145, '', 'Accepted online enrollment application.', '1668787200', '1668811140', '1', 'All', 'read', 'read', 'logs', '0'),
(146, '', 'Accepted online enrollment application.', '1668787200', '1668811260', '1', 'All', 'read', 'read', 'logs', '0'),
(147, '', 'Accepted online enrollment application.', '1668787200', '1668811860', '1', 'All', 'read', 'read', 'logs', '0'),
(148, '', 'Accepted online enrollment application.', '1668787200', '1668811860', '1', 'All', 'read', 'read', 'logs', '0'),
(149, '', 'Accepted online enrollment application.', '1668787200', '1668811860', '1', 'All', 'read', 'read', 'logs', '0'),
(150, '', 'Accepted online enrollment application.', '1668787200', '1668811920', '1', 'All', 'read', 'read', 'logs', '0'),
(151, '', 'Accepted online enrollment application.', '1668787200', '1668811920', '1', 'All', 'read', 'read', 'logs', '0'),
(152, '', 'Accepted online enrollment application.', '1668787200', '1668811920', '1', 'All', 'read', 'read', 'logs', '0'),
(153, '', 'Accepted online enrollment application.', '1668787200', '1668811920', '1', 'All', 'read', 'read', 'logs', '0'),
(154, '', 'Accepted online enrollment application.', '1668787200', '1668811920', '1', 'All', 'read', 'read', 'logs', '0'),
(155, '', 'Accepted online enrollment application.', '1668787200', '1668811920', '1', 'All', 'read', 'read', 'logs', '0'),
(156, '', 'Accepted online enrollment application.', '1668787200', '1668811920', '1', 'All', 'read', 'read', 'logs', '0'),
(157, '', 'Accepted online enrollment application.', '1668787200', '1668814260', '1', 'All', 'read', 'read', 'logs', '0'),
(158, '', 'Accepted online enrollment application.', '1668787200', '1668814500', '1', 'All', 'read', 'read', 'logs', '0'),
(159, '', 'Accepted online enrollment applicant.', '1668787200', '1668844500', '1', 'All', 'read', 'read', 'logs', '0'),
(160, '', 'Accepted online enrollment applicant.', '1668787200', '1668844500', '1', 'All', 'read', 'read', 'logs', '0'),
(161, '', 'Accepted online enrollment applicant.', '1668787200', '1668844500', '1', 'All', 'read', 'read', 'logs', '0'),
(162, '', 'Accepted online enrollment applicant.', '1668787200', '1668844500', '1', 'All', 'read', 'read', 'logs', '0'),
(163, '', 'Accepted online enrollment application.', '1668873600', '1668916560', '1', 'All', 'read', 'read', 'logs', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE `tbl_faculty` (
  `facID` int(11) NOT NULL,
  `facode` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateentry` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `educ` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ofc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `con` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`facID`, `facode`, `dateentry`, `fname`, `lname`, `title`, `educ`, `email`, `password`, `ofc`, `addr`, `con`, `status`) VALUES
(90, 'YRerq', '1666108800', 'Judith', 'Ado', 'English Teacher', 'BS in Computer Science', 'rileymandula@gmail.com', 'PMvhkNXA4QdnpRK', 'Commonwealth National High School', 'Aurora Zamboanga del Sur', '09154804808', 'active'),
(91, 'z5qT6', '1666195200', 'Karen', 'Minoza', 'Teacher', 'BS in Arts and Design', 'rileymandula@gmail.com', 'nqkdmhc7KNpJAFW', 'Western Mindanao Stae University', 'Aurora Zamboanga del Sur', '09154804808', 'active'),
(92, 'gnz1U', '1666195200', 'Mary', 'Quinco', 'Teacher', 'BS in Computer Science', 'rileymandula@gmail.com', 'gXGmRfCZMKVJEQP', 'Western Mindanao Stae University', 'Aurora Zamboanga del Sur', '09154804808', 'active'),
(93, 'nw7sK', '1666195200', 'Bea', 'Alo', 'Teacher', 'BS in Computer Science', 'rileymandula@gmail.com', '3yNGTejp28bnX96', 'Western Mindanao Stae University', 'Aurora Zamboanga del Sur', '09154804808', 'active'),
(94, '04xwH', '1666195200', 'Joe', 'Apo', 'Teacher', 'BS in Computer Science', 'rileymandula@gmail.com', 'cNMJdjgX18yt9TC', 'Western Mindanao Stae University', 'Aurora Zamboanga del Sur', '09154804808', 'active'),
(95, 'B7yhJ', '1666195200', 'Jam', 'Gloria', 'Teacher', 'BS in Computer Science', 'rileymandula@gmail.com', 'd8vuBKDQFMa7zwJ', 'Western Mindanao Stae University', 'Aurora Zamboanga del Sur', '09154804808', 'active'),
(96, 'QbFuy', '1666195200', 'Ham', 'Moda', 'Teacher', 'BS in Computer Science', 'rileymandula@gmail.com', '1123', 'Western Mindanao Stae University', 'Aurora Zamboanga del Sur', '09154804808', 'active'),
(97, 'EYkwf', '1666195200', 'Ella', 'Quino', 'Teacher', 'BS in Computer Science', 'rileymandula@gmail.com', 'H1D3VFC9BvqQf2b', 'Western Mindanao Stae University', 'Aurora Zamboanga del Sur', '09154804808', 'active'),
(98, 'nX1bY', '1666195200', 'Aadin', 'Anggot', 'Teacher', 'BS in Computer Science', 'rileymandula@gmail.com', '6zTRKbMge1uYEFN', 'Commonwealth National High School', 'Aurora Zamboanga del Sur', '09154804808', 'active'),
(99, '5WkD7', '1666195200', 'Jose', 'Rizal', 'Teacher', 'BS in Mechanical Engineering', 'asylycole@gmail.com', 'MFC2Jnbq5W7dHKA', 'Misamis University', 'Aurora Zamboanga del Sur', '09154804808', 'active'),
(100, 'UD81P', '1666195200', 'Yunell', 'Apolona', 'Teacher', 'BS in Computer Science', 'rileymandula@gmail.com', 'fwAqyrgPU6bEQ1G', 'Western Mindanao Stae University', 'Aurora Zamboanga del Sur', '09154804808', 'active'),
(101, 'EfZJd', '1666195200', 'Ferdy', 'Marcod', 'Teacher', 'BS in Computer Science', 'rileymandula@gmail.com', 'P14z6S3gpaQnJu5', 'Western Mindanao Stae University', 'Aurora Zamboanga del Sur', '09154804808', 'active'),
(102, 'vs8ej', '1666195200', 'Pan', 'Peter', 'Teacher', 'BS in Computer Science', 'rileymandula@gmail.com', 'zWy3m2vdEU7V6PJ', 'Western Mindanao Stae University', 'Aurora Zamboanga del Sur', '09154804808', 'active'),
(103, '3Nkx5', '1666195200', 'Yan', 'Taraya', 'Teacher', 'BS in Computer Science', 'rileymandula@gmail.com', '8QZpSNseM9wAk5P', 'Western Mindanao Stae University', 'Aurora Zamboanga del Sur', '09154804808', 'active'),
(104, 'Xxzsw', '1666195200', 'Art', 'Tata', 'Teacher', 'BS in Computer Science', 'rileymandula@gmail.com', 'sdUPuc2KkSyY8Za', 'Western Mindanao Stae University', 'Aurora Zamboanga del Sur', '09154804808', 'active'),
(105, '3WzBZ', '1666195200', 'Geselle', 'Sanchez', 'Teacher', 'BS in Computer Science', 'rileymandula@gmail.com', 're2FsAh31JawGbj', 'Western Mindanao Stae University', 'Aurora Zamboanga del Sur', '09154804808', 'active'),
(106, 'bw2ka', '1666281600', 'Jamiecah', 'Quinco', 'Teacher', 'BS in Computer Science', 'rileymandula@gmail.com', '3cBP40TCz5wAbV2', 'Western Mindanao Stae University', 'Aurora Zamboanga del Sur', '09154804808', 'active'),
(107, 'pJgnQ', '1666281600', 'Lumayag Jon', 'L.', 'Faculty', 'n/a', 'jaezer.razor@gmail.com', 'y9wdMhpKkEZDFUx', 'n/a', 'n/a', 'n/a', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grades`
--

CREATE TABLE `tbl_grades` (
  `grID` int(11) NOT NULL,
  `student_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `syear` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `glevel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `schname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `schid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `first` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `second` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `third` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fourth` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `final` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_grades`
--

INSERT INTO `tbl_grades` (`grID`, `student_id`, `syear`, `glevel`, `section`, `schname`, `schid`, `district`, `division`, `region`, `teacher`, `subject`, `first`, `second`, `third`, `fourth`, `final`) VALUES
(146, '0000018', '22', '09', '53', 'Aurora National High School', '2554451', '', '', '', 'nX1bY', '62', '90', '89', '81', '90', '87.5'),
(147, '0000018', '22', '09', '53', 'Aurora National High School', '2554451', '', '', '', 'nX1bY', '63', '77', '77', '77', '77', '77'),
(148, '0000018', '22', '09', '53', 'Aurora National High School', '2554451', '', '', '', 'bw2ka', '73', '77', '77', '77', '77', '77'),
(149, '0000018', '22', '09', '53', 'Aurora National High School', '2554451', '', '', '', 'bw2ka', '74', '77', '77', '77', '77', '77'),
(150, '0000018', '22', '09', '53', 'Aurora National High School', '2554451', '', '', '', 'pJgnQ', '75', '77', '77', '77', '77', '77'),
(151, '0000018', '22', '09', '53', 'Aurora National High School', '2554451', '', '', '', '3WzBZ', '76', '77', '77', '77', '77', '77'),
(152, '0000018', '22', '09', '53', 'Aurora National High School', '2554451', '', '', '', 'pJgnQ', '77', '77', '77', '77', '77', '77'),
(153, '0000018', '22', '09', '53', 'Aurora National High School', '2554451', '', '', '', '3WzBZ', '78', '77', '77', '77', '77', '77'),
(154, '000033', '22', '07', '46', 'Aurora National High School', '2554451', '', '', '', 'z5qT6', '54', '90', '90', '89', '90', '89.75'),
(155, '000033', '22', '07', '46', 'Aurora National High School', '2554451', '', '', '', 'z5qT6', '55', '81', '89', '90', '90', '87.5'),
(156, '000033', '22', '07', '46', 'Aurora National High School', '2554451', '', '', '', 'gnz1U', '56', '89', '78', '90', '90', '86.75'),
(157, '000033', '22', '07', '46', 'Aurora National High School', '2554451', '', '', '', 'z5qT6', '57', '90', '90', '90', '90', '90'),
(158, '000033', '22', '07', '46', 'Aurora National High School', '2554451', '', '', '', 'z5qT6', '58', '89', '90', '90', '90', '89.75'),
(159, '000033', '22', '07', '46', 'Aurora National High School', '2554451', '', '', '', 'z5qT6', '66', '89', '89', '90', '90', '89.5'),
(160, '000033', '22', '07', '46', 'Aurora National High School', '2554451', '', '', '', '04xwH', '67', '89', '90', '90', '90', '89.75'),
(161, '000033', '22', '07', '46', 'Aurora National High School', '2554451', '', '', '', 'gnz1U', '85', '90', '89', '90', '89', '89.5'),
(162, '007675', '22', '08', '48', 'Aurora National High School', '3242134', '', '', '', 'nw7sK', '59', '99', '97', '91', '89', '94'),
(163, '007675', '22', '08', '48', 'Aurora National High School', '3242134', '', '', '', 'YRerq', '60', '99', '91', '90', '91', '92.75'),
(164, '007675', '22', '08', '48', 'Aurora National High School', '3242134', '', '', '', '5WkD7', '61', '91', '90', '89', '90', '90'),
(165, '007675', '22', '08', '48', 'Aurora National High School', '3242134', '', '', '', 'nX1bY', '68', '99', '90', '91', '98', '94.5'),
(166, '007675', '22', '08', '48', 'Aurora National High School', '3242134', '', '', '', 'gnz1U', '69', '90', '91', '98', '97', '94'),
(167, '007675', '22', '08', '48', 'Aurora National High School', '3242134', '', '', '', 'gnz1U', '70', '98', '99', '90', '99', '96.5'),
(168, '007675', '22', '08', '48', 'Aurora National High School', '3242134', '', '', '', '5WkD7', '71', '90', '91', '90', '99', '92.5'),
(169, '007675', '22', '08', '48', 'Aurora National High School', '3242134', '', '', '', '5WkD7', '72', '99', '90', '98', '90', '94.25'),
(170, '857443', '22', '10', '54', 'Aurora National High School', '325135', '', '', '', 'nw7sK', '64', '90', '89', '90', '89', '89.5'),
(171, '857443', '22', '10', '54', 'Aurora National High School', '325135', '', '', '', '5WkD7', '65', '91', '90', '90', '87', '89.5'),
(172, '857443', '22', '10', '54', 'Aurora National High School', '325135', '', '', '', '3Nkx5', '79', '89', '90', '91', '90', '90'),
(173, '857443', '22', '10', '54', 'Aurora National High School', '325135', '', '', '', 'Xxzsw', '80', '90', '89', '91', '92', '90.5'),
(174, '857443', '22', '10', '54', 'Aurora National High School', '325135', '', '', '', 'bw2ka', '81', '90', '92', '90', '90', '90.5'),
(175, '857443', '22', '10', '54', 'Aurora National High School', '325135', '', '', '', 'bw2ka', '82', '98', '89', '89', '89', '91.25'),
(176, '857443', '22', '10', '54', 'Aurora National High School', '325135', '', '', '', 'Xxzsw', '83', '89', '88', '88', '88', '88.25'),
(177, '857443', '22', '10', '54', 'Aurora National High School', '325135', '', '', '', 'Xxzsw', '84', '89', '88', '99', '88', '91'),
(178, '65425', '22', '10', '55', 'Aurora National High School', '325135', '', '', '', '5WkD7', '64', '90', '91', '92', '93', '91.5'),
(179, '65425', '22', '10', '55', 'Aurora National High School', '325135', '', '', '', '5WkD7', '65', '90', '89', '90', '90', '89.75'),
(180, '65425', '22', '10', '55', 'Aurora National High School', '325135', '', '', '', '3Nkx5', '79', '90', '98', '90', '90', '92'),
(181, '65425', '22', '10', '55', 'Aurora National High School', '325135', '', '', '', 'Xxzsw', '80', '90', '91', '90', '90', '90.25'),
(182, '65425', '22', '10', '55', 'Aurora National High School', '325135', '', '', '', '3Nkx5', '81', '91', '92', '97', '90', '92.5'),
(183, '65425', '22', '10', '55', 'Aurora National High School', '325135', '', '', '', '3WzBZ', '82', '89', '89', '90', '90', '89.5'),
(184, '65425', '22', '10', '55', 'Aurora National High School', '325135', '', '', '', '3Nkx5', '83', '90', '91', '90', '90', '90.25'),
(185, '65425', '22', '10', '55', 'Aurora National High School', '325135', '', '', '', 'bw2ka', '84', '99', '99', '97', '98', '98.25'),
(186, '65425', '22', '10', '55', 'Aurora National High School', '325135', '', '', '', '5WkD7', '64', '90', '91', '90', '90', '90.25'),
(187, '65425', '22', '10', '55', 'Aurora National High School', '325135', '', '', '', '5WkD7', '65', '90', '89', '90', '89', '89.5'),
(188, '65425', '22', '10', '55', 'Aurora National High School', '325135', '', '', '', '3Nkx5', '79', '90', '90', '92', '98', '92.5'),
(189, '65425', '22', '10', '55', 'Aurora National High School', '325135', '', '', '', 'Xxzsw', '80', '90', '91', '89', '89', '89.75'),
(190, '65425', '22', '10', '55', 'Aurora National High School', '325135', '', '', '', '3Nkx5', '81', '90', '90', '90', '90', '90'),
(191, '65425', '22', '10', '55', 'Aurora National High School', '325135', '', '', '', '3WzBZ', '82', '90', '91', '90', '98', '92.25'),
(192, '65425', '22', '10', '55', 'Aurora National High School', '325135', '', '', '', '3Nkx5', '83', '90', '90', '90', '90', '90'),
(193, '65425', '22', '10', '55', 'Aurora National High School', '325135', '', '', '', 'bw2ka', '84', '89', '89', '90', '90', '89.5'),
(194, '0087677', '22', '09', '52', 'Aurora National High School', '325135', '', '', '', 'EYkwf', '62', '90', '90', '91', '90', '90.25'),
(195, '0087677', '22', '09', '52', 'Aurora National High School', '325135', '', '', '', 'EYkwf', '63', '90', '91', '90', '89', '90'),
(196, '0087677', '22', '09', '52', 'Aurora National High School', '325135', '', '', '', '3WzBZ', '73', '90', '91', '90', '89', '90'),
(197, '0087677', '22', '09', '52', 'Aurora National High School', '325135', '', '', '', 'pJgnQ', '74', '90', '89', '90', '88', '89.25'),
(198, '0087677', '22', '09', '52', 'Aurora National High School', '325135', '', '', '', 'pJgnQ', '75', '90', '89', '90', '90', '89.75'),
(199, '0087677', '22', '09', '52', 'Aurora National High School', '325135', '', '', '', 'B7yhJ', '76', '99', '98', '90', '89', '94'),
(200, '0087677', '22', '09', '52', 'Aurora National High School', '325135', '', '', '', 'pJgnQ', '77', '90', '89', '90', '90', '89.75'),
(201, '0087677', '22', '09', '52', 'Aurora National High School', '325135', '', '', '', '3WzBZ', '78', '90', '89', '90', '89', '89.5'),
(202, '45132', '22', '07', '46', 'Aurora National High School', '325135', '', '', '', 'z5qT6', '54', '90', '99', '89', '90', '92'),
(203, '45132', '22', '07', '46', 'Aurora National High School', '325135', '', '', '', 'z5qT6', '55', '90', '89', '90', '98', '91.75'),
(204, '45132', '22', '07', '46', 'Aurora National High School', '325135', '', '', '', 'gnz1U', '56', '90', '90', '89', '90', '89.75'),
(205, '45132', '22', '07', '46', 'Aurora National High School', '325135', '', '', '', 'z5qT6', '57', '90', '89', '90', '89', '89.5'),
(206, '45132', '22', '07', '46', 'Aurora National High School', '325135', '', '', '', 'z5qT6', '58', '90', '89', '90', '89', '89.5'),
(207, '45132', '22', '07', '46', 'Aurora National High School', '325135', '', '', '', 'z5qT6', '66', '89', '88', '90', '90', '89.25'),
(208, '45132', '22', '07', '46', 'Aurora National High School', '325135', '', '', '', '04xwH', '67', '89', '88', '90', '90', '89.25'),
(209, '45132', '22', '07', '46', 'Aurora National High School', '325135', '', '', '', 'gnz1U', '85', '90', '89', '90', '91', '90'),
(210, '45132', '22', '07', '46', 'Aurora National High School', '325135', '', '', '', 'z5qT6', '54', '89', '90', '89', '90', '89.5'),
(211, '45132', '22', '07', '46', 'Aurora National High School', '325135', '', '', '', 'z5qT6', '55', '88', '90', '91', '90', '89.75'),
(212, '45132', '22', '07', '46', 'Aurora National High School', '325135', '', '', '', 'gnz1U', '56', '89', '90', '90', '89', '89.5'),
(213, '45132', '22', '07', '46', 'Aurora National High School', '325135', '', '', '', 'z5qT6', '57', '89', '90', '89', '90', '89.5'),
(214, '45132', '22', '07', '46', 'Aurora National High School', '325135', '', '', '', 'z5qT6', '58', '90', '89', '90', '97', '91.5'),
(215, '45132', '22', '07', '46', 'Aurora National High School', '325135', '', '', '', 'z5qT6', '66', '90', '91', '89', '89', '89.75'),
(216, '45132', '22', '07', '46', 'Aurora National High School', '325135', '', '', '', '04xwH', '67', '90', '89', '90', '90', '89.75'),
(217, '45132', '22', '07', '46', 'Aurora National High School', '325135', '', '', '', 'gnz1U', '85', '90', '89', '90', '91', '90'),
(218, '9865867', '22', '09', '53', 'Aurora National High School', '344324', '', '', '', 'nX1bY', '62', '90', '88', '88', '88', '88.5'),
(219, '9865867', '22', '09', '53', 'Aurora National High School', '344324', '', '', '', 'nX1bY', '63', '88', '88', '88', '88', '88'),
(220, '9865867', '22', '09', '53', 'Aurora National High School', '344324', '', '', '', 'bw2ka', '73', '89', '88', '88', '88', '88.25'),
(221, '9865867', '22', '09', '53', 'Aurora National High School', '344324', '', '', '', 'bw2ka', '74', '89', '88', '88', '88', '88.25'),
(222, '9865867', '22', '09', '53', 'Aurora National High School', '344324', '', '', '', 'pJgnQ', '75', '90', '89', '90', '88', '89.25'),
(223, '9865867', '22', '09', '53', 'Aurora National High School', '344324', '', '', '', '3WzBZ', '76', '90', '89', '90', '88', '89.25'),
(224, '9865867', '22', '09', '53', 'Aurora National High School', '344324', '', '', '', 'pJgnQ', '77', '90', '89', '90', '89', '89.5'),
(225, '9865867', '22', '09', '53', 'Aurora National High School', '344324', '', '', '', '3WzBZ', '78', '90', '89', '87', '98', '91'),
(226, '436462', '22', '08', '50', 'Aurora National High School', '325135', '', '', '', 'B7yhJ', '59', '90', '90', '98', '99', '94.25'),
(227, '436462', '22', '08', '50', 'Aurora National High School', '325135', '', '', '', 'B7yhJ', '60', '90', '92', '90', '90', '90.5'),
(228, '436462', '22', '08', '50', 'Aurora National High School', '325135', '', '', '', 'B7yhJ', '61', '89', '88', '90', '91', '89.5'),
(229, '436462', '22', '08', '50', 'Aurora National High School', '325135', '', '', '', 'nw7sK', '68', '90', '91', '90', '90', '90.25'),
(230, '436462', '22', '08', '50', 'Aurora National High School', '325135', '', '', '', 'z5qT6', '69', '90', '90', '90', '90', '90'),
(231, '436462', '22', '08', '50', 'Aurora National High School', '325135', '', '', '', 'z5qT6', '70', '90', '90', '90', '90', '90'),
(232, '436462', '22', '08', '50', 'Aurora National High School', '325135', '', '', '', 'nw7sK', '71', '90', '90', '90', '90', '90'),
(233, '436462', '22', '08', '50', 'Aurora National High School', '325135', '', '', '', 'pJgnQ', '72', '90', '90', '90', '90', '90'),
(234, '4534532', '22', '09', '51', 'Aurora National High School', '325135', '', '', '', 'QbFuy', '62', '90', '89', '91', '90', '90'),
(235, '4534532', '22', '09', '51', 'Aurora National High School', '325135', '', '', '', 'QbFuy', '63', '89', '91', '89', '90', '89.75'),
(236, '4534532', '22', '09', '51', 'Aurora National High School', '325135', '', '', '', 'bw2ka', '73', '90', '89', '90', '90', '89.75'),
(237, '4534532', '22', '09', '51', 'Aurora National High School', '325135', '', '', '', 'bw2ka', '74', '90', '91', '90', '90', '90.25'),
(238, '4534532', '22', '09', '51', 'Aurora National High School', '325135', '', '', '', 'YRerq', '75', '89', '90', '90', '89', '89.5'),
(239, '4534532', '22', '09', '51', 'Aurora National High School', '325135', '', '', '', 'bw2ka', '76', '90', '89', '90', '91', '90'),
(240, '4534532', '22', '09', '51', 'Aurora National High School', '325135', '', '', '', 'pJgnQ', '77', '90', '89', '88', '89', '89'),
(241, '4534532', '22', '09', '51', 'Aurora National High School', '325135', '', '', '', 'bw2ka', '78', '90', '89', '90', '98', '91.75'),
(242, '976865', '22', '10', '56', 'Aurora National High School', '352132', '', '', '', 'UD81P', '64', '90', '98', '78', '78', '86'),
(243, '976865', '22', '10', '56', 'Aurora National High School', '352132', '', '', '', 'UD81P', '65', '77', '77', '77', '77', '77'),
(244, '976865', '22', '10', '56', 'Aurora National High School', '352132', '', '', '', 'EYkwf', '79', '88', '88', '88', '88', '88'),
(245, '976865', '22', '10', '56', 'Aurora National High School', '352132', '', '', '', 'EfZJd', '80', '89', '88', '88', '88', '88.25'),
(246, '976865', '22', '10', '56', 'Aurora National High School', '352132', '', '', '', 'vs8ej', '81', '89', '88', '88', '88', '88.25'),
(247, '976865', '22', '10', '56', 'Aurora National High School', '352132', '', '', '', 'Xxzsw', '82', '88', '88', '88', '88', '88'),
(248, '976865', '22', '10', '56', 'Aurora National High School', '352132', '', '', '', 'vs8ej', '83', '88', '88', '80', '88', '86'),
(249, '976865', '22', '10', '56', 'Aurora National High School', '352132', '', '', '', 'EfZJd', '84', '89', '88', '88', '89', '88.5'),
(250, '000033', '23', '08', '48', 'Aurora National High School', '2554451', '', '', '', 'nw7sK', '59', '90', '90', '89', '90', '89.75'),
(251, '000033', '23', '08', '48', 'Aurora National High School', '2554451', '', '', '', 'YRerq', '60', '89', '90', '89', '90', '89.5'),
(252, '000033', '23', '08', '48', 'Aurora National High School', '2554451', '', '', '', '5WkD7', '61', '99', '88', '90', '90', '91.75'),
(253, '000033', '23', '08', '48', 'Aurora National High School', '2554451', '', '', '', 'nX1bY', '68', '89', '90', '89', '90', '89.5'),
(254, '000033', '23', '08', '48', 'Aurora National High School', '2554451', '', '', '', 'gnz1U', '69', '89', '90', '90', '88', '89.25'),
(255, '000033', '23', '08', '48', 'Aurora National High School', '2554451', '', '', '', 'gnz1U', '70', '89', '90', '88', '90', '89.25'),
(256, '000033', '23', '08', '48', 'Aurora National High School', '2554451', '', '', '', '5WkD7', '71', '80', '89', '90', '90', '87.25'),
(257, '000033', '23', '08', '48', 'Aurora National High School', '2554451', '', '', '', '5WkD7', '72', '80', '90', '90', '90', '87.5'),
(258, '436462', '23', '09', '51', 'Aurora National High School', '325135', '', '', '', 'QbFuy', '62', '90', '89', '90', '89', '89.5'),
(259, '436462', '23', '09', '51', 'Aurora National High School', '325135', '', '', '', 'QbFuy', '63', '89', '90', '90', '89', '89.5'),
(260, '436462', '23', '09', '51', 'Aurora National High School', '325135', '', '', '', 'bw2ka', '73', '89', '90', '88', '90', '89.25'),
(261, '436462', '23', '09', '51', 'Aurora National High School', '325135', '', '', '', 'bw2ka', '74', '88', '87', '90', '90', '88.75'),
(262, '436462', '23', '09', '51', 'Aurora National High School', '325135', '', '', '', 'YRerq', '75', '90', '', '', '', '89.75'),
(263, '436462', '23', '09', '51', 'Aurora National High School', '325135', '', '', '', 'bw2ka', '76', '89', '90', '88', '90', '89.25'),
(264, '436462', '23', '09', '51', 'Aurora National High School', '325135', '', '', '', 'pJgnQ', '77', '79', '77', '77', '77', '77.5'),
(265, '436462', '23', '09', '51', 'Aurora National High School', '325135', '', '', '', 'bw2ka', '78', '89', '88', '88', '88', '88.25'),
(266, '45132', '23', '08', '48', 'Aurora National High School', '325135', '', '', '', 'nw7sK', '59', '0', '0', '0', '0', '0'),
(267, '45132', '23', '08', '48', 'Aurora National High School', '325135', '', '', '', 'nw7sK', '59', '0', '0', '0', '0', '0'),
(268, '45132', '23', '08', '48', 'Aurora National High School', '325135', '', '', '', 'nw7sK', '59', '0', '0', '0', '0', '0'),
(269, '45132', '23', '08', '48', 'Aurora National High School', '325135', '', '', '', 'nw7sK', '59', '0', '0', '0', '0', '0'),
(270, '0000011', '23', '07', '45', 'Aurora National High School', '325135', '', '', '', 'YRerq', '54', '0', '0', '0', '0', '0'),
(271, '0000011', '23', '07', '45', 'Aurora National High School', '325135', '', '', '', 'YRerq', '55', '0', '0', '0', '0', '0'),
(272, '0000011', '23', '07', '45', 'Aurora National High School', '325135', '', '', '', 'YRerq', '56', '0', '0', '0', '0', '0'),
(273, '0000011', '23', '07', '45', 'Aurora National High School', '325135', '', '', '', 'YRerq', '58', '0', '0', '0', '0', '0'),
(274, '0000011', '23', '07', '45', 'Aurora National High School', '325135', '', '', '', 'z5qT6', '66', '0', '0', '0', '0', '0'),
(275, '0000011', '23', '07', '45', 'Aurora National High School', '325135', '', '', '', 'YRerq', '67', '0', '0', '0', '0', '0'),
(276, '0000011', '23', '07', '45', 'Aurora National High School', '325135', '', '', '', 'gnz1U', '85', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade_level`
--

CREATE TABLE `tbl_grade_level` (
  `glID` int(11) NOT NULL,
  `level` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tuition` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history`
--

CREATE TABLE `tbl_history` (
  `hID` int(11) NOT NULL,
  `lrnno` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `syear` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `glevel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gpa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lyear` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `scname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `scid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `scaddr` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_history`
--

INSERT INTO `tbl_history` (`hID`, `lrnno`, `syear`, `glevel`, `section`, `gpa`, `method`, `lyear`, `scname`, `scid`, `scaddr`) VALUES
(59, '00001', '22', '07', '45', '98', 'home', '1988', 'Central School', '00001111', 'Pagadian City'),
(60, '0000012', '22', '07', '47', '77', 'onl', '2022-2023', 'Aurora National High School', '4252455', 'Aurora Zamboanga del Sur'),
(61, '000033', '22', '07', '46', '85', 'onl', '2022-2023', 'Aurora National High School', '2554451', 'Aurora Zamboanga del Sur'),
(62, '436462', '22', '08', '50', '76', 'mprint', '2022-2023', 'Aurora National High School', '325135', 'Aurora Zamboanga del Sur'),
(63, '007675', '22', '08', '48', '99', 'onl', '2022-2023', 'Aurora National High School', '3242134', 'Aurora Zamboanga del Sur'),
(64, '45132', '22', '07', '46', '84', 'mprint', '2022-2023', 'Aurora National High School', '325135', 'Aurora Zamboanga del Sur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inbox`
--

CREATE TABLE `tbl_inbox` (
  `msgID` int(11) NOT NULL,
  `mid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdate` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `pID` int(11) NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`pID`, `details`, `type`) VALUES
(16, '<h4 style=\"text-align: center;\"><span style=\"color: #008000;\"><strong><u>Araling Panlipunan</u></strong></span></h4>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #99cc00;\">Paghubog ng sinaunang kabihasnan sa asya</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #99cc00;\">Curriculum guide</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #99cc00;\">Kolonyalismo at imperyalismo sa timog at kanlurang asya</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #99cc00;\">Katangiang pisikal ng asya</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #99cc00;\">Kolonyalismo at imperyalismo sa timog at kanlurang asya</span></h5>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<h4 style=\"text-align: center;\"><span style=\"color: #008000;\"><strong><u>Arts</u></strong></span></h4>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #666699;\">Curriculum guide</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #666699;\">Arts and crafts of mindanao</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #666699;\">Arts and crafts of luzon highlands and lowlands</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #666699;\">Festivals and theatrical forms</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #666699;\">Arts and crafts of mimaropa mindoro marinduque romblon and palawan and the visayas</span></h5>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<h4 style=\"text-align: center;\"><span style=\"color: #008000;\"><strong><u>Edukasyon sa Pagpapakatao</u></strong></span></h4>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #ff99cc;\">Curriculum guide</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #ff99cc;\">Ang pagpapahalaga at birtud</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #ff99cc;\">Pagkilala at pamamahala sa mga pagbabago sa sarili</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #ff99cc;\">Ang pagtatakda ng mithiin at pagpapasiya</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #ff99cc;\">Ang pagkatao ng tao</span></h5>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<h4 style=\"text-align: center;\"><span style=\"color: #008000;\"><strong><u>English</u></strong></span></h4>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #008080;\">Writing and composition</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #008080;\">Vocabulary development</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #008080;\">Listening comprehension</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #008080;\">Curriculum guide</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #008080;\">Oral language and fluency</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #008080;\">Viewing comprehension</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #008080;\">Reading comprehension</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #008080;\">Philippine literature</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #008080;\">Grammar awareness</span></h5>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<h4 style=\"text-align: center;\"><span style=\"color: #008000;\"><strong><u>Filipino</u></strong></span></h4>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #993300;\">Estratehiya sa pag-aaral</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #993300;\">Pagsulat</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #993300;\">Panonood</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #993300;\">Pag-unawa sa binasa</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #993300;\">Curriculum guide</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #993300;\">Panitikang luzon: larawan ng pagkakakilanlan</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #993300;\">Mga akdang pampanitikan: salamin ng mindanao</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #993300;\">Wika at gramatika</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #993300;\">Pagsasalita</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #993300;\">Paglinang ng talasalitaan</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #993300;\">Pag-unawa sa napakinggan</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #993300;\">Ibong adarna: isang obra maestra</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #993300;\">Panitikang bisaya: repleksiyon ng kabisayaan</span></h5>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<h4 style=\"text-align: center;\"><span style=\"color: #008000;\"><strong><u>Health</u></strong></span></h4>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #3366ff;\">Curriculum guide</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #3366ff;\">Prevention and control of diseases and disorders (non-communicable diseases)</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #3366ff;\">Personal health</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #3366ff;\">Growth and development</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #3366ff;\">Injury prevention, safety and first aid</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #3366ff;\">Nutrition</span></h5>\r\n<p style=\"text-align: center;\"><span style=\"color: #3366ff;\">&nbsp;</span></p>\r\n<h4 style=\"text-align: center;\"><span style=\"color: #008000;\"><strong><u>Mathematics</u></strong></span></h4>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #cc99ff;\">Geometry</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #cc99ff;\">Patterns and algebra</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #cc99ff;\">Measurement</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #cc99ff;\">Numbers and number sense</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #cc99ff;\">Curriculum guide</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #cc99ff;\">Statistics and probability</span></h5>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<h4 style=\"text-align: center;\"><span style=\"color: #008000;\"><strong><u>Music</u></strong></span></h4>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #800080;\">Philippine festivals</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #800080;\">Music of cordillera mindoro palawan and the visayas</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #800080;\">Curriculum guide</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #800080;\">Music of mindanao</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #800080;\">Music of luzon lowlands</span></h5>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<h4 style=\"text-align: center;\"><span style=\"color: #008000;\"><strong><u>Physical Education</u></strong></span></h4>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #333300;\">Folk, indigenous, ethnic, traditional and festival dance</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #333300;\">Dual sports</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #333300;\">Individual sports dual sports and combative sports</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #333300;\">Folk indigenous ethnic traditional and festival dance</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #333300;\">Curriculum guide</span></h5>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<h4 style=\"text-align: center;\"><span style=\"color: #008000;\"><strong><u>Science</u></strong></span></h4>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #99cc00;\">Earth and space</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #99cc00;\">Living things and their environment</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #99cc00;\">Curriculum guide</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #99cc00;\">Force motion and energy</span></h5>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #99cc00;\">Matter</span></h5>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<h4 style=\"text-align: center;\"><span style=\"color: #008000;\"><strong><u>TLE - Industrial Arts Technical Drafting</u></strong></span></h4>\r\n<h5 style=\"padding-left: 30px; text-align: center;\"><span style=\"color: #003366;\">Home economics</span></h5>', '07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `pmtID` int(11) NOT NULL,
  `pmtcode` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `syear` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `pchange` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `pmtdate` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rank`
--

CREATE TABLE `tbl_rank` (
  `rID` int(11) NOT NULL,
  `lrnno` text CHARACTER SET utf32 COLLATE utf32_unicode_520_ci NOT NULL,
  `syear` text CHARACTER SET utf32 COLLATE utf32_unicode_520_ci NOT NULL,
  `glevel` text CHARACTER SET ucs2 COLLATE ucs2_unicode_520_ci NOT NULL,
  `section` text CHARACTER SET utf16 COLLATE utf16_unicode_520_ci NOT NULL,
  `gpa` text CHARACTER SET utf32 COLLATE utf32_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_rank`
--

INSERT INTO `tbl_rank` (`rID`, `lrnno`, `syear`, `glevel`, `section`, `gpa`) VALUES
(34, '0000018', '22', '09', '53', '156.625'),
(35, '000033', '22', '07', '46', '178.125'),
(36, '007675', '22', '08', '48', '187.125'),
(37, '857443', '22', '10', '54', '180.125'),
(38, '65425', '22', '10', '55', '364.4375'),
(39, '65425', '22', '10', '55', '364.4375'),
(40, '0087677', '22', '09', '52', '180.625'),
(41, '45132', '22', '07', '46', '360.0625'),
(42, '45132', '22', '07', '46', '360.0625'),
(43, '9865867', '22', '09', '53', '178'),
(44, '436462', '22', '08', '50', '181.125'),
(45, '4534532', '22', '09', '51', '180'),
(46, '976865', '22', '10', '56', '172.5'),
(47, '000033', '23', '08', '48', '178.4375'),
(48, '436462', '23', '09', '51', '175.4375'),
(49, '0000011', '23', '07', '45', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registrar`
--

CREATE TABLE `tbl_registrar` (
  `regID` int(11) NOT NULL,
  `regcode` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateentry` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `educ` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ofc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `con` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_registrar`
--

INSERT INTO `tbl_registrar` (`regID`, `regcode`, `dateentry`, `fname`, `lname`, `title`, `educ`, `email`, `password`, `ofc`, `addr`, `con`, `status`) VALUES
(13, 'PkWhf', '1666108800', 'Sabino', 'Genita', 'Registrar', 'BS in Computer Science', 'Rileymandula@gmail.com', 'Pa3EpKJUjf165rN', 'Western Mindanao State University', 'Aurora Zamboanga del Sur', '09154804808', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requirements`
--

CREATE TABLE `tbl_requirements` (
  `reqID` int(11) NOT NULL,
  `lrnno` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `req` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_requirements`
--

INSERT INTO `tbl_requirements` (`reqID`, `lrnno`, `req`) VALUES
(93, '1', 'CNHS_70984.docx'),
(94, '1', 'CNHS_91555.png'),
(95, '1', 'CNHS_31702.png'),
(96, '1', 'CNHS_44296.png'),
(97, '2', 'CNHS_98919.png'),
(98, '2', 'CNHS_29412.png'),
(99, '2', 'CNHS_21471.png'),
(100, '2', 'CNHS_16321.png'),
(101, '00001', 'CNHS_54081.jpg'),
(102, '00001', 'CNHS_13457.jpg'),
(103, '00001', 'CNHS_13124.png'),
(104, '00001', 'CNHS_34537.png'),
(105, '000111', 'CNHS_12568.jpg'),
(106, '000111', 'CNHS_93102.jpg'),
(107, '000111', 'CNHS_12583.png'),
(108, '000111', 'CNHS_83416.png'),
(109, '0518', 'CNHS_23012.jpg'),
(110, '0518', 'CNHS_64355.jpg'),
(111, '0518', 'CNHS_20684.png'),
(112, '0518', 'CNHS_82523.png'),
(113, '0000011', 'CNHS_89061.jpg'),
(114, '0000011', 'CNHS_94041.jpg'),
(115, '0000011', 'CNHS_43685.png'),
(116, '0000011', 'CNHS_28068.png'),
(117, '0000012', 'CNHS_12333.jpg'),
(118, '0000012', 'CNHS_35391.jpg'),
(119, '0000012', 'CNHS_24633.png'),
(120, '0000012', 'CNHS_62701.png'),
(121, '0000013', 'CNHS_45113.jpg'),
(122, '0000013', 'CNHS_35074.jpg'),
(123, '0000013', 'CNHS_61375.png'),
(124, '0000013', 'CNHS_27622.png'),
(125, '0000014', 'CNHS_66858.jpg'),
(126, '0000014', 'CNHS_42994.jpg'),
(127, '0000014', 'CNHS_95808.png'),
(128, '0000014', 'CNHS_19833.png'),
(129, '0000015', 'CNHS_29648.jpg'),
(130, '0000015', 'CNHS_55883.jpg'),
(131, '0000015', 'CNHS_29058.png'),
(132, '0000015', 'CNHS_75447.png'),
(133, '0000016', 'CNHS_64487.jpg'),
(134, '0000016', 'CNHS_41483.jpg'),
(135, '0000016', 'CNHS_51117.png'),
(136, '0000016', 'CNHS_62514.png'),
(137, '0000017', 'CNHS_33478.jpg'),
(138, '0000017', 'CNHS_27778.jpg'),
(139, '0000017', 'CNHS_11771.png'),
(140, '0000017', 'CNHS_40923.png'),
(141, '0000018', 'CNHS_67511.jpg'),
(142, '0000018', 'CNHS_57257.jpg'),
(143, '0000018', 'CNHS_23716.png'),
(144, '0000018', 'CNHS_88299.png'),
(145, '0000019', 'CNHS_37095.jpg'),
(146, '0000019', 'CNHS_73908.jpg'),
(147, '0000019', 'CNHS_59176.png'),
(148, '0000019', 'CNHS_22589.png'),
(149, '000020', 'CNHS_25148.jpg'),
(150, '000020', 'CNHS_14001.jpg'),
(151, '000020', 'CNHS_58624.png'),
(152, '000020', 'CNHS_42166.png'),
(153, '006866', 'CNHS_82226.jpg'),
(154, '006866', 'CNHS_99888.jpg'),
(155, '006866', 'CNHS_97736.png'),
(156, '006866', 'CNHS_94377.png'),
(157, '000033', 'CNHS_13735.jpg'),
(158, '000033', 'CNHS_12084.jpg'),
(159, '000033', 'CNHS_39647.png'),
(160, '000033', 'CNHS_82168.png'),
(161, '007675', 'CNHS_46028.jpg'),
(162, '007675', 'CNHS_57677.jpg'),
(163, '007675', 'CNHS_40264.png'),
(164, '007675', 'CNHS_19988.png'),
(165, '45132', 'CNHS_97395.jpg'),
(166, '45132', 'CNHS_74008.jpg'),
(167, '45132', 'CNHS_51051.png'),
(168, '45132', 'CNHS_98354.png'),
(169, '436462', 'CNHS_90132.jpg'),
(170, '436462', 'CNHS_91864.jpg'),
(171, '436462', 'CNHS_10399.png'),
(172, '436462', 'CNHS_80738.png'),
(173, '4534532', 'CNHS_98026.jpg'),
(174, '4534532', 'CNHS_66715.jpg'),
(175, '4534532', 'CNHS_72004.png'),
(176, '4534532', 'CNHS_20718.png'),
(177, '0087677', 'CNHS_72902.jpg'),
(178, '0087677', 'CNHS_93108.jpg'),
(179, '0087677', 'CNHS_71867.png'),
(180, '0087677', 'CNHS_19230.png'),
(181, '9865867', 'CNHS_46162.jpg'),
(182, '9865867', 'CNHS_33670.jpg'),
(183, '9865867', 'CNHS_80368.png'),
(184, '9865867', 'CNHS_99449.png'),
(185, '857443', 'CNHS_23980.jpg'),
(186, '857443', 'CNHS_90747.jpg'),
(187, '857443', 'CNHS_45099.png'),
(188, '857443', 'CNHS_35129.png'),
(189, '65425', 'CNHS_39565.jpg'),
(190, '65425', 'CNHS_43097.jpg'),
(191, '65425', 'CNHS_75672.png'),
(192, '65425', 'CNHS_40564.png'),
(193, '976865', 'CNHS_59734.jpg'),
(194, '976865', 'CNHS_29525.jpg'),
(195, '976865', 'CNHS_52045.png'),
(196, '976865', 'CNHS_93604.png'),
(197, '0000011', 'CNHS_54452.jpg'),
(198, '0000011', 'CNHS_39192.jpg'),
(199, '0000011', 'CNHS_83070.png'),
(200, '0000011', 'CNHS_20599.png'),
(201, '067676', 'CNHS_20861.jpg'),
(202, '067676', 'CNHS_24782.jpg'),
(203, '067676', 'CNHS_81621.png'),
(204, '067676', 'CNHS_47298.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `schID` int(11) NOT NULL,
  `section_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sch_day` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_start` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_end` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subj` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`schID`, `section_id`, `sch_day`, `time_start`, `time_end`, `subj`, `faculty`, `status`) VALUES
(50, '45', 'MTTHF', '1667685600', '1667687400', '54', 'YRerq', 'open'),
(51, '45', 'MTTHF', '1667687460', '1667689200', '55', 'YRerq', 'open'),
(52, '45', 'MTTHF', '1667692800', '1667694600', '56', 'YRerq', 'open'),
(53, '45', 'MTTHF', '1667696400', '1667698200', '58', 'YRerq', 'open'),
(54, '49', 'MTTHF', '1667689200', '1667691000', '59', 'z5qT6', 'open'),
(55, '54', 'MTTHF', '1667689200', '1667691000', '64', 'nw7sK', 'open'),
(57, '46', 'MTTHF', '1667862720', '1667866320', '54', 'z5qT6', 'open'),
(58, '46', 'MTTHF', '1667866380', '1667869980', '55', 'z5qT6', 'open'),
(59, '46', 'MTTHF', '1667913240', '1667916840', '56', 'gnz1U', 'open'),
(60, '47', 'MTTHF', '1667862900', '1667866500', '54', 'gnz1U', 'open'),
(61, '47', 'MTTHF', '1667913360', '1667916960', '55', 'nw7sK', 'open'),
(62, '47', 'MTTHF', '1667917020', '1667920680', '56', 'nw7sK', 'open'),
(63, '48', 'MTTHF', '1667863200', '1667866860', '59', 'nw7sK', 'open'),
(64, '48', 'MTTHF', '1667856300', '1667859900', '60', 'YRerq', 'open'),
(65, '50', 'MTTHF', '1667863620', '1667867220', '59', 'B7yhJ', 'open'),
(66, '50', 'MTTHF', '1667910420', '1667914080', '60', 'B7yhJ', 'open'),
(67, '50', 'MTTHF', '1667856600', '1667860200', '61', 'B7yhJ', 'open'),
(68, '51', 'MTTHF', '1667863980', '1667867580', '62', 'QbFuy', 'open'),
(69, '51', 'MTTHF', '1667914440', '1667921640', '63', 'QbFuy', 'open'),
(70, '52', 'MTTHF', '1667864160', '1667867760', '62', 'EYkwf', 'open'),
(71, '52', 'MTTHF', '1667911200', '1667914620', '63', 'EYkwf', 'open'),
(72, '53', 'MTTHF', '1667864220', '1667911020', '62', 'nX1bY', 'open'),
(73, '53', 'MTTHF', '1667914680', '1667918280', '63', 'nX1bY', 'open'),
(74, '54', 'MTTHF', '1667911140', '1667914740', '65', '5WkD7', 'open'),
(75, '55', 'MTTHF', '1667864400', '1667868000', '64', '5WkD7', 'open'),
(76, '55', 'MTTHF', '1667871660', '1667875260', '65', '5WkD7', 'open'),
(77, '56', 'MTTHF', '1667864520', '1667868120', '64', 'UD81P', 'open'),
(78, '56', 'MTTHF', '1667871840', '1667875440', '65', 'UD81P', 'open'),
(79, '45', 'MTTHF', '1668454380', '1668457980', '66', 'z5qT6', 'open'),
(80, '45', 'MTTHF', '1668447240', '1668450840', '67', 'YRerq', 'open'),
(81, '45', 'MTTHF', '1668461640', '1668465240', '85', 'gnz1U', 'open'),
(82, '46', 'MTTHF', '1668465360', '1668468960', '57', 'z5qT6', 'open'),
(83, '46', 'MTTHF', '1668472560', '1668476220', '58', 'z5qT6', 'open'),
(84, '46', 'MTTHF', '1668479820', '1668483420', '66', 'z5qT6', 'open'),
(85, '46', 'MTTHF', '1668523020', '1668526680', '67', '04xwH', 'open'),
(86, '46', 'MTTHF', '1668494400', '1668498000', '85', 'gnz1U', 'open'),
(87, '47', 'MTTHF', '1668491220', '1668494880', '57', '04xwH', 'open'),
(88, '47', 'MTTHF', '1668498480', '1668502080', '58', '04xwH', 'open'),
(89, '47', 'MTTHF', '1668458940', '1668462540', '66', 'nw7sK', 'open'),
(90, '47', 'MTTHF', '1668509400', '1668513000', '67', 'YRerq', 'open'),
(91, '47', 'MTTHF', '1668448200', '1668451920', '85', 'nw7sK', 'open'),
(92, '48', 'MTTHF', '1668491760', '1668495360', '61', '5WkD7', 'open'),
(93, '48', 'MTTHF', '1668473820', '1668477420', '68', 'nX1bY', 'open'),
(94, '48', 'MTTHF', '1668477660', '1668481260', '69', 'gnz1U', 'open'),
(95, '48', 'MTTHF', '1668484860', '1668488520', '70', 'gnz1U', 'open'),
(96, '48', 'MTTHF', '1668452580', '1668456180', '71', '5WkD7', 'open'),
(97, '48', 'MTTHF', '1668456240', '1668459840', '72', '5WkD7', 'open'),
(98, '49', 'MTTHF', '1668470880', '1668474480', '60', 'gnz1U', 'open'),
(99, '49', 'MTTHF', '1668474600', '1668478140', '61', 'UD81P', 'open'),
(100, '49', 'MTTHF', '1668496140', '1668499800', '68', 'QbFuy', 'open'),
(101, '49', 'MTTHF', '1668503400', '1668507000', '69', 'z5qT6', 'open'),
(102, '49', 'MTTHF', '1668507060', '1668510660', '70', 'gnz1U', 'open'),
(103, '49', 'MTTHF', '1668514320', '1668517920', '71', 'YRerq', 'open'),
(104, '49', 'MTTHF', '1668521520', '1668525120', '72', 'YRerq', 'open'),
(105, '50', 'MTTHF', '1668499980', '1668503580', '68', 'nw7sK', 'open'),
(106, '50', 'MTTHF', '1668507300', '1668510840', '69', 'z5qT6', 'open'),
(107, '50', 'MTTHF', '1668514440', '1668518100', '70', 'z5qT6', 'open'),
(108, '50', 'MTTHF', '1668521700', '1668525300', '71', 'nw7sK', 'open'),
(109, '50', 'MTTHF', '1668442560', '1668489360', '72', 'pJgnQ', 'open'),
(110, '51', 'MTTHF', '1668485880', '1668489480', '73', 'bw2ka', 'open'),
(111, '51', 'MTTHF', '1668493140', '1668496740', '74', 'bw2ka', 'open'),
(112, '51', 'MTTHF', '1668504000', '1668507600', '75', 'YRerq', 'open'),
(113, '51', 'MTTHF', '1668468000', '1668471600', '76', 'bw2ka', 'open'),
(114, '51', 'MTTHF', '1668475260', '1668478860', '77', 'pJgnQ', 'open'),
(115, '51', 'MTTHF', '1668478920', '1668482460', '78', 'bw2ka', 'open'),
(116, '52', 'MTTHF', '1668464520', '1668468120', '73', '3WzBZ', 'open'),
(117, '52', 'MTTHF', '1668500580', '1668504180', '74', 'pJgnQ', 'open'),
(118, '52', 'MTTHF', '1668507840', '1668511440', '75', 'pJgnQ', 'open'),
(119, '52', 'MTTHF', '1668471840', '1668475440', '76', 'B7yhJ', 'open'),
(120, '52', 'MTTHF', '1668515100', '1668518700', '77', 'pJgnQ', 'open'),
(121, '52', 'MTTHF', '1668475500', '1668479100', '78', '3WzBZ', 'open'),
(122, '53', 'MTTHF', '1668497220', '1668500880', '73', 'bw2ka', 'open'),
(123, '53', 'MTTHF', '1668457740', '1668461340', '74', 'bw2ka', 'open'),
(124, '53', 'MTTHF', '1668464940', '1668468540', '75', 'pJgnQ', 'open'),
(125, '53', 'MTTHF', '1668468600', '1668472200', '76', '3WzBZ', 'open'),
(126, '53', 'MTTHF', '1668519000', '1668522600', '77', 'pJgnQ', 'open'),
(127, '53', 'MTTHF', '1668526260', '1668527760', '78', '3WzBZ', 'open'),
(128, '54', 'MTTHF', '1668508980', '1668512580', '79', '3Nkx5', 'open'),
(129, '54', 'MTTHF', '1668498360', '1668501960', '80', 'Xxzsw', 'open'),
(130, '54', 'MTTHF', '1668444600', '1668448200', '81', 'bw2ka', 'open'),
(131, '54', 'MTTHF', '1668451860', '1668455460', '82', 'bw2ka', 'open'),
(132, '54', 'MTTHF', '1668466260', '1668469860', '83', 'Xxzsw', 'open'),
(133, '54', 'MTTHF', '1668477180', '1668480780', '84', 'Xxzsw', 'open'),
(134, '55', 'MTTHF', '1668513180', '1668516840', '79', '3Nkx5', 'open'),
(135, '55', 'MTTHF', '1668480840', '1668484440', '80', 'Xxzsw', 'open'),
(136, '55', 'MTTHF', '1668444900', '1668448500', '81', '3Nkx5', 'open'),
(137, '55', 'MTTHF', '1668452160', '1668455760', '82', '3WzBZ', 'open'),
(138, '55', 'MTTHF', '1668495300', '1668498900', '83', '3Nkx5', 'open'),
(139, '55', 'MTTHF', '1668506340', '1668509940', '84', 'bw2ka', 'open'),
(140, '56', 'MTTHF', '1668510060', '1668513660', '79', 'EYkwf', 'open'),
(141, '56', 'MTTHF', '1668517260', '1668520860', '80', 'EfZJd', 'open'),
(142, '56', 'MTTHF', '1668520920', '1668524520', '81', 'vs8ej', 'open'),
(143, '56', 'MTTHF', '1668445380', '1668448980', '82', 'Xxzsw', 'open'),
(144, '56', 'MTTHF', '1668452760', '1668456360', '83', 'vs8ej', 'open'),
(145, '56', 'MTTHF', '1668459960', '1668463560', '84', 'EfZJd', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school_year`
--

CREATE TABLE `tbl_school_year` (
  `syID` int(11) NOT NULL,
  `syear` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_school_year`
--

INSERT INTO `tbl_school_year` (`syID`, `syear`, `status`) VALUES
(17, '2022-2023', 'deactivated'),
(22, '2023-2024', 'deactivated'),
(23, '2024-2025', 'activated'),
(26, '2025-2026', 'deactivated'),
(27, '2026-2027', 'deactivated'),
(28, '2027-2028', 'deactivated'),
(29, '2028-2029', 'deactivated');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_section`
--

CREATE TABLE `tbl_section` (
  `secID` int(11) NOT NULL,
  `glevel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `scode` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `secname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gpafrom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gpato` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `studlimit` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `limitavail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_section`
--

INSERT INTO `tbl_section` (`secID`, `glevel`, `scode`, `secname`, `gpafrom`, `gpato`, `studlimit`, `limitavail`, `teacher`, `remarks`) VALUES
(44, '07', '7S13', 'Central School', '88', '100', '50', '50', 'YRerq', 'close'),
(45, '07', '7A', 'Section 1', '88', '100', '45', '39', 'YRerq', 'open'),
(46, '07', '7B', 'Section 2', '80', '87', '45', '45', 'QbFuy', 'open'),
(47, '07', '7C', 'Section 3', '75', '79', '45', '45', 'z5qT6', 'open'),
(48, '08', '8A', 'Section 1', '88', '100', '45', '45', 'gnz1U', 'open'),
(49, '08', '8B', 'Section 2', '80', '87', '45', '45', 'nw7sK', 'open'),
(50, '08', '8C', 'Section 3', '75', '79', '45', '45', '04xwH', 'open'),
(51, '09', '9A', 'Section 1', '88', '100', '45', '45', 'QbFuy', 'open'),
(52, '09', '9B', 'Section 2', '80', '87', '45', '45', 'EYkwf', 'open'),
(53, '09', '9C', 'Section 3', '75', '79', '45', '45', 'nX1bY', 'open'),
(54, '10', '10A', 'Section 1', '88', '100', '45', '45', '5WkD7', 'open'),
(55, '10', '10B', 'Section 2', '80', '87', '45', '45', '5WkD7', 'open'),
(56, '10', '10C', 'Section 3', '75', '79', '45', '45', 'UD81P', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `studID` int(11) NOT NULL,
  `dentry` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stcode` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `syear` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `glevel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `etype` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `psano` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lrnno` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gpa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sfname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dbirth` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `indigent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ind_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mtongue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpno` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `semail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `staddr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `zcode` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `moname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pacon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lyear` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `scname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `scid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `scaddr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `certify` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`studID`, `dentry`, `stcode`, `syear`, `glevel`, `etype`, `psano`, `lrnno`, `gpa`, `section`, `sfname`, `slname`, `mname`, `dbirth`, `gender`, `indigent`, `ind_details`, `mtongue`, `cpno`, `semail`, `password`, `staddr`, `zcode`, `faname`, `moname`, `pacon`, `lyear`, `scname`, `scid`, `scaddr`, `method`, `certify`, `status`, `remarks`) VALUES
(112, '1668614400', 'DvBRN', '22', '09', 'with', '356565', '0000018', '78', '53', 'Miya', 'Legarde', 'Quinco', '2009-07-11', 'male', 'no', 'N/A', 'Cebuano', '09154804808', 'miya@gmail.com', 'PZ9Mc2sSTNFV5bu', 'Aurora ZDS', '0545', 'Mr. Father', 'Mrs. Mother', '09122911909', '2022-2023', 'Aurora National High School', '2554451', 'Aurora Zamboanga del Sur', 'onl', 'agree', 'inactive', 'accepted'),
(116, '1668787200', 'y5Sph', '23', '08', 'with', '43535342', '000033', '85', '48', 'Roy', 'Ceniza', 'Montes', '2022-11-01', 'male', 'no', 'N/A', 'Cebuano', '09154804808', 'roy@gmail.com', 'fFZxnUCdNG14g58', 'Aurora ZDS', '4323', 'Mr. Father', 'Mrs. Mother', '09122911909', '22', 'Aurora National High School', '2554451', 'Aurora Zamboanga del Sur', 'onl', 'agree', 'active', 'accepted'),
(117, '1668787200', 'mQfzY', '23', '09', 'no', '32424', '007675', '99', '51', 'Feb', 'Legarde', 'Quinco', '2022-11-01', 'male', 'no', 'N/A', 'Cebuano', '09154804808', 'feb@gmail.com', 'z0AC6S4mTW1Nk8M', 'Aurora ZDS', '34412', 'Mr. Father', 'Mrs. Mother', '09122911909', '22', 'Aurora National High School', '3242134', 'Aurora Zamboanga del Sur', 'onl', 'agree', 'active', 'pending'),
(118, '1668787200', 'Zfdrh', '23', '08', 'no', '3241241', '45132', '84', '48', 'Hou', 'Valdez', 'li', '2022-11-09', 'male', 'no', 'N/A', 'Cebuano', '09154804808', 'hou@gmail.com', 'NxaUZr8Y9vyn3Bh', 'Aurora ZDS', '6545', 'Mr. Father', 'Mrs. Mother', '09122911909', '22', 'Aurora National High School', '325135', 'Aurora Zamboanga del Sur', 'mprint', 'agree', 'active', 'accepted'),
(119, '1668787200', 'YGNxk', '23', '09', 'no', '432532', '436462', '76', '51', 'Mar', 'Chim', 'Montes', '2022-11-03', 'male', 'no', 'N/A', 'Cebuano', '09154804808', 'mar@gmail.com', 'd5qtXTK6SwhzEax', 'Aurora ZDS', '2323', 'Mr. Father', 'Mrs. Mother', '09122911909', '22', 'Aurora National High School', '325135', 'Aurora Zamboanga del Sur', 'mprint', 'agree', 'active', 'accepted'),
(120, '1668787200', '0zZqx', '22', '09', 'no', '3214312', '4534532', '99', '51', 'Maya', 'Valdez', 'Haya', '2022-11-02', 'female', 'no', 'N/A', 'Cebuano', '09154804808', 'maya@gmail.com', 'mEcHAR5qwd3CB46', 'Aurora ZDS', '23322', 'Mr. Father', 'Mrs. Mother', '09122911909', '2022-2023', 'Aurora National High School', '325135', 'Aurora Zamboanga del Sur', 'mprint', 'agree', 'inactive', 'accepted'),
(121, '1668787200', 'paKMv', '22', '09', 'no', '2344', '0087677', '82', '52', 'Haia', 'Chim', 'Montes', '2022-11-02', 'female', 'no', 'N/A', 'Cebuano', '09154804808', 'haya@gmail.com', '0rsFm4GwcHpazPM', 'Aurora ZDS', '341', 'Mr. Father', 'Mrs. Mother', '09122911909', '2022-2023', 'Aurora National High School', '325135', 'Aurora Zamboanga del Sur', 'onl', 'agree', 'inactive', 'accepted'),
(122, '1668787200', 'pMRnr', '22', '09', 'no', '432213431', '9865867', '75', '53', 'Lia', 'Tan', 'Montes', '2022-11-02', 'female', 'no', 'N/A', 'Cebuano', '09154804808', 'lia@gmail.com', 's59NXk2U0ExjdZA', 'Aurora ZDS', '43214', 'Mr. Father', 'Mrs. Mother', '09122911909', '2022-2023', 'Aurora National High School', '344324', 'Aurora Zamboanga del Sur', 'home', 'agree', 'inactive', 'accepted'),
(123, '1668787200', 'BAKt3', '22', '10', 'no', '324124', '857443', '99', '54', 'Day', 'Valdez', 'Haya', '2022-11-03', 'female', 'no', 'N/A', 'Cebuano', '09154804808', 'day@gmail.com', 'ZXnDfbzB6Ramvsp', 'Aurora ZDS', '3242', 'Mr. Father', 'Mrs. Mother', '09122911909', '2022-2023', 'Aurora National High School', '325135', 'Aurora Zamboanga del Sur', 'mprint', 'agree', 'inactive', 'accepted'),
(124, '1668787200', 'e1nYQ', '22', '10', 'no', '325324523', '65425', '82', '55', 'Fe', 'Tan', 'Chi', '2022-11-09', 'female', 'no', 'N/A', 'Cebuano', '09154804808', 'fe@gmail.com', 'YvdV2mfrBp0AUnb', 'Aurora ZDS', '432142', 'Mr. Father', 'Mrs. Mother', '09122911909', '2022-2023', 'Aurora National High School', '325135', 'Aurora Zamboanga del Sur', 'onl', 'agree', 'inactive', 'accepted'),
(125, '1668787200', 'eZgty', '22', '10', 'no', '532524', '976865', '76', '56', 'Teaa', 'Legarde', 'Taraya', '2022-11-03', 'female', 'no', 'N/A', 'Cebuano', '09154804808', 'tia@gmail.com', '12RHgZFQS6hePfs', 'Aurora ZDS', '9201', 'Mr. Father', 'Mrs. Mother', '09122911909', '2022-2023', 'Aurora National High School', '352132', 'Aurora Zamboanga del Sur', 'mprint', 'agree', 'inactive', 'accepted'),
(126, '1668873600', 'q897v', '23', '07', 'no', '563454', '0000011', '99', '45', 'Loid', 'Chim', 'Montes', '2022-11-04', 'male', 'no', 'N/A', 'Cebuano', '09154804808', 'loid@gmail.com', 'TtUCu5VaxSzHnqv', 'Aurora ZDS', '9090', 'Mr. Father', 'Mrs. Mother', '09122911909', '2022-2023', 'Aurora National High School', '325135', 'Aurora Zamboanga del Sur', 'onl', 'agree', 'active', 'accepted'),
(127, '1668873600', 'REuPD', '23', '07', 'no', '02819281', '067676', '99', '45', 'Del', 'Valdez', 'Montes', '2022-11-03', 'female', 'no', 'N/A', 'Cebuano', '09154804808', 'del@gmail.com', 'RT7SH4VAcU89MPv', 'Aurora ZDS', '9090', 'Mr. Father', 'Mrs. Mother', '09122911909', '2022-2023', 'Aurora National High School', '325135', 'Aurora Zamboanga del Sur', 'onl', 'agree', 'active', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `suID` int(11) NOT NULL,
  `glevel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sucode` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `descr` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`suID`, `glevel`, `sucode`, `descr`) VALUES
(54, '07', 'Math101', 'Mathemathics'),
(55, '07', 'ENG101', 'English'),
(56, '07', 'AR101', 'Araling Panlipunan'),
(57, '07', 'FIL101', 'Filipino'),
(58, '07', 'SCIENCE101', 'Science'),
(59, '08', 'ARAL-PANLIPUNAN102', 'Araling Panlipunan'),
(60, '08', 'FIL102', 'Filipino'),
(61, '08', 'SCIENCE102', 'Science'),
(62, '09', 'FIL103', 'Filipino'),
(63, '09', 'AR103', 'Araling Panlipunan'),
(64, '10', 'FIL104', 'Filipino'),
(65, '10', 'MATH104', 'Mathematics'),
(66, '07', 'TLE 101', 'Technology and Livelihood Education'),
(67, '07', 'MAPEH 101', 'MAPEH'),
(68, '08', 'TLE 102', 'Technology and Livelihood Education'),
(69, '08', 'Math102', 'Mathematics'),
(70, '08', 'ENGLISH102', 'English'),
(71, '08', 'MAPEH102', 'MAPEH'),
(72, '08', 'EP102', 'Edukasyon sa Pagpapakatao'),
(73, '09', 'ENG103', 'English'),
(74, '09', 'MATH103', 'Mathematics'),
(75, '09', 'MAPEH103', 'MAPEH'),
(76, '09', 'EP103', 'Edukasyon sa Pagpapakatao'),
(77, '09', 'SCIENCE103', 'Science'),
(78, '09', 'TLE103', 'Technology and Livelihood Education'),
(79, '10', 'ENG104', 'English'),
(80, '10', 'MAPEH104', 'MAPEH'),
(81, '10', 'SCIENCE104', 'Science'),
(82, '10', 'EP104', 'Edukasyon sa Pagpapakatao'),
(83, '10', 'TLE104', 'Technology and Livelihood Education'),
(84, '10', 'ARALPAN104', 'Araling Panlipunan'),
(85, '07', 'EP101', 'Edukasyon sa Pagpapakatao');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp_enrollment`
--

CREATE TABLE `tbl_temp_enrollment` (
  `tempID` int(11) NOT NULL,
  `tempdate` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `temptime` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lrnno` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempcode` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`abID`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admID`);

--
-- Indexes for table `tbl_chatbox`
--
ALTER TABLE `tbl_chatbox`
  ADD PRIMARY KEY (`chatID`);

--
-- Indexes for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  ADD PRIMARY KEY (`facID`);

--
-- Indexes for table `tbl_grades`
--
ALTER TABLE `tbl_grades`
  ADD PRIMARY KEY (`grID`);

--
-- Indexes for table `tbl_grade_level`
--
ALTER TABLE `tbl_grade_level`
  ADD PRIMARY KEY (`glID`);

--
-- Indexes for table `tbl_history`
--
ALTER TABLE `tbl_history`
  ADD PRIMARY KEY (`hID`);

--
-- Indexes for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  ADD PRIMARY KEY (`msgID`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`pID`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`pmtID`);

--
-- Indexes for table `tbl_rank`
--
ALTER TABLE `tbl_rank`
  ADD PRIMARY KEY (`rID`);

--
-- Indexes for table `tbl_registrar`
--
ALTER TABLE `tbl_registrar`
  ADD PRIMARY KEY (`regID`);

--
-- Indexes for table `tbl_requirements`
--
ALTER TABLE `tbl_requirements`
  ADD PRIMARY KEY (`reqID`);

--
-- Indexes for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`schID`);

--
-- Indexes for table `tbl_school_year`
--
ALTER TABLE `tbl_school_year`
  ADD PRIMARY KEY (`syID`);

--
-- Indexes for table `tbl_section`
--
ALTER TABLE `tbl_section`
  ADD PRIMARY KEY (`secID`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`studID`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`suID`);

--
-- Indexes for table `tbl_temp_enrollment`
--
ALTER TABLE `tbl_temp_enrollment`
  ADD PRIMARY KEY (`tempID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `abID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_chatbox`
--
ALTER TABLE `tbl_chatbox`
  MODIFY `chatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  MODIFY `facID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tbl_grades`
--
ALTER TABLE `tbl_grades`
  MODIFY `grID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT for table `tbl_grade_level`
--
ALTER TABLE `tbl_grade_level`
  MODIFY `glID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_history`
--
ALTER TABLE `tbl_history`
  MODIFY `hID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  MODIFY `msgID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `pID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `pmtID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_rank`
--
ALTER TABLE `tbl_rank`
  MODIFY `rID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_registrar`
--
ALTER TABLE `tbl_registrar`
  MODIFY `regID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_requirements`
--
ALTER TABLE `tbl_requirements`
  MODIFY `reqID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `schID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `tbl_school_year`
--
ALTER TABLE `tbl_school_year`
  MODIFY `syID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_section`
--
ALTER TABLE `tbl_section`
  MODIFY `secID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `studID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `suID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `tbl_temp_enrollment`
--
ALTER TABLE `tbl_temp_enrollment`
  MODIFY `tempID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
