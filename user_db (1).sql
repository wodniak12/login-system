-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 18, 2023 at 08:50 AM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(255) NOT NULL,
  `recipient_id` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `sender_id`, `recipient_id`, `message`, `timestamp`) VALUES
(36, '123', '', '', '2023-05-03 08:02:50'),
(37, 'Kamil Wojtoniak', '', '', '2023-05-03 08:03:05'),
(38, 'Kamil Wojtoniak', '123', 'fdgfsd', '2023-05-03 08:03:15'),
(39, '123', 'Kamil Wojtoniak', 'rwetgre', '2023-05-03 08:03:20'),
(40, 'Kamil Wojtoniak', '123', 'sdfgsd', '2023-05-03 08:03:24'),
(41, '123', '', '', '2023-05-03 08:04:58'),
(42, '123', 'Kamil Wojtoniak', 'asdad', '2023-05-03 08:05:02'),
(43, '123', '', '', '2023-05-03 08:05:17'),
(44, '123', 'Kamil Wojtoniak', '', '2023-05-03 08:12:04'),
(45, '123', '', '', '2023-05-03 08:12:08'),
(46, '123', '', '', '2023-05-03 08:12:10'),
(47, '123', '123', 'asdad', '2023-05-03 08:12:16'),
(48, '123', '123', 'asdad', '2023-05-03 08:12:18'),
(49, '123', '123', 'aasdas', '2023-05-03 08:12:19'),
(50, '123', '', '', '2023-05-03 08:12:22'),
(51, '123', 'Kamil Wojtoniak', 'asdad', '2023-05-03 08:12:29'),
(52, 'Kamil Wojtoniak', '123', 'asdad', '2023-05-03 08:12:38'),
(53, 'Kamil Wojtoniak', '', '', '2023-05-03 08:12:48'),
(54, 'Kamil Wojtoniak', '123', 'asdad', '2023-05-03 08:12:54'),
(55, 'Kamil Wojtoniak', '123', 'asdad', '2023-05-03 08:13:00'),
(56, 'Kamil Wojtoniak', '123', 'fsdfsa', '2023-05-03 10:59:29'),
(57, 'Kamil Wojtoniak', '123', 'sadad', '2023-05-03 10:59:49'),
(58, 'Kamil', 'Kamil Wojtoniak', 'gfgdhgf', '2023-06-17 08:30:40'),
(59, 'Kamil', 'asdad', 'sdfgfgsd', '2023-06-17 08:30:52');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `podanie`
--

CREATE TABLE `podanie` (
  `id` int(6) UNSIGNED NOT NULL,
  `imie` varchar(30) NOT NULL,
  `Opis` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `podanie`
--

INSERT INTO `podanie` (`id`, `imie`, `Opis`, `user_id`) VALUES
(68, 'gdfh', 'gdfshh', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`, `user_name`) VALUES
(1, 'Kamil Wojtoniak', 'kwojtoniak@gmail.com', '6ddae25004a858bdd2f4cf3ab50e5de8', 'admin', ''),
(2, 'Kamil Wojtoniak', 'kwojt700@gmail.com', '6ddae25004a858bdd2f4cf3ab50e5de8', 'user', ''),
(3, 'asdad', 'sada@gmail.comd', '6ddae25004a858bdd2f4cf3ab50e5de8', 'user', ''),
(4, 'marcin', 'ola@wp.pl', '6ddae25004a858bdd2f4cf3ab50e5de8', 'user', ''),
(5, '123', 'dx@wp.pl', '202cb962ac59075b964b07152d234b70', 'user', ''),
(6, '34', '34@wp.pl', 'e369853df766fa44e1ed0ff613f563bd', 'user', ''),
(7, 'Kamil', 'kamil@gmail.com', '11d462a4a1b14b00580d8020d6f64998', 'user', '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `podanie`
--
ALTER TABLE `podanie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `podanie`
--
ALTER TABLE `podanie`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
