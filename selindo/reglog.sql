-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 27, 2023 at 12:50 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reglog`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

DROP TABLE IF EXISTS `komentari`;
CREATE TABLE IF NOT EXISTS `komentari` (
  `id` int NOT NULL AUTO_INCREMENT,
  `komentar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ocena` int NOT NULL,
  `autor_id` int NOT NULL,
  `oglas_id` int NOT NULL,
  `vlasnik_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`id`, `komentar`, `ocena`, `autor_id`, `oglas_id`, `vlasnik_id`) VALUES
(1, 'Nije lose, ali moze bolje.', 3, 60, 60, 71),
(2, 'Lose!!!', 1, 66, 60, 71),
(3, 'NE preporucujem....', 1, 62, 53, 64),
(4, 'Moze da prodje', 4, 65, 47, 71),
(5, 'Vrhunski', 5, 66, 56, 63),
(6, 'OK', 4, 65, 52, 70),
(7, 'Preporuke', 5, 63, 58, 57),
(8, 'Razumna cena...', 1, 65, 61, 63),
(9, 'OKK, nije lose moze bolje uvek', 3, 64, 49, 70),
(10, 'Ne valja iskreno', 2, 65, 56, 66),
(11, 'ovaj telefon je bas lep, ali nije koristan.', 3, 66, 47, 70),
(12, 'nije lose', 4, 65, 60, 70),
(13, 'Ova maska nikad gora ne kupuj!!!!', 1, 64, 60, 65),
(24, 'Proba', 3, 71, 47, 0),
(25, 'proba', 3, 71, 47, 0),
(26, 'OMG prelepo ali nemam para', 2, 72, 57, 0),
(27, 'jako los sjaj za usne', 2, 71, 59, 0),
(28, 'nije lose', 3, 71, 60, 0);

-- --------------------------------------------------------

--
-- Table structure for table `narudzbine`
--

DROP TABLE IF EXISTS `narudzbine`;
CREATE TABLE IF NOT EXISTS `narudzbine` (
  `id` int DEFAULT NULL,
  `oglas_id` int NOT NULL,
  `korisnik_id` int NOT NULL,
  `ime_autora` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `narudzbine`
--

INSERT INTO `narudzbine` (`id`, `oglas_id`, `korisnik_id`, `ime_autora`) VALUES
(NULL, 50, 60, 0),
(NULL, 51, 60, 0),
(NULL, 58, 67, 0),
(NULL, 52, 67, 0),
(NULL, 47, 67, 0),
(NULL, 50, 58, 0),
(NULL, 55, 64, 0),
(NULL, 53, 71, 0),
(NULL, 50, 71, 0),
(NULL, 60, 71, 0);

-- --------------------------------------------------------

--
-- Table structure for table `oglasi`
--

DROP TABLE IF EXISTS `oglasi`;
CREATE TABLE IF NOT EXISTS `oglasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lokacija` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `naziv` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `opis` text COLLATE utf8mb4_general_ci NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  `kolicina` int NOT NULL,
  `nacin_dostave` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `slika` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oglasi`
--

INSERT INTO `oglasi` (`id`, `lokacija`, `naziv`, `opis`, `cena`, `kolicina`, `nacin_dostave`, `slika`, `user_id`) VALUES
(50, 'Kragujevac', 'H&M paleta od 4 shimer boje - PROMO CENA', 'H&M paleta od 4 shimer boje - PROMO CENA samo do kraja nedelje + poklon iznenadjenja', '1500.00', 1, 'licno_preuzimanje', 'images/hm.jpg', 62),
(51, 'Kragujevac', 'Iphone 13 mini 128gb nov', '', '74825.00', 1, 'kurirska_sluzba', 'images/telefon.jpg', 65),
(52, 'Kragujevac', 'Swarovski Angelic Square Set', 'Swarovski Angelic Square Set je prelepo uparen set koji uključuje ogrlicu i mindjuše. Ogrlica ima centralni kvadratni kristal u boji, okružen sjajnim kristalima koji pružaju blistav i elegantan izgled.', '38956.00', 1, 'Posta', 'images/nakit.jpg', 66),
(53, 'Beograd', 'Giorgio Armani AR6055', 'Giorgio Armani AR6055 je elegantan model naočara za sunce za žene. Ove moderne i sofisticirane naočare imaju okvir koji je izdržljiv i udoban za nošenje.', '45000.00', 1, 'organizovani_transport', 'images/naocare.jpg', 65),
(54, 'Beograd', 'Versace parfem Medusa nov!!!', '', '36000.00', 1, 'Posta', 'images/parfem.jpg', 64),
(55, 'Beograd', 'Pandora narukvica', 'Pandora Moments Snake Chain narukvica je klasičan i popularan model. Ova narukvica je izrađena od srebra, a njen zmijin lancunasti dizajn pruža elegantan i sofisticiran izgled. ', '14800.00', 1, 'city_expres_na_selindu', 'images/pandora.jpg', 65),
(56, 'Cacak', 'Fossil Gen 5 Carlyle HR', 'Fossil Gen 5 Carlyle HR je pametni sat koji kombinuje klasični izgled s modernim tehnologijama. Ovaj model ima okruglo kućište od nerdjajućeg čelika sa prečnikom od 44 mm. ', '26999.00', 1, 'Posta', 'images/fossil.jpg', 62),
(57, 'Cacak', 'Huda beauty-power bullet matte lipstick-throwback collection shade girls trip or night prom', 'Huda beauty-power bullet matte lipstick-throwback collection shade girls trip or night prom, nije otpakovan, kupljen u Sephori u Grckoj', '4500.00', 2, 'licno_preuzimanje', 'images/karmin.jpg', 66),
(58, 'Cacak', 'Huda Beauty Rose Gold Remastered Eyeshadow Palette', 'Huda Beauty Rose Gold Remastered Eyeshadow Palette koja kombinuje mat, šimer i folija finiše', '78564.00', 1, 'licno_preuzimanje', 'images/paleta.jpg', 66),
(59, 'Nis', 'Huda Beauty Lip Strobe - \"Shameless\"', 'Huda Beauty Lip Strobe u nijansi \"Shameless\" je predivan sjaj za usne koji pruža blistav i luksuzan izgled. Ovaj lipglos ima visok sjaj i metalik finiš, koji daje usnama intenzivnu boju i efekat punijih usana.', '8452.00', 1, 'city_expres_na_selindu', 'images/lipstrobe.jpg', 66),
(60, 'Nis', 'Laneige Water Sleeping Mask', '', '3700.00', 1, 'Posta', 'images/krema.jpg', 64),
(61, 'Nis', 'Prada Lip Maestro - \"Dolce\"', 'Prada Lip Maestro u nijansi \"Dolce\" je luksuzni mat tečni ruž koji pruža intenzivnu boju, dugotrajnost i glatki mat finiš. ', '9462.00', 1, 'kurirska_sluzba', 'images/ruz.jpg', 62);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(75) COLLATE utf8mb4_general_ci NOT NULL,
  `vrsta_korisnika` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'Aktivan',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `username`, `email`, `password`, `vrsta_korisnika`, `status`) VALUES
(60, 'admin', 'admin', 'admin@gmail.com', 'admin', 'admin', 'Aktivan'),
(61, 'Ivana ', 'ivana', 'ivana@gmail.com', 'ivana', 'prodavac', 'Aktivan'),
(62, 'Marta Ignjatovic', 'Marta.I__', 'martaignjatovic636@gmail.com', 'marta', 'prodavac', 'Aktivan'),
(63, 'Vlada Ignjatovic', 'vlada', 'vlada@gmail.com', 'vlada', 'prodavac', 'Aktivan'),
(64, 'Jelena Dencic', 'Jeca', 'jeca@gmail.com', 'jeca', 'prodavac', 'Aktivan'),
(65, 'Mirjana Ignjatovic', 'Mirka', 'mirka@gmail.com', 'mirka', 'prodavac', 'Obrisi'),
(66, 'Olga Ignjatovic', 'Olga', 'olga@gmail.com', 'olga', 'prodavac', 'Aktivan'),
(67, 'Teodora Novic', 'tea', 'tea@gmail.com', 'tea', 'prodavac', 'Aktivan'),
(68, 'Nikola Lukic', 'Nikola', 'dzoni@gmail.com', 'dzoni', 'kupac', 'Aktivan'),
(69, 'Uros Stankovic', 'uros', 'uros@gmail.com', 'uros', 'prodavac', 'Blokiraj'),
(70, 'lena', 'lena', 'lena@gmail.com', 'lena', 'prodavac', 'Odblokiraj'),
(71, 'prof', 'prof', 'prof@gmail.com', 'prof', 'kupac', 'Aktivan');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
