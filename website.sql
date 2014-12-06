-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2014 at 01:56 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_kategorije`
--

CREATE TABLE IF NOT EXISTS `blog_kategorije` (
  `id_blog_kat` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_kategorije` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_blog_kat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `blog_kategorije`
--

INSERT INTO `blog_kategorije` (`id_blog_kat`, `naziv_kategorije`) VALUES
(1, 'PHP'),
(2, 'Design'),
(3, 'Zend'),
(4, 'Codeigniter');

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE IF NOT EXISTS `kategorije` (
  `id_kategorije` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_kategorije` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_kategorije`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`id_kategorije`, `naziv_kategorije`) VALUES
(1, 'PHP'),
(2, 'HTML'),
(3, 'wordpress');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `id_korisnika` int(11) NOT NULL AUTO_INCREMENT,
  `korisnicko_ime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_korisnika`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id_korisnika`, `korisnicko_ime`, `lozinka`) VALUES
(1, 'admin', '02e2d84289eee9bf28744832158150f9');

-- --------------------------------------------------------

--
-- Table structure for table `postovi`
--

CREATE TABLE IF NOT EXISTS `postovi` (
  `id_posta` int(11) NOT NULL AUTO_INCREMENT,
  `id_blog_kat` int(11) NOT NULL,
  `naziv_posta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opis_posta` text COLLATE utf8_unicode_ci NOT NULL,
  `slika_posta` text COLLATE utf8_unicode_ci NOT NULL,
  `vreme_unosa` int(11) NOT NULL,
  PRIMARY KEY (`id_posta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `postovi`
--

INSERT INTO `postovi` (`id_posta`, `id_blog_kat`, `naziv_posta`, `opis_posta`, `slika_posta`, `vreme_unosa`) VALUES
(1, 1, 'test post', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'idemo.jpg', 0),
(3, 1, 'asdas', 'dasdasdasd', '1417022939-Jellyfish.jpg', 1417022939),
(5, 2, 'sadasdsadasd', 'dasdasdasdfdsd f dsfasdasdas', '1417022988-Hydrangeas.jpg', 1417022988),
(7, 1, 'asdasd', 'asdasdasd', '1417093493-Jellyfish.jpg', 1417093493),
(8, 1, 'test 4', 'oaplas dadad', '1417093531-Tulips.jpg', 1417093531),
(9, 1, 'test 5', 'opala 5', '1417093543-Lighthouse.jpg', 1417093543),
(10, 1, 'test 6', 'opala 6', '1417095485-Desert.jpg', 1417095486),
(11, 1, 'test 7', 'opala 7', '1417095585-Penguins.jpg', 1417095585),
(12, 1, 'test8', 'test8', '1417096111-Desert.jpg', 1417096111),
(13, 1, 'test9', 'test9', '1417096153-Chrysanthemum.jpg', 1417096153),
(14, 1, 'kjhkjhkjkj', 'ughugh', '1417096216-Koala.jpg', 1417096216),
(15, 1, 'asd', 'asd', '1417096272-Hydrangeas.jpg', 1417096273),
(18, 2, 'Opala', '<p>Naslov posta dfgfd &nbsp;dgdfg dfg dfg dfgdfgdfgdfgdfghyhtyhty hdgfghfhfghf</p>\r\n', '1417183083-Koala.jpg', 1417183084),
(19, 2, 'dsfsdf', '<p>dsfdsfsdfdsf</p>\r\n', '', 1417190769),
(20, 2, 'dsfsdf', '<p>dsfdsfsdfdsf</p>\r\n', '1417190843-Tulips.jpg', 1417190844),
(21, 4, 'test', '<p>test</p>\r\n', '', 1417191437);

-- --------------------------------------------------------

--
-- Table structure for table `projekti`
--

CREATE TABLE IF NOT EXISTS `projekti` (
  `id_projekta` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategorije` int(11) NOT NULL,
  `naziv_projekta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opis_projekta` text COLLATE utf8_unicode_ci NOT NULL,
  `link_projekta` text COLLATE utf8_unicode_ci NOT NULL,
  `vreme_unosa` int(11) NOT NULL,
  PRIMARY KEY (`id_projekta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `projekti`
--

INSERT INTO `projekti` (`id_projekta`, `id_kategorije`, `naziv_projekta`, `opis_projekta`, `link_projekta`, `vreme_unosa`) VALUES
(1, 1, 'prvi PHP projekat', 'ovo je prvi PHP projekat', 'https://www.google.rs/', 0),
(3, 2, 'asd', 'asd asd asasd asd asdas', 'asdasadaa', 1416489168),
(4, 3, 'ads', 'asdas das da ', 'ajdasd', 1416500096);

-- --------------------------------------------------------

--
-- Table structure for table `slike_projekata`
--

CREATE TABLE IF NOT EXISTS `slike_projekata` (
  `id_slike` int(11) NOT NULL AUTO_INCREMENT,
  `id_projekta` int(11) NOT NULL,
  `naziv_slike` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_slike`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `slike_projekata`
--

INSERT INTO `slike_projekata` (`id_slike`, `id_projekta`, `naziv_slike`) VALUES
(1, 1, 'opala.jpg'),
(2, 1, 'idemo.jpg'),
(3, 1, 'treca.jpg'),
(5, 3, '1416489168-Screenshot_2014-09-29-09-58-02.png'),
(6, 4, '1416500096-logo-google-partner-600x225.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
