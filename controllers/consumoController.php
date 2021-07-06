<?php
require_once 'models/paciente.php';
require_once 'models/consumo.php';
require_once 'models/preguntasConsumo.php';

class consumoController
{
    public function registro()
    {
        if (isset($_GET['id'])) {
            $id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) : false;
            $consumo = new Consumo();
            $consumo->setPacienteId($id);
            $arrCons = $consumo->getOne();
            $arr = json_decode(json_encode($arrCons), true);
            require_once 'layout/header.php';
            require_once 'layout/sidebar.php';
            require_once 'views/paciente/consumo_sustancias.php';
        }
    }

    public function paciente()
    {
        $id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) : false;
        $paciente = new Paciente();
        $paciente->setId($id);
        $data = $paciente->getOne();
        $consumo = new Consumo();
        $consumo->setPacienteId($id);
        $sust = $consumo->getAll();
        $conter = 1;
        require_once 'layout/header.php';
        require_once 'layout/sidebar.php';
        require_once 'views/paciente/consumo_sustancias.php';
    }

    public function data()
    {
        if ($_POST['id']) {
            $id = $_POST['id'];
            $getAll = new Consumo();
            $getAll->setIdConsumoSust($id);
            $data = $getAll->getOne();
            $id = $data->id_consumo_sust;
            $sustancia = $data->sustancia;
            $frecuencia = $data->frecuencia_uso;
            $via = $data->via_admin;
            $edadUso = $data->edad_uso;
            $actualmente = $data->actualmente;
            $edadSin = $data->edad_sin_uso;
            $droga = $data->droga_impacto;
            $datos = array(
                'id' => $id,
                'sustancia' => $sustancia,
                'frecuencia' => $frecuencia,
                'via' => $via,
                'edadUso' => $edadUso,
                'actualmente' => $actualmente,
                'edadSin' => $edadSin,
                'droga' => $droga
            );
        }
        echo json_encode($datos);
    }

    public function save()
    {
        if (isset($_POST)) {
            $idPaciente = isset($_POST['pacienteId']) ? filter_var($_POST['pacienteId'], FILTER_VALIDATE_INT) : false;
            $consumo = new Consumo();
            $pregunta = new PreguntasConsumo();
            $pregunta->setCertificado($_POST['radCert']);
            $pregunta->setAlgunaEnf(filter_var($_POST['enfRad'], FILTER_SANITIZE_STRING));;
            $pregunta->setLesion(filter_var($_POST['radLes'], FILTER_SANITIZE_STRING));
            $pregunta->setIntravenosa($_POST['radIntra']);
            $pregunta->setVih($_POST['radVih']);
            $pregunta->setSida($_POST['radsida']);
            $pregunta->setPrTuberculosis($_POST['radTub']);
            $pregunta->setHepatitis($_POST['radHep']);
            $pregunta->setOtras(filter_var($_POST['radOtra'], FILTER_SANITIZE_STRING));
            $pregunta->setDescripcionSalud($_POST['estadoIngreso']);
            $pregunta->setNumTrat(filter_var($_POST['tratamientos'], FILTER_SANITIZE_STRING));
            $pregunta->setPacienteId($idPaciente);

            if ($_POST['action'] == 'create') {
                $res = $pregunta->save();
                $json = [];
                if (isset($_POST['arrData'])) {
                    $arr = json_decode($_POST['arrData'], true);
                    foreach ($arr as $row) {
                        $consumo->setSustancia(filter_var($row['sustancia'], FILTER_SANITIZE_STRING));
                        $consumo->setFrecuenciaUso(filter_var($row['frecuencia'], FILTER_SANITIZE_STRING));
                        $consumo->setViaAdmin(filter_var($row['via'], FILTER_SANITIZE_STRING));
                        $consumo->setEdadUso(filter_var($row['edad'], FILTER_VALIDATE_INT));
                        $consumo->setActualmente(filter_var($row['actualmente'], FILTER_SANITIZE_STRING));
                        $consumo->setEdadSinUso(filter_var($row['dejo_uso'], FILTER_SANITIZE_STRING));
                        $consumo->setPacienteId($idPaciente);
                        $save = $consumo->save();
                    }
                    array_push($json, $save);
                }
            } else {
                $id = $_POST['consumo_id'];
                $consumo->setIdConsumoSust($id);
                $save = $consumo->edit();
            }
        }

        array_push($json, $res);
        echo json_encode($json);
    }
}
