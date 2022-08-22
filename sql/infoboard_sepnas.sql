-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2022 at 01:42 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infoboard_sepnas`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement`
--

CREATE TABLE `achievement` (
  `achievement_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail_image` varchar(255) NOT NULL,
  `full_image` varchar(255) NOT NULL,
  `header` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `post_text` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `uploader_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `achievement`
--

INSERT INTO `achievement` (`achievement_id`, `title`, `thumbnail_image`, `full_image`, `header`, `short_description`, `content`, `post_text`, `timestamp`, `uploader_id`) VALUES
(3, 'TATAK SEPNAS SSG AKO', 'sepnasachievement.jpg', 'sepnas20.jpg', 'TATAK SEPNAS SSG AKO', 'Before we begin a new academic year, the Supreme Student Government of SEPNAS would like to thank and congratulate our senior officers who graduated last July 8, 2022:', 'asda', 'asda', '2022-08-17 18:03:26', '1 '),
(7, '', '', '', 'asda', '', 'asda', '', '2022-08-22 14:52:50', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `position`, `password`) VALUES
(1, 'emman', 'admin', 'admin', 'password');

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
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `recipient` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `subject`, `message`, `email`, `recipient`, `timestamp`) VALUES
(7, 'mc ', 'sample', 'sample', 'saam@gmail.com', 'admin', '2022-08-15 11:56:32'),
(10, 'Tyzer Panget', 'panget ako ', 'ang gwapo ni Emman', 'tyzer@outsoar.ph', 'admin', '2022-08-16 21:30:38'),
(11, 'Emmanuel Joshua A. Lemon', 'sample', 'sample', 'sample@gmail.com', 'registrar', '2022-08-16 21:34:36'),
(12, 'Emmanuel Joshua A. Lemon', 'sample', 'asdas', 'asdasd@gmail.com', 'registrar', '2022-08-18 20:11:22'),
(13, 'FerryAnne', 'kailan ', 'sadad', 'sad@gmail.com', 'admin', '2022-08-20 10:18:13'),
(14, 'Emmanuel Joshua A. Lemon', 'asdas', 'asdas', 'asdas@gmail.com', 'admin', '2022-08-21 22:53:51'),
(15, 'Jessie', 'sample', 'sadasdaskdbajshd', 'jessie@gmail.com', 'admin', '2022-08-22 10:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `id` int(11) NOT NULL,
  `hobbies` int(11) NOT NULL,
  `wantoshare` int(11) NOT NULL,
  `achievements` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `imgforsearch`, `image_text`) VALUES
(0, 'sepnas_logo (2).png', '[value-4]', '1'),
(0, 'logo_outsoar.png', '[value-4]', '1'),
(0, 'sepnas_logo (2).png', '[value-4]', '1'),
(0, 'sepnas_logo (2).png', '[value-4]', '1');

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

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail_image` varchar(255) NOT NULL,
  `full_image` varchar(255) NOT NULL,
  `header` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `uploader_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `thumbnail_image`, `full_image`, `header`, `short_description`, `content`, `timestamp`, `uploader_id`) VALUES
(4, 'Baka sepnas Yarn', 'sepnasachievement.jpg', 'sepnas20.jpg', 'Baka sepnas Yarn', 'Baka sepnas Yarn', 'zxcxc', '2022-08-17 23:15:13', '1 '),
(7, 'Happy Birthday Principal!!!', 'birthday_pricipal.jfif', 'sepnas_map.png', 'Happy Birthday Principal!!!', 'Happy Birthday Principal!!!', 'Happy Birthday Principal!!!', '2022-08-20 15:23:49', '5 '),
(8, 'Balik Eskwela 2k22', 'sepnas1.jpg', 'sepnasachievement.jpg', 'Balik Eskwela 2k22', 'Balik Eskwela 2k22', 'Balik Eskwela 2k22', '2022-08-20 15:25:33', '5 ');

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
  `short_description` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` text NOT NULL,
  `layout` text NOT NULL,
  `post_text` text NOT NULL,
  `uploader_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `timeuploaded`, `thumbnail`, `fimage`, `simage`, `header`, `bigheader`, `short_description`, `description`, `type`, `layout`, `post_text`, `uploader_id`) VALUES
(11, '2022-08-15 22:53:43', 'vmuf_thumbnail.jpg', 'vmuf.jpg', 'vmuf_small.jpg', 'VIRGEN MILAGROSA UNIVERSITY FOUNDATION COLLEGE RED CROSS YOUTH COUNCIL', 'RED CROSS YOUTH COUNCIL', 'VMUF-CRCYC achieved a total collection of 647 units (291,150ml of blood) for the calendar year 2020-2021 in support to the Blood Services Program of Philippine Red Cross - Pangasinan Chapter.', 'A warm congratulations to VIRGEN MILAGROSA UNIVERSITY FOUNDATION COLLEGE RED CROSS YOUTH COUNCIL for having an ABIG AWARD during the Blood Services Awarding Ceremony by the Philippine Red Cross - Pangasinan Chapter on August 12, 2022. VMUF-CRCYC achieved ', '', '', '#DugongVirginian #TatakVirginian #VMUFAutonomous #CenterOfExcellence', '1'),
(16, '2022-08-17 18:11:46', 'Walangpasoksepnas.jpg', 'sepnas17.jpg', 'sepnas20.jpg', 'Walang Pasok', 'Walang Pasok', 'Walang Pasok Matulog kana ulit sabi ni mama mo', 'Walang Pasok Matulog kana ulit sabi ni mama mo', '', '', 'Walang Pasok Matulog kana ulit sabi ni mama mo', '1'),
(21, '2022-08-20 01:05:15', 'enrollment_announcement.jpg', 'enrollment_announcement.jpg', 'enrollment_announcement.jpg', 'Enroll Now!!!', 'Enroll Now!!!', 'Online Enrollment for Junior High School starts on July 27.', 'Online Enrollment for Junior High School starts on July 27.', '', '', 'Online Enrollment for Junior High School starts on July 27.', '1');

-- --------------------------------------------------------

--
-- Table structure for table `upcoming_events`
--

CREATE TABLE `upcoming_events` (
  `event_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail_image` varchar(255) NOT NULL,
  `full_image` varchar(255) NOT NULL,
  `header` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `uploader_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upcoming_events`
--

INSERT INTO `upcoming_events` (`event_id`, `title`, `thumbnail_image`, `full_image`, `header`, `short_description`, `content`, `date`, `timestamp`, `uploader_id`) VALUES
(4, 'Sepnas Soiree 2k23', 'upcoming_event.jpg', 'birthday_pricipal.jfif', 'Sepnas Soiree 2k23', 'Sepnas Soiree 2k23', 'Sepnas Soiree 2k23', '2023-02-14', '2022-08-20 01:15:15', 1);

-- --------------------------------------------------------

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
(6, 'lacson1', '5f4dcc3b5aa765d61d8327deb882cf99', 'jessie', 'A.', 'Lacson', '', '', '', '', '', 'customer'),
(7, 'emman1', '5f4dcc3b5aa765d61d8327deb882cf99', 'emman', 'sad', 'asda', '', '', '', '', '', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `user_post`
--

CREATE TABLE `user_post` (
  `wall_post_user` int(11) NOT NULL,
  `header` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `optional_image` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_post`
--

INSERT INTO `user_post` (`wall_post_user`, `header`, `content`, `optional_image`, `timestamp`, `user_id`) VALUES
(1, 'asdas', 'sada', '', '2022-08-22 14:01:52', 6),
(2, 'ada', 'sad', '', '2022-08-22 14:03:52', 7),
(3, 'asda', 'sad', '', '2022-08-22 14:04:05', 7),
(4, 'asda', 'dads', '', '2022-08-22 14:09:19', 7),
(5, 'asda', 'adsa', '', '2022-08-22 14:10:23', 7),
(6, 'sada', 'sada', '', '2022-08-22 14:12:52', 7),
(7, 'sadsad', 'adas', '', '2022-08-22 14:15:26', 7),
(8, 'asdas', 'sada', '', '2022-08-22 14:16:43', 6),
(9, 'asda', 'adas', '', '2022-08-22 14:34:38', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`achievement_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `upcoming_events`
--
ALTER TABLE `upcoming_events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_post`
--
ALTER TABLE `user_post`
  ADD PRIMARY KEY (`wall_post_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievement`
--
ALTER TABLE `achievement`
  MODIFY `achievement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `upcoming_events`
--
ALTER TABLE `upcoming_events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_post`
--
ALTER TABLE `user_post`
  MODIFY `wall_post_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
