-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2018 at 12:49 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school_nn`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `study_year_id` int(11) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `level_id`, `school_id`, `study_year_id`) VALUES
(1, 1, 1, 4),
(2, 1, 1, 5),
(3, 2, 1, 3),
(4, 3, 2, 7),
(5, 3, 2, 8),
(6, 3, 2, 9),
(7, 1, 3, 4),
(9, 1, 3, 6),
(10, 1, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE IF NOT EXISTS `doctors` (
  `doctor_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_name` varchar(50) NOT NULL,
  PRIMARY KEY (`doctor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `doc_name`) VALUES
(1, 'ali modamed'),
(2, 'Mostafa Mahmod'),
(3, 'nader elsayd'),
(4, 'Ashraf ali'),
(5, 'Khaled Nor');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_dates`
--

CREATE TABLE IF NOT EXISTS `doctor_dates` (
  `date_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `day` varchar(50) NOT NULL,
  PRIMARY KEY (`date_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `doctor_dates`
--

INSERT INTO `doctor_dates` (`date_id`, `doctor_id`, `time_from`, `time_to`, `day`) VALUES
(3, 4, '14:00:00', '16:00:00', 'الاربعاء'),
(4, 3, '16:00:00', '18:00:00', 'السبت'),
(5, 2, '18:00:00', '20:00:00', 'السبت'),
(6, 4, '08:00:00', '10:00:00', 'الاربعاء'),
(7, 2, '14:00:00', '16:00:00', 'الجمعه');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE IF NOT EXISTS `fees` (
  `fees_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `pays` decimal(6,2) NOT NULL,
  `school_id` int(11) NOT NULL,
  `date_of_pays` date NOT NULL,
  PRIMARY KEY (`fees_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`fees_id`, `student_id`, `pays`, `school_id`, `date_of_pays`) VALUES
(1, 1, '56.00', 1, '2018-05-08'),
(2, 1, '20.00', 1, '2018-05-08'),
(3, 4, '25.00', 1, '2018-05-08'),
(4, 4, '60.00', 1, '2018-05-08'),
(5, 2, '36.00', 1, '2018-05-08'),
(6, 2, '95.00', 1, '2018-05-08'),
(7, 3, '96.00', 1, '2018-05-08'),
(8, 5, '40.00', 2, '2018-05-08'),
(9, 9, '96.00', 2, '2018-05-08'),
(10, 8, '75.00', 2, '2018-05-08'),
(11, 6, '65.00', 3, '2018-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_name1` varchar(255) NOT NULL,
  `img_name2` varchar(255) NOT NULL,
  `img_name3` varchar(255) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_id`, `img_name1`, `img_name2`, `img_name3`) VALUES
(1, 'صورة?_?_?_٩.jpg', 'صورة?_?_١?_-_Copy.jpg', ''),
(2, 'صورة?_?_١٢_-_Copy.jpg', 'صورة?_?_١٢_001.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level_name`) VALUES
(1, 'الابتدائية'),
(2, 'الاعدادية'),
(3, 'الثانوية');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) NOT NULL,
  `page_link` varchar(255) NOT NULL,
  `sub_pages` text NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_name`, `page_link`, `sub_pages`) VALUES
(1, 'المستخدمين', 'Users_admin/users_actions', 'Users_admin/users_actions,Users_admin/add_user,Users_admin/edit_user,Users_admin/update_user,Users_admin/delete_user,Users_admin/get_instance'),
(2, 'الطلاب', 'Users_admin/students_actions', 'Users_admin/__construct,Users_admin/get_valid_username,Users_admin/add_student,Users_admin/years_study,Users_admin/year_study,Users_admin/select_fees,Users_admin/edit_student,Users_admin/update_student,Users_admin/students_actions,Users_admin/delete_student,Users_admin/get_instance'),
(3, 'المدارس', 'Schools_admin/schools_actions', 'Schools_admin/__construct,Schools_admin/schools_actions,Schools_admin/edit_school,Schools_admin/add_school,Schools_admin/update_school,Schools_admin/delete_school,Schools_admin/get_instance\n'),
(4, 'المراحل', 'Levels_admin/levels_actions', 'Levels_admin/__construct,Levels_admin/get_levels,Levels_admin/levels_actions,Levels_admin/edit_level,Levels_admin/add_level,Levels_admin/update_level,Levels_admin/delete_level,Levels_admin/get_instance'),
(5, 'الصفوف', 'Years_admin/years_actions', 'Years_admin/__construct,Years_admin/add_year,Years_admin/edit_year,Years_admin/update_year,Years_admin/years_actions,Years_admin/delete_year,Years_admin/get_instance\n'),
(6, 'الفصول', 'Classes_admin/classes_actions', 'Classes_admin/__construct,Classes_admin/add_class,Classes_admin/edit_class,Classes_admin/update_class,Classes_admin/classes_actions,Classes_admin/delete_class,Classes_admin/get_instance'),
(7, 'المركبات', 'Users_admin/transports_actions', 'Users_admin/transports_actions,Users_admin/price_transport,Users_admin/add_transport,Users_admin/edit_transport,Users_admin/update_transport,Users_admin/delete_transport'),
(8, 'الصلاحيات', 'Permissions_admin/permissions_actions', 'Permissions_admin/__construct,Permissions_admin/permissions_actions,Permissions_admin/edit_permission,Permissions_admin/add_permission,Permissions_admin/update_permission,Permissions_admin/delete_permission,Permissions_admin/get_instance'),
(9, 'الرسوم الدراسية', 'Users_admin/fees_actions', 'Users_admin/fees_actions,Users_admin/class_school_id,Users_admin/student_byClass_id,Users_admin/calculate_fees,Users_admin/addTofees'),
(10, 'التقارير', 'Users_admin/reports_actions', 'Users_admin/reports_actions,Users_admin/report_by_date'),
(11, 'مواعيد', 'Doctors/doctors_actions', 'Doctors/doctors_actions,Doctors/add,Doctors/delete_date'),
(12, 'حجز كشف', 'Doctors/patients_actions', 'Doctors/patients_actions');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `resev_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `day` varchar(50) NOT NULL,
  `time` time NOT NULL,
  `date_id` int(11) NOT NULL,
  PRIMARY KEY (`resev_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`resev_id`, `doctor_id`, `day`, `time`, `date_id`) VALUES
(25, 2, 'السبت', '18:00:00', 5),
(26, 2, 'السبت', '18:20:00', 5),
(27, 2, 'السبت', '18:40:00', 5),
(28, 2, 'السبت', '19:00:00', 5),
(29, 2, 'السبت', '19:20:00', 5),
(30, 2, 'السبت', '19:40:00', 5),
(31, 4, 'الاربعاء', '08:00:00', 6),
(32, 4, 'الاربعاء', '08:20:00', 6),
(33, 4, 'الاربعاء', '08:40:00', 6),
(34, 4, 'الاربعاء', '09:00:00', 6),
(35, 4, 'الاربعاء', '09:20:00', 6),
(36, 4, 'الاربعاء', '09:40:00', 6),
(37, 5, 'الاحد', '12:00:00', 0),
(38, 5, 'الاحد', '12:20:00', 0),
(39, 5, 'الاحد', '12:40:00', 0),
(40, 5, 'الاحد', '13:00:00', 0),
(41, 5, 'الاحد', '13:20:00', 0),
(42, 5, 'الاحد', '13:40:00', 0),
(43, 2, 'الجمعه', '14:00:00', 7),
(44, 2, 'الجمعه', '14:20:00', 7),
(45, 2, 'الجمعه', '14:40:00', 7),
(46, 2, 'الجمعه', '15:00:00', 7),
(47, 2, 'الجمعه', '15:20:00', 7),
(48, 2, 'الجمعه', '15:40:00', 7),
(49, 3, 'السبت', '16:00:00', 4),
(50, 3, 'السبت', '16:20:00', 4),
(51, 3, 'السبت', '16:40:00', 4),
(52, 3, 'السبت', '17:00:00', 4),
(53, 3, 'السبت', '17:20:00', 4),
(54, 3, 'السبت', '17:40:00', 4),
(55, 4, 'الاربعاء', '14:00:00', 3),
(56, 4, 'الاربعاء', '14:20:00', 3),
(57, 4, 'الاربعاء', '14:40:00', 3),
(58, 4, 'الاربعاء', '15:00:00', 3),
(59, 4, 'الاربعاء', '15:20:00', 3),
(60, 4, 'الاربعاء', '15:40:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `per_id` int(11) NOT NULL AUTO_INCREMENT,
  `per_name` varchar(255) NOT NULL,
  `pages_id` varchar(255) NOT NULL,
  PRIMARY KEY (`per_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`per_id`, `per_name`, `pages_id`) VALUES
(1, 'admin', '1,2,3,4,5,6,7,8,9,10,11,12'),
(2, 'manger', '2,5,6,7,9,10'),
(3, 'teachers', '2,6,9'),
(4, 'Doctors', '11');

-- --------------------------------------------------------

--
-- Table structure for table `reseved`
--

CREATE TABLE IF NOT EXISTS `reseved` (
  `reseved_id` int(11) NOT NULL,
  `resev_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `day` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reseved`
--

INSERT INTO `reseved` (`reseved_id`, `resev_id`, `patient_id`, `doctor_id`, `day`) VALUES
(0, 8, 3, 5, 'الثلاثاء'),
(0, 13, 4, 3, 'الخميس');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(255) NOT NULL,
  `date_of_establish` date NOT NULL,
  `level_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `school_name`, `date_of_establish`, `level_id`) VALUES
(1, 'صنصفط الاعداديه ', '1994-12-16', ''),
(2, 'الشهيد فكري', '2010-01-10', ''),
(3, 'القومية الابتدائيه', '2000-10-01', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL,
  `transport_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `study_fees` decimal(6,2) NOT NULL,
  `total_fees` decimal(6,2) NOT NULL,
  `poid_fees` decimal(6,2) NOT NULL,
  `reman_fees` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `school_id`, `transport_id`, `name`, `username`, `password`, `level_id`, `class_id`, `study_fees`, `total_fees`, `poid_fees`, `reman_fees`) VALUES
(1, 1, 1, 'osmaarafa', 'osama', '4297f44b13955235245b2497399d7a93', 1, 1, '150.00', '165.00', '76.00', '89.00'),
(2, 1, 1, 'ali Mohamed', 'ali_m17', '4297f44b13955235245b2497399d7a93', 2, 3, '300.00', '336.00', '131.00', '205.00'),
(3, 1, 1, 'احمد اشرف ممدوح', 'ahmed', '4297f44b13955235245b2497399d7a93', 2, 3, '300.00', '315.00', '96.00', '219.00'),
(4, 3, 1, 'سمير', 'بيس', '4297f44b13955235245b2497399d7a93', 1, 1, '150.00', '285.00', '85.00', '200.00'),
(5, 2, 2, 'احمد علي محمو', 'يللقل', '4297f44b13955235245b2497399d7a93', 3, 5, '350.00', '402.50', '40.00', '362.50'),
(6, 3, 6, 'نور اشرف', 'لىلبا', '4297f44b13955235245b2497399d7a93', 1, 7, '150.00', '165.00', '65.00', '100.00'),
(7, 2, 1, 'خالد عثمان', 'غتغلع', '4297f44b13955235245b2497399d7a93', 2, 3, '300.00', '341.00', '0.00', '0.00'),
(8, 2, 7, 'ندي السيد', 'ىنمتانما', '4297f44b13955235245b2497399d7a93', 3, 6, '400.00', '416.00', '75.00', '341.00'),
(9, 2, 6, 'ياسر محمود', 'يايبا', '4297f44b13955235245b2497399d7a93', 3, 4, '300.00', '345.00', '96.00', '249.00');

-- --------------------------------------------------------

--
-- Table structure for table `study_year`
--

CREATE TABLE IF NOT EXISTS `study_year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year_name` varchar(255) NOT NULL,
  `school_id` int(11) NOT NULL,
  `level_id` int(255) NOT NULL,
  `n_year_level` int(11) NOT NULL,
  `study_fees` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `study_year`
--

INSERT INTO `study_year` (`id`, `year_name`, `school_id`, `level_id`, `n_year_level`, `study_fees`) VALUES
(1, 'الاول', 1, 2, 1, '200.00'),
(2, 'الثاني', 1, 2, 2, '250.00'),
(3, 'الثالث', 1, 2, 3, '300.00'),
(4, 'الاول', 3, 1, 1, '150.00'),
(5, 'الثاني', 3, 1, 2, '170.00'),
(6, 'الثالث', 3, 1, 3, '180.00'),
(7, 'الاول', 2, 3, 1, '300.00'),
(8, 'الثاني', 2, 3, 2, '350.00'),
(9, 'الثالث', 2, 3, 3, '400.00');

-- --------------------------------------------------------

--
-- Table structure for table `transports`
--

CREATE TABLE IF NOT EXISTS `transports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `go` decimal(5,2) NOT NULL,
  `back` decimal(5,2) NOT NULL,
  `full` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `transports`
--

INSERT INTO `transports` (`id`, `name`, `go`, `back`, `full`) VALUES
(1, 'شبين الكوم', '3.00', '3.00', '6.00'),
(2, 'منوف-طنطا', '7.00', '7.00', '14.00'),
(6, 'طنطا _ بركة السبع', '4.00', '5.00', '8.00'),
(7, 'طنطا-المحلة', '2.00', '2.00', '3.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `rol_id`, `school_id`) VALUES
(1, 'osama_arafa', '4297f44b13955235245b2497399d7a93', 1, 0),
(2, 'osama_arafa8', '4297f44b13955235245b2497399d7a93', 2, 9),
(3, 'ali_a1', '4297f44b13955235245b2497399d7a93', 3, 2),
(4, 'ali_ahmed', '4297f44b13955235245b2497399d7a93', 4, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
