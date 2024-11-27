-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2024 at 12:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mat_que`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uname` varchar(10) NOT NULL,
  `psw` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uname`, `psw`) VALUES
('admin', '11');

-- --------------------------------------------------------

--
-- Table structure for table `department_data`
--

CREATE TABLE `department_data` (
  `id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `allocated_department` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `mat` varchar(100) NOT NULL,
  `que` varchar(100) NOT NULL,
  `cyear` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `dep` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `rollno` varchar(50) NOT NULL,
  `study` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `department` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `joining_date` date NOT NULL,
  `staff_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `department` varchar(50) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `semester` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `department`, `subject_code`, `subject_name`, `semester`) VALUES
(1, 'BE MECH', 'ME101', 'Engineering Mechanics', 1),
(2, 'BE MECH', 'ME102', 'Thermodynamics', 1),
(3, 'BE MECH', 'ME103', 'Fluid Mechanics', 2),
(4, 'BE MECH', 'ME104', 'Heat Transfer', 2),
(5, 'BE MECH', 'ME105', 'Material Science', 3),
(6, 'BE MECH', 'ME106', 'Machine Design', 3),
(7, 'BE MECH', 'ME107', 'Engineering Drawing', 1),
(8, 'BE MECH', 'ME108', 'Control Engineering', 4),
(9, 'BE MECH', 'ME109', 'Manufacturing Processes', 4),
(10, 'BE MECH', 'ME110', 'Industrial Engineering', 5),
(11, 'BE MECH', 'ME111', 'Dynamics of Machinery', 5),
(12, 'BE MECH', 'ME112', 'Advanced Thermodynamics', 6),
(13, 'BE MECH', 'ME113', 'Hydraulics and Pneumatics', 6),
(14, 'BE MECH', 'ME114', 'Vibrations', 7),
(15, 'BE MECH', 'ME115', 'Robotics', 7),
(16, 'BE MECH', 'ME116', 'Renewable Energy', 8),
(17, 'BE MECH', 'ME117', 'Computational Mechanics', 8),
(18, 'BE MECH', 'ME118', 'Environmental Engineering', 5),
(19, 'BE MECH', 'ME119', 'Automobile Engineering', 6),
(20, 'BE MECH', 'ME120', 'Power Plant Engineering', 6),
(21, 'BE MECH', 'ME121', 'Welding Technology', 5),
(22, 'BE MECH', 'ME122', 'Non-Destructive Testing', 7),
(23, 'BE MECH', 'ME123', 'CAD/CAM', 7),
(24, 'BE MECH', 'ME124', 'Biomechanics', 8),
(25, 'BE MECH', 'ME125', 'Nano Technology', 8),
(26, 'BE MECH', 'ME126', 'Industrial Safety', 8),
(27, 'BE MECH', 'ME127', 'Supply Chain Management', 8),
(28, 'BE MECH', 'ME128', 'Lean Manufacturing', 7),
(29, 'BE MECH', 'ME129', 'Project Management', 8),
(30, 'BE MECH', 'ME130', 'Entrepreneurship Development', 8),
(31, 'BE CIVIL', 'CE101', 'Engineering Drawing', 1),
(32, 'BE CIVIL', 'CE102', 'Structural Analysis', 2),
(33, 'BE CIVIL', 'CE103', 'Hydraulics', 3),
(34, 'BE CIVIL', 'CE104', 'Soil Mechanics', 3),
(35, 'BE CIVIL', 'CE105', 'Building Materials', 1),
(36, 'BE CIVIL', 'CE106', 'Surveying', 2),
(37, 'BE CIVIL', 'CE107', 'Concrete Technology', 3),
(38, 'BE CIVIL', 'CE108', 'Transportation Engineering', 4),
(39, 'BE CIVIL', 'CE109', 'Water Resources Engineering', 5),
(40, 'BE CIVIL', 'CE110', 'Environmental Engineering', 5),
(41, 'BE CIVIL', 'CE111', 'Geotechnical Engineering', 5),
(42, 'BE CIVIL', 'CE112', 'Construction Planning', 6),
(43, 'BE CIVIL', 'CE113', 'Structural Design', 6),
(44, 'BE CIVIL', 'CE114', 'Highway Engineering', 7),
(45, 'BE CIVIL', 'CE115', 'Bridge Engineering', 7),
(46, 'BE CIVIL', 'CE116', 'Town Planning', 8),
(47, 'BE CIVIL', 'CE117', 'Irrigation Engineering', 8),
(48, 'BE CIVIL', 'CE118', 'Estimating and Costing', 6),
(49, 'BE CIVIL', 'CE119', 'Advanced Surveying', 7),
(50, 'BE CIVIL', 'CE120', 'Earthquake Engineering', 6),
(51, 'BE CIVIL', 'CE121', 'Pavement Design', 5),
(52, 'BE CIVIL', 'CE122', 'Remote Sensing', 7),
(53, 'BE CIVIL', 'CE123', 'GIS', 7),
(54, 'BE CIVIL', 'CE124', 'Coastal Engineering', 8),
(55, 'BE CIVIL', 'CE125', 'Waste Management', 8),
(56, 'BE CIVIL', 'CE126', 'Sustainable Development', 8),
(57, 'BE CIVIL', 'CE127', 'Urban Transportation', 8),
(58, 'BE CIVIL', 'CE128', 'Structural Dynamics', 7),
(59, 'BE CIVIL', 'CE129', 'Construction Technology', 8),
(60, 'BE CIVIL', 'CE130', 'Project Management', 8),
(61, 'CSE', 'CS101', 'Introduction to Programming', 1),
(62, 'CSE', 'CS102', 'Data Structures', 2),
(63, 'CSE', 'CS103', 'Database Management Systems', 3),
(64, 'CSE', 'CS104', 'Computer Networks', 4),
(65, 'CSE', 'CS105', 'Operating Systems', 3),
(66, 'CSE', 'CS106', 'Discrete Mathematics', 1),
(67, 'CSE', 'CS107', 'Algorithms', 3),
(68, 'CSE', 'CS108', 'Software Engineering', 4),
(69, 'CSE', 'CS109', 'Theory of Computation', 5),
(70, 'CSE', 'CS110', 'Compiler Design', 5),
(71, 'CSE', 'CS111', 'Artificial Intelligence', 6),
(72, 'CSE', 'CS112', 'Machine Learning', 6),
(73, 'CSE', 'CS113', 'Cloud Computing', 7),
(74, 'CSE', 'CS114', 'Cyber Security', 7),
(75, 'CSE', 'CS115', 'Data Mining', 7),
(76, 'CSE', 'CS116', 'Web Development', 5),
(77, 'CSE', 'CS117', 'Mobile Application Development', 5),
(78, 'CSE', 'CS118', 'Internet of Things', 6),
(79, 'CSE', 'CS119', 'Big Data Analytics', 7),
(80, 'CSE', 'CS120', 'Parallel Computing', 6),
(81, 'CSE', 'CS121', 'Blockchain Technology', 8),
(82, 'CSE', 'CS122', 'Natural Language Processing', 8),
(83, 'CSE', 'CS123', 'Ethical Hacking', 8),
(84, 'CSE', 'CS124', 'Augmented Reality', 8),
(85, 'CSE', 'CS125', 'Deep Learning', 8),
(86, 'CSE', 'CS126', 'Embedded Systems', 6),
(87, 'CSE', 'CS127', 'Quantum Computing', 7),
(88, 'CSE', 'CS128', 'Information Retrieval', 8),
(89, 'CSE', 'CS129', 'Computer Vision', 7),
(90, 'CSE', 'CS130', 'Human-Computer Interaction', 7),
(91, 'EEE', 'EE101', 'Basic Electrical Engineering', 1),
(92, 'EEE', 'EE102', 'Circuit Theory', 2),
(93, 'EEE', 'EE103', 'Electromagnetic Fields', 3),
(94, 'EEE', 'EE104', 'Electrical Machines I', 3),
(95, 'EEE', 'EE105', 'Control Systems', 4),
(96, 'EEE', 'EE106', 'Power Electronics', 4),
(97, 'EEE', 'EE107', 'Microcontrollers', 5),
(98, 'EEE', 'EE108', 'Power Systems', 5),
(99, 'EEE', 'EE109', 'Digital Signal Processing', 5),
(100, 'EEE', 'EE110', 'High Voltage Engineering', 6),
(101, 'EEE', 'EE111', 'Renewable Energy Systems', 6),
(102, 'EEE', 'EE112', 'Electrical Machines II', 6),
(103, 'EEE', 'EE113', 'Energy Storage Systems', 7),
(104, 'EEE', 'EE114', 'Electric Drives', 7),
(105, 'EEE', 'EE115', 'Smart Grid', 7),
(106, 'EEE', 'EE116', 'Embedded Systems', 6),
(107, 'EEE', 'EE117', 'Advanced Control Systems', 7),
(108, 'EEE', 'EE118', 'Power Plant Engineering', 6),
(109, 'EEE', 'EE119', 'Industrial Automation', 7),
(110, 'EEE', 'EE120', 'Electrical Design', 8),
(111, 'EEE', 'EE121', 'Robotics', 8),
(112, 'EEE', 'EE122', 'Biomedical Instrumentation', 8),
(113, 'EEE', 'EE123', 'Solar Energy Technology', 8),
(114, 'EEE', 'EE124', 'Wind Energy Systems', 8),
(115, 'EEE', 'EE125', 'Electric Vehicles', 8),
(116, 'EEE', 'EE126', 'Energy Management', 7),
(117, 'EEE', 'EE127', 'HVDC Transmission', 7),
(118, 'EEE', 'EE128', 'Flexible AC Transmission', 8),
(119, 'EEE', 'EE129', 'Power Quality', 7),
(120, 'EEE', 'EE130', 'Smart Sensors', 7),
(121, 'ECE', 'EC101', 'Analog Electronics', 1),
(122, 'ECE', 'EC102', 'Digital Electronics', 2),
(123, 'ECE', 'EC103', 'Signals and Systems', 3),
(124, 'ECE', 'EC104', 'Network Theory', 3),
(125, 'ECE', 'EC105', 'Microprocessors', 4),
(126, 'ECE', 'EC106', 'Communication Systems', 4),
(127, 'ECE', 'EC107', 'Electromagnetics', 5),
(128, 'ECE', 'EC108', 'Antennas and Propagation', 5),
(129, 'ECE', 'EC109', 'VLSI Design', 5),
(130, 'ECE', 'EC110', 'Digital Signal Processing', 6),
(131, 'ECE', 'EC111', 'Embedded Systems', 6),
(132, 'ECE', 'EC112', 'Optical Communication', 6),
(133, 'ECE', 'EC113', 'Wireless Communication', 7),
(134, 'ECE', 'EC114', 'Microwave Engineering', 7),
(135, 'ECE', 'EC115', 'Image Processing', 7),
(136, 'ECE', 'EC116', 'Radar Systems', 8),
(137, 'ECE', 'EC117', 'Satellite Communication', 8),
(138, 'ECE', 'EC118', 'Biomedical Engineering', 6),
(139, 'ECE', 'EC119', 'Internet of Things', 7),
(140, 'ECE', 'EC120', 'Nanotechnology', 8),
(141, 'ECE', 'EC121', 'Data Communication', 8),
(142, 'ECE', 'EC122', 'Robotics', 8),
(143, 'ECE', 'EC123', 'Wearable Electronics', 8),
(144, 'ECE', 'EC124', 'Artificial Intelligence in ECE', 8),
(145, 'ECE', 'EC125', 'Sensor Networks', 8),
(146, 'ECE', 'EC126', 'Telecommunication Systems', 6),
(147, 'ECE', 'EC127', 'Digital Image Processing', 7),
(148, 'ECE', 'EC128', 'Multimedia Communication', 7),
(149, 'ECE', 'EC129', 'Control Systems', 5),
(150, 'ECE', 'EC130', 'Cyber-Physical Systems', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department_data`
--
ALTER TABLE `department_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `staff_id` (`staff_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department_data`
--
ALTER TABLE `department_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
