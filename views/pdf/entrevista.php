<?php
require_once '../models/paciente.php';
require_once '../models/entrevista.php';
require_once '../config/db.php';
require_once '../helpers/utils.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'] ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : false;
    $pac = Utils::getData($id);

    $ent = new Entrevista();
    $ent->setPacienteId($id);
    $obj = $ent->getOne();
}
?>


<style type="text/css">
    p {
        line-height: 18px;
        text-align: justify;
    }

    .subtitle {
        text-align: center;
        font-weight: bold;
    }

    .subtitles-b {
        font-weight: bold;
    }

    th {
        text-align: center;
        font-weight: normal;
    }

    th p {
        text-align: center;
    }

    .firma-d {
        text-align: center;
        margin-top: -12px;
    }

    .firma-line {
        margin-top: 50px;
    }

    .txt-top {
        margin-top: -15px;
    }

    .subtitle-c {
        font-size: 18px;
    }

    .txt-th {
        font-size: 10px;
    }

    .txt-none {
        color: #fff;
    }

</style>

<!-- PAGINA 1 !-->
<page pageset='new' backtop="10mm" backbottom="10mm" backleft="" backright="">
    <page_header class="header">
        <h3> Entrevista inicial</h3>
    </page_header>
    <page_footer>
    </page_footer>

    <div></div>
    <table>
        <thead>
        <tr>
            <th>Fecha Ingreso:</th>
            <th style="padding-left: 50px" ;>Hora Ingreso: <?= $pac->hora_alta_pa ?></th>
            <th style="padding-left: 50px" ;>No de expediente:</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
        </tr>
        </tbody>
    </table>

    <p>
        ¿Cómo llegaste aquí?
        <?= $obj->como_llegaste ?>
    </p>
    <p>
        ¿Qué sustancia consumes?
        <?= $obj->consumo_sustancia ?>
    </p>
    <p>
        ¿Con qué frecuencia consumes?
        <?= $obj->consumo_frecuencia ?>
    </p>
    <p>
        ¿A qué edad empezaste a consumirla?
        <?= $obj->inicio_consumo ?>
    </p>
    <p>
        ¿Por qué empezaste a consumir?
        <?= $obj->porque_consumo ?>
    </p>
    <p>
        ¿Tienes familiares en esta ciudad?
        <?= $obj->fam_ciudad ?>
    </p>
    <p>
        ¿Cómo es tu relación con ellos?
        <?= $obj->fam_relacion ?>
    </p>
    <p>
        ¿Consideras que este programa es bueno para ti?
        <?= $obj->consideracion ?>
    </p>
    <p>
        ¿Por qué?
        <?= $obj->porque_consid ?>
    </p>
    <p>
        ¿Es tu primera vez en un programa de rehabilitación?
        <?= $obj->primera_vez ?>
    </p>
    <p>
        ¿Cuántas veces has estado en un programa de rehabilitación?
        <?= $obj->veces_programa ?>
    </p>
    <p>
        ¿Participabas en las juntas?
        <?= $obj->juntas ?>
    </p>
    <p>
        ¿Recibiste información sobre la prevención de recaídas?
        <?= $obj->recibo_informacion ?>
    </p>
    <p>
        ¿Fuiste constante a las reuniones después de tu internamiento?
        <?= $obj->constancia_reunion ?>
    </p>
</page>
