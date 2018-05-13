-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2016 at 10:20 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cashcrop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cc_f_sales`
--

CREATE TABLE IF NOT EXISTS `cc_f_sales` (
  `pid` varchar(100) NOT NULL,
  `cust_uname` varchar(100) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `order_price` varchar(100) NOT NULL,
  `total_quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cc_m_admin`
--

CREATE TABLE IF NOT EXISTS `cc_m_admin` (
  `a_uname` varchar(100) NOT NULL,
  `a_pswd` varchar(100) NOT NULL,
  `a_sys_creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc_m_admin`
--

INSERT INTO `cc_m_admin` (`a_uname`, `a_pswd`, `a_sys_creation_date`) VALUES
('admin', 'admin', '2016-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `cc_m_admin_details`
--

CREATE TABLE IF NOT EXISTS `cc_m_admin_details` (
  `a_uname` varchar(255) NOT NULL,
  `a_fname` varchar(255) NOT NULL,
  `a_lname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cc_m_customer`
--

CREATE TABLE IF NOT EXISTS `cc_m_customer` (
  `cust_uname` varchar(100) NOT NULL,
  `cust_pswd` varchar(100) NOT NULL,
  `cust_sys_creation_date` date NOT NULL,
  `cust_active_ind` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc_m_customer`
--

INSERT INTO `cc_m_customer` (`cust_uname`, `cust_pswd`, `cust_sys_creation_date`, `cust_active_ind`) VALUES
('boom', 'boom123', '2016-02-28', 'N'),
('eric', 'eric123', '2016-02-29', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `cc_m_customer_details`
--

CREATE TABLE IF NOT EXISTS `cc_m_customer_details` (
  `cust_address` varchar(500) NOT NULL,
  `cust_city` varchar(100) NOT NULL,
  `cust_state` varchar(100) NOT NULL,
  `cust_pincode` varchar(100) NOT NULL,
  `cust_uname` varchar(100) NOT NULL,
  `cust_fname` varchar(100) NOT NULL,
  `cust_lname` varchar(100) NOT NULL,
  `cust_gender` varchar(1) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `contact_number` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc_m_customer_details`
--

INSERT INTO `cc_m_customer_details` (`cust_address`, `cust_city`, `cust_state`, `cust_pincode`, `cust_uname`, `cust_fname`, `cust_lname`, `cust_gender`, `cust_email`, `contact_number`) VALUES
('asdsad', 'pune', 'maharashtra', '433333', 'eric', 'Eric', 'Figer', 'M', 'asdsa', 9975710110);

-- --------------------------------------------------------

--
-- Table structure for table `cc_m_delivery`
--

CREATE TABLE IF NOT EXISTS `cc_m_delivery` (
  `del_id` varchar(50) NOT NULL,
  `del_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cc_m_farmer`
--

CREATE TABLE IF NOT EXISTS `cc_m_farmer` (
  `sys_creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fm_uname` varchar(100) NOT NULL,
  `fm_pswd` varchar(100) NOT NULL,
  `fm_active_ind` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc_m_farmer`
--

INSERT INTO `cc_m_farmer` (`sys_creation_date`, `fm_uname`, `fm_pswd`, `fm_active_ind`) VALUES
('2016-02-29 01:51:34', 'Keshav', 'keshav123', 'Y'),
('0000-00-00 00:00:00', 'Rushikesh', 'rushikesh123', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `cc_m_farmer_details`
--

CREATE TABLE IF NOT EXISTS `cc_m_farmer_details` (
  `fm_uname` varchar(100) NOT NULL,
  `fm_fname` varchar(100) NOT NULL,
  `fm_lname` varchar(100) NOT NULL,
  `fm_address` varchar(500) NOT NULL,
  `fm_city` varchar(100) NOT NULL,
  `fm_district` varchar(100) NOT NULL,
  `fm_state` varchar(100) NOT NULL,
  `fm_pincode` varchar(6) NOT NULL,
  `fm_bank_name` varchar(100) NOT NULL,
  `fm_branch_name` varchar(100) NOT NULL,
  `fm_account_no` int(16) NOT NULL,
  `fm_ifsc_code` varchar(16) NOT NULL,
  `fm_email` varchar(100) NOT NULL,
  `contact_number` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc_m_farmer_details`
--

INSERT INTO `cc_m_farmer_details` (`fm_uname`, `fm_fname`, `fm_lname`, `fm_address`, `fm_city`, `fm_district`, `fm_state`, `fm_pincode`, `fm_bank_name`, `fm_branch_name`, `fm_account_no`, `fm_ifsc_code`, `fm_email`, `contact_number`) VALUES
('Keshav', 'keshav', 'sargar', 'jkn', 'kjnkn', 'kjn', 'kn', 'kjn', 'kn', 'kjnkj', 1212, 'nkj', 'nkn', 1212),
('Rushikesh', 'Rushikesh', 'Sargar', 'asdsad', 'pune', 'Pune', 'Maharashtra', '321321', 'SBI', 'Pune', 123213, '123213231', 'asdas', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cc_m_order`
--

CREATE TABLE IF NOT EXISTS `cc_m_order` (
  `order_id` bigint(10) NOT NULL,
  `cust_uname` varchar(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` varchar(100) NOT NULL,
  `delivery_boy` varchar(100) NOT NULL,
  `total_price` int(6) NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_charge` bigint(4) NOT NULL,
  `grand_total` bigint(10) NOT NULL,
  `total_items` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc_m_order`
--

INSERT INTO `cc_m_order` (`order_id`, `cust_uname`, `order_date`, `order_status`, `delivery_boy`, `total_price`, `delivery_date`, `delivery_charge`, `grand_total`, `total_items`) VALUES
(1, 'Sattu', '2016-02-08 00:49:39', 'In Transit', 'ABC', 400, '2016-02-02', 0, 0, 0),
(2, 'eric', '2016-02-05 18:30:00', 'Delivered', 'hhh', 800, '0000-00-00', 0, 0, 0),
(3, 'Keshav', '2016-02-28 10:46:26', 'Placed', '', 300, '0000-00-00', 0, 0, 0),
(5, 'eric', '2016-02-28 10:46:33', 'Placed', 'Rehman', 240, '0000-00-00', 20, 260, 0),
(6, 'eric', '2016-02-28 11:03:00', 'Placed', '', 70, '0000-00-00', 40, 110, 7),
(7, 'eric', '2016-02-28 11:03:30', 'Placed', '', 70, '0000-00-00', 40, 110, 7),
(8, 'eric', '2016-02-28 11:04:16', 'Placed', '', 70, '0000-00-00', 40, 110, 7),
(9, 'eric', '2016-02-28 11:04:52', 'Placed', '', 70, '0000-00-00', 40, 110, 7),
(10, 'eric', '2016-02-28 11:05:38', 'Placed', '', 70, '0000-00-00', 40, 110, 7),
(11, 'eric', '2016-02-28 11:10:17', 'Placed', '', 30, '0000-00-00', 40, 70, 3),
(12, 'eric', '2016-02-28 11:11:40', 'Placed', '', 10, '0000-00-00', 40, 50, 1),
(13, 'eric', '2016-02-28 19:47:53', 'Placed', '', 21127, '0000-00-00', 40, 21167, 101),
(14, 'eric', '2016-02-28 19:48:46', 'Placed', '', 20, '0000-00-00', 40, 60, 1),
(15, '', '2016-02-28 21:18:29', 'Placed', '', 20, '0000-00-00', 40, 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cc_m_order_details`
--

CREATE TABLE IF NOT EXISTS `cc_m_order_details` (
  `cust_uname` varchar(100) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `pid` varchar(100) NOT NULL,
  `quantity` int(50) NOT NULL,
  `per_price` int(100) NOT NULL,
  `sub_total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc_m_order_details`
--

INSERT INTO `cc_m_order_details` (`cust_uname`, `order_id`, `pid`, `quantity`, `per_price`, `sub_total`) VALUES
('Sattu', '1', '1', 2, 20, 40),
('sattu', '1', '2', 3, 10, 30),
('eric', '10', '2', 7, 10, 70),
('eric', '11', '2', 3, 10, 30),
('eric', '12', '2', 1, 10, 10),
('eric', '13', '3', 2, 20, 40),
('eric', '13', '7', 99, 213, 21087),
('eric', '14', '3', 1, 20, 20),
('', '15', '3', 1, 20, 20),
('3', '2', '3', 10, 2, 20),
('Keshav', '3', '2', 20, 10, 200),
('eric', '5', '1', 12, 20, 240);

-- --------------------------------------------------------

--
-- Table structure for table `cc_m_products`
--

CREATE TABLE IF NOT EXISTS `cc_m_products` (
  `pid` int(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pdesc` varchar(10000) NOT NULL,
  `pimage` varchar(100) NOT NULL,
  `pprice` int(200) NOT NULL,
  `pcategory` varchar(100) NOT NULL,
  `fm_uname` varchar(100) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `unit` varchar(10) NOT NULL,
  `avail_zip` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `psubcategory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc_m_products`
--

INSERT INTO `cc_m_products` (`pid`, `pname`, `pdesc`, `pimage`, `pprice`, `pcategory`, `fm_uname`, `added_on`, `unit`, `avail_zip`, `quantity`, `psubcategory`) VALUES
(2, 'Tomato', 'Red Tomato', 'image1.jpg', 10, 'Fruits and Vegetables', 'Keshav', '2016-02-05 05:12:59', 'kg', '0', 15, 'Fresh Fruits'),
(3, 'Chilli', 'red Chilli', 'image1.jpg', 20, 'Fruits and Vegetables', 'Rushikesh', '2016-02-18 19:26:19', 'kg', '410206', 20, 'Fresh Vegetables'),
(5, 'Chillies', 'Red Chillies', 'Jellyfish.jpg', 20, 'Fruits and Vegetables', 'Rakesh', '2016-02-08 00:49:12', 'kg', '401201', 0, 'Fresh Fruits'),
(7, 'Arkansas', 'sadsad', 'Jellyfish.jpg', 213, 'Fruits and Vegetables', 'Rushikesh', '2016-02-25 21:49:11', 'gf', '401201', 0, 'Fresh Vegetables'),
(12, 'jj', 'jjjjj	', 'Penguins.jpg', 123, 'Fruits and Vegetables', 'Keshav', '2016-02-26 08:10:52', 'kg', '401201', 0, 'Fresh Fruits'),
(14, 'asd', 'sadsad', 'Tulips.jpg', 120, 'Fruits and Vegetables', 'Rushikesh', '2016-02-27 04:26:00', 'kg', '401201', 0, 'Fresh Vegetables'),
(15, 'asd', 'sadsad', 'Tulips.jpg', 120, 'Fruits and Vegetables', 'Rushikesh', '2016-02-27 04:29:02', 'kg', '401201', 0, 'Fresh Fruits'),
(17, 'asd', 'sadsad', 'Tulips.jpg', 120, 'Fruits and Vegetables', 'Rushikesh', '2016-02-27 04:31:30', 'kg', '401201', 0, 'Fresh Vegetables');

-- --------------------------------------------------------

--
-- Table structure for table `cc_m_recommended`
--

CREATE TABLE IF NOT EXISTS `cc_m_recommended` (
  `pid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc_m_recommended`
--

INSERT INTO `cc_m_recommended` (`pid`) VALUES
(2),
(3),
(5),
(7);

-- --------------------------------------------------------

--
-- Table structure for table `cc_m_upload_products`
--

CREATE TABLE IF NOT EXISTS `cc_m_upload_products` (
  `pid` int(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pdesc` varchar(10000) NOT NULL,
  `pimage` varchar(100) NOT NULL,
  `pprice` int(200) NOT NULL,
  `pcategory` varchar(100) NOT NULL,
  `fm_uname` varchar(100) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `unit` varchar(10) NOT NULL,
  `avail_zip` varchar(255) NOT NULL,
  `Status` varchar(100) NOT NULL DEFAULT 'To be Approved',
  `quantity` int(10) NOT NULL,
  `psubcategory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc_m_upload_products`
--

INSERT INTO `cc_m_upload_products` (`pid`, `pname`, `pdesc`, `pimage`, `pprice`, `pcategory`, `fm_uname`, `added_on`, `unit`, `avail_zip`, `Status`, `quantity`, `psubcategory`) VALUES
(5, 'Chillies', 'Red Chillies', 'Jellyfish.jpg', 20, 'Fresh Fruits', 'Rakesh', '2016-02-08 00:49:12', 'kg', '401201,401202,401203,401207,401301,401302,401303,400103,400101', 'Approved', 0, ''),
(7, 'Arkansas', 'sadsad', 'Jellyfish.jpg', 213, 'Fresh Fruits', 'Rushikesh', '2016-02-25 21:49:11', 'gf', '401201,401202,401203,401207,401301,401302,401303,400103,400101', 'Approved', 0, ''),
(10, 'jj', 'jjjjj	', 'Penguins.jpg', 123, 'Fresh Fruits', 'Rushikesh', '2016-02-26 08:09:28', 'kg', '401201,401202,401203,401207,401301,401302,401303,400103,400101', 'Rejected', 0, ''),
(12, 'jj', 'jjjjj	', 'Penguins.jpg', 123, 'Fresh Fruits', 'Rushikesh', '2016-02-26 08:10:52', 'kg', '401201,401202,401203,401207,401301,401302,401303,400103,400101', 'Approved', 0, ''),
(14, 'asd', 'sadsad', 'Tulips.jpg', 120, 'Fresh Fruits', 'Rushikesh', '2016-02-27 04:26:00', 'kg', '401201,401202,401203,401207,401301,401302,401303,400103,400101', 'Approved', 0, ''),
(15, 'asd', 'sadsad', 'Tulips.jpg', 120, 'Fresh Fruits', 'Rushikesh', '2016-02-27 04:29:02', 'kg', '401201,401202,401203,401207,401301,401302,401303,400103,400101', 'Approved', 0, ''),
(17, 'asd', 'sadsad', 'Tulips.jpg', 120, 'Fresh Fruits', 'Rushikesh', '2016-02-27 04:31:30', 'kg', '401201,401202,401203,401207,401301,401302,401303,400103,400101', 'Approved', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cc_f_sales`
--
ALTER TABLE `cc_f_sales`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `cc_m_admin`
--
ALTER TABLE `cc_m_admin`
  ADD PRIMARY KEY (`a_uname`);

--
-- Indexes for table `cc_m_customer`
--
ALTER TABLE `cc_m_customer`
  ADD PRIMARY KEY (`cust_uname`);

--
-- Indexes for table `cc_m_customer_details`
--
ALTER TABLE `cc_m_customer_details`
  ADD PRIMARY KEY (`cust_uname`);

--
-- Indexes for table `cc_m_farmer`
--
ALTER TABLE `cc_m_farmer`
  ADD PRIMARY KEY (`fm_uname`);

--
-- Indexes for table `cc_m_farmer_details`
--
ALTER TABLE `cc_m_farmer_details`
  ADD PRIMARY KEY (`fm_uname`);

--
-- Indexes for table `cc_m_order`
--
ALTER TABLE `cc_m_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `cc_m_order_details`
--
ALTER TABLE `cc_m_order_details`
  ADD PRIMARY KEY (`order_id`,`pid`);

--
-- Indexes for table `cc_m_products`
--
ALTER TABLE `cc_m_products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `cc_m_upload_products`
--
ALTER TABLE `cc_m_upload_products`
  ADD PRIMARY KEY (`pid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
