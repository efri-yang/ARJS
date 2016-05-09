-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-05-09 15:30:51
-- 服务器版本： 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comment_demo`
--

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `content`, `time`) VALUES
(1, 1, 'yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论yyh1的评论', '2016-05-09 09:49:00'),
(28, 1, '1', '2016-05-09 15:09:57'),
(29, 1, '2', '2016-05-09 15:10:11'),
(30, 1, '3', '2016-05-09 15:11:12'),
(31, 1, '4', '2016-05-09 15:11:59'),
(32, 1, '5', '2016-05-09 15:16:49'),
(33, 1, '6', '2016-05-09 15:17:20'),
(34, 1, '7', '2016-05-09 15:18:06'),
(35, 1, '8', '2016-05-09 15:19:31'),
(36, 1, '9', '2016-05-09 15:19:41'),
(37, 1, '10', '2016-05-09 15:20:13'),
(38, 1, '11', '2016-05-09 15:21:06'),
(39, 1, '12', '2016-05-09 15:21:27'),
(40, 1, '13', '2016-05-09 15:21:44'),
(41, 1, '14', '2016-05-09 15:22:20'),
(42, 1, '14', '2016-05-09 15:23:55'),
(43, 1, '14', '2016-05-09 15:23:56'),
(44, 1, '14', '2016-05-09 15:23:57'),
(45, 1, '15', '2016-05-09 15:25:28'),
(46, 1, '15', '2016-05-09 15:25:29'),
(47, 1, '16', '2016-05-09 15:26:27');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `address`) VALUES
(1, 'yyh1', 'cb4245d8c5b896019d1f44c9cd72503d', '948061564@qq.com', '福建赤土1'),
(2, 'yyh2', 'cb4245d8c5b896019d1f44c9cd72503d', '948061564@qq.com', '福建赤土2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 限制导出的表
--

--
-- 限制表 `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
