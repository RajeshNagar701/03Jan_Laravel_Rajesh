-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2022 at 02:47 PM
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
-- Database: `admp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$CndUF4fiquoYMKic4/mZZOsj21/GJELPmEuVNB3YMbJ8Y54U5CNe.', '1662191402_img.jpg', '2022-09-03 06:50:52', '2022-09-03 14:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `doc_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment_status` enum('Approved','Pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `created_at`, `updated_at`, `doc_id`, `patient_id`, `date`, `comment`, `appointment_status`, `time`) VALUES
(1, '2022-09-03 19:17:47', '2022-09-03 19:17:47', 1, 1, '2022-09-03', 'hii', 'Pending', '19:30'),
(2, '2022-09-03 19:28:40', '2022-09-03 19:28:40', 2, 1, '2022-09-08', 'hii', 'Pending', '14:01'),
(3, '2022-09-04 08:25:22', '2022-09-04 08:25:22', 2, 3, '2022-09-08', 'hii', 'Pending', '14:01'),
(4, '2022-09-09 12:24:09', '2022-09-09 12:24:09', 1, 6, '2022-09-15', 'abcd', 'Pending', '16:40'),
(5, '2022-09-09 12:52:51', '2022-09-09 12:52:51', 3, 2, '2022-09-09', 'nhnfg', 'Pending', '08:10'),
(6, '2022-09-09 14:22:27', '2022-09-09 14:22:27', 3, 1, '2022-09-09', 'sdfcsed', 'Approved', '07:20'),
(7, '2022-09-09 04:56:01', '2022-09-09 06:39:46', 2, 1, '2022-09-09', NULL, 'Approved', '10:40'),
(8, '2022-09-09 04:58:11', '2022-09-09 04:58:11', 2, 2, '2022-09-16', NULL, 'Pending', '10:30'),
(9, '2022-09-09 05:00:00', '2022-09-09 07:11:00', 2, 2, '2022-09-09', NULL, 'Approved', '10:20');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `area_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `created_at`, `updated_at`, `city_id`, `area_name`) VALUES
(1, '2022-09-03 14:06:07', '2022-09-03 14:06:07', 2, 'Maninagar'),
(2, '2022-09-03 14:06:35', '2022-09-03 14:06:35', 3, 'Andheri');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sid` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `created_at`, `updated_at`, `sid`, `city_name`) VALUES
(1, '2022-09-03 14:04:45', '2022-09-03 14:04:45', 1, 'Gandhinagar'),
(2, '2022-09-03 14:04:57', '2022-09-03 14:04:57', 1, 'Ahmedabad'),
(3, '2022-09-03 14:05:56', '2022-09-03 14:05:56', 5, 'Mumbai');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cprofile_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visiting_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Available','Not Available') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `first_name`, `last_name`, `email`, `password`, `cprofile_img`, `visiting_card`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hi-Tech Technology', 'Anand', 'Maurya', 'anandmaurya@gmail.com', '$2y$10$DIIUoMitO3lD9dfIFCQH1.kyqwGQjtcNo0VjeHnsoVF8kYh6ipTKW', '1662188360_cprofile_img.jpg', '1662188360_visiting_card.png', 'Available', '2022-09-03 13:59:20', '2022-09-03 13:59:20'),
(2, 'TOPS Technology', 'Gurmeet', 'Patel', 'gurmeetpatel@gmail.com', '$2y$10$KXt2vFOOZ5P4RbK2HnnPquF3vPPVQvajjJoiQeAzfn.Hb4J2bXSe2', '1662190108_cprofile_img.jpg', '1662190108_visiting_card.jpg', 'Available', '2022-09-03 14:28:28', '2022-09-03 14:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `company_fav_docs`
--

CREATE TABLE `company_fav_docs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_fav_docs`
--

INSERT INTO `company_fav_docs` (`id`, `created_at`, `updated_at`, `doctor_id`, `company_id`) VALUES
(16, '2022-09-08 18:12:56', '2022-09-08 18:12:56', 2, 1),
(17, '2022-09-08 18:13:08', '2022-09-08 18:13:08', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobileno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses`
--

CREATE TABLE `diagnoses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `appoinment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `problems` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `care_suggestion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reports` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Pending','Approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnoses`
--

INSERT INTO `diagnoses` (`id`, `created_at`, `updated_at`, `appoinment_id`, `patient_id`, `problems`, `diagnosis`, `care_suggestion`, `reports`, `status`) VALUES
(4, '2022-09-08 19:37:38', '2022-09-09 02:43:04', 1, 1, 'dfgv', 'fbg', 'xfgbg', 'fxgbfxg', ''),
(6, '2022-09-09 05:27:36', '2022-09-09 07:11:00', 9, 2, 'feever', 'feever', 'feever', 'feever', 'Approved'),
(7, '2022-09-09 07:07:58', '2022-09-09 07:11:00', 9, 2, 'vhbn', 'jbjn', 'njk', 'bjhbh', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `division_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `created_at`, `updated_at`, `company_id`, `division_name`) VALUES
(1, '2022-09-03 14:31:39', '2022-09-03 14:31:39', 1, 'A'),
(2, '2022-09-03 14:31:44', '2022-09-03 14:31:44', 1, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `specialist_id` bigint(20) UNSIGNED NOT NULL,
  `short_tittle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `liacence_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dr_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` bigint(20) UNSIGNED NOT NULL,
  `city` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_map` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_morning_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospital_morning_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospital_afternoon_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospital_afternoon_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospital_evening_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospital_evening_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consulting_fees` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `followup_fees` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_status` enum('Block','Unblock') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unblock',
  `hospital_status` enum('Available','Not Available') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Available',
  `visitor_status` enum('Available','Not Available') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Available',
  `area` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `gender`, `first_name`, `last_name`, `created_at`, `updated_at`, `specialist_id`, `short_tittle`, `email`, `password`, `dob`, `profile_img`, `liacence_no`, `education`, `experience`, `hospital_name`, `hospital_img`, `dr_mobile`, `office_no`, `visit_card`, `about`, `state`, `city`, `address`, `pincode`, `google_map`, `day`, `hospital_morning_to`, `hospital_morning_from`, `hospital_afternoon_to`, `hospital_afternoon_from`, `hospital_evening_to`, `hospital_evening_from`, `consulting_fees`, `followup_fees`, `notification`, `doctor_status`, `hospital_status`, `visitor_status`, `area`) VALUES
(1, 'Female', 'Ayushi', 'Maurya', '2022-09-03 14:18:29', '2022-09-05 11:40:32', 1, 'Dentist', 'ayushimaurya@gmail.com', '$2y$10$0rO0XXwbvBJPMUZEUBLyVea/YoexnxiZJ1FuSSQGyW43b31qm85KO', '1990-12-05', '1662189509_profile_img.jpg', '124536987', 'BDS', '3 Year', 'Sanjivni Hospital Care', '1662397832218739hospital_img.jpg,1662397832916799hospital_img.jpg,1662397832386242hospital_img.jpg', '3625410987', '36254189', '1662189509_visit_card_img.jpg', 'I\'m a good Dentist', 1, 2, 'Opp. Railway Station , Maninagar, Ahmedabad', '325146', 'https://goo.gl/maps/vSXkPS2F6FsHfEECA', 'Monday,Wednesday,Friday', '10:00', '12:00', '14:00', '16:00', '18:00', '20:00', '500', '250', 'If any help just contact me', 'Unblock', '', 'Available', 1),
(2, 'Female', 'Ritika', 'Maurya', '2022-09-03 14:26:13', '2022-09-05 11:40:57', 2, 'Mr.', 'ritikamaurya@gmail.com', '$2y$10$jdhSLq5t3idCxz/MLQufi.nnxeiOZGHxUB7jyBkrfXEUuzzOedgHi', '1985-03-03', '1662189973_profile_img.jpg', '214536', 'MD', '5 Year', 'City Hospital', '1662397857433529hospital_img.jpg,1662397857460944hospital_img.jpg,1662397857380716hospital_img.jpg', '1203654789', '25146398', '1662189973_visit_card_img.png', 'I\'m a good doctor', 5, 3, 'Andheri, Mumbai', '362514', 'https://goo.gl/maps/5ZGX5AToGK5GZrHy5', 'Tuesday,Thursday,Saturday', '08:00', '10:00', '12:00', '16:00', NULL, NULL, '1000', '500', 'Any emergency just inform me.', 'Unblock', '', 'Available', 2),
(3, 'Male', 'Vishal', 'Maurya', '2022-09-04 09:35:48', '2022-09-05 11:41:24', 3, 'Mr.', 'vishalmaurya@gmail.com', '$2y$10$atdFxSeUuBdmhCMr51AlouaHoRrMHS1PN..Tf7EKGgRZJfb/RAe0i', '1980-07-08', '1662303948_profile_img.jpg', '3748392378', 'MS, DNB', '4 Year', 'Life Care Hospital', '1662397884455115hospital_img.jpg,1662397884926921hospital_img.jpg,1662397884741150hospital_img.jpg,1662397884841882hospital_img.jpg,1662397884381100hospital_img.jpg,1662397884628112hospital_img.jpg', '8976543210', '36472682', '1662303948_visit_card_img.png', 'I\'m a good doctor', 1, 2, 'Ghatlodia, Ahmedabad', '987654', 'https://gmail.com', 'Tuesday,Wednesday,Thursday,Friday', '10:00', '12:00', NULL, NULL, '16:00', '20:00', '2000', '1000', 'Any emergency contact me', 'Unblock', '', 'Available', 1),
(4, 'Female', 'Beena', 'Gajjar', '2022-09-05 11:18:25', '2022-09-05 11:18:25', 4, 'Orthopedic', 'beenagajjar@gmail.com', '$2y$10$I8N/YTM4ef9Wn1krlzyBse93Ju7/sKSDrPyCV09hOUlQ5iFleDytO', '1985-08-20', '1662396505_profile_img.jpg', '5467858', 'MBBS', '10 YEAR', 'Civil Hospital', '1662396505980595hospital_img.jpg,1662396505160055hospital_img.jpg,1662396505906951hospital_img.jpg', '5236417890', '52364178', '1662396505_visit_card_img.png', 'I\'m a good doctor', 1, 2, 'CTM, Ahmedabad', '214578', 'https://gmail.com', 'Monday,Wednesday,Friday,Sunday', '08:00', '10:00', '13:00', '15:00', '17:00', '20:00', '1000', '500', 'any emergency then contact me', 'Unblock', '', 'Available', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doc_fav_medicines`
--

CREATE TABLE `doc_fav_medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `medicine_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doc_fav_medicines`
--

INSERT INTO `doc_fav_medicines` (`id`, `created_at`, `updated_at`, `doctor_id`, `medicine_name`) VALUES
(1, '2022-09-03 14:40:52', '2022-09-03 14:40:52', 1, 'Paracetamol'),
(2, '2022-09-03 14:41:19', '2022-09-03 14:41:19', 1, 'Fusidic acid');

-- --------------------------------------------------------

--
-- Table structure for table `doc_fav_patients`
--

CREATE TABLE `doc_fav_patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doc_fav_patients`
--

INSERT INTO `doc_fav_patients` (`id`, `created_at`, `updated_at`, `doctor_id`, `patient_id`) VALUES
(1, '2022-09-09 07:11:00', '2022-09-09 07:11:00', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `drspecialities`
--

CREATE TABLE `drspecialities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drspecialities`
--

INSERT INTO `drspecialities` (`id`, `created_at`, `updated_at`, `doctor_id`, `title`) VALUES
(1, '2022-09-03 14:42:42', '2022-09-03 14:42:42', 1, 'Dental Implants'),
(2, '2022-09-03 14:43:05', '2022-09-03 14:43:05', 1, 'Implant Bridges');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_daytimes`
--

CREATE TABLE `hospital_daytimes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `morning_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `evening_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `Manager_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mprofile_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visiting_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Block','Unblock') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `created_at`, `updated_at`, `company_id`, `division_id`, `Manager_name`, `first_name`, `last_name`, `email`, `password`, `mprofile_img`, `visiting_card`, `status`) VALUES
(1, '2022-09-03 14:36:07', '2022-09-03 14:36:07', 1, 1, 'Riya', 'Reena', 'Valekar', 'reenavalekar@gmail.com', '$2y$10$bgh3OW0DseW6bX0YApnqDul0A5693F3NRmZzHruci3.l09XL7rWvC', '1662190567_mprofile_img.jpg', '1662190567_visiting_card.png', 'Unblock');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `medicine_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `created_at`, `updated_at`, `company_id`, `created_by`, `medicine_name`) VALUES
(1, '2022-09-03 14:32:50', '2022-09-03 14:32:50', 1, 'null', 'Paracetamol'),
(2, '2022-09-03 14:33:03', '2022-09-03 14:33:03', 1, 'null', 'aspirin'),
(3, '2022-09-03 14:39:24', '2022-09-03 14:39:24', NULL, '1', 'Chlorpromazine');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_07_28_053546_create_admins_table', 1),
(3, '2022_07_28_053703_add_columns_to_admins_table', 1),
(4, '2022_07_27_085528_create_states_table', 2),
(5, '2022_07_27_085553_add_column_to_states_table', 2),
(6, '2022_08_01_071347_create_cities_table', 3),
(7, '2022_08_01_071416_add_columns_to_cities_table', 3),
(8, '2022_07_27_085653_create_specialists_table', 4),
(9, '2022_07_27_085721_add_column_to_specialists_table', 4),
(10, '2022_08_01_071553_create_areas_table', 5),
(11, '2022_08_01_071626_add_columns_to_areas_table', 5),
(12, '2022_08_01_071737_create_doctors_table', 6),
(13, '2022_08_01_071811_add_columns_to_doctors_table', 6),
(14, '2022_08_01_065830_create_companies_table', 7),
(15, '2022_08_01_070043_add_columns_to_companies_table', 7),
(16, '2022_08_01_072348_create_drspecialities_table', 8),
(17, '2022_08_01_072424_add_columns_to_drspecialities_table', 8),
(18, '2022_08_01_072609_create_hospital_daytimes_table', 9),
(19, '2022_08_01_072649_add_columns_to_hospital_daytimes_table', 9),
(20, '2022_08_01_075049_create_products_table', 10),
(21, '2022_08_01_075106_add_columns_to_products_table', 10),
(22, '2022_08_08_054742_create_services_table', 11),
(23, '2022_08_08_054948_add_columns_to_services_table', 11),
(24, '2022_08_13_051816_create_patients_table', 12),
(25, '2022_08_13_051909_add_columns_to_patients', 12),
(26, '2022_08_13_073342_create_patient_favs_table', 13),
(27, '2022_08_13_073432_add_columns_to_patient_favs_table', 13),
(28, '2022_08_17_090708_create_patient_slots_table', 14),
(29, '2022_08_17_091048_add_columns_to_patient_slots_table', 14),
(30, '2022_08_17_104234_create_medicines_table', 15),
(31, '2022_08_17_104404_add-columns_to_medicines_table', 15),
(32, '2022_08_18_071525_create_doc_fav_medicines_table', 16),
(33, '2022_08_18_071551_add_columns_to_doc_fav_medicines_table', 16),
(34, '2022_08_20_141722_create_divisions_table', 17),
(35, '2022_08_20_141816_add_columns_to_divisions_table', 17),
(36, '2022_08_20_160109_create_managers_table', 18),
(37, '2022_08_20_160209_add_columns_to_managers_table', 18),
(38, '2022_08_20_160343_create_mrs_table', 19),
(39, '2022_08_20_160408_add-columns_to_mrs_table', 19),
(40, '2022_08_20_160605_create_stockiests_table', 20),
(41, '2022_08_20_160629_add_columns_to_stockiests_table', 20),
(42, '2022_08_22_065119_create_contacts_table', 21),
(43, '2022_08_22_065503_add_column_to_contacts_table', 21),
(44, '2022_08_23_052726_create_appointments_table', 22),
(45, '2022_08_23_052741_add_columns_to_appointments_table', 22),
(46, '2022_08_26_111532_create_company_slots_table', 23),
(47, '2022_08_26_111557_add_column_to_company_slots_table', 23),
(48, '2022_08_29_065959_create_visitor_slots_table', 23),
(49, '2022_08_29_070113_add_columns_to_visitor_slots_table', 23),
(50, '2022_09_03_114354_create_company_fav_docs_table', 24),
(51, '2022_09_03_114502_add_columns_to_company_fav_docs_table', 24),
(52, '2022_09_03_070504_create_diagnosis_table', 25),
(53, '2022_09_03_070642_add_column_to_diagnosis_table', 25),
(54, '2022_09_03_072406_create_prescriptions_table', 25),
(55, '2022_09_03_072432_add_column_to_prescriptions_table', 25),
(56, '2022_09_05_140402_create_diagnoses_table', 26),
(57, '2022_09_05_140429_add_columns_to_diagnoses_table', 26),
(58, '2022_09_09_121342_create_doc_fav_patients_table', 27),
(59, '2022_09_09_121435_add_columns_to_doc_fav_patients_table', 27);

-- --------------------------------------------------------

--
-- Table structure for table `mrs`
--

CREATE TABLE `mrs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `manager_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mrprofile_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visiting_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Block','Unblock') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mrs`
--

INSERT INTO `mrs` (`id`, `created_at`, `updated_at`, `company_id`, `manager_id`, `company_name`, `first_name`, `last_name`, `email`, `password`, `mrprofile_img`, `visiting_card`, `status`) VALUES
(1, '2022-09-03 14:40:35', '2022-09-03 14:40:35', 1, 1, 'hi-Tech', 'Kinjal', 'Patel', 'kinjalpatel@gmail.com', '$2y$10$dZYdCNLLtSACQisOlFl1auLIL3TuCpSEwLZqoOajmBTbi6sX5124q', '1662190835_mrprofile_img.jpg', '1662190835_visiting_card.jpg', 'Unblock');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobileno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `ptprofile_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `status` enum('Block','Unblock') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unblock',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `mobileno`, `email`, `password`, `gender`, `ptprofile_img`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Vishv Unjiya', '2514789630', 'vishvunjiya3058822@gmail.com', '$2y$10$CndUF4fiquoYMKic4/mZZOsj21/GJELPmEuVNB3YMbJ8Y54U5CNe.', 'Male', '1662191213_ptprofile_img.jpg', 'Unblock', '2022-09-03 13:49:24', '2022-09-03 14:46:53'),
(2, 'Reena Valekar', 'null', 'riyavalekar19@gmail.com', '$2y$10$5v6NfBYh61vch2ieIy0QOe.Ih2ilsuBol1poYDKmwLNxe/i5F0OsC', 'Female', '1662207863_ptprofile_img.jpg', 'Unblock', '2022-09-03 19:18:54', '2022-09-03 19:24:23'),
(3, 'Anchal Maurya', '8790654312', 'mohinimaurya062@gmail.com', '$2y$10$AVd3Kwe3uqnejDv2NebHluZe9hbf0WUF8ZU6LMs26nAkX0k55bbum', 'Female', '1662299753_ptprofile_img.jpg', 'Unblock', '2022-09-04 08:22:51', '2022-09-04 08:26:59'),
(5, 'Mishti Maurya', 'null', 'mohinimaurya026@gmail.com', '$2y$10$8nx92y1lJKaFpAOjlnXFh.WYrTw.ZhAZmkV.u6lAmYJbJjPJqtOwy', 'null', 'null', 'Unblock', '2022-09-07 11:57:37', '2022-09-07 11:57:37'),
(6, 'Keerti Maurya', 'null', 'mohini.maurya6201@gmail.com', '$2y$10$Ex64/Krc8bUxQfmoq7Gxpej7fHw2p1uHB7fxgVVt7z1WTtrEsJG06', 'null', 'null', 'Unblock', '2022-09-07 13:07:57', '2022-09-07 13:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `patient_favs`
--

CREATE TABLE `patient_favs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_favs`
--

INSERT INTO `patient_favs` (`id`, `created_at`, `updated_at`, `doctor_id`, `patient_id`) VALUES
(2, '2022-09-06 09:10:23', '2022-09-06 09:10:23', 4, 3),
(5, '2022-09-07 14:06:30', '2022-09-07 14:06:30', 2, 6),
(7, '2022-09-08 12:22:13', '2022-09-08 12:22:13', 3, 6),
(11, '2022-09-08 18:14:55', '2022-09-08 18:14:55', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `patient_slots`
--

CREATE TABLE `patient_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `doc_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slot_timing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_slots`
--

INSERT INTO `patient_slots` (`id`, `created_at`, `updated_at`, `doc_id`, `day`, `slot_timing`, `time`) VALUES
(1, '2022-09-03 20:14:56', '2022-09-03 20:14:56', 1, 'Monday', '09:30', 'Morning'),
(2, '2022-09-03 20:14:56', '2022-09-03 20:14:56', 1, 'Monday', '09:45', 'Morning'),
(3, '2022-09-03 20:14:56', '2022-09-03 20:14:56', 1, 'Monday', '10:00', 'Morning'),
(4, '2022-09-03 20:14:56', '2022-09-03 20:14:56', 1, 'Monday', '10:15', 'Morning'),
(5, '2022-09-03 20:14:56', '2022-09-03 20:14:56', 1, 'Monday', '10:30', 'Morning'),
(6, '2022-09-03 20:14:56', '2022-09-03 20:14:56', 1, 'Monday', '10:45', 'Morning'),
(7, '2022-09-03 20:14:56', '2022-09-03 20:14:56', 1, 'Monday', '11:00', 'Morning'),
(8, '2022-09-03 20:14:56', '2022-09-03 20:14:56', 1, 'Monday', '11:15', 'Morning'),
(9, '2022-09-03 20:15:29', '2022-09-03 20:15:29', 1, 'Thursday', '16:10', 'Afternoon'),
(10, '2022-09-03 20:15:29', '2022-09-03 20:15:29', 1, 'Thursday', '16:20', 'Afternoon'),
(11, '2022-09-03 20:15:29', '2022-09-03 20:15:29', 1, 'Thursday', '16:30', 'Afternoon'),
(12, '2022-09-03 20:15:29', '2022-09-03 20:15:29', 1, 'Thursday', '16:40', 'Afternoon'),
(13, '2022-09-03 20:15:29', '2022-09-03 20:15:29', 1, 'Thursday', '16:50', 'Afternoon'),
(14, '2022-09-03 20:15:29', '2022-09-03 20:15:29', 1, 'Thursday', '17:00', 'Afternoon'),
(15, '2022-09-03 20:15:55', '2022-09-03 20:15:55', 1, 'Saturday', '19:10', 'Evening'),
(16, '2022-09-03 20:15:55', '2022-09-03 20:15:55', 1, 'Saturday', '19:20', 'Evening'),
(17, '2022-09-03 20:15:55', '2022-09-03 20:15:55', 1, 'Saturday', '19:30', 'Evening'),
(18, '2022-09-03 20:15:55', '2022-09-03 20:15:55', 1, 'Saturday', '19:40', 'Evening'),
(19, '2022-09-03 20:15:55', '2022-09-03 20:15:55', 1, 'Saturday', '19:50', 'Evening'),
(20, '2022-09-04 00:51:51', '2022-09-04 00:51:51', 2, 'Thursday', '13:31', 'Afternoon'),
(21, '2022-09-04 00:51:51', '2022-09-04 00:51:51', 2, 'Thursday', '13:41', 'Afternoon'),
(22, '2022-09-04 00:51:51', '2022-09-04 00:51:51', 2, 'Thursday', '13:51', 'Afternoon'),
(23, '2022-09-04 00:51:51', '2022-09-04 00:51:51', 2, 'Thursday', '14:01', 'Afternoon'),
(24, '2022-09-04 00:51:51', '2022-09-04 00:51:51', 2, 'Thursday', '14:11', 'Afternoon'),
(25, '2022-09-04 00:51:51', '2022-09-04 00:51:51', 2, 'Thursday', '14:21', 'Afternoon'),
(26, '2022-09-04 00:51:51', '2022-09-04 00:51:51', 2, 'Thursday', '14:31', 'Afternoon'),
(27, '2022-09-04 00:51:51', '2022-09-04 00:51:51', 2, 'Thursday', '14:41', 'Afternoon'),
(28, '2022-09-04 00:51:51', '2022-09-04 00:51:51', 2, 'Thursday', '14:51', 'Afternoon'),
(29, '2022-09-04 00:51:51', '2022-09-04 00:51:51', 2, 'Thursday', '15:01', 'Afternoon'),
(30, '2022-09-04 00:51:51', '2022-09-04 00:51:51', 2, 'Thursday', '15:11', 'Afternoon'),
(31, '2022-09-04 00:51:51', '2022-09-04 00:51:51', 2, 'Thursday', '15:21', 'Afternoon'),
(32, '2022-09-04 00:51:51', '2022-09-04 00:51:51', 2, 'Thursday', '15:31', 'Afternoon'),
(33, '2022-09-04 00:51:51', '2022-09-04 00:51:51', 2, 'Thursday', '15:41', 'Afternoon'),
(34, '2022-09-04 00:51:51', '2022-09-04 00:51:51', 2, 'Thursday', '15:51', 'Afternoon'),
(35, '2022-09-04 00:51:51', '2022-09-04 00:51:51', 2, 'Thursday', '16:01', 'Afternoon'),
(36, '2022-09-04 00:51:51', '2022-09-04 00:51:51', 2, 'Thursday', '16:11', 'Afternoon'),
(37, '2022-09-04 00:51:51', '2022-09-04 00:51:51', 2, 'Thursday', '16:21', 'Afternoon'),
(38, '2022-09-04 00:51:51', '2022-09-04 00:51:51', 2, 'Thursday', '16:31', 'Afternoon'),
(39, '2022-09-04 00:51:51', '2022-09-04 00:51:51', 2, 'Thursday', '16:41', 'Afternoon'),
(40, '2022-09-09 18:19:42', '2022-09-09 18:19:42', 3, 'Friday', '07:10', 'Morning'),
(41, '2022-09-09 18:19:42', '2022-09-09 18:19:42', 3, 'Friday', '07:20', 'Morning'),
(42, '2022-09-09 18:19:42', '2022-09-09 18:19:42', 3, 'Friday', '07:30', 'Morning'),
(43, '2022-09-09 18:19:42', '2022-09-09 18:19:42', 3, 'Friday', '07:40', 'Morning'),
(44, '2022-09-09 18:19:42', '2022-09-09 18:19:42', 3, 'Friday', '07:50', 'Morning'),
(45, '2022-09-09 18:19:42', '2022-09-09 18:19:42', 3, 'Friday', '08:00', 'Morning'),
(46, '2022-09-09 18:19:42', '2022-09-09 18:19:42', 3, 'Friday', '08:10', 'Morning'),
(47, '2022-09-09 10:23:48', '2022-09-09 10:23:48', 2, 'Friday', '10:10', 'Morning'),
(48, '2022-09-09 10:23:48', '2022-09-09 10:23:48', 2, 'Friday', '10:20', 'Morning'),
(49, '2022-09-09 10:23:48', '2022-09-09 10:23:48', 2, 'Friday', '10:30', 'Morning'),
(50, '2022-09-09 10:23:48', '2022-09-09 10:23:48', 2, 'Friday', '10:40', 'Morning'),
(51, '2022-09-09 10:23:48', '2022-09-09 10:23:48', 2, 'Friday', '10:50', 'Morning');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `appoinment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `medicine_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_Quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_take_Days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_take_Time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_dose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Pending','Approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `created_at`, `updated_at`, `appoinment_id`, `patient_id`, `medicine_name`, `medicine_Quantity`, `medicine_take_Days`, `medicine_take_Time`, `medicine_dose`, `status`) VALUES
(1, '2022-09-06 04:22:42', '2022-09-06 04:22:42', NULL, 3, 'fdvs', '1', '2', 'Morning,Afternoon,Night', 'Monday', 'Pending'),
(2, '2022-09-06 06:04:08', '2022-09-06 06:04:08', 1, 1, 'dsfgvsr', '2', '3', 'Morning,Afternoon,Night', 'Monday', 'Pending'),
(3, '2022-09-09 05:09:55', '2022-09-09 05:09:55', 5, 2, 'dolo', '2', '1', 'Morning,Night', 'Monday', 'Pending'),
(4, '2022-09-09 05:28:02', '2022-09-09 07:11:00', 9, 2, 'dolo', '4', '3', 'Morning,Evening', 'Tuesday', 'Approved'),
(5, '2022-09-09 05:28:56', '2022-09-09 07:11:00', 9, 2, 'combiflame', '10', '3', 'Morning,Evening,Night', 'Tuesday', 'Approved'),
(6, '2022-09-09 05:33:16', '2022-09-09 07:11:00', 9, 2, 'aspirine', '2', '5', 'Morning,Evening', 'Monday', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creater_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Block','Unblock') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `created_at`, `updated_at`, `doctor_id`, `title`) VALUES
(1, '2022-09-03 14:43:48', '2022-09-03 14:43:48', 1, 'Cosmetic Tooth Fillings'),
(2, '2022-09-03 14:44:15', '2022-09-03 14:44:15', 1, 'Cosmetic Bridges');

-- --------------------------------------------------------

--
-- Table structure for table `specialists`
--

CREATE TABLE `specialists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialists`
--

INSERT INTO `specialists` (`id`, `name`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Dentist', '1662188159_img.png', '2022-09-03 13:55:59', '2022-09-03 13:55:59'),
(2, 'Cardiologist', '1662188420_img.png', '2022-09-03 14:00:20', '2022-09-03 14:19:44'),
(3, 'Urology', '1662188435_img.png', '2022-09-03 14:00:35', '2022-09-03 14:00:35'),
(4, 'Orthopedic', '1662188450_img.png', '2022-09-03 14:00:50', '2022-09-03 14:00:50'),
(5, 'Neurology', '1662188465_img.png', '2022-09-03 14:01:05', '2022-09-03 14:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `created_at`, `updated_at`) VALUES
(1, 'Gujarat', '2022-09-03 14:03:06', '2022-09-03 14:03:06'),
(2, 'Andhra Pradesh', '2022-09-03 14:04:01', '2022-09-03 14:04:01'),
(4, 'Goa', '2022-09-03 14:05:26', '2022-09-03 14:05:26'),
(5, 'Maharashtra', '2022-09-03 14:05:45', '2022-09-03 14:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `stockiests`
--

CREATE TABLE `stockiests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `manager_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Block','Unblock') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stockiests`
--

INSERT INTO `stockiests` (`id`, `created_at`, `updated_at`, `company_id`, `manager_id`, `name`, `state`, `city`, `area`, `address`, `pincode`, `status`) VALUES
(1, '2022-09-03 14:35:04', '2022-09-03 14:35:04', 1, NULL, 'Rajesh Nagar', '1', '2', '1', 'S.G. Highway', '145236', 'Unblock');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_slots`
--

CREATE TABLE `visitor_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `doc_id` bigint(20) UNSIGNED NOT NULL,
  `visitor_slot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mr_allowed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_allowed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_allowed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Enable','Disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Disable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor_slots`
--

INSERT INTO `visitor_slots` (`id`, `created_at`, `updated_at`, `doc_id`, `visitor_slot`, `start_time`, `end_time`, `mr_allowed`, `manager_allowed`, `company_allowed`, `day`, `status`) VALUES
(1, '2022-09-03 18:07:26', '2022-09-03 18:36:56', 1, '1', '16:00', '19:00', '5', '2', '3', 'Wednesday', 'Disable'),
(2, '2022-09-03 18:08:46', '2022-09-03 18:37:05', 1, '2', '10:00', '13:00', '10', '55', '5', 'Monday', 'Disable'),
(4, '2022-09-08 14:20:45', '2022-09-08 14:20:45', 2, '1', '12:00', '18:00', '1', '2', '3', 'Thursday', 'Disable'),
(5, '2022-09-08 14:21:33', '2022-09-08 14:21:33', 2, '2', '10:00', '16:00', '2', '3', '5', 'Friday', 'Disable');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_doc_id_foreign` (`doc_id`),
  ADD KEY `appointments_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `areas_city_id_foreign` (`city_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_sid_foreign` (`sid`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_fav_docs`
--
ALTER TABLE `company_fav_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_fav_docs_doctor_id_foreign` (`doctor_id`),
  ADD KEY `company_fav_docs_company_id_foreign` (`company_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnoses_appoinment_id_foreign` (`appoinment_id`),
  ADD KEY `diagnoses_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `divisions_company_id_foreign` (`company_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_specialist_id_foreign` (`specialist_id`),
  ADD KEY `doctors_state_foreign` (`state`),
  ADD KEY `doctors_city_foreign` (`city`),
  ADD KEY `doctors_area_foreign` (`area`);

--
-- Indexes for table `doc_fav_medicines`
--
ALTER TABLE `doc_fav_medicines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc_fav_medicines_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `doc_fav_patients`
--
ALTER TABLE `doc_fav_patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc_fav_patients_doctor_id_foreign` (`doctor_id`),
  ADD KEY `doc_fav_patients_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `drspecialities`
--
ALTER TABLE `drspecialities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drspecialities_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `hospital_daytimes`
--
ALTER TABLE `hospital_daytimes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_daytimes_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `managers_company_id_foreign` (`company_id`),
  ADD KEY `managers_division_id_foreign` (`division_id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicines_company_id_foreign` (`company_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mrs`
--
ALTER TABLE `mrs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mrs_company_id_foreign` (`company_id`),
  ADD KEY `mrs_manager_id_foreign` (`manager_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_favs`
--
ALTER TABLE `patient_favs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_favs_doctor_id_foreign` (`doctor_id`),
  ADD KEY `patient_favs_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `patient_slots`
--
ALTER TABLE `patient_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_slots_doc_id_foreign` (`doc_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescriptions_appoinment_id_foreign` (`appoinment_id`),
  ADD KEY `prescriptions_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_company_id_foreign` (`company_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `specialists`
--
ALTER TABLE `specialists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stockiests`
--
ALTER TABLE `stockiests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stockiests_company_id_foreign` (`company_id`),
  ADD KEY `stockiests_manager_id_foreign` (`manager_id`);

--
-- Indexes for table `visitor_slots`
--
ALTER TABLE `visitor_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitor_slots_doc_id_foreign` (`doc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_fav_docs`
--
ALTER TABLE `company_fav_docs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diagnoses`
--
ALTER TABLE `diagnoses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doc_fav_medicines`
--
ALTER TABLE `doc_fav_medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doc_fav_patients`
--
ALTER TABLE `doc_fav_patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `drspecialities`
--
ALTER TABLE `drspecialities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospital_daytimes`
--
ALTER TABLE `hospital_daytimes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `mrs`
--
ALTER TABLE `mrs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient_favs`
--
ALTER TABLE `patient_favs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patient_slots`
--
ALTER TABLE `patient_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specialists`
--
ALTER TABLE `specialists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stockiests`
--
ALTER TABLE `stockiests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitor_slots`
--
ALTER TABLE `visitor_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_doc_id_foreign` FOREIGN KEY (`doc_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_sid_foreign` FOREIGN KEY (`sid`) REFERENCES `states` (`id`);

--
-- Constraints for table `company_fav_docs`
--
ALTER TABLE `company_fav_docs`
  ADD CONSTRAINT `company_fav_docs_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `company_fav_docs_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD CONSTRAINT `diagnoses_appoinment_id_foreign` FOREIGN KEY (`appoinment_id`) REFERENCES `appointments` (`id`),
  ADD CONSTRAINT `diagnoses_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `divisions`
--
ALTER TABLE `divisions`
  ADD CONSTRAINT `divisions_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_area_foreign` FOREIGN KEY (`area`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `doctors_city_foreign` FOREIGN KEY (`city`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `doctors_specialist_id_foreign` FOREIGN KEY (`specialist_id`) REFERENCES `specialists` (`id`),
  ADD CONSTRAINT `doctors_state_foreign` FOREIGN KEY (`state`) REFERENCES `states` (`id`);

--
-- Constraints for table `doc_fav_medicines`
--
ALTER TABLE `doc_fav_medicines`
  ADD CONSTRAINT `doc_fav_medicines_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `doc_fav_patients`
--
ALTER TABLE `doc_fav_patients`
  ADD CONSTRAINT `doc_fav_patients_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `doc_fav_patients_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `drspecialities`
--
ALTER TABLE `drspecialities`
  ADD CONSTRAINT `drspecialities_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `hospital_daytimes`
--
ALTER TABLE `hospital_daytimes`
  ADD CONSTRAINT `hospital_daytimes_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `managers`
--
ALTER TABLE `managers`
  ADD CONSTRAINT `managers_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `managers_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`);

--
-- Constraints for table `medicines`
--
ALTER TABLE `medicines`
  ADD CONSTRAINT `medicines_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `mrs`
--
ALTER TABLE `mrs`
  ADD CONSTRAINT `mrs_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `mrs_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `managers` (`id`);

--
-- Constraints for table `patient_favs`
--
ALTER TABLE `patient_favs`
  ADD CONSTRAINT `patient_favs_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `patient_favs_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `patient_slots`
--
ALTER TABLE `patient_slots`
  ADD CONSTRAINT `patient_slots_doc_id_foreign` FOREIGN KEY (`doc_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_appoinment_id_foreign` FOREIGN KEY (`appoinment_id`) REFERENCES `appointments` (`id`),
  ADD CONSTRAINT `prescriptions_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `stockiests`
--
ALTER TABLE `stockiests`
  ADD CONSTRAINT `stockiests_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `stockiests_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `managers` (`id`);

--
-- Constraints for table `visitor_slots`
--
ALTER TABLE `visitor_slots`
  ADD CONSTRAINT `visitor_slots_doc_id_foreign` FOREIGN KEY (`doc_id`) REFERENCES `doctors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
