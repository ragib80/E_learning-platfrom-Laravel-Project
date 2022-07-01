-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2021 at 08:24 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-learn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `a_id` int(100) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `p_num` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `ans_id` int(100) NOT NULL,
  `q_id` int(100) NOT NULL,
  `st_id` int(100) NOT NULL,
  `i_id` int(100) NOT NULL,
  `time` date NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `c_id` int(100) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `i_id` int(100) NOT NULL,
  `st-id` int(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `enrolled` int(100) NOT NULL,
  `image` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`c_id`, `c_name`, `i_id`, `st-id`, `status`, `enrolled`, `image`) VALUES
(1, 'Advanced Web ', 1, 1, 'deactive', 50, '/assets/images/dev.png'),
(2, 'Data Science', 1, 1, 'active', 120, '/assets/images/data.png');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(12) NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `descriptions` varchar(128) DEFAULT NULL,
  `file` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `i_id` varchar(128) NOT NULL,
  `fullname` varchar(128) DEFAULT NULL,
  `c_id` int(12) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`i_id`, `fullname`, `c_id`, `email`, `image`, `status`) VALUES
('1', 'sayem', 1, 'sayem@gmail.com', '/assets/images/bat.jpg', 'deactive'),
('2', 'sasha', 2, 'chysayem9@gmail.com', '/assets/images/bat.jpg', 'active');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2014_10_12_000000_create_users_table', 2);

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
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_id` int(100) NOT NULL,
  `question` text NOT NULL,
  `st_id` int(100) DEFAULT NULL,
  `i_id` int(100) DEFAULT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quizes`
--

CREATE TABLE `quizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `c_id` int(11) NOT NULL,
  `quiz_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizes`
--

INSERT INTO `quizes` (`id`, `c_id`, `quiz_name`, `description`, `quiz_date`, `quiz_time`, `number_of_question`, `status`, `created_at`, `updated_at`) VALUES
(8, 1006, 'CN', 'CN Q1', '2021-07-07', '15:00', '10', '1', '2021-07-02 13:03:39', '2021-07-02 13:03:39'),
(9, 1006, 'CN', 'CN Q2', '2021-07-15', '10:00', '10', '1', '2021-07-02 13:05:57', '2021-07-02 13:05:57');

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `s_id` int(12) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scholarships`
--

INSERT INTO `scholarships` (`s_id`, `name`, `address`, `email`, `status`) VALUES
(1, 'sayem', 'ctg', 'asay@gmail.com', 'accepted'),
(2, 'korim', 'ctg', 'asay@gmail.com', 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` blob DEFAULT NULL,
  `provider` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `name`, `email`, `password`, `avatar`, `provider`, `provider_id`, `access_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohammad Sayem Chowdhury', 'chysayem9@gmail.com', '12345678', NULL, 'github', '57545651', NULL, '0i4ICQxyv8oS3uhKMtKFchkebaGKkz3i5zokbMa5d9pAYGeRuKckKbE78vTs', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `st_id` int(100) NOT NULL,
  `username` varchar(128) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `country` varchar(128) NOT NULL,
  `p_num` varchar(100) NOT NULL,
  `c_id` int(100) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`st_id`, `username`, `fullname`, `password`, `email`, `dob`, `address`, `country`, `p_num`, `c_id`, `image`, `status`) VALUES
(1, 'rinku', 'Pronoy Rinku', '12345678', 'rinku@gmail.com', '2019-02-19', 'Chittagong,Bangladesh', 'Bangladesh', '019123456789', 1, '/assets/images/bat.jpg', 'deactive'),
(2, 'sayem', 'Mohammad Sayem', '12345678', 'rinku@gmail.com', '2019-02-19', 'Chittagong,Bangladesh', 'USA', '019123456789', 1, '/assets/images/bat.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `stuffs`
--

CREATE TABLE `stuffs` (
  `stf_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `p_num` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stuffs`
--

INSERT INTO `stuffs` (`stf_id`, `username`, `fullname`, `password`, `email`, `dob`, `address`, `p_num`) VALUES
(1, 'John', 'John Banega Don', '12345678', '12345678', '2016-06-01', 'Furfuri Nagar', '123321456654');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1' COMMENT '0=Admin|1=Instructor|2=Student|3=Support',
  `address` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `avatar` blob DEFAULT NULL,
  `access_token` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `type`, `address`, `phone`, `avatar`, `access_token`, `remember_token`, `provider`, `provider_id`, `created_at`, `updated_at`) VALUES
(2, 'Bruce', 'batman', 'batman@gmail.com', '12345678', '0', 'Gotham City', 1234567854, 0x89504e470d0a1a0a0000000d4948445200000010000000100803000000282d0f530000000467414d410000b18f0bfc6105000000017352474200aece1ce9000001cb504c544554464271716c504d4b504e4f5a4c485c5c5a77656c796c774e413d685a615054554e43484e4a42403b3d7f7b8166554c494b4a8a8e8639411f755a545c656575767d1f335f4a42406e5a644e434244433d6463687061667162674c3d42514e5855595f5f51537973799090924e464a60514c534a4c5c473f6c6b672c2820474749767875392c263f332e151929575d444b3d367d817b7e82684960384447357c6867a1a2a0957b7353524f6e6c6c706a474c4e1e675351888a906a6b4a344163213f78b6babc91989e244471c4cdd45c565d56524d5857545a5252736a7666575c3e364507091182727b7f6873615b643d42462d302e746a71323435736f7441533962523c425f359886513652373a4c2b474741a0a7958f93926e753aaba97c8f8f72a692384e5f369b93783f552c66615d8a8b456a6b54aaaba0968f52adb1967f7d53343a23606b42ab9b2c968f8822181734372b3c552a8d8a6041503e73744a57443646432b746a2e74819679764f7672572438631f315b2927304e50315c57335451352e445f34747d4c534a1bcbb0bcb84b4e5d583a4533141e446f736171534e1088804d665da4a150ffff4e2c9390dbe9e4a5b0b130665c44524aedf1809facb9ecf7ff504e48dae11d7c000003337a5458745261772070726f66696c65207479706520786d700000789ced9d4172db300c45f73c458e400324281d47b6a85d67baecf1fb2925695c278e6da6cdd70cac198b1241100f04567fa1f0ebc7cff0f4f474101bc6a0275dca50a21d4ced68b924892696add86855672975391e8f8b14bc1f2db537b9684eb3c634979814b6838d210d652a5898b54ca9e664b8c3a12a1649d1456b9ce3a4a732e85406c3529bdb767690d89eed64b5a84e0106b308e249b6b44874da265ecd1711ad7024b0309db2a494ecdc499b0b986c8e869270459db07029eb4f6a8195545b605864d1838eedc228aae05ff03f6f1bc81c8a16e4a2ed5d0699db0e6dfe6d0c08004901b2d858222c47c45e11d3f33c68c49680ccb504b60ce635999319a64cb335c3a419ee81ae8a9ccd88aa25e18077b8ab6a1bb5bb06dc7006301854b01cdef13bcfc09ae2cb04acd1d797ec06cb78500c67e46600606cd990aaf135cd9ba32935b80c8bd4b296dbf2c54e5af35a28a1f9436655628ea887a599494c19efc76d8944c41b57d7b58db43d1fd631aa0424494f821c7db25f33ba9ef6cd269cd7c7f3c28be2dbca52e2c757b83679cff57f1c5d87d919da3d30f4688fc3f0a19db33044d4e1e8dac1ec0eedf62adb01daa32d4389f635fdcf81f6968523a20e471f1fcc0ed16eadb25da03dd632a4685fd1ff2c687f585822ea70f4d1c1ec12edb62adb09da232d438bd6dfff3c682f2c3c1175387aff60768a764b95ed06edfe962146ebed7f26b48d8529a20e47ef1dcc6ed13eafb21da1dddb32d4687dfdcf85d658b822ea70747930df1d5187a3cfaa6c5768f7b50c395a4fffb3a1c5892da20e477f1fccf747d4e1c8c54c5634173349d15ccc644573319315cdc54c5234173359d15ccc244573319315cdc54c5634173349d15ccc644573319314cdc54c5634173359d15ccc244573319315cdc54c5234173359d15ccc644573319314cdc54c5634173359d15ccc244573319315cdc54c5234173359d15ccc644573319314cdc54c5634173349d15ccc644573319315cdc54c5234173359d15ccc244573319315cdc54c5634173349d15ccc644573319315cdc54c5234173359d15cccfc1711b54f8b848b6f8b64abdb57444ad93e0b127e03af0846dd7f8a32b3000000097048597300000b1200000b1201d2dd7efc000001104944415418d30dc8d362c3001400d09b365aaa946b6adbabadd9b63adb56679b9fbb9ec703b38bc239ef4e5a922f1653bfefdfaf1010ce4f2cc5cb0f31690ef9f978b901efc2f848207e7e177a94d25f92ab2894c606a6fce9b30b3cf9fcf9741bdc83fec1d2cad6e15136232bbc5d8b1209e81d9aaed9dcce9c6465f785cbfdd549088a44cb1b628becd8e3128b7d641fc4b8f699c85a387f70ba1b1198937ae0f744fd4e4c98b3ad93561f080420e5a79cc38e30e2769b1c3c12ccd068e01bb051c40ea815385a13030441741911aabb938da24032b5956835da4cba0e9e82dd805a4817e06d5a8cc7d13749a83f160b986ac09b5b3455156a2555a7a03136b47b34215c2d97ab544a5d3d9745ff034fa938098c3890410000000049454e44ae426082, NULL, '', NULL, NULL, NULL, NULL),
(13, NULL, 'Mohammad Sayem Chowdhury', 'chysayem9@gmail.com', NULL, '1', 'Dhaka', 1234567875, NULL, NULL, 'RrCvsqta7Oc9ZCcT0I8YGWq4IOvxgSS420vUgwhNqU1b4EJayNs38jmGofKX', NULL, NULL, NULL, NULL),
(14, 'Saayem', NULL, 'umsi@umich.edu', '12345678', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`i_id`),
  ADD UNIQUE KEY `i_id` (`i_id`);

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
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `quizes`
--
ALTER TABLE `quizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `socials_email_unique` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `stuffs`
--
ALTER TABLE `stuffs`
  ADD PRIMARY KEY (`stf_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `a_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `ans_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `c_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizes`
--
ALTER TABLE `quizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `st_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=505;

--
-- AUTO_INCREMENT for table `stuffs`
--
ALTER TABLE `stuffs`
  MODIFY `stf_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
