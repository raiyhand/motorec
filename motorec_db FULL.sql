-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2026 at 04:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motorec_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id_admin`, `nama_lengkap`, `username`, `password`, `created_at`) VALUES
(3, 'Raihan Khairi Adha', 'raiy11', '$2y$10$A275RFOZyha2QH22e52Nee.pILtMHGHg8ZN6nhDYjWmhXKudpVkGu', '2026-06-24 00:44:49');

-- --------------------------------------------------------

--
-- Table structure for table `motor`
--

CREATE TABLE `motor` (
  `id_motor` int(11) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `model` varchar(100) NOT NULL,
  `tahun` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `cc` int(11) NOT NULL,
  `tenaga_kuda` varchar(50) DEFAULT NULL,
  `torsi` varchar(50) DEFAULT NULL,
  `transmisi` varchar(50) DEFAULT NULL,
  `penggerak` varchar(50) DEFAULT NULL,
  `jumlah_tempat_duduk` int(11) DEFAULT 2,
  `jumlah_silinder` int(11) DEFAULT 1,
  `negara_asal` varchar(50) DEFAULT NULL,
  `tampilan` varchar(50) DEFAULT NULL,
  `jenis_mesin` varchar(100) DEFAULT NULL,
  `is_harian` tinyint(1) DEFAULT 0,
  `is_touring` tinyint(1) DEFAULT 0,
  `is_offroad` tinyint(1) DEFAULT 0,
  `jenis_bodi` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `motor`
--

INSERT INTO `motor` (`id_motor`, `merk`, `model`, `tahun`, `harga`, `cc`, `tenaga_kuda`, `torsi`, `transmisi`, `penggerak`, `jumlah_tempat_duduk`, `jumlah_silinder`, `negara_asal`, `tampilan`, `jenis_mesin`, `is_harian`, `is_touring`, `is_offroad`, `jenis_bodi`, `deskripsi`, `created_at`) VALUES
(1, 'Honda', 'BeAT', 2024, 18530000, 110, '8.9 HP @ 7500 rpm', '9.3 Nm @ 5500 rpm', 'Otomatis (V-Matic)', 'Belt Drive', 2, 1, 'Jepang', 'Ramping', 'Air-cooled, single cylinder', 1, 0, 0, 'Skuter', 'Motor Honda BeAT tahun 2024 dengan kapasitas mesin 110cc, menghasilkan tenaga 8.9 HP @ 7500 rpm dan torsi 9.3 Nm @ 5500 rpm. Menggunakan transmisi Otomatis (V-Matic) dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(2, 'Yamaha', 'Mio M3 125', 2024, 17405000, 125, '9.3 HP @ 8000 rpm', '9.6 Nm @ 5500 rpm', 'Otomatis (V-Belt)', 'Belt Drive', 2, 1, 'Jepang', 'Sporty', 'Air-cooled, single cylinder', 1, 0, 0, 'Skuter', 'Motor Yamaha Mio M3 125 tahun 2024 dengan kapasitas mesin 125cc, menghasilkan tenaga 9.3 HP @ 8000 rpm dan torsi 9.6 Nm @ 5500 rpm. Menggunakan transmisi Otomatis (V-Belt) dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(3, 'Honda', 'Revo Fit', 2024, 16020000, 110, '8.8 HP @ 7500 rpm', '8.76 Nm @ 6000 rpm', 'Manual, 4-percepatan', 'Chain Drive', 2, 1, 'Jepang', 'Fungsional', 'Air-cooled, single cylinder', 1, 0, 0, 'Moped', 'Motor Honda Revo Fit tahun 2024 dengan kapasitas mesin 110cc, menghasilkan tenaga 8.8 HP @ 7500 rpm dan torsi 8.76 Nm @ 6000 rpm. Menggunakan transmisi Manual, 4-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(4, 'Suzuki', 'NEX II', 2024, 19355000, 113, '9.0 HP @ 8000 rpm', '8.7 Nm @ 6000 rpm', 'Otomatis (CVT)', 'Belt Drive', 2, 1, 'Jepang', 'Kompak', 'Air-cooled, single cylinder', 1, 0, 0, 'Skuter', 'Motor Suzuki NEX II tahun 2024 dengan kapasitas mesin 113cc, menghasilkan tenaga 9.0 HP @ 8000 rpm dan torsi 8.7 Nm @ 6000 rpm. Menggunakan transmisi Otomatis (CVT) dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(5, 'Honda', 'Genio', 2024, 19730000, 110, '8.9 HP @ 7500 rpm', '9.3 Nm @ 5500 rpm', 'Otomatis (V-Matic)', 'Belt Drive', 2, 1, 'Jepang', 'Stylish', 'Air-cooled, single cylinder', 1, 0, 0, 'Skuter', 'Motor Honda Genio tahun 2024 dengan kapasitas mesin 110cc, menghasilkan tenaga 8.9 HP @ 7500 rpm dan torsi 9.3 Nm @ 5500 rpm. Menggunakan transmisi Otomatis (V-Matic) dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(6, 'Yamaha', 'Gear 125', 2024, 18035000, 125, '9.3 HP @ 8000 rpm', '9.5 Nm @ 5500 rpm', 'Otomatis (V-Belt)', 'Belt Drive', 2, 1, 'Jepang', 'Multifungsi', 'Air-cooled, single cylinder', 1, 0, 0, 'Skuter', 'Motor Yamaha Gear 125 tahun 2024 dengan kapasitas mesin 125cc, menghasilkan tenaga 9.3 HP @ 8000 rpm dan torsi 9.5 Nm @ 5500 rpm. Menggunakan transmisi Otomatis (V-Belt) dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(7, 'Honda', 'Scoopy', 2024, 22520000, 110, '8.9 HP @ 7500 rpm', '9.3 Nm @ 5500 rpm', 'Otomatis (V-Matic)', 'Belt Drive', 2, 1, 'Jepang', 'Retro', 'Air-cooled, single cylinder', 1, 0, 0, 'Skuter', 'Motor Honda Scoopy tahun 2024 dengan kapasitas mesin 110cc, menghasilkan tenaga 8.9 HP @ 7500 rpm dan torsi 9.3 Nm @ 5500 rpm. Menggunakan transmisi Otomatis (V-Matic) dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(8, 'Yamaha', 'Fazzio Hybrid', 2024, 22650000, 125, '8.2 HP @ 6500 rpm', '10.6 Nm @ 4500 rpm', 'Otomatis (V-Belt)', 'Belt Drive', 2, 1, 'Jepang', 'Klasik', 'Air-cooled, single cylinder', 1, 0, 0, 'Skuter', 'Motor Yamaha Fazzio Hybrid tahun 2024 dengan kapasitas mesin 125cc, menghasilkan tenaga 8.2 HP @ 6500 rpm dan torsi 10.6 Nm @ 4500 rpm. Menggunakan transmisi Otomatis (V-Belt) dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(9, 'Honda', 'Vario 125', 2024, 22550000, 125, '10.9 HP @ 8500 rpm', '10.8 Nm @ 5000 rpm', 'Otomatis (V-Matic)', 'Belt Drive', 2, 1, 'Jepang', 'Agresif', 'Liquid-cooled, single cylinder', 1, 0, 0, 'Skuter', 'Motor Honda Vario 125 tahun 2024 dengan kapasitas mesin 125cc, menghasilkan tenaga 10.9 HP @ 8500 rpm dan torsi 10.8 Nm @ 5000 rpm. Menggunakan transmisi Otomatis (V-Matic) dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(10, 'Yamaha', 'Grand Filano Hybrid', 2024, 27000000, 125, '8.0 HP @ 6500 rpm', '10.4 Nm @ 5000 rpm', 'Otomatis (V-Belt)', 'Belt Drive', 2, 1, 'Jepang', 'Elegan', 'Air-cooled, single cylinder', 1, 0, 0, 'Skuter', 'Motor Yamaha Grand Filano Hybrid tahun 2024 dengan kapasitas mesin 125cc, menghasilkan tenaga 8.0 HP @ 6500 rpm dan torsi 10.4 Nm @ 5000 rpm. Menggunakan transmisi Otomatis (V-Belt) dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(11, 'Honda', 'Supra X 125 FI', 2024, 19100000, 125, '10.0 HP @ 8000 rpm', '9.3 Nm @ 4000 rpm', 'Manual, 4-percepatan', 'Chain Drive', 2, 1, 'Jepang', 'Legendaris', 'Air-cooled, single cylinder', 1, 0, 0, 'Moped', 'Motor Honda Supra X 125 FI tahun 2024 dengan kapasitas mesin 125cc, menghasilkan tenaga 10.0 HP @ 8000 rpm dan torsi 9.3 Nm @ 4000 rpm. Menggunakan transmisi Manual, 4-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(12, 'Suzuki', 'Satria F150', 2024, 28600000, 150, '18.2 HP @ 10000 rpm', '13.8 Nm @ 8500 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 1, 'Jepang', 'Hyper', 'Liquid-cooled, single cylinder', 1, 0, 0, 'Moped', 'Motor Suzuki Satria F150 tahun 2024 dengan kapasitas mesin 150cc, menghasilkan tenaga 18.2 HP @ 10000 rpm dan torsi 13.8 Nm @ 8500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(13, 'Honda', 'Vario 160', 2024, 26639000, 160, '15.2 HP @ 8500 rpm', '13.8 Nm @ 7000 rpm', 'Otomatis (V-Matic)', 'Belt Drive', 2, 1, 'Jepang', 'Gambot', 'Liquid-cooled, single cylinder', 1, 0, 0, 'Skuter', 'Motor Honda Vario 160 tahun 2024 dengan kapasitas mesin 160cc, menghasilkan tenaga 15.2 HP @ 8500 rpm dan torsi 13.8 Nm @ 7000 rpm. Menggunakan transmisi Otomatis (V-Matic) dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(14, 'Yamaha', 'Aerox 155', 2024, 27425000, 155, '15.1 HP @ 8000 rpm', '13.9 Nm @ 6500 rpm', 'Otomatis (V-Belt)', 'Belt Drive', 2, 1, 'Jepang', 'Sporty', 'Liquid-cooled, single cylinder', 1, 0, 0, 'Skuter', 'Motor Yamaha Aerox 155 tahun 2024 dengan kapasitas mesin 155cc, menghasilkan tenaga 15.1 HP @ 8000 rpm dan torsi 13.9 Nm @ 6500 rpm. Menggunakan transmisi Otomatis (V-Belt) dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(15, 'Honda', 'PCX 160', 2024, 32670000, 160, '15.8 HP @ 8500 rpm', '14.7 Nm @ 6500 rpm', 'Otomatis (V-Matic)', 'Belt Drive', 2, 1, 'Jepang', 'Elegan', 'Liquid-cooled, single cylinder', 1, 0, 0, 'Skuter', 'Motor Honda PCX 160 tahun 2024 dengan kapasitas mesin 160cc, menghasilkan tenaga 15.8 HP @ 8500 rpm dan torsi 14.7 Nm @ 6500 rpm. Menggunakan transmisi Otomatis (V-Matic) dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(16, 'Yamaha', 'NMAX', 2024, 35750000, 155, '15.1 HP @ 8000 rpm', '13.9 Nm @ 6500 rpm', 'Otomatis (V-Belt)', 'Belt Drive', 2, 1, 'Jepang', 'Premium', 'Liquid-cooled, single cylinder', 1, 0, 0, 'Skuter', 'Motor Yamaha NMAX tahun 2024 dengan kapasitas mesin 155cc, menghasilkan tenaga 15.1 HP @ 8000 rpm dan torsi 13.9 Nm @ 6500 rpm. Menggunakan transmisi Otomatis (V-Belt) dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(17, 'Honda', 'ADV 160', 2024, 36200000, 160, '15.8 HP @ 8500 rpm', '14.7 Nm @ 6500 rpm', 'Otomatis (V-Matic)', 'Belt Drive', 2, 1, 'Jepang', 'Adventure', 'Liquid-cooled, single cylinder', 1, 0, 0, 'Skuter', 'Motor Honda ADV 160 tahun 2024 dengan kapasitas mesin 160cc, menghasilkan tenaga 15.8 HP @ 8500 rpm dan torsi 14.7 Nm @ 6500 rpm. Menggunakan transmisi Otomatis (V-Matic) dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(18, 'Vespa', 'LX 125 i-Get', 2024, 45350000, 125, '10.0 HP @ 7600 rpm', '10.2 Nm @ 6000 rpm', 'Otomatis (CVT)', 'Belt Drive', 2, 1, 'Italia', 'Ikonik', 'Air-cooled, single cylinder', 1, 0, 0, 'Skuter', 'Motor Vespa LX 125 i-Get tahun 2024 dengan kapasitas mesin 125cc, menghasilkan tenaga 10.0 HP @ 7600 rpm dan torsi 10.2 Nm @ 6000 rpm. Menggunakan transmisi Otomatis (CVT) dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(19, 'Kawasaki', 'W175', 2024, 34300000, 177, '12.8 HP @ 7500 rpm', '13.2 Nm @ 6000 rpm', 'Manual, 5-percepatan', 'Chain Drive', 2, 1, 'Jepang', 'Klasik', 'Air-cooled, single cylinder', 1, 0, 0, 'Naked Bike/Streetfighter', 'Motor Kawasaki W175 tahun 2024 dengan kapasitas mesin 177cc, menghasilkan tenaga 12.8 HP @ 7500 rpm dan torsi 13.2 Nm @ 6000 rpm. Menggunakan transmisi Manual, 5-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(20, 'Yamaha', 'XSR 155', 2024, 37775000, 155, '19.0 HP @ 10000 rpm', '14.7 Nm @ 8500 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 1, 'Jepang', 'Heritage', 'Liquid-cooled, single cylinder', 1, 0, 0, 'Naked Bike/Streetfighter', 'Motor Yamaha XSR 155 tahun 2024 dengan kapasitas mesin 155cc, menghasilkan tenaga 19.0 HP @ 10000 rpm dan torsi 14.7 Nm @ 8500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(21, 'Honda', 'CB150R Streetfire', 2024, 30661000, 150, '16.7 HP @ 9000 rpm', '13.8 Nm @ 7000 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 1, 'Jepang', 'Agresif', 'Liquid-cooled, single cylinder', 1, 0, 0, 'Naked Bike/Streetfighter', 'Motor Honda CB150R Streetfire tahun 2024 dengan kapasitas mesin 150cc, menghasilkan tenaga 16.7 HP @ 9000 rpm dan torsi 13.8 Nm @ 7000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(22, 'Yamaha', 'Vixion 155', 2024, 29275000, 155, '19.0 HP @ 10000 rpm', '14.7 Nm @ 8500 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 1, 'Jepang', 'Legendaris', 'Liquid-cooled, single cylinder', 1, 0, 0, 'Naked Bike/Streetfighter', 'Motor Yamaha Vixion 155 tahun 2024 dengan kapasitas mesin 155cc, menghasilkan tenaga 19.0 HP @ 10000 rpm dan torsi 14.7 Nm @ 8500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(23, 'Suzuki', 'GSX-S150', 2024, 31122000, 150, '18.8 HP @ 10500 rpm', '14.0 Nm @ 9000 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 1, 'Jepang', 'Ringan', 'Liquid-cooled, single cylinder', 1, 0, 0, 'Naked Bike/Streetfighter', 'Motor Suzuki GSX-S150 tahun 2024 dengan kapasitas mesin 150cc, menghasilkan tenaga 18.8 HP @ 10500 rpm dan torsi 14.0 Nm @ 9000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(24, 'Honda', 'CBR150R', 2024, 37283000, 150, '16.9 HP @ 9000 rpm', '14.4 Nm @ 7000 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 1, 'Jepang', 'Balap', 'Liquid-cooled, single cylinder', 0, 0, 0, 'Sport', 'Motor Honda CBR150R tahun 2024 dengan kapasitas mesin 150cc, menghasilkan tenaga 16.9 HP @ 9000 rpm dan torsi 14.4 Nm @ 7000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(25, 'Yamaha', 'R15', 2024, 39875000, 155, '19.0 HP @ 10000 rpm', '14.7 Nm @ 8500 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 1, 'Jepang', 'Aerodinamis', 'Liquid-cooled, single cylinder', 0, 0, 0, 'Sport', 'Motor Yamaha R15 tahun 2024 dengan kapasitas mesin 155cc, menghasilkan tenaga 19.0 HP @ 10000 rpm dan torsi 14.7 Nm @ 8500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(26, 'Suzuki', 'GSX-R150', 2024, 35000000, 150, '18.8 HP @ 10500 rpm', '14.0 Nm @ 9000 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 1, 'Jepang', 'Bertenaga', 'Liquid-cooled, single cylinder', 0, 0, 0, 'Sport', 'Motor Suzuki GSX-R150 tahun 2024 dengan kapasitas mesin 150cc, menghasilkan tenaga 18.8 HP @ 10500 rpm dan torsi 14.0 Nm @ 9000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(27, 'Kawasaki', 'KLX150', 2024, 37300000, 144, '11.8 HP @ 8000 rpm', '11.3 Nm @ 6500 rpm', 'Manual, 5-percepatan', 'Chain Drive', 2, 1, 'Jepang', 'Off-road', 'Air-cooled, single cylinder', 0, 0, 1, 'Trail/Off-Road', 'Motor Kawasaki KLX150 tahun 2024 dengan kapasitas mesin 144cc, menghasilkan tenaga 11.8 HP @ 8000 rpm dan torsi 11.3 Nm @ 6500 rpm. Menggunakan transmisi Manual, 5-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(28, 'Honda', 'CRF150L', 2024, 35930000, 150, '12.7 HP @ 8000 rpm', '12.43 Nm @ 6500 rpm', 'Manual, 5-percepatan', 'Chain Drive', 2, 1, 'Jepang', 'Tangguh', 'Air-cooled, single cylinder', 0, 0, 1, 'Trail/Off-Road', 'Motor Honda CRF150L tahun 2024 dengan kapasitas mesin 150cc, menghasilkan tenaga 12.7 HP @ 8000 rpm dan torsi 12.43 Nm @ 6500 rpm. Menggunakan transmisi Manual, 5-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(29, 'Benelli', 'Patagonian Eagle 250', 2024, 38900000, 250, '17.4 HP @ 8000 rpm', '16.5 Nm @ 6000 rpm', 'Manual, 5-percepatan', 'Chain Drive', 2, 2, 'Italia', 'Klasik', 'Air-cooled, parallel-twin', 0, 0, 0, 'Cruiser', 'Motor Benelli Patagonian Eagle 250 tahun 2024 dengan kapasitas mesin 250cc, menghasilkan tenaga 17.4 HP @ 8000 rpm dan torsi 16.5 Nm @ 6000 rpm. Menggunakan transmisi Manual, 5-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(30, 'Kawasaki', 'Ninja 250SL', 2024, 41900000, 249, '27.6 HP @ 9700 rpm', '22.6 Nm @ 8200 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 1, 'Jepang', 'Ramping', 'Liquid-cooled, single cylinder', 0, 0, 0, 'Sport', 'Motor Kawasaki Ninja 250SL tahun 2024 dengan kapasitas mesin 249cc, menghasilkan tenaga 27.6 HP @ 9700 rpm dan torsi 22.6 Nm @ 8200 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(31, 'CFMoto', '250 SR', 2024, 63500000, 249, '27.4 HP @ 9750 rpm', '22 Nm @ 7500 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 1, 'Tiongkok', 'Futuristik', 'Liquid-cooled, single cylinder', 0, 0, 0, 'Sport', 'Motor CFMoto 250 SR tahun 2024 dengan kapasitas mesin 249cc, menghasilkan tenaga 27.4 HP @ 9750 rpm dan torsi 22 Nm @ 7500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(32, 'Kawasaki', 'Ninja 250', 2024, 66900000, 249, '38.5 HP @ 12500 rpm', '23.5 Nm @ 10000 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'Jepang', 'Ikonik', 'Liquid-cooled, parallel-twin', 0, 0, 0, 'Sport', 'Motor Kawasaki Ninja 250 tahun 2024 dengan kapasitas mesin 249cc, menghasilkan tenaga 38.5 HP @ 12500 rpm dan torsi 23.5 Nm @ 10000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(33, 'Yamaha', 'R25', 2024, 63450000, 250, '35.5 HP @ 12000 rpm', '23.6 Nm @ 10000 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'Jepang', 'Super', 'Liquid-cooled, parallel-twin', 0, 0, 0, 'Sport', 'Motor Yamaha R25 tahun 2024 dengan kapasitas mesin 250cc, menghasilkan tenaga 35.5 HP @ 12000 rpm dan torsi 23.6 Nm @ 10000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(34, 'Honda', 'CBR250RR', 2024, 63456000, 249, '41.4 HP @ 13000 rpm', '25 Nm @ 11000 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'Jepang', 'Canggih', 'Liquid-cooled, parallel-twin', 0, 0, 0, 'Sport', 'Motor Honda CBR250RR tahun 2024 dengan kapasitas mesin 249.7cc, menghasilkan tenaga 41.4 HP @ 13000 rpm dan torsi 25 Nm @ 11000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(35, 'Yamaha', 'MT-25', 2024, 57225000, 250, '35.5 HP @ 12000 rpm', '23.6 Nm @ 10000 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'Jepang', 'Gahar', 'Liquid-cooled, parallel-twin', 1, 0, 0, 'Naked Bike/Streetfighter', 'Motor Yamaha MT-25 tahun 2024 dengan kapasitas mesin 250cc, menghasilkan tenaga 35.5 HP @ 12000 rpm dan torsi 23.6 Nm @ 10000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(36, 'KTM', 'Duke 250', 2024, 65000000, 249, '29.6 HP @ 9000 rpm', '24 Nm @ 7500 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 1, 'Austria', 'Tajam', 'Liquid-cooled, single cylinder', 1, 0, 0, 'Naked Bike/Streetfighter', 'Motor KTM Duke 250 tahun 2024 dengan kapasitas mesin 249cc, menghasilkan tenaga 29.6 HP @ 9000 rpm dan torsi 24 Nm @ 7500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(37, 'Yamaha', 'XMAX 250', 2024, 66450000, 250, '22.5 HP @ 7000 rpm', '24.3 Nm @ 5500 rpm', 'Otomatis (V-Belt)', 'Belt Drive', 2, 1, 'Jepang', 'Mewah', 'Liquid-cooled, single cylinder', 1, 0, 0, 'Skuter', 'Motor Yamaha XMAX 250 tahun 2024 dengan kapasitas mesin 250cc, menghasilkan tenaga 22.5 HP @ 7000 rpm dan torsi 24.3 Nm @ 5500 rpm. Menggunakan transmisi Otomatis (V-Belt) dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(38, 'Honda', 'Forza 250', 2024, 90330000, 249, '23.2 HP @ 7750 rpm', '24 Nm @ 6250 rpm', 'Otomatis (CVT)', 'Belt Drive', 2, 1, 'Jepang', 'Touring', 'Liquid-cooled, single cylinder', 1, 0, 0, 'Skuter', 'Motor Honda Forza 250 tahun 2024 dengan kapasitas mesin 249cc, menghasilkan tenaga 23.2 HP @ 7750 rpm dan torsi 24 Nm @ 6250 rpm. Menggunakan transmisi Otomatis (CVT) dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(39, 'Kawasaki', 'Versys-X 250 Tourer', 2024, 71200000, 249, '33.5 HP @ 11500 rpm', '21.7 Nm @ 10000 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'Jepang', 'Serbaguna', 'Liquid-cooled, parallel-twin', 0, 1, 0, 'Adventure Touring', 'Motor Kawasaki Versys-X 250 Tourer tahun 2024 dengan kapasitas mesin 249cc, menghasilkan tenaga 33.5 HP @ 11500 rpm dan torsi 21.7 Nm @ 10000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(40, 'Royal Enfield', 'Classic 350', 2024, 105300000, 349, '19.9 HP @ 6100 rpm', '27 Nm @ 4000 rpm', 'Manual, 5-percepatan', 'Chain Drive', 2, 1, 'India', 'Vintage', 'Air-oil-cooled, single cylinder', 1, 0, 0, 'Naked Bike/Streetfighter', 'Motor Royal Enfield Classic 350 tahun 2024 dengan kapasitas mesin 349cc, menghasilkan tenaga 19.9 HP @ 6100 rpm dan torsi 27 Nm @ 4000 rpm. Menggunakan transmisi Manual, 5-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(41, 'Kawasaki', 'Ninja ZX-25R', 2024, 107540000, 249, '50.3 HP @ 15500 rpm', '22.9 Nm @ 14500 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 4, 'Jepang', 'Multi-silinder', 'Liquid-cooled, inline-4', 0, 0, 0, 'Sport', 'Motor Kawasaki Ninja ZX-25R tahun 2024 dengan kapasitas mesin 249.8cc, menghasilkan tenaga 50.3 HP @ 15500 rpm dan torsi 22.9 Nm @ 14500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(42, 'Royal Enfield', 'Himalayan', 2024, 133500000, 411, '24.0 HP @ 6500 rpm', '32 Nm @ 4000-4500 rpm', 'Manual, 5-percepatan', 'Chain Drive', 2, 1, 'India', 'Petualang', 'Air-cooled, single cylinder', 0, 1, 0, 'Adventure Touring', 'Motor Royal Enfield Himalayan tahun 2024 dengan kapasitas mesin 411cc, menghasilkan tenaga 24.0 HP @ 6500 rpm dan torsi 32 Nm @ 4000-4500 rpm. Menggunakan transmisi Manual, 5-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(43, 'Benelli', 'TRK 502', 2024, 166000000, 500, '46.8 HP @ 8500 rpm', '46 Nm @ 6000 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'Italia', 'Gagah', 'Liquid-cooled, parallel-twin', 0, 1, 0, 'Adventure Touring', 'Motor Benelli TRK 502 tahun 2024 dengan kapasitas mesin 500cc, menghasilkan tenaga 46.8 HP @ 8500 rpm dan torsi 46 Nm @ 6000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(44, 'Kawasaki', 'Z650', 2024, 198000000, 649, '67.1 HP @ 8000 rpm', '64 Nm @ 6700 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'Jepang', 'Sugomi', 'Liquid-cooled, parallel-twin', 1, 0, 0, 'Naked Bike/Streetfighter', 'Motor Kawasaki Z650 tahun 2024 dengan kapasitas mesin 649cc, menghasilkan tenaga 67.1 HP @ 8000 rpm dan torsi 64 Nm @ 6700 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(45, 'Honda', 'CB500X', 2024, 204519000, 471, '50.0 HP @ 8500 rpm', '45 Nm @ 6500 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'Jepang', 'Ramah', 'Liquid-cooled, parallel-twin', 0, 1, 0, 'Adventure Touring', 'Motor Honda CB500X tahun 2024 dengan kapasitas mesin 471cc, menghasilkan tenaga 50.0 HP @ 8500 rpm dan torsi 45 Nm @ 6500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(46, 'Kawasaki', 'Versys 650', 2024, 226300000, 649, '65.1 HP @ 8500 rpm', '61 Nm @ 7000 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'Jepang', 'Nyaman', 'Liquid-cooled, parallel-twin', 0, 1, 0, 'Adventure Touring', 'Motor Kawasaki Versys 650 tahun 2024 dengan kapasitas mesin 649cc, menghasilkan tenaga 65.1 HP @ 8500 rpm dan torsi 61 Nm @ 7000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(47, 'Honda', 'CBR600RR', 2024, 550000000, 599, '119.3 HP @ 14000 rpm', '64 Nm @ 11500 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 4, 'Jepang', 'Supersport', 'Liquid-cooled, inline-4', 0, 0, 0, 'Sport', 'Motor Honda CBR600RR tahun 2024 dengan kapasitas mesin 599cc, menghasilkan tenaga 119.3 HP @ 14000 rpm dan torsi 64 Nm @ 11500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(48, 'Kawasaki', 'Ninja ZX-6R', 2024, 359900000, 636, '128.2 HP @ 13500 rpm', '70.8 Nm @ 11000 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 4, 'Jepang', 'Performa', 'Liquid-cooled, inline-4', 0, 0, 0, 'Sport', 'Motor Kawasaki Ninja ZX-6R tahun 2024 dengan kapasitas mesin 636cc, menghasilkan tenaga 128.2 HP @ 13500 rpm dan torsi 70.8 Nm @ 11000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(49, 'Yamaha', 'R6', 2020, 270000000, 599, '116.8 HP @ 14500 rpm', '61.7 Nm @ 10500 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 4, 'Jepang', 'Track-only', 'Liquid-cooled, inline-4', 0, 0, 0, 'Sport', 'Motor Yamaha R6 tahun 2020 dengan kapasitas mesin 599cc, menghasilkan tenaga 116.8 HP @ 14500 rpm dan torsi 61.7 Nm @ 10500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(50, 'Honda', 'CB650R', 2024, 291017000, 649, '93.7 HP @ 12000 rpm', '63 Nm @ 8500 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 4, 'Jepang', 'Neo-Retro', 'Liquid-cooled, inline-4', 1, 0, 0, 'Naked Bike/Streetfighter', 'Motor Honda CB650R tahun 2024 dengan kapasitas mesin 649cc, menghasilkan tenaga 93.7 HP @ 12000 rpm dan torsi 63 Nm @ 8500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(51, 'Yamaha', 'MT-07', 2024, 243000000, 689, '72.4 HP @ 8750 rpm', '67 Nm @ 6500 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'Jepang', 'Torsi', 'Liquid-cooled, parallel-twin', 1, 0, 0, 'Naked Bike/Streetfighter', 'Motor Yamaha MT-07 tahun 2024 dengan kapasitas mesin 689cc, menghasilkan tenaga 72.4 HP @ 8750 rpm dan torsi 67 Nm @ 6500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(52, 'Kawasaki', 'Z900', 2024, 268300000, 948, '123.3 HP @ 9500 rpm', '98.6 Nm @ 7700 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 4, 'Jepang', 'Supernaked', 'Liquid-cooled, inline-4', 1, 0, 0, 'Naked Bike/Streetfighter', 'Motor Kawasaki Z900 tahun 2024 dengan kapasitas mesin 948cc, menghasilkan tenaga 123.3 HP @ 9500 rpm dan torsi 98.6 Nm @ 7700 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(53, 'Yamaha', 'MT-09', 2024, 325000000, 890, '117.4 HP @ 10000 rpm', '93 Nm @ 7000 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 3, 'Jepang', 'Master', 'Liquid-cooled, inline-3', 1, 0, 0, 'Naked Bike/Streetfighter', 'Motor Yamaha MT-09 tahun 2024 dengan kapasitas mesin 890cc, menghasilkan tenaga 117.4 HP @ 10000 rpm dan torsi 93 Nm @ 7000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(54, 'Triumph', 'Trident 660', 2024, 295000000, 660, '80.0 HP @ 10250 rpm', '64 Nm @ 6250 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 3, 'Inggris', 'Roadster', 'Liquid-cooled, inline-3', 1, 0, 0, 'Naked Bike/Streetfighter', 'Motor Triumph Trident 660 tahun 2024 dengan kapasitas mesin 660cc, menghasilkan tenaga 80.0 HP @ 10250 rpm dan torsi 64 Nm @ 6250 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(55, 'Ducati', 'Scrambler Icon', 2024, 369000000, 803, '72.0 HP @ 8250 rpm', '66.2 Nm @ 5750 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'Italia', 'Fun', 'Air-cooled, L-Twin', 0, 0, 1, 'Trail/Off-Road', 'Motor Ducati Scrambler Icon tahun 2024 dengan kapasitas mesin 803cc, menghasilkan tenaga 72.0 HP @ 8250 rpm dan torsi 66.2 Nm @ 5750 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(56, 'Harley-Davidson', 'Street 500', 2021, 273000000, 500, NULL, '40 Nm @ 3750 rpm', 'Manual, 6-percepatan', 'Belt Drive', 2, 2, 'AS', 'Urban', 'Liquid-cooled, V-Twin', 0, 0, 0, 'Cruiser', 'Motor Harley-Davidson Street 500 tahun 2021 dengan kapasitas mesin 500cc, menghasilkan tenaga N/A dan torsi 40 Nm @ 3750 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(57, 'Kawasaki', 'Vulcan S', 2024, 220000000, 649, '60.2 HP @ 7500 rpm', '63 Nm @ 6600 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'Jepang', 'Modern', 'Liquid-cooled, parallel-twin', 0, 0, 0, 'Cruiser', 'Motor Kawasaki Vulcan S tahun 2024 dengan kapasitas mesin 649cc, menghasilkan tenaga 60.2 HP @ 7500 rpm dan torsi 63 Nm @ 6600 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(58, 'Honda', 'Rebel 500', 2024, 201700000, 471, '45.0 HP @ 8500 rpm', '43.3 Nm @ 6000 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'Jepang', 'Bobber', 'Liquid-cooled, parallel-twin', 0, 0, 0, 'Cruiser', 'Motor Honda Rebel 500 tahun 2024 dengan kapasitas mesin 471cc, menghasilkan tenaga 45.0 HP @ 8500 rpm dan torsi 43.3 Nm @ 6000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(59, 'Harley-Davidson', 'Iron 883', 2022, 420000000, 883, '50.3 HP @ 6000 rpm', '68 Nm @ 4750 rpm', 'Manual, 5-percepatan', 'Belt Drive', 1, 2, 'AS', 'Gagah', 'Air-cooled, V-Twin', 0, 0, 0, 'Cruiser', 'Motor Harley-Davidson Iron 883 tahun 2022 dengan kapasitas mesin 883cc, menghasilkan tenaga 50.3 HP @ 6000 rpm dan torsi 68 Nm @ 4750 rpm. Menggunakan transmisi Manual, 5-percepatan dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(60, 'BMW', 'G 310 GS', 2024, 165000000, 313, '33.5 HP @ 9250 rpm', '28 Nm @ 7500 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 1, 'Jerman', 'Compact', 'Liquid-cooled, single cylinder', 0, 1, 0, 'Adventure Touring', 'Motor BMW G 310 GS tahun 2024 dengan kapasitas mesin 313cc, menghasilkan tenaga 33.5 HP @ 9250 rpm dan torsi 28 Nm @ 7500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(61, 'Ducati', 'Monster', 2024, 440000000, 937, '109.5 HP @ 9250 rpm', '93 Nm @ 6500 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'Italia', 'Ikonik', 'Liquid-cooled, L-Twin', 1, 0, 0, 'Naked Bike/Streetfighter', 'Motor Ducati Monster tahun 2024 dengan kapasitas mesin 937cc, menghasilkan tenaga 109.5 HP @ 9250 rpm dan torsi 93 Nm @ 6500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(62, 'Triumph', 'Bonneville T120', 2024, 445000000, 1200, '78.9 HP @ 6550 rpm', '105 Nm @ 3500 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'Inggris', 'Authentic', 'Liquid-cooled, parallel-twin', 1, 0, 0, 'Naked Bike/Streetfighter', 'Motor Triumph Bonneville T120 tahun 2024 dengan kapasitas mesin 1200cc, menghasilkan tenaga 78.9 HP @ 6550 rpm dan torsi 105 Nm @ 3500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(63, 'Kawasaki', 'Z900RS', 2024, 326400000, 948, '109.5 HP @ 8500 rpm', '98.5 Nm @ 6500 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 4, 'Jepang', 'Retro', 'Liquid-cooled, inline-4', 1, 0, 0, 'Naked Bike/Streetfighter', 'Motor Kawasaki Z900RS tahun 2024 dengan kapasitas mesin 948cc, menghasilkan tenaga 109.5 HP @ 8500 rpm dan torsi 98.5 Nm @ 6500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(64, 'Yamaha', 'TMAX DX', 2024, 320000000, 562, '46.9 HP @ 7500 rpm', '55.7 Nm @ 5250 rpm', 'Otomatis (CVT)', 'Belt Drive', 2, 2, 'Jepang', 'Sporty', 'Liquid-cooled, parallel-twin', 1, 0, 0, 'Skuter', 'Motor Yamaha TMAX DX tahun 2024 dengan kapasitas mesin 562cc, menghasilkan tenaga 46.9 HP @ 7500 rpm dan torsi 55.7 Nm @ 5250 rpm. Menggunakan transmisi Otomatis (CVT) dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(65, 'Harley-Davidson', 'Fat Bob 114', 2024, 633000000, 1868, '92.7 HP @ 5020 rpm', '155 Nm @ 3500 rpm', 'Manual, 6-percepatan', 'Belt Drive', 2, 2, 'AS', 'Muscular', 'Air-cooled, V-Twin', 0, 0, 0, 'Cruiser', 'Motor Harley-Davidson Fat Bob 114 tahun 2024 dengan kapasitas mesin 1868cc, menghasilkan tenaga 92.7 HP @ 5020 rpm dan torsi 155 Nm @ 3500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(66, 'Ducati', 'Multistrada V2 S', 2024, 600000000, 937, '111.4 HP @ 9000 rpm', '94 Nm @ 6750 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'Italia', 'Versatile', 'Liquid-cooled, L-Twin', 0, 1, 0, 'Adventure Touring', 'Motor Ducati Multistrada V2 S tahun 2024 dengan kapasitas mesin 937cc, menghasilkan tenaga 111.4 HP @ 9000 rpm dan torsi 94 Nm @ 6750 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(67, 'BMW', 'F 900 R', 2024, 420000000, 895, '103.6 HP @ 8500 rpm', '92 Nm @ 6500 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'Jerman', 'Dynamic', 'Liquid-cooled, parallel-twin', 1, 0, 0, 'Naked Bike/Streetfighter', 'Motor BMW F 900 R tahun 2024 dengan kapasitas mesin 895cc, menghasilkan tenaga 103.6 HP @ 8500 rpm dan torsi 92 Nm @ 6500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(68, 'Yamaha', 'Tenere 700', 2024, 450000000, 689, '72.4 HP @ 9000 rpm', '68 Nm @ 6500 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'Jepang', 'Rally', 'Liquid-cooled, parallel-twin', 0, 1, 0, 'Adventure Touring', 'Motor Yamaha Tenere 700 tahun 2024 dengan kapasitas mesin 689cc, menghasilkan tenaga 72.4 HP @ 9000 rpm dan torsi 68 Nm @ 6500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(69, 'Honda', 'CRF1100L Africa Twin', 2024, 620770000, 1084, '100.6 HP @ 7500 rpm', '105 Nm @ 6250 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'Jepang', 'Off-road', 'Liquid-cooled, parallel-twin', 0, 1, 0, 'Adventure Touring', 'Motor Honda CRF1100L Africa Twin tahun 2024 dengan kapasitas mesin 1084cc, menghasilkan tenaga 100.6 HP @ 7500 rpm dan torsi 105 Nm @ 6250 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(70, 'Kawasaki', 'Ninja ZX-10R', 2024, 561000000, 998, '200.2 HP @ 13200 rpm', '114.9 Nm @ 11400 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 4, 'Jepang', 'Juara', 'Liquid-cooled, inline-4', 0, 0, 0, 'Sport', 'Motor Kawasaki Ninja ZX-10R tahun 2024 dengan kapasitas mesin 998cc, menghasilkan tenaga 200.2 HP @ 13200 rpm dan torsi 114.9 Nm @ 11400 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(71, 'Yamaha', 'R1', 2024, 605000000, 998, '197.2 HP @ 13500 rpm', '112.4 Nm @ 11500 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 4, 'Jepang', 'Sempurna', 'Liquid-cooled, inline-4', 0, 0, 0, 'Sport', 'Motor Yamaha R1 tahun 2024 dengan kapasitas mesin 998cc, menghasilkan tenaga 197.2 HP @ 13500 rpm dan torsi 112.4 Nm @ 11500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(72, 'Honda', 'CBR1000RR-R Fireblade', 2024, 1058000000, 1000, '214.5 HP @ 14500 rpm', '113 Nm @ 12500 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 4, 'Jepang', 'Brutal', 'Liquid-cooled, inline-4', 0, 0, 0, 'Sport', 'Motor Honda CBR1000RR-R Fireblade tahun 2024 dengan kapasitas mesin 1000cc, menghasilkan tenaga 214.5 HP @ 14500 rpm dan torsi 113 Nm @ 12500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(73, 'BMW', 'S 1000 RR', 2024, 767000000, 999, '207.1 HP @ 13750 rpm', '113 Nm @ 11000 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 4, 'Jerman', 'Teknologis', 'Liquid-cooled, inline-4', 0, 0, 0, 'Sport', 'Motor BMW S 1000 RR tahun 2024 dengan kapasitas mesin 999cc, menghasilkan tenaga 207.1 HP @ 13750 rpm dan torsi 113 Nm @ 11000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(74, 'Ducati', 'Panigale V2', 2024, 640000000, 955, '152.9 HP @ 10750 rpm', '104 Nm @ 9000 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'Italia', 'Artistik', 'Liquid-cooled, L-Twin', 0, 0, 0, 'Sport', 'Motor Ducati Panigale V2 tahun 2024 dengan kapasitas mesin 955cc, menghasilkan tenaga 152.9 HP @ 10750 rpm dan torsi 104 Nm @ 9000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(75, 'Harley-Davidson', 'Fat Boy 114', 2024, 650000000, 1868, '92.7 HP @ 5020 rpm', '155 Nm @ 3000 rpm', 'Manual, 6-percepatan', 'Belt Drive', 2, 2, 'AS', 'Ikonik', 'Air-cooled, V-Twin', 0, 0, 0, 'Cruiser', 'Motor Harley-Davidson Fat Boy 114 tahun 2024 dengan kapasitas mesin 1868cc, menghasilkan tenaga 92.7 HP @ 5020 rpm dan torsi 155 Nm @ 3000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(76, 'Triumph', 'Rocket 3 GT', 2024, 750000000, 2458, '164.7 HP @ 6000 rpm', '221 Nm @ 4000 rpm', 'Manual, 6-percepatan', 'Shaft Drive', 2, 3, 'Inggris', 'Monster', 'Liquid-cooled, inline-3', 0, 0, 0, 'Cruiser', 'Motor Triumph Rocket 3 GT tahun 2024 dengan kapasitas mesin 2458cc, menghasilkan tenaga 164.7 HP @ 6000 rpm dan torsi 221 Nm @ 4000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Shaft Drive.', '2026-06-22 15:37:36'),
(77, 'BMW', 'R 1250 GS', 2024, 795000000, 1254, '134.2 HP @ 7750 rpm', '143 Nm @ 6250 rpm', 'Manual, 6-percepatan', 'Shaft Drive', 2, 2, 'Jerman', 'Ultimate', 'Air-liquid-cooled, boxer', 0, 1, 0, 'Adventure Touring', 'Motor BMW R 1250 GS tahun 2024 dengan kapasitas mesin 1254cc, menghasilkan tenaga 134.2 HP @ 7750 rpm dan torsi 143 Nm @ 6250 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Shaft Drive.', '2026-06-22 15:37:36'),
(78, 'Harley-Davidson', 'Street Glide', 2024, 936000000, 1746, '88.7 HP @ 5020 rpm', '150 Nm @ 3250 rpm', 'Manual, 6-percepatan', 'Belt Drive', 2, 2, 'AS', 'Bagger', 'Air-cooled, V-Twin', 0, 1, 0, 'Touring', 'Motor Harley-Davidson Street Glide tahun 2024 dengan kapasitas mesin 1746cc, menghasilkan tenaga 88.7 HP @ 5020 rpm dan torsi 150 Nm @ 3250 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(79, 'Honda', 'Gold Wing', 2024, 1015000000, 1833, '124.6 HP @ 5500 rpm', '170 Nm @ 4500 rpm', 'Manual, 7-percepatan DCT', 'Shaft Drive', 2, 6, 'Jepang', 'Mewah', 'Liquid-cooled, boxer-6', 0, 1, 0, 'Touring', 'Motor Honda Gold Wing tahun 2024 dengan kapasitas mesin 1833cc, menghasilkan tenaga 124.6 HP @ 5500 rpm dan torsi 170 Nm @ 4500 rpm. Menggunakan transmisi Manual, 7-percepatan DCT dan sistem penggerak Shaft Drive.', '2026-06-22 15:37:36'),
(80, 'Ducati', 'Diavel 1260', 2024, 770000000, 1262, '159.8 HP @ 9500 rpm', '129 Nm @ 7500 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'Italia', 'Muscular', 'Liquid-cooled, L-Twin', 0, 0, 0, 'Cruiser', 'Motor Ducati Diavel 1260 tahun 2024 dengan kapasitas mesin 1262cc, menghasilkan tenaga 159.8 HP @ 9500 rpm dan torsi 129 Nm @ 7500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(81, 'BMW', 'R 18 Classic', 2024, 969000000, 1802, '89.7 HP @ 4750 rpm', '158 Nm @ 3000 rpm', 'Manual, 6-percepatan', 'Shaft Drive', 2, 2, 'Jerman', 'Heritage', 'Air-oil-cooled, boxer', 0, 0, 0, 'Cruiser', 'Motor BMW R 18 Classic tahun 2024 dengan kapasitas mesin 1802cc, menghasilkan tenaga 89.7 HP @ 4750 rpm dan torsi 158 Nm @ 3000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Shaft Drive.', '2026-06-22 15:37:36'),
(82, 'Harley-Davidson', 'Road Glide Special', 2024, 1000998000, 1868, '91.7 HP @ 5020 rpm', '158 Nm @ 3250 rpm', 'Manual, 6-percepatan', 'Belt Drive', 2, 2, 'AS', 'Sharknose', 'Air-cooled, V-Twin', 0, 1, 0, 'Touring', 'Motor Harley-Davidson Road Glide Special tahun 2024 dengan kapasitas mesin 1868cc, menghasilkan tenaga 91.7 HP @ 5020 rpm dan torsi 158 Nm @ 3250 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(83, 'Ducati', 'Panigale V4 S', 2024, 1000000000, 1103, '212.5 HP @ 13000 rpm', '123.6 Nm @ 9500 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 4, 'Italia', 'MotoGP-replica', 'Liquid-cooled, V4', 0, 0, 0, 'Sport', 'Motor Ducati Panigale V4 S tahun 2024 dengan kapasitas mesin 1103cc, menghasilkan tenaga 212.5 HP @ 13000 rpm dan torsi 123.6 Nm @ 9500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(84, 'TVS', 'XL 100', 2024, 14720000, 100, '4.2 HP @ 6000 rpm', '6.5 Nm @ 3500 rpm', 'Otomatis', 'Chain Drive', 1, 1, 'India', 'Utilitas', 'Air-cooled, single cylinder', 1, 0, 0, 'Moped', 'Motor TVS XL 100 tahun 2024 dengan kapasitas mesin 100cc, menghasilkan tenaga 4.2 HP @ 6000 rpm dan torsi 6.5 Nm @ 3500 rpm. Menggunakan transmisi Otomatis dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(85, 'Yamaha', 'Vega Force', 2024, 17920000, 114, '8.6 HP @ 7000 rpm', '9.53 Nm @ 5500 rpm', 'Manual, 4-percepatan', 'Chain Drive', 2, 1, 'Jepang', 'Ekonomis', 'Air-cooled, single cylinder', 1, 0, 0, 'Moped', 'Motor Yamaha Vega Force tahun 2024 dengan kapasitas mesin 114cc, menghasilkan tenaga 8.6 HP @ 7000 rpm dan torsi 9.53 Nm @ 5500 rpm. Menggunakan transmisi Manual, 4-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(86, 'Gesits', 'G1', 2024, 28700000, 0, '6.6 HP', '30 Nm', 'Otomatis', 'Belt Drive', 2, 0, 'Indonesia', 'Nasional', 'PMSM Electric Motor', 1, 0, 0, 'Skuter', 'Motor Gesits G1 tahun 2024 dengan kapasitas mesin listrikcc, menghasilkan tenaga 6.6 HP dan torsi 30 Nm. Menggunakan transmisi Otomatis dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(87, 'Alva', 'One', 2024, 36490000, 0, '5.3 HP', '46.5 Nm', 'Otomatis', 'Belt Drive', 2, 0, 'Indonesia', 'Modern', 'Hub-drive Electric Motor', 1, 0, 0, 'Skuter', 'Motor Alva One tahun 2024 dengan kapasitas mesin listrikcc, menghasilkan tenaga 5.3 HP dan torsi 46.5 Nm. Menggunakan transmisi Otomatis dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(88, 'Viar', 'Q1', 2024, 21520000, 0, '1.1 HP', NULL, 'Otomatis', 'Hub Drive', 1, 0, 'Indonesia', 'Praktis', 'BLDC Electric Motor', 1, 0, 0, 'Skuter', 'Motor Viar Q1 tahun 2024 dengan kapasitas mesin listrikcc, menghasilkan tenaga 1.1 HP dan torsi N/A. Menggunakan transmisi Otomatis dan sistem penggerak Hub Drive.', '2026-06-22 15:37:36'),
(89, 'United', 'T1800', 2024, 30500000, 0, '2.4 HP', '27 Nm', 'Otomatis', 'Hub Drive', 2, 0, 'Indonesia', 'Cepat', 'Hub-drive Electric Motor', 1, 0, 0, 'Skuter', 'Motor United T1800 tahun 2024 dengan kapasitas mesin listrikcc, menghasilkan tenaga 2.4 HP dan torsi 27 Nm. Menggunakan transmisi Otomatis dan sistem penggerak Hub Drive.', '2026-06-22 15:37:36'),
(90, 'Selis', 'E-Max', 2024, 22000000, 0, '2.6 HP', NULL, 'Otomatis', 'Hub Drive', 2, 0, 'Indonesia', 'Terjangkau', 'BLDC Electric Motor', 1, 0, 0, 'Skuter', 'Motor Selis E-Max tahun 2024 dengan kapasitas mesin listrikcc, menghasilkan tenaga 2.6 HP dan torsi N/A. Menggunakan transmisi Otomatis dan sistem penggerak Hub Drive.', '2026-06-22 15:37:36'),
(91, 'Kawasaki', 'Ninja H2', 2024, 860000000, 998, '228.4 HP @ 11500 rpm', '141.7 Nm @ 11000 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 4, 'Jepang', 'Supercharged', 'Liquid-cooled, inline-4 Supercharged', 0, 0, 0, 'Sport', 'Motor Kawasaki Ninja H2 tahun 2024 dengan kapasitas mesin 998cc, menghasilkan tenaga 228.4 HP @ 11500 rpm dan torsi 141.7 Nm @ 11000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(92, 'Triumph', 'Tiger 900 GT', 2024, 545000000, 888, '93.9 HP @ 8750 rpm', '87 Nm @ 7250 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 3, 'Inggris', 'Jelajah', 'Liquid-cooled, inline-3', 0, 1, 0, 'Adventure Touring', 'Motor Triumph Tiger 900 GT tahun 2024 dengan kapasitas mesin 888cc, menghasilkan tenaga 93.9 HP @ 8750 rpm dan torsi 87 Nm @ 7250 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(93, 'Moto Guzzi', 'V7 Stone', 2024, 475000000, 853, '64.1 HP @ 6800 rpm', '73 Nm @ 5000 rpm', 'Manual, 6-percepatan', 'Shaft Drive', 2, 2, 'Italia', 'Unik', 'Air-cooled, transverse V-Twin', 1, 0, 0, 'Naked Bike/Streetfighter', 'Motor Moto Guzzi V7 Stone tahun 2024 dengan kapasitas mesin 853cc, menghasilkan tenaga 64.1 HP @ 6800 rpm dan torsi 73 Nm @ 5000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Shaft Drive.', '2026-06-22 15:37:36'),
(94, 'Aprilia', 'RS 660', 2024, 430000000, 659, '98.6 HP @ 10500 rpm', '67 Nm @ 8500 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'Italia', 'Ringan', 'Liquid-cooled, parallel-twin', 0, 0, 0, 'Sport', 'Motor Aprilia RS 660 tahun 2024 dengan kapasitas mesin 659cc, menghasilkan tenaga 98.6 HP @ 10500 rpm dan torsi 67 Nm @ 8500 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(95, 'MV Agusta', 'Brutale 800 Rosso', 2024, 390000000, 798, '108.5 HP @ 11500 rpm', '83 Nm @ 7600 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 3, 'Italia', 'Eksotis', 'Liquid-cooled, inline-3', 1, 0, 0, 'Naked Bike/Streetfighter', 'Motor MV Agusta Brutale 800 Rosso tahun 2024 dengan kapasitas mesin 798cc, menghasilkan tenaga 108.5 HP @ 11500 rpm dan torsi 83 Nm @ 7600 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(96, 'Husqvarna', 'Svartpilen 401', 2024, 150000000, 373, '43.4 HP @ 9000 rpm', '37 Nm @ 7000 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 1, 'Swedia', 'Scrambler', 'Liquid-cooled, single cylinder', 0, 0, 1, 'Trail/Off-Road', 'Motor Husqvarna Svartpilen 401 tahun 2024 dengan kapasitas mesin 373cc, menghasilkan tenaga 43.4 HP @ 9000 rpm dan torsi 37 Nm @ 7000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(97, 'Benelli', 'Leoncino 500', 2024, 166000000, 500, '46.8 HP @ 8500 rpm', '46 Nm @ 6000 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'Italia', 'Singa', 'Liquid-cooled, parallel-twin', 0, 0, 1, 'Trail/Off-Road', 'Motor Benelli Leoncino 500 tahun 2024 dengan kapasitas mesin 500cc, menghasilkan tenaga 46.8 HP @ 8500 rpm dan torsi 46 Nm @ 6000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(98, 'KTM', '390 Adventure', 2024, 145000000, 373, '42.9 HP @ 9000 rpm', '37 Nm @ 7000 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 1, 'Austria', 'Lincah', 'Liquid-cooled, single cylinder', 0, 1, 0, 'Adventure Touring', 'Motor KTM 390 Adventure tahun 2024 dengan kapasitas mesin 373cc, menghasilkan tenaga 42.9 HP @ 9000 rpm dan torsi 37 Nm @ 7000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36'),
(99, 'BMW', 'C 400 GT', 2024, 279000000, 350, '33.5 HP @ 7500 rpm', '35 Nm @ 5750 rpm', 'Otomatis (CVT)', 'Belt Drive', 2, 1, 'Jerman', 'Urban', 'Liquid-cooled, single cylinder', 1, 0, 0, 'Skuter', 'Motor BMW C 400 GT tahun 2024 dengan kapasitas mesin 350cc, menghasilkan tenaga 33.5 HP @ 7500 rpm dan torsi 35 Nm @ 5750 rpm. Menggunakan transmisi Otomatis (CVT) dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(100, 'Vespa', 'GTS Super Tech 300', 2024, 163200000, 278, '23.5 HP @ 8250 rpm', '26 Nm @ 5250 rpm', 'Otomatis (CVT)', 'Belt Drive', 2, 1, 'Italia', 'Canggih', 'Liquid-cooled, single cylinder', 1, 0, 0, 'Skuter', 'Motor Vespa GTS Super Tech 300 tahun 2024 dengan kapasitas mesin 278cc, menghasilkan tenaga 23.5 HP @ 8250 rpm dan torsi 26 Nm @ 5250 rpm. Menggunakan transmisi Otomatis (CVT) dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(101, 'Harley-Davidson', 'Softail Standard', 2024, 613050000, 1746, '85.1 HP @ 5020 rpm', '145 Nm @ 3000 rpm', 'Manual, 6-percepatan', 'Belt Drive', 1, 2, 'AS', 'Minimalis', 'Air-cooled, V-Twin', 0, 0, 0, 'Cruiser', 'Motor Harley-Davidson Softail Standard tahun 2024 dengan kapasitas mesin 1746cc, menghasilkan tenaga 85.1 HP @ 5020 rpm dan torsi 145 Nm @ 3000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(102, 'Indian', 'Scout Bobber', 2024, 585000000, 1133, '98.6 HP @ 8100 rpm', '97.7 Nm @ 6000 rpm', 'Manual, 6-percepatan', 'Belt Drive', 1, 2, 'AS', 'Garang', 'Liquid-cooled, V-Twin', 0, 0, 0, 'Cruiser', 'Motor Indian Scout Bobber tahun 2024 dengan kapasitas mesin 1133cc, menghasilkan tenaga 98.6 HP @ 8100 rpm dan torsi 97.7 Nm @ 6000 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Belt Drive.', '2026-06-22 15:37:36'),
(103, 'Royal Enfield', 'Interceptor 650', 2024, 221700000, 648, '46.3 HP @ 7250 rpm', '52 Nm @ 5250 rpm', 'Manual, 6-percepatan', 'Chain Drive', 2, 2, 'India', 'Roadster', 'Air-oil-cooled, parallel-twin', 1, 0, 0, 'Naked Bike/Streetfighter', 'Motor Royal Enfield Interceptor 650 tahun 2024 dengan kapasitas mesin 648cc, menghasilkan tenaga 46.3 HP @ 7250 rpm dan torsi 52 Nm @ 5250 rpm. Menggunakan transmisi Manual, 6-percepatan dan sistem penggerak Chain Drive.', '2026-06-22 15:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `motor_images`
--

CREATE TABLE `motor_images` (
  `id_image` int(11) NOT NULL,
  `id_motor` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `is_utama` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `motor_images`
--

INSERT INTO `motor_images` (`id_image`, `id_motor`, `nama_file`, `is_utama`) VALUES
(261, 87, 'alva/alvaone-1.jpg', 1),
(262, 94, 'aprilia/rs660-1.jpg', 1),
(263, 94, 'aprilia/rs660-2.jpg', 0),
(264, 94, 'aprilia/rs660-3.jpg', 0),
(265, 94, 'aprilia/rs660-4.jpg', 0),
(266, 97, 'benelli/leoncino-1.jpg', 1),
(267, 97, 'benelli/leoncino-2.jpg', 0),
(268, 97, 'benelli/leoncino-3.jpg', 0),
(269, 97, 'benelli/leoncino-4.jpg', 0),
(270, 97, 'benelli/leoncino-5.jpg', 0),
(271, 29, 'benelli/patagonian-1.jpg', 1),
(272, 29, 'benelli/patagonian-2.jpg', 0),
(273, 43, 'benelli/trk502-1.jpg', 1),
(274, 43, 'benelli/trk502-2.jpg', 0),
(275, 99, 'bmw/c400gt-1.jpg', 1),
(276, 99, 'bmw/c400gt-2.jpg', 0),
(277, 99, 'bmw/c400gt-3.jpg', 0),
(278, 99, 'bmw/c400gt-4.jpg', 0),
(279, 99, 'bmw/c400gt-5.jpg', 0),
(280, 99, 'bmw/c400gt-6.jpg', 0),
(281, 67, 'bmw/f900r-1.jpg', 1),
(282, 67, 'bmw/f900r-2.jpg', 0),
(283, 67, 'bmw/f900r-3.jpg', 0),
(284, 60, 'bmw/g310gs-1.jpg', 1),
(285, 60, 'bmw/g310gs-2.jpg', 0),
(286, 60, 'bmw/g310gs-3.jpg', 0),
(287, 60, 'bmw/g310gs-4.jpg', 0),
(288, 60, 'bmw/g310gs-5.jpg', 0),
(289, 60, 'bmw/g310gs-6.jpg', 0),
(290, 60, 'bmw/g310gs-7.jpg', 0),
(291, 60, 'bmw/g310gs-8.jpg', 0),
(292, 60, 'bmw/g310gs-9.jpg', 0),
(293, 60, 'bmw/g310gs-10.jpg', 0),
(294, 60, 'bmw/g310gs-11.jpg', 0),
(295, 81, 'bmw/r18-1.jpg', 1),
(296, 81, 'bmw/r18-2.jpg', 0),
(297, 81, 'bmw/r18-3.jpg', 0),
(298, 81, 'bmw/r18-4.jpg', 0),
(299, 77, 'bmw/r1250gs-1.jpg', 1),
(300, 77, 'bmw/r1250gs-2.jpg', 0),
(301, 77, 'bmw/r1250gs-3.jpg', 0),
(302, 77, 'bmw/r1250gs-4.jpg', 0),
(303, 73, 'bmw/s1000rr-1.jpg', 1),
(304, 73, 'bmw/s1000rr-2.jpg', 0),
(305, 73, 'bmw/s1000rr-3.jpg', 0),
(306, 73, 'bmw/s1000rr-4.jpg', 0),
(307, 73, 'bmw/s1000rr-5.jpg', 0),
(308, 73, 'bmw/s1000rr-6.jpg', 0),
(309, 31, 'cfmoto/cfmoto-1.jpg', 1),
(310, 31, 'cfmoto/cfmoto-2.jpg', 0),
(311, 80, 'ducati/diavel-1.jpg', 1),
(312, 80, 'ducati/diavel-2.jpg', 0),
(313, 80, 'ducati/diavel-3.jpg', 0),
(314, 80, 'ducati/diavel-4.jpg', 0),
(315, 80, 'ducati/diavel-5.jpg', 0),
(316, 80, 'ducati/diavel-6.jpg', 0),
(317, 80, 'ducati/diavel-7.jpg', 0),
(318, 61, 'ducati/monster-1.jpg', 1),
(319, 61, 'ducati/monster-2.jpg', 0),
(320, 61, 'ducati/monster-3.jpg', 0),
(321, 61, 'ducati/monster-4.jpg', 0),
(322, 61, 'ducati/monster-5.jpg', 0),
(323, 61, 'ducati/monster-6.jpg', 0),
(324, 61, 'ducati/monster-7.jpg', 0),
(325, 66, 'ducati/multistradav2s-1.jpg', 1),
(326, 74, 'ducati/panigalev2-1.jpg', 1),
(327, 74, 'ducati/panigalev2-2.jpg', 0),
(328, 74, 'ducati/panigalev2-3.jpg', 0),
(329, 83, 'ducati/panigalev4s-1.jpg', 1),
(330, 83, 'ducati/panigalev4s-2.jpg', 0),
(331, 83, 'ducati/panigalev4s-3.jpg', 0),
(332, 55, 'ducati/scrambler-icon-1.jpg', 1),
(333, 55, 'ducati/scrambler-icon-2.jpg', 0),
(334, 55, 'ducati/scrambler-icon-3.jpg', 0),
(335, 55, 'ducati/scrambler-icon-4.jpg', 0),
(336, 55, 'ducati/scrambler-icon-5.jpg', 0),
(337, 55, 'ducati/scrambler-icon-6.jpg', 0),
(338, 55, 'ducati/scrambler-icon-7.jpg', 0),
(339, 55, 'ducati/scrambler-icon-8.jpg', 0),
(340, 55, 'ducati/scrambler-icon-9.jpg', 0),
(341, 86, 'gesits/gesitsg1-1.jpg', 1),
(342, 86, 'gesits/gesitsg1-2.jpg', 0),
(343, 65, 'harley-davidson/fatbob114-1.jpg', 1),
(344, 65, 'harley-davidson/fatbob114-2.jpg', 0),
(345, 65, 'harley-davidson/fatbob114-3.jpg', 0),
(346, 65, 'harley-davidson/fatbob114-4.jpg', 0),
(347, 65, 'harley-davidson/fatbob114-5.jpg', 0),
(348, 65, 'harley-davidson/fatbob114-6.jpg', 0),
(349, 65, 'harley-davidson/fatbob114-7.jpg', 0),
(350, 75, 'harley-davidson/fatboy114-1.jpg', 1),
(351, 75, 'harley-davidson/fatboy114-2.jpg', 0),
(352, 75, 'harley-davidson/fatboy114-3.jpg', 0),
(353, 75, 'harley-davidson/fatboy114-4.jpg', 0),
(354, 75, 'harley-davidson/fatboy114-5.jpg', 0),
(355, 75, 'harley-davidson/fatboy114-6.jpg', 0),
(356, 75, 'harley-davidson/fatboy114-7.jpg', 0),
(357, 75, 'harley-davidson/fatboy114-8.jpg', 0),
(358, 75, 'harley-davidson/fatboy114-9.jpg', 0),
(359, 59, 'harley-davidson/iron883-1.jpg', 1),
(360, 59, 'harley-davidson/iron883-2.jpg', 0),
(361, 59, 'harley-davidson/iron883-3.jpg', 0),
(362, 59, 'harley-davidson/iron883-4.jpg', 0),
(363, 59, 'harley-davidson/iron883-5.jpg', 0),
(364, 82, 'harley-davidson/roadglide-1.jpg', 1),
(365, 82, 'harley-davidson/roadglide-2.jpg', 0),
(366, 82, 'harley-davidson/roadglide-3.jpg', 0),
(367, 82, 'harley-davidson/roadglide-4.jpg', 0),
(368, 82, 'harley-davidson/roadglide-5.jpg', 0),
(369, 82, 'harley-davidson/roadglide-6.jpg', 0),
(370, 82, 'harley-davidson/roadglide-7.jpg', 0),
(371, 82, 'harley-davidson/roadglide-8.jpg', 0),
(372, 82, 'harley-davidson/roadglide-9.jpg', 0),
(373, 82, 'harley-davidson/roadglide-10.jpg', 0),
(374, 101, 'harley-davidson/softtailstandard-1.jpg', 1),
(375, 56, 'harley-davidson/street500-1.jpg', 1),
(376, 56, 'harley-davidson/street500-2.jpg', 0),
(377, 56, 'harley-davidson/street500-3.jpg', 0),
(378, 56, 'harley-davidson/street500-4.jpg', 0),
(379, 56, 'harley-davidson/street500-5.jpg', 0),
(380, 56, 'harley-davidson/street500-6.jpg', 0),
(381, 78, 'harley-davidson/streetglide-1.jpg', 1),
(382, 78, 'harley-davidson/streetglide-2.jpg', 0),
(383, 17, 'honda/adv160-1.jpg', 1),
(384, 17, 'honda/adv160-2.jpg', 0),
(385, 17, 'honda/adv160-3.jpg', 0),
(386, 17, 'honda/adv160-4.jpg', 0),
(387, 17, 'honda/adv160-5.jpg', 0),
(388, 17, 'honda/adv160-6.jpg', 0),
(389, 17, 'honda/adv160-7.jpg', 0),
(390, 1, 'honda/beat-1.jpg', 1),
(391, 1, 'honda/beat-2.jpg', 0),
(392, 1, 'honda/beat-3.jpg', 0),
(393, 1, 'honda/beat-4.jpg', 0),
(394, 1, 'honda/beat-5.jpg', 0),
(395, 21, 'honda/cb-150r-1.jpg', 1),
(396, 21, 'honda/cb-150r-2.jpg', 0),
(397, 21, 'honda/cb-150r-3.jpg', 0),
(398, 21, 'honda/cb-150r-4.jpg', 0),
(399, 21, 'honda/cb-150r-5.jpg', 0),
(400, 45, 'honda/cb500x-1.jpg', 1),
(401, 45, 'honda/cb500x-2.jpg', 0),
(402, 45, 'honda/cb500x-3.jpg', 0),
(403, 50, 'honda/cb650r-1.jpg', 1),
(404, 50, 'honda/cb650r-2.jpg', 0),
(405, 24, 'honda/cbr-150r-1.jpg', 1),
(406, 24, 'honda/cbr-150r-2.jpg', 0),
(407, 24, 'honda/cbr-150r-3.jpg', 0),
(408, 24, 'honda/cbr-150r-4.jpg', 0),
(409, 24, 'honda/cbr-150r-5.jpg', 0),
(410, 24, 'honda/cbr-150r-6.jpg', 0),
(411, 24, 'honda/cbr-150r-7.jpg', 0),
(412, 24, 'honda/cbr-150r-8.jpg', 0),
(413, 34, 'honda/cbr250rr-1.jpg', 1),
(414, 34, 'honda/cbr250rr-2.jpg', 0),
(415, 34, 'honda/cbr250rr-3.jpg', 0),
(416, 34, 'honda/cbr250rr-4.jpg', 0),
(417, 47, 'honda/cbr600rr-1.jpg', 1),
(418, 47, 'honda/cbr600rr-2.jpg', 0),
(419, 47, 'honda/cbr600rr-3.jpg', 0),
(420, 72, 'honda/cbr1000rr-rfireblade-1.jpg', 1),
(421, 72, 'honda/cbr1000rr-rfireblade-2.jpg', 0),
(422, 72, 'honda/cbr1000rr-rfireblade-3.jpg', 0),
(423, 28, 'honda/crf-150l-1.jpg', 1),
(424, 28, 'honda/crf-150l-2.jpg', 0),
(425, 28, 'honda/crf-150l-3.jpg', 0),
(426, 28, 'honda/crf-150l-4.jpg', 0),
(427, 28, 'honda/crf-150l-5.jpg', 0),
(428, 28, 'honda/crf-150l-6.jpg', 0),
(429, 28, 'honda/crf-150l-7.jpg', 0),
(430, 28, 'honda/crf-150l-8.jpg', 0),
(431, 69, 'honda/crf1100l-1.jpg', 1),
(432, 69, 'honda/crf1100l-2.jpg', 0),
(433, 69, 'honda/crf1100l-3.jpg', 0),
(434, 38, 'honda/forza-1.jpg', 1),
(435, 38, 'honda/forza-2.jpg', 0),
(436, 38, 'honda/forza-3.jpg', 0),
(437, 5, 'honda/genio-1.jpg', 1),
(438, 5, 'honda/genio-2.jpg', 0),
(439, 5, 'honda/genio-3.jpg', 0),
(440, 5, 'honda/genio-4.jpg', 0),
(441, 5, 'honda/genio-5.jpg', 0),
(442, 5, 'honda/genio-6.jpg', 0),
(443, 79, 'honda/goldwing-1.jpg', 1),
(444, 79, 'honda/goldwing-2.jpg', 0),
(445, 79, 'honda/goldwing-3.jpg', 0),
(446, 79, 'honda/goldwing-4.jpg', 0),
(447, 79, 'honda/goldwing-5.jpg', 0),
(448, 79, 'honda/goldwing-6.jpg', 0),
(449, 79, 'honda/goldwing-7.jpg', 0),
(450, 79, 'honda/goldwing-8.jpg', 0),
(451, 79, 'honda/goldwing-9.jpg', 0),
(452, 15, 'honda/pcx160-1.jpg', 1),
(453, 15, 'honda/pcx160-2.jpg', 0),
(454, 15, 'honda/pcx160-3.jpg', 0),
(455, 15, 'honda/pcx160-4.jpg', 0),
(456, 15, 'honda/pcx160-5.jpg', 0),
(457, 15, 'honda/pcx160-6.jpg', 0),
(458, 15, 'honda/pcx160-7.jpg', 0),
(459, 15, 'honda/pcx160-8.jpg', 0),
(460, 15, 'honda/pcx160-9.jpg', 0),
(461, 15, 'honda/pcx160-10.jpg', 0),
(462, 15, 'honda/pcx160-11.jpg', 0),
(463, 15, 'honda/pcx160-12.jpg', 0),
(464, 58, 'honda/rebel500-1.jpg', 1),
(465, 58, 'honda/rebel500-2.jpg', 0),
(466, 58, 'honda/rebel500-3.jpg', 0),
(467, 3, 'honda/revofit-1.jpg', 1),
(468, 3, 'honda/revofit-2.jpg', 0),
(469, 3, 'honda/revofit-3.jpg', 0),
(470, 3, 'honda/revofit-4.jpg', 0),
(471, 3, 'honda/revofit-5.jpg', 0),
(472, 7, 'honda/scoopy-1.jpg', 1),
(473, 7, 'honda/scoopy-2.jpg', 0),
(474, 7, 'honda/scoopy-3.jpg', 0),
(475, 7, 'honda/scoopy-4.jpg', 0),
(476, 7, 'honda/scoopy-5.jpg', 0),
(477, 7, 'honda/scoopy-6.jpg', 0),
(478, 7, 'honda/scoopy-7.jpg', 0),
(479, 11, 'honda/suprax-1.jpg', 1),
(480, 11, 'honda/suprax-2.jpg', 0),
(481, 11, 'honda/suprax-3.jpg', 0),
(482, 11, 'honda/suprax-4.jpg', 0),
(483, 11, 'honda/suprax-5.jpg', 0),
(484, 11, 'honda/suprax-6.jpg', 0),
(485, 11, 'honda/suprax-7.jpg', 0),
(486, 11, 'honda/suprax-8.jpg', 0),
(487, 11, 'honda/suprax-9.jpg', 0),
(488, 9, 'honda/vario125-1.jpg', 1),
(489, 9, 'honda/vario125-2.jpg', 0),
(490, 9, 'honda/vario125-3.jpg', 0),
(491, 9, 'honda/vario125-4.jpg', 0),
(492, 9, 'honda/vario125-5.jpg', 0),
(493, 13, 'honda/vario160-1.jpg', 1),
(494, 13, 'honda/vario160-2.jpg', 0),
(495, 13, 'honda/vario160-3.jpg', 0),
(496, 13, 'honda/vario160-4.jpg', 0),
(497, 13, 'honda/vario160-5.jpg', 0),
(498, 96, 'husqvarna/701enduro-1.jpg', 0),
(499, 96, 'husqvarna/701enduro-2.jpg', 0),
(500, 96, 'husqvarna/701enduro-3.jpg', 0),
(501, 96, 'husqvarna/701enduro-4.jpg', 0),
(502, 96, 'husqvarna/701supermoto-1.jpg', 0),
(503, 96, 'husqvarna/701supermoto-2.jpg', 0),
(504, 96, 'husqvarna/701supermoto-3.jpg', 0),
(505, 96, 'husqvarna/701supermoto-4.jpg', 0),
(506, 96, 'husqvarna/701supermoto-5.jpg', 0),
(507, 96, 'husqvarna/svartpilen401-1.jpg', 1),
(508, 96, 'husqvarna/svartpilen401-2.jpg', 0),
(509, 96, 'husqvarna/svartpilen401-3.jpg', 0),
(510, 96, 'husqvarna/svartpilen401-4.jpg', 0),
(511, 96, 'husqvarna/te250-1.jpg', 0),
(512, 96, 'husqvarna/te250-2.jpg', 0),
(513, 96, 'husqvarna/te250-3.jpg', 0),
(514, 96, 'husqvarna/te250-4.jpg', 0),
(515, 102, 'indian/scoutbobber-1.jpg', 1),
(516, 102, 'indian/scoutbobber-2.jpg', 0),
(517, 102, 'indian/scoutbobber-3.jpg', 0),
(518, 102, 'indian/scoutbobber-4.jpg', 0),
(519, 102, 'indian/scoutbobber-5.jpg', 0),
(520, 102, 'indian/scoutbobber-6.jpg', 0),
(521, 91, 'kawasaki/ninjah2-1.jpg', 1),
(522, 91, 'kawasaki/ninjah2-2.jpg', 0),
(523, 91, 'kawasaki/ninjah2-3.jpg', 0),
(524, 91, 'kawasaki/ninjah2-4.jpg', 0),
(525, 91, 'kawasaki/ninjah2-5.jpg', 0),
(526, 27, 'kawasaki/klx150-1.jpg', 1),
(527, 27, 'kawasaki/klx150-2.jpg', 0),
(528, 27, 'kawasaki/klx150-3.jpg', 0),
(529, 32, 'kawasaki/ninja250-1.jpg', 1),
(530, 32, 'kawasaki/ninja250-2.jpg', 0),
(531, 32, 'kawasaki/ninja250-3.jpg', 0),
(532, 32, 'kawasaki/ninja250-4.jpg', 0),
(533, 32, 'kawasaki/ninja250-5.jpg', 0),
(534, 32, 'kawasaki/ninja250-6.jpg', 0),
(535, 30, 'kawasaki/ninja250sl-1.jpg', 1),
(536, 30, 'kawasaki/ninja250sl-2.jpg', 0),
(537, 39, 'kawasaki/versys250-1.jpg', 1),
(538, 39, 'kawasaki/versys250-2.jpg', 0),
(539, 46, 'kawasaki/versys650-1.jpg', 1),
(540, 46, 'kawasaki/versys650-2.jpg', 0),
(541, 46, 'kawasaki/versys650-3.jpg', 0),
(542, 57, 'kawasaki/vulcans-1.jpg', 1),
(543, 57, 'kawasaki/vulcans-2.jpg', 0),
(544, 57, 'kawasaki/vulcans-3.jpg', 0),
(545, 57, 'kawasaki/vulcans-4.jpg', 0),
(546, 19, 'kawasaki/w175-1.jpg', 1),
(547, 19, 'kawasaki/w175-2.jpg', 0),
(548, 44, 'kawasaki/z650-1.jpg', 1),
(549, 44, 'kawasaki/z650-2.jpg', 0),
(550, 44, 'kawasaki/z650-3.jpg', 0),
(551, 44, 'kawasaki/z650-4.jpg', 0),
(552, 44, 'kawasaki/z650-5.jpg', 0),
(553, 52, 'kawasaki/z900-1.jpg', 1),
(554, 52, 'kawasaki/z900-2.jpg', 0),
(555, 52, 'kawasaki/z900-3.jpg', 0),
(556, 63, 'kawasaki/z900rs-1.jpg', 1),
(557, 63, 'kawasaki/z900rs-2.jpg', 0),
(558, 63, 'kawasaki/z900rs-3.jpg', 0),
(559, 63, 'kawasaki/z900rs-4.jpg', 0),
(560, 63, 'kawasaki/z900rs-5.jpg', 0),
(561, 63, 'kawasaki/z900rs-6.jpg', 0),
(562, 63, 'kawasaki/z900rs-7.jpg', 0),
(563, 63, 'kawasaki/z900rs-8.jpg', 0),
(564, 48, 'kawasaki/zx6r-1.jpg', 1),
(565, 48, 'kawasaki/zx6r-2.jpg', 0),
(566, 48, 'kawasaki/zx6r-3.jpg', 0),
(567, 48, 'kawasaki/zx6r-4.jpg', 0),
(568, 70, 'kawasaki/zx10r-1.jpg', 1),
(569, 70, 'kawasaki/zx10r-2.jpg', 0),
(570, 70, 'kawasaki/zx10r-3.jpg', 0),
(571, 70, 'kawasaki/zx10r-4.jpg', 0),
(572, 70, 'kawasaki/zx10r-5.jpg', 0),
(573, 41, 'kawasaki/zx25r-1.jpg', 1),
(574, 41, 'kawasaki/zx25r-2.jpg', 0),
(575, 41, 'kawasaki/zx25r-3.jpg', 0),
(576, 41, 'kawasaki/zx25r-4.jpg', 0),
(577, 41, 'kawasaki/zx25r-5.jpg', 0),
(578, 41, 'kawasaki/zx25r-6.jpg', 0),
(579, 98, 'ktm/390adventure-1.jpg', 1),
(580, 98, 'ktm/390adventure-2.jpg', 0),
(581, 98, 'ktm/390adventure-3.jpg', 0),
(582, 36, 'ktm/duke250-1.jpg', 1),
(583, 36, 'ktm/duke250-2.jpg', 0),
(584, 36, 'ktm/duke250-3.jpg', 0),
(585, 93, 'moto-guzzi/v7stone-1.jpg', 1),
(586, 93, 'moto-guzzi/v7stone-2.jpg', 0),
(587, 93, 'moto-guzzi/v7stone-3.jpg', 0),
(588, 93, 'moto-guzzi/v7stone-4.jpg', 0),
(589, 93, 'moto-guzzi/v7stone-5.jpg', 0),
(590, 93, 'moto-guzzi/v7stone-6.jpg', 0),
(591, 95, 'mv-agusta/brutale800-1.jpg', 1),
(592, 95, 'mv-agusta/brutale800-2.jpg', 0),
(593, 95, 'mv-agusta/brutale800-3.jpg', 0),
(594, 90, 'selis/emax-1.jpg', 1),
(595, 90, 'selis/emax-2.jpg', 0),
(596, 90, 'selis/emax-3.jpg', 0),
(597, 90, 'selis/emax-4.jpg', 0),
(598, 90, 'selis/emax-5.jpg', 0),
(599, 40, 'royal-enfield/classic350-1.jpg', 1),
(600, 40, 'royal-enfield/classic350-2.jpg', 0),
(601, 40, 'royal-enfield/classic350-3.jpg', 0),
(602, 40, 'royal-enfield/classic350-4.jpg', 0),
(603, 40, 'royal-enfield/classic350-5.jpg', 0),
(604, 40, 'royal-enfield/classic350-6.jpg', 0),
(605, 40, 'royal-enfield/classic350-7.jpg', 0),
(606, 40, 'royal-enfield/classic350-8.jpg', 0),
(607, 40, 'royal-enfield/classic350-9.jpg', 0),
(608, 40, 'royal-enfield/classic350-10.jpg', 0),
(609, 40, 'royal-enfield/classic350-11.jpg', 0),
(610, 42, 'royal-enfield/himalayan-1.jpg', 1),
(611, 42, 'royal-enfield/himalayan-2.jpg', 0),
(612, 42, 'royal-enfield/himalayan-3.jpg', 0),
(613, 103, 'royal-enfield/interceptor650-1.jpg', 1),
(614, 103, 'royal-enfield/interceptor650-2.jpg', 0),
(615, 103, 'royal-enfield/interceptor650-3.jpg', 0),
(616, 26, 'suzuki/gsx-r150-1.jpg', 1),
(617, 26, 'suzuki/gsx-r150-2.jpg', 0),
(618, 26, 'suzuki/gsx-r150-3.jpg', 0),
(619, 23, 'suzuki/gsx-s150-1.jpg', 1),
(620, 23, 'suzuki/gsx-s150-2.jpg', 0),
(621, 23, 'suzuki/gsx-s150-3.jpg', 0),
(622, 23, 'suzuki/gsx-s150-4.jpg', 0),
(623, 23, 'suzuki/gsx-s150-5.jpg', 0),
(624, 23, 'suzuki/gsx-s150-6.jpg', 0),
(625, 23, 'suzuki/gsx-s150-7.jpg', 0),
(626, 23, 'suzuki/gsx-s150-8.jpg', 0),
(627, 4, 'suzuki/nex125-1.jpg', 1),
(628, 4, 'suzuki/nex125-2.jpg', 0),
(629, 4, 'suzuki/nex125-3.jpg', 0),
(630, 4, 'suzuki/nex125-4.jpg', 0),
(631, 4, 'suzuki/nex125-5.jpg', 0),
(632, 4, 'suzuki/nex125-6.jpg', 0),
(633, 12, 'suzuki/satria-f150-1.jpg', 1),
(634, 12, 'suzuki/satria-f150-2.jpg', 0),
(635, 12, 'suzuki/satria-f150-3.jpg', 0),
(636, 62, 'triumph/bonnevillet120-1.jpg', 1),
(637, 62, 'triumph/bonnevillet120-2.jpg', 0),
(638, 62, 'triumph/bonnevillet120-3.jpg', 0),
(639, 62, 'triumph/bonnevillet120-4.jpg', 0),
(640, 62, 'triumph/bonnevillet120-5.jpg', 0),
(641, 62, 'triumph/bonnevillet120-6.jpg', 0),
(642, 62, 'triumph/bonnevillet120-7.jpg', 0),
(643, 76, 'triumph/rocket3gt-1.jpg', 1),
(644, 76, 'triumph/rocket3gt-2.jpg', 0),
(645, 92, 'triumph/tiger900gt-1.jpg', 1),
(646, 92, 'triumph/tiger900gt-2.jpg', 0),
(647, 92, 'triumph/tiger900gt-3.jpg', 0),
(648, 92, 'triumph/tiger900gt-4.jpg', 0),
(649, 92, 'triumph/tiger900gt-5.jpg', 0),
(650, 54, 'triumph/trident660-1.jpg', 1),
(651, 54, 'triumph/trident660-2.jpg', 0),
(652, 54, 'triumph/trident660-3.jpg', 0),
(653, 54, 'triumph/trident660-4.jpg', 0),
(654, 54, 'triumph/trident660-5.jpg', 0),
(655, 54, 'triumph/trident660-6.jpg', 0),
(656, 89, 'united/t1800-1.jpg', 1),
(657, 89, 'united/t1800-2.jpg', 0),
(658, 84, 'tvs/xl100-1.jpg', 1),
(659, 84, 'tvs/xl100-2.jpg', 0),
(660, 84, 'tvs/xl100-3.jpg', 0),
(661, 84, 'tvs/xl100-4.jpg', 0),
(662, 100, 'vespa/gts300-1.jpg', 1),
(663, 100, 'vespa/gts300-2.jpg', 0),
(664, 18, 'vespa/lx125-1.jpg', 1),
(665, 18, 'vespa/lx125-2.jpg', 0),
(666, 18, 'vespa/lx125-3.jpg', 0),
(667, 18, 'vespa/lx125-4.jpg', 0),
(668, 86, 'gesits/g1-1.jpg', 1),
(669, 86, 'gesits/g1-3.jpg', 0),
(670, 88, 'viar/q1-2.jpg', 1),
(671, 88, 'viar/q1-4.jpg', 0),
(672, 14, 'yamaha/aerox-1.jpg', 1),
(673, 14, 'yamaha/aerox-2.jpg', 0),
(674, 14, 'yamaha/aerox-3.jpg', 0),
(675, 14, 'yamaha/aerox-4.jpg', 0),
(676, 8, 'yamaha/fazzio-1.jpg', 1),
(677, 8, 'yamaha/fazzio-2.jpg', 0),
(678, 8, 'yamaha/fazzio-3.jpg', 0),
(679, 8, 'yamaha/fazzio-4.jpg', 0),
(680, 8, 'yamaha/fazzio-5.jpg', 0),
(681, 8, 'yamaha/fazzio-6.jpg', 0),
(682, 8, 'yamaha/fazzio-7.jpg', 0),
(683, 8, 'yamaha/fazzio-8.jpg', 0),
(684, 8, 'yamaha/fazzio-9.jpg', 0),
(685, 8, 'yamaha/fazzio-10.jpg', 0),
(686, 8, 'yamaha/fazzio-11.jpg', 0),
(687, 6, 'yamaha/gear125-1.jpg', 1),
(688, 6, 'yamaha/gear125-2.jpg', 0),
(689, 6, 'yamaha/gear125-3.jpg', 0),
(690, 6, 'yamaha/gear125-4.jpg', 0),
(691, 6, 'yamaha/gear125-5.jpg', 0),
(692, 6, 'yamaha/gear125-6.jpg', 0),
(693, 6, 'yamaha/gear125-7.jpg', 0),
(694, 10, 'yamaha/grandfilano-1.jpg', 1),
(695, 10, 'yamaha/grandfilano-2.jpg', 0),
(696, 10, 'yamaha/grandfilano-3.jpg', 0),
(697, 10, 'yamaha/grandfilano-4.jpg', 0),
(698, 10, 'yamaha/grandfilano-5.jpg', 0),
(699, 10, 'yamaha/grandfilano-6.jpg', 0),
(700, 10, 'yamaha/grandfilano-7.jpg', 0),
(701, 10, 'yamaha/grandfilano-8.jpg', 0),
(702, 10, 'yamaha/grandfilano-9.jpg', 0),
(703, 10, 'yamaha/grandfilano-10.jpg', 0),
(704, 2, 'yamaha/mio-m3-1.jpg', 1),
(705, 2, 'yamaha/mio-m3-2.jpg', 0),
(706, 2, 'yamaha/mio-m3-3.jpg', 0),
(707, 2, 'yamaha/mio-m3-4.jpg', 0),
(708, 2, 'yamaha/mio-m3-5.jpg', 0),
(709, 2, 'yamaha/mio-m3-6.jpg', 0),
(710, 2, 'yamaha/mio-m3-7.jpg', 0),
(711, 2, 'yamaha/mio-m3-8.jpg', 0),
(712, 2, 'yamaha/mio-m3-9.jpg', 0),
(713, 51, 'yamaha/mt07-1.jpg', 1),
(714, 51, 'yamaha/mt07-2.jpg', 0),
(715, 51, 'yamaha/mt07-3.jpg', 0),
(716, 53, 'yamaha/mt09-1.jpg', 1),
(717, 53, 'yamaha/mt09-2.jpg', 0),
(718, 53, 'yamaha/mt09-3.jpg', 0),
(719, 35, 'yamaha/mt25-1.jpg', 1),
(720, 35, 'yamaha/mt25-2.jpg', 0),
(721, 16, 'yamaha/nmax155-1.jpg', 1),
(722, 16, 'yamaha/nmax155-2.jpg', 0),
(723, 16, 'yamaha/nmax155-3.jpg', 0),
(724, 16, 'yamaha/nmax155-4.jpg', 0),
(725, 16, 'yamaha/nmax155-5.jpg', 0),
(726, 71, 'yamaha/r1-1.jpg', 1),
(727, 71, 'yamaha/r1-2.jpg', 0),
(728, 96, 'yamaha/r1m-1.jpg', 1),
(729, 96, 'yamaha/r1m-2.jpg', 0),
(730, 96, 'yamaha/r1m-3.jpg', 0),
(731, 96, 'yamaha/r1m-4.jpg', 0),
(732, 96, 'yamaha/r1m-5.jpg', 0),
(733, 96, 'yamaha/r1m-6.jpg', 0),
(734, 96, 'yamaha/r1m-7.jpg', 0),
(735, 49, 'yamaha/r6-1.jpg', 1),
(736, 49, 'yamaha/r6-2.jpg', 0),
(737, 49, 'yamaha/r6-3.jpg', 0),
(738, 25, 'yamaha/r15-1.jpg', 1),
(739, 25, 'yamaha/r15-2.jpg', 0),
(740, 25, 'yamaha/r15-3.jpg', 0),
(741, 25, 'yamaha/r15-4.jpg', 0),
(742, 25, 'yamaha/r15-5.jpg', 0),
(743, 25, 'yamaha/r15-6.jpg', 0),
(744, 25, 'yamaha/r15-7.jpg', 0),
(745, 25, 'yamaha/r15-8.jpg', 0),
(746, 33, 'yamaha/r25-1.jpg', 1),
(747, 33, 'yamaha/r25-2.jpg', 0),
(748, 68, 'yamaha/tenere700-1.jpg', 1),
(749, 68, 'yamaha/tenere700-2.jpg', 0),
(750, 68, 'yamaha/tenere700-3.jpg', 0),
(751, 68, 'yamaha/tenere700-4.jpg', 0),
(752, 68, 'yamaha/tenere700-5.jpg', 0),
(753, 68, 'yamaha/tenere700-6.jpg', 0),
(754, 68, 'yamaha/tenere700-7.jpg', 0),
(755, 68, 'yamaha/tenere700-8.jpg', 0),
(756, 68, 'yamaha/tenere700-9.jpg', 0),
(757, 68, 'yamaha/tenere700-10.jpg', 0),
(758, 68, 'yamaha/tenere700-11.jpg', 0),
(759, 68, 'yamaha/tenere700-12.jpg', 0),
(760, 64, 'yamaha/tmaxdx-1.jpg', 1),
(761, 64, 'yamaha/tmaxdx-2.jpg', 0),
(762, 85, 'yamaha/vegaforce-1.jpg', 1),
(763, 85, 'yamaha/vegaforce-2.jpg', 0),
(764, 22, 'yamaha/vixion-1.jpg', 1),
(765, 22, 'yamaha/vixion-2.jpg', 0),
(766, 22, 'yamaha/vixion-3.jpg', 0),
(767, 28, 'yamaha/wr155r-1.jpg', 0),
(768, 28, 'yamaha/wr155r-2.jpg', 0),
(769, 37, 'yamaha/xmax-1.jpg', 1),
(770, 37, 'xmax-2.jpg', 0),
(771, 37, 'yamaha/xmax-3.jpg', 0),
(772, 37, 'yamaha/xmax-4.jpg', 0),
(773, 37, 'yamaha/xmax-5.jpg', 0),
(774, 20, 'yamaha/xsr-1.jpg', 1),
(775, 20, 'yamaha/xsr-2.jpg', 0),
(776, 20, 'yamaha/xsr-3.jpg', 0),
(777, 20, 'yamaha/xsr-4.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `umpan_balik`
--

CREATE TABLE `umpan_balik` (
  `id_umpan_balik` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nomor_telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `subjek` varchar(150) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `umpan_balik`
--

INSERT INTO `umpan_balik` (`id_umpan_balik`, `id_user`, `nama_lengkap`, `nomor_telepon`, `email`, `subjek`, `pesan`, `created_at`) VALUES
(2, 3, 'rai', '', 'rai@gmail.com', 'saran', 'tes123', '2026-06-21 17:43:48'),
(3, 3, 'raihan', '', 'rai@gmail.com', 'bug', 'tes123', '2026-06-22 17:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_profil` varchar(255) DEFAULT 'default.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reset_token` varchar(255) NOT NULL,
  `reset_token_expires` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `email`, `password`, `foto_profil`, `created_at`, `reset_token`, `reset_token_expires`) VALUES
(1, 'Budi Santoso', 'budi123', 'budi@example.com', '$2y$10$xyz...', 'default.png', '2026-06-21 11:31:15', '', NULL),
(3, 'raihan khairi adha', 'rai123', 'rai@gmail.com', '$2y$10$lhemFazzN6J2TaTqzIgLQek3FFq2TYy/Ln76eQng0v95Y75GGblMe', 'user_3_6a3964f5c330e_ninja-150ss-2.jpg', '2026-06-21 17:41:30', '', NULL),
(4, 'Budi Santoso', 'budis', 'budi@gmail.com', '$2y$10$tG40.8FXEDBBKOL7KN7boO8C1w4tmuxWvnMTO0Flscgfx9kpJl39u', 'default.png', '2026-06-22 17:54:27', '', NULL),
(5, 'Citra Lestari', 'citral', 'citra@gmail.com', '$2y$10$fK0o2GFYIPDG3RpAyB9LGuPQhHutp/PW5g5upvNBdrESoE5r9gXHe', 'default.png', '2026-06-22 17:54:27', 'dadf20273b5e9ffb64512687dc2405a03b13862a5b66e359a3fd64a2968e63b9a2a6dba96ea9f70188daf63b591039b64117', '2026-06-24 02:35:48'),
(6, 'Dedi Kurnia', 'dedik', 'dedi@gmail.com', '$2y$10$rTtXxrWVB.01PV6GrWNsQO7G6psriO74iFNNCjysososDJYeOn5f.', 'default.png', '2026-06-22 17:54:27', '003adf6bec2a172c5dbd7c0da8ceb22adb902721b8711848660567d5804e5205083c4cb07e12debd45b4317ec32302345d89', '2026-06-24 01:58:51'),
(7, 'Eka Putri', 'ekap', 'eka@gmail.com', '$2y$10$ZzdnluGxCQ1xb2mQ7LaXJeJjf0yVppfTSSNIfPSx52s3u7fWFSskq', 'default.png', '2026-06-22 17:54:27', '', NULL),
(8, 'Fajar Sidiq', 'fajars', 'fajar@gmail.com', '$2y$10$FiLPp74hwzPvsIiozWJ3Yeel2RJAlitpolPPolOvV8nTFYkzAYNBS', 'default.png', '2026-06-22 17:54:27', '', NULL),
(9, 'Gita Permata', 'gitap', 'gita@gmail.com', '32250170a0dca92d53ec9624f336ca24', 'default.png', '2026-06-22 17:54:27', '', NULL),
(10, 'Hendi Wijaya', 'hendiw', 'hendi@gmail.com', '32250170a0dca92d53ec9624f336ca24', 'default.png', '2026-06-22 17:54:27', '', NULL),
(11, 'Indah Sari', 'indahs', 'indah@gmail.com', '32250170a0dca92d53ec9624f336ca24', 'default.png', '2026-06-22 17:54:27', '', NULL),
(12, 'Joko Anwar', 'jokoa', 'joko@gmail.com', '32250170a0dca92d53ec9624f336ca24', 'default.png', '2026-06-22 17:54:27', '', NULL),
(14, 'vava', 'vava', 'vava@vava', '$2y$10$i0JJ00grsxhghXlw2yggt.lkp0jMqTDQt51rery4RKANk/v40Q.Ua', 'default.png', '2026-06-24 02:22:20', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_favorites`
--

CREATE TABLE `user_favorites` (
  `id_favorite` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_motor` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_favorites`
--

INSERT INTO `user_favorites` (`id_favorite`, `id_user`, `id_motor`, `created_at`) VALUES
(3, 3, 1, '2026-06-22 17:02:58'),
(6, 3, 17, '2026-06-22 17:03:12'),
(8, 3, 9, '2026-06-22 17:04:17'),
(9, 3, 13, '2026-06-22 17:04:21'),
(10, 3, 8, '2026-06-22 17:04:38'),
(11, 3, 18, '2026-06-22 17:04:51'),
(12, 3, 71, '2026-06-22 17:10:16'),
(13, 5, 71, '2026-06-24 01:40:12'),
(14, 7, 73, '2026-06-24 01:46:49'),
(15, 7, 83, '2026-06-24 01:46:51'),
(16, 7, 70, '2026-06-24 01:46:59'),
(17, 7, 91, '2026-06-24 01:47:00'),
(18, 3, 73, '2026-06-24 02:20:09'),
(19, 4, 70, '2026-06-24 02:21:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_motor_rating`
--

CREATE TABLE `user_motor_rating` (
  `id_rating` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_motor` int(11) NOT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` between 1 and 5),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_motor_rating`
--

INSERT INTO `user_motor_rating` (`id_rating`, `id_user`, `id_motor`, `rating`, `created_at`) VALUES
(8, 3, 91, 5, '2026-06-22 17:35:23'),
(11, 4, 91, 2, '2026-06-22 17:54:27'),
(14, 5, 91, 1, '2026-06-22 17:54:27'),
(17, 6, 91, 5, '2026-06-22 17:54:27'),
(20, 7, 91, 4, '2026-06-22 17:54:27'),
(23, 8, 91, 5, '2026-06-22 17:54:27'),
(26, 9, 91, 3, '2026-06-22 17:54:27'),
(29, 10, 91, 5, '2026-06-22 17:54:27'),
(32, 11, 91, 2, '2026-06-22 17:54:27'),
(35, 12, 91, 4, '2026-06-22 17:54:27'),
(36, 1, 93, 3, '2026-06-24 01:27:32'),
(37, 1, 53, 3, '2026-06-24 01:27:32'),
(38, 1, 94, 3, '2026-06-24 01:27:32'),
(39, 1, 31, 5, '2026-06-24 01:27:32'),
(40, 1, 61, 5, '2026-06-24 01:27:32'),
(41, 1, 54, 5, '2026-06-24 01:27:32'),
(42, 1, 40, 4, '2026-06-24 01:27:32'),
(43, 1, 36, 5, '2026-06-24 01:27:32'),
(44, 1, 88, 3, '2026-06-24 01:27:32'),
(45, 1, 100, 5, '2026-06-24 01:27:32'),
(46, 1, 46, 3, '2026-06-24 01:27:32'),
(47, 1, 13, 4, '2026-06-24 01:27:32'),
(48, 1, 82, 4, '2026-06-24 01:27:32'),
(49, 1, 30, 5, '2026-06-24 01:27:32'),
(50, 1, 21, 3, '2026-06-24 01:27:32'),
(51, 4, 33, 3, '2026-06-24 01:27:32'),
(52, 4, 55, 4, '2026-06-24 01:27:32'),
(53, 4, 11, 4, '2026-06-24 01:27:32'),
(54, 4, 6, 5, '2026-06-24 01:27:32'),
(55, 4, 34, 4, '2026-06-24 01:27:32'),
(56, 4, 74, 5, '2026-06-24 01:27:32'),
(57, 4, 16, 3, '2026-06-24 01:27:32'),
(58, 4, 2, 5, '2026-06-24 01:27:32'),
(59, 4, 54, 3, '2026-06-24 01:27:32'),
(60, 4, 77, 3, '2026-06-24 01:27:32'),
(61, 4, 100, 3, '2026-06-24 01:27:32'),
(62, 4, 22, 3, '2026-06-24 01:27:32'),
(63, 4, 94, 4, '2026-06-24 01:27:32'),
(64, 4, 73, 4, '2026-06-24 01:27:32'),
(65, 4, 93, 5, '2026-06-24 01:27:32'),
(66, 5, 83, 4, '2026-06-24 01:27:32'),
(67, 5, 22, 4, '2026-06-24 01:27:32'),
(68, 5, 71, 5, '2026-06-24 01:27:32'),
(69, 5, 33, 5, '2026-06-24 01:27:32'),
(70, 5, 36, 4, '2026-06-24 01:27:32'),
(71, 5, 53, 4, '2026-06-24 01:27:32'),
(72, 5, 50, 4, '2026-06-24 01:27:32'),
(73, 5, 88, 5, '2026-06-24 01:27:32'),
(74, 5, 13, 3, '2026-06-24 01:27:32'),
(75, 5, 74, 5, '2026-06-24 01:27:32'),
(76, 5, 69, 5, '2026-06-24 01:27:32'),
(77, 5, 85, 5, '2026-06-24 01:27:32'),
(78, 5, 27, 5, '2026-06-24 01:27:32'),
(79, 5, 58, 3, '2026-06-24 01:27:32'),
(80, 5, 23, 5, '2026-06-24 01:27:32'),
(81, 6, 99, 4, '2026-06-24 01:27:32'),
(82, 6, 28, 5, '2026-06-24 01:27:32'),
(83, 6, 18, 4, '2026-06-24 01:27:32'),
(84, 6, 54, 5, '2026-06-24 01:27:32'),
(86, 6, 97, 5, '2026-06-24 01:27:32'),
(87, 6, 90, 3, '2026-06-24 01:27:32'),
(88, 6, 84, 5, '2026-06-24 01:27:32'),
(89, 6, 39, 4, '2026-06-24 01:27:32'),
(90, 6, 66, 3, '2026-06-24 01:27:32'),
(91, 6, 19, 5, '2026-06-24 01:27:32'),
(92, 6, 30, 4, '2026-06-24 01:27:32'),
(93, 6, 80, 5, '2026-06-24 01:27:32'),
(94, 6, 25, 5, '2026-06-24 01:27:32'),
(95, 6, 76, 5, '2026-06-24 01:27:32'),
(97, 7, 9, 4, '2026-06-24 01:27:32'),
(98, 7, 49, 4, '2026-06-24 01:27:32'),
(99, 7, 94, 5, '2026-06-24 01:27:32'),
(100, 7, 16, 5, '2026-06-24 01:27:32'),
(101, 7, 41, 3, '2026-06-24 01:27:32'),
(102, 7, 82, 3, '2026-06-24 01:27:32'),
(103, 7, 83, 4, '2026-06-24 01:27:32'),
(104, 7, 54, 4, '2026-06-24 01:27:32'),
(105, 7, 22, 4, '2026-06-24 01:27:32'),
(106, 7, 29, 5, '2026-06-24 01:27:32'),
(107, 7, 11, 4, '2026-06-24 01:27:32'),
(108, 7, 32, 3, '2026-06-24 01:27:32'),
(109, 7, 46, 5, '2026-06-24 01:27:32'),
(110, 7, 47, 4, '2026-06-24 01:27:32'),
(111, 8, 24, 5, '2026-06-24 01:27:32'),
(112, 8, 32, 4, '2026-06-24 01:27:32'),
(113, 8, 48, 4, '2026-06-24 01:27:32'),
(114, 8, 41, 4, '2026-06-24 01:27:32'),
(115, 8, 93, 3, '2026-06-24 01:27:32'),
(116, 8, 58, 4, '2026-06-24 01:27:32'),
(117, 8, 83, 3, '2026-06-24 01:27:32'),
(118, 8, 33, 3, '2026-06-24 01:27:32'),
(119, 8, 98, 3, '2026-06-24 01:27:32'),
(120, 8, 28, 4, '2026-06-24 01:27:32'),
(121, 8, 30, 4, '2026-06-24 01:27:32'),
(122, 8, 88, 4, '2026-06-24 01:27:32'),
(123, 8, 52, 4, '2026-06-24 01:27:32'),
(124, 8, 87, 4, '2026-06-24 01:27:32'),
(125, 8, 38, 5, '2026-06-24 01:27:32'),
(126, 9, 42, 5, '2026-06-24 01:27:32'),
(127, 9, 88, 4, '2026-06-24 01:27:32'),
(128, 9, 57, 5, '2026-06-24 01:27:32'),
(129, 9, 58, 5, '2026-06-24 01:27:32'),
(130, 9, 79, 4, '2026-06-24 01:27:32'),
(131, 9, 92, 5, '2026-06-24 01:27:32'),
(132, 9, 48, 5, '2026-06-24 01:27:32'),
(133, 9, 64, 3, '2026-06-24 01:27:32'),
(134, 9, 98, 3, '2026-06-24 01:27:32'),
(135, 9, 31, 4, '2026-06-24 01:27:32'),
(136, 9, 61, 3, '2026-06-24 01:27:32'),
(137, 9, 40, 4, '2026-06-24 01:27:32'),
(138, 9, 96, 5, '2026-06-24 01:27:32'),
(139, 9, 30, 5, '2026-06-24 01:27:32'),
(140, 9, 22, 5, '2026-06-24 01:27:32'),
(141, 10, 79, 3, '2026-06-24 01:27:32'),
(142, 10, 78, 3, '2026-06-24 01:27:32'),
(143, 10, 26, 4, '2026-06-24 01:27:32'),
(144, 10, 35, 3, '2026-06-24 01:27:32'),
(145, 10, 7, 3, '2026-06-24 01:27:32'),
(146, 10, 5, 4, '2026-06-24 01:27:32'),
(147, 10, 94, 4, '2026-06-24 01:27:32'),
(148, 10, 83, 5, '2026-06-24 01:27:32'),
(149, 10, 45, 4, '2026-06-24 01:27:32'),
(150, 10, 37, 4, '2026-06-24 01:27:32'),
(151, 10, 42, 3, '2026-06-24 01:27:32'),
(152, 10, 68, 3, '2026-06-24 01:27:32'),
(153, 10, 100, 3, '2026-06-24 01:27:32'),
(154, 10, 8, 3, '2026-06-24 01:27:32'),
(155, 10, 89, 3, '2026-06-24 01:27:32'),
(156, 11, 85, 5, '2026-06-24 01:27:32'),
(157, 11, 7, 5, '2026-06-24 01:27:32'),
(158, 11, 83, 4, '2026-06-24 01:27:32'),
(159, 11, 26, 3, '2026-06-24 01:27:32'),
(160, 11, 11, 4, '2026-06-24 01:27:32'),
(161, 11, 81, 3, '2026-06-24 01:27:32'),
(162, 11, 65, 5, '2026-06-24 01:27:32'),
(163, 11, 58, 3, '2026-06-24 01:27:32'),
(164, 11, 15, 3, '2026-06-24 01:27:32'),
(165, 11, 101, 4, '2026-06-24 01:27:32'),
(166, 11, 82, 3, '2026-06-24 01:27:32'),
(167, 11, 73, 5, '2026-06-24 01:27:32'),
(168, 11, 74, 3, '2026-06-24 01:27:32'),
(169, 11, 10, 4, '2026-06-24 01:27:32'),
(170, 11, 33, 5, '2026-06-24 01:27:32'),
(171, 12, 89, 4, '2026-06-24 01:27:32'),
(172, 12, 27, 4, '2026-06-24 01:27:32'),
(173, 12, 39, 5, '2026-06-24 01:27:32'),
(174, 12, 75, 5, '2026-06-24 01:27:32'),
(175, 12, 8, 5, '2026-06-24 01:27:32'),
(176, 12, 23, 4, '2026-06-24 01:27:32'),
(177, 12, 41, 4, '2026-06-24 01:27:32'),
(178, 12, 30, 3, '2026-06-24 01:27:32'),
(179, 12, 94, 5, '2026-06-24 01:27:32'),
(180, 12, 7, 5, '2026-06-24 01:27:32'),
(181, 12, 51, 3, '2026-06-24 01:27:32'),
(182, 12, 5, 5, '2026-06-24 01:27:32'),
(183, 12, 100, 4, '2026-06-24 01:27:32'),
(184, 12, 54, 5, '2026-06-24 01:27:32'),
(185, 12, 36, 3, '2026-06-24 01:27:33'),
(186, 3, 7, 3, '2026-06-24 01:27:33'),
(187, 3, 22, 3, '2026-06-24 01:27:33'),
(189, 3, 85, 5, '2026-06-24 01:27:33'),
(190, 3, 101, 5, '2026-06-24 01:27:33'),
(191, 3, 33, 3, '2026-06-24 01:27:33'),
(192, 3, 87, 3, '2026-06-24 01:27:33'),
(193, 3, 75, 4, '2026-06-24 01:27:33'),
(194, 3, 62, 5, '2026-06-24 01:27:33'),
(195, 3, 60, 5, '2026-06-24 01:27:33'),
(196, 3, 80, 5, '2026-06-24 01:27:33'),
(197, 3, 14, 3, '2026-06-24 01:27:33'),
(198, 3, 86, 5, '2026-06-24 01:27:33'),
(199, 3, 19, 5, '2026-06-24 01:27:33'),
(200, 3, 13, 4, '2026-06-24 01:27:33'),
(201, 7, 71, 3, '2026-06-24 01:47:11'),
(202, 7, 56, 5, '2026-06-24 01:48:21'),
(203, 3, 73, 2, '2026-06-24 02:20:33'),
(206, 14, 27, 4, '2026-06-24 02:34:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id_motor`);

--
-- Indexes for table `motor_images`
--
ALTER TABLE `motor_images`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_motor` (`id_motor`);

--
-- Indexes for table `umpan_balik`
--
ALTER TABLE `umpan_balik`
  ADD PRIMARY KEY (`id_umpan_balik`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_favorites`
--
ALTER TABLE `user_favorites`
  ADD PRIMARY KEY (`id_favorite`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_motor` (`id_motor`);

--
-- Indexes for table `user_motor_rating`
--
ALTER TABLE `user_motor_rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD UNIQUE KEY `unique_user_motor_rating` (`id_user`,`id_motor`),
  ADD KEY `id_motor` (`id_motor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `motor`
--
ALTER TABLE `motor`
  MODIFY `id_motor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `motor_images`
--
ALTER TABLE `motor_images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=778;

--
-- AUTO_INCREMENT for table `umpan_balik`
--
ALTER TABLE `umpan_balik`
  MODIFY `id_umpan_balik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_favorites`
--
ALTER TABLE `user_favorites`
  MODIFY `id_favorite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_motor_rating`
--
ALTER TABLE `user_motor_rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `motor_images`
--
ALTER TABLE `motor_images`
  ADD CONSTRAINT `motor_images_ibfk_1` FOREIGN KEY (`id_motor`) REFERENCES `motor` (`id_motor`) ON DELETE CASCADE;

--
-- Constraints for table `umpan_balik`
--
ALTER TABLE `umpan_balik`
  ADD CONSTRAINT `umpan_balik_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `user_favorites`
--
ALTER TABLE `user_favorites`
  ADD CONSTRAINT `user_favorites_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_favorites_ibfk_2` FOREIGN KEY (`id_motor`) REFERENCES `motor` (`id_motor`) ON DELETE CASCADE;

--
-- Constraints for table `user_motor_rating`
--
ALTER TABLE `user_motor_rating`
  ADD CONSTRAINT `user_motor_rating_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_motor_rating_ibfk_2` FOREIGN KEY (`id_motor`) REFERENCES `motor` (`id_motor`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
