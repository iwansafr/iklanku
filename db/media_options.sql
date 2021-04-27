SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP TABLE IF EXISTS `media_options`;
CREATE TABLE `media_options` (
  `id` int NOT NULL,
  `tipe` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=posting,2=fotografi,3=admin handling, 4=add on',
  `par_id` int NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `media_options` (`id`, `tipe`, `par_id`, `title`) VALUES
(1, 1, 0, 'Feed'),
(2, 1, 0, 'Story'),
(3, 1, 0, 'Sorotan'),
(4, 2, 0, 'Venue'),
(5, 2, 0, 'Produk 10'),
(6, 2, 0, 'Promo'),
(7, 2, 0, 'Activity'),
(8, 3, 0, 'Comment'),
(9, 3, 0, 'Messaging'),
(10, 4, 0, 'Promoted'),
(11, 4, 0, 'Feed 3x'),
(12, 4, 0, 'Story'),
(13, 4, 0, 'Selebgram'),
(14, 4, 0, 'Lokal 1x'),
(15, 4, 0, 'National');


ALTER TABLE `media_options`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `media_options`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
