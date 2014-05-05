/*
Navicat MySQL Data Transfer

Source Server         : dbs
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : opentable

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-05-05 21:02:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `menu`
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` longtext NOT NULL,
  `menu_description` longtext NOT NULL,
  `menu_price` int(11) NOT NULL,
  `menu_category` varchar(255) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', 'Balletjes', 'met tomatensaus', '500', 'hoofdgerecht', '25');

-- ----------------------------
-- Table structure for `openinghours`
-- ----------------------------
DROP TABLE IF EXISTS `openinghours`;
CREATE TABLE `openinghours` (
  `opening_id` int(11) NOT NULL AUTO_INCREMENT,
  `opening_monday_from` time NOT NULL,
  `opening_monday_until` time NOT NULL,
  `opening_tuesday_from` time NOT NULL,
  `opening_tuesday_until` time NOT NULL,
  `opening_wednesday_from` time NOT NULL,
  `opening_wednesday_until` time NOT NULL,
  `opening_thursday_from` time NOT NULL,
  `opening_thursday_until` time NOT NULL,
  `opening_friday_from` time NOT NULL,
  `opening_friday_until` time NOT NULL,
  `opening_saturday_from` time NOT NULL,
  `opening_saturday_until` time NOT NULL,
  `opening_sunday_from` time NOT NULL,
  `opening_sunday_until` time NOT NULL,
  `opening_remarks` longtext NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  PRIMARY KEY (`opening_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of openinghours
-- ----------------------------

-- ----------------------------
-- Table structure for `order`
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_quantity` int(11) NOT NULL,
  `order_price` int(11) NOT NULL,
  `order_totalprice` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order
-- ----------------------------

-- ----------------------------
-- Table structure for `restaurant`
-- ----------------------------
DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE `restaurant` (
  `restaurant_id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_name` varchar(255) NOT NULL,
  `restaurant_street` varchar(255) NOT NULL,
  `restaurant_number` int(6) NOT NULL,
  `restaurant_postalCode` int(6) NOT NULL,
  `restaurant_city` varchar(255) NOT NULL,
  `restaurant_email` varchar(255) NOT NULL,
  `restaurant_website` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `openingHours_id` int(11) NOT NULL,
  PRIMARY KEY (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of restaurant
-- ----------------------------
INSERT INTO `restaurant` VALUES ('1', 'Segers', 'Em van der velde straat', '97', '2830', 'Willebroek', 'kimberlygs@hotmail.be', 'www.hallo.com', '0', '0', '0');
INSERT INTO `restaurant` VALUES ('2', 'Segers', 'Em van der velde straat', '97', '2830', 'Willebroek', 'kimberlygs@hotmail.be', 'www.hallo.com', '0', '0', '0');
INSERT INTO `restaurant` VALUES ('3', 'Pizza Hut', 'Markt', '3', '1840', 'Londerzeel', 'pizzahut@pizza.be', 'www.pizza.be', '25', '0', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of restaurateur
-- ----------------------------
INSERT INTO `restaurateur` VALUES ('25', 'Kristof', 'krisvanespen@hotmail.com', 'b6a460f0cad54e15bb99c45276125e09');
INSERT INTO `restaurateur` VALUES ('26', 'Kristof', 'kristof@creativebrain.be', 'b6a460f0cad54e15bb99c45276125e09');
INSERT INTO `restaurateur` VALUES ('27', '4wrabdzf', 'creativesurename@gmail.com', 'b6a460f0cad54e15bb99c45276125e09');
INSERT INTO `restaurateur` VALUES ('28', '4wrabdzf', 'qwert@test.be', 'b6a460f0cad54e15bb99c45276125e09');

-- ----------------------------
-- Table structure for `table`
-- ----------------------------
DROP TABLE IF EXISTS `table`;
CREATE TABLE `table` (
  `table_id` int(11) NOT NULL AUTO_INCREMENT,
  `table_nr` varchar(255) NOT NULL,
  `table_persons` int(11) NOT NULL,
  `table_status` varchar(255) NOT NULL,
  `table_description` longtext NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  PRIMARY KEY (`table_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of table
-- ----------------------------
