SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP TABLE IF EXISTS `order_radio`;
CREATE TABLE `order_radio` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `media_id` int NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `kode` varchar(255) NOT NULL,
  `tipe` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=adlips 60,2=spot 60, 3=time signal 60',
  `time` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=prime time , 2=regular time',
  `durasi` int NOT NULL,
  `masa` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=hari, 2=minggu, 3=bulan',
  `harga_dasar` int NOT NULL,
  `kategori` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=produk,2=usaha,3=event,4=kehilangan,5=lain-lain',
  `iklan` text NOT NULL,
  `total` int NOT NULL,
  `status_pembayaran` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=unconfirmed, 1=confirmed',
  `status_order` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=belum tayang,1=sudah tayang'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `order_radio`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `order_radio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
