-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 03 月 03 日 04:23
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

-- --------------------------------------------------------

--
-- 表的结构 `tp_card_info_t`
--

CREATE TABLE IF NOT EXISTS `tp_card_info_t` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `merchat_id` varchar(25) NOT NULL,
  `wechat_id` varchar(20) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_account` varchar(16) NOT NULL,
  `bank_bsb` varchar(11) NOT NULL,
  `card_holder` varchar(64) DEFAULT NULL,
  `card_desc` varchar(25) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `expire_date` datetime NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `tp_card_info_t`
--

INSERT INTO `tp_card_info_t` (`id`, `merchat_id`, `wechat_id`, `bank_name`, `bank_account`, `bank_bsb`, `card_holder`, `card_desc`, `country`, `expire_date`, `created_date`, `updated_date`) VALUES
(1, '1', '1', 'NAB', '1234567890', '123456', 'Test', 'Test desc', 'AU', '0000-00-00 00:00:00', '2014-03-03 00:00:00', '0000-00-00 00:00:00'),
(2, '1', '1', 'CommWealth', '1234567890', '456123', 'Test1', 'Test desc', 'AU', '0000-00-00 00:00:00', '2014-03-03 00:00:00', '0000-00-00 00:00:00'),
(3, '1', '1', 'Westpac', '2147483647', '456789', 'Test3', 'Test desc', 'AU', '0000-00-00 00:00:00', '2014-03-03 00:00:00', '0000-00-00 00:00:00'),
(6, '1', '', 'NAB', '1134123435', '123456', 'Test', 'Test', 'australia', '0000-00-00 00:00:00', '2014-03-03 15:15:25', '2014-03-03 15:15:25');

-- --------------------------------------------------------

--
-- 表的结构 `tp_transaction_t`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `tp_transaction_t`
--

INSERT INTO `tp_transaction_t` (`id`, `merchat_id`, `password`, `wechat_id`, `item_id`, `item_desc`, `amount`, `phone_number`, `service_provider_id`, `card_number`, `card_name`, `expire_date`, `cvv`, `created_date`, `updated_date`, `order_status`, `payment_status`) VALUES
(0, '1', '13414312', '1341', 12, 'Test', 100.12, 134634653, 122, '13234456356356', 'TestName', '2014-02-04 00:00:00', 123, '2014-02-18 00:00:00', '2014-02-28 00:00:00', 1, 1),
(1, '2', '13414312', '1341', 19, 'Test', 999.12, 134634653, 122, '13234456356356', 'TestName1', '2014-02-04 00:00:00', 123, '2014-02-18 00:00:00', '2014-02-28 00:00:00', 2, 2),
(2, '1', '13414312', '1341', 12, 'Test11', 200.12, 134634653, 122, '13234456356356', 'TestName1', '2014-02-04 00:00:00', 123, '2014-02-18 00:00:00', '2014-02-28 00:00:00', 1, 1),
(3, '1', '13414312', '1341', 12, 'Test33', 300.12, 134634653, 122, '13234456356356', 'TestName3', '2014-02-04 00:00:00', 123, '2014-02-18 00:00:00', '2014-02-28 00:00:00', 1, 1),
(4, '1', '13414312', '1341', 12, 'Test44', 500.12, 134634653, 122, '13234456356356', 'TestName4', '2014-02-04 00:00:00', 123, '2014-02-18 00:00:00', '2014-02-28 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tp_transaction_ts`
--

CREATE TABLE IF NOT EXISTS `tp_transaction_ts` (
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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

--
-- 表的结构 `tp_user_ts`
--

CREATE TABLE IF NOT EXISTS `tp_user_ts` (
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

--
-- 表的结构 `tp_withdraw_history_t`
--

CREATE TABLE IF NOT EXISTS `tp_withdraw_history_t` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `merchat_id` varchar(25) NOT NULL,
  `wechat_id` varchar(20) NOT NULL,
  `amount` float NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_account` varchar(16) NOT NULL,
  `bank_bsb` varchar(11) NOT NULL,
  `expire_date` datetime NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `tp_withdraw_history_t`
--

INSERT INTO `tp_withdraw_history_t` (`id`, `merchat_id`, `wechat_id`, `amount`, `bank_name`, `bank_account`, `bank_bsb`, `expire_date`, `created_date`, `updated_date`) VALUES
(1, '1', '', 1, 'CommWealth', '1234567890', '456123', '0000-00-00 00:00:00', '2014-03-03 12:44:01', '0000-00-00 00:00:00'),
(2, '1', '', 2, 'CommWealth', '1234567890', '456123', '0000-00-00 00:00:00', '2014-03-03 12:49:08', '0000-00-00 00:00:00'),
(3, '1', '', 3, 'Westpac', '2147483647', '456789', '0000-00-00 00:00:00', '2014-03-03 12:49:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `tp_withdraw_t`
--

CREATE TABLE IF NOT EXISTS `tp_withdraw_t` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `merchat_id` varchar(25) NOT NULL,
  `wechat_id` varchar(20) NOT NULL,
  `amount` double NOT NULL,
  `available_amount` double NOT NULL,
  `withdrawed_amount` double NOT NULL,
  `card_number` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tp_withdraw_t`
--

INSERT INTO `tp_withdraw_t` (`id`, `merchat_id`, `wechat_id`, `amount`, `available_amount`, `withdrawed_amount`, `card_number`) VALUES
(0, '1', '1', 9865.12, 9829.12, 12, '254234523452'),
(1, '2', '2', 10001.99, 10001.99, 1000, '254234523453');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
