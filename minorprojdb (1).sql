-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2017 at 05:42 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minorprojdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_number` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double NOT NULL,
  `customer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_number` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_number`, `category_name`) VALUES
(1, 'bag'),
(2, 'wallet'),
(3, 'shoes'),
(4, 'jeans'),
(5, 'watch'),
(6, 'short pants'),
(7, 'formal attire'),
(8, 'dress');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_number` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` double NOT NULL,
  `image` longblob NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_number`, `category`, `product_name`, `description`, `stock`, `price`, `image`, `date_time`) VALUES
(16, 1, 'product 1', 'backpack', 19, 1120, 0x62322e6a7067, '2017-12-16 08:21:04'),
(17, 1, 'product 2', 'tote bag, light pink', 0, 1550, 0x62372e6a7067, '2017-12-13 16:25:35'),
(18, 1, 'product 3', 'hand bag, black', 19, 1230, 0x62312e6a7067, '2017-12-16 08:21:05'),
(19, 1, 'product 4', 'tote bag, black and pink', 20, 3180, 0x62382e6a7067, '2017-12-16 07:26:01'),
(20, 1, 'product 5', 'backpack, red', 20, 3220, 0x62332e6a7067, '2017-12-16 07:25:23'),
(21, 6, 'product 6', 'cyclings', 20, 1250, 0x77382e6a7067, '2017-12-16 07:25:57'),
(22, 3, 'product 7', 'rubber shoes', 20, 2150, 0x64322e6a7067, '2017-12-16 07:25:54'),
(23, 4, 'product 8', 'denim', 19, 1560, 0x6d352e6a7067, '2017-12-16 08:21:05'),
(24, 7, 'product 9', 'gray tuxedo', 20, 5250, 0x626f745f322e6a7067, '2017-12-16 07:25:47'),
(25, 8, 'product 10', 'floral', 20, 3410, 0x6e312e6a7067, '2017-12-16 07:25:43'),
(26, 5, 'product 11', 'silver, class A', 20, 5230, 0x6d372e6a7067, '2017-12-16 07:25:30'),
(27, 5, 'product 12', 'gold with silver', 20, 3700, 0x77362e6a7067, '2017-12-16 07:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `r_number` int(11) NOT NULL,
  `r_customer` varchar(255) NOT NULL,
  `r_product` varchar(255) NOT NULL,
  `r_quantity` varchar(225) NOT NULL,
  `r_price` varchar(225) NOT NULL,
  `r_total` double NOT NULL,
  `r_date_from` date NOT NULL,
  `r_date_to` date NOT NULL,
  `status` enum('finished','unfinished','expired') NOT NULL,
  `date_finished` date NOT NULL,
  `person_in_charge` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`r_number`, `r_customer`, `r_product`, `r_quantity`, `r_price`, `r_total`, `r_date_from`, `r_date_to`, `status`, `date_finished`, `person_in_charge`) VALUES
(1, 'syra', 'product 1', '1', '1120', 1120, '2017-12-08', '2017-12-15', 'expired', '0000-00-00', ''),
(3, 'cherry', 'product 8', '1', '1560', 1560, '2017-12-12', '2017-12-19', 'finished', '2017-12-14', 'danielle'),
(4, 'cherry', 'product 11', '1', '5230', 5230, '2017-12-12', '2017-12-19', 'unfinished', '0000-00-00', ''),
(7, 'cherry', 'product 6<br>product 7', '1<br>1', '1250<br>2150', 3400, '2017-12-12', '2017-12-19', 'finished', '2017-12-19', 'danielle'),
(9, 'jobecar', 'product 2', '1', '1550', 1550, '2017-12-13', '2017-12-20', 'unfinished', '0000-00-00', ''),
(10, 'sungjae_baby', 'product 1', '2', '1120', 2240, '2017-12-16', '2017-12-23', 'unfinished', '0000-00-00', ''),
(11, 'sungjae_baby', 'product 5', '3', '3220', 9660, '2017-12-16', '2017-12-23', 'finished', '2017-12-16', 'danielle'),
(12, 'test', 'product 1<br>product 8<br>product 3', '1<br>1<br>1', '1120<br>1560<br>1230', 3910, '2017-12-16', '2017-12-23', 'finished', '2017-12-16', 'danielle');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(80) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('male','female','others','') NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('admin','customer','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `age`, `gender`, `email`, `mobile_number`, `address`, `username`, `password`, `user_type`) VALUES
(1, 'Danielle Umbay', 20, 'male', 'danielle@gmail.com', '09227810339', 'Km. 14 Panacan, Davao City', 'danielle', 'daniellepass', 'admin'),
(2, 'Jhon Lauderis', 20, 'male', 'jdlu@gmail.com', '091080927212', 'Bajada, Davao City', 'jhon', 'jhonpass', 'admin'),
(3, 'Cherry Pearl', 19, 'male', 'cheche@gmail.com', '09123768721', 'Sta. Cruz, Davao del Sur', 'cherry', 'cherrypass', 'customer'),
(4, 'Syralynn Espena', 20, 'female', 'syra@gmail.com', '09234767959', 'Boulevard, davao city', 'syra', 'syrapass', 'customer'),
(5, 'Frietche Canete', 21, 'female', 'frietche@gmail.com', '09397328678', 'Tandag city, Surigao del Sur', 'frietche', 'frietchepass', 'customer'),
(6, 'Jobecar federe', 19, 'female', 'job@gamil.com', '0934283973', 'Matina Davao', 'jobecar', 'jobecarpass', 'customer'),
(7, 'Iris Adlawan', 22, 'female', 'iris@gmail.com', '09123123778', 'Matina, Davao City', 'iris', 'irispass', 'customer'),
(8, 'Yook Sung Jae', 22, 'male', 'sungjae@gmail.com', '09123456789', 'Pyongyang, North Korea', 'sungjae_baby', '123password', 'customer'),
(9, 'Airhon Cortez', 20, 'male', 'airhon@yahoo.com', '09503504109', 'Caloocan City', 'airhon', 'syralynn', 'admin'),
(10, 'Pearl Fajardo', 19, 'female', 'pearl@hotmail.com', '091276563457', 'LA, USA', 'pearl', 'pearlpass', 'admin'),
(11, 'Test', 20, 'male', 'test@gmail.com', '08978968768', 'test', 'test', 'testtest', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_number`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_number`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`r_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `r_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`category_number`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
