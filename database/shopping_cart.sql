-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2020 at 01:12 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `pin_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`, `user_level`, `pin_no`) VALUES
(1, 'shopping', 'ec7117851c0e5dbaad4effdb7cd17c050cea88cb', 1, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `created` varchar(200) NOT NULL,
  `modified` varchar(200) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `created`, `modified`, `status`) VALUES
(1, 'Shri nagar colony', '', 0, '', '2020-05-30 15:32:10', '2020-05-30 15:32:10', 0),
(2, 'Shri nagar colony', '', 0, '', '2020-05-30 15:37:44', '2020-05-30 15:37:44', 0),
(3, 'Shri nagar colony', '', 0, '', '2020-05-30 15:38:49', '2020-05-30 15:38:49', 0),
(4, 'Devendra', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-05-30 15:51:54', '2020-05-30 15:51:54', 0),
(5, 'Devendra', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-05-30 15:52:58', '2020-05-30 15:52:58', 0),
(6, 'social work', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-05-30 16:15:13', '2020-05-30 16:15:13', 0),
(7, 'social work', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-05-30 16:16:17', '2020-05-30 16:16:17', 0),
(8, 'Devendra', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-05-30 16:19:16', '2020-05-30 16:19:16', 0),
(9, 'social work', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-05-30 16:21:08', '2020-05-30 16:21:08', 0),
(10, 'Devendra', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-05-30 16:22:10', '2020-05-30 16:22:10', 0),
(11, 'Devendra', 'deve@gmail.com', 888, 'Shri nagar colony', '2020-05-30 16:22:49', '2020-05-30 16:22:49', 0),
(12, 'Devendra', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-05-30 16:25:29', '2020-05-30 16:25:29', 0),
(13, 'Devendra', 'deve@gmail.com', 888, 'Shri nagar colony', '2020-05-30 16:45:37', '2020-05-30 16:45:37', 0),
(14, 'Devendra', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-05-30 16:46:58', '2020-05-30 16:46:58', 0),
(15, 'Devendra', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-05-30 16:49:45', '2020-05-30 16:49:45', 0),
(16, 'Devendra', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-05-30 17:05:56', '2020-05-30 17:05:56', 0),
(17, 'social work', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-05-30 17:14:46', '2020-05-30 17:14:46', 0),
(18, 'Devendra', 'deve@gmail.com', 888, 'Shri nagar colony', '2020-05-31 12:04:28', '2020-05-31 12:04:28', 0),
(19, 'Devendra', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-05-31 15:11:31', '2020-05-31 15:11:31', 0),
(20, 'Devendra', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-05-31 16:02:25', '2020-05-31 16:02:25', 0),
(21, 'Devendra', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-06-01 13:52:56', '2020-06-01 13:52:56', 0),
(22, 'Devendra', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-06-01 14:03:35', '2020-06-01 14:03:35', 0),
(23, 'social work', 'deve@gmail.com', 888, 'Shri nagar colony', '2020-06-01 14:16:57', '2020-06-01 14:16:57', 0),
(24, 'Devendra', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-06-02 14:40:40', '2020-06-02 14:40:40', 0),
(25, 'social work', 'deve@gmail.com', 888, 'Shri nagar colony', '2020-06-02 16:03:26', '2020-06-02 16:03:26', 0),
(26, 'Devendra', 'devendramcajiwaji@gmail.com', 2147483647, 'Shri nagar colony', '2020-06-04 11:19:51', '2020-06-04 11:19:51', 0),
(27, 'Devendra', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-06-09 18:05:16', '2020-06-09 18:05:16', 0),
(28, 'Devendra', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-06-09 18:06:02', '2020-06-09 18:06:02', 0),
(29, 'Devendra', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-06-09 18:23:29', '2020-06-09 18:23:29', 0),
(30, 'Devendra', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-06-10 11:16:57', '2020-06-10 11:16:57', 0),
(31, 'Devendra', 'deve@gmail.com', 888, 'Shri nagar colony', '2020-06-10 11:44:39', '2020-06-10 11:44:39', 0),
(32, 'Devendra', 'deve@gmail.com', 888, 'Shri nagar colony', '2020-06-10 11:45:56', '2020-06-10 11:45:56', 0),
(33, 'Devendra', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-06-10 12:14:31', '2020-06-10 12:14:31', 0),
(34, 'Devendra', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-06-10 12:17:13', '2020-06-10 12:17:13', 0),
(35, 'Devendra', 'devendramcajiwaji@gmail.com', 2147483647, 'Shri nagar colony', '2020-06-10 12:17:44', '2020-06-10 12:17:44', 0),
(36, 'Devendra', 'devendramcajiwaji@gmail.com', 2147483647, 'Shri nagar colony', '2020-06-10 12:21:33', '2020-06-10 12:21:33', 0),
(37, 'Devendra', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-06-10 12:22:18', '2020-06-10 12:22:18', 0),
(38, 'Devendra', 'devendramcajiwaji@gmail.com', 888, 'Shri nagar colony', '2020-06-10 12:23:15', '2020-06-10 12:23:15', 0),
(39, 'Devendra', 'deve@gmail.com', 2147483647, 'Shri nagar colony', '2020-06-10 12:32:28', '2020-06-10 12:32:28', 0),
(40, 'social work', 'devendramcajiwaji@gmail.com', 2147483647, 'Shri nagar colony', '2020-06-10 12:34:12', '2020-06-10 12:34:12', 0),
(41, 'Devendra', 'devendramcajiwaji@gmail.com', 2147483647, 'Shri nagar colony', '2020-06-10 12:43:27', '2020-06-10 12:43:27', 0),
(42, 'social work', 'devendramcajiwaji@gmail.com', 2147483647, 'Shri nagar colony', '2020-06-10 12:44:28', '2020-06-10 12:44:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(50) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `grand_total` varchar(200) NOT NULL,
  `created` varchar(200) NOT NULL,
  `modified` varchar(200) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `grand_total`, `created`, `modified`, `status`) VALUES
(1, '1', '200', '2020-05-30 15:32:10', '2020-05-30 15:32:10', 0),
(2, '2', '100', '2020-05-30 15:37:44', '2020-05-30 15:37:44', 0),
(3, '3', '100', '2020-05-30 15:38:49', '2020-05-30 15:38:49', 0),
(4, '4', '100', '2020-05-30 15:51:54', '2020-05-30 15:51:54', 0),
(5, '5', '100', '2020-05-30 15:52:58', '2020-05-30 15:52:58', 0),
(6, '6', '100', '2020-05-30 16:15:13', '2020-05-30 16:15:13', 0),
(7, '7', '100', '2020-05-30 16:16:17', '2020-05-30 16:16:17', 0),
(8, '8', '100', '2020-05-30 16:19:16', '2020-05-30 16:19:16', 0),
(9, '9', '300', '2020-05-30 16:21:08', '2020-05-30 16:21:08', 0),
(10, '10', '100', '2020-05-30 16:22:10', '2020-05-30 16:22:10', 0),
(11, '11', '100', '2020-05-30 16:22:49', '2020-05-30 16:22:49', 0),
(12, '12', '100', '2020-05-30 16:25:29', '2020-05-30 16:25:29', 0),
(13, '13', '100', '2020-05-30 16:45:37', '2020-05-30 16:45:37', 0),
(14, '14', '100', '2020-05-30 16:46:58', '2020-05-30 16:46:58', 0),
(15, '15', '100', '2020-05-30 16:49:45', '2020-05-30 16:49:45', 0),
(16, '16', '100', '2020-05-30 17:05:56', '2020-05-30 17:05:56', 0),
(17, '17', '100', '2020-05-30 17:14:46', '2020-05-30 17:14:46', 0),
(18, '18', '100', '2020-05-31 12:04:28', '2020-05-31 12:04:28', 0),
(19, '19', '1100', '2020-05-31 15:11:31', '2020-05-31 15:11:31', 0),
(20, '20', '100', '2020-05-31 16:02:25', '2020-05-31 16:02:25', 0),
(21, '21', '100', '2020-06-01 13:52:56', '2020-06-01 13:52:56', 0),
(22, '22', '500', '2020-06-01 14:03:35', '2020-06-01 14:03:35', 0),
(23, '23', '1000', '2020-06-01 14:16:57', '2020-06-01 14:16:57', 0),
(24, '24', '700', '2020-06-02 14:40:40', '2020-06-02 14:40:40', 0),
(25, '25', '200', '2020-06-02 16:03:26', '2020-06-02 16:03:26', 0),
(26, '26', '400', '2020-06-04 11:19:51', '2020-06-04 11:19:51', 0),
(27, '27', '90956', '2020-06-09 18:05:16', '2020-06-09 18:05:16', 0),
(28, '28', '90956', '2020-06-09 18:06:02', '2020-06-09 18:06:02', 0),
(29, '29', '10990', '2020-06-09 18:23:29', '2020-06-09 18:23:29', 0),
(30, '30', '21980', '2020-06-10 11:16:57', '2020-06-10 11:16:57', 0),
(31, '31', '20498', '2020-06-10 11:44:39', '2020-06-10 11:44:39', 0),
(32, '32', '20498', '2020-06-10 11:45:56', '2020-06-10 11:45:56', 0),
(33, '33', '20498', '2020-06-10 12:14:31', '2020-06-10 12:14:31', 0),
(34, '34', '20498', '2020-06-10 12:17:13', '2020-06-10 12:17:13', 0),
(35, '35', '20989', '2020-06-10 12:17:44', '2020-06-10 12:17:44', 0),
(36, '36', '20989', '2020-06-10 12:21:33', '2020-06-10 12:21:33', 0),
(37, '37', '10990', '2020-06-10 12:22:18', '2020-06-10 12:22:18', 0),
(38, '38', '10990', '2020-06-10 12:23:15', '2020-06-10 12:23:15', 0),
(39, '39', '22489', '2020-06-10 12:32:28', '2020-06-10 12:32:28', 0),
(40, '40', '25989', '2020-06-10 12:34:12', '2020-06-10 12:34:12', 0),
(41, '41', '25989', '2020-06-10 12:43:27', '2020-06-10 12:43:27', 0),
(42, '42', '23498', '2020-06-10 12:44:28', '2020-06-10 12:44:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(50) NOT NULL,
  `order_id` varchar(200) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `sub_total` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `sub_total`) VALUES
(1, '1', '1', '2', '200'),
(2, '2', '1', '1', '100'),
(3, '3', '1', '1', '100'),
(4, '4', '1', '1', '100'),
(5, '5', '1', '1', '100'),
(6, '6', '1', '1', '100'),
(7, '7', '1', '1', '100'),
(8, '8', '1', '1', '100'),
(9, '9', '2', '1', '300'),
(10, '10', '1', '1', '100'),
(11, '11', '1', '1', '100'),
(12, '12', '1', '1', '100'),
(13, '13', '1', '1', '100'),
(14, '14', '1', '1', '100'),
(15, '15', '1', '1', '100'),
(16, '16', '1', '1', '100'),
(17, '17', '1', '1', '100'),
(18, '18', '1', '1', '100'),
(19, '19', '1', '11', '1100'),
(20, '20', '1', '1', '100'),
(21, '21', '1', '1', '100'),
(22, '22', '1', '5', '500'),
(23, '23', '1', '10', '1000'),
(24, '24', '1', '7', '700'),
(25, '25', '1', '2', '200'),
(26, '26', '1', '4', '400'),
(33, '29', '2', '1', '10990'),
(34, '30', '2', '2', '21980'),
(41, '34', '14', '1', '8999'),
(42, '35', '5', '1', '11499'),
(45, '36', '2', '1', '10990'),
(46, '37', '3', '1', '9999'),
(48, '38', '2', '1', '10990'),
(49, '39', '2', '1', '10990'),
(50, '40', '5', '1', '11499'),
(53, '42', '6', '1', '16990'),
(54, '43', '14', '1', '8999');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `camera` varchar(200) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `ram` varchar(200) NOT NULL,
  `storage` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `created` varchar(200) NOT NULL,
  `modified` varchar(200) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `camera`, `brand`, `ram`, `storage`, `price`, `created`, `modified`, `status`) VALUES
(2, 'image-61.jpeg', 'Samsung Galaxy On Nxt ', '13', 'Samsung', '3', '16', '10990', '2020-05-30 15:32:10', '2020-06-08 01:21 PM', 1),
(3, 'image-51.jpg', 'Lenovo K8 Plus ', '13', ' Lenevo', '3', '32', '9999', '2020-06-04 01:40 PM', '2020-06-08 01:22 PM', 1),
(5, 'image-41.jpeg', 'Moto E4 Plus ', '8', 'Moto', '3', '32', '11499', '2020-06-04 01:56 PM', '2020-06-08 01:16 PM', 1),
(6, 'image-31.jpeg', 'VIVO V9 Youth ', '16', 'VIVO', '4', '32', '16990', '2020-06-04 02:01 PM', '2020-06-08 01:15 PM', 1),
(14, 'image-21.jpeg', 'Infinix Hot S3 ', '13', 'Infinix', '3', '32', '8999', '', '2020-06-08 01:14 PM', 1),
(17, 'image-15.jpeg', 'Honor 9 Lite ', '13', 'Honor', '4', '64', '14499', '2020-06-04 06:46 PM', '2020-06-04 06:46 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poll`
--

CREATE TABLE `tbl_poll` (
  `poll_id` int(50) NOT NULL,
  `php_framework` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_poll`
--

INSERT INTO `tbl_poll` (`poll_id`, `php_framework`) VALUES
(1, 'Laravel'),
(2, 'Laravel'),
(3, 'CakePHP'),
(4, 'Symfony'),
(5, 'CakePHP'),
(6, 'CakePHP'),
(7, 'CodeIgniter'),
(8, 'Phalcon'),
(9, 'Laravel'),
(10, 'Laravel'),
(11, 'Laravel'),
(12, 'Laravel'),
(13, 'Phalcon'),
(14, 'Phalcon'),
(15, 'Phalcon'),
(16, 'CodeIgniter'),
(17, 'CodeIgniter'),
(18, 'CodeIgniter'),
(19, 'CodeIgniter'),
(20, 'Laravel'),
(21, 'Symfony'),
(22, 'Laravel'),
(23, 'Laravel'),
(24, 'Laravel'),
(25, 'Laravel'),
(26, 'Laravel'),
(27, 'Laravel'),
(28, 'Laravel'),
(29, 'Laravel'),
(30, 'CodeIgniter'),
(31, 'CodeIgniter'),
(32, 'CodeIgniter'),
(33, 'CodeIgniter'),
(34, 'CakePHP'),
(35, 'CodeIgniter'),
(36, 'Phalcon'),
(37, 'Phalcon'),
(38, 'Symfony'),
(39, 'Phalcon'),
(40, 'Phalcon'),
(41, 'Symfony'),
(42, 'Phalcon'),
(43, 'Phalcon'),
(44, 'Laravel'),
(45, 'Laravel'),
(46, 'Laravel'),
(47, 'Laravel'),
(48, 'Laravel'),
(49, 'Laravel'),
(50, 'Laravel'),
(51, 'Laravel'),
(52, 'CodeIgniter'),
(53, 'CodeIgniter'),
(54, 'CodeIgniter'),
(55, 'CodeIgniter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_poll`
--
ALTER TABLE `tbl_poll`
  ADD PRIMARY KEY (`poll_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_poll`
--
ALTER TABLE `tbl_poll`
  MODIFY `poll_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
