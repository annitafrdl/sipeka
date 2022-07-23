/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : db_sipeka

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 24/07/2022 03:06:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for jenis_kas
-- ----------------------------
DROP TABLE IF EXISTS `jenis_kas`;
CREATE TABLE `jenis_kas`  (
  `id_jenis_kas` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_jenis_kas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jenis_kas
-- ----------------------------
INSERT INTO `jenis_kas` VALUES (1, 'Parkir');
INSERT INTO `jenis_kas` VALUES (3, 'Keamanan');
INSERT INTO `jenis_kas` VALUES (4, 'Karcis Pasar');

-- ----------------------------
-- Table structure for tbl_transaksi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_transaksi`;
CREATE TABLE `tbl_transaksi`  (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `thn_bln` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `minggu` int(11) NULL DEFAULT NULL,
  `pengeluaran` double NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `persentase_pengelola` int(11) NULL DEFAULT NULL,
  `persentase_petugas` int(11) NULL DEFAULT NULL,
  `jumlah_pengelola` double NULL DEFAULT NULL,
  `jumlah_petugas` double NULL DEFAULT NULL,
  `jumlah` double NULL DEFAULT NULL,
  `jumlah_bersih` double NULL DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_transaksi
-- ----------------------------
INSERT INTO `tbl_transaksi` VALUES (4, '2022-11', 1, 0, '2022-07-03', 60, 40, 474000, 316000, 790000, NULL);
INSERT INTO `tbl_transaksi` VALUES (5, '2022-11', 1, 0, '2022-07-24', 40, 60, 154000, 231000, 385000, NULL);

-- ----------------------------
-- Table structure for tbl_transaksi_jenis
-- ----------------------------
DROP TABLE IF EXISTS `tbl_transaksi_jenis`;
CREATE TABLE `tbl_transaksi_jenis`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) NULL DEFAULT NULL,
  `id_jenis_kas` int(11) NULL DEFAULT NULL,
  `kas_masuk` double NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_transaksi_jenis
-- ----------------------------
INSERT INTO `tbl_transaksi_jenis` VALUES (10, 4, 4, 390000);
INSERT INTO `tbl_transaksi_jenis` VALUES (11, 4, 3, 400000);
INSERT INTO `tbl_transaksi_jenis` VALUES (12, 5, 1, 385000);

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nik` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `nohp` varchar(14) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `foto` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `role` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL COMMENT '0 = Tidak Aktif, 1 = Aktif',
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (7, 'dewa', '123', 'Admin Cantiks', '1231', 'asd', '19', NULL, '0', 1);

-- ----------------------------
-- Table structure for thn_bln
-- ----------------------------
DROP TABLE IF EXISTS `thn_bln`;
CREATE TABLE `thn_bln`  (
  `id_thn_bln` int(11) NOT NULL AUTO_INCREMENT,
  `thn_bln` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_thn_bln`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of thn_bln
-- ----------------------------
INSERT INTO `thn_bln` VALUES (2, '2022-08');
INSERT INTO `thn_bln` VALUES (5, '2022-11');
INSERT INTO `thn_bln` VALUES (7, '2022-09');

SET FOREIGN_KEY_CHECKS = 1;
