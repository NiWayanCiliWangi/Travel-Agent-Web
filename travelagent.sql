SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
--
-- Table structure for table `jasa_wisata`

CREATE TABLE `jasa_wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama_wisata` char(20) NOT NULL,
  `lokasi_wisata` varchar(50) NOT NULL,
  `gambar` varchar(30) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jasa_wisata`
--

INSERT INTO `jasa_wisata` (`id_wisata`, `nama_wisata`, `lokasi_wisata`, `gambar`, `harga`, `deskripsi`) VALUES
(12, 'GWK', 'Jimbaran', '65a482fcb7332.jpg', 80000, ' Ini adalah Garuda Wisnu Kencana'),
(14, 'Pura Batur', 'Bangli', '65a4836bca845.jpg', 200000, ' Ini adalah Pura'),
(16, 'Kelingking Beach', 'Nusa Penida', '65a48407178c2.jpg', 75000, ' ini adalah nusa penida'),
(17, 'Diamond Beach', 'Nusa Lembongan', '65a4843b81f7d.jpg', 150000, ' Ini adalah nusa lembongan'),
(18, 'Sekumpul Waterfall', 'Bangli', '65a4846f77654.jpg', 77000, ' ini adlaah waterfall');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `alamat_pembeli` varchar(50) NOT NULL,
  `no_telp_pembeli` varchar(100) NOT NULL,
  `email_pembeli` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `alamat_pembeli`, `no_telp_pembeli`, `email_pembeli`, `password`) VALUES
(1, 'putra ', 'Sukawati', '0895623318043', 'putrawibawa7@gmail.com', '234'),
(2, 'cili', 'Bangli', '088998777287', 'ciliwangi7@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `id_penjual` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`id_penjual`, `username`, `password`) VALUES
(1, 'cili', '123');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `tgl_pesanan` date NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `harga` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `tgl_pesanan`, `id_pembeli`, `id_wisata`, `harga`) VALUES
(2, '2024-01-14', 1, 2, ''),
(8, '2024-01-14', 1, 2, '0'),
(9, '2024-01-14', 1, 2, ' 0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jasa_wisata`
--
ALTER TABLE `jasa_wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`id_penjual`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jasa_wisata`
--
ALTER TABLE `jasa_wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penjual`
--
ALTER TABLE `penjual`
  MODIFY `id_penjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;