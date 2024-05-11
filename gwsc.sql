-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2023 at 05:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gwsc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `AdminName` varchar(30) DEFAULT NULL,
  `APassword` varchar(30) DEFAULT NULL,
  `AEmail` varchar(30) DEFAULT NULL,
  `AAddress` varchar(30) DEFAULT NULL,
  `APhoneNo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `AdminName`, `APassword`, `AEmail`, `AAddress`, `APhoneNo`) VALUES
(1, 'admin', 'admin', 'thetmhuewai191@gmail.com', 'Yangon', '09441544141'),
(2, 'Thet Mhue', '12345', 'thetmhue@gmail.com', 'Yangon', '09772567456'),
(3, 'TMhueWai', '1234567', 'tmhuewai@gmail.com', 'Tamwe', '0944154414111');

-- --------------------------------------------------------

--
-- Table structure for table `bookdetail`
--

CREATE TABLE `bookdetail` (
  `BookingID` int(11) NOT NULL,
  `PDetailID` int(11) NOT NULL,
  `BookPeople` int(11) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookdetail`
--

INSERT INTO `bookdetail` (`BookingID`, `PDetailID`, `BookPeople`, `Amount`) VALUES
(1, 1, 1, 0),
(1, 2, 2, 0),
(2, 2, 1, 0),
(2, 1, 3, 0),
(3, 1, 1, 2000),
(3, 4, 1, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BookingID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `BookingDate` date NOT NULL,
  `ConfirmDate` date NOT NULL,
  `BookingStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BookingID`, `UserID`, `BookingDate`, `ConfirmDate`, `BookingStatus`) VALUES
(1, 1, '2023-09-29', '0000-00-00', '0'),
(2, 1, '2023-09-30', '0000-00-00', '0'),
(3, 2, '2023-09-30', '0000-00-00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ContactID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `CountryID` int(11) NOT NULL,
  `CountryName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`CountryID`, `CountryName`) VALUES
(1, 'California'),
(2, 'Bristol'),
(3, 'Cambridge'),
(4, 'Carlisle');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `FeatureID` int(11) NOT NULL,
  `FeatureName` varchar(30) DEFAULT NULL,
  `FImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`FeatureID`, `FeatureName`, `FImage`) VALUES
(2, 'Wifi free', 'images.jpg'),
(3, 'Water free', 'Image1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `localattr`
--

CREATE TABLE `localattr` (
  `LocalAttrID` int(11) NOT NULL,
  `CountryID` int(11) NOT NULL,
  `LocalAttrName` varchar(100) NOT NULL,
  `LocalImage1` varchar(100) NOT NULL,
  `LocalImage2` varchar(100) NOT NULL,
  `LocalImage3` varchar(100) NOT NULL,
  `map` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `localattr`
--

INSERT INTO `localattr` (`LocalAttrID`, `CountryID`, `LocalAttrName`, `LocalImage1`, `LocalImage2`, `LocalImage3`, `map`) VALUES
(1, 2, 'People Park', 'OpticalDisc4.jpg', 'CPU1.jpg', 'LapTop1(1).jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61113.49958755166!2d96.1544192!3d16.796876799999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eb5e3fffe455%3A0xb7d3ad319654cf6e!2sShwedagon%20Pagoda!5e0!3m2!1sen!2smm!4v1696135255364!5m2!1sen!2smm'),
(2, 1, 'Waterfall', 'Memory1(1).JPG', 'SU1.jpg', 'OpticalDisc5.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d97127.9583229804!2d96.09491927955337!3d16.84343034054298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c194962007f863%3A0x1ce0d39a47ca647c!2sLOTTE%20HOTEL%20YANGON!5e0!3m2!1sen!2smm!4v1696135797477!5m2!1sen!2smm'),
(3, 1, 'Cali WaterFall', '12d953e04e757db070346e156b865461.jpg', 'tech tool diversity.jpg', 'ISA Color.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30273.039042228505!2d96.41657313451753!3d18.477775190454338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c427b76d4ddf9f%3A0x9f1e64d2fab65ce!2sPhyu!5e0!3m2!1sen!2smm!4v1696135881660!5m2!1sen!2smm');

-- --------------------------------------------------------

--
-- Table structure for table `packagedetail`
--

CREATE TABLE `packagedetail` (
  `PDetailID` int(11) NOT NULL,
  `PKID` int(11) NOT NULL,
  `PKTID` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `NoOfPeople` int(11) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `View` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packagedetail`
--

INSERT INTO `packagedetail` (`PDetailID`, `PKID`, `PKTID`, `Price`, `NoOfPeople`, `Status`, `View`) VALUES
(1, 2, 4, 2000, 15, 'Available', 5),
(2, 1, 5, 3000, 2, 'Available', 6),
(3, 3, 4, 3000, 5, 'Unavailable', 4),
(4, 4, 3, 3000, 19, 'Available', 11);

-- --------------------------------------------------------

--
-- Table structure for table `packagefeature`
--

CREATE TABLE `packagefeature` (
  `PKFID` int(11) NOT NULL,
  `FeatureID` int(11) NOT NULL,
  `PKID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packagefeature`
--

INSERT INTO `packagefeature` (`PKFID`, `FeatureID`, `PKID`) VALUES
(1, 2, 4),
(2, 3, 4),
(3, 3, 3),
(4, 2, 2),
(5, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `PKID` int(11) NOT NULL,
  `PKName` varchar(200) NOT NULL,
  `Location` text NOT NULL,
  `StartDate` varchar(50) NOT NULL,
  `EndDate` varchar(50) NOT NULL,
  `Duration` varchar(50) NOT NULL,
  `Desc` text NOT NULL,
  `Image1` varchar(255) NOT NULL,
  `Image2` varchar(255) DEFAULT NULL,
  `Image3` varchar(255) DEFAULT NULL,
  `Image4` varchar(255) DEFAULT NULL,
  `CountryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`PKID`, `PKName`, `Location`, `StartDate`, `EndDate`, `Duration`, `Desc`, `Image1`, `Image2`, `Image3`, `Image4`, `CountryID`) VALUES
(1, 'Chaung Thar beach 3 days go go package', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15264.915021072558!2d94.43256088762905!3d16.96329451589856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30bfb38138b53073%3A0xdad409eb3311a7fe!2sChaung%20Thar%20Beach!5e0!3m2!1sen!2smm!4v1692943248542!5m2!1sen!2smm', '2023-08-31', '2023-09-03', '2 nights 3 days', 'Chaung Thar Beach 3 Days gogo package Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum hic                         commodi minima reiciendis dolorum ratione esse sint nemo suscipit                         dolores. Cumque est distinctio, fugit suscipit laboriosam magni                         unde reiciendis molestiae a nesciunt repellendus, veritatis, id                         enim dolorum qui sed tenetur! Natus tempora dolore fuga debitis                         voluptatibus praesentium repellendus autem! Nihil quos provident                         dolor error maxime vero reiciendis voluptatem. Voluptatum quae,                         laboriosam qui nemo facilis tenetur quis exercitationem cumque                         deleniti. Facere, et? Perspiciatis ab omnis sequi! Soluta, unde                         deleniti sed deserunt ullam officia veritatis quaerat dolorum,                         velit, aperiam magni inventore animi ratione nobis neque tempora                         labore. Delectus ullam modi dolorem ab!', '', '', '', '', 3),
(2, 'Ngwe Saung Beach 3 days go go package', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61097.33517952262!2d94.34693684076115!3d16.84700859076948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30be35516a81d903%3A0x71c4ba09c8725022!2sNgwesaung!5e0!3m2!1sen!2smm!4v1692944132676!5m2!1sen!2smm', '2023-09-06', '2023-09-09', '2 nights 3 days', 'Ngwe Saung Beach 3 days go go package Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum hic                         commodi minima reiciendis dolorum ratione esse sint nemo suscipit                         dolores. Cumque est distinctio, fugit suscipit laboriosam magni                         unde reiciendis molestiae a nesciunt repellendus, veritatis, id                         enim dolorum qui sed tenetur! Natus tempora dolore fuga debitis                         voluptatibus praesentium repellendus autem! Nihil quos provident                         dolor error maxime vero reiciendis voluptatem. Voluptatum quae,                         laboriosam qui nemo facilis tenetur quis exercitationem cumque                         deleniti. Facere, et? Perspiciatis ab omnis sequi! Soluta, unde                         deleniti sed deserunt ullam officia veritatis quaerat dolorum,                         velit, aperiam magni inventore animi ratione nobis neque tempora labore. Delectus ullam modi dolorem ab!', 'VID_24800721_142807_897.mp4', '20200625_190013_728.jpg', '0-02-0a-4f1fbc3bea99d10fef2053e9d088ff89b573ab6ff6dd861be07a19182ff7b1ef_71a484f4c4f04438.jpg', '12d953e04e757db070346e156b865461.jpg', 1),
(3, 'Island of Hawaii 7 Days Go go Package', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d962273.1028269904!2d-156.0937259384222!3d19.589670718778503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7953e7c1c5f73a59%3A0x1455a492f9d78134!2sIsland%20of%20Hawai&#39;i!5e0!3m2!1sen!2smm!4v1695019856827!5m2!1sen!2smm', '2023-09-20', '2023-09-27', '7 Days', 'Island of Hawaii 7 Days Go go Package Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum hic                         commodi minima reiciendis dolorum ratione esse sint nemo suscipit                         dolores. Cumque est distinctio, fugit suscipit laboriosam magni                         unde reiciendis molestiae a nesciunt repellendus, veritatis, id                         enim dolorum qui sed tenetur! Natus tempora dolore fuga debitis                         voluptatibus praesentium repellendus autem! Nihil quos provident                         dolor error maxime vero reiciendis voluptatem. Voluptatum quae,                         laboriosam qui nemo facilis tenetur quis exercitationem cumque                         deleniti. Facere, et? Perspiciatis ab omnis sequi! Soluta, unde                         deleniti sed deserunt ullam officia veritatis quaerat dolorum,                         velit, aperiam magni inventore animi ratione nobis neque tempora labore. Delectus ullam modi dolorem ab!', 'me.jpg', '0-02-0a-11ecb99e493ed62793638644bbf7f3780cc5e8114a73d776aee59757034f3608_b29cf68f.jpg', '12d953e04e757db070346e156b865461.jpg', '0-02-0a-188c2c9f08a68aca5a687af140e3c0369283a9b67ab32e233942f40ec4864263_8356fbddc9a5120d.jpg', 1),
(4, 'Kotakiji Camping Ground', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3293.2533754106594!2d135.51486307451765!3d34.369475400915185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60072cad10dc2073%3A0xa7e93ed3c5379bd4!2sKotakiji%20Camping%20Ground!5e0!3m2!1sen!2smm!4v1695025465111!5m2!1sen!2smm', '2023-09-21', '2023-09-23', '2 nights 3 days', 'Kotakiji Camping Groung Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum hic                         commodi minima reiciendis dolorum ratione esse sint nemo suscipit                         dolores. Cumque est distinctio, fugit suscipit laboriosam magni                         unde reiciendis molestiae a nesciunt repellendus, veritatis, id                         enim dolorum qui sed tenetur! Natus tempora dolore fuga debitis                         voluptatibus praesentium repellendus autem! Nihil quos provident                         dolor error maxime vero reiciendis voluptatem. Voluptatum quae,                         laboriosam qui nemo facilis tenetur quis exercitationem cumque                         deleniti. Facere, et? Perspiciatis ab omnis sequi! Soluta, unde                         deleniti sed deserunt ullam officia veritatis quaerat dolorum,                         velit, aperiam magni inventore animi ratione nobis neque tempora labore. Delectus ullam modi dolorem ab!', '0-02-0a-05f71b91e37580e40487229835bea8b32a737b72faa9dfb5fcd42c42f8aacc1d_69fcb4a5716fdfcd.jpg', '0-02-0a-9dab1c9cc9df5abd471020c1f15315daa3fc42b4c59a945dfe39a11e9e3b71ec_689579d28e237f62.jpg', 'be1a6c0958585f6ac6fcd4582049963d.jpg', 'facebook_1363215259.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `packagetypes`
--

CREATE TABLE `packagetypes` (
  `PKTID` int(11) NOT NULL,
  `PKTName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packagetypes`
--

INSERT INTO `packagetypes` (`PKTID`, `PKTName`) VALUES
(3, ' tent pitch'),
(4, ' touring caravan pitch'),
(5, 'motorhome pitch');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ReviewID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `PDetailID` int(11) NOT NULL,
  `ReviewText` text NOT NULL,
  `RDate` date NOT NULL,
  `Star` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ReviewID`, `UserID`, `PDetailID`, `ReviewText`, `RDate`, `Star`) VALUES
(1, 2, 1, 'good', '0000-00-00', 0),
(2, 2, 2, 'nice', '0000-00-00', 4),
(3, 2, 4, 'good nice', '0000-00-00', 0),
(4, 2, 2, 'nice nice', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rssfeed`
--

CREATE TABLE `rssfeed` (
  `RSSfeedID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rssfeed`
--

INSERT INTO `rssfeed` (`RSSfeedID`, `Title`, `Description`, `Url`) VALUES
(1, 'Home Page', 'Home Page blah blah blah blah', 'http://localhost/GWSC/index.php'),
(2, 'Information', 'Information blah blah blah blah', 'http://localhost/GWSC/all.php');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(30) DEFAULT NULL,
  `SurName` varchar(30) DEFAULT NULL,
  `UAddress` varchar(30) DEFAULT NULL,
  `UPassword` varchar(30) DEFAULT NULL,
  `UEmail` varchar(30) DEFAULT NULL,
  `UPhoneNo` varchar(30) DEFAULT NULL,
  `UPhoto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FirstName`, `SurName`, `UAddress`, `UPassword`, `UEmail`, `UPhoneNo`, `UPhoto`) VALUES
(1, 'Thet', 'Mhue', 'Yangon', '123', 'thetmhue@gmail.com', '09441544141', ''),
(2, 'Wai', 'Mhue', 'Mandalay', '123456', 'waimhue@gmail.com', '09665655456', 'images.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BookingID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ContactID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`CountryID`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`FeatureID`);

--
-- Indexes for table `localattr`
--
ALTER TABLE `localattr`
  ADD PRIMARY KEY (`LocalAttrID`);

--
-- Indexes for table `packagedetail`
--
ALTER TABLE `packagedetail`
  ADD PRIMARY KEY (`PDetailID`);

--
-- Indexes for table `packagefeature`
--
ALTER TABLE `packagefeature`
  ADD PRIMARY KEY (`PKFID`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`PKID`);

--
-- Indexes for table `packagetypes`
--
ALTER TABLE `packagetypes`
  ADD PRIMARY KEY (`PKTID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ReviewID`);

--
-- Indexes for table `rssfeed`
--
ALTER TABLE `rssfeed`
  ADD PRIMARY KEY (`RSSfeedID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ContactID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `CountryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `FeatureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `localattr`
--
ALTER TABLE `localattr`
  MODIFY `LocalAttrID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `packagedetail`
--
ALTER TABLE `packagedetail`
  MODIFY `PDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packagefeature`
--
ALTER TABLE `packagefeature`
  MODIFY `PKFID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `PKID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packagetypes`
--
ALTER TABLE `packagetypes`
  MODIFY `PKTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rssfeed`
--
ALTER TABLE `rssfeed`
  MODIFY `RSSfeedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
