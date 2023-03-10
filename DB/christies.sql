-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 03:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
DROP DATABASE IF EXISTS `christies`;
CREATE DATABASE IF NOT EXISTS `christies` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `christies`;

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
(1, 'Viajes virtuales', 'Viajes personalizados localizados alrededor de todo el mundo.', 'http://localhost/christies/mvc/view/admin/imgs/categorias/1.jpg'),
(2, 'placer gastronomico', 'Placer gastronomico digital', 'http://localhost/christies/mvc/view/admin/imgs/categorias/2.jpg'),
(3, 'deporte imposible', 'deporte que no se puede realizar', 'http://localhost/christies/mvc/view/admin/imgs/categorias/3.jpg'),
(4, 'prendas de vestir', 'Prendas para vestir para mundos virtuales', 'http://localhost/christies/mvc/view/admin/imgs/categorias/4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comentario`
--

CREATE TABLE `comentario` (
  `id_com` int(11) NOT NULL,
  `contenido` varchar(500) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `id_objeto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comentario`
--

INSERT INTO `comentario` (`id_com`, `contenido`, `fecha`, `id_objeto`, `id_user`) VALUES
(1, 'asdasda', '2023-01-21', 3, 29),
(2, 'dsadsasdasd', '2023-01-21', 3, 8),
(3, 'kjskjdfkjsndf', '2023-01-21', 3, 29),
(4, 'Comenatrio random random random', '2023-01-22', 10, 15),
(5, 'Comenatrio random random random', '2023-01-22', 10, 29),
(6, 'Comenatrio random random random', '2023-01-22', 7, 8),
(7, 'Comenatrio random random random', '2023-01-22', 10, 11),
(8, 'Comenatrio random random random', '2023-01-22', 3, 4),
(9, 'Comenatrio random random random', '2023-01-22', 6, 7),
(10, 'Comenatrio random random random', '2023-01-22', 4, 3),
(11, 'Comenatrio random random random', '2023-01-22', 9, 27),
(12, 'Comenatrio random random random', '2023-01-22', 5, 29),
(13, 'Comenatrio random random random', '2023-01-22', 1, 30),
(14, 'Comenatrio random random random', '2023-01-22', 2, 21),
(15, 'Comenatrio random random random', '2023-01-22', 9, 19),
(16, 'Comenatrio random random random', '2023-01-22', 8, 22),
(17, 'Comenatrio random random random', '2023-01-22', 4, 29),
(18, 'Comenatrio random random random', '2023-01-22', 5, 6),
(19, 'Comenatrio random random random', '2023-01-22', 5, 18),
(20, 'Comenatrio random random random', '2023-01-22', 10, 4),
(21, 'Comenatrio random random random', '2023-01-22', 10, 5),
(22, 'Comenatrio random random random', '2023-01-22', 5, 9),
(23, 'Comenatrio random random random', '2023-01-22', 10, 31),
(24, 'Comenatrio random random random', '2023-01-22', 10, 4),
(25, 'Comenatrio random random random', '2023-01-22', 10, 22),
(26, 'Comenatrio random random random', '2023-01-22', 2, 9),
(27, 'Comenatrio random random random', '2023-01-22', 2, 18),
(28, 'Comenatrio random random random', '2023-01-22', 4, 22),
(29, 'Comenatrio random random random', '2023-01-22', 10, 22),
(30, 'Comenatrio random random random', '2023-01-22', 9, 22),
(31, 'Comenatrio random random random', '2023-01-22', 7, 7),
(32, 'Comenatrio random random random', '2023-01-22', 1, 22),
(33, 'Comenatrio random random random', '2023-01-22', 5, 30),
(34, 'Comenatrio random random random', '2023-01-22', 6, 5),
(35, 'The admin com', '2023-01-25', 8, 1),
(36, 'The admin com', '2023-01-25', 5, 1),
(38, 'The admin com', '2023-01-26', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `id_objeto` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compra`
--

INSERT INTO `compra` (`id_compra`, `fecha`, `id_objeto`, `id_user`) VALUES
(1, '2023-01-19', 1, 1),
(2, '2023-01-20', 1, NULL),
(3, '2023-01-24', 2, 1),
(4, '2023-01-24', 2, 1),
(5, '2023-01-24', 2, 1),
(6, '2023-01-24', 2, 1),
(7, '2023-01-25', 1, NULL),
(8, '2023-01-27', 10, 1),
(9, '2023-01-27', 8, 1),
(10, '2023-01-27', 5, 1),
(11, '2023-01-27', 3, 1),
(12, '2023-01-27', 3, 1),
(13, '2023-01-27', 3, 1),
(14, '2023-01-27', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `objeto`
--

CREATE TABLE `objeto` (
  `id_objeto` int(11) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `lat` decimal(8,6) DEFAULT NULL,
  `lon` decimal(9,6) DEFAULT NULL,
  `precio` decimal(64,2) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `objeto`
--

INSERT INTO `objeto` (`id_objeto`, `nombre`, `lat`, `lon`, `precio`, `img1`, `img2`, `img3`, `id_cat`) VALUES
(1, 'tiramisua', '12.505046', '123.414445', '6.99', 'http://localhost/christies/mvc/view/admin/imgs/productos/1_1.jpg', 'http://localhost/christies/mvc/view/admin/imgs/productos/1_2.jpg', NULL, 2),
(2, 'lunaTica', '20.724011', '-97.530817', '5000.00', 'http://localhost/christies/mvc/view/admin/imgs/productos/2_1.jpg', 'http://localhost/christies/mvc/view/admin/imgs/productos/2_2.jpg', '', 1),
(3, 'Cazadora virtual', '-7.020680', '112.396364', '59.99', 'http://localhost/christies/mvc/view/admin/imgs/productos/3_1.jpg', 'http://localhost/christies/mvc/view/admin/imgs/productos/3_2.png', '', 4),
(4, 'viaje a maldivas', '45.402837', '11.857706', '1000.00', 'http://localhost/christies/mvc/view/admin/imgs/productos/4_1.jpg', 'http://localhost/christies/mvc/view/admin/imgs/productos/4_2.png', '', 1),
(5, 'salto bungee', '44.367191', '20.960452', '30.00', 'http://localhost/christies/mvc/view/admin/imgs/productos/5_1.jpg', 'http://localhost/christies/mvc/view/admin/imgs/productos/5_2.png', '', 3),
(6, 'new york viaje', '13.467767', '144.745323', '800.00', 'http://localhost/christies/mvc/view/admin/imgs/productos/6_1.jpg', 'http://localhost/christies/mvc/view/admin/imgs/productos/6_2.png', '', 1),
(7, 'lubina', '6.832201', '3.631913', '25.00', 'http://localhost/christies/mvc/view/admin/imgs/productos/7_1.jpg', 'http://localhost/christies/mvc/view/admin/imgs/productos/7_2.png', '', 2),
(8, 'soccer jersey', '-29.688048', '-51.133338', '80.00', 'http://localhost/christies/mvc/view/admin/imgs/productos/8_1.jpg', 'http://localhost/christies/mvc/view/admin/imgs/productos/8_2.png', '', 4),
(9, 'futbol espacial', '55.650000', '-122.252570', '2999.00', 'http://localhost/christies/mvc/view/admin/imgs/productos/9_1.jpg', 'http://localhost/christies/mvc/view/admin/imgs/productos/9_2.png', '', 3),
(10, 'baseball pie', '14.375816', '121.039038', '500.00', 'http://localhost/christies/mvc/view/admin/imgs/productos/10_1.jpg', 'http://localhost/christies/mvc/view/admin/imgs/productos/10_2.jpg', '', 3),
(11, 'Bocata lomo', '37.749246', '140.472968', '6.00', 'http://localhost/christies/mvc/view/admin/imgs/productos/11_1.jpg', 'http://localhost/christies/mvc/view/admin/imgs/productos/11_2.jpg', '', 2),
(12, 'Polo nthf', '41.468940', '44.785078', '79.99', 'http://localhost/christies/mvc/view/admin/imgs/productos/12_1.jpg', '', NULL, 4),
(13, 'Escalada acuatica', '21.565982', '106.299291', '35.00', 'http://localhost/christies/mvc/view/admin/imgs/productos/13_1.jpg', '', NULL, 3),
(14, 'Botas tm', '50.414572', '16.165635', '99.99', 'http://localhost/christies/mvc/view/admin/imgs/productos/14_1.jpg', 'http://localhost/christies/mvc/view/admin/imgs/productos/14_2.jpg', '', 4),
(15, 'centro tierra', NULL, NULL, '1999.99', '', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `puntuacion`
--

CREATE TABLE `puntuacion` (
  `id` int(11) NOT NULL,
  `id_obj` int(11) NOT NULL,
  `puntuacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `puntuacion`
--

INSERT INTO `puntuacion` (`id`, `id_obj`, `puntuacion`) VALUES
(1, 3, 5),
(2, 10, 10),
(3, 7, 2),
(4, 6, 3),
(5, 4, 4),
(6, 9, 3),
(7, 5, 8),
(8, 1, 4),
(9, 2, 4),
(10, 8, 3);

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
(1, 'admin@admin.com', '2b12e1a2252d642c09f640b63ed35dcc5690464a', 'admin', '99203.0399', '897767887323'),
(2, 'asdja@github,com', '05cd4f3caaae4ec88d6f97fd287ad29d04cbb884', 'user', '300.0000', '6453453'),
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
(31, 'gwilliamt@quantcast.com', '7cd91510d2e7e2d51e764e619b3a1c6f2572332e', 'user', '100.0000', '8923792730'),
(33, 'usr1@usr1.com', '2b12e1a2252d642c09f640b63ed35dcc5690464a', 'user', '200.0000', '123123123123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `comentarios_ibfk_1` (`id_objeto`),
  ADD KEY `comentarios_ibfk_2` (`id_user`);

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
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
-- Indexes for table `puntuacion`
--
ALTER TABLE `puntuacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_obj` (`id_obj`);

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
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `objeto`
--
ALTER TABLE `objeto`
  MODIFY `id_objeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `puntuacion`
--
ALTER TABLE `puntuacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_objeto`) REFERENCES `objeto` (`id_objeto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_objeto`) REFERENCES `objeto` (`id_objeto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `objeto`
--
ALTER TABLE `objeto`
  ADD CONSTRAINT `objeto_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `puntuacion`
--
ALTER TABLE `puntuacion`
  ADD CONSTRAINT `puntuacion_ibfk_1` FOREIGN KEY (`id_obj`) REFERENCES `objeto` (`id_objeto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
