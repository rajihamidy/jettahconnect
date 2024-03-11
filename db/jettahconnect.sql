-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 06:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jettahconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `shopname` varchar(200) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `shopaddress` varchar(200) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0',
  `regdate` varchar(25) NOT NULL,
  `expdate` varchar(25) NOT NULL,
  `acctstatus` varchar(15) NOT NULL,
  `wallet` bigint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `shopname`, `name`, `email`, `shopaddress`, `mobile`, `password`, `is_active`, `regdate`, `expdate`, `acctstatus`, `wallet`) VALUES
(1, '', 'Admin', 'admin@mail.com', '', '', '$2y$10$YKSDtra7v2wH6ORYfry8Ue9t49pk1AvQvdJGuq4lDvFLEcx.kP6Mq', '0', '', '', '', 0),
(9, '', 'raji Hamidu', 'rajihamidu90@gmail.com', '', '', '$2y$10$Hej75p0VI7Q.1nyNO1T8YeFCzPJqL.7g0AP/ZwYgJAE8DkKUtxg/a', '0', '', '', '', 0),
(12, 'raji shop', 'raji hamidu', 'rajihamidu9@gmail.com', 'fahgsf', '08067455933', '$2y$10$SM6lPEpOHGUK1Q5JjnHvfuPRLFCRqyznNea3iT153cg7XE.nvxeLu', '0', '', '', '', 0),
(13, 'amar shop', 'Ammar Raji', 'ammarraji@gmail.com', 'GGC Gashua', '08067455923', '$2y$10$O1QdYJZl9zmtp3bgCbEK0.uM5kQ.xWVi2C4W1LTzn9HN6cTCzlY8C', '0', '', '', '', 0),
(15, 'rash shop', 'rashi isol', 'rash@gmail.com', 'fasf fsafds', '08067455930', '$2y$10$JdJdl2juwRjXF4jWBegKnOwVLrU7EPXbeOZ.Az2TKSAindeKDWq1u', '0', '17 Jan, 2024', '16.02.2024 0', 'Not Activated', 0),
(16, 'Raji Shop', 'Raji Ammaar', 'rajihamidu891@gmail.com', 'bauchiii', '08098456782', '$2y$10$erHMViXgR2JdNIRsA.1bLuEd/0tfBKjMj.dCnl26iaG54TZ4bLviC', '0', '10.01.2024 02:56:14', '12.12.2024 02:56:14', 'Not Activated', 0),
(17, 'Raji\'s Shop', 'Raji Hamidu', 'rajihamidu89@gmail.com', 'Bauchi', '08076544567', '$2y$10$dTdzTVdEqxgJvZpyuFkKqOvnTSdl7J1HY/lN.UMp4WHSq5rzIexVC', '0', '18.01.2024 06:29:38', '16.07.2024 06:29:38', 'Not Activated', 0);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`, `user_id`) VALUES
(1, 'HP', 0),
(2, 'Samsung', 0),
(3, 'Apple', 0),
(4, 'Sony', 0),
(5, 'LG', 0),
(6, 'OnePlus+', 0),
(7, 'Excl', 0),
(8, 'Aduro', 0),
(9, 'Dr. Martens', 0),
(10, 'Hot Toys', 0),
(18, 'Ahmads', 0),
(21, 'HP', 17);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `seller_id` int(2) NOT NULL,
  `qty` int(10) NOT NULL,
  `p_status` int(11) NOT NULL DEFAULT 0,
  `order_status` varchar(11) NOT NULL DEFAULT 'Not ordered'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `seller_id`, `qty`, `p_status`, `order_status`) VALUES
(26, 5, '127.0.0.1', 7, 17, 1, 0, 'Ordered'),
(27, 3, '127.0.0.1', 7, 17, 1, 0, 'Ordered'),
(28, 4, '127.0.0.1', 7, 16, 1, 0, 'Ordered'),
(29, 3, '127.0.0.1', 7, 17, 1, 0, 'Ordered'),
(30, 4, '127.0.0.1', 7, 16, 1, 0, 'Ordered'),
(31, 4, '127.0.0.1', 7, 16, 1, 0, 'Ordered'),
(32, 3, '127.0.0.1', 7, 17, 1, 0, 'Ordered'),
(33, 3, '127.0.0.1', 7, 17, 1, 0, 'Ordered'),
(34, 4, '127.0.0.1', 7, 16, 1, 0, 'Ordered'),
(35, 2, '127.0.0.1', 7, 16, 1, 0, 'Ordered'),
(36, 7, '127.0.0.1', 7, 17, 1, 0, 'Ordered'),
(37, 4, '127.0.0.1', 7, 16, 1, 0, 'Ordered'),
(38, 3, '127.0.0.1', 7, 17, 1, 0, 'Ordered'),
(40, 4, '127.0.0.1', 7, 16, 1, 0, 'Ordered'),
(41, 4, '127.0.0.1', 7, 16, 1, 0, 'Ordered'),
(42, 4, '127.0.0.1', 7, 16, 1, 0, 'Ordered'),
(43, 3, '127.0.0.1', 7, 17, 1, 0, 'Ordered'),
(44, 3, '127.0.0.1', 7, 17, 1, 0, 'Ordered'),
(45, 4, '127.0.0.1', 7, 16, 1, 0, 'Ordered'),
(46, 4, '127.0.0.1', 7, 16, 1, 0, 'Ordered');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Tools & Home Improvement'),
(2, 'Electronics'),
(4, 'Home & Kitchen'),
(5, 'CDs & Vinyl'),
(6, 'Clothings'),
(12, 'Mobiles'),
(13, 'Automotive Parts & Accessories'),
(14, 'Toys'),
(15, 'Farm Product');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'linked to user_info user_id',
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL,
  `seller_id` int(11) NOT NULL COMMENT 'Seller_id is id in the admin table',
  `orderdate` varchar(35) NOT NULL,
  `deliveryStatus` varchar(20) NOT NULL DEFAULT 'Not Delivered Yet',
  `received_Status` varchar(15) NOT NULL DEFAULT 'Not Received'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `p_status`, `seller_id`, `orderdate`, `deliveryStatus`, `received_Status`) VALUES
(1, 2, 5, 2, '1708226109-bMml30drNZTuo4Ur2US9', 'Not Completed', 17, '', 'Delivered', 'Not Received'),
(2, 7, 5, 2, '1708226109-bMml30drNZTuo4Ur2US9', 'Not Completed', 17, '', 'Delivered', 'Not Received'),
(3, 7, 3, 1, '1708226109-NeUsDxuakSecyR7MbUMz', 'Not Completed', 17, '', 'Delivered', 'Not Received'),
(4, 7, 4, 1, '1708226109-IpauWymUoD1FBg45I5pT', 'Completed', 16, '', 'Delivered', 'Not Received'),
(5, 7, 3, 1, '1708226202-mZWsbPx2Rixs1qEdPKRD', 'Not Completed', 17, '', 'Not Delivered Yet', 'Not Received'),
(6, 7, 3, 1, '1708226202-mZWsbPx2Rixs1qEdPKRD', 'Not Completed', 17, '', 'Not Delivered Yet', 'Not Received'),
(7, 7, 4, 1, '1708226202-v76V4NPcsYq1hY2rUeDb', 'Completed', 16, '', 'Delivered', 'Not Received'),
(8, 7, 5, 1, '1708226483-OC7xdQqMxwZzYM7BGeeg', 'Not Completed', 17, '', 'Not Delivered Yet', 'Not Received'),
(9, 7, 5, 1, '1708226483-OC7xdQqMxwZzYM7BGeeg', 'Not Completed', 17, '', 'Not Delivered Yet', 'Not Received'),
(10, 7, 3, 1, '1708226483-EWPkjgSe9vMc63PxRfPd', 'Not Completed', 17, '', 'Not Delivered Yet', 'Not Received'),
(11, 7, 4, 1, '1708226483-ZFSbvk2XYWC907kuHhva', 'Completed', 16, '', 'Not Delivered Yet', 'Not Received'),
(12, 7, 5, 1, '1708226746-kl7gsse2l5mYTFkts1QH', 'Not Completed', 17, '', 'Not Delivered Yet', 'Not Received'),
(13, 7, 3, 1, '1708226746-g79PNv0oWTGOKVqpB5mT', 'Not Completed', 17, '', 'Not Delivered Yet', 'Not Received'),
(14, 7, 4, 1, '1708226746-QjS6D8HJmovYPsYe31uU', 'Completed', 16, '', 'Not Delivered Yet', 'Not Received'),
(15, 7, 5, 1, '1708226832-RQ874uK5uU1yNThLw4aX', 'Not Completed', 17, '', 'Not Delivered Yet', 'Not Received'),
(16, 7, 3, 1, '1708226832-Bo8sd5JuzzSY8B6LPUKq', 'Not Completed', 17, '', 'Not Delivered Yet', 'Not Received'),
(17, 7, 4, 1, '1708226832-4SJJBQjkPa1qJJ6cEGS1', 'Completed', 16, '', 'Not Delivered Yet', 'Not Received'),
(18, 7, 3, 1, '1708227858-tpCtTixwTJ0DwM3ENxE5', 'Not Completed', 17, '', 'Not Delivered Yet', 'Not Received'),
(19, 7, 4, 1, '1708227858-5fz2DzcrkXIbObfht8BO', 'Not Completed', 16, '', 'Not Delivered Yet', 'Item Received'),
(20, 7, 4, 1, '1708228012-zFmfAq8UpZi3PnMyfYjn', 'Not Completed', 16, '', 'Not Delivered Yet', 'Not Received'),
(21, 7, 3, 1, '1708228012-QE36roEWyspaMBSaULDU', 'Not Completed', 17, '', 'Not Delivered Yet', 'Not Received'),
(22, 7, 3, 1, '1708228054-RvJiMDKRs7Ssx1FhPbA6', 'Not Completed', 17, '', 'Not Delivered Yet', 'Not Received'),
(23, 7, 4, 1, '1708228054-8KiAToC1l08ZbQQkVJ4T', 'Not Completed', 16, '', 'Not Delivered Yet', 'Not Received'),
(24, 7, 2, 1, '1708349186-ImzFAJ6qwnHOQdnMtVJi', 'Completed', 16, '', 'Not Delivered Yet', 'Not Received'),
(25, 7, 7, 1, '1708349696-SawwEnI44yXIcjDb20dy', 'Not Completed', 17, '', 'Not Delivered Yet', 'Not Received'),
(26, 7, 4, 1, '1708351312-JYLIfuReXzlC1dtKQ38C', 'Completed', 16, '2024-02-19 15:01:55', 'Not Delivered Yet', 'Not Received'),
(27, 7, 3, 1, '1708351312-HDbXToCmEoSV2rUQ1Zal', 'Not Completed', 17, '2024-02-19 15:01:55', 'Not Delivered Yet', 'Not Received'),
(28, 7, 4, 1, '1708682650-jtCHW8fPgemKqmTNR3Ti', 'Not Completed', 16, '2024-02-23 11:06:02', 'Not Delivered Yet', 'Not Received'),
(29, 7, 4, 1, '1709206456-QKjIkpYRnLHfT5fdApFw', 'Not Completed', 16, '2024-02-29 12:34:35', 'Not Delivered Yet', 'Not Received'),
(30, 7, 4, 1, '1709211128-LBQyU3RLipYCm4ia7FnL', 'Completed', 16, '2024-02-29 13:52:56', 'Not Delivered Yet', 'Not Received'),
(31, 7, 3, 1, '1709211128-PXNUxeznzOurGBg2Y2aZ', 'Completed', 17, '2024-02-29 13:52:56', 'Not Delivered Yet', 'Item Received'),
(32, 7, 3, 1, '1709543471-n2UnXX4tcBm4xlvzFtpD', 'Completed', 17, '2024-03-04 10:12:25', 'Not Delivered Yet', 'Not Received'),
(33, 7, 4, 1, '1709543471-ZO0WtWq92utApAr6tGLt', 'Completed', 16, '2024-03-04 10:12:28', 'Not Delivered Yet', 'Not Received'),
(34, 7, 4, 1, '1709543572-TaaL6nj20yF1CiikN3Us', 'Completed', 16, '2024-03-04 10:13:29', 'Not Delivered Yet', 'Not Received');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'Linking with id in admin table',
  `product_cat` int(11) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `user_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_qty`, `product_desc`, `product_image`, `product_keywords`) VALUES
(2, 16, 12, 2, 'Samsung Galaxy s10-', 2011, 13, 'Samsung Galaxy s10+', '1706349154_WIN_20230925_15_56_11_Pro.jpg', 'Samsung Galaxy s10+'),
(3, 17, 12, 3, 'Iphone 12 Pro Max', 1870, 7, '5G goes Pro. A14 Bionic rockets past every other smartphone chip. The Pro camera system takes low-light photography to the next level â€” with an even bigger jump on iPhone 12 Pro Max. And Ceramic Shield delivers four times better drop performance.', '1616499931_iph12pm.jpg', 'apple, iphone'),
(4, 16, 12, 2, 'Samsung Galaxy S21 Ultra', 1550, 10, 'This is a demo', '1616492395_Samsung-Galaxy-S21-Ultra-1608287647-0-0.jpg', 'samsung, s21, s21 ultra'),
(5, 17, 12, 6, 'OnePlus 8T', 860, 13, 'On spec-sheet, the OnePlus 8T boasts plenty of improvements from its predecessor i.e. the OnePlus 8. For instance, its 6.55-inch 1080p OLED display now comes with a faster 120Hz refresh rate. In comparison, the OnePlus 8 had a 90Hz refresh rate. This upgrade seems huge. However, users will agree that you canâ€™t really find much of a difference between 90Hz to 120Hz on a smartphone screen.', '1616500410_OnePlus-8T-5G-Lunar-Silver-8GB-RAM-128GB-Storage-image-4.jpg', 'one plus, oneplus8'),
(6, 16, 12, 2, 'Samsung Galaxy Z Fold 2', 2499, 5, 'Last yearâ€™s Galaxy Fold was a sort of experiment in the field of foldable phones. The idea was an innovative one but the phone faced a lot of durability issues. Its launch was postponed multiple times because of Samsungâ€™s inability to solve all the problems. Samsung will likely avoid those situations with its successor.', '1616500092_sm-zfold.jpg', 'samsung, mobile, galaxy fold'),
(7, 17, 6, 9, 'Dr. Martens Mens Patch', 1600, 3, 'Color: Grey/Charcoal/Dark Grey', '1616503181_Dr. Martens.jpg', 'dr martens, shoes'),
(9, 16, 2, 3, 'Computer Set', 13145, 113, 'A computer set', '1674405965_photo-1600304594526-5f75d3ca8f3d.jpeg', 'computer'),
(10, 17, 2, 8, 'Aduro Wireless Headphones', 4100, 6, 'Amazing Bluetooth headphones sound with aptX technology. High-quality built-in microphone with Bluetooth 5.0 technology', '1616502854_hdphn.jpg', 'headphone, aduro'),
(64, 16, 1, 1, 'Raji', 809, 24, 'fsadnsd jkkj', '1706360400_1616503181_Dr. Martens.jpg', 'hghga'),
(65, 17, 1, 1, 'Aderolu', 500, 890, 'fdsafads fd asf d', '1706360428_1674406396_adcdcd.jpg', 'fads fdsa'),
(66, 16, 1, 1, 'Adeori okin', 78, 50, 'fsaddf saf das', '1706360854_WIN_20230925_15_56_11_Pro.jpg', 'jhsd'),
(67, 17, 1, 1, 'Idaya', 200, 78, 'jhs m', '1706360461_1616502847_hdphn.jpg', 'myprod'),
(68, 17, 1, 2, 'rajinewsamsung', 100, 45, 'fdff ff', '1706360802_WIN_20230925_15_56_11_Pro.jpg', 'hjf'),
(77, 16, 4, 1, 'My Raji New', 30, 500, 'my new', '1706362157_WIN_20230925_15_56_11_Pro.jpg', 'sdf'),
(82, 17, 5, 1, 'MyProduct', 200, 12, 'New Arrival HP', '1706366018_Yam.jpg', 'New Hp'),
(83, 16, 2, 1, 'myProd1', 5000, 500, 'Electronic', '1706366355_apple.jpg', 'Electronic'),
(105, 16, 1, 1, 'aa1', 800, 300, 'hj', '1706368297_Yam.jpg', 'hjhjjh'),
(106, 16, 1, 1, 'aa1', 800, 300, 'hj', '1706368300_Yam.jpg', 'hjhjjh'),
(113, 16, 1, 1, 'Hamidu', 60, 200, 'njhhj', '1706369684_Yam.jpg', 'kjj'),
(114, 16, 1, 1, 'adeolu', 80, 800, 'dsfsaf', '1706369777_Yam.jpg', 'bnhj'),
(115, 16, 1, 1, 'adeolu', 80, 800, 'dsfsaf', '1706369794_Yam.jpg', 'bnhj'),
(117, 16, 2, 3, 'Ademola', 2, 4, 'fdsa', '1706370217_Yam.jpg', 'sdfa'),
(126, 17, 1, 1, 'NewProduct', 300, 400, 'hj', '1706371354_apple.jpg', 'fsadjh fdsa');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(1, 'Christine', 'Randolph', 'randolphc@gmail.com', '25f9e794323b453885f5181f1b624d0b', '8389080183', '2133  Hill Haven Drive', 'Terra Stree'),
(2, 'Will', 'Willams', 'willainswill@gmail.com', '25f9e794323b453885f5181f1b624d0b', '8389080183', '4567  Orphan Road', 'WI'),
(3, 'Demo', 'Name', 'demo@gmail.com', 'password', '9876543210', 'demo ad1', 'ademo ad2'),
(5, 'Steeve', 'Rogers', 'steeve1@gmail.com', '305e4f55ce823e111a46a9d500bcb86c', '9876547770', '573  Pinewood Avenue', 'MN'),
(6, 'Melissa', 'Gilbert', 'gilbert@gmail.com', '305e4f55ce823e111a46a9d500bcb86c', '7845554582', '1711  McKinley Avenue', 'MA'),
(7, 'Hamidu', 'Raji', 'rajihamidu90@gmail.com', '2494f262498cae2c6cc9b0c4ce50452c', '8067455933', 'Bauchi', 'Abuja'),
(8, 'abiodun', 'adeyemo', 'rajiabi@live.com', '25f9e794323b453885f5181f1b624d0b', '0806745593', 'hjsdjjhds', 'fdafasdfa'),
(9, 'Ammaar', 'Ibrahim', 'ammar@gmail.com', '25f9e794323b453885f5181f1b624d0b', '9876789878', 'dkn', 'kj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_product_cat` (`product_cat`),
  ADD KEY `fk_product_brand` (`product_brand`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_brand` FOREIGN KEY (`product_brand`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `fk_product_cat` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
