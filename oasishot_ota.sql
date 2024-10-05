-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 28, 2024 at 02:20 PM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oasishot_ota`
--

-- --------------------------------------------------------

--
-- Table structure for table `advance_currency`
--

CREATE TABLE `advance_currency` (
  `id` int(11) NOT NULL,
  `advance_currency` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advance_currency`
--

INSERT INTO `advance_currency` (`id`, `advance_currency`, `created_at`, `updated_at`) VALUES
(1, 'BDT', '2024-06-10 10:41:34', '2024-06-10 10:41:34'),
(2, 'USD', '2024-06-10 10:41:45', '2024-06-10 10:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `bank_invoice`
--

CREATE TABLE `bank_invoice` (
  `id` int(11) NOT NULL,
  `submitted_by` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `hotel` varchar(255) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `invoice2` varchar(255) DEFAULT NULL,
  `date2` varchar(255) DEFAULT NULL,
  `amount2` varchar(255) DEFAULT NULL,
  `invoice3` varchar(255) DEFAULT NULL,
  `date3` varchar(255) DEFAULT NULL,
  `amount3` varchar(255) DEFAULT NULL,
  `invoice4` varchar(255) DEFAULT NULL,
  `date4` varchar(255) DEFAULT NULL,
  `amount4` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_invoice`
--

INSERT INTO `bank_invoice` (`id`, `submitted_by`, `type`, `hotel`, `invoice`, `reference`, `date`, `amount`, `invoice2`, `date2`, `amount2`, `invoice3`, `date3`, `amount3`, `invoice4`, `date4`, `amount4`, `created_at`, `updated_at`) VALUES
(3, 'Md Gias Uddin', 'single', '', '2050', '2050', '24-07-2024', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 20:54:08', '2024-07-26 20:54:08'),
(5, 'Md Gias Uddin', 'multi', '', '2050', '2050', '26-07-2024', '55.50', '2060', '27-07-2024', '1025', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 20:59:08', '2024-07-26 20:59:08'),
(6, 'Md Gias Uddin', 'multi', '', '5303246', '5303246', '31-07-2024', '2050', '5303246', '30-07-2024', '2050', '5303246', '28-07-2024', '2050', '5303246', '23-07-2024', '2050', '2024-07-26 21:04:09', '2024-07-27 01:25:57'),
(8, 'Md Gias Uddin', 'single', '', '2060', '2070', '31-07-2024', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 21:05:20', '2024-07-26 22:19:10'),
(9, 'Md Gias Uddin', 'multi', '', '2050507', '2050507', '17-07-2024', '2050507', '2050507', '16-07-2024', '2050507', '2050507', '16-07-2024', '2050507', NULL, NULL, NULL, '2024-07-27 02:00:52', '2024-07-27 02:00:52'),
(10, 'Md Gias Uddin', 'multi', '', '2050507', '2050507', '16-07-2024', '2050507', '2050507', '23-07-2024', '2050507', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-27 02:02:05', '2024-07-27 02:02:05'),
(11, 'Md Gias Uddin', 'single', '', '2050507', '2050507', '23-07-2024', '2050507', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-27 02:02:48', '2024-07-27 02:02:48'),
(12, 'Md Gias Uddin', 'single', '', '1111111', '1111111', '31-07-2024', '1111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-28 04:44:36', '2024-07-28 04:44:36'),
(13, 'Md Gias Uddin', 'single', 'Hotel Nandini', '20202022', '20202022', '23-07-2024', '55.50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-28 08:54:04', '2024-07-28 08:54:04'),
(14, 'Md Gias Uddin', 'multi', 'Royal Raj', '20202022', '20202022', '17-07-2024', '20202022', '2050507', '16-07-2024', '20202022', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-28 08:55:04', '2024-07-28 08:55:04'),
(15, 'Md Gias Uddin', 'single', '102030', '102030', '102030', '23-07-2024', '20202022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-28 08:56:52', '2024-07-28 08:56:52'),
(16, 'Md Gias Uddin', 'single', 'wood burn hotel', '102030', '102030', '23-07-2024', '20202022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-28 09:09:58', '2024-07-28 09:11:10'),
(17, 'Md Gias Uddin', 'single', 'wood burn hotel', '2050', '2050', '16-07-2024', '55.50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-28 09:29:40', '2024-07-28 09:29:40'),
(18, 'Rakib Gazi', 'single', 'Seagull Hotel', '202400253', 'Do', '29-07-2024', '18,000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-29 04:31:17', '2024-07-29 04:31:17'),
(19, 'Md Gias Uddin', 'single', 'Hotel Holiday Xpress', '5437113', '889046', '04-08-2024', '262.65', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-13 04:10:25', '2024-08-13 04:10:25'),
(20, 'Md Gias Uddin', 'single', 'Nagar Valley Hotel Ltd', '5452338', '890401', '06-08-2024', '33.35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-15 05:22:55', '2024-08-15 05:22:55'),
(21, 'Md Gias Uddin', 'single', ' Nagar Valley Hotel Ltd', '5491195', '894759', '13-08-2024', '33.35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-21 04:13:45', '2024-08-21 04:13:45'),
(22, 'Md Gias Uddin', 'single', 'Wood Brun Hotel', '124242', '42222424', '15-08-2024', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-25 14:10:05', '2024-08-25 14:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currency`, `created_at`, `updated_at`) VALUES
(5, 'BDT', '2024-06-10 04:25:25', '2024-06-10 04:25:25'),
(6, 'USD', '2024-06-10 04:25:30', '2024-06-10 04:25:30');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_name`
--

CREATE TABLE `hotel_name` (
  `id` int(11) NOT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_name`
--

INSERT INTO `hotel_name` (`id`, `hotel_name`, `created_at`, `updated_at`) VALUES
(16, 'Hotel Sylhet International', '2024-06-09 10:04:43', '2024-06-09 10:04:43'),
(17, 'Hotel Studio 23', '2024-06-09 10:12:32', '2024-06-09 10:12:32'),
(18, 'Wood Burn Hotel', '2024-06-09 10:17:17', '2024-06-09 10:17:17'),
(20, 'Hotel Royal Raj International', '2024-06-09 10:40:45', '2024-06-09 10:40:45'),
(21, 'Hotel Sunset Bay', '2024-06-09 10:41:33', '2024-06-09 10:41:33'),
(22, 'Dreamers Paradise Hotel', '2024-06-09 10:41:50', '2024-06-09 10:41:50'),
(23, 'Hotel de Crystal Crown', '2024-08-03 04:14:12', '2024-08-03 04:14:12'),
(24, 'Coastal Peace', '2024-08-03 04:17:57', '2024-08-03 04:17:57'),
(25, 'Ocean Palace Cox\'sBazar', '2024-08-03 04:20:47', '2024-08-03 04:20:47'),
(26, 'La Sky Dhaka', '2024-08-03 04:39:09', '2024-08-03 04:39:09'),
(27, 'Nagar Valley Hotel Ltd', '2024-08-07 08:35:04', '2024-08-07 08:35:04'),
(28, 'Eque Heritage Hotel & Resort', '2024-08-10 04:52:10', '2024-08-10 04:52:10'),
(29, 'Oasis Hotel Cumilla', '2024-08-10 04:56:10', '2024-08-10 04:56:10'),
(30, 'Crystal Rose Sylhet', '2024-08-10 04:59:32', '2024-08-10 04:59:32'),
(31, 'Kishoreganj Resort', '2024-08-10 05:15:03', '2024-08-10 05:15:03'),
(32, 'Atlantic Resort', '2024-08-10 06:10:03', '2024-08-10 06:10:03'),
(33, 'Nazimgarh Garden Resort', '2024-08-12 04:20:46', '2024-08-12 04:20:46'),
(34, 'GRAND MAFI', '2024-08-12 04:23:53', '2024-08-12 04:23:53'),
(35, 'Adarsha Palace Hotel', '2024-08-12 04:28:24', '2024-08-12 04:28:24'),
(36, '78 Firoza Inn', '2024-08-12 04:31:12', '2024-08-12 04:31:12'),
(38, 'W Hotel', '2024-08-13 04:26:15', '2024-08-13 04:26:15'),
(39, 'Hotel living international ltd', '2024-08-13 04:33:43', '2024-08-13 04:33:43'),
(40, 'Pearl Hotel', '2024-08-14 02:49:02', '2024-08-14 02:49:02'),
(41, 'White House Resort', '2024-08-15 05:32:25', '2024-08-15 05:32:25'),
(42, 'Hotel Razmoni Isha Kha International', '2024-08-17 04:56:10', '2024-08-17 04:56:10'),
(43, 'Seagull Hotels Ltd.', '2024-08-19 04:19:30', '2024-08-19 04:19:30');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `payment`, `created_at`, `updated_at`) VALUES
(5, 'Hotel  Collects', '2024-06-10 04:59:13', '2024-06-10 04:59:13'),
(6, 'Expedia Collects', '2024-06-10 04:59:22', '2024-06-10 04:59:22'),
(7, 'Airbnb Collects', '2024-06-10 04:59:34', '2024-06-10 04:59:34'),
(8, 'Ctrip Collects', '2024-06-10 10:49:52', '2024-06-10 10:49:52');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `submitted_by` varchar(255) NOT NULL,
  `reservation_number` varchar(100) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `check_in` text NOT NULL,
  `check_out` text NOT NULL,
  `booking_date` text NOT NULL,
  `hotel` varchar(100) NOT NULL,
  `guest` varchar(100) NOT NULL,
  `room` varchar(200) DEFAULT NULL,
  `total_room` varchar(20) NOT NULL,
  `night` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `rate` varchar(100) NOT NULL,
  `advance` varchar(100) NOT NULL,
  `advance_currency` varchar(20) NOT NULL,
  `source` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `comment` varchar(400) NOT NULL,
  `admin_comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `room_1` varchar(255) DEFAULT NULL,
  `total_1_room` varchar(255) DEFAULT NULL,
  `night_1` varchar(255) DEFAULT NULL,
  `room_1_price` varchar(255) DEFAULT NULL,
  `room_2` varchar(255) DEFAULT NULL,
  `total_2_room` varchar(255) DEFAULT NULL,
  `night_2` varchar(255) DEFAULT NULL,
  `room_2_price` varchar(255) DEFAULT NULL,
  `room_3` varchar(255) DEFAULT NULL,
  `total_3_room` varchar(255) DEFAULT NULL,
  `night_3` varchar(255) DEFAULT NULL,
  `room_3_price` varchar(255) DEFAULT NULL,
  `room_4` varchar(255) DEFAULT NULL,
  `total_4_room` varchar(255) DEFAULT NULL,
  `night_4` varchar(255) DEFAULT NULL,
  `room_4_price` varchar(255) DEFAULT NULL,
  `room_5` varchar(255) DEFAULT NULL,
  `total_5_room` varchar(255) DEFAULT NULL,
  `night_5` varchar(255) DEFAULT NULL,
  `room_5_price` varchar(255) DEFAULT NULL,
  `room_6` varchar(255) DEFAULT NULL,
  `total_6_room` varchar(255) DEFAULT NULL,
  `night_6` varchar(255) DEFAULT NULL,
  `room_6_price` varchar(255) DEFAULT NULL,
  `room_7` varchar(255) DEFAULT NULL,
  `total_7_room` varchar(255) DEFAULT NULL,
  `night_7` varchar(255) DEFAULT NULL,
  `room_7_price` varchar(255) DEFAULT NULL,
  `room_8` varchar(255) DEFAULT NULL,
  `total_8_room` varchar(255) DEFAULT NULL,
  `night_8` varchar(255) DEFAULT NULL,
  `room_8_price` varchar(255) DEFAULT NULL,
  `room_9` varchar(255) DEFAULT NULL,
  `total_9_room` varchar(255) DEFAULT NULL,
  `night_9` varchar(255) DEFAULT NULL,
  `room_9_price` varchar(255) DEFAULT NULL,
  `room_10` varchar(255) DEFAULT NULL,
  `total_10_room` varchar(255) DEFAULT NULL,
  `night_10` varchar(255) DEFAULT NULL,
  `room_10_price` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `type`, `submitted_by`, `reservation_number`, `status`, `check_in`, `check_out`, `booking_date`, `hotel`, `guest`, `room`, `total_room`, `night`, `price`, `currency`, `rate`, `advance`, `advance_currency`, `source`, `payment_method`, `phone`, `comment`, `admin_comment`, `created_at`, `updated_at`, `room_1`, `total_1_room`, `night_1`, `room_1_price`, `room_2`, `total_2_room`, `night_2`, `room_2_price`, `room_3`, `total_3_room`, `night_3`, `room_3_price`, `room_4`, `total_4_room`, `night_4`, `room_4_price`, `room_5`, `total_5_room`, `night_5`, `room_5_price`, `room_6`, `total_6_room`, `night_6`, `room_6_price`, `room_7`, `total_7_room`, `night_7`, `room_7_price`, `room_8`, `total_8_room`, `night_8`, `room_8_price`, `room_9`, `total_9_room`, `night_9`, `room_9_price`, `room_10`, `total_10_room`, `night_10`, `room_10_price`) VALUES
(62, 'single', 'Md Gias Uddin', '4488654045', 'No Show', '01-08-2024', '15-08-2024', '14-07-2024', 'Hotel de Crystal Crown', 'wannida Sae Tieo', 'Deluxe Single Room', '1', '14', '799.19', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', 'wtieo.328238@guest.booking.com', '', NULL, '2024-08-03 04:16:04', '2024-08-03 04:17:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'single', 'Md Gias Uddin', '4559306376', 'No Show', '01-08-2024', '04-08-2024', '27-07-2024', 'Coastal Peace', 'MD Tanvir Tanvir', 'Standard Double Room', '3', '3', '604.63', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '01956790152', '', NULL, '2024-08-03 04:19:48', '2024-08-03 04:20:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'single', 'Md Gias Uddin', '4364423123', 'No Show', '02-08-2024', '03-08-2024', '01-08-2024', 'Ocean Palace Cox\'sBazar', 'Aminul Sabbir', 'Quadruple Room with Sea View', '1', '1', '58.72', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '01749130050', '', NULL, '2024-08-03 04:38:23', '2024-08-03 04:38:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'single', 'Md Gias Uddin', '4598809279', 'No Show', '02-08-2024', '03-08-2024', '02-08-2024', 'La Sky Dhaka', 'gumo akif', 'Deluxe Double Room', '10', '1', '396.10', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '62 2035640799', '', NULL, '2024-08-03 04:40:59', '2024-08-03 04:41:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'single', 'Md Gias Uddin', '4554479136', 'No Show', '04-08-2024', '06-08-2024', '02-08-2024', 'Hotel de Crystal Crown', 'Timor Perkasa', 'Deluxe Double Room', '1', '2', '137.47', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '62 2035640799', '', NULL, '2024-08-03 04:43:08', '2024-08-11 04:51:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'single', 'Md Gias Uddin', '4364492875', NULL, '30-08-2024', '07-09-2024', '01-08-2024', 'Ocean Palace Cox\'sBazar', 'NIKHIL JAISWAL', 'Deluxe Quadruple Room', '1', '8', '295.26', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', 'njaisw.422965@guest.booking.com', '', NULL, '2024-08-03 04:45:50', '2024-08-03 04:45:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'single', 'Md Gias Uddin', '4738249565', NULL, '30-08-2024', '07-09-2024', '01-08-2024', 'Ocean Palace Cox\'sBazar', 'NIKHIL JAISWAL', 'Deluxe Quadruple Room', '1', '8', '295.26', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', 'njaisw.572503@guest.booking.com', '', NULL, '2024-08-03 04:47:29', '2024-08-03 04:47:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'single', 'Md Gias Uddin', '4547377004', 'No Show', '07-08-2024', '11-08-2024', '07-08-2024', 'La Sky Dhaka', 'penta axsee', 'Deluxe Double Room', '10', '04', '1584.40', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '62 2035640799', '', NULL, '2024-08-07 07:58:34', '2024-08-08 04:12:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'single', 'Md Gias Uddin', '294033175', 'Charged', '06-08-2024', '07-08-2024', '05-08-2024', 'Nagar Valley Hotel Ltd', 'Olga Krainova', ' Deluxe Room', '1', '1', '33.34', 'USD', '115', '33.34', 'USD', 'Expedia', 'Expedia Collects', 'N/A', '', NULL, '2024-08-07 08:44:42', '2024-08-12 04:04:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'single', 'Md Gias Uddin', '4612158243', 'No Show', '17-08-2024', '18-08-2024', '08-08-2024', 'Ocean Palace Cox\'sBazar', 'Shompa Rahman', 'Deluxe Queen Room', '1', '1', '48.93', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', 'srahma.962585@guest.booking.com', 'I\'m traveling for business and I might use a business credit card.', NULL, '2024-08-08 04:20:51', '2024-08-18 03:48:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'single', 'Md Gias Uddin', '4566579046', 'No Show', '10-08-2024', '12-08-2024', '08-08-2024', 'Hotel de Crystal Crown', 'Yuanita Dewi', 'Deluxe Double Room', '1', '2', '137.47', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+62 2035640799', 'LargeBed, NonSmoke', NULL, '2024-08-10 04:33:49', '2024-08-11 04:02:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'single', 'Md Gias Uddin', '4819411220', '', '09-02-2025', '11-02-2025', '08-08-2024', 'Wood Burn Hotel', 'Yumi Luo', 'Single Room with Private Bathroom', '1', '2', '39.84', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+49 176 29952159', '', NULL, '2024-08-10 04:37:37', '2024-08-10 04:38:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'single', 'Md Gias Uddin', '296813262', 'No Show', '10-08-2024', '11-08-2024', '09-08-2024', 'Eque Heritage Hotel & Resort', 'Robert Kent', 'Deluxe Room', '1', '1', '55.20', 'USD', '118.25', '', '', 'Expedia', 'Hotel  Collects', 'N/A', '', NULL, '2024-08-10 04:51:31', '2024-08-15 05:35:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'single', 'Md Gias Uddin', '296852591', 'No Show', '19-08-2024', '20-08-2024', '09-08-2024', 'Oasis Hotel Cumilla', 'Roni Hasan', 'Deluxe  Room ', '1', '1', '62.11', 'USD', '118.25', '', '', 'Expedia', 'Hotel  Collects', 'N/A', '', NULL, '2024-08-10 04:55:56', '2024-08-19 08:41:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'single', 'Md Gias Uddin', '296856713', '', '27-08-2024', '28-08-2024', '09-08-2024', 'Crystal Rose Sylhet', 'Sabbir Khan', 'Family Suite, Balcony', '1', '1', '234.00', 'USD', '118.25', '', '', 'Expedia', 'Hotel  Collects', '01855539830', '', NULL, '2024-08-10 04:59:15', '2024-08-27 05:25:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'single', 'Md Gias Uddin', '296956135', 'Canceled', '27-08-2024', '30-08-2024', '09-08-2024', 'Hotel de Crystal Crown', 'Ewa Zurek', 'Deluxe Double Room', '1', '3', '130.99', 'USD', '113', '', '', 'Expedia', 'Expedia Collects', ' +33 9 79 99 81 11', '', NULL, '2024-08-10 05:04:36', '2024-08-27 05:15:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'single', 'Md Gias Uddin', '297357794', 'No Show', '11-08-2024', '12-08-2024', '10-08-2024', 'Kishoreganj Resort', 'Tyler Sheppard', 'Deluxe Single Room, Courtyard View', '1', '1', '45.54', 'USD', '118.25', '', '', 'Expedia', 'Hotel  Collects', '0-8801755520060', '', NULL, '2024-08-10 05:13:12', '2024-08-15 05:37:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'single', 'Md Gias Uddin', '297350106', 'No Show', '11-08-2024', '12-08-2024', '10-08-2024', 'Crystal Rose Sylhet', 'Jack Tait', 'Deluxe Double or Twin Room, Balcony', '1', '1', '49.50', 'USD', '118.25', '', '', 'Expedia', 'Hotel  Collects', ' 0-8801755520060', '', NULL, '2024-08-10 05:14:44', '2024-08-15 05:38:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'single', 'Md Gias Uddin', '4468245182', 'Canceled', '10-08-2024', '15-08-2024', '10-08-2024', 'Atlantic Resort', 'Kledi qoshja', 'Deluxe Double Room with Balcony and Sea View', '1', '5', '455.40', 'USD', '118.25', '', '', 'Booking.com', 'Hotel  Collects', '+355 68 430 5171', '', NULL, '2024-08-10 06:09:31', '2024-08-12 03:50:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'single', 'Md Gias Uddin', '298487234', 'No Show', '19-08-2024', '20-08-2024', '12-08-2024', 'Eque Heritage Hotel & Resort', 'Mahmud Khan', 'Family Suite', '1', '1', '71.40', 'USD', '118.25', '', '', 'Expedia', 'Hotel  Collects', '01855539830', '1 Double Bed and 1 Queen Bed, Smoking', NULL, '2024-08-12 04:15:52', '2024-08-19 08:43:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'single', 'Md Gias Uddin', '298414082', 'No Show', '13-08-2024', '14-08-2024', '12-08-2024', 'Nazimgarh Garden Resort', 'Terry Koepke', 'Deluxe Double or Twin Room, Garden View', '1', '1', '195.31', 'USD', '118.25', '', '', 'Expedia', 'Hotel  Collects', '8801555501521', '2 Queen Beds, Smoking', NULL, '2024-08-12 04:20:24', '2024-08-15 05:39:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'single', 'Md Gias Uddin', '298417830', 'No Show', '13-08-2024', '14-08-2024', '12-08-2024', 'GRAND MAFI', 'Mary Carreon', 'Deluxe Double Room, City View', '1', '1', '45.01', 'USD', '118.25', '', '', 'Expedia', 'Hotel  Collects', '01855527559', '1 Queen Bed, Smoking', NULL, '2024-08-12 04:23:28', '2024-08-15 05:42:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'single', 'Md Gias Uddin', '298387959', 'No Show', '13-08-2024', '14-08-2024', '12-08-2024', 'Nazimgarh Garden Resort', 'Thomas Alvarado', 'Executive Room, Garden View', '1', '1', '212.40', 'USD', '118.25', '', '', 'Expedia', 'Hotel  Collects', '01755520060', '1 King Bed, Smoking', NULL, '2024-08-12 04:26:04', '2024-08-15 05:39:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'single', 'Md Gias Uddin', '298432675', 'No Show', '13-08-2024', '14-08-2024', '12-08-2024', 'Adarsha Palace Hotel', 'Ivory Akin', 'Luxury Quadruple Room', '1', '1', '41.39', 'USD', '118.25', '', '', 'Expedia', 'Hotel  Collects', '01855511325', '1 King Bed and 1 Large Twin Bed, Smoking', NULL, '2024-08-12 04:28:09', '2024-08-15 05:43:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'single', 'Md Gias Uddin', '298434378', 'No Show', '13-08-2024', '14-08-2024', '12-08-2024', '78 Firoza Inn', 'Albert Holder', 'Deluxe Double Room, City View', '1', '1', '59.40', 'USD', '118.25', '', '', 'Expedia', 'Hotel  Collects', '01755520060', '2 Queen Beds, Smoking', NULL, '2024-08-12 04:30:48', '2024-08-15 05:45:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'single', 'Md Gias Uddin', '298449764', 'No Show', '13-08-2024', '14-08-2024', '12-08-2024', 'Adarsha Palace Hotel', 'Patricia Thompson', 'Deluxe Double Room', '1', '1', '29.70', 'USD', '118.25', '', '', 'Expedia', 'Hotel  Collects', '01655515822', '1 Queen Bed, Smoking', NULL, '2024-08-12 04:33:42', '2024-08-15 05:44:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'single', 'Md Gias Uddin', '4849999039', 'No Show', '14-08-2024', '16-08-2024', '12-08-2024', 'Hotel de Crystal Crown', 'Tono Ismail', 'Deluxe Double Room', '1', '2', '137.47', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '62 2035640799', '', NULL, '2024-08-13 04:08:39', '2024-08-15 05:11:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'single', 'Md Gias Uddin', '299003515', 'Checked In', '13-08-2024', '14-08-2024', '12-08-2024', 'Nagar Valley Hotel Ltd', 'Nazrul Islam', 'Deluxe Room', '1', '1', '33.35', 'USD', '113.25', '33.35', 'USD', 'Expedia', 'Expedia Collects', ' 0-07932701096', '2 Double Beds, Smoking,  3 adults.  ', NULL, '2024-08-13 04:15:35', '2024-08-15 06:21:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'single', 'Md Gias Uddin', '298967445', 'No Show', '14-08-2024', '15-08-2024', '12-08-2024', 'Crystal Rose Sylhet', 'John Morgenstern', 'Deluxe Double or Twin Room', '1', '1', '49.50', 'USD', '118.25', '', '', 'Expedia', 'Hotel  Collects', '8801755520060', '', NULL, '2024-08-13 04:23:52', '2024-08-15 05:48:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'single', 'Md Gias Uddin', '298971183', 'No Show', '14-08-2024', '15-08-2024', '12-08-2024', 'Nazimgarh Garden Resort', 'James Chin', 'Deluxe Double or Twin Room', '1', '1', '195.31', 'USD', '118.25', '', '', 'Expedia', 'Hotel  Collects', '8801755520060', '', NULL, '2024-08-13 04:25:32', '2024-08-15 05:41:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 'single', 'Md Gias Uddin', '298969140', 'No Show', '14-08-2024', '15-08-2024', '12-08-2024', 'W Hotel', 'James Mitchell', 'Standard Quadruple Room', '1', '1', '39.60', 'USD', '118.25', '', '', 'Expedia', 'Hotel  Collects', '8801755520060', '', NULL, '2024-08-13 04:27:31', '2024-08-15 05:49:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 'single', 'Md Gias Uddin', '298982141', 'No Show', '14-08-2024', '15-08-2024', '12-08-2024', 'Nazimgarh Garden Resort', 'Fields Fields', 'Deluxe Double or Twin Room', '1', '1', '195.31', 'USD', '118.25', '', '', 'Expedia', 'Hotel  Collects', '8801155515187', '', NULL, '2024-08-13 04:29:42', '2024-08-15 05:40:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 'single', 'Md Gias Uddin', '299114516', 'No Show', '14-08-2024', '15-08-2024', '12-08-2024', 'Hotel de Crystal Crown', 'Herman Porter', 'Deluxe Twin Room, City View', '1', '1', '52.20', 'USD', '118.25', '', '', 'Expedia', 'Expedia Collects', '8801755520060', '', NULL, '2024-08-13 04:31:15', '2024-08-15 05:50:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 'single', 'Md Gias Uddin', '299115389', 'No Show', '14-08-2024', '15-08-2024', '13-08-2024', 'Hotel living international ltd', 'Scott Hinson', ' Deluxe Double Room', '1', '1', '35.99', 'USD', '118.25', '', '', 'Expedia', 'Hotel  Collects', '0-8801755520060', '', NULL, '2024-08-13 04:33:18', '2024-08-15 05:51:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'single', 'Md Gias Uddin', '4732737425', 'Canceled', '15-08-2024', '18-08-2024', '13-08-2024', 'Hotel Royal Raj International', 'Rifat Hossain Bepari', 'Junior Suite', '1', '3', '455.40', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+880 1936 238779', '', NULL, '2024-08-13 04:42:50', '2024-08-17 08:26:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'single', 'Md Gias Uddin', '299869777', NULL, '27-08-2024', '28-08-2024', '14-08-2024', 'Pearl Hotel', 'Ratul Khan', 'Junior Suite, City View', '1', '1', '144.01', 'USD', '120', '', '', 'Expedia', 'Hotel  Collects', '01855539830', '', NULL, '2024-08-14 02:48:45', '2024-08-27 05:24:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'single', 'Md Gias Uddin', '299949702', 'Canceled', '15-08-2024', '16-08-2024', '14-08-2024', 'Nazimgarh Garden Resort', 'Partho Ghosh', 'Executive Room, Garden View', '1', '1', '212.40', 'USD', '120', '', '', 'Expedia', 'Hotel  Collects', 'N/A', '', NULL, '2024-08-14 02:50:34', '2024-08-17 08:27:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'single', 'Md Gias Uddin', '299953013', 'Canceled', '15-08-2024', '16-08-2024', '14-08-2024', 'Eque Heritage Hotel & Resort', 'Rayhan Khan', 'Family Suite', '1', '1', '71.40', 'USD', '120', '', '', 'Expedia', 'Hotel  Collects', 'N/A', '', NULL, '2024-08-14 02:51:46', '2024-08-17 08:29:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'single', 'Md Gias Uddin', '4583846707', 'No Show', '15-08-2024', '16-08-2024', '03-07-2024', 'Ocean Palace Cox\'sBazar', 'Ariful Islam', 'Deluxe Quadruple Room', '7', '1', '350.67', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '8801840017027', '', NULL, '2024-08-15 05:14:31', '2024-08-17 03:49:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'single', 'Md Gias Uddin', '4830325008', 'No Show', '16-08-2024', '18-08-2024', '15-08-2024', 'Hotel de Crystal Crown', 'Sugih Purwanto', 'Deluxe Double Room', '1', '2', '137.47', 'USD', '120.00', '', '', 'Booking.com', 'Hotel  Collects', '+62 2035640799', '', NULL, '2024-08-15 05:15:54', '2024-08-17 03:55:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'single', 'Md Gias Uddin', '4620832833', NULL, '12-10-2024', '13-10-2024', '14-08-2024', 'Wood Burn Hotel', 'SACHIKO KUNIMATSU', 'Single Room with Private Bathroom', '1', '1', '25.16', 'USD', '118.25', '', '', 'Booking.com', 'Hotel  Collects', '+81 20 3564 0799', 'Japanes Guest, LargeBed, NonSmoke', NULL, '2024-08-15 05:19:42', '2024-08-15 05:20:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'single', 'Md Gias Uddin', '300540422', 'No Show', '16-08-2024', '17-08-2024', '14-08-2024', 'White House Resort', 'Samad Sabbir', ' Deluxe Quadruple Room', '1', '1', '175.49', 'USD', '120', '', '', 'Expedia', 'Hotel  Collects', '0-8801755520060', '', NULL, '2024-08-15 05:32:10', '2024-08-17 08:31:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'single', 'Md Gias Uddin', '4640686566', 'Checked In', '16-08-2024', '17-08-2024', '16-08-2024', 'Eque Heritage Hotel & Resort', 'Abid Hasan', 'Deluxe Double Room with Balcony (Couple Deluxe)', '1', '1', '49.18', 'USD', '118.25', '', '', 'Booking.com', 'Hotel  Collects', '+880 1736 292904', '', NULL, '2024-08-17 03:54:34', '2024-08-17 03:54:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'single', 'Md Gias Uddin', '4501253212', 'No Show', '18-08-2024', '20-08-2024', '17-08-2024', 'Hotel de Crystal Crown', 'Rinda Lestari', 'Deluxe Double Room', '1', '2', '137.47', 'USD', '118.25', '', '', 'Booking.com', 'Hotel  Collects', '+62 2035640799', '', NULL, '2024-08-17 03:58:02', '2024-08-19 04:07:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'single', 'Md Gias Uddin', '4738455580', NULL, '29-08-2024', '30-08-2024', '16-08-2024', 'Wood Burn Hotel', 'Md Jubayer Rahman', 'Superior Twin Room with City View', '1', '1', '33.67', 'USD', '118.25', '', '', 'Booking.com', 'Hotel  Collects', '+601174429679', '', NULL, '2024-08-17 04:28:07', '2024-08-17 04:28:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'single', 'Md Gias Uddin', '301746688', 'No Show', '18-08-2024', '19-08-2024', '16-08-2024', 'Hotel Razmoni Isha Kha International', 'Badhon Biswas', 'Deluxe Double or Twin Room, City View', '1', '1', '99.00', 'USD', '118.25', '', '', 'Expedia', 'Hotel  Collects', '8801755520060', '', NULL, '2024-08-17 04:31:16', '2024-08-19 04:17:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 'single', 'Md Gias Uddin', '4343347619', 'Checked In', '17-08-2024', '18-08-2024', '17-08-2024', 'Wood Burn Hotel', 'nilufar yesmin', 'Deluxe Triple Room', '1', '1', '36.70', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+880 1937 112857', '', NULL, '2024-08-17 09:25:32', '2024-08-18 03:48:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 'single', 'Md Gias Uddin', '4673803232', 'No Show', '18-08-2024', '19-08-2024', '17-08-2024', 'Hotel de Crystal Crown', 'indah riana', 'Deluxe Single Room', '8', '1', '456.68', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+66 2035640799', '', NULL, '2024-08-17 09:28:40', '2024-08-19 04:07:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'single', 'Md Gias Uddin', '302354310', 'No Show', '19-08-2024', '20-08-2024', '17-08-2024', 'Nazimgarh Garden Resort', 'Masnun Sheikh', 'Executive Room, Garden View', '1', '1', '212.40', 'USD', '120', '', '', 'Expedia', 'Hotel  Collects', '0-8801755520060', '', NULL, '2024-08-18 03:53:10', '2024-08-19 08:42:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'single', 'Md Gias Uddin', '4300567973', 'No Show', '22-08-2024', '24-08-2024', '18-08-2024', 'Hotel de Crystal Crown', 'Asep Suhanda', 'Deluxe Double Room', '1', '2', '137.47', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+62 2035640799', '', NULL, '2024-08-18 05:00:45', '2024-08-24 03:54:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 'single', 'Md Gias Uddin', '4313402254', 'No Show', '23-08-2024', '24-08-2024', '18-08-2024', 'Wood Burn Hotel', 'zaminur Rahman', 'Superior Twin Room with City View', '1', '1', '33.67', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+880 1610 905640', '', NULL, '2024-08-19 04:11:15', '2024-08-24 04:02:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 'single', 'Md Gias Uddin', '294410056', 'No Show', '24-08-2024', '25-08-2024', '06-08-2024', 'Seagull Hotels Ltd.', 'Nelly Noambe', 'Standard Double Room, 1 Double Bed, Non Smoking, Bay View', '1', '1', '69.58', 'USD', '120', '', '', 'Expedia', 'Hotel  Collects', ' 0-880156522456', ' 2 adults, 1 Double Bed, Non-smoking', NULL, '2024-08-19 04:23:04', '2024-08-27 05:19:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 'single', 'Md Gias Uddin', '4470282192', NULL, '20-08-2024', '21-08-2024', '17-08-2024', 'Seagull Hotels Ltd.', 'shahid hasan', 'Standard Double Room (Regular Hill Side Room)', '1', '1', '51.86', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+880 1787 815009', 'Approximate arrival time,  Between 12:00 AM and 1:00 AM. Total guests:  2  ', NULL, '2024-08-20 04:08:58', '2024-08-20 04:08:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'single', 'Md Gias Uddin', '4810276377', 'No Show', '27-08-2024', '28-08-2024', '20-08-2024', 'Ocean Palace Cox\'sBazar', 'MD IBRAHIM KHALIL', 'Deluxe Double Room', '1', '2', '64.66', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+880 1603 894735', '', NULL, '2024-08-21 04:07:50', '2024-08-28 03:45:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 'single', 'Md Gias Uddin', '4703636954', 'No Show', '23-08-2024', '24-08-2024', '21-08-2024', 'Eque Heritage Hotel & Resort', 'Md Jamil Hossen', 'Twin Room with View (Twin Deluxe)', '1', '1', '38.94', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', 'mhosse.602867@guest.booking.com', '', NULL, '2024-08-21 04:09:44', '2024-08-25 08:43:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 'single', 'Md Gias Uddin', '4367656936', 'No Show', '23-08-2024', '24-08-2024', '21-08-2024', 'Hotel de Crystal Crown', 'Ade Ningsih', 'Deluxe Double Room', '9', '1', '556.75', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+62 2035640799', '', NULL, '2024-08-22 04:04:55', '2024-08-24 03:55:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 'single', 'Md Gias Uddin', '4932703286', 'No Show', '23-08-2024', '24-08-2024', '22-08-2024', 'Wood Burn Hotel', 'zaminur Rahman ', 'Deluxe Double Room', '1', '1', '34.60', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+880 1610 905640', ' Please call this number for confirmed this booking:  01770166898', NULL, '2024-08-22 08:23:37', '2024-08-24 04:02:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 'single', 'Md Gias Uddin', '4741726362', 'No Show', '26-08-2024', '28-08-2024', '23-08-2024', 'Hotel de Crystal Crown', ' Abigail Nadine', 'Superior Double Room', '1', '2', '151.45', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+62 2035640799', '', NULL, '2024-08-24 04:00:06', '2024-08-27 05:03:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 'single', 'Md Gias Uddin', '306378089', NULL, '14-02-2025', '20-02-2025', '23-08-2024', 'Hotel Studio 23', 'Malcolm Farnsworth', 'Superior Double Room, 1 King Bed', '1', '6', '351.00', 'USD', '120', '', '', 'Expedia', 'Hotel  Collects', '+1 650-388-8555', '', NULL, '2024-08-24 04:04:59', '2024-08-24 04:05:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 'single', 'Md Gias Uddin', '4454801038', NULL, '01-09-2024', '03-09-2024', '24-08-2024', 'Seagull Hotels Ltd.', 'Md Saifullah Monchi', 'Deluxe Room (Deluxe Hill Side Room)', '1', '2', '107.02', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+61 431428441', 'Approximate arrival time  Between 12:00 PM and 1:00 PM', NULL, '2024-08-24 04:14:20', '2024-08-24 04:14:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 'single', 'Md Gias Uddin', '4790622089', NULL, '31-08-2024', '02-09-2024', '24-08-2024', 'Seagull Hotels Ltd.', 'Md Mahobul Islam', 'Deluxe Room (Deluxe Sea Side Room)', '1', '2', '145.47', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+880 1720 088412', '', NULL, '2024-08-24 09:51:12', '2024-08-24 09:51:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 'single', 'Md Gias Uddin', '4816205087', NULL, '26-03-2025', '28-03-2025', '24-08-2024', 'Hotel Royal Raj International', 'Naomi Nakajima', 'Superior Double Room', '1', '2', '177.61', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+81 90 1772 3355', 'Total guests:  2', NULL, '2024-08-25 08:48:25', '2024-08-28 03:51:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 'single', 'Md Gias Uddin', '4508803556', NULL, '15-10-2024', '18-10-2024', '24-08-2024', 'Seagull Hotels Ltd.', 'Md. Bazlul Ghani Abu Sama', 'Deluxe Room (Deluxe Hill Side Room)', '1', '3', '169.64', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+880 1716 666460', 'Total guests:  2', NULL, '2024-08-25 08:57:29', '2024-08-25 08:57:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 'single', 'Md Gias Uddin', '4499938115', NULL, '31-08-2024', '02-09-2024', '25-08-2024', 'Ocean Palace Cox\'sBazar', 'Ehsan Khan', 'Deluxe Double Room', '1', '2', '77.59', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+65 1686826564', '', NULL, '2024-08-26 05:15:50', '2024-08-26 05:15:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 'single', 'Md Gias Uddin', '307912895', 'Canceled', '30-08-2024', '10-09-2024', '26-08-2024', 'Eque Heritage Hotel & Resort', 'Jae Hyup Yoon', 'Deluxe Single Room ', '1', '11', '251.35', 'USD', '113', '251.35', 'USD', 'Expedia', 'Expedia Collects', '+44 20 3929 3737', '1 Large Twin Bed, Smoking. They Already Paid Us. Obeo will Pay.', NULL, '2024-08-26 05:22:27', '2024-08-26 08:36:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 'single', 'Md Gias Uddin', '307912913', 'Canceled', '30-08-2024', '10-09-2024', '26-08-2024', 'Eque Heritage Hotel & Resort', 'Yongquan Jin', 'Deluxe Single Room ', '1', '11', '251.35', 'USD', '113', '251.35', 'USD', 'Expedia', 'Expedia Collects', '+44 20 3929 3737', '1 Large Twin Bed, Smoking. They Already Paid Us. Obeo will Pay.', NULL, '2024-08-26 05:28:05', '2024-08-26 08:36:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 'single', 'Md Gias Uddin', '4499955080', NULL, '06-10-2024', '08-10-2024', '26-08-2024', 'Seagull Hotels Ltd.', 'ABUL KASHEM', 'Standard Double Room (Regular Sea Side Room)', '1', '2', '97.91', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+358 41 3144559', 'I am from Finland, and this is my first time visiting Cox\'s Bazaar. I would like to request a room with a sea view and on a higher floor.', NULL, '2024-08-26 08:39:40', '2024-08-26 08:40:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 'single', 'Md Gias Uddin', '4493553649', NULL, '28-08-2024', '30-08-2024', '26-08-2024', 'La Sky Dhaka', 'Abbas Nurochman', 'Executive Suite', '1', '2', '74.56', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+62 2035640799', '', NULL, '2024-08-27 04:59:46', '2024-08-27 04:59:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 'single', 'Md Gias Uddin', '4771051593', NULL, '28-08-2024', '30-08-2024', '26-08-2024', 'Hotel de Crystal Crown', 'Abdul Ghofur', 'Deluxe Double Room', '1', '2', '137.47', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+62 2035640799', '', NULL, '2024-08-27 05:02:43', '2024-08-27 05:02:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 'single', 'Md Gias Uddin', '4874743250', NULL, '29-08-2024', '31-08-2024', '27-08-2024', 'La Sky Dhaka', 'Deden Iskandar', 'Executive Suite', '1', '2', '74.56', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+62 2035640799', '', NULL, '2024-08-27 05:14:55', '2024-08-27 05:14:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 'single', 'Md Gias Uddin', '4766119332', NULL, '28-08-2024', '29-08-2024', '28-08-2024', 'La Sky Dhaka', 'Anwar Hossain', 'Executive Suite', '1', '1', '37.28', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+880 1727 723247', '', NULL, '2024-08-28 03:48:17', '2024-08-28 03:48:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 'single', 'Md Gias Uddin', '4704801033', NULL, '30-08-2024', '31-08-2024', '28-08-2024', 'La Sky Dhaka', 'Ikka Lestari', 'Executive Suite', '1', '1', '37.28', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+62 2035640799', '', NULL, '2024-08-28 03:55:16', '2024-08-28 03:55:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 'single', 'Md Gias Uddin', '308832161', NULL, '28-08-2024', '29-08-2024', '27-08-2024', 'Nagar Valley Hotel Ltd', 'Md Razu Ahmed', 'Standard Double or Twin Room', '1', '1', '19.06', 'USD', '113', '113', 'USD', 'Expedia', 'Expedia Collects', '+880 1977-767380', 'Guest count 2 adults', NULL, '2024-08-28 03:58:28', '2024-08-28 03:58:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 'single', 'Md Gias Uddin', '4936472502', NULL, '29-08-2024', '30-08-2024', '28-08-2024', 'Hotel de Crystal Crown', 'Bang Bangor', 'Superior Double Room', '2', '1', '151.45', 'USD', '120', '', '', 'Booking.com', 'Hotel  Collects', '+62 2035640799', '', NULL, '2024-08-28 08:15:32', '2024-08-28 08:15:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `source`
--

CREATE TABLE `source` (
  `id` int(11) NOT NULL,
  `source` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `source`
--

INSERT INTO `source` (`id`, `source`, `created_at`, `updated_at`) VALUES
(3, 'Booking.com', '2024-06-10 04:44:29', '2024-06-10 04:44:29'),
(4, 'Expedia', '2024-06-10 04:44:39', '2024-06-10 04:44:39'),
(5, 'Airbnb', '2024-06-10 04:44:47', '2024-06-10 04:44:47'),
(6, 'Ctrip.com', '2024-06-10 04:45:02', '2024-06-10 04:45:02'),
(7, 'Makemytrip.com', '2024-06-10 04:45:13', '2024-06-10 04:45:13'),
(8, 'Direct Booking', '2024-06-10 04:45:26', '2024-06-10 04:45:26');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'No Show', '2024-07-22 11:03:01', '2024-07-22 11:03:01'),
(2, 'Checked In', '2024-07-22 11:03:44', '2024-07-22 11:03:44'),
(3, 'Canceled', '2024-07-22 11:03:57', '2024-07-22 11:03:57'),
(4, 'Charged', '2024-08-12 04:04:18', '2024-08-12 04:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `position` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `phone`, `position`, `password`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Rakib Gazi', 'obeo', 'webobeorooms@gmail.com', '01876987622', 'Senior Executive', 'Pass@12345', 'images/profile/gazi.png', '2024-05-13 12:41:17', '2024-07-22 06:20:05'),
(2, 'Md Gias Uddin', 'g4gias', 'g4gias@gmail.com', '01810004180', 'CEO', 'Pass@12345', 'images/profile/Gias_Anondo Color_May23 (2).jpg', '2024-05-14 12:30:18', '2024-07-22 06:07:52'),
(4, 'Ruqaiyah', '', 'rukiah@gmail.com', '01234567891', 'Senior Executive', 'Pass@12345', NULL, '2024-07-25 09:43:51', '2024-07-25 09:43:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advance_currency`
--
ALTER TABLE `advance_currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_invoice`
--
ALTER TABLE `bank_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_name`
--
ALTER TABLE `hotel_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `source`
--
ALTER TABLE `source`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advance_currency`
--
ALTER TABLE `advance_currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank_invoice`
--
ALTER TABLE `bank_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hotel_name`
--
ALTER TABLE `hotel_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `source`
--
ALTER TABLE `source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
