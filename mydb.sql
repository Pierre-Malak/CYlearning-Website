-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2021 at 09:47 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `adc`
--

CREATE TABLE `adc` (
  `c_id` int(11) NOT NULL,
  `courseName` varchar(100) DEFAULT NULL,
  `courseDescription` text,
  `instructorName` varchar(100) DEFAULT NULL,
  `reviews` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adc`
--

INSERT INTO `adc` (`c_id`, `courseName`, `courseDescription`, `instructorName`, `reviews`, `price`) VALUES
(43, 'desktop', 'mmmm', 'adel', 4, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Name`, `Email`, `Password`) VALUES
(121212, 'Pierre Malak', 'Pierre@.com', 123);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `ID` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `Name`) VALUES
(171819, 'Pierre Malak'),
(1919, 'Ahmed Youssef'),
(2020, 'Gamal azzam'),
(20211, 'Marwa Habbib'),
(112020, 'Rana Gamil');

-- --------------------------------------------------------

--
-- Table structure for table `ask`
--

CREATE TABLE `ask` (
  `c_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Answer` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ask`
--

INSERT INTO `ask` (`c_id`, `Name`, `Email`, `Subject`, `Message`, `Country`, `Answer`) VALUES
(5, 'Maryam', 'maryam@gmail.com', 'Service', 'When The Exam will be ?', 'australia', 'after 1 0 days'),
(6, 'marco', 'marco@gmail.com', 'Service', 'When will be the exams?', 'canada', 'may be after 18 days.'),
(7, 'Yasser', 'yasser@gmail.com', 'Service', 'I want To  Join Pplease.', 'usa', 'no you cant');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Id` int(11) NOT NULL,
  `cname` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Id`, `cname`, `image`, `price`, `courseId`, `user_id`) VALUES
(18, 'Graphics', 'img/graphic.jpg', 200, 2, 13143);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `sender` text NOT NULL,
  `reciver` text NOT NULL,
  `message` text NOT NULL,
  `id` int(255) NOT NULL,
  `senderemail` varchar(200) NOT NULL,
  `reciveremail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`sender`, `reciver`, `message`, `id`, `senderemail`, `reciveremail`) VALUES
('Marco ', 'Ahmed Gamal', 'hello', 145, '', ''),
('Marco ', 'Ahmed Gamal', 'hello', 146, '', ''),
('Adel Ahmed     ', 'Marco', 'hiiii', 147, 'adel@gmail.com', 'marco@gmail.com'),
('Adel Ahmed     ', 'Marco', 'hiiii', 148, 'adel@gmail.com', 'marco@gmail.com'),
('Adel Ahmed     ', 'Maryam Yasser', 'where are you', 149, 'adel@gmail.com', 'maryam@gmail.com'),
('Adel Ahmed     ', 'Maryam Yasser', 'where are you', 150, 'adel@gmail.com', 'maryam@gmail.com'),
('Yasser', 'Adel Ahmed', 'heeelloo mr adel', 151, '', ''),
('Yasser', 'Adel Ahmed', 'heeelloo mr adel', 152, '', ''),
('Adel Ahmed      ', 'Yasser', 'Hello Yasser.', 153, 'adel@gmail.com', 'yasser@gmail.com'),
('Adel Ahmed      ', 'Yasser', 'Hello Yasser.', 154, 'adel@gmail.com', 'yasser@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `courseName` varchar(128) NOT NULL,
  `courseHours` int(8) NOT NULL,
  `courseInstructor` text NOT NULL,
  `price` varchar(11) NOT NULL,
  `description` text NOT NULL,
  `tinydesc` text NOT NULL,
  `image` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `courseId`, `courseName`, `courseHours`, `courseInstructor`, `price`, `description`, `tinydesc`, `image`) VALUES
(1, 0, 'Web Development', 4, 'Mohamed L Gazzar', '250', 'Hi! Welcome to the brand new version of The Web Developer Bootcamp, Udemy\'s most popular web development course.  This course was just completely overhauled to prepare students for the 2021 job market, with over 60 hours of brand new content. This is the only course you need to learn web development. There are a lot of options for online developer training, but this course is without a doubt the most comprehensive and effective on the market.  Here\'s why:', 'It was so challenging and full of knowledge! I have learned a lot from this course. Colt is the best instructor, respect! He explains everything that way so you get it instantly', 'img/course.jpg'),
(2, 330, 'Graphics', 3, 'Yomna', '200', 'Today, computer graphics is a central part of our lives, in movies, games, computer-aided design, virtual simulators, visualization and even imaging products and cameras. This course teaches the basics of computer graphics that apply to all of these domains.', 'Learn to create images of 3D scenes in both real-time and with realistic ray tracing in this introductory computer graphics course.', 'img/graphic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `ID` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`ID`, `Name`, `Link`) VALUES
(444, 'CS', 'CS.COM'),
(999, 'WEB', 'WEB.com');

-- --------------------------------------------------------

--
-- Table structure for table `course_requirements`
--

CREATE TABLE `course_requirements` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `requirement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_requirements`
--

INSERT INTO `course_requirements` (`id`, `course_id`, `requirement`) VALUES
(1, 1, 'No prerequisite knowledge required'),
(2, 1, 'No special ($$$) software required');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(100) DEFAULT NULL,
  `coursename` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `coursename`, `price`) VALUES
(NULL, 'web development\r\n', '120$'),
(NULL, 'web development\r\n', '120$'),
(NULL, 'Graphic design', '250$'),
(NULL, 'Graphic design', '250$'),
(NULL, 'web development', '120$'),
(NULL, 'Graphic design', '250$'),
(NULL, 'web development', '120$'),
(NULL, 'Graphic design', '250$'),
(NULL, 'web development', '120$'),
(NULL, 'Graphic design', '250$'),
(NULL, 'Programming', '300$'),
(NULL, 'web development', '120$'),
(NULL, 'Graphic design', '250$'),
(NULL, 'Programming', '300$');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `date`) VALUES
(25, 0, '2021-02-25 20:09:46'),
(26, 0, '2021-02-25 20:10:26'),
(27, 0, '2021-02-25 20:10:31'),
(28, 13144, '2021-02-25 20:26:20'),
(29, 13145, '2021-02-25 20:33:12'),
(30, 13149, '2021-02-25 21:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `fullname` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(64) NOT NULL,
  `phone` int(32) NOT NULL,
  `usertype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fullname`, `email`, `password`, `phone`, `usertype`) VALUES
(1, 'user', 'yasmine@gmail.com', '1010', 1201230103, 1);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `sender` varchar(200) NOT NULL,
  `reciver` varchar(200) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`sender`, `reciver`, `message`) VALUES
(' Adel Ahmed', 'Maryam Yasser', 'sdfgfd'),
(' echo Adel Ahmed', 'echo Maryam Yasser', 'echo sdfgfd'),
(' echo Adel Ahmed', 'echo Maryam Yasser', 'echo sdfgfd'),
(' echo Adel Ahmed', 'echo Maryam Yasser', 'echo sdfgfd'),
('Adel Ahmed', 'Maryam Yasser', 'asda');

-- --------------------------------------------------------

--
-- Table structure for table `survay`
--

CREATE TABLE `survay` (
  `id` int(11) NOT NULL,
  `q1` text NOT NULL,
  `q2` text NOT NULL,
  `q3` text NOT NULL,
  `q4` text NOT NULL,
  `q5` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survay`
--

INSERT INTO `survay` (`id`, `q1`, `q2`, `q3`, `q4`, `q5`, `user_id`, `feedback`, `name`) VALUES
(1, 'Almost always', 'Almost always', 'Rarely', 'Strongly agree', 'sometimes', 13132, 'thank you', 'Maryam yasser'),
(2, 'almost never', 'almost never', 'Almost never', 'Strongly disagree', 'almost never', 13132, 'thanks alot please', 'Maryam Yasser '),
(3, 'sometimes', 'Rarely', 'Almost always', 'neutral', 'sometimes', 13145, 'Very Good Weebsite Thank you.', 'Marco '),
(4, 'sometimes', 'Frequently', 'sometimes', 'Strongly agree', 'Rarely', 13149, 'Very Nice Website.', 'Yasser');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `contact_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `Seen` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`contact_id`, `user_name`, `user_email`, `content`, `Seen`) VALUES
(7, 'adel farahat', 'adel.farahat92@gmail.com', 'hello mostafa\r\n', NULL),
(8, 'yasmine waleed', 'Yasmine_1304@yahoo.com', 'hey\r\n', NULL),
(9, 'Yasser ', 'pi@gmail.com', 'was', NULL),
(13, 'Yasser ', 'yasser@gmail.com', 'It wass Nice Web thank you alot.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Picture` varchar(255) NOT NULL DEFAULT 'profile.jpg',
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone_Number` int(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Type` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Picture`, `ID`, `Name`, `Email`, `Password`, `Phone_Number`, `Address`, `Type`) VALUES
('userimg.png', 451, 'Pierre Malak', 'p@gmail.com', 'qwe', 1227371089, '344 stret', 5),
('uploads/1614284171-course.jpg', 888, 'Adel Ahmed      ', 'adel@gmail.com', 'qwe', 1227371089, '67street      ', 2),
('uploads/1614284505-background.jpg', 1233, 'Yasmine Waleed         ', 'yasmine@gmail.com', 'qwe', 1223344, '  1223ghtty       ', 4),
('uploads/1614283000-co.png', 13131, 'Celucity   ', 'cel@gmail.com', 'qwe', 1222344, '36Street   ', 3),
('uploads/1614277437-profile.jpg', 13132, 'Maryam Yasser   ', 'maryam@gmail.com', 'qwe', 1227371717, '64 street  ', 1),
('uploads/1614284011-co.png', 13149, 'Yasser', 'yasser@gmail.com', 'qwe', 1227371717, ' 56 street', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adc`
--
ALTER TABLE `adc`
  ADD PRIMARY KEY (`c_id`) USING BTREE;

--
-- Indexes for table `ask`
--
ALTER TABLE `ask`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_requirements`
--
ALTER TABLE `course_requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survay`
--
ALTER TABLE `survay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adc`
--
ALTER TABLE `adc`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `ask`
--
ALTER TABLE `ask`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_requirements`
--
ALTER TABLE `course_requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `survay`
--
ALTER TABLE `survay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13150;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
