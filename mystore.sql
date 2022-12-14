-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 07:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_name` varchar(191) NOT NULL,
  `admin_password` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_name`, `admin_password`) VALUES
('admin', 'admin@22');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Swiggy'),
(2, 'Zomato'),
(3, 'Nike'),
(4, 'Flipkart'),
(5, 'Amazon'),
(6, 'Mc Donald'),
(10, 'cjcgokoko'),
(12, 'vv');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `total_price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`, `product_price`, `total_price`) VALUES
(21, '::1', 1, '768', 768),
(8, '::1', 1, '259', 259);

-- --------------------------------------------------------

--
-- Table structure for table `cart_test2`
--

CREATE TABLE `cart_test2` (
  `cart_id` int(11) NOT NULL,
  `pro_qty` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_test2`
--

INSERT INTO `cart_test2` (`cart_id`, `pro_qty`) VALUES
(1, 3),
(2, 6),
(3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(2, 'Sweets'),
(3, 'Chocolates'),
(4, 'Milk Products'),
(5, 'Vegetables'),
(6, 'Chips'),
(7, 'Others'),
(8, 'Western Wear'),
(9, 'Clothes'),
(19, 'ccc');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 3, 1442874703, 7, 0, 'pending'),
(2, 15, 820630977, 15, 0, 'pending'),
(3, 15, 279713150, 15, 0, 'pending'),
(4, 15, 1808760549, 19, 0, 'pending'),
(5, 17, 412433736, 23, 0, 'pending'),
(6, 17, 860751566, 7, 0, 'pending'),
(7, 17, 2000026294, 7, 0, 'pending'),
(8, 17, 1161090569, 7, 0, 'pending'),
(9, 15, 658342171, 8, 0, 'pending'),
(10, 17, 266793006, 19, 0, 'pending'),
(11, 15, 1593030962, 19, 0, 'pending'),
(12, 15, 867697520, 21, 0, 'pending'),
(13, 15, 1316996185, 8, 0, 'pending'),
(14, 17, 134716636, 19, 0, 'pending'),
(15, 15, 1774773926, 15, 0, 'pending'),
(16, 15, 1256884177, 23, 0, 'pending'),
(17, 15, 325669429, 21, 0, 'pending'),
(18, 15, 1050742680, 15, 0, 'pending'),
(19, 15, 2040584940, 21, 0, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `invoice_number` varchar(199) NOT NULL,
  `product_id` int(199) NOT NULL,
  `qty` int(199) NOT NULL,
  `price` int(199) NOT NULL,
  `total_price` int(199) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`invoice_number`, `product_id`, `qty`, `price`, `total_price`) VALUES
('1442874703', 15, 2, 1093, 2186),
('1442874703', 19, 3, 677, 2031),
('1442874703', 7, 5, 67, 335),
('820630977', 21, 4, 768, 3072),
('820630977', 15, 5, 1093, 5465),
('279713150', 23, 4, 236, 944),
('279713150', 15, 2, 1093, 2186),
('1808760549', 23, 8, 236, 1888),
('1808760549', 19, 1, 677, 677),
('412433736', 19, 1, 677, 677),
('412433736', 23, 3, 236, 708),
('860751566', 19, 4, 677, 2708),
('860751566', 21, 4, 768, 3072),
('860751566', 7, 4, 67, 268),
('2000026294', 7, 8, 67, 536),
('1161090569', 19, 1, 677, 677),
('1161090569', 7, 1, 67, 67),
('658342171', 8, 1, 259, 259),
('266793006', 19, 1, 677, 677),
('1593030962', 22, 3, 567, 1701),
('1593030962', 7, 2, 67, 134),
('1593030962', 19, 2, 677, 1354),
('867697520', 21, 2, 768, 1536),
('1316996185', 8, 2, 259, 518),
('134716636', 19, 1, 677, 677),
('1774773926', 15, 5, 1093, 5465),
('1256884177', 22, 1, 567, 567),
('1256884177', 7, 1, 67, 67),
('1256884177', 23, 1, 236, 236),
('325669429', 23, 1, 236, 236),
('325669429', 19, 1, 677, 677),
('325669429', 21, 1, 768, 768),
('1050742680', 22, 1, 567, 567),
('1050742680', 19, 1, 677, 677),
('1050742680', 15, 1, 1093, 1093),
('2040584940', 23, 1, 236, 236),
('2040584940', 22, 1, 567, 567),
('2040584940', 21, 1, 768, 768);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_decription` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_decription`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `date`, `status`) VALUES
(7, 'Butter4', 'tasty tasty butter mutter', 'butter,Butter,milk,amul', 4, 4, 'amul.jpg', 'butter2.jpg', 'butter.jpg', 'butter3.jpg', '67', '2022-12-09 08:53:44.358941', '1'),
(8, 'T-shirt', 'mera t-shirt mahhan', 't-shirl kali kali', 9, 3, 'gallery-1.jpg', 'gallery-2.jpg', 'gallery-3.jpg', 'gallery-4.jpg', '259', '2022-12-09 08:52:46.388846', '1'),
(15, 't-shirt', 'MAPF1 ESS Logo Men\'s T-Shirt', 't-shirt,dress,clothes', 9, 4, 'p2.jpg', 'p3.jpg', 'p4.jpg', 'p1.jpg', '1093', '2022-11-18 10:39:51.290528', '1'),
(19, 't-shirt', 'Made with pure cotton from the Forever Better', 't-shirt,clothe,clothes,dress', 8, 5, 'la5.jpg', 'la1.jpg', 'la2.jpg', 'la3.jpg', '677', '2022-12-09 12:56:29.216164', '1'),
(21, 'shoe', 'HYBRID NX Men\'s Running Shoes', 'shoe,wester,wear', 7, 4, 'mainSg.jpg', 'sh3.jpeg', 'sho2.jpeg', 'sh6.jpg', '768', '2022-11-16 17:04:15.469422', '1'),
(22, 'Monster Kids\' T-Shirt', 'The colourful at the chest features a range of adorable characters in rubber print. ', 't-shirt', 9, 3, 'm1.jpg', 'm2.jpg', 'm4.jpg', 'm3.jpg', '567', '2022-11-16 17:49:29.647932', '1'),
(23, 'SURF EXCEL', 'Surf Excel Easy Wash Detergent Powder 1.5 kg', 'surf extra excel', 7, 5, 'su1.jpg', 'su2.jpg', 'su3.jpg', 'su4.jpg', '236', '2022-12-09 07:58:19.036212', '1'),
(30, 'xmjxx', 'xmjxx', 'xmjxx', 3, 3, 'ph1.jpg', 'headphone.jpg', 'headphone.jpg', 'pc.jpg', '77', '2022-12-09 17:52:27.000000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 3, 4552, 1442874703, 3, '2022-11-21 15:27:52', 'Complete'),
(2, 15, 8537, 820630977, 2, '2022-11-21 17:25:06', 'Complete'),
(3, 15, 3130, 279713150, 2, '2022-11-21 21:00:15', 'Complete'),
(4, 15, 2565, 1808760549, 2, '2022-11-21 21:07:45', 'Complete'),
(5, 17, 1385, 412433736, 2, '2022-11-22 17:25:29', 'Complete'),
(6, 17, 6048, 860751566, 3, '2022-11-22 17:29:15', 'Complete'),
(7, 17, 536, 2000026294, 1, '2022-11-22 17:28:45', 'Complete'),
(8, 17, 744, 1161090569, 2, '2022-11-23 03:58:32', 'Complete'),
(9, 15, 259, 658342171, 1, '2022-11-23 09:44:51', 'Complete'),
(10, 17, 677, 266793006, 1, '2022-11-23 04:14:30', 'Complete'),
(11, 15, 3189, 1593030962, 3, '2022-11-23 15:28:46', 'Complete'),
(12, 15, 1536, 867697520, 1, '2022-11-23 15:33:33', 'Complete'),
(13, 15, 518, 1316996185, 1, '2022-12-09 16:22:54', 'Complete'),
(14, 17, 677, 134716636, 1, '2022-11-23 15:42:37', 'pending'),
(15, 15, 5465, 1774773926, 1, '2022-12-09 16:23:32', 'Complete'),
(16, 15, 870, 1256884177, 3, '2022-12-09 16:11:12', 'pending'),
(17, 15, 1681, 325669429, 3, '2022-12-09 16:16:16', 'pending'),
(18, 15, 2337, 1050742680, 3, '2022-12-09 16:19:52', 'Complete'),
(19, 15, 1571, 2040584940, 3, '2022-12-09 16:20:18', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `user_payment`
--

CREATE TABLE `user_payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `delivery_status` varchar(199) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_payment`
--

INSERT INTO `user_payment` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `delivery_status`, `date`) VALUES
(1, 1, 1442874703, 4552, 'Paytm', 'Delivered', '2022-11-21 20:57:52'),
(2, 2, 820630977, 8537, 'Paytm', 'Delivered', '2022-11-21 22:55:06'),
(3, 3, 279713150, 3130, 'UPI', 'Delivered', '2022-11-22 02:30:15'),
(4, 4, 1808760549, 2565, 'Cash On Delivery', 'Delivered', '2022-11-22 02:37:45'),
(5, 5, 412433736, 1385, 'UPI', 'Out Of Delivery', '2022-11-22 22:55:29'),
(6, 7, 2000026294, 536, 'Cash On Delivery', 'Delivered', '2022-11-22 22:58:45'),
(7, 6, 860751566, 6048, 'Paytm', 'Cancelled', '2022-11-22 22:59:15'),
(8, 8, 1161090569, 744, 'BHIM', 'Cancelled', '2022-11-23 09:28:32'),
(9, 10, 266793006, 677, 'UPI', 'Cancelled', '2022-11-23 09:44:30'),
(10, 9, 658342171, 259, 'Cash On Delivery', 'Cancelled', '2022-11-23 15:14:51'),
(11, 11, 1593030962, 3189, 'Net Banking', 'Dispatched', '2022-11-23 20:58:46'),
(12, 12, 867697520, 1536, 'UPI', 'Under Process', '2022-11-23 21:03:33'),
(13, 18, 1050742680, 2337, 'Net Banking', 'Under Process', '2022-12-09 21:49:52'),
(14, 19, 2040584940, 1571, 'Net Banking', 'Under Process', '2022-12-09 21:50:18'),
(15, 13, 1316996185, 518, 'Paytm', 'Under Process', '2022-12-09 21:52:54'),
(16, 15, 1774773926, 5465, 'BHIM', 'Under Process', '2022-12-09 21:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(2, 'hhh', 'sss@co', 'qq', 'apple33.jpg', '::1', '11', '111'),
(3, 'ww', 'ww@co', '22', 'capsicum.jpg', '::1', '22', '22'),
(4, '', 'seema@co', '111', '', '::1', '111', '111'),
(5, 'adul', 'adul@gmail.com', '1234', 'logo4.png', '::1', '1111', '1111'),
(7, '', 'kavya@gmail.com', '2222', 't3.jpg', '::1', '2222', '2222'),
(8, 'Manisha', 'manisha@gmail.com', '2222', 't11.jpg', '::1', '2222', '2222'),
(12, 'mahima', 'mahima@gmail.com', '2222', 't10.jpg', '::1', '2222', '2222'),
(13, 'Abhi', 'abhi@gmail.com', '2222', 't1.jpg', '::1', '2222', '2222'),
(14, 'ramesh', 'ra@2.gmail', '2222', 't7.jpg', '::1', '2222', '2222'),
(15, 'megha', 'megha@gmail.com', '22', 'ice2.jpg', '::1', 'panbazar M.G road,ghy', '56667'),
(16, 'mumta', 'mumta@gmail.com', '22', 'apple22.jpg', '::1', 'panbazar', '78900'),
(17, 'saumya', 'saumya@gmail.com', '22', 't8.jpg', '::1', 'panbazar', '18907723');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_test2`
--
ALTER TABLE `cart_test2`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payment`
--
ALTER TABLE `user_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart_test2`
--
ALTER TABLE `cart_test2`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_payment`
--
ALTER TABLE `user_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
