-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.9.0.6999
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table myapp.notes: ~5 rows (approximately)
INSERT INTO `notes` (`id`, `body`, `user_id`) VALUES
	(17, 'john example note', 1),
	(18, 'test', 1),
	(19, 'change testaaaaabbbb', 5),
	(20, 'baby notye', 10),
	(21, 'adasdads', 5);

-- Dumping data for table myapp.users: ~3 rows (approximately)
INSERT INTO `users` (`id`, `email`, `password`) VALUES
	(1, 'john@example.com', '$2y$10$mQ1G6H3GFl/YuFSCiKxiQ.FfOdiXLa0e0iloD.Glzuez5L3GLcy1S'),
	(5, 'gary@gmail.com', '$2y$10$tgQMbiGVIhmTPZQUXGowU.on0iRXnLP2x4rujfwiHeZ.ZKlyzpNt.'),
	(10, 'peter@example.com', '$2y$10$l/bXtOnt.n/.YqneSQ3MaO6CzCkld6cLL7K5njW7JgIVzIj0OlXMm');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
