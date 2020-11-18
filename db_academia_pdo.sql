-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.13-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para db_academia_pdo
CREATE DATABASE IF NOT EXISTS `db_academia_pdo` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_academia_pdo`;

-- Copiando estrutura para tabela db_academia_pdo.alunos
CREATE TABLE IF NOT EXISTS `alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `matricula` varchar(45) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `telefone` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `data_inscricao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `peso` decimal(16,2) DEFAULT NULL,
  `altura` decimal(16,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela db_academia_pdo.alunos: ~20 rows (aproximadamente)
/*!40000 ALTER TABLE `alunos` DISABLE KEYS */;
INSERT INTO `alunos` (`id`, `nome`, `matricula`, `endereco`, `telefone`, `email`, `data_nascimento`, `data_inscricao`, `peso`, `altura`) VALUES
	(1, ' odenilson araujo', '969906', 'rua teste', '1111111111111111', 'odmarquesgm@gmail.com', '2020-11-18', '2020-11-16 16:09:17', 60.03, 1.60),
	(2, 'bianca maria', '896712', 'rua m, qd 12', '98981061009', 'bia@hotmail.com', '1990-06-15', '2020-11-14 20:42:43', 60.00, 1.67),
	(3, 'calebe', NULL, NULL, '(98) 9 8106-1009', 'calebe@hotmail.com', NULL, '2020-11-16 00:27:26', NULL, NULL),
	(4, 'leandro', NULL, NULL, '98981601009', 'leandro@gmail.com', NULL, '2020-11-16 00:33:08', NULL, NULL),
	(13, 'walderez marques', NULL, NULL, '(98) 9 8106-1009', 'waldams@hotmail.com', NULL, '2020-11-16 00:36:30', NULL, NULL),
	(14, 'gabs', NULL, NULL, '98999926891', 'gabsteste@gmail.com', NULL, '2020-11-16 00:36:54', NULL, NULL),
	(15, 'alandia kelly', NULL, NULL, '98981601005', 'alania@gmail.com', NULL, '2020-11-16 00:39:11', NULL, NULL);
/*!40000 ALTER TABLE `alunos` ENABLE KEYS */;


-- Copiando dados para a tabela db_academia_pdo.avaliacoes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `avaliacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliacoes` ENABLE KEYS */;

-- Copiando estrutura para tabela db_academia_pdo.avaliadores
CREATE TABLE IF NOT EXISTS `avaliadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `telefone` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela db_academia_pdo.avaliadores: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `avaliadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliadores` ENABLE KEYS */;

-- Copiando estrutura para tabela db_academia_pdo.avaliacoes
CREATE TABLE IF NOT EXISTS `avaliacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aluno_id` int(11) NOT NULL,
  `avaliador_id` int(11) NOT NULL,
  `data_avaliacao` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_avaliacoes_alunos` (`aluno_id`),
  KEY `FK_avaliacoes_avaliadores` (`avaliador_id`),
  CONSTRAINT `FK_avaliacoes_alunos` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_avaliacoes_avaliadores` FOREIGN KEY (`avaliador_id`) REFERENCES `avaliadores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Copiando estrutura para tabela db_academia_pdo.pagamentos
CREATE TABLE IF NOT EXISTS `pagamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aluno_id` int(11) NOT NULL,
  `valor` decimal(16,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pagamentos_alunos` (`aluno_id`),
  CONSTRAINT `FK_pagamentos_alunos` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela db_academia_pdo.pagamentos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pagamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagamentos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
