-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2016 at 01:37 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `durable`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `CMPCD` varchar(6) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `CMPENAME` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `CMPLNAME` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `CMPEADDR` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `CMPLADDR` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `CMPTEL` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `CMPFAX` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `CMPUPDDAT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CMPUPDUSR` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '''INTITIAL'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`CMPCD`, `CMPENAME`, `CMPLNAME`, `CMPEADDR`, `CMPLADDR`, `CMPTEL`, `CMPFAX`, `CMPUPDDAT`, `CMPUPDUSR`) VALUES
('EPP', 'E Proplus Co.,Ltd.', 'บริษัท อีโปรพลัส จำกัด', '51/597,Moo 7, Lakhok, Muengpatoomthani, Patoomthani, 12000, ', '51/597 หมู่ที่ 7 ถนน', '(662) 9972', '(662) 9972', '0000-00-00 00:00:00', ''),
('EPro', 'e-Professional Co.,Ltd.', 'บริษัท อี โปรเฟสชั่นนัล จำกัด', '51/597,Moo 7, Lakhok, Muengpatoomthani, Patoomthani, 12000, ', '51/597 หมู่ที่ 7 ถนน', '(662)96270', '(662)96270', '0000-00-00 00:00:00', ''),
('HS', 'Hongson Software Co., Ltd.', 'บริษัท ฮ่องสอน ซอฟต์แวร์ จำกัด', '', '', '053-620-70', '053-620-70', '0000-00-00 00:00:00', ''),
('KK', 'Khonkaen Softtech Co., Ltd.', 'บริษัท ขอนแก่น ซอฟต์เทค จำกัด', '', '', '043-468-13', '043-468-13', '0000-00-00 00:00:00', ''),
('KSoft', 'K Soft Consulting Co.,Ltd.', 'บริษัท เคซอฟต์ คอนซัลติ้ง จำกัด', '51/597,Moo 7, Lakhok, Muengpatoomthani, Patoomthani, 12000, ', '51/597 หมู่ที่ 7 ถนน', '(662) 997-', '(662) 997-', '0000-00-00 00:00:00', ''),
('NSC', 'NSC Software Co., Ltd.', 'บริษัท เอ็นเอสซี ซอฟต์แวร์ จำกัด', '51/597,Moo 7, Lakhok, Muengpatoomthani, Patoomthani, 12000, ', '51/597 หมู่ที่ 7 ถนน', '(662) 9972', '(662) 9972', '0000-00-00 00:00:00', ''),
('RSS', 'Rangsit Soft Co., Ltd.', 'บริษัท รังสิต ซอฟต์ จำกัด', '51/597,Moo 7, Lakhok, Muengpatoomthani, Patoomthani, 12000, ', '51/597 หมู่ที่ 7 ถนน', '(662) 9972', '(662) 9972', '0000-00-00 00:00:00', ''),
('SI', 'Soft Square International Co,.ltd', 'บริษัท ซอฟต์สแควร์ อินเตอร์เนชั่นแนล จำกัด', '51/597,Moo 7, Lakhok, Muengpatoomthani, Patoomthani, 12000, ', '51/597 หมู่ที่ 7 ถนน', '(662) 9972', '(662) 9972', '0000-00-00 00:00:00', ''),
('SIC', 'Softinter Chiangrai Co., Ltd.', 'บริษัท ซอฟต์อินเตอร์ เชียงราย จำกัด', 'm.1 Tha Sut, Mueang Chiang Rai District, Chiang Rai 57100', '33 หมู่ที่ 1 ท่าสุด ', '053-913-10', '053-913-10', '0000-00-00 00:00:00', ''),
('SMS', 'Sam Mok Software Co., Ltd.', 'บริษัท สามหมอก ซอฟต์แวร์ จำกัด', '3, Padungmuaytor Rd., Mueng, Maehongson 58000', '3 ผดุงม่วยต่อ ตำบล จ', '053-620-70', '053-620-70', '0000-00-00 00:00:00', ''),
('SP', 'Soft Professional Co.,Ltd.', 'บริษัท ซอฟต์โปรเฟสชั่นแนล จำกัด', '', '', '', '', '0000-00-00 00:00:00', ''),
('SPT', 'Soft Plus Technologies Co.,Ltd.', 'บริษัท ซอฟต์พลัส เทคโนโลยี จำกัด', '51/597,Moo 7, Lakhok, Muengpatoomthani, Patoomthani, 12000, ', '51/597 หมู่ที่ 7 ถนน', '(662) 9972', '(662) 9972', '0000-00-00 00:00:00', ''),
('SS', 'Soft Square 1999 Co,.ltd', 'บริษัท ซอฟต์สแควร์ 1999 จำกัด', '51/597,Moo 7, Lakhok, Muengpatoomthani, Patoomthani, 12000, ', '51/597 หมู่ที่ 7 ถนน', '(662) 9972', '(662) 9972', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `depreciation`
--

CREATE TABLE `depreciation` (
  `DEPID` int(5) UNSIGNED NOT NULL,
  `CMPCD` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DRAID` int(5) NOT NULL,
  `DRAAMT` int(4) NOT NULL,
  `DRATYP` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Durable Type',
  `DEPDAT` date NOT NULL,
  `DEPLASTCST` decimal(15,2) DEFAULT NULL,
  `DEPLASTBV` decimal(15,2) DEFAULT NULL,
  `DEPLASTMNT` double DEFAULT NULL,
  `DEPCURMNT` double DEFAULT NULL,
  `DEPYEAR` int(4) DEFAULT NULL COMMENT 'Year',
  `DEPALLMNT` double DEFAULT NULL,
  `DEPACCDEPLAST` decimal(15,2) DEFAULT NULL,
  `DEPDEPPERMNT` decimal(15,2) DEFAULT NULL,
  `DEPACCDEPCUR` decimal(15,2) DEFAULT NULL,
  `DEPACCDEPALL` decimal(15,2) DEFAULT NULL,
  `DEPBVCUR` decimal(15,2) DEFAULT NULL,
  `DEPCREDAT` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `depreciation`
--

INSERT INTO `depreciation` (`DEPID`, `CMPCD`, `DRAID`, `DRAAMT`, `DRATYP`, `DEPDAT`, `DEPLASTCST`, `DEPLASTBV`, `DEPLASTMNT`, `DEPCURMNT`, `DEPYEAR`, `DEPALLMNT`, `DEPACCDEPLAST`, `DEPDEPPERMNT`, `DEPACCDEPCUR`, `DEPACCDEPALL`, `DEPBVCUR`, `DEPCREDAT`, `DEPCREUSR`, `DEPUPDDAT`, `DRAUPDUSR`) VALUES
(153, 'RSS', 1, 2, '1', '2013-08-01', '64000.00', '33066.67', 29, 7, 2016, 36, '30933.33', '1066.67', '7466.67', '38400.00', '25600.00', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(154, 'RSS', 2, 4, '1', '2013-08-01', '118000.00', '60966.67', 29, 7, 2016, 36, '57033.33', '1966.67', '13766.67', '70800.00', '47200.00', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(155, 'RSS', 3, 2, '1', '2013-08-01', '225000.00', '116250.00', 29, 7, 2016, 36, '108750.00', '3750.00', '26250.00', '135000.00', '90000.00', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(156, 'RSS', 4, 4, '1', '2013-08-01', '118000.00', '60966.67', 29, 7, 2016, 36, '57033.33', '1966.67', '13766.67', '70800.00', '47200.00', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(157, 'RSS', 5, 1, '1', '2013-08-01', '3299.00', '1704.48', 29, 7, 2016, 36, '1594.52', '54.98', '384.88', '1979.40', '1319.60', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(158, 'RSS', 6, 1, '1', '2013-08-01', '2470.00', '1276.17', 29, 7, 2016, 36, '1193.83', '41.17', '288.17', '1482.00', '988.00', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(159, 'RSS', 7, 1, '1', '2013-08-01', '29500.00', '15241.67', 29, 7, 2016, 36, '14258.33', '491.67', '3441.67', '17700.00', '11800.00', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(160, 'RSS', 8, 1, '1', '2013-08-01', '18600.00', '9610.00', 29, 7, 2016, 36, '8990.00', '310.00', '2170.00', '11160.00', '7440.00', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(161, 'RSS', 9, 1, '1', '2013-08-01', '15000.00', '7750.00', 29, 7, 2016, 36, '7250.00', '250.00', '1750.00', '9000.00', '6000.00', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(162, 'RSS', 10, 1, '1', '2013-08-01', '37580.00', '19416.33', 29, 7, 2016, 36, '18163.67', '626.33', '4384.33', '22548.00', '15032.00', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(163, 'RSS', 11, 1, '1', '2013-08-01', '8600.00', '4443.33', 29, 7, 2016, 36, '4156.67', '143.33', '1003.33', '5160.00', '3440.00', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(164, 'RSS', 12, 1, '1', '2013-08-30', '13290.00', '7088.00', 28, 7, 2016, 35, '6202.00', '221.50', '1550.50', '7752.50', '5537.50', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(165, 'RSS', 13, 3, '1', '2013-08-30', '60600.00', '32320.00', 28, 7, 2016, 35, '28280.00', '1010.00', '7070.00', '35350.00', '25250.00', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(166, 'RSS', 14, 5, '1', '2013-09-13', '151500.00', '80800.00', 28, 7, 2016, 35, '70700.00', '2525.00', '17675.00', '88375.00', '63125.00', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(167, 'RSS', 15, 1, '1', '2013-09-17', '11800.00', '6490.00', 27, 7, 2016, 34, '5310.00', '196.67', '1376.67', '6686.67', '5113.33', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(168, 'RSS', 16, 2, '1', '2013-10-31', '128400.00', '72760.00', 26, 7, 2016, 33, '55640.00', '2140.00', '14980.00', '70620.00', '57780.00', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(169, 'RSS', 17, 1, '1', '2013-11-28', '180000.00', '105000.00', 25, 7, 2016, 32, '75000.00', '3000.00', '21000.00', '96000.00', '84000.00', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(170, 'RSS', 18, 1, '1', '2014-03-25', '27000.00', '17550.00', 21, 7, 2016, 28, '9450.00', '450.00', '3150.00', '12600.00', '14400.00', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(171, 'RSS', 19, 1, '1', '2015-09-09', '23835.00', '22643.25', 3, 7, 2016, 10, '1191.75', '397.25', '2780.75', '3972.50', '19862.50', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(172, 'RSS', 20, 1, '1', '2015-10-15', '29000.00', '28033.33', 2, 7, 2016, 9, '966.67', '483.33', '3383.33', '4350.00', '24650.00', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(173, 'RSS', 21, 12, '2', '2013-07-08', '30600.00', '15300.00', 30, 7, 2016, 37, '15300.00', '510.00', '3570.00', '18870.00', '11730.00', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(174, 'RSS', 22, 4, '2', '2013-08-01', '16800.00', '8680.00', 29, 7, 2016, 36, '8120.00', '280.00', '1960.00', '10080.00', '6720.00', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(175, 'RSS', 23, 4, '2', '2013-08-01', '13920.00', '7192.00', 29, 7, 2016, 36, '6728.00', '232.00', '1624.00', '8352.00', '5568.00', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(176, 'RSS', 24, 1, '2', '2013-08-01', '9060.00', '4681.00', 29, 7, 2016, 36, '4379.00', '151.00', '1057.00', '5436.00', '3624.00', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(177, 'RSS', 25, 2, '2', '2013-08-29', '8800.00', '4693.33', 28, 7, 2016, 35, '4106.67', '146.67', '1026.67', '5133.33', '3666.67', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(178, 'RSS', 26, 2, '2', '2013-08-29', '7300.00', '3893.33', 28, 7, 2016, 35, '3406.67', '121.67', '851.67', '4258.33', '3041.67', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(179, 'RSS', 27, 20, '2', '2013-08-29', '57400.00', '30613.33', 28, 7, 2016, 35, '26786.67', '956.67', '6696.67', '33483.33', '23916.67', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(180, 'RSS', 28, 4, '2', '2013-09-01', '2200.00', '1173.33', 28, 7, 2016, 35, '1026.67', '36.67', '256.67', '1283.33', '916.67', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(181, 'RSS', 29, 1, '2', '2013-09-04', '27074.77', '14439.88', 28, 7, 2016, 35, '12634.89', '451.25', '3158.72', '15793.62', '11281.15', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL),
(182, 'RSS', 30, 3, '2', '2013-09-25', '17424.00', '9583.20', 27, 7, 2016, 34, '7840.80', '290.40', '2032.80', '9873.60', '7550.40', '2016-11-08 13:33:23.592281', NULL, '2016-11-08 13:33:23.592281', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `durablearticles`
--

CREATE TABLE `durablearticles` (
  `DRAID` int(5) UNSIGNED NOT NULL,
  `DRACD` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CMPCD` varchar(6) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `DRANAME` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DRAAMT` int(4) DEFAULT NULL,
  `DRATYP` varchar(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `DRADAT` date DEFAULT NULL,
  `DRARELDAT` date DEFAULT NULL,
  `DRAUNTPRC` decimal(10,2) DEFAULT NULL,
  `DRATOTPRC` decimal(10,2) NOT NULL,
  `DRASTAT` int(1) DEFAULT NULL,
  `DRADEPRT` int(2) DEFAULT NULL,
  `DRAACC` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `DRACREDAT` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `durablearticles`
--

INSERT INTO `durablearticles` (`DRAID`, `DRACD`, `CMPCD`, `DRANAME`, `DRAAMT`, `DRATYP`, `DRADAT`, `DRARELDAT`, `DRAUNTPRC`, `DRATOTPRC`, `DRASTAT`, `DRADEPRT`, `DRAACC`, `DRACREDAT`, `DRACREUSR`, `DRAUPDDAT`, `DRAUPDUSR`) VALUES
(1, '', 'RSS', 'Notebook DELL Latitude E6430', 2, '1', '2013-08-01', '2013-08-01', '32000.00', '64000.00', 0, 20, 'RN5608007', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(2, '', 'RSS', 'Notebook DELL Vostro 3460 BTX base', 4, '1', '2013-08-01', '2013-08-01', '29500.00', '118000.00', 0, 20, 'RN5608002', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(3, '', 'RSS', 'Server DELL TPM Moterboard R720', 2, '1', '2013-08-01', '2013-08-01', '112500.00', '225000.00', 0, 20, 'RN5608003', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(4, '', 'RSS', 'Notebook DELL Vostro 3460 BTX base', 4, '1', '2013-08-01', '2013-08-01', '29500.00', '118000.00', 0, 20, 'RN5608004', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(5, '', 'RSS', 'Monitor Dell E Series E1713S 17"', 1, '1', '2013-08-01', '2013-08-01', '3299.00', '3299.00', 0, 20, 'RN5608005', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(6, '', 'RSS', 'Kit Dell 96-key Server Keyboard ', 1, '1', '2013-08-01', '2013-08-01', '2470.00', '2470.00', 0, 20, 'RN5608005', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(7, '', 'RSS', 'Notebook DELL Vostro 3460 BTX base', 1, '1', '2013-08-01', '2013-08-01', '29500.00', '29500.00', 0, 20, 'RN5608006', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(8, '', 'RSS', 'Printer HP Laser Jet Pro M401 DN', 1, '1', '2013-08-01', '2013-08-01', '18600.00', '18600.00', 0, 20, 'RN5608008', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(9, '', 'RSS', 'LCD Projector SONY VPL-DX100', 1, '1', '2013-08-01', '2013-08-01', '15000.00', '15000.00', 0, 20, 'RN5608008', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(10, '', 'RSS', 'Notebook DELL Latitude 3330', 1, '1', '2013-08-01', '2013-08-01', '37580.00', '37580.00', 0, 20, 'RN5608009', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(11, '', 'RSS', 'Windows 8 Professional 64 Bit English OE', 1, '1', '2013-08-01', '2013-08-01', '8600.00', '8600.00', 0, 20, 'RN5608010', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(12, '', 'RSS', 'Windows 8 Professional 64 Bit English OE', 1, '1', '2013-08-30', '2013-08-30', '13290.00', '13290.00', 0, 20, 'RN5608016', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(13, '', 'RSS', 'Notebook DELL Latitude 3330', 3, '1', '2013-08-30', '2013-08-30', '20200.00', '60600.00', 0, 20, 'RN5608012', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(14, '', 'RSS', 'Notebook DELL Vostro 3460 BTX base', 5, '1', '2013-09-13', '2013-09-13', '30300.00', '151500.00', 0, 20, 'RN560902', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(15, '', 'RSS', 'Wireless Access Point ', 1, '1', '2013-09-17', '2013-09-17', '11800.00', '11800.00', 0, 20, 'RN5703002', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(16, '', 'RSS', 'Server DELL Power Edge T110', 2, '1', '2013-10-31', '2013-10-31', '64200.00', '128400.00', 0, 20, 'RN5610002', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(17, '', 'RSS', 'Server DELL Power Edge R720', 1, '1', '2013-11-28', '2013-11-28', '180000.00', '180000.00', 0, 20, 'RN10659102', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(18, '', 'RSS', 'Notebook Dell Latitude 3330 1 Unit', 1, '1', '2014-03-25', '2014-03-25', '27000.00', '27000.00', 0, 20, 'RN10659102', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(19, '', 'RSS', 'Notebook HP440G2', 1, '1', '2015-09-09', '2015-09-09', '23835.00', '23835.00', 0, 20, 'PORC201509', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(20, '', 'RSS', 'Notebook HP', 1, '1', '2015-10-15', '2015-10-15', '29000.00', '29000.00', 0, 20, 'PORC201510', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(21, '', 'RSS', 'โต๊ะพับหน้าขาว ', 12, '2', '2013-07-08', '2013-07-08', '2550.00', '30600.00', 0, 20, 'RN5607001', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(22, '', 'RSS', 'โต๊ะทำงาน 120*60*75 สีเทา', 4, '2', '2013-08-01', '2013-08-01', '4200.00', '16800.00', 0, 20, 'RN5608001', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(23, '', 'RSS', 'เก้าอี้ทำงานมีเท้าแขนหุ้มผ้า SL1RA-6F127', 4, '2', '2013-08-01', '2013-08-01', '3480.00', '13920.00', 0, 20, 'RB5608001', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(24, '', 'RSS', 'เก้าอี้ทำงานพนักพิงสูง M71-F127', 1, '2', '2013-08-01', '2013-08-01', '9060.00', '9060.00', 0, 20, 'RN5608001', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(25, '', 'RSS', 'โต๊ะทำงาน 120*60*75 สีเทา', 2, '2', '2013-08-29', '2013-08-29', '4400.00', '8800.00', 0, 20, 'RN5608014', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(26, '', 'RSS', 'เก้าอี้ทำงานมีเท้าแขนหุ้มผ้า SL1RA-6F127', 2, '2', '2013-08-29', '2013-08-29', '3650.00', '7300.00', 0, 20, 'RN5608014', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(27, '', 'RSS', 'เก้าอี้ประชุม ไม่มีเท้าแขน หุ้มผ้า F127', 20, '2', '2013-08-29', '2013-08-29', '2870.00', '57400.00', 0, 20, 'RN5608015', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(28, '', 'RSS', 'โทรศัพท์ AT-45 Tel Single line ', 4, '2', '2013-09-01', '2013-09-01', '550.00', '2200.00', 0, 20, 'PV1309003', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(29, '', 'RSS', 'กล้อง Handy camSONY HDRPJ660/PK2', 1, '2', '2013-09-04', '2013-09-04', '27074.77', '27074.77', 0, 20, 'PV1309001', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL),
(30, '', 'RSS', 'ตู้โล่ง / 2บานเปิด 80*40*156 ', 3, '2', '2013-09-25', '2013-09-25', '5808.00', '17424.00', 0, 20, 'RN5609003', '2016-10-16 11:27:15.881126', NULL, '2016-10-16 11:27:15.881126', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `ROOMCD` int(5) UNSIGNED NOT NULL,
  `ROOMNAME` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ROOMCAPA` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ROOMBUILD` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ROOMFLOOR` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ROOMBRANCH` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`ROOMCD`, `ROOMNAME`, `ROOMCAPA`, `ROOMBUILD`, `ROOMFLOOR`, `ROOMBRANCH`) VALUES
(11101, 'Innovation', '20', '1', '1', 'Head Office'),
(11102, 'Ruby111', '10', '1', '1', 'Head Office'),
(11103, 'C#', '16', '1', '1', 'Head Office'),
(11104, 'Bash109', '10', '1', '1', 'Head Office'),
(11201, 'Basic', '8', '1', '2', 'Head Office'),
(11202, 'Fortran-include S6n', ',12-16', '1', '2', 'Head Office'),
(11203, 'Pascal', '8', '1', '2', 'Head Office'),
(11204, 'Training1', '36', '1', '2', 'Head Office'),
(11301, 'Cobol', '14', '1', '3', 'Head Office'),
(11302, 'Recreation', '15-20', '1', '3', 'Head Office'),
(12101, 'Python2108', '12', '2', '1', 'Head Office'),
(12102, 'Perl-2103', '8', '2', '1', 'Head Office'),
(12103, 'Auditorium', '100', '2', '1', 'Head Office'),
(12201, 'Ada', '8', '2', '2', 'Head Office'),
(12202, 'Assembly', '8', '2', '2', 'Head Office'),
(12203, 'Java', '16', '2', '2', 'Head Office');

-- --------------------------------------------------------

--
-- Table structure for table `tabledetail`
--

CREATE TABLE `tabledetail` (
  `TBDNO` int(5) NOT NULL,
  `TBDCD` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `TBDDESC` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `TBDCREDAT` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `tabledetail`
--

INSERT INTO `tabledetail` (`TBDNO`, `TBDCD`, `TBDDESC`, `TBDCREDAT`, `TBDCREUSR`, `TBDUPDDAT`, `TBDUPDUSR`) VALUES
(100, '1', 'เครื่องคอมพิวเตอร์', '2016-12-13 05:50:27.591999', NULL, '0000-00-00 00:00:00.000000', NULL),
(100, '2', 'เครื่องตกแต่ง', '2016-10-17 04:27:57.954379', NULL, '2016-10-17 04:27:57.954379', NULL),
(100, '3', 'ยานพาหนะ', '2016-10-17 04:27:57.954379', NULL, '2016-10-17 04:27:57.954379', NULL),
(100, '4', 'เครื่องปรับอากาศ', '2016-10-17 04:27:57.954379', NULL, '2016-10-17 04:27:57.954379', NULL),
(101, '1', 'มกราคม', '2016-10-17 04:27:57.954379', NULL, '2016-10-17 04:27:57.954379', NULL),
(101, '10', 'ตุลาคม', '2016-10-17 04:27:57.954379', NULL, '2016-10-17 04:27:57.954379', NULL),
(101, '11', 'พฤศจิกายน', '2016-10-17 04:27:57.954379', NULL, '2016-10-17 04:27:57.954379', NULL),
(101, '12', 'ธันวาคม', '2016-10-17 04:27:57.954379', NULL, '2016-10-17 04:27:57.954379', NULL),
(101, '2', 'กุมภาพันธ์', '2016-10-17 04:27:57.954379', NULL, '2016-10-17 04:27:57.954379', NULL),
(101, '3', 'มีนาคม', '2016-10-17 04:27:57.954379', NULL, '2016-10-17 04:27:57.954379', NULL),
(101, '4', 'เมษายน', '2016-10-17 04:27:57.954379', NULL, '2016-10-17 04:27:57.954379', NULL),
(101, '5', 'พฤษภาคม', '2016-10-17 04:27:57.954379', NULL, '2016-10-17 04:27:57.954379', NULL),
(101, '6', 'มิถุนายน', '2016-10-17 04:27:57.954379', NULL, '2016-10-17 04:27:57.954379', NULL),
(101, '7', 'กรกฎาคม', '2016-10-17 04:27:57.954379', NULL, '2016-10-17 04:27:57.954379', NULL),
(101, '8', 'สิงหาคม', '2016-10-17 04:27:57.954379', NULL, '2016-10-17 04:27:57.954379', NULL),
(101, '9', 'กันยายน', '2016-10-17 04:27:57.954379', NULL, '2016-10-17 04:27:57.954379', NULL),
(102, '1', 'ยังใช้งานอยู่', '0000-00-00 00:00:00.000000', 'admin', '0000-00-00 00:00:00.000000', 'admin'),
(102, '2', 'ตัดจำหน่าย', '0000-00-00 00:00:00.000000', 'admin', '0000-00-00 00:00:00.000000', 'admin'),
(102, '3', 'สูญหาย', '0000-00-00 00:00:00.000000', 'admin', '0000-00-00 00:00:00.000000', 'admin'),
(103, '0', '0', '2016-12-13 10:35:42.266819', NULL, '2016-12-13 10:35:42.266819', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USRID` int(11) NOT NULL,
  `USRNAME` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `USRPASS` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `USRROLE` enum('admin','accountant','other') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'other',
  `USRFNAME` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `USRLNAME` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `USREMAIL` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `USRCREDAT` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USRID`, `USRNAME`, `USRPASS`, `USRROLE`, `USRFNAME`, `USRLNAME`, `USREMAIL`, `USRCREDAT`, `USRUDDAT`) VALUES
(22, 'test', 'test', 'accountant', 'testeakkk', 'test', '', '2016-12-13 04:04:06.832013', '2016-12-13 04:04:06.832013'),
(23, 'admin', 'admin', 'admin', 'ผู้ดูแลระบบ', 'adminitrator', '', '2016-12-13 04:03:59.103185', '2016-12-13 04:03:59.103185');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`CMPCD`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`ROOMCD`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `depreciation`
--
ALTER TABLE `depreciation`
  MODIFY `DEPID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `durablearticles`
--
ALTER TABLE `durablearticles`
  MODIFY `DRAID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `ROOMCD` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12204;
--
-- AUTO_INCREMENT for table `tabledetail`
--
ALTER TABLE `tabledetail`
  MODIFY `TBDNO` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USRID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
