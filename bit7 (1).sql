-- --------------------------------------------------------
-- Host:                         174.141.238.238
-- Server version:               10.6.5-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for tsadb
CREATE DATABASE IF NOT EXISTS `tsadb` /*!40100 DEFAULT CHARACTER SET utf8mb3 */;
USE `tsadb`;

-- Dumping structure for table tsadb.about_us
CREATE TABLE IF NOT EXISTS `about_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `status` int(15) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table tsadb.about_us: ~0 rows (approximately)
INSERT INTO `about_us` (`id`, `page_name`, `description`, `status`) VALUES
	(1, 'profile', '<p><strong>I . Employment Record ( Major ):</strong></p>\r\n\r\n<p><strong>2004 till date ( Mostly working as consultant / advisor on agriculture &amp; livelihood issues and on e-Governance projects in MP, India &nbsp;)</strong></p>\r\n\r\n<ul>\r\n	<li>I.T Consultant to Department of Agriculture ( State of M.P ) on their State-wide project &amp; portal; the responsibility includes MIS development for the whole state covering about 300 offices &amp; 11,000 staff &amp; providing information to 6 million farmers ; total budget is Rs 70 million for a period of less than one year</li>\r\n	<li>I.T Consultant to MP Agriculture Marketing Board ( State of M.P ) ; the role includes improving the quality of present MIS, adding better monitoring &amp; reporting system, improving the revenues of the Board by better management through IT; it is a BOOT project with annual inflow to the project in the order of Rs 150 million when it is complete</li>\r\n</ul>\r\n\r\n<p><strong>2000 to 2003 ( Mostly worked with Software Companies as Consultant )</strong></p>\r\n\r\n<ul>\r\n	<li>Consultant to IIS ( a Software Co. ) , Durham , North Carolina (USA ) working on a e-Governance project for department of revenue. Project cost was about US $ 5 million</li>\r\n	<li>Consultant to Nucleus Software , New Delhi working on a software project for City Bank, Singapore &amp; Standard Chartered Bank, Singapore</li>\r\n</ul>\r\n', 1);

-- Dumping structure for table tsadb.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `mobile` varchar(156) NOT NULL,
  `logo` varchar(256) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` varchar(156) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tsadb.admin: ~1 rows (approximately)
INSERT INTO `admin` (`admin_id`, `username`, `name`, `password`, `mobile`, `logo`, `status`, `created_at`) VALUES
	(1, 'ashish.bit6', 'TSA Project', '123456', '+91-755-420-5114', 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Logo/Img1683936548.png', 1, '2023-05-13 05:39:08');

-- Dumping structure for table tsadb.category
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` char(50) NOT NULL,
  `title` varchar(256) NOT NULL,
  `category_img` varchar(100) DEFAULT NULL,
  `cat_cover_img` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `img_name` text NOT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 1,
  `priority` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table tsadb.category: ~1 rows (approximately)
INSERT INTO `category` (`category_id`, `category_name`, `title`, `category_img`, `cat_cover_img`, `status`, `img_name`, `delete_status`, `priority`) VALUES
	(7, 'Condensors', '', 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Category/Img1684294380.png', NULL, 1, 'Img1684294380.png', 1, 5),
	(8, 'Motor & generator shell', '', 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Category/Img1684294453.png', NULL, 1, 'Img1684294453.png', 1, 2),
	(9, 'Cooler', '', 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Category/Img1684294587.png', NULL, 1, 'Img1684294587.png', 1, 3),
	(10, 'Hydro components', '', 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Category/Img1684294662.png', NULL, 1, 'Img1684294662.png', 1, 4),
	(11, 'Heater Mchinary', '', 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Category/Img1684295540.png', NULL, 1, 'Img1684295540.png', 1, 9);

-- Dumping structure for table tsadb.clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(156) DEFAULT NULL,
  `logo` varchar(256) DEFAULT NULL,
  `created_at` varchar(156) NOT NULL,
  `status` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tsadb.clients: ~1 rows (approximately)
INSERT INTO `clients` (`id`, `name`, `logo`, `created_at`, `status`, `title`) VALUES
	(1, 'Eicher', 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Client/Img1684297380.jpg', '2023-05-12 11:03:38', 1, 'eicher'),
	(2, 'Alstom', 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Client/Img1684297421.jpg', '2023-05-17 09:53:41', 1, 'alstom'),
	(3, 'HEG', 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Client/Img1684297446.jpg', '2023-05-17 09:54:06', 1, 'heg'),
	(4, 'TBEA', 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Client/Img1684297465.jpg', '2023-05-17 09:54:25', 1, 'tbea'),
	(5, 'ANDRITZ hydro', 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Client/Img1684297516.jpg', '2023-05-17 09:55:16', 1, 'andritz-hydro'),
	(6, 'HITACHI', 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Client/Img1684297530.jpg', '2023-05-17 09:55:30', 1, 'hitachi'),
	(7, 'Indian Railways', 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Client/Img1684297560.jpg', '2023-05-17 09:56:00', 1, 'indian-reailways'),
	(8, 'TMEIC', 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Client/Img1684297585.jpg', '2023-05-17 09:56:25', 1, 'tmeic drive industry'),
	(9, 'BHEL', 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Client/Img1684297605.jpg', '2023-05-17 09:56:45', 1, 'bhel'),
	(10, 'SIEMENS', 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Client/Img1684297625.jpg', '2023-05-17 09:57:05', 1, 'siemens'),
	(11, 'HAVELLS', 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Client/Img1684297651.jpg', '2023-05-17 09:57:31', 1, 'havells'),
	(12, 'CG POWER', 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Client/Img1684297677.jpg', '2023-05-17 09:57:57', 1, 'cg-power'),
	(13, 'BOMBARDIER', 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Client/Img1684297718.jpg', '2023-05-17 09:58:38', 1, 'bombardier'),
	(14, 'FORBES', 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Client/Img1684297732.jpg', '2023-05-17 09:58:52', 1, 'forbes');

-- Dumping structure for table tsadb.contact
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(156) NOT NULL DEFAULT '',
  `email` varchar(256) NOT NULL DEFAULT '',
  `service` varchar(256) NOT NULL DEFAULT '',
  `mobile` varchar(256) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table tsadb.contact: ~0 rows (approximately)
INSERT INTO `contact` (`id`, `name`, `email`, `service`, `mobile`, `message`) VALUES
	(1, 'ashish', 'ashish.tech1010@gmail.com', 'Constraction Of Engineering', '7509575564', 'adds');

-- Dumping structure for table tsadb.contactus
CREATE TABLE IF NOT EXISTS `contactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(156) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(156) NOT NULL,
  `mobile1` varchar(156) NOT NULL,
  `mobile2` varchar(156) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tsadb.contactus: ~1 rows (approximately)
INSERT INTO `contactus` (`id`, `name`, `address`, `email`, `mobile1`, `mobile2`, `status`) VALUES
	(1, 'ashish', '33/6, ‘H’ Sector, Industrial Area,  Govindpura, Bhopal – 462 023, M.P. (India)', 'tsaprojects@gmail.com', '+91-755-420-5114', '3123123', 1);

-- Dumping structure for table tsadb.enquiry
CREATE TABLE IF NOT EXISTS `enquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL DEFAULT '',
  `email` varchar(256) NOT NULL,
  `mobile` varchar(156) NOT NULL,
  `service` varchar(256) NOT NULL,
  `message` text NOT NULL,
  `created_at` varchar(156) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tsadb.enquiry: ~2 rows (approximately)
INSERT INTO `enquiry` (`id`, `name`, `email`, `mobile`, `service`, `message`, `created_at`, `status`) VALUES
	(1, '0', 'mukeshpachauri4@gmail.com', '7509575564', 'Constraction Of Engineering', 'adad', '', 1),
	(2, '0', 'ashish.tech1010@gmail.com', '7509575564', 'Constraction Of Engineering', 'aasd', '', 1);

-- Dumping structure for table tsadb.infrastructure
CREATE TABLE IF NOT EXISTS `infrastructure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `infrastructure_name` varchar(256) NOT NULL,
  `infrastructure_desc` text NOT NULL,
  `infrastructure_img` varchar(256) NOT NULL,
  `img_name` varchar(256) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tsadb.infrastructure: ~2 rows (approximately)
INSERT INTO `infrastructure` (`id`, `infrastructure_name`, `infrastructure_desc`, `infrastructure_img`, `img_name`, `status`) VALUES
	(1, 'Project Infrastructure', '<table align="left" border="0" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Area of Land</strong></td>\r\n			<td><strong>30000 Sq. Ft.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Administrative Block</strong></td>\r\n			<td><strong>1500 Sq. Ft.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Workshop</strong></td>\r\n			<td><strong>25000 Sq. Ft.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Uncovered</strong></td>\r\n			<td><strong>2500 Sq. Ft.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Green Zone</strong></td>\r\n			<td><strong>1000 Sq. Ft.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>T-Slotted Bed Plates</strong></td>\r\n			<td><strong>1500 X 4000 - 4 Nos.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Drilling Capacity</strong></td>\r\n			<td><strong>65 Mm Core</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Power Generation Capacity</strong></td>\r\n			<td><strong>45 HP</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Rolling, Bending, Shearing</strong></td>\r\n			<td><strong>Available</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Sand Blasting (SA 2 &frac12;) &amp; Hot Dip Galvanizing</strong></td>\r\n			<td><strong>Available</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Painting</strong></td>\r\n			<td><strong>In-House</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Infra/Img1684815929.jpg', 'Img1684815929.jpg', 1),
	(2, 'other', '<ul>\r\n	<li><strong>Bay Size: 35 Ft (H) x 55 Ft (W) x 210 Ft (L)</strong></li>\r\n	<li><strong>Material Handling Facility</strong></li>\r\n	<li><strong>10 MT Overhead Cranes &ndash; 01 No.</strong></li>\r\n	<li><strong>05 MT Overhead Cranes &ndash; 02 Nos.</strong></li>\r\n	<li><strong>Material Transfer Between Bays Is Accomplished By Railed Trolley (Manual) Of Capacity 05 MT</strong></li>\r\n</ul>\r\n', 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Infra/Img1685417609.jpg', 'Img1685417609.jpg', 1);

-- Dumping structure for table tsadb.products
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `product_name` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `priority` int(11) NOT NULL DEFAULT 0,
  `product_img` varchar(100) NOT NULL,
  `img_name` varchar(256) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `product_ldc` text DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `fk1` (`category_id`),
  CONSTRAINT `fk1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table tsadb.products: ~3 rows (approximately)
INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `title`, `priority`, `product_img`, `img_name`, `status`, `product_ldc`) VALUES
	(9, 10, 'Hydro components', 'Hydro-components', 5, 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Products/Img1684295687.jpeg', 'Img1684295687.jpeg', 1, ''),
	(11, 8, 'Motor & generator shell', 'Motor-&-generator-shell', 8, 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Products/Img1684295814.jpeg', 'Img1684295814.jpeg', 1, ''),
	(13, 8, 'Flask Tank', 'Flask-Tank', 4, 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Products/Img1684297124.jpeg', 'Img1684297124.jpeg', 1, ''),
	(14, 9, 'Cooler housing assembly', 'Cooler-housing-assembly', 3, 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Products/Img1684297165.jpeg', 'Img1684297165.jpeg', 1, ''),
	(15, 11, 'LP & HP heater', 'LP-&-HP-heater', 7, 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Products/Img1684297191.jpeg', 'Img1684297191.jpeg', 1, ''),
	(16, 8, 'Side cover assembly', 'Side-cover-assembly', 2, 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Products/Img1684297243.jpeg', 'Img1684297243.jpeg', 1, ''),
	(17, 7, 'Compressor + shell & tube cooler', 'Compressor-+-shell-&-tube-cooler', 1, 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Products/Img1684297276.jpeg', 'Img1684297276.jpeg', 1, '<p>yyyy</p>\r\n');

-- Dumping structure for table tsadb.profiles
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `descr` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` varchar(156) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tsadb.profiles: ~1 rows (approximately)
INSERT INTO `profiles` (`id`, `title`, `descr`, `status`, `created_at`) VALUES
	(1, 'title', 'descr1234                                    ', 1, '2023-05-11 07:43:14');

-- Dumping structure for table tsadb.project
CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(256) NOT NULL,
  `client_name` varchar(256) NOT NULL,
  `project_desc` text NOT NULL,
  `project_img` varchar(256) NOT NULL,
  `img_name` varchar(256) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tsadb.project: ~1 rows (approximately)
INSERT INTO `project` (`id`, `project_name`, `client_name`, `project_desc`, `project_img`, `img_name`, `status`) VALUES
	(1, 'abcd2', 'client1', '<p>abcd2</p>\r\n', 'https://www.bit7informatics.com/ComnFTP/Ashish/TSADemo/storage/uploads/Project/Img1684905672.jpeg', 'Img1684905672.jpeg', 1);

-- Dumping structure for table tsadb.quality
CREATE TABLE IF NOT EXISTS `quality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `descr` text NOT NULL,
  `created_at` varchar(156) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tsadb.quality: ~1 rows (approximately)
INSERT INTO `quality` (`id`, `title`, `descr`, `created_at`, `status`) VALUES
	(1, 'title', 'descrhhh                           ', '2023-05-12 09:43:49', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
