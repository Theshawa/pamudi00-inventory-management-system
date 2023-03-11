-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2023 at 04:11 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salesachieved`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agentID` int(11) NOT NULL,
  `companyName` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agentID`, `companyName`, `phone`, `address`) VALUES
(1, 'Grasshopper', '0765579886', '23/A, Barista Road, Piliyandala'),
(2, 'Uber', '0765579886', '23/A, Flower Road, Athurugiriya'),
(9, 'pamudi', '0778345729', 'Borupana Rd, Moratuwa'),
(10, 'Theshawa Tech', '0766743755', 'No.285, Hapugala, Galle.'),
(11, 'Theshawa Tech12', '0766743755', 'No.285, Hapugala, Galle.'),
(12, 'Theshawa Tech', '0766743755', 'No.285, Hapugala, Galle.');

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `id` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `objective` varchar(255) NOT NULL,
  `cmpg_stat` varchar(255) NOT NULL,
  `budget` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`id`, `startdate`, `objective`, `cmpg_stat`, `budget`) VALUES
(1, '2022-12-15', 'leads', 'ongoing', 120000),
(2, '2022-12-13', 'leads', 'tobelaunched', 2000),
(3, '2022-12-15', 'awareness', 'tobelaunched', 2000),
(4, '2022-12-17', 'awareness', 'tobelaunched', 2000),
(5, '2023-02-23', 'awareness', 'tobelaunched', 65767),
(6, '2023-02-22', 'sales', 'ongoing', 800000),
(7, '2023-02-24', 'engagement', 'complete', 700000);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaintID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `complaintDate` date NOT NULL DEFAULT current_timestamp(),
  `productCode` varchar(10) NOT NULL,
  `complaint` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaintID`, `orderID`, `complaintDate`, `productCode`, `complaint`) VALUES
(1, 2, '2023-02-09', 'PR003', 'Damaged goods');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `socialMediaPlatform` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `name`, `phone`, `address`, `socialMediaPlatform`) VALUES
(1, 'Senu Dilshara', '0765579886', '18/9, Bokundara, Piliyanadala', 'Facebook'),
(2, 'Bethmi Navanjali', '0765579886', '23/A, Barista Road, Piliyandala', 'Instagram'),
(5, 'Binu De Silva', '0765283602', '23/A, Flower Road, Athurugiriya', 'Whatsapp'),
(7, 'Chamodi De Silva', '0765579886', '23/A, Flower Road, Athurugiriya', 'Whatsapp');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `feedback` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order-product`
--

CREATE TABLE `order-product` (
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order-product`
--

INSERT INTO `order-product` (`orderId`, `productId`, `quantity`) VALUES
(2, 13, 2),
(2, 15, 1),
(5, 13, 4),
(5, 15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `orderDate` date NOT NULL DEFAULT current_timestamp(),
  `customerID` int(11) NOT NULL,
  `orderDetails` varchar(10) NOT NULL,
  `orderStatus` varchar(10) NOT NULL,
  `paymentMethod` varchar(20) NOT NULL,
  `deliveryDate` date DEFAULT NULL,
  `dispatchDate` date DEFAULT NULL,
  `deliveryRegion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `orderDate`, `customerID`, `orderDetails`, `orderStatus`, `paymentMethod`, `deliveryDate`, `dispatchDate`, `deliveryRegion`) VALUES
(2, '2022-03-09', 1, 'PR003', 'dispatched', 'BT', NULL, '2023-03-11', 'Colombo Suburbs'),
(5, '2023-04-09', 2, 'PR001', 'dispatched', 'COD', NULL, '2023-03-11', 'Within Colombo');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(20) NOT NULL,
  `productCategory` varchar(20) NOT NULL,
  `productCode` varchar(10) NOT NULL,
  `buyingPrice` double NOT NULL,
  `sellingPrice` double NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(100) NOT NULL,
  `productName` varchar(1000) NOT NULL,
  `productCategory` varchar(1000) NOT NULL,
  `productCode` varchar(1000) NOT NULL,
  `buyingPrice` int(100) NOT NULL,
  `sellingPrice` int(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `productName`, `productCategory`, `productCode`, `buyingPrice`, `sellingPrice`, `quantity`) VALUES
(13, 'ssgss_asda', 'test', 'sgsg', 45, 89, 3),
(15, 'PR007', 'Category 7', 'Product 6', 4000, 6000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `telephone` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `user_role`, `gender`, `telephone`, `username`, `password`) VALUES
(8, 'Masha Nilushi', 'salesrep@gmail.com', 'Sales Representative', 'Female', 763397994, 'sales1', 'salesRep1'),
(9, 'Pamudi Guruge', 'storemanager@gmail.com', 'Store Manager', 'Female', 718087956, 'store1', 'storeMan1'),
(10, 'Kamal Perera', 'financemanager@gmail.com', 'Finance Manager', 'Male', 756674553, 'finance1', 'financeMan1'),
(11, 'Chamodi De Silva', 'digitalmarketing@gmail.com', 'Digital Marketing Strategist', 'Female', 765283602, 'digital1', 'digitalMan1'),
(12, 'Sahan Perera', 'courier@gmail.com', 'Courier', 'Male', 775322380, 'courier1', 'courierMan1'),
(13, 'Vishmi Perera', 'owner@gmail.com', 'Owner', 'Female', 754788653, 'owner1', 'ownerMan1');

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

CREATE TABLE `useradmin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useradmin`
--

INSERT INTO `useradmin` (`id`, `name`, `email`, `user_role`, `gender`, `telephone`, `username`, `password`) VALUES
(6, 'Masha Nilushi', 'mashanilushi@gmail.com', 'Sales Representative', 'Female', 0, 'salesRep1', 'salesRep1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agentID`);

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaintID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexes for table `order-product`
--
ALTER TABLE `order-product`
  ADD PRIMARY KEY (`orderId`,`productId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaintID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `useradmin`
--
ALTER TABLE `useradmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
