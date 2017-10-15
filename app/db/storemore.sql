-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2016 at 07:11 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `storemore`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `fb_id` bigint(100) DEFAULT NULL,
  `fb_access_token` text,
  `twt_id` bigint(100) DEFAULT NULL,
  `twt_access_token` text,
  `twt_access_secret` text,
  `ldn_id` varchar(100) DEFAULT NULL,
  `user_group_id` varchar(256) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `active` varchar(3) DEFAULT '0' COMMENT 'for user is active user or inactive user',
  `email_verified` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `by_admin` int(1) NOT NULL DEFAULT '0',
  `is_subscription` int(11) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `modified_by` int(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=664 DEFAULT CHARSET=latin1;


--
-- Table structure for table `user_activities`
--

CREATE TABLE IF NOT EXISTS `user_activities` (
  `id` int(10) NOT NULL,
  `useragent` varchar(256) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `last_action` int(10) DEFAULT NULL,
  `last_url` text,
  `logout_time` int(10) DEFAULT NULL,
  `user_browser` text,
  `ip_address` varchar(50) DEFAULT NULL,
  `logout` int(11) NOT NULL DEFAULT '0',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1400 DEFAULT CHARSET=latin1;

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `photo` text,
  `bday` date DEFAULT NULL COMMENT 'Birthday',
  `location` varchar(256) DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `cellphone` varchar(15) DEFAULT NULL,
  `web_page` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=195 DEFAULT CHARSET=latin1;


--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `alias_name` varchar(100) DEFAULT NULL,
  `allowRegistration` int(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `alias_name`, `allowRegistration`, `created`, `modified`) VALUES
(1, 'Admin', 'Admin', 0, '2015-02-11 13:36:26', '2015-02-11 13:36:26'),
(2, 'User', 'User', 1, '2015-02-11 13:36:26', '2015-02-11 13:36:26'),
(3, 'Guest', 'Guest', 0, '2015-02-11 13:36:26', '2015-02-11 13:36:26'),
(4, 'Operator', 'operator', 0, '2015-03-23 10:21:32', '2015-03-23 10:21:47'),
(5, 'Accountant', 'accountant', 1, '2015-10-14 17:05:37', '2015-10-14 17:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_group_permissions`
--

CREATE TABLE IF NOT EXISTS `user_group_permissions` (
  `id` int(10) unsigned NOT NULL,
  `user_group_id` int(10) unsigned NOT NULL,
  `controller` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `action` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `allowed` tinyint(1) unsigned NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=1824 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group_permissions`
--


--
-- Table structure for table `user_settings`
--

CREATE TABLE IF NOT EXISTS `user_settings` (
  `id` int(10) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `name_public` text COMMENT 'name shown on screen',
  `value` varchar(256) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_settings`
--

INSERT INTO `user_settings` (`id`, `name`, `name_public`, `value`, `type`) VALUES
(1, 'defaultTimeZone', 'Enter default time zone identifier', 'Asia/Kolkata', 'input'),
(2, 'siteName', 'Enter Your Site Name', 'StoreMore', 'input'),
(3, 'siteRegistration', 'New Registration is allowed or not', '1', 'checkbox'),
(4, 'allowDeleteAccount', 'Allow users to delete account', '0', 'checkbox'),
(5, 'sendRegistrationMail', 'Send Registration Mail After User Registered', '1', 'checkbox'),
(6, 'sendPasswordChangeMail', 'Send Password Change Mail After User changed password', '1', 'checkbox'),
(7, 'emailVerification', 'Want to verify user''s email address?', '0', 'checkbox'),
(8, 'emailFromAddress', 'Enter email by which emails will be send.', 'example@example.com', 'input'),
(9, 'emailFromName', 'Enter Email From Name', 'User Management Plugin', 'input'),
(10, 'allowChangeUsername', 'Do you want to allow users to change their username?', '0', 'checkbox'),
(11, 'bannedUsernames', 'Set banned usernames comma separated(no space, no quotes)', 'Administrator, SuperAdmin', 'input'),
(12, 'useRecaptcha', 'Do you want to captcha support on registration form?', '1', 'checkbox'),
(13, 'privateKeyFromRecaptcha', 'Enter private key for Recaptcha from google', '', 'input'),
(14, 'publicKeyFromRecaptcha', 'Enter public key for recaptcha from google', '', 'input'),
(15, 'loginRedirectUrl', 'Enter URL where user will be redirected after login ', '/dashboard', 'input'),
(16, 'logoutRedirectUrl', 'Enter URL where user will be redirected after logout', '/', 'input'),
(17, 'permissions', 'Do you Want to enable permissions for users?', '1', 'checkbox'),
(18, 'adminPermissions', 'Do you want to check permissions for Admin?', '0', 'checkbox'),
(19, 'defaultGroupId', 'Enter default group id for user registration', '2', 'input'),
(20, 'adminGroupId', 'Enter Admin Group Id', '1', 'input'),
(21, 'guestGroupId', 'Enter Guest Group Id', '3', 'input'),
(22, 'useFacebookLogin', 'Want to use Facebook Connect on your site?', '1', 'checkbox'),
(23, 'facebookAppId', 'Facebook Application Id', '445048658985201', 'input'),
(24, 'facebookSecret', 'Facebook Application Secret Code', '6f8cbaf0bfdd571e8b047cd1cdb45453', 'input'),
(25, 'facebookScope', 'Facebook Permissions', 'public_profile, email', 'input'),
(26, 'useTwitterLogin', 'Want to use Twitter Connect on your site?', '0', 'checkbox'),
(27, 'twitterConsumerKey', 'Twitter Consumer Key', '', 'input'),
(28, 'twitterConsumerSecret', 'Twitter Consumer Secret', '', 'input'),
(29, 'useGmailLogin', 'Want to use Gmail Connect on your site?', '1', 'checkbox'),
(30, 'useYahooLogin', 'Want to use Yahoo Connect on your site?', '0', 'checkbox'),
(31, 'useLinkedinLogin', 'Want to use Linkedin Connect on your site?', '0', 'checkbox'),
(32, 'linkedinApiKey', 'Linkedin Api Key', '', 'input'),
(33, 'linkedinSecretKey', 'Linkedin Secret Key', '', 'input'),
(34, 'useFoursquareLogin', 'Want to use Foursquare Connect on your site?', '0', 'checkbox'),
(35, 'foursquareClientId', 'Foursquare Client Id', '', 'input'),
(36, 'foursquareClientSecret', 'Foursquare Client Secret', '', 'input'),
(37, 'viewOnlineUserTime', 'You can view online users and guest from last few minutes, set time in minutes ', '30', 'input'),
(38, 'useHttps', 'Do you want to HTTPS for whole site?', '0', 'checkbox'),
(39, 'httpsUrls', 'You can set selected urls for HTTPS (e.g. users/login, users/register)', NULL, 'input'),
(40, 'imgDir', 'Enter Image directory name where users profile photos will be uploaded. This directory should be in webroot/img directory', 'umphotos', 'input'),
(41, 'googleAppId', 'Google App Id', '176072272130-oop5fsnc62do45b1eare7sdf8pn73hfb.apps.googleusercontent.com', 'input'),
(42, 'googleSecret', 'Google Secret Key', 'yx2hmPlYTcjQ1E227eCLrU4X', 'input'),
(43, 'adminLoginString', 'Login_String for Admin and Operator (login/panel/?)', 'storemore_admin', 'input');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_activities`
--
ALTER TABLE `user_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group_permissions`
--
ALTER TABLE `user_group_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_settings`
--
ALTER TABLE `user_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_activities`
--
ALTER TABLE `user_activities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1400;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=195;
--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_group_permissions`
--
ALTER TABLE `user_group_permissions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1824;
--
-- AUTO_INCREMENT for table `user_settings`
--
ALTER TABLE `user_settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
