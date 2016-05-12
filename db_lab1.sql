-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2016 at 07:22 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lab1`
--

-- --------------------------------------------------------

--
-- Table structure for table `apdovanojimas`
--

CREATE TABLE `apdovanojimas` (
  `id_Apdovanojimas` int(11) NOT NULL,
  `pavadinimas` varchar(50) DEFAULT NULL,
  `fk_Ceremonijaid_Ceremonija` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apdovanojimas`
--

INSERT INTO `apdovanojimas` (`id_Apdovanojimas`, `pavadinimas`, `fk_Ceremonijaid_Ceremonija`) VALUES
(1, 'Best Director', 20),
(2, 'Best Actor', 20),
(3, 'Best Picture', 20),
(4, 'Best Actress', 20),
(5, 'Best Supporting Actor', 20),
(6, 'Best Supporting Actress', 20),
(7, 'Best Achievement in Directing', 20),
(8, 'Best Animated Feature Film', 20),
(9, 'Best Cinematography', 20),
(10, 'Best Costume Design', 20),
(11, 'Best Documentary (Feature)', 20),
(12, 'Best Film Editing', 20),
(13, 'Best Music', 20),
(14, 'Best Production Design', 20),
(15, 'Best Short Film', 20),
(16, 'Best Sound Editing', 20),
(17, 'Best Visual Effects', 20);

-- --------------------------------------------------------

--
-- Table structure for table `bilietas`
--

CREATE TABLE `bilietas` (
  `id_Bilietas` int(11) NOT NULL,
  `kiekis` int(11) DEFAULT NULL,
  `fk_Seansasid_Seansas` int(11) NOT NULL,
  `fk_Klientasid_Klientas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bilietas`
--

INSERT INTO `bilietas` (`id_Bilietas`, `kiekis`, `fk_Seansasid_Seansas`, `fk_Klientasid_Klientas`) VALUES
(9, 2, 1, 30),
(10, 5, 15, 65),
(11, 3, 20, 86),
(12, 7, 13, 73),
(13, 1, 23, 78),
(14, 4, 22, 51),
(15, 4, 9, 25),
(16, 7, 9, 45),
(17, 7, 18, 83),
(18, 2, 21, 25),
(19, 6, 15, 66),
(20, 2, 11, 6),
(21, 4, 21, 73),
(22, 5, 25, 76),
(23, 7, 17, 12),
(24, 3, 2, 21),
(25, 4, 4, 26),
(26, 6, 10, 46),
(27, 4, 5, 17),
(28, 1, 25, 6),
(29, 1, 2, 70),
(30, 3, 14, 26),
(31, 7, 10, 82),
(32, 6, 14, 27),
(33, 4, 14, 83),
(34, 4, 14, 54),
(35, 5, 22, 63),
(36, 5, 12, 98),
(37, 7, 24, 94),
(38, 6, 21, 24),
(39, 4, 20, 61),
(40, 6, 1, 88),
(41, 6, 5, 81),
(42, 4, 13, 74),
(43, 5, 21, 31),
(44, 2, 2, 10),
(45, 3, 17, 71),
(46, 3, 2, 96),
(47, 1, 4, 74),
(48, 2, 21, 30),
(49, 7, 8, 43),
(50, 3, 15, 31),
(51, 6, 9, 44),
(52, 7, 2, 64),
(53, 4, 14, 26),
(54, 2, 14, 68),
(55, 5, 16, 45),
(56, 5, 3, 77),
(57, 7, 5, 95),
(58, 1, 25, 49),
(59, 1, 17, 29),
(60, 2, 18, 86),
(61, 7, 19, 81),
(62, 5, 12, 64),
(63, 5, 15, 99),
(64, 2, 5, 55),
(65, 1, 2, 62),
(66, 1, 25, 54),
(67, 7, 2, 10),
(68, 3, 7, 1),
(69, 5, 15, 65),
(70, 7, 3, 10),
(71, 3, 6, 63),
(72, 1, 7, 88),
(73, 6, 5, 69),
(74, 3, 21, 70),
(75, 4, 19, 12),
(76, 3, 25, 34),
(77, 7, 8, 2),
(78, 2, 17, 29),
(79, 7, 20, 60),
(80, 4, 17, 3),
(81, 2, 20, 41),
(82, 4, 18, 24),
(83, 1, 25, 60),
(84, 5, 2, 10),
(85, 7, 3, 16),
(86, 6, 12, 47),
(87, 5, 13, 16),
(88, 7, 14, 22),
(89, 5, 4, 3),
(90, 3, 25, 39),
(91, 1, 1, 79),
(92, 3, 21, 54),
(93, 2, 8, 31),
(94, 7, 19, 90),
(95, 6, 17, 54),
(96, 3, 6, 71),
(97, 2, 13, 79),
(98, 4, 21, 41),
(99, 4, 3, 94),
(100, 7, 12, 90),
(101, 5, 3, 74),
(102, 7, 18, 82),
(103, 5, 13, 3),
(104, 2, 23, 76),
(105, 2, 2, 95),
(106, 1, 12, 55),
(107, 5, 13, 31),
(108, 3, 7, 45),
(109, 6, 20, 70),
(110, 7, 17, 49),
(111, 2, 8, 83),
(112, 5, 22, 62),
(113, 7, 4, 76),
(114, 3, 6, 6),
(115, 6, 12, 14),
(116, 1, 12, 43),
(117, 6, 15, 43),
(118, 2, 20, 15),
(119, 1, 7, 23),
(120, 1, 9, 53),
(121, 6, 25, 47),
(122, 4, 9, 17),
(123, 3, 6, 67),
(124, 3, 8, 9),
(125, 6, 19, 18),
(126, 1, 10, 5),
(127, 3, 16, 47),
(128, 4, 16, 75),
(129, 5, 20, 33),
(130, 7, 1, 16),
(131, 3, 2, 17),
(132, 3, 1, 67),
(133, 2, 13, 21),
(134, 6, 18, 43),
(135, 2, 18, 78),
(136, 3, 23, 52),
(137, 1, 21, 59),
(138, 5, 14, 27),
(139, 2, 5, 87),
(140, 3, 24, 44),
(141, 2, 4, 75),
(143, 7, 18, 44),
(144, 6, 12, 10),
(145, 1, 10, 49),
(146, 2, 4, 73),
(147, 7, 22, 4),
(148, 4, 6, 64),
(149, 6, 3, 5),
(168, 5, 4, 30),
(169, 1, 2, 2),
(208, 6, 7, 5),
(209, 7, 1, 2),
(210, 9, 3, 2),
(211, 9, 9, 14),
(212, 1, 2, 2),
(213, 5, 3, 3),
(214, 1, 2, 1),
(215, 4, 3, 3),
(216, 3, 2, 2),
(217, 1, 4, 3),
(218, 1, 1, 4),
(219, 1, 14, 36),
(220, 1, 14, 35),
(221, 1, 14, 36),
(222, 1, 14, 36),
(223, 11, 14, 53),
(224, 1, 14, 35),
(225, 3, 2, 2),
(226, 1, 2, 2),
(227, 1, 14, 37),
(228, 4, 14, 35),
(229, 5, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ceremonija`
--

CREATE TABLE `ceremonija` (
  `id_Ceremonija` int(11) NOT NULL,
  `pavadinimas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ceremonija`
--

INSERT INTO `ceremonija` (`id_Ceremonija`, `pavadinimas`) VALUES
(1, 'Gotham Awards'),
(2, 'Hollywood Film Awards'),
(3, 'New York Film Critics Circle'),
(4, 'National Board of Review of Motion Pictures'),
(5, 'Los Angeles Film Critics Association'),
(6, 'Critics Choice Awards'),
(7, 'Golden Globe Awards'),
(8, 'Writers Guild of America Awards'),
(9, 'Producers Guild of America Awards'),
(10, 'Screen Actors Guild Awards'),
(11, 'Directors Guild of America Awards'),
(12, 'Satellite Awards'),
(13, 'British Academy Film Awards'),
(14, 'Independent Spirit Awards'),
(15, 'Academy Awards'),
(16, 'Final Draft Awards'),
(17, 'USC Scripter Awards'),
(18, 'BAFTA Film Awards'),
(19, 'Grammys'),
(20, 'Academy Awards'),
(21, 'MTV Movie Awards'),
(22, 'Tony Awards');

-- --------------------------------------------------------

--
-- Table structure for table `filmas`
--

CREATE TABLE `filmas` (
  `id_Filmas` int(11) NOT NULL,
  `pavadinimas` varchar(50) DEFAULT NULL,
  `pagaminimo_data` datetime DEFAULT NULL,
  `reitingas` double DEFAULT NULL,
  `apdovanojimu_sk` int(11) DEFAULT NULL,
  `pelnas` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filmas`
--

INSERT INTO `filmas` (`id_Filmas`, `pavadinimas`, `pagaminimo_data`, `reitingas`, `apdovanojimu_sk`, `pelnas`) VALUES
(1, 'The Dark Knight', '2008-03-05 00:00:00', 7, 7, 3540000),
(2, 'The Hateful Eight', '2014-12-07 00:00:00', 8, 1, 1785214),
(3, 'Inception', '2010-07-23 00:00:00', 9, 4, 6442414),
(4, 'Pulp Fiction', '1993-09-10 00:00:00', 9, 1, 7541233),
(5, '2001: A Space Odyssey', '1968-03-02 00:00:00', 8, 1, 4523122),
(6, 'Interstellar', '2014-11-07 00:00:00', 9, 9, 8424122),
(7, 'The Revenant', '2016-01-29 00:00:00', 8, 3, 7451235),
(8, 'Avengers: Age of Ultron', '2015-05-01 00:00:00', 7, 0, 2564123),
(9, 'Million Dollar Baby', '2016-01-28 00:00:00', 8, 4, 3453142),
(10, 'The Wolf of Wall Street', '2012-12-25 00:00:00', 8, 0, 4251247),
(11, 'The Dark Knight Rises', '2012-07-20 00:00:00', 8, 0, 7542124),
(12, 'V for Vendetta', '2005-03-17 00:00:00', 8, 0, 7514127),
(13, 'The Prestige', '2006-10-17 00:00:00', 9, 2, 7451234),
(14, 'Batman Begins', '2005-06-10 00:00:00', 8, 2, 7541234),
(15, 'Dallas Buyers Club', '2013-11-01 00:00:00', 8, 2, 4213574),
(16, 'Requiem for a Dream', '2000-10-06 00:00:00', 8, 2, 7451234),
(17, 'Mr. Nobody', '2009-11-06 00:00:00', 8, 1, 7456753),
(18, 'Insomnia', '2002-05-24 00:00:00', 7, 0, 7564124),
(19, 'Memento', '2000-09-05 00:00:00', 9, 1, 7454231),
(20, 'Deadpool', '2016-02-08 00:00:00', 8, 0, 4234567),
(21, 'X-Men: Days of Future Past', '2014-05-10 00:00:00', 8, 0, 213478),
(22, 'Captain America: The First Avenger', '2011-07-22 00:00:00', 7, 0, 123478),
(23, 'The Avengers', '2012-05-04 00:00:00', 8, 2, 2145781),
(24, 'Lucy', '2014-08-15 00:00:00', 6, 0, 2347561),
(25, 'A Clockwork Orange', '1971-12-19 00:00:00', 8, 0, 2314567),
(26, 'The Shining', '1980-05-23 00:00:00', 8, 0, 2347891),
(27, 'Full Metal Jacket', '1987-07-10 00:00:00', 8, 0, 2347562),
(28, 'Saw', '2004-10-01 00:00:00', 8, 0, 2341237),
(29, 'Star Wars: Episode IV - A New Hope', '1977-05-25 00:00:00', 9, 6, 5364127),
(30, 'Star Wars: Episode V - The Empire Strikes Back', '1980-06-20 00:00:00', 9, 1, 3247854);

-- --------------------------------------------------------

--
-- Table structure for table `filmas_apdovanojimas`
--

CREATE TABLE `filmas_apdovanojimas` (
  `fk_Filmasid_Filmas` int(11) NOT NULL,
  `fk_Apdovanojimasid_Apdovanojimas` int(11) NOT NULL,
  `laimejimo_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filmas_apdovanojimas`
--

INSERT INTO `filmas_apdovanojimas` (`fk_Filmasid_Filmas`, `fk_Apdovanojimasid_Apdovanojimas`, `laimejimo_data`) VALUES
(1, 8, '2016-02-28'),
(1, 14, '0000-00-00'),
(2, 12, '2016-02-28'),
(2, 16, '2016-02-28'),
(3, 14, '0000-00-00'),
(3, 15, '2016-02-28'),
(4, 12, '2016-02-28'),
(4, 14, '0000-00-00'),
(4, 15, '0000-00-00'),
(5, 4, '2016-02-28'),
(5, 13, '0000-00-00'),
(5, 14, '0000-00-00'),
(6, 10, '0000-00-00'),
(6, 11, '0000-00-00'),
(7, 3, '2016-02-28'),
(7, 14, '0000-00-00'),
(8, 6, '2016-02-28'),
(9, 10, '0000-00-00'),
(10, 14, '0000-00-00'),
(12, 3, '0000-00-00'),
(12, 4, '2016-02-28'),
(12, 12, '2016-02-28'),
(13, 3, '0000-00-00'),
(13, 6, '0000-00-00'),
(13, 11, '2016-02-28'),
(15, 4, '2016-02-28'),
(15, 5, '0000-00-00'),
(15, 16, '2016-02-28'),
(16, 2, '2016-02-28'),
(16, 11, '2016-02-28'),
(17, 6, '2016-02-28'),
(18, 14, '2016-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `filmas_kurejas`
--

CREATE TABLE `filmas_kurejas` (
  `fk_Filmasid_Filmas` int(11) NOT NULL,
  `fk_Kurejasid_Kurejas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filmas_kurejas`
--

INSERT INTO `filmas_kurejas` (`fk_Filmasid_Filmas`, `fk_Kurejasid_Kurejas`) VALUES
(1, 3),
(1, 10),
(1, 11),
(1, 19),
(2, 7),
(2, 20),
(3, 1),
(3, 3),
(3, 15),
(4, 20),
(5, 15),
(5, 24),
(5, 28),
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(7, 18),
(8, 4),
(9, 15),
(9, 27),
(10, 1),
(10, 9),
(10, 20),
(11, 3),
(11, 6),
(11, 10),
(11, 16),
(12, 15),
(12, 16),
(13, 25),
(14, 5),
(14, 12),
(15, 8),
(16, 5),
(17, 24),
(18, 26),
(19, 5),
(20, 13),
(21, 5),
(22, 3),
(23, 7),
(24, 27),
(25, 16),
(26, 8),
(27, 26);

-- --------------------------------------------------------

--
-- Table structure for table `filmas_zanras`
--

CREATE TABLE `filmas_zanras` (
  `fk_Filmasid_Filmas` int(11) NOT NULL,
  `fk_Zanrasid_Zanras` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filmas_zanras`
--

INSERT INTO `filmas_zanras` (`fk_Filmasid_Filmas`, `fk_Zanrasid_Zanras`) VALUES
(1, 12),
(1, 17),
(1, 18),
(2, 7),
(2, 12),
(2, 18),
(3, 7),
(3, 9),
(3, 17),
(4, 12),
(4, 18),
(5, 2),
(5, 7),
(6, 2),
(6, 11),
(6, 18),
(7, 9),
(7, 11),
(7, 18),
(8, 2),
(8, 17),
(9, 9),
(10, 4),
(11, 9),
(11, 17),
(12, 9),
(12, 17),
(13, 9),
(14, 17),
(15, 18),
(16, 18),
(17, 2),
(17, 3),
(18, 9),
(19, 7),
(20, 17),
(21, 2),
(21, 17),
(22, 17),
(23, 17),
(24, 7),
(25, 7),
(26, 1),
(27, 8);

-- --------------------------------------------------------

--
-- Table structure for table `kino_teatras`
--

CREATE TABLE `kino_teatras` (
  `id_Kino_teatras` int(11) NOT NULL,
  `pavadinimas` varchar(50) DEFAULT NULL,
  `adresas` varchar(50) DEFAULT NULL,
  `ikurimo_data` datetime DEFAULT NULL,
  `darbo_valandos` varchar(50) DEFAULT NULL,
  `fk_Miestasid_Miestas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kino_teatras`
--

INSERT INTO `kino_teatras` (`id_Kino_teatras`, `pavadinimas`, `adresas`, `ikurimo_data`, `darbo_valandos`, `fk_Miestasid_Miestas`) VALUES
(1, 'Forum Cinema', 'Aido g. 8', '2008-03-09 00:00:00', '8:00-00:00', 2),
(2, 'Forum Cinemas', 'Karaliaus Mindaugo pr. 49', '2005-03-15 00:00:00', '8:00-23:00', 3),
(3, 'Forum Cinemas', 'Taikos pr. 61', '2003-03-22 00:00:00', '10:00 - 21:00', 4),
(4, 'Forum Cinemas Vingis', 'Savanorių pr. 7', '2003-01-16 00:00:00', '10:30 - 22:00', 2),
(5, 'Forum Cinemas', 'Ozo g. 25', '2003-03-16 00:00:00', '10:00 - 22:00', 2),
(6, 'Atlantis Cinemas', 'Tilžės g. 225', '2010-03-09 00:00:00', '9:00 - 23:00', 1),
(7, 'Multikino', 'Ozo g. 18', '2010-03-23 00:00:00', '9:00 - 22:00', 2),
(8, 'Forum Cinemas', 'Aido g. 8', '2008-03-09 00:00:00', '8:00-00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `klientas`
--

CREATE TABLE `klientas` (
  `id_Klientas` int(11) NOT NULL,
  `asmens_kodas` varchar(11) DEFAULT NULL,
  `telefonas` varchar(50) DEFAULT NULL,
  `vardas` varchar(50) DEFAULT NULL,
  `pavarde` varchar(50) DEFAULT NULL,
  `e_pastas` varchar(50) DEFAULT NULL,
  `gimimo_data` datetime DEFAULT NULL,
  `lytis` varchar(1) DEFAULT NULL,
  `tautybe` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `klientas`
--

INSERT INTO `klientas` (`id_Klientas`, `asmens_kodas`, `telefonas`, `vardas`, `pavarde`, `e_pastas`, `gimimo_data`, `lytis`, `tautybe`) VALUES
(1, '31987010342', '869919799', 'aa', 'aaaa', 'Kazlauskas.Petras@gmail.com', '1987-01-03 00:00:00', 'M', 'Lithuanian'),
(2, '31988122511', '862890472', 'Marius', 'Jankauskas', 'Jankauskas.Marius@gmail.com', '1988-12-25 00:00:00', 'M', 'Lithuanian'),
(3, '31991052371', '867413269', 'Darius', 'Butkus', 'Butkus.Darius@gmail.com', '1991-05-23 00:00:00', 'M', 'Lithuanian'),
(4, '42001121995', '862179107', 'Ieva', 'Stankeviciene', 'Stankeviciene.Ieva@gmail.com', '2001-12-19 00:00:00', 'F', 'Lithuanian'),
(5, '41994121222', '865166015', 'Dainora', 'Stankeviciene', 'Stankeviciene.Dainora@yahoo.com', '1994-12-12 00:00:00', 'F', 'Lithuanian'),
(6, '41998100388', '867756317', 'Egle', 'Petrauskaite', 'Petrauskaite.Egle@gmail.com', '1998-10-03 00:00:00', 'F', 'Lithuanian'),
(7, '41981093082', '868697570', 'Ieva', 'Jankauskaite', 'Jankauskaite.Ieva@yahoo.com', '1981-09-30 00:00:00', 'F', 'Lithuanian'),
(8, '42001101079', '862782257', 'Indre', 'Petrauskaite', 'Petrauskaite.Indre@yahoo.com', '2001-10-10 00:00:00', 'F', 'Lithuanian'),
(9, '41980012742', '868621215', 'Ieva', 'Stankeviciene', 'Stankeviciene.Ieva@gmail.com', '1980-01-27 00:00:00', 'F', 'Lithuanian'),
(10, '41992051417', '868385833', 'Nora', 'Butkiene', 'Butkiene.Nora@gmail.com', '1992-05-14 00:00:00', 'F', 'Lithuanian'),
(11, '31989070138', '869893981', 'Marius', 'Kazlauskas', 'Kazlauskas.Marius@gmail.com', '1989-07-01 00:00:00', 'M', 'Lithuanian'),
(12, '31999070897', '864914703', 'Marius', 'Balciunas', 'Balciunas.Marius@yahoo.com', '1999-07-08 00:00:00', 'M', 'Lithuanian'),
(13, '31980120535', '867066650', 'Juozas', 'Kazlauskas', 'Kazlauskas.Juozas@yahoo.com', '1980-12-05 00:00:00', 'M', 'Lithuanian'),
(14, '31995070359', '866185272', 'Domas', 'Kazlauskas', 'Kazlauskas.Domas@gmail.com', '1995-07-03 00:00:00', 'M', 'Lithuanian'),
(15, '41990060430', '864533752', 'Egle', 'Petrauskaite', 'Petrauskaite.Egle@gmail.com', '1990-06-04 00:00:00', 'F', 'Lithuanian'),
(16, '31986101027', '867732696', 'Petras', 'Butkus', 'Butkus.Petras@gmail.com', '1986-10-10 00:00:00', 'M', 'Lithuanian'),
(17, '31989120672', '869783569', 'Marius', 'Zukauskas', 'Zukauskas.Marius@gmail.com', '1989-12-06 00:00:00', 'M', 'Lithuanian'),
(18, '41990081872', '867060882', 'Aiste', 'Balciunaite', 'Balciunaite.Aiste@yahoo.com', '1990-08-18 00:00:00', 'F', 'Lithuanian'),
(19, '31999030417', '868648132', 'Svajunas', 'Zukauskas', 'Zukauskas.Svajunas@yahoo.com', '1999-03-04 00:00:00', 'M', 'Lithuanian'),
(20, '31993082964', '865892486', 'Marius', 'Petrauskas', 'Petrauskas.Marius@yahoo.com', '1993-08-29 00:00:00', 'M', 'Lithuanian'),
(21, '31986071789', '863553222', 'Petras', 'Butkus', 'Butkus.Petras@yahoo.com', '1986-07-17 00:00:00', 'M', 'Lithuanian'),
(22, '31976030547', '863418914', 'Saulius', 'Stankevicius', 'Stankevicius.Saulius@yahoo.com', '1976-03-05 00:00:00', 'M', 'Lithuanian'),
(23, '41987040892', '866768371', 'Nora', 'Balciunaite', 'Balciunaite.Nora@gmail.com', '1987-04-08 00:00:00', 'F', 'Lithuanian'),
(24, '31984070187', '867550323', 'Svajunas', 'Zukauskas', 'Zukauskas.Svajunas@gmail.com', '1984-07-01 00:00:00', 'M', 'Lithuanian'),
(25, '31994120865', '866656860', 'Darius', 'Petrauskas', 'Petrauskas.Darius@yahoo.com', '1994-12-08 00:00:00', 'M', 'Lithuanian'),
(26, '41991091420', '861165618', 'Indre', 'Jankauskaite', 'Jankauskaite.Indre@gmail.com', '1991-09-14 00:00:00', 'F', 'Lithuanian'),
(27, '41998080933', '865925720', 'Nora', 'Butkiene', 'Butkiene.Nora@gmail.com', '1998-08-09 00:00:00', 'F', 'Lithuanian'),
(28, '31990062919', '867362457', 'Saulius', 'Kazlauskas', 'Kazlauskas.Saulius@gmail.com', '1990-06-29 00:00:00', 'M', 'Lithuanian'),
(29, '31991102627', '865875732', 'Darius', 'Stankevicius', 'Stankevicius.Darius@yahoo.com', '1991-10-26 00:00:00', 'M', 'Lithuanian'),
(30, '41976121973', '861707244', 'Egle', 'Butkiene', 'Butkiene.Egle@yahoo.com', '1976-12-19 00:00:00', 'F', 'Lithuanian'),
(31, '31977061722', '868651428', 'Marius', 'Balciunas', 'Balciunas.Marius@yahoo.com', '1977-06-17 00:00:00', 'M', 'Lithuanian'),
(32, '31975021911', '864485137', 'Petras', 'Zukauskas', 'Zukauskas.Petras@yahoo.com', '1975-02-19 00:00:00', 'M', 'Lithuanian'),
(33, '42001041244', '861491088', 'Aiste', 'Kazlauskiene', 'Kazlauskiene.Aiste@gmail.com', '2001-04-12 00:00:00', 'F', 'Lithuanian'),
(34, '31999021063', '861950042', 'Petras', 'Kazlauskas', 'Kazlauskas.Petras@gmail.com', '1999-02-10 00:00:00', 'M', 'Lithuanian'),
(35, '41994112517', '863976745', 'Dainora', 'Petrauskaite', 'Petrauskaite.Dainora@yahoo.com', '1994-11-25 00:00:00', 'F', 'Lithuanian'),
(36, '31998051575', '862574615', 'Domas', 'Kazlauskas', 'Kazlauskas.Domas@gmail.com', '1998-05-15 00:00:00', 'M', 'Lithuanian'),
(37, '32002011051', '867284179', 'Darius', 'Jankauskas', 'Jankauskas.Darius@gmail.com', '2002-01-10 00:00:00', 'M', 'Lithuanian'),
(38, '32002122171', '863300262', 'Domas', 'Petrauskas', 'Petrauskas.Domas@gmail.com', '2002-12-21 00:00:00', 'M', 'Lithuanian'),
(39, '31996031121', '863432922', 'Darius', 'Stankevicius', 'Stankevicius.Darius@gmail.com', '1996-03-11 00:00:00', 'M', 'Lithuanian'),
(40, '41994111392', '869787139', 'Nora', 'Butkiene', 'Butkiene.Nora@gmail.com', '1994-11-13 00:00:00', 'F', 'Lithuanian'),
(41, '41989042330', '865536254', 'Indre', 'Zukauskiene', 'Zukauskiene.Indre@yahoo.com', '1989-04-23 00:00:00', 'F', 'Lithuanian'),
(42, '41996111343', '862664154', 'Nora', 'Stankeviciene', 'Stankeviciene.Nora@yahoo.com', '1996-11-13 00:00:00', 'F', 'Lithuanian'),
(43, '31995042981', '865051208', 'Darius', 'Jankauskas', 'Jankauskas.Darius@yahoo.com', '1995-04-29 00:00:00', 'M', 'Lithuanian'),
(44, '41995072675', '862778961', 'Ieva', 'Butkiene', 'Butkiene.Ieva@yahoo.com', '1995-07-26 00:00:00', 'F', 'Lithuanian'),
(45, '41998070695', '861028564', 'Aiste', 'Petrauskaite', 'Petrauskaite.Aiste@yahoo.com', '1998-07-06 00:00:00', 'F', 'Lithuanian'),
(46, '31977082062', '861447967', 'Svajunas', 'Zukauskas', 'Zukauskas.Svajunas@yahoo.com', '1977-08-20 00:00:00', 'M', 'Lithuanian'),
(47, '31994092622', '862362854', 'Darius', 'Stankevicius', 'Stankevicius.Darius@yahoo.com', '1994-09-26 00:00:00', 'M', 'Lithuanian'),
(48, '31991122082', '867706329', 'Saulius', 'Jankauskas', 'Jankauskas.Saulius@yahoo.com', '1991-12-20 00:00:00', 'M', 'Lithuanian'),
(49, '31994022046', '863042358', 'Petras', 'Zukauskas', 'Zukauskas.Petras@gmail.com', '1994-02-20 00:00:00', 'M', 'Lithuanian'),
(50, '41986060174', '865557952', 'Aiste', 'Kazlauskiene', 'Kazlauskiene.Aiste@yahoo.com', '1986-06-01 00:00:00', 'F', 'Lithuanian'),
(51, '31979032769', '862399108', 'Domas', 'Butkus', 'Butkus.Domas@gmail.com', '1979-03-27 00:00:00', 'M', 'Lithuanian'),
(52, '31988030839', '861225494', 'Juozas', 'Stankevicius', 'Stankevicius.Juozas@gmail.com', '1988-03-08 00:00:00', 'M', 'Lithuanian'),
(53, '31986072190', '867358886', 'Saulius', 'Jankauskas', 'Jankauskas.Saulius@gmail.com', '1986-07-21 00:00:00', 'M', 'Lithuanian'),
(54, '31992022169', '867400360', 'Petras', 'Stankevicius', 'Stankevicius.Petras@yahoo.com', '1992-02-21 00:00:00', 'M', 'Lithuanian'),
(55, '31979041047', '867691223', 'Saulius', 'Kazlauskas', 'Kazlauskas.Saulius@yahoo.com', '1979-04-10 00:00:00', 'M', 'Lithuanian'),
(56, '41975101894', '869492706', 'Aiste', 'Petrauskaite', 'Petrauskaite.Aiste@yahoo.com', '1975-10-18 00:00:00', 'F', 'Lithuanian'),
(57, '41995021025', '865259399', 'Aiste', 'Balciunaite', 'Balciunaite.Aiste@yahoo.com', '1995-02-10 00:00:00', 'F', 'Lithuanian'),
(58, '31979121186', '863881439', 'Marius', 'Zukauskas', 'Zukauskas.Marius@gmail.com', '1979-12-11 00:00:00', 'M', 'Lithuanian'),
(59, '41981102893', '867270446', 'Indre', 'Jankauskaite', 'Jankauskaite.Indre@gmail.com', '1981-10-28 00:00:00', 'F', 'Lithuanian'),
(60, '41984093082', '869164215', 'Indre', 'Butkiene', 'Butkiene.Indre@gmail.com', '1984-09-30 00:00:00', 'F', 'Lithuanian'),
(61, '32000040359', '861525146', 'Domas', 'Butkus', 'Butkus.Domas@yahoo.com', '2000-04-03 00:00:00', 'M', 'Lithuanian'),
(62, '31999090425', '865407440', 'Petras', 'Petrauskas', 'Petrauskas.Petras@gmail.com', '1999-09-04 00:00:00', 'M', 'Lithuanian'),
(63, '31986023030', '863668029', 'Saulius', 'Kazlauskas', 'Kazlauskas.Saulius@yahoo.com', '0000-00-00 00:00:00', 'M', 'Lithuanian'),
(64, '31979061361', '868396270', 'Marius', 'Jankauskas', 'Jankauskas.Marius@gmail.com', '1979-06-13 00:00:00', 'M', 'Lithuanian'),
(65, '41997060180', '865437377', 'Egle', 'Kazlauskiene', 'Kazlauskiene.Egle@yahoo.com', '1997-06-01 00:00:00', 'F', 'Lithuanian'),
(66, '31980082114', '868884613', 'Juozas', 'Kazlauskas', 'Kazlauskas.Juozas@gmail.com', '1980-08-21 00:00:00', 'M', 'Lithuanian'),
(67, '41980040986', '863915222', 'Nora', 'Jankauskaite', 'Jankauskaite.Nora@yahoo.com', '1980-04-09 00:00:00', 'F', 'Lithuanian'),
(68, '41991020845', '861845123', 'Nora', 'Balciunaite', 'Balciunaite.Nora@yahoo.com', '1991-02-08 00:00:00', 'F', 'Lithuanian'),
(69, '41993012024', '863777343', 'Ieva', 'Petrauskaite', 'Petrauskaite.Ieva@gmail.com', '1993-01-20 00:00:00', 'F', 'Lithuanian'),
(70, '31975070643', '866719207', 'Juozas', 'Kazlauskas', 'Kazlauskas.Juozas@gmail.com', '1975-07-06 00:00:00', 'M', 'Lithuanian'),
(71, '31993070483', '861543273', 'Svajunas', 'Zukauskas', 'Zukauskas.Svajunas@yahoo.com', '1993-07-04 00:00:00', 'M', 'Lithuanian'),
(72, '41983041394', '866667022', 'Aiste', 'Zukauskiene', 'Zukauskiene.Aiste@yahoo.com', '1983-04-13 00:00:00', 'F', 'Lithuanian'),
(73, '41981050152', '865826293', 'Indre', 'Balciunaite', 'Balciunaite.Indre@yahoo.com', '1981-05-01 00:00:00', 'F', 'Lithuanian'),
(74, '31996100859', '864817474', 'Juozas', 'Stankevicius', 'Stankevicius.Juozas@yahoo.com', '1996-10-08 00:00:00', 'M', 'Lithuanian'),
(75, '41983120869', '863583435', 'Egle', 'Stankeviciene', 'Stankeviciene.Egle@gmail.com', '1983-12-08 00:00:00', 'F', 'Lithuanian'),
(76, '41987111041', '868518218', 'Ieva', 'Kazlauskiene', 'Kazlauskiene.Ieva@yahoo.com', '1987-11-10 00:00:00', 'F', 'Lithuanian'),
(77, '41998011998', '867365478', 'Egle', 'Kazlauskiene', 'Kazlauskiene.Egle@gmail.com', '1998-01-19 00:00:00', 'F', 'Lithuanian'),
(78, '31984010353', '864585662', 'Domas', 'Butkus', 'Butkus.Domas@yahoo.com', '1984-01-03 00:00:00', 'M', 'Lithuanian'),
(79, '31980102947', '863566955', 'Svajunas', 'Butkus', 'Butkus.Svajunas@yahoo.com', '1980-10-29 00:00:00', 'M', 'Lithuanian'),
(80, '31994072736', '866554962', 'Darius', 'Zukauskas', 'Zukauskas.Darius@gmail.com', '1994-07-27 00:00:00', 'M', 'Lithuanian'),
(81, '41982031554', '868676147', 'Egle', 'Butkiene', 'Butkiene.Egle@gmail.com', '1982-03-15 00:00:00', 'F', 'Lithuanian'),
(82, '31979091063', '862930023', 'Svajunas', 'Jankauskas', 'Jankauskas.Svajunas@gmail.com', '1979-09-10 00:00:00', 'M', 'Lithuanian'),
(83, '41998010165', '868525085', 'Ieva', 'Kazlauskiene', 'Kazlauskiene.Ieva@yahoo.com', '1998-01-01 00:00:00', 'F', 'Lithuanian'),
(84, '31979031493', '864433502', 'Saulius', 'Jankauskas', 'Jankauskas.Saulius@yahoo.com', '1979-03-14 00:00:00', 'M', 'Lithuanian'),
(85, '31996060734', '865539550', 'Petras', 'Balciunas', 'Balciunas.Petras@yahoo.com', '1996-06-07 00:00:00', 'M', 'Lithuanian'),
(86, '41977050480', '861256805', 'Aiste', 'Kazlauskiene', 'Kazlauskiene.Aiste@yahoo.com', '1977-05-04 00:00:00', 'F', 'Lithuanian'),
(87, '31982022336', '862989074', 'Svajunas', 'Butkus', 'Butkus.Svajunas@gmail.com', '1982-02-23 00:00:00', 'M', 'Lithuanian'),
(88, '31990050190', '861310089', 'Marius', 'Jankauskas', 'Jankauskas.Marius@yahoo.com', '1990-05-01 00:00:00', 'M', 'Lithuanian'),
(89, '41978022319', '867236938', 'Indre', 'Zukauskiene', 'Zukauskiene.Indre@yahoo.com', '1978-02-23 00:00:00', 'F', 'Lithuanian'),
(90, '41991070451', '865472259', 'Nora', 'Kazlauskiene', 'Kazlauskiene.Nora@gmail.com', '1991-07-04 00:00:00', 'F', 'Lithuanian'),
(91, '32002112898', '862990173', 'Darius', 'Petrauskas', 'Petrauskas.Darius@yahoo.com', '2002-11-28 00:00:00', 'M', 'Lithuanian'),
(92, '31975032743', '869840972', 'Saulius', 'Petrauskas', 'Petrauskas.Saulius@yahoo.com', '1975-03-27 00:00:00', 'M', 'Lithuanian'),
(93, '31992092234', '869549560', 'Marius', 'Stankevicius', 'Stankevicius.Marius@gmail.com', '1992-09-22 00:00:00', 'M', 'Lithuanian'),
(94, '31990101656', '867982635', 'Darius', 'Kazlauskas', 'Kazlauskas.Darius@yahoo.com', '1990-10-16 00:00:00', 'M', 'Lithuanian'),
(95, '41977092472', '862059631', 'Nora', 'Butkiene', 'Butkiene.Nora@gmail.com', '1977-09-24 00:00:00', 'F', 'Lithuanian'),
(96, '31980030299', '862182403', 'Saulius', 'Butkus', 'Butkus.Saulius@gmail.com', '1980-03-02 00:00:00', 'M', 'Lithuanian'),
(97, '41976060259', '863758666', 'Nora', 'Kazlauskiene', 'Kazlauskiene.Nora@gmail.com', '1976-06-02 00:00:00', 'F', 'Lithuanian'),
(98, '41984072843', '865694183', 'Dainora', 'Stankeviciene', 'Stankeviciene.Dainora@yahoo.com', '1984-07-28 00:00:00', 'F', 'Lithuanian'),
(99, '41976070498', '867228698', 'Aiste', 'Jankauskaite', 'Jankauskaite.Aiste@yahoo.com', '1976-07-04 00:00:00', 'F', 'Lithuanian'),
(100, '31987010342', '869919799', 'Petrasss', 'Kazlauskas', 'Kazlauskas.Petras@gmail.com', '1987-01-03 00:00:00', 'M', 'Lithuanian'),
(101, 'dasdasd', 'asdasdasd', 'asdasd', 'asdasdasd', 'asdasd', '2016-01-03 00:00:00', 'd', 'asdasda'),
(102, '31987010342', '869919799', 'Petrashhh', 'Kazlauskas', 'Kazlauskas.Petras@gmail.com', '1987-01-03 00:00:00', 'M', 'Lithuanian'),
(103, 'asdasdasd', 'asdasd', 'asdasd', 'dasdasd', 'asdasd', '2016-01-02 00:00:00', 'd', 'asdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `kurejas`
--

CREATE TABLE `kurejas` (
  `id_Kurejas` int(11) NOT NULL,
  `vardas` varchar(50) DEFAULT NULL,
  `pavarde` varchar(50) DEFAULT NULL,
  `gimimo_data` datetime DEFAULT NULL,
  `tautybe` varchar(50) DEFAULT NULL,
  `lytis` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kurejas`
--

INSERT INTO `kurejas` (`id_Kurejas`, `vardas`, `pavarde`, `gimimo_data`, `tautybe`, `lytis`) VALUES
(1, 'Leonardo', 'DiCaprio', '1974-11-11 00:00:00', 'American', 'M'),
(2, 'Tom', 'Hardy', '1977-09-15 00:00:00', 'English', 'M'),
(3, 'Christopher', 'Nolan', '1970-07-30 00:00:00', 'English', 'M'),
(4, 'Scarlett', 'Johansson', '1984-11-22 00:00:00', 'American', 'F'),
(5, 'Michael', 'Fassbender', '1977-04-02 00:00:00', 'Irish', 'M'),
(6, 'Anne', 'Hathaway', '1982-11-12 00:00:00', 'American', 'F'),
(7, 'Quentin', 'Tarantino', '1963-03-27 00:00:00', 'American', 'M'),
(8, 'Cate', 'Blanchett', '1969-05-14 00:00:00', 'Australian', 'F'),
(9, 'Martin', 'Scorsese', '1942-11-17 00:00:00', 'American', 'M'),
(10, 'Christian', 'Bale', '1975-01-30 00:00:00', 'English', 'M'),
(11, 'Heath', 'Ledger', '1979-04-04 00:00:00', 'Australian', 'M'),
(12, 'Jared', 'Leto', '1971-12-26 00:00:00', 'American', 'M'),
(13, 'Jack', 'Nicholson', '1937-04-22 00:00:00', 'American', 'M'),
(14, 'Jake', 'Gyllenhaal', '1980-12-19 00:00:00', 'American', 'M'),
(15, 'Natalie ', 'Portman', '1981-06-09 00:00:00', 'Israeli', 'F'),
(16, 'Daisy ', 'Ridley', '1992-04-10 00:00:00', 'English', 'F'),
(17, 'Adam', 'McKay', '1968-04-17 00:00:00', 'American', 'M'),
(18, 'Bryan', 'Cranston', '1956-03-07 00:00:00', 'American', 'M'),
(19, 'Gary', 'Oldman', '1958-03-21 00:00:00', 'English', 'M'),
(20, 'Samuel', 'Jackson', '1948-12-21 00:00:00', 'American', 'M'),
(21, 'Ben', 'Affleck', '1972-08-15 00:00:00', 'American', 'M'),
(22, 'Ryan', 'Reynolds', '1976-10-23 00:00:00', 'Canadian', 'M'),
(23, 'Mila ', 'Kunis', '1983-08-14 00:00:00', 'American', 'F'),
(24, 'Matt', 'Damon', '1970-10-08 00:00:00', 'American', 'M'),
(25, 'George', 'Clooney', '1961-05-06 00:00:00', 'American', 'M'),
(26, 'Brad', 'Pitt', '1963-12-18 00:00:00', 'American', 'M'),
(27, 'Clint', 'Eastwood', '1930-05-31 00:00:00', 'American', 'M'),
(28, 'Stanley', 'Kubrick', '1928-07-26 00:00:00', 'American', 'M'),
(29, 'George', 'Lucas', '1944-05-14 00:00:00', 'American', 'M'),
(30, 'Steven', 'Spielberg', '1946-12-18 00:00:00', 'American', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `kurejas_apdovanojimas`
--

CREATE TABLE `kurejas_apdovanojimas` (
  `fk_Kurejasid_Kurejas` int(11) NOT NULL,
  `fk_Apdovanojimasid_Apdovanojimas` int(11) NOT NULL,
  `laimejimo_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kurejas_apdovanojimas`
--

INSERT INTO `kurejas_apdovanojimas` (`fk_Kurejasid_Kurejas`, `fk_Apdovanojimasid_Apdovanojimas`, `laimejimo_data`) VALUES
(1, 2, '2016-02-28'),
(1, 8, '2016-02-28'),
(1, 11, '2016-02-28'),
(1, 16, '2016-02-28'),
(2, 16, '2016-02-28'),
(2, 17, '2016-02-28'),
(3, 16, '2016-02-28'),
(3, 17, '2016-02-28'),
(4, 13, '2016-02-28'),
(4, 16, '2016-02-28'),
(5, 13, '2016-02-28'),
(5, 16, '2016-02-28'),
(6, 15, '2016-02-28'),
(7, 12, '2016-02-28'),
(7, 14, '2016-02-28'),
(9, 14, '2016-02-28'),
(10, 2, '2016-02-28'),
(11, 3, '2016-02-28'),
(11, 15, '2016-02-28'),
(14, 4, '2016-02-28'),
(17, 16, '2016-02-28'),
(18, 13, '2016-02-28'),
(24, 16, '2016-02-28'),
(27, 1, '2016-02-28'),
(29, 16, '2016-02-28'),
(30, 15, '2016-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `kurejas_pareigos`
--

CREATE TABLE `kurejas_pareigos` (
  `fk_Kurejasid_Kurejas` int(11) NOT NULL,
  `fk_Pareigosid_Pareigos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kurejas_pareigos`
--

INSERT INTO `kurejas_pareigos` (`fk_Kurejasid_Kurejas`, `fk_Pareigosid_Pareigos`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 1),
(5, 1),
(6, 1),
(7, 2),
(8, 1),
(9, 2),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 3),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(27, 2),
(28, 2),
(29, 2),
(30, 2);

-- --------------------------------------------------------

--
-- Table structure for table `miestas`
--

CREATE TABLE `miestas` (
  `id_Miestas` int(11) NOT NULL,
  `pavadinimas` varchar(50) DEFAULT NULL,
  `gyventoju_sk` int(11) DEFAULT NULL,
  `ikurimo_data` datetime DEFAULT NULL,
  `fk_Valstybeid_Valstybe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `miestas`
--

INSERT INTO `miestas` (`id_Miestas`, `pavadinimas`, `gyventoju_sk`, `ikurimo_data`, `fk_Valstybeid_Valstybe`) VALUES
(1, 'Siauliai', 130008, '1253-03-06 00:00:00', 127),
(2, 'Vilnius', 741000, '1300-03-16 00:00:00', 127),
(3, 'Kaunas', 452121, '1852-03-01 00:00:00', 127),
(4, 'Klaipeda', 123411, '1234-03-01 00:00:00', 127),
(5, 'Alytus', 95000, '1574-03-08 00:00:00', 127),
(6, 'Utena', 78000, '1634-03-15 00:00:00', 127),
(7, 'Kedainiai', 45000, '1542-03-08 00:00:00', 127);

-- --------------------------------------------------------

--
-- Table structure for table `pareigos`
--

CREATE TABLE `pareigos` (
  `pavadinimas` varchar(50) DEFAULT NULL,
  `id_Pareigos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pareigos`
--

INSERT INTO `pareigos` (`pavadinimas`, `id_Pareigos`) VALUES
('Actor', 1),
('Director', 2),
('Screenwriter', 3);

-- --------------------------------------------------------

--
-- Table structure for table `seansas`
--

CREATE TABLE `seansas` (
  `id_Seansas` int(11) NOT NULL,
  `pradzios_laikas` datetime DEFAULT NULL,
  `pabaigos_laikas` datetime DEFAULT NULL,
  `kaina` double DEFAULT NULL,
  `fk_Filmasid_Filmas` int(11) DEFAULT NULL,
  `fk_Kino_teatrasid_Kino_teatras` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seansas`
--

INSERT INTO `seansas` (`id_Seansas`, `pradzios_laikas`, `pabaigos_laikas`, `kaina`, `fk_Filmasid_Filmas`, `fk_Kino_teatrasid_Kino_teatras`) VALUES
(1, '2016-03-03 17:00:00', '2016-03-03 19:20:00', 1, 1, 1),
(2, '2016-03-02 12:35:00', '2016-03-03 15:00:00', 6, 7, 4),
(3, '2016-03-04 15:25:00', '2016-03-04 17:50:00', 6, 7, 4),
(4, '2016-03-05 18:25:00', '2016-03-05 20:30:00', 6, 1, 5),
(5, '2016-03-06 20:00:00', '2016-03-06 21:40:00', 6, 7, 6),
(6, '2016-03-07 16:45:00', '2016-03-07 18:57:00', 6, 10, 3),
(7, '2016-03-05 21:25:00', '2016-03-05 23:50:00', 6, 12, 5),
(8, '2016-03-04 15:00:00', '2016-03-04 17:20:00', 6, 5, 4),
(9, '2016-03-05 16:45:00', '2016-03-05 19:00:00', 6, 8, 4),
(10, '2016-03-06 20:00:00', '2016-03-06 22:30:00', 6, 10, 5),
(11, '2016-03-07 19:00:00', '2016-03-07 21:20:00', 6, 10, 3),
(12, '2016-03-07 16:00:00', '2016-03-07 18:20:00', 6, 6, 5),
(13, '2016-03-08 17:30:00', '2016-03-08 19:45:00', 6, 2, 7),
(14, '2016-03-09 19:00:00', '2016-03-09 21:50:00', 6, 1, 6),
(15, '2016-03-05 17:00:00', '2016-03-05 19:55:00', 6, 8, 6),
(16, '2016-03-08 17:00:00', '2016-03-17 17:45:00', 6, 10, 5),
(17, '2016-03-09 13:00:00', '2016-03-09 15:30:00', 6, 8, 5),
(18, '2016-03-10 16:25:00', '2016-03-10 18:50:00', 6, 12, 4),
(19, '2016-03-10 17:30:00', '2016-03-10 20:00:00', 6, 6, 6),
(20, '2016-03-11 20:00:00', '2016-03-11 23:00:00', 6, 7, 3),
(21, '2016-03-13 16:00:00', '2016-03-13 18:25:00', 6, 6, 3),
(22, '2016-03-10 19:00:00', '2016-03-10 21:00:00', 6, 8, 6),
(23, '2016-03-09 15:00:00', '2016-03-09 17:20:00', 6, 11, 3),
(24, '2016-03-10 16:00:00', '2016-03-10 18:25:00', 6, 12, 3),
(25, '2016-03-09 17:25:00', '2016-03-09 20:00:00', 6, 7, 3),
(26, '2016-03-18 17:30:00', '2016-03-18 19:30:00', 6, 9, 2),
(27, '2016-03-19 16:30:00', '2016-03-19 19:00:00', 6, 18, 4),
(28, '2016-03-20 16:30:00', '2016-03-20 18:30:00', 6, 19, 4),
(29, '2016-03-21 17:30:00', '2016-03-21 19:30:00', 6, 10, 5),
(30, '2016-03-21 15:30:00', '2016-03-21 17:30:00', 6, 27, 5),
(31, '0000-00-00 00:00:00', '2016-01-01 02:00:00', 4, 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `valstybe`
--

CREATE TABLE `valstybe` (
  `id_Valstybe` int(11) NOT NULL,
  `zemynas` varchar(50) DEFAULT NULL,
  `gyventoju_sk` int(11) DEFAULT NULL,
  `pavadinimas` varchar(50) DEFAULT NULL,
  `laiko_zona` int(11) DEFAULT NULL,
  `ikurimo_data` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `valstybe`
--

INSERT INTO `valstybe` (`id_Valstybe`, `zemynas`, `gyventoju_sk`, `pavadinimas`, `laiko_zona`, `ikurimo_data`) VALUES
(1, 'Asia', 1936859, 'Afghanistan', 1, '1921-05-06 00:00:00'),
(2, 'Europe', 9650361, 'Ã…land Islands', 2, '1890-11-07 00:00:00'),
(3, 'Europe', 2062927, 'Albania', 3, '1901-09-10 00:00:00'),
(4, 'Africa', 8352326, 'Algeria', 4, '1930-04-01 00:00:00'),
(5, 'Oceania', 8932129, 'American Samoa', 1, '1929-07-06 00:00:00'),
(6, 'Europe', 1495208, 'Andorra', 0, '1906-12-02 00:00:00'),
(7, 'Africa', 2630920, 'Angola', 3, '1876-09-13 00:00:00'),
(8, 'North America', 1911041, 'Anguilla', 4, '1925-05-10 00:00:00'),
(9, 'Antarctica', 2319458, 'Antarctica', 4, '1873-03-29 00:00:00'),
(10, 'North America', 6400604, 'Antigua and Barbuda', 5, '1882-05-29 00:00:00'),
(11, 'South America', 1001647, 'Argentina', 0, '1919-03-11 00:00:00'),
(12, 'Asia', 6983429, 'Armenia', 0, '1882-07-11 00:00:00'),
(13, 'North America', 3775146, 'Aruba', 0, '1891-10-23 00:00:00'),
(14, 'Oceania', 2147796, 'Australia', 5, '1902-06-17 00:00:00'),
(15, 'Europe', 3081360, 'Austria', 2, '1915-08-12 00:00:00'),
(16, 'Asia', 8100739, 'Azerbaijan', 3, '1927-11-15 00:00:00'),
(17, 'North America', 7955445, 'Bahamas', 2, '1910-08-20 00:00:00'),
(18, 'Asia', 7018036, 'Bahrain', 1, '1902-01-02 00:00:00'),
(19, 'Asia', 1276306, 'Bangladesh', 4, '1896-11-11 00:00:00'),
(20, 'North America', 3294220, 'Barbados', 1, '1924-12-19 00:00:00'),
(21, 'Europe', 5016602, 'Belarus', 3, '1889-04-04 00:00:00'),
(22, 'Europe', 7792572, 'Belgium', 0, '1904-05-03 00:00:00'),
(23, 'North America', 1492736, 'Belize', 3, '1921-05-16 00:00:00'),
(24, 'Africa', 4095123, 'Benin', 5, '1879-08-07 00:00:00'),
(25, 'North America', 7614868, 'Bermuda', 4, '1873-12-08 00:00:00'),
(26, 'Asia', 4752655, 'Bhutan', 4, '1904-04-25 00:00:00'),
(27, 'South America', 5136902, 'Bolivia', 5, '1905-01-19 00:00:00'),
(28, 'Europe', 8534699, 'Bosnia and Herzegovina', 3, '1893-08-04 00:00:00'),
(29, 'Africa', 5906494, 'Botswana', 4, '1879-04-17 00:00:00'),
(30, 'Antarctica', 2679535, 'Bouvet Island', 0, '1926-12-28 00:00:00'),
(31, 'South America', 9115052, 'Brazil', 1, '1908-04-30 00:00:00'),
(32, 'Asia', 1144195, 'British Indian Ocean Territory', 0, '1914-10-24 00:00:00'),
(33, 'Asia', 3547729, 'Brunei Darussalam', 4, '1895-06-02 00:00:00'),
(34, 'Europe', 1854461, 'Bulgaria', 2, '1905-03-15 00:00:00'),
(35, 'Africa', 5833435, 'Burkina Faso', 4, '1903-11-12 00:00:00'),
(36, 'Africa', 6954865, 'Burundi', 2, '1923-10-03 00:00:00'),
(37, 'Asia', 8694825, 'Cambodia', 4, '1877-02-09 00:00:00'),
(38, 'Africa', 7058685, 'Cameroon', 5, '1923-04-08 00:00:00'),
(39, 'North America', 1198303, 'Canada', 4, '1891-06-03 00:00:00'),
(40, 'Africa', 1497955, 'Cape Verde', 1, '1928-08-14 00:00:00'),
(41, 'North America', 7004028, 'Cayman Islands', 0, '1930-05-09 00:00:00'),
(42, 'Africa', 9573456, 'Central African Republic', 5, '1918-02-10 00:00:00'),
(43, 'Africa', 5615906, 'Chad', 2, '1904-09-27 00:00:00'),
(44, 'South America', 9804718, 'Chile', 4, '1909-11-23 00:00:00'),
(45, 'Asia', 6631592, 'China', 1, '1895-12-17 00:00:00'),
(46, 'Asia', 5180023, 'Christmas Island', 0, '1911-11-11 00:00:00'),
(47, 'Asia', 6992493, 'Cocos (Keeling) Islands', 1, '1884-03-02 00:00:00'),
(48, 'South America', 7406403, 'Colombia', 3, '1877-06-14 00:00:00'),
(49, 'Africa', 2233764, 'Comoros', 3, '1877-11-06 00:00:00'),
(50, 'Africa', 3159637, 'Congo', 0, '1898-04-16 00:00:00'),
(51, 'Africa', 6734314, 'The Democratic Republic of The Congo', 2, '1923-10-11 00:00:00'),
(52, 'Oceania', 1334259, 'Cook Islands', 0, '1927-12-12 00:00:00'),
(53, 'North America', 1966796, 'Costa Rica', 0, '1892-01-20 00:00:00'),
(55, 'Europe', 1747619, 'Croatia', 0, '1903-10-04 00:00:00'),
(56, 'North America', 3119537, 'Cuba', 3, '1893-05-01 00:00:00'),
(57, 'Asia', 9486939, 'Cyprus', 5, '1927-05-01 00:00:00'),
(58, 'Europe', 2863006, 'Czech Republic', 1, '1921-12-12 00:00:00'),
(59, 'Europe', 2438659, 'Denmark', 4, '1916-03-03 00:00:00'),
(60, 'Africa', 1793487, 'Djibouti', 2, '1872-04-07 00:00:00'),
(61, 'North America', 5950440, 'Dominica', 4, '1880-08-24 00:00:00'),
(62, 'North America', 9649262, 'Dominican Republic', 5, '1916-03-27 00:00:00'),
(63, 'South America', 5713684, 'Ecuador', 3, '1903-06-17 00:00:00'),
(64, 'Africa', 8887360, 'Egypt', 1, '1874-10-13 00:00:00'),
(65, 'North America', 4013550, 'El Salvador', 5, '1917-12-01 00:00:00'),
(66, 'Africa', 1933563, 'Equatorial Guinea', 5, '1883-05-04 00:00:00'),
(67, 'Africa', 3978943, 'Eritrea', 4, '1897-06-10 00:00:00'),
(68, 'Europe', 4432403, 'Estonia', 1, '1878-03-16 00:00:00'),
(69, 'Africa', 2832519, 'Ethiopia', 1, '1876-01-08 00:00:00'),
(70, 'South America', 2497162, 'Falkland Islands (Malvinas)', 1, '1904-08-24 00:00:00'),
(71, 'Europe', 3140686, 'Faroe Islands', 4, '1899-07-19 00:00:00'),
(72, 'Oceania', 8959870, 'Fiji', 0, '1894-10-28 00:00:00'),
(73, 'Europe', 6063599, 'Finland', 0, '1921-12-15 00:00:00'),
(74, 'Europe', 2621307, 'France', 0, '1916-09-02 00:00:00'),
(75, 'South America', 4605163, 'French Guiana', 4, '1881-08-09 00:00:00'),
(76, 'Oceania', 2501007, 'French Polynesia', 4, '1900-12-17 00:00:00'),
(77, 'Antarctica', 3863037, 'French Southern Territories', 1, '1893-05-08 00:00:00'),
(78, 'Africa', 7087250, 'Gabon', 4, '1883-02-15 00:00:00'),
(79, 'Africa', 5278625, 'Gambia', 0, '1905-02-17 00:00:00'),
(80, 'Asia', 5587067, 'Georgia', 0, '1907-10-24 00:00:00'),
(81, 'Europe', 8887085, 'Germany', 4, '1896-07-18 00:00:00'),
(82, 'Africa', 7176239, 'Ghana', 1, '1917-05-11 00:00:00'),
(83, 'Europe', 6567322, 'Gibraltar', 5, '1884-12-07 00:00:00'),
(84, 'Europe', 7249298, 'Greece', 1, '1894-10-16 00:00:00'),
(85, 'North America', 2291992, 'Greenland', 3, '1887-02-02 00:00:00'),
(86, 'North America', 7669525, 'Grenada', 3, '1925-12-07 00:00:00'),
(87, 'North America', 5377502, 'Guadeloupe', 3, '1878-07-18 00:00:00'),
(88, 'Oceania', 1018951, 'Guam', 3, '1929-12-06 00:00:00'),
(89, 'North America', 5734009, 'Guatemala', 5, '1914-02-20 00:00:00'),
(90, 'Europe', 8848359, 'Guernsey', 1, '1901-07-09 00:00:00'),
(91, 'Africa', 3115417, 'Guinea', 2, '1919-10-13 00:00:00'),
(92, 'Africa', 2927276, 'Guinea-bissau', 4, '1874-11-22 00:00:00'),
(93, 'South America', 9369385, 'Guyana', 3, '1874-04-28 00:00:00'),
(94, 'North America', 6493988, 'Haiti', 1, '1929-05-07 00:00:00'),
(95, 'Antarctica', 5687317, 'Heard Island and Mcdonald Islands', 4, '1891-02-01 00:00:00'),
(96, 'Europe', 6505524, 'Holy See (Vatican City State)', 5, '1916-07-14 00:00:00'),
(97, 'North America', 7854370, 'Honduras', 5, '1873-10-27 00:00:00'),
(98, 'Asia', 9887665, 'Hong Kong', 4, '1883-05-05 00:00:00'),
(99, 'Europe', 5499451, 'Hungary', 3, '1883-05-04 00:00:00'),
(100, 'Europe', 9784943, 'Iceland', 3, '1915-07-11 00:00:00'),
(101, 'Asia', 9345215, 'India', 4, '1926-04-03 00:00:00'),
(102, 'Asia', 5810638, 'Indonesia', 5, '1907-09-22 00:00:00'),
(103, 'Asia', 8458069, 'Iran', 4, '1899-12-02 00:00:00'),
(104, 'Asia', 6296784, 'Iraq', 1, '1881-11-24 00:00:00'),
(105, 'Europe', 8498169, 'Ireland', 0, '1905-11-17 00:00:00'),
(106, 'Europe', 3544159, 'Isle of Man', 4, '1878-04-05 00:00:00'),
(107, 'Asia', 6969422, 'Israel', 4, '1910-11-17 00:00:00'),
(108, 'Europe', 3072296, 'Italy', 1, '1913-01-22 00:00:00'),
(109, 'North America', 4469482, 'Jamaica', 0, '1883-04-24 00:00:00'),
(110, 'Asia', 7869477, 'Japan', 3, '1877-03-01 00:00:00'),
(111, 'Europe', 6939758, 'Jersey', 3, '1919-06-29 00:00:00'),
(112, 'Asia', 2642730, 'Jordan', 5, '1900-01-15 00:00:00'),
(113, 'Asia', 9915406, 'Kazakhstan', 3, '1907-08-27 00:00:00'),
(114, 'Africa', 1067840, 'Kenya', 4, '1899-05-17 00:00:00'),
(115, 'Oceania', 9775330, 'Kiribati', 1, '1896-07-30 00:00:00'),
(117, 'Asia', 5992188, 'Republic of Korea', 5, '1875-07-10 00:00:00'),
(118, 'Asia', 5920502, 'Kuwait', 5, '1910-01-11 00:00:00'),
(119, 'Asia', 3382385, 'Kyrgyzstan', 5, '1904-09-29 00:00:00'),
(121, 'Europe', 5356079, 'Latvia', 4, '1894-04-05 00:00:00'),
(122, 'Asia', 4708710, 'Lebanon', 4, '1903-12-18 00:00:00'),
(123, 'Africa', 7167175, 'Lesotho', 5, '1915-10-20 00:00:00'),
(124, 'Africa', 2936065, 'Liberia', 1, '1898-05-17 00:00:00'),
(125, 'Africa', 7163330, 'Libya', 2, '1919-05-28 00:00:00'),
(126, 'Europe', 2213714, 'Liechtenstein', 5, '1904-06-28 00:00:00'),
(127, 'Europe', 9035950, 'Lithuania', 4, '1930-02-11 00:00:00'),
(128, 'Europe', 2998687, 'Luxembourg', 0, '1920-04-26 00:00:00'),
(129, 'Asia', 6070190, 'Macao', 5, '1880-01-19 00:00:00'),
(130, 'Europe', 7716767, 'Macedonia', 5, '1906-04-16 00:00:00'),
(131, 'Africa', 1394958, 'Madagascar', 2, '1922-08-25 00:00:00'),
(132, 'Africa', 5012482, 'Malawi', 1, '1915-09-17 00:00:00'),
(133, 'Asia', 1232910, 'Malaysia', 5, '1911-12-24 00:00:00'),
(134, 'Asia', 7999115, 'Maldives', 5, '1874-10-02 00:00:00'),
(135, 'Africa', 8150452, 'Mali', 2, '1892-10-11 00:00:00'),
(136, 'Europe', 2508697, 'Malta', 5, '1891-10-02 00:00:00'),
(137, 'Oceania', 5307739, 'Marshall Islands', 5, '1881-03-15 00:00:00'),
(138, 'North America', 3342010, 'Martinique', 5, '1920-08-19 00:00:00'),
(139, 'Africa', 3708679, 'Mauritania', 5, '1873-06-22 00:00:00'),
(140, 'Africa', 2518585, 'Mauritius', 0, '1889-11-08 00:00:00'),
(141, 'Africa', 8450928, 'Mayotte', 4, '1924-07-07 00:00:00'),
(142, 'North America', 7526703, 'Mexico', 0, '1893-03-28 00:00:00'),
(143, 'Oceania', 2975891, 'Micronesia', 0, '1925-02-07 00:00:00'),
(144, 'Europe', 7573395, 'Moldova', 0, '1916-03-17 00:00:00'),
(145, 'Europe', 5318726, 'Monaco', 2, '1910-01-02 00:00:00'),
(146, 'Asia', 2834442, 'Mongolia', 3, '1903-03-04 00:00:00'),
(147, 'Europe', 7358338, 'Montenegro', 2, '1901-07-19 00:00:00'),
(148, 'North America', 6704376, 'Montserrat', 3, '1893-02-28 00:00:00'),
(149, 'Africa', 4067383, 'Morocco', 0, '1915-05-15 00:00:00'),
(150, 'Africa', 3046478, 'Mozambique', 3, '1917-12-26 00:00:00'),
(151, 'Asia', 4762268, 'Myanmar', 0, '1923-03-06 00:00:00'),
(152, 'Africa', 2442779, 'Namibia', 5, '1890-10-21 00:00:00'),
(153, 'Oceania', 8353150, 'Nauru', 3, '1925-10-17 00:00:00'),
(154, 'Asia', 8444062, 'Nepal', 2, '1928-04-08 00:00:00'),
(155, 'Europe', 5593933, 'Netherlands', 2, '1903-01-23 00:00:00'),
(156, 'North America', 1819854, 'Netherlands Antilles', 1, '1885-09-24 00:00:00'),
(157, 'Oceania', 8332276, 'New Caledonia', 0, '1898-10-24 00:00:00'),
(158, 'Oceania', 5808441, 'New Zealand', 5, '1901-05-01 00:00:00'),
(159, 'North America', 6759583, 'Nicaragua', 4, '1903-06-17 00:00:00'),
(160, 'Africa', 7366852, 'Niger', 2, '1887-11-19 00:00:00'),
(161, 'Africa', 7661011, 'Nigeria', 3, '1880-08-07 00:00:00'),
(162, 'Oceania', 4420868, 'Niue', 3, '1891-01-09 00:00:00'),
(163, 'Oceania', 9665467, 'Norfolk Island', 0, '1894-04-12 00:00:00'),
(164, 'Oceania', 8115021, 'Northern Mariana Islands', 2, '1878-10-04 00:00:00'),
(165, 'Europe', 5495605, 'Norway', 0, '1888-12-12 00:00:00'),
(166, 'Asia', 9062592, 'Oman', 1, '1921-08-22 00:00:00'),
(167, 'Asia', 2217834, 'Pakistan', 0, '1878-01-16 00:00:00'),
(168, 'Oceania', 6595612, 'Palau', 5, '1923-07-20 00:00:00'),
(169, 'Asia', 5492310, 'Palestinia', 4, '1908-12-10 00:00:00'),
(170, 'North America', 2014862, 'Panama', 1, '1926-11-15 00:00:00'),
(171, 'Oceania', 3822937, 'Papua New Guinea', 4, '1887-06-23 00:00:00'),
(172, 'South America', 9839875, 'Paraguay', 1, '1887-09-05 00:00:00'),
(173, 'South America', 6807373, 'Peru', 2, '1899-02-17 00:00:00'),
(174, 'Asia', 6058930, 'Philippines', 4, '1872-01-07 00:00:00'),
(175, 'Oceania', 2387024, 'Pitcairn', 3, '1923-02-11 00:00:00'),
(176, 'Europe', 2379058, 'Poland', 4, '1894-03-01 00:00:00'),
(177, 'Europe', 4097046, 'Portugal', 1, '1907-11-03 00:00:00'),
(178, 'North America', 3476043, 'Puerto Rico', 5, '1929-12-02 00:00:00'),
(179, 'Asia', 8316346, 'Qatar', 3, '1899-11-04 00:00:00'),
(180, 'Africa', 9244416, 'Reunion', 5, '1926-08-05 00:00:00'),
(181, 'Europe', 5517578, 'Romania', 0, '1888-08-15 00:00:00'),
(182, 'Europe', 8047455, 'Russian Federation', 4, '1886-10-22 00:00:00'),
(183, 'Africa', 9517151, 'Rwanda', 1, '1876-02-10 00:00:00'),
(184, 'Africa', 5967194, 'Saint Helena', 0, '1874-01-30 00:00:00'),
(185, 'North America', 5725220, 'Saint Kitts and Nevis', 1, '1890-08-24 00:00:00'),
(186, 'North America', 2054412, 'Saint Lucia', 3, '1915-06-09 00:00:00'),
(187, 'North America', 7395691, 'Saint Pierre and Miquelon', 4, '1884-10-22 00:00:00'),
(188, 'North America', 8578644, 'Saint Vincent and The Grenadines', 3, '1894-11-12 00:00:00'),
(189, 'Oceania', 3876221, 'Samoa', 3, '1928-08-16 00:00:00'),
(190, 'Europe', 8278168, 'San Marino', 2, '1921-03-15 00:00:00'),
(191, 'Africa', 7858216, 'Sao Tome and Principe', 3, '1927-03-19 00:00:00'),
(192, 'Asia', 1610015, 'Saudi Arabia', 1, '1877-04-23 00:00:00'),
(193, 'Africa', 3626831, 'Senegal', 1, '1873-08-21 00:00:00'),
(194, 'Europe', 8999970, 'Serbia', 3, '1899-09-13 00:00:00'),
(195, 'Africa', 3310974, 'Seychelles', 3, '1917-05-25 00:00:00'),
(196, 'Africa', 1092559, 'Sierra Leone', 5, '1922-09-02 00:00:00'),
(197, 'Asia', 4133301, 'Singapore', 0, '1916-05-26 00:00:00'),
(198, 'Europe', 9001069, 'Slovakia', 5, '1872-05-24 00:00:00'),
(199, 'Europe', 8660218, 'Slovenia', 3, '1916-08-17 00:00:00'),
(200, 'Oceania', 9557526, 'Solomon Islands', 1, '1919-03-20 00:00:00'),
(201, 'Africa', 9051880, 'Somalia', 1, '1929-12-01 00:00:00'),
(202, 'Africa', 8562714, 'South Africa', 0, '1895-01-22 00:00:00'),
(203, 'Antarctica', 7312195, 'South Georgia and The South Sandwich Islands', 2, '1894-11-20 00:00:00'),
(204, 'Europe', 7036164, 'Spain', 4, '1907-05-14 00:00:00'),
(205, 'Asia', 8538819, 'Sri Lanka', 4, '1926-02-22 00:00:00'),
(206, 'Africa', 3466156, 'Sudan', 4, '1873-10-26 00:00:00'),
(207, 'South America', 5173157, 'Suriname', 4, '1915-07-12 00:00:00'),
(208, 'Europe', 5059723, 'Svalbard and Jan Mayen', 4, '1895-02-26 00:00:00'),
(209, 'Africa', 6250366, 'Swaziland', 4, '1896-01-01 00:00:00'),
(210, 'Europe', 2992645, 'Sweden', 3, '1918-07-12 00:00:00'),
(211, 'Europe', 3649353, 'Switzerland', 2, '1889-08-15 00:00:00'),
(212, 'Asia', 1659454, 'Syrian Arab Republic', 2, '1923-01-24 00:00:00'),
(213, 'Asia', 1342773, 'Taiwan, Province of China', 0, '1913-03-12 00:00:00'),
(214, 'Asia', 2923431, 'Tajikistan', 0, '1878-07-29 00:00:00'),
(215, 'Africa', 8647034, 'Tanzania, United Republic of', 1, '1880-05-09 00:00:00'),
(216, 'Asia', 8366608, 'Thailand', 3, '1880-02-20 00:00:00'),
(217, 'Asia', 6472290, 'Timor-leste', 5, '1907-12-28 00:00:00'),
(218, 'Africa', 3539764, 'Togo', 0, '1925-07-22 00:00:00'),
(219, 'Oceania', 3572449, 'Tokelau', 5, '1917-10-17 00:00:00'),
(220, 'Oceania', 5212433, 'Tonga', 2, '1925-12-11 00:00:00'),
(221, 'North America', 2795166, 'Trinidad and Tobago', 5, '1893-10-05 00:00:00'),
(222, 'Africa', 9622895, 'Tunisia', 0, '1904-11-10 00:00:00'),
(223, 'Asia', 3331848, 'Turkey', 1, '1885-04-18 00:00:00'),
(224, 'Asia', 3728180, 'Turkmenistan', 2, '1889-08-09 00:00:00'),
(225, 'North America', 2967651, 'Turks and Caicos Islands', 4, '1917-12-02 00:00:00'),
(226, 'Oceania', 3454071, 'Tuvalu', 5, '1929-04-29 00:00:00'),
(227, 'Africa', 9331482, 'Uganda', 0, '1875-10-04 00:00:00'),
(228, 'Europe', 1945098, 'Ukraine', 4, '1929-07-12 00:00:00'),
(229, 'Asia', 6145996, 'United Arab Emirates', 5, '1879-02-06 00:00:00'),
(230, 'Europe', 7814545, 'United Kingdom', 0, '1905-01-07 00:00:00'),
(231, 'North America', 9477601, 'United States', 0, '1887-07-15 00:00:00'),
(232, 'Oceania', 2394439, 'United States Minor Outlying Islands', 0, '1877-10-01 00:00:00'),
(233, 'South America', 6986450, 'Uruguay', 4, '1883-06-18 00:00:00'),
(234, 'Asia', 4985565, 'Uzbekistan', 1, '1886-01-10 00:00:00'),
(235, 'Oceania', 5176453, 'Vanuatu', 0, '1894-08-14 00:00:00'),
(236, 'South America', 3107452, 'Venezuela', 3, '1890-11-03 00:00:00'),
(237, 'Asia', 4645264, 'Viet Nam', 0, '1887-07-24 00:00:00'),
(238, 'North America', 8748383, 'Virgin Islands, British', 1, '1896-05-27 00:00:00'),
(239, 'North America', 2334289, 'Virgin Islands, U.S.', 5, '1898-05-08 00:00:00'),
(240, 'Oceania', 6615387, 'Wallis and Futuna', 0, '1918-11-02 00:00:00'),
(241, 'Africa', 2778686, 'Western Sahara', 1, '1877-07-24 00:00:00'),
(242, 'Asia', 1384246, 'Yemen', 3, '1930-12-03 00:00:00'),
(243, 'Africa', 2357360, 'Zambia', 2, '1872-09-23 00:00:00'),
(244, 'Africa', 1949493, 'Zimbabwe', 2, '1882-04-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `zanras`
--

CREATE TABLE `zanras` (
  `id_Zanras` int(11) NOT NULL,
  `pavadinimas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zanras`
--

INSERT INTO `zanras` (`id_Zanras`, `pavadinimas`) VALUES
(1, 'Horror'),
(2, 'Sci-fi'),
(3, 'Romance'),
(4, 'Comedy'),
(5, 'Western'),
(6, 'Biography'),
(7, 'Mystery'),
(8, 'War'),
(9, 'Thriller'),
(10, 'Music'),
(11, 'Adventure'),
(12, 'Crime'),
(13, 'Documentary'),
(14, 'War'),
(15, 'Film-noir'),
(16, 'Animation'),
(17, 'Action'),
(18, 'Drama');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apdovanojimas`
--
ALTER TABLE `apdovanojimas`
  ADD PRIMARY KEY (`id_Apdovanojimas`),
  ADD KEY `fk_Ceremonijaid_Ceremonija` (`fk_Ceremonijaid_Ceremonija`);

--
-- Indexes for table `bilietas`
--
ALTER TABLE `bilietas`
  ADD PRIMARY KEY (`id_Bilietas`),
  ADD KEY `fk_Seansasid_Seansas` (`fk_Seansasid_Seansas`),
  ADD KEY `fk_Klientasid_Klientas` (`fk_Klientasid_Klientas`);

--
-- Indexes for table `ceremonija`
--
ALTER TABLE `ceremonija`
  ADD PRIMARY KEY (`id_Ceremonija`);

--
-- Indexes for table `filmas`
--
ALTER TABLE `filmas`
  ADD PRIMARY KEY (`id_Filmas`);

--
-- Indexes for table `filmas_apdovanojimas`
--
ALTER TABLE `filmas_apdovanojimas`
  ADD PRIMARY KEY (`fk_Filmasid_Filmas`,`fk_Apdovanojimasid_Apdovanojimas`),
  ADD KEY `fk_Apdovanojimasid_Apdovanojimas` (`fk_Apdovanojimasid_Apdovanojimas`);

--
-- Indexes for table `filmas_kurejas`
--
ALTER TABLE `filmas_kurejas`
  ADD PRIMARY KEY (`fk_Filmasid_Filmas`,`fk_Kurejasid_Kurejas`),
  ADD KEY `fk_Kurejasid_Kurejas` (`fk_Kurejasid_Kurejas`);

--
-- Indexes for table `filmas_zanras`
--
ALTER TABLE `filmas_zanras`
  ADD PRIMARY KEY (`fk_Filmasid_Filmas`,`fk_Zanrasid_Zanras`),
  ADD KEY `fk_Zanrasid_Zanras` (`fk_Zanrasid_Zanras`);

--
-- Indexes for table `kino_teatras`
--
ALTER TABLE `kino_teatras`
  ADD PRIMARY KEY (`id_Kino_teatras`),
  ADD KEY `fk_Miestasid_Miestas` (`fk_Miestasid_Miestas`);

--
-- Indexes for table `klientas`
--
ALTER TABLE `klientas`
  ADD PRIMARY KEY (`id_Klientas`);

--
-- Indexes for table `kurejas`
--
ALTER TABLE `kurejas`
  ADD PRIMARY KEY (`id_Kurejas`);

--
-- Indexes for table `kurejas_apdovanojimas`
--
ALTER TABLE `kurejas_apdovanojimas`
  ADD PRIMARY KEY (`fk_Kurejasid_Kurejas`,`fk_Apdovanojimasid_Apdovanojimas`),
  ADD KEY `fk_Apdovanojimasid_Apdovanojimas` (`fk_Apdovanojimasid_Apdovanojimas`);

--
-- Indexes for table `kurejas_pareigos`
--
ALTER TABLE `kurejas_pareigos`
  ADD PRIMARY KEY (`fk_Kurejasid_Kurejas`,`fk_Pareigosid_Pareigos`),
  ADD KEY `fk_Pareigosid_Pareigos` (`fk_Pareigosid_Pareigos`);

--
-- Indexes for table `miestas`
--
ALTER TABLE `miestas`
  ADD PRIMARY KEY (`id_Miestas`),
  ADD KEY `fk_Valstybeid_Valstybe` (`fk_Valstybeid_Valstybe`);

--
-- Indexes for table `pareigos`
--
ALTER TABLE `pareigos`
  ADD PRIMARY KEY (`id_Pareigos`);

--
-- Indexes for table `seansas`
--
ALTER TABLE `seansas`
  ADD PRIMARY KEY (`id_Seansas`),
  ADD KEY `fk_Filmasid_Filmas` (`fk_Filmasid_Filmas`),
  ADD KEY `fk_Kino_teatrasid_Kino_teatras` (`fk_Kino_teatrasid_Kino_teatras`);

--
-- Indexes for table `valstybe`
--
ALTER TABLE `valstybe`
  ADD PRIMARY KEY (`id_Valstybe`);

--
-- Indexes for table `zanras`
--
ALTER TABLE `zanras`
  ADD PRIMARY KEY (`id_Zanras`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apdovanojimas`
--
ALTER TABLE `apdovanojimas`
  ADD CONSTRAINT `apdovanojimas_ibfk_1` FOREIGN KEY (`fk_Ceremonijaid_Ceremonija`) REFERENCES `ceremonija` (`id_Ceremonija`);

--
-- Constraints for table `bilietas`
--
ALTER TABLE `bilietas`
  ADD CONSTRAINT `bilietas_ibfk_1` FOREIGN KEY (`fk_Seansasid_Seansas`) REFERENCES `seansas` (`id_Seansas`),
  ADD CONSTRAINT `bilietas_ibfk_2` FOREIGN KEY (`fk_Klientasid_Klientas`) REFERENCES `klientas` (`id_Klientas`);

--
-- Constraints for table `filmas_apdovanojimas`
--
ALTER TABLE `filmas_apdovanojimas`
  ADD CONSTRAINT `filmas_apdovanojimas_ibfk_1` FOREIGN KEY (`fk_Filmasid_Filmas`) REFERENCES `filmas` (`id_Filmas`),
  ADD CONSTRAINT `filmas_apdovanojimas_ibfk_2` FOREIGN KEY (`fk_Apdovanojimasid_Apdovanojimas`) REFERENCES `apdovanojimas` (`id_Apdovanojimas`);

--
-- Constraints for table `filmas_kurejas`
--
ALTER TABLE `filmas_kurejas`
  ADD CONSTRAINT `filmas_kurejas_ibfk_1` FOREIGN KEY (`fk_Filmasid_Filmas`) REFERENCES `filmas` (`id_Filmas`),
  ADD CONSTRAINT `filmas_kurejas_ibfk_2` FOREIGN KEY (`fk_Kurejasid_Kurejas`) REFERENCES `kurejas` (`id_Kurejas`);

--
-- Constraints for table `filmas_zanras`
--
ALTER TABLE `filmas_zanras`
  ADD CONSTRAINT `filmas_zanras_ibfk_1` FOREIGN KEY (`fk_Filmasid_Filmas`) REFERENCES `filmas` (`id_Filmas`),
  ADD CONSTRAINT `filmas_zanras_ibfk_2` FOREIGN KEY (`fk_Zanrasid_Zanras`) REFERENCES `zanras` (`id_Zanras`);

--
-- Constraints for table `kino_teatras`
--
ALTER TABLE `kino_teatras`
  ADD CONSTRAINT `kino_teatras_ibfk_1` FOREIGN KEY (`fk_Miestasid_Miestas`) REFERENCES `miestas` (`id_Miestas`);

--
-- Constraints for table `kurejas_apdovanojimas`
--
ALTER TABLE `kurejas_apdovanojimas`
  ADD CONSTRAINT `kurejas_apdovanojimas_ibfk_1` FOREIGN KEY (`fk_Kurejasid_Kurejas`) REFERENCES `kurejas` (`id_Kurejas`),
  ADD CONSTRAINT `kurejas_apdovanojimas_ibfk_2` FOREIGN KEY (`fk_Apdovanojimasid_Apdovanojimas`) REFERENCES `apdovanojimas` (`id_Apdovanojimas`);

--
-- Constraints for table `kurejas_pareigos`
--
ALTER TABLE `kurejas_pareigos`
  ADD CONSTRAINT `kurejas_pareigos_ibfk_1` FOREIGN KEY (`fk_Kurejasid_Kurejas`) REFERENCES `kurejas` (`id_Kurejas`),
  ADD CONSTRAINT `kurejas_pareigos_ibfk_2` FOREIGN KEY (`fk_Pareigosid_Pareigos`) REFERENCES `pareigos` (`id_Pareigos`);

--
-- Constraints for table `miestas`
--
ALTER TABLE `miestas`
  ADD CONSTRAINT `miestas_ibfk_1` FOREIGN KEY (`fk_Valstybeid_Valstybe`) REFERENCES `valstybe` (`id_Valstybe`);

--
-- Constraints for table `seansas`
--
ALTER TABLE `seansas`
  ADD CONSTRAINT `seansas_ibfk_1` FOREIGN KEY (`fk_Filmasid_Filmas`) REFERENCES `filmas` (`id_Filmas`),
  ADD CONSTRAINT `seansas_ibfk_2` FOREIGN KEY (`fk_Kino_teatrasid_Kino_teatras`) REFERENCES `kino_teatras` (`id_Kino_teatras`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
