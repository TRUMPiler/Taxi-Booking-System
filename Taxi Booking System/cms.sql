-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2024 at 07:38 PM
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
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `email`, `password`) VALUES
(1, 'NPN', 'dashtaxigg@gmail.com', 'naishalpranavnavdeep');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `password` varchar(90) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `address` varchar(250) NOT NULL,
  `CityGG` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL,
  `account_creation` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `fname`, `mname`, `lname`, `password`, `dob`, `gender`, `contact`, `address`, `CityGG`, `email`, `image`, `account_creation`) VALUES
(1, 'Pranav', 'Babubai', 'Chaudari', 'Naishald123@', '2003-06-18', 'male', 9137079398, 'Krishnadham society', 1225, 'kraken9012e@gmail.com', 'IMG_20190929_164535.jpg', '2024-06-19 16:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `id` int(11) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `address` varchar(250) NOT NULL,
  `CityGG` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL,
  `account_creation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`id`, `fname`, `mname`, `lname`, `password`, `dob`, `gender`, `contact`, `address`, `CityGG`, `email`, `image`, `account_creation`) VALUES
(1, 'Naishal', 'Manish', 'Doshi', 'Naishald123@', '2003-06-13', 'male', 9326163059, 'Pratistha Apartments piplod', 1225, 'naishal036@gmail.com', 'naishal.jpg', '2024-06-19 16:26:31'),
(2, 'Manan', 'Naishal', 'Doshi', 'Naishald123@', '2003-07-16', 'male', 9978068457, 'Pratistha apartment piplod', 1225, '22bmiit015@gmail.com', 'naishal.jpg', '2024-06-20 16:53:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booked`
--

CREATE TABLE `tbl_booked` (
  `Booked_ID` int(11) NOT NULL,
  `InterestID` int(11) NOT NULL,
  `RideStatus` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booked`
--

INSERT INTO `tbl_booked` (`Booked_ID`, `InterestID`, `RideStatus`) VALUES
(1, 1, 'Ride Completed'),
(2, 4, 'Ride Cancelled'),
(3, 5, 'Ride Completed'),
(4, 6, 'Ride Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `CityID` int(11) NOT NULL,
  `City_Name` varchar(50) NOT NULL,
  `stateId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`CityID`, `City_Name`, `stateId`) VALUES
(101, 'Alipur', 1),
(102, 'Andaman Island', 1),
(103, 'Anderson Island', 1),
(104, 'Arainj-Laka-Punga', 1),
(105, 'Austinabad', 1),
(106, 'Bamboo Flat', 1),
(107, 'Barren Island', 1),
(108, 'Beadonabad', 1),
(109, 'Betapur', 1),
(110, 'Bindraban', 1),
(111, 'Bonington', 1),
(112, 'Brookesabad', 1),
(113, 'Cadell Point', 1),
(114, 'Calicut', 1),
(115, 'Chetamale', 1),
(116, 'Cinque Islands', 1),
(117, 'Defence Island', 1),
(118, 'Digilpur', 1),
(119, 'Dolyganj', 1),
(120, 'Flat Island', 1),
(121, 'Geinyale', 1),
(122, 'Great Coco Island', 1),
(123, 'Haddo', 1),
(124, 'Havelock Island', 1),
(125, 'Henry Lawrence Island', 1),
(126, 'Herbertabad', 1),
(127, 'Hobdaypur', 1),
(128, 'Ilichar', 1),
(129, 'Ingoie', 1),
(130, 'Inteview Island', 1),
(131, 'Jangli Ghat', 1),
(132, 'Jhon Lawrence Island', 1),
(133, 'Karen', 1),
(134, 'Kartara', 1),
(135, 'KYD Islannd', 1),
(136, 'Landfall Island', 1),
(137, 'Little Andmand', 1),
(138, 'Little Coco Island', 1),
(139, 'Long Island', 1),
(140, 'Maimyo', 1),
(141, 'Malappuram', 1),
(142, 'Manglutan', 1),
(143, 'Manpur', 1),
(144, 'Mitha Khari', 1),
(145, 'Neill Island', 1),
(146, 'Nicobar Island', 1),
(147, 'North Brother Island', 1),
(148, 'North Passage Island', 1),
(149, 'North Sentinel Island', 1),
(150, 'Nothen Reef Island', 1),
(151, 'Outram Island', 1),
(152, 'Pahlagaon', 1),
(153, 'Palalankwe', 1),
(154, 'Passage Island', 1),
(155, 'Phaiapong', 1),
(156, 'Phoenix Island', 1),
(157, 'Port Blair', 1),
(158, 'Preparis Island', 1),
(159, 'Protheroepur', 1),
(160, 'Rangachang', 1),
(161, 'Rongat', 1),
(162, 'Rutland Island', 1),
(163, 'Sabari', 1),
(164, 'Saddle Peak', 1),
(165, 'Shadipur', 1),
(166, 'Smith Island', 1),
(167, 'Sound Island', 1),
(168, 'South Sentinel Island', 1),
(169, 'Spike Island', 1),
(170, 'Tarmugli Island', 1),
(171, 'Taylerabad', 1),
(172, 'Titaije', 1),
(173, 'Toibalawe', 1),
(174, 'Tusonabad', 1),
(175, 'West Island', 1),
(176, 'Wimberleyganj', 1),
(177, 'Yadita', 1),
(201, 'Adilabad', 2),
(202, 'Anantapur', 2),
(203, 'Chittoor', 2),
(204, 'Cuddapah', 2),
(205, 'East Godavari', 2),
(206, 'Guntur', 2),
(207, 'Hyderabad', 2),
(208, 'Karimnagar', 2),
(209, 'Khammam', 2),
(210, 'Krishna', 2),
(211, 'Kurnool', 2),
(212, 'Mahabubnagar', 2),
(213, 'Medak', 2),
(214, 'Nalgonda', 2),
(215, 'Nellore', 2),
(216, 'Nizamabad', 2),
(217, 'Prakasam', 2),
(218, 'Rangareddy', 2),
(219, 'Srikakulam', 2),
(220, 'Visakhapatnam', 2),
(221, 'Vizianagaram', 2),
(222, 'Warangal', 2),
(223, 'West Godavari', 2),
(301, 'Anjaw', 3),
(302, 'Changlang', 3),
(303, 'Dibang Valley', 3),
(304, 'East Kameng', 3),
(305, 'East Siang', 3),
(306, 'Itanagar', 3),
(307, 'Kurung Kumey', 3),
(308, 'Lohit', 3),
(309, 'Lower Dibang Valley', 3),
(310, 'Lower Subansiri', 3),
(311, 'Papum Pare', 3),
(312, 'Tawang', 3),
(313, 'Tirap', 3),
(314, 'Upper Siang', 3),
(315, 'Upper Subansiri', 3),
(316, 'West Kameng', 3),
(317, 'West Siang', 3),
(318, 'Barpeta', 4),
(319, 'Bongaigaon', 4),
(320, 'Cachar', 4),
(321, 'Darrang', 4),
(322, 'Dhemaji', 4),
(323, 'Dhubri', 4),
(407, 'Dibrugarh', 4),
(408, 'Goalpara', 4),
(409, 'Golaghat', 4),
(410, 'Guwahati', 4),
(411, 'Hailakandi', 4),
(412, 'Jorhat', 4),
(413, 'Kamrup', 4),
(414, 'Karbi Anglong', 4),
(415, 'Karimganj', 4),
(416, 'Kokrajhar', 4),
(417, 'Lakhimpur', 4),
(418, 'Marigaon', 4),
(419, 'Nagaon', 4),
(420, 'Nalbari', 4),
(421, 'North Cachar Hills', 4),
(422, 'Silchar', 4),
(423, 'Sivasagar', 4),
(424, 'Sonitpur', 4),
(425, 'Tinsukia', 4),
(426, 'Udalguri', 4),
(501, 'Araria', 5),
(502, 'Aurangabad', 5),
(503, 'Banka', 5),
(504, 'Begusarai', 5),
(505, 'Bhagalpur', 5),
(506, 'Bhojpur', 5),
(507, 'Buxar', 5),
(508, 'Darbhanga', 5),
(509, 'East Champaran', 5),
(510, 'Gaya', 5),
(511, 'Gopalganj', 5),
(512, 'Jamshedpur', 5),
(513, 'Jamui', 5),
(514, 'Jehanabad', 5),
(515, 'Kaimur (Bhabua)', 5),
(516, 'Katihar', 5),
(517, 'Khagaria', 5),
(518, 'Kishanganj', 5),
(519, 'Lakhisarai', 5),
(520, 'Madhepura', 5),
(521, 'Madhubani', 5),
(522, 'Munger', 5),
(523, 'Muzaffarpur', 5),
(524, 'Nalanda', 5),
(525, 'Nawada', 5),
(526, 'Patna', 5),
(527, 'Purnia', 5),
(528, 'Rohtas', 5),
(529, 'Saharsa', 5),
(530, 'Samastipur', 5),
(531, 'Saran', 5),
(532, 'Sheikhpura', 5),
(533, 'Sheohar', 5),
(534, 'Sitamarhi', 5),
(535, 'Siwan', 5),
(536, 'Supaul', 5),
(537, 'Vaishali', 5),
(538, 'West Champaran', 5),
(601, 'Chandigarh', 6),
(602, 'Mani Marja', 6),
(701, 'Bastar', 7),
(702, 'Bhilai', 7),
(703, 'Bijapur', 7),
(704, 'Bilaspur', 7),
(705, 'Dhamtari', 7),
(706, 'Durg', 7),
(707, 'Janjgir-Champa', 7),
(708, 'Jashpur', 7),
(709, 'Kabirdham-Kawardha', 7),
(710, 'Korba', 7),
(711, 'Korea', 7),
(712, 'Mahasamund', 7),
(713, 'Narayanpur', 7),
(714, 'Norh Bastar-Kanker', 7),
(715, 'Raigarh', 7),
(716, 'Raipur', 7),
(717, 'Rajnandgaon', 7),
(718, 'South Bastar-Dantewada', 7),
(719, 'Surguja', 7),
(801, 'Amal', 8),
(802, 'Amli', 8),
(803, 'Bedpa', 8),
(804, 'Chikhli', 8),
(805, 'Dadra & Nagar Haveli', 8),
(806, 'Dahikhed', 8),
(807, 'Dolara', 8),
(808, 'Galonda', 8),
(809, 'Kanadi', 8),
(810, 'Karchond', 8),
(811, 'Khadoli', 8),
(812, 'Kharadpada', 8),
(813, 'Kherabari', 8),
(814, 'Kherdi', 8),
(815, 'Kothar', 8),
(816, 'Luari', 8),
(817, 'Mashat', 8),
(818, 'Rakholi', 8),
(819, 'Rudana', 8),
(820, 'Saili', 8),
(821, 'Sili', 8),
(822, 'Silvassa', 8),
(823, 'Sindavni', 8),
(824, 'Udva', 8),
(825, 'Umbarkoi', 8),
(826, 'Vansda', 8),
(827, 'Vasona', 8),
(828, 'Velugam', 8),
(901, 'Brancavare', 9),
(902, 'Dagasi', 9),
(903, 'Daman', 9),
(904, 'Diu', 9),
(905, 'Magarvara', 9),
(906, 'Nagwa', 9),
(907, 'Pariali', 9),
(908, 'Passo Covo', 9),
(1001, 'Central Delhi', 10),
(1002, 'East Delhi', 10),
(1003, 'New Delhi', 10),
(1004, 'North Delhi', 10),
(1005, 'North East Delhi', 10),
(1006, 'North West Delhi', 10),
(1007, 'Old Delhi', 10),
(1008, 'South Delhi', 10),
(1009, 'South West Delhi', 10),
(1010, 'West Delhi', 10),
(1101, 'Canacona', 11),
(1102, 'Candolim', 11),
(1103, 'Chinchinim', 11),
(1104, 'Cortalim', 11),
(1105, 'Goa', 11),
(1106, 'Jua', 11),
(1107, 'Madgaon', 11),
(1108, 'Mahem', 11),
(1109, 'Mapuca', 11),
(1110, 'Marmagao', 11),
(1111, 'Panji', 11),
(1112, 'Ponda', 11),
(1113, 'Sanvordem', 11),
(1114, 'Terekhol', 11),
(1198, 'Singtam', 30),
(1201, 'Ahmedabad', 12),
(1202, 'Amreli', 12),
(1203, 'Anand', 12),
(1204, 'Banaskantha', 12),
(1205, 'Baroda', 12),
(1206, 'Bharuch', 12),
(1207, 'Bhavnagar', 12),
(1208, 'Dahod', 12),
(1209, 'Dang', 12),
(1210, 'Dwarka', 12),
(1211, 'Gandhinagar', 12),
(1212, 'Jamnagar', 12),
(1213, 'Junagadh', 12),
(1214, 'Kheda', 12),
(1215, 'Kutch', 12),
(1216, 'Mehsana', 12),
(1217, 'Nadiad', 12),
(1218, 'Narmada', 12),
(1219, 'Navsari', 12),
(1220, 'Panchmahals', 12),
(1221, 'Patan', 12),
(1222, 'Porbandar', 12),
(1223, 'Rajkot', 12),
(1224, 'Sabarkantha', 12),
(1225, 'Surat', 12),
(1226, 'Surendranagar', 12),
(1227, 'Vadodara', 12),
(1228, 'Valsad', 12),
(1229, 'Vapi', 12),
(1230, 'Bardoli', 12),
(1231, 'Bhuj', 12),
(1232, 'Bilimora', 12),
(1233, 'Borsad', 12),
(1234, 'Chikhli', 12),
(1235, 'Chhatral', 12),
(1301, 'Ambala', 13),
(1302, 'Bhiwani', 13),
(1303, 'Faridabad', 13),
(1304, 'Fatehabad', 13),
(1305, 'Gurgaon', 13),
(1306, 'Hisar', 13),
(1307, 'Jhajjar', 13),
(1308, 'Jind', 13),
(1309, 'Kaithal', 13),
(1310, 'Karnal', 13),
(1311, 'Kurukshetra', 13),
(1312, 'Mahendragarh', 13),
(1313, 'Mewat', 13),
(1314, 'Panchkula', 13),
(1315, 'Panipat', 13),
(1316, 'Rewari', 13),
(1317, 'Rohtak', 13),
(1318, 'Sirsa', 13),
(1319, 'Sonipat', 13),
(1320, 'Yamunanagar', 13),
(1401, 'Bilaspur', 14),
(1402, 'Chamba', 14),
(1403, 'Dalhousie', 14),
(1404, 'Hamirpur', 14),
(1405, 'Kangra', 14),
(1406, 'Kinnaur', 14),
(1407, 'Kullu', 14),
(1408, 'Lahaul & Spiti', 14),
(1409, 'Mandi', 14),
(1410, 'Shimla', 14),
(1411, 'Sirmaur', 14),
(1412, 'Solan', 14),
(1413, 'Una', 14),
(1501, 'Anantnag', 15),
(1502, 'Baramulla', 15),
(1503, 'Budgam', 15),
(1504, 'Doda', 15),
(1505, 'Jammu', 15),
(1506, 'Kargil', 15),
(1507, 'Kathua', 15),
(1508, 'Kupwara', 15),
(1509, 'Leh', 15),
(1510, 'Poonch', 15),
(1511, 'Pulwama', 15),
(1512, 'Rajauri', 15),
(1513, 'Srinagar', 15),
(1514, 'Udhampur', 15),
(1601, 'Bokaro', 16),
(1602, 'Chatra', 16),
(1603, 'Deoghar', 16),
(1604, 'Dhanbad', 16),
(1605, 'Dumka', 16),
(1606, 'East Singhbhum', 16),
(1607, 'Garhwa', 16),
(1608, 'Giridih', 16),
(1609, 'Godda', 16),
(1610, 'Gumla', 16),
(1611, 'Hazaribag', 16),
(1612, 'Jamtara', 16),
(1613, 'Koderma', 16),
(1614, 'Latehar', 16),
(1615, 'Lohardaga', 16),
(1616, 'Pakur', 16),
(1617, 'Palamu', 16),
(1618, 'Ranchi', 16),
(1619, 'Sahibganj', 16),
(1620, 'Seraikela', 16),
(1621, 'Simdega', 16),
(1622, 'West Singhbhum', 16),
(1701, 'Bagalkot', 17),
(1702, 'Bengaluru', 17),
(1703, 'Bangalore Rural', 17),
(1704, 'Belgaum', 17),
(1705, 'Bellary', 17),
(1706, 'Bhatkal', 17),
(1707, 'Bidar', 17),
(1708, 'Bijapur', 17),
(1709, 'Chamrajnagar', 17),
(1710, 'Chickmagalur', 17),
(1711, 'Chikballapur', 17),
(1712, 'Chitradurga', 17),
(1713, 'Dakshina Kannada', 17),
(1714, 'Davanagere', 17),
(1715, 'Dharwad', 17),
(1716, 'Gadag', 17),
(1717, 'Gulbarga', 17),
(1718, 'Hampi', 17),
(1719, 'Hassan', 17),
(1720, 'Haveri', 17),
(1721, 'Hospet', 17),
(1722, 'Karwar', 17),
(1723, 'Kodagu', 17),
(1724, 'Kolar', 17),
(1725, 'Koppal', 17),
(1726, 'Madikeri', 17),
(1727, 'Mandya', 17),
(1728, 'Mangalore', 17),
(1729, 'Manipal', 17),
(1730, 'Mysore', 17),
(1731, 'Raichur', 17),
(1732, 'Shimoga', 17),
(1733, 'Sirsi', 17),
(1734, 'Sringeri', 17),
(1735, 'Srirangapatna', 17),
(1736, 'Tumkur', 17),
(1737, 'Udupi', 17),
(1738, 'Uttara Kannada', 17),
(1801, 'Alappuzha', 18),
(1802, 'Alleppey', 18),
(1803, 'Alwaye', 18),
(1804, 'Ernakulam', 18),
(1805, 'Idukki', 18),
(1806, 'Kannur', 18),
(1807, 'Kasargod', 18),
(1808, 'Kochi', 18),
(1809, 'Kollam', 18),
(1810, 'Kottayam', 18),
(1811, 'Kovalam', 18),
(1812, 'Kozhikode', 18),
(1813, 'Malappuram', 18),
(1814, 'Palakkad', 18),
(1815, 'Pathanamthitta', 18),
(1816, 'Perumbavoor', 18),
(1817, 'Thiruvananthapuram', 18),
(1818, 'Thrissur', 18),
(1819, 'Trichur', 18),
(1820, 'Trivandrum', 18),
(1821, 'Wayanad', 18),
(1901, 'Agatti Island', 19),
(1902, 'Bingaram Island', 19),
(1903, 'Bitra Island', 19),
(1904, 'Chetlat Island', 19),
(1905, 'Kadmat Island', 19),
(1906, 'Kalpeni Island', 19),
(1907, 'Kavaratti Island', 19),
(1908, 'Kiltan Island', 19),
(1909, 'Lakshadweep Sea', 19),
(1910, 'Minicoy Island', 19),
(1911, 'North Island', 19),
(1912, 'South Island', 19),
(2001, 'Anuppur', 20),
(2002, 'Ashoknagar', 20),
(2003, 'Balaghat', 20),
(2004, 'Barwani', 20),
(2005, 'Betul', 20),
(2006, 'Bhind', 20),
(2007, 'Bhopal', 20),
(2008, 'Burhanpur', 20),
(2009, 'Chhatarpur', 20),
(2010, 'Chhindwara', 20),
(2011, 'Damoh', 20),
(2012, 'Datia', 20),
(2013, 'Dewas', 20),
(2014, 'Dhar', 20),
(2015, 'Dindori', 20),
(2016, 'Guna', 20),
(2017, 'Gwalior', 20),
(2018, 'Harda', 20),
(2019, 'Hoshangabad', 20),
(2020, 'Indore', 20),
(2021, 'Jabalpur', 20),
(2022, 'Jagdalpur', 20),
(2023, 'Jhabua', 20),
(2024, 'Katni', 20),
(2025, 'Khandwa', 20),
(2026, 'Khargone', 20),
(2027, 'Mandla', 20),
(2028, 'Mandsaur', 20),
(2029, 'Morena', 20),
(2030, 'Narsinghpur', 20),
(2031, 'Neemuch', 20),
(2032, 'Panna', 20),
(2033, 'Raisen', 20),
(2034, 'Rajgarh', 20),
(2035, 'Ratlam', 20),
(2036, 'Rewa', 20),
(2037, 'Sagar', 20),
(2038, 'Satna', 20),
(2039, 'Sehore', 20),
(2040, 'Seoni', 20),
(2041, 'Shahdol', 20),
(2042, 'Shajapur', 20),
(2043, 'Sheopur', 20),
(2044, 'Shivpuri', 20),
(2045, 'Sidhi', 20),
(2046, 'Tikamgarh', 20),
(2047, 'Ujjain', 20),
(2048, 'Umaria', 20),
(2049, 'Vidisha', 20),
(2101, 'Ahmednagar', 21),
(2102, 'Akola', 21),
(2103, 'Amravati', 21),
(2104, 'Aurangabad', 21),
(2105, 'Beed', 21),
(2106, 'Bhandara', 21),
(2107, 'Buldhana', 21),
(2108, 'Chandrapur', 21),
(2109, 'Dhule', 21),
(2110, 'Gadchiroli', 21),
(2111, 'Gondia', 21),
(2112, 'Hingoli', 21),
(2113, 'Jalgaon', 21),
(2114, 'Jalna', 21),
(2115, 'Kolhapur', 21),
(2116, 'Latur', 21),
(2117, 'Mahabaleshwar', 21),
(2118, 'Mumbai', 21),
(2119, 'Mumbai City', 21),
(2120, 'Mumbai Suburban', 21),
(2121, 'Nagpur', 21),
(2122, 'Nanded', 21),
(2123, 'Nandurbar', 21),
(2124, 'Nashik', 21),
(2125, 'Osmanabad', 21),
(2126, 'Parbhani', 21),
(2127, 'Pune', 21),
(2128, 'Raigad', 21),
(2129, 'Ratnagiri', 21),
(2130, 'Sangli', 21),
(2131, 'Satara', 21),
(2132, 'Sholapur', 21),
(2133, 'Sindhudurg', 21),
(2134, 'Thane', 21),
(2135, 'Wardha', 21),
(2136, 'Washim', 21),
(2137, 'Yavatmal', 21),
(2201, 'Bishnupur', 22),
(2202, 'Chandel', 22),
(2203, 'Churachandpur', 22),
(2204, 'Imphal East', 22),
(2205, 'Imphal West', 22),
(2206, 'Senapati', 22),
(2207, 'Tamenglong', 22),
(2208, 'Thoubal', 22),
(2209, 'Ukhrul', 22),
(2301, 'East Garo Hills', 23),
(2302, 'East Khasi Hills', 23),
(2303, 'Jaintia Hills', 23),
(2304, 'Ri Bhoi', 23),
(2305, 'Shillong', 23),
(2306, 'South Garo Hills', 23),
(2307, 'West Garo Hills', 23),
(2308, 'West Khasi Hills', 23),
(2401, 'Aizawl', 24),
(2402, 'Champhai', 24),
(2403, 'Kolasib', 24),
(2404, 'Lawngtlai', 24),
(2405, 'Lunglei', 24),
(2406, 'Mamit', 24),
(2407, 'Saiha', 24),
(2408, 'Serchhip', 24),
(2501, 'Dimapur', 25),
(2502, 'Kohima', 25),
(2503, 'Mokokchung', 25),
(2504, 'Mon', 25),
(2505, 'Phek', 25),
(2506, 'Tuensang', 25),
(2507, 'Wokha', 25),
(2508, 'Zunheboto', 25),
(2601, 'Angul', 26),
(2602, 'Balangir', 26),
(2603, 'Balasore', 26),
(2604, 'Baleswar', 26),
(2605, 'Bargarh', 26),
(2606, 'Berhampur', 26),
(2607, 'Bhadrak', 26),
(2608, 'Bhubaneswar', 26),
(2609, 'Boudh', 26),
(2610, 'Cuttack', 26),
(2611, 'Deogarh', 26),
(2612, 'Dhenkanal', 26),
(2613, 'Gajapati', 26),
(2614, 'Ganjam', 26),
(2615, 'Jagatsinghapur', 26),
(2616, 'Jajpur', 26),
(2617, 'Jharsuguda', 26),
(2618, 'Kalahandi', 26),
(2619, 'Kandhamal', 26),
(2620, 'Kendrapara', 26),
(2621, 'Kendujhar', 26),
(2622, 'Khordha', 26),
(2623, 'Koraput', 26),
(2624, 'Malkangiri', 26),
(2625, 'Mayurbhanj', 26),
(2626, 'Nabarangapur', 26),
(2627, 'Nayagarh', 26),
(2628, 'Nuapada', 26),
(2629, 'Puri', 26),
(2630, 'Rayagada', 26),
(2631, 'Rourkela', 26),
(2632, 'Sambalpur', 26),
(2633, 'Subarnapur', 26),
(2634, 'Sundergarh', 26),
(2701, 'Bahur', 27),
(2702, 'Karaikal', 27),
(2703, 'Mahe', 27),
(2704, 'Pondicherry', 27),
(2705, 'Purnankuppam', 27),
(2706, 'Valudavur', 27),
(2707, 'Villianur', 27),
(2708, 'Yanam', 27),
(2809, 'Amritsar', 28),
(2810, 'Barnala', 28),
(2811, 'Bathinda', 28),
(2812, 'Faridkot', 28),
(2813, 'Fatehgarh Sahib', 28),
(2814, 'Ferozepur', 28),
(2815, 'Gurdaspur', 28),
(2816, 'Hoshiarpur', 28),
(2817, 'Jalandhar', 28),
(2818, 'Kapurthala', 28),
(2819, 'Ludhiana', 28),
(2820, 'Mansa', 28),
(2821, 'Moga', 28),
(2822, 'Muktsar', 28),
(2823, 'Nawanshahr', 28),
(2824, 'Pathankot', 28),
(2825, 'Patiala', 28),
(2826, 'Rupnagar', 28),
(2827, 'Sangrur', 28),
(2828, 'SAS Nagar', 28),
(2829, 'Tarn Taran', 28),
(2901, 'Ajmer', 29),
(2902, 'Alwar', 29),
(2903, 'Banswara', 29),
(2904, 'Baran', 29),
(2905, 'Barmer', 29),
(2906, 'Bharatpur', 29),
(2907, 'Bhilwara', 29),
(2908, 'Bikaner', 29),
(2909, 'Bundi', 29),
(2910, 'Chittorgarh', 29),
(2911, 'Churu', 29),
(2912, 'Dausa', 29),
(2913, 'Dholpur', 29),
(2914, 'Dungarpur', 29),
(2915, 'Hanumangarh', 29),
(2916, 'Jaipur', 29),
(2917, 'Jaisalmer', 29),
(2918, 'Jalore', 29),
(2919, 'Jhalawar', 29),
(2920, 'Jhunjhunu', 29),
(2921, 'Jodhpur', 29),
(2922, 'Karauli', 29),
(2923, 'Kota', 29),
(2924, 'Nagaur', 29),
(2925, 'Pali', 29),
(2926, 'Pilani', 29),
(2927, 'Rajsamand', 29),
(2928, 'Sawai Madhopur', 29),
(2929, 'Sikar', 29),
(2930, 'Sirohi', 29),
(2931, 'Sri Ganganagar', 29),
(2932, 'Tonk', 29),
(2933, 'Udaipur', 29),
(3001, 'Barmiak', 30),
(3002, 'Be', 30),
(3003, 'Bhurtuk', 30),
(3004, 'Chhubakha', 30),
(3005, 'Chidam', 30),
(3006, 'Chubha', 30),
(3007, 'Chumikteng', 30),
(3008, 'Dentam', 30),
(3009, 'Dikchu', 30),
(3010, 'Dzongri', 30),
(3011, 'Gangtok', 30),
(3012, 'Gauzing', 30),
(3013, 'Gyalshing', 30),
(3014, 'Hema', 30),
(3015, 'Kerung', 30),
(3016, 'Lachen', 30),
(3017, 'Lachung', 30),
(3018, 'Lema', 30),
(3019, 'Lingtam', 30),
(3020, 'Lungthu', 30),
(3021, 'Mangan', 30),
(3022, 'Namchi', 30),
(3023, 'Namthang', 30),
(3024, 'Nanga', 30),
(3025, 'Nantang', 30),
(3026, 'Naya Bazar', 30),
(3027, 'Padamachen', 30),
(3028, 'Pakhyong', 30),
(3029, 'Pemayangtse', 30),
(3030, 'Phensang', 30),
(3031, 'Rangli', 30),
(3032, 'Rinchingpong', 30),
(3033, 'Sakyong', 30),
(3034, 'Samdong', 30),
(3035, 'Siniolchu', 30),
(3036, 'Sombari', 30),
(3037, 'Soreng', 30),
(3038, 'Sosing', 30),
(3039, 'Tekhug', 30),
(3040, 'Temi', 30),
(3041, 'Tsetang', 30),
(3042, 'Tsomgo', 30),
(3043, 'Tumlong', 30),
(3044, 'Yangang', 30),
(3045, 'Yumtang', 30),
(3101, 'Chennai', 31),
(3102, 'Chidambaram', 31),
(3103, 'Chingleput', 31),
(3104, 'Coimbatore', 31),
(3105, 'Courtallam', 31),
(3106, 'Cuddalore', 31),
(3107, 'Dharmapuri', 31),
(3108, 'Dindigul', 31),
(3109, 'Erode', 31),
(3110, 'Hosur', 31),
(3111, 'Kanchipuram', 31),
(3112, 'Kanyakumari', 31),
(3113, 'Karaikudi', 31),
(3114, 'Karur', 31),
(3115, 'Kodaikanal', 31),
(3116, 'Kovilpatti', 31),
(3117, 'Krishnagiri', 31),
(3118, 'Kumbakonam', 31),
(3119, 'Madurai', 31),
(3120, 'Mayiladuthurai', 31),
(3121, 'Nagapattinam', 31),
(3122, 'Nagarcoil', 31),
(3123, 'Namakkal', 31),
(3124, 'Neyveli', 31),
(3125, 'Nilgiris', 31),
(3126, 'Ooty', 31),
(3127, 'Palani', 31),
(3128, 'Perambalur', 31),
(3129, 'Pollachi', 31),
(3130, 'Pudukkottai', 31),
(3131, 'Rajapalayam', 31),
(3132, 'Ramanathapuram', 31),
(3133, 'Salem', 31),
(3134, 'Sivaganga', 31),
(3135, 'Sivakasi', 31),
(3136, 'Thanjavur', 31),
(3137, 'Theni', 31),
(3138, 'Thoothukudi', 31),
(3139, 'Tiruchirappalli', 31),
(3140, 'Tirunelveli', 31),
(3141, 'Tirupur', 31),
(3142, 'Tiruvallur', 31),
(3143, 'Tiruvannamalai', 31),
(3144, 'Tiruvarur', 31),
(3145, 'Trichy', 31),
(3146, 'Tuticorin', 31),
(3147, 'Vellore', 31),
(3148, 'Villupuram', 31),
(3149, 'Virudhunagar', 31),
(3150, 'Yercaud', 31),
(3201, 'Agartala', 32),
(3202, 'Ambasa', 32),
(3203, 'Bampurbari', 32),
(3204, 'Belonia', 32),
(3205, 'Dhalai', 32),
(3206, 'Dharam Nagar', 32),
(3207, 'Kailashahar', 32),
(3208, 'Kamal Krishnabari', 32),
(3209, 'Khopaiyapara', 32),
(3210, 'Khowai', 32),
(3211, 'Phuldungsei', 32),
(3212, 'Radha Kishore Pur', 32),
(3213, 'Tripura', 32),
(3301, 'Agra', 33),
(3302, 'Aligarh', 33),
(3303, 'Allahabad', 33),
(3304, 'Ambedkar Nagar', 33),
(3305, 'Amethi', 33),
(3306, 'Auraiya', 33),
(3307, 'Azamgarh', 33),
(3308, 'Bagpat', 33),
(3309, 'Bahraich', 33),
(3310, 'Ballia', 33),
(3311, 'Balrampur', 33),
(3312, 'Banda', 33),
(3313, 'Barabanki', 33),
(3314, 'Bareilly', 33),
(3315, 'Basti', 33),
(3316, 'Bijnor', 33),
(3317, 'Budaun', 33),
(3318, 'Bulandshahr', 33),
(3319, 'Chandauli', 33),
(3320, 'Chitrakoot', 33),
(3321, 'Deoria', 33),
(3322, 'Etah', 33),
(3323, 'Etawah', 33),
(3324, 'Faizabad', 33),
(3325, 'Farrukhabad', 33),
(3326, 'Fatehpur', 33),
(3327, 'Firozabad', 33),
(3328, 'Gautam Buddha Nagar', 33),
(3329, 'Ghaziabad', 33),
(3330, 'Ghazipur', 33),
(3331, 'Gonda', 33),
(3332, 'Gorakhpur', 33),
(3333, 'Hamirpur', 33),
(3334, 'Hardoi', 33),
(3335, 'Hathras', 33),
(3336, 'Jalaun', 33),
(3337, 'Jaunpur', 33),
(3338, 'Jhansi', 33),
(3339, 'Jyotiba Phule Nagar', 33),
(3340, 'Kannauj', 33),
(3341, 'Kanpur Dehat', 33),
(3342, 'Kanpur Nagar', 33),
(3343, 'Kaushambi', 33),
(3344, 'Kheri', 33),
(3345, 'Kumaon', 33),
(3346, 'Kushinagar', 33),
(3347, 'Lalitpur', 33),
(3348, 'Lucknow', 33),
(3349, 'Maharajganj', 33),
(3350, 'Mahoba', 33),
(3351, 'Mainpuri', 33),
(3352, 'Mathura', 33),
(3353, 'Mau', 33),
(3354, 'Meerut', 33),
(3355, 'Mirzapur', 33),
(3356, 'Moradabad', 33),
(3357, 'Muzaffarnagar', 33),
(3358, 'Noida', 33),
(3359, 'Pilibhit', 33),
(3360, 'Pratapgarh', 33),
(3361, 'Rae Bareli', 33),
(3362, 'Rampur', 33),
(3363, 'Saharanpur', 33),
(3364, 'Sant Kabir Nagar', 33),
(3365, 'Sant Ravidas Nagar', 33),
(3366, 'Shahjahanpur', 33),
(3367, 'Shravasti', 33),
(3368, 'Siddharthnagar', 33),
(3369, 'Sitapur', 33),
(3370, 'Sonbhadra', 33),
(3371, 'Sultanpur', 33),
(3372, 'Unnao', 33),
(3373, 'Varanasi', 33),
(3401, 'Almora', 34),
(3402, 'Bageshwar', 34),
(3403, 'Chamoli', 34),
(3404, 'Champawat', 34),
(3405, 'Dehradun', 34),
(3406, 'Haridwar', 34),
(3407, 'Mussoorie', 34),
(3408, 'Nainital', 34),
(3409, 'Pantnagar', 34),
(3410, 'Pauri Garhwal', 34),
(3411, 'Pithoragarh', 34),
(3412, 'Roorkee', 34),
(3413, 'Rudraprayag', 34),
(3414, 'Tehri Garhwal', 34),
(3415, 'Udham Singh Nagar', 34),
(3416, 'Uttarkashi', 34),
(3501, 'Bankura', 35),
(3502, 'Bardhaman', 35),
(3503, 'Birbhum', 35),
(3504, 'Calcutta', 35),
(3505, 'Cooch Behar', 35),
(3506, 'Darjeeling', 35),
(3507, 'Durgapur', 35),
(3508, 'East Medinipur', 35),
(3509, 'Hooghly', 35),
(3510, 'Howrah', 35),
(3511, 'Jalpaiguri', 35),
(3512, 'Kharagpur', 35),
(3513, 'Malda', 35),
(3514, 'Murshidabad', 35),
(3515, 'Nadia', 35),
(3516, 'North 24 Parganas', 35),
(3517, 'North Dinajpur', 35),
(3518, 'Purulia', 35),
(3519, 'Siliguri', 35),
(3520, 'South 24 Parganas', 35),
(3521, 'South Dinajpur', 35),
(3522, 'West Medinipur', 35),
(7890, 'Hydrabad', 37);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedbackid` int(11) NOT NULL,
  `date-of-feedback` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` varchar(300) NOT NULL,
  `booked_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedbackid`, `date-of-feedback`, `description`, `booked_id`) VALUES
(1, '2024-06-19 16:54:39', 'Good', 1),
(2, '2024-06-20 17:10:30', 'Good', 3);

--
-- Triggers `tbl_feedback`
--
DELIMITER $$
CREATE TRIGGER `Update tbl_feedback` AFTER INSERT ON `tbl_feedback` FOR EACH ROW update tbl_booked set tbl_booked.RideStatus='Ride Completed' where tbl_booked.Booked_ID=new.booked_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fuel_registery`
--

CREATE TABLE `tbl_fuel_registery` (
  `fuelid` int(11) NOT NULL,
  `Fuel-type` varchar(15) NOT NULL,
  `price_per_mileage` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_fuel_registery`
--

INSERT INTO `tbl_fuel_registery` (`fuelid`, `Fuel-type`, `price_per_mileage`) VALUES
(1, 'Petrol', 96.87),
(2, 'Diesel', 89.62),
(3, 'CNG', 75.59);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_interest`
--

CREATE TABLE `tbl_interest` (
  `interestID` int(11) NOT NULL,
  `RequestID` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `Cost` decimal(11,2) NOT NULL,
  `date_of_request` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_interest`
--

INSERT INTO `tbl_interest` (`interestID`, `RequestID`, `vehicle_id`, `Cost`, `date_of_request`) VALUES
(1, 1, 1, 2169.00, '2024-06-19 22:08:44'),
(4, 2, 1, 380.00, '2024-06-20 21:39:03'),
(5, 4, 1, 385.00, '2024-06-20 21:49:41'),
(6, 5, 1, 358.00, '2024-06-20 22:25:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `Payment_ID` int(11) NOT NULL,
  `Transactionid` int(11) NOT NULL,
  `BookedID` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`Payment_ID`, `Transactionid`, `BookedID`, `date`) VALUES
(3, 20246911, 1, '2024-06-19 22:24:09'),
(4, 20242414, 3, '2024-06-20 22:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request_ride`
--

CREATE TABLE `tbl_request_ride` (
  `Request_id` int(11) NOT NULL,
  `SourceAddress` varchar(50) NOT NULL,
  `DestinationAddress` varchar(50) NOT NULL,
  `SourceCity` int(11) NOT NULL,
  `DestinationCity` int(11) NOT NULL,
  `From` datetime NOT NULL,
  `To` datetime NOT NULL,
  `PassCount` smallint(6) NOT NULL,
  `passengerId` int(11) NOT NULL,
  `requestCreation` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_request_ride`
--

INSERT INTO `tbl_request_ride` (`Request_id`, `SourceAddress`, `DestinationAddress`, `SourceCity`, `DestinationCity`, `From`, `To`, `PassCount`, `passengerId`, `requestCreation`) VALUES
(1, 'Pratistha Apartments piplod', 'National avenue kandivali', 1225, 2118, '2024-06-19 22:14:00', '2024-06-20 22:20:00', 6, 1, '2024-06-19 22:22:15'),
(2, 'Pratistha Apartments piplod', 'Uka tarsadia University', 1225, 1230, '2024-06-21 21:11:00', '2024-06-21 22:13:00', 6, 1, '2024-06-20 21:12:04'),
(4, 'Pratistha Apartments piplod', 'Uka tarsadia', 1225, 1230, '2024-06-20 22:38:00', '2024-06-20 22:39:00', 1, 1, '2024-06-20 22:38:06'),
(5, 'Pratistha apartment piplod', 'Uka tarsadia University', 1225, 1230, '2024-06-20 22:35:00', '2024-06-20 22:37:00', 1, 2, '2024-06-20 22:34:15'),
(6, 'Pratistha apartment piplod', 'Uka tarsadia University', 1225, 1230, '2024-06-20 22:36:00', '2024-06-20 22:37:00', 1, 2, '2024-06-20 22:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schdule`
--

CREATE TABLE `tbl_schdule` (
  `SchduleID` int(11) NOT NULL,
  `From_date` datetime NOT NULL,
  `To_date` datetime NOT NULL,
  `Driver_id` int(11) NOT NULL,
  `booked_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_schdule`
--

INSERT INTO `tbl_schdule` (`SchduleID`, `From_date`, `To_date`, `Driver_id`, `booked_ID`) VALUES
(1, '2024-06-20 03:58:00', '2024-06-20 09:21:00', 1, 1),
(2, '2024-06-21 21:11:00', '2024-06-21 22:13:00', 1, 2),
(3, '2024-06-21 21:48:00', '2024-06-21 22:50:00', 1, 3),
(4, '2024-06-21 03:23:00', '2024-06-21 04:25:00', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `stateID` int(11) NOT NULL,
  `State_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`stateID`, `State_name`) VALUES
(1, 'ANDAMAN AND NICOBAR ISLANDS'),
(2, 'ANDHRA PRADESH'),
(3, 'ARUNACHAL PRADESH'),
(4, 'ASSAM'),
(5, 'BIHAR'),
(6, 'CHATTISGARH'),
(7, 'CHANDIGARH'),
(8, 'DAMAN AND DIU'),
(9, 'DELHI'),
(10, 'DADRA AND NAGAR HAVELI'),
(11, 'GOA'),
(12, 'GUJARAT'),
(13, 'HIMACHAL PRADESH'),
(14, 'HARYANA'),
(15, 'JAMMU AND KASHMIR'),
(16, 'JHARKHAND'),
(17, 'KERALA'),
(18, 'KARNATAKA'),
(19, 'LAKSHADWEEP'),
(20, 'MEGHALAYA'),
(21, 'MAHARASHTRA'),
(22, 'MANIPUR'),
(23, 'MADHYA PRADESH'),
(24, 'MIZORAM'),
(25, 'NAGALAND'),
(26, 'ORISSA'),
(27, 'PUNJAB'),
(28, 'PONDICHERRY'),
(29, 'RAJASTHAN'),
(30, 'SIKKIM'),
(31, 'TAMIL NADU'),
(32, 'TRIPURA'),
(33, 'UTTARAKHAND'),
(34, 'UTTAR PRADESH'),
(35, 'WEST BENGAL'),
(37, 'telegana');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `Fuel-type` varchar(12) NOT NULL,
  `mileage` decimal(4,2) NOT NULL,
  `PassCapacity` smallint(6) NOT NULL,
  `vehicle-number` varchar(20) NOT NULL,
  `vehiclepermit` varchar(150) NOT NULL,
  `vehicleinsurance` varchar(150) NOT NULL,
  `driver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `company_name`, `model`, `Fuel-type`, `mileage`, `PassCapacity`, `vehicle-number`, `vehiclepermit`, `vehicleinsurance`, `driver_id`) VALUES
(1, 'Mahendra', 'XUV', 'Petrol', 12.00, 5, 'MH 03 AH 3343', 'Permit.jpg', 'insurance2.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`),
  ADD KEY `City_foreign` (`CityGG`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CityKING` (`CityGG`);

--
-- Indexes for table `tbl_booked`
--
ALTER TABLE `tbl_booked`
  ADD PRIMARY KEY (`Booked_ID`),
  ADD KEY `interest` (`InterestID`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`CityID`),
  ADD KEY `STATE_FOREIGN` (`stateId`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedbackid`),
  ADD KEY `booked` (`booked_id`);

--
-- Indexes for table `tbl_fuel_registery`
--
ALTER TABLE `tbl_fuel_registery`
  ADD PRIMARY KEY (`fuelid`);

--
-- Indexes for table `tbl_interest`
--
ALTER TABLE `tbl_interest`
  ADD PRIMARY KEY (`interestID`),
  ADD KEY `RequestIDF` (`RequestID`),
  ADD KEY `VehicleID` (`vehicle_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `BookedID` (`BookedID`);

--
-- Indexes for table `tbl_request_ride`
--
ALTER TABLE `tbl_request_ride`
  ADD PRIMARY KEY (`Request_id`),
  ADD KEY `DestinationCityGG` (`DestinationCity`),
  ADD KEY `SourceCityGG` (`SourceCity`),
  ADD KEY `Passenger_name` (`passengerId`);

--
-- Indexes for table `tbl_schdule`
--
ALTER TABLE `tbl_schdule`
  ADD PRIMARY KEY (`SchduleID`),
  ADD KEY `Booked_ID` (`booked_ID`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`stateID`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_vehical_1` (`driver_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_booked`
--
ALTER TABLE `tbl_booked`
  MODIFY `Booked_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedbackid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_fuel_registery`
--
ALTER TABLE `tbl_fuel_registery`
  MODIFY `fuelid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_interest`
--
ALTER TABLE `tbl_interest`
  MODIFY `interestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `Payment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_request_ride`
--
ALTER TABLE `tbl_request_ride`
  MODIFY `Request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_schdule`
--
ALTER TABLE `tbl_schdule`
  MODIFY `SchduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `stateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `City_foreign` FOREIGN KEY (`CityGG`) REFERENCES `tbl_city` (`CityID`);

--
-- Constraints for table `passenger`
--
ALTER TABLE `passenger`
  ADD CONSTRAINT `CityKING` FOREIGN KEY (`CityGG`) REFERENCES `tbl_city` (`CityID`);

--
-- Constraints for table `tbl_booked`
--
ALTER TABLE `tbl_booked`
  ADD CONSTRAINT `interest` FOREIGN KEY (`InterestID`) REFERENCES `tbl_interest` (`interestID`);

--
-- Constraints for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD CONSTRAINT `STATE_FOREIGN` FOREIGN KEY (`stateId`) REFERENCES `tbl_state` (`stateID`);

--
-- Constraints for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD CONSTRAINT `booked` FOREIGN KEY (`booked_id`) REFERENCES `tbl_booked` (`Booked_ID`);

--
-- Constraints for table `tbl_interest`
--
ALTER TABLE `tbl_interest`
  ADD CONSTRAINT `RequestIDF` FOREIGN KEY (`RequestID`) REFERENCES `tbl_request_ride` (`Request_id`),
  ADD CONSTRAINT `fk_referenced_id` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`id`);

--
-- Constraints for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD CONSTRAINT `tbl_payment_ibfk_1` FOREIGN KEY (`BookedID`) REFERENCES `tbl_booked` (`Booked_ID`);

--
-- Constraints for table `tbl_request_ride`
--
ALTER TABLE `tbl_request_ride`
  ADD CONSTRAINT `DestinationCityGG` FOREIGN KEY (`DestinationCity`) REFERENCES `tbl_city` (`CityID`),
  ADD CONSTRAINT `Passenger_name` FOREIGN KEY (`passengerId`) REFERENCES `passenger` (`id`),
  ADD CONSTRAINT `SourceCityGG` FOREIGN KEY (`SourceCity`) REFERENCES `tbl_city` (`CityID`);

--
-- Constraints for table `tbl_schdule`
--
ALTER TABLE `tbl_schdule`
  ADD CONSTRAINT `Booked_ID` FOREIGN KEY (`booked_ID`) REFERENCES `tbl_booked` (`Booked_ID`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `driver_vehical_1` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
