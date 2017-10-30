-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 19, 2013 at 09:30 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ruperban_sylhet360`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `last_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `email_notification_id` text COLLATE latin1_general_ci NOT NULL,
  `type` enum('0','1') COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `status` enum('Active','Inactive') COLLATE latin1_general_ci NOT NULL DEFAULT 'Active',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `username`, `password`, `email`, `email_notification_id`, `type`, `status`, `created`, `modified`, `last_login`) VALUES
(1, 'Sadiquzzaman', 'Choudhury', 'admin', '123456', 'topubuf@gmail.com', '', '0', 'Active', '2008-08-01 00:00:00', '0000-00-00 00:00:00', '2011-11-26 08:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE IF NOT EXISTS `admin_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` smallint(4) NOT NULL,
  `title` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `url` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `parent`, `title`, `url`, `sort`) VALUES
(1, 0, 'Settings', 'index', 1),
(5, 0, 'Logout', 'login/logout', 5),
(2, 0, 'Users', 'user', 2),
(3, 0, 'Pages', 'page', 3),
(6, 1, 'Site Setting', 'index/site_setting', 5),
(7, 1, 'Admin Setting', 'index/admin_setting', 6),
(8, 1, 'Email Setting', 'index/email_setting', 7),
(9, 6, 'test', 'test', 9),
(10, 6, 'another test', 'another test', 10),
(11, 2, 'Add User', 'user/add_user', 11);

-- --------------------------------------------------------

--
-- Table structure for table `admin_submenu`
--

CREATE TABLE IF NOT EXISTS `admin_submenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `url` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=49 ;

--
-- Dumping data for table `admin_submenu`
--

INSERT INTO `admin_submenu` (`id`, `menu_id`, `title`, `url`, `sort`) VALUES
(1, 1, 'Site Settings', 'setting.php', 3),
(2, 1, 'Admin Settings', 'admin.php', 40),
(48, 1, 'Email Settings', 'email.php', 48);

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `id` tinyint(4) NOT NULL,
  `adminuser` varchar(30) NOT NULL,
  `adminpass` varchar(10) NOT NULL,
  `logged` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `adminuser`, `adminpass`, `logged`) VALUES
(1, 'admin', '111111', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(300) NOT NULL,
  `url_name` varchar(300) NOT NULL,
  `parent_id` mediumint(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `url_name`, `parent_id`) VALUES
(1, 'Airlines', 'airlines', 0),
(2, 'ATM Booth', 'atmbooth', 0),
(3, 'Bank', 'bank', 0),
(4, 'Hospital & Clinic', 'hospitalandclinic', 0),
(5, 'College', 'college', 0),
(6, 'University', 'university', 0),
(7, 'Diagnostic Center', 'diagnostic', 0),
(8, 'Blood Bank', 'bloodbank', 0),
(9, 'School', 'school', 0),
(10, 'Insurence', 'insurence', 0),
(11, 'Hotel', 'hotel', 0),
(12, 'Restaurant', 'restaurent', 0),
(13, 'Sonali Bank', 'sonalibank', 3),
(14, 'Rupali Bank', 'rupalibank', 3),
(15, 'Janata Bank', 'janatabank', 3),
(16, 'Agrani Bank', 'agranibank', 3),
(17, 'Pubali Bank', 'pubalibank', 3),
(18, 'Uttara Bank', 'uttarabank', 3),
(19, 'Standard Chartard Bank', 'scb', 3),
(20, 'test3', 'werwerwer', 0),
(21, 'eeeeee', 'eeefff', 20);

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE IF NOT EXISTS `configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(64) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `value` text COLLATE latin1_general_ci NOT NULL,
  `options` text COLLATE latin1_general_ci NOT NULL,
  `group_id` int(11) NOT NULL DEFAULT '1',
  `title` varchar(64) COLLATE latin1_general_ci DEFAULT NULL,
  `description` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `type` enum('Textbox','Textarea','Selectbox','Boolean') COLLATE latin1_general_ci NOT NULL DEFAULT 'Textbox',
  `sort` int(5) NOT NULL DEFAULT '0',
  `visible` enum('Yes','No') COLLATE latin1_general_ci NOT NULL DEFAULT 'Yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `key`, `value`, `options`, `group_id`, `title`, `description`, `type`, `sort`, `visible`) VALUES
(1, 'SITE_NAME', 'Codeigniter Framework', '', 1, 'Site Name', NULL, 'Textbox', 1, 'Yes'),
(2, 'HEADER_TEXT', 'Framework', '', 1, 'Header Text', NULL, 'Textbox', 2, 'Yes'),
(3, 'FOOTER_TEXT', 'Copyrightd ? 2010. All Rights Reserved. <a href=''http://www.topslabs.com'' target=''_BLANK''>TopsLabs</a>', '', 1, 'Footer Text', NULL, 'Textbox', 3, 'Yes'),
(5, 'MAX_IMAGE_WIDTH', '600', '', 1, 'Max Image Width', NULL, 'Textbox', 5, 'No'),
(6, 'MAX_IMAGE_HEIGHT', '600', '', 1, 'Max Image Height', NULL, 'Textbox', 6, 'No'),
(7, 'MAX_THUMB_WIDTH', '120', '', 1, 'Max Thumbnail Width', NULL, 'Textbox', 7, 'No'),
(8, 'MAX_THUMB_HEIGHT', '200', '', 1, 'Max Thumbnail Height', NULL, 'Textbox', 8, 'No'),
(9, 'MAX_PHOTO_UPLOAD', '5', '', 1, 'Max Photo Upload', NULL, 'Textbox', 9, 'No'),
(10, 'LISTING_PER_PAGE', '10', '', 1, 'Listing Per Page', '', 'Textbox', 10, 'Yes'),
(11, 'SITE_EMAIL_ADDRESS', 'admin@localhost.comd', '', 1, 'Site default email address', 'Default email address of the admin', 'Textbox', 11, 'Yes'),
(12, 'TEXTAREA', 'this is textarea', '', 1, 'Textarea', 'this is a textarea', 'Textarea', 12, 'Yes'),
(13, 'SELECTBOX', 'No', 'Yes|No', 1, 'Selectbox', 'this is a selectbox', 'Selectbox', 13, 'Yes'),
(14, 'CHECKBOX', 'Yes', 'Yes|No', 1, 'Checkbox', 'this is a checkbox', 'Boolean', 14, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `configuration_group`
--

CREATE TABLE IF NOT EXISTS `configuration_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `sort` int(5) NOT NULL DEFAULT '0',
  `visible` enum('Yes','No') COLLATE latin1_general_ci NOT NULL DEFAULT 'Yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `configuration_group`
--

INSERT INTO `configuration_group` (`id`, `title`, `description`, `sort`, `visible`) VALUES
(1, 'Site Settings', '', 1, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `currency_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(100) NOT NULL,
  `buy` float NOT NULL,
  `sell` float NOT NULL,
  PRIMARY KEY (`currency_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currency_id`, `currency_name`, `buy`, `sell`) VALUES
(21, 'US Dollar', 77.7, 78.7),
(22, 'GBP', 120.215, 123.6),
(23, 'Euro', 101.745, 104.899),
(24, 'J. Yen', 0.7786, 0.8047),
(25, 'S. Riyal', 20.6177, 21.0849),
(26, 'Mal. Ring.', 26.0704, 26.684),
(27, 'K. Dinnar', 271.215, 279.015),
(28, 'S. Dollar', 62.8375, 65.0931),
(29, 'USD T.C', 78.75, 79.75),
(30, 'GBP T.C', 117.21, 120.59);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(300) NOT NULL,
  `event_date` date NOT NULL,
  `venue` varchar(300) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_name`, `event_date`, `venue`) VALUES
(1, 'boishakhi mela', '2013-04-22', 'Zila Parishad Complex'),
(2, 'Gallyery show FULL', '2013-04-20', 'Sylhet Auditorium'),
(3, 'boishakhi mela', '2013-05-22', 'Sylhet Shilpokola Academy'),
(4, 'Gallyery show', '2013-04-27', 'Sylhet Shilpokola Academy'),
(5, 'Drama Week', '2013-04-10', 'Sylhet Shilpokola Academy'),
(6, 'Drama Week sdfkjkds', '2013-04-21', 'Zila Parishad Complex'),
(7, 'Drama Week', '2013-06-09', 'Zila Parishad Complex'),
(9, 'sdfdsaf', '2013-10-20', 'Sylhet Auditorium');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `info_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` mediumint(9) NOT NULL,
  `title` varchar(300) NOT NULL,
  `detail` text NOT NULL,
  PRIMARY KEY (`info_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`info_id`, `category_id`, `title`, `detail`) VALUES
(1, 1, 'NOVOAIR', '<p>Anando Tower, 1st Floor, Jail Road<br>Phone: 09666 722224, ext: 5151;<br>01755656672; 0821-728960<br>Airport Check-In Counter, Osmani International Airport, Sylhet<br>01755656605<br><a href="http://www.flynovoair.com">www.flynovoair.com</a> </p><p>Dhaka-Sylhet<br>FlightNo &nbsp;Departure &nbsp;Arrival &nbsp;Days<br>VQ-951 &nbsp;&nbsp;&nbsp; 1:15 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1:55 &nbsp;&nbsp;&nbsp;&nbsp; Daily</p><p>&nbsp; &nbsp;<br>Sylhet-Dhaka<br>FlightNo &nbsp;Departure &nbsp;Arrival &nbsp;Days<br>VQ-952 &nbsp;&nbsp;&nbsp;2:25&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3:05 &nbsp;&nbsp;&nbsp;&nbsp; Daily<br>\r\n\r\n<!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"\r\n  DefSemiHidden="true" DefQFormat="false" DefPriority="99"\r\n  LatentStyleCount="267">\r\n  <w:LsdException Locked="false" Priority="0" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Normal"/>\r\n  <w:LsdException Locked="false" Priority="9" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="heading 1"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 1"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 2"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 3"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 4"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 5"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 6"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 7"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 8"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 9"/>\r\n  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"/>\r\n  <w:LsdException Locked="false" Priority="10" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Title"/>\r\n  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"/>\r\n  <w:LsdException Locked="false" Priority="11" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"/>\r\n  <w:LsdException Locked="false" Priority="22" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Strong"/>\r\n  <w:LsdException Locked="false" Priority="20" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"/>\r\n  <w:LsdException Locked="false" Priority="59" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Table Grid"/>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"/>\r\n  <w:LsdException Locked="false" Priority="1" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"/>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"/>\r\n  <w:LsdException Locked="false" Priority="34" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"/>\r\n  <w:LsdException Locked="false" Priority="29" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Quote"/>\r\n  <w:LsdException Locked="false" Priority="30" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="19" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"/>\r\n  <w:LsdException Locked="false" Priority="21" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"/>\r\n  <w:LsdException Locked="false" Priority="31" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"/>\r\n  <w:LsdException Locked="false" Priority="32" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"/>\r\n  <w:LsdException Locked="false" Priority="33" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Book Title"/>\r\n  <w:LsdException Locked="false" Priority="37" Name="Bibliography"/>\r\n  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"/>\r\n </w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:"Table Normal";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-qformat:yes;\r\n	mso-style-parent:"";\r\n	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;\r\n	mso-para-margin-top:0cm;\r\n	mso-para-margin-right:0cm;\r\n	mso-para-margin-bottom:10.0pt;\r\n	mso-para-margin-left:0cm;\r\n	line-height:115%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:"Calibri","sans-serif";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:"Times New Roman";\r\n	mso-fareast-theme-font:minor-fareast;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;}\r\ntable.MsoTableGrid\r\n	{mso-style-name:"Table Grid";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-priority:59;\r\n	mso-style-unhide:no;\r\n	border:solid black 1.0pt;\r\n	mso-border-themecolor:text1;\r\n	mso-border-alt:solid black .5pt;\r\n	mso-border-themecolor:text1;\r\n	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;\r\n	mso-border-insideh:.5pt solid black;\r\n	mso-border-insideh-themecolor:text1;\r\n	mso-border-insidev:.5pt solid black;\r\n	mso-border-insidev-themecolor:text1;\r\n	mso-para-margin:0cm;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:"Calibri","sans-serif";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-fareast-language:EN-US;}\r\n</style>\r\n<![endif]--><br></p><span class="\\" \\\\"contact_info\\\\"\\""=""></span>'),
(2, 1, 'United Airways (BD) Ltd.', 'Sylhet Airport Office:<br>General M.A.G. Osmani International Airport,<br>Sylhet, Bangladesh.<br>Phone: +880 821 727875-76<br>Mobile: +880 1713486653<br><br>Sylhet City Office:<br>Ali Bhaban, Torongo-10,<br>Lechubagan, Mozumderi<br>Sylhet, Bangladesh. ,<br>Phone: +880 821 727871-74<br>Mobile: +880 1713486654<br>http://www.uabdl.com/index.html<br>'),
(3, 1, 'Biman Bangladesh Airlines Ltd.', 'Airport Road<br>Majumdari,Sylhet, <br>Bangladesh.<br>Telephone:&nbsp;&nbsp;&nbsp; &nbsp;+88-0821-717026-28, 717411, 717421<br>Fax:&nbsp;&nbsp;&nbsp; &nbsp;+88-0821-720491<br>Email:&nbsp;&nbsp;&nbsp; &nbsp;zyluu@bdbiman.com <br>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; zylab@bdbiman.com<br>Website: http://biman-airlines.com<br>'),
(4, 6, 'Shahjalal University of Science & Technology', '<br>'),
(5, 6, 'Sylhet International University', '<br>'),
(6, 6, 'Metropolitan University', '<br>'),
(7, 6, 'Leading University', '<br>'),
(8, 9, 'girl''s school & college', ' sdfsd fsdfsdff<br> dsfsdaf sdfsadfsdafsdafs'),
(9, 9, 'try college', 'sdlfjsa dlkfsdlf jlksdajf sdf sdf asdlfkjsadfd'),
(10, 11, 'ccd hotel', 'sldfjsdalfkj dsf dfd');

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE IF NOT EXISTS `other` (
  `other_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(300) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`other_id`),
  UNIQUE KEY `subject` (`subject`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `other`
--

INSERT INTO `other` (`other_id`, `subject`, `description`) VALUES
(1, 'weather', 'Overcast, thunderstorms with rain<br>Feels Like: +22&deg;<br>Barometer:  1006.8 hPa<br>Dewpoint:   +21&deg;<br>Humidity:   95.2%<br>Visibility: 2 km<br>Sun rise: 05:10						Sun set:  18:27<br>');
