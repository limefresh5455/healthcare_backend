-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2022 at 01:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `replinq`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctordetails`
--

CREATE TABLE `doctordetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mr_id` int(11) DEFAULT NULL,
  `reference_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctordetails`
--

INSERT INTO `doctordetails` (`id`, `mr_id`, `reference_id`, `created_at`, `updated_at`) VALUES
(21, 52, 'eOyFJ.PiGBcbhr3T1oyJZ1A3', '2022-05-20 18:30:00', '2022-05-25 18:30:00'),
(23, 25, 'e69NcQgKKhcP0umjLTabc4w3', '2022-05-21 01:06:06', '2022-05-21 01:06:06'),
(34, 25, 'eRgcOyrDHZihisGGw-jg1lA3', '2022-07-14 00:59:19', '2022-07-14 00:59:19'),
(36, 25, 'eb55Xa5E7EWWnV5eRuWsfKQ3', '2022-09-15 02:26:23', '2022-09-15 02:26:23'),
(39, 63, 'eYWgiyCoSpNV3B8fN6bqhBw3', '2022-09-15 05:13:31', '2022-09-15 05:13:31'),
(47, 63, 'eBp3pg8OoD8W.H3cKew5BGA3', '2022-09-15 07:31:21', '2022-09-15 07:31:21'),
(50, 64, 'eKku5L059LaXRQ4CwE91p3w3', '2022-09-16 07:50:15', '2022-09-16 07:50:15'),
(53, 64, 'eOyFJ.PiGBcbhr3T1oyJZ1A3', '2022-09-17 01:59:12', '2022-09-17 01:59:12'),
(57, 25, 'e3kspIfhIgPpt3uisoAD-3w3', '2022-09-17 05:54:15', '2022-09-17 05:54:15'),
(58, 64, 'e0Jp3gj4FaIdH3TtBOvpIIA3', '2022-09-17 06:29:38', '2022-09-17 06:29:38'),
(59, 64, 'eRgcOyrDHZihisGGw-jg1lA3', '2022-09-17 06:29:48', '2022-09-17 06:29:48'),
(67, 64, 'e5bPjvXsu8M2Mo6iB6FjHFA3', '2022-09-19 01:58:52', '2022-09-19 01:58:52'),
(74, 64, 'eb55Xa5E7EWWnV5eRuWsfKQ3', '2022-09-19 02:09:55', '2022-09-19 02:09:55'),
(76, 64, 'eYWgiyCoSpNV3B8fN6bqhBw3', '2022-09-19 02:12:19', '2022-09-19 02:12:19');

-- --------------------------------------------------------

--
-- Table structure for table `epic_jsons`
--

CREATE TABLE `epic_jsons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullUrl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resourcetype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `communication` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `epic_jsons`
--

INSERT INTO `epic_jsons` (`id`, `fullUrl`, `resourcetype`, `reference_id`, `active`, `full_name`, `last_name`, `first_name`, `gender`, `communication`, `created_at`, `updated_at`) VALUES
(1, 'https://fhir.epic.com/interconnect-fhir-oauth/api/FHIR/R4/Practitioner/eKku5L059LaXRQ4CwE91p3w3', 'Practitioner', 'eKku5L059LaXRQ4CwE91p3w3', '1', 'John Oehlert', 'Oehlert', 'John', '', '', '2022-04-15 05:25:08', '2022-04-15 05:25:08'),
(2, 'https://fhir.epic.com/interconnect-fhir-oauth/api/FHIR/R4/Practitioner/eb55Xa5E7EWWnV5eRuWsfKQ3', 'Practitioner', 'eb55Xa5E7EWWnV5eRuWsfKQ3', '1', 'JOHNSON, ALBERT', 'Johnson', 'Albert', '', 'English', '2022-04-15 05:25:09', '2022-04-15 05:25:09'),
(3, 'https://fhir.epic.com/interconnect-fhir-oauth/api/FHIR/R4/Practitioner/eYWgiyCoSpNV3B8fN6bqhBw3', 'Practitioner', 'eYWgiyCoSpNV3B8fN6bqhBw3', '1', 'SMITH, JOHN J', 'Smith', 'J', 'male', 'English', '2022-04-15 05:25:09', '2022-04-15 05:25:09'),
(4, 'https://fhir.epic.com/interconnect-fhir-oauth/api/FHIR/R4/Practitioner/eOyFJ.PiGBcbhr3T1oyJZ1A3', 'Practitioner', 'eOyFJ.PiGBcbhr3T1oyJZ1A3', '1', 'Physician Surgery, MD', 'Surgery', 'Physician', '', '', '2022-04-15 05:25:09', '2022-04-15 05:25:09'),
(5, 'https://fhir.epic.com/interconnect-fhir-oauth/api/FHIR/R4/Practitioner/eRgcOyrDHZihisGGw-jg1lA3', 'Practitioner', 'eRgcOyrDHZihisGGw-jg1lA3', '1', 'Physician Orthopaedics, MD', 'Orthopaedics', 'Physician', '', '', '2022-04-15 05:25:09', '2022-04-15 05:25:09'),
(6, 'https://fhir.epic.com/interconnect-fhir-oauth/api/FHIR/R4/Practitioner/e5bPjvXsu8M2Mo6iB6FjHFA3', 'Practitioner', 'e5bPjvXsu8M2Mo6iB6FjHFA3', '1', 'Test Avancer', 'Avancer', 'Test', '', '', '2022-04-15 05:26:05', '2022-04-15 05:26:05'),
(7, 'https://fhir.epic.com/interconnect-fhir-oauth/api/FHIR/R4/Practitioner/eBp3pg8OoD8W.H3cKew5BGA3', 'Practitioner', 'eBp3pg8OoD8W.H3cKew5BGA3', '1', 'Provider Testuser', 'Testuser', 'Provider', '', '', '2022-04-15 05:26:05', '2022-04-15 05:26:05'),
(8, 'https://fhir.epic.com/interconnect-fhir-oauth/api/FHIR/R4/Practitioner/e3kspIfhIgPpt3uisoAD-3w3', 'Practitioner', 'e3kspIfhIgPpt3uisoAD-3w3', '1', 'Nuance Test User, MD', 'Nuance', 'Provider', '', '', '2022-04-15 05:26:05', '2022-04-15 05:26:05'),
(9, 'https://fhir.epic.com/interconnect-fhir-oauth/api/FHIR/R4/Practitioner/e69NcQgKKhcP0umjLTabc4w3', 'Practitioner', 'e69NcQgKKhcP0umjLTabc4w3', '1', 'Physician One Family Med, MD', 'Provider', 'Testing', 'male', '', '2022-04-15 05:26:05', '2022-04-15 05:26:05'),
(10, 'https://fhir.epic.com/interconnect-fhir-oauth/api/FHIR/R4/Practitioner/e0Jp3gj4FaIdH3TtBOvpIIA3', 'Practitioner', 'e0Jp3gj4FaIdH3TtBOvpIIA3', '1', 'PAT Nurse, RN', 'Nurse', 'Admission Testing', 'male', '', '2022-04-15 05:26:06', '2022-04-15 05:26:06'),
(11, 'https://fhir.epic.com/interconnect-fhir-oauth/api/FHIR/R4/Practitioner/eJ4-8UN9yitphX9QfeNWDLA3', 'Practitioner', 'eJ4-8UN9yitphX9QfeNWDLA3', '1', 'Provider M Mmodal Dennis Graham', 'M Mmodal Dennis Graham', 'Provider', '', '', '2022-04-26 08:22:43', '2022-04-26 08:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_03_25_104300_create_registrations_table', 1),
(5, '2022_03_31_075457_create_doctordetails_table', 2),
(6, '2022_04_12_130318_create_repling-json_table', 3),
(7, '2022_04_12_130509_create_epic_jsons_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surgery_details`
--

CREATE TABLE `surgery_details` (
  `surgery_id` int(11) NOT NULL,
  `mr_id` varchar(255) NOT NULL,
  `surgery_details` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `reference_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surgery_details`
--

INSERT INTO `surgery_details` (`surgery_id`, `mr_id`, `surgery_details`, `start_time`, `end_time`, `start_date`, `end_date`, `reference_id`) VALUES
(1, '25', 'morning', '1:00', '3:00', '2022-09-22', '2022-07-16', 'eOyFJ.PiGBcbhr3T1oyJZ1A3'),
(4, '64', 'test', '6:00', '8:00', '2022-09-21', '2022-09-23', 'eb55Xa5E7EWWnV5eRuWsfKQ3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intelli_badge_ID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `not_a_subs_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symplr_badge_ID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `not_a_subs_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(299) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(299) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `company`, `intelli_badge_ID`, `not_a_subs_one`, `symplr_badge_ID`, `not_a_subs_two`, `remember_token`, `access_token`, `images`, `first_name`, `last_name`, `phone_no`, `created_at`, `updated_at`) VALUES
(2, '', '', NULL, '', '', '', '', '', '', NULL, '', '', NULL, NULL, '0', NULL, NULL),
(3, NULL, 'test23921@gmail.com', NULL, '$2y$10$.HPucVqPLDQYh3jErStsfuOIPJJiRz0NS.mbAyb65MmsIAAaA1x5e', 'test', '34', '1', 'tereq', '1', NULL, '', '', NULL, NULL, '0', '2022-04-02 05:30:08', '2022-04-02 05:30:08'),
(4, NULL, 'test@27883gmail.commeme', NULL, '$2y$10$ccp2mA86Gx8WTVWXZN4kcOwCgZOSpoLygcBjNGEtq0dKMIQPJP8ie', 'test hello', 'badge', '1', 'symplr', '1', NULL, '', '', NULL, NULL, '0', '2022-04-04 00:42:27', '2022-04-04 00:42:27'),
(6, NULL, 'test@27883gmail.comme', NULL, '$2y$10$NPAl.TM1227J7q6hL37Q9OEanmE7LNAMEW2e80H.ZENIR3hbA89rC', 'test', 'test', '1', 'symplr', '0', NULL, '', '', NULL, NULL, '0', '2022-04-04 01:06:48', '2022-04-04 01:06:48'),
(19, NULL, 'test7656765@gmail.comm', NULL, '$2y$10$Z7aL65KnSmdbdZxN00dVUO1xiypapq67Bgzo/Qq6djit1pkeFd/OS', 'test', 'test', '1', 'symplr', '1', NULL, '', '', NULL, NULL, '0', '2022-04-20 02:16:17', '2022-05-20 04:43:50'),
(20, NULL, 'test123123@gmail.com', NULL, '$2y$10$0EMrCg2AlZjjm87PWcggae4yoMGuqrS378BFKL8AsXBb6qF9yGmGG', 'company', 'intelli', '1', 'sy', '1', NULL, NULL, '', NULL, NULL, '0', '2022-04-20 02:28:27', '2022-09-15 01:51:53'),
(21, 'check testing', 'test532@gmail.comm', NULL, '$2y$10$.jXJG76Awm5Ek6GHM60fhe0e/TZ4f9BBhPxXtWFpBLi5HgS/ZNITS', 'Sony', 'action company', '1', 'badge_ID action', '1', NULL, NULL, '/images/photo-1486312338219-ce68d2c6f44d', 'check', 'testing', '9384756564', '2022-04-23 05:17:48', '2022-07-05 04:34:19'),
(25, 'yash mishra', 'test256561@gmail.com', NULL, '$2y$10$VZSKlo50SjMRBAUzmCFA../f1WrAori3K0gcOhNNMwyBESlmRZE9C', 'companyy', 'intelicentric', '1', 'symplr', '1', NULL, NULL, '/images/photo-1612869525425-af1a50c4fd47.avif', 'yash', 'mishra', '4567123432', '2022-04-27 08:49:02', '2022-09-17 06:26:17'),
(26, NULL, 'test21222@gmail.com', NULL, '$2y$10$io6cZzngonWMr5d0WTyhWeRVTW.13fZIvee6bXopn/WjFcrk.a/Qi', 'com', 'intelli', '1', 'fyy', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-28 05:16:53', '2022-05-13 08:09:19'),
(38, NULL, 'testlogin@demo.com', NULL, '$2y$10$r1PJZgrPxZAeroQaXo85TeSSnzYwkg4N.oHktB9StRwDUz8OLBRDm', 'company', '12345', '0', '12345', '0', NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-29 06:43:46', '2022-04-29 06:43:46'),
(39, NULL, 'testlogin212@demo.com', NULL, '$2y$10$7eQD10v7G7NoJlBKp1HH0elQNVnsycdiww/NDOyEP75/18a5YaEUu', 'Sony company', 'action badge', '1', 'badge_ID action', '1', NULL, '', NULL, 'Name first', 'Name last', '4534565435', '2022-04-29 06:45:41', '2022-05-02 02:34:21'),
(40, NULL, 'testlogin32456@demo.com', NULL, '$2y$10$hSoNrraNZDBh/EChZU6euuupQDH7U7Ry3oUmbOp59iwqsS.lquzMy', 'company', 'intellicentri', '1', 'symlp', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-29 07:26:51', '2022-04-29 07:26:51'),
(41, NULL, 'test23221@gmail.com', NULL, '$2y$10$M9MWk6M/ChOxIKm/BbAWwO3ePYTngGkFy1Ni9hMyw6hd0a8DvZzU6', 'comapny', '123', '1', 'asdasd', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-29 07:33:43', '2022-04-29 07:33:43'),
(42, NULL, 'email@gmaiii.com', NULL, '$2y$10$pYwv3UJFesMe5Drow3b5kOqlRWF0.gx3A4HxyVfb/sRF3Graz9IuC', 'company', 'intellicent', '0', 'symplr', '0', NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-29 07:36:57', '2022-04-29 07:36:57'),
(43, NULL, 'testlogin565@demo.com', NULL, '$2y$10$WmVsT4/hgMDOp087jppmo.91zdipcpiBo1Q6SVg1awmVcX3cbNbpC', 'er', 'ere', '0', 'ere', '0', NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-29 08:49:58', '2022-04-29 08:49:58'),
(44, NULL, 'test25t51@gmail.com', NULL, '$2y$10$zvT0zNuD9EUZ/A4Ezy174.HZ8cDTV7Srj4lWMtU1YAcW3nPncfPd2', 'company', 'centil', '0', 'smplr', '0', NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-29 08:52:54', '2022-04-29 08:52:54'),
(45, NULL, 'test22321@gmail.com', NULL, '$2y$10$bA0oaZeQeIcQ/ZZdJHzX2O.qDYLMFdwypP3BekRumurikJ9RyMAJm', 'company', 'intellicentic', '0', 'symplr', '0', NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-02 00:32:05', '2022-05-02 00:32:05'),
(46, NULL, 'test7821@gmail.com', NULL, '$2y$10$fhzrfrn/OMPY01xN3dl1keJONxbHoyigD3QaHFK1ZqwntBvBTi74q', 'company', 'intellicentic', '0', 'symplr', '0', NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-02 00:33:03', '2022-05-02 00:33:03'),
(47, NULL, 'test78671@gmail.com', NULL, '$2y$10$JXbsS/tlzhK1i40fiit9zuR1SaEn61PiWbjAGpk9O0qpP0irFKi56', 'company', 'intellicentic', '0', 'symplr', '0', NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-02 00:37:03', '2022-05-02 00:37:03'),
(48, NULL, 'test456781@gmail.com', NULL, '$2y$10$pMc0DrWMFjlcW0NxyAEwn.WuPHrCSD08ntzUNNfxU9mS.u1DxN0aG', 'company', 'intellicentic', '1', 'symplr', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-02 00:39:22', '2022-05-02 00:39:22'),
(49, 'john thomas', 'test481@gmail.com', NULL, '$2y$10$G5DgsXcLPFi0cRgsD/.9pe2fBImu51y1FHjHENDigf7WCwNMrH3Uq', 'company', 'intellicentic', '1', 'symplr', '1', NULL, NULL, NULL, 'john', 'thomas', '9293929392', '2022-05-02 00:48:40', '2022-05-13 05:15:17'),
(50, 'first last', 'test221@gmail.com', NULL, '$2y$10$VU3IS5icGwWmqrslrDJugezSbF4LhfLgzNAI6iNuNDa7uR7c5Td9u', 'compnay', '123', '1', '123', '1', NULL, NULL, NULL, 'first', 'last', '2345678767', '2022-05-02 01:01:14', '2022-05-13 00:24:38'),
(52, 'john lin', 'test2213@gmail.com', NULL, '$2y$10$nQlghatpxIAuzXZX6KWZqefxW2TfHd1DMxqUqoP.uPZeTzO27ijjS', NULL, NULL, NULL, NULL, NULL, NULL, '', '/images/samasungonw.jpg', 'lav', 'pandya', '4567898989', '2022-05-03 04:10:54', '2022-05-21 04:26:23'),
(60, 'suresh yadav', 'test22132@gmail.com', NULL, '$2y$10$S01/VEeh0l6y1pywL5cVU.KVxxNoMkBP7pdqawFbLMWAleZc2FMZq', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 'lav21', 'nam3434', '34567454545', '2022-05-12 06:31:23', '2022-05-12 07:54:43'),
(61, NULL, 'test12123@gmail.com', NULL, '$2y$10$X2V9yaeJe/lwP6794DrhMeKPSALTHbhUSGpwMD4BKGsT3Ekt/Sd6i', 'company', 'intelicentric', '1', 'symplr', '1', NULL, '', NULL, NULL, NULL, NULL, '2022-07-01 08:47:30', '2022-07-05 07:15:20'),
(62, 'Brian john', '123test@gmail.com', NULL, '$2y$10$9f0a1Q2SrSPE15yll52HL.njW2NIN.eFYz.sgaJ4LYRY8aVpZexO2', 'company', 'intelicentric', '1', 'symplr', '0', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTY2MzU4NTkzNCwiZXhwIjoxNjY0Nzk1NTM0LCJuYmYiOjE2NjM1ODU5MzQsImp0aSI6Ijh4Vm8zZXFMZWZudFpobnAiLCJzdWIiOjYyLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.pVdSUguPqMJMXiqeahh1WGXFBkNR48YkJ3bgZlNtRTw', '/images/office1.jpg', 'Brian', 'john', '453212343', '2022-07-22 07:34:38', '2022-09-19 05:42:14'),
(63, 'mukesh patel', 'test123@gmail.com', NULL, '$2y$10$5Swmjzpdj2syFeC748K9kuGPkv2ygYGAFXJtkaJMUWSgJZ19FAngO', 'company', 'intellicentric', '1', 'symplr', '1', NULL, NULL, '/images/photo-1507525428034-b723cf961d3e.avif', 'mukesh', 'patel', '565654345', '2022-09-15 02:34:49', '2022-09-19 05:36:15'),
(64, 'parveen singh', '1234test@gmail.com', NULL, '$2y$10$yL.VHZer1nSxzCuzosX4Z.R8N.0kFQJmmm/Ssx0j8np1o/bZSsFy2', 'company', 'intellicentric', '1', 'symlpr', '1', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTY2MzU4NTU4MiwiZXhwIjoxNjY0Nzk1MTgyLCJuYmYiOjE2NjM1ODU1ODIsImp0aSI6Ilh3SmdLcWp1TkRsVFdLNHgiLCJzdWIiOjY0LCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.ayxfjb9YQJAZVct-2kvWgc1WvMZDicr8gZE7HAhj31w', '/images/photo-1573847792062-9292df56ebb4.avif', 'parveen', 'singh', '2323454545', '2022-09-15 05:02:38', '2022-09-19 05:37:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctordetails`
--
ALTER TABLE `doctordetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `epic_jsons`
--
ALTER TABLE `epic_jsons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `surgery_details`
--
ALTER TABLE `surgery_details`
  ADD PRIMARY KEY (`surgery_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctordetails`
--
ALTER TABLE `doctordetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `epic_jsons`
--
ALTER TABLE `epic_jsons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `surgery_details`
--
ALTER TABLE `surgery_details`
  MODIFY `surgery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
