<?php
require_once '../models/paciente.php';
require_once '../config/db.php';
require_once '../helpers/utils.php';

$paciente_id = isset($_GET['idP']) ? filter_var($_GET['idP'], FILTER_VALIDATE_INT) : false;
$domicilio_id = isset($_GET['idD']) ? filter_var($_GET['idD'], FILTER_VALIDATE_INT) : false;
//data ingreso
$ing = Utils::getIngreso($paciente_id);
//data domicilio
$dom = Utils::getDomicilio($paciente_id);
?>

<style type="text/css">
    .list-ing {
        list-style: none;
    }
</style>


<page pageset='new' backtop="10mm" backbottom="10mm" backleft="" backright="">
    <page_header class="header">
        <h3>Procedimiento de Ingreso</h3>
    </page_header>
    <page_footer>
    </page_footer>
    <ul>
        <li>
            La información aquí manifestada va dirigida a los usuarios del
            CENTRO DE INTEGRACIÓN Y RECUPERACIÓN JARDÍN DE LAS MARIPOSAS, A.C.
        </li>
    </ul>
    <ul>
        <li>
            En caso de que el beneﬁciario directo no se encuentre en condiciones de brindar su consentimiento,
            es imprescindible que un familiar directo brinde su autorización para el inicio de este tratamiento.
        </li>
    </ul>

    <ul>
        <li>
            Nuestra institución ofrece un tratamiento basado en la NORMA OFICIAL MEXICANA NOM-028-SSA2-1999,
            PARA LA PREVENCIÓN, TRATAMIENTO Y CONTROL DE LAS ADICCIONES, obligatoria en todo el territorio
            nacional para los prestadores de servicios del Sistema Nacional de salud y en los establecimientos
            de los sectores público, social y privado que realicen alguna actividad relacionada con el
            control de las adicciones.
        </li>
    </ul>

    <ul>
        <li>
            Para ingresar al CENTRO DE INTEGRACIÓN Y RECUPERACIÓN JARDÍN DE LAS
            MARIPOSAS, A.C. el candidato (a) debe presentarse a una entrevista, donde se
            elabora una primera valoración, que incluye el llenado de un cuestionario
            sobre datos personales y motivos para recibir tratamiento.
        </li>
    </ul>


    <ul>
        <li>
            Posteriormente, el paciente recibirá una valoración física y psicológica que se integra al expediente
            personal
            de cada usuario, con el propósito de determinar las condiciones en las que se encuentra,
            y si es apto para recibir el tratamiento.
        </li>
    </ul>

    <ul>
        <li>
            Una vez aceptado, según sea el caso, por consumo de alcohol y/o sustancias psicoactivas,
            continuamos con la evaluación del médico responsable para iniciar su tratamiento,
            de acuerdo a las etapas del modelo de rehabilitación de CENTRO DE INTEGRACIÓN
            Y RECUPERACIÓN JARDÍN DE LAS MARIPOSAS, A.C. El cual
            comprende de las siguientes etapas:
        </li>
    </ul>

    <ul>
        <li>
            Primera etapa: Al ingresar se instala en el área de observación para
            iniciar el registro de su proceso evolutivo, regular su ciclo vigía,
            estabilidad alimenticia y emocional, este proceso tiene una duración
            de 10 a 15 días iniciando así su programa de rehabilitación hasta
            ﬁnalizar la primera etapa.
        </li>
    </ul>

    <ul>
        <li>
            Segunda etapa: Se le proporciona al paciente información general
            acerca del modelo de tratamiento para su rehabilitación en CENTRO
            DE INTEGRACIÓN Y RECUPERACIÓN JARDÍN DE LAS MARIPOSAS, A.C. Al internarlo a la comunidad terapéutica,
            reuniones de motivación, estudio, psicoterapia, el paciente conocerá el concepto básico de adicción como
            enfermedad e identiﬁcar las fases de la misma que son física, mental y emocional. Conocerá el programa de
            los 12 pasos y se guiará en su en su práctica diaria, conocerá el contenido y lo ejercitara sobre los 5
            conceptos básicos de la recuperación, (Admisión de la adicción, Análisis de la personalidad,
            restablecimiento de las relaciones interpersonales, dependencia de un poder superior y trabajando con
            otros), conceptos que serán parte para su recuperación durante esta etapa.
        </li>
    </ul>

    <ul>
        <li>
            Tercera etapa: seguimiento del programa a través de grupos externos A.A. y/o N.A. seguimiento del paciente.
            Consiste en animar a los pacientes que han concluido o no el tratamiento a que de manera frecuente se pongan
            en contacto personal con esta institución con el propósito en los primeros de reaﬁrmar los objetivos y
            revenir una recaída en la adicción activa.
            O también de manera posible y de acuerdo a la capacidad institucional estar en contacto con la organización
            y no dejar de practicar el programa.
            Complemento del tratamiento desarrollo por esta institución y consta de:
        </li>
    </ul>

    <ul>
        <li>
            Cien por ciento de autoayuda: Admisión de la adicción, que signiﬁca la derrota ante la enfermedad, ahí
            empieza la práctica de los 12 pasos que serán la guía de la recuperación metal y espiritual entra la misma
            comunidad de pacientes.
        </li>
    </ul>

    <ul>
        <li>
            Consejería individual: aprenderá a enfrentar la problemática de su diario vivir y analizar cuales son las
            mejores rutas para una vida en creciente mejoría en asesoría directa de un compañero con avances en el
            programa, así como opciones para practicar los 5 conceptos básicos de la recuperación en esta institución de
            rehabilitación e integración social.
        </li>
    </ul>

    <ul>
        <li>
            Psicólogo: (Apoyo externo voluntario) impartir pláticas con diferentes temas a una vez por semana.
        </li>
    </ul>

    <ul>
        <li>
            Servicios internos: El paciente se integrará al contexto de la institución atendiendo las diferentes
            actividades diarias, practicando sus relaciones interpersonales, en un ambiente de libertad religiosa se
            ofrecerá al paciente diferentes opciones de una alternativa espiritual.
        </li>
    </ul>

    <ul>
        <li>
            Talleres: Se desarrollan actividades de oﬁcio, artesanías y terapia ocupacional para apropiarlos de
            habilidades, disciplina y hábitos de un ambiente laboral, recreacional y cultural, se fomentan programas
            deportivos y culturales en condiciones externas.
        </li>
    </ul>

</page>


<page pageset='new' backtop="30mm" backbottom="10mm" backleft="" backright="">
    <page_header class="header">
        <h3>Identificación </h3>
        <div>
            <h3>Información general</h3>
        </div>
    </page_header>
    <page_footer>
    </page_footer>
    <ul class="list-ing">
        <li>
            Ficha de Identificación:
        </li>
    </ul>

    <ul class="list-ing">
        <li>
            <span style="font-weight: bold;">
                Fecha de ingreso:
            </span> <?= isset($ing) && is_object($ing) && $ing ? $ing->fecha_alta_pa : '' ?>
            <span style="font-weight: bold">
                 Hora de ingreso:
            </span> <?= isset($ing) && is_object($ing) && $ing ? $ing->hora_alta_pa : '' ?>
            <span style="font-weight: bold">
            No. de expediente:
            </span>
        </li>
    </ul>

    <ul class="list-ing">
        <li>
            <span style="font-weight: bold;">
            Nombre del paciente:
            </span> <?= isset($ing) && is_object($ing) && $ing ? $ing->nombre_pa : '' ?>
            <span style="font-weight: bold;">
            Sexo:
            </span> <?= isset($ing) && is_object($ing) && $ing ? $ing->sexo : '' ?>
            <span style="font-weight: bold;">
            Fecha de Nacimiento:
            </span> <?= isset($ing) && is_object($ing) && $ing ? $ing->fecha_nac : '' ?>
            <span style="font-weight: bold;">
            Escolaridad:
            </span> <?= isset($ing) && is_object($ing) && $ing ? $ing->escolaridad : '' ?>
        </li>
    </ul>

    <ul class="list-ing">
        <li>
            <span style="font-weight: bold;">
            Estado civil:
            </span> <?= isset($ing) && is_object($ing) && $ing ? $ing->edo_civil : '' ?>
            <span style="font-weight: bold;">
            Situación Laboral:
            </span> <?= isset($ing) && is_object($ing) && $ing ? $ing->sit_laboral : '' ?>
            <span style="font-weight: bold;">
            Religión:
            </span> <?= isset($ing) && is_object($ing) && $ing ? $ing->religion : '' ?>
        </li>
    </ul>

    <h4>Domicilio</h4>
    <ul class="list-ing">
        <li>
            <span style="font-weight: bold;">
            Calle:
            </span> <?= isset($dom) && is_object($dom) && $dom ? $dom->calle : '' ?>
            <span style="font-weight: bold;">
            Colonia:
            </span> <?= isset($dom) && is_object($dom) && $dom ? $dom->colonia : '' ?>
            <span style="font-weight: bold;">
            Número:
            </span> <?= isset($dom) && is_object($dom) && $dom ? $dom->numero : '' ?>
            <span style="font-weight: bold;">
            Municipio:
            </span> <?= isset($dom) && is_object($dom) && $dom ? $dom->municipio : '' ?>
            <span style="font-weight: bold;">
            Teléfono:
            </span> <?= isset($dom) && is_object($dom) && $dom ? $dom->telefono : '' ?>
        </li>
    </ul>
    <ul class="list-ing">
        <li>
            <span style="font-weight: bold;">
            Nombre del familiar:
            </span>
            <span style="font-weight: bold;"> <?= isset($dom) && is_object($dom) && $dom ? $dom->nombre_familiar : '' ?>
            Teléfono del familiar:
            </span> <?= isset($dom) && is_object($dom) && $dom ? $dom->telefono_fam : '' ?>
        </li>
    </ul>

    <ul class="list-ing">
        <li>
            <span style="font-weight: bold;">
            Tipo de parentesco:
            </span> <?= isset($dom) && is_object($dom) && $dom ? $dom->tipo_parentes : '' ?>
            <span style="font-weight: bold;">
            Domicilio del familiar:
            </span> <?= isset($dom) && is_object($dom) && $dom ? $dom->domicilio_fam : '' ?>
        </li>
    </ul>

    <p style="font-weight: bold;">Acudió a esta institución: </p>
    <ul class="list-ing">
        <li>
            <?= isset($ing) && is_object($ing) && $ing ? $ing->acudio : '' ?>
        </li>
    </ul>

</page>