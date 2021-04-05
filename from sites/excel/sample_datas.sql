-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2019 at 08:12 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `sample_datas`
--

CREATE TABLE `sample_datas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sample_datas`
--

INSERT INTO `sample_datas` (`id`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Smith', '2019-10-11 21:39:09', '2019-10-11 21:39:09'),
(2, 'Peter', 'Parker', '2019-10-11 21:39:09', '2019-10-11 21:39:09'),
(3, 'Larry', 'Degraw', '2019-10-11 21:39:09', '2019-10-11 21:39:09'),
(4, 'Tabitha', 'Russell', '2019-10-11 21:39:09', '2019-10-11 21:39:09'),
(5, 'Susan', 'Diener', '2019-10-14 00:30:00', '2019-10-14 00:30:00'),
(6, 'William', 'Batiste', '2019-10-14 00:30:00', '2019-10-14 00:30:00'),
(7, 'Bessie', 'Tucker', '2019-10-14 00:30:00', '2019-10-14 00:30:00'),
(8, 'Eva', 'King', '2019-10-14 00:30:00', '2019-10-14 00:30:00'),
(9, 'Dorothy', 'Hays', '2019-10-14 03:30:00', '2019-10-14 03:30:00'),
(10, 'Nannie', 'Ayers', '2019-10-14 03:30:00', '2019-10-14 03:30:00'),
(11, 'Gerald', 'Brown', '2019-10-14 04:30:00', '2019-10-14 04:30:00'),
(12, 'Judith', 'Smith', '2019-10-14 04:30:00', '2019-10-14 04:30:00'),
(13, 'Betty', 'McLaughlin', '2019-10-14 13:30:00', '2019-10-14 13:30:00'),
(14, 'Delores', 'Schumacher', '2019-10-14 13:30:00', '2019-10-14 13:30:00'),
(15, 'Gloria', 'Romero', '2019-10-14 06:30:00', '2019-10-14 06:30:00'),
(16, 'Bobbie', 'Wilson', '2019-10-14 06:30:00', '2019-10-14 06:30:00'),
(17, 'Paul', 'Pate', '2019-10-14 13:30:00', '2019-10-14 13:30:00'),
(18, 'Ryan', 'Hoang', '2019-10-14 13:30:00', '2019-10-14 13:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sample_datas`
--
ALTER TABLE `sample_datas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sample_datas`
--
ALTER TABLE `sample_datas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
