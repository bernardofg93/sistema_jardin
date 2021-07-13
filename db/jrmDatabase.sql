CREATE DATABASE db_soft_jrm

use db_soft_jrm;


CREATE TABLE `antecedentes_familiares` (
`id_antecedentes_familiares` int(255) AUTO_INCREMENT NOT NULL ,
`paciente_id` int(255) NOT NULL,
`enfermedad_familiar_id` int(255) NOT NULL,
`familiar_paciente_id` int(255) NOT NULL
CONSTRAINT pk_antecedentes_familiares PRIMARY KEY(id_antecedentes_familiares),
CONSTRAINT fk_antecedentes_familiares_paciente FOREIGN KEY (`paciente_id`) REFERENCES paciente,
CONSTRAINT fk_antecedentes_familiares_familiar_paciente FOREIGN KEY (`enfermedad_familiar_id`) REFERENCES enfermedad_familiar,
CONSTRAINT fk_antecedentes_familiares_familiar_paciente FOREIGN KEY (`enfermedad_familiar_id`) REFERENCES enfermedad_familiar,
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


  ADD KEY `fk_antecedentes_familiares_familiar_paciente` (`enfermedad_familiar_id`);
ALTER TABLE `antecedentes_familiares`
    ADD CONSTRAINT `fk_antecedentes_familiares_enfermedad_familiar` FOREIGN KEY (`enfermedad_familiar_id`) REFERENCES `enfermedad_familiar` (`id_enfermedad_familiar`),
  ADD CONSTRAINT `fk_antecedentes_familiares_familiar_paciente` FOREIGN KEY (`enfermedad_familiar_id`) REFERENCES `familiar_paciente` (`id_enfermedad_paciente`),
  ADD CONSTRAINT `fk_antecedentes_familiares_paciente` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id_paciente`)

-- AUTO_INCREMENT de la tabla `antecedentes_familiares`
--
ALTER TABLE `antecedentes_familiares`
    MODIFY `id_antecedentes_familiares` int(255) NOT NULL AUTO_INCREMENT;


CREATE TABLE `antecedentes_no_patologicos` (
                                               `id_antecedentes_no_pat` int(255) NOT NULL,
                                               `paciente_id` int(255) DEFAULT NULL,
                                               `trabajo` varchar(15) DEFAULT NULL,
                                               `ingreso_mensual` varchar(25) DEFAULT NULL,
                                               `miembros_familia` varchar(20) DEFAULT NULL,
                                               `personas_habitacion` varchar(20) DEFAULT NULL,
                                               `mascotas` varchar(15) DEFAULT NULL,
                                               `drenaje` varchar(15) DEFAULT NULL,
                                               `agua` varchar(15) DEFAULT NULL,
                                               `tipo_alimentacion` varchar(20) DEFAULT NULL,
                                               `pasatiempos` varchar(50) DEFAULT NULL,
                                               `suenos` varchar(15) DEFAULT NULL,
                                               `inmunizacion` varchar(15) DEFAULT NULL,
                                               `tipo_sanguineo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `antecedentes_no_patologicos`
    ADD PRIMARY KEY (`id_antecedentes_no_pat`),
  ADD KEY `fk_antecedentes_no_patologicos_paciente` (`paciente_id`);
ALTER TABLE `antecedentes_no_patologicos`
    ADD CONSTRAINT `fk_antecedentes_no_patologicos_paciente` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id_paciente`);



CREATE TABLE `antecedentes_patologicos` (
                                            `id_antecedentes_patologicos` int(255) NOT NULL,
                                            `paciente_id` int(255) NOT NULL,
                                            `enf_congenitas` varchar(50) DEFAULT NULL,
                                            `enf_infancia` varchar(15) DEFAULT NULL,
                                            `traumatismos` varchar(15) DEFAULT NULL,
                                            `inter_quirurgicas` varchar(15) DEFAULT NULL,
                                            `alargias` varchar(15) DEFAULT NULL,
                                            `transfusiones` varchar(10) DEFAULT NULL,
                                            `hospitalizaciones` varchar(15) DEFAULT NULL,
                                            `tabaquismo` varchar(15) DEFAULT NULL,
                                            `alcoholismo` varchar(15) DEFAULT NULL,
                                            `toxicomanias` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `antecedentes_patologicos`
    ADD PRIMARY KEY (`id_antecedentes_patologicos`),
  ADD KEY `fk_antecedentes_patologicos_paciente` (`paciente_id`);
ALTER TABLE `antecedentes_patologicos`
    MODIFY `id_antecedentes_patologicos` int(255) NOT NULL AUTO_INCREMENT;
ALTER TABLE `antecedentes_patologicos`
    ADD CONSTRAINT `fk_antecedentes_patologicos_paciente` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id_paciente`);



CREATE TABLE `consumo_sustancias` (
                                      `id_consumo_sustancias` int(255) NOT NULL,
                                      `paciente_id` int(255) NOT NULL,
                                      `sustancia` varchar(50) DEFAULT NULL,
                                      `frecuencia_uso` varchar(20) DEFAULT NULL,
                                      `via_admin` varchar(20) DEFAULT NULL,
                                      `edad_uso` varchar(20) DEFAULT NULL,
                                      `actualmente` varchar(20) DEFAULT NULL,
                                      `edad_sin_uso` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `consumo_sustancias`
    ADD PRIMARY KEY (`id_consumo_sustancias`),
  ADD KEY `fk_consumo_sustancias_paciente` (`paciente_id`);
ALTER TABLE `consumo_sustancias`
    MODIFY `id_consumo_sustancias` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
ALTER TABLE `consumo_sustancias`
    ADD CONSTRAINT `fk_consumo_sustancias_paciente` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id_paciente`);


CREATE TABLE `domicilio` (
  `id_domicilio` int(255) NOT NULL,
 `paciente_id` int(255) NOT NULL,
 `usuario_id` int(11) DEFAULT NULL,
 `calle` varchar(50) DEFAULT NULL,
 `numero` varchar(20) DEFAULT NULL,
 `colonia` varchar(20) DEFAULT NULL,
 `municipio` varchar(20) DEFAULT NULL,
 `telefono` varchar(20) DEFAULT NULL,
 `nombre_familiar` varchar(30) DEFAULT NULL,
 `telefono_fam` varchar(30) DEFAULT NULL,
 `tipo_parentes` varchar(20) DEFAULT NULL,
 `domicilio_fam` varchar(50) DEFAULT NULL>
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `domicilio`
    ADD PRIMARY KEY (`id_domicilio`),
  ADD KEY `fk_domicilio_paciente` (`paciente_id`);
ALTER TABLE `domicilio`
    MODIFY `id_domicilio` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
ALTER TABLE `domicilio`
    ADD CONSTRAINT `fk_domicilio_paciente` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id_paciente`);

CREATE TABLE `egreso` (
                          `id_egreso` int(255) NOT NULL,
                          `paciente_id` int(255) NOT NULL,
                          `motivo_egreso` varchar(20) DEFAULT NULL,
                          `fecha_egreso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `egreso`
    ADD PRIMARY KEY (`id_egreso`),
  ADD KEY `fk_egreso_paciente` (`paciente_id`)
ALTER TABLE `egreso`
    MODIFY `id_egreso` int(255) NOT NULL AUTO_INCREMENT;
ALTER TABLE `egreso`
    ADD CONSTRAINT `fk_egreso_paciente` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id_paciente`);


CREATE TABLE `egreso_autorizacion` (
                                       `id_egreso_autorizacion` int(255) NOT NULL,
                                       `paciente_id` int(255) NOT NULL,
                                       `resumen_anexo` text DEFAULT NULL,
                                       `estado_salud` text DEFAULT NULL,
                                       `prevencion_recaidas` text DEFAULT NULL,
                                       `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `egreso_autorizacion`
    ADD PRIMARY KEY (`id_egreso_autorizacion`),
  ADD KEY `fk_egreso_autorizacion_paciente` (`paciente_id`);
ALTER TABLE `egreso_autorizacion`
    MODIFY `id_egreso_autorizacion` int(255) NOT NULL AUTO_INCREMENT;
ALTER TABLE `egreso_autorizacion`
    ADD CONSTRAINT `fk_egreso_autorizacion_paciente` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id_paciente`);


CREATE TABLE `enfermedad_familiar` (
                                       `id_enfermedad_familiar` int(255) NOT NULL,
                                       `nombre_enf` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `enfermedad_familiar`
    ADD PRIMARY KEY (`id_enfermedad_familiar`);
ALTER TABLE `enfermedad_familiar`
    MODIFY `id_enfermedad_familiar` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;



CREATE TABLE `entrevista` (
                              `id_entrevista` int(255) NOT NULL,
                              `usuario_id` int(255) DEFAULT NULL,
                              `paciente_id` int(255) NOT NULL,
                              `como_llegaste` varchar(100) DEFAULT NULL,
                              `consumo_sustancia` varchar(100) DEFAULT NULL,
                              `consumo_frecuencia` varchar(100) DEFAULT NULL,
                              `inicio_consumo` smallint(3) DEFAULT NULL,
                              `porque_consumo` varchar(100) DEFAULT NULL,
                              `fam_ciudad` varchar(2) DEFAULT NULL,
                              `fam_relacion` varchar(100) DEFAULT NULL,
                              `consideracion` varchar(2) DEFAULT NULL,
                              `porque_consid` varchar(100) DEFAULT NULL,
                              `primera_vez` varchar(2) DEFAULT NULL,
                              `veces_programa` varchar(50) DEFAULT NULL,
                              `juntas` varchar(2) DEFAULT NULL,
                              `recibo_informacion` varchar(2) DEFAULT NULL,
                              `constancia_reunion` varchar(2) DEFAULT NULL,
                              `fecha_alta_entrevista` date DEFAULT NULL,
                              `hora_alta_entrevista` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `entrevista`
    ADD PRIMARY KEY (`id_entrevista`),
  ADD KEY `fk_entrevista_paciente` (`paciente_id`);
ALTER TABLE `entrevista`
    MODIFY `id_entrevista` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `entrevista`
    ADD CONSTRAINT `fk_entrevista_paciente` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id_paciente`);

CREATE TABLE `evolucion_paciente` (
                                      `id_evolucion_paciente` int(255) NOT NULL,
                                      `paciente_id` int(255) NOT NULL,
                                      `fecha_elaboracion` date DEFAULT NULL,
                                      `nota_evolucion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `evolucion_paciente`
    ADD PRIMARY KEY (`id_evolucion_paciente`),
  ADD KEY `fk_evolucion_paciente_paciente` (`paciente_id`);
ALTER TABLE `evolucion_paciente`
    MODIFY `id_evolucion_paciente` int(255) NOT NULL AUTO_INCREMENT;
ALTER TABLE `evolucion_paciente`
    ADD CONSTRAINT `fk_evolucion_paciente_paciente` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id_paciente`);


CREATE TABLE `familiar_paciente` (
                                     `id_enfermedad_paciente` int(255) NOT NULL,
                                     `nombre_familiar_pa` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `familiar_paciente`
    ADD PRIMARY KEY (`id_enfermedad_paciente`);

CREATE TABLE `inspeccion_general` (
                                      `id_inspeccion_general` int(255) NOT NULL,
                                      `paciente_id` int(255) NOT NULL,
                                      `padecimiento` varchar(25) DEFAULT NULL,
                                      `peso_ins` varchar(10) DEFAULT NULL,
                                      `talla_ins` varchar(10) DEFAULT NULL,
                                      `temperatura_ins` varchar(10) DEFAULT NULL,
                                      `t_a` varchar(5) DEFAULT NULL,
                                      `f_r` varchar(5) DEFAULT NULL,
                                      `e_c` varchar(5) DEFAULT NULL,
                                      `cabeza` varchar(50) DEFAULT NULL,
                                      `oido` varchar(50) DEFAULT NULL,
                                      `nariz` varchar(50) DEFAULT NULL,
                                      `garganta` varchar(50) DEFAULT NULL,
                                      `cuello` varchar(50) DEFAULT NULL,
                                      `torax` varchar(50) DEFAULT NULL,
                                      `corazon` varchar(50) DEFAULT NULL,
                                      `abdomen` varchar(50) DEFAULT NULL,
                                      `genitales` varchar(50) DEFAULT NULL,
                                      `extremidades` varchar(50) DEFAULT NULL,
                                      `enfermedades_inf` varchar(50) DEFAULT NULL,
                                      `otro_enf` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `inspeccion_general`
    ADD PRIMARY KEY (`id_inspeccion_general`),
  ADD KEY `fk_inspeccion_general_paciente` (`paciente_id`);
ALTER TABLE `inspeccion_general`
    MODIFY `id_inspeccion_general` int(255) NOT NULL AUTO_INCREMENT;
ALTER TABLE `inspeccion_general`
    ADD CONSTRAINT `fk_inspeccion_general_paciente` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id_paciente`);



CREATE TABLE `paciente` (
                            `id_paciente` int(255) NOT NULL,
                            `usuario_id` int(255) DEFAULT NULL,
                            `fecha_alta_pa` date DEFAULT NULL,
                            `hora_alta_pa` time DEFAULT NULL,
                            `nombre_pa` varchar(50) DEFAULT NULL,
                            `apellido_paterno` varchar(50) DEFAULT NULL,
                            `apellido_materno` varchar(50) DEFAULT NULL,
                            `edad` smallint(3) DEFAULT NULL,
                            `sexo` varchar(10) DEFAULT NULL,
                            `escolaridad` varchar(30) DEFAULT NULL,
                            `fecha_nac` varchar(15) DEFAULT NULL,
                            `lugar_nacimiento` varchar(30) DEFAULT NULL,
                            `nacionalidad` varchar(20) DEFAULT NULL,
                            `lugar_recidencia` varchar(35) DEFAULT NULL,
                            `edo_civil` varchar(30) DEFAULT NULL,
                            `sit_laboral` varchar(15) DEFAULT NULL,
                            `religion` varchar(30) DEFAULT NULL,
                            `acudio` varchar(50) DEFAULT NULL,
                            `otro_acudio` varchar(50) DEFAULT NULL,
                            `status_paciente` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
ALTER TABLE `paciente`
    ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `fk_paciente_usuario` (`usuario_id`);
ALTER TABLE `paciente`
    MODIFY `id_paciente` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
ALTER TABLE `paciente`
    ADD CONSTRAINT `fk_paciente_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);


CREATE TABLE `preguntas_consumo` (
                                     `id_preguntas_consumo` int(255) NOT NULL,
                                     `paciente_id` int(255) NOT NULL,
                                     `intravenosa` varchar(2) DEFAULT NULL,
                                     `droga_impacto` varchar(30) DEFAULT NULL,
                                     `num_trat` smallint(6) DEFAULT NULL,
                                     `vih` varchar(2) DEFAULT NULL,
                                     `sida` varchar(2) DEFAULT NULL,
                                     `pr_tuberculosis` varchar(2) DEFAULT NULL,
                                     `hepatitis` varchar(2) DEFAULT NULL,
                                     `otras` varchar(30) DEFAULT NULL,
                                     `certificado` varchar(2) DEFAULT NULL,
                                     `alguna_enf` varchar(30) DEFAULT NULL,
                                     `lesion` varchar(30) DEFAULT NULL,
                                     `descripcion_salud` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `preguntas_consumo`
    ADD PRIMARY KEY (`id_preguntas_consumo`),
  ADD KEY `fk_preguntas_consumo_paciente` (`paciente_id`);
ALTER TABLE `preguntas_consumo`
    MODIFY `id_preguntas_consumo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
ALTER TABLE `preguntas_consumo`
    ADD CONSTRAINT `fk_preguntas_consumo_paciente` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id_paciente`);
COMMIT;


CREATE TABLE `usuario` (
                           `id_usuario` int(255) NOT NULL,
                           `nombre_us` varchar(50) DEFAULT NULL,
                           `apellidos_us` varchar(50) DEFAULT NULL,
                           `telefono_us` varchar(20) DEFAULT NULL,
                           `rol` varchar(10) DEFAULT NULL,
                           `email` varchar(100) DEFAULT NULL,
                           `password` varchar(255) DEFAULT NULL,
                           `fecha_alta_us` datetime DEFAULT NULL,
                           `fecha_baja_us` datetime DEFAULT NULL,
                           `status_us` smallint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `usuario`
    ADD PRIMARY KEY (`id_usuario`);
ALTER TABLE `usuario`
    MODIFY `id_usuario` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;