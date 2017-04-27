/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : demo1

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-04-27 18:39:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `touser` varchar(20) NOT NULL COMMENT '接收人',
  `fromuser` varchar(20) NOT NULL COMMENT '发信人',
  `content` varchar(255) NOT NULL COMMENT '发送内容',
  `send_time` varchar(15) NOT NULL COMMENT '发送时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('1', '赵猛', 'qwe', '拓印', '1493109090');
INSERT INTO `message` VALUES ('2', '易赢', 'qwe', '我喜欢你，真的真的.......、、、、、', '1493109560');
INSERT INTO `message` VALUES ('3', 'qwer', 'qwe', 'asdgash385$@^&q*:\":;\'/', '1493109607');

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
  `level` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '会员等级',
  `login_count` smallint(4) unsigned DEFAULT '0' COMMENT '登录次数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tg_user
-- ----------------------------
INSERT INTO `tg_user` VALUES ('1', '9c93bbb77f0701c000dd6d04e219a29f6ef86dd1', '', 'qwe', 'db25f2fc14cd2d2b1e7af307241f548fb03c312a', 'asdf', 'c8e275e6d1882f2b83c0', 'http://www.learn_demo1.com/face/0.png', '', '', '女', '44@ev.com', '1492676997', '1493288055', '127.0.0.1', '1', '5');
INSERT INTO `tg_user` VALUES ('2', 'c0c84e0782aec450fb7249da35ae2ea4cc345e13', '', '赵猛', 'db25f2fc14cd2d2b1e7af307241f548fb03c312a', 'qwert', '711bdfb9d96a54cec6c8', 'http://www.learn_demo1.com/face/0.png', '', '', '男', '', '1492743616', '1492743616', '127.0.0.1', '0', '0');
INSERT INTO `tg_user` VALUES ('3', '05fac904cd04965ef153165c4ab6a03d7585f52b', '', '易赢', 'db25f2fc14cd2d2b1e7af307241f548fb03c312a', 'qwert', '056eafe7cf52220de2df', 'http://www.learn_demo1.com/face/5.png', '', '', '女', '', '1492743655', '1492743655', '127.0.0.1', '0', '0');
INSERT INTO `tg_user` VALUES ('4', 'efc7996929945a96e0e943be9b41cee97767014c', '', '直播', 'db25f2fc14cd2d2b1e7af307241f548fb03c312a', 'adsg', '676e6f35cfc173f73fea', '/face/2.png', '', '', '男', '', '1492743689', '1492743689', '127.0.0.1', '0', '0');
INSERT INTO `tg_user` VALUES ('5', 'ec99b42a4034cbe6d9669ab6a807b3b48fa29656', '', '陆建', 'db25f2fc14cd2d2b1e7af307241f548fb03c312a', 'asfg', '7edd1dd232a61b147151', '/face/2.png', '', '', '男', '', '1492743740', '1492743740', '127.0.0.1', '0', '0');
INSERT INTO `tg_user` VALUES ('6', '33c964fafef7cc4819c69891ae95a2370dd3e59c', '', 'qwer', 'db25f2fc14cd2d2b1e7af307241f548fb03c312a', 'qwee', '056eafe7cf52220de2df', '/face/2.png', '', '', '女', '', '1492997072', '1492997072', '127.0.0.1', '0', '0');
INSERT INTO `tg_user` VALUES ('7', '386ad7950823768e321931358620c793eeb7cd55', '', 'asdg', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'qweqwe', '056eafe7cf52220de2df', '/face/2.png', '', '', '男', '', '1493027638', '1493027638', '127.0.0.1', '0', '0');
