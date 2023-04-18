-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2021 at 07:59 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mp`
--

-- --------------------------------------------------------

--
-- Table structure for table `licence`
--

CREATE TABLE `licence` (
  `licenceid` int(11) NOT NULL,
  `lastdate` date DEFAULT NULL,
  `extensioncost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `licence`
--

INSERT INTO `licence` (`licenceid`, `lastdate`, `extensioncost`) VALUES
(1, '2021-12-01', 1000),
(2, '2022-02-15', 1500),
(3, '2021-12-31', 2000),
(4, '2022-01-01', 1000),
(5, '2022-01-10', 1200),
(6, '2022-01-15', 1200),
(7, '2021-12-20', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `ownerid` int(11) NOT NULL,
  `shopid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`ownerid`, `shopid`) VALUES
(1, 102),
(2, 103),
(3, 104),
(4, 107),
(6, 105),
(6, 106),
(7, 101);

-- --------------------------------------------------------

--
-- Table structure for table `payext`
--

CREATE TABLE `payext` (
  `extid` int(11) NOT NULL,
  `shopid` int(11) DEFAULT NULL,
  `licenceid` int(11) DEFAULT NULL,
  `months` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payext`
--

INSERT INTO `payext` (`extid`, `shopid`, `licenceid`, `months`) VALUES
(1, 101, 1, 1),
(2, 102, 2, 1),
(3, 103, 3, 1),
(4, 104, 4, 1),
(5, 105, 5, 1),
(6, 106, 6, 1),
(7, 107, 7, 1),
(8, 102, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `payrent`
--

CREATE TABLE `payrent` (
  `payid` int(11) NOT NULL,
  `shopid` int(11) DEFAULT NULL,
  `rentid` int(11) DEFAULT NULL,
  `months` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payrent`
--

INSERT INTO `payrent` (`payid`, `shopid`, `rentid`, `months`) VALUES
(2, 101, 1, 1),
(3, 102, 2, 1),
(4, 103, 3, 1),
(5, 104, 4, 1),
(6, 105, 5, 1),
(7, 106, 6, 1),
(8, 107, 7, 1),
(9, 101, 1, 2),
(10, 102, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `rentid` int(11) NOT NULL,
  `electricity` int(11) DEFAULT NULL,
  `maintainace` int(11) DEFAULT NULL,
  `watersupply` int(11) DEFAULT NULL,
  `securitydep` int(11) DEFAULT NULL,
  `gst` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `lastdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`rentid`, `electricity`, `maintainace`, `watersupply`, `securitydep`, `gst`, `total`, `lastdate`) VALUES
(1, 704, 100, 229, 371, 197, 1601, '2022-04-01'),
(2, 802, 372, 106, 316, 101, 1697, '2022-04-01'),
(3, 898, 258, 145, 265, 118, 1684, '2021-11-25'),
(4, 582, 475, 307, 380, 190, 1934, '2022-01-10'),
(5, 718, 298, 196, 304, 190, 1706, '2021-12-15'),
(6, 844, 369, 363, 380, 182, 2138, '2022-01-15'),
(7, 563, 447, 326, 387, 141, 1864, '2021-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `shopid` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `feedback` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`reviewid`, `userid`, `shopid`, `rating`, `feedback`) VALUES
(1, 1, 101, 10, 'It was a great experience'),
(2, 1, 103, 7, 'unplesent environment but good food'),
(3, 2, 102, 8, 'easy to buy but low quality sometimes'),
(4, 2, 104, 10, 'Healty and great'),
(5, 3, 107, 7, 'Good product but always closed'),
(6, 3, 101, 8, 'fine food'),
(7, 4, 105, 8, 'Tasty food but waiting is long'),
(8, 4, 106, 5, 'not tasty like Nescafe1 and waiting is long'),
(9, 5, 102, 6, 'management can be better'),
(10, 5, 103, 10, 'very oily'),
(11, 6, 104, 4, 'good and fresh'),
(12, 6, 107, 7, 'should be open often'),
(13, 7, 105, 9, 'Good coffee'),
(14, 7, 106, 8, 'good but very slow serving'),
(15, 1, 104, 9, 'it was very good');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `shopid` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `ownerid` int(11) DEFAULT NULL,
  `licenceid` int(11) DEFAULT NULL,
  `rentid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`shopid`, `name`, `area`, `ownerid`, `licenceid`, `rentid`) VALUES
(101, 'IITP Canteen', 'IITP main rd', 7, 1, 1),
(102, 'Stationary Shop', 'IITP main rd', 1, 2, 2),
(103, 'IIT Food Court', 'IITP main rd', 2, 3, 3),
(104, 'IITP Fruit Shop', 'Boys hostel rd', 3, 4, 4),
(105, 'Nescafe 1', 'IITP main rd', 6, 5, 5),
(106, 'Nescafe 2', 'Boys hostel rd', 6, 6, 6),
(107, 'Gautam Milk Parlor', 'IITP main rd', 4, 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `passwrd` varchar(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `occuption` varchar(50) NOT NULL DEFAULT 'guest' COMMENT '1. guest\r\n2. shop keeper\r\n3. employee',
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `passwrd`, `name`, `age`, `gender`, `occuption`, `mobile`, `email`) VALUES
(1, 'aaa', 'Raghav Kumar', 28, 'male', 'shop keeper', '999999990', 'raghav@gmail.com'),
(2, 'bbb', 'Ramesh Yadav', 32, 'male', 'shop keeper', '999999991', 'ramesh@gmail.com'),
(3, 'ccc', 'Rajesh Yadav', 32, 'male', 'shop keeper', '999999992', 'rajesh@gmail.com'),
(4, 'ddd', 'Gautam Kumar', 54, 'male', 'shop keeper', '999999993', 'gautam@gmail.com'),
(5, 'eee', 'Suraj Singh', 38, 'male', 'guest', '9999999904', 'suraj@gmail.com'),
(6, 'fff', 'Anand Sinha', 44, 'male', 'shop keeper', '9999999905', 'anand@gmail.com'),
(7, 'ggg', 'Ravi Shankar', 59, 'male', 'shop keeper', '999999996', 'ravi@gmail.com'),
(8, 'hhh', 'Adhitya Raj', 30, 'male', 'guest', '999999997', 'adhitya@gmail.com'),
(9, 'iii', 'Amanpreet Singh', 25, 'male', 'guest', '999999998', 'aman@gmail.com'),
(10, 'jjj', 'Mahendra reddy', 47, 'male', 'guest', '999999999', 'mahi@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `licence`
--
ALTER TABLE `licence`
  ADD PRIMARY KEY (`licenceid`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`ownerid`,`shopid`),
  ADD KEY `shopid` (`shopid`);

--
-- Indexes for table `payext`
--
ALTER TABLE `payext`
  ADD PRIMARY KEY (`extid`),
  ADD KEY `shopid` (`shopid`),
  ADD KEY `licenceid` (`licenceid`);

--
-- Indexes for table `payrent`
--
ALTER TABLE `payrent`
  ADD PRIMARY KEY (`payid`),
  ADD KEY `shopid` (`shopid`),
  ADD KEY `rentid` (`rentid`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`rentid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `shopid` (`shopid`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`shopid`),
  ADD KEY `fk_shops` (`ownerid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payext`
--
ALTER TABLE `payext`
  MODIFY `extid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payrent`
--
ALTER TABLE `payrent`
  MODIFY `payid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `owners`
--
ALTER TABLE `owners`
  ADD CONSTRAINT `owners_ibfk_1` FOREIGN KEY (`ownerid`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `owners_ibfk_2` FOREIGN KEY (`shopid`) REFERENCES `shops` (`shopid`);

--
-- Constraints for table `payext`
--
ALTER TABLE `payext`
  ADD CONSTRAINT `payext_ibfk_1` FOREIGN KEY (`shopid`) REFERENCES `shops` (`shopid`) ON DELETE SET NULL,
  ADD CONSTRAINT `payext_ibfk_2` FOREIGN KEY (`licenceid`) REFERENCES `licence` (`licenceid`) ON DELETE SET NULL;

--
-- Constraints for table `payrent`
--
ALTER TABLE `payrent`
  ADD CONSTRAINT `payrent_ibfk_1` FOREIGN KEY (`shopid`) REFERENCES `shops` (`shopid`) ON DELETE SET NULL,
  ADD CONSTRAINT `payrent_ibfk_2` FOREIGN KEY (`rentid`) REFERENCES `rent` (`rentid`) ON DELETE SET NULL;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE SET NULL,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`shopid`) REFERENCES `shops` (`shopid`) ON DELETE SET NULL;

--
-- Constraints for table `shops`
--
ALTER TABLE `shops`
  ADD CONSTRAINT `shops_ibfk_1` FOREIGN KEY (`ownerid`) REFERENCES `users` (`userid`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
