-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2025 at 02:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialmedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `text`, `created_at`) VALUES
(1, 1, 4, 'Mast dikh raha hai bhai tu sexy', '2025-03-22 08:34:37'),
(2, 5, 4, 'Suraj bhai jinda baad', '2025-03-22 08:39:18'),
(3, 1, 5, 'bro  looking too sexy', '2025-03-22 13:25:30'),
(4, 4, 6, 'heyy beauty', '2025-03-24 14:34:51'),
(5, 10, 6, 'Hello bro', '2025-03-25 02:47:18'),
(6, 1, 6, 'Looking so Gorgeous', '2025-03-25 12:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `following_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `follower_id`, `following_id`) VALUES
(5, 2, 1),
(6, 1, 2),
(10, 5, 6),
(11, 8, 7),
(12, 5, 8),
(13, 4, 7),
(15, 1, 4),
(18, 4, 2),
(19, 4, 3),
(20, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `created_at`) VALUES
(1, 8, 4, '2025-03-22 08:19:06'),
(3, 1, 4, '2025-03-22 08:20:48'),
(4, 1, 3, '2025-03-22 08:20:53'),
(6, 5, 4, '2025-03-22 08:42:06'),
(7, 8, 3, '2025-03-22 09:53:49'),
(9, 1, 5, '2025-03-22 13:25:16'),
(10, 2, 5, '2025-03-24 11:12:47'),
(11, 2, 4, '2025-03-24 11:12:50'),
(12, 2, 3, '2025-03-24 11:12:52'),
(13, 9, 5, '2025-03-24 12:08:15'),
(14, 9, 4, '2025-03-24 12:08:17'),
(15, 9, 3, '2025-03-24 12:08:19'),
(18, 10, 6, '2025-03-25 02:47:07'),
(19, 4, 5, '2025-03-25 11:07:35'),
(20, 4, 6, '2025-03-25 11:07:40'),
(21, 1, 6, '2025-03-25 12:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sender_id`, `receiver_id`, `message`, `created_at`) VALUES
(1, 1, 1, ' you Have Followed @Rudra_bhau123 . Now You are friends', '2025-03-16 10:34:45'),
(2, 1, 2, '@mr_official_12_Tushar Has now followed You.', '2025-03-16 10:34:45'),
(9, 5, 5, 'you Have Followed @Suraj_tiwari_3750  Now You are Friends', '2025-03-20 04:01:35'),
(10, 5, 6, '@Swapnil  has followed you. Now you are Friends.', '2025-03-20 04:01:35'),
(11, 8, 8, 'you Have Followed @Chaitanya_mankar_shinde_saheb  Now You are Friends', '2025-03-21 13:22:52'),
(12, 8, 7, '@King_investo18  has followed you. Now you are Friends.', '2025-03-21 13:22:52'),
(13, 5, 5, 'you Have Followed @King_investo18  Now You are Friends', '2025-03-22 09:15:25'),
(14, 5, 8, '@Swapnil  has followed you. Now you are Friends.', '2025-03-22 09:15:25'),
(15, 4, 4, 'you Have Followed @Chaitanya_mankar_shinde_saheb  Now You are Friends', '2025-03-22 13:22:39'),
(16, 4, 7, '@@kshitijbhau_gaming123  has followed you. Now you are Friends.', '2025-03-22 13:22:39'),
(19, 1, 1, 'you Have Followed @@kshitijbhau_gaming123  Now You are Friends', '2025-03-22 13:27:51'),
(20, 1, 4, '@mr_official_12_Tushar  has followed you. Now you are Friends.', '2025-03-22 13:27:51'),
(25, 4, 4, 'you Have Followed @Rudra_bhau123  Now You are Friends', '2025-03-24 14:33:46'),
(26, 4, 2, '@@kshitijbhau_gaming123  has followed you. Now you are Friends.', '2025-03-24 14:33:46'),
(27, 4, 4, 'you Have Followed @XXX_INVESTO_SARTHAK  Now You are Friends', '2025-03-24 14:33:47'),
(28, 4, 3, '@@kshitijbhau_gaming123  has followed you. Now you are Friends.', '2025-03-24 14:33:47'),
(29, 10, 10, 'you Have Followed @mr_official_12_Tushar  Now You are Friends', '2025-03-24 14:58:47'),
(30, 10, 1, '@ShraddhaXplorer  has followed you. Now you are Friends.', '2025-03-24 14:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `peoples`
--

CREATE TABLE `peoples` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peoples`
--

INSERT INTO `peoples` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Tushar gupta', 'tushar@gmail.com', '$2y$10$DlQzxoEcAitZOE1Ibor/Eu9pfzfpngSNvoRkNUgE6.8Trso2D6JMy', '2025-03-15 05:21:42'),
(2, 'Rudra gupta', 'rudra@gmail.com', '$2y$10$P7eJG7zagrOss1EZWqUQFeUuodsU.PVwR2IagVRfI2xX4s6SjuoD.', '2025-03-16 10:22:19'),
(3, 'sathak korekhar', 'sarthak@gmail.com', '$2y$10$WVO3wF9Co96reJIJlIHQsujE7L7CFzvbWk1eDrW4FdScoLmZBFdKm', '2025-03-17 13:54:55'),
(4, 'Kshitij Gupta', 'Kshitij@gmail.com', '$2y$10$Qxl2LEpu9hPg11ZLq9MzBOQFuyHnczj1ck5l.gnU.mXn42mH0w.kO', '2025-03-17 14:07:17'),
(5, 'swapnil Yewale', 'swapnil@gmail.com', '$2y$10$AQRWWAQc/l3fZwPA/zWBze4kI2g/LRCK1lB55nLwNOgxI.TNDBojW', '2025-03-17 15:00:17'),
(6, 'Suraj Tiwari', 'surajtiwari18@gmail.com', '$2y$10$6tf6Mzh8HUrZHve2katU3OVkr5dLmM45emSR1U6YinvUE3fwzwTJu', '2025-03-19 15:34:43'),
(7, 'Chaitanya Bhau', 'chaitanya@gmail.com', '$2y$10$N9BFTAuROWUVedAF2YqqFOjSDHkuq2jYntvElIXPPIhmGDrRgSLJ2', '2025-03-19 15:49:15'),
(8, 'Sarang sir', 'sarang18@gmail.com', '$2y$10$fEr5qjA.Z2VZ1L4FD4wkP.ReNLkHnZGj/yTGDj3rqgbnZbeei0oum', '2025-03-21 13:17:15'),
(9, 'Vishal sir', 'vishalsir@gmail.com', '$2y$10$ifUaA13iszMuRGJhoueLa.fCJP.JfkP9nk3RfqP8/AXdCJc7dQsY2', '2025-03-24 11:14:45'),
(10, 'Shraddha Kewate', 'shraddha@gmail.com', '$2y$10$DesMrd.iCrKRCJGuCKIXk.RgJ3cmQpLt4J/zNLVEYeOWq4tFtRO.u', '2025-03-24 12:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `post_video` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `post_image`, `post_video`, `bio`, `location`, `created_at`) VALUES
(3, 8, NULL, 'uploads/67dd736e36eec.mp4', 'Hii i am in mumbai now', 'mumbai', '2025-03-21 09:40:54'),
(4, 6, 'uploads/67de51b7ab6ed.jpeg', NULL, 'Curating joy and inspiration...', 'Nagpur', '2025-03-22 01:29:19'),
(5, 4, 'uploads/67deb9fdb22d0.jpg', NULL, ' Hiii this is my new fashion ... so sexy', 'Nagpur', '2025-03-22 08:54:13'),
(6, 4, 'uploads/67e16d7fa81db.jpg', NULL, 'hii there', 'mumbai', '2025-03-24 10:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `phone` varchar(10) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `interest` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `username`, `dob`, `gender`, `phone`, `profile_picture`, `bio`, `location`, `interest`, `created_at`) VALUES
(1, 'mr_official_12_Tushar', '2004-09-19', 'male', '7249570906', 'men2.jpg', 'Hii i am the biggest wrb developer in India', 'nagpur', 'Playing Cricket', '2025-03-15 11:30:35'),
(2, 'Rudra_bhau123', '2025-02-11', 'male', '374565654', 'men3.jpg', 'Hii i am the biggest gangster in Nagpur', 'Nagpur', 'Playing Football', '2025-03-16 10:26:04'),
(3, 'XXX_INVESTO_SARTHAK', '2004-02-12', 'male', '5676777777', 'men5.jpg', 'Hii i am the biggest superstar and gangster of maharashtra', 'Gondia', 'Playing Cricket', '2025-03-17 13:53:25'),
(4, '@kshitijbhau_gaming123', '2008-02-23', 'male', '7352533522', 't4.webp', 'Hii I am the great artist in Maharashtra', 'Nagpur', 'Playing Cricket', '2025-03-17 14:09:48'),
(5, 'Swapnil', '2021-02-12', 'male', '6778888889', '1742223330_t1.jpg', 'Hello everyone...I am swapnil', 'gondia', 'Coding', '2025-03-17 14:55:30'),
(6, 'Suraj_tiwari_3750', '2002-08-18', 'male', '5676777777', 'img2.jpeg', 'Stay Positive Work Hard, and Make it Happen.\r\n\r\nBrahman and Student At Raisoni', 'Nagpur', 'Karate,Judo', '2025-03-19 15:37:55'),
(7, 'Chaitanya_mankar_shinde_saheb', '2004-06-06', 'male', '6778888889', 'img1.jpeg', 'Interested in Indian Politics ..... Full Stack Web developer', 'nagpur', 'Politics', '2025-03-19 15:51:09'),
(8, 'King_investo18', '1990-02-12', 'male', '9088449977', 'img3.jpeg', 'Hii i am the great faculty aspiring web development in Codeosity ....', 'Kalmeshwar', 'Web Developer', '2025-03-21 13:20:38'),
(9, 'HOD_VISHAL_DHABALIA10', '1990-03-20', 'male', '6778888889', 't5.jpg', 'Hii I am the HOD of IT Department in GHRCACS Nagpur...', 'nagpur', 'Coding ', '2025-03-24 07:19:54'),
(10, 'ShraddhaXplorer', '1990-08-23', 'female', '7656445678', 'jwellery.jpg', 'Hii I am the great Youtuber Aspiring Vlogs ...', 'Pakistan', 'Vlogger', '2025-03-24 07:33:45');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `story_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `user_id`, `story_image`, `created_at`) VALUES
(16, 6, 'w6.jpg', '2025-03-24 14:02:40'),
(17, 1, 'furni1.avif', '2025-03-24 14:07:20'),
(18, 4, 't6.webp', '2025-03-24 14:08:02'),
(19, 10, 'w5.webp', '2025-03-24 14:08:58'),
(20, 4, 'jwellery3.jpg', '2025-03-24 14:33:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `follower_id` (`follower_id`),
  ADD KEY `following_id` (`following_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `peoples`
--
ALTER TABLE `peoples`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `peoples`
--
ALTER TABLE `peoples`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followers_ibfk_1` FOREIGN KEY (`follower_id`) REFERENCES `profiles` (`id`),
  ADD CONSTRAINT `followers_ibfk_2` FOREIGN KEY (`following_id`) REFERENCES `profiles` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `profiles` (`id`),
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `profiles` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `profiles` (`id`);

--
-- Constraints for table `stories`
--
ALTER TABLE `stories`
  ADD CONSTRAINT `stories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `profiles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
