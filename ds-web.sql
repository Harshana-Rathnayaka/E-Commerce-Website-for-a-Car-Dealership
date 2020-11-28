--
-- Database: `ds-web`
--
CREATE DATABASE IF NOT EXISTS `ds-web` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ds-web`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `make_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(25,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `vehicle_id`, `make_id`, `quantity`, `total_price`) VALUES
(2, 3, 3, 3, 3, '15000000.00'),
(4, 3, 3, 3, 1, '5000000.00'),
(5, 3, 1, 1, 1, '3500000.00'),
(6, 3, 1, 1, 1, '3500000.00'),
(7, 3, 8, 1, 1, '4500000.00'),
(8, 3, 1, 1, 5, '17500000.00'),
(9, 3, 1, 1, 5, '17500000.00'),
(10, 3, 1, 1, 5, '17500000.00'),
(11, 3, 1, 1, 7, '24500000.00'),
(12, 3, 1, 1, 7, '24500000.00'),
(14, 3, 1, 1, 7, '24500000.00'),
(15, 3, 3, 3, 3, '15000000.00'),
(16, 3, 3, 3, 1, '5000000.00');

-- --------------------------------------------------------

--
-- Table structure for table `colours`
--

DROP TABLE IF EXISTS `colours`;
CREATE TABLE `colours` (
  `id` int(1) NOT NULL,
  `colour` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colours`
--

INSERT INTO `colours` (`id`, `colour`) VALUES
(1, 'Red'),
(2, 'Blue'),
(3, 'Black'),
(4, 'White'),
(5, 'Grey'),
(6, 'Orange');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

DROP TABLE IF EXISTS `manufacturers`;
CREATE TABLE `manufacturers` (
  `make_id` int(1) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`make_id`, `name`, `address`, `email`, `contact`) VALUES
(1, 'Toyota', 'Tokyo, Japan', 'toyotamotors@gmail.com', '0112481458'),
(2, 'Nissan', 'Nipon, Japan', 'nissan@gmail.com', '0112546987'),
(3, 'Mitsubishi', 'Nipon, Japan', 'Mitsubishi@gmail.com', '0112546987'),
(4, 'Tata', 'India', 'tata@gmail.com', '0748545687'),
(5, 'Leyland', 'India', 'leyland@gmail.com', '0112364587'),
(11, 'test', 'test', 'test@gmail.com', '0124578158'),
(12, 'test2', 'kjfvn', 'fkvn@dsv', '0125485697'),
(13, 'BMW', 'Germany', 'bmw@gmail.com', '0121545678'),
(14, 'Ferrari', 'Florence, Italy', 'ferrari@gmail.com', '154584518'),
(15, 'testingman', 'test', 'test@gmail.com', '0124567896');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `make` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `paid_amount` decimal(25,2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `make`, `model`, `quantity`, `paid_amount`, `timestamp`, `order_status`) VALUES
(1, 2, 'Toyota', 'Corolla', 1, '180000.00', '2020-04-18 23:20:55', 0),
(2, 2, 'Nissan', 'Sunny ', 1, '40000.00', '2020-04-18 23:51:34', 0),
(3, 2, 'Nissan', 'Sunny ', 1, '40000.00', '2020-04-18 23:56:41', 0),
(4, 2, 'Mitsubishi', 'Lancer', 1, '150000.00', '2020-04-19 16:35:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transmissions`
--

DROP TABLE IF EXISTS `transmissions`;
CREATE TABLE `transmissions` (
  `id` int(1) NOT NULL,
  `transmission_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transmissions`
--

INSERT INTO `transmissions` (`id`, `transmission_type`) VALUES
(1, 'Manual'),
(2, 'Automatic');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` char(12) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_type` int(1) NOT NULL,
  `user_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `birthday`, `gender`, `username`, `email`, `contact`, `password`, `user_type`, `user_status`) VALUES
(1, 'Admin', 'User', '1995-05-20', 'male', 'admin', 'admin@test.com', '0123654789', '202cb962ac59075b964b07152d234b70', 0, 1),
(2, 'Test', 'User', '1995-06-20', 'male', 'testuser', 'test@gmail.com', '918208791004', '202cb962ac59075b964b07152d234b70', 1, 1),
(3, 'Harshana', 'Rathnayaka', '2000-04-02', 'male', 'adminuser', 'taylor@gmail.com', '914587587965', '9bce9746013d304df7809242df877ff0', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE `vehicles` (
  `vehicle_id` int(11) NOT NULL,
  `make` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  `year` year(4) NOT NULL,
  `engine_capacity` decimal(2,1) NOT NULL,
  `transmission` int(1) NOT NULL,
  `horsepower` int(4) NOT NULL,
  `vehicle_condition` varchar(50) NOT NULL,
  `colour` int(1) NOT NULL,
  `convertible` tinyint(1) NOT NULL DEFAULT '0',
  `seats` int(1) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `in_stock` tinyint(1) NOT NULL DEFAULT '1',
  `image_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `make`, `model`, `year`, `engine_capacity`, `transmission`, `horsepower`, `vehicle_condition`, `colour`, `convertible`, `seats`, `price`, `in_stock`, `image_link`) VALUES
(1, 1, 'Corolla', 2015, '3.0', 2, 200, 'Brand New', 1, 0, 5, '180000.00', 1, '2020041221053614598.jpg'),
(2, 2, 'Sunny ', 2016, '4.0', 2, 500, 'Recondition', 2, 0, 4, '40000.00', 1, '2020041221065455181.jpg'),
(3, 3, 'Lancer', 2018, '7.0', 1, 450, 'Brand New', 3, 0, 2, '160000.00', 1, '2020041221090115711.jpg'),
(8, 1, 'Corolla', 2018, '2.6', 2, 280, 'Brand New', 4, 0, 4, '140000.00', 1, '2020041421122449929.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `make_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `user_id`, `vehicle_id`, `make_id`, `quantity`) VALUES
(12, 1, 8, 1, 1),
(13, 1, 8, 1, 1),
(21, 3, 8, 1, 1),
(27, 2, 1, 1, 1),
(28, 2, 3, 3, 1),
(29, 2, 2, 2, 1),
(30, 2, 1, 1, 2),
(32, 2, 8, 1, 2),
(33, 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_cart_user_id` (`user_id`),
  ADD KEY `fk_cart_vehicle_id` (`vehicle_id`),
  ADD KEY `fk_cart_make_id` (`make_id`);

--
-- Indexes for table `colours`
--
ALTER TABLE `colours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`make_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_orders_user_id` (`user_id`);

--
-- Indexes for table `transmissions`
--
ALTER TABLE `transmissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `fk_make_id` (`make`),
  ADD KEY `fk_colours_id` (`colour`),
  ADD KEY `fk_transmission_id` (`transmission`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_vehicle_id` (`vehicle_id`),
  ADD KEY `fk_wishlist_make_id` (`make_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `colours`
--
ALTER TABLE `colours`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `make_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transmissions`
--
ALTER TABLE `transmissions`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_make_id` FOREIGN KEY (`make_id`) REFERENCES `manufacturers` (`make_id`),
  ADD CONSTRAINT `fk_cart_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_cart_vehicle_id` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`vehicle_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `fk_colours_id` FOREIGN KEY (`colour`) REFERENCES `colours` (`id`),
  ADD CONSTRAINT `fk_make_id` FOREIGN KEY (`make`) REFERENCES `manufacturers` (`make_id`),
  ADD CONSTRAINT `fk_transmission_id` FOREIGN KEY (`transmission`) REFERENCES `transmissions` (`id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_vehicle_id` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`vehicle_id`),
  ADD CONSTRAINT `fk_wishlist_make_id` FOREIGN KEY (`make_id`) REFERENCES `manufacturers` (`make_id`);
