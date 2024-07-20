-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2024 at 03:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be22_exam4_navidjafartash_biglibrary`
--
CREATE DATABASE IF NOT EXISTS `be22_exam4_navidjafartash_biglibrary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be22_exam4_navidjafartash_biglibrary`;

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `isbn_code` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `type` enum('CD','DVD','Book') NOT NULL,
  `author_first_name` varchar(150) NOT NULL,
  `author_last_name` varchar(150) NOT NULL,
  `publisher_name` varchar(150) NOT NULL,
  `publisher_address` varchar(255) NOT NULL,
  `publish_date` date DEFAULT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`isbn_code`, `title`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `description`, `image`) VALUES
(7, 'The Great Gatsby', 'Book', 'F. Scott', 'Fitzgerald', 'Scribner', '123 Publisher St, New York, NY', '2011-06-15', 'A novel about the American Dream and the Jazz Age.', '669a554da3992.jpg'),
(8, 'To Kill a Mockingbird', 'CD', 'Harper', 'Lee', 'Scribner', '456 Publisher Ave, Philadelphia, PA', '2024-07-16', 'A story of racial injustice and moral growth in the Deep South', '669a55d0d0483.jpg'),
(9, '1984', 'Book', 'George', 'Orwell', 'Secker', '789 Publisher Blvd, London, UK', '2024-07-24', 'A dystopian novel about totalitarianism and surveillance.', '669a5634e4251.jpg'),
(10, 'The Catcher in the Rye', 'DVD', 'Orwell', 'Salinger', 'Secker', '101 Publisher Rd, Boston, MA', '2024-07-02', 'A story about teenage angst and alienation.', '669a56c959809.jpg'),
(11, 'The Lord of the Rings', 'Book', 'Tolkien', 'Doe', 'Scribner', '202 Publisher Ln, London, UK', '2011-06-08', 'An epic fantasy trilogy about the quest to destroy a powerful ring.', '669a574bc0e00.jpg'),
(12, 'Harry Potter and Sorcerer', 'Book', 'John', 'Rowling', 'Bloomsbury', '303 Publisher St, London, UK', '2024-08-06', 'The first book in the Harry Potter series, introducing the young wizard and his adventures.', '669a57c58ad6a.jpg'),
(13, 'The Hobbit', 'DVD', 'Tolkien', 'Doe', 'Bloomsbury', '404 Publisher Rd, London, UK', '2024-07-11', 'A fantasy novel about Bilbo Baggins and his unexpected adventure.', '669a584843259.jpg'),
(14, 'The Da Vinci Code', 'Book', 'Dan', 'Brown', 'Doubleday', '505 Publisher Blvd, New York, NY', '2024-07-02', 'A thriller that explores hidden codes and religious secrets.', '669a5a0c89754.jpg'),
(15, 'The Great Escape', 'DVD', 'John', 'Doe', 'Doubleday', '07 Publisher Ln, Hollywood, CA', '2024-07-18', 'A film based on the true story of Allied POWs escaping from a German camp', '669a5af996264.jpg'),
(16, 'The Matrix', 'DVD', 'Lana', 'Doe', 'Doubleday', '707 Publisher Ln, Hollywood, CA', '2024-07-19', 'A science fiction film exploring themes of reality and artificial intelligence', '669a5b604f6d3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`isbn_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `isbn_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
