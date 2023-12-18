-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 12:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `content` text NOT NULL,
  `block` enum('0','1') NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `user_id`, `title`, `img`, `content`, `block`, `create_time`) VALUES
(1, 19, 'traffic jam in mumbai', '/News/assests/images/content img/traffic image.jpeg', 'Traffic pollution, filled with harmful and toxic elements, can put your health on precarious grounds. It doesn\'t matter then, whether you\'re exercising regularly or eating lots of protein every day. After all, it boils down to inhaling toxic air – a public health concern for lungs and cardiovascular diseases.\r\nThe hidden effect of traffic pollution on the heart\r\n\r\nDr Amjad Shaikh, Consultant, Cardiovascular & Thoracic Surgery at Kokilaben Dhirubhai Ambani Hospital, Navi Mumbai, told IndiaToday.In that traffic pollution poses a \"hidden yet perilous threat\" to the health of your heart. \r\n\r\n\"The far-reaching consequences often go unnoticed. The exhaust fumes emitted by vehicles release a cocktail of toxic substances, including particulate matter, nitrogen oxides and volatile organic compounds,\" said Dr Amjad Shaikh, adding that these pollutants infiltrate the air we breathe, leading to a cascade of adverse effects on cardiovascular well-being.', '0', '2023-12-08 14:39:33');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `block` enum('0','1') NOT NULL DEFAULT '0',
  `img` text NOT NULL,
  `verified` enum('0','1') NOT NULL DEFAULT '0',
  `verified_time` timestamp NULL DEFAULT NULL,
  `last_login_time` timestamp NULL DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_time` timestamp NULL DEFAULT NULL,
  `deleted_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `user_name`, `email_address`, `password`, `description`, `role`, `block`, `img`, `verified`, `verified_time`, `last_login_time`, `created_time`, `modified_time`, `deleted_time`) VALUES
(18, 'Suganya', 'Naidu', 'suganya', 'suganyanaidu825@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', 'admin', '0', '', '1', '2023-12-17 10:00:16', NULL, '2023-12-06 13:07:15', NULL, NULL),
(19, 'Ritika', 'Naidu', 'ritika', 'ritikanaidurn07@gmail.com', '3fb593ef8e012dccd70fdb174cda1458892658ce', '', 'user', '0', '/News/assests/images/profile photo/sign suganya.jpg', '0', NULL, NULL, '2023-12-06 13:12:23', '2023-12-17 10:09:57', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
