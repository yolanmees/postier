-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 18, 2018 at 03:09 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `postier`
--

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE `apps` (
  `app_id` int(11) NOT NULL,
  `app_name` varchar(256) DEFAULT NULL,
  `app_key` varchar(256) DEFAULT NULL,
  `auth_type` varchar(254) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`app_id`, `app_name`, `app_key`, `auth_type`, `description`) VALUES
(1, 'Magento 1', NULL, 'OAuth', '	 Soap connection with Magento 1'),
(2, 'Magento 2', NULL, 'OAuth 2', 'Rest connection with Magento 2');

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `auth_id` int(11) NOT NULL,
  `auth_type` varchar(254) DEFAULT NULL,
  `auth_name` varchar(254) DEFAULT NULL,
  `auth_fields` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_conn`
--

CREATE TABLE `auth_conn` (
  `auth_conn_id` int(11) NOT NULL,
  `auth_auth_id` int(11) NOT NULL,
  `connections_conn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `connections`
--

CREATE TABLE `connections` (
  `conn_id` int(11) NOT NULL,
  `conn_name` varchar(45) DEFAULT NULL,
  `conn_key` varchar(45) DEFAULT NULL,
  `connectionscol` varchar(45) DEFAULT NULL,
  `apps_app_id` int(11) NOT NULL,
  `conn_base_url` varchar(255) NOT NULL,
  `conn_test_url` varchar(255) NOT NULL,
  `conn_http_type` varchar(255) NOT NULL,
  `conn_body` longtext NOT NULL,
  `conn_headers` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `connection_routes`
--

CREATE TABLE `connection_routes` (
  `conn_routes_id` int(11) NOT NULL,
  `conn_url` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_base_url` varchar(512) DEFAULT NULL,
  `post_post_url` varchar(512) DEFAULT NULL,
  `post_parameters` longtext,
  `auth_type` varchar(254) DEFAULT NULL,
  `post_headers` longtext,
  `post_body` longtext,
  `post_pre_post_script` longtext,
  `post_environment` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `apps_app_id` int(11) NOT NULL,
  `auth_auth_id` int(11) NOT NULL,
  `session_id_response` varchar(45) DEFAULT NULL,
  `session_public_response` varchar(45) DEFAULT NULL,
  `session_secret_response` varchar(45) DEFAULT NULL,
  `auth_conn_auth_conn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`auth_id`);

--
-- Indexes for table `auth_conn`
--
ALTER TABLE `auth_conn`
  ADD PRIMARY KEY (`auth_conn_id`),
  ADD KEY `fk_auth_conn_auth1_idx` (`auth_auth_id`),
  ADD KEY `fk_auth_conn_connections1_idx` (`connections_conn_id`);

--
-- Indexes for table `connections`
--
ALTER TABLE `connections`
  ADD PRIMARY KEY (`conn_id`),
  ADD KEY `fk_connections_apps1_idx` (`apps_app_id`);

--
-- Indexes for table `connection_routes`
--
ALTER TABLE `connection_routes`
  ADD PRIMARY KEY (`conn_routes_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `fk_sessions_apps1_idx` (`apps_app_id`),
  ADD KEY `fk_sessions_auth1_idx` (`auth_auth_id`),
  ADD KEY `fk_sessions_auth_conn1_idx` (`auth_conn_auth_conn_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apps`
--
ALTER TABLE `apps`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_conn`
--
ALTER TABLE `auth_conn`
  MODIFY `auth_conn_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `connections`
--
ALTER TABLE `connections`
  MODIFY `conn_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `connection_routes`
--
ALTER TABLE `connection_routes`
  MODIFY `conn_routes_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_conn`
--
ALTER TABLE `auth_conn`
  ADD CONSTRAINT `fk_auth_conn_auth1` FOREIGN KEY (`auth_auth_id`) REFERENCES `auth` (`auth_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_auth_conn_connections1` FOREIGN KEY (`connections_conn_id`) REFERENCES `connections` (`conn_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `connections`
--
ALTER TABLE `connections`
  ADD CONSTRAINT `fk_connections_apps1` FOREIGN KEY (`apps_app_id`) REFERENCES `apps` (`app_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `fk_sessions_apps1` FOREIGN KEY (`apps_app_id`) REFERENCES `apps` (`app_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sessions_auth1` FOREIGN KEY (`auth_auth_id`) REFERENCES `auth` (`auth_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sessions_auth_conn1` FOREIGN KEY (`auth_conn_auth_conn_id`) REFERENCES `auth_conn` (`auth_conn_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
