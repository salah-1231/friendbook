-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2022 at 08:07 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `friend`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comId` int(11) NOT NULL,
  `pId` int(11) NOT NULL,
  `comDate` date NOT NULL DEFAULT current_timestamp(),
  `comtext` text NOT NULL,
  `uName` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comId`, `pId`, `comDate`, `comtext`, `uName`) VALUES
(1, 2, '2022-04-28', 'salah', 'salah'),
(2, 2, '2022-04-28', 'hello', 'salah'),
(3, 2, '2022-04-28', 'test', 'salah'),
(4, 2, '2022-04-28', 'test2', 'salah'),
(13, 2, '2022-04-28', 'hello', 'salah'),
(14, 24, '2022-04-28', 'hello', 'salah'),
(15, 1, '2022-05-12', 'nice', 'salah'),
(16, 2, '2022-05-12', 'hello', 'salah'),
(17, 24, '2022-05-12', 'like', 'salah'),
(18, 25, '2022-05-14', 'hello', 'salah'),
(37, 25, '2022-05-14', 'hhh', 'salah'),
(38, 25, '2022-05-14', 'zaid is stubed', 'salah');

-- --------------------------------------------------------

--
-- Table structure for table `friendreq`
--

CREATE TABLE `friendreq` (
  `rid` int(11) NOT NULL,
  `sende` varchar(12) NOT NULL,
  `recive` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friendreq`
--

INSERT INTO `friendreq` (`rid`, `sende`, `recive`) VALUES
(1, 'salah', 'ali');

-- --------------------------------------------------------

--
-- Table structure for table `friendship`
--

CREATE TABLE `friendship` (
  `fId` int(11) NOT NULL,
  `user1` varchar(12) NOT NULL,
  `user2` varchar(12) NOT NULL,
  `dof` datetime NOT NULL DEFAULT current_timestamp(),
  `state` enum('1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friendship`
--

INSERT INTO `friendship` (`fId`, `user1`, `user2`, `dof`, `state`) VALUES
(4, 'salah', 'moo', '2022-04-16 13:37:07', '1');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `pId` int(11) NOT NULL,
  `textPost` text DEFAULT NULL,
  `mediaPost` text DEFAULT NULL,
  `dop` datetime NOT NULL DEFAULT current_timestamp(),
  `uName` varchar(12) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`pId`, `textPost`, `mediaPost`, `dop`, `uName`, `likes`) VALUES
(1, 'hello word!', NULL, '2022-04-05 00:00:00', 'salah', 0),
(2, 'my  name   is salah', NULL, '2022-04-16 15:06:20', 'moo', 0),
(7, 'this is a post', NULL, '2022-04-20 15:38:39', 'ali', 0),
(24, 'salah1', 'uploads/626a1d8fb7a2e5.44441634.jpg', '2022-04-28 07:52:31', 'salah', 1),
(25, 'last   post', '', '2022-05-13 18:17:44', 'salah', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_like`
--

CREATE TABLE `post_like` (
  `like_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `uname` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_like`
--

INSERT INTO `post_like` (`like_id`, `post_id`, `uname`) VALUES
(201, 24, 'salah');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uId` int(11) NOT NULL,
  `uName` varchar(12) NOT NULL,
  `firstName` varchar(8) NOT NULL,
  `lastName` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `userPassword` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `userimg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uId`, `uName`, `firstName`, `lastName`, `email`, `userPassword`, `dob`, `gender`, `userimg`) VALUES
(1, 'salah', 'salah', 'idrees', 'salah@gmail.com', '123', '2022-05-16', 'male', 'uploads/627fdd371caab3.57004519.jpg'),
(3, 'ali', 'ali', 'ali', 'ali@gmail.com', '123456', '2018-02-28', 'male', ''),
(9, 'moo', 'mah', 'mah', 'mah@gmail.com', '159357', '2022-04-20', 'male', ''),
(24, 'sam', 'sam', 'lam', 'soso@gmail.com', '123', '2006-06-15', 'male', 'uploads/626a724acfa580.16040209.jpg'),
(25, 'hallo', 'hay', 'hi', 'test@gmail.com', '123', '2006-06-15', 'male', 'uploads/626a72b9f05930.79050100.jpg'),
(26, 'zaid', 'zaid', 'shahen', 'zaid@gmail.com', '123', '2022-05-04', 'male', ''),
(33, 'salem', 'salem', 'emam', 'ss@gmail.com', '123', '2010-04-03', 'male', 'uploads/627ff885abc568.31912843.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comId`),
  ADD KEY `postID` (`pId`),
  ADD KEY `users` (`uName`);

--
-- Indexes for table `friendreq`
--
ALTER TABLE `friendreq`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `Suser` (`sende`),
  ADD KEY `Ruser` (`recive`);

--
-- Indexes for table `friendship`
--
ALTER TABLE `friendship`
  ADD PRIMARY KEY (`fId`),
  ADD KEY `user_one` (`user1`),
  ADD KEY `user_two` (`user2`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`pId`),
  ADD KEY `username` (`uName`),
  ADD KEY `pId` (`pId`);

--
-- Indexes for table `post_like`
--
ALTER TABLE `post_like`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uId`),
  ADD UNIQUE KEY `uName` (`uName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `friendreq`
--
ALTER TABLE `friendreq`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `friendship`
--
ALTER TABLE `friendship`
  MODIFY `fId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `pId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `post_like`
--
ALTER TABLE `post_like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `postID` FOREIGN KEY (`pId`) REFERENCES `posts` (`pId`),
  ADD CONSTRAINT `users` FOREIGN KEY (`uName`) REFERENCES `users` (`uName`);

--
-- Constraints for table `friendreq`
--
ALTER TABLE `friendreq`
  ADD CONSTRAINT `Ruser` FOREIGN KEY (`recive`) REFERENCES `users` (`uName`),
  ADD CONSTRAINT `Suser` FOREIGN KEY (`sende`) REFERENCES `users` (`uName`);

--
-- Constraints for table `friendship`
--
ALTER TABLE `friendship`
  ADD CONSTRAINT `user_one` FOREIGN KEY (`user1`) REFERENCES `users` (`uName`),
  ADD CONSTRAINT `user_two` FOREIGN KEY (`user2`) REFERENCES `users` (`uName`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `username` FOREIGN KEY (`uName`) REFERENCES `users` (`uName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
