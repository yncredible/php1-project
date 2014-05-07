/*
Navicat MySQL Data Transfer

Source Server         : dbs
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : opentable

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-05-07 10:35:35
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', 'Balletjes', 'met tomatensaus', '500', 'hoofdgerecht', '25');
INSERT INTO `menu` VALUES ('2', 'Sloppy joe\'s', 'Big piece of diabetes', '4', 'burgerSandwiches', '6');
INSERT INTO `menu` VALUES ('3', 'Balletjes', 'Big piece of diabetes', '500', 'kidsMenu', '3');
INSERT INTO `menu` VALUES ('4', 'Sloppy joe\'s', 'Big piece of diabetes', '500', 'burgerSandwiches', '3');
INSERT INTO `menu` VALUES ('5', 'Balletjes', 'met tomatensaus', '500', 'beverages', '13');
INSERT INTO `menu` VALUES ('6', 'Sloppy joe\'s', 'Big piece of diabetes', '4', 'burgerSandwiches', '5');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of restaurant
-- ----------------------------
INSERT INTO `restaurant` VALUES ('1', 'Segers', 'Em van der velde straat', '97', '2830', 'Willebroek', 'kimberlygs@hotmail.be', 'www.hallo.com', '0', '0', '0');
INSERT INTO `restaurant` VALUES ('2', 'Segers', 'Em van der velde straat', '97', '2830', 'Willebroek', 'kimberlygs@hotmail.be', 'www.hallo.com', '0', '0', '0');
INSERT INTO `restaurant` VALUES ('3', 'Pizza Hut', 'Markt', '3', '1840', 'Londerzeel', 'pizzahut@pizza.be', 'www.pizza.be', '25', '0', '0');
INSERT INTO `restaurant` VALUES ('4', 'burger', 'burger', '32', '1743', 'burger', 'burger@hotmail.com', 'www.burger.be', '25', '0', '0');
INSERT INTO `restaurant` VALUES ('5', 'Taco Bell', 'Chickens', '21', '4312', 'qebtrsgd', 'tacoballs@hotmail.com', 'www.tacoballs.be', '25', '0', '0');
INSERT INTO `restaurant` VALUES ('6', 'Pizza Hut', 'burger', '21', '1743', 'Coin', 'ebsdg@erqbf.com', 'www.wbtsg.gerf', '25', '0', '0');
INSERT INTO `restaurant` VALUES ('7', 'Pizza Hut', 'burger', '21', '1743', 'Coin', 'ebsdg@erqbf.com', 'www.wbtsg.gerf', '25', '0', '0');
INSERT INTO `restaurant` VALUES ('8', 'Pizza Hut', 'burger', '21', '1743', 'Coin', 'ebsdg@erqbf.com', 'www.wbtsg.gerf', '25', '0', '0');
INSERT INTO `restaurant` VALUES ('9', 'Pizza Hut', 'burger', '21', '1743', 'Coin', 'ebsdg@erqbf.com', 'www.wbtsg.gerf', '25', '0', '0');
INSERT INTO `restaurant` VALUES ('10', 'Pizza Hut', 'burger', '21', '1743', 'Coin', 'ebsdg@erqbf.com', 'www.wbtsg.gerf', '25', '0', '0');
INSERT INTO `restaurant` VALUES ('11', 'Pizza Hut', 'burger', '21', '1743', 'Coin', 'ebsdg@erqbf.com', 'www.wbtsg.gerf', '25', '0', '0');
INSERT INTO `restaurant` VALUES ('12', 'Pizza Hut', 'burger', '21', '1743', 'Coin', 'ebsdg@erqbf.com', 'www.wbtsg.gerf', '25', '0', '0');
INSERT INTO `restaurant` VALUES ('13', 'Pizza Hut', 'burger', '21', '1743', 'Coin', 'ebsdg@erqbf.com', 'www.wbtsg.gerf', '25', '0', '0');
INSERT INTO `restaurant` VALUES ('14', 'Big joe\'s', 'Fancy street', '14', '4212', 'Joe Street', 'bigjoe@gmail.com', 'www.bigjoe.com', '25', '0', '0');
INSERT INTO `restaurant` VALUES ('15', 'Big joe\'s', 'Fancy street', '14', '4212', 'Joe Street', 'bigjoe@gmail.com', 'www.bigjoe.com', '25', '0', '0');
INSERT INTO `restaurant` VALUES ('16', 'Big joe\'s', 'Fancy street', '3', '1743', 'Joe Street', 'burger@hotmail.com', 'www.bigjoe.com', '25', '0', '0');
INSERT INTO `restaurant` VALUES ('17', 'Big joe\'s', 'Fancy street', '3', '1743', 'Joe Street', 'burger@hotmail.com', 'www.bigjoe.com', '25', '0', '0');
INSERT INTO `restaurant` VALUES ('18', 'Big joe\'s', 'Fancy street', '3', '1743', 'Joe Street', 'burger@hotmail.com', 'www.bigjoe.com', '25', '0', '0');
INSERT INTO `restaurant` VALUES ('19', 'Pizza Hut', 'Fancy street', '3', '4212', 'burger', 'pizzahut@pizza.be', 'www.tacoballs.be', '25', '0', '0');
INSERT INTO `restaurant` VALUES ('20', 'Pizza Hut', 'Fancy street', '3', '4212', 'burger', 'pizzahut@pizza.be', 'www.tacoballs.be', '25', '0', '0');
INSERT INTO `restaurant` VALUES ('21', 'New restaurant', 'Londerzeel', '13', '1840', 'Londerzeel', 'bigjoe@gmail.com', 'www.wbtsg.gerf', '25', '0', '0');
INSERT INTO `restaurant` VALUES ('22', 'New test restaurant', 'testing ', '33', '4325', 'Testing City', 'testingrestaurant@yahoo.com', 'www.testingrestaurant.com', '25', '0', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of table
-- ----------------------------
INSERT INTO `table` VALUES ('1', '7', '4', 'Occupied', 'A nice view out the window', '3');
INSERT INTO `table` VALUES ('2', '7', '4', 'Occupied', 'A nice view out the window', '3');
