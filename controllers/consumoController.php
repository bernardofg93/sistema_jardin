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
            $arrCons = $consumo->getAll();
            $arr = json_decode(json_encode($arrCons), true);
            count($arrCons) ? $bol = true : false;
            //preguntas consumo
            $pregunta = new PreguntasConsumo();
            $pregunta->setId($id);
            $data = $pregunta->getOne();

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
            $getAll->setIdConsumoSustancias($id);
            $data = $getAll->getOne();
        }
        echo json_encode($data);
    }

    public function save()
    {
        if (isset($_POST)) {
            $sustancia = isset($_POST['sustancia']) ? filter_var($_POST['sustancia'], FILTER_SANITIZE_STRING) : false;
            $frecuencia = isset($_POST['frecuencia']) ? filter_var($_POST['frecuencia'], FILTER_SANITIZE_STRING) : false;
            $via = isset($_POST['via']) ? filter_var($_POST['via'], FILTER_SANITIZE_STRING) : false;
            $edad_uso = isset($_POST['edad_uso']) ? filter_var($_POST['edad_uso'], FILTER_VALIDATE_INT) : false;
            $actualmente = isset($_POST['actualmente']) ? filter_var($_POST['actualmente'], FILTER_SANITIZE_STRING) : false;
            $dejo_uso = isset($_POST['dejo_uso']) ? filter_var($_POST['dejo_uso'], FILTER_SANITIZE_STRING) : false;

            $consumo = new Consumo();
            $consumo->setSustancia($sustancia);
            $consumo->setFrecuenciaUso($frecuencia);
            $consumo->setViaAdmin($via);
            $consumo->setEdadUso($edad_uso);
            $consumo->setActualmente($actualmente);
            $consumo->setEdadSinUso($dejo_uso);

            if ($_POST['action'] == 'create') {
                $idPaciente = isset($_POST['pacienteId']) ? filter_var($_POST['pacienteId'], FILTER_VALIDATE_INT) : false;
                $consumo->setPacienteId($idPaciente);
                $response = $consumo->save();
            } else {
                $sustanciaId = isset($_POST['consumoId']) ? filter_var($_POST['consumoId'], FILTER_VALIDATE_INT) : false;
                $consumo->setIdConsumoSustancias($sustanciaId);
                $response = $consumo->edit();
            }
        }
        echo json_encode($response);
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
            $consumo = new Consumo();
            $consumo->setIdConsumoSustancias($id);
            $data = $consumo->delete();
        }
        echo json_encode($data);
    }

    public function savePreguntas()
    {
        if (isset($_POST)) {
            $pregunta = new PreguntasConsumo();
            $pregunta->setCertificado($_POST['radCert']);
            $pregunta->setAlgunaEnf(filter_var($_POST['enfRad'], FILTER_SANITIZE_STRING));
            $pregunta->setLesion(filter_var($_POST['radLes'], FILTER_SANITIZE_STRING));
            $pregunta->setIntravenosa($_POST['radIntra']);
            $pregunta->setVih($_POST['radVih']);
            $pregunta->setSida($_POST['radsida']);
            $pregunta->setPrTuberculosis($_POST['radTub']);
            $pregunta->setHepatitis($_POST['radHep']);
            $pregunta->setOtras(filter_var($_POST['radOtra'], FILTER_SANITIZE_STRING));
            $pregunta->setDescripcionSalud($_POST['estadoIngreso']);
            $pregunta->setNumTrat(filter_var($_POST['tratamientos'], FILTER_SANITIZE_STRING));

            if ($_POST['action'] == 'create') {
                $idPaciente = isset($_POST['pacienteId']) ? filter_var($_POST['pacienteId'], FILTER_VALIDATE_INT) : false;
                $pregunta->setPacienteId($idPaciente);
                $res = $pregunta->save();
            } else {
                $idPreg = isset($_POST['pregId']) ? filter_var($_POST['pregId'], FILTER_VALIDATE_INT) : false;
                $pregunta->setId($idPreg);
                $res = $pregunta->edit();
            }
        }
        echo json_encode($res);
    }
}
