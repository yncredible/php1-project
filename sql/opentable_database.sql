-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Genereertijd: 07 mei 2014 om 10:50
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
  `menu_price` varchar(255) NOT NULL,
  `menu_category` varchar(255) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Gegevens worden uitgevoerd voor tabel `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_description`, `menu_price`, `menu_category`, `restaurant_id`) VALUES
(2, 'Sloppy joe''s', 'Big piece of diabetes', '4,5', 'burgerSandwiches', 6),
(3, 'Balletjes', 'Big piece of diabetes', '500', 'kidsMenu', 3),
(4, 'Sloppy joe''s', 'Big piece of diabetes', '500', 'burgerSandwiches', 3),
(5, 'Balletjes', 'met tomatensaus', '500', 'beverages', 13),
(6, 'Sloppy joe''s', 'Big piece of diabetes', '4', 'burgerSandwiches', 5);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_quantity` int(11) NOT NULL,
  `order_price` varchar(255) NOT NULL,
  `order_totalprice` varchar(255) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `restaurant_email` varchar(255) NOT NULL,
  `restaurant_website` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `openingHours_id` int(11) NOT NULL,
  PRIMARY KEY (`restaurant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Gegevens worden uitgevoerd voor tabel `restaurant`
--

INSERT INTO `restaurant` (`restaurant_id`, `restaurant_name`, `restaurant_street`, `restaurant_number`, `restaurant_postalCode`, `restaurant_city`, `restaurant_email`, `restaurant_website`, `owner_id`, `menu_id`, `openingHours_id`) VALUES
(3, 'Pizza Hut', 'Markt', 3, 1840, 'Londerzeel', 'pizzahut@pizza.be', 'www.pizza.be', 25, 0, 0),
(4, 'burger', 'burger', 32, 1743, 'burger', 'burger@hotmail.com', 'www.burger.be', 25, 0, 0),
(5, 'Taco Bell', 'Chickens', 21, 4312, 'qebtrsgd', 'tacoballs@hotmail.com', 'www.tacoballs.be', 25, 0, 0),
(6, 'Pizza Hut', 'burger', 21, 1743, 'Coin', 'ebsdg@erqbf.com', 'www.wbtsg.gerf', 25, 0, 0),
(7, 'Pizza Hut', 'burger', 21, 1743, 'Coin', 'ebsdg@erqbf.com', 'www.wbtsg.gerf', 25, 0, 0),
(8, 'Pizza Hut', 'burger', 21, 1743, 'Coin', 'ebsdg@erqbf.com', 'www.wbtsg.gerf', 25, 0, 0),
(9, 'Pizza Hut', 'burger', 21, 1743, 'Coin', 'ebsdg@erqbf.com', 'www.wbtsg.gerf', 25, 0, 0),
(10, 'Pizza Hut', 'burger', 21, 1743, 'Coin', 'ebsdg@erqbf.com', 'www.wbtsg.gerf', 25, 0, 0),
(11, 'Pizza Hut', 'burger', 21, 1743, 'Coin', 'ebsdg@erqbf.com', 'www.wbtsg.gerf', 25, 0, 0),
(12, 'Pizza Hut', 'burger', 21, 1743, 'Coin', 'ebsdg@erqbf.com', 'www.wbtsg.gerf', 25, 0, 0),
(13, 'Pizza Hut', 'burger', 21, 1743, 'Coin', 'ebsdg@erqbf.com', 'www.wbtsg.gerf', 25, 0, 0),
(14, 'Big joe''s', 'Fancy street', 14, 4212, 'Joe Street', 'bigjoe@gmail.com', 'www.bigjoe.com', 25, 0, 0),
(15, 'Big joe''s', 'Fancy street', 14, 4212, 'Joe Street', 'bigjoe@gmail.com', 'www.bigjoe.com', 25, 0, 0),
(16, 'Big joe''s', 'Fancy street', 3, 1743, 'Joe Street', 'burger@hotmail.com', 'www.bigjoe.com', 25, 0, 0),
(17, 'Big joe''s', 'Fancy street', 3, 1743, 'Joe Street', 'burger@hotmail.com', 'www.bigjoe.com', 25, 0, 0),
(18, 'Big joe''s', 'Fancy street', 3, 1743, 'Joe Street', 'burger@hotmail.com', 'www.bigjoe.com', 25, 0, 0),
(19, 'Pizza Hut', 'Fancy street', 3, 4212, 'burger', 'pizzahut@pizza.be', 'www.tacoballs.be', 25, 0, 0),
(20, 'Pizza Hut', 'Fancy street', 3, 4212, 'burger', 'pizzahut@pizza.be', 'www.tacoballs.be', 25, 0, 0),
(21, 'New restaurant', 'Londerzeel', 13, 1840, 'Londerzeel', 'bigjoe@gmail.com', 'www.wbtsg.gerf', 25, 0, 0),
(22, 'New test restaurant', 'testing ', 33, 4325, 'Testing City', 'testingrestaurant@yahoo.com', 'www.testingrestaurant.com', 25, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Gegevens worden uitgevoerd voor tabel `restaurateur`
--

INSERT INTO `restaurateur` (`owner_id`, `owner_name`, `owner_email`, `owner_password`) VALUES
(25, 'Kristof', 'krisvanespen@hotmail.com', 'b6a460f0cad54e15bb99c45276125e09'),
(26, 'Kristof', 'kristof@creativebrain.be', 'b6a460f0cad54e15bb99c45276125e09'),
(27, '4wrabdzf', 'creativesurename@gmail.com', 'b6a460f0cad54e15bb99c45276125e09'),
(28, '4wrabdzf', 'qwert@test.be', 'b6a460f0cad54e15bb99c45276125e09'),
(29, 'Admin', 'admin@thomasmore.be', '00da70a1caecc6ac74f7af0ea749063b');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `table`
--

INSERT INTO `table` (`table_id`, `table_nr`, `table_persons`, `table_status`, `table_description`, `restaurant_id`) VALUES
(1, '7', 4, 'Occupied', 'A nice view out the window', 3),
(2, '7', 4, 'Occupied', 'A nice view out the window', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
