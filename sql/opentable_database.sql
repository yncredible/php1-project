-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Genereertijd: 12 mei 2014 om 20:34
-- Serverversie: 5.5.27
-- PHP-versie: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `opentable`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` longtext NOT NULL,
  `menu_description` longtext NOT NULL,
  `menu_price` int(11) NOT NULL,
  `menu_category` varchar(255) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Gegevens worden uitgevoerd voor tabel `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_description`, `menu_price`, `menu_category`, `restaurant_id`) VALUES
(25, 'Beer', 'Belgian beer!', 2, 'alcoholBeverages', 31),
(27, 'Champagne', 'French champagne', 12, 'alcoholBeverages', 31),
(28, 'Fanta', 'Sweet leimonade', 2, 'beverages', 31),
(29, 'Tomato soup', 'Healthy soup ', 6, 'soups', 31),
(30, 'IMD salad', 'Healthy IMD salad', 8, 'salads', 31),
(31, 'Chicken Masala', 'Hot chicken with rice', 13, 'chicken', 31),
(32, 'Pasta bolognese', 'Classic tomato sauce', 14, 'pasta', 31),
(33, 'Oysters', 'Delicious oysters', 23, 'seafood', 31),
(34, 'Grilled steak', 'Delicious steak', 21, 'ribSteaks', 31),
(35, 'IMD burger', 'Burger for developers', 16, 'burgerSandwiches', 31),
(36, 'Kids spaghetti', 'Little spaghetti', 11, 'kidsMenu', 31),
(37, 'Pancakes', 'Sweet pancakes', 9, 'desserts', 31);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `openinghours`
--

CREATE TABLE IF NOT EXISTS `openinghours` (
  `opening_id` int(11) NOT NULL AUTO_INCREMENT,
  `opening_monday_from` time NOT NULL,
  `opening_monday_until` time NOT NULL,
  `opening_tuesday_from` time NOT NULL,
  `opening_tuesday_until` time NOT NULL,
  `opening_wednesday_from` time NOT NULL,
  `opening_wednesday_until` time NOT NULL,
  `opening_thursday_from` time NOT NULL,
  `opening_thursday_until` time NOT NULL,
  `opening_friday_from` time NOT NULL,
  `opening_friday_until` time NOT NULL,
  `opening_saturday_from` time NOT NULL,
  `opening_saturday_until` time NOT NULL,
  `opening_sunday_from` time NOT NULL,
  `opening_sunday_until` time NOT NULL,
  `opening_remarks` longtext NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  PRIMARY KEY (`opening_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `openinghours`
--

INSERT INTO `openinghours` (`opening_id`, `opening_monday_from`, `opening_monday_until`, `opening_tuesday_from`, `opening_tuesday_until`, `opening_wednesday_from`, `opening_wednesday_until`, `opening_thursday_from`, `opening_thursday_until`, `opening_friday_from`, `opening_friday_until`, `opening_saturday_from`, `opening_saturday_until`, `opening_sunday_from`, `opening_sunday_until`, `opening_remarks`, `restaurant_id`) VALUES
(4, '11:00:00', '22:00:00', '10:30:00', '23:30:00', '10:30:00', '23:30:00', '11:00:00', '23:00:00', '17:00:00', '12:00:00', '10:00:00', '22:00:00', '11:00:00', '23:00:00', 'Closed on new year''s eve''!', 31);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_name` varchar(255) NOT NULL,
  `reservation_number` int(11) NOT NULL,
  `reservation_day` int(11) NOT NULL,
  `reservation_hour` varchar(255) NOT NULL,
  `reservation_email` varchar(255) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  PRIMARY KEY (`reservation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `restaurant`
--

CREATE TABLE IF NOT EXISTS `restaurant` (
  `restaurant_id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_name` varchar(255) NOT NULL,
  `restaurant_street` varchar(255) NOT NULL,
  `restaurant_number` int(6) NOT NULL,
  `restaurant_postalCode` int(6) NOT NULL,
  `restaurant_city` varchar(255) NOT NULL,
  `restaurant_type` varchar(100) NOT NULL,
  `restaurant_email` varchar(255) NOT NULL,
  `restaurant_website` varchar(255) NOT NULL,
  `restaurant_photoname` varchar(200) NOT NULL,
  `restaurant_photo` blob NOT NULL,
  `owner_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `openingHours_id` int(11) NOT NULL,
  PRIMARY KEY (`restaurant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Gegevens worden uitgevoerd voor tabel `restaurant`
--

INSERT INTO `restaurant` (`restaurant_id`, `restaurant_name`, `restaurant_street`, `restaurant_number`, `restaurant_postalCode`, `restaurant_city`, `restaurant_type`, `restaurant_email`, `restaurant_website`, `restaurant_photoname`, `restaurant_photo`, `owner_id`, `menu_id`, `openingHours_id`) VALUES
(31, 'IMD restaurant', 'Lange Ridderstraat', 44, 2800, 'Mechelen', 'fastfood', 'info@thomasmore.be', 'www.thomasmore.be', '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `restaurateur`
--

CREATE TABLE IF NOT EXISTS `restaurateur` (
  `owner_id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_name` varchar(255) NOT NULL,
  `owner_email` varchar(255) NOT NULL,
  `owner_password` varchar(255) NOT NULL,
  PRIMARY KEY (`owner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Gegevens worden uitgevoerd voor tabel `restaurateur`
--

INSERT INTO `restaurateur` (`owner_id`, `owner_name`, `owner_email`, `owner_password`) VALUES
(30, 'Admin', 'admin@thomasmore.be', '00da70a1caecc6ac74f7af0ea749063b');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `table`
--

CREATE TABLE IF NOT EXISTS `table` (
  `table_id` int(11) NOT NULL AUTO_INCREMENT,
  `table_nr` varchar(255) NOT NULL,
  `table_persons` int(11) NOT NULL,
  `table_status` varchar(255) NOT NULL,
  `table_description` longtext NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  PRIMARY KEY (`table_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Gegevens worden uitgevoerd voor tabel `table`
--

INSERT INTO `table` (`table_id`, `table_nr`, `table_persons`, `table_status`, `table_description`, `restaurant_id`) VALUES
(9, '1', 4, 'Reserved', 'Table with a great view', 31),
(10, '2', 2, 'Reserved', 'Table for couples', 31),
(11, '3', 10, 'Occupied', 'Table for groups', 31);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
