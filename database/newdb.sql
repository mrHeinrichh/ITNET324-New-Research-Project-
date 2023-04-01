-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 04:59 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `complainants`
--

CREATE TABLE `complainants` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `street` varchar(255) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=unverified,1=verified',
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complainants`
--

INSERT INTO `complainants` (`id`, `name`, `address`, `street`, `contact`, `status`, `email`, `password`, `image`) VALUES
(1, 'Claire Blake', 'Sample', '', '+18456-5455-55', 1, 'cblake@sample.com', '4744ddea876b11dcb1d169fadf494418', ''),
(2, 'resident', 'South Signal Village', '', '09094448885', 1, 'resident@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(3, 'mama', 'mama', '', '22222222', 1, 'mama@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(4, 'John GASGASGAGA', 'sadawsd', '', '21312312', 1, 'resident@gmail.cum', 'ee53d978662468c05aefe2c454b29b31', ''),
(5, 'Marivic Madrid', 'South Signal Village, Taguig City', '', '123123123', 1, 'marivic@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', ''),
(6, 'Marivic Madrid', 'South Signal Village, Taguig City', '', '123123123', 1, 'marivics@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', ''),
(7, 'qweqweqwesss', 'qweqweqwesss', '', '1121212', 1, 'resa@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(8, 'lalala', 'lalalamove', '', '02020202', 1, 'lalalassz@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', ''),
(9, 'RenzocccCabaRio$ZZSZ', 'asdlkhjgaslhkfkabsd', '', '095069749935', 1, 'resident@gmail.cumz', '4297f44b13955235245b2497399d7a93', ''),
(10, '', '', '', '', 1, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(11, 'Kyla Bandelaria', '12312assdasdas', '', '21312312', 1, 'nazareth@gmail.cum', '4297f44b13955235245b2497399d7a93', ''),
(12, 'engelbert', '123 wasd', '', '0912312', 1, 'engelbert@gmail.cum', '4297f44b13955235245b2497399d7a93', ''),
(13, 'John Heinrich Fabros', '2183s asdasd', '', '21312312', 1, 'john@gmail.casdum', '4297f44b13955235245b2497399d7a93', ''),
(14, 'Jaci Ardales', '123 asdaw', '', '12312421', 1, 'jaci@gmail.com', '4297f44b13955235245b2497399d7a93', ''),
(15, 'REmedioszzz', '123 asdasd', '', '0910239213', 0, 'remedios@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(16, 'cathy', '1234qwdas', '', '12312312', 1, 'cathy@gmail.casdum', '', ''),
(17, 'jairah', 'jasied123', '', '123123', 1, 'jairah@gmail.com', '4297f44b13955235245b2497399d7a93', ''),
(18, 'sowenz', 's123sad', '', '1232', 1, 'sowens@gmail.com', '4297f44b13955235245b2497399d7a93', ''),
(19, 'ronald', '123asd asdaw', '', '213123123', 0, 'ronald@gmail.com', '4297f44b13955235245b2497399d7a93', ''),
(20, 'joleng', '1231 sadawd', 'Visayas', '12312341', 0, 'joleng@gmail.com', '4297f44b13955235245b2497399d7a93', ''),
(21, 'madrid', '231sdfq', 'Luzon', '2131', 1, 'madrid@gmail.com', '4297f44b13955235245b2497399d7a93', ''),
(22, 'kimmy', '15235243', '', '12312321', 1, 'kimmy@gmail.com', 'b23cf2d0fb74b0ffa0cf4c70e6e04926', ''),
(23, 'Jaci Ardales', '4141', '', '12323', 0, '5123@gmail.com', 'e277dd1e05688a22e377e25a3dae5de1', ''),
(24, 'tanginamo', 'tanginamo123123', '', '1234123', 1, 'tanginamo@gmail.com', '7ff2574e6df5fd0e5970fe3474e72aec', ''),
(25, 'gagoka', 'gagoka', '', 'gagoka', 0, 'gagoka@gmail.com', 'd72b2b7e38f2eedee0e1f83e41fe4c0c', ''),
(26, 'lastnato', 'lastnato', '', 'lastnato', 0, 'lastnato@mgial.com', '8c7c9b717b3fc17ac8d3909f5856eda3', ''),
(27, 'kisses', 'kisses', '', 'kisses', 0, 'kisses@gmail.coim', '9e8b4e6aa25e60e1c9ef7fa02dc71a79', ''),
(28, 'aj', 'ajajaja', '', '1231241235234', 1, 'ajaja@gmail.com', 'f7938fdfb2a02d400416050e66441a32', './admin/assets/uploads/1678721970.jpg'),
(29, 'bombo', '980asdass', '', '98031287', 1, 'bombo@radyo.com', '900d5dbe090740365b3d318190914a01', 'assets/uploads/1678722834.jpg'),
(30, 'clarex', 'sadasdw123432', '', '5234634', 0, 'clarex.@fsad.com', 'b23cf2d0fb74b0ffa0cf4c70e6e04926', './admin/assets/uploads/1678722961.jpg'),
(31, 'clarex', 'sadasdw123432', '', '5234634', 0, 'wdaasdasd123@gmai.com', 'b23cf2d0fb74b0ffa0cf4c70e6e04926', './admin/assets/uploads/1678722976.jpg'),
(32, 'Clarence Fabros', '73 Fbaros residency', '', '0964508564', 0, 'clarence@gmail.com', '4297f44b13955235245b2497399d7a93', './admin/assets/uploads/1678723096.jpg'),
(33, 'hello', '352352', '', '453124', 0, 'hello@hello.com', 'f30aa7a662c728b7407c54ae6bfd27d1', 'admin/assets/uploads/1678723254.jpg'),
(34, 'hi', '1234123', '', 'h123123', 0, 'hi@hi.com', '30c2138619045a1dd4b1f6cb888f0d67', 'assets/uploads/1678723282.jpg'),
(35, 'Lon Masilang', '123123', '', '123123', 0, 'longadog@123.com', '4297f44b13955235245b2497399d7a93', 'assets/uploads/1678723347.jpg'),
(36, 'Customer', '09 Customer 09 Cust', 'A. Bonifacio', '09090909', 0, 'customer@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'assets/uploads/1679894309.png'),
(37, 'kostomer', 'kostomer', 'Friendship Street', '010100101', 1, 'kostomer@gmail.com', '6dd12a2d12231a6eb7c1b9b8f43a16cf', 'assets/uploads/1679896258.png'),
(38, 'eqweqwe', '123412zfzx', 'General Licuanan Street', '23123123', 0, 'mamamo@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'assets/uploads/1679899957.png');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `complainant_id` int(30) NOT NULL,
  `message` text NOT NULL,
  `address` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Pending,2=Received,3=Action Made',
  `image` longtext DEFAULT NULL,
  `street` varchar(255) NOT NULL,
  `reports` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `complainant_id`, `message`, `address`, `date_created`, `status`, `image`, `street`, `reports`) VALUES
(1, 1, 'Sample Report', 'Sample Address', '2020-10-30 13:48:19', 3, NULL, 'Luzon', 'Air pollution'),
(2, 1, 'aghasdhg', 'ahsgdahsdg', '2020-10-30 14:11:24', 3, NULL, 'Visayas', 'Drainage and Canal'),
(3, 2, 'Clogged drainage spotted in magsaysay street.', 'Magsaysay Street, South Signal Village, Taguig City.', '2023-02-19 03:22:08', 2, NULL, 'Mindanao', 'Drainage and Canal'),
(14, 36, 'adasdasdas', 'asdasdasdasd', '2023-03-27 13:13:45', 3, 'uploads/8afbc17125b5e69a34ca05b7ebde5cfc.png', 'A. Bonifacio', 'Improper waste disposal'),
(15, 36, 'asdasdasdzxczxc', 'xzczxczxc', '2023-03-27 13:14:18', 2, 'uploads/aa54af5926467570643496cb238896bd.png', 'A. Bonifacio', 'Improper waste disposal'),
(16, 37, 'lolololo', 'lolololo', '2023-03-27 13:51:56', 2, 'uploads/eada1e1375ec6030fa7ea42bfaac9b9c.png', 'General Espino Street', 'Air pollution'),
(17, 38, 'MARUMI NA KANAL', '20 polakasa', '2023-03-27 16:17:13', 3, 'uploads/5495ed266d59ad99de6c8a47f613e933.png', 'Mayor Tanyag', 'Clogged drainage systems'),
(18, 38, 'asdasdxzczxc', 'asdasdas', '2023-03-27 16:18:01', 1, 'uploads/621c69a68d362028c1b132543b79fdad.png', 'General Espino Street', 'Poor sanitation practices');

-- --------------------------------------------------------

--
-- Table structure for table `complaints_action`
--

CREATE TABLE `complaints_action` (
  `id` int(30) NOT NULL,
  `complaint_id` int(30) NOT NULL,
  `responder_id` int(30) NOT NULL,
  `dispatched_by` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=pending,1= confirmed',
  `remarks` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints_action`
--

INSERT INTO `complaints_action` (`id`, `complaint_id`, `responder_id`, `dispatched_by`, `status`, `remarks`, `date_created`) VALUES
(3, 1, 1, 1, 1, 'samplelangto', '2020-10-30 16:59:00'),
(6, 2, 1, 1, 1, '212121212121', '2023-02-19 05:57:15'),
(19, 14, 7, 1, 1, 'OKAY NA PO!', '2023-03-27 13:15:32'),
(20, 3, 7, 1, 0, '', '2023-03-27 13:42:08'),
(21, 16, 5, 1, 0, '', '2023-03-27 13:52:18'),
(22, 15, 1, 1, 0, '', '2023-03-27 14:06:55'),
(23, 17, 2, 1, 1, 'naresolbahan na po!', '2023-03-27 16:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `outposts`
--

CREATE TABLE `outposts` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `address` text NOT NULL,
  `date_created` datetime NOT NULL,
  `contact` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `outposts`
--

INSERT INTO `outposts` (`id`, `name`, `address`, `date_created`, `contact`) VALUES
(1, 'Outpost 1', 'Outpost 1 Address', '0000-00-00 00:00:00', 23232323);

-- --------------------------------------------------------

--
-- Table structure for table `responders_team`
--

CREATE TABLE `responders_team` (
  `id` int(30) NOT NULL,
  `station_id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `availability` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `responders_team`
--

INSERT INTO `responders_team` (`id`, `station_id`, `name`, `availability`) VALUES
(1, 1, 'Garbage Collection Team', 1),
(2, 2, 'Drainage and Canal Team', 1),
(3, 4, 'Street Sweepers Team', 1),
(4, 1, 'Public Restroom Team', 1),
(5, 4, 'Graffiti Removal Team', 1),
(6, 2, 'Tree and Vegetation Team', 1),
(7, 2, 'Sanitation Team', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `contact` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`id`, `name`, `address`, `date_created`, `contact`) VALUES
(1, 'Outpost 1', 'Outpost 1 Address', '2020-10-30 10:56:25', 479889358),
(2, 'Outpost 2', 'Outpost 2 Address', '2020-10-30 10:56:43', 633225444),
(4, 'Outpost 3', 'Outpost 3 Address', '2023-03-06 12:45:00', 123123223);

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'Barangay South Signal Village Reporting and Information System', 'brgysouthsignal@taguig.com', '+639479889358', '1676754540_2.jpg', '&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;font-size: 30px; font-family: Tahoma, Geneva, sans-serif;&quot;&gt;&lt;strong&gt;Public Announcements&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&amp;nbsp;Lorem is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;img src=&quot;http://localhost/crms/admin/assets/uploads/1604029260_p1.jpg&quot; style=&quot;width: 558px;&quot; class=&quot;fr-fic fr-dib&quot;&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&amp;nbsp;Lorem is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;div class=&quot;fr-img-space-wrap&quot; style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;http://localhost/crms/admin/assets/uploads/1604029320_police cars.jpg&quot; style=&quot;width: 567px;&quot; class=&quot;fr-fic fr-rounded fr-dib&quot;&gt;&lt;p class=&quot;fr-img-space-wrap2&quot;&gt;&amp;nbsp;&lt;/p&gt;&lt;/div&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;img src=&quot;http://localhost/ITNET324-New-Research-Project--main/admin/assets/uploads/1679905620_Screenshot 2023-03-04 123205.png&quot; style=&quot;width: 456px;&quot; class=&quot;fr-fic fr-dib&quot;&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 3 COMMENT '1=Admin,2=Staff',
  `image` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`, `image`) VALUES
(1, 'Heinrich Fabros', 'adminskie', '0192023a7bbd73250516f069df18b500', 1, 'uploads/7c0bc99c4e879977901789b2b0ba3696.jpg'),
(3, 'niggaturtle', 'niggaturtle', '1a1233cfb69d7f27211e36aff9ec373a', 1, 'uploads/43bae6d0a9816f0f9b8b30e518e7e06e.jpg'),
(4, 'nationalid', 'nationalid', '1b2de2499e5f93e00a5a90e79a9da4b1', 1, 'uploads/e31e21362a22bec5a803fcfee6881247.jpg'),
(5, 'Cyleen', 'cyleen', '5f4dcc3b5aa765d61d8327deb882cf99', 2, NULL),
(6, 'mads', 'mads', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 'uploads/1fdffc4f0157c0e0ebc200922b7b3604.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complainants`
--
ALTER TABLE `complainants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints_action`
--
ALTER TABLE `complaints_action`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key_complaint` (`complaint_id`);

--
-- Indexes for table `outposts`
--
ALTER TABLE `outposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responders_team`
--
ALTER TABLE `responders_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complainants`
--
ALTER TABLE `complainants`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `complaints_action`
--
ALTER TABLE `complaints_action`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `outposts`
--
ALTER TABLE `outposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `responders_team`
--
ALTER TABLE `responders_team`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints_action`
--
ALTER TABLE `complaints_action`
  ADD CONSTRAINT `foreign_key_complaint` FOREIGN KEY (`complaint_id`) REFERENCES `complaints` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
