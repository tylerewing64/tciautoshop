-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 24, 2020 at 08:33 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--
CREATE DATABASE IF NOT EXISTS `login` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `login`;

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

DROP TABLE IF EXISTS `auction`;
CREATE TABLE IF NOT EXISTS `auction` (
  `auctionid` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL,
  `bidder` varchar(255) NOT NULL,
  `auctioneer` varchar(255) NOT NULL,
  `bid_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `bid_amount` varchar(255) NOT NULL,
  `bidder_contact` varchar(255) NOT NULL,
  PRIMARY KEY (`auctionid`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`auctionid`, `productid`, `bidder`, `auctioneer`, `bid_time`, `bid_amount`, `bidder_contact`) VALUES
(30, 190, 'tylertest', 'admin', '2020-04-24 20:30:56', '60,000', 'tylerewingshop@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(255) NOT NULL,
  `pprice` varchar(255) NOT NULL,
  `pdesc` varchar(255) NOT NULL,
  `pkeywords` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `pimg` longblob NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `pname`, `pprice`, `pdesc`, `pkeywords`, `created_at`, `pimg`, `username`) VALUES
(188, 'Ford Expedition 2006 ', '$13,000', 'Brand New no scratches hit me up on facebook @tyler ewing', 'Vehicle, Brand New, Ford expedition 2006', '2020-04-22 23:13:27', 0x35656131303764373431313663322e36333232383436332e6a7067, 'admin'),
(189, 'Nissan Fuga 2017', '$24,000', '250,000 Miles, Minor Issues Hit me up for more info @Tw on instagram', 'Vehicle, New ,Nissan , Fuga', '2020-04-22 23:21:53', 0x35656131303964316463663062342e38393135363734312e6a7067, 'tylertest'),
(190, 'Honda Fit 2020', '$2,000', 'If you want a subcompact car that packs in an exceptional amount of value, youâ€™d be hard-pressed to do better than the 2020 Honda Fit. ', 'Vehicle , Brand New', '2020-04-24 15:38:41', 0x35656133343034316336313462342e33313431343038362e6a7067, 'admin'),
(191, 'Kia Soul 2020', '$15,000', 'The Soulâ€™s intuitive tech features include Apple CarPlay and Android Auto as standard, both of which are controlled through a 7-inch touch screen.', 'Vehicle', '2020-04-24 15:51:19', 0x35656133343333373837376339362e31333332393430352e6a7067, 'admin'),
(192, 'Kia Forte ', '$25,000', 'Youâ€™ve got a number of great options if youâ€™re shopping for a compact car, but few deliver as much bang for the buck as the 2020 Kia Forte. ', 'Vehicle', '2020-04-24 15:52:44', 0x35656133343338636235616565332e34353838343332382e6a7067, 'admin'),
(193, 'Honda CR-V 2020', '$9,000', 'Thereâ€™s no doubt that Hondaâ€™s compact SUV provides a strong value: The CR-V has won seven Best Compact SUV for the Money awards, and 2020 marks its fourth consecutive win.', 'Vehicle', '2020-04-24 15:54:39', 0x35656133343366663934386663322e33363937373138312e6a7067, 'admin'),
(194, 'Toyota Camry 2020', '$40,000', 'The Camry has a high base price for the class, but thatâ€™s offset by ownership costs that are lower than what youâ€™ll find on most competing midsize cars.', 'Vehicles, Toyota, Cheap', '2020-04-24 16:00:31', 0x35656133343535663938366261302e32353438373132352e6a7067, 'admin'),
(196, ' LEXUS V8 5.0L 2UR COMPLETE ENGINE KIT', '$2,999', 'The 2UR-GSE is a 5.0 L; 303.2 cu in (4,969 cc) naturally aspirated V8 engine fitted to the Lexus IS-F, RC-F, GS-F and LC 500.', 'vparts', '2020-04-24 16:30:15', 0x35656133346335373836373234342e38323436323132352e6a7067, 'tylertest');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `usr` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `email`, `usr`, `pwd`, `created_at`) VALUES
(28, 'admin', 'admin', 'admin', '2020-04-20 23:51:07'),
(29, 'tylerewingshop@gmail.com', 'tylertest', 'tylertest', '2020-04-23 02:21:05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
