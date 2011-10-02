SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `caja` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `caja` ;

-- -----------------------------------------------------
-- Table `caja`.`bancos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caja`.`bancos` (
  `id` CHAR(36) NOT NULL ,
  `denominacion_banco` VARCHAR(45) NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caja`.`cuentas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caja`.`cuentas` (
  `id` CHAR(36) NOT NULL COMMENT '	' ,
  `numero` VARCHAR(15) NULL ,
  `cbu` VARCHAR(20) NULL ,
  `banco_id` CHAR(36) NOT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_cuentas_banco1` (`banco_id` ASC) ,
  CONSTRAINT `fk_cuentas_banco1`
    FOREIGN KEY (`banco_id` )
    REFERENCES `caja`.`bancos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caja`.`groups`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caja`.`groups` (
  `id` CHAR(36) NOT NULL ,
  `denominacion` VARCHAR(25) NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caja`.`responsables`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caja`.`responsables` (
  `id` CHAR(36) NOT NULL ,
  `apellido` VARCHAR(45) NULL ,
  `nombre` VARCHAR(45) NULL COMMENT '	' ,
  `tipo_responsable` VARCHAR(15) NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caja`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caja`.`users` (
  `id` CHAR(36) NOT NULL ,
  `username` VARCHAR(40) NULL ,
  `password` VARCHAR(40) NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  `group_id` CHAR(36) NOT NULL ,
  `responsable_id` CHAR(36) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_users_groups1` (`group_id` ASC) ,
  INDEX `fk_users_responsables1` (`responsable_id` ASC) ,
  CONSTRAINT `fk_users_groups1`
    FOREIGN KEY (`group_id` )
    REFERENCES `caja`.`groups` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_responsables1`
    FOREIGN KEY (`responsable_id` )
    REFERENCES `caja`.`responsables` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caja`.`cajas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caja`.`cajas` (
  `id` CHAR(36) NOT NULL ,
  `fecha` DATE NULL COMMENT '			' ,
  `total_aporte` DECIMAL(9,2) NULL ,
  `total_otro_ingreso` DECIMAL(8,2) NULL ,
  `total_ingreso` DECIMAL(9,2) NULL ,
  `total_cuenta_puente` DECIMAL(8,2) NULL ,
  `total_deposito_cheque` DECIMAL(9,2) NULL ,
  `total_deposito_efectivo` DECIMAL(9,2) NULL ,
  `total_moneda_extranjera` DECIMAL(8,2) NULL ,
  `total_reemplazo_valor` DECIMAL(8,2) NULL ,
  `total_egreso` DECIMAL(9,2) NULL ,
  `caja_id` CHAR(36) NULL ,
  `cuenta_id` CHAR(36) NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  `user_id` CHAR(36) NULL ,
  `tipo` VARCHAR(15) NULL ,
  `estado` VARCHAR(15) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_cajas_cajas1` (`caja_id` ASC) ,
  INDEX `fk_cajas_cuentas1` (`cuenta_id` ASC) ,
  INDEX `fk_cajas_users1` (`user_id` ASC) ,
  CONSTRAINT `fk_cajas_cajas1`
    FOREIGN KEY (`caja_id` )
    REFERENCES `caja`.`cajas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cajas_cuentas1`
    FOREIGN KEY (`cuenta_id` )
    REFERENCES `caja`.`cuentas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cajas_users1`
    FOREIGN KEY (`user_id` )
    REFERENCES `caja`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caja`.`detalle_recaudacions`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caja`.`detalle_recaudacions` (
  `id` CHAR(36) NOT NULL ,
  `ingreso` DECIMAL(8,2) NULL ,
  `egreso` DECIMAL(8,2) NULL ,
  `saldo_inicial` DECIMAL(9,2) NULL ,
  `saldo_final` DECIMAL(9,2) NULL ,
  `tipo` VARCHAR(15) NULL ,
  `caja_id` CHAR(36) NOT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_detalles_recaudacions_cajas1` (`caja_id` ASC) ,
  CONSTRAINT `fk_detalles_recaudacions_cajas1`
    FOREIGN KEY (`caja_id` )
    REFERENCES `caja`.`cajas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caja`.`operacions`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caja`.`operacions` (
  `id` CHAR(36) NOT NULL ,
  `responsable_id` CHAR(36) NULL ,
  `caja_id` CHAR(36) NOT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  `user_id` CHAR(36) NOT NULL ,
  `estado` VARCHAR(15) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_operacions_responsables1` (`responsable_id` ASC) ,
  INDEX `fk_operacions_cajas1` (`caja_id` ASC) ,
  INDEX `fk_operacions_users1` (`user_id` ASC) ,
  CONSTRAINT `fk_operacions_responsables1`
    FOREIGN KEY (`responsable_id` )
    REFERENCES `caja`.`responsables` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_operacions_cajas1`
    FOREIGN KEY (`caja_id` )
    REFERENCES `caja`.`cajas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_operacions_users1`
    FOREIGN KEY (`user_id` )
    REFERENCES `caja`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caja`.`plazas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caja`.`plazas` (
  `id` CHAR(36) NOT NULL COMMENT '	' ,
  `denominacion_plaza` VARCHAR(45) NULL ,
  `banco_id` CHAR(36) NOT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_plazas_banco1` (`banco_id` ASC) ,
  CONSTRAINT `fk_plazas_banco1`
    FOREIGN KEY (`banco_id` )
    REFERENCES `caja`.`bancos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caja`.`cheques`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caja`.`cheques` (
  `id` CHAR(36) NOT NULL ,
  `numero` CHAR(9) NULL ,
  `importe` DECIMAL(8,2) NULL ,
  `fecha_cobro` DATE NULL ,
  `fecha_limite` DATE NULL ,
  `estado` VARCHAR(10) NULL ,
  `tipo` VARCHAR(15) NULL ,
  `responsable_id` CHAR(36) NOT NULL ,
  `plaza_id` CHAR(36) NOT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  `descripcion` VARCHAR(10) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_cheques_responsables1` (`responsable_id` ASC) ,
  INDEX `fk_cheques_plazas1` (`plaza_id` ASC) ,
  CONSTRAINT `fk_cheques_responsables1`
    FOREIGN KEY (`responsable_id` )
    REFERENCES `caja`.`responsables` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cheques_plazas1`
    FOREIGN KEY (`plaza_id` )
    REFERENCES `caja`.`plazas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caja`.`cuenta_puentes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caja`.`cuenta_puentes` (
  `id` CHAR(36) NOT NULL ,
  `concepto` VARCHAR(45) NULL ,
  `importe` DECIMAL(8,2) NULL ,
  `fecha` DATE NULL ,
  `numero` INT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caja`.`movimientos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caja`.`movimientos` (
  `id` CHAR(36) NOT NULL ,
  `concepto` VARCHAR(45) NULL ,
  `importe` DECIMAL(8,2) NULL ,
  `nro_boleta` INT NULL COMMENT '				' ,
  `tipo` VARCHAR(15) NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  `operacion_id` CHAR(36) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_movimientos_operacions1` (`operacion_id` ASC) ,
  CONSTRAINT `fk_movimientos_operacions1`
    FOREIGN KEY (`operacion_id` )
    REFERENCES `caja`.`operacions` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caja`.`sellados`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caja`.`sellados` (
  `id` CHAR(36) NOT NULL ,
  `nro_prestamo` INT NULL ,
  `importe_prestamo` DECIMAL(8,2) NULL ,
  `movimiento_id` CHAR(36) NOT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_sellados_movimientos1` (`movimiento_id` ASC) ,
  CONSTRAINT `fk_sellados_movimientos1`
    FOREIGN KEY (`movimiento_id` )
    REFERENCES `caja`.`movimientos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caja`.`monedas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caja`.`monedas` (
  `id` CHAR(36) NOT NULL ,
  `nombre` VARCHAR(25) NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caja`.`cotizacions`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caja`.`cotizacions` (
  `id` CHAR(36) NOT NULL ,
  `fecha_desde` DATE NULL ,
  `fecha_hasta` DATE NULL ,
  `importe` DECIMAL(6,3) NULL ,
  `moneda_id` CHAR(36) NOT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_cotizacions_monedas1` (`moneda_id` ASC) ,
  CONSTRAINT `fk_cotizacions_monedas1`
    FOREIGN KEY (`moneda_id` )
    REFERENCES `caja`.`monedas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caja`.`efectivos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caja`.`efectivos` (
  `id` CHAR(36) NOT NULL ,
  `ajuste_cotizacion` DECIMAL(5,3) NULL ,
  `importe` DECIMAL(8,2) NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  `cotizacion_id` CHAR(36) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_efectivos_cotizacions1` (`cotizacion_id` ASC) ,
  CONSTRAINT `fk_efectivos_cotizacions1`
    FOREIGN KEY (`cotizacion_id` )
    REFERENCES `caja`.`cotizacions` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caja`.`flujos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caja`.`flujos` (
  `id` CHAR(36) NOT NULL ,
  `tipo` CHAR NULL ,
  `cheque_id` CHAR(36) NULL ,
  `efectivo_id` CHAR(36) NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  `operacion_id` CHAR(36) NOT NULL ,
  `cuenta_puente_id` CHAR(36) NULL ,
  `estado` VARCHAR(15) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_flujos_cajas_cheques1` (`cheque_id` ASC) ,
  INDEX `fk_flujos_cajas_efectivos1` (`efectivo_id` ASC) ,
  INDEX `fk_flujos_cajas_operacions1` (`operacion_id` ASC) ,
  INDEX `fk_flujos_cajas_cuentas_puentes1` (`cuenta_puente_id` ASC) ,
  CONSTRAINT `fk_flujos_cajas_cheques1`
    FOREIGN KEY (`cheque_id` )
    REFERENCES `caja`.`cheques` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_flujos_cajas_efectivos1`
    FOREIGN KEY (`efectivo_id` )
    REFERENCES `caja`.`efectivos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_flujos_cajas_operacions1`
    FOREIGN KEY (`operacion_id` )
    REFERENCES `caja`.`operacions` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_flujos_cajas_cuentas_puentes1`
    FOREIGN KEY (`cuenta_puente_id` )
    REFERENCES `caja`.`cuenta_puentes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caja`.`rechazos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caja`.`rechazos` (
  `id` CHAR(36) NOT NULL ,
  `fecha` DATE NULL ,
  `motivo` VARCHAR(25) NULL ,
  `comision` DECIMAL(8,2) NULL ,
  `cheque_id` CHAR(36) NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_rechazos_cheques1` (`cheque_id` ASC) ,
  CONSTRAINT `fk_rechazos_cheques1`
    FOREIGN KEY (`cheque_id` )
    REFERENCES `caja`.`cheques` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caja`.`autorizacions`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caja`.`autorizacions` (
  `id` CHAR(36) NOT NULL ,
  `flujos_id` CHAR(36) NOT NULL ,
  `users_id` CHAR(36) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_autorizacions_flujos1` (`flujos_id` ASC) ,
  INDEX `fk_autorizacions_users1` (`users_id` ASC) ,
  CONSTRAINT `fk_autorizacions_flujos1`
    FOREIGN KEY (`flujos_id` )
    REFERENCES `caja`.`flujos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_autorizacions_users1`
    FOREIGN KEY (`users_id` )
    REFERENCES `caja`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
