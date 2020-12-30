SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id` int NOT NULL,
  `tipe` tinyint(1) NOT NULL COMMENT '1 = radio, 2 = koran',
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `tarif` int NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `media_iklan`;
CREATE TABLE `media_iklan` (
  `id` int NOT NULL,
  `media_id` int NOT NULL,
  `nama_media` varchar(255) NOT NULL,
  `alamat_media` varchar(255) NOT NULL,
  `biaya` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `jam_tayang` text NOT NULL,
  `durasi` int NOT NULL,
  `user_id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hp` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `media_iklan`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `media`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `media_iklan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
