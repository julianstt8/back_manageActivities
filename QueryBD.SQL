CREATE DATABASE manageactivities;

CREATE TABLE `manageactivities`.`mng_usuarios` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(100) NOT NULL,
  `contraseña` VARCHAR(100) NOT NULL,
  `nombre_completo` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_usuario`, `usuario`));

CREATE TABLE `manageactivities`.`mng_actividades` (
  `id_actividad` INT NOT NULL AUTO_INCREMENT,
  `id_usuario` INT NOT NULL,
  `descripcion` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id_actividad`),
  INDEX `fk_usuario_actividades_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_usuario_actividades`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `manageactivities`.`mng_usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE `manageactivities`.`mng_tiempos` (
  `id_tiempo` INT NOT NULL AUTO_INCREMENT,
  `id_actividad` INT NOT NULL,
  `fecha` DATE NOT NULL,
  `tiempo_gastado` INT NOT NULL,
  PRIMARY KEY (`id_tiempo`),
  INDEX `fk_actividad_tiempo_idx` (`id_actividad` ASC),
  CONSTRAINT `fk_actividad_tiempo`
    FOREIGN KEY (`id_actividad`)
    REFERENCES `manageactivities`.`mng_actividades` (`id_actividad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
