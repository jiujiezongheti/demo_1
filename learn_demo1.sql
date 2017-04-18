/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : learn_demo1

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-04-18 11:12:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tg_user
-- ----------------------------
DROP TABLE IF EXISTS `tg_user`;
CREATE TABLE `tg_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `uniqid` char(40) NOT NULL COMMENT '注册标识',
  `active` char(40) NOT NULL COMMENT '激活登录用户',
  `uname` varchar(20) NOT NULL COMMENT '用户名',
  `pwd` char(40) NOT NULL COMMENT '密码',
  `pwdt` varchar(20) NOT NULL COMMENT '密码提示',
  `pwdh` varchar(20) NOT NULL COMMENT '提示回答',
  `head_img` varchar(255) DEFAULT NULL COMMENT '用户头像',
  `qq` varchar(10) DEFAULT NULL COMMENT 'qq',
  `url` varchar(255) DEFAULT NULL COMMENT '网址',
  `sex` varchar(1) DEFAULT NULL COMMENT '性别',
  `email` varchar(255) DEFAULT NULL COMMENT '邮件',
  `reg_time` varchar(255) DEFAULT NULL COMMENT '注册时间',
  `last_time` varchar(255) DEFAULT NULL COMMENT '最后登录时间',
  `last_ip` varchar(255) DEFAULT NULL COMMENT '最后登录ip',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
