-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2016 at 07:04 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thanhvien`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datetg` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `who` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dateborn` date DEFAULT NULL,
  `sex` tinyint(4) DEFAULT NULL COMMENT '1:nam,2:nữ',
  `mota` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `chuc` tinyint(4) DEFAULT NULL COMMENT '1: administrator, 2: admod,3: user',
  `hien` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `fullname`, `username`, `password`, `email`, `phone`, `image`, `datetg`, `who`, `dateborn`, `sex`, `mota`, `chuc`, `hien`) VALUES
(1, 'Nguyen Minh Hoang', 'admin', 'c94dfa3dec4ac336761b3751d76e9e68', 'yeuemnkieu@gmail.com', '0912206193', 'data/hinh-anh-avatar-buon-dep (1).jpg', '15:30:44 25/05/2016', '', '0000-00-00', NULL, 'txtmota', 1, 0),
(3, 'nguyen minh hoang', 'EmoGun2', '202cb962ac59075b964b07152d234b70', 'yeuemnkieu3222@gmail.com', '00000000000', 'data/mua-he-lanh-15090.jpg', '0000-00-00', '', '0000-00-00', NULL, '', 3, 0),
(9, 'nguyen minh hoang1', 'EmoGun', '202cb962ac59075b964b07152d234b70', 'yeuemnkieu32222@gmail.com', '0917343424', 'data/m2m_Digital20Art_0029.jpg', '0000-00-00', '', '1997-10-31', 1, 'cÃ¡c thá»© cÃ¡c thá»©', 2, 0),
(10, 'nguyen hoang 122', 'hoang3', '202cb962ac59075b964b07152d234b70', 'yeuemnkie213123u@gmail.com', '02929293', 'data/', '0000-00-00', '', '0000-00-00', NULL, '', 3, 0),
(11, 'nguyen hoang 1222', 'hoang32', '202cb962ac59075b964b07152d234b70', 'yeuemnkie2131223u@gmail.com', '302929293', 'data/', '0000-00-00', '', '0000-00-00', NULL, '', 3, 0),
(12, 'nguyen hoang 12222', 'hoang322', '202cb962ac59075b964b07152d234b70', 'yeuemnkie21321223u@gmail.com', '3029292932', 'data/', '0000-00-00', '', '0000-00-00', NULL, '', 3, 0),
(13, 'nguyenhoang122112', 'hoang1223', '202cb962ac59075b964b07152d234b70', 'yeuemnkie213122323u@gmail.com', '3423423423', 'data/', '0000-00-00', '', '0000-00-00', NULL, '', 3, 0),
(14, 'nguyen hoang 1222223', 'hoang32223', '202cb962ac59075b964b07152d234b70', 'yeuemnkie2132122323u@gmail.com', '302929293223', 'data/', '0000-00-00', '', '0000-00-00', NULL, '', 3, 0),
(15, 'Minh Hoang', 'Anhyeuem', 'c94dfa3dec4ac336761b3751d76e9e68', 'yeuemnkieu32221@gmail.com', '0977584821', 'data/hinh-dai-dien-buon-71.jpg', 'Thu/May/2016', '', '0000-00-00', NULL, '', 3, 0),
(16, 'nguyen hoang 12222231234', 'hoang32223323', '202cb962ac59075b964b07152d234b70', 'yeuemnkie21123321224323u@gmail.com', '302929293221233', 'data/', '10:44:45 26/05/2016', '', '0000-00-00', NULL, '', 3, 0),
(17, 'nguyen hoang 1222223123423', 'hoang3222332323', '202cb962ac59075b964b07152d234b70', 'yeuemnkie2112332122324323u@gmail.com', '302929293221233', 'data/', '10:46:04 26/05/2016', '', '0000-00-00', NULL, '', 3, 0),
(18, 'nguyen hoang 122222312342323', 'hoang3222332323', '202cb962ac59075b964b07152d234b70', 'yeuemnkie211233212232432323u@gmail.com', '302929293221233', 'data/', '10:47:07 26/05/2016', '', '0000-00-00', NULL, '', 3, 0),
(19, 'nguyen hoang 12222223312342323', 'hoang3222323323', '202cb962ac59075b964b07152d234b70', 'yeuemnkie21123233212232432323u@gmail.com', '302929293221233', 'data/', '10:48:56 26/05/2016', '', '0000-00-00', NULL, '', 3, 0),
(20, 'nguyen hoang 1222222331234232323', '23hoang32223233', '202cb962ac59075b964b07152d234b70', 'yeuemnkie211232332122324323223u@gmail.com', '302929293221233', 'data/', '10+5:50:55 26/05/201', '', '2016-05-26', NULL, '', 3, 0),
(21, 'nguyen hoang 12222223312342323233', '23hoang32223233', '202cb962ac59075b964b07152d234b70', 'yeuemnkie2112323321223243223223u@gmail.com', '302929293221233', 'data/', '3:57:57 26/05/2016', '', '0000-00-00', NULL, '', 3, 0),
(22, 'nguyen hoang 1342222223312342323233', '23hoang32223342', '202cb962ac59075b964b07152d234b70', 'yeuemnkie22112323321223243223223u@gmail.com', '302929229322123', 'data/', '15:59:09 26/05/2016', '', '0000-00-00', NULL, '', 3, 0),
(23, 'Anh', 'EmoGun12', '202cb962ac59075b964b07152d234b70', 'yeuemnkieu32223232@gmail.com', '09239329432', 'data/hinh-anh-buon-nhat-trong-cuoc-song3-1024x768-1414140843.png', '08:57:32 27/05/2016', '', NULL, NULL, NULL, 3, 0),
(24, 'Nguyá»…n VÄƒn A', 'nguyenvana', '202cb962ac59075b964b07152d234b70', 'nguyenvana@gmail.com', '0912206911', 'data/logo.png', '10:10:14 27/05/2016', 'admin', NULL, NULL, NULL, 3, 0),
(25, 'Nguyá»…n VÄƒn B', 'nguyenvanb', '202cb962ac59075b964b07152d234b70', 'nguyenvanb@gmail.com', '0934223423', 'data/12741020.jpg', '10:15:38 27/05/2016', 'admin', NULL, NULL, NULL, 3, 0),
(26, 'Nguyá»…n VÄƒn B', 'nguyenvanc', '202cb962ac59075b964b07152d234b70', 'nguyenvanc@gmail.com', '0932423432', 'data/hinh-dai-dien-buon-71.jpg', '10:59:46 27/05/2016', 'admin', NULL, NULL, NULL, 3, 0),
(27, 'Nguyá»…n VÄƒn D', 'nguyenvand', '202cb962ac59075b964b07152d234b70', 'nguyenvand@gmail.com', '0912206193', 'data/hinh-dai-dien-buon-71.jpg', '11:02:03 27/05/2016', 'admin', NULL, NULL, NULL, 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
