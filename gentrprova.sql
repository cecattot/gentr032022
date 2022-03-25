/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `dangers`;
CREATE TABLE `dangers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acesso` varchar(150) NOT NULL,
  `ativo` varchar(1) DEFAULT 'S',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `role_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `phinxlog`;
CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `papel` varchar(50) NOT NULL,
  `ativo` varchar(1) DEFAULT 'S',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siape` varchar(20) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `password` varchar(250) NOT NULL,
  `ativo` varchar(1) DEFAULT 'S',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `role_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `siape` (`siape`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO `dangers` (`id`, `acesso`, `ativo`, `created`, `modified`, `role_id`) VALUES
(1, 'Users/index', 'S', '2022-03-10 21:51:03', '2022-03-11 07:33:02', '1');
INSERT INTO `dangers` (`id`, `acesso`, `ativo`, `created`, `modified`, `role_id`) VALUES
(2, 'Dangers/add', 'S', '2022-03-11 08:16:54', '2022-03-11 08:50:05', '1');
INSERT INTO `dangers` (`id`, `acesso`, `ativo`, `created`, `modified`, `role_id`) VALUES
(3, 'Dangers/index', NULL, '2022-03-11 08:19:07', '2022-03-11 08:19:07', '1');
INSERT INTO `dangers` (`id`, `acesso`, `ativo`, `created`, `modified`, `role_id`) VALUES
(5, 'Users/add', NULL, '2022-03-11 08:32:50', '2022-03-11 08:32:50', '1'),
(6, 'Dangers/edit', NULL, '2022-03-11 08:45:57', '2022-03-11 08:45:57', '1'),
(7, 'Users/edit', NULL, '2022-03-11 08:51:35', '2022-03-11 08:51:35', '1'),
(8, 'Roles/add', NULL, '2022-03-11 13:22:49', '2022-03-11 13:22:49', '1'),
(9, 'Users/index', NULL, '2022-03-11 14:49:21', '2022-03-11 14:49:21', '2'),
(10, 'Users/add', 'S', '2022-03-11 15:32:22', '2022-03-11 15:33:30', '2');

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20220310232434, 'CreateRoles', '2022-03-10 19:35:28', '2022-03-10 19:35:28', 0);
INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20220310232708, 'CreateUsers', '2022-03-10 19:35:28', '2022-03-10 19:35:28', 0);
INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20220310233503, 'CreateDangers', '2022-03-10 19:35:28', '2022-03-10 19:35:28', 0);

INSERT INTO `roles` (`id`, `papel`, `ativo`, `created`, `modified`) VALUES
(1, 'Super Administrador', 'S', '2022-03-10 19:45:09', '2022-03-10 19:45:09');
INSERT INTO `roles` (`id`, `papel`, `ativo`, `created`, `modified`) VALUES
(2, 'Usuário', 'S', '2022-03-11 13:24:05', '2022-03-11 13:24:05');


INSERT INTO `users` (`id`, `siape`, `nome`, `password`, `ativo`, `created`, `modified`, `role_id`) VALUES
(1, '333', 'Administrador', '$2y$10$YDsBntgfq15HryoVS7w2LO4sB4mAXJMyMckKwu2aFSYhnfuXojQeu', 'S', '2022-03-10 21:17:09', '2022-03-11 08:53:03', '1');
INSERT INTO `users` (`id`, `siape`, `nome`, `password`, `ativo`, `created`, `modified`, `role_id`) VALUES
(2, '111', 'Michel', '$2y$10$5r81oITyYLOI/kWoECm4depgjxdjJgCJ4YO6UfvBqmWLkQlIDCkuK', 'S', '2022-03-11 14:04:39', '2022-03-11 14:04:39', '2');
INSERT INTO `users` (`id`, `siape`, `nome`, `password`, `ativo`, `created`, `modified`, `role_id`) VALUES
(3, '222', 'Ferracini', '$2y$10$1ey47QDksyb21wH/eR1Wceb/w/5x5XbAbIr6/8NzJPwq/G0pwN/Ma', 'S', '2022-03-11 16:00:44', '2022-03-11 16:00:44', '2');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;