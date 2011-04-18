SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
CREATE DATABASE `capestools` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `capestools`;

CREATE TABLE `avaliacao` (
  `id`       int(11)                              NOT NULL AUTO_INCREMENT,
  `uf`       varchar(2)   COLLATE utf8_unicode_ci NOT NULL,
  `nome`     varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sigla`    varchar(15)  COLLATE utf8_unicode_ci NOT NULL,
  `programa` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nivel`    varchar(1)   COLLATE utf8_unicode_ci NOT NULL,
  `nota`     int(1)                               NOT NULL,
  `area`     int(11)                              NOT NULL,
  `ano`      int(4)                               NOT NULL,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Informação sobre a avaliação trienal da CAPES';
