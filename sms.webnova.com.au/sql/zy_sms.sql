/*
SQLyog Trial v9.20 
MySQL - 5.5.15 : Database - zy-sms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`zy-sms` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `zy-sms`;

/*Table structure for table `zy_admin` */

DROP TABLE IF EXISTS `zy_admin`;

CREATE TABLE `zy_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员编号',
  `admin_login_name` varchar(50) DEFAULT NULL COMMENT '管理员登录帐号',
  `admin_login_password` varchar(50) DEFAULT NULL COMMENT '管理员登录密码',
  `admin_real_name` varchar(50) DEFAULT NULL COMMENT '管理员真实姓名',
  `admin_remark` varchar(255) DEFAULT NULL COMMENT '管理员备注',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `zy_admin` */

insert  into `zy_admin`(`admin_id`,`admin_login_name`,`admin_login_password`,`admin_real_name`,`admin_remark`) values (1,'allen','2816843','束磊','测试账户');

/*Table structure for table `zy_charge` */

DROP TABLE IF EXISTS `zy_charge`;

CREATE TABLE `zy_charge` (
  `charge_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '付款记录',
  `credit_id` int(11) DEFAULT NULL COMMENT '钱包ID',
  `charge_quantity` int(11) DEFAULT NULL COMMENT '数量',
  `charge_price` int(11) DEFAULT NULL COMMENT '总价=单价*数量',
  `charge_time` datetime DEFAULT NULL COMMENT '付款时间',
  `payment_id` int(11) DEFAULT NULL COMMENT '付款方式',
  `user_id` int(11) DEFAULT NULL COMMENT '购买人',
  `charge_remark` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`charge_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `zy_charge` */

/*Table structure for table `zy_company` */

DROP TABLE IF EXISTS `zy_company`;

CREATE TABLE `zy_company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID编号',
  `company_name` varchar(100) DEFAULT NULL COMMENT '公司名称',
  `company_phone` varchar(100) DEFAULT NULL COMMENT '公司电话',
  `company_address` varchar(200) DEFAULT NULL COMMENT '公司地址',
  `user_id` int(11) DEFAULT NULL COMMENT '公司管理员ID',
  `company_remark` varchar(200) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `zy_company` */

insert  into `zy_company`(`company_id`,`company_name`,`company_phone`,`company_address`,`user_id`,`company_remark`) values (4,'Test Company','Test Company Phone','Test Company Address',25,'Test Company Remark'),(5,'Test Company','Test Company Phone','Test Company Address',NULL,'Test Company Remark'),(7,'啊啊啊啊','啊啊啊啊啊啊','啊啊啊啊啊啊',28,'啊啊啊啊啊啊'),(11,'Test Company','Test Company Phone','Test Company Address',32,'Test Company Phone'),(12,'WEBNOVA','','aaaa',33,''),(13,'WebNova','','test',34,''),(20,'ZYSOFT','','',44,'');

/*Table structure for table `zy_contact` */

DROP TABLE IF EXISTS `zy_contact`;

CREATE TABLE `zy_contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '联系人编号',
  `contact_first_name` varchar(50) DEFAULT NULL COMMENT '名字',
  `contact_surname` varchar(50) DEFAULT NULL COMMENT '姓',
  `contact_email` varchar(50) DEFAULT NULL COMMENT '邮件',
  `contact_mobile` varchar(50) DEFAULT NULL COMMENT '手机',
  `contact_phone` varchar(50) DEFAULT '0' COMMENT '电话',
  `contact_title` varchar(50) DEFAULT NULL COMMENT 'Mr. Miss. Mrs.',
  `contact_create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `contact_update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `contact_birth_date` date DEFAULT NULL COMMENT '生日',
  `contact_country` int(11) DEFAULT '0' COMMENT '城市',
  `contact_state` int(11) DEFAULT '0' COMMENT '州/省',
  `contact_city` int(11) DEFAULT '0' COMMENT '城市',
  `contact_address` varchar(255) DEFAULT NULL COMMENT '地址',
  `company_id` int(11) DEFAULT NULL COMMENT '公司编号',
  `department_id` int(11) DEFAULT NULL COMMENT '部门编号',
  `user_id` int(11) DEFAULT NULL COMMENT '创建人',
  `contact_list` text COMMENT '所属联系人列表,[1]|[2]',
  `contact_remark` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

/*Data for the table `zy_contact` */

insert  into `zy_contact`(`contact_id`,`contact_first_name`,`contact_surname`,`contact_email`,`contact_mobile`,`contact_phone`,`contact_title`,`contact_create_time`,`contact_update_time`,`contact_birth_date`,`contact_country`,`contact_state`,`contact_city`,`contact_address`,`company_id`,`department_id`,`user_id`,`contact_list`,`contact_remark`) values (74,'allen1','','','8615967890900','0','Mr.','2012-05-06 16:32:05','2012-05-06 16:32:05','2006-01-04',0,0,0,'',13,25,35,'[10]',''),(81,'zhang san','','','8613855585327','0','Mr.','2012-05-05 16:15:05','2012-05-05 16:15:05','2012-05-05',0,0,0,'',13,25,35,'[10]|[11]',''),(82,'啊啊啊','','','8613855585327','0','Mr.','2012-05-06 16:04:05','2012-05-06 16:04:05','2012-05-05',0,0,0,'',13,25,35,'[10]','');

/*Table structure for table `zy_contact_list` */

DROP TABLE IF EXISTS `zy_contact_list`;

CREATE TABLE `zy_contact_list` (
  `contact_list_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '联系人列表编号',
  `contact_list_name` varchar(50) DEFAULT NULL COMMENT '列表名称',
  `contact_list_count` int(11) DEFAULT NULL COMMENT '列表数量',
  `company_id` int(11) DEFAULT NULL COMMENT '公司编号',
  `department_id` int(11) DEFAULT NULL COMMENT '部门编号',
  `user_id` int(11) DEFAULT NULL COMMENT '用户编号',
  `agent_id` int(11) DEFAULT '0' COMMENT '代理商编号.为0时.不是代理商的联系人列表',
  `contact_list_create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `contact_list_update_time` datetime DEFAULT NULL COMMENT '修改时间',
  `contact_list_remark` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`contact_list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `zy_contact_list` */

insert  into `zy_contact_list`(`contact_list_id`,`contact_list_name`,`contact_list_count`,`company_id`,`department_id`,`user_id`,`agent_id`,`contact_list_create_time`,`contact_list_update_time`,`contact_list_remark`) values (1,'未分组',1,0,0,0,0,'2012-04-22 01:35:45','2012-04-22 01:35:54','UserListssss111'),(10,'Not Group',2,13,25,34,0,'2012-05-04 00:00:00','2012-05-04 00:00:00','Not Group'),(11,'VIP',1,13,26,36,0,'2012-05-04 12:48:05','2012-05-04 12:48:05',''),(12,'test',4,14,26,37,0,NULL,NULL,NULL),(18,'Not Group',0,20,33,44,0,'2012-05-07 00:00:00','2012-05-07 00:00:00','Not Group');

/*Table structure for table `zy_credit` */

DROP TABLE IF EXISTS `zy_credit`;

CREATE TABLE `zy_credit` (
  `credit_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '钱包编号',
  `credit_name` varchar(100) DEFAULT NULL COMMENT '钱包名称',
  `credit_volume` varchar(255) DEFAULT NULL COMMENT '钱包额度',
  `credit_price` decimal(11,2) DEFAULT NULL COMMENT '单价',
  `credit_currency` varchar(50) DEFAULT 'AUD' COMMENT '币种',
  `credit_status` int(1) DEFAULT '0' COMMENT '钱包状态:1.停用;2.启用;3.删除',
  `credit_sort` int(11) DEFAULT '0' COMMENT '排序',
  `credit_remark` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`credit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

/*Data for the table `zy_credit` */

insert  into `zy_credit`(`credit_id`,`credit_name`,`credit_volume`,`credit_price`,`credit_currency`,`credit_status`,`credit_sort`,`credit_remark`) values (1,'a','1-4999','0.80','AUD',1,0,'r'),(2,'b','5000-9999','0.60','AUD',1,0,'s'),(3,'1','1','1.00','1',3,1,'1'),(27,'555','55','555.00','555',3,5555,'5555'),(28,'2','2','2.00','2',3,2,'2'),(29,'2','2','2.00','2',3,2,'2');

/*Table structure for table `zy_department` */

DROP TABLE IF EXISTS `zy_department`;

CREATE TABLE `zy_department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '部门编号',
  `company_id` int(11) DEFAULT NULL COMMENT '公司编号',
  `department_name` varchar(100) DEFAULT NULL COMMENT '部门名称',
  `department_parent_id` int(11) DEFAULT NULL COMMENT '上级部门编号(待用)',
  `remark` varchar(200) DEFAULT NULL COMMENT '部门备注',
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

/*Data for the table `zy_department` */

insert  into `zy_department`(`department_id`,`company_id`,`department_name`,`department_parent_id`,`remark`) values (1,1,'manager',0,'the company admin group'),(21,11,'manager',0,NULL),(22,11,'销售部',0,'Add Department'),(23,12,'manager',0,NULL),(24,12,'test1',0,'111'),(25,13,'manager',0,'The highest authority'),(26,13,'Support',0,''),(27,14,'manager',0,'The highest authority'),(33,20,'manager',0,'The highest authority');

/*Table structure for table `zy_info` */

DROP TABLE IF EXISTS `zy_info`;

CREATE TABLE `zy_info` (
  `company_id` int(11) DEFAULT NULL COMMENT '公司ID',
  `balance` int(11) DEFAULT '0' COMMENT '剩余短信数',
  `cc_type` int(11) DEFAULT NULL COMMENT '信用卡类型 1VISA 2mastercard',
  `cc_number` varchar(50) DEFAULT NULL COMMENT '信用卡帐号',
  `cc_name` varchar(50) DEFAULT NULL COMMENT '姓名',
  `cc_expirydate` varchar(50) DEFAULT NULL COMMENT '有效期',
  `dd_bsbnumber` varchar(50) DEFAULT NULL COMMENT '银行帐号',
  `dd_accountnumber` varchar(50) DEFAULT NULL COMMENT '银行卡号',
  `dd_accountname` varchar(100) DEFAULT NULL COMMENT '银行卡名称',
  `defaultpay` char(1) DEFAULT '1' COMMENT '默认付款方式 1.bank tracnsfer 2:credit card 3:derect debit '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `zy_info` */

insert  into `zy_info`(`company_id`,`balance`,`cc_type`,`cc_number`,`cc_name`,`cc_expirydate`,`dd_bsbnumber`,`dd_accountnumber`,`dd_accountname`,`defaultpay`) values (13,999,1,'','','','','','','1'),(20,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1');

/*Table structure for table `zy_payment_gateway` */

DROP TABLE IF EXISTS `zy_payment_gateway`;

CREATE TABLE `zy_payment_gateway` (
  `payment_id` int(11) DEFAULT NULL COMMENT '付款方式编号',
  `payment_gateway_key` varchar(255) DEFAULT NULL COMMENT '付款方式关键字',
  `payment_gateway_value` varchar(255) DEFAULT NULL COMMENT '付款方式值',
  `payment_gateway_remark` varchar(255) DEFAULT NULL COMMENT '备注.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `zy_payment_gateway` */

/*Table structure for table `zy_peyment` */

DROP TABLE IF EXISTS `zy_peyment`;

CREATE TABLE `zy_peyment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '付款方式ID',
  `payment_name` varchar(100) DEFAULT NULL COMMENT '付款方式名称',
  `payment_status` int(1) DEFAULT NULL COMMENT '状态,0:停用,1:启用,2:删除',
  `payment_remark` varchar(255) DEFAULT NULL COMMENT '付款方式备注',
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `zy_peyment` */

/*Table structure for table `zy_role` */

DROP TABLE IF EXISTS `zy_role`;

CREATE TABLE `zy_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '权限ID',
  `department_id` int(11) DEFAULT NULL COMMENT '部门表',
  `contct_list_id` int(11) DEFAULT NULL COMMENT '联系人列表',
  `role_remark` varchar(200) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `zy_role` */

/*Table structure for table `zy_sender` */

DROP TABLE IF EXISTS `zy_sender`;

CREATE TABLE `zy_sender` (
  `sender_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '发送人编号',
  `sender_name` varchar(255) DEFAULT NULL COMMENT '发送人名称',
  `company_id` int(11) DEFAULT NULL COMMENT '所属公司',
  `sender_status` int(1) DEFAULT NULL COMMENT '发送人状态0:停用,1:启动,2:删除;3:申请',
  `userapi_id` varchar(50) DEFAULT NULL COMMENT '调用的api id',
  `sender_remark` varchar(255) DEFAULT NULL COMMENT '发件人备注',
  PRIMARY KEY (`sender_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `zy_sender` */

/*Table structure for table `zy_sms_record` */

DROP TABLE IF EXISTS `zy_sms_record`;

CREATE TABLE `zy_sms_record` (
  `sms_record_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '短信发送ID',
  `api_id` varchar(50) DEFAULT NULL COMMENT '调用的接口ID',
  `sms_record_time` datetime DEFAULT NULL COMMENT '发送时间',
  `sms_success_list` text COMMENT '发送成功,[id]|分割',
  `sms_fail_list` text COMMENT '发送失败,[id]|分割',
  `sms_success_count` int(11) DEFAULT NULL COMMENT '发送成功数',
  `sms_fail_count` int(11) DEFAULT NULL COMMENT '发送失败数',
  `sms_content` varchar(255) DEFAULT NULL COMMENT '短信内容',
  `user_id` int(11) DEFAULT NULL COMMENT '发送人',
  `department_id` int(11) DEFAULT NULL COMMENT '发送人所属部门',
  `company_id` int(11) DEFAULT NULL COMMENT '发送人所属公司',
  `sms_record_remark` varchar(255) DEFAULT NULL COMMENT '发送备注',
  PRIMARY KEY (`sms_record_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `zy_sms_record` */

insert  into `zy_sms_record`(`sms_record_id`,`api_id`,`sms_record_time`,`sms_success_list`,`sms_fail_list`,`sms_success_count`,`sms_fail_count`,`sms_content`,`user_id`,`department_id`,`company_id`,`sms_record_remark`) values (12,'3368044','2012-05-07 00:17:05','[81]','',1,0,'1111',35,25,13,'start at 2012-05-07 00:17:05; end at 2012-05-07 00:17:05'),(13,'3368044','2012-05-07 00:33:05','[81],[74]','',2,0,'test',35,25,13,'start at 2012-05-07 00:33:05; end at 2012-05-07 00:33:05'),(14,'3368044','2012-05-07 00:35:05','[81]','',1,0,'这是一个测试哦.',35,25,13,'start at 2012-05-07 00:34:05; end at 2012-05-07 00:35:05'),(15,'3368044','2012-05-07 09:23:05','[81]','',1,0,'a',34,25,13,'start at 2012-05-07 09:23:05; end at 2012-05-07 09:23:05'),(16,'3368044','2012-05-07 09:40:05','[81]','',1,0,'1',34,25,13,'start at 2012-05-07 09:40:05; end at 2012-05-07 09:40:05'),(17,'3368044','2012-05-07 09:41:05','[81]','',1,0,'1',34,25,13,'start at 2012-05-07 09:41:05; end at 2012-05-07 09:41:05'),(18,'3368044','2012-05-07 09:41:05','[81]','',1,0,'1',34,25,13,'start at 2012-05-07 09:41:05; end at 2012-05-07 09:41:05');

/*Table structure for table `zy_user` */

DROP TABLE IF EXISTS `zy_user`;

CREATE TABLE `zy_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `company_id` int(11) DEFAULT NULL COMMENT '公司编号',
  `department_id` int(11) DEFAULT NULL COMMENT '部门编号',
  `user_login_name` varchar(50) DEFAULT NULL COMMENT '登录帐号',
  `user_login_password` varchar(50) DEFAULT NULL COMMENT '登录密码',
  `roleid` varchar(300) DEFAULT NULL COMMENT 'role表里的ID连接，连接符号|暂时不使用',
  `user_real_name` varchar(50) DEFAULT NULL COMMENT '用户真实姓名',
  `user_email` varchar(50) DEFAULT NULL COMMENT '用户邮件',
  `user_phone` varchar(50) DEFAULT NULL COMMENT '用户电话',
  `user_mobile` varchar(50) DEFAULT NULL COMMENT '用户手机号',
  `user_remark` varchar(200) DEFAULT NULL COMMENT '用户备注',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

/*Data for the table `zy_user` */

insert  into `zy_user`(`user_id`,`company_id`,`department_id`,`user_login_name`,`user_login_password`,`roleid`,`user_real_name`,`user_email`,`user_phone`,`user_mobile`,`user_remark`) values (23,11,22,'arthur','arthur','0','arthur','arthurkingtoo@foxmail.com','0555-2432111','15215557835','arthur'),(32,11,22,'user','users','0','0','0','0','0','0'),(33,12,23,'allen','123456','0','Allen Shu','','','',''),(34,13,25,'abc','123456','0','','','','',''),(35,13,25,'aaa','123','0','','','','',''),(36,13,26,'bbb','123','0','','','','',''),(37,13,25,'fff','fff','0','','','','',''),(44,20,33,'shulei','123','0','','','','','');

/*Table structure for table `zy_userapi` */

DROP TABLE IF EXISTS `zy_userapi`;

CREATE TABLE `zy_userapi` (
  `userapi_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户调用API方法编号',
  `company_id` int(11) DEFAULT NULL COMMENT '公司编号',
  `api_username` varchar(50) DEFAULT NULL COMMENT '调用API的用户名',
  `api_password` varchar(50) DEFAULT NULL COMMENT '调用API的密码',
  `api_id` varchar(50) DEFAULT NULL COMMENT '调用api的api id',
  `api_status` int(1) DEFAULT '0' COMMENT 'API状态,1:停用,2:启用,3:删除',
  `sender_name` varchar(50) DEFAULT NULL COMMENT '发件人名称',
  `sender_motivation` varchar(255) DEFAULT NULL COMMENT '发件人申请理由',
  `api_type` int(1) DEFAULT '1' COMMENT 'api属性.0,系统默认;1,用户申请的;',
  `sender_status` int(1) DEFAULT NULL COMMENT '发件人状态 1:停用;2:启用;3:删除;4:待审核;',
  `userapi_remark` varchar(255) DEFAULT NULL COMMENT '调用API 备注',
  PRIMARY KEY (`userapi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

/*Data for the table `zy_userapi` */

insert  into `zy_userapi`(`userapi_id`,`company_id`,`api_username`,`api_password`,`api_id`,`api_status`,`sender_name`,`sender_motivation`,`api_type`,`sender_status`,`userapi_remark`) values (8,13,'webnova','9SkGN9jG','3368044',2,'webnova','My Company\'s nameMy Company\'s nameMy Company\'s nameMy Company\'s nameMy Company\'s nameMy Company\'s nameMy Company\'s nameMy Company\'s name',1,2,'asdfsd'),(9,13,'webnova','9SkGN9jG','3368044',2,'',NULL,0,2,NULL),(28,13,'webnova','9SkGN9jG','231231',2,'dd','ddd',1,2,''),(31,12,'','','0',2,'test AAA','',1,2,''),(32,12,'0','0','0',2,'test AAA','',1,4,''),(33,20,'0','0','0',2,'','',0,4,'');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
