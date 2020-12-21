-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 21, 2020 at 09:03 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `drivejo`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `type` varchar(500) NOT NULL,
  `model` varchar(20) NOT NULL,
  `horsepower` varchar(10) NOT NULL,
  `gear` varchar(10) NOT NULL,
  `power_steering` varchar(10) NOT NULL,
  `central_lock` varchar(10) NOT NULL DEFAULT 'n',
  `remote_key` varchar(10) NOT NULL DEFAULT 'n',
  `smart_remote_key` varchar(10) NOT NULL DEFAULT 'n',
  `chairs` varchar(10) NOT NULL,
  `abs` varchar(10) NOT NULL,
  `ebd` varchar(10) NOT NULL,
  `airbags` varchar(10) NOT NULL,
  `adjust_speed` varchar(20) NOT NULL,
  `acc` varchar(10) NOT NULL,
  `rear_fog_lights` varchar(10) NOT NULL,
  `front_fog_lights` varchar(10) NOT NULL,
  `self_lights` varchar(10) NOT NULL,
  `welcome_lighting_system` varchar(10) NOT NULL,
  `air_conditioning` varchar(10) NOT NULL,
  `rear_air_conditioner` varchar(10) NOT NULL,
  `driving_style` varchar(10) NOT NULL,
  `auto_side_mirrors` varchar(10) NOT NULL,
  `folding_mirrors` varchar(10) NOT NULL,
  `mirror_lighting` varchar(10) NOT NULL,
  `sunroof` varchar(10) NOT NULL,
  `panorama_slot` varchar(10) NOT NULL,
  `metal_wheels` varchar(10) NOT NULL,
  `spare_wheels` varchar(10) NOT NULL,
  `front_sensors` varchar(10) NOT NULL,
  `back_sensors` varchar(10) NOT NULL,
  `auto_wiper` varchar(10) NOT NULL,
  `normal_recorder` varchar(10) NOT NULL,
  `screen_recorder` varchar(10) NOT NULL,
  `back_cam` varchar(10) NOT NULL,
  `bluetooth` varchar(10) NOT NULL,
  `headsets` varchar(10) NOT NULL,
  `navigation` varchar(10) NOT NULL,
  `anti_theft` varchar(10) NOT NULL,
  `price` varchar(50) NOT NULL,
  `image` varchar(5000) NOT NULL,
  `color` blob NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `brand_id`, `type`, `model`, `horsepower`, `gear`, `power_steering`, `central_lock`, `remote_key`, `smart_remote_key`, `chairs`, `abs`, `ebd`, `airbags`, `adjust_speed`, `acc`, `rear_fog_lights`, `front_fog_lights`, `self_lights`, `welcome_lighting_system`, `air_conditioning`, `rear_air_conditioner`, `driving_style`, `auto_side_mirrors`, `folding_mirrors`, `mirror_lighting`, `sunroof`, `panorama_slot`, `metal_wheels`, `spare_wheels`, `front_sensors`, `back_sensors`, `auto_wiper`, `normal_recorder`, `screen_recorder`, `back_cam`, `bluetooth`, `headsets`, `navigation`, `anti_theft`, `price`, `image`, `color`, `size_id`) VALUES
(25, 8, 'G-Class', '', '200', 'auto', 'n', 'n', 'y', 'n', 'n', 'n', 'n', 'n', '', '', '', '', '', '', 'n', '', '', '', '', '', 'n', 'n', 'n', '', '', '', '', '', '', '', '', '', '', '', '21000', 'car2_slide1.jpg', '', 0),
(26, 8, 'x6', '', '', 'manual', '', 'n', 'n', 'n', '', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', '10000', 'car2_slide1.jpg', '', 11),
(31, 4, 'test', '', '', 'auto', '', 'n', 'n', 'n', '', 'on', '', 'on', '', '', '', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'on', '', 'car2_slide1.jpg', '', 0),
(32, 4, 'Niro', '', '', 'auto', '', 'n', 'n', 'n', '', 'on', '', 'on', '', '', '', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'on', '', 'car2_slide1.jpg', '', 0),
(33, 2, 'x7', '2018', '', 'auto', '', 'n', 'n', 'n', '', 'on', '', 'on', '', '', '', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'on', '', 'car2_slide1.jpg', '', 0),
(34, 12, 'x6', '2017', '2500', 'auto', 'n', 'n', 'n', 'y', '2', 'y', 'y', 'on', 'y', 'y', 'y', 'y', 'n', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', '200', 'car2_slide1.jpg', 0xd8a7d8add985d8b1, 0),
(36, 8, 'test', '', '', 'auto', '', 'n', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '19000', 'Untitled-1.jpg', '', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;