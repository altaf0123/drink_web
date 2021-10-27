-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2021 at 06:35 AM
-- Server version: 10.3.31-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webprojectmockup_drinkWeb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `qty`, `created_at`, `updated_at`) VALUES
(14, 29, 15, 1, '2021-05-11 21:41:43', '2021-05-11 21:41:43'),
(20, 25, 3, 1, '2021-05-12 18:10:02', '2021-05-12 18:10:02'),
(21, 25, 1, 1, '2021-05-18 21:29:27', '2021-05-18 21:29:27'),
(22, 25, 4, 1, '2021-05-12 18:10:02', '2021-05-12 18:10:02'),
(23, 25, 2, 1, '2021-05-12 18:10:02', '2021-05-12 18:10:02'),
(24, 25, 12, 1, '2021-05-18 21:29:27', '2021-05-18 21:29:27'),
(25, 25, 6, 1, '2021-05-18 21:29:27', '2021-05-18 21:29:27'),
(26, 25, 17, 1, '2021-05-18 21:29:27', '2021-05-18 21:29:27'),
(27, 25, 11, 1, '2021-05-18 21:29:27', '2021-05-18 21:29:27'),
(28, 25, 5, 1, '2021-05-18 21:29:27', '2021-05-18 21:29:27'),
(30, 29, 8, 1, '2021-05-22 00:17:08', '2021-05-22 00:17:08'),
(31, 29, 11, 1, '2021-05-22 00:17:08', '2021-05-22 00:17:08'),
(53, 3, 3, 3, '2021-05-27 11:51:54', '2021-05-27 11:51:54'),
(58, 6, 3, 3, '2021-06-03 11:28:13', '2021-06-03 11:28:13'),
(59, 36, 3, 2, '2021-06-04 01:19:53', '2021-06-04 01:19:53'),
(61, 36, 5, 1, '2021-06-07 07:19:49', '2021-06-07 07:19:49'),
(99, 87, 3, 3, '2021-08-18 12:22:28', '2021-08-18 12:22:28'),
(118, 121, 65, 6, '2021-10-14 06:25:48', '2021-10-14 06:25:48'),
(119, 121, 56, 3, '2021-10-15 22:36:51', '2021-10-15 22:36:51'),
(121, 43, 43, 10, '2021-10-21 00:25:10', '2021-10-21 00:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Appetizers', 'bites', '2021-05-11 01:48:21', '2021-10-20 13:54:25'),
(2, 'Salads', 'bites', '2021-05-11 01:48:21', '2021-10-20 13:54:34'),
(3, 'Raw Bar', 'drinks', '2021-05-11 01:48:21', '2021-10-20 13:55:08'),
(4, 'Platters', 'bites', '2021-05-11 01:48:21', '2021-10-20 13:54:38'),
(5, 'Main Courses', 'bites', '2021-05-11 01:48:21', '2021-10-20 13:54:41'),
(6, 'Sides', 'bites', '2021-05-11 01:48:21', '2021-10-20 13:54:44'),
(7, 'Pizza', 'bites', '2021-05-11 01:48:21', '2021-10-20 13:54:47'),
(8, 'Sushi Specials', 'drinks', '2021-05-11 01:48:21', '2021-10-20 13:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(11) NOT NULL,
  `terms` text DEFAULT NULL,
  `privacy` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `terms`, `privacy`, `created_at`, `updated_at`) VALUES
(1, 'Terms', '<span id=\"docs-internal-guid-6611ff83-7fff-c43a-875a-1b4945819f97\" style=\"caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); text-size-adjust: auto;\"><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Privacy Policy</span></p><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Last Updated on June 24, 2021</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-style: italic; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">NOTICE: Please read the Privacy Policy set forth below carefully, as it is designed to provide important information on how and why we collect, use, store and share your personal information.&nbsp; It also outlines the rights you can exercise regarding your personal information and how you can contact us if you have any questions or complaints.&nbsp;&nbsp;</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-style: italic; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">The Privacy Policy set forth below is legally binding.&nbsp; By visiting, viewing or using this website and/or by using any program, product, course or service from us, you agree to be bound by this Privacy Policy.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Your privacy is important to Drink, </span><a href=\"https://gedrinapp.com/\"><span style=\"font-size: 12pt; font-family: Arial; color: rgb(17, 85, 204); background-color: transparent; font-variant-east-asian: normal; text-decoration-line: underline; vertical-align: baseline; white-space: pre-wrap;\">https://gedrinkapp.com</span></a><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\"> (“website”), which is operated by Atom Technologies LLC (“Company”).&nbsp;&nbsp;</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">We use the term “personal information” to refer to data we collect that may, directly or indirectly, identify, describe, relate to or be associated with you.&nbsp; This privacy policy (“Privacy Policy”) applies to personal information we collect when you interact with us through different means, including by visiting and using our website. &nbsp; The term “you” refers to any visitor, viewer or user of the website and/or any user of any Product.&nbsp; Please note that we cannot control the privacy practices of websites and services that we do not own.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Please read the entire Privacy Policy before you visit or use the website or perform any Actions (as defined below).&nbsp; By visiting the website or performing any Actions (as defined below), you consent to the terms of this Privacy Policy.&nbsp; This Privacy Policy was created with the help of </span><a href=\"https://plugandlaw.com/privacy-policy-generator\"><span style=\"font-size: 12pt; font-family: Arial; color: rgb(17, 85, 204); background-color: transparent; font-variant-east-asian: normal; text-decoration-line: underline; vertical-align: baseline; white-space: pre-wrap;\">Plug and Law</span></a><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\"> and </span><a href=\"https://privacypolicysolutions.com/\"><span style=\"font-size: 12pt; font-family: Arial; color: rgb(17, 85, 204); background-color: transparent; font-variant-east-asian: normal; text-decoration-line: underline; vertical-align: baseline; white-space: pre-wrap;\">Privacy Policy Solutions</span></a><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">.</span></p><br><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: center; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">INFORMATION WE COLLECT AND HOW WE COLLECT IT</span></p><br><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">The following describes the categories of personal information we collect and how we collect such information.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Information You Provide. </span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">We collect information you provide to us directly.&nbsp; This includes information you provide when you (i) receive any free or purchase any paid programs, products, courses or services from us (each, a “Product”), (ii) sign up to receive any emails, (iii) comment on any posts or otherwise communicate with us on any social media platform, (iv) register for presentations or classes, (v) fill out any forms, (vi) access public or private membership groups, including those hosted via a third-party platform (i.e., Facebook), (vii) sign up to become our affiliate partner, (viii) respond to any survey, (ix) participate in any contest or sweepstakes, or (x) contact us through any other means, including via an online form, phone call, or email (collectively, the “Actions”).&nbsp;&nbsp;</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Examples of data we may receive include your first name, last name, telephone number, email address, shipping address, billing address, physical address (such as your address, state, province, ZIP/postal code and city), date of birth, gender, account name, billing information (such as your credit card number), financial information, Social Security Number, Tax Identification Number, Employer Identification Number, PayPal address, social media information, and other information you provide to us through survey responses, feedback, reviews and other means of communication.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Information Collected Automatically.&nbsp; </span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">We collect some data automatically when you visit or use our website or open or respond to our emails.&nbsp; For example, we may automatically collect information when you open or respond to our emails, make a choice with respect to communications we send to you, visit any page that displays our content, provide information to our service providers or purchase or return a Product.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Information from Third Party Sites.</span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp; We collect some data when you connect with us, comment on or like our posts or otherwise interact with us on any social media platform, or when you access public or private membership groups hosted on a third party platform (i.e., Facebook).&nbsp; Examples of data we may receive include your profile information, profile picture, social media information, social media handles or nicknames, name, purchase history, email address, device identifiers and demographic information.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Information from Internet or Other Electronic Network Activity.&nbsp; </span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">We automatically collect some data about your computer or mobile device when you access our website.&nbsp; Examples of data we may receive include your Internet Protocol (“IP”) address, browser type, browser version, cookies from your browser, unique device identifiers, web browser software (i.e., Google Chrome), information about the referring website, the date, time and length of your visit, including the specific pages you visit, information on how you interact with the website, Products and tools and other diagnostic data.&nbsp; Examples of additional data we may receive when you access our website through a mobile device include the type of mobile device you are using, the unique mobile device ID, your mobile operating system, web browser software on mobile, unique device identifiers and other diagnostic data.</span></p><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: center; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">PURPOSES FOR COLLECTING INFORMATION</span></p><br><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">We use your information for business and commercial purposes.&nbsp; For example, we may use your information to:</span></p><ul style=\"margin-bottom: 0px; padding-inline-start: 48px;\"><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 12pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Register you for a course, presentation or class.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Grant you access to a public or private membership group or other account, and maintain and service your profiles for such accounts.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Validate and authenticate your profile when logging into a public or private membership group or other account or when purchasing a Product.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Analyze interactions with you to improve quality.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Identify your product preferences and shopping preferences.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Secure our website and data.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Create Products that you are interested in.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Ship or otherwise deliver, process payment for, communicate about, and track orders of any Products.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Suggest Products you may like based on past purchases and otherwise personalize your experience with the website.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Provide promotional and marketing communications and information if you elect to receive it, including email marketing.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Improve the design, functionality and ease-of-use of our website and Products.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Respond to any inquiries, reviews or other feedback you submit to us.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Provide customer service.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Conduct research to improve our business processes.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Administer affiliate programs.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Administer contests, sweepstakes, surveys or promotions.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Administer any business needs related to your purchase of any Products.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Detect security incidents and protect against, stop, resolve and prevent any fraud and fraudulent transactions and any malicious, deceptive or illegal activity.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Comply with all applicable law.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 12pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Respond to legal and regulatory inquiries and assist law enforcement.</span></p></li></ul><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: center; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">THIRD PARTIES WE SHARE INFORMATION WITH</span></p><br><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">The following is a list of third parties that we may share your information with or for.&nbsp;&nbsp;</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Affiliate Partners.</span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp; We may share your information with affiliate partners to generate traffic or leads or for other business purposes.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Analytics Providers.&nbsp; </span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">We may share your information with analytics providers.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Business Transfers.</span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp; If we and/or our website are acquired by a third party as a result of a transfer, sale, merger, acquisition, reorganization, liquidation, consolidation, merger or sale of some or all of our Company and/or our website, your personal information may be a transferred asset.&nbsp; We may also share personal information to prospective purchasers to diligence the proposed transaction.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Cloud Service Providers.</span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp; We may share your information with cloud service providers.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Customer Analysis Providers.</span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp; We may share your information with customer analysis providers, such as those used to analyze visitors clicks and navigation around the website.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Customer Service Providers.</span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp; We may share your information with customer service providers.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Delivery Partners.</span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp; We may share your information with delivery partners, such as those we use to ship or otherwise deliver any Products.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Email Marketing and Advertising Providers.</span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp; We may share your information with marketing and advertising providers, including email marketing and campaign providers, marketing software providers, direct mail providers, marketing analytics providers and sales funnel providers.</span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp; </span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">We may share your information with email marketing service providers, in order to send you emails, newsletters, promotional materials, marketing materials or other information.&nbsp;</span></p><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;</span></p><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Fraud Prevention Partners.</span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp; We may share your information with fraud prevention partners.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Fulfillment Partners.</span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp; We may share your information with fulfillment partners, such as those we use to fulfill any Products.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Government Agencies.&nbsp; </span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">We may share your information with government agencies, courts, regulators and law enforcement in the event we are required to comply with applicable laws and regulations or a legally binding process, or in response to subpoenas, warrants, government inquiries or investigations, and court orders.&nbsp; We may also share your information (i) to establish, exercise, protect or enforce our legal rights and the legal rights of our agents, employees and affiliates, (ii) to defend against a legal claim, (iii) to protect you, us or third parties against injury, interference, fraud or harm or (iv) to take action related to violations of our policies, including this Privacy Policy and our Terms &amp; Conditions, or potentially illegal activities.&nbsp;&nbsp;</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Other Service Providers.</span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp; We may share your information with service providers.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Payment Processors.</span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp; We may share your information with payment processors, such as those we use to collect and process payment for any Products you purchase.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Public Forum.&nbsp; </span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Our website may allow you to leave a post, comment or review on the website.&nbsp; If you choose to submit that information on a public forum, that information will be available to the public and we may elect to share your post, comment or review outside of the website.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Social Media Platforms.</span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp; We may share your information with social media platforms (i.e., Facebook).&nbsp; Their use of your information is not governed by this Privacy Policy.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Technology Service Providers.</span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp; We may share your information with technology service providers.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Third Parties.</span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp; We may share your information with third parties whom we have contractual relationships with, such as auditors, consultants, lawyers, and other professionals who rely on the data to provide us with professional services.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Third Party Partners.</span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp; We may share your information with third parties we have partnered with to jointly create or offer a product, service or joint promotion.</span></p><br><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: center; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">WE DO NOT SELL YOUR PERSONAL INFORMATION</span></p><br><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">We do not sell, rent or trade your personal information to any third parties, as we value your privacy.&nbsp; We also do not “sell” your personal information as defined by the California Consumer Privacy Act.</span></p><br><br><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: center; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">COOKIES AND OTHER TRACKING TECHNOLOGIES</span></p><br><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">We may collect and access, and may permit our business partners and third party service providers, such as advertising companies, to collect and access your Internet Protocol (IP) address, browsing metadata and other numerical identifiers, such as your browser type, version and operating system (collectively, the “Browsing Information”).&nbsp; We may also use, place, collect and store, or allow our third party service providers to use, place, collect and store, cookies, web beacons, remarketing pixel tags, or other similar tracking technologies.&nbsp;&nbsp;</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">We, our business partners and third party service providers may use this information and these technologies to, among other things, improve and personalize your user experience, understand how you use the website, provide tailored ads, analyze trends, data, and website performance, administer the website, identify and track you when you use different devices, determine if you are logged onto the website, provide security and provide a range of features, customization and functionality.&nbsp;&nbsp;</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">By using the website and not opting out of cookies, you consent to the use of Browsing Information, cookies and other tracking technologies as described in this Privacy Policy.&nbsp; Note that we have no control over these third party service providers and their use of such tracking technologies.&nbsp; We cannot and do not control the privacy policies and practices of any third party service providers.&nbsp; We encourage you to visit their websites directly to learn about their privacy policies.</span></p><br><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: center; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">YOUR CHOICES</span></p><br><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">It is important to us that you understand your choices regarding your personal information.&nbsp;&nbsp;</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Opting Out of/Blocking Cookies.</span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp; Most browsers accept cookies by default.&nbsp; However, most browsers will allow you to prevent accepting new cookies, disable cookies, and/or receive a notification when you receive new cookies.&nbsp; If your browser has such functionalities, information on how you can change your cookie settings can typically be found in the help section of the browser toolbar.&nbsp; Please note that if you do disable cookies, this may have an impact on or interfere with your user experience, including your ability to use or make purchases from the website, or receive personalized content.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Managing “Do Not Track”.&nbsp; </span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">As required by the California Online Privacy Protection Act (CalOPPA), we would like you to know that our systems are currently unable to recognize browser “Do No Track” signals.&nbsp;&nbsp;</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Use of Personal Information.&nbsp; </span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">You can request that we delete your personal information at any time by contacting us using the contact details provided below, subject to certain exceptions.&nbsp; You can also (i) request to see your personal information that we have available on you, (ii) withdraw consent for our use of your personal information, (iii) review and request we rectify, change or modify your personal information, (iv) restrict or limit the processing of your personal information, (v) cancel the processing of your personal information and (vi) request your personal information and transfer it to another controller without any impediments on our part by contacting us using the contact details provided below.&nbsp;&nbsp;</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Unsubscribing from Email Marketing.</span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp; When you sign up to receive emails from us, you agree to receive email communications from us, which may include newsletters and promotional emails.&nbsp; If you receive any email marketing from us, you can opt out at any time by clicking the “unsubscribe” link contained in each email.&nbsp; Please note that unsubscribing from email marketing does not necessarily unsubscribe you from other emails we may send, such as emails about any Products you purchase.&nbsp;</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Other Opt-Out Options.&nbsp; </span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">If we send you physical mailings or short message service (SMS) messages or contact you via telephone, you can opt-out by contacting us using the contact details provided below.</span></p><br><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: center; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">DATA RETENTION</span></p><br><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">We retain personal information as long as it is needed to conduct and operate our business or until you ask us to delete your personal information by contacting us using the contact details provided below.&nbsp; Please note that we cannot control the data retention policies of third parties.</span></p><br><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: center; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">THIRD PARTY LINKS</span></p><br><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">For your convenience, we provide links to third party websites on our website, such as links to third party social media platforms.&nbsp; If you click on a link to a third party website, you will be directed to a third party website.&nbsp; We cannot and do not control the privacy policies, content and practices of the website owners and operators of any of the third party websites that we link to.&nbsp; We encourage you to visit their websites directly to learn about their privacy policies.</span></p><br><br><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: center; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">HOW WE PROTECT YOUR PERSONAL INFORMATION</span></p><br><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">We care about the security of your personal information, so we maintain reasonable and appropriate physical, technical and procedural safeguards to help keep it safe.&nbsp; While we take reasonable steps to protect your personal information, no method of transmission over the internet or other network can be 100% secure, therefore we cannot and do not guarantee that personal information you transmit will remain secure from misuse or interception in all circumstances.&nbsp; By consenting to this Privacy Policy, you acknowledge that we cannot guarantee that your personal information will be protected from misuse or interception by third parties.</span></p><br><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: center; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">INTERNATIONAL DATA, TRANSFERS AND PROCESSING</span></p><br><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Our website is intended for individuals located within the United States.&nbsp; Please be aware that our website servers and our service providers may be located outside of your state, province or country.&nbsp; As a result, some of your personal information may be collected, used, transferred, maintained, disclosed and stored outside of your state, province or country.&nbsp; By using this website, you acknowledge and agree that the collection, use, transfer, maintenance, disclosure and storage of your personal information, Browsing Information and communications related to or arising out of your use of this website is governed by the applicable laws in the United States.&nbsp; While we have the appropriate safeguards in place, the applicable privacy laws in the United States may be less stringent than those of your state, province or country.&nbsp;</span></p><br><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: center; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">NOTICE ABOUT THE GENERAL DATA PROTECTION REGULATION (GDPR NOTICE)</span></p><br><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">The information in this section, under the subheading “Notice About the General Data Protection Regulation”, applies to individuals covered by the General Data Protection Regulation (“GDPR”).&nbsp; References to “you” and “your” in this section refer only to those covered by GDPR.&nbsp; GDPR, which took effect on May 25, 2018, provides privacy rights for those inside the European Economic Area.&nbsp;&nbsp;</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">For the purposes of this section, “personal information” refers to any information relating to an individual which can be directly or indirectly used to identify such individual.&nbsp; Examples include first name and last name, email address, identification number, information about location, ethnicity, gender, biometric data, web cookies, and religious or political beliefs.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Legal basis for processing information.&nbsp; </span><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">We may process personal information under the following conditions: (i) we have received your consent to process your personal information for one or more specific purposes, (ii) processing of your personal information is necessary to perform a contract to which you are a party to, or in order to take steps at your request prior to entering into a contract, (iii) processing of your personal information is necessary to comply with a legal obligation we are subject to, (iv) processing of your personal information is necessary in order to protect the vital interests of you or another natural person, (v) processing of your personal information is necessary to perform a task carried out in the public interest or to exercise an official authority vested in us; (vi) processing of your personal information is necessary for the purposes of the legitimate interests pursued by us or a third party, except in certain circumstances where the need for the information is overridden by the need to protect the subject of the personal information (such as when the subject of the personal information is a child).&nbsp;</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">We are happy to let you know which legal basis applies to the processing of your personal information.</span></p><br><p dir=\"ltr\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">You have certain rights you can exercise under the GDPR, including the following.&nbsp; Please note that this summary is merely provided for your convenience, but we do not warrant the accuracy or exhaustiveness of this summary nor should you rely on this as an accurate or exhaustive list of your rights.</span></p><br><ul style=\"margin-bottom: 0px; padding-inline-start: 48px;\"><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Right to Access.</span><span style=\"font-size: 12pt; background-color: transparent; font-weight: 400; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp; You have the right to learn whether or not your personal information is being processed. If it is being processed, you have the right to access the personal information, and to learn certain information about your personal information, including: (i) why it is being processed, (ii) the categories of personal information we collected, (iii) the recipients or categories of recipients to whom we have or will disclose the personal information to, (iv) if possible, the amount of time we will store the personal information, or if not possible, the criteria we use to determine such period and (v) available information about the sources for personal information we collected.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Right to Correction.</span><span style=\"font-size: 12pt; background-color: transparent; font-weight: 400; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp; You have the right to correct any inaccurate personal information about yourself.&nbsp; You also have the right to complete any incomplete personal information collected, including through providing an additional statement.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Right to Be Forgotten. </span><span style=\"font-size: 12pt; background-color: transparent; font-weight: 400; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">You have the right to ask us to erase your personal information, which we will do without undue delay under certain circumstances.&nbsp; Examples may include: (i) where the personal information is no longer necessary for the purposes for which it was collected, (ii) where you withdraw consent on the basis of which we processed your personal information, and there is no legal ground for processing such personal information, (iii) where you invoke your right to object (described below) and there are no overriding grounds for processing such personal information, (iv) where your personal information has been unlawfully processed and (v) where the personal information has to be erased to comply with a legal obligation.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Right to Restrict Processing. </span><span style=\"font-size: 12pt; background-color: transparent; font-weight: 400; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">You have the right to restrict the processing of your personal information under certain circumstances.&nbsp; Examples may include: (i) where you indicate the inaccuracy of your personal information, (ii) where the processing is unlawful but you would like the processing of your personal information to be restricted as opposed to erased, (iii) where we no longer need the personal information for processing, but you would like it restricted for a legal basis, and (iv) where you invoke your right to object (described below).</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Notification of Recipients of Personal Information.&nbsp; </span><span style=\"font-size: 12pt; background-color: transparent; font-weight: 400; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">If you exercise your Right to Rectification, Right to Be Forgotten or Right to Restrict Processing (each as described above), we will convey that to each recipient we have shared your personal information with.&nbsp; You have the right to request we provide you with a list of all recipients we have notified.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Right to Data Portability. </span><span style=\"font-size: 12pt; background-color: transparent; font-weight: 400; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">You have the right to request your personal information in a structured, commonly used and machine-readable format.&nbsp;&nbsp;</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Right to Object. </span><span style=\"font-size: 12pt; background-color: transparent; font-weight: 400; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">You have the right to object to the processing of your personal information under certain circumstances.&nbsp; Examples may include: (i) where the personal information is being processed on grounds relating to your personal situation, where the legal grounds for processing such personal information falls under categories (v) and (vi) as described in the sub-section titled “Legal basis for processing information” and (ii) where the personal information is processed for direct marketing purposes.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Right to Lodge a Complaint.</span><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp; You have the right to lodge a complaint with a supervisory authority. For more information, please contact your local data protection authority.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: Arial; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.3800000000000001; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-weight: 700; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Right to Be Informed About International Transfers</span><span style=\"font-size: 12pt; background-color: transparent; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">.&', '2021-05-28 05:10:31', '2021-10-16 15:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `type`, `body`, `created_at`, `updated_at`) VALUES
(1, 'tc', '<p><em><span style=\"font-size:18px\">PLEASE&nbsp; READ&nbsp; THE&nbsp; FOLLOWING&nbsp; TERMS&nbsp; OF&nbsp; SERVICE AGREEMENT&nbsp; CAREFULLY.&nbsp; BY ACCESSING OR USING OUR SITES AND OUR SERVICES, YOU HEREBY AGREE TO BE BOUND BY THE TERMS AND ALL TERMS INCORPORATED HEREIN BY REFERENCE. IT IS THE RESPONSIBILITY OF YOU, THE USER, CUSTOMER, OR PROSPECTIVE CUSTOMER TO READ THE TERMS AND CONDITIONS BEFORE PROCEEDING TO USE THIS SITE. IF YOU DO NOT EXPRESSLY AGREE TO ALL OF THE TERMS AND CONDITIONS, THEN PLEASE DO NOT ACCESS OR USE OUR SITES OR OUR SERVICES. THIS TERMS OF SERVICE AGREEMENT IS EFFECTIVE AS OF .</span></em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:18px\">ACCEPTANCE OF TERMS</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:18px\">The following Terms of Service Agreement (the &quot;TOS&quot;) is a legally binding agreement that shall govern the relationship with our users and others which may interact or interface with League Management Protocol, LLC , also known as LeManPro, located at 5 Nichols Lane, Nashua ,New Hampshire 03062 and our subsidiaries and affiliates, in association with the use of the LeManPro website,&nbsp; which&nbsp; includes&nbsp;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">LeManPro App,&nbsp; (the&nbsp; &quot;Site&quot;)&nbsp; and&nbsp; its&nbsp; Services,&nbsp; which&nbsp; shall&nbsp; be&nbsp; defined below.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"font-size:18px\">DESCRIPTION OF WEBSITE SERVICES OFFERED</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">The Site is a social networking website which has the following description:</span></p>\r\n\r\n<p><span style=\"font-size:18px\">LeManPro is an App that allows user athletes to create profiles for themselves and to discover teams looking for athletes to try out and join teams in a designated area.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">Any and all visitors to our site, despite whether they are registered or not, shall be deemed as &quot;users&quot; of the herein contained Services provided for the purpose of this TOS. Once an individual register&#39;s for our Services, through the process of creating an account, the user shall then be considered a &quot;member.&quot;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">The&nbsp; user and/or&nbsp; member acknowledges&nbsp; and&nbsp; agrees&nbsp; that&nbsp; the&nbsp; Services&nbsp; provided&nbsp; and&nbsp; made available through our website and applications, which may include some mobile applications and that those applications&nbsp; may&nbsp; be&nbsp; made&nbsp; available&nbsp; on&nbsp; various&nbsp; social&nbsp; media&nbsp; networking&nbsp; sites&nbsp; and numerous&nbsp; other&nbsp; platforms&nbsp; and&nbsp; downloadable&nbsp; programs,&nbsp; are&nbsp; the&nbsp; sole&nbsp; property&nbsp; of League</span></p>\r\n\r\n<p><span style=\"font-size:18px\">Management&nbsp; Protocol,&nbsp; LLC At&nbsp; its&nbsp; discretion, League&nbsp; Management&nbsp; Protocol,&nbsp; LLC&nbsp; may&nbsp; offer additional website Services and/or products, or update, modify or revise any current content and Services, and this Agreement shall apply to any and all additional Services and/or products and any&nbsp; and&nbsp; all&nbsp; updated,&nbsp; modified&nbsp; or&nbsp; revised&nbsp; Services&nbsp; unless&nbsp; otherwise&nbsp; stipulated.League</span></p>\r\n\r\n<p><span style=\"font-size:18px\">Management Protocol, LLC&nbsp;&nbsp;does hereby reserve the right to cancel and cease offering any of the aforementioned Services and/or products. You, as the end user&nbsp;and/or&nbsp; member,&nbsp;acknowledge,accept and agree that&nbsp;League Management Protocol, LLC&nbsp;shall not be held liable for any such updates, modifications, revisions, suspensions or discontinuance of any of our Services and/or products.&nbsp; Your&nbsp; continued&nbsp; use&nbsp; of&nbsp; the&nbsp; Services&nbsp; provided,&nbsp; after&nbsp; such&nbsp; posting&nbsp; of&nbsp; any&nbsp; updates,</span></p>\r\n\r\n<p><span style=\"font-size:18px\">changes, and/or modifications shall constitute your acceptance of such updates, changes and/or modifications, and as such, frequent review of this Agreement and any and all applicable terms and policies should be made by you to ensure you are aware of all terms and policies currently in effect. Should you not agree to the updated, revised or modified terms, you must stop using the provided Services forthwith.Furthermore, the user&nbsp;and/or member&nbsp; understands, acknowledges and agrees that the Services</span></p>\r\n\r\n<p><span style=\"font-size:18px\">offered&nbsp; shall&nbsp; be&nbsp; provided&nbsp; &quot;AS&nbsp; IS&quot;&nbsp; and&nbsp; as&nbsp; such&nbsp;League&nbsp; Management&nbsp; Protocol,LLC&nbsp;shall&nbsp; not assume any responsibility or obligation for the timeliness, missed delivery, deletion and/or any failure to store user content, communication or personalization settings.</span></p>\r\n\r\n<h2><span style=\"font-size:18px\">REGISTRATION</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">To register and become a &quot;member&quot; of the Site, you must be at least 18 years of age to enter into and&nbsp; form&nbsp; a&nbsp; legally&nbsp; binding&nbsp; contract.&nbsp; In&nbsp; addition,&nbsp; you&nbsp; must&nbsp; be&nbsp; in&nbsp; good&nbsp; standing&nbsp; and&nbsp; not&nbsp; an individual that has been previously barred from receiving&nbsp; LeManPro&#39;s Services under the laws and statutes of the United States or other applicable jurisdiction.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">When you register,&nbsp;LeManPro&nbsp;may collect information such as your name, e-mail address, birth date,&nbsp; gender,&nbsp; mailing&nbsp; address,&nbsp; occupation,&nbsp; industry&nbsp; and&nbsp; personal&nbsp; interests.&nbsp;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">You&nbsp; can&nbsp; edit&nbsp; your account information at any time. Once you register with&nbsp;LeManPro&nbsp;and sign in to our Services, you are no longer anonymous to us.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">Furthermore, the registering party hereby acknowledges, understands and agrees to:</span></p>\r\n\r\n<p><span style=\"font-size:18px\">a) furnish factual, correct, current and complete information with regards to yourself as may be requested by the data registration process, and</span></p>\r\n\r\n<p><span style=\"font-size:18px\">b) maintain and promptly update your registration and profile information in an effort to maintain accuracy and completeness at all times.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">If anyone knowingly provides any information of a false, untrue, inaccurate or incomplete nature,League&nbsp; Management&nbsp; Protocol,&nbsp; LLC&nbsp;will&nbsp; have&nbsp; sufficient&nbsp; grounds&nbsp; and&nbsp; rights&nbsp; to&nbsp; suspend&nbsp; or terminate the member in violation of this aspect of the Agreement, and as such refuse any and all current or future use of&nbsp;League Management Protocol, LLC&nbsp;Services, or any portion thereof.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:18px\">It&nbsp; is&nbsp;League&nbsp; Management&nbsp; Protocol,&nbsp; LLC&#39;s&nbsp; priority&nbsp; to&nbsp; ensure&nbsp; the&nbsp; safety&nbsp; and&nbsp; privacy&nbsp; of&nbsp; all&nbsp; its visitors, users and members, especially that of children. Therefore, it is for this reason that theparents of any child under the age of 13 that permit their child or children access to the&nbsp;LeManPro website platform Services must create a &quot;family&quot; account, which will certify that the individual creating the &quot;family&quot; account is of 18 years of age and as such, the parent or legal guardian of any child or children registered under the &quot;family&quot; account. As the creator of the &quot;family&quot; account,s/he is thereby granting permission for his/her child or children to access the various Services provided, including, but not limited to, message boards, email, and/or instant messaging. It is the parent&#39;s and/or legal guardian&#39;s responsibility to determine whether any of the Services and/or content provided are age-appropriate for his/her child.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:18px\">PRIVACY POLICY</span></p>\r\n\r\n<p><span style=\"font-size:18px\">Every member&#39;s registration data and various other personal information are strictly protected by the&nbsp;League Management Protocol, LLC</span></p>\r\n\r\n<p><span style=\"font-size:18px\">&nbsp;Online Privacy Policy (see the full Privacy Policy at). As a member, you herein consent to the collection and use of the information provided, including the transfer of information within the United States and/or other countries for storage, processing or use by&nbsp;League Management Protocol, LLC&nbsp;&nbsp;and/or our subsidiaries and affiliates.</span></p>\r\n\r\n<h2><span style=\"font-size:18px\">MEMBER ACCOUNT, USERNAME, PASSWORD AND SECURITY</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">When you set up an account, you are the sole authorized user of your account. You shall be responsible for maintaining the secrecy and confidentiality of your password and for all activities that transpire on or within your account. It is your responsibility for any act or omission of any user(s) that access your account information that, if undertaken by you, would be&nbsp; deemed&nbsp; a violation of the TOS. It shall be your esponsibility to notify&nbsp;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">League Management Protocol, LLC immediately if you notice any unauthorized access or use of your account or password or any other breach of security. League Management Protocol, LLC&nbsp;shall not be held liable for any loss and/or damage arising from any failure to comply with this term and/or condition of the TOS.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">CONDUCT</span></p>\r\n\r\n<p><span style=\"font-size:18px\">As&nbsp; a&nbsp; user&nbsp; or&nbsp; member&nbsp; of&nbsp; the&nbsp; Site,&nbsp; you&nbsp; herein&nbsp; acknowledge,&nbsp; understand&nbsp; and&nbsp; agree&nbsp; that&nbsp; all information,&nbsp; text,&nbsp; software,&nbsp; data,&nbsp; photographs,&nbsp; music,&nbsp; video,&nbsp; messages,&nbsp; tags&nbsp; or&nbsp; any&nbsp; other content,&nbsp; whether&nbsp; it&nbsp; is&nbsp; publicly&nbsp; or&nbsp; privately&nbsp; posted&nbsp; and/or&nbsp; transmitted,&nbsp; is&nbsp; the&nbsp; expressed&nbsp; sole responsibility of the individual from whom the content originated. In short, this means that you are solely responsible for any and all content posted, uploaded, emailed, transmitted or otherwise made&nbsp; available&nbsp; by&nbsp; way&nbsp; of&nbsp; the&nbsp;LeManPro&nbsp;&nbsp;Services,&nbsp; and&nbsp; as&nbsp; such,&nbsp; we&nbsp; do&nbsp; not&nbsp; guarantee&nbsp; the accuracy,&nbsp; integrity&nbsp; or&nbsp; quality&nbsp; of&nbsp; such&nbsp; content.&nbsp; It&nbsp; is&nbsp; expressly&nbsp; understood&nbsp; that&nbsp; by&nbsp; use&nbsp; of&nbsp; our Services, you may be exposed to content including, but not limited to, any errors or omissions in any content posted, and/or any loss or damage of any kind incurred as a result of the use of any content posted, emailed, transmitted or otherwise made available by&nbsp;LeManPro.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:18px\">Furthermore, you herein agree not to make use of&nbsp;League Management Protocol, LLC&#39;s Services for the purpose of:</span></p>\r\n\r\n<p><span style=\"font-size:18px\">a) uploading, posting, emailing, transmitting, or otherwise making available any content that</span></p>\r\n\r\n<p><span style=\"font-size:18px\">shall be deemed unlawful, harmful, threatening, abusive, harassing, tortious, defamatory,</span></p>\r\n\r\n<p><span style=\"font-size:18px\">vulgar, obscene, libelous, or invasive of another&#39;s privacy or which is hateful, and/or</span></p>\r\n\r\n<p><span style=\"font-size:18px\">racially, ethnically, or otherwise objectionable;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">b) causing harm to minors in any manner whatsoever;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">c) impersonating any individual or entity, including, but not limited to, any&nbsp;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">LeManPro&nbsp;officials, forum leaders, guides or hosts or falsely stating or&nbsp; otherwise misrepresenting anyaffiliation with an individual or entity;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">d) forging captions, headings or titles or otherwise offering any content that you personally have no right to pursuant to any law nor having any contractual or fiduciary relationship with;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">e) uploading, posting, emailing, transmitting or otherwise offering any such content that may infringe upon any patent, copyright, trademark, or any other proprietary or intellectual rights of any other party;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">f) uploading, posting, emailing, transmitting or otherwise offering any content that you do not personally have any right to offer pursuant to any law or in accordance with any contractual or fiduciary relationship;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">g) uploading, posting, emailing, transmitting, or otherwise offering any unsolicited or unauthorized advertising, promotional flyers, &quot;junk mail,&quot; &quot;spam,&quot; or any other form of solicitation, except in any such areas that may have been designated for such purpose;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">h) uploading, posting, emailing, transmitting, or otherwise offering any source that may contain a software virus or other computer code, any files and/or programs which have been designed to interfere, destroy and/or limit the operation of any computer software, hardware, or telecommunication equipment;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">i) disrupting the normal flow of communication, or otherwise acting in any manner that would negatively affect other users&#39; ability to participate in any real time interactions; </span></p>\r\n\r\n<p><span style=\"font-size:18px\">j) interfering with or disrupting any&nbsp;League Management Protocol, LLC&nbsp;Services, servers and/or networks that may be connected or related to our website, including, but not limited to, the use of any device software and/or routine to bypass the robot exclusion headers;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">k) intentionally or unintentionally violating any local, state, federal, national or international law, including, but not limited to, rules, guidelines, and/or regulations decreed by the U.S. Securities and Exchange Commission, in addition to any rules of any nation or other securities exchange, that would include without limitation, the New York Stock Exchange,the American Stock Exchange, or the NASDAQ, and any regulations having the force of law;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">l) providing informational support or resources, concealing and/or disguising the character,location, and or source to any organization delegated by the United States government as a &quot;foreign terrorist organization&quot; in accordance to Section 219 of the Immigration Nationality Act;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">m) &quot;stalking&quot; or with the intent to otherwise harass another individual; and/or</span></p>\r\n\r\n<p><span style=\"font-size:18px\">n) collecting or storing of any personal data relating to any other member or user in connection with the prohibited conduct and/or activities which have been set forth in the aforementioned paragraphs.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">League Management Protocol, LLC&nbsp;herein reserves the right to pre-screen, refuse and/or delete any content currently available through our Services. In addition, we reserve the right to remove and/or&nbsp; delete&nbsp; any&nbsp; such&nbsp; content&nbsp; that&nbsp; would&nbsp; violate&nbsp; the&nbsp; TOS&nbsp;or&nbsp; which&nbsp; would&nbsp; otherwise&nbsp; be considered offensive to other visitors, users and/or members.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">League Management Protocol, LLC&nbsp;herein reserves the right to access, preserve and/or disclose member account information and/or content if it is requested to do so by law or in good faith belief that any such action is deemed reasonably necessary for:</span></p>\r\n\r\n<p><span style=\"font-size:18px\">a) compliance with any legal process;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">b) enforcement of the TOS;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">c) responding to any claim that therein contained content is in violation of the rights of any third party;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">d) responding to requests for customer service; or</span></p>\r\n\r\n<p><span style=\"font-size:18px\">e) protecting the rights, property or the personal safety of&nbsp;League Management Protocol,LLC, its visitors, users and members, including the general public.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">League&nbsp; Management&nbsp; Protocol,&nbsp; LLC herein&nbsp; reserves&nbsp; the&nbsp; right&nbsp; to&nbsp; include&nbsp; the&nbsp; use&nbsp; of&nbsp; security components that may permit digital information or material to be protected, and that such use of information and/or material is subject to usage guidelines and regulations established by&nbsp;League Management Protocol, LLC&nbsp;or any other content providers supplying content services to&nbsp;League Management Protocol, LLC. You are hereby prohibited from making any attempt to override or circumvent&nbsp; any&nbsp; of&nbsp; the&nbsp; embedded&nbsp; usage&nbsp; rules&nbsp; in&nbsp; our&nbsp; Services.&nbsp; Furthermore,&nbsp; unauthorized reproduction, publication, distribution, or exhibition of any information or materials supplied by our Services, despite whether done so in whole or in part, is expressly prohibited.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"font-size:18px\">INTERSTATE COMMUNICATION</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">Upon&nbsp; registration,&nbsp; you&nbsp; hereby&nbsp; acknowledge&nbsp; that&nbsp; by&nbsp; using&nbsp;LeManPro App to&nbsp; send&nbsp; electronic communications, which would include, but are not limited to, email, searches, instant messages, uploading of files, photos and/or videos, you will be causing communications to be sent through our computer network.&nbsp;Therefore, through your use, and thus your agreement with this TOS, you are acknowledging that the use of this Service shall result in interstate transmissions.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"font-size:18px\">CAUTIONS FOR GLOBAL USE AND EXPORT AND IMPORT COMPLIANCE</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">Due to the global nature of the internet, through the use of our network you hereby agree to comply with all local rules relating to online conduct and that which is considered acceptable Content. Uploading, posting and/or transferring of software, technology and other technical data may be subject to the export and import laws of the United States and possibly other countries. Through the use of our network, you thus agree to comply with all applicable export and import laws, statutes and regulations, including, but not limited to, the Export Administration Regulations (http://www.access.gpo.gov/bis/ear/ear_data.html), as well as the sanctions control program of the&nbsp;United&nbsp;States&nbsp;(http://www.treasury.gov/resource-center/sanctions/Programs/Pages/Programs.aspx). Furthermore, you state and pledge that you:</span></p>\r\n\r\n<p><span style=\"font-size:18px\">a) are not on the list of prohibited individuals which may be identified on any government export exclusion report (http://www.bis.doc.gov/complianceandenforcement/liststocheck.htm) nor a member of any other government which may be part of an export-prohibited country identified in applicable export and import laws and regulations;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">b) agree not to transfer any software, technology or any other technical data through the use of our network Services to any export-prohibited country;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">c) agree not to use our website network Services for any military, nuclear, missile, chemical or biological weaponry end uses that would be a violation of the U.S. export laws; and</span></p>\r\n\r\n<p><span style=\"font-size:18px\">d) agree not to post, transfer nor upload any software, technology or any other technical data which would be in violation of the U.S. or other applicable export and/or import laws.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"font-size:18px\">CONTENT PLACED OR MADE AVAILABLE FOR COMPANY SERVICES</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">League Management Protocol, LLC&nbsp;shall not lay claim to ownership of any content submitted by any&nbsp; visitor,&nbsp; member,or&nbsp; user,&nbsp; nor&nbsp; make&nbsp; such&nbsp; content&nbsp; available&nbsp; for&nbsp; inclusion&nbsp; on&nbsp; our&nbsp; website Services.&nbsp; Therefore,&nbsp; you&nbsp; hereby&nbsp; grant&nbsp; and&nbsp; allow&nbsp; for&nbsp;League&nbsp; Management&nbsp; Protocol,&nbsp; LLC&nbsp;the below listed worldwide, royalty-free and non-exclusive licenses, as applicable:</span></p>\r\n\r\n<p><span style=\"font-size:18px\">a) The content submitted or made available for inclusion on the publicly accessible areas of League Management Protocol, LLC&#39;s sites, the license provided to permit to use, distribute, reproduce, modify, adapt, publicly perform and/or publicly display said Content on our network Services is for the sole purpose of providing and promoting the specific area to which this content was placed and/or made available for viewing. This license shall be available so long as you are a member of&nbsp;League Management Protocol, LLC&#39;s sites,and shall terminate at such time when you elect to discontinue your membership.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">b) Photos, audio, video and/or graphics submitted or made available for inclusion on the publicly accessible areas of&nbsp;League Management Protocol, LLC&#39;s sites, the license provided to permit to use, distribute, reproduce, modify, adapt, publicly perform and/or publicly display said Content on our network Services are for the sole purpose of providing and promoting the specific area in which this content was placed and/or made available for viewing. This license shall be available so long as you are a member of&nbsp;League Management Protocol, LLC&#39;s sites and shall terminate at such time when you elect to discontinue your membership.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">c) For any other content submitted or made available for inclusion on the publicly accessible areas of&nbsp;League Management Protocol, LLC&#39;s sites, the continuous, binding and completely sub-licensable license which is meant to permit to use, distribute, reproduce, modify, adapt, publish, translate, publicly perform and/or publicly display said content, whether in whole or in part, and the incorporation of any such Content into other works in any arrangement or medium current used or later developed.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">Those areas which may be deemed &quot;publicly accessible&quot; areas of&nbsp;League Management Protocol,LLC&#39;s sites are those such areas of our network properties which are meant to be available to the general public, and which would include message boards and groups that are openly available to both users&nbsp;and members.&nbsp; However,&nbsp; those&nbsp; areas&nbsp; which&nbsp; are&nbsp; not&nbsp; open&nbsp; to&nbsp; the&nbsp; public,&nbsp; and&nbsp; thus available to members only, would include our mail system and instant messaging.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"font-size:18px\">CONTRIBUTIONS TO COMPANY WEBSITE</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">League Management Protocol, LLC provides an area for our users and members to contribute feedback&nbsp; to&nbsp; our&nbsp; website.&nbsp; When&nbsp; you&nbsp; submit&nbsp; ideas,&nbsp; documents,&nbsp; suggestions&nbsp; and/or&nbsp; proposals (&quot;Contributions&quot;) to our site, you acknowledge and agree that:</span></p>\r\n\r\n<p><span style=\"font-size:18px\">a) your contributions do not contain any type of confidential or proprietary information;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">b) LeManPro shall not be liable or under any obligation to ensure or maintain confidentiality, expressed or implied, related to any Contributions;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">c) LeManPro shall be entitled to make use of and/or disclose any such Contributions in any such manner as they may see fit;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">d) the contributor&#39;s Contributions shall automatically become the sole property of&nbsp;LeManPro; and</span></p>\r\n\r\n<p><span style=\"font-size:18px\">e) LeManPro&nbsp;is under no obligation to either compensate or provide any form of reimbursement in any manner or nature.</span></p>\r\n\r\n<h2><span style=\"font-size:18px\">INDEMNITY</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">All users and/or members herein agree to insure and hold&nbsp;League Management Protocol, LLC, our subsidiaries, affiliates, agents, employees, officers, partners and/or licensors blameless or&nbsp;not liable&nbsp;for any claim or demand, which may include, but is not limited to, reasonable attorney fees made by any third party which may arise from any content a&nbsp;member or user of our site may submit,&nbsp; post,&nbsp; modify,&nbsp; transmit&nbsp; or&nbsp; otherwise&nbsp; make&nbsp; available&nbsp; through&nbsp; our&nbsp; Services,&nbsp; the&nbsp; use&nbsp; of LeManPro Services&nbsp; or&nbsp; your&nbsp; connection&nbsp; with&nbsp; these&nbsp; Services,&nbsp; your&nbsp; violations&nbsp; of&nbsp; the&nbsp; Terms&nbsp; of Service and/or your violation of any such rights of another person.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"font-size:18px\">COMMERCIAL REUSE OF SERVICES</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">The member or user herein agrees not to replicate, duplicate, copy, trade, sell, resell nor exploit for any commercial reason any part, use of, or access to&nbsp;LeManPro&#39;s sites.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"font-size:18px\">USE AND STORAGE GENERAL PRACTICES</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">You herein acknowledge that&nbsp;League Management Protocol, LLC&nbsp;may set up any such practices and/or limits regarding the use of our Services, without limitation of the maximum number of days that&nbsp; any&nbsp; email,&nbsp; message&nbsp; posting&nbsp; or&nbsp; any&nbsp; other&nbsp; uploaded&nbsp; content&nbsp; shall&nbsp; be&nbsp; retained&nbsp; by&nbsp;League Management Protocol, LLC,&nbsp; nor&nbsp; the&nbsp; maximum&nbsp; number&nbsp; of&nbsp; email&nbsp; messages&nbsp; that&nbsp; may&nbsp; be&nbsp; sent and/or received by any member, the maximum volume or size of any email message that may be sent from or may be received by an account on our Service, the maximum disk space allowable that shall be allocated on League Management Protocol, LLC&#39;s servers on the member&#39;s behalf,&nbsp;and/or the maximum number of times and/or duration that any member may access our Servicesin a given period of time. In addition, you also agree that League Management Protocol, LLC&nbsp;has absolutely&nbsp; no&nbsp; responsibility&nbsp; or&nbsp; liability&nbsp; for&nbsp; the&nbsp; removal&nbsp; or&nbsp; failure&nbsp; to&nbsp; maintain&nbsp; storage&nbsp; of&nbsp; any messages and/or other communications or content maintained or transmitted by our Services. You also herein acknowledge that we reserve the right to delete or remove any account that is no longer active for an extended period of time. Furthermore,&nbsp;League Management Protocol, LLC shall reserve the right to modify, alter and/or update these general practices and limits at our discretion.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">Any messenger service, which may include any web-based versions, shall allow you and the individuals&nbsp;&nbsp;with&nbsp;&nbsp;whom&nbsp;&nbsp;you&nbsp; communicate&nbsp; with&nbsp; the&nbsp; ability&nbsp; to&nbsp; save&nbsp; your&nbsp; conversations&nbsp; in&nbsp; your account located on League Management Protocol, LLC&#39;s servers. In this manner, you will be able to access and search your message history from any computer with internet access. You alsoacknowledge that others have the option to use and save conversations with you in their own personal&nbsp; account&nbsp; on LeManPro App. It is your agreement to this TOS which establishes your consent to allow League Management Protocol, LLC&nbsp;to store any and all communications on its servers.</span></p>\r\n\r\n<h2><span style=\"font-size:18px\">MODIFICATIONS</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">League Management Protocol, LLC&nbsp;shall reserve the right at any time it may deem fit, to modify, alter and or discontinue, whether temporarily or permanently, our service, or any part thereof, with or without prior notice. In addition, we shall not be held liable to you or to any third party for any such alteration, modification, suspension and/or discontinuance of our Services, or any part thereof.</span></p>\r\n\r\n<h2><span style=\"font-size:18px\">TERMINATION</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">As&nbsp; a&nbsp; member&nbsp; of LeManPro App, you may cancel or terminate your account, associated email address and/or access to our Services by submitting a cancellation or termination request to.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">As a member, you agree that League Management Protocol, LLC&nbsp;may, without any prior written notice,&nbsp; immediately&nbsp; suspend,&nbsp; terminate,&nbsp; discontinue&nbsp; and/or&nbsp; limit&nbsp; your&nbsp; account,&nbsp; any&nbsp; email associated with your account, and access to any of our Services. The cause for such termination, discontinuance, suspension and/or limitation of access shall include, but is not limited to:</span></p>\r\n\r\n<p><span style=\"font-size:18px\">a)&nbsp;any breach or violation of our TOS or any other incorporated agreement, regulation and/or guideline;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">b) by way of requests from law enforcement or any other governmental agencies;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">c) the discontinuance, alteration and/or material modification to our Services, or any part thereof;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">d) unexpected technical or security issues and/or problems;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">e) any extended periods of inactivity;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">f) any engagement by you in any fraudulent or illegal activities; and/or</span></p>\r\n\r\n<p><span style=\"font-size:18px\">g) the nonpayment of any associated fees that may be owed by you in connection with your LeManPro App&nbsp;account Services.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">Furthermore, you herein agree that any and all terminations, suspensions, discontinuances, and or limitations of access for cause shall be made at our sole discretion and that we shall not be liable to you or any other third party with regards to the termination of your account, associated email address and/or access to any of our Services. </span></p>\r\n\r\n<p><span style=\"font-size:18px\">The termination of your account with LeManPro App&nbsp;shall include any and/or all of the following:</span></p>\r\n\r\n<p><span style=\"font-size:18px\">a) the removal of any access to all or part of the Services offered within&nbsp;LeManPro App;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">b) the deletion of your password and any and all related information, files, and any such content that may be associated with or inside your account, or any part thereof; and</span></p>\r\n\r\n<p><span style=\"font-size:18px\">c) the barring of any further use of all or part of our Services.</span></p>\r\n\r\n<h2><span style=\"font-size:18px\">ADVERTISERS</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">Any&nbsp; correspondence&nbsp; or&nbsp; business&nbsp; dealings&nbsp; with,&nbsp; or&nbsp; the&nbsp; participation&nbsp; in&nbsp; any&nbsp; promotions&nbsp; of, advertisers located on or through our Services, which may include the payment and/or delivery of such&nbsp; related&nbsp; goods&nbsp; and/or&nbsp; Services,&nbsp; and&nbsp; any&nbsp; such&nbsp; other&nbsp; term,&nbsp; condition,&nbsp; warranty&nbsp; and/or representation associated with such dealings, are and shall be solely between you and any such advertiser. Moreover, you herein agree that&nbsp;League Management Protocol, LLC&nbsp;shall not be held responsible or liable for any loss or damage of any nature or manner incurred as a direct result of any such dealings or as a result of the presence of such advertisers on our website.</span></p>\r\n\r\n<h2><span style=\"font-size:18px\">LINKS</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">Either League Management Protocol, LLC&nbsp;or any third parties may provide links to other websites and/or&nbsp; resources.&nbsp; Thus,&nbsp; you&nbsp; acknowledge&nbsp; and&nbsp; agree&nbsp; that&nbsp; we&nbsp; are&nbsp; not&nbsp; responsible&nbsp; for&nbsp; the availability of any such external sites or resources, and as such, we do not endorse nor are we responsible or liable for any content, products, advertising or any other materials, on or available from such third party sites or resources. Furthermore, you acknowledge and agree that League Management Protocol, LLC&nbsp;shall not be responsible or liable, directly or indirectly, for any such damage or loss which may be a result of, caused or allegedly to be caused by or in connection with the use of or the reliance on any such content, goods or Services made available on or through any such site or resource.</span></p>\r\n\r\n<h2><span style=\"font-size:18px\">PROPRIETARY RIGHTS</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">You do hereby acknowledge and agree that League Management Protocol, LLC&#39;s Services and any&nbsp;essential&nbsp;&nbsp;software&nbsp; that&nbsp; may&nbsp; be&nbsp; used&nbsp; in&nbsp; connection&nbsp; with&nbsp; our&nbsp; Services&nbsp; (&quot;Software&quot;)&nbsp; shallcontain proprietary and confidential material that is protected by applicable intellectual property rights and other laws. Furthermore, you herein acknowledge and agree that any Content which may be contained in any advertisements or information presented by and through our Services or by&nbsp; advertisers&nbsp; is&nbsp; protected&nbsp; by&nbsp; copyrights,&nbsp; trademarks,&nbsp; patents&nbsp; or&nbsp; other&nbsp; proprietary&nbsp; rights&nbsp; and laws. Therefore, except for that which is expressly permitted by applicable law or as authorized by League Management Protocol, LLC&nbsp;or such applicable licensor, you agree not to alter, modify, lease,&nbsp; rent,&nbsp; loan,&nbsp; sell,&nbsp; distribute,&nbsp; transmit,&nbsp; broadcast,&nbsp; publicly&nbsp; perform&nbsp; and/or&nbsp; created&nbsp; any plagiaristic works which are based on League Management Protocol, LLC&nbsp;Services (e.g. Content or Software), in whole or part.&nbsp;League Management Protocol, LLC&nbsp;herein has granted you personal, non-transferable and non-exclusive&nbsp; rights&nbsp; and/or&nbsp; license&nbsp; to&nbsp; make&nbsp; use&nbsp; of&nbsp; the&nbsp; object&nbsp; code&nbsp; or&nbsp; our&nbsp; Software&nbsp; on&nbsp; a&nbsp; single computer, as long as you do not, and shall not, allow any third party to duplicate, alter, modify, create or plagiarize work from, reverse engineer, reverse assemble or otherwise make an attempt to locate or discern any source code, sell, assign, sublicense, grant a security interest in and/or otherwise transfer any such right in the Software. Furthermore, you do herein agree not to alter or change&nbsp; the&nbsp; Software&nbsp; in&nbsp; any&nbsp; manner,&nbsp; nature&nbsp; or&nbsp; form,&nbsp; and&nbsp; as&nbsp; such,&nbsp; not&nbsp; to&nbsp; use&nbsp; any&nbsp; modified versions&nbsp; of&nbsp; the&nbsp; Software,&nbsp; including&nbsp; and&nbsp; without&nbsp; limitation,&nbsp; for&nbsp; the&nbsp; purpose&nbsp; of&nbsp; obtaining unauthorized access to our Services. Lastly, you also agree not to access or attempt to access our Services through any means other than through the interface which is provided by&nbsp; League Management Protocol, LLC&nbsp;for use in accessing our Services.</span></p>\r\n\r\n<h2><span style=\"font-size:18px\">WARRANTY DISCLAIMERS</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">YOU HEREIN EXPRESSLY ACKNOWLEDGE AND AGREE THAT:</span></p>\r\n\r\n<p><span style=\"font-size:18px\">a) THE USE OF LEAGUE MANAGEMENT PROTOCOL, LLC&nbsp;SERVICES AND SOFTWARE ARE AT THE SOLE RISK BY YOU. OUR SERVICES AND SOFTWARE SHALL BE PROVIDED ON AN &quot;AS IS&quot; AND/OR &quot;AS AVAILABLE&quot; BASIS. LEAGUE MANAGEMENT PROTOCOL, LLC&nbsp;AND OUR SUBSIDIARIES, AFFILIATES, OFFICERS, EMPLOYEES, AGENTS, PARTNERS AND LICENSORS EXPRESSLY DISCLAIM ANY AND ALL WARRANTIES OF ANY KIND WHETHER EXPRESSED OR IMPLIED, INCLUDING, BUT NOT LIMITED TO ANY IMPLIED WARRANTIES OF TITLE, MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">b) LEAGUE MANAGEMENT PROTOCOL, LLC&nbsp;AND OUR SUBSIDIARIES, OFFICERS, EMPLOYEES, AGENTS, PARTNERS AND LICENSORS MAKE NO SUCH WARRANTIES THAT (i) LEAGUE MANAGEMENT PROTOCOL, LLC&nbsp;SERVICES OR SOFTWARE WILL MEET YOUR REQUIREMENTS; (ii) LEAGUE MANAGEMENT PROTOCOL, LLC&nbsp;SERVICES OR SOFTWARE SHALL BE UNINTERRUPTED, TIMELY, SECURE OR ERROR-FREE; (iii) THAT SUCH RESULTS WHICH MAY BE OBTAINED FROM THE USE OF THE LEAGUE MANAGEMENT PROTOCOL, LLC&nbsp;SERVICES OR SOFTWARE WILL BE ACCURATE OR RELIABLE; (iv) QUALITY OF ANY PRODUCTS, SERVICES, ANY INFORMATION OR OTHER MATERIAL WHICH MAY BE PURCHASED OR OBTAINED BY YOU THROUGH OUR SERVICES OR SOFTWARE WILL MEET YOUR EXPECTATIONS; AND (v) THAT ANY SUCH ERRORS CONTAINED IN THE SOFTWARE SHALL BE CORRECTED.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">c) ANY INFORMATION OR MATERIAL DOWNLOADED OR OTHERWISE OBTAINED BY WAY OF&nbsp;LEAGUE MANAGEMENT PROTOCOL, LLC&nbsp;SERVICES OR SOFTWARE SHALL BE ACCESSED BY YOUR SOLE DISCRETION AND SOLE RISK, AND AS SUCH YOU SHALL BE SOLELY RESPONSIBLE FOR AND HEREBY WAIVE ANY AND ALL CLAIMS AND CAUSES OF ACTION WITH RESPECT TO ANY DAMAGE TO YOUR COMPUTER AND/OR INTERNET ACCESS, DOWNLOADING AND/OR DISPLAYING, OR FOR ANY LOSS OF DATA THAT COULD RESULT FROM THE DOWNLOAD OF ANY SUCH INFORMATION OR MATERIAL.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">d) NO ADVICE AND/OR INFORMATION, DESPITE WHETHER WRITTEN OR ORAL, THAT MAY BE OBTAINED BY YOU FROM&nbsp;LEAGUE MANAGEMENT PROTOCOL, LLC&nbsp;OR BY WAY OF OR FROM OUR SERVICES OR SOFTWARE SHALL CREATE ANY WARRANTY NOT EXPRESSLY STATED IN THE TOS.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">e) A SMALL PERCENTAGE OF SOME USERS MAY EXPERIENCE SOME DEGREE OF EPILEPTIC SEIZURE WHEN EXPOSED TO CERTAIN LIGHT PATTERNS OR BACKGROUNDS THAT MAY BE CONTAINED ON A COMPUTER SCREEN OR WHILE USING OUR SERVICES. CERTAIN CONDITIONS MAY INDUCE A PREVIOUSLY UNKNOWN CONDITION OR UNDETECTED EPILEPTIC SYMPTOM IN USERS WHO HAVE SHOWN NO HISTORY OF ANY PRIOR SEIZURE OR EPILEPSY. SHOULD YOU, ANYONE YOU KNOW OR ANYONE IN YOUR FAMILY HAVE AN EPILEPTIC CONDITION, PLEASE CONSULT A PHYSICIAN IF YOU EXPERIENCE ANY OF THE FOLLOWING SYMPTOMS WHILE USING OUR SERVICES: DIZZINESS, ALTERED VISION, EYE OR MUSCLE TWITCHES, LOSS OF AWARENESS, DISORIENTATION, ANY INVOLUNTARY MOVEMENT, OR CONVULSIONS.</span></p>\r\n\r\n<h2><span style=\"font-size:18px\">LIMITATION OF LIABILITY</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">YOU &nbsp; EXPLICITLY&nbsp; ACKNOWLEDGE, &nbsp; UNDERSTAND&nbsp; AND&nbsp; AGREE &nbsp; THAT LEAGUE MANAGEMENT&nbsp;&nbsp;PROTOCOL,&nbsp; LLC&nbsp; AND&nbsp; OUR&nbsp; SUBSIDIARIES,&nbsp; AFFILIATES,&nbsp; OFFICERS, EMPLOYEES, AGENTS, PARTNERS AND LICENSORS SHALL NOT BE LIABLE TO YOU FOR ANY&nbsp; PUNITIVE,&nbsp; INDIRECT,&nbsp; INCIDENTAL,&nbsp; SPECIAL,&nbsp; CONSEQUENTIAL&nbsp; OR&nbsp; EXEMPLARY DAMAGES, INCLUDING, BUT NOT LIMITED TO, DAMAGES WHICH MAY BE RELATED TO THE&nbsp; LOSS&nbsp; OF&nbsp; ANY&nbsp; PROFITS,&nbsp; GOODWILL,&nbsp; USE,&nbsp; DATA&nbsp; AND/OR&nbsp; OTHER&nbsp; INTANGIBLE LOSSES,&nbsp; EVEN&nbsp; THOUGH&nbsp; WE&nbsp; MAY&nbsp; HAVE&nbsp; BEEN ADVISED&nbsp; OF&nbsp; SUCH&nbsp; POSSIBILITY&nbsp; THAT SAID DAMAGES MAY OCCUR, AND RESULT FROM:</span></p>\r\n\r\n<p><span style=\"font-size:18px\">a) THE USE OR INABILITY TO USE OUR SERVICE;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">b) THE COST OF PROCURING SUBSTITUTE GOODS AND SERVICES;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">c) UNAUTHORIZED ACCESS TO OR THE ALTERATION OF YOUR TRANSMISSIONS AND/OR DATA;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">d) STATEMENTS OR CONDUCT OF ANY SUCH THIRD PARTY ON OUR SERVICE;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">e) AND ANY OTHER MATTER WHICH MAY BE RELATED TO OUR SERVICE.</span></p>\r\n\r\n<h2><span style=\"font-size:18px\">RELEASE</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">In the event you have a dispute, you agree to release League Management Protocol, LLC&nbsp;(and its officers, directors, employees, agents, parent subsidiaries, affiliates, co-branders, partners and any other third parties) from claims, demands and damages (actual and consequential) of every kind and nature, known and unknown, suspected or unsuspected, disclosed and undisclosed, arising out of or in any way connected to such dispute.</span></p>\r\n\r\n<h2><span style=\"font-size:18px\">SPECIAL ADMONITION RELATED TO FINANCIAL MATTERS</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">Should you intend to create or to join any service, receive or request any such news, messages, alerts or other information from our Services concerning companies, stock quotes, investments or securities, please review the above Sections Warranty Disclaimers and Limitations of Liability again. In addition, for this particular type of information, the phrase &quot;Let the investor beware&quot; is appropriate.&nbsp;League Management Protocol, LLC&#39;s content is provided primarily for informational purposes, and no content that shall be provided or included in our Services is intended for trading or&nbsp; investing&nbsp; purposes.&nbsp;League&nbsp; Management&nbsp; Protocol,&nbsp; LLC&nbsp; and&nbsp; our&nbsp; licensors&nbsp; shall&nbsp; not&nbsp; be responsible or liable for the accuracy, usefulness or availability of any information transmitted and/or made available by way of our Services, and shall not be responsible or liable for any trading and/or investment decisions based on any such information.</span></p>\r\n\r\n<h2><span style=\"font-size:18px\">EXCLUSION AND LIMITATIONS</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">THERE ARE SOME JURISDICTIONS WHICH DO NOT ALLOW THE EXCLUSION OF CERTAIN WARRANTIES&nbsp; OR&nbsp; THE&nbsp; LIMITATION&nbsp; OF&nbsp; EXCLUSION&nbsp; OF&nbsp; LIABILITY&nbsp; FOR&nbsp; INCIDENTAL&nbsp; OR CONSEQUENTIAL&nbsp; DAMAGES.&nbsp; THEREFORE,&nbsp; SOME&nbsp; OF&nbsp; THE&nbsp; ABOVE&nbsp; LIMITATIONS&nbsp; OF SECTIONS WARRANTY DISCLAIMERS AND LIMITATION OF LIABILITY MAY NOT APPLY TO YOU.</span></p>\r\n\r\n<h2>THIRD PARTY BENEFICIARIES</h2>\r\n\r\n<p><span style=\"font-size:18px\">You herein acknowledge, understand and agree, unless otherwise expressly provided in this TOS, that there shall be no third-party beneficiaries to this agreement.</span></p>\r\n\r\n<h2><span style=\"font-size:18px\">NOTICE</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">League Management Protocol, LLC may furnish you with notices, including those with regards to any changes to the TOS, including but not limited to email, regular mail, MMS or SMS, text messaging, postings on our website Services, or other reasonable means currently known or any which may be herein after developed. Any such notices may not be received if you violate any aspects of the TOS by accessing our Services in an unauthorized manner. Your acceptance of this TOS constitutes your agreement that you are deemed to have received any and all notices that would have been delivered had you accessed our Services in an authorized manner.</span></p>\r\n\r\n<h2><span style=\"font-size:18px\">TRADEMARK INFORMATION</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">You herein acknowledge, understand and agree that all of the League Management Protocol, LLC trademarks, copyright, trade name, service marks, and other League Management Protocol, LLC logos and any brand features, and/or product and service names are trademarks and as such, are and shall remain the property of League Management Protocol, LLC. You herein agree not to display and/or use in any manner the League Management Protocol, LLC logo or marks without obtaining League Management Protocol, LLC&#39;s prior written consent.</span></p>\r\n\r\n<h2><span style=\"font-size:18px\">COPYRIGHT OR INTELLECTUAL PROPERTY INFRINGEMENT CLAIMS NOTICE &amp; PROCEDURES</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">League Management Protocol, LLC will always respect the intellectual property of others, and we ask that all of our users do the same. With regards to appropriate circumstances and at its sole discretion, League Management Protocol, LLC may disable and/or terminate the accounts of any user who violates our TOS and/or infringes the rights of others. If you feel that your work has been duplicated in such a way that would constitute copyright infringement, or if you believe your intellectual property rights have been otherwise violated, you should provide to us the following information:</span></p>\r\n\r\n<p><span style=\"font-size:18px\">a) The electronic or the physical signature of the individual that is authorized on behalf of the owner of the copyright or other intellectual property interest;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">b) A description of the copyrighted work or other intellectual property that you believe has been infringed upon;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">c) A description of the location of the site which you allege has been infringing upon your work;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">d) Your physical address, telephone number, and email address;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">e) A statement, in which you state that the alleged and disputed use of your work is not authorized by the copyright owner, its agents or the law;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">f) And finally, a statement, made under penalty of perjury, that the aforementioned information in your notice is truthful and accurate, and that you are the copyright or intellectual property owner, representative or agent authorized to act on the copyright or intellectual property owner&#39;s behalf. The League Management Protocol, LLC Agent for notice of claims of copyright or other intellectual property infringement can be contacted as follows:</span></p>\r\n\r\n<p><span style=\"font-size:18px\">Mailing Address:</span></p>\r\n\r\n<p><span style=\"font-size:18px\">League Management Protocol, LLC</span></p>\r\n\r\n<p><span style=\"font-size:18px\">Attn: Copyright Agent</span></p>\r\n\r\n<p><span style=\"font-size:18px\">5 Nichols Lane</span></p>\r\n\r\n<p><span style=\"font-size:18px\">Nashua, New Hampshire 03062</span></p>\r\n\r\n<p><span style=\"font-size:18px\">Telephone: (978) 996-3759</span></p>\r\n\r\n<p><span style=\"font-size:18px\">Email: lcosta1972@hotmail.com</span></p>\r\n\r\n<h2><span style=\"font-size:18px\">CLOSED CAPTIONING</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">BE IT KNOWN, that League Management Protocol, LLC&nbsp;complies with all applicable Federal Communications&nbsp; Commission rules and regulations regarding the closed captioning of video content. For more information, please visit our website at LeManPro App.</span></p>\r\n\r\n<h2><span style=\"font-size:18px\">GENERAL INFORMATION</span></h2>\r\n\r\n<h2><em><u><span style=\"font-size:18px\">ENTIRE AGREEMENT</span></u></em></h2>\r\n\r\n<p><span style=\"font-size:18px\">This TOS constitutes the entire agreement between you and League Management Protocol, LLC and shall govern the use of our Services, superseding any prior version of this TOS between you and us with respect to League Management Protocol, LLC Services. You may also be subject to additional terms and conditions that may apply when you use or purchase certain other League Management Protocol, LLC Services, affiliate Services, third-party content or third-party software.</span></p>\r\n\r\n<h2><u><em><span style=\"font-size:18px\">CHOICE OF LAW AND FORUM</span></em></u></h2>\r\n\r\n<p><span style=\"font-size:18px\">It is at the mutual agreement of both you and League Management Protocol, LLC with regard to the TOS that the relationship between the parties shall be governed by the laws of the state of New Hampshire without regard to its conflict of law provisions and that any and all claims, causes of action and/or disputes, arising out of or relating to the TOS, or the relationship between you and League Management Protocol, LLC, shall be filed within the courts having jurisdiction within the County of Hillsborough County, New Hampshire or the U.S. District Court located in said state. You and League Management Protocol, LLC agree to submit to the jurisdiction of the courts as previously mentioned, and agree to waive any and all objections to the exercise of jurisdiction over the parties by such courts and to venue in such courts.</span></p>\r\n\r\n<h2><u><em><span style=\"font-size:18px\">WAIVER AND SEVERABILITY OF TERMS</span></em></u></h2>\r\n\r\n<p><span style=\"font-size:18px\">At any time, should League Management Protocol, LLC fail to exercise or enforce any right or provision of the TOS, such failure shall not constitute a waiver of such right or provision. If any provision of this TOS is found by a court of competent jurisdiction to be invalid, the parties nevertheless agree that the court should endeavor to give effect to the parties&#39; intentions as reflected in the provision, and the other provisions of the TOS remain in full force and effect.</span></p>\r\n\r\n<h2><u><em><span style=\"font-size:18px\">NO RIGHT OF SURVIVORSHIP NON-TRANSFERABILITY</span></em></u></h2>\r\n\r\n<p><span style=\"font-size:18px\">You acknowledge, understand and agree that your account is non-transferable and any rights to your ID and/or contents within your account shall terminate upon your death. Upon receipt of a copy of a death certificate, your account may be terminated and all contents therein permanently deleted.</span></p>\r\n\r\n<h2><u><em><span style=\"font-size:18px\">STATUTE OF LIMITATIONS</span></em></u></h2>\r\n\r\n<p><span style=\"font-size:18px\">You acknowledge, understand and agree that regardless of any statute or law to the contrary, any claim or action arising out of or related to the use of our Services or the TOS must be filed within 3 year(s) after said claim or cause of action arose or shall be forever barred.</span></p>\r\n\r\n<h2><span style=\"font-size:18px\">VIOLATIONS</span></h2>\r\n\r\n<p><span style=\"font-size:18px\">Please report any and all violations of this TOS to League Management Protocol, LLC as follows:</span></p>\r\n\r\n<p><span style=\"font-size:18px\">Mailing Address:</span></p>\r\n\r\n<p><span style=\"font-size:18px\">League Management Protocol, LLC</span></p>\r\n\r\n<p><span style=\"font-size:18px\">5 Nichols Lane</span></p>\r\n\r\n<p><span style=\"font-size:18px\">Nashua, New Hampshire 03062</span></p>\r\n\r\n<p><span style=\"font-size:18px\">Telephone: (978) 996-3759</span></p>\r\n\r\n<p><span style=\"font-size:18px\">Email: lcosta1972@hotmail.com</span></p>', '2021-02-01 00:05:41', '2021-02-01 00:05:41');
INSERT INTO `content` (`id`, `type`, `body`, `created_at`, `updated_at`) VALUES
(2, 'pp', '<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">LemanPro built the LemanPro&nbsp;app as commercial app. This SERVICE is provided by LemanPro&nbsp;at no cost and is intended for use as is.</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">This page is used to inform visitors regarding [my/our] policies with the collection, use, and disclosure of Personal Information if anyone decided to use [my/our] Service.</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">If you choose to use [my/our] Service, then you agree to the collection and use of information in relation to this policy. The Personal Information that [I/We] collect is used for providing and improving the Service. [I/We] will not use or share your information with anyone except as described in this Privacy Policy.</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">The terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, which is accessible at LemanPro unless otherwise defined in this Privacy Policy.</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">Information Collection and Use</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">For a better experience, while using our Service, [I/We] may require you to provide us with certain personally identifiable information. The information that [I/We] request will be [retained on your device and is not collected by [me/us] in any way]/[retained by us and used as described in this privacy policy].</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">The app does use third party services that may collect information used to identify you.</span></p>\r\n\r\n<div style=\"color:#616161; font-family:Roboto,Helvetica,sans-serif\">\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">Link to privacy policy of third party service providers used by the app</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\"><a href=\"https://www.google.com/policies/privacy/\" rel=\"noopener\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); color: #448aff;\" target=\"_blank\">Google Play Services</a></span></li>\r\n</ul>\r\n</div>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">Log Data</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">[I/We] want to inform you that whenever you use [my/our] Service, in a case of an error in the app [I/We] collect data and information (through third party products) on your phone called Log Data. This Log Data may include information such as your device Internet Protocol (&ldquo;IP&rdquo;) address, device name, operating system version, the configuration of the app when utilizing [my/our] Service, the time and date of your use of the Service, and other statistics.</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">Cookies</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">Cookies are files with a small amount of data that are commonly used as anonymous unique identifiers. These are sent to your browser from the websites that you visit and are stored on your device&#39;s internal memory.</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">This Service does not use these &ldquo;cookies&rdquo; explicitly. However, the app may use third party code and libraries that use &ldquo;cookies&rdquo; to collect information and improve their services. You have the option to either accept or refuse these cookies and know when a cookie is being sent to your device. If you choose to refuse our cookies, you may not be able to use some portions of this Service.</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">Service Providers</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">[I/We] may employ third-party companies and individuals due to the following reasons:</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:18px\">To facilitate our Service;</span></li>\r\n	<li><span style=\"font-size:18px\">To provide the Service on our behalf;</span></li>\r\n	<li><span style=\"font-size:18px\">To perform Service-related services; or</span></li>\r\n	<li><span style=\"font-size:18px\">To assist us in analyzing how our Service is used.</span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">[I/We] want to inform users of this Service that these third parties have access to your Personal Information. The reason is to perform the tasks assigned to them on our behalf. However, they are obligated not to disclose or use the information for any other purpose.</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">Security</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">[I/We] value your trust in providing us your Personal Information, thus we are striving to use commercially acceptable means of protecting it. But remember that no method of transmission over the internet, or method of electronic storage is 100% secure and reliable, and [I/We] cannot guarantee its absolute security.</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">Links to Other Sites</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">This Service may contain links to other sites. If you click on a third-party link, you will be directed to that site. Note that these external sites are not operated by [me/us]. Therefore, [I/We] strongly advise you to review the Privacy Policy of these websites. [I/We] have no control over and assume no responsibility for the content, privacy policies, or practices of any third-party sites or services.</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">Children&rsquo;s Privacy</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">These Services do not address anyone under the age of 13. [I/We] do not knowingly collect personally identifiable information from children under 13. In the case [I/We] discover that a child under 13 has provided [me/us] with personal information. If you are a parent or guardian and you are aware that your child has provided us with personal information, please contact [me/us] so that [I/We] will be able to do necessary actions.</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">Changes to This Privacy Policy</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">[I/We] may update our Privacy Policy from time to time. Thus, you are advised to review this page periodically for any changes. [I/We] will notify you of any changes by posting the new Privacy Policy on this page. These changes are effective immediately after they are posted on this page.</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">Contact Us</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\">If you have any questions or suggestions about [my/our] Privacy Policy, do not hesitate to contact [me/us] at info@LemanPro.com.</span></p>', '2021-02-01 00:05:41', '2021-02-01 00:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `deal_alerts`
--

CREATE TABLE `deal_alerts` (
  `id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `type` enum('Local Happy Hour','Restaurant Happy Hour') DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` enum('Restaurant Owner','Admin') DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deal_alerts`
--

INSERT INTO `deal_alerts` (`id`, `title`, `description`, `type`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Now Get All Coke Starting at $10 Only', 'Now Get All Coke Starting at $10 Only Now Get All Coke Starting at $10 Only Now Get All Coke Starting at $10 Only', 'Restaurant Happy Hour', 1, 'Admin', '2021-09-30 05:10:34', '2021-09-30 10:37:56'),
(2, '$6.99 Boneless Wings from Monday To Saturday', '$6.99 Boneless Wings from Monday To Saturday $6.99 Boneless Wings from Monday To Saturday $6.99 Boneless Wings from Monday To Saturday', 'Local Happy Hour', 1, NULL, '2021-09-30 05:10:34', '2021-09-30 10:38:16'),
(3, '$1 Hard Shell Tacos', '$1 Hard Shell Tacos $1 Hard Shell Tacos $1 Hard Shell Tacos $1 Hard Shell Tacos $1 Hard Shell Tacos $1 Hard Shell Tacos $1 Hard Shell Tacos $1 Hard Shell Tacos $1 Hard Shell Tacos $1 Hard Shell Tacos $1 Hard Shell Tacos $1 Hard Shell Tacos', 'Local Happy Hour', 1, NULL, '2021-09-30 05:13:47', '2021-09-30 09:50:18'),
(5, 'hellooo123', 'here is the description', 'Local Happy Hour', 1, 'Admin', '2021-10-05 07:36:09', '2021-10-05 07:36:09'),
(6, 'okgdfkg', 'gfdkgldfg kjfgd', 'Local Happy Hour', 1, 'Admin', '2021-10-05 07:36:40', '2021-10-05 07:36:40'),
(7, 'helll', 'ok', 'Local Happy Hour', 1, 'Admin', '2021-10-05 08:11:31', '2021-10-05 08:11:31'),
(8, 'dasdas', 'dasda', 'Local Happy Hour', 1, 'Admin', '2021-10-11 09:22:47', '2021-10-11 09:22:47'),
(9, 'dasdsa', 'dasdas', 'Restaurant Happy Hour', 1, 'Admin', '2021-10-11 09:23:14', '2021-10-11 09:23:14'),
(10, '', NULL, 'Local Happy Hour', 1, 'Admin', '2021-10-11 09:24:50', '2021-10-12 07:51:20'),
(11, 'lmklmklkl', 'klpokjjho', 'Local Happy Hour', 1, 'Admin', '2021-10-11 10:16:51', '2021-10-11 10:16:51'),
(13, 'Minhal Deal', 'Minhal Deal', 'Restaurant Happy Hour', 1, 'Admin', '2021-10-12 07:30:26', '2021-10-12 07:30:26'),
(15, 'Mozilla VPN Security, reliability and speed — on every device, anywhere you go.  A Virtual Private Network from the makers of Firefox. Join the Waitlist  We currently offer Mozilla VPN in Aus', 'Mozilla VPN\r\nSecurity, reliability and speed — on every device, anywhere you go.\r\n\r\nA Virtual Private Network from the makers of Firefox.\r\nJoin the Waitlist\r\n\r\nWe currently offer Mozilla VPN in Austria, Belgium, Canada, France, Germany, Ireland, Italy, Malaysia, the Netherlands, New Zealand, Singapore, Spain, Switzerland, the UK, and the US.\r\n\r\nMozilla VPN\r\nSecurity, reliability and speed — on every device, anywhere you go.\r\n\r\nA Virtual Private Network from the makers of Firefox.\r\nJoin the Waitlist\r\n\r\nWe currently offer Mozilla VPN in Austria, Belgium, Canada, France, Germany, Ireland, Italy, Malaysia, the Netherlands, New Zealand, Singapore, Spain, Switzerland, the UK, and the US.\r\n\r\nMozilla VPN\r\nSecurity, reliability and speed — on every device, anywhere you go.\r\n\r\nA Virtual Private Network from the makers of Firefox.\r\nJoin the Waitlist\r\n\r\nWe currently offer Mozilla VPN in Austria, Belgium, Canada, France, Germany, Ireland, Italy, Malaysia, the Netherlands, New Zealand, Singapore, Spain, Switzerland, the UK, and the US.\r\n\r\nMozilla VPN\r\nSecurity, reliability and speed — on every device, anywhere you go.\r\n\r\nA Virtual Private Network from the makers of Firefox.\r\nJoin the Waitlist\r\n\r\nWe currently offer Mozilla VPN in Austria, Belgium, Canada, France, Germany, Ireland, Italy, Malaysia, the Netherlands, New Zealand, Singapore, Spain, Switzerland, the UK, and the US.\r\n\r\nMozilla VPN\r\nSecurity, reliability and speed — on every device, anywhere you go.\r\n\r\nA Virtual Private Network from the makers of Firefox.\r\nJoin the Waitlist\r\n\r\nWe currently offer Mozilla VPN in Austria, Belgium, Canada, France, Germany, Ireland, Italy, Malaysia, the Netherlands, New Zealand, Singapore, Spain, Switzerland, the UK, and the US.\r\n\r\nMozilla VPN\r\nSecurity, reliability and speed — on every device, anywhere you go.\r\n\r\nA Virtual Private Network from the makers of Firefox.\r\nJoin the Waitlist\r\n\r\nWe currently offer Mozilla VPN in Austria, Belgium, Canada, France, Germany, Ireland, Italy, Malaysia, the Netherlands, New Zealand, Singapore, Spain, Switzerland, the UK, and the US.\r\n\r\nMozilla VPN\r\nSecurity, reliability and speed — on every device, anywhere you go.\r\n\r\nA Virtual Private Network from the makers of Firefox.\r\nJoin the Waitlist\r\n\r\nWe currently offer Mozilla VPN in Austria, Belgium, Canada, France, Germany, Ireland, Italy, Malaysia, the Netherlands, New Zealand, Singapore, Spain, Switzerland, the UK, and the US.\r\n\r\nMozilla VPN\r\nSecurity, reliability and speed — on every device, anywhere you go.\r\n\r\nA Virtual Private Network from the makers of Firefox.\r\nJoin the Waitlist\r\n\r\nWe currently offer Mozilla VPN in Austria, Belgium, Canada, France, Germany, Ireland, Italy, Malaysia, the Netherlands, New Zealand, Singapore, Spain, Switzerland, the UK, and the US.\r\n\r\nMozilla VPN\r\nSecurity, reliability and speed — on every device, anywhere you go.\r\n\r\nA Virtual Private Network from the makers of Firefox.\r\nJoin the Waitlist\r\n\r\nWe currently offer Mozilla VPN in Austria, Belgium, Canada, France, Germany, Ireland, Italy, Malaysia, the Netherlands, New Zealand, Singapore, Spain, Switzerland, the UK, and the US.', 'Local Happy Hour', 0, 'Admin', '2021-10-12 07:39:29', '2021-10-12 07:39:29'),
(16, '8541', '51', 'Local Happy Hour', 0, 'Admin', '2021-10-13 07:50:48', '2021-10-13 07:51:50'),
(17, 'Super offer', '4 Zinger Strips + 1 Coleslaw + Fries + Drink + 1 Dip + 1 Dinner Roll.    On ATOM BAR RESTAURANT', 'Restaurant Happy Hour', 1, 'Admin', '2021-10-13 10:56:13', '2021-10-13 10:56:13'),
(18, 'Banto', 'Banto boy.', 'Local Happy Hour', 1, 'Admin', '2021-10-13 11:05:33', '2021-10-13 11:05:33'),
(19, 'Banto Commando', 'Banto Commando', 'Local Happy Hour', 1, 'Admin', '2021-10-13 11:08:38', '2021-10-13 11:08:38'),
(20, 'Banto Commando Two', 'Banto Commando Two', 'Local Happy Hour', 1, 'Admin', '2021-10-13 11:08:51', '2021-10-13 11:08:51'),
(21, 'Altaf Boy', 'Altaf Boy', 'Local Happy Hour', 1, 'Admin', '2021-10-13 12:01:12', '2021-10-13 12:01:12'),
(22, 'Banto Boy', 'Banto Boy', 'Restaurant Happy Hour', 1, 'Admin', '2021-10-13 12:01:25', '2021-10-13 12:01:25'),
(23, 'test', 'hj', 'Local Happy Hour', 1, 'Admin', '2021-10-13 12:44:18', '2021-10-13 12:44:18'),
(24, 'newdeal1', 'testint testing', 'Local Happy Hour', 1, 'Admin', '2021-10-14 04:38:09', '2021-10-14 04:38:09'),
(25, 'newdeal2', 'testing deal testing deal', 'Local Happy Hour', 1, 'Admin', '2021-10-14 04:38:41', '2021-10-14 04:38:41'),
(26, 'deal3', 'test deal 3 test deal 3', 'Local Happy Hour', 1, 'Admin', '2021-10-14 04:39:55', '2021-10-14 04:39:55'),
(27, 'newnewoffer', 'test deal', 'Restaurant Happy Hour', 1, 'Admin', '2021-10-14 07:21:09', '2021-10-14 07:21:09'),
(28, 'deal check', 'abcd check', 'Local Happy Hour', 1, 'Admin', '2021-10-14 10:18:45', '2021-10-14 10:18:45'),
(29, 'deal1', 'feewnb', 'Local Happy Hour', 1, 'Admin', '2021-10-14 10:20:42', '2021-10-14 10:20:42'),
(30, 'dewb', 'gfr', 'Restaurant Happy Hour', 1, 'Admin', '2021-10-14 10:20:54', '2021-10-14 10:20:54'),
(31, 'jhbk', 'check again', 'Restaurant Happy Hour', 1, 'Admin', '2021-10-14 11:21:50', '2021-10-14 11:21:50'),
(32, 'check1', 'kdsb', 'Restaurant Happy Hour', 1, 'Admin', '2021-10-14 11:22:07', '2021-10-14 11:22:07'),
(33, 'abc', 'test', 'Restaurant Happy Hour', 1, 'Admin', '2021-10-14 12:10:45', '2021-10-14 12:10:45'),
(34, 'nekw', 'dsae', 'Local Happy Hour', 1, 'Admin', '2021-10-14 12:11:56', '2021-10-14 12:11:56'),
(35, 'newDeal Altaf', 'fdafg', 'Local Happy Hour', 1, 'Admin', '2021-10-14 12:15:01', '2021-10-14 12:15:01'),
(36, 'Banto Boy', 'Banto Boy', 'Local Happy Hour', 1, 'Admin', '2021-10-14 12:23:40', '2021-10-14 12:23:40'),
(37, 'lestcheck', 'check this deal', 'Local Happy Hour', 1, 'Admin', '2021-10-15 04:33:48', '2021-10-15 04:33:48'),
(38, 'deal test', 'now check this deal', 'Restaurant Happy Hour', 1, 'Admin', '2021-10-15 04:34:26', '2021-10-15 04:34:26'),
(39, 'againtect', 'check notification', 'Local Happy Hour', 1, 'Admin', '2021-10-15 04:38:44', '2021-10-15 04:38:44'),
(40, 'dealtestnew', 'sdfew', 'Restaurant Happy Hour', 1, 'Admin', '2021-10-15 04:40:11', '2021-10-15 04:40:11'),
(41, 'new DealTestAgain', 'check 1 check2', 'Local Happy Hour', 1, 'Admin', '2021-10-18 08:21:29', '2021-10-18 08:21:29'),
(42, 'DASDASD', 'TEST', 'Local Happy Hour', 1, 'Admin', '2021-10-20 09:00:24', '2021-10-20 09:00:24'),
(43, 'Buy One get One Free', 'Test1', 'Local Happy Hour', 1, 'Admin', '2021-10-21 23:27:54', '2021-10-21 23:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `attachments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `managers_restaurants`
--

CREATE TABLE `managers_restaurants` (
  `id` int(11) NOT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `restaurant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managers_restaurants`
--

INSERT INTO `managers_restaurants` (`id`, `manager_id`, `restaurant_id`) VALUES
(1, 102, 30),
(2, 102, 30);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2020_11_16_130316_create_content_table', 1),
(6, '2020_11_17_115510_create_feedback_table', 1),
(7, '2020_11_26_111910_create_notifications_table', 1),
(8, '2020_11_30_073739_make_password_and_email_fields_nullable_in_users_table', 1),
(9, '2021_08_31_044536_userr', 2),
(10, '2021_08_31_122837_notifications', 3),
(11, '2021_08_31_123157_alter-notifications', 4),
(12, '2021_09_20_051716_types', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications_web`
--

CREATE TABLE `notifications_web` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `for_id` int(11) NOT NULL,
  `notification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `sub_total` double DEFAULT 0,
  `grand_total` double DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(100) DEFAULT NULL,
  `delivered_at` timestamp NULL DEFAULT NULL,
  `is_seen` smallint(1) NOT NULL DEFAULT 0,
  `payment_status` varchar(100) DEFAULT NULL,
  `card_id` int(11) DEFAULT NULL,
  `payment_response` text DEFAULT NULL,
  `tip` text DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `restaurant_id`, `sub_total`, `grand_total`, `created_at`, `updated_at`, `order_status`, `delivered_at`, `is_seen`, `payment_status`, `card_id`, `payment_response`, `tip`) VALUES
(58, 114, NULL, 0, 600, '2021-10-13 12:33:00', '2021-10-13 17:56:34', 'pending', NULL, 0, 'paid', 28, '{\"id\":\"ch_3Jk6dkJELxddsoRY1i6kNKgk\",\"object\":\"charge\",\"amount\":60000,\"amount_captured\":60000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3Jk6dkJELxddsoRY1eiVIbRj\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"WWW.APPSNADO.COM\",\"captured\":true,\"created\":1634128380,\"currency\":\"usd\",\"customer\":\"cus_KOoqv93Jf8f8Es\",\"description\":null,\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":31,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1Jk1CdJELxddsoRYvMKQL1Ao\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":null},\"country\":\"US\",\"exp_month\":12,\"exp_year\":2021,\"fingerprint\":\"XUcZMDk3KhQLvPR6\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1H0UoCJELxddsoRY\\/ch_3Jk6dkJELxddsoRY1i6kNKgk\\/rcpt_KOuS9idlYnKm46pm15V8qdsiMsjeM64\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_3Jk6dkJELxddsoRY1i6kNKgk\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1Jk1CdJELxddsoRYvMKQL1Ao\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_KOoqv93Jf8f8Es\",\"cvc_check\":null,\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2021,\"fingerprint\":\"XUcZMDk3KhQLvPR6\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '23'),
(59, 103, NULL, 0, 150, '2021-10-13 12:46:00', '2021-10-20 13:33:18', 'completed', '2021-10-14 13:27:53', 1, 'paid', 29, '{\"id\":\"ch_3Jk6qKJELxddsoRY1ja3VX9d\",\"object\":\"charge\",\"amount\":15000,\"amount_captured\":15000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3Jk6qKJELxddsoRY1sOHsZyu\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"WWW.APPSNADO.COM\",\"captured\":true,\"created\":1634129160,\"currency\":\"usd\",\"customer\":\"cus_KOq1qoUfoIKTQ6\",\"description\":null,\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":22,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1Jk2LWJELxddsoRYiE92iXLz\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":null},\"country\":\"US\",\"exp_month\":12,\"exp_year\":2022,\"fingerprint\":\"XUcZMDk3KhQLvPR6\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1H0UoCJELxddsoRY\\/ch_3Jk6qKJELxddsoRY1ja3VX9d\\/rcpt_KOufono1xAWrnDStFq0I7TT4AagBSr6\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_3Jk6qKJELxddsoRY1ja3VX9d\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1Jk2LWJELxddsoRYiE92iXLz\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_KOq1qoUfoIKTQ6\",\"cvc_check\":null,\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2022,\"fingerprint\":\"XUcZMDk3KhQLvPR6\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '4'),
(60, 114, NULL, 0, 750, '2021-10-13 12:53:00', '2021-10-13 12:58:11', 'pending', NULL, 0, 'paid', 28, '{\"id\":\"ch_3Jk6x6JELxddsoRY1QIRf6Fm\",\"object\":\"charge\",\"amount\":75000,\"amount_captured\":75000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3Jk6x6JELxddsoRY1RNn6ypy\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"WWW.APPSNADO.COM\",\"captured\":true,\"created\":1634129580,\"currency\":\"usd\",\"customer\":\"cus_KOoqv93Jf8f8Es\",\"description\":null,\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":13,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1Jk1CdJELxddsoRYvMKQL1Ao\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":null},\"country\":\"US\",\"exp_month\":12,\"exp_year\":2021,\"fingerprint\":\"XUcZMDk3KhQLvPR6\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1H0UoCJELxddsoRY\\/ch_3Jk6x6JELxddsoRY1QIRf6Fm\\/rcpt_KOumi1jZeWV6Zgn4JVXttkr9DnQ3Buo\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_3Jk6x6JELxddsoRY1QIRf6Fm\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1Jk1CdJELxddsoRYvMKQL1Ao\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_KOoqv93Jf8f8Es\",\"cvc_check\":null,\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2021,\"fingerprint\":\"XUcZMDk3KhQLvPR6\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '20'),
(61, 125, NULL, 0, 12, '2021-10-19 18:22:03', '2021-10-19 18:22:21', 'pending', NULL, 0, 'paid', 30, '{\"id\":\"ch_3JmMwpJELxddsoRY0PiRahir\",\"object\":\"charge\",\"amount\":1200,\"amount_captured\":1200,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3JmMwpJELxddsoRY0f3WW2Ra\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"WWW.APPSNADO.COM\",\"captured\":true,\"created\":1634667723,\"currency\":\"usd\",\"customer\":\"cus_KRFRUfMSSyRYS4\",\"description\":null,\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":40,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1JmMweJELxddsoRYM8oer7lI\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":12,\"exp_year\":2024,\"fingerprint\":\"XUcZMDk3KhQLvPR6\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1H0UoCJELxddsoRY\\/ch_3JmMwpJELxddsoRY0PiRahir\\/rcpt_KRFRQARC6W9wz0mtJxKVvMXpZyVnyVn\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_3JmMwpJELxddsoRY0PiRahir\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1JmMweJELxddsoRYM8oer7lI\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_KRFRUfMSSyRYS4\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2024,\"fingerprint\":\"XUcZMDk3KhQLvPR6\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '13'),
(62, 123, NULL, 0, 963936, '2021-10-20 21:05:04', '2021-10-20 21:05:40', 'pending', NULL, 0, 'paid', 31, '{\"id\":\"ch_3Jmly8JELxddsoRY1KF3BFif\",\"object\":\"charge\",\"amount\":96393600,\"amount_captured\":96393600,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3Jmly8JELxddsoRY1uWTQRpT\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"WWW.APPSNADO.COM\",\"captured\":true,\"created\":1634763904,\"currency\":\"usd\",\"customer\":\"cus_KRfIRy9NTmAxCb\",\"description\":null,\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":39,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1JmlxoJELxddsoRYxXYDUjy1\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":12,\"exp_year\":2024,\"fingerprint\":\"XUcZMDk3KhQLvPR6\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1H0UoCJELxddsoRY\\/ch_3Jmly8JELxddsoRY1KF3BFif\\/rcpt_KRfI0zZQDiktmoTufr9YHuCKybpMCyy\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_3Jmly8JELxddsoRY1KF3BFif\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1JmlxoJELxddsoRYxXYDUjy1\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_KRfIRy9NTmAxCb\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2024,\"fingerprint\":\"XUcZMDk3KhQLvPR6\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '2');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` double DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `item_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(117, 58, 55, 4, 150, '2021-10-13 16:33:00', '2021-10-13 16:33:00'),
(118, 59, 55, 1, 150, '2021-10-13 16:46:00', '2021-10-13 16:46:00'),
(119, 60, 55, 5, 150, '2021-10-13 16:53:00', '2021-10-13 16:53:00'),
(120, 61, 1, 1, 12, '2021-10-19 22:22:03', '2021-10-19 22:22:03'),
(121, 62, 66, 3, 321312, '2021-10-21 01:05:04', '2021-10-21 01:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('testser@mailinator.com', '235306', '2021-05-11 11:56:29'),
('testingbunny@mailinator.com', '834398', '2021-06-28 17:28:38'),
('altafkorejo.cs17@gmail.com', '640810', '2021-07-15 14:37:42'),
('usertwo@gmail.com', 'VJm2vV1mLy9WsIVV0y1ewWLWQWwTmv3gk1o1D46WP9w0jtROvuPkGAJVm5kLUHLE', '2021-09-15 17:12:26'),
('usertwo@gmail.com', 'F6NSu3bTDgvMPap2xnuXekmcSkCEhYp10nxKxlYAb3CdPZ0PSlg35UY3cFvZq829', '2021-09-15 17:14:30'),
('usertwo@gmail.com', 'KGhyBwKcZIY8etxepmDwu4XWJPaUGJYAmy94hgDkG6Jln7jp3n95ILlr1w30b3Jt', '2021-09-15 17:16:59'),
('usertwo@gmail.com', 'wbnyRPP3RgkU1f3mvAcu6kbTm8GhR2ntTd80rkctT0vDDjgsOT2Cm86HH2R3lcLU', '2021-09-15 17:17:24'),
('usertwo@gmail.com', 'XuQMEJERKYJB3U1qBYD95SYYreJMkPw9uhijKc8vjO4BXQzezX3AYNf8KdcLuPpl', '2021-09-15 17:19:25'),
('usertwo@gmail.com', 'DjQG9g9sSVxnW6TR8ZrF6gDZKOh3TxNuEwRjBGtvzfQEUKtoolz7X6mWN4YWWvDJ', '2021-09-15 17:20:10'),
('usertwo@gmail.com', 'cFJ2xyo2U2rOZ2VA8xpn3OEGrDc6tJiHWlmQnv3x7OHR4HF3kmNgA6SIHHcBq5vj', '2021-09-15 17:21:02'),
('muhammad.minhaj@binaryitsolution.com', 'Vdt8M8zTXZbck74qgkBCIh6BQaQOvKTUfxpmL5AAT2i74DCFIzZg7ZUnYbSqzrYG', '2021-09-15 17:21:14'),
('muhammad.minhaj@binaryitsolution.com', 'nRZdsMGyb0izgi5SVHcTaBwHYFXR2GhNK8n2PazABB3js0vbn6YkrMdQmliTirwC', '2021-10-13 13:13:58'),
('muhammad.minhaj@oip.com.pk', 'IIstApXSVXWYokzxJsip4YCp84LXSjnVM8zzNqxVF1H13mlRfNirVPzPwDgr1uiZ', '2021-10-13 13:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(27, 'App\\Models\\User', 21, 'authToken', '42a37658c8bb4a1dd4c206b2da302e9c0e46849337c9eb369397f2f99687d238', '[\"*\"]', NULL, '2021-05-11 12:19:45', '2021-05-11 12:19:45'),
(37, 'App\\Models\\User', 26, 'authToken', '414d28e98c056c2563e57f0a997ae15ba329246a2ee308cec678d264befee2ce', '[\"*\"]', '2021-05-11 18:53:36', '2021-05-11 18:47:40', '2021-05-11 18:53:36'),
(41, 'App\\Models\\User', 29, 'authToken', '1fc3b146e73a6c223e2f2206d8827412b2de323428fe01f89b47a5e02a647bfd', '[\"*\"]', '2021-05-22 00:17:11', '2021-05-11 21:35:20', '2021-05-22 00:17:11'),
(45, 'App\\Models\\User', 23, 'authToken', '579ce85e2ab968e0851e75f09d6e113b16808438768e7f73f0744a7af12958de', '[\"*\"]', '2021-05-12 07:07:34', '2021-05-12 07:07:23', '2021-05-12 07:07:34'),
(50, 'App\\Models\\User', 25, 'authToken', '00fb89b8118782d9d0d71455a3a3c32358b9b9f8cc833d40671e0cdbe1a82656', '[\"*\"]', '2021-06-01 03:47:03', '2021-05-21 02:37:25', '2021-06-01 03:47:03'),
(54, 'App\\Models\\User', 1, 'authToken', '93a3837d05ec9a53e3c184145c5b956a8bc94a21cde1e1966c698c3b265c700c', '[\"*\"]', '2021-05-25 12:23:51', '2021-05-25 12:22:28', '2021-05-25 12:23:51'),
(60, 'App\\Models\\User', 33, 'authToken', '1119f40a171ac7e866ca406a97c61ea36abcfacdea4403e3599018e912fe8cdd', '[\"*\"]', '2021-05-26 17:05:44', '2021-05-26 15:11:32', '2021-05-26 17:05:44'),
(79, 'App\\Models\\User', 34, 'authToken', 'ffc55d1468d2bc9f9771044260c52271810a5ded63a580e367de9a640d41a485', '[\"*\"]', '2021-05-28 18:52:29', '2021-05-28 18:50:32', '2021-05-28 18:52:29'),
(96, 'App\\Models\\User', 48, 'authToken', '7d1439efd201401acdfa625b2ca26fb03c989b3cf7cc850068167ab67fb39aee', '[\"*\"]', '2021-06-28 17:49:09', '2021-06-28 17:36:22', '2021-06-28 17:49:09'),
(118, 'App\\Models\\User', 53, 'authToken', 'ed4c6f0f9718e1b203afab2be269970fcddfae3abf681bef3ddcd0d4a9f88290', '[\"*\"]', '2021-06-30 15:42:44', '2021-06-30 15:36:40', '2021-06-30 15:42:44'),
(121, 'App\\Models\\User', 67, 'authToken', '336d3c4642883e66a0b29310a0e699958462ed2b552cc965ce07fe31bd8d45ee', '[\"*\"]', NULL, '2021-07-07 16:21:12', '2021-07-07 16:21:12'),
(169, 'App\\Models\\User', 63, 'authToken', '53612a6d47784d4ff89bdb74636604dc5f8790b5bc37a1b951b05b4f4dae2df4', '[\"*\"]', '2021-07-13 14:17:23', '2021-07-13 14:13:07', '2021-07-13 14:17:23'),
(186, 'App\\Models\\User', 77, 'authToken', '4a809551a8078f06e07ca56da3f61391fcac85fb4d66844c85ba1d3688816054', '[\"*\"]', '2021-07-13 17:54:26', '2021-07-13 17:52:25', '2021-07-13 17:54:26'),
(187, 'App\\Models\\User', 56, 'authToken', '48586d337a5728c6b620bce406490c93d728334777417d3ef5651c0763d9d6eb', '[\"*\"]', '2021-07-13 17:55:37', '2021-07-13 17:55:22', '2021-07-13 17:55:37'),
(188, 'App\\Models\\User', 78, 'authToken', '74ae45c110a6556b2e8d8ee2797d1a011a726c217b9167ffa3c8e3cd11f17b92', '[\"*\"]', '2021-07-13 18:06:39', '2021-07-13 17:58:25', '2021-07-13 18:06:39'),
(198, 'App\\Models\\User', 70, 'authToken', '5e558f4fb2ee0f34e7357e200d2c9deb2e0a0422e996af402a7d6f12e762bc23', '[\"*\"]', '2021-07-14 14:30:39', '2021-07-13 18:21:33', '2021-07-14 14:30:39'),
(209, 'App\\Models\\User', 82, 'authToken', '27c1105c5c0aaad9de6eef41f368b63c11675f80217791081fa95a3cfbfdc5a6', '[\"*\"]', NULL, '2021-07-16 03:51:21', '2021-07-16 03:51:21'),
(214, 'App\\Models\\User', 27, 'authToken', '3bc9a57ac59ec811b31c5b8d844a38a7b4b512076b2cc878636bf4fd6863c9d9', '[\"*\"]', '2021-07-16 04:57:21', '2021-07-16 04:56:51', '2021-07-16 04:57:21'),
(229, 'App\\Models\\User', 90, 'authToken', '5479272f9c4e796bd76b49bdccbbaa1c0a95238470899bfa10933f6a8fcef829', '[\"*\"]', NULL, '2021-08-12 16:22:49', '2021-08-12 16:22:49'),
(230, 'App\\Models\\User', 20, 'authToken', '6fbfbb3c369a06d2c7bd2621cd825093ff01c77f097392970aa7dc9fe598af64', '[\"*\"]', '2021-08-18 15:33:43', '2021-08-18 15:12:37', '2021-08-18 15:33:43'),
(231, 'App\\Models\\User', 39, 'authToken', 'f1362ef92f3c27146d57da69c51c8d86b574d0d77d50aeba720d15d19a2d4435', '[\"*\"]', '2021-08-23 17:36:49', '2021-08-23 14:49:01', '2021-08-23 17:36:49'),
(245, 'App\\Models\\User', 108, 'authToken', '87fcf73eea30f10305a3a94b093d32e7a81bf0c9a98dd8c4085a8c87df0d0011', '[\"*\"]', '2021-10-13 16:19:31', '2021-10-13 16:18:29', '2021-10-13 16:19:31'),
(277, 'App\\Models\\User', 36, 'authToken', 'cb241812407c8576dd78f370ee4b23a4f059592d3eccdf3d3882c24e1bf272eb', '[\"*\"]', '2021-10-17 21:52:41', '2021-10-16 19:37:22', '2021-10-17 21:52:41'),
(279, 'App\\Models\\User', 103, 'authToken', '48329d20d5f98f679b64e1f64a52e1253bfabb723105fd2ef66c4556908f20f6', '[\"*\"]', '2021-10-18 15:36:11', '2021-10-18 12:24:15', '2021-10-18 15:36:11'),
(284, 'App\\Models\\User', 124, 'authToken', '05048ca75af0b1a365f3e9b9f429794ab0a816e4a05ef06c6b864edd4ed713a9', '[\"*\"]', '2021-10-19 20:43:54', '2021-10-19 20:38:49', '2021-10-19 20:43:54'),
(286, 'App\\Models\\User', 125, 'authToken', 'c28e56dc4dcdb8ab319c708cc15f5306dbe0cdff393ed8027b264cb138430591', '[\"*\"]', '2021-10-19 22:24:32', '2021-10-19 21:03:26', '2021-10-19 22:24:32'),
(292, 'App\\Models\\User', 81, 'authToken', '1b2df2625fc9bb001330e4215dfce30e8a7fd025cab34dac4fd551639283a47e', '[\"*\"]', '2021-10-21 00:12:30', '2021-10-20 12:50:54', '2021-10-21 00:12:30'),
(296, 'App\\Models\\User', 111, 'authToken', 'ed3e15b5cdd296cdb78051e41cae16cf7d76911daa87325a774945f95ac02813', '[\"*\"]', '2021-10-20 18:05:38', '2021-10-20 17:03:31', '2021-10-20 18:05:38'),
(298, 'App\\Models\\User', 43, 'authToken', 'fdcca8d5f56b0b7be96a7a3645137955ab256e9d4163be64c8b847d2e591e922', '[\"*\"]', '2021-10-22 00:29:00', '2021-10-21 00:09:19', '2021-10-22 00:29:00'),
(299, 'App\\Models\\User', 121, 'authToken', '6f1f09a63a828cf8750e1efc299c116eb298c94879fcce2f59e0ad433411e5eb', '[\"*\"]', '2021-10-23 04:43:41', '2021-10-23 04:30:53', '2021-10-23 04:43:41'),
(301, 'App\\Models\\User', 138, 'authToken', 'de3c839e8d683fccdef83d3a0b8fe491a5f165d133f7febe613e3997b6153a59', '[\"*\"]', '2021-10-26 03:45:07', '2021-10-26 03:44:49', '2021-10-26 03:45:07');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `price` varchar(191) DEFAULT NULL,
  `picture` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `cat_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `restaurant_id`, `type`, `name`, `price`, `picture`, `created_at`, `updated_at`, `cat_id`, `description`) VALUES
(1, 1, 'drinks', 'NIKKI BEACH’S SEAFOOD CHOWDER (S)(G)', '12', 'IMG-20210504-WA0005.jpg', '2021-10-20 13:55:32', '2021-10-08 11:22:28', 1, 'dasda                 Manhattan-style soup | fresh fish | shellfish l crostini'),
(2, 1, 'drinks', 'ARTISAN BRUSCHETTA (G)(V)(D)s', '13', '0 fWEFhRV6Nludifrl.png', '2021-10-20 13:55:32', '2021-10-08 13:35:21', 1, 'Farm tomatoes | onions | garlic | basil | extra virgin olive oil | arugula |\r\ntoasted focaccia | shaved Parmesan cheese'),
(3, 5, 'drinks', 'WORLD FAMOUS NIKKI BEACH MOJITO', '10', '2.jpg', '2021-10-20 13:55:32', '2021-05-11 02:05:45', 12, 'Flavors: Classic, Strawberry, Mango and Coconut'),
(4, 1, 'drinks', 'CAIPIRINHA', '10', '2.jpg', '2021-10-20 13:55:32', '2021-10-13 12:49:10', 7, 'CAIPIRINHA'),
(5, 1, 'drinks', 'Frose 12', '10', 'frose12.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 13, 'Rose wine, Vodka, blended Organic Berries'),
(6, 1, 'drinks', 'Pina Colada 13', '10', 'pina.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 13, 'Rum, Pineapple Juice, Creme de coconut'),
(7, 1, 'drinks', 'Aperol Sprtiz 12', '10', 'aperol.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 14, 'Aperol, Sparkling Wine'),
(8, 1, 'drinks', 'Herbal Sprtiz 12', '10', 'herbal.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 14, 'Belvedere vodka, Aperol, Rosemary, Orange Slice, Tonic, Lemon Lime Spritz'),
(9, 1, 'drinks', 'Miami Beach Chicken Caesar Salad', '10', 'caesersalad.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 2, 'Chicken, Baby gem leaves, Nikki beach\'s signature, Rustic croutons, Parmesan cheese'),
(10, 1, 'drinks', 'Nikki Beach\'s Salad (D) 17', '10', 'nikkisalad.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 2, 'Cured smoked salmon, mixed green, cantaloupe melon, part wine figs, black olives, parmesan cheese'),
(11, 1, 'drinks', 'Saint Tropez Rossini 15', '10', 'champ1.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 15, 'Champagne, fresh muddled strawberries, sugar, on ice'),
(12, 1, 'drinks', 'Marbella Sangria Carafe 35', '10', 'champ2.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 15, 'Your choice of red, white, rose'),
(14, NULL, 'drinks', 'The Energizer 7.95', '10', 'DSADAS.jpg', '2021-10-20 13:55:32', '2021-10-12 14:20:49', 1, 'Grapefruit, apple, ginger'),
(15, 1, 'drinks', 'Virgin Mojito 10', '10', 'mock1.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 17, 'Lemonade, muddled lines, sugar, fresh mint, tapped off with Sierra Mist, Mango, Coconut'),
(16, 1, 'drinks', 'Virgin Cucumber Mint Spritz 10', '10', 'mock2.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 17, 'Sparkling lemonade, muddled cucumber, mint'),
(17, 1, 'drinks', 'Latte', '10', 'latte.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 18, ''),
(18, 1, 'drinks', 'Espresso', '10', 'espresso.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 18, ''),
(19, 1, 'drinks', 'Pepsi', '10', 'pepsi.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 19, ''),
(20, 1, 'drinks', 'Red Bull', '10', 'rbull.jpg', '2021-10-20 13:55:32', '2021-10-12 10:11:55', 1, 'hhghg'),
(21, 1, 'drinks', 'Tuna Tostada', '10', 'tuna.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 3, 'Tuna, wonton chips, jalapeno, spicy mayo, sesame seeds, fresno peppers'),
(22, 1, 'drinks', 'Hawaiian Tuna Poke', '10', 'tuna2.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 3, 'Tune, avocado, seaweed, macadamia nuts, sesame seeds, ginger, shaved coconut, poke dressing'),
(23, 1, 'drinks', 'Porto Heli Greek Platter', '10', 'platter1.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 4, 'Naan bread, hummus, falafel, baba ganoush, mixed olives, feta cheese, assorted vegetables'),
(24, 1, 'drinks', 'Miami Beach Platter', '10', 'platter2.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 4, 'Key west conch fritters, calamari fritto, artisan bruschetta, angus beef sliders'),
(25, 1, 'drinks', 'Angus Beef Sliders', '10', 'main1.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 5, 'Angus beef, mini brioche buns, cheddar cheese, garden leaves, rustic fries, pickles'),
(26, 1, 'drinks', 'Steak Frites', '10', 'main2.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 5, 'Skirt steak, cured peppers, chimichurri sauce, seasoned fries'),
(27, 1, 'drinks', 'Fresh Fries', '10', 'fries.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 6, ''),
(28, 1, 'drinks', 'Garden Salad', '10', 'gsalad.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 6, ''),
(29, 1, 'drinks', 'Margherita (G)(V)(D) 15', '10', 'pizza1.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 7, 'Mozzarella cheese, farm tomato sauce, basil'),
(30, 1, 'drinks', 'Pepperoni(G)(D) 16', '10', 'pizza2.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 7, 'Pepperoni, mozzarella cheese, farm tomato sauce'),
(31, 1, 'drinks', 'Steamed Edamame', '10', 'sushi1.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 8, 'Malden sea salt, togarashi seasoning'),
(32, 1, 'drinks', 'Asian Wakame Salad', '10', 'sushi2.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 8, 'Japanese cold seaweed salad'),
(33, 1, 'drinks', 'Nikki Beach\'s Sushi Dragon', '10', 'splatter1.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 9, 'Ibiza Rainbow Roll, Saint Barth Salmon Roll, 6 Nigiri, 6 Sashimi, Asian Wakame Salad'),
(34, 1, 'drinks', 'Hamachi Roll', '10', 'sroll1.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 10, 'Yellowtail, hamachi, avocado, wasabi, smoked oshinko, chives, Himalayan salt'),
(35, 1, 'drinks', 'Crispy Spider roll', '10', 'sroll2.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 10, 'Soft shell crab, asparagus, avocado, masaga'),
(36, 1, 'drinks', 'Ice Cream 9', '10', 'dessert1.jpg', '2021-10-20 13:55:32', '2021-05-11 08:21:31', 11, 'Vanilla, chocolate, strawberry'),
(37, 1, 'drinks', 'Sorbet 9', '10', 'dessert2.jpg', '2021-10-20 13:55:32', '2021-10-11 13:32:58', 1, 'Mango, Lime, Raspberry'),
(38, 0, 'drinks', 'testdd', '22', 'ff87a988-7715-4868-8e1d-07bd9469c826.jpg', '2021-10-20 13:55:32', '2021-06-30 15:01:25', 11, 'test'),
(39, 1, 'drinks', 'test', '22', 'web-development-e1444737604137.jpg', '2021-10-20 13:55:32', '2021-07-02 09:00:45', 18, 'test'),
(40, NULL, 'drinks', 'testdasda', '22', 'image_2021_05_24T19_13_17_591Z.png', '2021-10-20 13:55:32', '2021-09-20 14:21:10', 1, 'test'),
(41, 4, 'drinks', 'tesdasda', '33', 'Packaging3.png', '2021-10-20 13:55:32', '2021-09-27 15:15:03', 1, 'test'),
(42, 0, 'drinks', 'test', '12', 'photos3.png', '2021-10-20 13:55:32', '2021-07-07 16:23:24', 18, 'test'),
(43, 4, 'drinks', 'test', '22', 'photos3.png', '2021-10-20 13:55:32', '2021-10-01 23:39:29', 1, 'test'),
(44, 4, 'drinks', 'test', '12', 'photos3.png', '2021-10-20 13:55:32', '2021-07-07 18:41:46', 9, 'test'),
(45, 5, 'drinks', 'test', '12', 'waveplay.jpg', '2021-10-20 13:55:32', '2021-07-07 19:24:07', 1, 'test'),
(46, 5, 'drinks', 'New Product', '22', 'waveplay.jpg', '2021-10-20 13:55:32', '2021-07-07 19:34:38', 7, 'test'),
(47, NULL, 'drinks', 'Drinkdasd', '10', 'aboutus2.png', '2021-10-20 13:55:32', '2021-10-13 18:10:02', 1, 'tres'),
(48, 0, 'drinks', 'dasdsa', '22', '5fnmwej4taa-helloquence-3-1024x683-1024x585.jpg', '2021-10-20 13:55:32', '2021-08-12 16:12:03', 1, 'dasda'),
(52, NULL, 'drinks', 'soft drink', '150', 'img8.jpg', '2021-10-20 13:55:32', '2021-09-27 08:20:24', 3, 'Soft drink, any of a class of nonalcoholic beverages, usually but not necessarily carbonated, normally containing a natural or artificial sweetening agent, edible acids, natural or artificial flavours, and sometimes juice. Natural flavours are derived from fruits, nuts, berries, roots, herbs, and other plant sources.'),
(53, NULL, 'drinks', 'drinks', '100', 'img7.jpg', '2021-10-20 13:55:32', '2021-09-27 08:24:48', 3, 'Soft drink, any of a class of nonalcoholic beverages, usually but not necessarily carbonated, normally containing a natural or artificial sweetening agent, edible acids, natural or artificial flavours, and sometimes juice. Natural flavours are derived from fruits, nuts, berries, roots, herbs, and other plant sources.'),
(54, 4, 'drinks', 'burger + Drink', '490', 'img8.jpg', '2021-10-20 13:55:32', '2021-09-28 08:43:34', 5, 'Zinger burger is a kind of chicken burger sold by KFC that comes with a extra crunchy patty made of chicken breast or thigh'),
(55, 13, 'drinks', 'Dom Perignon', '150', 'great.jpg', '2021-10-20 13:55:32', '2021-10-13 17:36:40', 1, 'Dom Perignon'),
(56, 9, 'drinks', 'abcproduct', '470', 'image_2021_10_04T12_57_31_130Z.png', '2021-10-20 13:55:32', '2021-10-12 10:32:19', 7, 'ewr'),
(57, 8, 'drinks', 'qqqqqqqqqqqq', 'qqqqqqqqqq', 'car_app_debug.apk', '2021-10-20 13:55:32', '2021-10-12 10:18:55', 2, 'qqqqqqqqqqqqqqqqqq'),
(58, 8, 'drinks', 'qqqqqqqqqqqq', 'qqqqqqqqqq', 'car_app_debug.apk', '2021-10-20 13:55:32', '2021-10-12 10:20:58', 2, 'qqqqqqqqqqqqqqqqqq'),
(64, 13, 'drinks', 'Fish', '30', '04 (1).png', '2021-10-20 13:55:32', '2021-10-14 05:57:53', 5, 'Steamed fish'),
(65, 13, 'drinks', 'Steak', '50', '04 (1).png', '2021-10-20 13:55:32', '2021-10-14 06:12:54', 5, 'Grilled Steak'),
(66, 30, NULL, 'dasdas', '321312', '', '2021-10-20 18:20:24', '2021-10-20 18:20:24', 1, 'dasdasda');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `lat` varchar(191) DEFAULT NULL,
  `long` varchar(191) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `address`, `lat`, `long`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dine & Drink', 'Miami Beach, FL, USA11', '24.86232882', '67.069948181', 1, '2021-05-11 01:39:26', '2021-10-14 11:02:43'),
(3, 'Shaheen Shinwari', 'test', '24.8623288', '67.0699488', 0, '2021-07-02 10:04:51', '2021-10-26 21:01:46'),
(4, 'Dua Restaurant', 'Karachi', '24.8623288', '67.0699488', 1, '2021-07-02 11:00:59', '2021-10-13 12:16:54'),
(8, 'atom bun', 'ABC road karachi', '24.352', '67.356', 0, '2021-09-24 15:34:46', '2021-10-14 11:36:58'),
(9, 'atom bun1', 'Saddar Main Bus Stop', '24.8659° N', '67.0294° E', 0, '2021-09-27 09:06:12', '2021-10-13 15:35:07'),
(13, 'Atom Bar', 'Tower Bus Stop', '24.8479° N', '66.9954° E', 1, '2021-10-07 05:37:27', '2021-10-14 11:03:43'),
(20, 'dasdas', 'dsadsa', '21321', '321312', 1, '2021-10-13 12:56:22', '2021-10-13 12:56:22'),
(21, 'dasda', 'tower', '24.8479° N', '66.9954° E', 0, '2021-10-13 13:00:53', '2021-10-14 11:43:31'),
(24, 'DivaldoBar', 'a-12', '43145', '12345', 0, '2021-10-18 21:20:01', '2021-10-19 01:54:41'),
(25, 'Juice island', 'Haryani Square, Building No 21-C, Bukhari Commercial Lane-10, Phase-VI, DHA, Karachi', '24.860735', '67.001137', 1, '2021-10-19 01:54:19', '2021-10-19 20:11:38'),
(26, 'Chai hub', 'Bukhari commercial', '49.207481', '12.405380', 1, '2021-10-19 20:08:14', '2021-10-19 20:08:14'),
(27, 'ARK', 'DHA', '24.8004719', '67.0573971', 1, '2021-10-19 21:38:38', '2021-10-19 21:38:38'),
(28, 'Bites Crunch Owner', 'Bites Crunch Owner', '24.8004717', '67.0573967', 1, '2021-10-20 11:08:44', '2021-10-20 11:08:44'),
(29, 'My Free', 'DHA', '33.22', '332.22', 1, '2021-10-20 11:20:16', '2021-10-20 11:20:16'),
(30, 'Altaf Hussain Korejo Juice Centre', 'St 12, Jersey City', '24.8004717° N', '67.0573967° E', 1, '2021-10-20 12:48:43', '2021-10-21 00:16:54'),
(31, 'THE SOCIAL HUB', 'Plot # 22-C Lane 11 Bara, Lane 11, Bukhari Commercial Area Phase 6 Defence Housing Authority, Karachi, Karachi City,', '24.792572', '67.064508', 1, '2021-10-20 23:24:03', '2021-10-20 23:24:03'),
(32, 'BALOCH SAJJI', 'Johar Mor Rd Service Ln, Block 17 Gulistan-e-Johar, Karachi, Karachi City, Sindh, Pakistan', '24.908223', '67.119314', 1, '2021-10-20 23:29:11', '2021-10-20 23:29:11'),
(33, 'prince Altaf Charming', 'Hilltop Lawn Rd, Block 20 Block 16 A Gulistan-e-Johar, Karachi, Karachi City, Sindh, Pakistan', '24.908109', '67.119068', 1, '2021-10-21 00:20:14', '2021-10-21 00:20:14'),
(34, 'Bristol', 'test', '25.93243792', '68.5246425', 1, '2021-10-26 21:02:12', '2021-10-26 21:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_pictures`
--

CREATE TABLE `restaurant_pictures` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `picture` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_pictures`
--

INSERT INTO `restaurant_pictures` (`id`, `restaurant_id`, `picture`, `created_at`, `updated_at`) VALUES
(1, 1, '1.jpg', '2021-05-11 01:41:13', '2021-05-11 01:41:13'),
(2, 1, '2.jpg', '2021-05-11 01:41:13', '2021-05-11 01:41:13'),
(5, NULL, '1625223683778raw.png', '2021-07-02 15:02:51', '2021-07-02 15:02:51'),
(6, NULL, '1625223774470removebg.png', '2021-07-02 15:04:21', '2021-07-02 15:04:21'),
(7, 3, '1625223896339models.png', '2021-07-02 15:06:22', '2021-07-02 15:06:22'),
(8, 3, '1625223896338Looking the buiness.jpg', '2021-07-02 15:06:22', '2021-07-02 15:06:22'),
(9, 3, '1625223896340Open-Email-for-blog-iStock-860007412.jpg', '2021-07-02 15:06:23', '2021-07-02 15:06:23'),
(10, 3, '1625223925091photoshopit.png', '2021-07-02 15:06:52', '2021-07-02 15:06:52'),
(11, 3, '1625223926953photos.png', '2021-07-02 15:06:52', '2021-07-02 15:06:52'),
(12, 4, '1625223959001photo_featured.png', '2021-07-02 15:07:25', '2021-07-02 15:07:25'),
(13, 4, '1625223959003photos.png', '2021-07-02 15:07:25', '2021-07-02 15:07:25'),
(14, 4, '1625223959003photoshopit.png', '2021-07-02 15:07:27', '2021-07-02 15:07:27'),
(15, 4, '1625224057914simple.png', '2021-07-02 15:09:07', '2021-07-02 15:09:07'),
(16, 4, '1625224646107raw.png', '2021-07-02 15:18:53', '2021-07-02 15:18:53'),
(17, 4, '1625224681777howtovideo2.png', '2021-07-02 15:19:29', '2021-07-02 15:19:29'),
(18, 4, '1625224681775gif.png', '2021-07-02 15:19:29', '2021-07-02 15:19:29'),
(27, 1, '1625663356830texturedsurface.jpg', '2021-07-07 17:10:39', '2021-07-07 17:10:39'),
(28, 1, '1625663356831waveplay.jpg', '2021-07-07 17:10:40', '2021-07-07 17:10:40'),
(29, 1, '1625671277168propshopping.jpg', '2021-07-07 19:22:39', '2021-07-07 19:22:39'),
(32, 1, '1625671789221new_image_show.jpg', '2021-07-07 19:31:11', '2021-07-07 19:31:11'),
(34, 1, '1625671789224propshopping.jpg', '2021-07-07 19:31:12', '2021-07-07 19:31:12'),
(36, 1, '1632718733020img3.jpg', '2021-09-27 09:00:04', '2021-09-27 09:00:04'),
(37, 8, '1632721425289img1.jpg', '2021-09-27 09:44:57', '2021-09-27 09:44:57'),
(38, 8, '1632722208401img2.jpg', '2021-09-27 09:58:03', '2021-09-27 09:58:03'),
(39, 8, '1632722565397img7.jpg', '2021-09-27 10:03:57', '2021-09-27 10:03:57'),
(40, 4, '1632995614146meeting_church.jpg', '2021-09-30 13:54:46', '2021-09-30 13:54:46'),
(42, 1, '1633953065386image_2021_10_04T12_57_31_130Z.png', '2021-10-11 15:52:15', '2021-10-11 15:52:15'),
(43, 1, '1634038140048image_2021_10_05T07_40_13_805Z.png', '2021-10-12 15:30:12', '2021-10-12 15:30:12'),
(45, 3, '1634104068720web-development-e1444737604137.jpg', '2021-10-13 09:47:50', '2021-10-13 09:47:50'),
(46, 3, '1634104090704test.png', '2021-10-13 09:48:12', '2021-10-13 09:48:12'),
(48, 3, '1634110125064hola1.png', '2021-10-13 11:28:47', '2021-10-13 11:28:47'),
(49, 9, '1634124717875outsourceinpakistan-com-1024x768desktop-5b597b.jpg', '2021-10-13 15:32:57', '2021-10-13 15:32:57'),
(51, 9, '1634124845373hola1.png', '2021-10-13 15:35:05', '2021-10-13 15:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_tables`
--

CREATE TABLE `restaurant_tables` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `table_name` varchar(191) DEFAULT NULL,
  `seating_capacity` int(191) DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_tables`
--

INSERT INTO `restaurant_tables` (`id`, `restaurant_id`, `table_name`, `seating_capacity`, `price`, `description`, `picture`, `status`, `created_at`, `updated_at`) VALUES
(21, 1, 'My Table', 5, 33, 'My Table', 'callBlockSpace.png', '1', '2021-10-13 16:19:15', '2021-10-13 17:12:47'),
(22, 1, 'New Table Dine & Drink', 22, 33, 'New Table Dine & Drink', 'outsourceinpakistan-com-1024x768desktop-5b597b.jpg', '2', '2021-10-13 16:20:05', '2021-10-14 11:28:49'),
(23, 13, 'dasda', 2, 321312, 'dsadas', 'outsourceinpakistan-com-1024x768desktop-5b597b.jpg', '1', '2021-10-13 17:27:57', '2021-10-13 17:39:36'),
(24, 13, 'dasdsa', 22, 3213, 'dasdas', 'outsourceinpakistan-com-1024x768desktop-5b597b.jpg', NULL, '2021-10-13 17:38:54', '2021-10-13 17:38:54'),
(25, 13, 'dasda', 23, 322, 'dasda', '', NULL, '2021-10-13 17:38:59', '2021-10-13 17:38:59'),
(26, 30, 'test', 213, 231, 'test', '5fnmwej4taa-helloquence-3-1024x683-1024x585.jpg', NULL, '2021-10-20 18:24:19', '2021-10-20 18:24:19'),
(27, 30, 'test', 213, 231, 'test', '5fnmwej4taa-helloquence-3-1024x683-1024x585.jpg', NULL, '2021-10-20 18:24:21', '2021-10-20 18:24:21'),
(28, 30, 'dasd', 3, 322, 'dasdas', NULL, '2', '2021-10-20 18:24:34', '2021-10-20 18:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `name`, `permission`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'admin', 'Master Admin', '[\"createUser\",\"updateUser\",\"viewUser\",\"deleteUser\",\"createRole\",\"updateRole\",\"viewRole\",\"deleteRole\",\"createAff\",\"updateAff\",\"viewAff\",\"deleteAff\",\"createRefferal\",\"updateRefferal\",\"viewRefferal\",\"deleteRefferal\",\"updateHome\",\"createWeoffer\",\"updateWeoffer\",\"viewWeoffer\",\"deleteWeoffer\",\"updateAbout\",\"createService\",\"updateService\",\"viewService\",\"deleteService\",\"updateSetting\",\"updateProfile\",\"createContact\",\"updateContact\",\"viewContact\",\"deleteContact\"]', 1, '2020-08-06 18:31:42', '2020-09-03 10:00:19', 1, NULL),
(3, 'user', 'User', '[\"createUser\",\"updateUser\",\"viewUser\",\"deleteUser\",\"createRole\",\"updateRole\",\"viewRole\",\"deleteRole\",\"createAff\",\"updateAff\",\"viewAff\",\"deleteAff\",\"createRefferal\",\"updateRefferal\",\"viewRefferal\",\"deleteRefferal\",\"updateHome\",\"createWeoffer\",\"updateWeoffer\",\"viewWeoffer\",\"deleteWeoffer\",\"updateAbout\",\"createService\",\"updateService\",\"viewService\",\"deleteService\",\"updateSetting\",\"updateProfile\",\"createContact\",\"updateContact\",\"viewContact\",\"deleteContact\"]', 1, NULL, '2020-09-11 21:45:58', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `table_reservations`
--

CREATE TABLE `table_reservations` (
  `id` int(11) NOT NULL,
  `table_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `time_from` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `time_to` timestamp NULL DEFAULT NULL,
  `status` varchar(150) DEFAULT NULL,
  `price` double DEFAULT 0,
  `card_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_reservations`
--

INSERT INTO `table_reservations` (`id`, `table_id`, `user_id`, `time_from`, `time_to`, `status`, `price`, `card_id`, `created_at`, `updated_at`) VALUES
(30, 23, 103, '2021-10-14 11:33:43', '2021-10-14 16:00:00', 'confirmed', 321312, 29, '2021-10-14 11:54:21', '2021-10-14 15:33:43'),
(31, 23, 103, '2021-10-14 16:07:00', '2021-10-14 17:07:00', 'un_confirmed', 321312, 29, '2021-10-14 13:11:26', '2021-10-14 13:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `types_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `types_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `types_name`, `types_status`) VALUES
(1, 'bites', '1'),
(2, 'drinks', '1'),
(3, 'bottleservice', '1');

-- --------------------------------------------------------

--
-- Table structure for table `update_deal_alert`
--

CREATE TABLE `update_deal_alert` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deal_alert_id` int(11) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `update_deal_alert`
--

INSERT INTO `update_deal_alert` (`id`, `user_id`, `deal_alert_id`, `is_read`) VALUES
(1, 81, 1, 1),
(2, 81, 5, 1),
(3, 81, 2, 1),
(4, 81, 3, 1),
(5, 1, 6, 1),
(6, 1, 7, 1),
(7, 23, 9, 1),
(8, 25, 9, 1),
(9, 27, 9, 1),
(10, 23, 10, 1),
(11, 24, 10, 1),
(12, 26, 10, 1),
(13, 23, 11, 1),
(14, 24, 11, 1),
(15, 25, 11, 1),
(16, 26, 11, 1),
(17, 82, 11, 1),
(18, 23, 12, 1),
(19, 24, 12, 1),
(20, 25, 12, 1),
(21, 108, 13, 1),
(22, 25, 14, 1),
(23, 27, 14, 1),
(24, 103, 14, 1),
(25, 24, 15, 1),
(26, 103, 16, 1),
(27, 103, 17, 1),
(28, 81, 18, 1),
(29, 114, 18, 1),
(30, 81, 19, 1),
(31, 114, 19, 1),
(32, 81, 20, 1),
(33, 114, 20, 1),
(34, 81, 21, 1),
(35, 114, 21, 1),
(36, 81, 22, 1),
(37, 114, 22, 1),
(38, 103, 23, 1),
(39, 36, 24, 1),
(40, 114, 24, 1),
(41, 36, 25, 1),
(42, 114, 25, 1),
(43, 36, 26, 1),
(44, 81, 26, 1),
(45, 114, 26, 1),
(46, 103, 27, 1),
(47, 103, 28, 1),
(48, 114, 28, 1),
(49, 103, 29, 1),
(50, 103, 30, 1),
(51, 103, 31, 1),
(52, 103, 32, 1),
(53, 81, 33, 1),
(54, 114, 34, 1),
(55, 81, 35, 1),
(56, 81, 36, 1),
(57, 114, 36, 0),
(58, 103, 37, 1),
(59, 103, 38, 1),
(60, 103, 39, 1),
(61, 103, 40, 1),
(62, 103, 41, 1),
(63, 123, 42, 1),
(64, 29, 43, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_profile_complete` tinyint(1) NOT NULL DEFAULT 0,
  `account_verified` tinyint(1) NOT NULL DEFAULT 0,
  `account_status` enum('active','suspended') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_social` tinyint(1) NOT NULL DEFAULT 0,
  `social_type` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_token` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('user','admin','waiter','manager') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lat` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_range` double DEFAULT NULL,
  `stripe_cus_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restaurant_id` int(11) NOT NULL DEFAULT 0,
  `notification_token` longtext COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `otp`, `profile_picture`, `is_profile_complete`, `account_verified`, `account_status`, `is_social`, `social_type`, `social_token`, `device_type`, `device_token`, `role`, `created_at`, `updated_at`, `lat`, `long`, `location_range`, `stripe_cus_id`, `deleted_at`, `restaurant_id`, `notification_token`) VALUES
(1, NULL, 'devuser@getnada.com', '2021-05-11 00:00:00', '$2y$10$oztkHx0CfAEkE6vEJ57nzOHZVUVIjC.0NkHEz1Jn1KbYRSDd061Fe', NULL, '1620695189.png', 1, 1, 'active', 0, NULL, NULL, 'ios', '3424234324', 'user', '2021-05-11 00:00:00', '2021-10-08 15:54:25', '25.790654', '-80.1300455', 10.8952318, 'cus_JSnIPGsVBZDFJv', NULL, 12, ''),
(3, 'Dev Appsnado', NULL, '2021-05-11 05:39:18', NULL, NULL, '1620712013.png', 1, 1, 'suspended', 1, NULL, NULL, NULL, NULL, 'user', '2021-05-11 05:39:18', '2021-10-19 20:09:09', '24.9454162', '67.0561538', 1, 'cus_JY4HTASsx0sLOT', NULL, 25, ''),
(4, 'Changes', NULL, NULL, NULL, NULL, NULL, 0, 1, 'suspended', 1, NULL, NULL, NULL, NULL, 'user', '2021-05-11 06:58:48', '2021-09-27 09:40:31', '37.4219815', '-122.0840215', 1, 'cus_JSl7GKZaifcpov', '2021-05-11 09:07:34', 11, ''),
(5, 'Dev Appsnadoghhj', 'dev.appsnado@gmail.com', '2021-05-11 07:53:41', NULL, NULL, NULL, 0, 1, 'suspended', 1, NULL, NULL, NULL, NULL, 'user', '2021-05-11 07:53:41', '2021-10-08 10:34:13', '24.8620575', '67.0708949', 1, NULL, '2021-05-11 08:01:28', 14, ''),
(6, 'Dev Appsnado', 'dev.appsnado@gmail.com', '2021-05-11 08:01:41', NULL, NULL, NULL, 0, 1, 'suspended', 1, NULL, NULL, NULL, NULL, 'user', '2021-05-11 08:01:41', '2021-10-08 10:34:15', '25.811770076419467', '-80.13087441130274', 1, 'cus_JSm7bjDgSVenHU', '2021-06-17 11:45:49', 15, ''),
(7, 'Test User', NULL, NULL, NULL, NULL, NULL, 0, 1, 'suspended', 1, NULL, NULL, NULL, NULL, 'user', '2021-05-11 09:08:02', '2021-10-08 10:34:37', '25.790654', '-80.1300455', 1, 'cus_JSnKVu67WxAjhf', '2021-05-11 09:44:31', 16, ''),
(8, 'Test User', NULL, NULL, NULL, NULL, NULL, 0, 1, 'active', 1, NULL, NULL, NULL, NULL, 'user', '2021-05-11 09:46:13', '2021-10-08 10:38:59', '41.49932', '-81.6943605', 6.791414799999999, 'cus_JSsSpPgvvLpu6f', '2021-06-18 10:50:37', 17, ''),
(20, 'Ahsan Ali', 'ahsanavialdosolutions@gmail.com', '2021-05-11 11:50:36', NULL, NULL, '1620733881.png', 1, 1, 'active', 1, NULL, NULL, 'ios', 'd6-1ezPwrEmSiSJE5ZU9Sb:APA91bGvu0rMfLxNGtGV0XbgSjYV-gOfBuOEajy7eKj9oBAHdnTI07h5elUefgsAwW-UuOkcWgTwZjdpm_FMXQNKYezwE-xhQPHlkvhGbWny219H_GcH9O_KouSDCbLZ1402K6V4CY_t', 'user', '2021-05-11 11:50:36', '2021-10-11 15:32:29', '24.8607343', '67.00113640000001', 16.0934, 'cus_JbrMUDfMUUdUT3', NULL, 18, ''),
(23, 'test', 'pakistanibrain@mailinator.com', '2021-05-11 13:46:32', '$2y$10$0yesWWZvMcGV2D/CRGgGau/kkJ6VfS/UwQ/5Dsqr6M91O9380p.w6', NULL, '1620740829.png', 1, 1, 'active', 0, NULL, NULL, 'android', 'fmq89qUQRd2Zgzm9zoP7Ji:APA91bEXdwEPhvAX9inr4QpAmtLd01Hmo83GwmWGEXKVlSeB_I1fyxsPy_YbQXZFhwOWmfXCM2HUIKOyTYJR7rW2JC9wrFKdP76cRza5hPb9u76ldV4Pu_LQI6Lc-p7fje04zhcjB1Q4', 'user', '2021-05-11 13:45:35', '2021-10-13 12:56:22', '37.4219983', '-122.084', 6.8557884, NULL, NULL, 20, ''),
(24, 'Chicago Vibes', 'pakistanibrainone@mailinator.com', '2021-05-11 13:49:00', '$2y$10$ZqZ89.etNY04aUJX9CQhv.F0B0KgyEwNO3CbBEO2XsHFZJ4LyQZaq', NULL, '1620741029.png', 1, 1, 'active', 0, NULL, NULL, NULL, NULL, 'user', '2021-05-11 13:48:26', '2021-10-13 13:00:53', '37.4219983', '-122.084', 1, 'cus_JSrmgKCBbBWJG1', NULL, 21, ''),
(25, 'Divaldo Cristovao', 'divaldocristovao@hotmail.com', '2021-05-11 18:37:04', '$2y$10$OykK9HK3c0i/j/8bZy4oP.gn2LjotFnKmFBjRlRGbQ3E.4nVLEOxC', NULL, '1620758254.png', 1, 1, 'active', 0, NULL, NULL, 'ios', 'eVAbxzLLAkuRtMgQRr4UAa:APA91bG_Hb7UbUGLUK8ovvcO-6kLOmCP1QIZKXPCcYvLlGCXE-1TY6B5w9eBJ1-sBZ5qNd60SRx-HNnYAm8Fq2gOxy0CTy2vZ7fBYWFkF9stwjrT8QiMGhRjgYonqp7sktkKwWQXZ2q-', 'user', '2021-05-11 18:37:00', '2021-10-13 13:01:35', '25.803686157724723', '-80.19151258467201', 16.0934, NULL, NULL, 22, ''),
(26, 'Umer Ali', 'umer@outsourceinpakistan.com', '2021-05-11 18:47:40', NULL, NULL, '1620758895.png', 1, 1, 'active', 1, NULL, NULL, 'android', 'dzXSExdnTNyJ8UU6bK2vB6:APA91bGYgTFAHw_3YifGmrxWulekofTQV9GxFE0eddyTeWVTQPi6wJ5USK8AAYeyOb-2-YtlrPyEH0jZTFaHmgPPokFPMFr4l0fk7JOo3sFY6KHniA9Dx-2Iau3wrLsvSEVydPnXHCfi', 'user', '2021-05-11 18:47:40', '2021-10-13 15:36:49', '25.8042441', '-80.1989186', 1, NULL, NULL, 23, ''),
(27, 'Rizwan Sikander', 'rizwan.sikandar@binaryitsolution.com', '2021-05-11 18:55:12', NULL, NULL, '1620759376.png', 1, 1, 'active', 1, NULL, NULL, 'android', 'cszXcYMkQb2-ChmnoIzck1:APA91bHcug-HhZBgjHLM0OmlCRY-8s_3QQ79fiZJX53_zduUFo30tWrX8s3u_HciHkOViu0t8UXFS3hhNZSrxcmokiqSwJ64cGlLZSeKP07VxH-osZGorngSH2lvs2Ys1gczI-icP_WA', 'user', '2021-05-11 18:55:12', '2021-10-19 20:08:14', '24.8829994', '67.0579987', 1, NULL, NULL, 26, ''),
(28, 'Muhammad Ammar Qureshi', 'ammarqureshi.work@gmail.com', '2021-05-11 19:30:29', NULL, NULL, '1620761452.png', 1, 1, 'active', 1, NULL, NULL, NULL, NULL, 'user', '2021-05-11 19:30:29', '2021-10-19 20:36:43', '24.7929653', '67.06485190000001', 16.0934, NULL, NULL, 0, ''),
(29, 'Ali', 'alivandel@hotmail.com', '2021-05-11 21:35:20', '$2y$10$ws42drg/81.wpXXC5LbG1ebZMWEg2A48dIDjExVhLzM3tEaqwjIBq', NULL, '1620768950.png', 1, 1, 'active', 0, NULL, NULL, 'ios', 'erPK9HyqYkV-qKvDvQBxjO:APA91bF_2-sqpGRoNrlPDEo5cC_qk12i6ONhHcfqCy0C2Etm4kAAUHioNX5AG_aFJjnvdRgiunHzoI13cAwVquSJknxDJyv3cgYorDV33uwVcAorlOrBAVCWPdPMh7t1namq6_luZi2S', 'user', '2021-05-11 21:35:12', '2021-05-22 00:16:07', '25.7616798', '-80.1917902', 16.0934, NULL, NULL, 0, ''),
(30, 'cghh', NULL, NULL, NULL, NULL, NULL, 0, 1, 'active', 1, NULL, NULL, NULL, NULL, 'user', '2021-05-12 04:50:57', '2021-07-12 17:30:27', '37.785834', '-122.406417', 1, NULL, '2021-07-12 17:30:27', 0, ''),
(31, 'Qweer Pig', 'qweerpig@mailinator.com', '2021-05-12 04:58:29', '$2y$10$L2y8euahN4dp/JYbySARruyg0BXkE4Scn.vO1yMcLYqYgVNU182k.', NULL, NULL, 0, 1, 'active', 0, NULL, NULL, NULL, NULL, 'user', '2021-05-12 04:58:21', '2021-05-12 07:06:35', '25.790654', '-80.1300455', 4.5544322, 'cus_JT6SSWDBqnzj9p', '2021-05-12 07:06:35', 0, ''),
(33, 'dfdfd', 'leadinggalaxy@mailinator.com', '2021-05-26 15:07:11', '$2y$10$x4uZpd4g7blHwPe3a/skaeowvLUhzTCO1pieiNZyTOUtKMqprVU6O', NULL, '1622027466.png', 1, 1, 'active', 0, NULL, NULL, 'android', 'eXOne2fzBPhL6T1am5kuvs:APA91bF2AVMoizonPfDDx_BUXuqPXbVLgje4LSXO_Jnu62h2MuNxZkKOddB8ftTUup-lo8uQykCI9Klj9PnjJtxkBBiWy9g8HKFiRdcTB_OpCsHeiDaYAgtFE6E0Z2Rcevg_LrYvS-sI', 'user', '2021-05-26 15:06:59', '2021-05-26 17:05:44', '25.811770076419467', '-80.13087441130274', 1, NULL, NULL, 0, ''),
(34, 'syphR the gamer', 'syphrcoc@gmail.com', '2021-05-27 16:53:35', NULL, NULL, '1622120049.png', 1, 1, 'active', 1, NULL, NULL, 'android', 'fKt5UhXTQOmQY1berlNISx:APA91bFeKjfaOY7zAObRZmQMbWlS6ZBZIwQxrhXM6iz231xu5LHPWrGSWF33_y-jsNtVVJEooJYOcRWVUnSZNVx-yXdIW8CdY5pWF4YNDBrI7_upi6J1mZilNH89P1iSBVO4ge277V3b', 'user', '2021-05-27 16:53:35', '2021-05-28 18:50:55', '25.78374', '-80.1278541', 5.874091, NULL, NULL, 0, ''),
(35, 'John Blacks', 'johnblackm1011@gmail.com', '2021-05-28 16:42:52', NULL, NULL, '1622205789.png', 1, 1, 'active', 1, NULL, NULL, NULL, NULL, 'user', '2021-05-28 16:42:52', '2021-08-01 09:34:29', '24.9454243', '67.0561603', 1, 'cus_JZDWf3Zrbe28gC', NULL, 0, ''),
(36, 'Divaldo Cristovao', 'divaldocristovao@gmail.com', '2021-06-01 03:52:01', '$2y$10$pa.SaSycWIhCV6X.5kntZeB/P/eDl/2hwTz/HwDaUc4pSfJb.lQLK', NULL, '1623750781.png', 1, 1, 'active', 0, NULL, NULL, 'android', 'd7QxEZkvS62eYgs1iSoEFo:APA91bE_MEcIeQlhQSavidrDtSQTYb7rVMQdqzMsT9A6EyAduMqqTZiATL4uA9JNDz4W2QNwzEGH5TXP7azgwIWKem0fqss6ucLZ4NXQpUXwRKD24sk-2JZJHzmsKcO3w2dhw4ZuTep6', 'user', '2021-06-01 03:51:57', '2021-10-17 21:52:41', '25.8028663', '-80.1909871', 16.0934, NULL, NULL, 0, ''),
(39, 'Ahsan Ali', NULL, NULL, NULL, NULL, '1625031537.png', 1, 1, 'active', 1, NULL, 'ztPtXKDpOgdxJZQ40PbNfBz1tFy2', 'android', 'fjYAZW16TIuH4TWTHO9jjV:APA91bFM2fn-JhJIdwQHn98WCjoq2c38Fq34Qo0wZm3bhN51Dwa67HccOXlAEWAvt-q6Xc5YMMMeD-N5DiOKUbQnymXAOCsKRNV56CSx77p_Vg2-JUEhG4OiP8kCCo3vz7evpZ6Bcdpn', 'user', '2021-06-18 10:51:09', '2021-08-23 17:36:16', '24.8607343', '67.00113640000001', 16.029026400000003, 'cus_Jh5Q2JBAB9eeE9', NULL, 0, ''),
(43, 'sammy', 'sumblaemraan@gmail.com', '2021-06-30 10:10:43', '$2y$10$XfRfpr2pBsTMZm8QUpm/uuJKbDMZl0TE57DqsFTPZlvYDEnbYG6/u', NULL, '1625033475.png', 1, 1, 'active', 1, NULL, NULL, 'android', 'cMoXzScDTIeQoOI4pt16GG:APA91bEGwVW-6nBWctNYE4ZNz_7ahIYcZMOD3ikjAEVVqOrI27cbSY2RYSWP_862seXzRa5NA1EGKT3EKk5ZpEBSL7EICeaf2SpcqkSL_MGj24nrnrzdSlM3jF3SArm3xqD0WPO1zDqR', 'user', '2021-06-28 13:15:26', '2021-10-22 00:28:42', '24.9693252', '67.17363899999998', 16.0934, 'cus_JqPSdEpCgOObiX', NULL, 19, ''),
(48, 'me dsfjd', 'bunnytesting@mailinator.com', '2021-06-28 17:36:22', '$2y$10$AvymiWQeBs4chO030va2BeIjBKYobVgk8Msb/JenyfD5NlBd2k4pS', NULL, '1624888023.png', 1, 1, 'active', 0, NULL, NULL, 'android', 'fjYAZW16TIuH4TWTHO9jjV:APA91bEGkK9kWmwRRrmu0YeyfRSu382DeNFmjaVu4qnXzRy4QQ_SVlRcybGPDBBVDhPBDdd-DgbRmpgIZiR2VH9gmP6Tzftjss8GTxdpYOyyxQWKpQe3V3E9SxqjtniJxGmMNovlWtsN', 'user', '2021-06-28 17:36:00', '2021-06-28 17:49:09', '37.4219983', '-122.084', 1, NULL, NULL, 0, ''),
(51, 'Chicago Vibes', 'chicagovibes@mailinator.com', '2021-06-29 14:53:22', '$2y$10$oCebCmOSyn5bkG4KkGSCUeI0HaBu.ZeP6ebTrUz./mQQ6zR8Kk4qW', NULL, '1624964206.png', 1, 0, 'suspended', 0, NULL, NULL, NULL, NULL, 'user', '2021-06-29 14:53:11', '2021-09-27 09:09:15', '37.4219491', '-122.0840371', 1, NULL, NULL, 5, ''),
(52, 'test user', 'testuser@getnada.com', '2021-06-29 15:00:49', '$2y$10$NiRfkgG6DR7cMhn8Ro9k3uxIgF8JNzz9s.j51Rc7dOsbYrHvyIM.K', NULL, '1624964484.png', 1, 0, 'suspended', 0, NULL, NULL, NULL, NULL, 'user', '2021-06-29 15:00:23', '2021-09-27 09:09:10', '24.8620254', '67.0709157', 1, NULL, NULL, 0, ''),
(53, 'Syed Minhal Nadeem', 'catixel827@jq600.com', '2021-06-29 15:24:29', '$2y$10$y0sm/1UILHLxrH49kkidier3szshbaNRgfyoxutg192EYcmKzkl8m', NULL, '1624965954.png', 1, 0, 'suspended', 0, NULL, NULL, 'android', 'd9OryAq3Q4WtRqbFKoUWme:APA91bESrd8RL1mLXf2x75p2Ny4Bh980VGEzGNBuGVRxhOGMUviUR13pgxdDzZxhyk7iKDFj8qNqP-iEydHBWuG0a8tcIdc8rCefU-15ChrOMDbU9kDGpfQfKThg3JLKPdxVlgSSoyRG', 'user', '2021-06-29 15:23:58', '2021-09-27 09:09:10', '24.7930339', '67.0648545', 1, 'cus_JlBYQ6nRijqGDm', NULL, 0, ''),
(54, 'test user2', 'hza.hammad@gmail.com', '2021-06-29 15:27:14', '$2y$10$mj/vOZB.qkGFG.xTwqrxWe1dP0glNxUWVL6VRbvzCbjk6i3TxTSre', NULL, '1624966426.png', 1, 0, 'suspended', 0, NULL, NULL, NULL, NULL, 'user', '2021-06-29 15:25:37', '2021-10-20 13:11:23', '24.8620235', '67.0709237', 1, NULL, NULL, 0, ''),
(55, 'Zcszdsd', 'testingmail@mailinator.com', '2021-06-29 16:14:27', '$2y$10$SDmKCwO7QLupmRaV7kz1nubAPT9aUNpPO0WZq3MO9rIwbEEeJwSvG', NULL, '1624968883.png', 1, 0, 'suspended', 0, NULL, NULL, NULL, NULL, 'user', '2021-06-29 16:14:01', '2021-09-27 09:09:17', '37.4219491', '-122.0840371', 1, NULL, NULL, 0, ''),
(56, 'Sam', 'testingcrocodile@mailinator.com', '2021-06-29 18:01:11', '$2y$10$fDEEYCI.tvJpSBq8rWn3qukFQlCXoya67SjzARjtVslN6NsTSY76S', NULL, '1624975287.png', 1, 0, 'suspended', 0, NULL, NULL, 'android', 'Dummy', 'user', '2021-06-29 16:40:01', '2021-09-27 09:09:12', '25.808691930250067', '-80.1307006450005', 8, NULL, NULL, 0, ''),
(57, 'dasdsad', 'admin@gmail.com.pk', '2021-06-29 18:04:19', '$2y$10$kH7EqAIsbTBE7lR2sdUwcubcSp6fu9qONNMbJk56/2OUb23iLrJdC', NULL, 'Hnet.com-image (1).jpg', 1, 0, 'active', 0, NULL, NULL, NULL, 'cMdqngnlqO3ZYgrE713anh:APA91bETbDBfth7nMh1Ku00hpEUEtPBxB_NQnBJKPr0DgGO0fLq23gIQB0IVwxIqHiUtlKckCkF4NW9PKdnVVqC8Op-DPjziqB_R_ewC0-SiFZfzWKOg8-1Caq0FQQiFGcjtT0GP7GXV', 'admin', '2021-06-29 18:02:39', '2021-10-27 04:37:30', '37.785834', '-122.406417', 1, NULL, NULL, 5, '193956007900'),
(59, 'Minhaj', 'muhammad.minhaj@oip.com.pk', NULL, '$2y$10$4iwd7kebYGGL1mkiFy7n9OWFqV3dOYkQAiA8uLCS9gtN4aR5zBob2', NULL, 'photos6.png', 0, 0, 'suspended', 0, NULL, NULL, NULL, NULL, 'user', '2021-07-02 09:58:20', '2021-10-13 09:15:53', NULL, NULL, NULL, NULL, NULL, 0, 'e2oL_vzwA9kEdJYlcjlXIw:APA91bG-deCendez7rcrW0eyhucQUYoTGBg_ScPXJTQIxu-oVGjuqiafIxNUUWkP4vJ54_d-75CAU27h7QH75TXkfYne_r18ysBxcdOs9MbaoOqaLEcdFDvVqqvYchuhMqYv4jNcw6Ju'),
(60, 'testdd', 'testMin@gmail.com', NULL, '$2y$10$WT9WzAS5FrPgVi0NxIw76eZ8F5TKct/H6VGmjYkoLxeB8SKbhCXi2', NULL, 'image_2021_05_24T19_13_17_591Z.png', 0, 0, 'suspended', 0, NULL, NULL, NULL, NULL, 'waiter', '2021-07-06 17:31:10', '2021-10-13 17:13:06', NULL, NULL, NULL, NULL, NULL, 8, '41272068600'),
(61, 'waiter1', 'waiter@gmail.com', NULL, '$2y$10$9K/YkgWpBcqnUIy6DWaieOYHOyfb3lnzUTym.bAqnPdqSoVxuquoK', NULL, 'ff87a988-7715-4868-8e1d-07bd9469c826.jpg', 0, 1, 'active', 0, NULL, NULL, NULL, NULL, 'waiter', '2021-07-06 17:36:27', '2021-10-26 21:07:03', NULL, NULL, NULL, NULL, NULL, 4, '62866120800'),
(62, 'User Two', 'usertwo@gmail.com', NULL, '$2y$10$IFgCKWr0ieGJUzbYbTZMFu6nnjmvbxifs1YSNCspPGqB0uI/356SO', NULL, 'web-development-e1444737604137.jpg', 0, 0, 'active', 0, NULL, NULL, NULL, NULL, 'user', '2021-07-07 14:00:48', '2021-10-26 21:04:27', NULL, NULL, NULL, NULL, NULL, 13, '42743933400'),
(63, 'Minhal Bar Owner', 'minhalnadeem@test.com', '2021-07-08 13:11:09', '$2y$10$AQ2GP6PWjsTdNykmJWqq4u/KpVlAv6lNZNyROkGSrDWCaRg8zNpwu', NULL, '1625735507.png', 1, 1, 'active', 0, NULL, NULL, 'android', 'dCeORdvpRdKduNim9XRGGu:APA91bEPmceyjCqAVcm9vn-UKbcCV510KfNzkJ_f0-P07PaNC_xC3sLJLC9P17ZHL24xgYcdLyYAHqOvpRGPITOWB--SzG8WCKEWkEURicFVDX08qj49QP7hQFPM8cyjUwKudq3zS8Er', 'manager', '2021-07-07 14:47:41', '2021-09-22 21:22:13', '24.7930384', '67.06485889999999', 16.0934, 'cus_JoWULYFhAKy1qK', NULL, 4, 'e2oL_vzwA9kEdJYlcjlXIw:APA91bG-deCendez7rcrW0eyhucQUYoTGBg_ScPXJTQIxu-oVGjuqiafIxNUUWkP4vJ54_d-75CAU27h7QH75TXkfYne_r18ysBxcdOs9MbaoOqaLEcdFDvVqqvYchuhMqYv4jNcw6Ju'),
(64, 'Waiter test', 'waiterthree@gmail.com', NULL, '$2y$10$SFI8ZwEyqN.lK4M68eYCUeSrK8qulauG2kUGFI6vaMWZkURvRa5US', NULL, 'web-development-e1444737604137.jpg', 0, 0, 'suspended', 0, NULL, NULL, NULL, NULL, 'waiter', '2021-07-07 15:16:40', '2021-10-12 08:14:04', NULL, NULL, NULL, NULL, NULL, 1, ''),
(66, 'Customer Minhaj', 'customer@gmail.com', NULL, '$2y$10$060UdRVcuGdazKvC/P6lROoul2GG6.nLsrmEzpJJ010n0Ghb8EAoG', '721219', 'fresh.png', 0, 1, 'active', 0, NULL, NULL, NULL, NULL, 'user', '2021-07-07 15:19:53', '2021-07-07 12:15:24', NULL, NULL, NULL, NULL, NULL, 0, ''),
(67, 'Minhal', 'robocos944@advew.com', '2021-07-07 16:13:00', '$2y$10$ouhDwlaM1tUHfzRX7bUPiOofahT6dNPgI1K/Z1jXr.RxlJC/GuQPW', NULL, 'photos.png', 0, 1, 'active', 0, NULL, NULL, 'android', 'd9OryAq3Q4WtRqbFKoUWme:APA91bESrd8RL1mLXf2x75p2Ny4Bh980VGEzGNBuGVRxhOGMUviUR13pgxdDzZxhyk7iKDFj8qNqP-iEydHBWuG0a8tcIdc8rCefU-15ChrOMDbU9kDGpfQfKThg3JLKPdxVlgSSoyRG', 'user', '2021-07-07 16:12:34', '2021-07-08 13:16:52', NULL, NULL, NULL, NULL, NULL, 0, ''),
(68, 'My New Waiter', 'waiterseven@gmail.com', NULL, '$2y$10$U4OowOcblO/BYll1FACToeLrdJSzmFVjLuy6ui5Z0SddSstMvYRSm', NULL, 'hairandmakeup.jpg', 0, 0, 'active', 0, NULL, NULL, NULL, NULL, 'waiter', '2021-07-07 19:33:18', '2021-10-13 09:47:41', NULL, NULL, NULL, NULL, NULL, 0, ''),
(69, 'Waiter eight', 'waitereight@gmail.com', NULL, '$2y$10$.HnXLz3y9VHDEaJB6M0.2e5DXuayDvAkqmkvBE20TIcnJ2UzbSzhW', NULL, 'photos6.png', 0, 0, 'active', 0, NULL, NULL, NULL, NULL, 'waiter', '2021-07-07 19:38:31', '2021-10-08 13:57:10', NULL, NULL, NULL, NULL, NULL, 8, ''),
(70, 'john', 'syphrthegamer@gmail.com', '2021-07-12 16:56:22', NULL, NULL, '1626094648.png', 1, 1, 'active', 1, NULL, NULL, 'android', 'dIcdnMmLTIm6C_dblq0AmT:APA91bFoMDeBokEEeMGFqbO8IlJbBVcb0oDNMbB8YYn9NLTxGAU09cGcmsAGM3MZx_neUEnMraw1EDdI1_DiAhJJDEDeTGLBhvyBPoEhDJSSlaGS--vIY-krl-r82U330vBYtO3mrNKF', 'user', '2021-07-12 16:56:22', '2021-07-14 14:30:19', '24.8620785', '67.0709405', 1, 'cus_Jq5LiIanwJ3YM6', NULL, 0, ''),
(71, 'jack', 'demouser@getnada.com', '2021-07-12 17:04:03', '$2y$10$4QuQUjN/JwK2dygZCdiBkeAReDu4IAp5esExHLuduHVKl/e8Slis.', NULL, '1626095065.png', 1, 1, 'active', 0, NULL, NULL, NULL, NULL, 'user', '2021-07-12 17:03:21', '2021-10-18 21:20:01', '24.8620613', '67.0709452', 1, 'cus_Jq5JiebPJ6BwCa', NULL, 24, ''),
(72, 'TestUser', NULL, NULL, NULL, NULL, '1626096695.png', 1, 1, 'active', 1, NULL, 'JPLx36H0PUagV3etDQ2npbfyB323', NULL, NULL, 'user', '2021-07-12 17:31:12', '2021-07-12 18:02:50', '24.8620735', '67.0709462', 1, NULL, NULL, 0, ''),
(73, 'games nado', 'games.departnado@gmail.com', '2021-07-12 18:14:37', NULL, NULL, '1626099361.png', 1, 1, 'active', 1, NULL, NULL, NULL, NULL, 'user', '2021-07-12 18:14:37', '2021-07-13 18:12:17', '24.8620865', '67.0709452', 1, NULL, NULL, 0, ''),
(77, 'vhhjjjjj', NULL, NULL, NULL, NULL, '1626184466.png', 1, 1, 'active', 1, NULL, 'JCquVIPctYgd8EoIR3HW0w6EzA82', 'android', 'esHk9d2sTGaU1aAJx29wUP:APA91bF3F__a4-jKZHTDcJRKGfHymSPZkYEmZr3PTYLNaWsU4CDUPIvKsqms_5Q4JlRLfqaPJ-GNSx_WkPU6-UrFtGI_FKO9JxmMieKCt7nWMrgN4DQGTW_0o3umwWfDP87vGmCaVOhJ', 'user', '2021-07-13 17:52:25', '2021-07-13 17:54:26', NULL, NULL, NULL, NULL, NULL, 0, ''),
(78, 'Test', NULL, NULL, NULL, NULL, '1626185199.png', 1, 1, 'active', 1, NULL, '5ToPcFBhCGQqhH1RkdCQGeGEDs43', 'android', 'eykvkp_ARrWIXU2t_Hk0Gu:APA91bHRgds03CrZHb_AQh3NvXE8hHemZfG2yQRhLpHeXqg8HBNLtaeFU_MzoCf339us4sMp7RHQ6dDt68qhwecWG4UQ3FaTnKVyQVFZ9skpQTScLScyE_5cNzfldc_IOKalppCKkO4v', 'user', '2021-07-13 17:58:25', '2021-07-13 18:06:39', NULL, NULL, NULL, NULL, NULL, 0, ''),
(79, 'Test User', NULL, NULL, NULL, NULL, '1626184949.png', 1, 1, 'active', 1, NULL, 'L32W7JLaZ4a5E378CZLXbCyLxXg2', NULL, NULL, 'user', '2021-07-13 18:02:11', '2021-08-05 12:17:36', '24.862375742193567', '67.07101042289933', 1, NULL, NULL, 0, ''),
(80, 'Demo', NULL, NULL, NULL, NULL, '1626185068.png', 1, 1, 'active', 1, NULL, 'hSzixNW5GDekvh3SVTJDqWRNJMP2', NULL, NULL, 'user', '2021-07-13 18:04:08', '2021-10-13 15:32:50', '37.4219983', '-122.084', 1, NULL, NULL, 9, ''),
(81, 'Altaf', 'altafkorejo.cs17@gmail.com', '2021-07-15 14:21:11', '$2y$10$6FjoHBxpwzYSKrYLZmVhjePrTFNSeNOWLyTfY4/ZsSuyDKwtavRi2', NULL, '1626344694.png', 1, 1, 'active', 0, NULL, NULL, 'android', 'ejaynCBcRX66NGYT09OHXS:APA91bG6xesAAgE4bT0DjGByAjHD2Ml4U5JE2oW1VcDaj1CBO_c9qNECVIQUa3dXZtolKOlfU8O9v4zgUD9Fm9b8L5b9tCHMTQHakN1ZGUSb9q8vnJ6nmherQmqgEqJejN-7tq0XT2kz', 'user', '2021-07-15 14:19:44', '2021-10-21 00:12:30', '25.2956932', '68.0583704', 16.0934, 'cus_JrA7xCHf2xEJr9', NULL, 0, ''),
(82, 'Cheryl John', 'cheryljohn48@gmail.com', '2021-07-16 03:39:14', NULL, NULL, NULL, 0, 1, 'active', 1, NULL, NULL, 'android', 'frE3BeumRemHxnjzkSAgXI:APA91bF-L_gaen0ZNkII083uF7vMWqh1UqaxeX9DsPGRPjZoII1fZWhqFdqthI-LIXE6Iq8LmeB3rGtMGmCkz4ehUB3VUcjIhwdIZvmQ1PijcvWjUC3tCjt6Fp5BtLzYIb0iXNnjPRfA', 'user', '2021-07-16 03:39:14', '2021-07-16 03:51:21', NULL, NULL, NULL, NULL, NULL, 0, ''),
(83, 'Uzair Zahid', 'uzairzahid37@gmail.com', '2021-07-16 03:55:22', NULL, NULL, '1626393350.png', 1, 0, 'suspended', 1, NULL, NULL, NULL, NULL, 'user', '2021-07-16 03:55:22', '2021-09-27 08:53:59', '24.7930582', '67.0648242', 1, NULL, NULL, 0, ''),
(84, 'uzair', 'uzairzahid37@outlook.com', '2021-07-16 04:02:05', '$2y$10$28UG9.LLuHIeMMDksSNofOXTKADVnj3RQXcTzBIzjNzK8e4A.n.7i', NULL, '1626393761.png', 1, 1, 'suspended', 0, NULL, NULL, NULL, NULL, 'user', '2021-07-16 03:59:51', '2021-09-27 08:53:56', '24.7930537', '67.064815', 1, NULL, NULL, 0, ''),
(87, 'Apps Nado', 'testing01.appsnado@gmail.com', '2021-08-02 12:04:51', NULL, NULL, '1629274837.png', 1, 0, 'active', 1, NULL, NULL, NULL, NULL, 'user', '2021-08-02 12:04:51', '2021-09-27 08:54:01', '24.8620426', '67.0709363', 1, NULL, NULL, 0, ''),
(104, '//)(_(*)(&*%&$^%^&%', '()*&uyguy&^*()7', NULL, '$2y$10$K4UXM190b2e2mwFGh4dzyeH03jnSbR9IgV4TlG8QFkEQckz9HIDYK', NULL, 'mass interact 5-10-2021.txt', 0, 0, 'active', 0, NULL, NULL, 'web', NULL, 'user', '2021-10-11 16:42:34', '2021-10-11 16:42:34', NULL, NULL, NULL, NULL, NULL, 0, ''),
(105, 'newmanager1', 'ewkomo', NULL, '$2y$10$mUuJdqP94WT.j.Q/IoFY.OTaGkCA7sm5cRqisWbeHTp6ZLVaggB52', NULL, '', 0, 0, 'active', 0, NULL, NULL, 'web', NULL, 'manager', '2021-10-11 16:57:23', '2021-10-11 16:57:23', NULL, NULL, NULL, NULL, NULL, 0, ''),
(120, 'tesada', 'testsss@gmail.com', NULL, '$2y$10$5pnYWzftMzkYyseSuWhDYeKbNs4JEuHO5jO2Ep8I2ZjP9gbLX2Uay', NULL, 'ff87a988-7715-4868-8e1d-07bd9469c826.jpg', 0, 0, 'suspended', 0, NULL, NULL, NULL, NULL, 'waiter', '2021-10-13 17:41:38', '2021-10-26 03:05:59', NULL, NULL, NULL, NULL, NULL, 13, '0'),
(123, 'Minhaj', 'minhajchamp@gmail.com', '2021-10-19 20:15:19', '$2y$10$JF57fksZ/g6wV4XVjkGYDOTkBAg.dbDcwj.5KbJjFtkEaYGOmzqBi', NULL, '1634660162.png', 1, 1, 'active', 0, NULL, NULL, NULL, NULL, 'user', '2021-10-19 20:14:41', '2021-10-21 01:05:59', '24.9119326', '67.0275782', 16.0934, 'cus_KRfIRy9NTmAxCb', NULL, 0, '0'),
(125, 'Abdul Rehman', 'arkkhanu@gmail.com', '2021-10-19 21:03:26', '$2y$10$j.Trj9w3xvDt7dBaPr7DYOZrmdALgUtA/ri5lEQDYc3lyUg2zEjQu', NULL, '1634663034.png', 1, 1, 'active', 0, NULL, NULL, 'android', 'con0hNu0Tsi2Z-j3kHe08O:APA91bGoRW3fFRah6zcMP6uSSSvpiLZOaCz1GZCRZk2ZJh_bUs5L2RRSCRufEPUWj_Q5Kpf0DCVpVnHEmWq5jNI3dLS6HUVVhTbYzYCxxTuHsV2wN4a4zUAYgI3Biup5kXurQeGOKQf3', 'user', '2021-10-19 21:02:43', '2021-10-19 22:24:32', '24.8004717', '67.0573967', 10.1227486, 'cus_KRFRUfMSSyRYS4', NULL, 27, '0'),
(126, 'Bites Crunch', 'bitescrunch@g.com', '2021-10-20 16:11:54', '$2y$10$nD0gwXZzEEOCbRxWnMkxeuDNdBm.77UHtAYximL5kXwA3oh13EUga', NULL, NULL, 1, 1, 'active', 0, NULL, NULL, 'web', NULL, 'user', '2021-10-20 11:06:42', '2021-10-20 07:12:46', '24.8004717', '67.0573967', 15.771532, NULL, NULL, 28, '0'),
(129, 'dasd', 'muhammad.minhaj@binaryitsolution.com', NULL, '$2y$10$yxh6o44Scxlekn.57a49cewd000lyFKywBzpokdmnabf2kLn.U6P6', NULL, '', 0, 0, 'active', 0, NULL, NULL, 'web', NULL, 'user', '2021-10-20 11:27:48', '2021-10-20 11:27:48', NULL, NULL, NULL, NULL, NULL, 29, '0'),
(133, 'dasddasdasd', 'altafwaiter@gmail.com', NULL, '$2y$10$cVMuDVUYGJhQRjlwCsNDp.dwgLZm.1xxLeSCF1g/0WA5i9MUiQHcO', NULL, '', 0, 0, 'active', 0, NULL, NULL, NULL, NULL, 'waiter', '2021-10-20 17:19:23', '2021-10-20 17:20:50', NULL, NULL, NULL, NULL, NULL, 30, '149902761300'),
(138, 'Ronald Costa', 'ronald_costa96@hotmail.com', '2021-10-25 21:55:47', '$2y$10$x4zoIfbbBg1U78aG2onZrea7OgBkE4ud0H6mGPxl4bKMxJ52BqPG2', NULL, '1635186060.png', 1, 1, 'active', 0, NULL, NULL, 'android', 'cPCAUYTtTqaD0FJeTd-8bE:APA91bFLhRDrVIZQqOgrfNhXNz5ZTksEAVc1LwvhQz7JzY5mQXrDMOMrUgOupVDQKG9AvTtDNDQhlDh1Qyt-U9Vics0RZdDUbPmzN46s4pLyn9d3BhBrDMRKC8LbE7gdokMYHz6vC3vL', '', '2021-10-25 21:54:45', '2021-10-26 21:03:04', '51.455658', '-2.604053', 1, NULL, NULL, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_cards`
--

CREATE TABLE `user_cards` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `exp_month` int(2) DEFAULT NULL,
  `exp_year` int(4) DEFAULT NULL,
  `last_four` int(4) DEFAULT NULL,
  `token` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `finger_print` varchar(120) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_cards`
--

INSERT INTO `user_cards` (`id`, `user_id`, `brand`, `exp_month`, `exp_year`, `last_four`, `token`, `created_at`, `updated_at`, `finger_print`, `deleted_at`) VALUES
(1, 4, 'Visa', 6, 2025, 4242, 'card_1IppgpJELxddsoRYBzHHPiQq', '2021-05-11 07:07:37', '2021-05-11 07:07:37', 'XUcZMDk3KhQLvPR6', NULL),
(2, 6, 'Visa', 12, 2023, 4242, 'card_1ItWbiJELxddsoRY0A4l7DMi', '2021-05-11 08:04:03', '2021-05-21 11:35:44', 'XUcZMDk3KhQLvPR6', '2021-05-21 11:35:44'),
(3, 1, 'Visa', 5, 2021, 4242, 'card_1IprhbJELxddsoRYy75NmoXy', '2021-05-11 09:16:36', '2021-05-11 09:16:36', 'XUcZMDk3KhQLvPR6', NULL),
(4, 7, 'Visa', 6, 2025, 4242, 'card_1Iprk4JELxddsoRY8Agz8EuM', '2021-05-11 09:19:09', '2021-05-11 09:19:09', 'XUcZMDk3KhQLvPR6', NULL),
(5, 19, 'Visa', 5, 2021, 4242, 'card_1IpuABJELxddsoRYcV2XZz4M', '2021-05-11 11:54:15', '2021-05-11 11:54:15', 'XUcZMDk3KhQLvPR6', NULL),
(6, 24, 'Visa', 6, 2025, 4242, 'card_1Ipw2pJELxddsoRYmXoXVpk1', '2021-05-11 13:54:46', '2021-05-11 13:55:08', 'XUcZMDk3KhQLvPR6', '2021-05-11 13:55:08'),
(7, 24, 'Visa', 6, 2025, 4242, 'card_1Ipw3dJELxddsoRY6EkEbjyf', '2021-05-11 13:55:36', '2021-05-11 13:55:36', 'XUcZMDk3KhQLvPR6', NULL),
(8, 8, 'Visa', 6, 2025, 4242, 'card_1IpwhqJELxddsoRYMrPBKBi2', '2021-05-11 14:37:08', '2021-05-11 14:37:08', 'XUcZMDk3KhQLvPR6', NULL),
(9, 31, 'Visa', 6, 2025, 4242, 'card_1IqAFSJELxddsoRYxRNrJCke', '2021-05-12 05:04:47', '2021-05-12 05:05:13', 'XUcZMDk3KhQLvPR6', '2021-05-12 05:05:13'),
(10, 31, 'Visa', 6, 2025, 4242, 'card_1IqC8gJELxddsoRY4zQ1BPZJ', '2021-05-12 07:05:54', '2021-05-12 07:05:54', 'XUcZMDk3KhQLvPR6', NULL),
(11, 6, 'MasterCard', 8, 2025, 4444, 'card_1ItWcEJELxddsoRYHXThAqLb', '2021-05-21 11:34:12', '2021-05-21 11:34:12', 'XHcj8LppMxFGwIlf', NULL),
(12, 3, 'Visa', 6, 2025, 4242, 'card_1Iuy8oJELxddsoRYXmSjwyxT', '2021-05-25 15:09:45', '2021-05-25 15:26:27', 'XUcZMDk3KhQLvPR6', '2021-05-25 15:26:27'),
(13, 3, 'Visa', 6, 2025, 4242, 'card_1IvhurJELxddsoRYrKEWMqLh', '2021-05-25 15:27:38', '2021-05-27 16:02:23', 'XUcZMDk3KhQLvPR6', NULL),
(14, 35, 'Visa', 6, 2025, 4242, 'card_1Iw54wJELxddsoRY2FGyGcR8', '2021-05-28 16:46:26', '2021-05-28 16:46:26', 'XUcZMDk3KhQLvPR6', NULL),
(15, 20, 'Visa', 6, 2025, 4242, 'card_1JCOW6JELxddsoRYfBBSU1lH', '2021-06-04 18:05:07', '2021-08-18 15:26:41', 'XUcZMDk3KhQLvPR6', '2021-08-18 15:26:41'),
(16, 39, 'Visa', 6, 2025, 4242, 'card_1J3hF9JELxddsoRYwfp2stcw', '2021-06-18 16:56:22', '2021-06-30 09:42:17', 'XUcZMDk3KhQLvPR6', '2021-06-30 09:42:17'),
(17, 53, 'Visa', 12, 2022, 4242, 'card_1J7fBkJELxddsoRY4KTotxB8', '2021-06-29 15:33:17', '2021-06-29 15:33:17', 'XUcZMDk3KhQLvPR6', NULL),
(18, 63, 'Visa', 12, 2022, 4242, 'card_1JAtRMJELxddsoRYKXWvj5pa', '2021-07-08 13:22:43', '2021-07-08 13:22:43', 'XUcZMDk3KhQLvPR6', NULL),
(19, 71, 'Visa', 5, 2022, 4242, 'card_1JCP96JELxddsoRYOSE7I7oT', '2021-07-12 17:26:07', '2021-07-12 17:26:07', 'XUcZMDk3KhQLvPR6', NULL),
(20, 70, 'Visa', 5, 2022, 4242, 'card_1JCPB9JELxddsoRYZsWOxqJ6', '2021-07-12 17:28:14', '2021-07-12 17:28:14', 'XUcZMDk3KhQLvPR6', NULL),
(21, 43, 'Visa', 12, 2022, 4242, 'card_1JCidDJELxddsoRYLFHGAEPj', '2021-07-13 14:14:29', '2021-07-13 14:14:29', 'XUcZMDk3KhQLvPR6', NULL),
(22, 81, 'Visa', 1, 2022, 4242, 'card_1JDRmxJELxddsoRYKNkLf7U9', '2021-07-15 14:27:34', '2021-07-15 14:27:34', 'XUcZMDk3KhQLvPR6', NULL),
(23, 20, 'Visa', 6, 2025, 4242, 'card_1JPmvXJELxddsoRYYFEC2ihm', '2021-08-18 15:27:26', '2021-08-18 15:27:35', 'XUcZMDk3KhQLvPR6', '2021-08-18 15:27:35'),
(24, 20, 'Visa', 6, 2025, 4242, 'card_1JPmvzJELxddsoRYsw11OOfF', '2021-08-18 15:27:53', '2021-08-18 15:27:53', 'XUcZMDk3KhQLvPR6', NULL),
(25, 39, 'Visa', 6, 2025, 4242, 'card_1JRajTJELxddsoRYM1GpYnU2', '2021-08-23 14:50:27', '2021-08-23 14:50:27', 'XUcZMDk3KhQLvPR6', NULL),
(26, 108, 'Visa', 12, 2021, 4242, 'card_1JjfLRJELxddsoRYe7lLWFZH', '2021-10-12 11:24:21', '2021-10-12 11:24:21', 'XUcZMDk3KhQLvPR6', NULL),
(27, 111, 'Visa', 12, 2024, 4242, 'card_1JjpNoJELxddsoRYNTfIvsnS', '2021-10-12 22:07:26', '2021-10-12 22:07:26', 'XUcZMDk3KhQLvPR6', NULL),
(28, 114, 'Visa', 12, 2021, 4242, 'card_1Jk1CdJELxddsoRYvMKQL1Ao', '2021-10-13 10:44:42', '2021-10-13 10:44:42', 'XUcZMDk3KhQLvPR6', NULL),
(29, 103, 'Visa', 12, 2022, 4242, 'card_1Jk2LWJELxddsoRYiE92iXLz', '2021-10-13 11:57:57', '2021-10-13 11:57:57', 'XUcZMDk3KhQLvPR6', NULL),
(30, 125, 'Visa', 12, 2024, 4242, 'card_1JmMweJELxddsoRYM8oer7lI', '2021-10-19 22:21:55', '2021-10-19 22:21:55', 'XUcZMDk3KhQLvPR6', NULL),
(31, 123, 'Visa', 12, 2024, 4242, 'card_1JmlxoJELxddsoRYxXYDUjy1', '2021-10-21 01:04:46', '2021-10-21 01:04:46', 'XUcZMDk3KhQLvPR6', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `waiter_orders`
--

CREATE TABLE `waiter_orders` (
  `id` int(11) NOT NULL,
  `waiter_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `waiter_orders`
--

INSERT INTO `waiter_orders` (`id`, `waiter_id`, `order_id`) VALUES
(108, 113, 58),
(110, 97, 59),
(111, 120, 60),
(112, 60, 62);

-- --------------------------------------------------------

--
-- Table structure for table `waiter_restaurants`
--

CREATE TABLE `waiter_restaurants` (
  `id` int(11) NOT NULL,
  `waiter_id` int(11) DEFAULT NULL,
  `restaurant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `waiter_restaurants`
--

INSERT INTO `waiter_restaurants` (`id`, `waiter_id`, `restaurant_id`) VALUES
(70, 60, 3),
(71, 60, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deal_alerts`
--
ALTER TABLE `deal_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers_restaurants`
--
ALTER TABLE `managers_restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `notifications_web`
--
ALTER TABLE `notifications_web`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_pictures`
--
ALTER TABLE `restaurant_pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_tables`
--
ALTER TABLE `restaurant_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_reservations`
--
ALTER TABLE `table_reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `update_deal_alert`
--
ALTER TABLE `update_deal_alert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_cards`
--
ALTER TABLE `user_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waiter_orders`
--
ALTER TABLE `waiter_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `waiter_restaurants`
--
ALTER TABLE `waiter_restaurants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deal_alerts`
--
ALTER TABLE `deal_alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `managers_restaurants`
--
ALTER TABLE `managers_restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notifications_web`
--
ALTER TABLE `notifications_web`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `restaurant_pictures`
--
ALTER TABLE `restaurant_pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `restaurant_tables`
--
ALTER TABLE `restaurant_tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_reservations`
--
ALTER TABLE `table_reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `update_deal_alert`
--
ALTER TABLE `update_deal_alert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `user_cards`
--
ALTER TABLE `user_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `waiter_orders`
--
ALTER TABLE `waiter_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `waiter_restaurants`
--
ALTER TABLE `waiter_restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
