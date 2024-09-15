-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2024 at 05:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
  `states` varchar(50) NOT NULL,
  `lga` varchar(80) NOT NULL,
  `cat` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(500) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0',
  `regdate` varchar(25) NOT NULL,
  `expdate` varchar(25) NOT NULL,
  `acctstatus` varchar(15) NOT NULL,
  `wallet` bigint(5) NOT NULL,
  `recovery_code` varchar(255) DEFAULT NULL,
  `recovery_expiration` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `shopname`, `name`, `email`, `shopaddress`, `states`, `lga`, `cat`, `mobile`, `password`, `is_active`, `regdate`, `expdate`, `acctstatus`, `wallet`, `recovery_code`, `recovery_expiration`) VALUES
(1, '', 'Admin', 'admin@mail.com', '', '', '', '', '', '$2y$10$YKSDtra7v2wH6ORYfry8Ue9t49pk1AvQvdJGuq4lDvFLEcx.kP6Mq', '0', '', '', '', 0, NULL, NULL),
(9, '', 'raji Hamidu', 'rajihamidu90@gmail.com', '', '', '', '', '', '$2y$10$Hej75p0VI7Q.1nyNO1T8YeFCzPJqL.7g0AP/ZwYgJAE8DkKUtxg/a', '0', '', '', '', 0, NULL, NULL),
(12, 'raji shop', 'raji hamidu', 'rajihamidu9@gmail.com', 'fahgsf', '', '', '', '08067455933', '$2y$10$SM6lPEpOHGUK1Q5JjnHvfuPRLFCRqyznNea3iT153cg7XE.nvxeLu', '0', '', '', '', 0, NULL, NULL),
(13, 'amar shop', 'Ammar Raji', 'ammarraji@gmail.com', 'GGC Gashua', '', '', '', '08067455923', '$2y$10$O1QdYJZl9zmtp3bgCbEK0.uM5kQ.xWVi2C4W1LTzn9HN6cTCzlY8C', '0', '', '', '', 0, NULL, NULL),
(15, 'rash shop', 'rashi isol', 'rash@gmail.com', 'fasf fsafds', '', '', '', '08067455930', '$2y$10$JdJdl2juwRjXF4jWBegKnOwVLrU7EPXbeOZ.Az2TKSAindeKDWq1u', '0', '17 Jan, 2024', '16.02.2024 0', 'Not Activated', 0, NULL, NULL),
(16, 'Raji Shop', 'Raji Ammaar', 'rajihamidu891@gmail.com', 'bauchiii', '', '', '', '08098456782', '$2y$10$erHMViXgR2JdNIRsA.1bLuEd/0tfBKjMj.dCnl26iaG54TZ4bLviC', '0', '10.01.2024 02:56:14', '12.12.2024 02:56:14', 'Not Activated', 43000, NULL, NULL),
(17, 'Raji\'s Shop', 'Raji Hamidu', 'rajihamidu89@gmail.com', 'Bauchi', '', '', '', '08076544567', '$2y$10$dTdzTVdEqxgJvZpyuFkKqOvnTSdl7J1HY/lN.UMp4WHSq5rzIexVC', '0', '18.01.2024 06:29:38', '16.07.2024 06:29:38', 'Not Activated', 87610, '3611422', '2024-07-16 21:20:34'),
(18, 'hjhjhjhj', 'hjhjhj', 'hjjhhjhjhj@gmail.com', 'hhjhjhjhj', '', '', 'Provision Shop', '08067555676', '$2y$10$M4btEMq.atutVPu.koukAO2hxr0BOAZKEFZQO9f.7tu3qchpByUxG', '0', '19.04.2024 21:14:09', '16.10.2024 21:14:09', 'Not Activated', 0, NULL, NULL),
(19, 'Azek-lins nig LTD ', 'Collins Azeke', 'collinsazeke7@gmail.com', 'B2012 urban shelter market apo resettlement fct Abuja ', '', '', 'Real Estate', '08132011343', '$2y$10$rbS/4btN.7NLlAzdhRWl3.0wf9CQiIl8jThF6qXBO0OLzgEu8jt1u', '0', '19.04.2024 21:55:36', '16.10.2024 21:55:36', 'Not Activated', 2500, NULL, NULL),
(20, 'Anty chioma provision shop ', 'Collins Azeke', 'isiguzomavis@gmail.com', 'Close to yuroba mosque wumba apo fct Abuja ', '', '', 'Provision Shop', '07068884117', '$2y$10$w.mSpsjJkikgP.FGMVe8GO4TfQggtE7Em1cD5Acbiu9Eu/7HV4iUm', '0', '19.04.2024 22:31:46', '16.10.2024 22:31:46', 'Not Activated', 0, NULL, NULL),
(21, 'Hello hshhs', 'Bshshshhs', 'rajihamidu401@gmail.com', 'Ggshha', '', '', 'Plumber', '08073566789', '$2y$10$DonTZn2LANRe2u9QVrrngep9iEJtFFjHf4mcZ2O6E89Soc7qmf/hm', '0', '20.04.2024 05:34:17', '17.10.2024 05:34:17', 'Not Activated', 0, NULL, NULL),
(22, 'RAPHAEL JOHNSONS INTEGRATED SERVICES ', 'RAPHAEL MONDAY J', 'enyiraph1@gmail.com', 'No 5 IDU court Abuja ', '', '', 'Provision Shop', '08030724344', '$2y$10$CoRSc89yNt/6C/iRRzCagOu0302lravLKIKVli0pkL4MIOuDU2u5K', '0', '21.04.2024 08:18:23', '18.10.2024 08:18:23', 'Not Activated', 0, NULL, NULL),
(23, 'hjsdhjhj', 'RjAde', 'hjadsjfjds@gmail.com', 'hjsadjf', '', '', 'Carpentry', '08099098909', '$2y$10$qvNz9Ovpqu2cvGoOa4.0ku0.tErLbSRzrCSPKNdmoISEjjvolvHxO', '0', '29.04.2024 14:11:04', '26.10.2024 14:11:04', 'Not Activated', 0, NULL, NULL),
(24, 'Alilo', 'Adam', 'adamalilo@gmail.com', 'Budget', '37', '', 'Provision Shop', '09045622345', '$2y$10$t23Vvc/jeSSBKiFIImcPxeZOjg/OybdBDd0immnaP.z1imc2./wZa', '0', '29.04.2024 14:24:17', '26.10.2024 14:24:17', 'Not Activated', 0, NULL, NULL),
(25, 'hsdahfsah', 'shadjhfdsaj', 'sdhfdjs@gmail.com', 'sbjdjfjashdj', '37', '', 'Provision Shop', '09000000945', '$2y$10$zFyveaIBdQPDzMsR7pVfA.j63Q4xkPax2gcn3k8.uIrvgp68kf7Fe', '0', '29.04.2024 14:28:20', '26.10.2024 14:28:20', 'Not Activated', 0, NULL, NULL),
(26, 'sahdfhdsahg', 'hgsdhghgdfshg', 'hgdsaf@gmail.com', 'jsdj', '3', '', 'Provision Shop', '08067999098', '$2y$10$ACI0QSjcHWjn.FsMeMUNZuOTC.3d95VFQkWfouhvdYiN5BQvBkYmu', '0', '29.04.2024 14:45:01', '26.10.2024 14:45:01', 'Not Activated', 0, NULL, NULL),
(27, 'hjjh', 'dhjhd', 'asdfhg@gmail.com', 'dsafsa', '1', '3', 'Plumber', '08035666245', '$2y$10$0O/68N68aD9gsvAKbgF2ze75oPckddUTS7dGgWaJkLEafxxN37Rvy', '0', '29.04.2024 16:28:56', '26.10.2024 16:28:56', 'Not Activated', 0, NULL, NULL),
(28, 'hgsadhgfh', 'hjsjfdsjds', 'shddfj@gmail.com', 'sajdjhfsdah', '1', 'Aba South', 'Provision Shop', '08045666290', '$2y$10$bolO5AZh1QMhXtMSj1cQZuo3vSfWp.Xd7Txgo/W38nSZUQmMMjeQ2', '0', '29.04.2024 16:30:49', '26.10.2024 16:30:49', 'Not Activated', 0, NULL, NULL),
(29, 'trdsatdgsahgfgdsh', 'hgdsaghfdshaghg', '8998dsfafjsaj@gmail.com', 'hgsdghdfshga', '5', 'Gamawa', 'Building Materials', '08067457386', '$2y$10$/EHlzIL5iRndTBmUw7uX0OM.C76n7DfU0078G9q0u1S0q/lL.F9ce', '0', '29.04.2024 16:57:21', '26.10.2024 16:57:21', 'Not Activated', 0, NULL, NULL),
(30, 'jhdsfjsjh', 'hjsdjhdsjh', 'jhsdjhdsjhsdjjhdsdj@gmail.com', 'shdghfsdahg', '1', 'Isiala Ngwa South', 'Provision Shop', '08044444898', '$2y$10$OsShG8MgJ0r7ONWWJJnJk.C7LFr/fsL.CcXRT9f1PNAhcKhX8J3ES', '0', '29.04.2024 16:59:06', '26.10.2024 16:59:06', 'Not Activated', 0, NULL, NULL),
(31, 'jhdsfjsjh', 'hjsdjhdsjh', 'jhsdjhdsj123@gmail.com', 'shdghfsdahg', '1', 'Isiala Ngwa South', 'Provision Shop', '08044444890', '$2y$10$b5HMdygV3DSeZK2s/BPrne/8gCnwhtgR/Vb5cbSdtBfV3Ej3IcGyS', '0', '29.04.2024 17:00:01', '26.10.2024 17:00:01', 'Not Activated', 0, NULL, NULL),
(32, 'hjjhxdcxhj', 'hjhj', 'hjhjfdsahjhds@gmail.com', 'hjsfjashdhj', '2', 'Demsa', 'Plumber', '08058888945', '$2y$10$.V0dYMrKhLupMGWWmUeHUOkPoMvcFNaU7NsDO1ql/VRqVw6Qv/58S', '0', '29.04.2024 17:02:00', '26.10.2024 17:02:00', 'Not Activated', 0, NULL, NULL),
(33, 'kjscxjcxjhhj', 'hjshjdshjsdhj', 'fsafdsahj@gmail.com', 'sjadfjdsa', '1', 'Aba South', 'Provision Shop', '08056777345', '$2y$10$Qm1TSwcaasjK2pc7TJsFUukchcfRhV/RKRcOX5OJktoY/PzAwpPq6', '0', '29.04.2024 17:08:49', '26.10.2024 17:08:49', 'Not Activated', 0, NULL, NULL),
(34, 'kjxjkdcjcxjh', 'hjchjxcxhjxcjh', 'hjcxjhcxjhcxjhcxhj@gmail.com', 'jhsajfdsaj', '2', 'Fufore', 'Provision Shop', '08049998467', '$2y$10$lbeJtpAxw2HmpVvNZLTTIOqdO2G3rhCf3iZctPzTfTAl5pU7OwFte', '0', '29.04.2024 17:09:42', '26.10.2024 17:09:42', 'Not Activated', 0, NULL, NULL),
(35, 'Azek-lins ', 'Collins Azeke', 'azkelins@gmail.com', 'B2012 urban shelter market apo resettlement fct Abuja ', '37', 'Abuja Municipal', 'Real Estate', '08132011434', '$2y$10$j5uVKbPNGZoG3vchu2m.deb0vinMQwNP2EGBTHDLTL0/2XuElQ4Re', '0', '05.05.2024 18:22:13', '01.11.2024 18:22:13', 'Not Activated', 0, NULL, NULL),
(36, 'Luku shop', 'Raji luku', 'luku@gmail.com', 'Ilewa', '5', 'Darazo', 'Electrician', '08067455873', '$2y$10$.65gBTMiXjSKGWcCqdUacuZOvO13icOAF6DOVJR8PUMKFIvUo.gne', '0', '06.05.2024 07:30:45', '02.11.2024 07:30:45', 'Not Activated', 0, NULL, NULL),
(37, 'Czar Enterprise', 'ABIBAT OGUNRINDE', 'abibatmotunrayo4278@gmail.com', 'Kabayi, Mararaba Nasarawa State', '25', 'Karu', 'Provision Shop', '08126346222', '$2y$10$jY9qw1ubbqqkqkJrtkQN9uHnrBAGg1OHygZxRgBjCDEiGhWxpEK5K', '0', '31.05.2024 15:42:46', '27.11.2024 15:42:46', 'Not Activated', 0, NULL, NULL);

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
(4, 'Sony', 0),
(5, 'LG', 0),
(6, 'Quality', 0),
(7, 'Excl', 0),
(8, 'Dangota', 0),
(9, 'Dr. Martens', 0),
(10, 'Hot Toys', 0),
(18, 'Sharp sand', 0),
(22, 'Farm Produce', 17),
(23, 'Kitchen Utensils', 17),
(24, 'Coca-Cola', 19),
(25, 'Consultant Services ', 22),
(26, 'Rice Brands', 17),
(27, 'Plaster sand ', 17),
(28, 'Okra Brands', 17),
(29, 'Tomato Brands', 17),
(30, 'Fish Brands', 17),
(31, 'Chicken Brands', 17),
(34, 'Kuja sand ', 19),
(35, 'Car Drop ', 19),
(37, 'Apple', 17),
(43, 'Abro', 17);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `seller_id` int(20) DEFAULT NULL,
  `qty` int(10) NOT NULL,
  `p_status` int(11) NOT NULL DEFAULT 0,
  `order_status` varchar(11) NOT NULL DEFAULT 'Not ordered'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `seller_id`, `qty`, `p_status`, `order_status`) VALUES
(27, 3, '127.0.0.1', 7, 17, 3, 0, 'Ordered'),
(28, 4, '127.0.0.1', 7, 16, 1, 0, 'Ordered'),
(29, 3, '127.0.0.1', 7, 17, 3, 0, 'Ordered'),
(30, 4, '127.0.0.1', 7, 16, 1, 0, 'Ordered'),
(31, 4, '127.0.0.1', 7, 16, 1, 0, 'Ordered'),
(32, 3, '127.0.0.1', 7, 17, 3, 0, 'Ordered'),
(33, 3, '127.0.0.1', 7, 17, 3, 0, 'Ordered'),
(34, 4, '127.0.0.1', 7, 16, 1, 0, 'Ordered'),
(35, 2, '127.0.0.1', 7, 16, 1, 0, 'Ordered'),
(36, 7, '127.0.0.1', 7, 17, 1, 0, 'Ordered'),
(37, 4, '127.0.0.1', 7, 16, 1, 0, 'Ordered'),
(38, 3, '127.0.0.1', 7, 17, 3, 0, 'Ordered'),
(40, 4, '127.0.0.1', 7, 16, 1, 0, 'Ordered'),
(41, 4, '127.0.0.1', 7, 16, 1, 0, 'Ordered'),
(42, 4, '127.0.0.1', 7, 16, 1, 0, 'Ordered'),
(43, 3, '127.0.0.1', 7, 17, 3, 0, 'Ordered'),
(44, 3, '127.0.0.1', 7, 17, 3, 0, 'Ordered'),
(45, 4, '127.0.0.1', 7, 16, 1, 0, 'Ordered'),
(46, 4, '127.0.0.1', 7, 16, 1, 0, 'Ordered'),
(47, 4, '197.210.76.113', 7, 16, 1, 0, 'Ordered'),
(48, 3, '197.210.77.188', 7, 17, 3, 0, 'Ordered'),
(49, 6, '197.210.71.78', 7, 16, 1, 0, 'Ordered'),
(50, 9, '41.78.82.41', 7, 16, 1, 0, 'Ordered'),
(51, 4, '41.78.82.41', 7, 16, 1, 0, 'Ordered'),
(52, 3, '197.210.53.67', 7, 17, 3, 0, 'Ordered'),
(53, 3, '', 14, 17, 1, 0, 'Ordered'),
(56, 3, '', 14, 17, 1, 0, 'Ordered'),
(57, 3, '', 14, 17, 1, 0, 'Ordered'),
(58, 5, '', 14, 17, 1, 0, 'Ordered'),
(59, 3, '', 14, 17, 1, 0, 'Ordered'),
(61, 5, '', 15, 17, 1, 0, 'Ordered'),
(62, 3, '', 15, 17, 1, 0, 'Ordered'),
(64, 9, '', 15, 16, 1, 0, 'Ordered'),
(65, 3, '', 7, 17, 3, 0, 'Ordered'),
(66, 7, '', 15, 17, 1, 0, 'Ordered'),
(69, 128, '', 16, 17, 1, 0, 'Ordered'),
(70, 127, '', 16, 17, 1, 0, 'Ordered'),
(71, 10, '', 16, 17, 1, 0, 'Ordered'),
(73, 127, '', 17, 17, 1, 0, 'Ordered'),
(74, 128, '', 17, 17, 1, 0, 'Ordered'),
(81, 7, '', 14, 17, 1, 0, 'Ordered'),
(83, 128, '', 18, 17, 1, 0, 'Ordered'),
(87, 7, '', 14, 17, 1, 0, 'Ordered'),
(92, 10, '', 14, 17, 1, 0, 'Ordered'),
(93, 9, '', 14, 16, 1, 0, 'Ordered'),
(94, 7, '', 14, 17, 1, 0, 'Ordered'),
(95, 128, '', 19, 17, 1, 0, 'Ordered'),
(96, 127, '', 19, 17, 1, 0, 'Ordered'),
(99, 128, '', 15, 17, 1, 0, 'Ordered'),
(103, 136, '', 15, 19, 1, 0, 'Ordered'),
(104, 133, '', 14, 19, 1, 0, 'Not ordered'),
(105, 133, '', 7, 19, 1, 0, 'Ordered'),
(106, 132, '', 7, 19, 1, 0, 'Ordered'),
(108, 132, '', 15, 19, 1, 0, 'Ordered'),
(109, 133, '', 7, 19, 1, 0, 'Ordered'),
(110, 10, '', 7, 17, 1, 0, 'Ordered'),
(112, 130, '', 20, 19, 1, 0, 'Not ordered'),
(113, 133, '', 15, 19, 1, 0, 'Not ordered'),
(115, 132, '', 7, 19, 1, 0, 'Ordered'),
(116, 133, '', 7, 19, 1, 0, 'Ordered'),
(117, 131, '', 7, 19, 1, 0, 'Ordered'),
(118, 10, '', 7, 17, 1, 0, 'Ordered'),
(119, 7, '', 7, 17, 1, 0, 'Ordered'),
(120, 137, '', 7, 17, 1, 0, 'Ordered'),
(121, 133, '', 7, 19, 1, 0, 'Ordered'),
(122, 137, '', 7, 17, 1, 0, 'Ordered'),
(123, 137, '', 7, 17, 1, 0, 'Ordered'),
(124, 10, '', 7, 17, 1, 0, 'Ordered'),
(125, 137, '', 7, 17, 1, 0, 'Ordered'),
(126, 137, '', 7, 17, 1, 0, 'Ordered'),
(127, 137, '', 7, 17, 1, 0, 'Ordered'),
(128, 133, '', 7, 19, 1, 0, 'Ordered'),
(129, 133, '', 7, 19, 1, 0, 'Ordered'),
(130, 137, '', 7, 17, 1, 0, 'Ordered'),
(131, 133, '', 7, 19, 1, 0, 'Ordered'),
(132, 137, '', 7, 17, 1, 0, 'Ordered'),
(133, 137, '', 7, 17, 1, 0, 'Ordered'),
(134, 138, '', 7, 9, 1, 0, 'Ordered'),
(135, 137, '', 7, 17, 1, 0, 'Ordered'),
(136, 137, '', 7, 17, 1, 0, 'Ordered'),
(137, 137, '', 7, 17, 1, 0, 'Not ordered');

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
(15, 'Grains'),
(16, 'Tuber'),
(17, 'Legume'),
(18, 'Provisions'),
(19, 'Food vendors'),
(20, 'Building materials '),
(21, 'Consultant Services '),
(22, 'FLight booking'),
(23, 'Staple Foods'),
(24, 'Soup Items'),
(25, 'Stew Items'),
(26, 'Plaster sand '),
(27, 'Sharp sand'),
(28, 'Tiles '),
(29, 'Novels'),
(30, 'Car Drop '),
(31, 'Toy');

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(1, 1, 4, 'hello', '2024-07-12 10:17:02', 1),
(2, 2, 4, 'hello', '2024-07-12 10:17:28', 1),
(3, 5, 4, 'Hello, How are you', '2024-07-12 10:19:15', 2),
(4, 4, 5, 'Im fine', '2024-07-12 10:20:11', 0),
(5, 4, 5, 'sdfjkaskjfjkasdjkf', '2024-07-12 10:26:53', 0),
(6, 5, 4, 'Hallow', '2024-07-12 10:46:19', 1),
(7, 16, 4, 'hello', '2024-07-12 16:25:17', 1),
(8, 16, 4, 'hello', '2024-07-12 16:25:20', 1),
(9, 16, 4, 'hello', '2024-07-12 16:25:20', 1),
(10, 16, 4, 'hello', '2024-07-12 16:25:20', 1),
(11, 16, 4, 'Hello', '2024-07-12 16:29:36', 1),
(12, 16, 4, 'hello', '2024-07-12 16:29:46', 1),
(13, 0, 4, 'ashjfjsadfjd', '2024-07-12 16:30:05', 1),
(14, 0, 4, 'how are you<br>', '2024-07-12 16:30:15', 1),
(15, 16, 4, 'hello', '2024-07-12 16:30:29', 1),
(16, 16, 4, 'sd', '2024-07-12 16:30:45', 1),
(17, 17, 4, 'Hello', '2024-07-12 16:32:30', 1),
(18, 17, 4, 'hello', '2024-07-12 16:34:23', 1),
(19, 17, 4, 'hello', '2024-07-12 16:34:30', 1),
(20, 17, 17, 'hello', '2024-07-12 16:35:27', 0),
(21, 17, 17, 'How are you', '2024-07-12 16:35:33', 0),
(22, 17, 17, 'hope you are good', '2024-07-12 16:35:42', 0),
(23, 17, 17, 'Hey Hello', '2024-07-12 16:51:59', 0),
(24, 16, 16, 'Hello', '2024-07-13 07:38:56', 2),
(25, 9, 0, 'Hello', '2024-07-13 07:40:11', 1),
(26, 9, 0, 'How are you', '2024-07-13 07:40:19', 1),
(27, 16, 16, 'Hello O', '2024-07-13 07:41:17', 2),
(28, 16, 16, 'Hello', '2024-07-13 07:47:29', 0),
(29, 16, 16, 'How are you', '2024-07-13 07:47:36', 0),
(30, 16, 16, 'Hellooooo', '2024-07-13 07:50:01', 0),
(31, 16, 16, 'Good Morning this is from Raji Hamidu', '2024-07-13 08:26:33', 0),
(32, 16, 16, 'Hello, This is from Mw', '2024-07-13 08:31:50', 0),
(33, 16, 7, 'Heyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', '2024-07-13 08:33:31', 0),
(34, 16, 7, 'hey', '2024-07-13 08:33:41', 0),
(35, 16, 16, 'Heyyy', '2024-07-13 08:34:08', 0),
(36, 16, 16, 'Good Morning', '2024-07-13 08:38:12', 0),
(37, 16, 16, 'How are you Ibrahim', '2024-07-13 08:38:24', 0),
(38, 16, 7, 'Adewale is here', '2024-07-13 08:49:26', 0),
(39, 16, 7, 'How are you doing today from Adewale', '2024-07-13 08:49:47', 0),
(40, 16, 7, 'Hello Raji, Is Adewale there', '2024-07-13 08:51:31', 0),
(41, 9, 0, 'Maru Maru', '2024-07-13 08:54:16', 1),
(42, 16, 7, 'Hello guy', '2024-07-13 09:44:20', 0),
(43, 16, 7, 'helpppppspspsppssp', '2024-07-13 10:18:59', 0),
(44, 0, 0, 'fsadsaf', '2024-07-13 10:21:23', 0),
(45, 9, 0, 'Hello Aburo Adeda', '2024-07-13 10:23:49', 1),
(46, 0, 0, 'Kilode', '2024-07-13 10:32:04', 0),
(47, 16, 0, 'Adedamola', '2024-07-13 10:34:31', 1),
(48, 16, 0, 'Adeosun', '2024-07-13 10:36:01', 1),
(49, 16, 7, 'hippoppotamus', '2024-07-13 10:45:51', 0),
(50, 9, 0, 'Ajewole', '2024-07-13 10:46:39', 1),
(51, 13, 0, 'Hello dear', '2024-07-13 11:21:18', 1),
(52, 9, 7, 'Omolade', '2024-07-13 11:24:02', 0),
(53, 7, 0, 'Hello dear', '2024-07-13 11:33:39', 1),
(54, 7, 0, 'Adeoye Raheemmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm', '2024-07-13 11:35:03', 1),
(55, 7, 0, 'dssdsd', '2024-07-13 11:36:14', 1),
(56, 0, 0, 'Adedamola Isola', '2024-07-13 11:37:30', 0),
(57, 7, 0, 'Ammarrrrrrrrrrrrrruuuuuuuuuuuuuu', '2024-07-13 11:40:06', 1),
(58, 16, 7, 'Kuli Kuli Kuli', '2024-07-13 12:00:14', 0),
(59, 7, 16, 'adeda', '2024-07-13 12:03:56', 0),
(60, 16, 7, 'Ikuewero', '2024-07-13 12:05:11', 0),
(61, 7, 16, 'hey', '2024-07-13 13:24:21', 0),
(62, 0, 0, 'hello', '2024-07-13 13:47:41', 1),
(63, 0, 0, 'demolas', '2024-07-13 13:47:48', 1),
(64, 16, 7, 'Hope I will Get it soon?', '2024-07-13 13:49:19', 0),
(65, 7, 9, 'hey', '2024-07-13 13:57:07', 0),
(66, 7, 9, 'Heyyyy', '2024-07-13 13:57:19', 0),
(67, 0, 0, 'hello hello<br>', '2024-07-13 14:03:15', 1),
(68, 7, 16, 'hey, I see this', '2024-07-13 14:04:08', 0),
(69, 16, 7, 'Yeyeyeyeyeyeyey', '2024-07-13 14:11:25', 0),
(70, 7, 16, 'okkkk', '2024-07-13 14:12:05', 0),
(71, 16, 7, 'Heyyy Afternoon', '2024-07-13 14:24:57', 0),
(72, 7, 16, 'Response Given', '2024-07-13 14:26:10', 0),
(73, 17, 7, 'Hallo dear', '2024-07-13 14:35:12', 0),
(74, 16, 7, 'Hwyyyyyyyyyyyyyyyyyyy?', '2024-07-13 14:38:07', 0),
(75, 16, 7, 'kjjdskjdskj?', '2024-07-13 14:38:23', 0),
(76, 17, 7, 'hey how far', '2024-07-13 14:38:54', 0),
(77, 7, 16, 'Hello dear', '2024-07-13 14:42:49', 0),
(78, 9, 9, 'hello dear', '2024-07-14 08:47:56', 0),
(79, 9, 9, 'How are you doing', '2024-07-14 08:48:07', 0),
(80, 9, 7, 'How are you\n', '2024-08-11 06:50:58', 1),
(81, 17, 7, 'Hello, Good morning\n', '2024-08-11 06:54:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_complaints`
--

CREATE TABLE `customer_complaints` (
  `sn` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `complaints` text DEFAULT NULL,
  `file_name` varchar(50) DEFAULT NULL,
  `submDate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer_complaints`
--

INSERT INTO `customer_complaints` (`sn`, `user_id`, `email`, `phone`, `complaints`, `file_name`, `submDate`) VALUES
(1, 7, 'rajihamidu90@gmail.com', '08067555555', 'jh hjdshjdshjdshjdshjds', NULL, '24-06-2024 02:28 PM');

-- --------------------------------------------------------

--
-- Table structure for table `customer_complaints_replies`
--

CREATE TABLE `customer_complaints_replies` (
  `sn` int(11) NOT NULL,
  `complaint_id` int(11) DEFAULT NULL,
  `replier_email` varchar(255) DEFAULT NULL,
  `reply_text` text DEFAULT NULL,
  `reply_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_complaints_replies`
--

INSERT INTO `customer_complaints_replies` (`sn`, `complaint_id`, `replier_email`, `reply_text`, `reply_date`) VALUES
(1, 1, 'jettahconnect24@gmail.com', 'TYndsajhdhjasndmnds', '2024-06-24 13:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `lgas`
--

CREATE TABLE `lgas` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `state_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lgas`
--

INSERT INTO `lgas` (`id`, `name`, `state_id`) VALUES
(1, 'Aba North', 1),
(2, 'Aba South', 1),
(3, 'Arochukwu', 1),
(4, 'Bende', 1),
(5, 'Ikwuano', 1),
(6, 'Isiala Ngwa North', 1),
(7, 'Isiala Ngwa South', 1),
(8, 'Isuikwuato', 1),
(9, 'Obi Ngwa', 1),
(10, 'Ohafia', 1),
(11, 'Osisioma', 1),
(12, 'Ugwunagbo', 1),
(13, 'Ukwa East', 1),
(14, 'Ukwa West', 1),
(15, 'Umuahia North', 1),
(16, 'Umuahia South', 1),
(17, 'Umu-Nneochi', 1),
(18, 'Demsa', 2),
(19, 'Fufore', 2),
(20, 'Ganye', 2),
(21, 'Girei', 2),
(22, 'Gombi', 2),
(23, 'Guyuk', 2),
(24, 'Hong', 2),
(25, 'Jada', 2),
(26, 'Lamurde', 2),
(27, 'Madagali', 2),
(28, 'Maiha', 2),
(29, 'Mayo-Belwa', 2),
(30, 'Michika', 2),
(31, 'Mubi North', 2),
(32, 'Mubi South', 2),
(33, 'Numan', 2),
(34, 'Shelleng', 2),
(35, 'Song', 2),
(36, 'Toungo', 2),
(37, 'Yola North', 2),
(38, 'Yola South', 2),
(39, 'Abak', 3),
(40, 'Eastern Obolo', 3),
(41, 'Eket', 3),
(42, 'Esit Eket', 3),
(43, 'Essien Udim', 3),
(44, 'Etim Ekpo', 3),
(45, 'Etinan', 3),
(46, 'Ibeno', 3),
(47, 'Ibesikpo Asutan', 3),
(48, 'Ibiono-Ibom', 3),
(49, 'Ika', 3),
(50, 'Ikono', 3),
(51, 'Ikot Abasi', 3),
(52, 'Ikot Ekpene', 3),
(53, 'Ini', 3),
(54, 'Itu', 3),
(55, 'Mbo', 3),
(56, 'Mkpat-Enin', 3),
(57, 'Nsit-Atai', 3),
(58, 'Nsit-Ibom', 3),
(59, 'Nsit-Ubium', 3),
(60, 'Obot Akara', 3),
(61, 'Okobo', 3),
(62, 'Onna', 3),
(63, 'Oron', 3),
(64, 'Oruk Anam', 3),
(65, 'Udung-Uko', 3),
(66, 'Ukanafun', 3),
(67, 'Uruan', 3),
(68, 'Urue-Offong/Oruko', 3),
(69, 'Uyo', 3),
(70, 'Aguata', 4),
(71, 'Anambra East', 4),
(72, 'Anambra West', 4),
(73, 'Anaocha', 4),
(74, 'Awka North', 4),
(75, 'Awka South', 4),
(76, 'Ayamelum', 4),
(77, 'Dunukofia', 4),
(78, 'Ekwusigo', 4),
(79, 'Idemili North', 4),
(80, 'Idemili South', 4),
(81, 'Ihiala', 4),
(82, 'Njikoka', 4),
(83, 'Nnewi North', 4),
(84, 'Nnewi South', 4),
(85, 'Ogbaru', 4),
(86, 'Onitsha North', 4),
(87, 'Onitsha South', 4),
(88, 'Orumba North', 4),
(89, 'Orumba South', 4),
(90, 'Oyi', 4),
(91, 'Alkaleri', 5),
(92, 'Bauchi', 5),
(93, 'Bogoro', 5),
(94, 'Damban', 5),
(95, 'Darazo', 5),
(96, 'Dass', 5),
(97, 'Gamawa', 5),
(98, 'Ganjuwa', 5),
(99, 'Giade', 5),
(100, 'Itas/Gadau', 5),
(101, 'Jama’are', 5),
(102, 'Katagum', 5),
(103, 'Kirfi', 5),
(104, 'Misau', 5),
(105, 'Ningi', 5),
(106, 'Shira', 5),
(107, 'Tafawa Balewa', 5),
(108, 'Toro', 5),
(109, 'Warji', 5),
(110, 'Zaki', 5),
(111, 'Brass', 6),
(112, 'Ekeremor', 6),
(113, 'Kolokuma/Opokuma', 6),
(114, 'Nembe', 6),
(115, 'Ogbia', 6),
(116, 'Sagbama', 6),
(117, 'Southern Ijaw', 6),
(118, 'Yenagoa', 6),
(119, 'Ado', 7),
(120, 'Agatu', 7),
(121, 'Apa', 7),
(122, 'Buruku', 7),
(123, 'Gboko', 7),
(124, 'Guma', 7),
(125, 'Gwer East', 7),
(126, 'Gwer West', 7),
(127, 'Katsina-Ala', 7),
(128, 'Konshisha', 7),
(129, 'Kwande', 7),
(130, 'Logo', 7),
(131, 'Makurdi', 7),
(132, 'Obi', 7),
(133, 'Ogbadibo', 7),
(134, 'Ohimini', 7),
(135, 'Oju', 7),
(136, 'Okpokwu', 7),
(137, 'Otukpo', 7),
(138, 'Tarka', 7),
(139, 'Ukum', 7),
(140, 'Ushongo', 7),
(141, 'Vandeikya', 7),
(142, 'Abadam', 8),
(143, 'Askira/Uba', 8),
(144, 'Bama', 8),
(145, 'Bayo', 8),
(146, 'BiU', 8),
(147, 'Chibok', 8),
(148, 'Damboa', 8),
(149, 'Dikwa', 8),
(150, 'Gubio', 8),
(151, 'Guzamala', 8),
(152, 'Gwoza', 8),
(153, 'Hawul', 8),
(154, 'Jere', 8),
(155, 'Kaga', 8),
(156, 'Kala/Balge', 8),
(157, 'Konduga', 8),
(158, 'Kukawa', 8),
(159, 'Kwaya Kusar', 8),
(160, 'Mafa', 8),
(161, 'Magumeri', 8),
(162, 'Maiduguri', 8),
(163, 'Marte', 8),
(164, 'Mobbar', 8),
(165, 'Monguno', 8),
(166, 'Ngala', 8),
(167, 'Nganzai', 8),
(168, 'Shani', 8),
(169, 'Abi', 9),
(170, 'Akamkpa', 9),
(171, 'Akpabuyo', 9),
(172, 'Bakassi', 9),
(173, 'Bekwarra', 9),
(174, 'Biase', 9),
(175, 'Boki', 9),
(176, 'Calabar Municipal', 9),
(177, 'Calabar South', 9),
(178, 'Etung', 9),
(179, 'Ikom', 9),
(180, 'Obanliku', 9),
(181, 'Obubra', 9),
(182, 'Obudu', 9),
(183, 'Odukpani', 9),
(184, 'Ogoja', 9),
(185, 'Yakuur', 9),
(186, 'Yala', 9),
(187, 'Aniocha North', 10),
(188, 'Aniocha South', 10),
(189, 'Bomadi', 10),
(190, 'Burutu', 10),
(191, 'Ethiope East', 10),
(192, 'Ethiope West', 10),
(193, 'Ika North East', 10),
(194, 'Ika South', 10),
(195, 'Isoko North', 10),
(196, 'Isoko South', 10),
(197, 'Ndokwa East', 10),
(198, 'Ndokwa West', 10),
(199, 'Okpe', 10),
(200, 'Oshimili North', 10),
(201, 'Oshimili South', 10),
(202, 'Patani', 10),
(203, 'Sapele', 10),
(204, 'Udu', 10),
(205, 'Ughelli North', 10),
(206, 'Ughelli South', 10),
(207, 'Ukwuani', 10),
(208, 'Uvwie', 10),
(209, 'Warri North', 10),
(210, 'Warri South', 10),
(211, 'Warri South West', 10),
(212, 'Abakaliki', 11),
(213, 'Afikpo North', 11),
(214, 'Afikpo South', 11),
(215, 'Ebonyi', 11),
(216, 'Ezza North', 11),
(217, 'Ezza South', 11),
(218, 'Ikwo', 11),
(219, 'Ishielu', 11),
(220, 'Ivo', 11),
(221, 'Izzi', 11),
(222, 'Ohaozara', 11),
(223, 'Ohaukwu', 11),
(224, 'Onicha', 11),
(225, 'Akoko-Edo', 12),
(226, 'Egor', 12),
(227, 'Esan Central', 12),
(228, 'Esan North-East', 12),
(229, 'Esan South-East', 12),
(230, 'Esan West', 12),
(231, 'Etsako Central', 12),
(232, 'Etsako East', 12),
(233, 'Etsako West', 12),
(234, 'Igueben', 12),
(235, 'Ikpoba Okha', 12),
(236, 'Orhionmwon', 12),
(237, 'Oredo', 12),
(238, 'Ovia North-East', 12),
(239, 'Ovia South-West', 12),
(240, 'Owan East', 12),
(241, 'Owan West', 12),
(242, 'Uhunmwonde', 12),
(243, 'Ado Ekiti', 13),
(244, 'Efon', 13),
(245, 'Ekiti East', 13),
(246, 'Ekiti South-West', 13),
(247, 'Ekiti West', 13),
(248, 'Emure', 13),
(249, 'Gbonyin', 13),
(250, 'Ido Osi', 13),
(251, 'Ijero', 13),
(252, 'Ikere', 13),
(253, 'Ikole', 13),
(254, 'Ilejemeje', 13),
(255, 'Irepodun/Ifelodun', 13),
(256, 'Ise/Orun', 13),
(257, 'Moba', 13),
(258, 'Oye', 13),
(259, 'Aninri', 14),
(260, 'Awgu', 14),
(261, 'Enugu East', 14),
(262, 'Enugu North', 14),
(263, 'Enugu South', 14),
(264, 'Ezeagu', 14),
(265, 'Igbo Etiti', 14),
(266, 'Igbo Eze North', 14),
(267, 'Igbo Eze South', 14),
(268, 'Isi Uzo', 14),
(269, 'Nkanu East', 14),
(270, 'Nkanu West', 14),
(271, 'Nsukka', 14),
(272, 'Oji River', 14),
(273, 'Udenu', 14),
(274, 'Udi', 14),
(275, 'Uzo Uwani', 14),
(276, 'Akko', 15),
(277, 'Balanga', 15),
(278, 'Billiri', 15),
(279, 'Dukku', 15),
(280, 'Funakaye', 15),
(281, 'Gombe', 15),
(282, 'Kaltungo', 15),
(283, 'Kwami', 15),
(284, 'Nafada', 15),
(285, 'Shongom', 15),
(286, 'Yamaltu/Deba', 15),
(287, 'Aboh Mbaise', 16),
(288, 'Ahiazu Mbaise', 16),
(289, 'Ehime Mbano', 16),
(290, 'Ezinihitte', 16),
(291, 'Ideato North', 16),
(292, 'Ideato South', 16),
(293, 'Ihitte/Uboma', 16),
(294, 'Ikeduru', 16),
(295, 'Isiala Mbano', 16),
(296, 'Isu', 16),
(297, 'Mbaitoli', 16),
(298, 'Ngor Okpala', 16),
(299, 'Njaba', 16),
(300, 'Nkwerre', 16),
(301, 'Nwangele', 16),
(302, 'Obowo', 16),
(303, 'Oguta', 16),
(304, 'Ohaji/Egbema', 16),
(305, 'Okigwe', 16),
(306, 'Orlu', 16),
(307, 'Orsu', 16),
(308, 'Oru East', 16),
(309, 'Oru West', 16),
(310, 'Owerri Municipal', 16),
(311, 'Owerri North', 16),
(312, 'Owerri West', 16),
(313, 'Auyo', 17),
(314, 'Babura', 17),
(315, 'Biriniwa', 17),
(316, 'Birnin Kudu', 17),
(317, 'Buji', 17),
(318, 'Dutse', 17),
(319, 'Gagarawa', 17),
(320, 'Garki', 17),
(321, 'Gumel', 17),
(322, 'Guri', 17),
(323, 'Gwaram', 17),
(324, 'Gwiwa', 17),
(325, 'Hadejia', 17),
(326, 'Jahun', 17),
(327, 'Kafin Hausa', 17),
(328, 'Kaugama', 17),
(329, 'Kazaure', 17),
(330, 'Kiri Kasama', 17),
(331, 'Kiyawa', 17),
(332, 'Maigatari', 17),
(333, 'Malam Madori', 17),
(334, 'Miga', 17),
(335, 'Ringim', 17),
(336, 'Roni', 17),
(337, 'Sule Tankarkar', 17),
(338, 'Taura', 17),
(339, 'Yankwashi', 17),
(340, 'Birnin Gwari', 18),
(341, 'Chikun', 18),
(342, 'Giwa', 18),
(343, 'Igabi', 18),
(344, 'Ikara', 18),
(345, 'Jaba', 18),
(346, 'Jema’a', 18),
(347, 'Kachia', 18),
(348, 'Kaduna North', 18),
(349, 'Kaduna South', 18),
(350, 'Kagarko', 18),
(351, 'Kajuru', 18),
(352, 'Kaura', 18),
(353, 'Kauru', 18),
(354, 'Kubau', 18),
(355, 'Kudan', 18),
(356, 'Lere', 18),
(357, 'Makarfi', 18),
(358, 'Sabon Gari', 18),
(359, 'Sanga', 18),
(360, 'Soba', 18),
(361, 'Zangon Kataf', 18),
(362, 'Zaria', 18),
(363, 'Ajingi', 19),
(364, 'Albasu', 19),
(365, 'Bagwai', 19),
(366, 'Bebeji', 19),
(367, 'Bichi', 19),
(368, 'Bunkure', 19),
(369, 'Dala', 19),
(370, 'Dambatta', 19),
(371, 'Dawakin Kudu', 19),
(372, 'Dawakin Tofa', 19),
(373, 'Doguwa', 19),
(374, 'Fagge', 19),
(375, 'Gabasawa', 19),
(376, 'Garko', 19),
(377, 'Garun Mallam', 19),
(378, 'Gaya', 19),
(379, 'Gezawa', 19),
(380, 'Gwale', 19),
(381, 'Gwarzo', 19),
(382, 'Kabo', 19),
(383, 'Kano Municipal', 19),
(384, 'Karaye', 19),
(385, 'Kibiya', 19),
(386, 'Kiru', 19),
(387, 'Kumbotso', 19),
(388, 'Kunchi', 19),
(389, 'Kura', 19),
(390, 'Madobi', 19),
(391, 'Makoda', 19),
(392, 'Minjibir', 19),
(393, 'Nasarawa', 19),
(394, 'Rano', 19),
(395, 'Rimin Gado', 19),
(396, 'Rogo', 19),
(397, 'Shanono', 19),
(398, 'Sumaila', 19),
(399, 'Takai', 19),
(400, 'Tarauni', 19),
(401, 'Tofa', 19),
(402, 'Tsanyawa', 19),
(403, 'Tudun Wada', 19),
(404, 'Ungogo', 19),
(405, 'Warawa', 19),
(406, 'Wudil', 19),
(407, 'Bakori', 20),
(408, 'Batagarawa', 20),
(409, 'Batsari', 20),
(410, 'Baure', 20),
(411, 'Bindawa', 20),
(412, 'Charanchi', 20),
(413, 'Dan Musa', 20),
(414, 'Dandume', 20),
(415, 'Danja', 20),
(416, 'Daura', 20),
(417, 'Dutsi', 20),
(418, 'Dutsin Ma', 20),
(419, 'Faskari', 20),
(420, 'Funtua', 20),
(421, 'Ingawa', 20),
(422, 'Jibia', 20),
(423, 'Kafur', 20),
(424, 'Kaita', 20),
(425, 'Kankara', 20),
(426, 'Kankia', 20),
(427, 'Katsina', 20),
(428, 'Kurfi', 20),
(429, 'Kusada', 20),
(430, 'Mai’Adua', 20),
(431, 'Malumfashi', 20),
(432, 'Mani', 20),
(433, 'Mashi', 20),
(434, 'Matazu', 20),
(435, 'Musawa', 20),
(436, 'Rimi', 20),
(437, 'Sabuwa', 20),
(438, 'Safana', 20),
(439, 'Sandamu', 20),
(440, 'Zango', 20),
(441, 'Aleiro', 21),
(442, 'Arewa Dandi', 21),
(443, 'Argungu', 21),
(444, 'Augie', 21),
(445, 'Bagudo', 21),
(446, 'Birnin Kebbi', 21),
(447, 'Bunza', 21),
(448, 'Dandi', 21),
(449, 'Fakai', 21),
(450, 'Gwandu', 21),
(451, 'Jega', 21),
(452, 'Kalgo', 21),
(453, 'Koko/Besse', 21),
(454, 'Maiyama', 21),
(455, 'Ngaski', 21),
(456, 'Sakaba', 21),
(457, 'Shanga', 21),
(458, 'Suru', 21),
(459, 'Wasagu/Danko', 21),
(460, 'Yauri', 21),
(461, 'Zuru', 21),
(462, 'Adavi', 22),
(463, 'Ajaokuta', 22),
(464, 'Ankpa', 22),
(465, 'Bassa', 22),
(466, 'Dekina', 22),
(467, 'Ibaji', 22),
(468, 'Idah', 22),
(469, 'Igalamela-Odolu', 22),
(470, 'Ijumu', 22),
(471, 'Kabba/Bunu', 22),
(472, 'Kogi', 22),
(473, 'Lokoja', 22),
(474, 'Mopa-Muro', 22),
(475, 'Ofu', 22),
(476, 'Ogori/Magongo', 22),
(477, 'Okehi', 22),
(478, 'Okene', 22),
(479, 'Olamaboro', 22),
(480, 'Omala', 22),
(481, 'Yagba East', 22),
(482, 'Yagba West', 22),
(483, 'Asa', 23),
(484, 'Baruten', 23),
(485, 'Edu', 23),
(486, 'Ekiti', 23),
(487, 'Ifelodun', 23),
(488, 'Ilorin East', 23),
(489, 'Ilorin South', 23),
(490, 'Ilorin West', 23),
(491, 'Irepodun', 23),
(492, 'Isin', 23),
(493, 'Kaiama', 23),
(494, 'Moro', 23),
(495, 'Offa', 23),
(496, 'Oke Ero', 23),
(497, 'Oyun', 23),
(498, 'Pategi', 23),
(499, 'Agege', 24),
(500, 'Ajeromi-Ifelodun', 24),
(501, 'Alimosho', 24),
(502, 'Amuwo-Odofin', 24),
(503, 'Apapa', 24),
(504, 'Badagry', 24),
(505, 'Epe', 24),
(506, 'Eti-Osa', 24),
(507, 'Ibeju-Lekki', 24),
(508, 'Ifako-Ijaiye', 24),
(509, 'Ikeja', 24),
(510, 'Ikorodu', 24),
(511, 'Kosofe', 24),
(512, 'Lagos Island', 24),
(513, 'Lagos Mainland', 24),
(514, 'Mushin', 24),
(515, 'Ojo', 24),
(516, 'Oshodi-Isolo', 24),
(517, 'Shomolu', 24),
(518, 'Surulere', 24),
(519, 'Awe', 25),
(520, 'Doma', 25),
(521, 'Karu', 25),
(522, 'Keana', 25),
(523, 'Keffi', 25),
(524, 'Kokona', 25),
(525, 'Lafia', 25),
(526, 'Nasarawa', 25),
(527, 'Nasarawa Egon', 25),
(528, 'Obi', 25),
(529, 'Toto', 25),
(530, 'Wamba', 25),
(531, 'Agaie', 26),
(532, 'Agwara', 26),
(533, 'Bida', 26),
(534, 'Borgu', 26),
(535, 'Bosso', 26),
(536, 'Chanchaga', 26),
(537, 'Edati', 26),
(538, 'Gbako', 26),
(539, 'Gurara', 26),
(540, 'Katcha', 26),
(541, 'Kontagora', 26),
(542, 'Lapai', 26),
(543, 'Lavun', 26),
(544, 'Magama', 26),
(545, 'Mariga', 26),
(546, 'Mashegu', 26),
(547, 'Mokwa', 26),
(548, 'Munya', 26),
(549, 'Paikoro', 26),
(550, 'Rafi', 26),
(551, 'Rijau', 26),
(552, 'Shiroro', 26),
(553, 'Suleja', 26),
(554, 'Tafa', 26),
(555, 'Wushishi', 26),
(556, 'Abeokuta North', 27),
(557, 'Abeokuta South', 27),
(558, 'Ado-Odo/Ota', 27),
(559, 'Egbado North', 27),
(560, 'Egbado South', 27),
(561, 'Ewekoro', 27),
(562, 'Ifo', 27),
(563, 'Ijebu East', 27),
(564, 'Ijebu North', 27),
(565, 'Ijebu North East', 27),
(566, 'Ijebu Ode', 27),
(567, 'Ikenne', 27),
(568, 'Imeko Afon', 27),
(569, 'Ipokia', 27),
(570, 'Obafemi Owode', 27),
(571, 'Odeda', 27),
(572, 'Odogbolu', 27),
(573, 'Ogun Waterside', 27),
(574, 'Remo North', 27),
(575, 'Shagamu', 27),
(576, 'Akoko North-East', 28),
(577, 'Akoko North-West', 28),
(578, 'Akoko South-West', 28),
(579, 'Akoko South-East', 28),
(580, 'Akure North', 28),
(581, 'Akure South', 28),
(582, 'Ese Odo', 28),
(583, 'Idanre', 28),
(584, 'Ifedore', 28),
(585, 'Ilaje', 28),
(586, 'Ile Oluji/Okeigbo', 28),
(587, 'Irele', 28),
(588, 'Odigbo', 28),
(589, 'Okitipupa', 28),
(590, 'Ondo East', 28),
(591, 'Ondo West', 28),
(592, 'Ose', 28),
(593, 'Owo', 28),
(594, 'Atakumosa East', 29),
(595, 'Atakumosa West', 29),
(596, 'Aiyedaade', 29),
(597, 'Aiyedire', 29),
(598, 'Boluwaduro', 29),
(599, 'Boripe', 29),
(600, 'Ede North', 29),
(601, 'Ede South', 29),
(602, 'Egbedore', 29),
(603, 'Ejigbo', 29),
(604, 'Ife Central', 29),
(605, 'Ife East', 29),
(606, 'Ife North', 29),
(607, 'Ife South', 29),
(608, 'Ifedayo', 29),
(609, 'Ifelodun', 29),
(610, 'Ila', 29),
(611, 'Ilesa East', 29),
(612, 'Ilesa West', 29),
(613, 'Irepodun', 29),
(614, 'Irewole', 29),
(615, 'Isokan', 29),
(616, 'Iwo', 29),
(617, 'Obokun', 29),
(618, 'Odo Otin', 29),
(619, 'Ola Oluwa', 29),
(620, 'Olorunda', 29),
(621, 'Oriade', 29),
(622, 'Orolu', 29),
(623, 'Osogbo', 29),
(624, 'Afijio', 30),
(625, 'Akinyele', 30),
(626, 'Atiba', 30),
(627, 'Atisbo', 30),
(628, 'Egbeda', 30),
(629, 'Ibadan North', 30),
(630, 'Ibadan North-East', 30),
(631, 'Ibadan North-West', 30),
(632, 'Ibadan South-East', 30),
(633, 'Ibadan South-West', 30),
(634, 'Ibarapa Central', 30),
(635, 'Ibarapa East', 30),
(636, 'Ibarapa North', 30),
(637, 'Ido', 30),
(638, 'Irepo', 30),
(639, 'Iseyin', 30),
(640, 'Itesiwaju', 30),
(641, 'Iwajowa', 30),
(642, 'Kajola', 30),
(643, 'Lagelu', 30),
(644, 'Ogbomosho North', 30),
(645, 'Ogbomosho South', 30),
(646, 'Ogo Oluwa', 30),
(647, 'Olorunsogo', 30),
(648, 'Oluyole', 30),
(649, 'Ona Ara', 30),
(650, 'Orelope', 30),
(651, 'Ori Ire', 30),
(652, 'Oyo East', 30),
(653, 'Oyo West', 30),
(654, 'Saki East', 30),
(655, 'Saki West', 30),
(656, 'Surulere', 30),
(657, 'Barkin Ladi', 31),
(658, 'Bassa', 31),
(659, 'Bokkos', 31),
(660, 'Jos East', 31),
(661, 'Jos North', 31),
(662, 'Jos South', 31),
(663, 'Kanam', 31),
(664, 'Kanke', 31),
(665, 'Langtang North', 31),
(666, 'Langtang South', 31),
(667, 'Mangu', 31),
(668, 'Mikang', 31),
(669, 'Pankshin', 31),
(670, 'Qua’an Pan', 31),
(671, 'Riyom', 31),
(672, 'Shendam', 31),
(673, 'Wase', 31),
(674, 'Abua/Odual', 32),
(675, 'Ahoada East', 32),
(676, 'Ahoada West', 32),
(677, 'Akuku-Toru', 32),
(678, 'Andoni', 32),
(679, 'Asari-Toru', 32),
(680, 'Bonny', 32),
(681, 'Degema', 32),
(682, 'Eleme', 32),
(683, 'Emuoha', 32),
(684, 'Etche', 32),
(685, 'Gokana', 32),
(686, 'Ikwerre', 32),
(687, 'Khana', 32),
(688, 'Obio/Akpor', 32),
(689, 'Ogba/Egbema/Ndoni', 32),
(690, 'Ogu/Bolo', 32),
(691, 'Okrika', 32),
(692, 'Omuma', 32),
(693, 'Opobo/Nkoro', 32),
(694, 'Oyigbo', 32),
(695, 'Port Harcourt', 32),
(696, 'Tai', 32),
(697, 'Binji', 33),
(698, 'Bodinga', 33),
(699, 'Dange Shuni', 33),
(700, 'Gada', 33),
(701, 'Goronyo', 33),
(702, 'Gudu', 33),
(703, 'Gwadabawa', 33),
(704, 'Illela', 33),
(705, 'Isa', 33),
(706, 'Kebbe', 33),
(707, 'Kware', 33),
(708, 'Rabah', 33),
(709, 'Sabon Birni', 33),
(710, 'Shagari', 33),
(711, 'Silame', 33),
(712, 'Sokoto North', 33),
(713, 'Sokoto South', 33),
(714, 'Tambuwal', 33),
(715, 'Tangaza', 33),
(716, 'Tureta', 33),
(717, 'Wamako', 33),
(718, 'Wurno', 33),
(719, 'Yabo', 33),
(720, 'Ardo Kola', 34),
(721, 'Bali', 34),
(722, 'Donga', 34),
(723, 'Gashaka', 34),
(724, 'Gassol', 34),
(725, 'Ibi', 34),
(726, 'Jalingo', 34),
(727, 'Karim Lamido', 34),
(728, 'Kumi', 34),
(729, 'Lau', 34),
(730, 'Sardauna', 34),
(731, 'Takum', 34),
(732, 'Ussa', 34),
(733, 'Wukari', 34),
(734, 'Yorro', 34),
(735, 'Zing', 34),
(736, 'Bade', 35),
(737, 'Bursari', 35),
(738, 'Damaturu', 35),
(739, 'Fika', 35),
(740, 'Fune', 35),
(741, 'Geidam', 35),
(742, 'Gujba', 35),
(743, 'Gulani', 35),
(744, 'Jakusko', 35),
(745, 'Karasuwa', 35),
(746, 'Machina', 35),
(747, 'Nangere', 35),
(748, 'Nguru', 35),
(749, 'Potiskum', 35),
(750, 'Tarmuwa', 35),
(751, 'Yunusari', 35),
(752, 'Yusufari', 35),
(753, 'Abaji', 37),
(754, 'Abuja Municipal', 37),
(755, 'Bwari', 37),
(756, 'Gwagwalada', 37),
(757, 'Kuje', 37),
(758, 'Kwali', 37);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `password`) VALUES
(4, 'rajihamidu', '$2y$10$PpWT3JVitqGa8VhqO7UAnOuR.ltT/j4DoTar9LvJn6s08bVk2Dkcu'),
(5, 'ammaar', '$2y$10$wpyMA269q5m46XdYbv.jn.COos1UO0fRzP6oy8FgiKdmejOoeRCp.');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(1, 4, '2024-07-12 10:17:29', 'no'),
(2, 4, '2024-07-12 10:19:15', 'no'),
(3, 5, '2024-07-12 10:44:44', 'no'),
(4, 4, '2024-07-12 16:36:17', 'no'),
(5, 0, '2024-07-13 10:05:24', 'no'),
(6, 7, '2024-07-13 10:20:54', 'no'),
(7, 16, '2024-07-13 10:45:13', 'no'),
(8, 7, '2024-07-13 10:45:59', 'no'),
(9, 16, '2024-07-13 11:11:42', 'no'),
(10, 7, '2024-07-13 11:18:57', 'no'),
(11, 16, '2024-07-13 11:23:11', 'no'),
(12, 7, '2024-07-13 11:30:15', 'no'),
(13, 7, '2024-07-13 11:32:43', 'no'),
(14, 16, '2024-07-13 11:36:56', 'no'),
(15, 16, '2024-07-13 11:58:56', 'no'),
(16, 7, '2024-07-13 12:02:46', 'no'),
(17, 16, '2024-07-13 12:04:26', 'no'),
(18, 7, '2024-07-13 12:05:20', 'no'),
(19, 16, '2024-07-13 13:47:59', 'no'),
(20, 7, '2024-07-13 13:56:03', 'no'),
(21, 7, '2024-07-13 13:56:19', 'no'),
(22, 9, '2024-07-13 14:03:30', 'no'),
(23, 16, '2024-07-13 14:07:08', 'no'),
(24, 7, '2024-07-13 14:11:34', 'no'),
(25, 16, '2024-07-13 14:17:25', 'no'),
(26, 7, '2024-07-13 14:25:52', 'no'),
(27, 16, '2024-07-13 14:26:12', 'no'),
(28, 7, '2024-07-13 14:35:26', 'no'),
(29, 16, '2024-07-13 14:37:18', 'no'),
(30, 7, '2024-07-13 14:39:10', 'no'),
(31, 16, '2024-07-13 14:39:35', 'no'),
(32, 17, '2024-07-13 14:42:13', 'no'),
(33, 16, '2024-07-13 14:43:33', 'no'),
(34, 7, '2024-07-14 08:12:10', 'no'),
(35, 7, '2024-07-14 08:12:11', 'no'),
(36, 7, '2024-07-14 08:12:11', 'no'),
(37, 7, '2024-07-14 08:44:56', 'no'),
(38, 9, '2024-07-14 08:48:18', 'no'),
(39, 7, '2024-07-14 08:52:51', 'no'),
(40, 9, '2024-07-14 08:54:07', 'no'),
(41, 9, '2024-07-14 09:03:31', 'no'),
(42, 16, '2024-07-14 09:48:05', 'no'),
(43, 16, '2024-07-14 10:38:03', 'no'),
(44, 17, '2024-07-16 19:26:23', 'no'),
(45, 17, '2024-07-16 19:34:23', 'no'),
(46, 7, '2024-07-16 19:37:36', 'no'),
(47, 9, '2024-07-16 19:37:51', 'no'),
(48, 7, '2024-07-17 04:58:46', 'no'),
(49, 17, '2024-08-03 07:29:42', 'no'),
(50, 17, '2024-08-03 09:24:04', 'no'),
(51, 17, '2024-08-06 10:26:38', 'no'),
(52, 7, '2024-08-06 10:27:41', 'no'),
(53, 17, '2024-08-06 10:28:23', 'no'),
(54, 17, '2024-08-06 10:38:37', 'no'),
(55, 17, '2024-08-06 10:53:05', 'no'),
(56, 17, '2024-08-06 11:35:03', 'no'),
(57, 17, '2024-08-06 12:00:11', 'no'),
(58, 7, '2024-08-11 06:57:37', 'no'),
(59, 7, '2024-08-16 10:20:11', 'no'),
(60, 16, '2024-08-16 10:20:35', 'no'),
(61, 16, '2024-08-16 10:33:02', 'no'),
(62, 16, '2024-08-16 10:51:13', 'no'),
(63, 17, '2024-08-16 12:23:47', 'no'),
(64, 17, '2024-08-16 12:46:20', 'no'),
(65, 7, '2024-08-17 03:11:04', 'no'),
(66, 7, '2024-08-17 03:55:27', 'no'),
(67, 17, '2024-08-20 18:41:59', 'no'),
(68, 17, '2024-08-20 18:54:16', 'no'),
(69, 17, '2024-08-20 19:02:35', 'no'),
(70, 17, '2024-08-20 19:04:47', 'no'),
(71, 7, '2024-08-20 19:09:54', 'no'),
(72, 17, '2024-08-23 04:20:18', 'no'),
(73, 7, '2024-08-23 04:24:09', 'no'),
(74, 17, '2024-08-23 04:25:10', 'no'),
(75, 7, '2024-08-23 04:27:26', 'no'),
(76, 7, '2024-08-24 15:11:15', 'no'),
(77, 7, '2024-08-24 15:12:54', 'no'),
(78, 7, '2024-08-24 18:05:00', 'no'),
(79, 7, '2024-08-24 18:09:20', 'no'),
(80, 7, '2024-08-24 18:29:05', 'no'),
(81, 7, '2024-08-24 19:45:40', 'no'),
(82, 7, '2024-09-07 18:22:21', 'no'),
(83, 7, '2024-09-07 18:23:14', 'no'),
(84, 7, '2024-09-07 18:45:56', 'no'),
(85, 7, '2024-09-07 18:56:14', 'no'),
(86, 16, '2024-09-07 19:03:56', 'no'),
(87, 9, '2024-09-07 19:19:15', 'no'),
(88, 17, '2024-09-07 19:46:26', 'no'),
(89, 17, '2024-09-07 19:57:55', 'no'),
(90, 17, '2024-09-07 20:00:40', 'no'),
(91, 9, '2024-09-07 20:05:11', 'no'),
(92, 17, '2024-09-07 20:10:25', 'no'),
(93, 9, '2024-09-07 20:13:14', 'no'),
(94, 9, '2024-09-07 20:13:55', 'no'),
(95, 9, '2024-09-07 20:15:26', 'no'),
(96, 7, '2024-09-15 06:55:39', 'no'),
(97, 7, '2024-09-15 07:02:31', 'no'),
(98, 7, '2024-09-15 07:05:14', 'no'),
(99, 7, '2024-09-15 07:51:30', 'no'),
(100, 7, '2024-09-15 07:53:13', 'no'),
(101, 7, '2024-09-15 07:55:23', 'no'),
(102, 7, '2024-09-15 08:39:16', 'no'),
(103, 7, '2024-09-15 09:29:53', 'no'),
(104, 17, '2024-09-15 15:19:05', 'no'),
(105, 7, '2024-09-15 15:20:00', 'no'),
(106, 16, '2024-09-15 15:21:19', 'no'),
(107, 7, '2024-09-15 15:22:19', 'no'),
(108, 17, '2024-09-15 15:23:48', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `masteradmin`
--

CREATE TABLE `masteradmin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regdate` varchar(25) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 is unblocked 1 is blocked',
  `recovery_code` varchar(255) DEFAULT NULL,
  `recovery_expiration` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `masteradmin`
--

INSERT INTO `masteradmin` (`id`, `name`, `email`, `mobile`, `password`, `regdate`, `status`, `recovery_code`, `recovery_expiration`) VALUES
(1, 'admin', 'jettahconnect24@gmail.com', '', '$2y$10$5cK0xjcaEisZRg3xJoJrHOAZNLeqD5Ar24XQ6wy2C.QdNMjT/OqDG', '', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `sender_type` enum('admin','user') NOT NULL,
  `receiver_type` enum('admin','user') NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('unread','read') NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `sender_type`, `receiver_type`, `message`, `timestamp`, `status`) VALUES
(1, 7, 10, 'user', '', 'hjfjsjdaf', '2024-07-12 06:57:24', 'unread'),
(2, 7, 2, 'user', '', 'bfjsadjj', '2024-07-12 06:57:56', 'unread'),
(3, 7, 0, 'user', '', 'hello', '2024-07-12 09:33:07', 'unread'),
(4, 7, 0, 'user', '', 'how are you', '2024-07-12 09:33:18', 'unread'),
(5, 7, 0, 'user', '', 'hello', '2024-07-12 09:34:59', 'unread'),
(6, 0, 17, '', '', 'hi', '2024-07-12 09:38:57', 'unread'),
(7, 0, 17, '', '', 'hi', '2024-07-12 09:48:14', 'unread'),
(8, 0, 17, '', '', 'hj', '2024-07-12 09:49:13', 'unread');

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
  `delM` varchar(50) NOT NULL,
  `addres` varchar(200) NOT NULL,
  `p_status` varchar(20) NOT NULL,
  `seller_id` int(11) NOT NULL COMMENT 'Seller_id is id in the admin table',
  `orderdate` varchar(35) NOT NULL,
  `deliveryStatus` varchar(20) NOT NULL DEFAULT 'Not Delivered Yet',
  `received_Status` varchar(15) NOT NULL DEFAULT 'Not Received',
  `payMethod` varchar(50) NOT NULL DEFAULT 'Not Stated'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `delM`, `addres`, `p_status`, `seller_id`, `orderdate`, `deliveryStatus`, `received_Status`, `payMethod`) VALUES
(1, 2, 5, 2, '1708226109-bMml30drNZTuo4Ur2US9', '', '', 'Not Completed', 17, '', 'Delivered', 'Not Received', ''),
(2, 7, 5, 2, '1708226109-bMml30drNZTuo4Ur2US9', '', '', 'Not Completed', 17, '', 'Delivered', 'Not Received', ''),
(3, 7, 3, 1, '1708226109-NeUsDxuakSecyR7MbUMz', '', '', 'Not Completed', 17, '', 'Delivered', 'Item Received', ''),
(4, 7, 4, 1, '1708226109-IpauWymUoD1FBg45I5pT', '', '', 'Completed', 16, '', 'Delivered', 'Not Received', ''),
(5, 7, 3, 1, '1708226202-mZWsbPx2Rixs1qEdPKRD', '', '', 'Completed', 17, '', 'Delivered', 'Not Received', ''),
(6, 7, 3, 1, '1708226202-mZWsbPx2Rixs1qEdPKRD', '', '', 'Completed', 17, '', 'Delivered', 'Not Received', ''),
(7, 7, 4, 1, '1708226202-v76V4NPcsYq1hY2rUeDb', '', '', 'Completed', 16, '', 'Delivered', 'Not Received', ''),
(8, 7, 5, 1, '1708226483-OC7xdQqMxwZzYM7BGeeg', '', '', 'Not Completed', 17, '', 'Not Delivered Yet', 'Not Received', ''),
(9, 7, 5, 1, '1708226483-OC7xdQqMxwZzYM7BGeeg', '', '', 'Not Completed', 17, '', 'Not Delivered Yet', 'Not Received', ''),
(10, 7, 3, 1, '1708226483-EWPkjgSe9vMc63PxRfPd', '', '', 'Not Completed', 17, '', 'Not Delivered Yet', 'Not Received', ''),
(11, 7, 4, 1, '1708226483-ZFSbvk2XYWC907kuHhva', '', '', 'Completed', 16, '', 'Not Delivered Yet', 'Not Received', ''),
(12, 7, 5, 1, '1708226746-kl7gsse2l5mYTFkts1QH', '', '', 'Not Completed', 17, '', 'Not Delivered Yet', 'Not Received', ''),
(13, 7, 3, 1, '1708226746-g79PNv0oWTGOKVqpB5mT', '', '', 'Not Completed', 17, '', 'Not Delivered Yet', 'Not Received', ''),
(14, 7, 4, 1, '1708226746-QjS6D8HJmovYPsYe31uU', '', '', 'Completed', 16, '', 'Not Delivered Yet', 'Not Received', ''),
(15, 7, 5, 1, '1708226832-RQ874uK5uU1yNThLw4aX', '', '', 'Not Completed', 17, '', 'Not Delivered Yet', 'Not Received', ''),
(16, 7, 3, 1, '1708226832-Bo8sd5JuzzSY8B6LPUKq', '', '', 'Not Completed', 17, '', 'Not Delivered Yet', 'Not Received', ''),
(17, 7, 4, 1, '1708226832-4SJJBQjkPa1qJJ6cEGS1', '', '', 'Completed', 16, '', 'Not Delivered Yet', 'Not Received', ''),
(18, 7, 3, 1, '1708227858-tpCtTixwTJ0DwM3ENxE5', '', '', 'Not Completed', 17, '', 'Not Delivered Yet', 'Not Received', ''),
(19, 7, 4, 1, '1708227858-5fz2DzcrkXIbObfht8BO', '', '', 'Not Completed', 16, '', 'Not Delivered Yet', 'Item Received', ''),
(20, 7, 4, 1, '1708228012-zFmfAq8UpZi3PnMyfYjn', '', '', 'Not Completed', 16, '', 'Not Delivered Yet', 'Not Received', ''),
(21, 7, 3, 1, '1708228012-QE36roEWyspaMBSaULDU', '', '', 'Not Completed', 17, '', 'Not Delivered Yet', 'Not Received', ''),
(22, 7, 3, 1, '1708228054-RvJiMDKRs7Ssx1FhPbA6', '', '', 'Not Completed', 17, '', 'Not Delivered Yet', 'Item Received', ''),
(23, 7, 4, 1, '1708228054-8KiAToC1l08ZbQQkVJ4T', '', '', 'Not Completed', 16, '', 'Not Delivered Yet', 'Not Received', ''),
(24, 7, 2, 1, '1708349186-ImzFAJ6qwnHOQdnMtVJi', '', '', 'Completed', 16, '', 'Not Delivered Yet', 'Not Received', ''),
(25, 7, 7, 1, '1708349696-SawwEnI44yXIcjDb20dy', '', '', 'Completed', 17, '', 'Not Delivered Yet', 'Not Received', ''),
(26, 7, 4, 1, '1708351312-JYLIfuReXzlC1dtKQ38C', '', '', 'Completed', 16, '2024-02-19 15:01:55', 'Not Delivered Yet', 'Item Received', ''),
(27, 7, 3, 1, '1708351312-HDbXToCmEoSV2rUQ1Zal', '', '', 'Not Completed', 17, '2024-02-19 15:01:55', 'Not Delivered Yet', 'Not Received', ''),
(28, 7, 4, 1, '1708682650-jtCHW8fPgemKqmTNR3Ti', '', '', 'Completed', 16, '2024-02-23 11:06:02', 'Not Delivered Yet', 'Item Received', ''),
(29, 7, 4, 1, '1709206456-QKjIkpYRnLHfT5fdApFw', '', '', 'Not Completed', 16, '2024-02-29 12:34:35', 'Not Delivered Yet', 'Item Received', ''),
(30, 7, 4, 1, '1709211128-LBQyU3RLipYCm4ia7FnL', '', '', 'Completed', 16, '2024-02-29 13:52:56', 'Not Delivered Yet', 'Item Received', ''),
(31, 7, 3, 1, '1709211128-PXNUxeznzOurGBg2Y2aZ', '', '', 'Completed', 17, '2024-02-29 13:52:56', 'Not Delivered Yet', 'Item Received', ''),
(32, 7, 3, 1, '1709543471-n2UnXX4tcBm4xlvzFtpD', '', '', 'Completed', 17, '2024-03-04 10:12:25', 'Not Delivered Yet', 'Item Received', ''),
(33, 7, 4, 1, '1709543471-ZO0WtWq92utApAr6tGLt', '', '', 'Completed', 16, '2024-03-04 10:12:28', 'Not Delivered Yet', 'Item Received', ''),
(34, 7, 4, 1, '1709543572-TaaL6nj20yF1CiikN3Us', '', '', 'Completed', 16, '2024-03-04 10:13:29', 'Not Delivered Yet', 'Item Received', ''),
(35, 7, 3, 2, '1712222733-25LCoy9Fw5DZ6yiTLCcI', '', '', 'Not Completed', 17, '2024-04-04 10:25:43', 'Not Delivered Yet', 'Item Received', ''),
(36, 7, 3, 3, '1712222940-sD5HvDaEImmyQe4j6xSh', '', '', 'Not Completed', 17, '2024-04-04 10:29:09', 'Not Delivered Yet', 'Item Received', ''),
(37, 7, 3, 3, '1712222969-L8wtqGbGstq2yQWwfiHh', '', '', 'Not Completed', 17, '2024-04-04 10:29:39', 'Not Delivered Yet', 'Item Received', ''),
(38, 7, 3, 3, '1712224474-5y2AD9x0BgH5BKyaQgFJ', '', '', 'Not Completed', 17, '2024-04-04 10:54:39', 'Not Delivered Yet', 'Item Received', ''),
(39, 7, 3, 1, '1712224667-4iR9bPBAa5nCUJbF9sSU', '', '', 'Not Completed', 17, '2024-04-04 10:57:49', 'Not Delivered Yet', 'Item Received', ''),
(40, 7, 3, 1, '1712224840-wmy3zuFSHZEbtjQDQ1jm', '', '', 'Not Completed', 17, '2024-04-04 11:00:44', 'Not Delivered Yet', 'Item Received', ''),
(41, 7, 83, 2, '1712225472-ztW7pSDv2OuO0t1bCR37', '', '', 'Not Completed', 16, '2024-04-04 11:11:50', 'Not Delivered Yet', 'Item Received', ''),
(42, 7, 3, 2, '1712227670-8PiLBElIXvP3daebfDUU', '', '', 'Not Completed', 17, '2024-04-04 11:47:59', 'Not Delivered Yet', 'Item Received', ''),
(43, 7, 6, 1, '1713352715-MLuQTZ6Crgoss8Z1DwzX', '', '', 'Not Completed', 16, '2024-04-17 12:18:50', 'Not Delivered Yet', 'Not Received', ''),
(44, 7, 9, 1, '1713352715-BzsaWoUvILoa5vfAbQTC', '', '', 'Not Completed', 16, '2024-04-17 12:18:50', 'Not Delivered Yet', 'Not Received', ''),
(45, 7, 4, 1, '1713352715-zpiZSfdouZ92TY2p3o5g', '', '', 'Not Completed', 16, '2024-04-17 12:18:50', 'Not Delivered Yet', 'Not Received', ''),
(46, 7, 3, 1, '1713352715-OwkCCKiDxH1dHWTL8jNs', '', '', 'Not Completed', 17, '2024-04-17 12:18:50', 'Not Delivered Yet', 'Not Received', ''),
(47, 14, 3, 1, '1713558954-fvARGVilseZtGNzbtKCN', '', '', 'Not Completed', 17, '2024-04-19 21:37:02', 'Not Delivered Yet', 'Not Received', ''),
(48, 14, 9, 1, '1713629293-RDxVLoL5azTOlDZfe7S4', '', '', 'Not Completed', 16, '2024-04-20 17:10:36', 'Not Delivered Yet', 'Item Received', ''),
(49, 14, 127, 1, '1713629293-edJ5rxkVEkbmCZeT4xvW', '', '', 'Not Completed', 17, '2024-04-20 17:10:36', 'Not Delivered Yet', 'Not Received', ''),
(50, 14, 3, 1, '1713629293-5Hh2vpvUiKm2AxKm1FgN', '', '', 'Not Completed', 17, '2024-04-20 17:10:36', 'Not Delivered Yet', 'Not Received', ''),
(51, 14, 3, 4, '1713650233-e13mD4oW4yFyLopomRUH', '', '', 'Not Completed', 17, '2024-04-20 22:59:25', 'Not Delivered Yet', 'Not Received', ''),
(52, 7, 3, 3, '1713936883-SiS4ijayGbdWXXTBDx5Y', '', '', 'Not Completed', 17, '2024-04-24 06:35:25', 'Not Delivered Yet', 'Not Received', ''),
(53, 16, 128, 1, '1714919254-V0IP8uehFOwqGWCTwPtW', 'Home Delivery', 'D21 Jummai Estate Nasarawa', 'Not Completed', 17, '2024-05-05 15:29:22', 'Not Delivered Yet', 'Not Received', ''),
(54, 16, 127, 1, '1714919254-RDHDmeBRyOkj7uewQNHp', 'Home Delivery', 'D21 Jummai Estate Nasarawa', 'Not Completed', 17, '2024-05-05 15:29:22', 'Not Delivered Yet', 'Not Received', ''),
(55, 16, 10, 1, '1714919254-zzYkjqaZVOza70xVuN8j', 'Home Delivery', 'D21 Jummai Estate Nasarawa', 'Not Completed', 17, '2024-05-05 15:29:22', 'Not Delivered Yet', 'Not Received', ''),
(56, 17, 127, 1, '1714936555-r1Z9EY5Jqf8eA6xv1i2z', 'Home Delivery', 'Back of rosyland acedemy wumba Apo Abuja', 'Not Completed', 17, '2024-05-05 20:18:52', 'Not Delivered Yet', 'Not Received', ''),
(57, 17, 128, 1, '1714936555-9QzSb6O038aOu18EjNgz', 'Home Delivery', 'Back of rosyland acedemy wumba Apo Abuja', 'Not Completed', 17, '2024-05-05 20:18:52', 'Not Delivered Yet', 'Not Received', ''),
(58, 14, 5, 1, '1714945269-a02fiyDCt9ZNEMq6dQoF', 'Home Delivery', 'B2012 urban shelter market apo resettlement fct Abuja ', 'Not Completed', 17, '2024-05-05 22:43:13', 'Not Delivered Yet', 'Not Received', ''),
(59, 14, 3, 1, '1714945269-hseYrNeQ6emJ2a3Con7O', 'Home Delivery', 'B2012 urban shelter market apo resettlement fct Abuja ', 'Not Completed', 17, '2024-05-05 22:43:13', 'Not Delivered Yet', 'Not Received', ''),
(60, 14, 128, 1, '1714945439-OUAs0t98xRRASZs3dOJp', 'Home Delivery', 'B2012', 'Not Completed', 17, '2024-05-05 22:46:59', 'Not Delivered Yet', 'Not Received', ''),
(61, 14, 128, 1, '1714978681-8FcGTDYPFzDtnxDJZJwn', 'Home Delivery', 'B2012 urban shelter market apo resettlement fct Abuja ', 'Not Completed', 17, '2024-05-06 08:00:07', 'Not Delivered Yet', 'Not Received', ''),
(62, 14, 127, 1, '1714978681-YGBKF5YcPena7Ghdv4h6', 'Home Delivery', 'B2012 urban shelter market apo resettlement fct Abuja ', 'Not Completed', 17, '2024-05-06 08:00:07', 'Not Delivered Yet', 'Item Received', ''),
(63, 14, 6, 2, '1714979207-jOqVpD5lpzzhov8Lc1bW', 'Home Delivery', 'Back of rosyland academy wumba apo fct Abuja ', 'Not Completed', 16, '2024-05-06 08:12:25', 'Not Delivered Yet', 'Not Received', ''),
(64, 14, 128, 1, '1715012743-TPFAlhD7JboJVCsEkdRy', 'Home Delivery', 'Back of rosyland academy wumba apo fct Abuja ', 'Completed', 17, '2024-05-06 17:55:21', 'Not Delivered Yet', 'Not Received', ''),
(65, 14, 127, 1, '1715012743-YoNnMs3XlROsvPVXqE0v', 'Home Delivery', 'Back of rosyland academy wumba apo fct Abuja ', 'Not Completed', 17, '2024-05-06 17:55:21', 'Not Delivered Yet', 'Not Received', ''),
(66, 14, 7, 1, '1715012743-5BTVCpYejg5o9mfbQ5cK', 'Home Delivery', 'Back of rosyland academy wumba apo fct Abuja ', 'Not Completed', 17, '2024-05-06 17:55:21', 'Delivered', 'Not Received', ''),
(67, 15, 5, 1, '1715011510-O21bxVPme0aFajqrMMFW', 'Home Delivery', 'Redem church back of Wumba foot ball filed ', 'Completed', 17, '2024-05-06 18:04:46', 'Delivered', 'Not Received', ''),
(68, 15, 3, 1, '1715011510-bDY5dnU85Yqzja9Nb7nc', 'Home Delivery', 'Redem church back of Wumba foot ball filed ', 'Not Completed', 17, '2024-05-06 18:04:46', 'Not Delivered Yet', 'Not Received', ''),
(69, 15, 127, 1, '1715011510-rSGjB0M3U29aUxdOiJGD', 'Home Delivery', 'Redem church back of Wumba foot ball filed ', 'Not Completed', 17, '2024-05-06 18:04:46', 'Not Delivered Yet', 'Not Received', ''),
(70, 15, 9, 1, '1715011510-Uqphu7UrdZnI7kYVk9zg', 'Home Delivery', 'Redem church back of Wumba foot ball filed ', 'Not Completed', 16, '2024-05-06 18:04:46', 'Not Delivered Yet', 'Not Received', ''),
(71, 15, 7, 1, '1715011510-zffkNi10ojcOaABl9ojA', 'Home Delivery', 'Redem church back of Wumba foot ball filed ', 'Not Completed', 17, '2024-05-06 18:04:46', 'Not Delivered Yet', 'Item Received', ''),
(72, 18, 128, 1, '1715061433-vhZQGp0nz5EbiQRhjv3P', 'Home Delivery', 'rajimusharaf@gmail.com', 'Not Completed', 17, '2024-05-07 06:57:33', 'Not Delivered Yet', 'Not Received', ''),
(73, 14, 127, 1, '1715258157-y7auflm5nM3OC5mRsHF0', 'Home Delivery', 'Back of rosyland academy wumba apo fct ', 'Not Completed', 17, '2024-05-09 13:37:32', 'Not Delivered Yet', 'Not Received', ''),
(74, 14, 128, 1, '1715258157-Whx7Lb4hTQB8CqBI5bQI', 'Home Delivery', 'Back of rosyland academy wumba apo fct ', 'Completed', 17, '2024-05-09 13:37:32', 'Delivered', 'Not Received', ''),
(75, 14, 7, 1, '1715258157-pSKZg70NP323WqXZSDNU', 'Home Delivery', 'Back of rosyland academy wumba apo fct ', 'Completed', 17, '2024-05-09 13:37:32', 'Delivered', 'Not Received', ''),
(76, 14, 10, 1, '1715456571-bvr3VGbuhTeexrbRWwvd', 'Home Delivery', 'Back of rosyland academy wumba apo fct Abuja Nigeria ', 'Not Completed', 17, '2024-05-11 20:44:05', 'Delivered', 'Not Received', ''),
(77, 14, 9, 1, '1715456571-KKpvfzuE6lXkIUtMxqFZ', 'Home Delivery', 'Back of rosyland academy wumba apo fct Abuja Nigeria ', 'Not Completed', 16, '2024-05-11 20:44:05', 'Not Delivered Yet', 'Not Received', ''),
(78, 14, 7, 1, '1715456571-CUgvtk7pg1BKVwY680R8', 'Home Delivery', 'Back of rosyland academy wumba apo fct Abuja Nigeria ', 'Completed', 17, '2024-05-11 20:44:05', 'Delivered', 'Not Received', ''),
(79, 19, 128, 1, '1715465958-5vwN9lv8i0q1BUBvJ91q', 'Home Delivery', '3 off, by Eldoret Street, Aminu Kano Cres, Wuse, Abuja 904101, Federal Capital Territory, Nigeria', 'Completed', 17, '2024-05-11 23:21:16', 'Delivered', 'Not Received', ''),
(80, 19, 127, 1, '1715465958-ZpMhl3gktcyga9yspk4T', 'Home Delivery', '3 off, by Eldoret Street, Aminu Kano Cres, Wuse, Abuja 904101, Federal Capital Territory, Nigeria', 'Not Completed', 17, '2024-05-11 23:21:16', 'Not Delivered Yet', 'Not Received', ''),
(81, 15, 128, 1, '1716804355-dGUCMqLQfJyJAFvHXv8b', 'Home Delivery', 'Number 2 unforma street ', 'Completed', 17, '2024-05-27 11:07:11', 'Delivered', 'Item Received', ''),
(82, 14, 130, 1, '1716896383-nniW0Jqdhpr35tqMKSdm', 'Home Delivery', 'Back of rosyland academy wumba apo fct Abuja ', 'Not Completed', 19, '2024-05-28 12:40:59', 'Delivered', 'Item Received', ''),
(83, 7, 133, 1, '1719045646-bHmiWP8xZxL1gWX5HV9A', 'Home Delivery', 'hj hjhjbj', 'Not Completed', 19, '2024-06-22 09:41:25', 'Delivered', 'Not Received', ''),
(84, 7, 132, 1, '1719247632-Vx3A7nAvXGsb5zigOM59', 'Home Delivery', 'Fine ', 'Not Completed', 19, '2024-06-24 17:47:25', 'Not Delivered Yet', 'Not Received', ''),
(85, 15, 132, 1, '1719849697-f7qf4l7MYuFEIl61GIkh', 'In-Store Pickup', '0', 'Not Completed', 19, '2024-07-01 17:01:51', 'Not Delivered Yet', 'Not Received', ''),
(86, 7, 133, 1, '1720527175-DhIypjkXFaI25KC8W0j9', 'Home Delivery', '0', 'Not Completed', 19, '2024-07-09 13:13:26', 'Not Delivered Yet', 'Not Received', ''),
(87, 7, 10, 1, '1720527175-NPW4BdPUtmILjgF8lhL6', 'Home Delivery', '0', 'Completed', 17, '2024-07-09 13:13:26', 'Delivered', 'Not Received', ''),
(88, 7, 132, 1, '1723867155-4PUYqHCWTyKmuXTs2IaD', 'In-Store Pickup', '0', 'Not Completed', 19, '2024-08-17 04:59:22', 'Not Delivered Yet', 'Not Received', 'Offline'),
(89, 7, 133, 1, '1723867155-7SpeVJJHMbbDGXUjO5E1', 'In-Store Pickup', '0', 'Not Completed', 19, '2024-08-17 04:59:22', 'Not Delivered Yet', 'Not Received', 'Offline'),
(90, 7, 131, 1, '1723867155-B4SxLh2oS89ZZfi75oaW', 'In-Store Pickup', '0', 'Not Completed', 19, '2024-08-17 04:59:22', 'Not Delivered Yet', 'Not Received', 'Offline'),
(91, 7, 10, 1, '1723867155-Pl57pqs0pF9bwFtYsygL', 'In-Store Pickup', '0', 'Not Completed', 17, '2024-08-17 04:59:22', 'Not Delivered Yet', 'Not Received', 'Offline'),
(92, 7, 7, 1, '1723867155-IwEeaYDNfG1rhB4Spc6p', 'In-Store Pickup', '0', 'Not Completed', 17, '2024-08-17 04:59:22', 'Not Delivered Yet', 'Not Received', 'Offline'),
(93, 7, 137, 1, '1723867155-kIiZtHWrK40oFgHbPox9', 'In-Store Pickup', '0', 'Not Completed', 17, '2024-08-17 04:59:22', 'Not Delivered Yet', 'Not Received', 'Offline'),
(94, 7, 133, 1, '1724242963-1hY3FMkS7jl237xv5N1Y', 'In-Store Pickup', '0', 'Not Completed', 19, '2024-08-21 13:22:51', 'Not Delivered Yet', 'Not Received', 'Offline'),
(95, 7, 137, 1, '1724386730-EBxiL2q5IurP67fLCjFU', 'Home Delivery', '0', 'Not Completed', 17, '2024-08-23 05:18:56', 'Not Delivered Yet', 'Not Received', 'At Deliver'),
(96, 7, 137, 1, '1724386752-00N5d7ahj4h1GOBv6INT', 'In-Store Pickup', '0', 'Not Completed', 17, '2024-08-23 05:19:21', 'Not Delivered Yet', 'Not Received', 'At Deliver'),
(97, 7, 10, 1, '1724386786-XTWoap3wbJROakxCdgoL', 'Home Delivery', '0', 'Not Completed', 17, '2024-08-23 05:20:00', 'Not Delivered Yet', 'Not Received', 'At Deliver'),
(98, 7, 137, 1, '1724387054-4EpnBkoZASplykkwCSfb', 'In-Store Pickup', '0', 'Not Completed', 17, '2024-08-23 05:24:27', 'Not Delivered Yet', 'Not Received', 'At Delivery/Paystack'),
(99, 7, 137, 1, '1724387077-58wzhQsFuES3F7aGdaEG', 'Home Delivery', '0', 'Not Completed', 17, '2024-08-23 05:24:43', 'Not Delivered Yet', 'Not Received', 'At Delivery/Cash'),
(100, 7, 137, 1, '1724391704-jTQEn59VWJpbwgzR8zoq', 'Home Delivery', '0', 'Not Completed', 17, '2024-08-23 06:42:01', 'Not Delivered Yet', 'Not Received', 'At Delivery/Cash'),
(101, 7, 133, 1, '1724391890-7SvNaU2q25RjhhMTrpi0', 'Home Delivery', 'hjhjh', 'Not Completed', 19, '2024-08-23 06:45:29', 'Not Delivered Yet', 'Not Received', 'At Delivery/Cash'),
(102, 7, 133, 1, '1724502051-AVDAfIu7dADJxi5ExwvI', 'Home Delivery', '0', 'Not Completed', 19, '2024-08-24 13:20:57', 'Not Delivered Yet', 'Not Received', 'At Delivery/Cash'),
(103, 7, 137, 1, '1724504545-ldKN8TavZZXhgT0wSUsO', 'In-Store Pickup', '0', 'Completed', 17, '2024-08-24 14:02:31', 'Not Delivered Yet', 'Not Received', 'Paystack Payment at delivery'),
(104, 7, 133, 1, '1724511211-mUTPtDSodlF5JWehzxh5', 'Home Delivery', 'sfd', 'Not Completed', 19, '2024-08-24 15:53:46', 'Not Delivered Yet', 'Not Received', 'At Delivery/Cash'),
(105, 7, 137, 1, '1724512094-yvtSfpjqZlWMeDXh0CmE', 'Home Delivery', 'sash', 'Not Completed', 17, '2024-08-24 16:08:39', 'Not Delivered Yet', 'Not Received', 'At Delivery/Cash'),
(106, 7, 137, 1, '1724525155-X8dsRdTArYQvkFbl2i2B', 'Home Delivery', 'asdffasdk', 'Completed', 17, '2024-08-24 19:54:41', 'Not Delivered Yet', 'Item Received', 'Paystack Payment at delivery'),
(107, 7, 138, 1, '1726387531-tNmZQATJPJWS5lsV7nwy', 'Home Delivery', 'Ade Ago Street', 'Not Completed', 9, '2024-09-15 09:05:54', 'Not Delivered Yet', 'Not Received', 'At Delivery/Cash'),
(108, 7, 137, 1, '1726387589-ODHh5X8nN4JDb4YyBy3a', 'In-Store Pickup', '0', 'Not Completed', 17, '2024-09-15 09:06:38', 'Not Delivered Yet', 'Not Received', 'At Delivery/Cash'),
(109, 7, 137, 1, '1726387619-zgtLuCsqUVxJl6rrmq79', 'In-Store Pickup', '0', 'Completed', 17, '2024-09-15 09:07:08', 'Not Delivered Yet', 'Not Received', 'Paystack Payment at delivery');

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
(3, 17, 12, 3, 'Iphone 12 Pro Max', 820000, 7, '5G goes Pro. A14 Bionic rockets past every other smartphone chip. The Pro camera system takes low-light photography to the next level â€” with an even bigger jump on iPhone 12 Pro Max. And Ceramic Shield delivers four times better drop performance.', '1616499931_iph12pm.jpg', 'apple, iphone'),
(4, 16, 12, 2, 'Samsung Galaxy S21 Ultra', 600000, 10, 'This is a demo', '1616492395_Samsung-Galaxy-S21-Ultra-1608287647-0-0.jpg', 'samsung, s21, s21 ultra'),
(5, 17, 12, 6, 'Shield Case OnePlus 8T', 5000, 13, 'On spec-sheet, the OnePlus 8T boasts plenty of improvements from its predecessor i.e. the OnePlus 8. For instance, its 6.55-inch 1080p OLED display now comes with a faster 120Hz refresh rate. In comparison, the OnePlus 8 had a 90Hz refresh rate. This upgrade seems huge. However, users will agree that you canâ€™t really find much of a difference between 90Hz to 120Hz on a smartphone screen.', '1616500410_OnePlus-8T-5G-Lunar-Silver-8GB-RAM-128GB-Storage-image-4.jpg', 'one plus, oneplus8'),
(6, 16, 12, 2, 'Samsung Galaxy Z Fold 2', 8500, 5, 'Last yearâ€™s Galaxy Fold was a sort of experiment in the field of foldable phones. The idea was an innovative one but the phone faced a lot of durability issues. Its launch was postponed multiple times because of Samsungâ€™s inability to solve all the problems. Samsung will likely avoid those situations with its successor.', '1616500092_sm-zfold.jpg', 'samsung, mobile, galaxy fold'),
(7, 17, 6, 9, 'Dr. Martens Mens Patch', 49987, 3, 'Color: Grey/Charcoal/Dark Grey', '1616503181_Dr. Martens.jpg', 'dr martens, shoes'),
(9, 16, 2, 3, 'Computer Shelf', 43000, 113, 'A computer set', '1674405965_photo-1600304594526-5f75d3ca8f3d.jpeg', 'computer'),
(10, 17, 2, 8, 'Aduro Wireless Headphones', 4100, 6, 'Amazing Bluetooth headphones sound with aptX technology. High-quality built-in microphone with Bluetooth 5.0 technology', '1616502854_hdphn.jpg', 'headphone, aduro'),
(128, 17, 4, 23, '5pcs Kitchen Utencils', 7500, 20, '5pcs Kitchen Utencil 7k', '1713510313_5pcs Kitchen Utencil 7k.jpeg', '5pcs Kitchen Utencil'),
(130, 19, 20, 32, 'Silicon ', 2500, 20, 'Abro Silicon ', '1716896006_1000037989.jpg', 'Silicon '),
(131, 19, 20, 34, 'Sharp sand ', 75000, 10, 'Kuja sharp sand very in construction work ', '1716903061_1000028580.jpg', 'Sharp sand '),
(132, 19, 20, 6, 'Plumbing pipes ', 6000, 200, 'Quality pipes with different sizes ', '1716934005_1000038092.jpg', 'Pipes'),
(133, 19, 30, 35, 'Car Drop ', 50, 1, 'Car Drop anywhere in Abuja very affordable, just make an order.', '1718885090_1000041914.jpg', 'Car Drop '),
(137, 17, 2, 2, 'asdhdhshj', 123, 193, 'hfs fjafjasf hjfsafhj', '1722946749_WIN_20230925_15_56_11_Pro.jpg', 'kka'),
(138, 9, 1, 1, 'adjhsjhdjh hjh', 2000, 1, 'sjhdjhsdjh', '1725737127_YPENTLogo.jpg', 'sdksjsdjsdjk');

-- --------------------------------------------------------

--
-- Table structure for table `seller_complaints`
--

CREATE TABLE `seller_complaints` (
  `sn` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'linked to admin id field',
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `complaints` text DEFAULT NULL,
  `file_name` varchar(50) DEFAULT NULL,
  `submDate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `seller_complaints`
--

INSERT INTO `seller_complaints` (`sn`, `user_id`, `email`, `phone`, `complaints`, `file_name`, `submDate`) VALUES
(1, 16, 'rajihamidu891@gmail.com', '08067455922', 'I hello', NULL, '23-05-2024 12:26 PM'),
(2, 19, 'collinsazeke7@gmail.com', '08132011343', 'Good ', NULL, '02-07-2024 07:51 AM'),
(3, 19, 'collinsazeke7@gmail.com', '08132011343', 'Please I need some items from you store. I need rice, bean and oil.', NULL, '02-07-2024 07:54 AM');

-- --------------------------------------------------------

--
-- Table structure for table `seller_complaints_replies`
--

CREATE TABLE `seller_complaints_replies` (
  `sn` int(11) NOT NULL,
  `complaint_id` int(11) DEFAULT NULL,
  `replier_email` varchar(255) DEFAULT NULL,
  `reply_text` text DEFAULT NULL,
  `reply_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(3, 'Akwa Ibom'),
(4, 'Anambra'),
(5, 'Bauchi'),
(6, 'Bayelsa'),
(7, 'Benue'),
(8, 'Borno'),
(9, 'Cross River'),
(10, 'Delta'),
(11, 'Ebonyi'),
(12, 'Edo'),
(13, 'Ekiti'),
(14, 'Enugu'),
(15, 'Gombe'),
(16, 'Imo'),
(17, 'Jigawa'),
(18, 'Kaduna'),
(19, 'Kano'),
(20, 'Katsina'),
(21, 'Kebbi'),
(22, 'Kogi'),
(23, 'Kwara'),
(24, 'Lagos'),
(25, 'Nasarawa'),
(26, 'Niger'),
(27, 'Ogun'),
(28, 'Ondo'),
(29, 'Osun'),
(30, 'Oyo'),
(31, 'Plateau'),
(32, 'Rivers'),
(33, 'Sokoto'),
(34, 'Taraba'),
(35, 'Yobe'),
(36, 'Zamfara'),
(37, 'Federal Capital Territory (FCT)');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(20) NOT NULL,
  `seller_id` int(20) NOT NULL,
  `old_balance` int(20) NOT NULL,
  `new_balance` int(20) NOT NULL,
  `trxdate` varchar(25) NOT NULL,
  `product_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `seller_id`, `old_balance`, `new_balance`, `trxdate`, `product_desc`) VALUES
(1, 17, 3740, 5610, '2024-04-04 14:53:00', '5G goes Pro. A14 Bionic rockets past every other smartphone chip. The Pro camera system takes low-li'),
(2, 17, 5610, 7480, '2024-04-04 14:57:24', '5G goes Pro. A14 Bionic rockets past every other smartphone chip. The Pro camera system takes low-li'),
(3, 16, 0, 43000, '2024-04-20 17:12:11', 'A computer set'),
(4, 17, 0, 30000, '2024-05-06 08:01:28', '18 Pieces Silicon Kitchen Cooking Utensils'),
(5, 19, 0, 2500, '2024-05-28 12:46:25', 'Abro Silicon '),
(6, 17, 30000, 37500, '2024-06-24 15:51:28', '5pcs Kitchen Utencil 7k'),
(7, 17, 37500, 87487, '2024-06-24 15:52:00', 'Color: Grey/Charcoal/Dark Grey'),
(8, 17, 87487, 87610, '2024-09-15 08:03:26', 'hfs fjafjasf hjfsafhj');

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
  `mobile` varchar(11) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(300) NOT NULL,
  `recovery_code` varchar(255) DEFAULT NULL,
  `recovery_expiration` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`, `recovery_code`, `recovery_expiration`) VALUES
(1, 'Christine', 'Randolph', 'randolphc@gmail.com', '25f9e794323b453885f5181f1b624d0b', '8389080183', '2133  Hill Haven Drive', 'Terra Stree', NULL, NULL),
(2, 'Will', 'Willams', 'willainswill@gmail.com', '25f9e794323b453885f5181f1b624d0b', '8389080183', '4567  Orphan Road', 'WI', NULL, NULL),
(3, 'Demo', 'Name', 'demo@gmail.com', 'password', '9876543210', 'demo ad1', 'ademo ad2', NULL, NULL),
(5, 'Steeve', 'Rogers', 'steeve1@gmail.com', '305e4f55ce823e111a46a9d500bcb86c', '9876547770', '573  Pinewood Avenue', 'MN', NULL, NULL),
(6, 'Melissa', 'Gilbert', 'gilbert@gmail.com', '305e4f55ce823e111a46a9d500bcb86c', '7845554582', '1711  McKinley Avenue', 'MA', NULL, NULL),
(7, 'Hamidu', 'Raji', 'rajihamidu90@gmail.com', '2494f262498cae2c6cc9b0c4ce50452c', '8067455933', 'Bauchi', 'Abuja', 'c11d0642115d6505c7b2650d2bd3d740', '2024-05-28 17:53:31'),
(8, 'abiodun', 'adeyemo', 'rajiabi@live.com', '25f9e794323b453885f5181f1b624d0b', '0806745593', 'hjsdjjhds', 'fdafasdfa', NULL, NULL),
(9, 'Ammaar', 'Ibrahim', 'ammar@gmail.com', '25f9e794323b453885f5181f1b624d0b', '9876789878', 'dkn', 'kj', NULL, NULL),
(10, 'jsdnbdsnb', 'bnbnbn', 'jhhjhjhjhj@gmail.com', '25f9e794323b453885f5181f1b624d0b', '08045666377', 'jhsdjdh', 'hjhhj', NULL, NULL),
(11, ' Raji', 'Adewale', 'adewaleraji@gmail.com', '25f9e794323b453885f5181f1b624d0b', '09087546789', 'Hhjjj', 'Vhjjb', NULL, NULL),
(12, 'Rajihamidu ', 'Agghjn', 'hjjggv@gmail.com', '25f9e794323b453885f5181f1b624d0b', '08099998767', 'Vhjjj', 'Chjbb', NULL, NULL),
(13, 'hjjsdjdsj', 'hhhhg', 'ghhghgghhghg@gmail.com', '25f9e794323b453885f5181f1b624d0b', '09044444899', 'hhjhjhhj', 'hjhjjh', NULL, NULL),
(14, 'Collins', 'Azeke', 'collinsazeke7@gmail.com', '1016c51a53e352db52b18da593273d2a', '08132011343', 'Back of rosyland academy wumba ', 'Apo fct Abuja ', NULL, NULL),
(15, 'RAPHAEL', 'MONDAY J', 'enyiraph1@gmail.com', 'a8f131276613fc1123779fd26de14e0e', '08030724344', 'No 5 IDU court karmo road ', 'Abuja', NULL, NULL),
(16, 'Abibat', 'Ogunrinde', 'abibatmotunrayo4278@gmail.com', 'a453af3a62f89d1064d0cd732e70e662', '08126346222', 'Jummai Estate', 'Mafoluku Oshodi', NULL, NULL),
(17, 'Chioma', 'Azeke', 'isiguzomavis@gmail.com', 'b31c7a865bcf29b4a7e630515800871d', '07068884117', 'Wumba village', 'Wumba village by health center fct Anuja', '7c9ad602430f0040810d03032387df90', '2024-05-28 22:32:30'),
(18, 'Musharaf ', 'Raji', 'rajimusharaf@gmail.com', '6414b96e90e5f8b7bf52dc344d0b567c', '08139066245', 'Nig', 'Lagos', NULL, NULL),
(19, 'CHINDU', 'IDIEGE', 'chinduidiege@gmail.com', '189291b0a10d7cd4e5ffac2c06d3ab79', '09048434067', 'Efab, Abuja', 'Efab, Abuja', NULL, NULL),
(20, 'Abubakar', 'Ahmad', 'ahmaduabu@gmail.com', 'cb194090901ff0a71c372b4f58908d59', '08032343030', 'Bauchi', 'Bauchi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE `withdrawal` (
  `sn` int(11) NOT NULL,
  `seller_email` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `previousbalance` decimal(10,2) NOT NULL,
  `newbalance` decimal(10,2) NOT NULL,
  `accountname` varchar(255) NOT NULL,
  `bankname` varchar(255) NOT NULL,
  `accountnumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `customer_complaints`
--
ALTER TABLE `customer_complaints`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `customer_complaints_replies`
--
ALTER TABLE `customer_complaints_replies`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `complaint_id` (`complaint_id`);

--
-- Indexes for table `lgas`
--
ALTER TABLE `lgas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `masteradmin`
--
ALTER TABLE `masteradmin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `seller_complaints`
--
ALTER TABLE `seller_complaints`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `seller_complaints_replies`
--
ALTER TABLE `seller_complaints_replies`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `complaint_id` (`complaint_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `customer_complaints`
--
ALTER TABLE `customer_complaints`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_complaints_replies`
--
ALTER TABLE `customer_complaints_replies`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lgas`
--
ALTER TABLE `lgas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=759;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `masteradmin`
--
ALTER TABLE `masteradmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `seller_complaints`
--
ALTER TABLE `seller_complaints`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seller_complaints_replies`
--
ALTER TABLE `seller_complaints_replies`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_complaints_replies`
--
ALTER TABLE `customer_complaints_replies`
  ADD CONSTRAINT `customer_complaints_replies_ibfk_1` FOREIGN KEY (`complaint_id`) REFERENCES `customer_complaints` (`sn`);

--
-- Constraints for table `lgas`
--
ALTER TABLE `lgas`
  ADD CONSTRAINT `lgas_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_cat` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`cat_id`);

--
-- Constraints for table `seller_complaints_replies`
--
ALTER TABLE `seller_complaints_replies`
  ADD CONSTRAINT `seller_complaints_replies_ibfk_1` FOREIGN KEY (`complaint_id`) REFERENCES `seller_complaints` (`sn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
