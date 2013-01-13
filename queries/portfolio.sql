-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 12, 2013 at 08:24 PM
-- Server version: 5.1.58-1ubuntu1
-- PHP Version: 5.4.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gallantone`
--

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_type_id` int(11) NOT NULL DEFAULT '1',
  `name` varchar(75) NOT NULL DEFAULT '',
  `client_name` varchar(25) DEFAULT NULL,
  `image` varchar(32) NOT NULL,
  `url` varchar(40) DEFAULT NULL,
  `details` text,
  `tech` text,
  `thejob` text,
  `start_date` datetime NOT NULL DEFAULT '1997-05-05 23:00:00',
  `end_date` datetime NOT NULL DEFAULT '2000-05-05 23:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `client_type_id`, `name`, `client_name`, `image`, `url`, `details`, `tech`, `thejob`, `start_date`, `end_date`) VALUES
(1, 2, 'Noah Bloom Music', 'noah', 'client_noah.jpg', 'http://www. noahbloommusic.com', 'NoahBloomMusic.com is a music website featuring legendary New York jazz trumpet master, Noah Bloom.\r\n\r\nNoah has been playing trumpet for over twenty years and has played with many great New York jazz bands including G-Train and playing alongside legendary jazz bassist Milt Hinton.', 'PHP, Adobe Photoshop, Flash, XML', 'Front end designer and backend PHP developer.', '2005-05-05 23:00:00', '2000-05-05 23:00:00'),
(2, 1, 'Conductor Inc.', 'cond', 'site_conductor.jpg', 'http://www.conductor.com', 'Conductor Inc. is a SEO related natural search builder providing high quality, topically relevant links from a network of pre-approved advertisers to relevant related website publishers.', 'PHP, Prado Framework, Perl, MySQL, XML, Propel ORM, ASP, AJAX', '<li>Created a logging infrastructure for invoicing and billing integrated with the Monetra API.</li>\r\n<li>Created a working ad generator and shopping cart for purchasing text ads, using fast auto-generated ad scripts configured for various web servers ranging from PHP, Python, ASP, and Perl.</li>\r\n<li>Created an advertisement generation system as a unique component which allowed for on-the-fly ad customization for client sites.</li>\r\n<li>Designed strategic marketing administration utility providing information on revenue and sales generated and profit loss margins for Conductor and publishing clients.</li> \r\n<li>Managed database replication and migration for Q/A and production environment.</li>\r\n<li>Designed and maintained invoicing and payment data including accrued revenue report generation.</li>\r\n\r\n', '2005-05-05 23:00:00', '2009-03-06 17:00:00'),
(3, 1, 'The Ladders', 'ladders', 'site_theladders.jpg', 'http://www.theladders.com', 'The Ladders is an aggregated job board focusing on a multitude of 100K plus job opportunities and recruitment.\r\n', 'PHP, J2EE, Perl, MySQL, XML', '<li>Created a dynamic  administrative interface which became one of the largest revenue generators for the company.</li> \r\n<li>Created and administrated the initial websites which contributed to the multi-million dollar investment in the company.</li>\r\n<li>Worked strategically with marketing to generate dynamic charts and records of all subscriptions, un-subscriptions, and successful job landings.</li>\r\n<li>Worked with Omniture, Optimost, and a number of web statistic technologies to record and capture user activity and create a comfortable user experience and profitable information site.</li>', '2005-05-05 23:00:00', '2000-05-05 23:00:00'),
(4, 1, 'XBS Compliance Suite', 'xbs', 'site_xbssolutions.jpg', 'http://www.xbsolutions.com', 'Compliance is a financial auditing software program that allows companies to quickly generate 100+ page transfer pricing reports.', 'JavaScript, XML, Visual Basic, DHTML, VBScript, Adobe Photoshop ', '<li>Designed a multi-functional software user interface and navigation system focusing on usability, optimization for speed, and user navigation.  \r\n\r\n', '2005-05-05 23:00:00', '2000-05-05 23:00:00'),
(5, 1, 'Chase Online Banking', 'chase', 'client_chase.jpg', 'http://www.chase.com', 'The first iteration (1999) of the Chase Online Banking website.', 'DHTML, Javascript, JSP, Perl', '<li>Led an HTML team for the design of Chase Manhattan Online Banking web site.\r\n<li>Collaborated with backend programmers from Scient Inc. between to integrate HTML / JavaScript front end with JSP backend.\r\n<li>Optimized site according to consumer preferences observed during user tests and operation of the site.\r\n\r\n', '1999-05-05 23:00:00', '2000-05-05 23:00:00'),
(6, 2, 'EscofferyMusic.com', 'esmu', 'client_esmu.jpg', 'http://www. escofferymusic.com', 'This was an early draft of EscofferyMusic featuring legendary New York tenor saxophonist Wayne Escoffery', 'Full front end development, Perl and Flash', NULL, '2005-05-05 23:00:00', '2000-05-05 23:00:00'),
(7, 2, 'TrainerSpot.com', 'tspot', 'client_tspot.jpg', 'www.trainerspot.com', 'Initial draft of TrainerSpot.com design', 'Front and back end development in PHP', NULL, '2005-05-05 23:00:00', '2000-05-05 23:00:00'),
(8, 3, 'Gibson Guitar', 'gibson', 'print_gibson.jpg', 'http://www.gibson.com', 'Gibson Guitar Poster ', 'Adobe Photoshop, QuarkXpress', 'Design of approximately 3 foot high poster design for Gibson Guitar and Rainforest Alliance promotion.', '2005-05-05 23:00:00', '2000-05-05 23:00:00'),
(9, 3, 'Rainforest Alliance', 'rapost', 'print_journal.jpg', NULL, 'Cover design of 2003 annual Gala', 'Adobe Photoshop, QuarkXPress', 'Design of the 40+ page journal presented at the Rainforest Alliance 2003 annual Gala on May 14th', '2005-05-05 23:00:00', '2000-05-05 23:00:00'),
(10, 3, 'WB Poster', 'wbpost', 'print_wbpost.jpg', NULL, 'Rainforest Alliance poster', 'Adobe Photoshop, QuarkXPress', 'Rainforest Alliance promotional poster used in WB television series "What I Like About You" starring Amanda Bynes. ', '2005-05-05 23:00:00', '2000-05-05 23:00:00'),
(11, 4, 'NYST', 'nyst', 'logo_nyst.jpg', NULL, 'Web and print logo design', 'Adobe Photoshop, Adobe Illustrator', 'Final iteration of a logo for an aspiring fashion website.', '1997-05-05 23:00:00', '2000-05-05 23:00:00'),
(12, 4, 'Onederful', 'onederful', 'logo_one.jpg', NULL, 'Web logo design', 'Adobe Photoshop, Adobe Illustrator', 'Final iteration of web logo design for film production company.', '1997-05-05 23:00:00', '2000-05-05 23:00:00'),
(13, 4, 'NUEA', 'nuea', 'logo_nuea.jpg', NULL, 'Web and print logo design', 'Adobe Photoshop, Adobe Illustrator', 'Final iteration of logo for an aspiring music production company.', '1997-05-05 23:00:00', '2000-05-05 23:00:00'),
(14, 4, 'Uaxiom', 'uaxiom', 'logo_uaxiom.jpg', NULL, 'Logo design', 'Adobe Photoshop', 'Print logo for an aspiring fashion company.', '1997-05-05 23:00:00', '2000-05-05 23:00:00'),
(15, 3, 'Gala Invite', 'print_invite', 'print_invite.jpg', NULL, 'Four sided invitation', 'Adobe Photoshop, QuarkXPress', 'Invitation design including envelopes for Rainforest Alliance 2003 annual Gala', '1997-05-05 23:00:00', '2000-05-05 23:00:00'),
(16, 3, 'RA Canopy', 'canopy', 'print_canopy.jpg', NULL, 'Newsletter layout and design', 'Adobe Photoshop, QuarkXPress', 'Full layout and design of a monthly newsletter for Rainforest Alliance, including image cropping, copy-editing, spacing and justification.', '1997-05-05 23:00:00', '2000-05-05 23:00:00'),
(17, 3, 'Eco-Index', 'ecoindex', 'print_eco.jpg', NULL, 'One-sheet ', 'Adobe Photoshop, QuarkXPress', 'Design and layout of Rainforest Alliance one-sheet', '1997-05-05 23:00:00', '2000-05-05 23:00:00'),
(18, 3, 'RA Poster', 'raposter', 'print_rapost.jpg', NULL, 'Rainforest Alliance Poster', 'Adobe Photoshop, Adobe Illustrator, QuarkXPress', 'Three foot wide Rainforest Alliance promotional poster for sustainable coffee growth.', '1997-05-05 23:00:00', '2000-05-05 23:00:00'),
(19, 5, 'Book: Here Is New York', 'hiny', '', 'http://hereisnewyork.org/', 'Publishing credit based on Sept. 11th photography', '', 'Published in book called Here Is New York, a collection of photography from September 11th, 2001.', '2001-09-11 23:00:00', '2002-05-05 23:00:00'),
(20, 1, 'Press+', 'pressplus', 'client_press.jpg', 'http://www.mypressplus.com', 'The one paywall to rule them all, Press+ is the successful and largest standing paywall protecting the content of online newspapers and affiliates throughout the world.', 'Java Spring 3 MVC, Hibernate, Oracle, JQuery, Prototype, Python, Android API, Cassandra, PHP', '<li>Created a sign up and credit card processing infrastructure using Spring 3 MVC workable on desktops, Android, IPhone and IPad systems.\r\n<li>Wrote Hibernate XML queries to handle specific subscription and account data\r\n<li>Created a customizable template engine for affiliates\r\nWrote python scripts to maintain error logging and tracking\r\n<li>Created extended Exception catching interfaces for logging\r\n<li>Created the Customer Service tool for the customer service team to handle customers of affiliates\r\n<li>Created the Self Care module for customers to personal account information\r\n<li>Worked with various affiliate code to maintain synchronized functionality\r\n<li>Worked with Spring Security API, Exact Target, Social Vibe, Omniture and other outside vendors', '2010-06-01 23:00:00', '2012-08-05 23:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
