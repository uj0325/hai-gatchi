-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017 年 12 朁E31 日 08:31
-- サーバのバージョン： 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hi_gatch`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gatch_chat`
--

CREATE TABLE `gatch_chat` (
  `chat_numbet` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `gatch_friend`
--

CREATE TABLE `gatch_friend` (
  `gatch_id` int(11) NOT NULL,
  `gatch` int(11) NOT NULL,
  `chat_number` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `gatch_idlist`
--

CREATE TABLE `gatch_idlist` (
  `gatch_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `gatch_survey`
--

CREATE TABLE `gatch_survey` (
  `survey_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `gatch_users`
--

CREATE TABLE `gatch_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `login` int(11) NOT NULL,
  `gatch_condition` varchar(255) NOT NULL,
  `tubuyaki` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gatch_users`
--

INSERT INTO `gatch_users` (`user_id`, `user_name`, `email`, `password`, `picture`, `login`, `gatch_condition`, `tubuyaki`, `reason`, `created`) VALUES
(1, 'yusuke', 'yusuke@yusuke', 'yusuke', 'icon_template.jpg', 0, 'i_karaoke.gif', 'aa', '', '2017-12-29 01:09:49'),
(2, 'yoka', 'yoka@yoka', 'yoka', 'icon_template.jpg', 0, 'i_karaoke.gif', 'j@@k', '', '2017-12-31 07:26:57'),
(3, 'kai', 'kai@kai', 'kaikai', 'icon_template.jpg', 0, 'i_drive.gif', ';k@k', '', '2017-12-31 07:28:43'),
(4, 'toru', 'toru@toru', 'toru', 'icon_template.jpg', 0, 'i_nomi.gif', 'caqw', '', '2017-12-31 07:29:15'),
(5, 'uz', 'uz@uz', 'uzuz', 'icon_template.jpg', 0, 'i_karaoke.gif', 'aslcnqwq', '', '2017-12-31 07:29:30'),
(6, 'anan', 'an@an', 'anan', 'icon_template.jpg', 0, 'i_drive.gif', 'slcjqkqlqj', '', '2017-12-31 07:29:43'),
(7, 'tom', 'tom@tom', 'tomtom', 'icon_template.jpg', 0, 'i_takunomi.gif', 'a;cjqp', '', '2017-12-31 07:30:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gatch_idlist`
--
ALTER TABLE `gatch_idlist`
  ADD PRIMARY KEY (`gatch_id`);

--
-- Indexes for table `gatch_survey`
--
ALTER TABLE `gatch_survey`
  ADD PRIMARY KEY (`survey_id`);

--
-- Indexes for table `gatch_users`
--
ALTER TABLE `gatch_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gatch_idlist`
--
ALTER TABLE `gatch_idlist`
  MODIFY `gatch_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gatch_survey`
--
ALTER TABLE `gatch_survey`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gatch_users`
--
ALTER TABLE `gatch_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
