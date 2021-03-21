-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 02, 2021 at 05:41 AM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `topik_db`
--

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language_name`, `created_at`, `updated_at`) VALUES
(1, 'korean', '2021-02-01 22:52:22', '2021-02-01 22:52:22');

-- --------------------------------------------------------

--
-- Table structure for table `listening_answers`
--

CREATE TABLE `listening_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listening_questions_id` bigint(20) UNSIGNED NOT NULL,
  `listening_options_id` bigint(20) UNSIGNED NOT NULL,
  `option_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listening_answers`
--

INSERT INTO `listening_answers` (`id`, `listening_questions_id`, `listening_options_id`, `option_number`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, NULL, NULL),
(2, 2, 8, 4, NULL, NULL),
(3, 3, 11, 3, NULL, NULL),
(4, 4, 14, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `listening_groups`
--

CREATE TABLE `listening_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_sets_id` bigint(20) UNSIGNED DEFAULT NULL,
  `group_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listening_groups`
--

INSERT INTO `listening_groups` (`id`, `question_sets_id`, `group_text`, `group_image`, `created_at`, `updated_at`) VALUES
(2, 1, '[21~24] 들은 것을 고르십시오', 'Screen Shot 2021-02-02 at 10.49.08_1612242261.png', '2021-02-01 23:19:21', '2021-02-01 23:19:21'),
(3, 1, '[21~24] 들은 것을 고르십시오.', 'Screen Shot 2021-02-02 at 10.49.08_1612242462.png', '2021-02-01 23:22:42', '2021-02-01 23:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `listening_options`
--

CREATE TABLE `listening_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listening_questions_id` bigint(20) UNSIGNED DEFAULT NULL,
  `option_content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listening_options`
--

INSERT INTO `listening_options` (`id`, `listening_questions_id`, `option_content`, `option_number`, `created_at`, `updated_at`) VALUES
(1, 1, '기내', 1, NULL, NULL),
(2, 1, '그네', 2, NULL, NULL),
(3, 1, '그녀', 3, NULL, NULL),
(4, 1, '은혜', 4, NULL, NULL),
(5, 2, '화가', 1, NULL, NULL),
(6, 2, '누가', 2, NULL, NULL),
(7, 2, '무과', 3, NULL, NULL),
(8, 2, '뭐가', 4, NULL, NULL),
(9, 3, 'Screen Shot 2021-02-02 at 10.52.52_1612242574.png', 1, NULL, NULL),
(10, 3, 'Screen Shot 2021-02-02 at 10.53.01_1612242574.png', 2, NULL, NULL),
(11, 3, 'Screen Shot 2021-02-02 at 10.53.05_1612242574.png', 3, NULL, NULL),
(12, 3, 'Screen Shot 2021-02-02 at 10.53.09_1612242574.png', 4, NULL, NULL),
(13, 4, 'Screen Shot 2021-02-02 at 10.53.16_1612242574.png', 1, NULL, NULL),
(14, 4, 'Screen Shot 2021-02-02 at 10.53.20_1612242574.png', 2, NULL, NULL),
(15, 4, 'Screen Shot 2021-02-02 at 10.53.24_1612242574.png', 3, NULL, NULL),
(16, 4, 'Screen Shot 2021-02-02 at 10.53.28_1612242574.png', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `listening_questions`
--

CREATE TABLE `listening_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listening_group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question_content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listening_questions`
--

INSERT INTO `listening_questions` (`id`, `listening_group_id`, `question_content`, `audio_file`, `image_file`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, '21_1612242414.mp3', NULL, NULL, NULL),
(2, 2, NULL, '22_1612242414.mp3', NULL, NULL, NULL),
(3, 3, NULL, '23_1612242574.mp3', NULL, NULL, NULL),
(4, 3, NULL, '24_1612242574.mp3', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `listening_submitted_answers`
--

CREATE TABLE `listening_submitted_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listening_question_id` bigint(20) UNSIGNED NOT NULL,
  `listening_answer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `answer_option_id` bigint(20) UNSIGNED DEFAULT NULL,
  `set_id` bigint(20) UNSIGNED NOT NULL,
  `student_results_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(64, '2014_10_12_000000_create_users_table', 1),
(65, '2014_10_12_100000_create_password_resets_table', 1),
(66, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(67, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(68, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(69, '2016_06_01_000004_create_oauth_clients_table', 1),
(70, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(71, '2019_08_19_000000_create_failed_jobs_table', 1),
(72, '2020_01_26_101036_create_languages_table', 1),
(73, '2020_01_26_101117_create_question_sets_table', 1),
(74, '2020_01_26_101118_create_question_groups_table', 1),
(75, '2020_01_26_101936_create_reading_questions_table', 1),
(76, '2020_01_27_053956_create_reading_options_table', 1),
(77, '2020_01_27_054801_create_reading_answers_table', 1),
(78, '2020_01_27_063450_create_student_results_table', 1),
(79, '2020_01_27_063451_create_reading_submitted_answers_table', 1),
(80, '2020_04_05_061526_create_listening_groups_table', 1),
(81, '2020_04_06_101035_create_listening_questions_table', 1),
(82, '2021_01_07_052420_create_listening_options_table', 1),
(83, '2021_01_07_053115_create_listening_answers_table', 1),
(84, '2021_01_31_050422_create_listening_submitted_answers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('28b1ec84c45f0f9c0d67a0c7bcb915b8f2f5f5d764089d4b44474db092f6a86ff1177c7b1a66a584', 2, 1, 'authToken', '[]', 0, '2021-02-01 23:33:58', '2021-02-01 23:33:58', '2021-02-02 13:38:58'),
('6bfbe064517161e95ca7067fa60d27f0a2c5cef69e5ed4554142de9cc319ed1e159ce629fc6f95e9', 2, 1, 'authToken', '[]', 0, '2021-02-01 23:53:39', '2021-02-01 23:53:39', '2021-02-02 13:58:39'),
('eef0633409eb506e75098b430e3399d8db78d5b908d7591f0420e2153a63bb7e2a7981ceb016cb80', 1, 1, 'authToken', '[]', 0, '2021-02-01 23:35:42', '2021-02-01 23:35:42', '2021-02-02 13:40:42'),
('f46739c00c490f7981314f5fb7e9a41b488289013240d9cdd04582b31508c764d60b328067993e63', 1, 1, 'authToken', '[]', 0, '2021-02-01 22:52:16', '2021-02-01 22:52:16', '2021-02-02 12:57:16');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'NcbHOPLKsMFwl33cDDskXUY38HYPoQoFy81ibHme', 'http://localhost', 1, 0, 0, '2021-02-01 22:46:00', '2021-02-01 22:46:00'),
(2, NULL, 'Laravel Password Grant Client', 'XRHB98JgzmkZ7gGTb04I5cmLz7R6AKhUmPgXaXis', 'http://localhost', 0, 1, 0, '2021-02-01 22:46:00', '2021-02-01 22:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-02-01 22:46:00', '2021-02-01 22:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question_groups`
--

CREATE TABLE `question_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_sets_id` bigint(20) UNSIGNED DEFAULT NULL,
  `group_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_groups`
--

INSERT INTO `question_groups` (`id`, `question_sets_id`, `group_text`, `created_at`, `updated_at`) VALUES
(1, 1, '[1-2] 다음 그림을 보고 맞는 단어나 문장을 고르십시오.', '2021-02-01 22:53:38', '2021-02-01 22:53:38'),
(2, 1, '[3-4]다음 질문에 답하십시오', '2021-02-01 22:56:00', '2021-02-01 22:56:00'),
(3, 1, '[5~8]빈칸에 들어갈 가장 알맞은 것을 고르십시오', '2021-02-01 22:58:37', '2021-02-01 22:58:37'),
(4, 1, '[9~12] 다음 질문에 답하십시오.', '2021-02-01 23:01:52', '2021-02-01 23:01:52'),
(5, 1, '[13~14]빈칸에 들어갈 가장 알맞은 것을 고르십시오', '2021-02-01 23:06:41', '2021-02-01 23:06:41'),
(6, 1, '[15~16] 다음 글을 읽고 무엇에 대한 글인지 고르십시오', '2021-02-01 23:08:29', '2021-02-01 23:08:29'),
(7, 1, '[17~18] 다음 글을 읽고 내용과 다른  것을 고르십시오.', '2021-02-01 23:10:57', '2021-02-01 23:10:57'),
(8, 1, '[19~20]다음 설명에 알맞은 어휘를 고르십시오.', '2021-02-01 23:13:19', '2021-02-01 23:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `question_sets`
--

CREATE TABLE `question_sets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `languages_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_sets`
--

INSERT INTO `question_sets` (`id`, `languages_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'set a', 1, '2021-02-01 22:53:08', '2021-02-01 22:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `reading_answers`
--

CREATE TABLE `reading_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reading_questions_id` bigint(20) UNSIGNED NOT NULL,
  `reading_options_id` bigint(20) UNSIGNED NOT NULL,
  `option_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reading_answers`
--

INSERT INTO `reading_answers` (`id`, `reading_questions_id`, `reading_options_id`, `option_number`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 3, NULL, NULL),
(2, 2, 6, 2, NULL, NULL),
(3, 3, 12, 4, NULL, NULL),
(4, 4, 14, 2, NULL, NULL),
(5, 5, 19, 3, NULL, NULL),
(6, 6, 24, 4, NULL, NULL),
(7, 7, 26, 2, NULL, NULL),
(8, 8, 29, 1, NULL, NULL),
(9, 9, 36, 4, NULL, NULL),
(10, 10, 37, 1, NULL, NULL),
(11, 11, 43, 3, NULL, NULL),
(12, 12, 48, 4, NULL, NULL),
(13, 13, 50, 2, NULL, NULL),
(14, 14, 56, 4, NULL, NULL),
(15, 15, 57, 1, NULL, NULL),
(16, 16, 63, 3, NULL, NULL),
(17, 17, 67, 3, NULL, NULL),
(18, 18, 70, 2, NULL, NULL),
(19, 19, 75, 3, NULL, NULL),
(20, 20, 80, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reading_options`
--

CREATE TABLE `reading_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reading_questions_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reading_options_content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reading_options`
--

INSERT INTO `reading_options` (`id`, `reading_questions_id`, `reading_options_content`, `option_number`, `created_at`, `updated_at`) VALUES
(1, 1, '철근 절곡기', 1, NULL, NULL),
(2, 1, '결속기', 2, NULL, NULL),
(3, 1, '철근 절단기', 3, NULL, NULL),
(4, 1, '용접기', 4, NULL, NULL),
(5, 2, '남자가 관리하고 있습니다', 1, NULL, NULL),
(6, 2, '남자가 재고를 파악하고 있습니다', 2, NULL, NULL),
(7, 2, '남자가 온도를 유지하고 있습니다', 3, NULL, NULL),
(8, 2, '남자가 상자를 쌓고 있습니다', 4, NULL, NULL),
(9, 3, '불다', 1, NULL, NULL),
(10, 3, '걷히다', 2, NULL, NULL),
(11, 3, '빼다', 3, NULL, NULL),
(12, 3, '끼다', 4, NULL, NULL),
(13, 4, '인출하다', 1, NULL, NULL),
(14, 4, '송금하다', 2, NULL, NULL),
(15, 4, '출금하다', 3, NULL, NULL),
(16, 4, '환전하다', 4, NULL, NULL),
(17, 5, '행동', 1, NULL, NULL),
(18, 5, '전통', 2, NULL, NULL),
(19, 5, '습관', 3, NULL, NULL),
(20, 5, '환경', 4, NULL, NULL),
(21, 6, '지시를 받습니다', 1, NULL, NULL),
(22, 6, '명령을 듣습니다', 2, NULL, NULL),
(23, 6, '설명을 합니다', 3, NULL, NULL),
(24, 6, '설명을 듣습니다', 4, NULL, NULL),
(25, 7, '사무실', 1, NULL, NULL),
(26, 7, '집', 2, NULL, NULL),
(27, 7, '회의실', 3, NULL, NULL),
(28, 7, '오락실', 4, NULL, NULL),
(29, 8, '자서', 1, NULL, NULL),
(30, 8, '못 자서', 2, NULL, NULL),
(31, 8, '자도', 3, NULL, NULL),
(32, 8, '자려면', 4, NULL, NULL),
(33, 9, '우마차 통행금지 입니다', 1, NULL, NULL),
(34, 9, '이륜자동차 통행금지 입니다', 2, NULL, NULL),
(35, 9, '승합자동차 통행금지 입니다', 3, NULL, NULL),
(36, 9, '자전거 통행금지 입니다', 4, NULL, NULL),
(37, 10, '과장입니다.', 1, NULL, NULL),
(38, 10, '지니입니다.', 2, NULL, NULL),
(39, 10, '대구경북경제청입니다.', 3, NULL, NULL),
(40, 10, '대구입니다.', 4, NULL, NULL),
(41, 11, '새마을호가 더 쌉니다', 1, NULL, NULL),
(42, 11, '서울 끼자 갑니다', 2, NULL, NULL),
(43, 11, '오후에 도착합니다', 3, NULL, NULL),
(44, 11, '부산에서 출발합니다', 4, NULL, NULL),
(45, 12, '포도와 귤을 먹는 수준이 동일입니다', 1, NULL, NULL),
(46, 12, '복숭아를 먹는 한국인이 보다 배를 먹는 한국인이 더 많다', 2, NULL, NULL),
(47, 12, '모든 한국인이 사과를 반드시 먹습니다', 3, NULL, NULL),
(48, 12, '수박이 한국인이 좋아하는 과일중에 두번째입니다', 4, NULL, NULL),
(49, 13, '수표나 통장', 1, NULL, NULL),
(50, 13, '카드나 통장', 2, NULL, NULL),
(51, 13, '현금이나 카드', 3, NULL, NULL),
(52, 13, '계좌번호와 카드', 4, NULL, NULL),
(53, 14, '부수는', 1, NULL, NULL),
(54, 14, '조립하면서', 2, NULL, NULL),
(55, 14, '조립하는', 3, NULL, NULL),
(56, 14, '부수면서', 4, NULL, NULL),
(57, 15, '발효 식품', 1, NULL, NULL),
(58, 15, '영양제', 2, NULL, NULL),
(59, 15, '한약', 3, NULL, NULL),
(60, 15, '보관음식', 4, NULL, NULL),
(61, 16, '인터넷쇼핑', 1, NULL, NULL),
(62, 16, '배달음식', 2, NULL, NULL),
(63, 16, '우체국쇼핑', 3, NULL, NULL),
(64, 16, '전자품구매', 4, NULL, NULL),
(65, 17, '전화를 하고 싶을 때는 문자 메시지를 보내야 합니다', 1, NULL, NULL),
(66, 17, '비밀이야기를 할때 반드시 전화로 해야 합니다', 2, NULL, NULL),
(67, 17, '수신자가  전화를 받아서 전화통화를 합니다', 3, NULL, NULL),
(68, 17, '도서관이나 음악회에 가는 길에 전화하면 안 됩니다', 4, NULL, NULL),
(69, 18, '출근하기 전에 10 분씩 걷는 것이 가장 좋습니다', 1, NULL, NULL),
(70, 18, '걷기 운동은 바쁜 사람도 할 수 있습니다', 2, NULL, NULL),
(71, 18, '걷기 운동은 준비물이 많이 필요합니다', 3, NULL, NULL),
(72, 18, '저녁 식사 후 걷는 것이 가장 좋습니다', 4, NULL, NULL),
(73, 19, '곡괭이', 1, NULL, NULL),
(74, 19, '망치', 2, NULL, NULL),
(75, 19, '장도리', 3, NULL, NULL),
(76, 19, '도끼', 4, NULL, NULL),
(77, 20, '하늘', 1, NULL, NULL),
(78, 20, '날씨', 2, NULL, NULL),
(79, 20, '가을', 3, NULL, NULL),
(80, 20, '계절', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reading_questions`
--

CREATE TABLE `reading_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question_content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_instruction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reading_questions`
--

INSERT INTO `reading_questions` (`id`, `question_group_id`, `question_content`, `question_instruction`, `question_image`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, 'Screen Shot 2021-02-02 at 10.24.33_1612240832.png', NULL, NULL),
(2, 1, NULL, NULL, 'Screen Shot 2021-02-02 at 10.24.38_1612240832.png', NULL, NULL),
(3, 2, '다음  단어와  관계 있는 것은 무엇입니까?', '구름,반지,안개,장갑', NULL, NULL, NULL),
(4, 2, '다음  단어의  비슷한말은 무엇입니까?', '돈을 부치다', NULL, NULL, NULL),
(5, 3, NULL, '한국에서는 서구 문화 때문에 죄식 생활을 하는 사람들이 줄고 있지만 바닥에 앉는 ______________에 익숙한 사람들이 많습니다.', NULL, NULL, NULL),
(6, 3, NULL, '병원에서 진료가 끝나면  근처 약국에 가서 처방전을 내고 약을 받은 후에 복용법에 대한 _____________________.', NULL, NULL, NULL),
(7, 3, NULL, '한국에서는 좌식문화가 발달했습니다.그래서 한국인의 _____________을/를 방문할때는 현관에서 신발을 벗고 들어가야 합니다.', NULL, NULL, NULL),
(8, 3, NULL, '어제 친구 생일이어서 친구하고 술을 마셨습니다.그런데 술을  마신후에 잠을 많이 ________________회사에 늦었습니다.', NULL, NULL, NULL),
(9, 4, '이 표지는  무슨 뜻입니까?', NULL, 'Screen Shot 2021-02-02 at 10.32.39_1612241472.png', NULL, NULL),
(10, 4, '이 사람의 직위는 무엇입니까?', NULL, 'Screen Shot 2021-02-02 at 10.32.59_1612241472.png', NULL, NULL),
(11, 4, '다음 기차표의 대한 내용과 맞는 것을 고르십시오?', NULL, 'Screen Shot 2021-02-02 at 10.33.06_1612241472.png', NULL, NULL),
(12, 4, '다음 그래프에 대한 설명으로 맞는 것은 무엇입니까?', NULL, 'Screen Shot 2021-02-02 at 10.33.15_1612241472.png', NULL, NULL),
(13, 5, NULL, '자동인출기로 입금을 하거나 출금을 할 수 있습니다.그런데 돈을 넣거나 찾으려면 반드시 _________________이/가 있어야 합니다', NULL, NULL, NULL),
(14, 5, NULL, '제 직업은 회사원입니다.가구공장에서 동료들과 함께 살고 매일 가구를 ____________ 일을 합니다', NULL, NULL, NULL),
(15, 6, NULL, '김치,간장,된장,고추장,젓갈 등은 한국사람들이 즐겨 먹는 음식입니다.이 음식은 옛날에 제철이 아니면 구하기 어려운 채소나 생선을 오랫동안 저장해 두고 먹기 위해 만들었습니다.최근 이 식품이 면역력 강화에 뛰어난 효과가 있다고 알려지면서 관심이 높아 졌습니다.', NULL, NULL, NULL),
(16, 6, NULL, '한국의 우체국 카타로그를 보고 물건을 주문하면 집으로 배달해 줍니다. 처음에는 우체국에가서 직접 주문을 해야 했지만 요즘은 전화나 인터넷으로도 주문할 수 있습니다.홈페이지를 보면 어느 곳에서 어떤 것이 유명한지 알 수 있습니다.', NULL, NULL, NULL),
(17, 7, NULL, '전화를 받지 않을때 전하고 싶은 말을 음성 메시지로 남깁니다.그리고 간단한 이야기는 문자 메시지로 보내면 싸고 편리합니다.전화를 거는 사람은 발신자이고 전화를 받는 사람은 수신자입니다.도서관이나 음악회에 가면 벨소리를 진동으로 바꾸어야 합니다. 자주 사용하는 전화번호는 간단한 단축 번호를 정해 놓으면 편리합니다.', NULL, NULL, NULL),
(18, 7, NULL, '걷는 것은 건강에 아주 좋습니다.걷기 운동은 운동할 시간이 없는 사람들에게 아주 좋습니다.점심 식사 후 회사 근처를 10분 정도 걸어 보십시오.그리고 엘리베이터를 타지 말고 계단을 이용하십시오.회사가 집에서 가깝습니까?그럼 걸어서 출근하는 것도 아주 좋습니다.걷기 운동은 편한 신발만 있으면 할 수 있습니다', NULL, NULL, NULL),
(19, 8, NULL, '단단한 물건이나 불에 달군 쇠를 두드리는 데 쓰는 쇠로 만든 연장입니다.모양은 마치와 비슷하고 훨씬 크고 무거우며 자루도 깁니다.', NULL, NULL, NULL),
(20, 8, NULL, '가을에는 날씨가 시원하고 하늘이 맑습니다.한국에는 봄,여름,가을,겨울이 있습니다. 저는 봄과 가을을 좋아합니다.가을에는 날씨가 시원하고 하늘이 맑습니다', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reading_submitted_answers`
--

CREATE TABLE `reading_submitted_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reading_question_id` bigint(20) UNSIGNED NOT NULL,
  `reading_answer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `answer_option_id` bigint(20) UNSIGNED DEFAULT NULL,
  `set_id` bigint(20) UNSIGNED NOT NULL,
  `student_results_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_results`
--

CREATE TABLE `student_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `question_sets_id` bigint(20) UNSIGNED NOT NULL,
  `scored_points` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `role`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'name@domain.com', '$2y$10$vNVknrjMazfBQUqBxTlM9uj78UlameDZEhtmnr9M9VSnsgGKdOY26', 1, 'admin', NULL, NULL, NULL, NULL),
(2, 'student', 'student@student.com', '$2y$10$hibEZzDBVBdpOTVlXXRTU.HK742hS1q.lIkFSENF4h5s97n6y0nca', 1, 'student', NULL, NULL, '2021-02-01 22:52:33', '2021-02-01 22:52:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listening_answers`
--
ALTER TABLE `listening_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listening_answers_listening_questions_id_foreign` (`listening_questions_id`),
  ADD KEY `listening_answers_listening_options_id_foreign` (`listening_options_id`);

--
-- Indexes for table `listening_groups`
--
ALTER TABLE `listening_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listening_groups_question_sets_id_foreign` (`question_sets_id`);

--
-- Indexes for table `listening_options`
--
ALTER TABLE `listening_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listening_options_listening_questions_id_foreign` (`listening_questions_id`);

--
-- Indexes for table `listening_questions`
--
ALTER TABLE `listening_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listening_questions_listening_group_id_foreign` (`listening_group_id`);

--
-- Indexes for table `listening_submitted_answers`
--
ALTER TABLE `listening_submitted_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listening_submitted_answers_listening_question_id_foreign` (`listening_question_id`),
  ADD KEY `listening_submitted_answers_student_results_id_foreign` (`student_results_id`),
  ADD KEY `listening_submitted_answers_student_id_foreign` (`student_id`),
  ADD KEY `listening_submitted_answers_answer_option_id_foreign` (`answer_option_id`),
  ADD KEY `listening_submitted_answers_set_id_foreign` (`set_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `question_groups`
--
ALTER TABLE `question_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_groups_question_sets_id_foreign` (`question_sets_id`);

--
-- Indexes for table `question_sets`
--
ALTER TABLE `question_sets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_sets_languages_id_foreign` (`languages_id`);

--
-- Indexes for table `reading_answers`
--
ALTER TABLE `reading_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reading_answers_reading_questions_id_foreign` (`reading_questions_id`),
  ADD KEY `reading_answers_reading_options_id_foreign` (`reading_options_id`);

--
-- Indexes for table `reading_options`
--
ALTER TABLE `reading_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reading_options_reading_questions_id_foreign` (`reading_questions_id`);

--
-- Indexes for table `reading_questions`
--
ALTER TABLE `reading_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reading_questions_question_group_id_foreign` (`question_group_id`);

--
-- Indexes for table `reading_submitted_answers`
--
ALTER TABLE `reading_submitted_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reading_submitted_answers_reading_question_id_foreign` (`reading_question_id`),
  ADD KEY `reading_submitted_answers_student_results_id_foreign` (`student_results_id`),
  ADD KEY `reading_submitted_answers_student_id_foreign` (`student_id`),
  ADD KEY `reading_submitted_answers_answer_option_id_foreign` (`answer_option_id`),
  ADD KEY `reading_submitted_answers_set_id_foreign` (`set_id`);

--
-- Indexes for table `student_results`
--
ALTER TABLE `student_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_results_student_id_foreign` (`student_id`),
  ADD KEY `student_results_question_sets_id_foreign` (`question_sets_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `listening_answers`
--
ALTER TABLE `listening_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `listening_groups`
--
ALTER TABLE `listening_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `listening_options`
--
ALTER TABLE `listening_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `listening_questions`
--
ALTER TABLE `listening_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `listening_submitted_answers`
--
ALTER TABLE `listening_submitted_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question_groups`
--
ALTER TABLE `question_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `question_sets`
--
ALTER TABLE `question_sets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reading_answers`
--
ALTER TABLE `reading_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reading_options`
--
ALTER TABLE `reading_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `reading_questions`
--
ALTER TABLE `reading_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reading_submitted_answers`
--
ALTER TABLE `reading_submitted_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_results`
--
ALTER TABLE `student_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `listening_answers`
--
ALTER TABLE `listening_answers`
  ADD CONSTRAINT `listening_answers_listening_options_id_foreign` FOREIGN KEY (`listening_options_id`) REFERENCES `listening_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listening_answers_listening_questions_id_foreign` FOREIGN KEY (`listening_questions_id`) REFERENCES `listening_questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `listening_groups`
--
ALTER TABLE `listening_groups`
  ADD CONSTRAINT `listening_groups_question_sets_id_foreign` FOREIGN KEY (`question_sets_id`) REFERENCES `question_sets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `listening_options`
--
ALTER TABLE `listening_options`
  ADD CONSTRAINT `listening_options_listening_questions_id_foreign` FOREIGN KEY (`listening_questions_id`) REFERENCES `listening_questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `listening_questions`
--
ALTER TABLE `listening_questions`
  ADD CONSTRAINT `listening_questions_listening_group_id_foreign` FOREIGN KEY (`listening_group_id`) REFERENCES `listening_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `listening_submitted_answers`
--
ALTER TABLE `listening_submitted_answers`
  ADD CONSTRAINT `listening_submitted_answers_answer_option_id_foreign` FOREIGN KEY (`answer_option_id`) REFERENCES `listening_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listening_submitted_answers_listening_question_id_foreign` FOREIGN KEY (`listening_question_id`) REFERENCES `listening_questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listening_submitted_answers_set_id_foreign` FOREIGN KEY (`set_id`) REFERENCES `question_sets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listening_submitted_answers_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listening_submitted_answers_student_results_id_foreign` FOREIGN KEY (`student_results_id`) REFERENCES `student_results` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_groups`
--
ALTER TABLE `question_groups`
  ADD CONSTRAINT `question_groups_question_sets_id_foreign` FOREIGN KEY (`question_sets_id`) REFERENCES `question_sets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_sets`
--
ALTER TABLE `question_sets`
  ADD CONSTRAINT `question_sets_languages_id_foreign` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reading_answers`
--
ALTER TABLE `reading_answers`
  ADD CONSTRAINT `reading_answers_reading_options_id_foreign` FOREIGN KEY (`reading_options_id`) REFERENCES `reading_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reading_answers_reading_questions_id_foreign` FOREIGN KEY (`reading_questions_id`) REFERENCES `reading_questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reading_options`
--
ALTER TABLE `reading_options`
  ADD CONSTRAINT `reading_options_reading_questions_id_foreign` FOREIGN KEY (`reading_questions_id`) REFERENCES `reading_questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reading_questions`
--
ALTER TABLE `reading_questions`
  ADD CONSTRAINT `reading_questions_question_group_id_foreign` FOREIGN KEY (`question_group_id`) REFERENCES `question_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reading_submitted_answers`
--
ALTER TABLE `reading_submitted_answers`
  ADD CONSTRAINT `reading_submitted_answers_answer_option_id_foreign` FOREIGN KEY (`answer_option_id`) REFERENCES `reading_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reading_submitted_answers_reading_question_id_foreign` FOREIGN KEY (`reading_question_id`) REFERENCES `reading_questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reading_submitted_answers_set_id_foreign` FOREIGN KEY (`set_id`) REFERENCES `question_sets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reading_submitted_answers_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reading_submitted_answers_student_results_id_foreign` FOREIGN KEY (`student_results_id`) REFERENCES `student_results` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_results`
--
ALTER TABLE `student_results`
  ADD CONSTRAINT `student_results_question_sets_id_foreign` FOREIGN KEY (`question_sets_id`) REFERENCES `question_sets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_results_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
dtopik_dbtopik_dbtopik_dbtopik_dbemodemo