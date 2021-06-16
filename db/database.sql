CREATE DATABASE db_jrm;
USE db_jrm;

create table entrevista(
id_entrevista          int(255) auto_increment not null,
usuario_id             int(255)     null, 
como_llegaste          varchar(100) null,
consumo_sustancia      varchar(100) null,
consumo_frecuencia     varchar(100) null,
inicio_consumo         varchar(100) null,
porque_consumo         varchar(100) null,
fam_ciudad             varchar(100) null,
fam_relacion           varchar(100) null,
consideracion          varchar(100) null,
porque_consid          varchar(100) null,
primera_vez            varchar(100) null,
veces_programa         varchar(100) null,
juntas                 varchar(100) null,
recibo_informacion     varchar(100) null,
constancia_reunion     varchar(100) null,
fecha_alta_entrevista  date,
hora_alta_entrevista   time,
ent_status             smallint,       
CONSTRAINT pk_entrevista primary key(id_entrevista),
CONSTRAINT fk_entrevista_paciente foreign key(usuario_id) references paciente(id_paciente)
)ENGINE=INNODB;

create table usuario(
id_usuario     int(255) auto_increment not null,
nombre         varchar(50),
apellidos      varchar(50),
telefono       varchar(20),
rol            int,
email          varchar(100),
password       varchar(255),
fecha_alta     DATETIME,
fecha_baja     DATETIME,
status_us      varchar(10),
CONSTRAINT pk_usuario PRIMARY KEY(id_usuario)    
)ENGINE=INNODB;

create table antecedentes_familiares(
id_antecedentes_fam     int(255) auto_increment not null,
diabetes                varchar(10) null,
hipertension            varchar(10) null,
tuberculosis            varchar(10) null,
cancer                  varchar(10) null,
cardiopatias            varchar(10) null,
asma                    varchar(10) null,
alergias                varchar(10) null,
trans_neuronales        varchar(10) null,
trans_psiquiatricos     varchar(10) null,
otro                    varchar(15) null,
CONSTRAINT pk_antecedentes_familiares PRIMARY KEY(id_antecedentes_fam)
)ENGINE=INNODB;

create table antecedentes_no_patologicos(
id_antecedentes_no_pat      int(255) auto_increment not null,
trabajo                     varchar(15) null,
ingreso_mensual             varchar(25) null,
miembros_familia            varchar(20) null,
personas_habitacion         varchar(20) null,
mascotas                    varchar(15) null,
drenaje                     varchar(15) null,
agua                        varchar(15) null,
tipo_alimentacion           varchar(20) null,
pasatiempos                 varchar(50) null,
suenos                      varchar(15) null,
inmunizacion                varchar(15) null,
tipo_sanguineo              varchar(50) null,
CONSTRAINT pk_antecedentes_no_patologicos PRIMARY KEY(id_antecedentes_no_pat )
)ENGINE=INNODB;

create table antecedentes_patologicos(
id_antecedentes_pat int(255) auto_increment not null,
enf_congenitas      varchar(50) null,
enf_infancia        varchar(15) null,
traumatismos        varchar(15) null,
inter_quirurgicas   varchar(15) null,
alargias            varchar(15) null,
transfusiones       varchar(10) null,
hospitalizaciones   varchar(15) null,
tabaquismo          varchar(15) null,
alcoholismo         varchar(15) null,
toxicomanias        varchar(15) null,
CONSTRAINT pk_entecedentes_patologicos PRIMARY KEY(id_antecedentes_pat)
)ENGINE=INNODB;

create table inspeccion_general(
id_inspeccion       int(255) auto_increment not null,
padecimiento        varchar(50) null,
peso                varchar(10) null,
talla               varchar(10) null,
temperatura         varchar(10) null,
t_a                 varchar(10) null,
t_r                 varchar(10) null,
t_c                 varchar(10) null,
cabeza              varchar(50) null,
oido                varchar(50) null,
nariz               varchar(50) null,
garganta            varchar(50) null,
cuello              varchar(50) null,
torax               varchar(50) null, 
corazon             varchar(50) null,
abdomen             varchar(50) null,
genitales           varchar(50) null,
extremidades        varchar(50) null,
enfermedades_inf    varchar(50) null,
CONSTRAINT  pk_inspeccion_general PRIMARY KEY(id_inspeccion)
)ENGINE=INNODB;

create table domicilio(
id_domicilio    int(255) auto_increment not null,
calle           varchar(50) null,
numero          varchar(20) null,
colonia         varchar(20) null,
municipio       varchar(20) null,
telefono        varchar(20) null,
nombre_familiar varchar(30) null,
fam_pat         varchar(30) null,
fam_mat         varchar(30) null, 
telefono_fam    varchar(30) null,
tipo_parentes   varchar(20) null,
domicilio_fam   varchar(50) null,
CONSTRAINT pk_domicilio PRIMARY KEY(id_domicilio)
)ENGINE=INNODB;

create table paciente(
id_paciente           int(255) auto_increment not null,
usuario_id            int(255),
fecha_alta_pac        date,
hora_alta_pac         time,
nombre_pac                varchar(50) null,
apellido_paterno      varchar(50) null,
apellido_materno      varchar(50) null,
edad                  varchar(10) null,
sexo                  varchar(10) null,
escolaridad           varchar(30) null,
fecha_nac             varchar(10) null,
lugar                 varchar(20) null,
nacionalidad          varchar(20) null,
lugar_recidencia      varchar(25) null,
edo_civil             varchar(30) null,
sit_laboral           varchar(10) null,
religion              varchar(20) null,
acudio                varchar(50) null,
otro_acudio           varchar(50) null,
status_paciente       varchar(20),
img_paciente          varchar(255) null,
CONSTRAINT pk_paciente PRIMARY KEY(id_paciente),
CONSTRAINT fk_paciente_usuario FOREIGN KEY(usuario_id) REFERENCES usuario(id_usuario),
)ENGINE=INNODB;

create table ficha_egreso(
id_egreso               int(255) auto_increment not null,
paciente_id             int(255),
egreso_por              varchar(30) null,
resumen_anexo           text null,
estado_salud            text null,
prevencion_recaidas     text null,
observaciones           text null,
CONSTRAINT pk_ficha_egreso primary key(id_egreso),
CONSTRAINT fk_ficha_egreso_paciente FOREIGN KEY(paciente_id) REFERENCES paciente(id_paciente)
)ENGINE=INNODB;

create table consumo_sustancias(
id_consumo_sust         int(255) auto_increment not null,
paciente_id             int(255)    null,
sustancia               varchar(50) null,
frecuencia_uso          varchar(20) null,
via_admin               varchar(20) null,
edad_uso                varchar(20) null,
actualmente             varchar(20) null,
edad_sin_uso            varchar(20) null,
alguna_vez              varchar(10) null,
num_trat                varchar(10) null,
vih                     varchar(10) null,
sida                    varchar(10) null,
pr_tuberculosis         varchar(10) null,
hepatitis               varchar(10) null,
otras                   varchar(30) null,
certificado             varchar(10) null,
alguna_enf              varchar(10) null,
lesion                  varchar(10) null,
descripcion_salud       text null,
CONSTRAINT pk_consumo_sustancias PRIMARY KEY(id_consumo_sust),
CONSTRAINT fk_consumo_sustancias_paciente FOREIGN KEY(paciente_id) REFERENCES paciente(id_paciente)
)ENGINE=INNODB;

create table ingreso_paciente(
 id_ingreso_paciente    int(255) auto_increment not null,
 no_expediente          varchar(10) null,
 paciente_id            int(255),
 domicilio_id           int(255),
 ip_status              smallint,
 CONSTRAINT pk_ingreso_paciente PRIMARY KEY(id_ingreso_paciente),
 CONSTRAINT fk_ingreso_paciente_paciente FOREIGN KEY(paciente_id) REFERENCES paciente(id_paciente),
 CONSTRAINT fk_paciente_domicilio FOREIGN KEY(domicilio_id) REFERENCES domicilio(id_domicilio)
)ENGINE=INNODB;

create table egreso(
id_egreso              int(255) auto_increment not null,
paciente_id            int(255) null,
status_egreso          smallint null,
fecha_egreso           date null,
hora_egreso            time null, 
CONSTRAINT pk_egreso_paciente primary key(id_egreso),
CONSTRAINT fk_egreso_paciente_ingreso_paciente FOREIGN KEY(paciente_id) REFERENCES paciente(id_paciente)
)ENGINE=INNODB;

create table ficha_clinica(
id_ficha_clinica           int(255) auto_increment not null,
antecedentes_pat_id        int(255),
antecedentes_fam_id        int(255),
inspeccion_id              int(255),
usuario_id                 int(255), 
paciente_id                int(255),
antecedentes_no_pat_id     int(255),
fecha_alta_fclinica            date,
hora_alta_fclinica             time,
status_clinica          varchar(10),
CONSTRAINT pk_ficha_clinica PRIMARY KEY(id_ficha_clinica),
CONSTRAINT fk_ficha_clinica_antecedentes_patologicos FOREIGN KEY(antecedentes_pat_id) REFERENCES antecedentes_patologicos(id_antecedentes_pat),
CONSTRAINT fk_ficha_clinica_antecedentes_familiares  FOREIGN KEY(antecedentes_fam_id)  REFERENCES antecedentes_familiares(id_antecedentes_fam),
CONSTRAINT fk_ficha_clinica_inpeccion_general FOREIGN KEY(inspeccion_id ) REFERENCES inspeccion_general(id_inspeccion),
CONSTRAINT fk_ficha_clinica_usuario FOREIGN KEY(usuario_id) REFERENCES usuario(id_usuario),
CONSTRAINT fk_ficha_clinica_paciente FOREIGN KEY(paciente_id) REFERENCES paciente(id_paciente),
CONSTRAINT fk_ficha_clinica_antecedentes_no_patologicos FOREIGN KEY(antecedentes_no_pat_id) REFERENCES antecedentes_no_patologicos(id_antecedentes_no_pat)
)ENGINE=INNODB;

create table hoja_evolucion(
id_hoja_evolucion  int(255) auto_increment not null,
paciente_id        int(255),
nota_evolucion     text,
fecha_evolucion    date,
hora_evolucion     time,     
status_evolucion   smallint,
CONSTRAINT pk_hoja_evolucion primary key(id_hoja_evolucion),
CONSTRAINT hoja_evolucion_paciente foreign key(paciente_id) REFERENCES paciente(id_paciente)      
)ENGINE=INNODB;