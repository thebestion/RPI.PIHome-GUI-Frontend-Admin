-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 02. Okt 2012 um 03:30
-- Server Version: 5.5.24
-- PHP-Version: 5.4.4-7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `pihome`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pi_admin`
--

CREATE TABLE IF NOT EXISTS `pi_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) COLLATE latin1_german1_ci NOT NULL,
  `pass` varchar(255) COLLATE latin1_german1_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `pi_admin`
--

INSERT INTO `pi_admin` (`id`, `user`, `pass`) VALUES
(1, 'admin', 'pihome');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pi_devices`
--

CREATE TABLE IF NOT EXISTS `pi_devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` varchar(255) COLLATE latin1_german1_ci NOT NULL,
  `device` varchar(255) COLLATE latin1_german1_ci NOT NULL,
  `letter` varchar(55) COLLATE latin1_german1_ci NOT NULL,
  `code` varchar(55) COLLATE latin1_german1_ci NOT NULL DEFAULT '00000',
  `status` varchar(55) COLLATE latin1_german1_ci NOT NULL DEFAULT '0',
  `sort` varchar(55) COLLATE latin1_german1_ci NOT NULL DEFAULT '0',
  `aktiv` varchar(55) COLLATE latin1_german1_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `pi_devices`
--

INSERT INTO `pi_devices` (`id`, `room_id`, `device`, `letter`, `code`, `status`, `sort`, `aktiv`) VALUES
(1, '1', 'Lamp A', 'A', '00000', '0', '0', '1'),
(2, '1', 'Lamp B', 'B', '00000', '0', '0', '1'),
(3, '1', 'Lamp C', 'C', '00000', '0', '0', '1'),
(4, '1', 'Lamp D', 'D', '00000', '0', '0', '1');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pi_rooms`
--

CREATE TABLE IF NOT EXISTS `pi_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room` varchar(255) COLLATE latin1_german1_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `pi_rooms`
--

INSERT INTO `pi_rooms` (`id`, `room`) VALUES
(1, 'My Room');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
