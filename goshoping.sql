-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 04 月 11 日 04:59
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `goshoping`
--
CREATE DATABASE IF NOT EXISTS `goshoping` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `goshoping`;

-- --------------------------------------------------------

--
-- 表的结构 `ce`
--

CREATE TABLE IF NOT EXISTS `ce` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(32) NOT NULL COMMENT '姓名',
  `stuId` char(12) NOT NULL COMMENT '学号',
  `image` varchar(320) NOT NULL COMMENT '学生证',
  `userId` int(32) NOT NULL COMMENT '用户id',
  `type` int(3) NOT NULL DEFAULT '0' COMMENT '0 待审核 1审核失败 2审核成功',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(32) NOT NULL COMMENT '用户id',
  `goodid` int(32) NOT NULL COMMENT '商品id',
  `content` char(32) NOT NULL COMMENT '评论内容',
  `time` int(32) NOT NULL COMMENT '评论时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`id`, `userid`, `goodid`, `content`, `time`) VALUES
(19, 8, 30, '我想要这个手机', 1491885566),
(20, 8, 31, '这个不错  大家可以去看看', 1491885746),
(21, 8, 32, '好东西在哪里？？', 1491885836),
(22, 8, 33, '这个还不错', 1491885986),
(23, 8, 34, '我想要去看看  谁一起去', 1491886159);

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(32) NOT NULL COMMENT '用户id',
  `title` char(32) NOT NULL COMMENT '商品名',
  `detail` char(32) NOT NULL COMMENT '商品详情',
  `place` char(32) NOT NULL COMMENT '交易地点',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `good_imgs` varchar(322) NOT NULL COMMENT '商品图片',
  `time` int(32) NOT NULL COMMENT '时间',
  `type_id` int(32) NOT NULL COMMENT '分类id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`id`, `userid`, `title`, `detail`, `place`, `price`, `good_imgs`, `time`, `type_id`) VALUES
(29, 11, '手机', '买时是3000买的，不想要了，想出手3成新', '食堂门口', '500.00', '/Uploads/2017-04-11/58ec58b10ec63.jpg', 1491884208, 1),
(30, 8, 'iPhone7全新', '今年买的iPhone7全新', '食堂门口', '1500.00', '/Uploads/2017-04-11/58ec5df31a9b1.jpg', 1491885555, 1),
(31, 8, '8成新苹果电脑', '这个电脑还是特别好用的，我买了一个新的所以要转手', '教学楼', '4000.00', '/Uploads/2017-04-11/58ec5ea5bde15.jpg', 1491885733, 1),
(32, 8, '苹果台式电脑', '毕业了要转卖，希望来围观', '', '20000.00', '/Uploads/2017-04-11/58ec5ef8c8708.jpg', 1491885816, 1),
(33, 8, '衣架', '我宿舍有大量衣架转卖，欢迎围观', '宿舍楼', '4.00', '/Uploads/2017-04-11/58ec5f979f40f.jpg', 1491885975, 3),
(34, 8, '考研书籍', '考研书籍和笔记出售', '宿舍楼', '15.00', '/Uploads/2017-04-11/58ec603031bf3.jpg', 1491886128, 2),
(35, 8, '9成新球鞋', '签名球鞋', '男生宿舍楼', '400.00', '/Uploads/2017-04-11/58ec60bbc4a1f.jpg', 1491886267, 4),
(36, 12, '考研书籍', '考研书籍欢迎选购', '女生宿舍楼', '20.00', '/Uploads/2017-04-11/58ec61f8d2d88.jpg', 1491886584, 2);

-- --------------------------------------------------------

--
-- 表的结构 `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(32) NOT NULL COMMENT '友情链接标题',
  `url` char(32) NOT NULL COMMENT '友情链接地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL,
  `name` char(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `school`
--

INSERT INTO `school` (`id`, `pid`, `name`) VALUES
(15, 0, '旅游与工程管理学院');

-- --------------------------------------------------------

--
-- 表的结构 `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(32) NOT NULL DEFAULT '0' COMMENT '上级分类id',
  `name` char(32) NOT NULL COMMENT '分类名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `type`
--

INSERT INTO `type` (`id`, `pid`, `name`) VALUES
(1, 0, '数码'),
(2, 0, '书籍'),
(3, 0, '日用品'),
(4, 0, '生活用品');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` char(12) NOT NULL COMMENT '昵称',
  `passwd` char(32) NOT NULL COMMENT '密码',
  `head_img` varchar(320) NOT NULL DEFAULT '/home/images/header.jpg' COMMENT '头像',
  `school_id` char(32) NOT NULL COMMENT '院系',
  `ent_time` int(32) NOT NULL COMMENT '入学',
  `certification` enum('0','1') NOT NULL DEFAULT '0' COMMENT '认证 0不认证 1以认证',
  `phone` char(12) NOT NULL COMMENT '手机号码',
  `qq` char(12) NOT NULL COMMENT 'qq号',
  `email` char(12) NOT NULL COMMENT '用户邮箱',
  `type` int(10) NOT NULL DEFAULT '0' COMMENT '用户类型0普通用户 1为管理员',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique` (`nickname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `nickname`, `passwd`, `head_img`, `school_id`, `ent_time`, `certification`, `phone`, `qq`, `email`, `type`) VALUES
(8, 'test1', 'e10adc3949ba59abbe56e057f20f883e', '/Uploads/2016-04-19/571593c7bdaa2.png', '4', 0, '0', '222', '333', '111', 1),
(12, 'user', 'e10adc3949ba59abbe56e057f20f883e', '/home/images/header.jpg', '15', 0, '0', '123456', '', '123456@qq.co', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
