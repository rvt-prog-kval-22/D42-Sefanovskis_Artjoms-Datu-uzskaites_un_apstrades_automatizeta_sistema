-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 11:36 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tgl`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `car_owner_id` int(11) NOT NULL,
  `car_producer` varchar(255) DEFAULT 'unknown',
  `car_model` varchar(255) DEFAULT 'unknown',
  `car_number_sign` varchar(10) NOT NULL,
  `car_year` int(4) DEFAULT NULL,
  `car_color` varchar(255) DEFAULT 'unknown',
  `car_interior_material` varchar(255) DEFAULT 'unknown',
  `car_details` text DEFAULT 'Not mentioned'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_owner_id`, `car_producer`, `car_model`, `car_number_sign`, `car_year`, `car_color`, `car_interior_material`, `car_details`) VALUES
(1, 8, 'BMW', 'model 5', 'AA-1111', 2015, 'yellow', 'leather', 'Not mentioned'),
(2, 8, 'Tesla', 'Model S', 'BB-2222', 2019, 'White', 'Synthetics', 'The rear passenger window on the left side has cracks.'),
(4, 8, 'Volks Wagen', 'Golf 7', 'CC-3333', 2016, 'Grey', 'Synthetics', 'Not mentioned');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_topic_id` int(11) NOT NULL,
  `comment_user_id` int(11) NOT NULL,
  `comment_rating` int(1) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_date` date NOT NULL,
  `comment_isanonyme` tinyint(1) NOT NULL DEFAULT 0,
  `comment_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_topic_id`, `comment_user_id`, `comment_rating`, `comment_content`, `comment_date`, `comment_isanonyme`, `comment_status`) VALUES
(2, 1, 1, 5, 'Some content', '2022-02-12', 1, 'approve'),
(3, 1, 3, 4, 'asdfasfd', '2022-02-12', 1, 'draft'),
(4, 1, 2, 4, 'aaaaaaaaaaaaa', '2022-02-12', 0, 'approve'),
(5, 3, 3, 5, 'review', '2022-02-12', 0, 'draft'),
(6, 1, 3, 3, 'This is some review', '2022-02-13', 0, 'approve'),
(7, 1, 4, 5, 'Another review', '2022-02-13', 0, 'approve'),
(8, 4, 2, 4, 'asdfffffffffffff', '2022-02-13', 0, 'approve'),
(9, 6, 5, 2, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2022-02-13', 1, 'draft'),
(10, 3, 1, 1, 'aaaaaaaaaaa', '2022-02-13', 0, 'approve'),
(11, 6, 1, 5, 'a', '2022-02-13', 0, 'approve'),
(12, 3, 1, 3, 'aaaaaaaaaaaaaaaaa', '2022-02-14', 1, 'approve'),
(22, 1, 4, 5, 'This is another one review', '2022-02-14', 1, 'deny'),
(23, 3, 8, 5, '1', '2022-02-21', 0, 'deny'),
(24, 1, 8, 5, 'abc', '2022-02-21', 0, 'approve'),
(25, 1, 8, 5, 'aaa', '2022-02-21', 0, 'deny'),
(26, 1, 8, 5, 'bababababababa', '2022-02-22', 0, 'deny');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_user_id` int(11) NOT NULL,
  `order_service_id` int(11) NOT NULL,
  `order_car_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_appointment_date` date NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_completion_date` date DEFAULT NULL,
  `order_end_price` int(11) DEFAULT NULL,
  `order_date_of_payment` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_user_id`, `order_service_id`, `order_car_id`, `order_date`, `order_appointment_date`, `order_status`, `order_completion_date`, `order_end_price`, `order_date_of_payment`) VALUES
(1, 8, 3, 1, '2022-02-21', '2022-02-22', 'recieved', NULL, NULL, NULL),
(2, 8, 3, 4, '2022-02-21', '2022-02-23', 'completed', '2022-02-22', 500, '2022-02-23'),
(3, 8, 3, 4, '2022-02-22', '2022-02-23', 'canceled', NULL, NULL, NULL),
(4, 8, 3, 4, '2022-02-23', '2022-02-23', 'in progress', NULL, NULL, NULL),
(5, 8, 3, 4, '2022-02-24', '2022-02-24', 'waiting for payment', '2022-02-24', 550, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_report`
--

CREATE TABLE `order_report` (
  `report_id` int(11) NOT NULL,
  `report_order_id` int(11) NOT NULL,
  `report_text` text NOT NULL,
  `report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_title` varchar(255) NOT NULL,
  `service_price` int(11) NOT NULL,
  `service_hours` int(11) NOT NULL,
  `service_review_count` int(11) NOT NULL DEFAULT 0,
  `service_rating` float NOT NULL DEFAULT 0,
  `service_description` text NOT NULL,
  `service_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_title`, `service_price`, `service_hours`, `service_review_count`, `service_rating`, `service_description`, `service_image`) VALUES
(1, 'General', 0, 0, 0, 0, 'null', 'null'),
(3, 'Package 2', 1000, 45, 1, 3.445, 'It’s polishing your car that actually sorts out issues in the paint, removes scratches, brightens up dull or faded paintwork, gets rid of swirl marks, oxidation and other contaminants and leaves the paint smooth, clean and shiny.', '1package-img.jpg'),
(4, 'Package 1', 500, 30, 5, 5, 'Alloy safe clean. Premium snow foam & rinse. Safe Wash with sheep mitts (3 bucket). Rinse. Drying with air and drying towels. Decontamination with chemical (Silicon, glue, tar removal). Decontamination with chemical (Iron removal). Clay bar with premium clay that is suitable for your car paint. One more Safe Wash with sheep mitts (2 bucket). Drying with air and drying towels. Masking with premium masking tape to protect exterior elements from damages. Chrome polishing. Car paint thickness 80 point check (File with “Precheck measurements” will be available for you here). Single stage machine polishing process with 90 days protective polymer sealant. Car paint thickness 80 point check (File with “After check measurements” will be available for you here). Full valet (If you are lucky pet owner please choose our Basic Glow Pet package instead as we will need more time to clean your car from the inside). Tyre Dressing. Rain repellent application. Aircon and interior disinfection. Terms & Conditions Apply\r\n\r\n  ', '1package-img.jpg'),
(6, 'Package 1', 500, 30, 5, 5, 'Alloy safe clean. Premium snow foam & rinse. Safe Wash with sheep mitts (3 bucket). Rinse. Drying with air and drying towels. Decontamination with chemical (Silicon, glue, tar removal). Decontamination with chemical (Iron removal). Clay bar with premium clay that is suitable for your car paint. One more Safe Wash with sheep mitts (2 bucket). Drying with air and drying towels. Masking with premium masking tape to protect exterior elements from damages. Chrome polishing. Car paint thickness 80 point check (File with “Precheck measurements” will be available for you here). Single stage machine polishing process with 90 days protective polymer sealant. Car paint thickness 80 point check (File with “After check measurements” will be available for you here). Full valet (If you are lucky pet owner please choose our Basic Glow Pet package instead as we will need more time to clean your car from the inside). Tyre Dressing. Rain repellent application. Aircon and interior disinfection. Terms & Conditions Apply\r\n\r\n  ', '1package-img.jpg'),
(7, 'Package 1', 500, 30, 5, 3.6666, 'Alloy safe clean. Premium snow foam & rinse. Safe Wash with sheep mitts (3 bucket). Rinse. Drying with air and drying towels. Decontamination with chemical (Silicon, glue, tar removal). Decontamination with chemical (Iron removal). Clay bar with premium clay that is suitable for your car paint. One more Safe Wash with sheep mitts (2 bucket). Drying with air and drying towels. Masking with premium masking tape to protect exterior elements from damages. Chrome polishing. Car paint thickness 80 point check (File with “Precheck measurements” will be available for you here). Single stage machine polishing process with 90 days protective polymer sealant. Car paint thickness 80 point check (File with “After check measurements” will be available for you here). Full valet (If you are lucky pet owner please choose our Basic Glow Pet package instead as we will need more time to clean your car from the inside). Tyre Dressing. Rain repellent application. Aircon and interior disinfection. Terms & Conditions Apply\r\n\r\n', '1package-img.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first` varchar(255) NOT NULL,
  `user_last` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` int(8) NOT NULL,
  `user_phone_code` int(11) NOT NULL,
  `user_role` varchar(255) NOT NULL DEFAULT 'user',
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first`, `user_last`, `user_email`, `user_phone`, `user_phone_code`, `user_role`, `user_password`) VALUES
(1, 'Lorem', 'Ipsum', 'ipsum@mail.com', 23323232, 371, 'user', 'password'),
(2, 'John', 'Doe', 'doe@mail.com', 89298292, 372, 'user', '1'),
(3, 'Mary', 'Loe', 'loe@mail.com', 23984539, 373, 'admin', 'password'),
(4, 'Garry', 'Goe', 'garry@mail.com', 12345678, 123, 'user', '11111111111111111111'),
(7, 'Lorem', 'Ipsum', 'ipsum@mail.com', 23323232, 371, 'user', 'password'),
(8, 'Joe', 'Mann', 'j@mail.com', 1111111, 1, 'admin', '1'),
(9, 'Lo', 'Loen', 'l@mail.com', 12345678, 123, 'user', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_report`
--
ALTER TABLE `order_report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_report`
--
ALTER TABLE `order_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
