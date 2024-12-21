-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2024 at 11:22 AM
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
-- Database: `corememories`
--

-- --------------------------------------------------------

--
-- Table structure for table `islandcontents`
--

CREATE TABLE `islandcontents` (
  `islandContentID` int(4) NOT NULL,
  `islandOfPersonalityID` int(4) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `content` varchar(300) NOT NULL,
  `color` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `islandcontents`
--

INSERT INTO `islandcontents` (`islandContentID`, `islandOfPersonalityID`, `image`, `content`, `color`) VALUES
(1, 1, '../A05/assets/vacation.png', 'A memorable trip to the beach with my family.', NULL),
(2, 1, '../A05/assets/newyear.png', 'New Year Eve dinner spent with my family.', NULL),
(3, 1, '../A05/assets/dinner.png', 'Dinner with my family and ate chie\'s siblings.\r\n', NULL),
(4, 2, '../A05/assets/BHB.png', 'Memories of jamming with BHB.', NULL),
(5, 2, '../A05/assets/boyfriends.png', 'Kain sessions and weekend chika with friends.', NULL),
(6, 2, '../A05/assets/girlfriends.png', 'Friends comforting me during challenging periods in life.', NULL),
(7, 3, '../A05/assets/designing.png', 'Hours spent exploring creativity through design in figma.', NULL),
(8, 3, '../A05/assets/travel.png', 'With my travel buddy.', NULL),
(9, 3, '../A05/assets/volleyball.png', 'One of my favorite sports.', NULL),
(10, 4, '../A05/assets/graduate.png', 'Senior High School Graduate', NULL),
(11, 4, '../A05/assets/hackathon.png', 'Receiving certificate of participation.\r\n', NULL),
(12, 4, '../A05/assets/GA.png', 'Our section is Overall Champion.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `islandsofpersonality`
--

CREATE TABLE `islandsofpersonality` (
  `islandOfPersonalityID` int(4) NOT NULL,
  `name` varchar(40) NOT NULL,
  `shortDescription` varchar(300) DEFAULT NULL,
  `longDescription` varchar(900) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `islandsofpersonality`
--

INSERT INTO `islandsofpersonality` (`islandOfPersonalityID`, `name`, `shortDescription`, `longDescription`, `color`, `image`, `status`) VALUES
(1, 'Family Island', 'Represents the value of family with loved ones.', 'Family Island is a casual adventure game where you help a stranded family rebuild their life on a deserted island. Explore, farm, craft, and solve puzzles as you uncover the secrets of the island. Perfect for those who love relaxing gameplay with a touch of adventure!', NULL, '../A05/assets/family.png', 'active'),
(2, 'Friendship Island', 'Symbolizes strong connections with friends.', 'Friendship Island is a heartwarming simulation game where you build and strengthen bonds with friends on a beautiful island. Customize your island, complete fun activities, and work together to create lasting memories. It\'s all about teamwork and connection!', NULL, '../A05/assets/friendship.png', 'active'),
(3, 'Hobby Island', 'Reflects interests and activities that bring joy and relaxation.', 'Hobby Island is a creative simulation game where you explore and master different hobbies on a vibrant island. Craft, paint, cook, garden, and more while personalizing your space and unlocking new skills. A perfect escape for hobby enthusiasts!', NULL, '../A05/assets/hobby.png', 'active'),
(4, 'Achievement Island ', 'Accomplishments and personal growth moments.', 'Achievement Island is an exciting goal-driven game where you complete challenges, unlock milestones, and level up your island. Explore, build, and strive for greatness as you achieve personal and community goals in a fun, interactive environment!', NULL, '../A05/assets/achievement.png', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `islandcontents`
--
ALTER TABLE `islandcontents`
  ADD PRIMARY KEY (`islandContentID`);

--
-- Indexes for table `islandsofpersonality`
--
ALTER TABLE `islandsofpersonality`
  ADD PRIMARY KEY (`islandOfPersonalityID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `islandcontents`
--
ALTER TABLE `islandcontents`
  MODIFY `islandContentID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `islandsofpersonality`
--
ALTER TABLE `islandsofpersonality`
  MODIFY `islandOfPersonalityID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
