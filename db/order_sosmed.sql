SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP TABLE IF EXISTS `order_sosmed`;
CREATE TABLE `order_sosmed` (
  `id` int NOT NULL,
  `media_id` int NOT NULL,
  `user_id` int NOT NULL,
  `kode` varchar(255) NOT NULL,
  `durasi` tinyint(1) NOT NULL COMMENT 'bulan',
  `nama` varchar(255) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `ig` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `harga_dasar` int NOT NULL,
  `total` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `order_sosmed` (`id`, `media_id`, `user_id`, `kode`, `durasi`, `nama`, `hp`, `ig`, `alamat`, `harga_dasar`, `total`, `created`, `updated`) VALUES
(1, 33, 9, 'INV03202105020306339', 2, 'esoftgreat', '08868678', '@esoftgreat', 'kljfklsdj fkldajsfsklajfklf', 50000, 3000000, '2021-05-02 15:06:55', '2021-05-02 15:06:55'),
(2, 33, 9, 'INV03202105020309339', 1, 'esoftplay', '079798798', '@esoftplay', 'lsfjas lfjasldfjas lfjsda lfjsa', 50000, 1500000, '2021-05-02 15:09:54', '2021-05-02 15:09:54');


ALTER TABLE `order_sosmed`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `order_sosmed`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
