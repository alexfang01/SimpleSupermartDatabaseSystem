-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 10:37 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alexfmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` enum('a','u') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `type`) VALUES
(1, 'admin', 'admin', 'a'),
(2, 'user', 'user', 'u'),
(8, '123', '123', 'u');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandID` varchar(5) NOT NULL,
  `brandName` varchar(20) NOT NULL,
  `country` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandID`, `brandName`, `country`) VALUES
('BB01', 'Swan', 'Malaysia'),
('BB02', 'Body Glove', 'Malaysia'),
('BC01', 'Mentos', 'Malaysia'),
('BC02', 'Ferrero Rocher', 'Itali'),
('BC03', 'Lot 100', 'Malaysia'),
('BC04', 'DoubleMint', 'Malaysia'),
('BF01', 'Berry Farm', 'Malaysia'),
('BF02', 'Ambrosia', 'UK'),
('BM01', 'Dutch Lady', 'Malaysia'),
('BM02', 'Arla', 'Philipine'),
('BS01', 'Faber-Castell', 'Germany'),
('BS02', 'Pilot', 'Japan');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `IC` varchar(15) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`IC`, `name`, `address`) VALUES
('0', 'NULL', '0'),
('000102-03-0405', 'Aman', '123, Jalan Bumita, Perlis 11000'),
('010203-04-0506', 'Kah Keong', '111, Jalan Bintang, Perlis 12300'),
('021002-01-0345', 'Nancy', '31, Jalan Aman, Perlis 12333'),
('050213-04-0782', 'Daniel', '11, Jalan Maji, Perlis 12300');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `indID` varchar(5) NOT NULL,
  `indName` varchar(30) NOT NULL,
  `indAddress` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`indID`, `indName`, `indAddress`) VALUES
('IB01', 'Bag Seller', '31, Jalan Shota, Arau 11900'),
('IB02', 'SWAM', '33, Jalan Shoga, Arau 11900'),
('IC01', 'Tasteeth sugar Product', '331, Jalan Kanan, Kedah 12000'),
('IC02', 'Candy Shop', '21, Jalan Queensbay, Penang 19'),
('IF01', 'Street Fruit Product', '34, Jalan Shonam, Arau 42900'),
('IF02', 'Tastefruity ', '12, Jalan Bulan, Arau 32900'),
('IM01', 'Dairy Milk', '122, Jalan Putra, Kedah 12900'),
('IS01', 'K.M. Stationary Industry', '334, Jalan Bumi, Gurun 22900'),
('IS02', 'Best Stationary', '22, Jalan Maybank, Kedah 12900');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `proID` varchar(5) NOT NULL,
  `indID` varchar(5) NOT NULL,
  `brandID` varchar(5) NOT NULL,
  `pName` varchar(30) NOT NULL,
  `price` double(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`proID`, `indID`, `brandID`, `pName`, `price`) VALUES
('--', 'IF01', 'BF01', 'NULL', 0.00),
('PF01', 'IF01', 'BF02', 'Apple', 2.00),
('PF02', 'IF01', 'BF02', 'Mango', 6.00),
('PF04', 'IF02', 'BF01', 'Apple', 3.00),
('PF05', 'IF02', 'BF01', 'Mango', 8.00),
('PF06', 'IF01', 'BF02', 'Watermelon', 20.00),
('PM01', 'IM01', 'BM01', 'Milk', 8.00),
('PM02', 'IM01', 'BM02', 'Milk', 12.00),
('PS01', 'IS01', 'BS01', 'Pen', 2.00),
('PS02', 'IS01', 'BS02', 'Pen G2', 6.00);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `pID` int(5) NOT NULL,
  `recpID` varchar(5) NOT NULL,
  `proID` varchar(5) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`pID`, `recpID`, `proID`, `quantity`) VALUES
(0, '0', '', 0),
(1, 'R01', 'PF01', 1),
(2, 'R01', 'PM02', 2),
(3, 'R02', 'PF05', 2),
(4, 'R02', 'PS02', 3),
(7, 'R02', 'PM01', 2),
(24, 'R02', 'PM01', 4),
(28, 'R03', 'PF04', 1),
(29, 'R03', 'PM02', 3),
(32, 'R01', 'PF01', 1),
(36, 'R01', 'PF04', 4);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `recpID` varchar(5) NOT NULL,
  `IC` varchar(15) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`recpID`, `IC`, `date`) VALUES
('--', '0', '2020-01-01'),
('R01', '000102-03-0405', '2021-04-03'),
('R02', '010203-04-0506', '2021-04-04'),
('R03', '000102-03-0405', '2021-04-07'),
('R04', '000102-03-0405', '2021-04-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandID`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`IC`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`indID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`proID`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`pID`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`recpID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `pID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
