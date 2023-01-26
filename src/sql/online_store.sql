-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 26, 2023 at 05:15 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL,
  `cart_total` int(11) NOT NULL,
  `product_image` varchar(250) NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(1, 'Hoodies', 1),
(2, 'T-Shirts', 1),
(3, 'Accessories', 1),
(6, 'Upcoming', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(100) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `product_desc` varchar(1000) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_pic` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `product_type`, `product_desc`, `product_price`, `product_pic`, `status`) VALUES
(8, 1, 'Jujustu Kaisen Hoodie', 'Hoodie', 'Jujustu Kaisen Hoodie', 300, 'JujustuKaisen_Hoodie.jpg', 1),
(9, 1, 'Demon Slayer Hoodie', 'Hoodie', 'Demon Slayer Hoodie', 300, 'demonslayer_hoodie.jpg', 1),
(10, 2, 'Death Note T-shirt', 'T-shirt', 'Death Note - L T-shirt', 180, 'deathnote_tshirt.jpg', 1),
(11, 2, 'Demon Slayer T-shirt', 'T-shirt', 'Demon Slayer T-shirt', 280, 'demonslayer_tshirt.jpg', 1),
(12, 3, 'Death Note Ring', 'Accesory', 'Death Note Ring', 250, 'death_note_ring.jpg', 1),
(13, 1, 'Tokyo Ghoul Hoodie', 'Hoodie', 'Tokyo Ghoul Hoodie', 300, 'tokyo_ghoul_hoodie.jpg', 1),
(14, 3, 'Naruto Pendant', 'Accessory', 'Naruto Pendant', 180, 'naruto_necklace.jpg', 1),
(15, 2, 'Death Note T-shirt', 'T-shirt', 'Death Note T-shirt', 150, 'deathnotes_tshirt.jpg', 1),
(16, 2, 'Attack on Titans T-shirt', 'T-shirt', 'Attack on Titans T-shirt', 250, 'attackontitans.jpg', 1),
(17, 1, 'Naruto, Gaara Hoodie', 'Hoodie', 'Naruto, Gaara Hoodie', 320, 'naruto_gara_hoodie.jpg', 1),
(18, 3, 'Naruto Coffee Mug', 'Acessory', 'Naruto Coffee Mug', 180, 'naruto_mug.jpg', 1),
(20, 6, 'Demon Slayer Light Display', 'Accessory', 'Demon Slayer Light Display', 250, 'demonslayer_light.jpg', 0),
(22, 3, 'My Hero Academia Pillow', 'Accessory', 'My Hero Academia Pillow', 290, 'my_hero_ac_pillow.jpg', 1),
(23, 1, 'Demon Slayer Hoodie', 'Hoodie', 'Demon Slayer Hoodie', 350, 'demonslayer_hoodie2.jpg', 1),
(24, 3, 'Attack on Titans Coffee Mug', 'Accessory', 'Attack on Titans Coffee Mug', 250, 'titans_mug.jpg', 1),
(25, 1, 'Naruto Hoodie', 'Hoodie', 'Naruto Hoodie', 300, 'naruto_hoodie.jpg', 0),
(26, 6, 'High Invasion Pillow', 'Accessory', 'High Invasion Pillow', 150, 'highinvasion_acc.jpg', 0),
(27, 6, 'Naruto Hoodie', 'Hoodie', 'Naruto Hoodie', 290, 'guy_naruto_hoodie.jpg', 0),
(28, 6, 'Hunter X Hunter Hoodie', 'Hoodie', 'Hunter X Hunter Hoodie', 320, 'hunterxhunter_hoodie.jpg', 0),
(29, 6, 'Eden Zero T-shirt', 'T-shirt', 'Eden Zero T-shirt', 180, 'edenzero.jpg', 0),
(30, 6, 'Dragon Ball Z T-shirt', 'T-shirt', 'Dragon Ball Z T-shirt', 190, 'dbz_tshirt.jpg', 0),
(31, 6, 'One Piece Necklace', 'Accessory', 'One Piece Necklace', 250, 'onepiece_necklace.jpg', 0),
(32, 6, 'Akame Ga kill Hoodie', 'Hoodie', 'Akame Ga kill Hoodie', 350, 'akamegakill_hoodie.jpg', 0),
(33, 2, 'Demon Slayer', 'T-shirts', 'Tanjiro Demon Slayer T-shirt', 160, 'demonslayer_t-shirt.jpg', 1),
(34, 2, 'My Hero Academia T-shirt', 'T-shirt', 'Bakugou My Hero Academia T-shirt', 160, 'myheroac_t-shirt.jpg', 1),
(35, 2, 'Jujustu Kaisen T-shirt', 'T-shirt', 'Yuji Itadori - Jujustu Kaisen ', 150, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `email`, `password`) VALUES
(1, 'John', 'John1234', 'John335@gmail.com', 'marcelle212324'),
(2, 'Kelsy', 'dfsdf', 'kelsyohlsson@gmail.com', 'marcy21'),
(3, 'Kelsy', 'dfsdf', 'kelsyohlsson@gmail.com', '1256'),
(4, 'Kelsy', 'dfsdf', 'kelsyohlsson@gmail.com', '1256'),
(5, 'Kelsy', 'dfsdf', 'kelsyohlsson@gmail.com', '1256'),
(6, 'Kelsy', 'kelsyohlss', 'kelsyohlsson@gmail.com', '12563'),
(7, 'Kelsy', 'Marcy1234', 'kelsyohlsson@gmail.com', 'qwer');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
