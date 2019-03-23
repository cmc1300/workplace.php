-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 02 月 20 日 06:24
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `tenpayco_db`
--
CREATE DATABASE IF NOT EXISTS `tenpayco_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tenpayco_db`;

INSERT INTO `tp_transaction_t` (`id`, `merchat_id`, `password`, `wechat_id`, `item_id`, `item_desc`, `amount`, `phone_number`, `service_provider_id`, `card_number`, `card_name`, `expire_date`, `cvv`) VALUES
(1, '1', '134123412341', '1', 1, 'asf', 11, 242345, 12, '254234523452', 'asdfa', '2014-02-04 00:00:00', 12341);

-- --------------------------------------------------------

--
-- 表的结构 `tp_transaction_ts`
--

CREATE TABLE IF NOT EXISTS `tp_transaction_t` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `merchat_id` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `wechat_id` varchar(20) NOT NULL,
  `item_id` int(9) NOT NULL,
  `item_desc` varchar(25) NOT NULL,
  `amount` double NOT NULL,
  `phone_number` int(11) NOT NULL,
  `service_provider_id` int(2) NOT NULL,
  `card_number` varchar(20) NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `expire_date` datetime NOT NULL,
  `cvv` int(3) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `order_status` int(2) NOT NULL,
  `payment_status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tp_transaction_ts`
--

INSERT INTO `tp_transaction_t` (`id`, `merchat_id`, `password`, `wechat_id`, `item_id`, `item_desc`, `amount`, `phone_number`, `service_provider_id`, `card_number`, `card_name`, `expire_date`, `cvv`) VALUES
(1, '1', 'asdfasdf', '1', 1234, 'afsdaf', 111, 234523452, 24, '13412341234124', 'asfa', '2014-02-06 00:00:00', 111);

-- --------------------------------------------------------

--
-- 表的结构 `tp_user_t`
--

CREATE TABLE IF NOT EXISTS `tp_user_t` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(25) NOT NULL,
  `merchat_id` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(20) NOT NULL,
  `status` int(1) NOT NULL,
  `create_date` date NOT NULL,
  `type` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------
INSERT INTO `tp_user_t` (`id`, `user_id`, `merchat_id`, `password`, `email`, `address`, `phone`, `status`, `create_date`, `type`) VALUES
(1, '1', '1', '3241412', 'test@test.com', 'Test', 0, 0, '0000-00-00', 0),
(2, '2', '2', '3241412', 'tes1t@test.com', 'Test', 0, 0, '0000-00-00', 0),
(3, '3', '3', '3241412', 'tes3t@test.com', 'Test333', 0, 0, '0000-00-00', 0),
(4, '4', '4', '3241412', 'tes4t@test.com', 'Test444', 0, 0, '0000-00-00', 0),
(5, '5', '5', '3241412', 'tes5t@test.com', 'Test555', 0, 0, '0000-00-00', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
