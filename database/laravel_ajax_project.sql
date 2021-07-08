-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2021 at 05:05 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_ajax_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `username`, `email`) VALUES
(1, 'monirul', '12345678', 'monirul', 'monirul@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_msg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `contact_name`, `contact_mobile`, `contact_email`, `contact_msg`) VALUES
(1, 'monirul', '01792706304', 'monirul@gmail.com', 'hi i am monirul');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_totalenroll` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_totalclass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_des`, `course_fee`, `course_totalenroll`, `course_totalclass`, `course_link`, `course_img`) VALUES
(1, 'mobile app', 'mobile app', '1000', '20', '400', 'mobile app', 'https://lh3.googleusercontent.com/proxy/w2NitLuHP5Cb7JysCdopCOIupPA6hmVZdrA5-SZ_8liabdXJpgzoFMQyVOVOl0HLahkcjqPo7_3cbl_RsASmR58zevuzEHNWuXqBO2Pk5lO8'),
(2, 'mobile app', 'mobile app', '1000', '20', '400', 'mobile app', 'https://lh3.googleusercontent.com/proxy/w2NitLuHP5Cb7JysCdopCOIupPA6hmVZdrA5-SZ_8liabdXJpgzoFMQyVOVOl0HLahkcjqPo7_3cbl_RsASmR58zevuzEHNWuXqBO2Pk5lO8'),
(3, 'mobile app', 'mobile app', '1000', '20', '400', 'mobile app', 'https://lh3.googleusercontent.com/proxy/w2NitLuHP5Cb7JysCdopCOIupPA6hmVZdrA5-SZ_8liabdXJpgzoFMQyVOVOl0HLahkcjqPo7_3cbl_RsASmR58zevuzEHNWuXqBO2Pk5lO8'),
(4, 'mobile app', 'mobile app', '1000', '20', '400', 'mobile app', 'https://lh3.googleusercontent.com/proxy/w2NitLuHP5Cb7JysCdopCOIupPA6hmVZdrA5-SZ_8liabdXJpgzoFMQyVOVOl0HLahkcjqPo7_3cbl_RsASmR58zevuzEHNWuXqBO2Pk5lO8'),
(5, 'mobile app', 'mobile app', '1000', '20', '400', 'mobile app', 'https://lh3.googleusercontent.com/proxy/w2NitLuHP5Cb7JysCdopCOIupPA6hmVZdrA5-SZ_8liabdXJpgzoFMQyVOVOl0HLahkcjqPo7_3cbl_RsASmR58zevuzEHNWuXqBO2Pk5lO8'),
(6, 'mobile app', 'mobile app', '1000', '20', '400', 'mobile app', 'https://lh3.googleusercontent.com/proxy/w2NitLuHP5Cb7JysCdopCOIupPA6hmVZdrA5-SZ_8liabdXJpgzoFMQyVOVOl0HLahkcjqPo7_3cbl_RsASmR58zevuzEHNWuXqBO2Pk5lO8');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_08_03_170031_visitor_table', 1),
(2, '2020_08_04_035255_services_table', 1),
(3, '2020_09_15_032822_courses_table', 1),
(4, '2020_09_16_185057_project_table', 1),
(5, '2020_09_17_184159_contact_table', 1),
(6, '2020_09_17_211447_review_table', 1),
(7, '2020_09_20_121912_admin_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `project_des`, `project_link`, `project_image`) VALUES
(1, 'mobile app', 'mobile app', 'mobile app', 'https://lh3.googleusercontent.com/proxy/w2NitLuHP5Cb7JysCdopCOIupPA6hmVZdrA5-SZ_8liabdXJpgzoFMQyVOVOl0HLahkcjqPo7_3cbl_RsASmR58zevuzEHNWuXqBO2Pk5lO8'),
(2, 'mobile app', 'mobile app', 'mobile app', 'https://lh3.googleusercontent.com/proxy/w2NitLuHP5Cb7JysCdopCOIupPA6hmVZdrA5-SZ_8liabdXJpgzoFMQyVOVOl0HLahkcjqPo7_3cbl_RsASmR58zevuzEHNWuXqBO2Pk5lO8'),
(3, 'mobile app', 'mobile app', 'mobile app', 'https://lh3.googleusercontent.com/proxy/w2NitLuHP5Cb7JysCdopCOIupPA6hmVZdrA5-SZ_8liabdXJpgzoFMQyVOVOl0HLahkcjqPo7_3cbl_RsASmR58zevuzEHNWuXqBO2Pk5lO8'),
(4, 'mobile app', 'mobile app', 'mobile app', 'https://lh3.googleusercontent.com/proxy/w2NitLuHP5Cb7JysCdopCOIupPA6hmVZdrA5-SZ_8liabdXJpgzoFMQyVOVOl0HLahkcjqPo7_3cbl_RsASmR58zevuzEHNWuXqBO2Pk5lO8');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `review_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_des` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_img` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `review_name`, `review_des`, `review_img`) VALUES
(7, 'monirul', 'পররাষ্ট্রমন্ত্রী এ কে আব্দুল মোমেন বলেছেন, বঙ্গবন্ধু শেখ মুজিবুর রহমান একটি আদর্শ, একটি দর্শন ও উপলব্ধির নাম। তিনি সবকিছুর ঊর্ধ্বে মানবতাকে প্রাধান্য দিয়েছেন। বঙ্গবন্ধু সব সময় মানুষের অধিকার রক্ষা ও কল্যাণের জন্য যুদ্ধ করেছেন। মানুষের মুক্তি নিশ্চিত করে সোনার বাংলা গড়ার জন্য বঙ্গবন্ধু তাঁর পুরো জীবন উৎসর্গ করেছেন।\n\nবঙ্গবন্ধু সব সময় মানুষের অধিকার রক্ষা ও কল্যাণের জন্য যুদ্ধ করেছেন। মানুষের মুক্তি নিশ্চিত করে সোনার বাংলা গড়ার জন্য বঙ্গবন্ধু তাঁর পুরো জীবন উৎসর্গ করেছেন।\n\nবঙ্গবন্ধু সব সময় মানুষের অধিকার রক্ষা ও কল্যাণের জন্য যুদ্ধ করেছেন। মানুষের মুক্তি নিশ্চিত করে সোনার বাংলা গড়ার জন্য বঙ্গবন্ধু তাঁর পুরো জীবন উৎসর্গ করেছেন।', 'chrome://branding/content/about-logo.png'),
(8, 'nafisha', 'পররাষ্ট্রমন্ত্রী এ কে আব্দুল মোমেন বলেছেন, বঙ্গবন্ধু শেখ মুজিবুর রহমান একটি আদর্শ, একটি দর্শন ও উপলব্ধির নাম। তিনি সবকিছুর ঊর্ধ্বে মানবতাকে প্রাধান্য দিয়েছেন। বঙ্গবন্ধু সব সময় মানুষের অধিকার রক্ষা ও কল্যাণের জন্য যুদ্ধ করেছেন। মানুষের মুক্তি নিশ্চিত করে সোনার বাংলা গড়ার জন্য বঙ্গবন্ধু তাঁর পুরো জীবন উৎসর্গ করেছেন।', 'https://yt3.ggpht.com/yti/APfAmoFU-zXDxZwp6PsHYIv-cgzuWEpCcFkUEpbuuQzvLQ=s108-c-k-c0x00ffffff-no-rj');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_des`, `service_img`) VALUES
(1, 'mobile app', 'mobile app', 'mobile app'),
(2, 'mobile app', 'mobile app', 'mobile app'),
(3, 'mobile app', 'mobile app', 'mobile app'),
(4, 'mobile app', 'mobile app', 'mobile app');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `ip_address`, `visit_time`) VALUES
(1, '127.0.0.1', '2021-06-23 11:47:41am'),
(2, '127.0.0.1', '2021-06-23 11:50:40am'),
(3, '127.0.0.1', '2021-06-23 11:52:30am'),
(4, '127.0.0.1', '2021-06-23 11:53:16am'),
(5, '127.0.0.1', '2021-06-23 11:54:06am'),
(6, '127.0.0.1', '2021-06-23 11:54:40am'),
(7, '127.0.0.1', '2021-06-23 11:55:24am'),
(8, '127.0.0.1', '2021-06-23 11:56:25am'),
(9, '127.0.0.1', '2021-06-23 11:56:56am'),
(10, '127.0.0.1', '2021-06-23 11:57:11am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
