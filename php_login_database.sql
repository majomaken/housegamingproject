-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2018 at 11:08 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_login_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(18, 'miguel@mail.com', '$2y$10$fJiaLe4NSMNw2QxQx4/jDO3r9qvgRQ9ZS2Q5A..RjqlrdI7AmYOnS'),
(19, 'minina@mail.com', '$2y$10$b4BYa1gspwY0j0O1pZQYmeIcGF3WxQa5J9uzJxB8JV5o47z.c/F.y'),
(20, 'minina@mail.com', '$2y$10$l4Zgf8A6v0F2Tt.4jrURvewCDVAL3byI7POJZBIE/GFfF9cerpnEK'),
(21, 'minina@mail.com', '$2y$10$tkLZWbfdWSMroM8P4depruOn9woHWrWZoysYkfUKOKO3QW2DFQylC'),
(22, 'minina@mail.com', '$2y$10$2JEFO4TOd7MG218SthPBRu42Ku14z9QKaC4X5rKiSe3055foimQmW'),
(23, 'minina@mail.com', '$2y$10$66adb/YflVsCzsGtU5ly.uYScsvZ9uvQq4MWlQPFMU.NnYWdbCFU.'),
(24, 'minina@mail.com', '$2y$10$pmPxBn/73/V0MKuCCtNMqejWTlfzaJo9W8jGJPhB0ZCI0KzGeqQSC'),
(25, 'minina@mail.com', '$2y$10$D0HK8/NmpwxQStxeXh1Pdu.0ejt9RrJcs83tnHusledPUf6IZT9X6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
