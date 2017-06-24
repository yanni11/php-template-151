-- Adminer 4.2.5 MySQL dump
USE app;

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `MotorradId` int(11) NOT NULL,
  `Text` varchar(2000) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `comment` (`Id`, `UserId`, `MotorradId`, `Text`) VALUES
(4,	1,	1,	'My Comment Text'),
(5,	1,	1,	'My Comment Text'),
(6,	1,	1,	'ergeg'),
(7,	1,	1,	'T');

DROP TABLE IF EXISTS `model`;
CREATE TABLE `model` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(16) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `model` (`Id`, `Name`) VALUES
(1,	'Yamaha'),
(2,	'KTM');

DROP TABLE IF EXISTS `motorrad`;
CREATE TABLE `motorrad` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ModelId` int(11) NOT NULL,
  `TypId` int(11) NOT NULL,
  `Name` varchar(16) NOT NULL,
  `Hubraum` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `motorrad` (`Id`, `ModelId`, `TypId`, `Name`, `Hubraum`, `Price`) VALUES
(1,	1,	1,	'RJ600',	600,	0),
(2,	2,	4,	'Duke 200',	200,	3900);

DROP TABLE IF EXISTS `typ`;
CREATE TABLE `typ` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(16) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `typ` (`Id`, `Name`) VALUES
(1,	'Sport'),
(2,	'Chopper'),
(3,	'Enduro'),
(4,	'Naked');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`Id`, `Firstname`, `Lastname`, `Email`, `Password`) VALUES
(1,	'',	'',	'yannitsar@gmail.com',	'12345678'),
(2,	'Te',	'Tes',	'test@gmail.com',	'1234'),
(3,	'yan',	'tsar',	'tsar@tsar.com',	'1234');

-- 2017-06-24 14:45:58
