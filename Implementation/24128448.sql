-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2025 at 04:40 PM
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
-- Database: `24128448`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image_path`) VALUES
(6, '6.png');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `startDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `location` varchar(150) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `name`, `description`, `startDate`, `location`, `image_path`) VALUES
(0, '2NE1 ASIA TOUR', '2NE1 ASIA TOUR [Welcome Back]', '2025-02-02 08:37:00', 'seoul', '2NE1 [welcome back] Asia tour.jpg'),
(0, 'STRAY KIDS \'DOMINATE\' World Tour', 'STRAY KIDS \'DOMINATE\' World Tour', '2025-12-02 18:48:00', 'New Jersey, USA', 'STRAY KIDS [Dominate]World Tour.jpg'),
(0, 'Bangkok Fan signing event [Taeyong 2nd mini album]', 'Bangkok Fan signing event [Taeyong 2nd mini album]', '2025-04-03 20:50:00', 'SEOUL KSPO DOME', 'BANGKOK FAN SIGNING EVENT [TAEYONG 2nd mini album].jpg'),
(0, 'BABYMONSTER WORLD TOUR', 'BABYMONSTER WORLD TOUR first', '2025-03-12 06:15:00', 'New Jersey, USA', 'BABYMONSTER 1st WORLD Tour.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `paymentMethod` varchar(50) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `productid` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `userName`, `email`, `phone`, `address`, `paymentMethod`, `orderDate`, `productid`, `quantity`, `price`) VALUES
(1, 'mio', 'as@as', '9817828864', 'mki', 'COD', '2025-01-19 13:47:47', 8, 2, 1000.00),
(2, 'as', 'as@as', '2345', 'vrgt', 'COD', '2025-01-19 13:48:21', 12, 1, 100.00),
(3, 'gg', 'as@as', 's22222222', 'nhyu', 'COD', '2025-01-19 13:52:20', 10, 2, 2400.00),
(4, 'gg', 'as@as', 's22222222', 'nhyu', 'COD', '2025-01-19 13:59:36', 10, 2, 2400.00),
(5, 'mio', 'as@as', '2345', 'cdf', 'COD', '2025-01-19 13:59:51', 10, 3, 3600.00),
(6, 'riyashrestha', 'riya@riya', '987654321', ' vc', 'COD', '2025-01-19 14:03:22', 34, 1, 1390.00),
(7, 'fre', 'rw4@mn', '432', 'gd', 'COD', '2025-01-19 14:03:46', 34, 4, 5560.00),
(8, 'gg', 'as@as', '987654321', 'dfr', 'COD', '2025-01-19 14:44:31', 16, 2, 580.00),
(9, 'gg', 'as@as', '987654321', 'dfr', 'COD', '2025-01-19 14:44:44', 16, 2, 580.00),
(10, 'ryea', 'ryea@ryea', '9817828864', 'dfse', 'COD', '2025-01-20 05:34:33', 10, 2, 2400.00),
(11, 'ryea', 'ryea@ryea', '9817828864', 'dfse', 'COD', '2025-01-20 05:34:55', 10, 2, 2400.00),
(12, 'as', 'abc@abc', '7654', ' nbv', 'COD', '2025-01-20 06:16:28', 18, 1, 1100.00),
(13, 'mio', 'ryea@ryea', '654', 'hgf', 'COD', '2025-01-20 06:21:09', 11, 1, 550.00),
(14, 'dc', 'riya@riya', '2345', 'tre', 'COD', '2025-01-20 06:22:27', 11, 1, 550.00),
(15, 'dc', 'riya@riya', '2345', 'tre', 'COD', '2025-01-20 06:22:45', 11, 1, 550.00),
(16, 'dc', 'riya@riya', '2345', 'tre', 'COD', '2025-01-20 06:24:51', 11, 1, 550.00),
(17, 'gbf', 'riya@riya', 'ghrf432', 'hgbfvred', 'COD', '2025-01-20 06:25:01', 11, 1, 550.00),
(18, 'gbf', 'riya@riya', 'ghrf432', 'hgbfvred', 'COD', '2025-01-20 06:33:52', 11, 1, 550.00),
(19, 'htgrf', 'riya@riya', '65342', 'ngbfv', 'COD', '2025-01-20 06:34:22', 14, 1, 1400.00),
(20, 'htgrf', 'riya@riya', '65342', 'ngbfv', 'COD', '2025-01-20 06:35:26', 14, 1, 1400.00),
(21, 'as', 'riya@riya', '9817828864hng', 'gbffvds', 'COD', '2025-01-20 06:35:36', 14, 1, 1400.00),
(22, 'as', 'riya@riya', '9817828864hng', 'gbffvds', 'COD', '2025-01-20 06:35:45', 14, 1, 1400.00),
(23, 'riya', 'riya@riya', '65432', 'hgf', 'COD', '2025-01-20 06:43:11', 8, 1, 500.00),
(24, 'mio', 'ryea@ryea', '9817828864', 'dfg', 'COD', '2025-01-20 08:34:57', 7, 3, 600.00),
(25, 'xc', 'abc@abc', '2345', 'dfgv', 'COD', '2025-01-20 14:53:58', 8, 2, 1000.00),
(26, 'ryea', 'ryea@ryea', '9817828864', 'sxdc', 'COD', '2025-01-20 16:53:46', 17, 2, 3200.00),
(27, 'riya', 'as@as', '9817828864', 'asss', 'COD', '2025-01-21 01:54:41', 10, 3, 3600.00),
(28, 'mio', 'riya@riya', '9817828864', 'dsfre', 'COD', '2025-02-12 15:35:36', 10, 3, 3600.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productid` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `name`, `description`, `image_path`, `price`) VALUES
(8, '[LE SSERAFIM] ANTI_FRAGILE', '[LE SSERAFIM] ANTI_FRAGILE ALBUM', '[LE SERRAFIM] ANTIFRAGILE.png', 500.00),
(10, 'BabyMonster Fan Light ', 'BabyMonster Fan Lightstick 2024 Official', 'BABYMONS7ER {Official} FAN LIGHT.png', 1200.00),
(11, 'AESPA POB', 'AESPA Concert 2022 Photobook', 'AESPA [Concert] Photoboook.png', 550.00),
(12, 'BT21 Cute Pen', 'BTS BT21 Pen ', 'BTS BT21 Cute Pen.png', 100.00),
(13, 'BLACKPINK Card', 'BLACKPINK Membership Card Japan', 'BLACKPINK BLINK Membership Card Japan.png', 2000.00),
(14, 'Babymonster 1st Mini Album ', 'Babymonster 1st Mini Album BABYMONS7ER', 'Babymonster 1st Mini Album BABYMONS7ER.png', 1400.00),
(15, 'Aespa Drama POB', 'Aespa [Drama] Album Photobook', 'Aespa [DRAMA] album Photobook.png', 430.00),
(17, 'LISA AlterEgo \'ALBUM\'', 'BLACKPINK Lisa Upcoming [for pre-order]', 'BLACKPINK Lisa AlterEGO.png', 1600.00),
(19, 'Jungkook \'GOLDEN\' POSTER', 'BTS Jungkook GOLDEN ALBUM POSTER', 'BTS JungKook Golden Poster.png', 90.00),
(20, 'BLACKPINK  LightSTICK VER.2', 'BLACKPINK OFFICIAL LightSTICK VER.2', 'BlackPink OFFICIAL LightSTick VER.2.png', 1500.00),
(21, 'BTS Talk Book', 'BTS Talk Book', 'BTS Talk Book.png', 800.00),
(22, 'JISOO [ME] Photocard', 'BLACKPINK JISOO [ME] Album Photocard', 'BLACKPINK JISOO SINGLE Photocard.png', 150.00),
(23, 'G-IDLE ', 'G-IDLE  FanLight', 'G-idle Lightstick.png', 900.00),
(24, 'ROSIE Album Rosie', 'BLACKPINK ROSIE Album Rosie [APT, 3AM]', 'BLACKPINK Rose Album Rosie.png', 2000.00),
(25, 'ITZY - Born to be ALBUM', 'JYPE [ITZY] - Born to be ALBUM', 'ITZY Born to be ALBUM.png', 1500.00),
(26, 'IU', 'IU Solo Artist LightSTICK', 'IU.png', 1200.00),
(27, 'KIOF ', 'Kiss-Of-Life LightSTICK', 'KIOF.png', 1100.00),
(28, 'IVE [ive]Switch ALBUM', 'STAR LIGHT - IVE [i\'ve]Switch ALBUM', 'IVE [Ive Switch].png', 1450.00),
(29, 'New-JEANS SuperNatural ALBUM CD', 'HYBE ADOR girl group  Supernatural CD', 'New Jeans [SuperNatural] ALBUM CD.png', 700.00),
(30, 'TWICE', 'TWICE Lightstick', 'Twice.png', 1400.00),
(31, 'RED VELVET [lip balm]', 'RED VELVET Lightstick Ver. [lip balm]', 'RedVelvet LipBalm.png', 450.00),
(32, 'TXT', 'TXT FANLIGHT', 'TXT.png', 1200.00),
(33, ' DRIP - 1st FUll ALBUM', 'ALBUM [DRIP] BABYMONS7ER Binder Ver.', 'Babymonster 1st Full Album.png', 1800.00),
(34, 'Puzzle', 'SEVENTEEN Puzzle Merchandise', 'SEVENTEEN PUZZLE MERCH.png', 1390.00),
(35, 'LE SSERAFIM [UNFORGIVEN] Photocard', 'LE SSERAFIM [UNFORGIVEN]  WEVERSE JAPAN Photocard', 'LESSERAFIM [UNFORGIVEN] WEVERSE JAPAN Photocard.jpg', 280.00),
(36, 'BP [KTL] Sticker Set', 'BlackPink [Kill This Love] Sticker Set', 'BlackPink Kill This Love Sticker set.png', 500.00),
(37, 'KATSEYE ALBUM FIRST [SIS]', 'KATSEYE ALBUM FIRST [SIS]- HYBE 1st GG', 'KATSEYE 1st ALBUM .png', 500.00),
(0, 'BTS WIngs album', 'BTS WIngs  2025 album', 'BTS Wings Album.png', 2000.00);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewid` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productReview` text NOT NULL,
  `rating` int(11) NOT NULL,
  `reviewDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewid`, `productName`, `productReview`, `rating`, `reviewDate`) VALUES
(25, 'd', 'er', 1, '2025-01-20 13:46:01'),
(26, 'cf', 'd', 1, '2025-01-20 13:46:38'),
(27, 'lightstick', 'nice product, i love it', 5, '2025-01-20 14:21:10'),
(28, 'cd', 'low quality', 2, '2025-01-20 20:39:27'),
(29, 'alter ego album lisa', 'i love it', 5, '2025-01-20 22:39:35'),
(30, 'lightstick', 'i like it', 4, '2025-01-21 07:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `userName` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `userName`, `email`, `password`, `createdDate`, `phone`, `address`) VALUES
(1, 'fkadlsfjkdjfl', 'a@a', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL),
(2, 'fdsafgbagdfbadfsdafd', 'riya@riya', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL),
(3, 'as', 'as@as', 'f970e2767d0cfe75876ea857f92e319b', NULL, NULL, NULL),
(4, 'riri', 'riri@riri', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL),
(5, 'binu', 'binu@gmail.com', '7815696ecbf1c96e6894b779456d330e', NULL, NULL, NULL),
(6, 'rajan', 'rajan@yahoo.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL),
(7, 'asd', 'asd@as', '7815696ecbf1c96e6894b779456d330e', NULL, NULL, NULL),
(8, 'sunway', 'sunway@asd', '7815696ecbf1c96e6894b779456d330e', NULL, NULL, NULL),
(9, 'riya', 'rya@rya', 'f61f7496bf55c9798ed470b60ff6810c', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
