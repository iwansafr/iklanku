SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP TABLE IF EXISTS `order_koran`;
CREATE TABLE `order_koran` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `media_id` int NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `image` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'foto iklan',
  `kode` varchar(255) NOT NULL,
  `tipe` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=adlips 60,2=spot 60, 3=time signal 60',
  `kolom` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1,2,3,7',
  `colour` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=full colour, 2=black white',
  `durasi` int NOT NULL,
  `masa` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=hari, 2=minggu, 3=bulan',
  `harga_dasar` int NOT NULL,
  `iklan` text NOT NULL,
  `total` int NOT NULL,
  `status_pembayaran` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=unconfirmed, 1=confirmed',
  `status_order` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=belum tayang,1=sudah tayang'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `order_koran`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `order_koran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
