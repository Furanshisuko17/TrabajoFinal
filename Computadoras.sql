-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema computadoras
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema computadoras
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `computadoras` DEFAULT CHARACTER SET utf8 ;
USE `computadoras` ;

-- -----------------------------------------------------
-- Table `computadoras`.`productos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `computadoras`.`productos` ;

CREATE TABLE IF NOT EXISTS `computadoras`.`productos` (
  `IDproductos` INT NOT NULL AUTO_INCREMENT,
  `tipoProducto` VARCHAR(45) NULL,
  `codigoProducto` INT NULL,
  PRIMARY KEY (`IDproductos`),
  UNIQUE INDEX `codigoProducto_index` (`codigoProducto` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `computadoras`.`procesadores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `computadoras`.`procesadores` ;

CREATE TABLE IF NOT EXISTS `computadoras`.`procesadores` (
  `IDprocesador` INT NOT NULL AUTO_INCREMENT,
  `marca` VARCHAR(15) NULL,
  `modelo` VARCHAR(15) NULL,
  `numeroModelo` VARCHAR(3) NULL,
  `serie` VARCHAR(10) NULL,
  `nucleos` SMALLINT(3) NULL,
  `velocidad` DECIMAL(4,2) NULL,
  `TDP` INT NULL,
  `graficos` TINYINT NULL,
  `nombreGraficos` VARCHAR(80) NULL,
  `precio` DECIMAL(15,2) NULL,
  `codigoProducto` INT NULL,
  `img` VARCHAR(100) NULL,
  PRIMARY KEY (`IDprocesador`),
  INDEX `codigoProducto_productos_foreignKey_idx` (`codigoProducto` ASC) VISIBLE,
  UNIQUE INDEX `codigoProducto_UNIQUE` (`codigoProducto` ASC) VISIBLE,
  CONSTRAINT `codigoProducto_productos_foreignKey`
    FOREIGN KEY (`codigoProducto`)
    REFERENCES `computadoras`.`productos` (`codigoProducto`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `computadoras`.`tarjetasmadre`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `computadoras`.`tarjetasmadre` ;

CREATE TABLE IF NOT EXISTS `computadoras`.`tarjetasmadre` (
  `IDtarjetamadre` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(70) NULL,
  `socket` VARCHAR(10) NULL,
  `factorForma` VARCHAR(15) NULL,
  `memoriaMaxima` SMALLINT NULL,
  `ranurasMemoria` TINYINT NULL,
  `precio` DECIMAL(15,2) NULL,
  `codigoProducto` INT NULL,
  `img` VARCHAR(100) NULL,
  `processorCompatible` VARCHAR(5) NULL,
  PRIMARY KEY (`IDtarjetamadre`),
  INDEX `codigoProducto_tarjetasmadre_foreignKey_idx` (`codigoProducto` ASC) VISIBLE,
  UNIQUE INDEX `codigoProducto_UNIQUE` (`codigoProducto` ASC) VISIBLE,
  CONSTRAINT `codigoProducto_tarjetasmadre_foreignKey`
    FOREIGN KEY (`codigoProducto`)
    REFERENCES `computadoras`.`productos` (`codigoProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `computadoras`.`tarjetasgraficas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `computadoras`.`tarjetasgraficas` ;

CREATE TABLE IF NOT EXISTS `computadoras`.`tarjetasgraficas` (
  `IDtarjetagrafica` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(80) NULL,
  `chipset` VARCHAR(45) NULL,
  `memoria` TINYINT NULL,
  `velocidadBase` SMALLINT NULL,
  `velocidadPotenciada` SMALLINT NULL,
  `longitud` SMALLINT NULL,
  `precio` DECIMAL(15,2) NULL,
  `codigoProducto` INT NULL,
  `img` VARCHAR(60) NULL,
  PRIMARY KEY (`IDtarjetagrafica`),
  INDEX `codigoProducto_tarjetasgraficas_foreignKey_idx` (`codigoProducto` ASC) VISIBLE,
  UNIQUE INDEX `codigoProducto_UNIQUE` (`codigoProducto` ASC) VISIBLE,
  CONSTRAINT `codigoProducto_tarjetasgraficas_foreignKey`
    FOREIGN KEY (`codigoProducto`)
    REFERENCES `computadoras`.`productos` (`codigoProducto`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `computadoras`.`rams`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `computadoras`.`rams` ;

CREATE TABLE IF NOT EXISTS `computadoras`.`rams` (
  `IDram` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `tipo` VARCHAR(10) NULL,
  `velocidad` SMALLINT NULL,
  `cantidadModulo` TINYINT NULL,
  `tamañoModulo` SMALLINT NULL,
  `precioGB` DECIMAL(6,3) NULL,
  `tiempos` VARCHAR(25) NULL,
  `precio` DECIMAL(15,2) NULL,
  `codigoProducto` INT NULL,
  `img` VARCHAR(60) NULL,
  PRIMARY KEY (`IDram`),
  UNIQUE INDEX `codigoProducto_UNIQUE` (`codigoProducto` ASC) VISIBLE,
  CONSTRAINT `codigoProducto_rams_foreignKey`
    FOREIGN KEY (`codigoProducto`)
    REFERENCES `computadoras`.`productos` (`codigoProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `computadoras`.`psus`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `computadoras`.`psus` ;

CREATE TABLE IF NOT EXISTS `computadoras`.`psus` (
  `IDpsu` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `factorForma` VARCHAR(10) NULL,
  `eficiencia` VARCHAR(15) NULL,
  `potencia` SMALLINT NULL,
  `modularidad` TINYINT NULL,
  `precio` DECIMAL(15,2) NULL,
  `codigoProducto` INT NULL,
  `img` VARCHAR(60) NULL,
  PRIMARY KEY (`IDpsu`),
  UNIQUE INDEX `codigoProducto_UNIQUE` (`codigoProducto` ASC) VISIBLE,
  CONSTRAINT `codigoProducto_psus_foreignKey`
    FOREIGN KEY (`codigoProducto`)
    REFERENCES `computadoras`.`productos` (`codigoProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `computadoras`;

DELIMITER $$

USE `computadoras`$$
DROP TRIGGER IF EXISTS `computadoras`.`procesadores_BEFORE_INSERT` $$
USE `computadoras`$$
CREATE DEFINER = CURRENT_USER TRIGGER `computadoras`.`procesadores_BEFORE_INSERT` BEFORE INSERT ON `procesadores` FOR EACH ROW
BEGIN
	INSERT INTO `computadoras`.`productos` (
		IDproductos,
		tipoProducto, 
		codigoProducto) 
	VALUES (
		NULL,
		"processor",
		new.codigoProducto
	);
END$$


USE `computadoras`$$
DROP TRIGGER IF EXISTS `computadoras`.`tarjetasmadre_BEFORE_INSERT` $$
USE `computadoras`$$
CREATE DEFINER = CURRENT_USER TRIGGER `computadoras`.`tarjetasmadre_BEFORE_INSERT` BEFORE INSERT ON `tarjetasmadre` FOR EACH ROW
BEGIN
	INSERT INTO `computadoras`.`productos` (
		IDproductos,
		tipoProducto, 
		codigoProducto) 
	VALUES (
		NULL,
		"motherboard",
		new.codigoProducto
	);
END$$


USE `computadoras`$$
DROP TRIGGER IF EXISTS `computadoras`.`tarjetasgraficas_BEFORE_INSERT` $$
USE `computadoras`$$
CREATE DEFINER = CURRENT_USER TRIGGER `computadoras`.`tarjetasgraficas_BEFORE_INSERT` BEFORE INSERT ON `tarjetasgraficas` FOR EACH ROW
BEGIN
INSERT INTO `computadoras`.`productos` (
		IDproductos,
		tipoProducto, 
		codigoProducto) 
	VALUES (
		NULL,
		"graphiccard",
		new.codigoProducto
	);
END$$


USE `computadoras`$$
DROP TRIGGER IF EXISTS `computadoras`.`rams_BEFORE_INSERT` $$
USE `computadoras`$$
CREATE DEFINER = CURRENT_USER TRIGGER `computadoras`.`rams_BEFORE_INSERT` BEFORE INSERT ON `rams` FOR EACH ROW
BEGIN
INSERT INTO `computadoras`.`productos` (
		IDproductos,
		tipoProducto, 
		codigoProducto) 
	VALUES (
		NULL,
		"ram",
		new.codigoProducto
	);
END$$


USE `computadoras`$$
DROP TRIGGER IF EXISTS `computadoras`.`psus_BEFORE_INSERT` $$
USE `computadoras`$$
CREATE DEFINER = CURRENT_USER TRIGGER `computadoras`.`psus_BEFORE_INSERT` BEFORE INSERT ON `psus` FOR EACH ROW
BEGIN
INSERT INTO `computadoras`.`productos` (
		IDproductos,
		tipoProducto, 
		codigoProducto) 
	VALUES (
		NULL,
		"psu",
		new.codigoProducto
	);
END$$


DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `computadoras`.`procesadores`
-- -----------------------------------------------------
START TRANSACTION;
USE `computadoras`;
INSERT INTO `computadoras`.`procesadores` (`IDprocesador`, `marca`, `modelo`, `numeroModelo`, `serie`, `nucleos`, `velocidad`, `TDP`, `graficos`, `nombreGraficos`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'AMD', 'Ryzen', '5', '5600X', 6, 3.7, 65, false, NULL, 796.95, 10923011, 'amd5600.jpg');
INSERT INTO `computadoras`.`procesadores` (`IDprocesador`, `marca`, `modelo`, `numeroModelo`, `serie`, `nucleos`, `velocidad`, `TDP`, `graficos`, `nombreGraficos`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'Intel', 'Core', 'i5', '11400F', 6, 2.6, 65, false, NULL, 570.89, 10309411, 'intel11400.jpg');
INSERT INTO `computadoras`.`procesadores` (`IDprocesador`, `marca`, `modelo`, `numeroModelo`, `serie`, `nucleos`, `velocidad`, `TDP`, `graficos`, `nombreGraficos`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'AMD', 'Ryzen', '9', '5900X', 12, 3.7, 105, false, NULL, 1490.45, 10023946, 'amd5900.jpg');
INSERT INTO `computadoras`.`procesadores` (`IDprocesador`, `marca`, `modelo`, `numeroModelo`, `serie`, `nucleos`, `velocidad`, `TDP`, `graficos`, `nombreGraficos`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'Intel', 'Core', 'i5', '12400', 6, 2.5, 65, true, 'Intel UHD Graphics 730', 670.51, 19303912, 'intel12400.jpg');
INSERT INTO `computadoras`.`procesadores` (`IDprocesador`, `marca`, `modelo`, `numeroModelo`, `serie`, `nucleos`, `velocidad`, `TDP`, `graficos`, `nombreGraficos`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'AMD', 'Threadripper', NULL, '3990X', 64, 2.9, 280, false, NULL, 31115.13, 11938593, 'amd3990X.jpg');
INSERT INTO `computadoras`.`procesadores` (`IDprocesador`, `marca`, `modelo`, `numeroModelo`, `serie`, `nucleos`, `velocidad`, `TDP`, `graficos`, `nombreGraficos`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'AMD', 'Ryzen', '9', '3950X', 16, 3.5, 105, false, NULL, 2900.24, 13849102, 'amd3950X.jpg');
INSERT INTO `computadoras`.`procesadores` (`IDprocesador`, `marca`, `modelo`, `numeroModelo`, `serie`, `nucleos`, `velocidad`, `TDP`, `graficos`, `nombreGraficos`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'Intel', 'Core', 'i9', '12900K', 16, 3.2, 125, true, 'Intel UHD Graphics 770', 2070.50, 12384290, 'intel12900K.jpg');
INSERT INTO `computadoras`.`procesadores` (`IDprocesador`, `marca`, `modelo`, `numeroModelo`, `serie`, `nucleos`, `velocidad`, `TDP`, `graficos`, `nombreGraficos`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'AMD', 'Ryzen', '5', '5600G', 6, 3.9, 65, true, 'Radeon Vega 7', 637.67, 13749102, 'amd5600G.jpg');
INSERT INTO `computadoras`.`procesadores` (`IDprocesador`, `marca`, `modelo`, `numeroModelo`, `serie`, `nucleos`, `velocidad`, `TDP`, `graficos`, `nombreGraficos`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'AMD', 'Ryzen', '5', '1600', 6, 3.2, 65, false, NULL, 983.39, 19231029, 'amd1600.jpg');
INSERT INTO `computadoras`.`procesadores` (`IDprocesador`, `marca`, `modelo`, `numeroModelo`, `serie`, `nucleos`, `velocidad`, `TDP`, `graficos`, `nombreGraficos`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'Intel', 'Core', 'i3', '12100F', 4, 3.3, 58, false, NULL, 421.56, 12389102, 'intel12100F.jpg');

COMMIT;


-- -----------------------------------------------------
-- Data for table `computadoras`.`tarjetasmadre`
-- -----------------------------------------------------
START TRANSACTION;
USE `computadoras`;
INSERT INTO `computadoras`.`tarjetasmadre` (`IDtarjetamadre`, `nombre`, `socket`, `factorForma`, `memoriaMaxima`, `ranurasMemoria`, `precio`, `codigoProducto`, `img`, `processorCompatible`) VALUES (DEFAULT, 'Asus TUF GAMING X570-PLUS', 'AM4', 'ATX', 128, 4, 784.10, 20394839, 'ASUSTUFGAMINGX570.jpg', 'AMD');
INSERT INTO `computadoras`.`tarjetasmadre` (`IDtarjetamadre`, `nombre`, `socket`, `factorForma`, `memoriaMaxima`, `ranurasMemoria`, `precio`, `codigoProducto`, `img`, `processorCompatible`) VALUES (DEFAULT, 'MSI MAG B550 TOMAHAWK', 'AM4', 'ATX', 128, 4, 610.69, 20391034, 'MSIMAGB550.jpg', 'AMD');
INSERT INTO `computadoras`.`tarjetasmadre` (`IDtarjetamadre`, `nombre`, `socket`, `factorForma`, `memoriaMaxima`, `ranurasMemoria`, `precio`, `codigoProducto`, `img`, `processorCompatible`) VALUES (DEFAULT, 'Gigabyte B660M DS3H DDR4', 'LGA1700', 'Micro ATX', 128, 4, 433.38, 29302944, 'GIGABYTEB660M.jpg', 'INTEL');
INSERT INTO `computadoras`.`tarjetasmadre` (`IDtarjetamadre`, `nombre`, `socket`, `factorForma`, `memoriaMaxima`, `ranurasMemoria`, `precio`, `codigoProducto`, `img`, `processorCompatible`) VALUES (DEFAULT, 'Asus ROG STRIX Z690-A GAMING WIFI D4', 'LGA1700', 'ATX', 128, 4, 1260.83, 29031930, 'ASUSROGSTRIXZ690A.jpg', 'INTEL');
INSERT INTO `computadoras`.`tarjetasmadre` (`IDtarjetamadre`, `nombre`, `socket`, `factorForma`, `memoriaMaxima`, `ranurasMemoria`, `precio`, `codigoProducto`, `img`, `processorCompatible`) VALUES (DEFAULT, 'Asus ROG STRIX B450-F GAMING II', 'AM4', 'ATX', 128, 4, 547.65, 22203012, 'ASUSROGSTRIXB450F.jpg', 'AMD');
INSERT INTO `computadoras`.`tarjetasmadre` (`IDtarjetamadre`, `nombre`, `socket`, `factorForma`, `memoriaMaxima`, `ranurasMemoria`, `precio`, `codigoProducto`, `img`, `processorCompatible`) VALUES (DEFAULT, 'Gigabyte B450M DS3H', 'AM4', 'Micro ATX', 64, 4, 256.04, 22301203, 'GIGABYTEB450M.jpg', 'AMD');
INSERT INTO `computadoras`.`tarjetasmadre` (`IDtarjetamadre`, `nombre`, `socket`, `factorForma`, `memoriaMaxima`, `ranurasMemoria`, `precio`, `codigoProducto`, `img`, `processorCompatible`) VALUES (DEFAULT, 'MSI Creator TRX40', 'sTRX4', 'EATX', 256, 8, 7718.89, 23123303, 'MSICREATORTRX40.jpg', 'AMD');
INSERT INTO `computadoras`.`tarjetasmadre` (`IDtarjetamadre`, `nombre`, `socket`, `factorForma`, `memoriaMaxima`, `ranurasMemoria`, `precio`, `codigoProducto`, `img`, `processorCompatible`) VALUES (DEFAULT, 'Gigabyte TRX40 AORUS XTREME', 'sTRX4', 'XL ATX', 256, 8, 6304.31, 23139405, 'GIGABYTETRX40.jpg', 'AMD');
INSERT INTO `computadoras`.`tarjetasmadre` (`IDtarjetamadre`, `nombre`, `socket`, `factorForma`, `memoriaMaxima`, `ranurasMemoria`, `precio`, `codigoProducto`, `img`, `processorCompatible`) VALUES (DEFAULT, 'MSI MEG Z690 GODLIKE', 'LGA1700', 'EATX', 128, 4, 4728.23, 20104044, 'MSIMEGGODLIKE.jpg', 'INTEL');
INSERT INTO `computadoras`.`tarjetasmadre` (`IDtarjetamadre`, `nombre`, `socket`, `factorForma`, `memoriaMaxima`, `ranurasMemoria`, `precio`, `codigoProducto`, `img`, `processorCompatible`) VALUES (DEFAULT, 'Asus ROG MAXIMUS Z690 EXTREME', 'LGA1700', 'EATX', 128, 4, 4334.20, 20102394, 'ASUSRGOMAXIMUSZ690.jpg', 'INTEL');
INSERT INTO `computadoras`.`tarjetasmadre` (`IDtarjetamadre`, `nombre`, `socket`, `factorForma`, `memoriaMaxima`, `ranurasMemoria`, `precio`, `codigoProducto`, `img`, `processorCompatible`) VALUES (DEFAULT, 'Asus ROG Maximus XIII Extreme', 'LGA1200', 'EATX', 128, 4, 3152.14, 21023003, 'ASUSROGMAXIMUSXIIIEXTREME.jpg', 'INTEL');

COMMIT;


-- -----------------------------------------------------
-- Data for table `computadoras`.`tarjetasgraficas`
-- -----------------------------------------------------
START TRANSACTION;
USE `computadoras`;
INSERT INTO `computadoras`.`tarjetasgraficas` (`IDtarjetagrafica`, `nombre`, `chipset`, `memoria`, `velocidadBase`, `velocidadPotenciada`, `longitud`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'EVGA XC GAMING', 'GeForce RTX 3060', 12, 1320, 1882, 202, 1702.26, 34040302, 'EVGAGEFORCERTX3060.jpg');
INSERT INTO `computadoras`.`tarjetasgraficas` (`IDtarjetagrafica`, `nombre`, `chipset`, `memoria`, `velocidadBase`, `velocidadPotenciada`, `longitud`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'MSI GAMING X', 'GeForce RTX 3060', 12, 1320, 1837, 276, 2077.36, 31239030, 'RTX3060.jpg');
INSERT INTO `computadoras`.`tarjetasgraficas` (`IDtarjetagrafica`, `nombre`, `chipset`, `memoria`, `velocidadBase`, `velocidadPotenciada`, `longitud`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'Gigabyte GAMING OC', 'GeForce RTX 3080 Ti', 12, 1365, 1770, 320, 4625.81, 34331939, 'RTX3080GIGABYTE.jpg');
INSERT INTO `computadoras`.`tarjetasgraficas` (`IDtarjetagrafica`, `nombre`, `chipset`, `memoria`, `velocidadBase`, `velocidadPotenciada`, `longitud`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'Asus STRIX GAMING OC', 'GeForce RTX 3090', 24, 1395, 1890, 318, 6334.09 , 34939103, 'ASUSGEFORCERXT3090.jpg');
INSERT INTO `computadoras`.`tarjetasgraficas` (`IDtarjetagrafica`, `nombre`, `chipset`, `memoria`, `velocidadBase`, `velocidadPotenciada`, `longitud`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'MSI Radeon VII 16G', 'Radeon VII', 16, 1400, 1750, 267, 2688.05, 39492903, 'MSIRADEONVII.jpg');
INSERT INTO `computadoras`.`tarjetasgraficas` (`IDtarjetagrafica`, `nombre`, `chipset`, `memoria`, `velocidadBase`, `velocidadPotenciada`, `longitud`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'MSI RADEON RX VEGA 64 8G', 'Radeon RX VEGA 64', 8, 1247, 1546, 280, 3493.93, 34198492, 'MSIRADEONRXVEGA.jpg');
INSERT INTO `computadoras`.`tarjetasgraficas` (`IDtarjetagrafica`, `nombre`, `chipset`, `memoria`, `velocidadBase`, `velocidadPotenciada`, `longitud`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'MSI GAMING X TRIO', 'Radeon RX 6900 XT', 16, 1825, 2340, 324, 3364.97, 35632000, 'MSIRADEONRX6900.jpg');
INSERT INTO `computadoras`.`tarjetasgraficas` (`IDtarjetagrafica`, `nombre`, `chipset`, `memoria`, `velocidadBase`, `velocidadPotenciada`, `longitud`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'MSI GAMING X', 'Radeon RX 6600 XT', 8, 1968, 2607, 277, 1504.32, 30340300, 'RX6600.jpg');
INSERT INTO `computadoras`.`tarjetasgraficas` (`IDtarjetagrafica`, `nombre`, `chipset`, `memoria`, `velocidadBase`, `velocidadPotenciada`, `longitud`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'EVGA FTW3 ULTRA GAMING', 'GeForce RTX 3090 Ti', 24, 1560, 1920, 300, 6009.46, 34013043, 'EVGARTX3090TI.jpg');
INSERT INTO `computadoras`.`tarjetasgraficas` (`IDtarjetagrafica`, `nombre`, `chipset`, `memoria`, `velocidadBase`, `velocidadPotenciada`, `longitud`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'Asus ROG STRIX GAMING OC', 'GeForce RTX 3070 Ti', 8, 1575, 1892, 318, 2691.96, 36234334, 'ASUSGEFORCERTX3070.jpg');

COMMIT;


-- -----------------------------------------------------
-- Data for table `computadoras`.`rams`
-- -----------------------------------------------------
START TRANSACTION;
USE `computadoras`;
INSERT INTO `computadoras`.`rams` (`IDram`, `nombre`, `tipo`, `velocidad`, `cantidadModulo`, `tamañoModulo`, `precioGB`, `tiempos`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'Corsair Vengeance LPX 16 GB', 'DDR4', 3200, 2, 8, 14.357, '16-18-18-36 ', 229.57, 44950305, 'CORSAIRVENGEANCE16GB.jpg');
INSERT INTO `computadoras`.`rams` (`IDram`, `nombre`, `tipo`, `velocidad`, `cantidadModulo`, `tamañoModulo`, `precioGB`, `tiempos`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'G.Skill Ripjaws V 16 GB', 'DDR4', 3200, 2, 8, 13.614, '16-18-18-38', 217.70, 43949405, 'GSKILLRIPJAWSV16GB.jpg');
INSERT INTO `computadoras`.`rams` (`IDram`, `nombre`, `tipo`, `velocidad`, `cantidadModulo`, `tamañoModulo`, `precioGB`, `tiempos`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'Corsair Vengeance 32 GB', 'DDR5', 5600, 2, 16, 27.229, '36-36-36-76', 870.90, 43013995, 'CORSAIRVENGEANCE32GB.jpg');
INSERT INTO `computadoras`.`rams` (`IDram`, `nombre`, `tipo`, `velocidad`, `cantidadModulo`, `tamañoModulo`, `precioGB`, `tiempos`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'Crucial Ballistix 16 GB', 'DDR4', 3200, 2, 8, 18.805, '16-18-18-36', 300.79, 45499495, 'CRUCIALBALLISTIX16GB.jpg');
INSERT INTO `computadoras`.`rams` (`IDram`, `nombre`, `tipo`, `velocidad`, `cantidadModulo`, `tamañoModulo`, `precioGB`, `tiempos`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'G.Skill Trident Z Neo 32 GB', 'DDR4', 3600, 2, 16, 19.794, '16-19-19-39 ', 633.37, 43894991, 'G.SKILLTRIDENZNEO.jpg');
INSERT INTO `computadoras`.`rams` (`IDram`, `nombre`, `tipo`, `velocidad`, `cantidadModulo`, `tamañoModulo`, `precioGB`, `tiempos`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'Kingston FURY Beast 32 GB', 'DDR5', 4800, 2, 16, 22.886, '36-38-38-74', 732.34, 49492855, 'KINGSTONFURYBEAST32GB.jpg');
INSERT INTO `computadoras`.`rams` (`IDram`, `nombre`, `tipo`, `velocidad`, `cantidadModulo`, `tamañoModulo`, `precioGB`, `tiempos`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'Corsair Dominator Platinum 128 GB', 'DDR4', 3200, 8, 16, 112.223, '16-18-18-36', 3483.73, 40030948, 'CORSAIRDOMINATORPLATINUM128GB.jpg');
INSERT INTO `computadoras`.`rams` (`IDram`, `nombre`, `tipo`, `velocidad`, `cantidadModulo`, `tamañoModulo`, `precioGB`, `tiempos`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'G.Skill Aegis 16 GB', 'DDR4', 3200, 2, 8, 13.606, '16-18-18-38', 217.70, 40039483, 'GSKILLAEGIS16GB.jpg');
INSERT INTO `computadoras`.`rams` (`IDram`, `nombre`, `tipo`, `velocidad`, `cantidadModulo`, `tamañoModulo`, `precioGB`, `tiempos`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'Kingston FURY Beast RGB 16 GB', 'DDR4', 3200, 2, 8, 15.594, '16-18-18-32', 249.37, 49399588, 'KINGSTONFURYBEASTRGB16GB.jpg');
INSERT INTO `computadoras`.`rams` (`IDram`, `nombre`, `tipo`, `velocidad`, `cantidadModulo`, `tamañoModulo`, `precioGB`, `tiempos`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'Corsair Vengeance LPX 8 GB', 'DDR4', 2400, 1, 8, 16.326, '16-16-16-36', 130.60, 43188393, 'CORSAIRVENGEANCELPX.jpg');
INSERT INTO `computadoras`.`rams` (`IDram`, `nombre`, `tipo`, `velocidad`, `cantidadModulo`, `tamañoModulo`, `precioGB`, `tiempos`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'PNY XLR8 16 GB', 'DDR4', 3200, 2, 8, 18.881, '16-18-18-32', 258.23, 43423565, 'PNYXLR816GB.jpg');

COMMIT;


-- -----------------------------------------------------
-- Data for table `computadoras`.`psus`
-- -----------------------------------------------------
START TRANSACTION;
USE `computadoras`;
INSERT INTO `computadoras`.`psus` (`IDpsu`, `nombre`, `factorForma`, `eficiencia`, `potencia`, `modularidad`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'Corsair RMx (2021)', 'ATX', '80+ Gold', 850, 2, 480.09, 51039942, 'CORSAIRRMX850W.jpg');
INSERT INTO `computadoras`.`psus` (`IDpsu`, `nombre`, `factorForma`, `eficiencia`, `potencia`, `modularidad`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'EVGA SuperNOVA GA', 'ATX', '80+ Gold', 850, 2, 376.05, 50303400, 'EVGASUPERNOVA.jpg');
INSERT INTO `computadoras`.`psus` (`IDpsu`, `nombre`, `factorForma`, `eficiencia`, `potencia`, `modularidad`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'Thermaltake Toughpower', 'ATX', '80+ Gold', 1500, 1, 2018.96, 50399193, 'THERMALTAKETOUGHPOWER1500W.jpg');
INSERT INTO `computadoras`.`psus` (`IDpsu`, `nombre`, `factorForma`, `eficiencia`, `potencia`, `modularidad`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'be quiet! Dark Power Pro 12', 'ATX', '80+ Titanium', 1500, 2, 1772.57, 59493002, 'bequietDARKPOWERPRO121500W.jpg');
INSERT INTO `computadoras`.`psus` (`IDpsu`, `nombre`, `factorForma`, `eficiencia`, `potencia`, `modularidad`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'Corsair HX', 'ATX', '80+ Gold', 750, 1, 1979.38, 54492933, 'CORSAIRHX750W80GOLD.jpg');
INSERT INTO `computadoras`.`psus` (`IDpsu`, `nombre`, `factorForma`, `eficiencia`, `potencia`, `modularidad`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'Corsair CV', 'ATX', '80+ Bronze', 650, 0, 419.28, 54949002, 'CORSAIRCV650W.jpg');
INSERT INTO `computadoras`.`psus` (`IDpsu`, `nombre`, `factorForma`, `eficiencia`, `potencia`, `modularidad`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'Cooler Master V SFX Gold', 'SFX', '80+ Gold', 850, 2, 553.72, 58948992, 'COOLERMASTERV850SFX.jpg');
INSERT INTO `computadoras`.`psus` (`IDpsu`, `nombre`, `factorForma`, `eficiencia`, `potencia`, `modularidad`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'Corsair CXF', 'ATX', '80+ Bronze', 550, 2, 257.24, 54939022, 'CORSAIRCX55FW.jpg');
INSERT INTO `computadoras`.`psus` (`IDpsu`, `nombre`, `factorForma`, `eficiencia`, `potencia`, `modularidad`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'Asus ROG Thor 1200P', 'ATX', '80+ Platinum', 1200, 2, 1344.42, 54920400, 'ASUSROGTHOR1200W.jpg');
INSERT INTO `computadoras`.`psus` (`IDpsu`, `nombre`, `factorForma`, `eficiencia`, `potencia`, `modularidad`, `precio`, `codigoProducto`, `img`) VALUES (DEFAULT, 'SeaSonic FOCUS Plus Gold', 'ATX', '80+ Gold', 650, 2, 475.02, 54903412, 'SEASONICFOCUSGOLD.jpg');

COMMIT;

