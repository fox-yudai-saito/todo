-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015 年 7 朁E09 日 19:29
-- サーバのバージョン： 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `todo_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `account_tbs`
--

CREATE TABLE IF NOT EXISTS `account_tbs` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `account_tbs`
--

INSERT INTO `account_tbs` (`id`, `name`, `pass`) VALUES
(1, 'testuser', 'testpass'),
(2, 'yudai', 'saito'),
(3, 'ysman', '3110');

-- --------------------------------------------------------

--
-- テーブルの構造 `label_tbs`
--

CREATE TABLE IF NOT EXISTS `label_tbs` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `label_tbs`
--

INSERT INTO `label_tbs` (`id`, `name`, `account_id`) VALUES
(1, 'testlabel', 1),
(2, 'labeltest', 1),
(3, 'testlab', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `project_tbs`
--

CREATE TABLE IF NOT EXISTS `project_tbs` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `project_tbs`
--

INSERT INTO `project_tbs` (`id`, `name`, `account_id`) VALUES
(1, 'testpro', 1),
(2, 'testproject', 1),
(3, 'projecttest', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `task_tbs`
--

CREATE TABLE IF NOT EXISTS `task_tbs` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `memo` text,
  `date` date DEFAULT NULL,
  `completed` tinyint(1) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `label_id` int(11) DEFAULT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `task_tbs`
--

INSERT INTO `task_tbs` (`id`, `name`, `memo`, `date`, `completed`, `project_id`, `label_id`, `account_id`) VALUES
(1, 'testtask', 'ãƒ†ã‚¹ãƒˆã ã‚ˆãƒ¼', '2015-07-06', 0, 1, 1, 1),
(2, 'ãƒ†ã‚¹ãƒˆã‚¿ã‚¹ã‚¯', 'ã¦ã™ã¨ã¦ã™ã¨ãƒ¼', '2015-07-07', 1, 1, 2, 1),
(3, 'ã‚¿ã‚¹ã‚¯', 'ãŸã™ãã†ã†ã†ã†ã†ã†', '2015-07-08', 0, 3, 3, 1),
(4, 'ã‚ã‚ã‚', 'ã‚ã‚ã‚', '2015-07-07', 0, 1, 2, 1),
(5, 'ç ”ä¿®', 'ç ”ä¿®\r\n13ï¼š00', '2015-07-10', 0, 3, 3, 1),
(6, 'booleantest', 'testboolean', '2015-07-08', 1, 2, 1, 1),
(7, 'ã‚¿ã‚¹ã‚¯', 'aa', NULL, 0, 1, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_tbs`
--
ALTER TABLE `account_tbs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `label_tbs`
--
ALTER TABLE `label_tbs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_tbs`
--
ALTER TABLE `project_tbs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_tbs`
--
ALTER TABLE `task_tbs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_tbs`
--
ALTER TABLE `account_tbs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `label_tbs`
--
ALTER TABLE `label_tbs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `project_tbs`
--
ALTER TABLE `project_tbs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `task_tbs`
--
ALTER TABLE `task_tbs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
