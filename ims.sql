-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 03, 2023 at 07:16 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `Customer_ID` int NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Adress` varchar(100) NOT NULL,
  PRIMARY KEY (`Customer_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Name`, `Adress`) VALUES
(1, 'Ahmed Khan', '123 ABC Street, Karachi, Pakistan'),
(2, 'Sadia Ali', '456 XYZ Road, Lahore, Pakistan'),
(3, 'Imran Ahmed', '789 DEF Avenue, Islamabad, Pakistan'),
(4, 'Ayesha Malik', '567 GHI Lane, Faisalabad, Pakistan'),
(5, 'Rizwan Khan', '890 JKL Plaza, Rawalpindi, Pakistan'),
(6, 'Fariha Abbas', '234 MNO Square, Peshawar, Pakistan'),
(7, 'Kamran Ali', '678 QRS Street, Lahore, Pakistan'),
(8, 'Hina Farooq', '345 TUV Road, Karachi, Pakistan'),
(9, 'Nabeel Ahmed', '123 WXY Lane, Islamabad, Pakistan'),
(10, 'Sara Khan', '456 ZAB Road, Sialkot, Pakistan'),
(11, 'Omar Riaz', '789 CDE Avenue, Quetta, Pakistan'),
(12, 'Madiha Akram', '567 FGH Lane, Multan, Pakistan'),
(13, 'Zainab Ali', '890 IJK Plaza, Gujranwala, Pakistan'),
(14, 'Bilal Raza', '234 LMN Square, Hyderabad, Pakistan'),
(15, 'Fiza Khan', '678 OPQ Street, Faisalabad, Pakistan'),
(16, 'Talha Fakhar', '786 MN street, Faislabad, Pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `delievery`
--

DROP TABLE IF EXISTS `delievery`;
CREATE TABLE IF NOT EXISTS `delievery` (
  `Deliever_ID` int NOT NULL,
  `Sale_Date` date NOT NULL,
  `Customer_ID` int NOT NULL,
  `Product_ID` int NOT NULL,
  `Warehouse_ID` int NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`Deliever_ID`),
  KEY `Product_ID` (`Product_ID`),
  KEY `Warehouse_ID` (`Warehouse_ID`),
  KEY `Customer_ID` (`Customer_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `delievery`
--

INSERT INTO `delievery` (`Deliever_ID`, `Sale_Date`, `Customer_ID`, `Product_ID`, `Warehouse_ID`, `quantity`) VALUES
(1, '2023-01-15', 1, 1, 1, 5),
(2, '2023-02-20', 2, 3, 2, 8),
(3, '2023-03-10', 3, 5, 3, 3),
(4, '2023-04-05', 4, 2, 1, 7),
(5, '2023-05-18', 5, 7, 2, 2),
(6, '2023-06-22', 6, 9, 3, 10),
(7, '2023-07-30', 7, 12, 1, 4),
(8, '2023-08-14', 8, 14, 2, 6),
(9, '2023-09-05', 9, 8, 3, 1),
(10, '2023-10-12', 10, 10, 1, 9),
(11, '2023-11-25', 11, 4, 2, 5),
(12, '2023-12-19', 12, 6, 3, 3),
(13, '2024-01-08', 13, 11, 1, 7),
(14, '2024-02-16', 14, 13, 2, 2),
(15, '2024-03-30', 15, 15, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `ordeer`
--

DROP TABLE IF EXISTS `ordeer`;
CREATE TABLE IF NOT EXISTS `ordeer` (
  `Order_ID` int NOT NULL,
  `Provider_ID` int NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`Order_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ordeer`
--

INSERT INTO `ordeer` (`Order_ID`, `Provider_ID`, `Date`) VALUES
(1, 1, '2023-12-06'),
(2, 2, '2023-12-16'),
(3, 3, '2022-12-08'),
(4, 4, '2023-12-01'),
(5, 5, '2023-12-02'),
(6, 6, '2023-12-03'),
(7, 7, '2023-12-04'),
(8, 8, '2023-12-05'),
(9, 9, '2023-12-06'),
(10, 10, '2023-12-07'),
(11, 11, '2023-12-08'),
(12, 12, '2023-12-09'),
(13, 13, '2023-12-10'),
(14, 14, '2023-12-11'),
(15, 15, '2023-12-12'),
(16, 16, '2023-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `Product_ID` int NOT NULL,
  `Product_code` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Quantity` int NOT NULL,
  `weight` float NOT NULL,
  PRIMARY KEY (`Product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Product_code`, `Name`, `Category`, `Quantity`, `weight`) VALUES
(1, 'P001', 'Smartphone X', 'Electronics', 100, 0.3),
(2, 'P002', 'Laptop Pro', 'Electronics', 70, 2.5),
(3, 'P003', 'LED TV 42\"', 'Electronics', 30, 10),
(4, 'P004', 'Washing Machine', 'Appliances', 40, 15),
(5, 'P005', 'Refrigerator', 'Appliances', 25, 20),
(6, 'P006', 'Microwave Oven', 'Appliances', 20, 5),
(7, 'P007', 'Bluetooth Speaker', 'Electronics', 80, 0.5),
(8, 'P008', 'Gaming Console', 'Electronics', 15, 3),
(9, 'P009', 'Digital Camera', 'Electronics', 35, 1),
(10, 'P010', 'Air Conditioner', 'Appliances', 10, 25),
(11, 'P011', 'Coffee Maker', 'Appliances', 18, 2),
(12, 'P012', 'Portable Charger', 'Electronics', 60, 0.2),
(13, 'P013', 'Electric Kettle', 'Appliances', 22, 1.5),
(14, 'P014', 'Fitness Tracker', 'Electronics', 45, 0.1),
(15, 'P015', 'Robot Vacuum', 'Appliances', 12, 8),
(16, 'P016', 'Laptop', 'Electronics', 45, 0.7),
(17, 'P017', 'Microcontroller', 'Electronics', 5, 0.8),
(19, 'P019', 'AC', 'Electronics', 5, 12.5);

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

DROP TABLE IF EXISTS `provider`;
CREATE TABLE IF NOT EXISTS `provider` (
  `Provider_ID` int NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Provider_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`Provider_ID`, `Name`, `Address`) VALUES
(1, 'Ali Electronics', '123 Main Street, Karachi, Pakistan'),
(2, 'Sana Tech', '456 Market Road, Lahore, Pakistan'),
(3, 'Khan Appliances', '789 Business Avenue, Islamabad, Pakistan'),
(4, 'Raza Enterprises', '567 Commercial Lane, Faisalabad, Pakistan'),
(5, 'Tech Innovators', '890 Tech Plaza, Rawalpindi, Pakistan'),
(6, 'Pak Traders', '234 Market Square, Peshawar, Pakistan'),
(7, 'Lahore Electronics', '678 Mall Street, Lahore, Pakistan'),
(8, 'Karachi Gadgets', '345 Tech Street, Karachi, Pakistan'),
(9, 'Islamabad Supplies', '123 Capital Road, Islamabad, Pakistan'),
(10, 'Sialkot Tech Solutions', '456 Industry Lane, Sialkot, Pakistan'),
(11, 'Quetta Connections', '789 Trade Center, Quetta, Pakistan'),
(12, 'Multan Electronics', '567 Commercial Avenue, Multan, Pakistan'),
(13, 'Gujranwala Gadgets', '890 Tech Lane, Gujranwala, Pakistan'),
(14, 'Hyderabad Tech Hub', '234 Market Road, Hyderabad, Pakistan'),
(15, 'Faisalabad Innovations', '678 Tech Square, Faisalabad, Pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

DROP TABLE IF EXISTS `transfer`;
CREATE TABLE IF NOT EXISTS `transfer` (
  `Transfer_ID` int NOT NULL,
  `Transfer_quantity` int NOT NULL,
  `Send_date` date NOT NULL,
  `Recieve_date` date NOT NULL,
  `Product_ID` int NOT NULL,
  PRIMARY KEY (`Transfer_ID`),
  KEY `Product_ID` (`Product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`Transfer_ID`, `Transfer_quantity`, `Send_date`, `Recieve_date`, `Product_ID`) VALUES
(1, 15, '2023-01-05', '2023-01-10', 1),
(2, 8, '2023-02-12', '2023-02-18', 2),
(3, 10, '2023-03-08', '2023-03-15', 3),
(4, 20, '2023-04-20', '2023-04-25', 4),
(5, 12, '2023-05-15', '2023-05-20', 5),
(6, 15, '2023-06-25', '2023-06-30', 6),
(7, 30, '2023-07-10', '2023-07-15', 7),
(8, 12, '2023-08-05', '2023-08-10', 8),
(9, 18, '2023-09-15', '2023-09-20', 9),
(10, 7, '2023-10-18', '2023-10-25', 10),
(11, 15, '2023-11-10', '2023-11-15', 11),
(12, 10, '2023-12-02', '2023-12-08', 12),
(13, 25, '2024-01-20', '2024-01-25', 13),
(14, 8, '2024-02-08', '2024-02-15', 14),
(15, 14, '2024-03-15', '2024-03-20', 15),
(16, 72, '2023-05-05', '2023-07-10', 9);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

DROP TABLE IF EXISTS `warehouse`;
CREATE TABLE IF NOT EXISTS `warehouse` (
  `Warehouse_ID` int NOT NULL,
  `Warehouse_name` varchar(50) NOT NULL,
  `Location` varchar(150) NOT NULL,
  PRIMARY KEY (`Warehouse_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`Warehouse_ID`, `Warehouse_name`, `Location`) VALUES
(0, '', ''),
(1, 'Karachi Warehouse A', '123 ABC Street, Karachi, Pakistan'),
(2, 'Lahore Warehouse B', '456 XYZ Road, Lahore, Pakistan'),
(3, 'Islamabad Warehouse C', '789 DEF Avenue, Islamabad, Pakistan'),
(4, 'Faisalabad Warehouse D', '567 GHI Lane, Faisalabad, Pakistan'),
(5, 'Rawalpindi Warehouse E', '890 JKL Plaza, Rawalpindi, Pakistan'),
(6, 'Peshawar Warehouse F', '234 MNO Square, Peshawar, Pakistan'),
(7, 'Multan Warehouse G', '678 QRS Street, Multan, Pakistan'),
(8, 'Quetta Warehouse H', '345 TUV Road, Quetta, Pakistan'),
(9, 'Sialkot Warehouse I', '123 WXY Lane, Sialkot, Pakistan'),
(10, 'Hyderabad Warehouse J', '456 ZAB Road, Hyderabad, Pakistan'),
(11, 'Gujranwala Warehouse K', '789 CDE Avenue, Gujranwala, Pakistan'),
(12, 'Abbottabad Warehouse L', '567 FGH Lane, Abbottabad, Pakistan'),
(13, 'Karachi warehouse M', '911 abc Road, Peshawar, Pakistan');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delievery`
--
ALTER TABLE `delievery`
  ADD CONSTRAINT `delievery_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `delievery_ibfk_2` FOREIGN KEY (`Warehouse_ID`) REFERENCES `warehouse` (`Warehouse_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `delievery_ibfk_3` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `transfer_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
