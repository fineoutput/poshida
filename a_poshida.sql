-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 09:44 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_poshida`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_cities`
--

CREATE TABLE `all_cities` (
  `id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `state_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `all_cities`
--

INSERT INTO `all_cities` (`id`, `city_name`, `state_id`) VALUES
(1, 'Alipur', '1'),
(2, 'Andaman Island', '1'),
(3, 'Anderson Island', '1'),
(4, 'Arainj-Laka-Punga', '1'),
(5, 'Austinabad', '1'),
(6, 'Bamboo Flat', '1'),
(7, 'Barren Island', '1'),
(8, 'Beadonabad', '1'),
(9, 'Betapur', '1'),
(10, 'Bindraban', '1'),
(11, 'Bonington', '1'),
(12, 'Brookesabad', '1'),
(13, 'Cadell Point', '1'),
(14, 'Calicut', '1'),
(15, 'Chetamale', '1'),
(16, 'Cinque Islands', '1'),
(17, 'Defence Island', '1'),
(18, 'Digilpur', '1'),
(19, 'Dolyganj', '1'),
(20, 'Flat Island', '1'),
(21, 'Geinyale', '1'),
(22, 'Great Coco Island', '1'),
(23, 'Haddo', '1'),
(24, 'Havelock Island', '1'),
(25, 'Henry Lawrence Island', '1'),
(26, 'Herbertabad', '1'),
(27, 'Hobdaypur', '1'),
(28, 'Ilichar', '1'),
(29, 'Ingoie', '1'),
(30, 'Inteview Island', '1'),
(31, 'Jangli Ghat', '1'),
(32, 'Jhon Lawrence Island', '1'),
(33, 'Karen', '1'),
(34, 'Kartara', '1'),
(35, 'KYD Islannd', '1'),
(36, 'Landfall Island', '1'),
(37, 'Little Andmand', '1'),
(38, 'Little Coco Island', '1'),
(39, 'Long Island', '1'),
(40, 'Maimyo', '1'),
(41, 'Malappuram', '1'),
(42, 'Manglutan', '1'),
(43, 'Manpur', '1'),
(44, 'Mitha Khari', '1'),
(45, 'Neill Island', '1'),
(46, 'Nicobar Island', '1'),
(47, 'North Brother Island', '1'),
(48, 'North Passage Island', '1'),
(49, 'North Sentinel Island', '1'),
(50, 'Nothen Reef Island', '1'),
(51, 'Outram Island', '1'),
(52, 'Pahlagaon', '1'),
(53, 'Palalankwe', '1'),
(54, 'Passage Island', '1'),
(55, 'Phaiapong', '1'),
(56, 'Phoenix Island', '1'),
(57, 'Port Blair', '1'),
(58, 'Preparis Island', '1'),
(59, 'Protheroepur', '1'),
(60, 'Rangachang', '1'),
(61, 'Rongat', '1'),
(62, 'Rutland Island', '1'),
(63, 'Sabari', '1'),
(64, 'Saddle Peak', '1'),
(65, 'Shadipur', '1'),
(66, 'Smith Island', '1'),
(67, 'Sound Island', '1'),
(68, 'South Sentinel Island', '1'),
(69, 'Spike Island', '1'),
(70, 'Tarmugli Island', '1'),
(71, 'Taylerabad', '1'),
(72, 'Titaije', '1'),
(73, 'Toibalawe', '1'),
(74, 'Tusonabad', '1'),
(75, 'West Island', '1'),
(76, 'Wimberleyganj', '1'),
(77, 'Yadita', '1'),
(78, 'Adilabad', '2'),
(79, 'Anantapur', '2'),
(80, 'Chittoor', '2'),
(81, 'Cuddapah', '2'),
(82, 'East Godavari', '2'),
(83, 'Guntur', '2'),
(84, 'Hyderabad', '2'),
(85, 'Karimnagar', '2'),
(86, 'Khammam', '2'),
(87, 'Krishna', '2'),
(88, 'Kurnool', '2'),
(89, 'Mahabubnagar', '2'),
(90, 'Medak', '2'),
(91, 'Nalgonda', '2'),
(92, 'Nellore', '2'),
(93, 'Nizamabad', '2'),
(94, 'Prakasam', '2'),
(95, 'Rangareddy', '2'),
(96, 'Srikakulam', '2'),
(97, 'Visakhapatnam', '2'),
(98, 'Vizianagaram', '2'),
(99, 'Warangal', '2'),
(100, 'West Godavari', '2'),
(101, 'Anjaw', '3'),
(102, 'Changlang', '3'),
(103, 'Dibang Valley', '3'),
(104, 'East Kameng', '3'),
(105, 'East Siang', '3'),
(106, 'Itanagar', '3'),
(107, 'Kurung Kumey', '3'),
(108, 'Lohit', '3'),
(109, 'Lower Dibang Valley', '3'),
(110, 'Lower Subansiri', '3'),
(111, 'Papum Pare', '3'),
(112, 'Tawang', '3'),
(113, 'Tirap', '3'),
(114, 'Upper Siang', '3'),
(115, 'Upper Subansiri', '3'),
(116, 'West Kameng', '3'),
(117, 'West Siang', '3'),
(118, 'Barpeta', '4'),
(119, 'Bongaigaon', '4'),
(120, 'Cachar', '4'),
(121, 'Darrang', '4'),
(122, 'Dhemaji', '4'),
(123, 'Dhubri', '4'),
(124, 'Dibrugarh', '4'),
(125, 'Goalpara', '4'),
(126, 'Golaghat', '4'),
(127, 'Guwahati', '4'),
(128, 'Hailakandi', '4'),
(129, 'Jorhat', '4'),
(130, 'Kamrup', '4'),
(131, 'Karbi Anglong', '4'),
(132, 'Karimganj', '4'),
(133, 'Kokrajhar', '4'),
(134, 'Lakhimpur', '4'),
(135, 'Marigaon', '4'),
(136, 'Nagaon', '4'),
(137, 'Nalbari', '4'),
(138, 'North Cachar Hills', '4'),
(139, 'Silchar', '4'),
(140, 'Sivasagar', '4'),
(141, 'Sonitpur', '4'),
(142, 'Tinsukia', '4'),
(143, 'Udalguri', '4'),
(144, 'Araria', '5'),
(145, 'Aurangabad', '5'),
(146, 'Banka', '5'),
(147, 'Begusarai', '5'),
(148, 'Bhagalpur', '5'),
(149, 'Bhojpur', '5'),
(150, 'Buxar', '5'),
(151, 'Darbhanga', '5'),
(152, 'East Champaran', '5'),
(153, 'Gaya', '5'),
(154, 'Gopalganj', '5'),
(155, 'Jamshedpur', '5'),
(156, 'Jamui', '5'),
(157, 'Jehanabad', '5'),
(158, 'Kaimur (Bhabua)', '5'),
(159, 'Katihar', '5'),
(160, 'Khagaria', '5'),
(161, 'Kishanganj', '5'),
(162, 'Lakhisarai', '5'),
(163, 'Madhepura', '5'),
(164, 'Madhubani', '5'),
(165, 'Munger', '5'),
(166, 'Muzaffarpur', '5'),
(167, 'Nalanda', '5'),
(168, 'Nawada', '5'),
(169, 'Patna', '5'),
(170, 'Purnia', '5'),
(171, 'Rohtas', '5'),
(172, 'Saharsa', '5'),
(173, 'Samastipur', '5'),
(174, 'Saran', '5'),
(175, 'Sheikhpura', '5'),
(176, 'Sheohar', '5'),
(177, 'Sitamarhi', '5'),
(178, 'Siwan', '5'),
(179, 'Supaul', '5'),
(180, 'Vaishali', '5'),
(181, 'West Champaran', '5'),
(182, 'Chandigarh', '6'),
(183, 'Mani Marja', '6'),
(184, 'Bastar', '7'),
(185, 'Bhilai', '7'),
(186, 'Bijapur', '7'),
(187, 'Bilaspur', '7'),
(188, 'Dhamtari', '7'),
(189, 'Durg', '7'),
(190, 'Janjgir-Champa', '7'),
(191, 'Jashpur', '7'),
(192, 'Kabirdham-Kawardha', '7'),
(193, 'Korba', '7'),
(194, 'Korea', '7'),
(195, 'Mahasamund', '7'),
(196, 'Narayanpur', '7'),
(197, 'Norh Bastar-Kanker', '7'),
(198, 'Raigarh', '7'),
(199, 'Raipur', '7'),
(200, 'Rajnandgaon', '7'),
(201, 'South Bastar-Dantewada', '7'),
(202, 'Surguja', '7'),
(203, 'Amal', '8'),
(204, 'Amli', '8'),
(205, 'Bedpa', '8'),
(206, 'Chikhli', '8'),
(207, 'Dadra & Nagar Haveli', '8'),
(208, 'Dahikhed', '8'),
(209, 'Dolara', '8'),
(210, 'Galonda', '8'),
(211, 'Kanadi', '8'),
(212, 'Karchond', '8'),
(213, 'Khadoli', '8'),
(214, 'Kharadpada', '8'),
(215, 'Kherabari', '8'),
(216, 'Kherdi', '8'),
(217, 'Kothar', '8'),
(218, 'Luari', '8'),
(219, 'Mashat', '8'),
(220, 'Rakholi', '8'),
(221, 'Rudana', '8'),
(222, 'Saili', '8'),
(223, 'Sili', '8'),
(224, 'Silvassa', '8'),
(225, 'Sindavni', '8'),
(226, 'Udva', '8'),
(227, 'Umbarkoi', '8'),
(228, 'Vansda', '8'),
(229, 'Vasona', '8'),
(230, 'Velugam', '8'),
(231, 'Brancavare', '9'),
(232, 'Dagasi', '9'),
(233, 'Daman', '9'),
(234, 'Diu', '9'),
(235, 'Magarvara', '9'),
(236, 'Nagwa', '9'),
(237, 'Pariali', '9'),
(238, 'Passo Covo', '9'),
(239, 'Central Delhi', '10'),
(240, 'East Delhi', '10'),
(241, 'New Delhi', '10'),
(242, 'North Delhi', '10'),
(243, 'North East Delhi', '10'),
(244, 'North West Delhi', '10'),
(245, 'Old Delhi', '10'),
(246, 'South Delhi', '10'),
(247, 'South West Delhi', '10'),
(248, 'West Delhi', '10'),
(249, 'Canacona', '11'),
(250, 'Candolim', '11'),
(251, 'Chinchinim', '11'),
(252, 'Cortalim', '11'),
(253, 'Goa', '11'),
(254, 'Jua', '11'),
(255, 'Madgaon', '11'),
(256, 'Mahem', '11'),
(257, 'Mapuca', '11'),
(258, 'Marmagao', '11'),
(259, 'Panji', '11'),
(260, 'Ponda', '11'),
(261, 'Sanvordem', '11'),
(262, 'Terekhol', '11'),
(263, 'Ahmedabad', '12'),
(264, 'Amreli', '12'),
(265, 'Anand', '12'),
(266, 'Banaskantha', '12'),
(267, 'Baroda', '12'),
(268, 'Bharuch', '12'),
(269, 'Bhavnagar', '12'),
(270, 'Dahod', '12'),
(271, 'Dang', '12'),
(272, 'Dwarka', '12'),
(273, 'Gandhinagar', '12'),
(274, 'Jamnagar', '12'),
(275, 'Junagadh', '12'),
(276, 'Kheda', '12'),
(277, 'Kutch', '12'),
(278, 'Mehsana', '12'),
(279, 'Nadiad', '12'),
(280, 'Narmada', '12'),
(281, 'Navsari', '12'),
(282, 'Panchmahals', '12'),
(283, 'Patan', '12'),
(284, 'Porbandar', '12'),
(285, 'Rajkot', '12'),
(286, 'Sabarkantha', '12'),
(287, 'Surat', '12'),
(288, 'Surendranagar', '12'),
(289, 'Vadodara', '12'),
(290, 'Valsad', '12'),
(291, 'Vapi', '12'),
(292, 'Ambala', '13'),
(293, 'Bhiwani', '13'),
(294, 'Faridabad', '13'),
(295, 'Fatehabad', '13'),
(296, 'Gurgaon', '13'),
(297, 'Hisar', '13'),
(298, 'Jhajjar', '13'),
(299, 'Jind', '13'),
(300, 'Kaithal', '13'),
(301, 'Karnal', '13'),
(302, 'Kurukshetra', '13'),
(303, 'Mahendragarh', '13'),
(304, 'Mewat', '13'),
(305, 'Panchkula', '13'),
(306, 'Panipat', '13'),
(307, 'Rewari', '13'),
(308, 'Rohtak', '13'),
(309, 'Sirsa', '13'),
(310, 'Sonipat', '13'),
(311, 'Yamunanagar', '13'),
(312, 'Bilaspur', '14'),
(313, 'Chamba', '14'),
(314, 'Dalhousie', '14'),
(315, 'Hamirpur', '14'),
(316, 'Kangra', '14'),
(317, 'Kinnaur', '14'),
(318, 'Kullu', '14'),
(319, 'Lahaul & Spiti', '14'),
(320, 'Mandi', '14'),
(321, 'Shimla', '14'),
(322, 'Sirmaur', '14'),
(323, 'Solan', '14'),
(324, 'Una', '14'),
(325, 'Anantnag', '15'),
(326, 'Baramulla', '15'),
(327, 'Budgam', '15'),
(328, 'Doda', '15'),
(329, 'Jammu', '15'),
(330, 'Kargil', '15'),
(331, 'Kathua', '15'),
(332, 'Kupwara', '15'),
(333, 'Leh', '15'),
(334, 'Poonch', '15'),
(335, 'Pulwama', '15'),
(336, 'Rajauri', '15'),
(337, 'Srinagar', '15'),
(338, 'Udhampur', '15'),
(339, 'Bokaro', '16'),
(340, 'Chatra', '16'),
(341, 'Deoghar', '16'),
(342, 'Dhanbad', '16'),
(343, 'Dumka', '16'),
(344, 'East Singhbhum', '16'),
(345, 'Garhwa', '16'),
(346, 'Giridih', '16'),
(347, 'Godda', '16'),
(348, 'Gumla', '16'),
(349, 'Hazaribag', '16'),
(350, 'Jamtara', '16'),
(351, 'Koderma', '16'),
(352, 'Latehar', '16'),
(353, 'Lohardaga', '16'),
(354, 'Pakur', '16'),
(355, 'Palamu', '16'),
(356, 'Ranchi', '16'),
(357, 'Sahibganj', '16'),
(358, 'Seraikela', '16'),
(359, 'Simdega', '16'),
(360, 'West Singhbhum', '16'),
(361, 'Bagalkot', '17'),
(362, 'Bangalore', '17'),
(363, 'Bangalore Rural', '17'),
(364, 'Belgaum', '17'),
(365, 'Bellary', '17'),
(366, 'Bhatkal', '17'),
(367, 'Bidar', '17'),
(368, 'Bijapur', '17'),
(369, 'Chamrajnagar', '17'),
(370, 'Chickmagalur', '17'),
(371, 'Chikballapur', '17'),
(372, 'Chitradurga', '17'),
(373, 'Dakshina Kannada', '17'),
(374, 'Davanagere', '17'),
(375, 'Dharwad', '17'),
(376, 'Gadag', '17'),
(377, 'Gulbarga', '17'),
(378, 'Hampi', '17'),
(379, 'Hassan', '17'),
(380, 'Haveri', '17'),
(381, 'Hospet', '17'),
(382, 'Karwar', '17'),
(383, 'Kodagu', '17'),
(384, 'Kolar', '17'),
(385, 'Koppal', '17'),
(386, 'Madikeri', '17'),
(387, 'Mandya', '17'),
(388, 'Mangalore', '17'),
(389, 'Manipal', '17'),
(390, 'Mysore', '17'),
(391, 'Raichur', '17'),
(392, 'Shimoga', '17'),
(393, 'Sirsi', '17'),
(394, 'Sringeri', '17'),
(395, 'Srirangapatna', '17'),
(396, 'Tumkur', '17'),
(397, 'Udupi', '17'),
(398, 'Uttara Kannada', '17'),
(399, 'Alappuzha', '18'),
(400, 'Alleppey', '18'),
(401, 'Alwaye', '18'),
(402, 'Ernakulam', '18'),
(403, 'Idukki', '18'),
(404, 'Kannur', '18'),
(405, 'Kasargod', '18'),
(406, 'Kochi', '18'),
(407, 'Kollam', '18'),
(408, 'Kottayam', '18'),
(409, 'Kovalam', '18'),
(410, 'Kozhikode', '18'),
(411, 'Malappuram', '18'),
(412, 'Palakkad', '18'),
(413, 'Pathanamthitta', '18'),
(414, 'Perumbavoor', '18'),
(415, 'Thiruvananthapuram', '18'),
(416, 'Thrissur', '18'),
(417, 'Trichur', '18'),
(418, 'Trivandrum', '18'),
(419, 'Wayanad', '18'),
(420, 'Agatti Island', '19'),
(421, 'Bingaram Island', '19'),
(422, 'Bitra Island', '19'),
(423, 'Chetlat Island', '19'),
(424, 'Kadmat Island', '19'),
(425, 'Kalpeni Island', '19'),
(426, 'Kavaratti Island', '19'),
(427, 'Kiltan Island', '19'),
(428, 'Lakshadweep Sea', '19'),
(429, 'Minicoy Island', '19'),
(430, 'North Island', '19'),
(431, 'South Island', '19'),
(432, 'Anuppur', '20'),
(433, 'Ashoknagar', '20'),
(434, 'Balaghat', '20'),
(435, 'Barwani', '20'),
(436, 'Betul', '20'),
(437, 'Bhind', '20'),
(438, 'Bhopal', '20'),
(439, 'Burhanpur', '20'),
(440, 'Chhatarpur', '20'),
(441, 'Chhindwara', '20'),
(442, 'Damoh', '20'),
(443, 'Datia', '20'),
(444, 'Dewas', '20'),
(445, 'Dhar', '20'),
(446, 'Dindori', '20'),
(447, 'Guna', '20'),
(448, 'Gwalior', '20'),
(449, 'Harda', '20'),
(450, 'Hoshangabad', '20'),
(451, 'Indore', '20'),
(452, 'Jabalpur', '20'),
(453, 'Jagdalpur', '20'),
(454, 'Jhabua', '20'),
(455, 'Katni', '20'),
(456, 'Khandwa', '20'),
(457, 'Khargone', '20'),
(458, 'Mandla', '20'),
(459, 'Mandsaur', '20'),
(460, 'Morena', '20'),
(461, 'Narsinghpur', '20'),
(462, 'Neemuch', '20'),
(463, 'Panna', '20'),
(464, 'Raisen', '20'),
(465, 'Rajgarh', '20'),
(466, 'Ratlam', '20'),
(467, 'Rewa', '20'),
(468, 'Sagar', '20'),
(469, 'Satna', '20'),
(470, 'Sehore', '20'),
(471, 'Seoni', '20'),
(472, 'Shahdol', '20'),
(473, 'Shajapur', '20'),
(474, 'Sheopur', '20'),
(475, 'Shivpuri', '20'),
(476, 'Sidhi', '20'),
(477, 'Tikamgarh', '20'),
(478, 'Ujjain', '20'),
(479, 'Umaria', '20'),
(480, 'Vidisha', '20'),
(481, 'Ahmednagar', '21'),
(482, 'Akola', '21'),
(483, 'Amravati', '21'),
(484, 'Aurangabad', '21'),
(485, 'Beed', '21'),
(486, 'Bhandara', '21'),
(487, 'Buldhana', '21'),
(488, 'Chandrapur', '21'),
(489, 'Dhule', '21'),
(490, 'Gadchiroli', '21'),
(491, 'Gondia', '21'),
(492, 'Hingoli', '21'),
(493, 'Jalgaon', '21'),
(494, 'Jalna', '21'),
(495, 'Kolhapur', '21'),
(496, 'Latur', '21'),
(497, 'Mahabaleshwar', '21'),
(498, 'Mumbai', '21'),
(499, 'Mumbai City', '21'),
(500, 'Mumbai Suburban', '21'),
(501, 'Nagpur', '21'),
(502, 'Nanded', '21'),
(503, 'Nandurbar', '21'),
(504, 'Nashik', '21'),
(505, 'Osmanabad', '21'),
(506, 'Parbhani', '21'),
(507, 'Pune', '21'),
(508, 'Raigad', '21'),
(509, 'Ratnagiri', '21'),
(510, 'Sangli', '21'),
(511, 'Satara', '21'),
(512, 'Sholapur', '21'),
(513, 'Sindhudurg', '21'),
(514, 'Thane', '21'),
(515, 'Wardha', '21'),
(516, 'Washim', '21'),
(517, 'Yavatmal', '21'),
(518, 'Bishnupur', '22'),
(519, 'Chandel', '22'),
(520, 'Churachandpur', '22'),
(521, 'Imphal East', '22'),
(522, 'Imphal West', '22'),
(523, 'Senapati', '22'),
(524, 'Tamenglong', '22'),
(525, 'Thoubal', '22'),
(526, 'Ukhrul', '22'),
(527, 'East Garo Hills', '23'),
(528, 'East Khasi Hills', '23'),
(529, 'Jaintia Hills', '23'),
(530, 'Ri Bhoi', '23'),
(531, 'Shillong', '23'),
(532, 'South Garo Hills', '23'),
(533, 'West Garo Hills', '23'),
(534, 'West Khasi Hills', '23'),
(535, 'Aizawl', '24'),
(536, 'Champhai', '24'),
(537, 'Kolasib', '24'),
(538, 'Lawngtlai', '24'),
(539, 'Lunglei', '24'),
(540, 'Mamit', '24'),
(541, 'Saiha', '24'),
(542, 'Serchhip', '24'),
(543, 'Dimapur', '25'),
(544, 'Kohima', '25'),
(545, 'Mokokchung', '25'),
(546, 'Mon', '25'),
(547, 'Phek', '25'),
(548, 'Tuensang', '25'),
(549, 'Wokha', '25'),
(550, 'Zunheboto', '25'),
(551, 'Angul', '26'),
(552, 'Balangir', '26'),
(553, 'Balasore', '26'),
(554, 'Baleswar', '26'),
(555, 'Bargarh', '26'),
(556, 'Berhampur', '26'),
(557, 'Bhadrak', '26'),
(558, 'Bhubaneswar', '26'),
(559, 'Boudh', '26'),
(560, 'Cuttack', '26'),
(561, 'Deogarh', '26'),
(562, 'Dhenkanal', '26'),
(563, 'Gajapati', '26'),
(564, 'Ganjam', '26'),
(565, 'Jagatsinghapur', '26'),
(566, 'Jajpur', '26'),
(567, 'Jharsuguda', '26'),
(568, 'Kalahandi', '26'),
(569, 'Kandhamal', '26'),
(570, 'Kendrapara', '26'),
(571, 'Kendujhar', '26'),
(572, 'Khordha', '26'),
(573, 'Koraput', '26'),
(574, 'Malkangiri', '26'),
(575, 'Mayurbhanj', '26'),
(576, 'Nabarangapur', '26'),
(577, 'Nayagarh', '26'),
(578, 'Nuapada', '26'),
(579, 'Puri', '26'),
(580, 'Rayagada', '26'),
(581, 'Rourkela', '26'),
(582, 'Sambalpur', '26'),
(583, 'Subarnapur', '26'),
(584, 'Sundergarh', '26'),
(585, 'Bahur', '27'),
(586, 'Karaikal', '27'),
(587, 'Mahe', '27'),
(588, 'Pondicherry', '27'),
(589, 'Purnankuppam', '27'),
(590, 'Valudavur', '27'),
(591, 'Villianur', '27'),
(592, 'Yanam', '27'),
(593, 'Amritsar', '28'),
(594, 'Barnala', '28'),
(595, 'Bathinda', '28'),
(596, 'Faridkot', '28'),
(597, 'Fatehgarh Sahib', '28'),
(598, 'Ferozepur', '28'),
(599, 'Gurdaspur', '28'),
(600, 'Hoshiarpur', '28'),
(601, 'Jalandhar', '28'),
(602, 'Kapurthala', '28'),
(603, 'Ludhiana', '28'),
(604, 'Mansa', '28'),
(605, 'Moga', '28'),
(606, 'Muktsar', '28'),
(607, 'Nawanshahr', '28'),
(608, 'Pathankot', '28'),
(609, 'Patiala', '28'),
(610, 'Rupnagar', '28'),
(611, 'Sangrur', '28'),
(612, 'SAS Nagar', '28'),
(613, 'Tarn Taran', '28'),
(614, 'Ajmer', '29'),
(615, 'Alwar', '29'),
(616, 'Banswara', '29'),
(617, 'Baran', '29'),
(618, 'Barmer', '29'),
(619, 'Bharatpur', '29'),
(620, 'Bhilwara', '29'),
(621, 'Bikaner', '29'),
(622, 'Bundi', '29'),
(623, 'Chittorgarh', '29'),
(624, 'Churu', '29'),
(625, 'Dausa', '29'),
(626, 'Dholpur', '29'),
(627, 'Dungarpur', '29'),
(628, 'Hanumangarh', '29'),
(629, 'Jaipur', '29'),
(630, 'Jaisalmer', '29'),
(631, 'Jalore', '29'),
(632, 'Jhalawar', '29'),
(633, 'Jhunjhunu', '29'),
(634, 'Jodhpur', '29'),
(635, 'Karauli', '29'),
(636, 'Kota', '29'),
(637, 'Nagaur', '29'),
(638, 'Pali', '29'),
(639, 'Pratapgarh', '29'),
(640, 'Rajsamand', '29'),
(641, 'Sawai Madhopur', '29'),
(642, 'Sikar', '29'),
(643, 'Sirohi', '29'),
(644, 'Sri Ganganagar', '29'),
(645, 'Tonk', '29'),
(646, 'Udaipur', '29'),
(647, 'Barmiak', '30'),
(648, 'Be', '30'),
(649, 'Bhurtuk', '30'),
(650, 'Chhubakha', '30'),
(651, 'Chidam', '30'),
(652, 'Chubha', '30'),
(653, 'Chumikteng', '30'),
(654, 'Dentam', '30'),
(655, 'Dikchu', '30'),
(656, 'Dzongri', '30'),
(657, 'Gangtok', '30'),
(658, 'Gauzing', '30'),
(659, 'Gyalshing', '30'),
(660, 'Hema', '30'),
(661, 'Kerung', '30'),
(662, 'Lachen', '30'),
(663, 'Lachung', '30'),
(664, 'Lema', '30'),
(665, 'Lingtam', '30'),
(666, 'Lungthu', '30'),
(667, 'Mangan', '30'),
(668, 'Namchi', '30'),
(669, 'Namthang', '30'),
(670, 'Nanga', '30'),
(671, 'Nantang', '30'),
(672, 'Naya Bazar', '30'),
(673, 'Padamachen', '30'),
(674, 'Pakhyong', '30'),
(675, 'Pemayangtse', '30'),
(676, 'Phensang', '30'),
(677, 'Rangli', '30'),
(678, 'Rinchingpong', '30'),
(679, 'Sakyong', '30'),
(680, 'Samdong', '30'),
(681, 'Singtam', '30'),
(682, 'Siniolchu', '30'),
(683, 'Sombari', '30'),
(684, 'Soreng', '30'),
(685, 'Sosing', '30'),
(686, 'Tekhug', '30'),
(687, 'Temi', '30'),
(688, 'Tsetang', '30'),
(689, 'Tsomgo', '30'),
(690, 'Tumlong', '30'),
(691, 'Yangang', '30'),
(692, 'Yumtang', '30'),
(693, 'Chennai', '31'),
(694, 'Chidambaram', '31'),
(695, 'Chingleput', '31'),
(696, 'Coimbatore', '31'),
(697, 'Courtallam', '31'),
(698, 'Cuddalore', '31'),
(699, 'Dharmapuri', '31'),
(700, 'Dindigul', '31'),
(701, 'Erode', '31'),
(702, 'Hosur', '31'),
(703, 'Kanchipuram', '31'),
(704, 'Kanyakumari', '31'),
(705, 'Karaikudi', '31'),
(706, 'Karur', '31'),
(707, 'Kodaikanal', '31'),
(708, 'Kovilpatti', '31'),
(709, 'Krishnagiri', '31'),
(710, 'Kumbakonam', '31'),
(711, 'Madurai', '31'),
(712, 'Mayiladuthurai', '31'),
(713, 'Nagapattinam', '31'),
(714, 'Nagarcoil', '31'),
(715, 'Namakkal', '31'),
(716, 'Neyveli', '31'),
(717, 'Nilgiris', '31'),
(718, 'Ooty', '31'),
(719, 'Palani', '31'),
(720, 'Perambalur', '31'),
(721, 'Pollachi', '31'),
(722, 'Pudukkottai', '31'),
(723, 'Rajapalayam', '31'),
(724, 'Ramanathapuram', '31'),
(725, 'Salem', '31'),
(726, 'Sivaganga', '31'),
(727, 'Sivakasi', '31'),
(728, 'Thanjavur', '31'),
(729, 'Theni', '31'),
(730, 'Thoothukudi', '31'),
(731, 'Tiruchirappalli', '31'),
(732, 'Tirunelveli', '31'),
(733, 'Tirupur', '31'),
(734, 'Tiruvallur', '31'),
(735, 'Tiruvannamalai', '31'),
(736, 'Tiruvarur', '31'),
(737, 'Trichy', '31'),
(738, 'Tuticorin', '31'),
(739, 'Vellore', '31'),
(740, 'Villupuram', '31'),
(741, 'Virudhunagar', '31'),
(742, 'Yercaud', '31'),
(743, 'Agartala', '32'),
(744, 'Ambasa', '32'),
(745, 'Bampurbari', '32'),
(746, 'Belonia', '32'),
(747, 'Dhalai', '32'),
(748, 'Dharam Nagar', '32'),
(749, 'Kailashahar', '32'),
(750, 'Kamal Krishnabari', '32'),
(751, 'Khopaiyapara', '32'),
(752, 'Khowai', '32'),
(753, 'Phuldungsei', '32'),
(754, 'Radha Kishore Pur', '32'),
(755, 'Tripura', '32'),
(756, 'Rohini', '29'),
(757, 'Rohini', '10'),
(758, 'Delhi', '10'),
(759, 'Howrah', '35'),
(760, 'Sarna Doongar', '29'),
(761, 'Bangalore', '17'),
(762, 'Bangaluru', '17'),
(763, 'Lucknow', '33'),
(764, 'Kanpur', '33'),
(765, 'Ghaziabad', '33'),
(766, 'Agra', '33'),
(767, 'Meerut', '33'),
(768, 'Varanasi', '33'),
(769, 'Allahabad', '33'),
(770, 'Bareilly', '33'),
(771, 'Aligarh', '33'),
(772, 'Moradabad', '33'),
(773, 'Saharanpur', '33'),
(774, 'Gorakhpur', '33'),
(775, 'Faizabad', '33'),
(776, 'Firozabad', '34'),
(777, 'Jhansi', '33'),
(778, 'Muzaffarnagar', '33'),
(779, 'Mathura-Veindavan', '33'),
(780, 'Budaun', '33'),
(781, 'Rampur', '33'),
(782, 'Shahjahanpur', '33'),
(783, 'Farrukhabad', '33'),
(784, 'Ayodhya cantt', '33'),
(785, 'MAU', '33'),
(786, 'Hapur', '33'),
(787, 'Noida', '33'),
(788, 'Etawah', '33'),
(789, 'Mirzapur', '33'),
(790, 'Bulandshahr', '33'),
(791, 'sambhal', '33'),
(792, 'Amraha', '33'),
(793, 'Hardoi', '33'),
(794, 'Fatehpur', '33'),
(795, 'Raebareli', '33'),
(796, 'Orai', '33'),
(797, 'Sitapur', '33'),
(798, 'Bahraich', '33'),
(799, 'Modinagar', '33'),
(800, 'Unnao', '33'),
(801, 'Jaunpur', '33'),
(802, 'Lakhimpur', '33'),
(803, 'Hathras', '33'),
(804, 'Banda', '33'),
(805, 'Pilibhit', '33'),
(806, 'Mughalsarai', '33'),
(807, 'Barabanki', '33'),
(808, 'Khurja', '33'),
(809, 'Gonda', '33'),
(810, 'Mainpuri', '33'),
(811, 'Lalitpur', '33'),
(812, 'Lalitpur', '33'),
(813, 'Etah', '33'),
(814, 'Deoria', '33'),
(815, 'ujhani', '33'),
(816, 'Ghazipur', '33'),
(817, 'Sultanpur', '33'),
(818, 'Azamgarh', '33'),
(819, 'Bijnor', '33'),
(820, 'Sahaswan', '33'),
(821, 'Basti', '33'),
(822, 'Chandausi', '33'),
(823, 'Akbarpur', '33'),
(824, 'Ballia', '33'),
(825, 'Tanda', '33'),
(826, 'Greater Noida', '33'),
(827, 'Shikohabad', '33'),
(828, 'Shamli', '33'),
(829, 'Awagarh', '33'),
(830, 'Kasganj', '33'),
(831, 'Maunath Bhanjan', '33'),
(832, 'Amroha', '33'),
(833, 'Fir', '33'),
(834, 'Firozabad', '33'),
(835, 'Jammu Tawi', '15');

-- --------------------------------------------------------

--
-- Table structure for table `all_states`
--

CREATE TABLE `all_states` (
  `id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `all_states`
--

INSERT INTO `all_states` (`id`, `state_name`) VALUES
(1, 'Andaman & Nicobar [AN]'),
(2, 'Andhra Pradesh [AP]'),
(3, 'Arunachal Pradesh [AR]'),
(4, 'Assam [AS]'),
(5, 'Bihar [BH]'),
(6, 'Chandigarh [CH]'),
(7, 'Chhattisgarh [CG]'),
(8, 'Dadra & Nagar Haveli [DN]'),
(9, 'Daman & Diu [DD]'),
(10, 'Delhi [DL]'),
(11, 'Goa [GO]'),
(12, 'Gujarat [GU]'),
(13, 'Haryana [HR]'),
(14, 'Himachal Pradesh [HP]'),
(15, 'Jammu & Kashmir [JK]'),
(16, 'Jharkhand [JH]'),
(17, 'Karnataka [KR]'),
(18, 'Kerala [KL]'),
(19, 'Lakshadweep [LD]'),
(20, 'Madhya Pradesh [MP]'),
(21, 'Maharashtra [MH]'),
(22, 'Manipur [MN]'),
(23, 'Meghalaya [ML]'),
(24, 'Mizoram [MM]'),
(25, 'Nagaland [NL]'),
(26, 'Orissa [OR]'),
(27, 'Pondicherry [PC]'),
(28, 'Punjab [PJ]'),
(29, 'Rajasthan [RJ]'),
(30, 'Sikkim [SK]'),
(31, 'Tamil Nadu [TN]'),
(32, 'Tripura [TR]'),
(33, 'Uttar Pradesh [UP]'),
(34, 'Uttaranchal [UT]'),
(35, 'West Bengal [WB]');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_sidebar`
--

CREATE TABLE `tbl_admin_sidebar` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `url` varchar(2000) NOT NULL,
  `sequence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_admin_sidebar`
--

INSERT INTO `tbl_admin_sidebar` (`id`, `name`, `url`, `sequence`) VALUES
(1, 'Dashboard', 'home', 1),
(2, 'Team', '#', 2),
(4, 'Slider', 'Slider/view_slider', 3),
(5, 'Banner', 'Banner/view_banner', 4),
(6, 'Users', 'Users/view_users', 18),
(7, 'Category', 'Category/view_category', 5),
(8, 'Subcategory', 'Subcategory/view_subcategory', 6),
(9, 'Product', 'Product/view_category', 7),
(10, 'Orders', '#', 11),
(11, 'Promocode', 'Promocode/view_promocode', 12),
(12, 'Testimonials', 'Testimonials/view_testimonials', 20),
(13, 'Contact Us Enquiry', 'Contact_us/view_contact_us', 24),
(14, 'Newsletter Subscriptions', 'Subscribe/view_subscribe', 18),
(15, 'Size', 'Size/view_size', 8),
(16, 'Colour', 'Colour/view_colour', 9),
(17, 'Percentage off', 'Percentage_off/view_percentage_off', 16),
(18, 'Pop-up Enquiry', 'Popup/view_popup', 15),
(19, 'Blog', 'Blog/view_blog', 19),
(20, 'Pop-up Image', 'Popup_Image/view_popup_image', 15),
(21, 'Shop By Category', 'Shop_By_Category/view_shop_by_category', 10),
(22, 'Filters', 'Filters/view_filters', 13),
(23, 'Resellers', '#', 17),
(24, 'Model', 'Model/view_model', 14),
(26, 'Replacement Orders', 'Replacement_order/view_replacement_order', 16),
(27, 'Payment Requests', 'Payment_requests/view_payment_requests', 23),
(28, 'Offer', 'Offer/view_offer', 15),
(29, 'Upload Image', 'Popup/view_upload_image', 30),
(30, 'Employee', 'Employee/view_employee', 25),
(31, 'Top Ten', 'Top_ten/view_top_ten_categories', 26);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_sidebar2`
--

CREATE TABLE `tbl_admin_sidebar2` (
  `id` int(11) NOT NULL,
  `main_id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `url` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_admin_sidebar2`
--

INSERT INTO `tbl_admin_sidebar2` (`id`, `main_id`, `name`, `url`) VALUES
(1, 2, 'View Team', 'system/view_team'),
(2, 2, 'Add Team', 'system/add_team'),
(3, 10, 'New orders', 'Order/view_order'),
(4, 10, 'Accepted Orders', 'Order/accepted_order'),
(5, 10, 'Dispatched Orders', 'Order/dispatched_order'),
(6, 10, 'Completed Orders', 'Order/completed_order'),
(7, 10, 'Rejected Orders', 'Order/cancelled_order'),
(8, 23, 'Pending Reseller', 'Reseller/pending_reseller'),
(9, 23, 'Approved Reseller', 'Reseller/approved_reseller'),
(10, 23, 'Rejected Reseller', 'Reseller/rejected_reseller');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attribute`
--

CREATE TABLE `tbl_attribute` (
  `id` int(11) NOT NULL,
  `filter_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `is_active` int(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_badmin_sidebar`
--

CREATE TABLE `tbl_badmin_sidebar` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `url` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_badmin_sidebar`
--

INSERT INTO `tbl_badmin_sidebar` (`id`, `name`, `url`) VALUES
(1, 'Dashboard', 'home'),
(2, 'Team', '#'),
(4, 'Vendor', 'Vendor/view_vendor'),
(5, 'Orders', 'Orders/view_orders'),
(6, 'Tailoring', '#'),
(7, 'Cart', 'Cart/view_cart'),
(8, 'Alteration', 'Alteration/view_alteration'),
(9, 'Alteration Cost', 'Alteration_cost/view_alteration_cost');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_badmin_sidebar2`
--

CREATE TABLE `tbl_badmin_sidebar2` (
  `id` int(11) NOT NULL,
  `main_id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `url` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_badmin_sidebar2`
--

INSERT INTO `tbl_badmin_sidebar2` (`id`, `main_id`, `name`, `url`) VALUES
(1, 2, 'View Team', 'system/view_team'),
(2, 2, 'Add Team', 'system/add_team'),
(3, 6, 'Recipt No.', 'Reciptno/view_Reciptno');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `added_by` int(100) NOT NULL,
  `is_active` int(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `full_description` mediumtext DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `keyword` varchar(500) DEFAULT NULL,
  `dsc` varchar(500) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `user_type` int(11) DEFAULT 1,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart2`
--

CREATE TABLE `tbl_cart2` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `percentage_id` int(11) DEFAULT 0,
  `quantity` varchar(100) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `seq` int(11) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `added_by` int(100) DEFAULT NULL,
  `is_active` int(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_colour`
--

CREATE TABLE `tbl_colour` (
  `id` int(11) NOT NULL,
  `colour_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `is_active` int(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_us`
--

CREATE TABLE `tbl_contact_us` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `added_by` int(100) DEFAULT NULL,
  `is_active` int(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `authentication` varchar(255) DEFAULT NULL,
  `ip` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `is_active` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_filters`
--

CREATE TABLE `tbl_filters` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `is_active` int(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_forgot_pass`
--

CREATE TABLE `tbl_forgot_pass` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory_transaction`
--

CREATE TABLE `tbl_inventory_transaction` (
  `id` int(11) NOT NULL,
  `order1_id` int(11) DEFAULT NULL,
  `order2_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `old_inventory` int(11) DEFAULT NULL,
  `new_inventory` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_model_products`
--

CREATE TABLE `tbl_model_products` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offer`
--

CREATE TABLE `tbl_offer` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order1`
--

CREATE TABLE `tbl_order1` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reseller_id` varchar(255) DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  `promocode` int(11) DEFAULT NULL,
  `promo_discount` float DEFAULT NULL,
  `percentage_discount` varchar(255) DEFAULT NULL,
  `final_amount` float DEFAULT NULL,
  `shipping` float DEFAULT NULL,
  `ship_rocket` float DEFAULT NULL,
  `payment_type` int(11) DEFAULT NULL COMMENT '1 for COD , 2 for online payment',
  `payment_status` int(11) DEFAULT NULL COMMENT '0 for pending , 1 for succeed',
  `order_status` int(11) DEFAULT NULL COMMENT '1 for orderPlaced , 2 for orderAccepted , 3 for orderDispatched , 4 for orderCompleted , 5 for rejected, 6 for cancelled by user',
  `order_type` varchar(255) DEFAULT NULL COMMENT '1 for online,2 for offline',
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `vendor_code` varchar(255) DEFAULT NULL,
  `gstin` varchar(255) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `refererral_code` varchar(255) DEFAULT NULL,
  `ref_points` varchar(255) DEFAULT NULL,
  `txnid` varchar(255) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `length` varchar(500) DEFAULT NULL,
  `breadth` varchar(500) DEFAULT NULL,
  `height` varchar(500) DEFAULT NULL,
  `weight` varchar(500) DEFAULT NULL,
  `sr_order_id` varchar(500) DEFAULT NULL,
  `sr_shipping_id` varchar(500) DEFAULT NULL,
  `courier_id` varchar(500) DEFAULT NULL,
  `awb_code` varchar(255) DEFAULT NULL,
  `pickup_scheduled_date` varchar(255) DEFAULT NULL,
  `courier_name` varchar(255) DEFAULT NULL,
  `shiprocket_label` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `invoice_no` int(11) UNSIGNED ZEROFILL DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(1000) DEFAULT NULL,
  `delivered_date` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order2`
--

CREATE TABLE `tbl_order2` (
  `id` int(100) NOT NULL,
  `main_id` varchar(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `model_id` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` varchar(100) NOT NULL,
  `mrp` varchar(255) DEFAULT NULL,
  `gst` varchar(255) DEFAULT NULL,
  `selling_price` varchar(255) DEFAULT NULL,
  `spgst` varchar(255) DEFAULT NULL,
  `percentage_id` int(11) DEFAULT NULL,
  `percentage_discount` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `reference_code` varchar(255) DEFAULT NULL,
  `ref_points` varchar(255) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_otp`
--

CREATE TABLE `tbl_otp` (
  `id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `temp_id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_percentage`
--

CREATE TABLE `tbl_percentage` (
  `id` int(11) NOT NULL,
  `percentage` int(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `is_active` int(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_points_transation`
--

CREATE TABLE `tbl_points_transation` (
  `id` int(11) NOT NULL,
  `model_id` int(11) DEFAULT NULL,
  `available_points` varchar(255) DEFAULT NULL,
  `req_points` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `completed_date` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_popup`
--

CREATE TABLE `tbl_popup` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `is_active` int(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_popup_image`
--

CREATE TABLE `tbl_popup_image` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `ip` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `is_active` int(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(100) NOT NULL,
  `category_id` varchar(100) DEFAULT NULL,
  `subcategory_id` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `hsn_code` varchar(255) DEFAULT NULL,
  `vendor_code` varchar(255) DEFAULT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `product_view` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `exclusive` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `trending` varchar(255) DEFAULT NULL,
  `buy_with` varchar(255) DEFAULT NULL,
  `filter_ids` text DEFAULT NULL,
  `filter_attributes` text DEFAULT NULL,
  `all_attributes` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `cat_active` int(11) NOT NULL DEFAULT 1,
  `subcat_active` int(11) NOT NULL DEFAULT 1,
  `all_filters` text DEFAULT NULL,
  `top_ten` int(11) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `added_by` int(100) DEFAULT NULL,
  `is_active` int(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `keyword` varchar(500) DEFAULT NULL,
  `dsc` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_review`
--

CREATE TABLE `tbl_product_review` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `star_rating` int(11) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promocode`
--

CREATE TABLE `tbl_promocode` (
  `id` int(11) NOT NULL,
  `promocode` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `percentage_amount` varchar(255) DEFAULT NULL,
  `ptype` varchar(255) DEFAULT NULL,
  `minorder` varchar(255) DEFAULT NULL,
  `max` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `ip` varchar(300) DEFAULT NULL,
  `added_by` varchar(1111) DEFAULT NULL,
  `is_active` varchar(200) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_replacement_order`
--

CREATE TABLE `tbl_replacement_order` (
  `id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `order1_id` int(11) DEFAULT NULL,
  `order2_id` int(11) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `image5` varchar(255) DEFAULT NULL,
  `image6` varchar(255) DEFAULT NULL,
  `replace_status` varchar(255) DEFAULT NULL COMMENT '0 for pending, 1 for accepted,3 for rejected',
  `ip` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reseller`
--

CREATE TABLE `tbl_reseller` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `shop` varchar(255) DEFAULT NULL,
  `gst_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `reseller_status` int(11) DEFAULT NULL COMMENT '0 for pending,1 for approved and 2 for rejected',
  `ip` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop_by_category`
--

CREATE TABLE `tbl_shop_by_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `is_active` int(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_size`
--

CREATE TABLE `tbl_size` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `added_by` int(255) DEFAULT NULL,
  `is_active` int(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `link` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `added_by` int(100) NOT NULL,
  `is_active` int(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `id` int(11) NOT NULL,
  `category_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `ip` varchar(100) NOT NULL,
  `added_by` int(100) NOT NULL,
  `is_active` int(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscribe`
--

CREATE TABLE `tbl_subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `is_active` int(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE `tbl_team` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `address` varchar(2000) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `power` int(11) NOT NULL,
  `services` varchar(1000) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `added_by` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`id`, `name`, `email`, `password`, `phone`, `address`, `image`, `power`, `services`, `ip`, `date`, `added_by`, `is_active`) VALUES
(1, 'Super Admin', 'demo@gmail.com', '202cb962ac59075b964b07152d234b70', '1234567890', 'POSHIDA STORE', '', 1, '[\"999\"]', '49.36.235.129', '2022-10-07 23:58:57', 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team2`
--

CREATE TABLE `tbl_team2` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `address` varchar(2000) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `power` int(11) NOT NULL,
  `employee` int(11) DEFAULT NULL,
  `services` varchar(1000) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `added_by` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_team2`
--

INSERT INTO `tbl_team2` (`id`, `name`, `email`, `password`, `phone`, `address`, `image`, `power`, `employee`, `services`, `ip`, `date`, `added_by`, `is_active`) VALUES
(1, 'Anay Pareek', 'anaypareek@rocketmail.com', '9ffd3dfaf18c6c0dededaba5d7db9375', '9799655891', '19 kalyanpuri new sanganer road sodala', '', 1, NULL, '[\"999\"]', '1000000', '16-05-2018', 1, 1),
(19, 'Demo', 'demo@gmail.com', 'f702c1502be8e55f4208d69419f50d0a', '9999999999', 'jaipur', NULL, 1, NULL, '[\"999\"]', '::1', '2020-01-04 18:12:55', 1, 1),
(29, 'Animesh Sharma', 'animesh.skyline@gmail.com', '8bda6fe26dad2b31f9cb9180ec3823e8', '8441849182', 'pratap nagar sitapura jaipur', '', 2, NULL, '[\"999\"]', '::1', '2020-01-06 14:47:11', 1, 1),
(30, 'Alex', 'employee@gmail.com', 'cd6d3b2f8c16ae99c0cf417883666971', '', '', '', 3, 1, '[\"999\"]', '::1', '2021-12-17 20:36:22', 19, 1),
(31, 'tom', 'tom@gmail.com', '202cb962ac59075b964b07152d234b70', '', '', '', 3, 1, '[\"999\"]', '::1', '2021-12-17 20:36:22', 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonials`
--

CREATE TABLE `tbl_testimonials` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `added_by` int(100) DEFAULT NULL,
  `is_active` int(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `id` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `size_id` varchar(255) DEFAULT NULL,
  `colour_id` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `image5` varchar(255) DEFAULT NULL,
  `image6` varchar(255) DEFAULT NULL,
  `retailer_mrp` int(11) DEFAULT 0,
  `retailer_sp` int(11) DEFAULT 0,
  `retailer_gst` int(11) DEFAULT 0,
  `retailer_spgst` decimal(7,2) DEFAULT 0.00,
  `reseller_mrp` int(11) DEFAULT 0,
  `reseller_sp` int(11) DEFAULT 0,
  `reseller_gst` int(11) DEFAULT 0,
  `reseller_spgst` decimal(7,2) DEFAULT 0.00,
  `reseller_min_qty` int(11) DEFAULT 1,
  `inventory` varchar(255) DEFAULT NULL,
  `t_code` varchar(255) DEFAULT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `barcode_image` varchar(255) DEFAULT NULL,
  `barcode_tag_image` varchar(255) DEFAULT NULL,
  `ip` varchar(100) NOT NULL,
  `is_active` int(100) NOT NULL,
  `added_by` int(100) NOT NULL,
  `color_active` int(11) DEFAULT 1,
  `size_active` int(11) DEFAULT 1,
  `date` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `f_name` varchar(100) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `is_model` varchar(255) DEFAULT NULL,
  `total_points` varchar(255) DEFAULT NULL,
  `reference_code` varchar(255) DEFAULT NULL,
  `ip` int(100) DEFAULT NULL,
  `is_active` int(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_temp`
--

CREATE TABLE `tbl_user_temp` (
  `id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `gst_no` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `ip` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_cities`
--
ALTER TABLE `all_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_states`
--
ALTER TABLE `all_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_sidebar`
--
ALTER TABLE `tbl_admin_sidebar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_sidebar2`
--
ALTER TABLE `tbl_admin_sidebar2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_attribute`
--
ALTER TABLE `tbl_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_badmin_sidebar`
--
ALTER TABLE `tbl_badmin_sidebar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_badmin_sidebar2`
--
ALTER TABLE `tbl_badmin_sidebar2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart2`
--
ALTER TABLE `tbl_cart2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_colour`
--
ALTER TABLE `tbl_colour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_filters`
--
ALTER TABLE `tbl_filters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_forgot_pass`
--
ALTER TABLE `tbl_forgot_pass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_inventory_transaction`
--
ALTER TABLE `tbl_inventory_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_model_products`
--
ALTER TABLE `tbl_model_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_offer`
--
ALTER TABLE `tbl_offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order1`
--
ALTER TABLE `tbl_order1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order2`
--
ALTER TABLE `tbl_order2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_percentage`
--
ALTER TABLE `tbl_percentage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_points_transation`
--
ALTER TABLE `tbl_points_transation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_popup`
--
ALTER TABLE `tbl_popup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_popup_image`
--
ALTER TABLE `tbl_popup_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_review`
--
ALTER TABLE `tbl_product_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_promocode`
--
ALTER TABLE `tbl_promocode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_replacement_order`
--
ALTER TABLE `tbl_replacement_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reseller`
--
ALTER TABLE `tbl_reseller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shop_by_category`
--
ALTER TABLE `tbl_shop_by_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_size`
--
ALTER TABLE `tbl_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subscribe`
--
ALTER TABLE `tbl_subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_team2`
--
ALTER TABLE `tbl_team2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_testimonials`
--
ALTER TABLE `tbl_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_temp`
--
ALTER TABLE `tbl_user_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_cities`
--
ALTER TABLE `all_cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=836;

--
-- AUTO_INCREMENT for table `all_states`
--
ALTER TABLE `all_states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_admin_sidebar`
--
ALTER TABLE `tbl_admin_sidebar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_admin_sidebar2`
--
ALTER TABLE `tbl_admin_sidebar2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_attribute`
--
ALTER TABLE `tbl_attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_badmin_sidebar`
--
ALTER TABLE `tbl_badmin_sidebar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_badmin_sidebar2`
--
ALTER TABLE `tbl_badmin_sidebar2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cart2`
--
ALTER TABLE `tbl_cart2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_colour`
--
ALTER TABLE `tbl_colour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_filters`
--
ALTER TABLE `tbl_filters`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_forgot_pass`
--
ALTER TABLE `tbl_forgot_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_inventory_transaction`
--
ALTER TABLE `tbl_inventory_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_model_products`
--
ALTER TABLE `tbl_model_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_offer`
--
ALTER TABLE `tbl_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order1`
--
ALTER TABLE `tbl_order1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order2`
--
ALTER TABLE `tbl_order2`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_percentage`
--
ALTER TABLE `tbl_percentage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_points_transation`
--
ALTER TABLE `tbl_points_transation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_popup`
--
ALTER TABLE `tbl_popup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_popup_image`
--
ALTER TABLE `tbl_popup_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product_review`
--
ALTER TABLE `tbl_product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_promocode`
--
ALTER TABLE `tbl_promocode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_replacement_order`
--
ALTER TABLE `tbl_replacement_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_reseller`
--
ALTER TABLE `tbl_reseller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_shop_by_category`
--
ALTER TABLE `tbl_shop_by_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_size`
--
ALTER TABLE `tbl_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_subscribe`
--
ALTER TABLE `tbl_subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_team2`
--
ALTER TABLE `tbl_team2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_testimonials`
--
ALTER TABLE `tbl_testimonials`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user_temp`
--
ALTER TABLE `tbl_user_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
