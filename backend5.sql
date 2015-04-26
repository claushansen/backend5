-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Vært: localhost
-- Genereringstid: 26. 04 2015 kl. 15:13:43
-- Serverversion: 5.5.24-log
-- PHP-version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `backend5`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `payed` tinyint(1) NOT NULL,
  `shipped` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Data dump for tabellen `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `payed`, `shipped`) VALUES
(1, 1, '2015-04-23 14:31:22', 0, 0),
(2, 2, '2015-04-25 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Data dump for tabellen `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `amount`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 1),
(3, 1, 2, 10),
(4, 2, 2, 3);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(15,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Data dump for tabellen `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`) VALUES
(1, 'cowboy boots', 'Great boots', '499.50'),
(2, 'sandals', 'Leather sandals with rubber sols', '255.00');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `prod_features`
--

CREATE TABLE IF NOT EXISTS `prod_features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  ` value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Data dump for tabellen `prod_features`
--

INSERT INTO `prod_features` (`id`, `prod_id`, `name`, ` value`) VALUES
(1, 1, 'color', 'Black'),
(2, 2, 'color', 'Brown');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` int(4) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(8) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birth` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Data dump for tabellen `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `address`, `city`, `zip`, `email`, `phone`, `gender`, `birth`) VALUES
(1, 'Claus', 'Hansen', 'Stationsvej 31', 'Dalmose', 4261, 'claus@multimedion.dk', 42611414, 'Mand', '1969-06-24'),
(2, 'Pia', 'Christensen', 'Bolbrovej 44', 'Odense', 5000, 'pia@mail.dk', 11223344, 'Kvinde', '1988-04-06');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
