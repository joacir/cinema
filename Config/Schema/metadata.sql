# Host: localhost  (Version 5.5.39)
# Date: 2019-04-04 09:28:18
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "ators"
#

DROP TABLE IF EXISTS `ators`;
CREATE TABLE `ators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for table "ators_filmes"
#

DROP TABLE IF EXISTS `ators_filmes`;
CREATE TABLE `ators_filmes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filme_id` int(11) DEFAULT NULL,
  `ator_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for table "generos"
#

DROP TABLE IF EXISTS `generos`;
CREATE TABLE `generos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for table "filmes"
#

DROP TABLE IF EXISTS `filmes`;
CREATE TABLE `filmes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `duracao` varchar(5) DEFAULT NULL,
  `idioma` varchar(50) DEFAULT NULL,
  `genero_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `filme_genero_fk` (`genero_id`),
  CONSTRAINT `filme_genero_fk` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for table "criticas"
#

DROP TABLE IF EXISTS `criticas`;
CREATE TABLE `criticas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `avaliacao` int(11) DEFAULT NULL,
  `data_avaliacao` date DEFAULT NULL,
  `filme_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `critica_filme_fk` (`filme_id`),
  CONSTRAINT `critica_filme_fk` FOREIGN KEY (`filme_id`) REFERENCES `filmes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for table "usuarios"
#

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `login` varchar(20) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
