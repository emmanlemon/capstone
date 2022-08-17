-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql212.epizy.com
-- Generation Time: Jun 17, 2022 at 05:09 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_31868676_sepnas`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(255) NOT NULL,
  `timeuploaded` varchar(255) NOT NULL,
  `post_text` varchar(1000) NOT NULL,
  `post_id` int(255) NOT NULL,
  `uploader_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `imgforsearch` text NOT NULL,
  `image_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `imgforgallery`
--

CREATE TABLE `imgforgallery` (
  `gallery_id` int(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `picforsearch` text NOT NULL,
  `image_text1` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(255) NOT NULL,
  `timeuploaded` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `fimage` varchar(255) DEFAULT NULL,
  `simage` varchar(255) DEFAULT NULL,
  `header` varchar(255) NOT NULL,
  `bigheader` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` text NOT NULL,
  `layout` text NOT NULL,
  `post_text` text NOT NULL,
  `uploader_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `m_initial` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `achievements` varchar(255) NOT NULL,
  `wantoshare` varchar(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `favourites` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `fname`, `m_initial`, `lname`, `achievements`, `wantoshare`, `hobbies`, `interest`, `favourites`, `position`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'John', 'B', 'Wick', '', '', '', '', '', 'admin'),
(2, 'john', '527bd5b5d689e2c32ae974c6229ff785', 'John Cedrick', 'L', 'Mendoza', '', 'Test Fave Quote', '', '', '', 'customer'),
(3, 'mc,kinleycamacho@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'mc', 'c.', 'camacho', '', '', '', '', '', 'customer'),
(4, 'Emman', 'a16f90b8ae826a3d1b751c609042a8a1', 'Emmanuel', 'Arambulo', 'Lemon', '', '', '', '', '', 'customer'),
(5, 'francis', 'd0ab7fe6c314f4fe5b6c18a0157c96b4', 'Francis Rene', 'L', 'Mendoza', '', '', '', '', '', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imgforgallery`
--
ALTER TABLE `imgforgallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imgforgallery`
--
ALTER TABLE `imgforgallery`
  MODIFY `gallery_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
