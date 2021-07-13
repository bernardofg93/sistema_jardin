CREATE
DATABASE db_jrm_v1;
USE
db_jrm_v1;

CREATE TABLE `usuario`
(
    `id_usuario`    int(255) NOT NULL AUTO_INCREMENT,
    `nombre_us`     varchar(50)  DEFAULT NULL,
    `apellidos_us`  varchar(50)  DEFAULT NULL,
    `telefono_us`   varchar(20)  DEFAULT NULL,
    `rol`           varchar(10)  DEFAULT NULL,
    `email`         varchar(100) DEFAULT NULL,
    `password`      varchar(255) DEFAULT NULL,
    `fecha_alta_us` datetime     DEFAULT NULL,
    `fecha_baja_us` datetime     DEFAULT NULL,
    `status_us`     smallint(1) DEFAULT NULL,
    CONSTRAINT pk_usuario PRIMARY KEY (id_usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `paciente`
(
    `id_paciente`      int(255) NOT NULL AUTO_INCREMENT,
    `usuario_id`       int(255) NOT NULL,
    `fecha_alta_pa`    date        DEFAULT NULL,
    `hora_alta_pa`     time        DEFAULT NULL,
    `nombre_pa`        varchar(50) DEFAULT NULL,
    `apellido_paterno` varchar(50) DEFAULT NULL,
    `apellido_materno` varchar(50) DEFAULT NULL,
    `edad`             smallint(3) DEFAULT NULL,
    `sexo`             varchar(10) DEFAULT NULL,
    `escolaridad`      varchar(30) DEFAULT NULL,
    `fecha_nac`        varchar(15) DEFAULT NULL,
    `lugar_nacimiento` varchar(30) DEFAULT NULL,
    `nacionalidad`     varchar(20) DEFAULT NULL,
    `lugar_recidencia` varchar(35) DEFAULT NULL,
    `edo_civil`        varchar(30) DEFAULT NULL,
    `sit_laboral`      varchar(15) DEFAULT NULL,
    `religion`         varchar(30) DEFAULT NULL,
    `acudio`           varchar(50) DEFAULT NULL,
    `otro_acudio`      varchar(50) DEFAULT NULL,
    `status_paciente`  varchar(20) DEFAULT NULL,
    CONSTRAINT pk_paciente PRIMARY KEY (id_paciente),
    CONSTRAINT fk_paciente_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id_usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;;

CREATE TABLE expediente
(
    id_expediente  INT(255) NOT NULL AUTO_INCREMENT,
    no_expediente  varchar(20),
    paciente_id    INT(255) NOT NULL,
    fecha_alta_exp DATE,
    fecha_baja_exp DATE,
    CONSTRAINT pk_expediente PRIMARY KEY (id_expediente),
    CONSTRAINT fk_expediente_paciente FOREIGN KEY (paciente_id) REFERENCES paciente (id_paciente)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `entrevista`
(
    `id_entrevista`         int(255) NOT NULL AUTO_INCREMENT,
    `usuario_id`            int(255) NOT NULL,
    `paciente_id`           int(255) NOT NULL,
    `expediente_id`         int(255) NOT NULL,
    `como_llegaste`         varchar(100) DEFAULT NULL,
    `consumo_sustancia`     varchar(100) DEFAULT NULL,
    `consumo_frecuencia`    varchar(100) DEFAULT NULL,
    `inicio_consumo`        smallint(3) DEFAULT NULL,
    `porque_consumo`        varchar(100) DEFAULT NULL,
    `fam_ciudad`            varchar(2)   DEFAULT NULL,
    `fam_relacion`          varchar(100) DEFAULT NULL,
    `consideracion`         varchar(2)   DEFAULT NULL,
    `porque_consid`         varchar(100) DEFAULT NULL,
    `primera_vez`           varchar(2)   DEFAULT NULL,
    `veces_programa`        varchar(50)  DEFAULT NULL,
    `juntas`                varchar(2)   DEFAULT NULL,
    `recibo_informacion`    varchar(2)   DEFAULT NULL,
    `constancia_reunion`    varchar(2)   DEFAULT NULL,
    `fecha_alta_entrevista` date         DEFAULT NULL,
    `hora_alta_entrevista`  time         DEFAULT NULL,
    CONSTRAINT pk_entrevista PRIMARY KEY (id_entrevista),
    CONSTRAINT fk_entrevista_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id_usuario),
    CONSTRAINT fk_entrevista_paciente FOREIGN KEY (paciente_id) REFERENCES paciente (id_paciente),
    CONSTRAINT fk_entrevista_expediente FOREIGN KEY (expediente_id) REFERENCES expediente (id_expediente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `domicilio`
(
    `id_domicilio`    int(255) NOT NULL AUTO_INCREMENT,
    `paciente_id`     int(255) NOT NULL,
    `usuario_id`      int(255) NOT NULL,
    `expediente_id`   int(255) NOT NULL,
    `calle`           varchar(50) DEFAULT NULL,
    `numero`          varchar(20) DEFAULT NULL,
    `colonia`         varchar(20) DEFAULT NULL,
    `municipio`       varchar(20) DEFAULT NULL,
    `telefono`        varchar(20) DEFAULT NULL,
    `nombre_familiar` varchar(30) DEFAULT NULL,
    `telefono_fam`    varchar(30) DEFAULT NULL,
    `tipo_parentes`   varchar(20) DEFAULT NULL,
    `domicilio_fam`   varchar(50) DEFAULT NULL,
    CONSTRAINT pk_domicilio PRIMARY KEY (id_domicilio),
    CONSTRAINT fk_domicilio_paciente FOREIGN KEY (paciente_id) REFERENCES paciente (id_paciente),
    CONSTRAINT fk_domicilio_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id_usuario),
    CONSTRAINT fk_domicilio_expediente FOREIGN KEY (expediente_id) REFERENCES expediente (id_expediente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `consumo_sustancias`
(
    `id_consumo_sustancias` int(255) NOT NULL AUTO_INCREMENT,
    `paciente_id`           int(255) NOT NULL,
    `usuario_id`            int(255) NOT NULL,
    `expediente_id`         int(255) NOT NULL,
    `sustancia`             varchar(50) DEFAULT NULL,
    `frecuencia_uso`        varchar(20) DEFAULT NULL,
    `via_admin`             varchar(20) DEFAULT NULL,
    `edad_uso`              varchar(20) DEFAULT NULL,
    `actualmente`           varchar(20) DEFAULT NULL,
    `edad_sin_uso`          varchar(20) DEFAULT NULL,
    CONSTRAINT pk_consumo_sustancias PRIMARY KEY (id_consumo_sustancias),
    CONSTRAINT fk_consumo_sustancias_paciente FOREIGN KEY (paciente_id) REFERENCES paciente (id_paciente),
    CONSTRAINT fk_consumo_sustancias_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id_usuario),
    CONSTRAINT fk_consumo_sustancias_expediente FOREIGN KEY (expediente_id) REFERENCES expediente (id_expediente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `preguntas_consumo`
(
    `id_preguntas_consumo` int(255) NOT NULL AUTO_INCREMENT,
    `paciente_id`          int(255) NOT NULL,
    `usuario_id`           int(255) NOT NULL,
    `expediente_id`        int(255) NOT NULL,
    `intravenosa`          varchar(2)  DEFAULT NULL,
    `droga_impacto`        varchar(30) DEFAULT NULL,
    `num_trat`             smallint(6) DEFAULT NULL,
    `vih`                  varchar(2)  DEFAULT NULL,
    `sida`                 varchar(2)  DEFAULT NULL,
    `pr_tuberculosis`      varchar(2)  DEFAULT NULL,
    `hepatitis`            varchar(2)  DEFAULT NULL,
    `otras`                varchar(30) DEFAULT NULL,
    `certificado`          varchar(2)  DEFAULT NULL,
    `alguna_enf`           varchar(30) DEFAULT NULL,
    `lesion`               varchar(30) DEFAULT NULL,
    `descripcion_salud`    text        DEFAULT NULL,
    CONSTRAINT pk_preguntas_consumo PRIMARY KEY (id_preguntas_consumo),
    CONSTRAINT fk_preguntas_consumo_paciente FOREIGN KEY (paciente_id) REFERENCES paciente (id_paciente),
    CONSTRAINT fk_preguntas_consumo_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id_usuario),
    CONSTRAINT fk_preguntas_consumo_expediente FOREIGN KEY (expediente_id) REFERENCES expediente (id_expediente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE antecedentes_familiares
(
    id_antecedentes_familiares INT(255) NOT NULL AUTO_INCREMENT,
    `paciente_id`              int(255) NOT NULL,
    `usuario_id`               int(255) NOT NULL,
    `expediente_id`            int(255) NOT NULL,
    diabetes                   VARCHAR(20),
    hipertension               VARCHAR(20),
    tuberculosis               VARCHAR(20),
    cancer                     VARCHAR(20),
    cardiopatia                VARCHAR(20),
    asma                       VARCHAR(20),
    alergias                   VARCHAR(20),
    transtornos_neu            VARCHAR(20),
    transtornos_psi            VARCHAR(20),
    otro                       VARCHAR(20),
    CONSTRAINT pk_antecedentes_familiares PRIMARY KEY (id_antecedentes_familiares),
    CONSTRAINT fk_antecedentes_familiares_paciente FOREIGN KEY (paciente_id) REFERENCES paciente (id_paciente),
    CONSTRAINT fk_antecedentes_familiares_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id_usuario),
    CONSTRAINT fk_antecedentes_familiares_expediente FOREIGN KEY (expediente_id) REFERENCES expediente (id_expediente)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `antecedentes_no_patologicos`
(
    `id_antecedentes_no_pat` int(255) NOT NULL AUTO_INCREMENT,
    `paciente_id`            int(255) NOT NULL,
    `usuario_id`             int(255) NOT NULL,
    `expediente_id`          int(255) NOT NULL,
    `trabajo`                varchar(15) DEFAULT NULL,
    `ingreso_mensual`        varchar(25) DEFAULT NULL,
    `miembros_familia`       varchar(20) DEFAULT NULL,
    `personas_habitacion`    varchar(20) DEFAULT NULL,
    `mascotas`               varchar(15) DEFAULT NULL,
    `drenaje`                varchar(15) DEFAULT NULL,
    `agua`                   varchar(15) DEFAULT NULL,
    `tipo_alimentacion`      varchar(20) DEFAULT NULL,
    `pasatiempos`            varchar(50) DEFAULT NULL,
    `suenos`                 varchar(15) DEFAULT NULL,
    `inmunizacion`           varchar(15) DEFAULT NULL,
    `tipo_sanguineo`         varchar(50) DEFAULT NULL,
    CONSTRAINT pk_antecedentes_no_patologicos PRIMARY KEY (id_antecedentes_no_pat),
    CONSTRAINT fk_antecedentes_no_patologicos_paciente FOREIGN KEY (paciente_id) REFERENCES paciente (id_paciente),
    CONSTRAINT fk_antecedentes_no_patologicos_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id_usuario),
    CONSTRAINT fk_antecedentes_no_patologicos_expediente FOREIGN KEY (expediente_id) REFERENCES expediente (id_expediente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `antecedentes_patologicos`
(
    `id_antecedentes_patologicos` int(255) NOT NULL AUTO_INCREMENT,
    `paciente_id`                 int(255) NOT NULL,
    `usuario_id`                  int(255) NOT NULL,
    `expediente_id`               int(255) NOT NULL,
    `enf_congenitas`              varchar(50) DEFAULT NULL,
    `enf_infancia`                varchar(15) DEFAULT NULL,
    `traumatismos`                varchar(15) DEFAULT NULL,
    `inter_quirurgicas`           varchar(15) DEFAULT NULL,
    `alargias`                    varchar(15) DEFAULT NULL,
    `transfusiones`               varchar(10) DEFAULT NULL,
    `hospitalizaciones`           varchar(15) DEFAULT NULL,
    `tabaquismo`                  varchar(15) DEFAULT NULL,
    `alcoholismo`                 varchar(15) DEFAULT NULL,
    `toxicomanias`                varchar(15) DEFAULT NULL,
    CONSTRAINT pk_antecedentes_patologicos PRIMARY KEY (id_antecedentes_patologicos),
    CONSTRAINT fk_antecedentes_patologicos_paciente FOREIGN KEY (paciente_id) REFERENCES paciente (id_paciente),
    CONSTRAINT fk_antecedentes_patologicos_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id_usuario),
    CONSTRAINT fk_antecedentes_patologicos_expediente FOREIGN KEY (expediente_id) REFERENCES expediente (id_expediente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `inspeccion_general`
(
    `id_inspeccion_general` int(255) NOT NULL AUTO_INCREMENT,
    `paciente_id`           int(255) NOT NULL,
    `usuario_id`            int(255) NOT NULL,
    `expediente_id`         int(255) NOT NULL,
    `padecimiento`          varchar(25) DEFAULT NULL,
    `peso_ins`              varchar(10) DEFAULT NULL,
    `talla_ins`             varchar(10) DEFAULT NULL,
    `temperatura_ins`       varchar(10) DEFAULT NULL,
    `t_a`                   varchar(5)  DEFAULT NULL,
    `f_r`                   varchar(5)  DEFAULT NULL,
    `e_c`                   varchar(5)  DEFAULT NULL,
    `cabeza`                varchar(50) DEFAULT NULL,
    `oido`                  varchar(50) DEFAULT NULL,
    `nariz`                 varchar(50) DEFAULT NULL,
    `garganta`              varchar(50) DEFAULT NULL,
    `cuello`                varchar(50) DEFAULT NULL,
    `torax`                 varchar(50) DEFAULT NULL,
    `corazon`               varchar(50) DEFAULT NULL,
    `abdomen`               varchar(50) DEFAULT NULL,
    `genitales`             varchar(50) DEFAULT NULL,
    `extremidades`          varchar(50) DEFAULT NULL,
    `enfermedades_inf`      varchar(50) DEFAULT NULL,
    `otro_enf`              varchar(50) DEFAULT NULL,
    CONSTRAINT pk_inspeccion_general PRIMARY KEY (id_inspeccion_general),
    CONSTRAINT fk_inspeccion_general_paciente FOREIGN KEY (paciente_id) REFERENCES paciente (id_paciente),
    CONSTRAINT fk_inspeccion_general_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id_usuario),
    CONSTRAINT fk_inspeccion_general_expediente FOREIGN KEY (expediente_id) REFERENCES expediente (id_expediente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `evolucion_paciente`
(
    `id_evolucion_paciente` int(255) NOT NULL AUTO_INCREMENT,
    `paciente_id`           int(255) NOT NULL,
    `usuario_id`            int(255) NOT NULL,
    `expediente_id`         int(255) NOT NULL,
    `fecha_elaboracion`     date DEFAULT NULL,
    `nota_evolucion`        text DEFAULT NULL,
    CONSTRAINT pk_evolucion_paciente PRIMARY KEY (id_evolucion_paciente),
    CONSTRAINT fk_evolucion_paciente_paciente FOREIGN KEY (paciente_id) REFERENCES paciente (id_paciente),
    CONSTRAINT fk_evolucion_paciente_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id_usuario),
    CONSTRAINT fk_evolucion_paciente_expediente FOREIGN KEY (expediente_id) REFERENCES expediente (id_expediente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `motivo_egreso`
(
    id_motivo_egreso INT(255) NOT NULL AUTO_INCREMENT,
    `paciente_id`    int(255) NOT NULL,
    `usuario_id`     int(255) NOT NULL,
    `expediente_id`  int(255) NOT NULL,
    `motivo_egreso`  varchar(20) DEFAULT NULL,
    `fecha_egreso`   DATE NOT NULL,
    CONSTRAINT pk_motivo_egreso PRIMARY KEY (id_motivo_egreso),
    CONSTRAINT fk_motivo_egreso_paciente FOREIGN KEY (paciente_id) REFERENCES paciente (id_paciente),
    CONSTRAINT fk_motivo_egreso_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id_usuario),
    CONSTRAINT fk_motivo_egreso_expediente FOREIGN KEY (expediente_id) REFERENCES expediente (id_expediente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `egreso_autorizacion`
(
    `id_egreso_autorizacion` int(255) NOT NULL,
    `paciente_id`            int(255) NOT NULL,
    `usuario_id`             int(255) NOT NULL,
    `expediente_id`          int(255) NOT NULL,
    `resumen_anexo`          text DEFAULT NULL,
    `estado_salud`           text DEFAULT NULL,
    `prevencion_recaidas`    text DEFAULT NULL,
    `observaciones`          text DEFAULT NULL,
    CONSTRAINT pk_egreso_autorizacion PRIMARY KEY (id_egreso_autorizacion),
    CONSTRAINT fk_egreso_autorizacion_paciente FOREIGN KEY (paciente_id) REFERENCES paciente (id_paciente),
    CONSTRAINT fk_egreso_autorizacion_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id_usuario),
    CONSTRAINT fk_egreso_autorizacion_expediente FOREIGN KEY (expediente_id) REFERENCES expediente (id_expediente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;