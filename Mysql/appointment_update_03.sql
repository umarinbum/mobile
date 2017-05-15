/*
Navicat MySQL Data Transfer

Source Server         : Mysql2
Source Server Version : 100119
Source Host           : localhost:3306
Source Database       : appointment

Target Server Type    : MYSQL
Target Server Version : 100119
File Encoding         : 65001

Date: 2017-03-29 14:02:58
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
  `ad_id_doctor` int(10) DEFAULT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_admin
-- ----------------------------
INSERT INTO `tb_admin` VALUES ('1', 'test', '', null, null, null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_appointment
-- ----------------------------
INSERT INTO `tb_appointment` VALUES ('1', null, null, '1', '2017-03-23 11:33:23', null, '1', null, '2017-03-25', '12:00:00', '12:30:00', null, '2017-03-23 11:33:23', null, null, null, null, null, null, null, null);
INSERT INTO `tb_appointment` VALUES ('2', null, null, '1', '2017-03-23 11:37:54', null, '1', null, '2017-03-20', '08:30:00', '09:30:00', null, '2017-03-23 11:37:58', null, null, null, null, null, null, null, null);
INSERT INTO `tb_appointment` VALUES ('3', null, null, null, '2017-03-20 17:33:45', null, '16', null, '2017-03-20', '19:30:00', '20:00:00', null, '2017-03-20 17:33:45', null, null, null, null, null, null, null, null);
INSERT INTO `tb_appointment` VALUES ('4', null, null, null, null, null, '15', null, '2017-03-20', '08:30:00', '20:00:00', null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tb_appointment` VALUES ('5', null, null, null, '2017-03-21 15:33:43', null, '3', null, '2017-03-20', '08:30:00', '11:00:00', null, '2017-03-21 15:33:43', null, null, null, null, null, null, null, null);
INSERT INTO `tb_appointment` VALUES ('6', null, null, null, null, null, '5', null, '2017-03-20', '08:00:00', '09:30:00', null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for tb_clinic
-- ----------------------------
DROP TABLE IF EXISTS `tb_clinic`;
CREATE TABLE `tb_clinic` (
  `id_clinic` int(7) NOT NULL AUTO_INCREMENT,
  `name_clinic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_clinic`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_clinic
-- ----------------------------
INSERT INTO `tb_clinic` VALUES ('1', 'ศัลยกรรมตกแต่ง', '0');

-- ----------------------------
-- Table structure for tb_doctor
-- ----------------------------
DROP TABLE IF EXISTS `tb_doctor`;
CREATE TABLE `tb_doctor` (
  `id_doctor` int(7) NOT NULL AUTO_INCREMENT,
  `name_doctor` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_doctor`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_doctor
-- ----------------------------
INSERT INTO `tb_doctor` VALUES ('1', 'นพ.วิทวัส  อังคทะวานิช', '0');
INSERT INTO `tb_doctor` VALUES ('2', 'นพ.สมศักดิ์  ชุลีวัฒนะพงศ์', '0');
INSERT INTO `tb_doctor` VALUES ('3', 'นพ.สมบูรณ์  ธรรมรังรอง', '0');
INSERT INTO `tb_doctor` VALUES ('4', 'นพ.กรีชาติ  พรสินศิริรักษ์', '0');
INSERT INTO `tb_doctor` VALUES ('5', 'นพ.ไกรฤทธิ์  ติยะกุล', '0');
INSERT INTO `tb_doctor` VALUES ('6', 'นพ.กิตติชัย  ปิยารักษ์', '0');
INSERT INTO `tb_doctor` VALUES ('7', 'นพ.โชคชัย  อมรสวัสดิ์วัฒนา', '0');
INSERT INTO `tb_doctor` VALUES ('8', 'นพ.วิรัตน์  โอสถาเลิศ', '0');
INSERT INTO `tb_doctor` VALUES ('9', 'นพ.สุกิจ   วรธำรง', '0');
INSERT INTO `tb_doctor` VALUES ('10', 'นพ.ธวัชชัย  บุญพัฒนพงศ์', '0');
INSERT INTO `tb_doctor` VALUES ('11', 'นพ.สานิจ  พงคพนาไกร', '0');
INSERT INTO `tb_doctor` VALUES ('12', 'นพ.สุทัศน์   คุณวโรตม์', '0');
INSERT INTO `tb_doctor` VALUES ('13', 'นพ.วิเชียร  ว่องวงศ์ศรี', '0');
INSERT INTO `tb_doctor` VALUES ('14', 'นพ.พิชญ์   ไพบูลย์เกษมสุทธิ', '0');
INSERT INTO `tb_doctor` VALUES ('15', 'นพ.ศิริพงษ์      ลักขณาวงศ์', '0');
INSERT INTO `tb_doctor` VALUES ('16', 'นพ.ปราโมทย์  มนูรังสี', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_doctor_clinic
-- ----------------------------
INSERT INTO `tb_doctor_clinic` VALUES ('1', '1', '1', '0');
INSERT INTO `tb_doctor_clinic` VALUES ('2', '1', '2', '0');
INSERT INTO `tb_doctor_clinic` VALUES ('3', '1', '3', '0');
INSERT INTO `tb_doctor_clinic` VALUES ('4', '1', '4', '0');
INSERT INTO `tb_doctor_clinic` VALUES ('5', '1', '5', '0');
INSERT INTO `tb_doctor_clinic` VALUES ('6', '1', '6', '0');
INSERT INTO `tb_doctor_clinic` VALUES ('7', '1', '7', '0');
INSERT INTO `tb_doctor_clinic` VALUES ('8', '1', '8', '0');
INSERT INTO `tb_doctor_clinic` VALUES ('9', '1', '9', '0');
INSERT INTO `tb_doctor_clinic` VALUES ('10', '1', '10', '0');
INSERT INTO `tb_doctor_clinic` VALUES ('11', '1', '11', '0');
INSERT INTO `tb_doctor_clinic` VALUES ('12', '1', '12', '0');
INSERT INTO `tb_doctor_clinic` VALUES ('13', '1', '13', '0');
INSERT INTO `tb_doctor_clinic` VALUES ('14', '1', '14', '0');
INSERT INTO `tb_doctor_clinic` VALUES ('15', '1', '15', '0');
INSERT INTO `tb_doctor_clinic` VALUES ('16', '1', '16', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_treatment
-- ----------------------------
INSERT INTO `tb_treatment` VALUES ('1', '1', 'เสริมจมูก ', '', '');
INSERT INTO `tb_treatment` VALUES ('2', '1', 'แก้ไขจมูก', '', '');
INSERT INTO `tb_treatment` VALUES ('3', '1', 'ขูดจมูก', '', '');
INSERT INTO `tb_treatment` VALUES ('4', '1', 'ถอดจมูก', '', '');
INSERT INTO `tb_treatment` VALUES ('5', '1', 'แก้ไขปลายจมูกบางใส', '', '');
INSERT INTO `tb_treatment` VALUES ('6', '1', 'ตัดปีกจมูก', '', '');
INSERT INTO `tb_treatment` VALUES ('7', '1', 'ตัดกระดูกสันจมูก', '', '');
INSERT INTO `tb_treatment` VALUES ('8', '1', 'ปากแหว่งเพดานโหว่', '', '');
INSERT INTO `tb_treatment` VALUES ('9', '1', 'ลดขนาดจมูก', '', '');
INSERT INTO `tb_treatment` VALUES ('10', '1', 'ตา 2 ชั้น', '', '');
INSERT INTO `tb_treatment` VALUES ('11', '1', 'ลดถุงไขมันใต้ตา', '', '');
INSERT INTO `tb_treatment` VALUES ('12', '1', 'แก้ไขหนังตาตก', '', '');
INSERT INTO `tb_treatment` VALUES ('13', '1', 'แก้ไขยิ้มเห็นเหงือก', '', '');
INSERT INTO `tb_treatment` VALUES ('14', '1', 'ตกแต่งริมฝีปาก', '', '');
INSERT INTO `tb_treatment` VALUES ('15', '1', 'ปากกระจับ', '', '');
INSERT INTO `tb_treatment` VALUES ('16', '1', 'ฉีดไขมันแก้ม', '', '');
INSERT INTO `tb_treatment` VALUES ('17', '1', 'ตัดไขมันกระพุ้งแก้ม', '', '');
INSERT INTO `tb_treatment` VALUES ('18', '1', 'เสริมโหนกแก้ม ', '', '');
INSERT INTO `tb_treatment` VALUES ('19', '1', 'ลดโหนกแก้ม', '', '');
INSERT INTO `tb_treatment` VALUES ('20', '1', 'ทำลักยิ้ม ', '', '');
INSERT INTO `tb_treatment` VALUES ('21', '1', 'กรอหน้า', '', '');
INSERT INTO `tb_treatment` VALUES ('22', '1', 'ตัดกระเดือก', '', '');
INSERT INTO `tb_treatment` VALUES ('23', '1', 'เสริมขมับ', '', '');
INSERT INTO `tb_treatment` VALUES ('24', '1', 'ลดโหนกคิ้วสูง', '', '');
INSERT INTO `tb_treatment` VALUES ('25', '1', 'เสริมโหนกคิ้ว', '', '');
INSERT INTO `tb_treatment` VALUES ('26', '1', 'ฉีดไขมันที่หน้าผาก', '', '');
INSERT INTO `tb_treatment` VALUES ('27', '1', 'เสริมหน้าผาก', '', '');
INSERT INTO `tb_treatment` VALUES ('28', '1', 'แก้ไขรอยย่นบริเวณหัวคิ้ว', '', '');
INSERT INTO `tb_treatment` VALUES ('29', '1', 'ดึงคอ ', '', '');
INSERT INTO `tb_treatment` VALUES ('30', '1', 'ดึงหน้า', '', '');
INSERT INTO `tb_treatment` VALUES ('31', '1', 'ดึงหน้าผาก ', '', '');
INSERT INTO `tb_treatment` VALUES ('32', '1', 'เสริมคาง', '', '');
INSERT INTO `tb_treatment` VALUES ('33', '1', 'ถอดคาง', '', '');
INSERT INTO `tb_treatment` VALUES ('34', '1', 'ขูดคางที่ฉีด', '', '');
INSERT INTO `tb_treatment` VALUES ('35', '1', 'ดูดไขมันคาง', '', '');
INSERT INTO `tb_treatment` VALUES ('36', '1', 'แก้ไขคาง', '', '');
INSERT INTO `tb_treatment` VALUES ('37', '1', 'แก้ไขคางบุ๋ม', '', '');
INSERT INTO `tb_treatment` VALUES ('38', '1', 'ตัดมุมกราม', '', '');
INSERT INTO `tb_treatment` VALUES ('39', '1', 'เหลาคางแก้คางเหลี่ยม ', '', '');
INSERT INTO `tb_treatment` VALUES ('40', '1', 'เลื่อนกรามล่าง', '', '');
INSERT INTO `tb_treatment` VALUES ('41', '1', 'แก้คางยื่น ', '', '');
INSERT INTO `tb_treatment` VALUES ('42', '1', 'ตัดคาง', '', '');
INSERT INTO `tb_treatment` VALUES ('43', '1', 'เสริมกราม', '', '');
INSERT INTO `tb_treatment` VALUES ('44', '1', 'เสริมหน้าอก', '', '');
INSERT INTO `tb_treatment` VALUES ('45', '1', 'แก้ไขหน้าอก', '', '');
INSERT INTO `tb_treatment` VALUES ('46', '1', 'ลดขนาดหน้าอก', '', '');
INSERT INTO `tb_treatment` VALUES ('47', '1', 'แก้ไขหัวนมบอด ', '', '');
INSERT INTO `tb_treatment` VALUES ('48', '1', 'แต่งหัวนม', '', '');
INSERT INTO `tb_treatment` VALUES ('49', '1', 'แต่งปานนม', '', '');
INSERT INTO `tb_treatment` VALUES ('50', '1', 'ผ่าตัดสร้างหัวนม ', '', '');
INSERT INTO `tb_treatment` VALUES ('51', '1', 'ตัดก้อนเต้านม ชาย ', '', '');
INSERT INTO `tb_treatment` VALUES ('52', '1', 'ดูดไขมันหน้าอก ', '', '');
INSERT INTO `tb_treatment` VALUES ('53', '1', 'แก้ไขหน้าอกหย่อนยาน ', '', '');
INSERT INTO `tb_treatment` VALUES ('54', '1', 'ตัดไขมันหน้าท้อง', '', '');
INSERT INTO `tb_treatment` VALUES ('55', '1', 'เลเซอร์ลดท้องลาย', '', '');
INSERT INTO `tb_treatment` VALUES ('56', '1', 'ตกแต่งสะดือ', '', '');
INSERT INTO `tb_treatment` VALUES ('57', '1', 'เจาะสะดือ', '', '');
INSERT INTO `tb_treatment` VALUES ('58', '1', 'เจาะหู', '', '');
INSERT INTO `tb_treatment` VALUES ('59', '1', 'เย็บปิดรูหูข้างเดียว', '', '');
INSERT INTO `tb_treatment` VALUES ('60', '1', 'แก้ไขก้นหย่อนยาน', '', '');
INSERT INTO `tb_treatment` VALUES ('61', '1', 'ผ่าตัดต้นขาหย่อนยาน', '', '');
INSERT INTO `tb_treatment` VALUES ('62', '1', 'ผ่าตัดท้องแขนหย่อนยาน', '', '');
INSERT INTO `tb_treatment` VALUES ('63', '1', 'ยกริมฝปากบน', '', '');
INSERT INTO `tb_treatment` VALUES ('64', '1', 'แต่งเล็บ', '', '');
INSERT INTO `tb_treatment` VALUES ('65', '1', 'ไฝ', '', '');
INSERT INTO `tb_treatment` VALUES ('66', '1', 'ฉีดยาละลายแผลเป็น', '', '');
INSERT INTO `tb_treatment` VALUES ('67', '1', 'กำจัดต่อมกลิ่น', '', '');
INSERT INTO `tb_treatment` VALUES ('68', '1', 'ดูดไขมัน', '', '');
INSERT INTO `tb_treatment` VALUES ('69', '1', 'ตัดไขมัน', '', '');
INSERT INTO `tb_treatment` VALUES ('70', '1', 'ฉีดไขมันก้น', '', '');
INSERT INTO `tb_treatment` VALUES ('71', '1', 'หูกาง ', '', '');
INSERT INTO `tb_treatment` VALUES ('72', '1', 'เสริมสะโพก', '', '');
INSERT INTO `tb_treatment` VALUES ('73', '1', 'แผลเป็น', '', '');
INSERT INTO `tb_treatment` VALUES ('74', '1', 'แปลงเพศชายเป็นหญิง', '', '');
INSERT INTO `tb_treatment` VALUES ('75', '1', 'แปลงเพศหญิงเป็นชาย', '', '');
INSERT INTO `tb_treatment` VALUES ('76', '1', 'ตัดกราม', '', '');
INSERT INTO `tb_treatment` VALUES ('77', '1', 'V-Shape', '', '');
INSERT INTO `tb_treatment` VALUES ('78', '1', 'แก้ไขความพิการผิดรูปของ ‘นิ้ว’', '', '');
INSERT INTO `tb_treatment` VALUES ('79', '1', 'Botox', '', '');
SET FOREIGN_KEY_CHECKS=1;
