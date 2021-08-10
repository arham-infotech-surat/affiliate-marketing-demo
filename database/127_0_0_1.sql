-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2021 at 11:15 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `affiliate_db`
--
DROP DATABASE IF EXISTS `affiliate_db`;
CREATE DATABASE IF NOT EXISTS `affiliate_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `affiliate_db`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(20) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_pwd` varchar(20) NOT NULL,
  `admin_phno` varchar(12) NOT NULL,
  `is_create` enum('0','1') NOT NULL,
  `is_edit` enum('0','1') NOT NULL,
  `is_delete` enum('0','1') NOT NULL,
  `is_read` enum('0','1') NOT NULL,
  `admin_status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_email` (`admin_email`),
  UNIQUE KEY `admin_phno` (`admin_phno`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `admin_name`, `admin_email`, `admin_pwd`, `admin_phno`, `is_create`, `is_edit`, `is_delete`, `is_read`, `admin_status`) VALUES
(1, 'bhavik', 'bhavik@gmail.com', '12345', '7894561230', '1', '1', '1', '1', '0'),
(10, 'test', 'test@gmail.com', '12345', '7412589630', '1', '0', '0', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brands`
--

DROP TABLE IF EXISTS `tbl_brands`;
CREATE TABLE IF NOT EXISTS `tbl_brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(30) NOT NULL,
  `brand_img` text NOT NULL,
  `brand_status` enum('0','1') NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brands`
--

INSERT INTO `tbl_brands` (`brand_id`, `brand_name`, `brand_img`, `brand_status`) VALUES
(5, 'jio', 'avatar2.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(20) NOT NULL,
  `cat_img` text NOT NULL,
  `cat_status` enum('0','1') NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_img`, `cat_status`) VALUES
(9, 'Fashion', 'img1.png', '1'),
(10, 'GROCERY', 'img4.png', '1'),
(11, 'BEAUTY & PERSONAL CA', 'img3.png', '1'),
(12, 'HEALTH & MEDICINE', 'img5.png', '1'),
(13, 'FOOD DELIVERY', 'img7.png', '1'),
(14, 'RECHARGE & BILL PAYM', 'img6.png', '1'),
(15, 'INDEPENDENCE DAY OFF', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logo`
--

DROP TABLE IF EXISTS `tbl_logo`;
CREATE TABLE IF NOT EXISTS `tbl_logo` (
  `logo_id` int(11) NOT NULL AUTO_INCREMENT,
  `logo_tittle` varchar(20) NOT NULL,
  `logo_img` text NOT NULL,
  PRIMARY KEY (`logo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_logo`
--

INSERT INTO `tbl_logo` (`logo_id`, `logo_tittle`, `logo_img`) VALUES
(1, 'testss', 'logo-light.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(30) NOT NULL,
  `product_affiliate_link` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_img` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_current_price` varchar(20) NOT NULL,
  `product_previous_price` varchar(20) NOT NULL,
  `product_date_added` date NOT NULL,
  `product_updated_date` date NOT NULL,
  `product_status` enum('0','1') NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_affiliate_link`, `cat_id`, `brand_id`, `product_img`, `product_desc`, `product_current_price`, `product_previous_price`, `product_date_added`, `product_updated_date`, `product_status`) VALUES
(5, 'test', 'https://cashkaro.com/', 9, 5, '', '<p><strong>About this Offer</strong></p>\n\n<ul>\n	<li>Great Freedom Festival (5th-9th August): Upto 40% Off on Mobiles from Amazon</li>\n	<li>Select from a range of latest smartphones including OnePlus Nord 2, Redmi Note 10, Apple iPhone 12 Mini and more</li>\n	<li>Earn Upto 0.5% CashKaro Rewards on Mobiles</li>\n</ul>\n\n<hr />\n<p><strong>Important Information</strong></p>\n\n<ul>\n	<li>Add Products to your cart/wishlist only after clicking out from CashKaro</li>\n</ul>\n\n<hr />\n<p><strong>Extra Discount</strong></p>\n\n<ul>\n	<li>10% Instant Discount with SBI Credit Card on Orders over Rs 5000 | Max. Discount: Rs 1750</li>\n	<li>Get Rs 50 CashKaro Rewards on your first ever transaction on Amazon via CashKaro on orders over Rs 150</li>\n</ul>\n\n<hr />\n<p><strong>Increased CashKaro Rewards for Great Freedom Festival</strong></p>\n\n<table border=\"~1~\" style=\"width:100%\">\n	<tbody>\n		<tr>\n			<th>Category</th>\n			<th>CashKaro Rewards</th>\n		</tr>\n		<tr>\n			<td>&gt; Clothing, Luggage, Watches, Footwear<br />\n			(excluding Smartwatches)<br />\n			&gt; Beauty and Luxury Beauty</td>\n			<td>6%</td>\n		</tr>\n		<tr>\n			<td>&gt; Kitchen Appliances and Products | Dining</td>\n			<td>3%</td>\n		</tr>\n		<tr>\n			<td>&gt; Health and Personal Care<br />\n			&gt; Small Home Appliances and Products<br />\n			(excluding Home Entertainment and Home Improvement)<br />\n			&gt; Sports<br />\n			&gt; Jewellery (excluding Gold Coins, Gold Bars, Silver Coins<br />\n			and Precious Jewellery)</td>\n			<td>2.5%</td>\n		</tr>\n		<tr>\n			<td>&gt; Laptops, PCs, iPads and Tabs</td>\n			<td>2%</td>\n		</tr>\n		<tr>\n			<td>&gt; All Mobile Phones (except those mentioned below)</td>\n			<td>0.5%</td>\n		</tr>\n		<tr>\n			<td>&gt; Redmi 9, Redmi 9A, Redmi Note 9,Redmi 9 Power series,<br />\n			Redmi Note 10 Series (once per user per month)</td>\n			<td>0.25%</td>\n		</tr>\n		<tr>\n			<td>&gt; Samsung M Series | All Apple iPhones except iPhone 12 Mini |<br />\n			Mi 11 Ultra, Redmi Note 10T 5G |<br />\n			Redmi New Launches since July 2021</td>\n			<td>0%</td>\n		</tr>\n		<tr>\n			<td>&gt; Amazon Pantry | Grocery | Fresh | Large Appliances | Electronics |<br />\n			Personal Care Appliances | Televisions | Furniture | Books | Baby |<br />\n			Amazon Prime Membership | Categories not mentioned</td>\n			<td>0%</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&nbsp;</p>\n\n<hr />\n<p><strong>How to get this offer?</strong></p>\n\n<ul>\n	<li>Click on this Orange Button and Visit Amazon</li>\n	<li>Shop as usual in the same session</li>\n	<li>Rewards will track in your CashKaro account</li>\n</ul>\n', '1000', '999', '2021-08-06', '2021-08-07', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

DROP TABLE IF EXISTS `tbl_slider`;
CREATE TABLE IF NOT EXISTS `tbl_slider` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_img` text NOT NULL,
  `slider_title` varchar(50) NOT NULL,
  `slider_name` text NOT NULL,
  `slider_link` text NOT NULL,
  `slider_desc` text NOT NULL,
  `date_added` date NOT NULL,
  `date_updated` date DEFAULT NULL,
  `slider_status` enum('0','1') NOT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_img`, `slider_title`, `slider_name`, `slider_link`, `slider_desc`, `date_added`, `date_updated`, `slider_status`) VALUES
(5, 'img04.jpg', 'Today\'s Amazon Offerss', 'Great Freedom Festival (5th-9th August): Upto 80% Off + 10% SBI Off + Upto 6% CashKaro Rewards', 'https://cashkaro.com/deals/PPS1-amazon-deal-card-freedomfestival-05082021?sid=1999&pid=PPS1-amazon-deal-card-freedomfestival-05082021', '<p><strong>About this Offer</strong></p>\r\n\r\n<ul>\r\n	<li>Get 50-80% Off on brands like Aeropostale, Roadster, UCB and many more during Myntra&#39;s Right to Fashion Sale</li>\r\n	<li>Select from 600000+ Styles for Men and Women</li>\r\n	<li>Earn Upto 6% CashKaro Cashback on top</li>\r\n</ul>\r\n\r\n<hr />\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>CashKaro Cashback Terms</strong></p>\r\n\r\n<ul>\r\n	<li>New Users of Myntra: 6%</li>\r\n	<li>Existing Users of Myntra: 3%</li>\r\n</ul>\r\n\r\n<hr />\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>ICICI and Kotak Bank Offer</strong></p>\r\n\r\n<ul>\r\n	<li>10% Instant Discount on payment with ICICI Bank / Kotak Bank Credit Card and Dedit Card</li>\r\n	<li>Minimum Transaction value of Rs 3000</li>\r\n	<li>Maximum Discount of Rs 1000</li>\r\n</ul>\r\n\r\n<hr />\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>How to get this offer?</strong></p>\r\n\r\n<ul>\r\n	<li>Click on this Orange button and visit Myntra</li>\r\n	<li>Shop there as normal</li>\r\n	<li>Cashback will be added to your CashKaro account</li>\r\n</ul>\r\n\r\n<hr />\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Important Information</strong></p>\r\n\r\n<ul>\r\n	<li>Delivery Fee: Rs 149 for Orders below Rs 799</li>\r\n</ul>\r\n', '2021-08-09', '2021-08-09', '1'),
(6, 'img05.jpg', 'Today\'s Myntra Offers', 'Great Freedom Festival (5th-9th August): Upto 80% Off + 10% SBI Off + Upto 6% CashKaro Rewards', 'https://cashkaro.com/deals/PPS1-amazon-deal-card-f', '<p><strong>About this Offer</strong></p>\r\n\r\n<ul>\r\n	<li>Get 50-80% Off on brands like Aeropostale, Roadster, UCB and many more during Myntra&#39;s Right to Fashion Sale</li>\r\n	<li>Select from 600000+ Styles for Men and Women</li>\r\n	<li>Earn Upto 6% CashKaro Cashback on top</li>\r\n</ul>\r\n\r\n<p><strong>CashKaro Cashback Terms</strong></p>\r\n\r\n<ul>\r\n	<li>New Users of Myntra: 6%</li>\r\n	<li>Existing Users of Myntra: 3%</li>\r\n</ul>\r\n\r\n<p><strong>ICICI and Kotak Bank Offer</strong></p>\r\n\r\n<ul>\r\n	<li>10% Instant Discount on payment with ICICI Bank / Kotak Bank Credit Card and Dedit Card</li>\r\n	<li>Minimum Transaction value of Rs 3000</li>\r\n	<li>Maximum Discount of Rs 1000</li>\r\n</ul>\r\n\r\n<p><strong>How to get this offer?</strong></p>\r\n\r\n<ul>\r\n	<li>Click on this Orange button and visit Myntra</li>\r\n	<li>Shop there as normal</li>\r\n	<li>Cashback will be added to your CashKaro account</li>\r\n</ul>\r\n\r\n<p><strong>Important Information</strong></p>\r\n\r\n<ul>\r\n	<li>Delivery Fee: Rs 149 for Orders below Rs 799</li>\r\n</ul>\r\n', '2021-08-09', '2021-08-09', '1'),
(7, 'img06.jpg', 'Today\'s AJIO Offers', 'Great Freedom Festival (5th-9th August): Upto 80% Off + 10% SBI Off + Upto 6% CashKaro Rewards', 'https://cashkaro.com/deals/PPS1-amazon-deal-card-f', '<p><strong>About this Offer</strong></p>\r\n\r\n<ul>\r\n	<li>Get 50-80% Off on brands like Aeropostale, Roadster, UCB and many more during Myntra&#39;s Right to Fashion Sale</li>\r\n	<li>Select from 600000+ Styles for Men and Women</li>\r\n	<li>Earn Upto 6% CashKaro Cashback on top</li>\r\n</ul>\r\n\r\n<p><strong>CashKaro Cashback Terms</strong></p>\r\n\r\n<ul>\r\n	<li>New Users of Myntra: 6%</li>\r\n	<li>Existing Users of Myntra: 3%</li>\r\n</ul>\r\n\r\n<p><strong>ICICI and Kotak Bank Offer</strong></p>\r\n\r\n<ul>\r\n	<li>10% Instant Discount on payment with ICICI Bank / Kotak Bank Credit Card and Dedit Card</li>\r\n	<li>Minimum Transaction value of Rs 3000</li>\r\n	<li>Maximum Discount of Rs 1000</li>\r\n</ul>\r\n\r\n<p><strong>How to get this offer?</strong></p>\r\n\r\n<ul>\r\n	<li>Click on this Orange button and visit Myntra</li>\r\n	<li>Shop there as normal</li>\r\n	<li>Cashback will be added to your CashKaro account</li>\r\n</ul>\r\n\r\n<p><strong>Important Information</strong></p>\r\n\r\n<ul>\r\n	<li>Delivery Fee: Rs 149 for Orders below Rs 799</li>\r\n</ul>\r\n', '2021-08-09', '2021-08-09', '1'),
(8, 'img11.jpg', 'Today\'s TATA CLiQ Offers', 'Great Freedom Festival (5th-9th August): Upto 80% Off + 10% SBI Off + Upto 6% CashKaro Rewards', 'https://cashkaro.com/deals/PPS1-amazon-deal-card-f', '<p><strong>About this Offer</strong></p>\r\n\r\n<ul>\r\n	<li>Get 50-80% Off on brands like Aeropostale, Roadster, UCB and many more during Myntra&#39;s Right to Fashion Sale</li>\r\n	<li>Select from 600000+ Styles for Men and Women</li>\r\n	<li>Earn Upto 6% CashKaro Cashback on top</li>\r\n</ul>\r\n\r\n<p><strong>CashKaro Cashback Terms</strong></p>\r\n\r\n<ul>\r\n	<li>New Users of Myntra: 6%</li>\r\n	<li>Existing Users of Myntra: 3%</li>\r\n</ul>\r\n\r\n<p><strong>ICICI and Kotak Bank Offer</strong></p>\r\n\r\n<ul>\r\n	<li>10% Instant Discount on payment with ICICI Bank / Kotak Bank Credit Card and Dedit Card</li>\r\n	<li>Minimum Transaction value of Rs 3000</li>\r\n	<li>Maximum Discount of Rs 1000</li>\r\n</ul>\r\n\r\n<p><strong>How to get this offer?</strong></p>\r\n\r\n<ul>\r\n	<li>Click on this Orange button and visit Myntra</li>\r\n	<li>Shop there as normal</li>\r\n	<li>Cashback will be added to your CashKaro account</li>\r\n</ul>\r\n\r\n<p><strong>Important Information</strong></p>\r\n\r\n<ul>\r\n	<li>Delivery Fee: Rs 149 for Orders below Rs 799</li>\r\n</ul>\r\n', '2021-08-09', '2021-08-10', '1'),
(9, 'img12.jpg', 'Today\'s ZIVAME Offers', '', 'https://cashkaro.com/deals/PPS1-amazon-deal-card-f', '<p><strong>About this Offer</strong></p>  <ul> 	<li>Get 50-80% Off on brands like Aeropostale, Roadster, UCB and many more during Myntra&#39;s Right to Fashion Sale</li> 	<li>Select from 600000+ Styles for Men and Women</li> 	<li>Earn Upto 6% CashKaro Cashback on top</li> </ul>  <p><strong>CashKaro Cashback Terms</strong></p>  <ul> 	<li>New Users of Myntra: 6%</li> 	<li>Existing Users of Myntra: 3%</li> </ul>  <p><strong>ICICI and Kotak Bank Offer</strong></p>  <ul> 	<li>10% Instant Discount on payment with ICICI Bank / Kotak Bank Credit Card and Dedit Card</li> 	<li>Minimum Transaction value of Rs 3000</li> 	<li>Maximum Discount of Rs 1000</li> </ul>  <p><strong>How to get this offer?</strong></p>  <ul> 	<li>Click on this Orange button and visit Myntra</li> 	<li>Shop there as normal</li> 	<li>Cashback will be added to your CashKaro account</li> </ul>  <p><strong>Important Information</strong></p>  <ul> 	<li>Delivery Fee: Rs 149 for Orders below Rs 799</li> </ul>', '2021-08-09', NULL, '1'),
(10, 'logo.png', 'Today\'s Flipcart Offers', '', 'https://cashkaro.com/deals/PPS1-amazon-deal-card-freedomfestival-05082021', '<p><strong>About this Offer</strong></p>\r\n\r\n<ul>\r\n	<li>Get 50-80% Off on brands like Aeropostale, Roadster, UCB and many more during Myntra&#39;s Right to Fashion Sale</li>\r\n	<li>Select from 600000+ Styles for Men and Women</li>\r\n	<li>Earn Upto 6% CashKaro Cashback on top</li>\r\n</ul>\r\n\r\n<p><strong>CashKaro Cashback Terms</strong></p>\r\n\r\n<ul>\r\n	<li>New Users of Myntra: 6%</li>\r\n	<li>Existing Users of Myntra: 3%</li>\r\n</ul>\r\n\r\n<p><strong>ICICI and Kotak Bank Offer</strong></p>\r\n\r\n<ul>\r\n	<li>10% Instant Discount on payment with ICICI Bank / Kotak Bank Credit Card and Dedit Card</li>\r\n	<li>Minimum Transaction value of Rs 3000</li>\r\n	<li>Maximum Discount of Rs 1000</li>\r\n</ul>\r\n\r\n<p><strong>How to get this offer?</strong></p>\r\n\r\n<ul>\r\n	<li>Click on this Orange button and visit Myntra</li>\r\n	<li>Shop there as normal</li>\r\n	<li>Cashback will be added to your CashKaro account</li>\r\n</ul>\r\n\r\n<p><strong>Important Information</strong></p>\r\n\r\n<ul>\r\n	<li>Delivery Fee: Rs 149 for Orders below Rs 799</li>\r\n</ul>\r\n', '2021-08-09', '2021-08-09', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stores`
--

DROP TABLE IF EXISTS `tbl_stores`;
CREATE TABLE IF NOT EXISTS `tbl_stores` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_name` varchar(30) NOT NULL,
  `store_logo` text NOT NULL,
  `store_status` enum('0','1') NOT NULL,
  PRIMARY KEY (`store_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
