
create database IF NOT EXISTS `trangsuc`;
USE `trangsuc`;
DROP TABLE IF EXISTS `chudegopy`;
CREATE TABLE `chudegopy` (
  `cdgy_ma` int(11) NOT NULL AUTO_INCREMENT,
  `cdgy_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cdgy_ma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `gopy`;
CREATE TABLE `gopy` (
  `gy_ma` int(11) NOT NULL AUTO_INCREMENT,
  `gy_hoten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gy_email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gy_diachi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gy_dienthoai` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gy_tieude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gy_noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `gy_ngaygopy` datetime DEFAULT NULL,
  `cdgy_ma` int(11) NOT NULL,
  PRIMARY KEY (`gy_ma`),
  KEY `gopy_chudegopy_idx` (`cdgy_ma`),
  CONSTRAINT `gopy_chudegopy` FOREIGN KEY (`cdgy_ma`) REFERENCES `chudegopy` (`cdgy_ma`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `hinhthucthanhtoan`;
CREATE TABLE `hinhthucthanhtoan` (
  `httt_ma` int(11) NOT NULL AUTO_INCREMENT,
  `httt_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`httt_ma`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `thanhvien`;
CREATE TABLE `thanhvien` (
  `tv_tendangnhap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tv_matkhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tv_ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tv_gioitinh` varchar(3) NOT NULL,
  `tv_diachi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tv_dienthoai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tv_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tv_sinhnhat` date DEFAULT NULL,
  `tv_cmnd` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tv_trangthai` int(2) NOT NULL,
  `tv_quyen` varchar(2) NOT NULL ,
  PRIMARY KEY (`tv_tendangnhap`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE `donhang` (
  `dh_ma` int(11) NOT NULL AUTO_INCREMENT,
  `dh_ngaylap` datetime NOT NULL,
  `dh_ngaygiao` datetime DEFAULT NULL,
  `dh_noigiao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dh_dt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `dh_thanhtoan` int(2) NOT NULL,
  `dh_tongtien` decimal(10,0) NOT NULL,
  `dh_trangthai` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `httt_ma` int(11) NOT NULL,
  `tv_tendangnhap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`dh_ma`),
  KEY `donhang_thanhvien_idx` (`tv_tendangnhap`),
  KEY `donhang_hinhthucthanhtoan_idx` (`httt_ma`),
  CONSTRAINT `donhang_hinhthucthanhtoan` FOREIGN KEY (`httt_ma`) REFERENCES `hinhthucthanhtoan` (`httt_ma`),
  CONSTRAINT `donhang_thanhvien` FOREIGN KEY (`tv_tendangnhap`) REFERENCES `thanhvien` (`tv_tendangnhap`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `khuyenmai`;

CREATE TABLE `khuyenmai` (
  `km_ma` int(11) NOT NULL AUTO_INCREMENT,
  `km_ten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kh_noidung` text COLLATE utf8_unicode_ci,
  `kh_tungay` date DEFAULT NULL,
  `km_denngay` date DEFAULT NULL,
  PRIMARY KEY (`km_ma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `loaisanpham`;

CREATE TABLE `loaisanpham` (
  `lsp_ma` int(11) NOT NULL AUTO_INCREMENT,
  `lsp_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lsp_mota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`lsp_ma`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `nhacungcap`;

CREATE TABLE `nhacungcap` (
  `ncc_ma` int(11) NOT NULL AUTO_INCREMENT,
  `ncc_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ncc_mota` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ncc_ma`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `sanpham`;

CREATE TABLE `sanpham` (
  `sp_ma` int(11) NOT NULL AUTO_INCREMENT,
  `sp_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sp_gia` decimal(12,2) NOT NULL,
  `sp_mota_ngan` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `sp_mota_chitiet` text COLLATE utf8_unicode_ci,
  `sp_ngaycapnhat` datetime NOT NULL,
  `sp_soluong` int(11) DEFAULT NULL,
  `lsp_ma` int(11) NOT NULL,
  `ncc_ma` int(11) NOT NULL,
  `km_ma` int(11) DEFAULT NULL,
  PRIMARY KEY (`sp_ma`),
  KEY `sanpham_loaisanpham_idx` (`lsp_ma`),
  KEY `sanpham_nhacungcap_idx` (`ncc_ma`),
  KEY `sanpham_khuyenmai_idx` (`km_ma`),
  CONSTRAINT `sanpham_khuyenmai` FOREIGN KEY (`km_ma`) REFERENCES `khuyenmai` (`km_ma`) ON DELETE SET NULL ON UPDATE NO ACTION,
  CONSTRAINT `sanpham_loaisanpham` FOREIGN KEY (`lsp_ma`) REFERENCES `loaisanpham` (`lsp_ma`),
  CONSTRAINT `sanpham_nhacungcap` FOREIGN KEY (`ncc_ma`) REFERENCES `nhacungcap` (`ncc_ma`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `hinhsanpham`;
CREATE TABLE `hinhsanpham` (
  `hsp_ma` int(11) NOT NULL AUTO_INCREMENT,
  `hsp_tentaptin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sp_ma` int(11) NOT NULL,
  PRIMARY KEY (`hsp_ma`),
  KEY `fk_hinhsanpham_sanpham1_idx` (`sp_ma`),
  CONSTRAINT `fk_hinhsanpham_sanpham1` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `chitiet_donhang`;
CREATE TABLE `chitiet_donhang` (
  `sp_ma` int(11) NOT NULL,
  `dh_ma` int(11) NOT NULL,
  `ctdh_soluong` int(11) NOT NULL,
  `ctdh_dongia` decimal(12,2) NOT NULL,
  PRIMARY KEY (`sp_ma`,`dh_ma`),
  KEY `sanpham_chitiet_sanpham_idx` (`sp_ma`),
  KEY `sanpham_chitiet_donhang_idx` (`dh_ma`),
  CONSTRAINT `sanpham_chitiet_donhang` FOREIGN KEY (`dh_ma`) REFERENCES `donhang` (`dh_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sanpham_chitiet_sanpham` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`) ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
