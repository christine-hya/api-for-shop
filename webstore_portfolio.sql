-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2021 at 02:01 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webstore_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cartId` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `price` decimal(10,2) DEFAULT NULL,
  `image` text,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cartId`, `orderId`, `slug`, `title`, `description`, `price`, `image`, `userId`) VALUES
(1, 4, 'interaction-design', 'Interaction design', 'Design and development of learning interactions', '5000.00', 'http://localhost/api-for-shop/api/v1/pages/images/interaction-development.jpg', 1),
(5, 1, 'single-page-website', 'Single-page website', 'Design and development only', '11000.00', 'http://localhost/api-for-shop/api/v1/pages/images/web-development-frontend.jpg', NULL),
(9, 1, 'single-page-website', 'Single-page website', 'Design and development only', '11000.00', 'http://localhost/api-for-shop/api/v1/pages/images/web-development-frontend.jpg', 1),
(12, 3, 'online-course-development', 'Online course development', 'Layout, design, development and structure for an online learning experience', '20000.00', 'http://localhost/api-for-shop/api/v1/pages/images/elearning-course-layout.jpg', 1),
(13, 3, 'online-course-development', 'Online course development', 'Layout, design, development and structure for an online learning experience', '20000.00', 'http://localhost/api-for-shop/api/v1/pages/images/elearning-course-layout.jpg', 1),
(14, 1, 'single-page-website', 'Single-page website', 'Design and development only', '11000.00', 'http://localhost/api-for-shop/api/v1/pages/images/web-development-frontend.jpg', 2),
(18, 2, 'full-website-package', 'Full website package', 'Including development, design and content creation (logo design, copy, stock photos) ', '20000.00', 'http://localhost/api-for-shop/api/v1/pages/images/web-development-full-stack.jpg', 2),
(21, 3, 'online-course-development', 'Online course development', 'Layout, design, development and structure for an online learning experience', '20000.00', 'http://localhost/api-for-shop/api/v1/pages/images/elearning-course-layout.jpg', 2),
(24, 4, 'interaction-design', 'Interaction design', 'Design and development of learning interactions', '5000.00', 'http://localhost/api-for-shop/api/v1/pages/images/interaction-development.jpg', 2),
(25, 1, 'single-page-website', 'Single-page website', 'Design and development only', '11000.00', 'http://localhost/api-for-shop/api/v1/pages/images/web-development-frontend.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(11) NOT NULL,
  `categories` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categories`) VALUES
(1, 'elearning'),
(2, 'websites');

-- --------------------------------------------------------

--
-- Table structure for table `contactdetails`
--

CREATE TABLE `contactdetails` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contactdetails`
--

INSERT INTO `contactdetails` (`id`, `name`, `surname`, `email`, `message`) VALUES
(1, 'test', 'ltest', 'test@test.com', 'hello'),
(2, 'Christine ', 'Hogg', 'wordsbychristinehogg@gmail.com', 'helloo'),
(3, 'w', 'w', 'w@email.com', 'test'),
(4, 'Christine ', 'Hogg', 'wordsbychristinehogg@gmail.com', 'hello new'),
(5, 'Christine Hogg', 'Hogg', 'wordsbychristinehogg@gmail.com', 'klkl'),
(6, 'Christine Hogg', 'Hogg', 'wordsbychristinehogg@gmail.com', 'tuiui'),
(7, 'Christine ', 'Hogg', 'wordsbychristinehogg@gmail.com', 'hi'),
(8, 'Christine', 'Hogg', 'wordsbychristinehogg@gmail.com', 'alert'),
(9, 'Christine Hogg', 'Hogg', 'wordsbychristinehogg@gmail.com', 'hjhj'),
(10, 'Christine Hogg', 'Hogg', 'wordsbychristinehogg@gmail.com', 'ghgh'),
(11, 'Christine Hogg', 'Hogg', 'wordsbychristinehogg@gmail.com', 'alert test'),
(12, 'Christine Hogg', 'Hogg', 'wordsbychristinehogg@gmail.com', 'klklklkl');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ordersId` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text,
  `cartItems` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ordersId`, `name`, `surname`, `email`, `message`, `cartItems`) VALUES
(7, 'Christine Hogg', 'H', 'wordsbychristinehogg@gmail.com', 'test', 'Interaction design,Interaction design,Single-page website,Online course development,Online course development,Single-page website,Online course development,Online course development');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `orderid`, `slug`, `title`, `content`) VALUES
(1, 1, '', 'Home', '<p>This is the home page.</p>'),
(2, 2, 'about', 'About Us', '<p>This is the about us page.</p>'),
(3, 3, 'contact', 'Contact Us', '<p>This is the contact us page.</p>'),
(4, 4, 'services', 'Services', '<p>This is the services page.</p>\r\n<ul>\r\n<li>Service One</li>\r\n<li>Service Two</li>\r\n</ul>');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` text NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `orderid`, `slug`, `title`, `description`, `price`, `image`, `categoryId`) VALUES
(1, 1, 'single-page-website', 'Single-page website', 'A clean and concise static website to showcase your project, business or portfolio. Includes custom design, development and populating the site with your content. ', '11000.00', 'http://localhost/api-for-shop/api/v1/pages/images/web-development-frontend.jpg', 2),
(2, 2, 'full-website-package', 'Full website package', 'A professional business website to show customers what you’re all about. Includes custom design and development, as well as copywriting, logo design and visual assets. ', '20000.00', 'http://localhost/api-for-shop/api/v1/pages/images/web-development-full-stack.jpg', 2),
(3, 3, 'online-course-development', 'Online course development', 'Structure, layout and design of an online learning experience. Includes LMS setup, learning interactions and visual assets. ', '22000.00', 'http://localhost/api-for-shop/api/v1/pages/images/elearning-course-layout.jpg', 1),
(4, 4, 'interaction-design', 'Interaction design', 'Design and development of a custom learning interaction to be integrated on your website or online course.', '7000.00', 'http://localhost/api-for-shop/api/v1/pages/images/interaction-development.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(500) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `fname`, `lname`, `email`, `password`, `active`) VALUES
(1, 'admin', 'Test', 'Admin', 'admin@example.com', '$2y$10$AscgUa2U9bHYw43QZoivkupEdmoFXCx.lFiHtYFK0UQ9zgwa7TeFi', 1),
(2, 'test', 'Test', 'Person', 'test@example.com', '$2y$10$fLjo7rTDWk8tMN3yjMxiQuB6k1Hz8aSFDq.ppSHilAobx5lXWeRme', 1),
(27, 'test', 'first', 'last', 'test@email.com', '$2y$10$qRAPJjeJQdsKgUbH1dWu6OuSm4MRAyZ9HbN2wR9CqsQI45PoXh40S', 1),
(51, 'chris', 'Christine', 'Hogg', 'wordsbychristinehogg@gmail.com', '$2y$10$8v8TPQ.maTFFq5d4SUnDruduuQYryvEhq9YpDv9/t.sf/KyJ4pM82', 1),
(100, 'lasttest', 'one', 'two', 'one@email.com', '$2y$10$OFxGxZZLMHkk197c1cUwiulo3aSdwJtyovHEQHRWR6u9cFlaqZsJ.', 1),
(101, 'newuser', 'user', 'h', 'h@h.com', '$2y$10$84FNnKTtwqnkSErpg1mhVuS9.iQscaM/z1xMxoZyU1IbMDHVyjULO', 1),
(102, 'newtest', 'newname', 'h', 'test102@email.com', '$2y$10$yBhqlkY/9YG0b1QOWR5JOuj0Rp4qOr/ndxitJJgHY6LM6i3E3d1za', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`),
  ADD UNIQUE KEY `categoryId` (`categoryId`) USING BTREE;

--
-- Indexes for table `contactdetails`
--
ALTER TABLE `contactdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ordersId`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contactdetails`
--
ALTER TABLE `contactdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ordersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `categoryId` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`categoryId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
