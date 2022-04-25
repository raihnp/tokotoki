-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2022 at 09:51 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokotoki`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_users` varchar(50) NOT NULL,
  `productID` varchar(50) NOT NULL,
  `jumlah` int(25) NOT NULL,
  `harga` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_users`, `productID`, `jumlah`, `harga`) VALUES
(7, '7', '4', 1, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `ekspedisi`
--

CREATE TABLE `ekspedisi` (
  `id_ekspedisi` int(11) NOT NULL,
  `nama_ekspedisi` varchar(11) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ekspedisi`
--

INSERT INTO `ekspedisi` (`id_ekspedisi`, `nama_ekspedisi`, `tarif`) VALUES
(1, 'J&T', 15000),
(2, 'JNE', 17000),
(3, 'SiCepat', 16000);

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(10) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(2, 'Jakarta', 31000),
(4, 'Bandung', 29000),
(5, 'Medan', 35000),
(7, 'Pontianak', 30000),
(8, 'Pekanbaru', 25000),
(9, 'Bali', 45000),
(10, 'Padang', 38000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`) VALUES
(1, 'andiraka@gmail.com', 'pelanggan', 'Andi Raka', '085278786565'),
(6, 'julius@gmail.com', 'julius', 'Julius Caesar', '086575432341');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_product` varchar(50) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `jumlah_product` varchar(50) NOT NULL,
  `nama_ekspedisi` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`) VALUES
(20, 17, 10, 1),
(21, 17, 14, 1),
(22, 18, 13, 1),
(23, 18, 30, 1),
(24, 19, 38, 1),
(25, 19, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(50) DEFAULT NULL,
  `price` int(8) DEFAULT NULL,
  `stock` int(8) DEFAULT NULL,
  `unit` varchar(10) DEFAULT NULL,
  `weight` int(11) NOT NULL,
  `animalType` varchar(15) DEFAULT NULL,
  `prodType` varchar(20) DEFAULT NULL,
  `image` longblob DEFAULT NULL,
  `description` text DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `review` text DEFAULT NULL,
  `favorite` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `price`, `stock`, `unit`, `weight`, `animalType`, `prodType`, `image`, `description`, `rating`, `review`, `favorite`) VALUES
(1, 'Extra Small Size Cat Protective Collar', 33000, 10, '1 item', 1, 'Cat', 'Accessories', NULL, 'A secure extra small size protective collar for your cat.', 4.9, 'you can bring rhis everywhere', 'Y'),
(2, 'Small Size Cat Protective Collar', 55000, 10, '1 item', 1, 'Cat', 'Accessories', NULL, 'A secure small size protective collar for your cat.', 4.8, 'good for health', 'Y'),
(3, 'Toki Dry Food Adult Mackerel', 30000, 100, '1kg', 1, 'Cat', 'Foods', NULL, 'Delicious and nutritious dry food for adult cat with mackerel flavor.', 4.75, 'hygienic and clean', 'N'),
(4, 'Toki Dry Food Adult Ocean Fish', 30000, 100, '1kg', 1, 'Cat', 'Foods', NULL, 'Delicious and nutritious dry food for adult cat with ocean fish flavor.', 4.95, 'good for your cat', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `typeID` int(11) NOT NULL,
  `typeName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`typeID`, `typeName`) VALUES
(1, 'Accessories'),
(2, 'Foods'),
(3, 'Medicine'),
(4, 'Shampoo');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `foto_produk`) VALUES
(10, 'Cat Collar', 22500, 'cat collar.jpg'),
(11, 'Cat Protective Collar', 115000, 'cat protective collar.jpg'),
(13, 'Dog Collar', 75000, 'dog collar.jpg'),
(14, 'Dog Protective Collar', 39000, 'dog protective collar.jpg'),
(15, 'Aquarium', 420000, 'aquarium.jpg'),
(16, 'Pet Cage', 150000, 'pet cage.jpg'),
(17, 'Cat Milk Replacer', 36000, 'cat milk replacer.jpeg'),
(18, 'Creamy Treats', 2300, 'creamy treats.png'),
(19, 'Dry Food', 36000, 'dry food (cat dog rabbit).png'),
(21, 'Fish Pellet', 1500, 'fish pellet.jpg'),
(22, 'Wet Food Cat', 29000, 'wet food can cat.png'),
(23, 'Wet Food Dog', 11000, 'wet food can dog.png'),
(24, 'Food Pouch Cat', 10000, 'wet food pouch cat.png'),
(25, 'Food Pouch Dog', 15000, 'wet food pouch dog.png'),
(26, 'Allium Drops', 22000, 'allium drops.jpg'),
(27, 'Cat Care Vitamin', 100000, 'cat care vitamin.jpg'),
(28, 'Scabies Cream', 15000, 'scabies cream.jpeg'),
(29, 'Terramycim Cream', 18000, 'terramycin cream.jpeg'),
(30, 'Tung Hai', 5000, 'tung hai.jpg'),
(31, 'Plastic Food Bowl', 25000, 'cat plastic food bowl.jpg'),
(32, 'Stainless Food Bowl', 50000, 'cat stainless steel food bowl.jpg'),
(33, 'Double Bowl', 32000, 'dog cat double bowl plastic.jpg'),
(34, 'Dog Bowl Plastic', 20000, 'dog food bowl plastic.jpg'),
(35, 'Dog Bowl Plastic 2', 20000, 'dog food bowl stainless steel2.jpg'),
(36, 'Litter Box', 28000, 'litter box.jpeg'),
(37, 'Scoop', 8000, 'scoop.jpg'),
(38, 'Shampoo', 60000, 'shampoo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `level` enum('admin','pelanggan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `email`, `password`, `nama`, `telepon`, `level`) VALUES
(1, 'andiraka@gmail.com', 'pelanggan', 'Andi Raka', '085278786565', 'pelanggan'),
(6, 'julius@gmail.com', 'julius', 'Julius Caesar', '086575432341', 'pelanggan'),
(7, 'test@mail.com', 'test', 'test', '08978979797979', 'pelanggan'),
(8, 'admin@gmail.com', 'admin', 'admin', '08999999999999', 'admin'),
(9, 'coba@gmail.com', 'coba', 'coba', '08978979797979', 'pelanggan'),
(10, 'samplebaru@mail.com', 'samplebaru', 'sample', '098766688', 'pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `visit_history`
--

CREATE TABLE `visit_history` (
  `id_visit` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visit_history`
--

INSERT INTO `visit_history` (`id_visit`, `id_users`, `date`) VALUES
(1, 7, '2022-04-15 08:04:44'),
(2, 8, '2022-04-16 11:04:17'),
(3, 8, '2022-04-16 12:04:40'),
(4, 7, '2022-04-16 12:04:32'),
(5, 8, '2022-04-16 12:04:12'),
(6, 7, '2022-04-16 12:04:22'),
(7, 8, '2022-04-17 07:04:15'),
(8, 7, '2022-04-17 07:04:13'),
(9, 8, '2022-04-17 07:04:59'),
(10, 10, '2022-04-17 01:04:51'),
(11, 8, '2022-04-17 04:04:05'),
(12, 8, '2022-04-17 04:04:21'),
(13, 10, '2022-04-17 04:04:17'),
(14, 10, '2022-04-17 04:04:50'),
(15, 10, '2022-04-17 04:04:03'),
(16, 10, '2022-04-18 02:04:40'),
(17, 8, '2022-04-18 02:04:24'),
(18, 7, '2022-04-22 18:41:00'),
(19, 8, '2022-04-22 18:48:45'),
(20, 7, '2022-04-22 19:38:03'),
(21, 7, '2022-04-22 19:53:20'),
(22, 7, '2022-04-22 20:36:19'),
(23, 7, '2022-04-22 20:41:19'),
(24, 7, '2022-04-22 22:15:48'),
(25, 7, '2022-04-22 22:44:30'),
(26, 7, '2022-04-22 23:03:36'),
(27, 7, '2022-04-23 10:32:31'),
(28, 7, '2022-04-23 10:36:23'),
(29, 7, '2022-04-23 11:35:10'),
(30, 7, '2022-04-23 12:18:25'),
(31, 7, '2022-04-23 12:23:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  ADD PRIMARY KEY (`id_ekspedisi`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `test` (`id_pelanggan`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `visit_history`
--
ALTER TABLE `visit_history`
  ADD PRIMARY KEY (`id_visit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  MODIFY `id_ekspedisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `visit_history`
--
ALTER TABLE `visit_history`
  MODIFY `id_visit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `test` FOREIGN KEY (`id_pelanggan`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
