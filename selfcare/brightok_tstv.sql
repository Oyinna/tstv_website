-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 21, 2017 at 03:00 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `brightok_tstv`
--
CREATE DATABASE IF NOT EXISTS `brightok_tstv` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `brightok_tstv`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('ADMINISTRATOR', 'bright');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(350) NOT NULL,
  `thedate` datetime NOT NULL,
  `modifiedon` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `lastlogin` datetime NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `email` (`username`),
  KEY `surname` (`name`,`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `name`, `username`, `password`, `thedate`, `modifiedon`, `status`, `lastlogin`) VALUES
(2, 'Okona', 'administrator', 'ac6ad6be092475b1b77b13f9a4e3eed89d4c1388ff54e42234fd2b6812e4c208', '2014-04-29 01:37:14', '2017-04-25 16:35:41', 0, '2017-07-12 13:10:13'),
(4, 'Ceejay Communications', 'ceejay', 'ac6ad6be092475b1b77b13f9a4e3eed89d4c1388ff54e42234fd2b6812e4c208', '2017-04-25 17:03:34', '0000-00-00 00:00:00', 0, '2017-04-25 17:06:56'),
(6, 'GM', 'gm', 'ac6ad6be092475b1b77b13f9a4e3eed89d4c1388ff54e42234fd2b6812e4c208', '2017-06-27 21:32:43', '0000-00-00 00:00:00', 0, '2017-06-27 21:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `admins_categories`
--

CREATE TABLE IF NOT EXISTS `admins_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` varchar(20) NOT NULL,
  `admin_id` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`,`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `admins_categories`
--

INSERT INTO `admins_categories` (`id`, `category_id`, `admin_id`) VALUES
(2, '1', '2'),
(7, '1', '4'),
(4, '12', '2'),
(3, '2', '2'),
(8, '2', '4'),
(6, '7', '4'),
(1, '9', '2'),
(5, '9', '4');

-- --------------------------------------------------------

--
-- Table structure for table `admins_groups`
--

CREATE TABLE IF NOT EXISTS `admins_groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `rights` text NOT NULL,
  `description` text NOT NULL,
  `modifiedon` datetime NOT NULL,
  `modifiedby` varchar(20) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admins_groups`
--

INSERT INTO `admins_groups` (`group_id`, `name`, `rights`, `description`, `modifiedon`, `modifiedby`) VALUES
(1, 'Administrator Users', '| policies_add| policies_view| policies_edit_holder| policies_edit_vehicle| policies_renew| policies_certificates| policies_niid| offenders_add| offenders_view_current| offenders_view_cleared| offenders_clear| claims_add| claims_view| claims_update| reports_policies| reports_offenders| reports_claims| reports_revenues| users_add| users_view| users_edit| users_groups| settings', 'The people doing things right', '2015-08-22 08:50:22', '17'),
(2, 'Professionals', '', 'thsi a asfda', '2015-08-10 13:56:27', '2'),
(3, 'IMO STATE TELLERS', '| policies_add| policies_view| policies_renew| policies_certificates| offenders_add| offenders_view_current| offenders_view_cleared', 'E-INURE 3RD PARTY MOTOR INSURANCE SCHEME, IMO STATE', '2015-08-21 09:25:12', '17'),
(4, 'IMO STATE Consortium ', '| policies_add| policies_view| policies_renew| policies_certificates| offenders_add| offenders_view_current| offenders_view_cleared| claims_add| claims_view| reports_policies| reports_offenders| reports_claims| reports_revenues', 'Supervisors', '2015-09-06 14:12:45', '17'),
(5, 'Sole Administrator', '| policies_add| policies_view| policies_edit_holder| policies_edit_vehicle| policies_renew| policies_certificates| policies_niid| offenders_add| offenders_view_current| offenders_view_cleared| offenders_clear| claims_add| claims_view| claims_update| reports_policies| reports_offenders| reports_claims| reports_revenues| users_add| users_view| users_edit| users_groups| settings', 'MD/CEO', '2015-09-01 14:45:49', '17');

-- --------------------------------------------------------

--
-- Table structure for table `adverts`
--

CREATE TABLE IF NOT EXISTS `adverts` (
  `advert_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `code` text NOT NULL,
  `link` text NOT NULL,
  `viewcount` int(11) NOT NULL,
  `thedate` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '5',
  PRIMARY KEY (`advert_id`),
  KEY `type` (`type`),
  KEY `position` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `adverts`
--

INSERT INTO `adverts` (`advert_id`, `type`, `name`, `code`, `link`, `viewcount`, `thedate`, `status`) VALUES
(20, 0, 'advert 1', '', '', 186, '0000-00-00 00:00:00', 5),
(21, 1, 'advert 2', '', '', 203, '0000-00-00 00:00:00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` varchar(20) NOT NULL,
  `headline` text NOT NULL,
  `caption` text NOT NULL,
  `shorturl` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `thedate` datetime NOT NULL,
  `createdby` varchar(20) NOT NULL,
  UNIQUE KEY `code` (`article_id`),
  KEY `shorturl` (`shorturl`),
  KEY `createdby` (`createdby`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1375060784 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `category_id`, `headline`, `caption`, `shorturl`, `content`, `thedate`, `createdby`) VALUES
(1375060773, '14', 'A Must Watch', '', 'a-must-watch-1375060773', '<br>', '2017-06-14 13:07:13', '2'),
(1375060774, '13', 'EPL Action', 'Follow your favourite stars into a maze of encounters, discoveries and aftermaths. \r\n', 'deadpool-2-teaser-trailer-2017--2018-movie-trailer-1375060774', '<br>', '2017-06-14 13:16:38', '2'),
(1375060775, '1', 'New Season', 'Enjoy storytelling at its best with new seasons full of suspense and thrill', 'black-panther-trailer-2017--official-2018-movie-teaser-1375060775', '<br>', '2017-06-14 13:18:19', '2'),
(1375060776, '1', 'New Season', 'Enjoy storytelling at its best with new seasons full of suspense and thrill', 'thor-ragnarok-trailer-2017-movie-3--official-1375060776', '<br>', '2017-06-14 13:51:19', '2'),
(1375060777, '1', 'New Season', 'Enjoy storytelling at its best with new seasons full of suspense and thrill', 'blind-trailer-2017-movie--official-1375060777', '<br>', '2017-06-14 13:55:52', '2'),
(1375060778, '1', 'New Season', 'Enjoy storytelling at its best with new seasons full of suspense and thrill', 'jungle-trailer-2017-daniel-radcliffe-movie--official-1375060778', '<br>', '2017-06-14 14:06:27', '2'),
(1375060779, '8', 'Lagos State', '', 'olaf''s-frozen-adventure-trailer-2017-movie--official-1375060779', '<br>', '2017-06-14 14:14:00', '2'),
(1375060780, '8', 'Imo State', '', 'imo-state-1375060780', '<br>', '2017-06-14 14:49:18', '2'),
(1375060781, '9', '93 Days Movie', '', '93-days-movie-1375060781', '<br>', '2017-06-14 14:54:54', '2'),
(1375060782, '9', '76 The Movie', '', '76-the-movie-1375060782', '<br>', '2017-06-14 15:07:01', '2'),
(1375060783, '9', 'October 1 - The Movie', '', 'october-1--the-movie-1375060783', '<br>', '2017-06-14 15:13:36', '2');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `placement` varchar(20) NOT NULL,
  `link` text NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`banner_id`, `name`, `placement`, `link`) VALUES
(15, '', 'first', ''),
(16, '', 'second', ''),
(17, '', 'second', ''),
(18, '', 'second', ''),
(19, '', 'second', ''),
(20, '', 'selfcare', ''),
(21, '', 'selfcare', '');

-- --------------------------------------------------------

--
-- Table structure for table `breakingnews`
--

CREATE TABLE IF NOT EXISTS `breakingnews` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `breakingnews`
--

INSERT INTO `breakingnews` (`item_id`, `name`, `link`) VALUES
(4, 'TSTV dealers conference holds on the 10th of July across TSTV offices Nationwide', ''),
(5, 'TSTV to launch across Nigeria on the 25th of July, 2017', ''),
(6, 'TSTV dealers and installers registration portal opens 29th July, 2017', ''),
(7, 'TELCOM Satellites Limited signs MOU with ABS 3', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `shorturl` varchar(200) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`category_id`),
  KEY `parent_id` (`parent_id`,`position`),
  KEY `shorturl` (`shorturl`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `parent_id`, `name`, `shorturl`, `position`) VALUES
(1, '', 'Series', 'series', 0),
(2, '1', 'Movies', 'movies', 0),
(6, '', 'Education', 'education-6', 2),
(7, '', 'Media', 'media-7', 4),
(8, '', 'NATIONAL – 36 States Local TV Stations', 'national–36stateslocaltvstations', 0),
(9, '', 'NOLLYWOOD', 'nollywood', 0),
(11, '', 'Theatre', 'theatre', 0),
(12, '', 'Videos', 'videos-12', 6),
(13, '', 'Sports', 'sports', 0),
(14, '', 'Movies', 'movies', 0),
(15, '', 'Trailers', 'trailers', 0);

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE IF NOT EXISTS `channels` (
  `channel_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `caption` text COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '5',
  PRIMARY KEY (`channel_id`),
  KEY `code` (`code`,`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=80 ;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`channel_id`, `code`, `name`, `category`, `caption`, `details`, `status`) VALUES
(4, 'NTA', 'NTA LAGOS', 'Kiddies', '', '', 5),
(5, 'Channel', 'ccc', 'Sports', '', '', 5),
(6, 'Channel', 'ccc', 'Kiddies', '', '', 5),
(8, 'Channel', 'ccc', 'News', '', '', 5),
(11, 'Channel', 'ccc', 'News', '', '', 5),
(12, 'Channel', 'ccc', 'Music', '', '', 5),
(13, 'Channel', 'ccc', 'Science', '', '', 5),
(14, 'Africa Movie Channel', 'Channel', 'Entertainment', '', '', 5),
(15, 'Fox Sports 2', 'Sports', 'Sports', '', '', 5),
(16, 'Jim Jam', 'Kids', 'Kiddies', '', '', 5),
(17, 'Baby TV', 'Kiddies', 'Kiddies', '', '', 5),
(18, 'Fashion One', 'Entertainment', 'Fashion', '', '', 5),
(19, 'MBC 2', 'Movie', 'Entertainment', '', '', 5),
(20, 'Aljazeera', 'News', 'News', '', '', 5),
(21, 'TVC News', 'News', 'News', '', '', 5),
(22, 'Fox Sports', 'Sports', 'Sports', '', '', 5),
(23, 'United States Embass', 'Documentary', 'News', '', '', 5),
(24, 'Dove TV', 'Religion', 'Religion', '', '', 5),
(25, 'Liberty TV', 'Entertainment', 'Entertainment', '', '', 5),
(26, 'Sky News HD', 'News', 'News', '', '', 5),
(27, 'MBC Action HD', 'Movies', 'Entertainment', '', '', 5),
(28, 'MBC Bollywood HD', 'Entertainment', 'Entertainment', '', '', 5),
(29, 'Arewa 24', 'News', 'News', '', '', 5),
(30, 'Wazobia TV', 'Entertainment', 'Entertainment', '', '', 5),
(31, 'Wap TV', 'Entertainment', 'Entertainment', '', '', 5),
(32, 'AIT', 'News', 'News', '', '', 5),
(33, 'Nat Geo Gold', 'Documentary', 'Science', '', '', 5),
(34, 'Core TV News', 'News', 'News', '', '', 5),
(35, 'France 24 English', 'News', 'News', '', '', 5),
(36, 'CCTV News', 'News', 'News', '', '', 5),
(37, 'Nickelodeon', 'Kiddies', 'Kiddies', '', '', 5),
(38, 'Channels TV', 'News', 'News', '', '', 5),
(39, 'MTV Base', 'Music', 'Music', '', '', 5),
(40, 'Amazing Discoveries', 'Documentary', 'Science', '', '', 5),
(41, 'Bein Sports', 'Sports', 'Sports', '', '', 5),
(42, 'Viasat Life', 'Entertainment', 'Entertainment', '', '', 5),
(43, 'Bloomberg Television', 'Business', 'News', '', '', 5),
(44, 'DW', 'News', 'News', '', '', 5),
(45, 'Emmanuel TV', 'Religion', 'Religion', '', '', 5),
(46, 'Fashion One', 'Fashion', 'Fashion', '', '', 5),
(47, 'Fine Living Network', 'Entertainment', 'Entertainment', '', '', 5),
(48, 'Fox Movies', 'Movies', 'Entertainment', '', '', 5),
(49, 'Africa Health Televi', 'Health', 'Fashion', '', '', 5),
(50, 'Kombat Sports', 'Sports', 'Sports', '', '', 5),
(51, 'Fox News', 'News', 'News', '', '', 5),
(52, 'Fox Life', 'Entertainment', 'Entertainment', '', '', 5),
(53, 'Investigation Discov', 'Entertainment', 'Entertainment', '', '', 5),
(54, 'MBC 4', 'Movies', 'Entertainment', '', '', 5),
(55, 'MBC Max', 'Movies', 'Entertainment', '', '', 5),
(56, 'Movie Box HD', 'Movies', 'Entertainment', '', '', 5),
(57, 'MTV Base', 'Music', 'Music', '', '', 5),
(58, 'Bein Sports 1 HD', 'Sports', 'Sports', '', '', 5),
(59, 'Bein Sports 4 HD', 'Sports', 'Sports', '', '', 5),
(60, 'Bein Sports Max', 'Sports', 'Sports', '', '', 5),
(61, 'Bein Sports Global', 'Sports', 'Sports', '', '', 5),
(62, 'Bein Sports 3 HD', 'Sports', 'Sports', '', '', 5),
(63, 'Kwese Sports 1', 'Sports', 'Sports', '', '', 5),
(64, 'Kwese Free Sports', 'Sports', 'Sports', '', '', 5),
(65, 'kwese ESPN', 'Sports', 'Sports', '', '', 5),
(66, 'TS Kids HD', 'Kiddies', 'Kiddies', '', '', 5),
(67, 'TRT World', 'News', 'News', '', '', 5),
(68, 'Sunna TV', 'Religion', 'Religion', '', '', 5),
(69, 'AMC Series', 'Movies', 'Entertainment', '', '', 5),
(70, 'National Geographic', 'Science', 'Science', '', '', 5),
(71, 'Fix and Foxi', 'Kiddies', 'Kiddies', '', '', 5),
(72, 'PC TV', 'Entertainment', 'Entertainment', '', '', 5),
(73, 'Riwendu TV', 'Africa', 'Africa', '', '', 5),
(74, 'Trace Africa', 'Music', 'Music', '', '', 5),
(75, 'Star Gold', 'Entertainment', 'Entertainment', '', '', 5),
(76, 'Press TV', 'News', 'News', '', '', 5),
(77, 'Eurosports News', 'Sports', 'Sports', '', '', 5),
(78, 'Euro Sports 2 HD', 'Sports', 'Sports', '', '', 5),
(79, 'NTA International', 'News', 'News', '', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `channels_status`
--

CREATE TABLE IF NOT EXISTS `channels_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `channel_id` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `reason` text NOT NULL,
  `thedate` datetime NOT NULL,
  `modifiedby_type` int(11) NOT NULL,
  `modifiedby_id` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `officer_id` (`channel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `channels_status`
--

INSERT INTO `channels_status` (`id`, `channel_id`, `status`, `reason`, `thedate`, `modifiedby_type`, `modifiedby_id`) VALUES
(22, '3', 0, 'sdf sdf sd', '2017-07-14 05:54:48', 0, '2');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `item_key` varchar(50) NOT NULL,
  `item_value` text NOT NULL,
  UNIQUE KEY `key_id` (`item_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`item_key`, `item_value`) VALUES
('aboutpage_box1_caption', 'A commitment to sustainability and to acting in an environmentally friendly way.\r\n\r\nA commitment to innovation and excellence. That is why our slogan is "Think Different"  \r\n\r\nand a commitment to doing good for the whole. '),
('aboutpage_box1_title', 'Our Values'),
('aboutpage_box2_caption', 'Our mission is to create trends that will become models for other communication firms across the world. '),
('aboutpage_box2_title', 'Mission'),
('aboutpage_box3_caption', 'To launch a Direct to Home satellite service that offers equal connectivity to all'),
('aboutpage_box3_title', 'Objectives'),
('aboutpage_content', '<p style="margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: " open="" sans",="" arial,="" sans-serif;="" font-size:="" 14px;"="">\r\n\r\n	\r\n		\r\n		\r\n	\r\n	\r\n		</p><div class="page" title="Page 7"><font face="verdana"><span style="font-size: 12pt;">For most Nigerians, multi-channel TV is a big dream. Apart from Nigerians living in\r\nLagos, Abuja, and may be Port Harcourt, most Nigerians have access to less than five\r\nfree terrestrial TV channels. This means that most Nigerians rely on terrestrial,\r\nsatellite, or cable Direct-to-Home DTH TV for multi-channel TV.<br></span></font><font size="2"><br><font face="verdana"><span style="font-size: 12pt;"></span></font></font><div class="page" title="Page 7"><font face="verdana" size="2"><span style="font-size: 12pt;">TSTV which will commercially launch all over Nigeria July 25th, 2017 offers Nigerians\r\ncomplementary 4.5G internet capacity, smart home, ability to pause subscriptions for a\r\nrecord seven days every month, Video calls and in-built 20GB hard drive inside our STBs for content\r\nstorage, Video on Demand services as well as the regular uninterrupted clean world\r\nclass contents available 24 hours every day. Our channels cut across various genres: News, Music, General entertainment, Documentary, Movies, Kids, Religious, Events, Sports, Health, Fashion, and Lifestyle\r\nchannels.\r\n</span></font><font face="verdana">\r\n				</font><font face="verdana">\r\n			</font><font face="verdana">\r\n		</font></div><font face="verdana">\r\n	\r\n<span style="font-size: 12pt;"></span></font>\r\n\r\n	\r\n		\r\n		\r\n	\r\n	\r\n		<div class="page" title="Page 7">\r\n			<div class="layoutArea">\r\n				<div class="column">\r\n					<p><font face="verdana" size="2"><span style="font-size: 12pt;">We don‘t consider our offering as a direct competitor to the incumbent </span><span style="font-size: 12pt;">operators, as\r\nwe are targeting a specific sector of the market </span><span style="font-size: 12pt;">– </span><span style="font-size: 12pt;">those people who are not currently\r\nsubscribed to any pay-tv service or those who require added services not offered by\r\ncurrent pay TVs.&nbsp;</span></font></p><p><font face="verdana" size="2">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<b><span style="font-size: 11pt; line-height: 115%; color: black;">Our vision is to provide premium video\r\nexperience to Nigerians at affordable prices. &nbsp;Our services will enable\r\nthe viewers to experience HD and SD video and internet surfing at the same\r\ntime. We are the first indigenous local operator in the region to launch such a\r\npremium platform with a variety of services to Nigerians, who have been so far\r\npaying exorbitant prices to foreign operators.”&nbsp;&nbsp;&nbsp;&nbsp;</span></b></font><style>\r\n<!--\r\n /* Font Definitions */\r\n@font-face\r\n	{font-family:Arial;\r\n	panose-1:2 11 6 4 2 2 2 2 2 4;\r\n	mso-font-charset:0;\r\n	mso-generic-font-family:auto;\r\n	mso-font-pitch:variable;\r\n	mso-font-signature:-536859905 -1073711037 9 0 511 0;}\r\n@font-face\r\n	{font-family:????;\r\n	panose-1:0 0 0 0 0 0 0 0 0 0;\r\n	mso-font-charset:136;\r\n	mso-generic-font-family:auto;\r\n	mso-font-format:other;\r\n	mso-font-pitch:variable;\r\n	mso-font-signature:1 134742016 16 0 1048576 0;}\r\n@font-face\r\n	{font-family:????;\r\n	panose-1:0 0 0 0 0 0 0 0 0 0;\r\n	mso-font-charset:136;\r\n	mso-generic-font-family:auto;\r\n	mso-font-format:other;\r\n	mso-font-pitch:variable;\r\n	mso-font-signature:1 134742016 16 0 1048576 0;}\r\n@font-face\r\n	{font-family:Calibri;\r\n	panose-1:2 15 5 2 2 2 4 3 2 4;\r\n	mso-font-charset:0;\r\n	mso-generic-font-family:auto;\r\n	mso-font-pitch:variable;\r\n	mso-font-signature:-520092929 1073786111 9 0 415 0;}\r\n /* Style Definitions */\r\np.MsoNormal, li.MsoNormal, div.MsoNormal\r\n	{mso-style-unhide:no;\r\n	mso-style-qformat:yes;\r\n	mso-style-parent:"";\r\n	margin-top:0cm;\r\n	margin-right:0cm;\r\n	margin-bottom:10.0pt;\r\n	margin-left:0cm;\r\n	line-height:115%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:Calibri;\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:????;\r\n	mso-fareast-theme-font:minor-fareast;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:"Times New Roman";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-fareast-language:ZH-TW;}\r\n.MsoChpDefault\r\n	{mso-style-type:export-only;\r\n	mso-default-props:yes;\r\n	font-size:11.0pt;\r\n	mso-ansi-font-size:11.0pt;\r\n	mso-bidi-font-size:11.0pt;\r\n	font-family:Calibri;\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:????;\r\n	mso-fareast-theme-font:minor-fareast;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:"Times New Roman";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-fareast-language:ZH-TW;}\r\n.MsoPapDefault\r\n	{mso-style-type:export-only;\r\n	margin-bottom:10.0pt;\r\n	line-height:115%;}\r\n@page WordSection1\r\n	{size:612.0pt 792.0pt;\r\n	margin:72.0pt 90.0pt 72.0pt 90.0pt;\r\n	mso-header-margin:36.0pt;\r\n	mso-footer-margin:36.0pt;\r\n	mso-paper-source:0;}\r\ndiv.WordSection1\r\n	{page:WordSection1;}\r\n-->\r\n</style>\r\n\r\n\r\n\r\n</p></div></div></div></div>'),
('aboutpage_missionvision_title', 'Mission, vision and objective of Demazon'),
('aboutpage_title', 'About TSTV'),
('bottomtext', 'sdf sdfs fgafg sfgs dgsdf sdfsdfs df'),
('channelspage_content', '<br>'),
('channelspage_title', 'Lots of channels to choose fromx'),
('chosentv', 'http://tradeonweb.biz/demo/admin_merchants-reset.php?code=6'),
('embedcode_chosenradio', 'http://tradeonweb.biz/demo/admin_merchants-reset.php?code=6'),
('embedcode_workersmeeting_radio', 'http://tradeonweb.biz/demo/admin_merchants-reset.php?code=6'),
('embedcode_workersmeeting_tv', 'http://tradeonweb.biz/demo/admin_merchants-reset.php?code=6'),
('home_box1_caption', 'the values of the church comes here from the database the values of the church comes here from the database the values of the church comes here from the database the values of the church comes here from the database '),
('home_box1_title', 'Our Values'),
('home_box2_caption', 'The mission and vision from database The mission and vision from database The mission and vision from database The mission and vision from database The mission and vision from database '),
('home_box2_title', 'Mission'),
('home_box3_caption', 'Yes, this is the objectives of the church dynamic again Yes, this is the objectives of the church dynamic again Yes, this is the objectives of the church dynamic again Yes, this is the objectives of the church dynamic again '),
('home_box3_title', 'Objectives'),
('home_welcome_title', 'Bless be the name of God'),
('pages_contact_content', '<h3>TStv Corporate Headquarters</h3>\r\n										<p>Address: Plot 1191 Gilmor Layout<br>by Jahi-Katampe bridge, <br>Jahi, Abuja, Nigeria</p>\r\n										<p>Email: info@tstvafrica.com</p>'),
('pages_faq_content', '<p style="margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget augue laoreet, pellentesque est non, sodales ipsum. Ut bibendum nec est ac tempor. Vestibulum id elit sit amet est gravida luctus eu ut metus. Duis pellentesque urna nec nibh interdum consectetur ac congue nunc. Ut quis dolor ipsum. In tempor dictum imperdiet. Sed a rhoncus lacus. Nam et ultricies ligula.</p><p style="margin-bottom: 15px; font-size: 14px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;"><b>Proin varius velit libero, sit amet fringilla turpis pharetra a.</b>&nbsp;<br>Duis molestie rhoncus placerat. Aenean euismod luctus nibh vitae gravida. Nunc vel ligula neque. Fusce non ipsum nec nisl eleifend tincidunt imperdiet vitae mi. Morbi ac tortor nisl. Vestibulum posuere elementum felis, eget porta justo aliquam dictum. Nunc eget odio nulla. Fusce mattis&nbsp;</p><p style="margin-bottom: 15px; font-size: 14px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;"><b>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</b>&nbsp;<br>In eget augue laoreet, pellentesque est non, sodales ipsum. Ut bibendum nec est ac tempor. Vestibulum id elit sit amet est gravida luctus eu ut&nbsp;</p><p style="margin-bottom: 15px; font-size: 14px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;"><b>Proin varius velit libero, sit amet fringilla turpis pharetra a.</b>&nbsp;<br>Duis molestie rhoncus placerat. Aenean euismod luctus nibh vitae gravida. Nunc vel ligula neque. Fusce non ipsum nec nisl eleifend tincidunt imperdiet vitae mi. Morbi ac tortor nisl. Vestibulum posuere elementum felis, eget porta justo aliquam dictum. Nunc eget odio nulla. Fusce mattis&nbsp;</p><p style="margin-bottom: 15px; font-size: 14px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;"><b>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</b>&nbsp;<br>In eget augue laoreet, pellentesque est non, sodales ipsum. Ut bibendum nec est ac tempor. Vestibulum id elit sit amet est gravida luctus eu ut&nbsp;</p><p style="margin-bottom: 15px; font-size: 14px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;"><b>Proin varius velit libero, sit amet fringilla turpis pharetra a.</b>&nbsp;<br>Duis molestie rhoncus placerat. Aenean euismod luctus nibh vitae gravida. Nunc vel ligula neque. Fusce non ipsum nec nisl eleifend tincidunt imperdiet vitae mi. Morbi ac tortor nisl. Vestibulum posuere elementum felis, eget porta justo aliquam dictum. Nunc eget odio nulla. Fusce mattis&nbsp;</p><p style="margin-bottom: 15px; font-size: 14px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;"><b>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</b>&nbsp;<br>In eget augue laoreet, pellentesque est non, sodales ipsum. Ut bibendum nec est ac tempor. Vestibulum id elit sit amet est gravida luctus eu ut&nbsp;</p><p style="margin-bottom: 15px; font-size: 14px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;"><b>Proin varius velit libero, sit amet fringilla turpis pharetra a.</b>&nbsp;<br>Duis molestie rhoncus placerat. Aenean euismod luctus nibh vitae gravida. Nunc vel ligula neque. Fusce non ipsum nec nisl eleifend tincidunt imperdiet vitae mi. Morbi ac tortor nisl. Vestibulum posuere elementum felis, eget porta justo aliquam dictum. Nunc eget odio nulla. Fusce mattis&nbsp;</p><p style="margin-bottom: 15px; font-size: 14px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;"><b>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</b>&nbsp;<br>In eget augue laoreet, pellentesque est non, sodales ipsum. Ut bibendum nec est ac tempor. Vestibulum id elit sit amet est gravida luctus eu ut&nbsp;</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;">Proin varius velit libero, sit amet fringilla turpis pharetra a. Duis molestie rhoncus placerat. Aenean euismod luctus nibh vitae gravida. Nunc vel ligula neque. Fusce non ipsum nec nisl eleifend tincidunt imperdiet vitae mi. Morbi ac tortor nisl. Vestibulum posuere elementum felis, eget porta justo aliquam dictum. Nunc eget odio nulla. Fusce mattis efficitur nisl, nec egestas arcu consequat quis. Aliquam ut egestas erat, a imperdiet tellus. Nunc sollicitudin elit quis malesuada luctus. Proin vel nibh ac turpis mollis condimentum eget sed nunc. Aliquam ultricies fermentum nunc at lacinia. Vivamus arcu nisi, sagittis ut varius tempor, placerat sed odio. Nam mollis consequat porttitor.<br></p>'),
('pages_faq_title', 'Troubleshooting guide'),
('pages_partners_content', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<style>\r\n<!--\r\n /* Font Definitions */\r\n@font-face\r\n	{font-family:Arial;\r\n	panose-1:2 11 6 4 2 2 2 2 2 4;\r\n	mso-font-charset:0;\r\n	mso-generic-font-family:auto;\r\n	mso-font-pitch:variable;\r\n	mso-font-signature:-536859905 -1073711037 9 0 511 0;}\r\n@font-face\r\n	{font-family:????;\r\n	panose-1:0 0 0 0 0 0 0 0 0 0;\r\n	mso-font-charset:136;\r\n	mso-generic-font-family:auto;\r\n	mso-font-format:other;\r\n	mso-font-pitch:variable;\r\n	mso-font-signature:1 134742016 16 0 1048576 0;}\r\n@font-face\r\n	{font-family:"Cambria Math";\r\n	panose-1:2 4 5 3 5 4 6 3 2 4;\r\n	mso-font-charset:0;\r\n	mso-generic-font-family:auto;\r\n	mso-font-pitch:variable;\r\n	mso-font-signature:3 0 0 0 1 0;}\r\n@font-face\r\n	{font-family:Calibri;\r\n	panose-1:2 15 5 2 2 2 4 3 2 4;\r\n	mso-font-charset:0;\r\n	mso-generic-font-family:auto;\r\n	mso-font-pitch:variable;\r\n	mso-font-signature:-520092929 1073786111 9 0 415 0;}\r\n /* Style Definitions */\r\np.MsoNormal, li.MsoNormal, div.MsoNormal\r\n	{mso-style-unhide:no;\r\n	mso-style-qformat:yes;\r\n	mso-style-parent:"";\r\n	margin-top:0cm;\r\n	margin-right:0cm;\r\n	margin-bottom:10.0pt;\r\n	margin-left:0cm;\r\n	line-height:115%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:Calibri;\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:????;\r\n	mso-fareast-theme-font:minor-fareast;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:"Times New Roman";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-fareast-language:ZH-TW;}\r\na:link, span.MsoHyperlink\r\n	{mso-style-priority:99;\r\n	color:blue;\r\n	text-decoration:underline;\r\n	text-underline:single;}\r\na:visited, span.MsoHyperlinkFollowed\r\n	{mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	color:purple;\r\n	mso-themecolor:followedhyperlink;\r\n	text-decoration:underline;\r\n	text-underline:single;}\r\np\r\n	{mso-style-priority:99;\r\n	mso-margin-top-alt:auto;\r\n	margin-right:0cm;\r\n	mso-margin-bottom-alt:auto;\r\n	margin-left:0cm;\r\n	mso-pagination:widow-orphan;\r\n	font-size:12.0pt;\r\n	font-family:"Times New Roman";\r\n	mso-fareast-font-family:????;\r\n	mso-fareast-theme-font:minor-fareast;\r\n	mso-fareast-language:ZH-TW;}\r\nspan.apple-style-span\r\n	{mso-style-name:apple-style-span;\r\n	mso-style-unhide:no;}\r\n.MsoChpDefault\r\n	{mso-style-type:export-only;\r\n	mso-default-props:yes;\r\n	font-size:11.0pt;\r\n	mso-ansi-font-size:11.0pt;\r\n	mso-bidi-font-size:11.0pt;\r\n	font-family:Calibri;\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:????;\r\n	mso-fareast-theme-font:minor-fareast;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:"Times New Roman";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-fareast-language:ZH-TW;}\r\n.MsoPapDefault\r\n	{mso-style-type:export-only;\r\n	margin-bottom:10.0pt;\r\n	line-height:115%;}\r\n@page WordSection1\r\n	{size:612.0pt 792.0pt;\r\n	margin:40.3pt 64.8pt 27.0pt 72.0pt;\r\n	mso-header-margin:36.0pt;\r\n	mso-footer-margin:36.0pt;\r\n	mso-paper-source:0;}\r\ndiv.WordSection1\r\n	{page:WordSection1;}\r\n--></style><b style="mso-bidi-font-weight:normal"><span style="font-family:Arial">&nbsp;</span></b>\r\n\r\n<p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n12.0pt" align="center"><b style="mso-bidi-font-weight:normal"><span style="font-family:Arial">JOINT PRESS\r\nRELEASE BETWEEN TSTV AND ABS<br></span></b></p>\r\n\r\n\r\n\r\n<p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\ntext-align:center;line-height:normal;background:white" align="center"><b><span style="font-size:14.0pt;font-family:Arial;mso-fareast-font-family:" times="" new="" roman";="" color:black;mso-ansi-language:en-gb"="" lang="EN-GB">Telcom Satellites TV to </span></b><b><span style="font-size:14.0pt;font-family:Arial;mso-fareast-font-family:\r\n" times="" new="" roman";color:black;mso-themecolor:text1;mso-ansi-language:en-gb"="" lang="EN-GB">Launch\r\na New </span></b><b><span style="font-size:14.0pt;font-family:Arial;\r\nmso-fareast-font-family:" times="" new="" roman";color:black;mso-ansi-language:en-gb"="" lang="EN-GB">DTH\r\nPlatform with&nbsp;</span></b></p>\r\n\r\n<p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;\r\ntext-align:center;line-height:normal;background:white" align="center"><b><span style="font-size:14.0pt;font-family:Arial;mso-fareast-font-family:" times="" new="" roman";="" color:black;mso-ansi-language:en-gb"="" lang="EN-GB">ABS-3A at 3°W in Nigeria</span></b><span style="font-size:14.0pt;font-family:Arial;mso-fareast-font-family:" times="" new="" roman";="" color:black"=""></span></p>\r\n\r\n<p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n13.5pt;background:white;vertical-align:baseline"><span style="font-family:Arial;\r\nmso-fareast-font-family:" times="" new="" roman";color:black"="">&nbsp;</span></p><span style="font-family:Arial;mso-fareast-font-family:\r\n" times="" new="" roman";color:black;mso-themecolor:text1"="">Bermuda and Hong Kong, 14\r\nJune 2017 - ABS and Telcom Satellites TV (TSTV) signed a multi-transponder\r\nagreement to deliver a Direct-to-Home (DTH) broadcast service into Nigeria on\r\nABS-3A.</span>\r\n\r\n<p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;text-align:\r\njustify;text-justify:inter-ideograph;line-height:normal;background:white;\r\nvertical-align:baseline"><span style="font-family:Arial;mso-fareast-font-family:\r\n" times="" new="" roman";color:black;mso-themecolor:text1"=""></span><span style="font-family:Arial;mso-fareast-font-family:" times="" new="" roman";color:black;="" mso-themecolor:text1"="">The new platform is scheduled to be launched on 25th July\r\n2017 and will be distributed on ABS-3A satellite, Africa beam which is located\r\nat the prime video neighborhood of 3°W.&nbsp; The service will air over 100 TV\r\nchannels, and the number is expected to grow to 150 soon after. Audiences will\r\nbe able to enjoy unbeatable innovations, local and foreign content and the best\r\nof entertainment programmes.&nbsp;</span>\r\n\r\n</p><p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;text-align:\r\njustify;text-justify:inter-ideograph;line-height:normal;background:white"><span style="font-family:Arial;mso-fareast-font-family:" times="" new="" roman";color:black;="" mso-themecolor:text1"=""></span><span style="font-family:Arial;mso-fareast-font-family:" times="" new="" roman";color:black;="" mso-themecolor:text1"="">“TSTV is providing a ground breaking option from a\r\ndominated marketplace.” said Bright Echefu, the Managing Director/CEO of TSTV.\r\n“We are excited to partner with ABS in delivering an array of high quality\r\nprogramming. Our vision is to provide premium video experience to Nigerians at\r\naffordable prices. &nbsp;Our services will enable the viewers to experience HD\r\nand SD video and internet surfing at the same time. We are the first indigenous\r\nlocal operator in the region to launch such a premium platform with a variety\r\nof services to Nigerians, who have been so far paying exorbitant prices to\r\nforeign operators.”&nbsp;&nbsp;&nbsp;&nbsp;</span>\r\n\r\n</p><p class="MsoNormal" style="text-align:justify;text-justify:inter-ideograph;\r\nline-height:normal;background:white"><span style="font-family:Arial;mso-fareast-font-family:\r\n" times="" new="" roman";color:black;mso-themecolor:text1"="">&nbsp;“The addition of the\r\nNigeria DTH platform from TSTV has undoubtedly strengthened ABS’ presence in\r\nAfrica,” said Tom Choi, CEO of ABS. “TSTV has the right&nbsp;content and\r\npremium product to satisfy the growing demand of Nigeria. &nbsp;We\r\nhope&nbsp;ABS-3A can assist them to take Nollywood to great heights. ABS has\r\nstrategically located&nbsp;its newly launched satellites at prime video\r\nneighborhoods at&nbsp;3°W, 75°E and 159°E. &nbsp; We have successfully\r\ndeveloped DTH platforms across&nbsp;Africa, Bangladesh, Nepal, Indonesia, South\r\nAsia and Russia/CIS. Our goal is to bring quality and affordable entertainment\r\nto a wider population.”&nbsp;&nbsp;</span></p><span style="font-family:Arial;mso-fareast-font-family:\r\n" times="" new="" roman";color:black;mso-themecolor:text1"="">The ABS-3A satellite is a\r\nnew pillar for high profile broadcast contribution&nbsp;in Africa, MENA,\r\nEurope, and the Americas. Its wide Ku-band Africa beam has extended new\r\npossibilities for video distribution across the region. The orbital slot of our\r\nbeam at 3°W gives an advantage to Nigeria due to its&nbsp;high elevation angle\r\nand clear line of sight across the country.</span><strong><span style="font-size:11.0pt;font-family:Arial;color:#222222;\r\nborder:none windowtext 1.0pt;mso-border-alt:none windowtext 0cm;padding:0cm"><br><br>About\r\nABS </span></strong>\r\n\r\n<p style="margin:0cm;margin-bottom:.0001pt;line-height:13.5pt;vertical-align:\r\nbaseline"><span style="font-size:11.0pt;font-family:Arial"></span><span class="apple-style-span"><span style="font-size:11.0pt;font-family:Arial;\r\ncolor:black">ABS is one of the fastest growing global satellite operators in\r\nthe world. ABS offers a complete range of tailored solutions including\r\nbroadcasting, data and telecommunication services to broadcasters, service\r\nproviders, enterprises and government organizations.</span></span>\r\n\r\n</p><p style="margin:0cm;margin-bottom:.0001pt;text-align:justify;text-justify:\r\ninter-ideograph;line-height:13.5pt;vertical-align:baseline"><span class="apple-style-span"><span style="font-size:11.0pt;font-family:Arial;\r\ncolor:black"></span></span><span class="apple-style-span"><span style="font-size:11.0pt;font-family:Arial;\r\ncolor:black">ABS operates a fleet of satellites: ABS-2, ABS-2A, ABS-3, ABS-3A,\r\nABS-4/Mobisat-1, ABS-6, and ABS-7. The satellite fleet covers over 93% of the\r\nworld’s population across the Americas, Africa, Asia Pacific, Europe, the\r\nMiddle East, CIS and Russia.</span></span>\r\n\r\n</p><p style="margin:0cm;margin-bottom:.0001pt;text-align:justify;text-justify:\r\ninter-ideograph;line-height:13.5pt;vertical-align:baseline"><span class="apple-style-span"><span style="font-size:11.0pt;font-family:Arial;\r\ncolor:black"></span></span><span class="apple-style-span"><span style="font-size:11.0pt;font-family:Arial;\r\ncolor:black">Headquartered in Bermuda, ABS has offices in the United States,\r\nUAE, South Africa and Asia.&nbsp; ABS is majority owned by funds managed by the\r\nEuropean Private Equity firm Permira.</span></span>\r\n\r\n</p><p style="margin:0cm;margin-bottom:.0001pt;text-align:justify;text-justify:\r\ninter-ideograph;line-height:13.5pt;vertical-align:baseline"><span class="apple-style-span"><span style="font-size:11.0pt;font-family:Arial;\r\ncolor:black"></span></span><span class="apple-style-span"><span style="font-size:11.0pt;font-family:Arial;\r\ncolor:black">For more information, visit: </span></span><a href="http://www.absatellite.com"><span style="font-size:11.0pt;font-family:\r\nArial">www.absatellite.com</span></a><span class="apple-style-span"><span style="font-size:11.0pt;font-family:Arial;color:black"> </span></span>\r\n\r\n</p>'),
('pages_partners_title', 'Our Partners'),
('pages_tstvbox_content', 'TELCOM Satellites will pioneer the introduction of Smart set top boxes in Nigeria DTH industry. Our HD SMART Set Top Box (Connected Set top box) converts your existing LED TV into a Smart TV besides showing you more than 100 Channels &amp; services in High Definition and Standard Definition. While the DTH tech in it brings television channels in Standard Definition and High Definition, the Connected set top box allows one to browse content from Twitter, Facebook, Daily Motion, video on demand sites, Over the Top, OTT apps, news, weather etc. through applications residing on STB. Our HD Smart Set Top Box will work as a tool for personalization, engagement, and new customer experiences and with internet connectivity, one can convert one‘s TV into a smart TV using it. Subscribers are entitled to a complementary 20GB internet capacity every month and this service is available for extension on demand.<br><br>TSTV STB Back-Office End-to-End Solution is an easy-to-maintain solution for delivering TV, Video-On-Demand, and interactive services to end users who use LAN. It suits for schools, hospitals, hotels, communities, securities firms and so on.<br><br>TSTV STB platform also includes in-built fast Wi-Fi, up to 802.11ac, 1 GBit/s Ethernet and USB 3.0 interface. TSTV STB supports built-in Bluetooth 4.0, RF for hybrid remote controls and support of Smart Home services via Zigbee/Thread standard. Multichannel video recording is possible via fast external USB 3.0 hard disks up to 50 Gigabyte capacity. Our Smart STBs also have the capacity to make video calls with other TSTV subscribers via IP.<br><br>Instead of buying separate smart TVs or dongles which are expensive, users can now buy our integrated set top boxes which allows them to directly connect to internet, stream media, and access subscribed content?<br><br>With our launch on July 25, 2017, TELCOMSAT has scaled new technological heights and demonstrated its ability by providing a high end advanced product that delivers next generation solutions as part of the idea of Internet of Things (IoT).<br><br>The feature of unlimited external recording is also available, by plugging in your own external storage device for recording your favourite programs, for e.g.: if one plugs in his own external hard drive of 1TB, they can record up to 1900 hrs of content of a standard definition channel.<br><br>'),
('pages_tstvbox_title', 'TStv Box'),
('pages_usingtstv_content', 'To be updated<br>'),
('pages_usingtstv_title', 'How to use TStv'),
('pages_wheretobuy_content', 'Check back later for the list of our dealers across Nigeria<br>'),
('pages_wheretobuy_title', 'TStv is available everywhere'),
('social_facebook', 'http://tradeonweb.biz/demo/admin_merchants-reset.php?code=6'),
('social_linkedin', 'http://tradeonweb.biz/demo/admin_merchants-reset.php?code=6'),
('social_twitter', 'http://tradeonweb.biz/demo/admin_merchants-reset.php?code=6');

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
--

CREATE TABLE IF NOT EXISTS `homepage` (
  `about_title` varchar(200) NOT NULL,
  `about_content` text NOT NULL,
  `bottomtext` text NOT NULL,
  `tv_title` varchar(100) NOT NULL,
  `tv_video` varchar(100) NOT NULL,
  `tv_caption` text NOT NULL,
  `tv_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`about_title`, `about_content`, `bottomtext`, `tv_title`, `tv_video`, `tv_caption`, `tv_text`) VALUES
('This is from database. you can change it', 'about content from database comes here about content from database comes here about content from database comes here about content from database comes here about content from database comes here about content from database comes here about content from database comes here about content from database comes here about content from database comes here about content from database comes here about content from database comes here about content from database<br><br>comes here about content from database comes here about content from database comes here about content from database comes here about content from database comes here about content from database comes here about content from database comes here about content from database comes here about content from database comes here about content from database comes here about content from database comes here about content from database comes here about content from database comes here about content from database comes here about conte<br>', 'The Lord''s Chosen has been divinely endowed to awaken the conscience of human race towards the realization of this vital grace of God, which enables us to make heaven at last. John 14:1-3 says, Let not your heart be troubled: ye believe in God, believe also in me. In my Father''s house are many mansions: if it were not so, I would have told you. I go to prepare a place for you. And if I go and prepare a place for you, I will come again, and receive you unto myself; that where I am, there ye may be also. Matthew 6:33 said, But seek ye first the kingdom of God, and his righteousness; and all these things shall be added unto you.', 'Text TV', 'https://www.youtube.com/watch?v=0zFpVA0H75M', 'My caption here', 'The details');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE IF NOT EXISTS `logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` varchar(20) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `device` varchar(50) NOT NULL,
  `thedate` date NOT NULL,
  UNIQUE KEY `code` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `admin_id`, `ip`, `device`, `thedate`) VALUES
(1, '2', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:47.0) Gecko', '2016-08-04'),
(2, '2', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:47.0) Gecko', '2016-08-12'),
(3, '2', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:47.0) Gecko', '2016-08-20'),
(4, '2', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:47.0) Gecko', '2016-08-22'),
(5, '2', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:47.0) Gecko', '2016-09-02'),
(6, '2', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:52.0) Gecko', '2017-03-23'),
(7, '2', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:52.0) Gecko', '2017-04-03'),
(8, '2', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:52.0) Gecko', '2017-04-16'),
(9, '2', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:52.0) Gecko', '2017-04-17'),
(10, '2', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:52.0) Gecko', '2017-04-18'),
(11, '2', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:52.0) Gecko', '2017-04-24'),
(12, '4', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:52.0) Gecko', '2017-04-25'),
(13, '4', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:52.0) Gecko', '2017-04-25'),
(14, '4', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:52.0) Gecko', '2017-04-25'),
(15, '4', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:52.0) Gecko', '2017-04-25'),
(16, '2', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:52.0) Gecko', '2017-04-25'),
(17, '2', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:53.0) Gecko', '2017-05-02'),
(18, '2', '105.112.35.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:53.0) Gecko', '2017-06-14'),
(19, '2', '129.56.10.17', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:5', '2017-06-14'),
(20, '2', '129.56.10.17', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:5', '2017-06-14'),
(21, '2', '129.56.10.17', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:5', '2017-06-14'),
(22, '2', '129.56.10.73', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:5', '2017-06-15'),
(23, '2', '105.112.22.98', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', '2017-06-18'),
(24, '2', '41.245.194.20', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:53.0)', '2017-06-18'),
(25, '2', '41.245.194.20', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:5', '2017-06-19'),
(26, '2', '41.245.194.20', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:5', '2017-06-19'),
(27, '2', '41.86.149.114', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:5', '2017-06-20'),
(28, '2', '80.248.10.177', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:5', '2017-06-21'),
(29, '2', '80.248.10.177', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:5', '2017-06-21'),
(30, '2', '80.248.10.177', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:5', '2017-06-21'),
(31, '2', '41.245.197.208', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:53.0)', '2017-06-21'),
(32, '2', '41.245.197.208', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:53.0)', '2017-06-21'),
(33, '2', '41.245.197.208', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:53.0)', '2017-06-21'),
(34, '2', '129.56.10.75', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:41.0) Geck', '2017-06-22'),
(35, '5', '129.56.10.75', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:41.0) Geck', '2017-06-22'),
(36, '5', '129.56.10.75', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:41.0) Geck', '2017-06-22'),
(37, '2', '129.56.10.75', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:41.0) Geck', '2017-06-22'),
(38, '5', '129.56.10.75', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:41.0) Geck', '2017-06-22'),
(39, '2', '41.206.1.10', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Geck', '2017-06-26'),
(40, '2', '105.112.19.136', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:54.0) Gecko', '2017-06-27'),
(41, '2', '197.253.21.50', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:5', '2017-06-27'),
(42, '2', '197.253.21.50', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:5', '2017-06-27'),
(43, '6', '197.253.21.50', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:5', '2017-06-27'),
(44, '2', '197.253.21.50', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:5', '2017-06-27'),
(45, '2', '197.253.21.50', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:5', '2017-06-27'),
(46, '2', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:54.0) Gecko', '2017-06-28'),
(47, '2', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:54.0) Gecko', '2017-06-28'),
(48, '2', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:54.0) Gecko', '2017-07-04'),
(49, '2', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:54.0) Gecko', '2017-07-04'),
(50, '2', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:54.0) Gecko', '2017-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `mailinglist`
--

CREATE TABLE IF NOT EXISTS `mailinglist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `groupname` varchar(50) NOT NULL,
  `thedate` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '5',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_2` (`email`,`groupname`),
  KEY `email` (`email`,`groupname`,`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mailinglist`
--

INSERT INTO `mailinglist` (`id`, `email`, `groupname`, `thedate`, `status`) VALUES
(1, 'sdfsdfsdf@sdfgdf.com', 'website', '2017-07-12 15:42:34', 5);

-- --------------------------------------------------------

--
-- Table structure for table `mailinglist_sending`
--

CREATE TABLE IF NOT EXISTS `mailinglist_sending` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `batchcode` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `thedate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `batchcode` (`batchcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `headline` text NOT NULL,
  `caption` text NOT NULL,
  `shorturl` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `thedate` datetime NOT NULL,
  `createdby` varchar(20) NOT NULL,
  UNIQUE KEY `code` (`article_id`),
  KEY `shorturl` (`shorturl`),
  KEY `createdby` (`createdby`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1375060784 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`article_id`, `headline`, `caption`, `shorturl`, `content`, `thedate`, `createdby`) VALUES
(1375060773, 'A Must Watch', '', 'a-must-watch-1375060773', '<br>', '2017-06-14 13:07:13', '2'),
(1375060774, 'EPL Action', 'Follow your favourite stars into a maze of encounters, discoveries and aftermaths. \r\n', 'deadpool-2-teaser-trailer-2017--2018-movie-trailer-1375060774', '<br>', '2017-06-14 13:16:38', '2'),
(1375060775, 'New Season', 'Enjoy storytelling at its best with new seasons full of suspense and thrill', 'black-panther-trailer-2017--official-2018-movie-teaser-1375060775', '<br>', '2017-06-14 13:18:19', '2'),
(1375060776, 'New Season', 'Enjoy storytelling at its best with new seasons full of suspense and thrill', 'thor-ragnarok-trailer-2017-movie-3--official-1375060776', '<br>', '2017-06-14 13:51:19', '2'),
(1375060777, 'New Season', 'Enjoy storytelling at its best with new seasons full of suspense and thrill', 'blind-trailer-2017-movie--official-1375060777', '<br>', '2017-06-14 13:55:52', '2'),
(1375060778, 'New Season', 'Enjoy storytelling at its best with new seasons full of suspense and thrill', 'jungle-trailer-2017-daniel-radcliffe-movie--official-1375060778', '<br>', '2017-06-14 14:06:27', '2'),
(1375060779, 'Lagos State', '', 'olaf''s-frozen-adventure-trailer-2017-movie--official-1375060779', '<br>', '2017-06-14 14:14:00', '2'),
(1375060780, 'Imo State', '', 'imo-state-1375060780', '<br>', '2017-06-14 14:49:18', '2'),
(1375060781, '93 Days Movie', '', '93-days-movie-1375060781', '<br>', '2017-06-14 14:54:54', '2'),
(1375060782, '76 The Movie', '', '76-the-movie-1375060782', '<br>', '2017-06-14 15:07:01', '2'),
(1375060783, 'October 1 - The Movie', 'dtgh fg dfgd fgdf g', 'october-1--the-movie-1375060783', 'dfg dfgd fdfgd fdfd d f<br>', '2017-06-14 15:13:36', '2');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `code` varchar(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `caption` text NOT NULL,
  `details` text NOT NULL,
  `thedate` date NOT NULL,
  UNIQUE KEY `pagecode` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`code`, `title`, `caption`, `details`, `thedate`) VALUES
('about', 'About Lord''s Chosen', 'The Lord''s Chosen has been divinely endowed to awaken the conscience of human race towards the realization of this vital grace of God, which enables us to make heaven at last. John 14:1-3 says, Let not your heart be troubled: ye believe in God, believe also in me. In my Father''s house are many mansions: if it were not so, I would have told you. I go to prepare a place for you. And if I go and prepare a place for you, I will come again, and receive you unto myself; that where I am, there ye may be also. Matthew 6:33 said, But seek ye first the kingdom of God, and his righteousness; and all these things shall be added unto you.', 'The Lord''s   Chosen has been divinely   endowed to awaken the conscience\r\n of human race towards   the realization   of this vital grace of God, \r\nwhich enables us to make heaven at   last.   John 14:1-3 says, Let not \r\nyour heart be troubled: ye believe in God,     believe also in me. In my\r\n Father''s house are many mansions: if it were   not so, I   would have \r\ntold you. I go to prepare a place for you. And if   I go and prepare a  \r\n place for you, I will come again, and receive you   unto myself; that \r\nwhere I am,   there ye may be also. Matthew 6:33 said,   But seek ye \r\nfirst the kingdom of God,   and his righteousness; and all   these \r\nthings shall be added unto   you.<br><br>The Lord''s   Chosen has been divinely   endowed to awaken the conscience\r\n of human race towards   the realization   of this vital grace of God, \r\nwhich enables us to make heaven at   last.   John 14:1-3 says, Let not \r\nyour heart be troubled: ye believe in God,     believe also in me. In my\r\n Father''s house are many mansions: if it were   not so, I   would have \r\ntold you. I go to prepare a place for you. And if   I go and prepare a  \r\n place for you, I will come again, and receive you   unto myself; that \r\nwhere I am,   there ye may be also. Matthew 6:33 said,   But seek ye \r\nfirst the kingdom of God,   and his righteousness; and all   these \r\nthings shall be added unto   you.<br><br>The Lord''s   Chosen has been divinely   endowed to awaken the conscience\r\n of human race towards   the realization   of this vital grace of God, \r\nwhich enables us to make heaven at   last.   John 14:1-3 says, Let not \r\nyour heart be troubled: ye believe in God,     believe also in me. In my\r\n Father''s house are many mansions: if it were   not so, I   would have \r\ntold you. I go to prepare a place for you. And if   I go and prepare a  \r\n place for you, I will come again, and receive you   unto myself; that \r\nwhere I am,   there ye may be also. Matthew 6:33 said,   But seek ye \r\nfirst the kingdom of God,   and his righteousness; and all   these \r\nthings shall be added unto   you.<br>', '2014-03-26'),
('donation', 'Support the work of salvation', '', '<br>', '0000-00-00'),
('home-box1', 'Text box1', 'sfsdfsdf sdfsdfs', 'sd fsdfsdf<br>', '0000-00-00'),
('home-box2', 'Pastor''s box 2', 'sdf asda s', 'dasdasda<br>', '0000-00-00'),
('home-box3', 'women box 3', 'asda sdasd', 'a sdasdasdasd <br>', '0000-00-00'),
('ministry-children', 'The young ones', 'They are young and lovely They are young and lovely They are young and lovely They are young and lovely They are young and lovely They are young and lovely They are young and lovely They are young and lovely They are young and lovely They are young and lovely They are young and lovely They are young and lovely ', 'This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for <br><br>partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information \r\n\r\nThis is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information This is for partners information  ', '2014-03-26'),
('ministry-men', 'for the real men', 'This is the real men''s forum This is the real men''s forum This is the real men''s forum This is the real men''s forum This is the real men''s forum This is the real men''s forum This is the real men''s forum This is the real men''s forum This is the real men''s forum This is the real men''s forum This is the real men''s forum This is the real men''s forum This is the real men''s forum ', 'content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here c<br><br>ontent comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here content comes here <br>', '2013-07-28'),
('ministry-women', 'Women Ministry', 'This is for the women This is for the women This is for the women This is for the women This is for the women This is for the women This is for the women This is for the women This is for the women This is for the women This is for the women This is for the women This is for the women This is for the women This is for the women This is for the women This is for the women This is for the women This is for the women ', 'This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. <br><br>This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country nown for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what <br><br>the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for. This is what the country man is known for.&nbsp;&nbsp; ', '2013-07-28'),
('ministry-youth', 'And for the youths', 'youths are friends of Jesus youths are friends of Jesus youths are friends of Jesus youths are friends of Jesus youths are friends of Jesus youths are friends of Jesus youths are friends of Jesus youths are friends of Jesus youths are friends of Jesus youths are friends of Jesus youths are friends of Jesus youths are friends of Jesus youths are friends of Jesus youths are friends of Jesus ', 'Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services co<br><br>ntent Services content \r\n\r\nServices content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content Services content  ', '2014-03-26'),
('testimonies', 'Give testimony to the Lord', 'Use this medium to praise God', 'For what ever the lord has done, you have to give him prais<br>', '0000-00-00'),
('where-we-meet', 'wwxxssddssdsxx', 's dasdasd asd a', 'Thi sis just another one as the first one didnt work<br>', '2013-07-28');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE IF NOT EXISTS `programs` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `channel_id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `caption` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '5',
  PRIMARY KEY (`program_id`),
  KEY `channels_id` (`channel_id`,`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `channel_id`, `name`, `caption`, `status`) VALUES
(1, '3', 'sdf sdf sdf xxxx', 's dsd s', 5),
(2, '4', 'Mother and child', 'fghj h jhk jkjkjk jk', 5);

-- --------------------------------------------------------

--
-- Table structure for table `programs_status`
--

CREATE TABLE IF NOT EXISTS `programs_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `reason` text NOT NULL,
  `thedate` datetime NOT NULL,
  `modifiedby_type` int(11) NOT NULL,
  `modifiedby_id` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `officer_id` (`program_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `programs_status`
--

INSERT INTO `programs_status` (`id`, `program_id`, `status`, `reason`, `thedate`, `modifiedby_type`, `modifiedby_id`) VALUES
(22, '1', 5, 'asdasdas', '2017-07-14 05:50:35', 0, '2');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE IF NOT EXISTS `schedules` (
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `channel_id` varchar(20) NOT NULL,
  `program_id` varchar(20) NOT NULL,
  `caption` text NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '5',
  PRIMARY KEY (`schedule_id`),
  KEY `channel_id` (`channel_id`,`program_id`,`startdate`,`enddate`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trailers`
--

CREATE TABLE IF NOT EXISTS `trailers` (
  `trailer_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` varchar(20) NOT NULL,
  `headline` text NOT NULL,
  `caption` text NOT NULL,
  `youtube` text NOT NULL,
  `shorturl` varchar(200) NOT NULL,
  `thedate` datetime NOT NULL,
  `createdby` varchar(20) NOT NULL,
  UNIQUE KEY `code` (`trailer_id`),
  KEY `shorturl` (`shorturl`),
  KEY `createdby` (`createdby`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1375060780 ;

--
-- Dumping data for table `trailers`
--

INSERT INTO `trailers` (`trailer_id`, `category_id`, `headline`, `caption`, `youtube`, `shorturl`, `thedate`, `createdby`) VALUES
(1375060774, '15', 'Deadpool 2 Teaser Trailer 2017 - 2018 Movie Trailer', 'Official 2018 Movie Teaser Trailer in HD - starring Ryan Reynolds, Karan Soni, Brianna Hildebrand - directed by David Leitch - The next installment in the Deadpool franchise.\r\n', 'https://youtu.be/gKR7O5B9qqg', '', '2017-06-14 15:46:59', '2'),
(1375060775, '15', 'Black Panther Trailer 2017 - Official 2018 Movie Teaser ', 'Official 2018 Movie Trailer in HD - starring Chadwick Boseman, Andy Serkis, Michael B. Jordan - directed by Ryan Coogler - The trailer begins with an interrogation scene of Ulysses Klaue/Klaw (Andy Serkis) being asked about Wakanda, as we see Boseman and one of his bodyguards watching through a two-way mirror.', 'https://youtu.be/7_pn5V3oeOA', '', '2017-06-14 15:49:13', '2'),
(1375060776, '15', 'Thor: Ragnarok Trailer 2017 Movie 3 - Official ', 'Thor: Ragnarok Trailer 2017 - Official Movie #3 Teaser Trailer in HD - starring Chris Hemsworth, Tom Hiddleston, Mark Ruffalo - directed by Taika Waititi - Thor must face the Hulk in a gladiator match and save his people from the ruthless Hela.\r\n', 'https://youtu.be/bGsFl6cYzYg', '', '2017-06-14 15:50:37', '2'),
(1375060777, '15', 'Blind Trailer 2017 Movie - Official ', 'Blind Trailer 2017 - Official Movie Trailer in HD - starring Alec Baldwin, Demi Moore, Dylan McDermott - directed by Michael Mailer - Baldwin plays a novelist blinded in a car crash that killed his wife, then falls in love with the neglected wife (Demi Moore) of an indicted businessman (McDermott).', 'https://youtu.be/Ws0ySFgq1A4', '', '2017-06-14 15:52:04', '2'),
(1375060779, '15', 'Olaf''s Frozen Adventure Trailer 2017 Movie - Official ', 'Olaf''s Frozen Adventure Trailer 2017 - Official Movie Trailer in HD - directed by Kevin Deters and Stevie Wermers-Skelton - starring Idina Menzel, Kristen Bell, Josh Gad - a Christmas-themed special featuring characters from the Disney film, ''Frozen''.', 'https://youtu.be/jyKnxwiEUKQ', '', '2017-06-15 14:17:44', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
