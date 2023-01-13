-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 12:52 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `christies`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_cat` int(11) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `img` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_cat`, `nombre`, `descripcion`, `img`) VALUES
(1, 'viajes virtuales', 'Viajes virtuales localizados por todo el mundo', ''),
(2, 'placer gastronomico', 'Placer gastronomico digital', ''),
(3, 'deporte imposible', 'deporte que no se puede realizar', ''),
(4, 'prendas vestir', 'Prendas de vestir para mundos virtuales', '');

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id_com` int(11) NOT NULL,
  `contenido` varchar(500) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `id_objeto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `id_objeto` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `objeto`
--

CREATE TABLE `objeto` (
  `id_objeto` int(11) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `lat` decimal(20,20) NOT NULL,
  `lon` decimal(20,20) NOT NULL,
  `precio` decimal(64,4) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('admin','user') NOT NULL DEFAULT 'user',
  `tokens` decimal(9,4) NOT NULL DEFAULT 100.0000,
  `telf` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_user`, `email`, `password`, `rol`, `tokens`, `telf`) VALUES
(1, 'admin@admin.com', '2b12e1a2252d642c09f640b63ed35dcc5690464a', 'admin', '99999.0000', '897767887'),
(2, 'ghenric0@github.com', '05cd4f3caaae4ec88d6f97fd287ad29d04cbb884', 'user', '100.0000', '6886915588'),
(3, 'wgerner1@yahoo.co.jp', 'd04ddac224cad06312f89740d2223d9486061d48', 'user', '100.0000', '9782482585'),
(4, 'bneissen2@ed.gov', '83fdf4e4608dc6160eec4e0fb66e30d0d70ee680', 'user', '100.0000', '4778438355'),
(5, 'gkurten3@dailymail.co.uk', 'c771d51ad5ab616b8431a129ce9752d606d4f877', 'user', '100.0000', '8741724198'),
(6, 'vsivess4@intel.com', '5a48ab2832bcf84e86cc815f8b7ec37b60f55709', 'user', '100.0000', '6671322894'),
(7, 'ahamnet5@jalbum.net', '325868373fce81457895fae5e7a0bf7e65d2c6b8', 'user', '100.0000', '1156966907'),
(8, 'ktruluck6@bloglines.com', '76d2ed3620be467fb4e37d7cc3e2f7f9d8abbf3e', 'user', '100.0000', '3752331808'),
(9, 'abagshawe7@mlb.com', '1c333656c333271966d2616e27d1228a5d5180d0', 'user', '100.0000', '7627925288'),
(10, 'jpay8@ted.com', '9441e90def29727d7afe20a42242d52754373082', 'user', '100.0000', '5228847628'),
(11, 'dburnand9@about.me', 'a3d547c07902b443c076d205e3fd4c7f76c13bd4', 'user', '100.0000', '5475820265'),
(12, 'kfraginoa@dropbox.com', '539e7b80cfb6c95a5a582d03eafa48d0b463698f', 'user', '100.0000', '7377271329'),
(13, 'hascroftb@globo.com', '374efda6cf11d3473f7dd9bb3e8d7c8d01bac5aa', 'user', '100.0000', '6409831541'),
(14, 'jmcwhinniec@cpanel.net', '54f295f4e9dc63fbf3b01cf17c646d69deefdd48', 'user', '100.0000', '5349884815'),
(15, 'mklosad@example.com', '85f75c76f3b36da788bf19fb18631e6d57bdba6b', 'user', '100.0000', '4549056686'),
(16, 'hmelwalle@ocn.ne.jp', '1601b624b840e2dc594972ab1a9195c397983f54', 'user', '100.0000', '2521663631'),
(17, 'gparleyf@indiatimes.com', '03f2cfd7e88f76f4403d3e2c36dfc943798bfcbb', 'user', '100.0000', '9457723292'),
(18, 'mfrayng@cafepress.com', '5b0b19b9c31a1c8ccb898b6b5d62cf260fb5f4bb', 'user', '100.0000', '4275471273'),
(19, 'mcurrallh@example.com', '40ac7285a4cbe8853eda5a6c53534a46290f1bfe', 'user', '100.0000', '5887078151'),
(20, 'wjeevesi@yahoo.co.jp', 'cd099ba3c203822435b9e37b63839611d645d747', 'user', '100.0000', '4017793708'),
(21, 'aspearej@zimbio.com', '946453e9462aa10fff4ad2a36023f496ce6e5fab', 'user', '100.0000', '3907075361'),
(22, 'cmckeemank@networkadvertising.org', '4bf9c62f0500d45a9d528d26469ef1e48bac4c6c', 'user', '100.0000', '1109725279'),
(23, 'jleathleyl@sciencedaily.com', '7bbfe113c63ae4c9afdd827173b45b965811b57f', 'user', '100.0000', '4815493787'),
(24, 'mniavesm@mit.edu', '0ee04cbe0e5d4d5af135098c5a4608c5dd6ca7bb', 'user', '100.0000', '7391288586'),
(25, 'sholsonn@goodreads.com', '6dbbf1f36d5a5714f82482f0d8cd5f2a980fc028', 'user', '100.0000', '5494439711'),
(26, 'adeegino@wiley.com', 'd1cb5a3231c1379ec7b1ae47b2b99b5cc777eb58', 'user', '100.0000', '4807458281'),
(27, 'tbristowp@dion.ne.jp', '5d8cb7217c8d71c8001e3a2d715235cea5353f1e', 'user', '100.0000', '6057930427'),
(28, 'sleechq@house.gov', '12e1b6821054e55edea9be4dc57835b95d7d50eb', 'user', '100.0000', '3133024958'),
(29, 'mcruzr@usatoday.com', '6167d86d14c30d834f5ce80c21061b7793cf6ee4', 'user', '100.0000', '4663574268'),
(30, 'cpettersens@cbsnews.com', 'c81494c7c3e98cc91a1dd2d7e0be24c756d45b0f', 'user', '100.0000', '5523006177'),
(31, 'gwilliamt@quantcast.com', '7cd91510d2e7e2d51e764e619b3a1c6f2572332e', 'user', '100.0000', '8923792730');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `comentarios_ibfk_1` (`id_objeto`),
  ADD KEY `comentarios_ibfk_2` (`id_user`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `compras_ibfk_1` (`id_objeto`),
  ADD KEY `compras_ibfk_2` (`id_user`);

--
-- Indexes for table `objeto`
--
ALTER TABLE `objeto`
  ADD PRIMARY KEY (`id_objeto`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `objeto`
--
ALTER TABLE `objeto`
  MODIFY `id_objeto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_objeto`) REFERENCES `objeto` (`id_objeto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_objeto`) REFERENCES `objeto` (`id_objeto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `objeto`
--
ALTER TABLE `objeto`
  ADD CONSTRAINT `objeto_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
