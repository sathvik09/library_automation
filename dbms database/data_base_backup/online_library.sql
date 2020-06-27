-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2020 at 02:45 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `isbn` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `publication` varchar(100) NOT NULL,
  `edition` int(11) NOT NULL,
  `genere` varchar(50) NOT NULL,
  `no_of_issues` int(11) NOT NULL DEFAULT 0,
  `permitions` varchar(20) NOT NULL,
  `issued` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`isbn`, `name`, `publication`, `edition`, `genere`, `no_of_issues`, `permitions`, `issued`) VALUES
(231432, 'A Dance with Dragons', 'George RR Martin', 1, 'Thriller', 0, '10', 0),
(249862, 'Elon Musk', 'Ashlee Vance', 1, 'Autobiography', 0, '10', 0),
(279432, 'Hunger Games: Catching Fire', 'Suzanne Collins', 1, 'Thriller', 0, '10', 0),
(934324, 'The Winds Of Winter', 'George RR Martin', 1, 'Thriller', 0, '10', 0),
(982401, 'Theory Of Everything', 'Stephen Hawking', 1, 'Science_Fiction', 0, '10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `borrow_return`
--

CREATE TABLE `borrow_return` (
  `isbn` int(11) NOT NULL,
  `sid` varchar(50) DEFAULT NULL,
  `tid` varchar(50) DEFAULT NULL,
  `date_issue` date DEFAULT NULL,
  `date_return` date DEFAULT NULL,
  `issued` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrow_return`
--

INSERT INTO `borrow_return` (`isbn`, `sid`, `tid`, `date_issue`, `date_return`, `issued`) VALUES
(231432, NULL, 'is001', '2020-06-27', '2020-07-12', 1),
(249862, '1bm18is093', NULL, '2020-06-26', '2020-07-11', 1),
(279432, '1bm18is093', NULL, '2020-06-27', '2020-07-12', 1),
(934324, NULL, NULL, NULL, NULL, 0),
(982401, NULL, 'is001', '2020-06-27', '2020-07-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `buys`
--

CREATE TABLE `buys` (
  `it_no` int(11) DEFAULT NULL,
  `id` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buys`
--

INSERT INTO `buys` (`it_no`, `id`, `name`, `quantity`) VALUES
(NULL, '1bm18is034', NULL, NULL),
(NULL, '1bm18is064', NULL, NULL),
(NULL, '1bm18is093', NULL, NULL),
(1, '1bm18is094', NULL, 1),
(NULL, '1bm18is095', NULL, NULL),
(5, 'is001', NULL, 2),
(NULL, 'is002', NULL, NULL),
(NULL, 'is003', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cafeteria`
--

CREATE TABLE `cafeteria` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cafeteria`
--

INSERT INTO `cafeteria` (`id`, `name`, `quantity`, `price`) VALUES
(1, 'brownie', 10, 20),
(2, 'cheesecake', 10, 50),
(3, 'milkshake', 10, 60),
(4, 'coke', 10, 30),
(5, 'thumbs_up', 10, 20),
(6, 'pancake', 10, 60);

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `amount`) VALUES
(1, 230);

-- --------------------------------------------------------

--
-- Table structure for table `library_attendence`
--

CREATE TABLE `library_attendence` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library_attendence`
--

INSERT INTO `library_attendence` (`id`, `student`, `teacher`) VALUES
(1, 37, 18);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sem` int(11) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `bal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `pass`, `name`, `sem`, `dept`, `bal`) VALUES
('1bm18is064', 'nikhil', 'nikhil', 4, 'is', 100),
('1bm18is093', 'sathvik123', 'sathvik', 4, 'is', 200),
('1bm18is094', 'saurabh', 'saurabh', 4, 'is', 110),
('1bm18is095', 'syeed', 'syeed', 4, 'is', 200);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `bal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `pass`, `name`, `dept`, `bal`) VALUES
('is001', 'guruprasad', 'guruprasad', 'is', 210),
('is002', 'sindhu', 'sindhu', 'is', 200),
('is003', 'gururaj', 'gururaj', 'is', 200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `borrow_return`
--
ALTER TABLE `borrow_return`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `fk2` (`sid`),
  ADD KEY `fk3` (`tid`);

--
-- Indexes for table `buys`
--
ALTER TABLE `buys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow_return`
--
ALTER TABLE `borrow_return`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`isbn`) REFERENCES `books` (`isbn`),
  ADD CONSTRAINT `fk2` FOREIGN KEY (`sid`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `fk3` FOREIGN KEY (`tid`) REFERENCES `teacher` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
