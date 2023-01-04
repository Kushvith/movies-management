-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 01:00 PM
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
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `Actor_id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `place` varchar(30) NOT NULL,
  `details` varchar(300) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `movies_acted` int(10) NOT NULL,
  `url` varchar(100) NOT NULL,
  `publicid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`Actor_id`, `fname`, `lname`, `dob`, `place`, `details`, `gender`, `movies_acted`, `url`, `publicid`) VALUES
(19, 'abc', 'def', '2022-12-15', 'bang', '<p>this is for testing actor 1</p>', 'Male', 4, 'https://res.cloudinary.com/kushvith/image/upload/v1671729994/actor/msimnjowoo3oxctnyle8.png', 'actor/msimnjowoo3oxctnyle8'),
(20, 'cef', 'ghi', '2022-12-15', ' ef', 'the testing actor 2', 'Female', 5, 'https://res.cloudinary.com/kushvith/image/upload/v1671730090/actor/gk3manwqbn3oxnxsxmpi.png', 'actor/gk3manwqbn3oxnxsxmpi'),
(21, 'abc', 'as', '3432-06-04', 'dgdvbx', '<p>fdgxhththht</p>', 'Male', 4, 'https://res.cloudinary.com/kushvith/image/upload/v1672664543/actor/by41ty7ksxkszygpbjjd.png', 'actor/by41ty7ksxkszygpbjjd');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `password`) VALUES
(1, 'kushvith@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `comingsoon`
--

CREATE TABLE `comingsoon` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `valid` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comingsoon`
--

INSERT INTO `comingsoon` (`id`, `movie_id`, `datetime`, `valid`) VALUES
(3, 6, '2023-12-09 00:00:00', 0),
(4, 7, '2023-05-18 04:13:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  `details` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `directed_no` int(10) NOT NULL,
  `url` varchar(100) NOT NULL,
  `publicid` varchar(30) NOT NULL,
  `place` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`id`, `name`, `type`, `details`, `dob`, `gender`, `directed_no`, `url`, `publicid`, `place`) VALUES
(2, 'aws pem', 'Producer', '<p>qER</p>', '2022-12-13', 'Male', 4, 'https://res.cloudinary.com/kushvith/image/upload/v1670773028/crew/tm9gcpglo7l618gfpbmi.jpg', 'crew/tm9gcpglo7l618gfpbmi', ''),
(3, 're q', 'Music director,Director', 'RSf', '2022-12-19', 'Female', 4, 'https://res.cloudinary.com/kushvith/image/upload/v1670773115/crew/vxmtrgvhieuhr0dk3iwi.jpg', 'crew/vxmtrgvhieuhr0dk3iwi', '');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `imdb_ratings` int(10) NOT NULL,
  `runtime` varchar(10) NOT NULL,
  `mmpa` varchar(100) NOT NULL,
  `releaseyear` varchar(20) NOT NULL,
  `description` varchar(30) NOT NULL,
  `director` int(11) NOT NULL,
  `producer` int(11) NOT NULL,
  `musicdirector` int(11) NOT NULL,
  `trailer` int(11) NOT NULL,
  `actor` int(11) NOT NULL,
  `actor1` int(11) NOT NULL,
  `actor2` int(11) NOT NULL,
  `actor3` int(11) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `url` varchar(150) NOT NULL,
  `publicid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `name`, `imdb_ratings`, `runtime`, `mmpa`, `releaseyear`, `description`, `director`, `producer`, `musicdirector`, `trailer`, `actor`, `actor1`, `actor2`, `actor3`, `genre`, `url`, `publicid`) VALUES
(6, 'abc testing 1', 7, '03:08', 'PG – Parental Guidance', '2017', '<p>thew a,fjehfkjwhaeufyweuhfu', 3, 2, 3, 3, 19, 19, 20, 20, 'Comedy', 'https://res.cloudinary.com/kushvith/image/upload/v1671730727/movie/pbg4m4qeyk3nm2lrd0sa.jpg', 'movie/pbg4m4qeyk3nm2lrd0sa'),
(7, 'movie2', 10, '01:11', 'PG-13 – Parents Strongly Cautioned', '2012', '<p>about should be big to unde', 3, 2, 3, 3, 19, 20, 19, 20, 'Comedy', 'https://res.cloudinary.com/kushvith/image/upload/v1671730949/movie/w7jxwrtd1h78xqh5r4pk.jpg', 'movie/w7jxwrtd1h78xqh5r4pk');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `title`, `description`, `movie_id`, `date`, `user_id`) VALUES
(1, 'kushvith', 'sers', 'sfcdgreg', 6, '2022-12-24', 5),
(2, 'kushvith', 'eazf', 'zefeze', 7, '2022-12-24', 5);

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `theatre_id` int(11) NOT NULL,
  `show_date` date NOT NULL,
  `morning` int(5) NOT NULL,
  `afternoon` int(5) NOT NULL,
  `evening` int(5) NOT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `movie_id`, `theatre_id`, `show_date`, `morning`, `afternoon`, `evening`, `price`) VALUES
(23, 6, 2, '2023-01-11', 1, 0, 0, 60);

-- --------------------------------------------------------

--
-- Table structure for table `theatre`
--

CREATE TABLE `theatre` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `place` varchar(100) NOT NULL,
  `totalcapacity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theatre`
--

INSERT INTO `theatre` (`id`, `name`, `place`, `totalcapacity`) VALUES
(1, 'balaji', 'banglore', 30),
(2, 'robin', 'kengeri', 50),
(3, 'venkateshwara', 'kengeri', 90),
(6, 'madeshwara', 'banashankari', 50),
(7, 'eshwari', 'banglore', 80);

-- --------------------------------------------------------

--
-- Table structure for table `trailer`
--

CREATE TABLE `trailer` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `url` varchar(100) NOT NULL,
  `main` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trailer`
--

INSERT INTO `trailer` (`id`, `name`, `url`, `main`) VALUES
(3, 'abc', 'https://www.youtube.com/embed/o-0hcF97wy0', 1),
(4, 'wed', 'https://www.youtube.com/embed/o-0hcF97wy0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `otp` varchar(50) NOT NULL,
  `verified` int(5) NOT NULL,
  `url` varchar(150) NOT NULL,
  `publicid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `name`, `email`, `password`, `otp`, `verified`, `url`, `publicid`) VALUES
(5, 'kushvith123', 'kushvithchinna900@gmail.com', '1', '303242', 1, 'https://res.cloudinary.com/kushvith/image/upload/v1672826549/user/szmm4zpgyryjkgtr9tjr.png', 'user/szmm4zpgyryjkgtr9tjr'),
(15, 'kushvith', 'kushvith@yahoo.com', '1', '768977', 1, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`Actor_id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comingsoon`
--
ALTER TABLE `comingsoon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actor1` (`actor1`),
  ADD KEY `movie_ibfk_1` (`actor`),
  ADD KEY `movie_ibfk_2` (`director`),
  ADD KEY `movie_ibfk_3` (`musicdirector`),
  ADD KEY `movie_ibfk_4` (`trailer`),
  ADD KEY `movie_ibfk_5` (`producer`),
  ADD KEY `movie_ibfk_8` (`actor2`),
  ADD KEY `movie_ibfk_9` (`actor3`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_ibfk_1` (`movie_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `theatre_id` (`theatre_id`);

--
-- Indexes for table `theatre`
--
ALTER TABLE `theatre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trailer`
--
ALTER TABLE `trailer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `Actor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comingsoon`
--
ALTER TABLE `comingsoon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `theatre`
--
ALTER TABLE `theatre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trailer`
--
ALTER TABLE `trailer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comingsoon`
--
ALTER TABLE `comingsoon`
  ADD CONSTRAINT `comingsoon_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`actor`) REFERENCES `actors` (`Actor_id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `movie_ibfk_2` FOREIGN KEY (`director`) REFERENCES `director` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `movie_ibfk_3` FOREIGN KEY (`musicdirector`) REFERENCES `director` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `movie_ibfk_4` FOREIGN KEY (`trailer`) REFERENCES `trailer` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `movie_ibfk_5` FOREIGN KEY (`producer`) REFERENCES `director` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `movie_ibfk_6` FOREIGN KEY (`actor1`) REFERENCES `actors` (`Actor_id`),
  ADD CONSTRAINT `movie_ibfk_7` FOREIGN KEY (`actor2`) REFERENCES `actors` (`Actor_id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `movie_ibfk_8` FOREIGN KEY (`actor2`) REFERENCES `actors` (`Actor_id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `movie_ibfk_9` FOREIGN KEY (`actor3`) REFERENCES `actors` (`Actor_id`) ON UPDATE NO ACTION;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `shows_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shows_ibfk_2` FOREIGN KEY (`theatre_id`) REFERENCES `theatre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
