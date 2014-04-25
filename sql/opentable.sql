/*
Navicat MySQL Data Transfer

Source Server         : dbs
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : opentable

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-04-25 18:25:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `restaurateur`
-- ----------------------------
DROP TABLE IF EXISTS `restaurateur`;
CREATE TABLE `restaurateur` (
  `owner_id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_name` varchar(255) NOT NULL,
  `owner_email` varchar(255) NOT NULL,
  `owner_password` varchar(255) NOT NULL,
  PRIMARY KEY (`owner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of restaurateur
-- ----------------------------
