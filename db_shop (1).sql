-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2020 at 11:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(250) NOT NULL,
  `adminUser` varchar(250) NOT NULL,
  `adminEmail` varchar(250) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `role`) VALUES
(1, 'rupom', 'admin', 'rupomehsan34@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 0),
(2, '', 'sabbir', 'sabbir@gamil.com', '698d51a19d8a121ce581499d7b701668', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandid` int(11) NOT NULL,
  `brandname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandid`, `brandname`) VALUES
(1, 'CANON'),
(2, 'Uniliver'),
(3, 'ACER');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_card`
--

CREATE TABLE `tbl_card` (
  `cardid` int(11) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `productid` int(11) NOT NULL,
  `productname` varchar(250) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_card`
--

INSERT INTO `tbl_card` (`cardid`, `sid`, `productid`, `productname`, `price`, `quantity`, `image`) VALUES
(53, 'gu4mmp11uslaq2t75ignrdkftt', 12, 'Lorem Ipsum is simply update', 245.89, 1, 'uploads/d7c49a0901.jpg'),
(54, 'tkv90dtp0kf29grtbknbjd9imk', 14, 'Lorem Ipsum is simply', 245.89, 1, 'uploads/028dc89c83.jpg'),
(55, 'tkv90dtp0kf29grtbknbjd9imk', 16, 'Lorem Ipsum is simply', 245.89, 1, 'uploads/7614ff0d46.jpg'),
(56, 'tkv90dtp0kf29grtbknbjd9imk', 3, 'Hot Chili Peppers Magnetic Salt', 245.89, 1, 'uploads/09d9a6b25c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catagory`
--

CREATE TABLE `tbl_catagory` (
  `catid` int(11) NOT NULL,
  `catname` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_catagory`
--

INSERT INTO `tbl_catagory` (`catid`, `catname`) VALUES
(1, 'Fruit &amp; Nut Gifts'),
(2, 'Vegetables'),
(3, 'Fresh Berries'),
(4, 'Ocean Foods'),
(5, 'Butter &amp; Eggs'),
(6, 'Fastfood'),
(7, 'Fresh Onion');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `cmrid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productname` varchar(250) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_compare`
--

INSERT INTO `tbl_compare` (`id`, `cmrid`, `productid`, `productname`, `price`, `image`) VALUES
(16, 2, 7, 'Lorem Ipsum is simply', '120.00', 'uploads/b82d58b633.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `password`) VALUES
(1, 'rupom ehsan rupom', 'basundhara riverview hi', 'dhaka', 'Bangladesh', '1204', '01666392241', 'rupomehsan34@gamil.com', '698d51a19d8a121ce581499d7b701668');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cmrid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productname` varchar(250) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productid` int(11) NOT NULL,
  `productname` varchar(250) NOT NULL,
  `catid` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productid`, `productname`, `catid`, `brandid`, `body`, `price`, `image`, `type`) VALUES
(1, 'Organic 10 Assorted Flavors Jelly Beans, 5.5 Oz', 2, 2, '<p class=\"desc\">Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.</p>\r\n<div class=\"desc-expand\"><span class=\"title\">Organic Fresh Fruit</span>\r\n<ul class=\"list\">\r\n<li>100% real fruit ingredients</li>\r\n<li>100 fresh fruit bags individually wrapped</li>\r\n<li>Blending Eastern &amp; Western traditions, naturally</li>\r\n</ul>\r\n</div>', 85.00, 'uploads/683d48fe7c.jpg', 0),
(2, '13 Healing Powers of Lemons', 2, 2, '<p class=\"desc\">Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.</p>\r\n<div class=\"desc-expand\"><span class=\"title\">Organic Fresh Fruit</span>\r\n<ul class=\"list\">\r\n<li>100% real fruit ingredients</li>\r\n<li>100 fresh fruit bags individually wrapped</li>\r\n<li>Blending Eastern &amp; Western traditions, naturally</li>\r\n</ul>\r\n</div>', 80.56, 'uploads/ee06ac0e76.jpg', 0),
(3, 'Hot Chili Peppers Magnetic Salt', 2, 2, '<p class=\"desc\">Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.</p>\r\n<div class=\"desc-expand\"><span class=\"title\">Organic Fresh Fruit</span>\r\n<ul class=\"list\">\r\n<li>100% real fruit ingredients</li>\r\n<li>100 fresh fruit bags individually wrapped</li>\r\n<li>Blending Eastern &amp; Western traditions, naturally</li>\r\n</ul>\r\n</div>', 245.89, 'uploads/09d9a6b25c.jpg', 0),
(4, 'Passover Cauliflower Kugel', 2, 2, '<p class=\"desc\">Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.</p>\r\n<div class=\"desc-expand\"><span class=\"title\">Organic Fresh Fruit</span>\r\n<ul class=\"list\">\r\n<li>100% real fruit ingredients</li>\r\n<li>100 fresh fruit bags individually wrapped</li>\r\n<li>Blending Eastern &amp; Western traditions, naturally</li>\r\n</ul>\r\n</div>', 120.00, 'uploads/a3f335b6ba.jpg', 0),
(5, 'Lorem Ipsum is simply', 7, 2, '<p class=\"desc\">Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.</p>\r\n<div class=\"desc-expand\"><span class=\"title\">Organic Fresh Fruit</span>\r\n<ul class=\"list\">\r\n<li>100% real fruit ingredients</li>\r\n<li>100 fresh fruit bags individually wrapped</li>\r\n<li>Blending Eastern &amp; Western traditions, naturally</li>\r\n</ul>\r\n</div>', 120.00, 'uploads/ec8c722109.jpg', 0),
(6, 'samsukmgeluxy', 7, 2, '<p class=\"desc\">Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.</p>\r\n<div class=\"desc-expand\"><span class=\"title\">Organic Fresh Fruit</span>\r\n<ul class=\"list\">\r\n<li>100% real fruit ingredients</li>\r\n<li>100 fresh fruit bags individually wrapped</li>\r\n<li>Blending Eastern &amp; Western traditions, naturally</li>\r\n</ul>\r\n</div>', 120.00, 'uploads/c6162c3a49.jpg', 0),
(7, 'Lorem Ipsum is simply update', 6, 2, '<p class=\"desc\">Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.</p>\r\n<div class=\"desc-expand\"><span class=\"title\">Organic Fresh Fruit</span>\r\n<ul class=\"list\">\r\n<li>100% real fruit ingredients</li>\r\n<li>100 fresh fruit bags individually wrapped</li>\r\n<li>Blending Eastern &amp; Western traditions, naturally</li>\r\n</ul>\r\n</div>', 22222.00, 'uploads/c6edc21fc7.jpg', 0),
(8, 'Lorem Ipsum is simply update', 6, 2, '<p class=\"desc\">Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.</p>\r\n<div class=\"desc-expand\"><span class=\"title\">Organic Fresh Fruit</span>\r\n<ul class=\"list\">\r\n<li>100% real fruit ingredients</li>\r\n<li>100 fresh fruit bags individually wrapped</li>\r\n<li>Blending Eastern &amp; Western traditions, naturally</li>\r\n</ul>\r\n</div>', 22222.00, 'uploads/83a20a9bc6.jpg', 0),
(9, 'Lorem Ipsum is simply update', 5, 2, '<p class=\"desc\">Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.</p>\r\n<div class=\"desc-expand\"><span class=\"title\">Organic Fresh Fruit</span>\r\n<ul class=\"list\">\r\n<li>100% real fruit ingredients</li>\r\n<li>100 fresh fruit bags individually wrapped</li>\r\n<li>Blending Eastern &amp; Western traditions, naturally</li>\r\n</ul>\r\n</div>', 120.00, 'uploads/19a3666a73.jpg', 0),
(10, 'Lorem ipsum dolor', 5, 2, '<p class=\"desc\">Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.</p>\r\n<div class=\"desc-expand\"><span class=\"title\">Organic Fresh Fruit</span>\r\n<ul class=\"list\">\r\n<li>100% real fruit ingredients</li>\r\n<li>100 fresh fruit bags individually wrapped</li>\r\n<li>Blending Eastern &amp; Western traditions, naturally</li>\r\n</ul>\r\n</div>', 245.89, 'uploads/6b1d51fc8d.jpg', 0),
(11, 'Lorem Ipsum is simply update', 4, 2, '<p class=\"desc\">Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.</p>\r\n<div class=\"desc-expand\"><span class=\"title\">Organic Fresh Fruit</span>\r\n<ul class=\"list\">\r\n<li>100% real fruit ingredients</li>\r\n<li>100 fresh fruit bags individually wrapped</li>\r\n<li>Blending Eastern &amp; Western traditions, naturally</li>\r\n</ul>\r\n</div>', 120.00, 'uploads/1a4becee04.jpg', 0),
(12, 'Lorem Ipsum is simply update', 4, 2, '<p class=\"desc\">Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.</p>\r\n<div class=\"desc-expand\"><span class=\"title\">Organic Fresh Fruit</span>\r\n<ul class=\"list\">\r\n<li>100% real fruit ingredients</li>\r\n<li>100 fresh fruit bags individually wrapped</li>\r\n<li>Blending Eastern &amp; Western traditions, naturally</li>\r\n</ul>\r\n</div>', 245.89, 'uploads/d7c49a0901.jpg', 0),
(13, 'Lorem Ipsum is simply update', 3, 2, '<p class=\"desc\">Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.</p>\r\n<div class=\"desc-expand\"><span class=\"title\">Organic Fresh Fruit</span>\r\n<ul class=\"list\">\r\n<li>100% real fruit ingredients</li>\r\n<li>100 fresh fruit bags individually wrapped</li>\r\n<li>Blending Eastern &amp; Western traditions, naturally</li>\r\n</ul>\r\n</div>', 245.89, 'uploads/502ad6398b.jpg', 0),
(14, 'Lorem Ipsum is simply', 1, 2, '<p class=\"desc\">Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.</p>\r\n<div class=\"desc-expand\"><span class=\"title\">Organic Fresh Fruit</span>\r\n<ul class=\"list\">\r\n<li>100% real fruit ingredients</li>\r\n<li>100 fresh fruit bags individually wrapped</li>\r\n<li>Blending Eastern &amp; Western traditions, naturally</li>\r\n</ul>\r\n</div>', 245.89, 'uploads/028dc89c83.jpg', 0),
(15, 'Lorem Ipsum is simply', 1, 2, '<p class=\"desc\">Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.</p>\r\n<div class=\"desc-expand\"><span class=\"title\">Organic Fresh Fruit</span>\r\n<ul class=\"list\">\r\n<li>100% real fruit ingredients</li>\r\n<li>100 fresh fruit bags individually wrapped</li>\r\n<li>Blending Eastern &amp; Western traditions, naturally</li>\r\n</ul>\r\n</div>', 245.89, 'uploads/e3b50f301f.jpg', 1),
(16, 'Lorem Ipsum is simply', 3, 2, '<p class=\"desc\">Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.</p>\r\n<div class=\"desc-expand\"><span class=\"title\">Organic Fresh Fruit</span>\r\n<ul class=\"list\">\r\n<li>100% real fruit ingredients</li>\r\n<li>100 fresh fruit bags individually wrapped</li>\r\n<li>Blending Eastern &amp; Western traditions, naturally</li>\r\n</ul>\r\n</div>', 245.89, 'uploads/7614ff0d46.jpg', 1),
(17, 'Lorem Ipsum is simply', 4, 1, '<p class=\"desc\">Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.</p>\r\n<div class=\"desc-expand\"><span class=\"title\">Organic Fresh Fruit</span>\r\n<ul class=\"list\">\r\n<li>100% real fruit ingredients</li>\r\n<li>100 fresh fruit bags individually wrapped</li>\r\n<li>Blending Eastern &amp; Western traditions, naturally</li>\r\n</ul>\r\n</div>', 22222.00, 'uploads/e213d04780.jpg', 1),
(18, 'Lorem Ipsum is simply', 5, 2, '<p class=\"desc\">Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.</p>\r\n<div class=\"desc-expand\"><span class=\"title\">Organic Fresh Fruit</span>\r\n<ul class=\"list\">\r\n<li>100% real fruit ingredients</li>\r\n<li>100 fresh fruit bags individually wrapped</li>\r\n<li>Blending Eastern &amp; Western traditions, naturally</li>\r\n</ul>\r\n</div>', 120.00, 'uploads/9761f937d6.jpg', 1),
(19, 'Lorem Ipsum is simply', 6, 2, '<p class=\"desc\">Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.</p>\r\n<div class=\"desc-expand\"><span class=\"title\">Organic Fresh Fruit</span>\r\n<ul class=\"list\">\r\n<li>100% real fruit ingredients</li>\r\n<li>100 fresh fruit bags individually wrapped</li>\r\n<li>Blending Eastern &amp; Western traditions, naturally</li>\r\n</ul>\r\n</div>', 245.89, 'uploads/24b4913ccb.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderid` int(11) NOT NULL,
  `titleone` varchar(250) NOT NULL,
  `titletwo` varchar(250) NOT NULL,
  `titlethree` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderid`, `titleone`, `titletwo`, `titlethree`, `image`, `date`) VALUES
(1, 'Pomegranate update', 'Fresh Juice 100% Organic ', 'A blend of freshly squeezed green apple & fruits update', 'uploads/1723d05db7.jpg', '2020-08-26 09:28:14'),
(2, 'Pomegranate', 'Fresh Juice 100% Organic', 'A blend of freshly squeezed green apple & fruits', 'uploads/9d2cae80ba.png', '2020-08-26 07:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `fb` varchar(250) NOT NULL,
  `yt` varchar(250) NOT NULL,
  `tw` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `fb`, `yt`, `tw`) VALUES
(1, 'https://www.facebook.com/update', 'https://www.facebook.com/update', 'https://www.facebook.com/update');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_title_slogan`
--

CREATE TABLE `tbl_title_slogan` (
  `id` int(11) NOT NULL,
  `web_title` varchar(250) NOT NULL,
  `web_slogan` varchar(250) NOT NULL,
  `web_logo` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `hourse` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_title_slogan`
--

INSERT INTO `tbl_title_slogan` (`id`, `web_title`, `web_slogan`, `web_logo`, `address`, `phone`, `email`, `hourse`, `date`) VALUES
(1, 'fressh by', 'our-slogan update rew', 'uploads/bee3eb7e66.png', 'new patan dhka 1204', '01683392242', 'rupomehsan34@gamil.com', '7 Days a week from 10:00 am', '2020-08-29 05:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wlist`
--

CREATE TABLE `tbl_wlist` (
  `id` int(11) NOT NULL,
  `cmrid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productname` varchar(250) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wlist`
--

INSERT INTO `tbl_wlist` (`id`, `cmrid`, `productid`, `productname`, `price`, `image`) VALUES
(3, 1, 12, 'Lorem Ipsum is simply update', '245.89', 'uploads/d7c49a0901.jpg'),
(4, 1, 16, 'Lorem Ipsum is simply', '245.89', 'uploads/7614ff0d46.jpg'),
(5, 0, 16, 'Lorem Ipsum is simply', '245.89', 'uploads/7614ff0d46.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandid`);

--
-- Indexes for table `tbl_card`
--
ALTER TABLE `tbl_card`
  ADD PRIMARY KEY (`cardid`);

--
-- Indexes for table `tbl_catagory`
--
ALTER TABLE `tbl_catagory`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderid`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_title_slogan`
--
ALTER TABLE `tbl_title_slogan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_card`
--
ALTER TABLE `tbl_card`
  MODIFY `cardid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_catagory`
--
ALTER TABLE `tbl_catagory`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_title_slogan`
--
ALTER TABLE `tbl_title_slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
