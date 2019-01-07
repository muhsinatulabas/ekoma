/*
 Navicat Premium Data Transfer

 Source Server         : mysql_project
 Source Server Type    : MySQL
 Source Server Version : 50721
 Source Host           : 127.0.0.1
 Source Database       : ekonomi_maju

 Target Server Type    : MySQL
 Target Server Version : 50721
 File Encoding         : utf-8

 Date: 01/04/2019 11:39:39 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `album_gallery`
-- ----------------------------
DROP TABLE IF EXISTS `album_gallery`;
CREATE TABLE `album_gallery` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `album` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `album_gallery`
-- ----------------------------
BEGIN;
INSERT INTO `album_gallery` VALUES ('1', 'Pelantikan Pengurus Lembaga dan Badan Khusus PWNU Jawa Timur 2018 - 2023');
COMMIT;

-- ----------------------------
--  Table structure for `gallery`
-- ----------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `foto` varchar(200) DEFAULT NULL,
  `fid_album` int(20) DEFAULT NULL,
  `caption` varchar(200) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `fid_user` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `gallery`
-- ----------------------------
BEGIN;
INSERT INTO `gallery` VALUES ('1', 'gallery/PMcmN0e000a9p2XRamcxGm42FiPBkdFTvtyaYt9L.jpeg', '1', 'test', '2018-12-20 00:00:00', '1');
COMMIT;

-- ----------------------------
--  Table structure for `kategori_post`
-- ----------------------------
DROP TABLE IF EXISTS `kategori_post`;
CREATE TABLE `kategori_post` (
  `fid_posting` int(20) NOT NULL,
  `fid_kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`fid_posting`,`fid_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `kategori_post`
-- ----------------------------
BEGIN;
INSERT INTO `kategori_post` VALUES ('1', '1'), ('1', '3'), ('2', '4'), ('2', '5'), ('3', '5'), ('3', '6'), ('5', '1'), ('5', '3'), ('6', '2'), ('6', '4'), ('7', '2'), ('7', '3'), ('7', '5');
COMMIT;

-- ----------------------------
--  Table structure for `m_badan_usaha`
-- ----------------------------
DROP TABLE IF EXISTS `m_badan_usaha`;
CREATE TABLE `m_badan_usaha` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `badan_usaha` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `m_badan_usaha`
-- ----------------------------
BEGIN;
INSERT INTO `m_badan_usaha` VALUES ('1', 'Perseroan Terbatas (PT)'), ('2', 'Persekutuan Komanditer (CV)'), ('3', 'Koperasi'), ('4', 'Yayasan'), ('5', 'Usaha Dagang (UD)');
COMMIT;

-- ----------------------------
--  Table structure for `m_hak_akses`
-- ----------------------------
DROP TABLE IF EXISTS `m_hak_akses`;
CREATE TABLE `m_hak_akses` (
  `id` int(20) NOT NULL,
  `hak_akses` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `m_hak_akses`
-- ----------------------------
BEGIN;
INSERT INTO `m_hak_akses` VALUES ('1', 'Administrator'), ('2', 'Operator PW LPNU'), ('3', 'Operator PC LPNU');
COMMIT;

-- ----------------------------
--  Table structure for `m_jabatan`
-- ----------------------------
DROP TABLE IF EXISTS `m_jabatan`;
CREATE TABLE `m_jabatan` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `m_jabatan`
-- ----------------------------
BEGIN;
INSERT INTO `m_jabatan` VALUES ('1', 'Pembina'), ('2', 'Ketua'), ('3', 'Wakil Ketua'), ('4', 'Sekretaris'), ('5', 'Wakil Sekretaris'), ('6', 'Bendahara'), ('7', 'Wakil Bendahara'), ('8', 'Anggota Bidang Koperasi'), ('9', 'Anggota Bidang Industri dan Ekonomi Kreatif'), ('10', 'Anggota Bidang Perdagangan dan Jasa'), ('11', 'Anggota Bidang Perkembangan Sumber Daya Manusia');
COMMIT;

-- ----------------------------
--  Table structure for `m_jenis_perusahaan`
-- ----------------------------
DROP TABLE IF EXISTS `m_jenis_perusahaan`;
CREATE TABLE `m_jenis_perusahaan` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `jenis_perusahaan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `m_kategori_post`
-- ----------------------------
DROP TABLE IF EXISTS `m_kategori_post`;
CREATE TABLE `m_kategori_post` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `m_kategori_post`
-- ----------------------------
BEGIN;
INSERT INTO `m_kategori_post` VALUES ('1', 'Ekonomi Pesantren'), ('2', 'Koperasi'), ('3', 'Ekspor Impor'), ('4', 'Ekonomi Kreatif'), ('5', 'Investasi'), ('6', 'Agrobisnis');
COMMIT;

-- ----------------------------
--  Table structure for `m_level_pengusaha`
-- ----------------------------
DROP TABLE IF EXISTS `m_level_pengusaha`;
CREATE TABLE `m_level_pengusaha` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `level_pengusaha` varchar(200) DEFAULT NULL,
  `color` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `m_level_pengusaha`
-- ----------------------------
BEGIN;
INSERT INTO `m_level_pengusaha` VALUES ('1', 'Pengusaha UMKM', '#2ecc71'), ('2', 'Pengusaha Menengah', '#2980b9'), ('3', 'Pengusaha Besar', '#c0392b');
COMMIT;

-- ----------------------------
--  Table structure for `m_modul`
-- ----------------------------
DROP TABLE IF EXISTS `m_modul`;
CREATE TABLE `m_modul` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nama_modul` varchar(200) DEFAULT NULL,
  `parent` int(20) DEFAULT NULL,
  `icon` varchar(200) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `m_modul`
-- ----------------------------
BEGIN;
INSERT INTO `m_modul` VALUES ('1', 'Berita', '0', 'icon-cup', '3', 'post/berita/list'), ('2', 'Agenda', '0', 'icon-calendar', '4', 'post/agenda/list'), ('3', 'Artikel', '0', 'icon-book-open', '5', 'post/artikel/list'), ('4', 'Infografis', '0', 'icon-pie-chart', '6', 'post/infografis/list'), ('5', 'Video', '0', 'icon-camrecorder\nicon-camrecorder\n', '7', 'post/video/list'), ('6', 'Tentang Kami', '0', 'icon-globe', '1', '#'), ('7', 'Selayang Pandang', '6', null, '1', 'about/selayang-pandang'), ('8', 'Visi dan Misi', '6', null, '2', 'about/visi-misi'), ('9', 'Susunan Pengurus', '6', null, '3', 'about/pengurus'), ('10', 'Gallery', '6', null, '4', 'about/gallery'), ('11', 'Kontak Kami', '0', ' icon-envelope-letter\n', '8', 'kontak'), ('12', 'Pengusaha NU', '0', 'icon-basket', '2', 'pengusaha/list'), ('13', 'Quote', '0', 'icon-speech', '9', 'quote'), ('14', 'PC LPNU', '0', 'icon-location-pin', '2', 'pc-lpnu/list');
COMMIT;

-- ----------------------------
--  Table structure for `m_user`
-- ----------------------------
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `fid_hak_akses` int(20) DEFAULT NULL,
  `fid_pc_lpnu` int(20) DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `m_user`
-- ----------------------------
BEGIN;
INSERT INTO `m_user` VALUES ('1', 'Administrator', 'admin', 'eyJpdiI6IkZibkJBZktOMHNEY1dETGdyR0I1d1E9PSIsInZhbHVlIjoiNTMxM0drUFBRbUpKVjJBbTNySDc5UT09IiwibWFjIjoiYzA4YzNiODI3NGNhNzQ4Zjk5MmVkMWJhNzAzNTY4YTNkMTI3NzFkODI2NzNkYTc3MjRhN2ZjNTRmODMwMWYzYSJ9', '1', '0', '---', '081252837553', 'elvalah050692@gmail.com'), ('2', 'Fauzi Priambodo', 'fauzi', 'eyJpdiI6IlBTRnJJUzBkNUpFUDNEaGw4YlA3dmc9PSIsInZhbHVlIjoibkJ1UzUyMUNmVXZxNlhURUhLUFF2UT09IiwibWFjIjoiOGE2ODI4YjFjN2Y1Yjc5MDNhM2Q1MzAyYjJmMzkyMDhjZTY5MDZjODAwNmQzNzMwNWVjOTk3M2VmZGJkMzg3NCJ9', '1', '0', null, '---', '---');
COMMIT;

-- ----------------------------
--  Table structure for `multiple_post`
-- ----------------------------
DROP TABLE IF EXISTS `multiple_post`;
CREATE TABLE `multiple_post` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) DEFAULT NULL,
  `content` text,
  `fid_user` int(20) DEFAULT NULL,
  `fid_pc_lpnu` int(20) DEFAULT NULL,
  `fid_modul` int(20) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL,
  `sumber` text,
  `headline` int(20) DEFAULT NULL,
  `link_video` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `multiple_post`
-- ----------------------------
BEGIN;
INSERT INTO `multiple_post` VALUES ('1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p>Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.</p>\r\n<p>Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.</p>\r\n<p>Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.</p>', '1', '0', '1', '2018-12-15 08:37:07', 'posting/m9EJ56TqUG6cjS7ZHdJUOYARpAKMHmbTsbHp5t3V.jpeg', 'Tim Jurnalis LPNU Jatim', '1', null), ('2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p>Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.</p>\r\n<p>Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.</p>\r\n<p>Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.</p>', '1', '0', '1', '2018-12-15 08:39:00', 'posting/F2dBgUzObrontyP8E4Xw5uaasvK09YH6VPfRBS2W.jpeg', 'Tim Jurnalis LPNU Jatim', null, null), ('3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p>Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.</p>\r\n<p>Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.</p>\r\n<p>Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.</p>\r\n<p>&nbsp;</p>', '1', '0', '1', '2018-12-15 08:40:13', 'posting/BFB54jW1zjYNQvsMhkWzopVUuJCrzn0U89KN181q.jpeg', 'Tim Jurnalis LPNU Jatim', null, null), ('4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p>Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.</p>\r\n<p>Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.</p>', '1', '0', '1', '2018-12-15 08:41:34', 'posting/Lrq9iJY8M2AaJqhRtvha8GPcqsCjEfniErZI3UXy.jpeg', null, null, null), ('5', 'There are many variations of passages of Lorem Ipsum available variations.', '<p>Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.</p>\r\n<p>Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.</p>', '1', '0', '2', '2018-12-15 08:42:47', 'posting/avp6YHJcsWrIEZiWYTqBicuC9UyCzEscLxew7xBS.jpeg', 'Tim Jurnalis LPNU Jatim', null, null), ('6', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p>Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.</p>\r\n<p>Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.</p>\r\n<p>Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.</p>', '1', '0', '2', '2018-12-15 08:43:42', 'posting/dKyY23860Xj9j4nIzwODXwDqV8OM6o2ZP85YKFvN.jpeg', 'Tim Jurnalis LPNU Jatim', null, null), ('7', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry asdhadajdh', '<p>Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.</p>\r\n<p>Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.Politicans have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as flood tourists at the side of disasters.</p>', '1', '0', '2', '2018-12-15 09:11:35', 'posting/zZxaMurCSXHtHpaXNXQO1gPSH91V6Ufx4OSbiwdq.jpeg', 'Tim Jurnalis LPNU Jatim', '1', null);
COMMIT;

-- ----------------------------
--  Table structure for `pc_lpnu`
-- ----------------------------
DROP TABLE IF EXISTS `pc_lpnu`;
CREATE TABLE `pc_lpnu` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nama_cabang` varchar(200) DEFAULT NULL,
  `ketua` varchar(200) DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `deskripsi` text,
  `foto_ketua` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `pengurus_lpnu`
-- ----------------------------
DROP TABLE IF EXISTS `pengurus_lpnu`;
CREATE TABLE `pengurus_lpnu` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `no_hp` varchar(200) DEFAULT NULL,
  `alamat` text,
  `fid_pc_lpnu` int(20) DEFAULT NULL,
  `fid_jabatan` int(20) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `pengusaha_nu`
-- ----------------------------
DROP TABLE IF EXISTS `pengusaha_nu`;
CREATE TABLE `pengusaha_nu` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nik` varchar(200) DEFAULT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `no_hp` varchar(200) DEFAULT NULL,
  `alamat` text,
  `fid_pc_lpnu` int(20) DEFAULT NULL,
  `fid_level_pengusaha` int(20) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `deskripsi` text,
  `title` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `pengusaha_nu`
-- ----------------------------
BEGIN;
INSERT INTO `pengusaha_nu` VALUES ('1', '7979878', 'Fauzi Priambodo', null, null, null, '0', '3', 'profil-pengusaha/GELvoFVvHZi8vgrfhQsWouCM0uyt3AJQM8F1zWrC.jpeg', null, 'Advertising');
COMMIT;

-- ----------------------------
--  Table structure for `quote`
-- ----------------------------
DROP TABLE IF EXISTS `quote`;
CREATE TABLE `quote` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `quote` text,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `jabatan` varchar(200) DEFAULT NULL,
  `tampil` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `quote`
-- ----------------------------
BEGIN;
INSERT INTO `quote` VALUES ('1', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', 'KH. Marqzuki Mustamar', 'profil-quote/wwtpUqjT7zKu4oLMgdyy8OUqTNUcVV0FMkTwQ8vh.jpeg', 'Ketua Tanfidziyah PWNU Jatim', '1');
COMMIT;

-- ----------------------------
--  Table structure for `single_post`
-- ----------------------------
DROP TABLE IF EXISTS `single_post`;
CREATE TABLE `single_post` (
  `id` int(20) NOT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `single_post`
-- ----------------------------
BEGIN;
INSERT INTO `single_post` VALUES ('1', 'Selayang Pandang', '---'), ('2', 'Visi', '---'), ('3', 'Misi', '---'), ('4', 'Email', '---'), ('5', 'No Handphone', '---'), ('6', 'Kantor LPNU Jawa Timur', '---'), ('7', 'Kantor PWNU Jawa Timur', '---'), ('8', 'Facebook', '---'), ('9', 'Twitter', '---'), ('10', 'Instagram', '---'), ('11', 'Youtube', '---');
COMMIT;

-- ----------------------------
--  Table structure for `unit_usaha`
-- ----------------------------
DROP TABLE IF EXISTS `unit_usaha`;
CREATE TABLE `unit_usaha` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `fid_pengusaha` int(20) DEFAULT NULL,
  `nama_perusahaan` varchar(200) DEFAULT NULL,
  `badan_hukum` varchar(200) DEFAULT NULL,
  `deskripsi` text,
  `logo_perusahaan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `unit_usaha`
-- ----------------------------
BEGIN;
INSERT INTO `unit_usaha` VALUES ('1', '1', 'hjhj', 'khkj', '---', 'logo-perusahaan/KQCaQ1u08Iy9MJ37B3WGYr9FN5Vkhg6Kuyt35Byw.jpeg');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
