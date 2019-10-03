-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2018 at 12:46 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metagolweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `arguments`
--

CREATE TABLE `arguments` (
  `id` int(11) NOT NULL,
  `run_id` int(11) NOT NULL,
  `arg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arguments`
--

INSERT INTO `arguments` (`id`, `run_id`, `arg`) VALUES
(152, 98, 'queen_victoria'),
(153, 98, 'edward_seventh'),
(154, 98, 'george_fifth'),
(155, 98, 'george_sixth'),
(156, 98, 'elizabeth_second'),
(157, 98, 'queen_mother'),
(158, 98, 'prince_charles'),
(159, 98, 'prince_philip'),
(160, 98, 'prince_william'),
(161, 98, 'prince_harry'),
(162, 98, 'princess_diana'),
(163, 98, 'prince_george'),
(189, 103, 'ann'),
(190, 103, 'amy'),
(191, 103, 'andy'),
(192, 103, 'amelia'),
(193, 103, 'linda'),
(194, 103, 'gavin'),
(195, 103, 'steve'),
(196, 103, 'spongebob'),
(197, 104, 'ann'),
(198, 104, 'amy'),
(199, 104, 'andy'),
(200, 104, 'amelia'),
(201, 104, 'linda'),
(202, 104, 'gavin'),
(203, 104, 'steve'),
(204, 104, 'spongebob'),
(205, 104, 'sally'),
(206, 105, 'queen_victoria'),
(207, 105, 'edward_seventh'),
(208, 105, 'george_fifth'),
(209, 105, 'george_sixth'),
(210, 105, 'elizabeth_second'),
(211, 105, 'queen_mother'),
(212, 105, 'prince_charles'),
(213, 105, 'prince_philip'),
(214, 105, 'prince_william'),
(215, 105, 'prince_harry'),
(216, 105, 'princess_diana'),
(217, 105, 'prince_george'),
(218, 106, 'ann'),
(219, 106, 'amy'),
(220, 106, 'andy'),
(221, 106, 'amelia'),
(222, 106, 'linda'),
(223, 106, 'gavin'),
(224, 106, 'steve'),
(225, 106, 'spongebob');

-- --------------------------------------------------------

--
-- Table structure for table `backgroundknowledge`
--

CREATE TABLE `backgroundknowledge` (
  `id` int(11) NOT NULL,
  `run_id` int(11) NOT NULL,
  `pred` varchar(50) NOT NULL,
  `arg1` varchar(50) NOT NULL,
  `arg2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backgroundknowledge`
--

INSERT INTO `backgroundknowledge` (`id`, `run_id`, `pred`, `arg1`, `arg2`) VALUES
(152, 98, 'parent', 'queen_victoria', 'edward_seventh'),
(153, 98, 'parent', 'edward_seventh', 'george_fifth'),
(154, 98, 'parent', 'george_fifth', 'george_sixth'),
(155, 98, 'parent', 'george_sixth', 'elizabeth_second'),
(156, 98, 'parent', 'queen_mother', 'elizabeth_second'),
(157, 98, 'parent', 'elizabeth_second', 'prince_charles'),
(158, 98, 'parent', 'prince_philip', 'prince_charles'),
(159, 98, 'parent', 'prince_charles', 'prince_william'),
(160, 98, 'parent', 'prince_charles', 'prince_harry'),
(161, 98, 'parent', 'princess_diana', 'prince_william'),
(162, 98, 'parent', 'princess_diana', 'prince_harry'),
(163, 98, 'parent', 'prince_william', 'prince_george'),
(189, 103, 'mother', 'ann', 'amy'),
(190, 103, 'mother', 'ann', 'andy'),
(191, 103, 'mother', 'amy', 'amelia'),
(192, 103, 'mother', 'linda', 'gavin'),
(193, 103, 'father', 'steve', 'amy'),
(194, 103, 'father', 'steve', 'andy'),
(195, 103, 'father', 'gavin', 'amelia'),
(196, 103, 'father', 'andy', 'spongebob'),
(197, 104, 'mother', 'ann', 'amy'),
(198, 104, 'mother', 'ann', 'andy'),
(199, 104, 'mother', 'amy', 'amelia'),
(200, 104, 'mother', 'linda', 'gavin'),
(201, 104, 'father', 'steve', 'amy'),
(202, 104, 'father', 'steve', 'andy'),
(203, 104, 'father', 'gavin', 'amelia'),
(204, 104, 'father', 'andy', 'spongebob'),
(205, 104, 'father', 'spongebob', 'sally'),
(206, 105, 'parent', 'queen_victoria', 'edward_seventh'),
(207, 105, 'parent', 'edward_seventh', 'george_fifth'),
(208, 105, 'parent', 'george_fifth', 'george_sixth'),
(209, 105, 'parent', 'george_sixth', 'elizabeth_second'),
(210, 105, 'parent', 'queen_mother', 'elizabeth_second'),
(211, 105, 'parent', 'elizabeth_second', 'prince_charles'),
(212, 105, 'parent', 'prince_philip', 'prince_charles'),
(213, 105, 'parent', 'prince_charles', 'prince_william'),
(214, 105, 'parent', 'prince_charles', 'prince_harry'),
(215, 105, 'parent', 'princess_diana', 'prince_william'),
(216, 105, 'parent', 'princess_diana', 'prince_harry'),
(217, 105, 'parent', 'prince_william', 'prince_george'),
(218, 106, 'mother', 'ann', 'amy'),
(219, 106, 'mother', 'ann', 'andy'),
(220, 106, 'mother', 'amy', 'amelia'),
(221, 106, 'mother', 'linda', 'gavin'),
(222, 106, 'father', 'steve', 'amy'),
(223, 106, 'father', 'steve', 'andy'),
(224, 106, 'father', 'gavin', 'amelia'),
(225, 106, 'father', 'andy', 'spongebob');

-- --------------------------------------------------------

--
-- Table structure for table `learnednegatives`
--

CREATE TABLE `learnednegatives` (
  `id` int(11) NOT NULL,
  `lpred_id` int(11) NOT NULL,
  `arg1` varchar(50) NOT NULL,
  `arg2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `learnednegatives`
--

INSERT INTO `learnednegatives` (`id`, `lpred_id`, `arg1`, `arg2`) VALUES
(8, 35, 'amy', 'amelia'),
(9, 40, 'amy', 'amelia');

-- --------------------------------------------------------

--
-- Table structure for table `learnedpositives`
--

CREATE TABLE `learnedpositives` (
  `id` int(11) NOT NULL,
  `lpred_id` int(11) NOT NULL,
  `arg1` varchar(50) NOT NULL,
  `arg2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `learnedpositives`
--

INSERT INTO `learnedpositives` (`id`, `lpred_id`, `arg1`, `arg2`) VALUES
(102, 29, 'elizabeth_second', 'prince_charles'),
(103, 29, 'george_sixth', 'prince_harry'),
(104, 29, 'queen_mother', 'prince_william'),
(125, 35, 'ann', 'amelia'),
(126, 35, 'steve', 'amelia'),
(127, 35, 'ann', 'spongebob'),
(128, 35, 'steve', 'spongebob'),
(129, 35, 'linda', 'amelia'),
(130, 36, 'ann', 'andy'),
(131, 36, 'steve', 'andy'),
(132, 36, 'ann', 'amy'),
(133, 36, 'ann', 'andy'),
(134, 37, 'steve', 'amelia'),
(135, 37, 'ann', 'amelia'),
(136, 37, 'linda', 'amelia'),
(137, 37, 'ann', 'spongebob'),
(138, 38, 'ann', 'sally'),
(139, 38, 'steve', 'sally'),
(140, 39, 'elizabeth_second', 'prince_charles'),
(141, 39, 'george_sixth', 'prince_harry'),
(142, 39, 'queen_mother', 'prince_william'),
(143, 40, 'ann', 'amelia'),
(144, 40, 'steve', 'amelia'),
(145, 40, 'ann', 'spongebob'),
(146, 40, 'steve', 'spongebob'),
(147, 40, 'linda', 'amelia');

-- --------------------------------------------------------

--
-- Table structure for table `learnedpredicates`
--

CREATE TABLE `learnedpredicates` (
  `id` int(11) NOT NULL,
  `run_id` int(11) NOT NULL,
  `pred` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `learnedpredicates`
--

INSERT INTO `learnedpredicates` (`id`, `run_id`, `pred`) VALUES
(29, 98, 'ancestor'),
(35, 103, 'grandparent'),
(36, 104, 'parent'),
(37, 104, 'grandparent'),
(38, 104, 'great_grandparent'),
(39, 105, 'ancestor'),
(40, 106, 'grandparent');

-- --------------------------------------------------------

--
-- Table structure for table `metarules`
--

CREATE TABLE `metarules` (
  `id` int(11) NOT NULL,
  `run_id` int(11) NOT NULL,
  `metarule` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metarules`
--

INSERT INTO `metarules` (`id`, `run_id`, `metarule`) VALUES
(30, 98, 'Base: metarule([P,Q],([P,A,B]:-[[Q,A,B]]))'),
(31, 98, 'Tailrec: metarule([P,Q,R],([P,A,B]:-[[Q,A,C],[P,C,B]]))'),
(38, 103, 'Base: metarule([P,Q],([P,A,B]:-[[Q,A,B]]))'),
(39, 103, 'Chain: metarule([P,Q,R],([P,A,B]:-[[Q,A,C],[R,C,B]]))'),
(40, 104, 'Base: metarule([P,Q],([P,A,B]:-[[Q,A,B]]))'),
(41, 104, 'Chain: metarule([P,Q,R],([P,A,B]:-[[Q,A,C],[R,C,B]]))'),
(42, 105, 'Base: metarule([P,Q],([P,A,B]:-[[Q,A,B]]))'),
(43, 105, 'Tailrec: metarule([P,Q,R],([P,A,B]:-[[Q,A,C],[P,C,B]]))'),
(44, 106, 'Base: metarule([P,Q],([P,A,B]:-[[Q,A,B]]))'),
(45, 106, 'Chain: metarule([P,Q,R],([P,A,B]:-[[Q,A,C],[R,C,B]]))');

-- --------------------------------------------------------

--
-- Table structure for table `predicates`
--

CREATE TABLE `predicates` (
  `id` int(11) NOT NULL,
  `run_id` int(11) NOT NULL,
  `pred` varchar(50) NOT NULL,
  `pred_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `predicates`
--

INSERT INTO `predicates` (`id`, `run_id`, `pred`, `pred_num`) VALUES
(34, 98, 'parent', 2),
(41, 103, 'mother', 2),
(42, 103, 'father', 2),
(43, 104, 'mother', 2),
(44, 104, 'father', 2),
(45, 105, 'parent', 2),
(46, 106, 'mother', 2),
(47, 106, 'father', 2);

-- --------------------------------------------------------

--
-- Table structure for table `runs`
--

CREATE TABLE `runs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `runs`
--

INSERT INTO `runs` (`id`, `user_id`, `name`) VALUES
(98, 8, 'Ancestor Experiment'),
(103, 22, 'Air Force Run'),
(104, 22, 'RunTwo'),
(105, 22, 'AnotherRun'),
(106, 22, 'Runwithreallyreallylongname');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `hash`, `active`) VALUES
(8, 'Deepak', 'Arora', 'deepak@aroravisuals.com', '$2y$10$qbWv9OUtjS3SpU36W80YQu0utjPQWFVnKz0.87d4euo2tsA0E0kh.', 'c32d9bf27a3da7ec8163957080c8628e', 1),
(22, 'Meta', 'Gol', 'metagolweb@gmail.com', '$2y$10$LSOm948oCttUVr2aNs2Qj.1non80wobzcRH5i87PwKoYVy.Rch9xK', 'aeb3135b436aa55373822c010763dd54', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arguments`
--
ALTER TABLE `arguments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `run_id` (`run_id`);

--
-- Indexes for table `backgroundknowledge`
--
ALTER TABLE `backgroundknowledge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `run_id` (`run_id`);

--
-- Indexes for table `learnednegatives`
--
ALTER TABLE `learnednegatives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lpred_id` (`lpred_id`);

--
-- Indexes for table `learnedpositives`
--
ALTER TABLE `learnedpositives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lpred_id` (`lpred_id`);

--
-- Indexes for table `learnedpredicates`
--
ALTER TABLE `learnedpredicates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `run_id` (`run_id`);

--
-- Indexes for table `metarules`
--
ALTER TABLE `metarules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `run_id` (`run_id`);

--
-- Indexes for table `predicates`
--
ALTER TABLE `predicates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `run_id` (`run_id`);

--
-- Indexes for table `runs`
--
ALTER TABLE `runs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arguments`
--
ALTER TABLE `arguments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `backgroundknowledge`
--
ALTER TABLE `backgroundknowledge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `learnednegatives`
--
ALTER TABLE `learnednegatives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `learnedpositives`
--
ALTER TABLE `learnedpositives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `learnedpredicates`
--
ALTER TABLE `learnedpredicates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `metarules`
--
ALTER TABLE `metarules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `predicates`
--
ALTER TABLE `predicates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `runs`
--
ALTER TABLE `runs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arguments`
--
ALTER TABLE `arguments`
  ADD CONSTRAINT `arguments_ibfk_1` FOREIGN KEY (`run_id`) REFERENCES `runs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `backgroundknowledge`
--
ALTER TABLE `backgroundknowledge`
  ADD CONSTRAINT `backgroundknowledge_ibfk_1` FOREIGN KEY (`run_id`) REFERENCES `runs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learnednegatives`
--
ALTER TABLE `learnednegatives`
  ADD CONSTRAINT `learnednegatives_ibfk_1` FOREIGN KEY (`lpred_id`) REFERENCES `learnedpredicates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learnedpositives`
--
ALTER TABLE `learnedpositives`
  ADD CONSTRAINT `learnedpositives_ibfk_1` FOREIGN KEY (`lpred_id`) REFERENCES `learnedpredicates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learnedpredicates`
--
ALTER TABLE `learnedpredicates`
  ADD CONSTRAINT `learnedpredicates_ibfk_1` FOREIGN KEY (`run_id`) REFERENCES `runs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `metarules`
--
ALTER TABLE `metarules`
  ADD CONSTRAINT `metarules_ibfk_1` FOREIGN KEY (`run_id`) REFERENCES `runs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `predicates`
--
ALTER TABLE `predicates`
  ADD CONSTRAINT `predicates_ibfk_1` FOREIGN KEY (`run_id`) REFERENCES `runs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `runs`
--
ALTER TABLE `runs`
  ADD CONSTRAINT `runs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
