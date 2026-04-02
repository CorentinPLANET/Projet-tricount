-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: mariadb-tri-con
-- Generation Time: Apr 01, 2026 at 08:39 PM
-- Server version: 12.2.2-MariaDB-ubu2404
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `groups`
--

INSERT IGNORE INTO `groups` (`id`, `name`) VALUES
(1, 'ami'),
(2, 'famille'),
(3, 'tout le monde');

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--

CREATE TABLE `group_user` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `group_user`
--

INSERT IGNORE INTO `group_user` (`user_id`, `group_id`) VALUES
(1, 1),
(3, 1),
(4, 1),
(5, 1),
(1, 2),
(2, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `transaction_name` varchar(255) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `transactions`
--

INSERT IGNORE INTO `transactions` (`id`, `transaction_name`, `creator_id`, `amount`, `date`) VALUES
(1, 'Essence', 1, 30, '2025-12-19 21:32:27'),
(2, 'Switch 2', 1, 300, '2025-12-19 21:38:11'),
(3, 'Anniversaire', 1, 500, '2025-12-19 21:39:26'),
(4, 'Lego', 1, 50, '2025-12-19 21:39:26'),
(5, 'Robux', 1, 50, '2025-12-19 21:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_user`
--

CREATE TABLE `transaction_user` (
  `transaction_id` int(11) NOT NULL,
  `contributor_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `complete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaction_user`
--

INSERT IGNORE INTO `transaction_user` (`transaction_id`, `contributor_id`, `group_id`, `amount`, `complete`) VALUES
(2, 1, 3, 60, 0),
(2, 2, 3, 60, 0),
(2, 3, 3, 60, 0),
(2, 4, 3, 60, 0),
(2, 5, 3, 60, 0),
(3, 2, 3, 125, 0),
(3, 3, 3, 125, 0),
(3, 4, 3, 125, 0),
(3, 5, 3, 125, 0),
(5, 4, 3, 50, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `users`
--

INSERT IGNORE INTO `users` (`id`, `mail`, `password`, `username`) VALUES
(1, 'corentinplanet@gmail.com', '1234', 'Coco'),
(2, 'morgane@gmail.com', '12345', 'Momo'),
(3, 'raphael@gmail.com', '1345', 'Raph'),
(4, 'baptiste@gmail.com', '125', 'Baptiste'),
(5, 'aymeric@gmail.com', '145', 'Aymeric');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_user`
--
ALTER TABLE `group_user`
  ADD PRIMARY KEY (`user_id`,`group_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `transaction_user`
--
ALTER TABLE `transaction_user`
  ADD PRIMARY KEY (`transaction_id`,`contributor_id`,`group_id`),
  ADD KEY `contributor_id` (`contributor_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `group_user`
--
ALTER TABLE `group_user`
  ADD CONSTRAINT `1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `1` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transaction_user`
--
ALTER TABLE `transaction_user`
  ADD CONSTRAINT `1` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`),
  ADD CONSTRAINT `2` FOREIGN KEY (`contributor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `3` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
