/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : staff

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 11/12/2020 18:08:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for quiz
-- ----------------------------
DROP TABLE IF EXISTS `quiz`;
CREATE TABLE `quiz`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `available` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `score` int(11) NULL DEFAULT 100,
  `duration` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `create_time` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of quiz
-- ----------------------------
INSERT INTO `quiz` VALUES (1, 'SQL', 'Peter', 'Yes', 100, '60 minutes', '2020-12-11 15:50:52');
INSERT INTO `quiz` VALUES (4, 'SQL3', 'JANE', 'Yes', 100, '30 minutes', '2020-12-10 21:56:53');

-- ----------------------------
-- Table structure for quiz_question
-- ----------------------------
DROP TABLE IF EXISTS `quiz_question`;
CREATE TABLE `quiz_question`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `right_answer` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `create_time` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `quiz_id`(`quiz_id`) USING BTREE,
  CONSTRAINT `quiz_question_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of quiz_question
-- ----------------------------
INSERT INTO `quiz_question` VALUES (1, 1, 'which can extract data\r\nA. select\r\nB. delete', 'A', '2020-12-10 20:33:46');
INSERT INTO `quiz_question` VALUES (3, 1, 'sql best ', 'best', '2020-12-10 21:05:12');
INSERT INTO `quiz_question` VALUES (4, 4, 'WHAT IS MYSQL\r\nA:SOFTWARE\r\nB:language', 'A', '2020-12-10 21:57:25');
INSERT INTO `quiz_question` VALUES (5, 4, 'TEST', '1', '2020-12-10 21:57:38');

-- ----------------------------
-- Table structure for student_answer
-- ----------------------------
DROP TABLE IF EXISTS `student_answer`;
CREATE TABLE `student_answer`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `quiz_id` int(11) NULL DEFAULT NULL,
  `question_id` int(11) NULL DEFAULT NULL,
  `answer` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `score` int(11) NULL DEFAULT NULL,
  `create_time` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `quiz_id`(`quiz_id`) USING BTREE,
  INDEX `question_id`(`question_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `student_answer_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `student_answer_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `quiz_question` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `student_answer_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student_answer
-- ----------------------------
INSERT INTO `student_answer` VALUES (8, 10, 1, 1, 'A', 50, '2020-12-10 21:24:31');
INSERT INTO `student_answer` VALUES (9, 10, 1, 3, '1', 0, '2020-12-10 21:24:31');
INSERT INTO `student_answer` VALUES (10, 12, 1, 1, 'A', 50, '2020-12-10 21:58:05');
INSERT INTO `student_answer` VALUES (11, 12, 1, 3, '1111', 0, '2020-12-10 21:58:05');
INSERT INTO `student_answer` VALUES (12, 12, 4, 4, '1', 0, '2020-12-10 22:00:16');
INSERT INTO `student_answer` VALUES (13, 12, 4, 5, '1', 50, '2020-12-10 22:00:16');
INSERT INTO `student_answer` VALUES (14, 10, 4, 4, '1', 0, '2020-12-11 15:52:21');
INSERT INTO `student_answer` VALUES (15, 10, 4, 5, '1', 0, '2020-12-11 15:52:21');
INSERT INTO `student_answer` VALUES (16, 10, 4, 4, 'A', 0, '2020-12-11 15:52:26');
INSERT INTO `student_answer` VALUES (17, 10, 4, 5, '1', 0, '2020-12-11 15:52:26');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '用户名',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '密码',
  `role` enum('0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '角色',
  `create_time` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (8, 'staff', '123', '0', '2020-12-10 20:06:46');
INSERT INTO `user` VALUES (9, 'staff2', '123', '0', '2020-12-10 20:07:46');
INSERT INTO `user` VALUES (10, 'student', '123', '1', '2020-12-10 20:52:36');
INSERT INTO `user` VALUES (11, 'staff222', '123', '0', '2020-12-10 21:56:03');
INSERT INTO `user` VALUES (12, 'student2', '123', '1', '2020-12-10 21:57:51');

SET FOREIGN_KEY_CHECKS = 1;
