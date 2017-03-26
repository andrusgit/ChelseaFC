-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 26, 2017 at 09:13 PM
-- Server version: 10.0.30-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chelseafccsut_Users`
--
CREATE DATABASE IF NOT EXISTS `chelseafccsut_Users` DEFAULT CHARACTER SET utf8 COLLATE utf8_estonian_ci;
USE `chelseafccsut_Users`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`chelseafccsut`@`localhost` PROCEDURE `getAddedOffers`(IN `userId` INT(11))
    READS SQL DATA
SELECT users.name, Offers.Id, Offers.Type, Offers.Title
from users
INNER JOIN Offers ON users.id=Offers.addedBy$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Offers`
--

CREATE TABLE IF NOT EXISTS `Offers` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Type` enum('Offer','Search') CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL COMMENT 'offer if offering a job, search if searching for a job',
  `Title` varchar(100) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `Description` varchar(500) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `Location` varchar(80) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `Price_per_hour` int(11) NOT NULL,
  `Start` datetime NOT NULL,
  `End` datetime NOT NULL,
  `addedBy` int(11) NOT NULL COMMENT 'same as users id',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Price/hour` (`Price_per_hour`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Offers`
--

INSERT INTO `Offers` (`Id`, `Type`, `Title`, `Description`, `Location`, `Price_per_hour`, `Start`, `End`, `addedBy`) VALUES
(1, 'Offer', 'Vajan kedagi, kes teeks mulle koorest kanapastat.', 'Tere, olen Toomas Veromann ja vajan kedagi, kes ärataks mind hommikuti suurepärase kanapastaga üles.', 'Tartu', 10, '2017-03-30 09:15:00', '2017-03-23 10:15:00', 6),
(2, 'Search', 'Riisun lehti', 'Olen Toomas Veromann ja riisun teie aiast lehti. Maksimaalne aia suurus 420 m2.', 'Torma', 6, '2017-03-01 12:00:00', '2017-03-31 20:00:00', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `name`, `email`, `password`, `gender`, `phone`, `created`, `modified`, `status`) VALUES
(6, NULL, NULL, 'toomas veromees', 'toomas@toomas.toomas', 'ef2d42022436a0943b476a0ad5ccdb76473ab60e', 'Male', '58228076', '2017-03-26 13:01:46', '2017-03-26 13:01:46', '1'),
(9, NULL, NULL, 'Ako Tõnis', 'ako@ako.ako', '1b7ad54f057b59ef44edcaa1fda8cc0d07a167ed', 'Male', '420696969', '2017-03-26 20:58:20', '2017-03-26 20:58:20', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_JobOffersWithUser`
--
CREATE TABLE IF NOT EXISTS `view_JobOffersWithUser` (
`Id` int(11)
,`Title` varchar(100)
,`Description` varchar(500)
,`Location` varchar(80)
,`Hourprice` int(11)
,`Start` datetime
,`Enddatetime` datetime
,`Added` varchar(100)
,`UserId` int(11)
);
-- --------------------------------------------------------

--
-- Structure for view `view_JobOffersWithUser`
--
DROP TABLE IF EXISTS `view_JobOffersWithUser`;

CREATE ALGORITHM=UNDEFINED DEFINER=`chelseafccsut`@`localhost` SQL SECURITY DEFINER VIEW `view_JobOffersWithUser` AS select `Offers`.`Id` AS `Id`,`Offers`.`Title` AS `Title`,`Offers`.`Description` AS `Description`,`Offers`.`Location` AS `Location`,`Offers`.`Price_per_hour` AS `Hourprice`,`Offers`.`Start` AS `Start`,`Offers`.`End` AS `Enddatetime`,`users`.`name` AS `Added`,`users`.`id` AS `UserId` from (`Offers` join `users` on((`Offers`.`addedBy` = `users`.`id`))) order by `Offers`.`Price_per_hour`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
