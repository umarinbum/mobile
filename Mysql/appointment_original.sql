/*
Navicat MySQL Data Transfer

Source Server         : Mysql2
Source Server Version : 100119
Source Host           : localhost:3306
Source Database       : appointment

Target Server Type    : MYSQL
Target Server Version : 100119
File Encoding         : 65001

Date: 2017-03-18 09:29:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_admin
-- ----------------------------
DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL AUTO_INCREMENT,
  `username_yhh_app` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_yhh_app` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_employee` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_position` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_doctor` int(10) DEFAULT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_admin
-- ----------------------------

-- ----------------------------
-- Table structure for tb_agent
-- ----------------------------
DROP TABLE IF EXISTS `tb_agent`;
CREATE TABLE `tb_agent` (
  `id_agent` int(7) NOT NULL AUTO_INCREMENT,
  `name_agent` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_agent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_agent
-- ----------------------------

-- ----------------------------
-- Table structure for tb_appointment
-- ----------------------------
DROP TABLE IF EXISTS `tb_appointment`;
CREATE TABLE `tb_appointment` (
  `id_appointment` int(10) NOT NULL AUTO_INCREMENT,
  `appoiment_by` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_member` int(10) DEFAULT NULL,
  `id_admin` int(10) DEFAULT NULL,
  `date_appointment` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_clinic` int(10) DEFAULT NULL,
  `id_doctor` int(10) DEFAULT NULL,
  `id_traetment` int(10) DEFAULT NULL,
  `allot_date` date DEFAULT NULL,
  `allot_time_start` time DEFAULT NULL,
  `allot_time_end` time DEFAULT NULL,
  `id_doctor_allotment` int(10) DEFAULT NULL,
  `datetime_create` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `appointment_firstname` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `appointment_lastname` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `appointment_telephone` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type_input` int(10) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `code_appointment` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `secret_code` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_status` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_appointment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_appointment
-- ----------------------------

-- ----------------------------
-- Table structure for tb_clinic
-- ----------------------------
DROP TABLE IF EXISTS `tb_clinic`;
CREATE TABLE `tb_clinic` (
  `id_clinic` int(7) NOT NULL AUTO_INCREMENT,
  `name_clinic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_clinic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_clinic
-- ----------------------------

-- ----------------------------
-- Table structure for tb_doctor
-- ----------------------------
DROP TABLE IF EXISTS `tb_doctor`;
CREATE TABLE `tb_doctor` (
  `id_doctor` int(7) NOT NULL AUTO_INCREMENT,
  `name_doctor` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_doctor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_doctor
-- ----------------------------

-- ----------------------------
-- Table structure for tb_doctor_allotment
-- ----------------------------
DROP TABLE IF EXISTS `tb_doctor_allotment`;
CREATE TABLE `tb_doctor_allotment` (
  `id_doctor_allotment` int(7) NOT NULL AUTO_INCREMENT,
  `id_clinic` int(7) NOT NULL,
  `id_doctor` int(7) NOT NULL,
  `allot_date` date DEFAULT NULL,
  `allot_start_time` time DEFAULT NULL,
  `allot_end_time` time DEFAULT NULL,
  `allot_limit` int(2) DEFAULT NULL,
  `allot_use` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_doctor_allotment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_doctor_allotment
-- ----------------------------

-- ----------------------------
-- Table structure for tb_doctor_clinic
-- ----------------------------
DROP TABLE IF EXISTS `tb_doctor_clinic`;
CREATE TABLE `tb_doctor_clinic` (
  `id_doctor_clinic` int(7) NOT NULL AUTO_INCREMENT,
  `id_clinic` int(7) NOT NULL,
  `id_doctor` int(7) NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_doctor_clinic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_doctor_clinic
-- ----------------------------

-- ----------------------------
-- Table structure for tb_log_appointment
-- ----------------------------
DROP TABLE IF EXISTS `tb_log_appointment`;
CREATE TABLE `tb_log_appointment` (
  `id_log_appointment` int(10) NOT NULL AUTO_INCREMENT,
  `id_appointment` int(10) DEFAULT NULL,
  `edit_field` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from_value` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_value` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edit_by` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edit_dy__id` int(10) DEFAULT NULL,
  `datetime_edit` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_log_appointment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_log_appointment
-- ----------------------------

-- ----------------------------
-- Table structure for tb_log_member_edit
-- ----------------------------
DROP TABLE IF EXISTS `tb_log_member_edit`;
CREATE TABLE `tb_log_member_edit` (
  `id_log_member_edit` int(10) NOT NULL AUTO_INCREMENT,
  `id_member` int(10) DEFAULT NULL,
  `edit_field` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from_value` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_value` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edit_by` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edit_by_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_log_member_edit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_log_member_edit
-- ----------------------------

-- ----------------------------
-- Table structure for tb_member
-- ----------------------------
DROP TABLE IF EXISTS `tb_member`;
CREATE TABLE `tb_member` (
  `id_member` int(7) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datebirth` date DEFAULT NULL,
  `telelphone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `register_datetime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_member
-- ----------------------------

-- ----------------------------
-- Table structure for tb_status
-- ----------------------------
DROP TABLE IF EXISTS `tb_status`;
CREATE TABLE `tb_status` (
  `id_status` int(10) NOT NULL AUTO_INCREMENT,
  `name_status` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_status
-- ----------------------------

-- ----------------------------
-- Table structure for tb_treatment
-- ----------------------------
DROP TABLE IF EXISTS `tb_treatment`;
CREATE TABLE `tb_treatment` (
  `id_treatment` int(7) NOT NULL AUTO_INCREMENT,
  `id_clinic` int(7) DEFAULT NULL,
  `name_treatment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tag_search` text COLLATE utf8_unicode_ci,
  `status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_treatment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_treatment
-- ----------------------------
SET FOREIGN_KEY_CHECKS=1;
