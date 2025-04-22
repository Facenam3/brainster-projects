-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2024 at 10:45 PM
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
-- Database: `brainster_bookshelf`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `biography` varchar(255) NOT NULL,
  `deleted_at` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `first_name`, `last_name`, `biography`, `deleted_at`) VALUES
(8, 'Jo', 'Foster', 'Jo Foster spent years as a senior developer and is a seasoned lecturer and teacher of ICT and Computer Science. He currently teaches programming covering HTML, CSS, Javascript, Python, C, C++ and PHP. As well as computer systems, networking and hardware a', NULL),
(9, 'Elisabeth', 'Robson', 'Elisabeth Robson is a renowned author, co-founder of Wickedly Smart, and expert in creating brain-friendly learning products. She has written several books on programming and design, including Head First HTML and CSS, Head First Design Patterns, and Head ', NULL),
(10, 'Marjin', 'Haverbeke', 'Marijn Haverbeke is a programming language enthusiast and polyglot. He\'s worked his way from trivial BASIC games on the Commodore, through a C++ phase, to the present where he mostly hacks on database systems and web APIs in dynamic languages. He recently', NULL),
(11, 'Vikram', 'Vaswani', 'Vikram is the author of seven books on software and database programming, published by The McGraw-Hill Companies and Pearson Education and translated into more than ten languages. In addition to his technical expertise, he is well-versed in product lifecy', NULL),
(12, 'Brett', 'McLaughlin', 'Brett McLaughlin is a bestselling and award-winning non-fiction author. His books on computer programming, home theater, and analysis and design have sold in excess of 100,000 copies.Brett spends most of his time these days on cognitive theory, codifying ', NULL),
(13, 'Matt', 'Stauffer', 'Matt Stauffer is the CEO and co-founder of Tighten. He’s the host of the Laravel Podcast, the author of O’Reilly’s Laravel: Up and Running, a prolific open source contributor and tutorial author, and a frequent conference speaker', NULL),
(14, 'Dalibor', 'Jovanovski', 'Dalibor e roden 29. April vo 1995 godina vo gradot Skopje.', 1),
(15, 'Dalibor', 'Jovanovski', 'Dalibor ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `cathegory_id` int(11) NOT NULL,
  `publication_year` int(11) NOT NULL,
  `pages_number` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `deleted_at` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author_id`, `cathegory_id`, `publication_year`, `pages_number`, `image_url`, `deleted_at`) VALUES
(7, 'HTML& CSS for Beginners: Learn the Fundamentals', 8, 22, 2022, 131, 'https://books.google.mk/books/publisher/content?id=0iD3EAAAQBAJ&pg=PP1&img=1&zoom=3&hl=en&bul=1&sig=ACfU3U0wpmuD_8r5JE5vsUz1_t5edWod1g&w=1280', NULL),
(8, 'Head First HTML and CSS: A Learner\'s Guide to Creating Standards-Based Web Pages', 9, 23, 2012, 762, 'https://m.media-amazon.com/images/I/91Zr+3ZwIkL._SL1500_.jpg', NULL),
(9, 'Head First JavaScript Programming: A Brain-Friendly Guide', 9, 24, 2014, 700, 'https://m.media-amazon.com/images/I/91vuSBT14BL._SL1500_.jpg', NULL),
(10, 'Eloquent JavaScript, 3rd Edition: A Modern Introduction to Programming', 10, 24, 2018, 472, 'https://m.media-amazon.com/images/I/81HqVRRwp3L._SL1500_.jpg', NULL),
(11, 'PHP: A Beginner’s Guide', 11, 25, 2008, 478, 'https://m.media-amazon.com/images/I/61YiO2OfIaL._SL1360_.jpg', NULL),
(12, 'PHP & MySQL: The Missing Manual', 12, 25, 2012, 553, 'https://m.media-amazon.com/images/I/81Y2DbRdLML._SL1500_.jpg', NULL),
(13, 'Laravel: Up & Running: A Framework for Building Modern PHP Apps ', 13, 30, 2023, 559, 'https://m.media-amazon.com/images/I/81bmt6JC8wL._SL1500_.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `deleted_at` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `deleted_at`) VALUES
(22, 'HTML', NULL),
(23, 'CSS', NULL),
(24, 'Javascript', NULL),
(25, 'PhP', NULL),
(28, 'Bootstrap', 1),
(29, 'Bootstrap', 1),
(30, 'Laravel', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `pending` tinyint(1) DEFAULT NULL,
  `approved` tinyint(2) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `denied` tinyint(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `book_id`, `comment_content`, `pending`, `approved`, `created_at`, `denied`) VALUES
(14, 12, 8, 'One of the best books to start learning about Web Development.', 0, 1, '2024-06-23 10:33:53', 0),
(15, 12, 12, 'Best book for learning PhP.', 1, NULL, '2024-06-23 10:54:58', 0),
(16, 12, 10, 'If you wanna expand your knowledge into JavaScript . I can recommend you this book to start with.', 0, NULL, '2024-06-23 10:55:28', 1),
(17, 11, 10, 'Adding the comment', 1, NULL, '2024-06-23 22:37:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `private_notes`
--

CREATE TABLE `private_notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `note_text` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `private_notes`
--

INSERT INTO `private_notes` (`id`, `user_id`, `book_id`, `note_text`, `created_at`) VALUES
(37, 11, 7, 'Leaving a notes', '2024-06-23 21:20:09'),
(44, 11, 10, 'updating the note from webpage', '2024-06-23 22:20:10'),
(45, 11, 10, 'Updating the second note from the webpage', '2024-06-23 22:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(11, 'Admin', 'Admin@example.com', '$2y$10$lLduJ4iqIdNaM2HVHn7J5em8EoCdG5DUMgy6SeSRv/fkfPYWBRX/W', 'admin'),
(12, 'Sarchito1', 'Sarchito@example.com', '$2y$10$osiVBzTx6lT7jfPivGTPD.JyKdaQHgxCGhA5ar6OvulRN01BhjKaW', 'user'),
(13, 'Kurvica1', 'kurvica@example.com', '$2y$10$pN1eFbWQ9/RIFR22JdADWOAdILfJvAIQW21KjXV2uSHLNaHOri2my', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `cathegory_id` (`cathegory_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `private_notes`
--
ALTER TABLE `private_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
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
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `private_notes`
--
ALTER TABLE `private_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`cathegory_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `private_notes`
--
ALTER TABLE `private_notes`
  ADD CONSTRAINT `private_notes_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `private_notes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
