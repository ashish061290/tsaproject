-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 02:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bit7`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `mobile` varchar(156) NOT NULL,
  `logo` varchar(256) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` varchar(156) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `name`, `password`, `mobile`, `logo`, `status`, `created_at`) VALUES
(1, 'ashish.bit6', 'TSA Project', '123456', '+91-755-420-5114', 'http://localhost/bit7/storage/uploads/Logo/Img1683936548.png', 1, '2023-05-13 05:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` char(50) NOT NULL,
  `title` varchar(256) NOT NULL,
  `category_img` varchar(100) NOT NULL,
  `cat_cover_img` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `img_name` text NOT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(156) DEFAULT NULL,
  `logo` varchar(256) DEFAULT NULL,
  `created_at` varchar(156) NOT NULL,
  `status` int(11) NOT NULL,
  `title` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `logo`, `created_at`, `status`, `title`) VALUES
(1, 'ashihs', 'http://localhost/bit7/storage/uploads/Client/Img1683869618.jpg', '2023-05-12 11:03:38', 0, 'aad');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(156) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(156) NOT NULL,
  `mobile1` varchar(156) NOT NULL,
  `mobile2` varchar(156) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `address`, `email`, `mobile1`, `mobile2`, `status`) VALUES
(1, 'ashish', '33/6, ‘H’ Sector, Industrial Area,  Govindpura, Bhopal – 462 023, M.P. (India)', 'tsaprojects@gmail.com', '+91-755-420-5114', '3123123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `mobile` varchar(156) NOT NULL,
  `service` varchar(256) NOT NULL,
  `message` text NOT NULL,
  `created_at` varchar(156) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure`
--

CREATE TABLE `infrastructure` (
  `id` int(11) NOT NULL,
  `infrastructure_name` varchar(256) NOT NULL,
  `infrastructure_desc` text NOT NULL,
  `infrastructure_img` varchar(256) NOT NULL,
  `img_name` varchar(256) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `infrastructure`
--

INSERT INTO `infrastructure` (`id`, `infrastructure_name`, `infrastructure_desc`, `infrastructure_img`, `img_name`, `status`) VALUES
(1, 'name', 'descr', 'http://localhost/bit7/storage/uploads/Infra/Img1683338085.jpg', 'Img1683338085.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_cat` char(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `vendor_id` int(11) NOT NULL DEFAULT 0 COMMENT '0->admin',
  `product_ldc` text NOT NULL,
  `product_img` varchar(100) NOT NULL,
  `img_name` varchar(256) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `descr` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` varchar(156) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `title`, `descr`, `status`, `created_at`) VALUES
(1, 'title', 'descr1234                                    ', 1, '2023-05-11 07:43:14');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `project_name` varchar(256) NOT NULL,
  `client_name` varchar(256) NOT NULL,
  `project_desc` text NOT NULL,
  `project_img` varchar(256) NOT NULL,
  `img_name` varchar(256) NOT NULL,
  `project_url` varchar(256) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_name`, `client_name`, `project_desc`, `project_img`, `img_name`, `project_url`, `status`) VALUES
(1, 'abcd2', 'client1', 'abcd2', 'http://localhost/bit7/storage/uploads/Project/Img1683340158.jpg', 'Img1683340158.jpg', 'http://google.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quality`
--

CREATE TABLE `quality` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `descr` text NOT NULL,
  `created_at` varchar(156) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quality`
--

INSERT INTO `quality` (`id`, `title`, `descr`, `created_at`, `status`) VALUES
(1, 'title', 'descrhhh                           ', '2023-05-12 09:43:49', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infrastructure`
--
ALTER TABLE `infrastructure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quality`
--
ALTER TABLE `quality`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infrastructure`
--
ALTER TABLE `infrastructure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quality`
--
ALTER TABLE `quality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
