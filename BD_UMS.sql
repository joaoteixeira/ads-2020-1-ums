-- Banco de Dados exclusivo do Users Management System
-- -----------------------------------------------------
DROP DATABASE IF EXISTS ums;
CREATE DATABASE IF NOT EXISTS `ums` DEFAULT CHARACTER SET latin1 ;
USE `ums` ;

-- -----------------------------------------------------
-- Table `ums`.`SGBD`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ums`.`SGBD` ;

CREATE TABLE IF NOT EXISTS `ums`.`SGBD` (
  `ID` INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT COMMENT 'Identificador do registro',
  `NOME` VARCHAR(45) NOT NULL COMMENT 'Nome do Sistema de Gerenciamento de Banco de Dados'
  ) ENGINE = INNODB;


-- -----------------------------------------------------
-- Table `ums`.`AMBIENTE`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ums`.`AMBIENTE` ;

CREATE TABLE IF NOT EXISTS `ums`.`AMBIENTE` (
  `ID` INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT COMMENT 'Identificador do registro',
  `NOME` VARCHAR(45) NOT NULL COMMENT 'Nome de identificação do ambiente',
  `SGBD_ID` INT UNSIGNED NOT NULL COMMENT 'Identificador do Sistema de Gerenciamento de Banco de Dados usado no ambiente',
  CONSTRAINT `FK_AMBIENTE_SGBD` FOREIGN KEY (`SGBD_ID`) REFERENCES `ums`.`SGBD` (`ID`)
  ) ENGINE = INNODB;


-- -----------------------------------------------------
-- Table `ums`.`GRUPO_USUARIO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ums`.`GRUPO_USUARIO` ;

CREATE TABLE IF NOT EXISTS `ums`.`GRUPO_USUARIO` (
  `ID` INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT COMMENT 'Identificador do registro de grupo de usuário',
  `NOME` VARCHAR(45) NOT NULL COMMENT 'Nome do grupo de usuários',
  `DESCRICAO` VARCHAR(100) NOT NULL COMMENT 'Descrição breve do grupo de usuários'
  ) ENGINE = INNODB;


-- -----------------------------------------------------
-- Table `ums`.`USUARIO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ums`.`USUARIO` ;

CREATE TABLE IF NOT EXISTS `ums`.`USUARIO` (
  `ID` INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT COMMENT 'Identificador do registro de usuário',
  `USER` VARCHAR(40) NOT NULL,
  `SENHA` VARCHAR(255) NOT NULL,
  `HOST` VARCHAR(40) NOT NULL,
  `GRUPO_USUARIO_ID` INT UNSIGNED NOT NULL,
  `STATUS` TINYINT(1) NOT NULL COMMENT 'Status do usuário criado, podendo ser : 0 - Inativo, 1 - Ativo, 2 - Excluído',
  `ULTIMA_ALTERACAO_SENHA` DATETIME NOT NULL COMMENT 'Data e hora da ultima alteração de senha',
  `CHAVE_ATUAL` VARCHAR(255) NOT NULL COMMENT 'Chave de criptgrafia de conexão usada atualmente por esse usuário',
  `CHAVE_ANTERIOR` VARCHAR(255) NULL COMMENT 'Ultima chave de criptografia de conexão utilizada por esse usuário',
  CONSTRAINT `FK_USUARIO_GRUPO_USUARIO` FOREIGN KEY (`GRUPO_USUARIO_ID`) REFERENCES `ums`.`GRUPO_USUARIO` (`ID`)
  ) ENGINE = INNODB;


-- -----------------------------------------------------
-- Table `ums`.`ACESSOS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ums`.`ACESSOS` ;

CREATE TABLE IF NOT EXISTS `ums`.`ACESSOS` (
  `ID` INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT COMMENT 'Identificador do acesso',
  `INICIO` DATETIME NOT NULL COMMENT 'Data a hora de criação do acesso',
  `FIM` DATETIME NULL COMMENT 'Data e hora de fim do acesso, em caso de exclusão',
  `ULTIMA_ALTERACAO` DATETIME NOT NULL COMMENT 'Data e hora da ultima alteração de acesso, em caso de ativação/inativação por exemplo',
  `STATUS` TINYINT(1) NOT NULL COMMENT 'Status do acesso, sendo: 0 - Inativo, 1 - Ativo, 2 - Excluído',
  `AMBIENTE_ID` INT UNSIGNED NOT NULL COMMENT 'Identificador do ambiente que foi concedido esse acesso',
  `USUARIO_ID` INT UNSIGNED NOT NULL COMMENT 'Identificador do usuário concedido esse acesso',
  `TEMPORARIO` TINYINT(1) NOT NULL COMMENT 'Validador para verificar se o acesso é temporário, caso seja será inativado na data prevista na coluna FIM',
  CONSTRAINT `FK_ACESSO_AMBIENTE` FOREIGN KEY (`AMBIENTE_ID`) REFERENCES `ums`.`AMBIENTE` (`ID`),
  CONSTRAINT `FK_ACESSO_USUARIO`  FOREIGN KEY (`USUARIO_ID`) REFERENCES `ums`.`USUARIO` (`ID`)
  ) ENGINE = INNODB;


-- -----------------------------------------------------
-- Table `ums`.`MAPA_PRIVIVEGIOS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ums`.`MAPA_PRIVIVEGIOS` ;

CREATE TABLE IF NOT EXISTS `ums`.`MAPA_PRIVIVEGIOS` (
  `ID` INT UNSIGNED PRIMARY KEY NOT NULL COMMENT 'Identificador do mapa de privilégios',
  `NOME` VARCHAR(10) NOT NULL COMMENT 'Nome do mapa de privilégios ou role do banco de dados atribuida',
  `CRIACAO` DATETIME NOT NULL COMMENT 'Data da criação do mapa de privilégios',
  `DATA_ULTIMA_ALTERACAO` DATETIME NOT NULL COMMENT 'Data da ultima alteração nesse mapa de privilégios',
  `EXCLUSAO` DATETIME NOT NULL COMMENT 'Data da exclusão desse mapa de privilégios',
  `STATUS` TINYINT(1) NOT NULL COMMENT 'Status do mapa de privilégios, sendo: 0 - Inativo, 1 - Ativo, 2 - Excluído'
  ) ENGINE = INNODB;


-- -----------------------------------------------------
-- Table `ums`.`TIPO_OBJETO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ums`.`TIPO_OBJETO` ;

CREATE TABLE IF NOT EXISTS `ums`.`TIPO_OBJETO` (
  `ID` INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT COMMENT 'Identificador do tipo de objeto do banco de dados',
  `NOME` VARCHAR(45) NOT NULL COMMENT 'Nome do tipo de objeto de banco de dados'
  ) ENGINE = INNODB;


-- -----------------------------------------------------
-- Table `ums`.`OBJETO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ums`.`OBJETO` ;

CREATE TABLE IF NOT EXISTS `ums`.`OBJETO` (
  `ID` INT UNSIGNED PRIMARY KEY NOT NULL COMMENT 'Identificador do objeto no banco de dados',
  `NOME` VARCHAR(45) NOT NULL COMMENT 'Nome do objeto do banco de dados',
  `TIPO_OBJETO_ID` INT UNSIGNED NOT NULL COMMENT 'Identificador do tipo de objeto do banco de dados',
  CONSTRAINT `FK_OBJETO_TIPO` FOREIGN KEY (`TIPO_OBJETO_ID`) REFERENCES `ums`.`TIPO_OBJETO` (`ID`)
  ) ENGINE = INNODB;


-- -----------------------------------------------------
-- Table `ums`.`PRIVILEGIO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ums`.`PRIVILEGIO` ;

CREATE TABLE IF NOT EXISTS `ums`.`PRIVILEGIO` (
  `ID` INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT COMMENT 'Identificador do privilégio',
  `NOME` VARCHAR(45) NOT NULL COMMENT 'Nome do privilégio'
  ) ENGINE = INNODB;


-- -----------------------------------------------------
-- Table `ums`.`OBJETO_MAPA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ums`.`OBJETO_MAPA` ;

CREATE TABLE IF NOT EXISTS `ums`.`OBJETO_MAPA` (
  `MAPA_PRIVILEGIO_ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `OBJETO_ID` INT UNSIGNED NOT NULL,
  `PRIVILEGIO_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`MAPA_PRIVILEGIO_ID`, `OBJETO_ID`, `PRIVILEGIO_ID`),
  CONSTRAINT `FK_OBJETO` FOREIGN KEY (`OBJETO_ID`) REFERENCES `ums`.`OBJETO` (`ID`),
  CONSTRAINT `FK_MAPA_PRIVILEGIO` FOREIGN KEY (`MAPA_PRIVILEGIO_ID`) REFERENCES `ums`.`MAPA_PRIVIVEGIOS` (`ID`),
  CONSTRAINT `FK_PRIVILEGIO` FOREIGN KEY (`PRIVILEGIO_ID`) REFERENCES `ums`.`PRIVILEGIO` (`ID`)
  ) ENGINE = INNODB;


-- -----------------------------------------------------
-- Table `ums`.`SGBD_PRIVILEGIOS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ums`.`SGBD_PRIVILEGIOS` ;

CREATE TABLE IF NOT EXISTS `ums`.`SGBD_PRIVILEGIOS` (
  `SGBD_ID` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador do Sistema de Gerenciamento de Banco de Dados',
  `PRIVILEGIO_ID` INT UNSIGNED NOT NULL COMMENT 'Identificador do privilégio possível nesse SGBD',
  PRIMARY KEY (`SGBD_ID`, `PRIVILEGIO_ID`),
  CONSTRAINT `FK_SGBD_PRIVILEGIO` FOREIGN KEY (`PRIVILEGIO_ID`) REFERENCES `ums`.`PRIVILEGIO` (`ID`),
  CONSTRAINT `FK_SGBD` FOREIGN KEY (`SGBD_ID`) REFERENCES `ums`.`SGBD` (`ID`)
  ) ENGINE = INNODB;


-- -----------------------------------------------------
-- Table `ums`.`USUARIO_MAPA_PRIVILEGIOS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ums`.`USUARIO_MAPA_PRIVILEGIOS` ;

CREATE TABLE IF NOT EXISTS `ums`.`USUARIO_MAPA_PRIVILEGIOS` (
  `MAPA_PRIVILEGIOS_ID` INT UNSIGNED NOT NULL COMMENT 'Identificador do mapa de privilégios vinculado ao usuário',
  `USUARIO_ID` INT UNSIGNED NOT NULL COMMENT 'Identificador do usuário vinculado ao mapa de privilégios',
  PRIMARY KEY (`MAPA_PRIVILEGIOS_ID`, `USUARIO_ID`),
  CONSTRAINT `FK_USUARIO_MAPA` FOREIGN KEY (`USUARIO_ID`) REFERENCES `ums`.`USUARIO` (`ID`),
  CONSTRAINT `FK_MAPA_USUARIO` FOREIGN KEY (`MAPA_PRIVILEGIOS_ID`) REFERENCES `ums`.`MAPA_PRIVIVEGIOS` (`ID`)
  ) ENGINE = INNODB;