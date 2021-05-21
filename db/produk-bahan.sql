SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP TABLE IF EXISTS `digital_print_bahan`;
CREATE TABLE `digital_print_bahan` (
  `id` int NOT NULL,
  `digi_ids` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `digital_print_bahan` (`id`, `digi_ids`, `title`, `harga`) VALUES
(1, ',1,2,', 'FLEXY CHINA 280 GR', 0),
(2, ',1,2,', 'FLEXY CHINA 340 GR', 0),
(3, ',1,2,', 'FLEXY CHINA 440 GR', 0),
(4, ',1,2,', 'FLEXY KOREA 440 GR', 0),
(5, ',1,2,', 'BACKLIGHT KOREA 440 GR', 0),
(6, ',2,3,', 'ALBATROS', 10000),
(7, ',3,', 'HVS 80 GR', 10000),
(8, ',3,', 'HVS 100 GR', 10000),
(9, ',3,', 'IVORY 230 GR', 10000),
(10, ',3,', 'IVORY 260 GR', 10000),
(11, ',3,', 'CTS 150 GR', 10000),
(12, ',4,', 'STIKER RITRAMA', 0),
(13, ',4,', 'STIKER RITRAMA BLACKOUT', 0),
(14, ',4,', 'STIKER GRAFTAC', 0),
(15, ',4,', 'STIKER ONE WAY VISION', 0),
(16, ',4,', 'STIKER ONE WAY VISION', 0),
(17, ',3,', 'CTS 120 GR', 10000);

DROP TABLE IF EXISTS `digital_print_produk`;
CREATE TABLE `digital_print_produk` (
  `id` int NOT NULL,
  `digi_ids` text NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `digital_print_produk` (`id`, `digi_ids`, `title`) VALUES
(1, ',1,', 'SPANDUK'),
(2, ',1,', 'BACKDROP'),
(3, ',1,2,', 'X-BANNER'),
(4, ',1,2,', 'ROLL BANNER'),
(5, ',1,', 'ROUND TEXT'),
(6, ',1,2,', 'BACKLIGHTED'),
(7, ',2,', 'BACKWALL'),
(8, ',3,', 'BROSUR'),
(9, ',3,', 'FLYER'),
(10, ',3,', 'POSTER'),
(11, ',3,', 'CUSTOM'),
(12, ',4,', 'STIKER OUTDOOR'),
(13, ',4,', 'STIKER INDOOR'),
(14, ',4,', 'STIKER ONE WAY'),
(15, ',4,', 'STIKER CUTTING');


ALTER TABLE `digital_print_bahan`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `digital_print_produk`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `digital_print_bahan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

ALTER TABLE `digital_print_produk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
