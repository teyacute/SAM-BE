-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2024 at 06:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corememorie`
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
(1, 1, '../A05/assets/imagine.jpg', 'This person thrives on creating new, original concepts, whether it\'s through art, writing, or any form of expression.', NULL),
(2, 1, '../A05/assets/imagine.jpg', 'Prefers thinking outside the box to solve problems, coming up with unconventional yet effective solutions.', NULL),
(3, 1, '../A05/assets/vision.jpg', 'Has a strong appreciation for visual and auditory aesthetics, often found immersed in creative hobbies such as painting or music composition.', NULL),
(4, 2, '../A05/assets/problemsolve.webp', 'Focused on dissecting challenges logically and approaching them step by step to find optimal solutions.', NULL),
(5, 2, '../A05/assets/data driven.jpeg', ' Prefers decisions and solutions to be backed by data and objective evidence, often using statistics and research.', NULL),
(6, 2, '../A05/assets/critical eval.jpg', 'Enjoys evaluating situations from multiple angles and finding flaws in assumptions, theories, or arguments.', NULL),
(7, 3, '../A05/assets/listening.jpg', 'A strong communicator who listens to others\' thoughts and feelings attentively, often offering support and understanding.', NULL),
(8, 3, '../A05/assets/emotional.jpg', 'Sensitive to the emotions of others, able to connect deeply and offer comfort or guidance when needed.', NULL),
(9, 3, '../A05/assets/conflict.webp', 'Skilled at navigating disagreements and finding peaceful, constructive solutions to conflicts by considering everyone\'s perspective.', NULL),
(10, 4, '../A05/assets/exploring.jpg', 'Passionate about traveling, seeking new experiences, and stepping out of their comfort zone to learn about diverse cultures.', NULL),
(11, 4, '../A05/assets/risk.jpg', 'Willing to embrace uncertainty and try new activities that may push personal boundaries, often motivated by a love for the thrill of discovery.', NULL),
(12, 4, '../A05/assets/curiosity.jpg', 'Always seeking new challenges and knowledge, whether through travel, learning new skills, or diving into unfamiliar hobbies.', NULL);

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
(1, 'Creativity Island', ' A person who thrives on expressing original ideas and thinking outside the box.', 'The Creativity island represents individuals who have an innate ability to create and innovate. Whether through art, music, or writing, they are driven by a need to express their unique ideas. They constantly seek new ways to interpret the world, often producing original works or solutions that stand out. Creative individuals are often involved in fields like design, entertainment, or any discipline that requires inventive thinking.', NULL, '../A05/assets/creatives.avif', 'active'),
(2, 'Analytical Thinking Island', 'A person who enjoys solving problems logically and using data-driven approaches.', 'The Analytical Thinking island embodies individuals who approach challenges with logic, structure, and objectivity. They excel in breaking down complex problems into manageable parts and analyzing data to form conclusions. These individuals often prioritize evidence and logical reasoning over intuition or emotion. Their skill set is perfect for roles in data science, engineering, or any profession where detailed analysis and rational thought are required.', NULL, '../A05/assets/analytic.jpg', 'active'),
(3, 'Empathy Island', 'A person who connects deeply with others, offering emotional support and understanding.', 'The Empathy island is all about understanding and connecting with the feelings of others. People who inhabit this island have high emotional intelligence and are excellent listeners, often providing comfort and guidance. They intuitively sense the emotions of those around them and are deeply committed to helping others feel heard and understood. Whether in personal relationships or professional environments, these individuals excel in roles that require interpersonal connections, such as counseling, teaching, or healthcare.', NULL, '../A05/assets/empathy.jpg', 'active'),
(4, 'Adventurous Spirit Island', 'A person who embraces new experiences and seeks excitement through exploration and risk-taking.', 'The Adventurous Spirit island is defined by individuals who thrive on seeking out new experiences and challenges. They are passionate about exploring unfamiliar places, trying new activities, and taking calculated risks. Curiosity drives them to learn more about the world around them, and they often find themselves pursuing excitement through travel, outdoor adventures, or stepping out of their comfort zones. These individuals tend to be open-minded, resilient, and eager to expand their horizons.', NULL, '../A05/assets/adventure.jpg', 'active');

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
