-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2021 at 11:35 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `uid` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `uname` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`uid`, `email`, `uname`, `password`) VALUES
(1, 'jonas@gmail.com', 'Jonas', '12345'),
(2, 'admin@gmail.com', 'Admin', 'admin'),
(3, 'alex@gmail.com', 'Alex', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `mid` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `director` varchar(300) NOT NULL,
  `writer` varchar(300) NOT NULL,
  `production` varchar(400) NOT NULL,
  `language` varchar(300) NOT NULL,
  `release_date` date NOT NULL,
  `runtime` varchar(400) NOT NULL,
  `genres` varchar(400) NOT NULL,
  `cast` varchar(500) NOT NULL,
  `image` varchar(200) NOT NULL,
  `movieID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`mid`, `name`, `director`, `writer`, `production`, `language`, `release_date`, `runtime`, `genres`, `cast`, `image`, `movieID`) VALUES
(1, 'avenger', 'safa', 'hasfcjak', 'hcfuw', 'Spanish,English', '2018-10-29', 'sdafa', 'Action,Adventure', 'adsfnnji', 'uploads/avengers.jpg', 1),
(2, 'AVENGERSS', 'sdfh', 'huihui', 'iuh', 'English,Hindi', '2018-10-28', 'ahf', 'Action,Adventure', 'sdhuqh', 'uploads/bossbaby.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `mid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `comment` varchar(600) NOT NULL,
  `Cur_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`mid`, `uid`, `rate`, `comment`, `Cur_date`) VALUES
(1, 1, 5, 'good', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `trailer`
--

CREATE TABLE `trailer` (
  `movieID` int(11) NOT NULL,
  `movieName` varchar(400) NOT NULL,
  `link` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trailer`
--

INSERT INTO `trailer` (`movieID`, `movieName`, `link`) VALUES
(1, 'avenger', 'https://www.youtube.com/embed/TcMBFSGVi1c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `movieID` (`movieID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`mid`,`uid`),
  ADD KEY `mid` (`mid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `trailer`
--
ALTER TABLE `trailer`
  ADD PRIMARY KEY (`movieID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trailer`
--
ALTER TABLE `trailer`
  MODIFY `movieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`movieID`) REFERENCES `trailer` (`movieID`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `movie` (`mid`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `member` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
