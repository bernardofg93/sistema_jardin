<?php
require_once 'models/paciente.php';
require_once 'models/consumo.php';
class consumoController
{
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

    public function json()
    {
        $datos = array(
            'id' => 'id',
            'sustancia' => 'frecuencia',
            'frecuencia' => 'frecuencia',
            'via' => 'via',
            'edadUso' => 'via',
            'actualmente' => 'via',
            'edadSin' => 'via',
            'droga' => 'via'
        );

        echo json_encode($datos);
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
            $sustancia = isset($_POST['sustancia']) ? filter_var($_POST['sustancia'], FILTER_SANITIZE_STRING) : false;
            $frecuencia_uso = isset($_POST['frecuencia_uso']) ? filter_var($_POST['frecuencia_uso'], FILTER_SANITIZE_STRING) : false;
            $via_admin = isset($_POST['via_admin']) ? filter_var($_POST['via_admin'], FILTER_SANITIZE_STRING) : false;
            $edad_uso = isset($_POST['edad_uso']) ? filter_var($_POST['edad_uso'], FILTER_SANITIZE_STRING) : false;
            $actualmente = isset($_POST['actualmente']) ? filter_var($_POST['actualmente'], FILTER_SANITIZE_STRING) : false;
            $edad_sin_uso = isset($_POST['edad_sin_uso']) ? filter_var($_POST['edad_sin_uso'], FILTER_SANITIZE_STRING) : false;
            $droga_impacto = isset($_POST['droga_impacto']) ? filter_var($_POST['droga_impacto'], FILTER_SANITIZE_STRING) : false;
            $paciente_id = isset($_POST['paciente_id']) ? filter_var($_POST['paciente_id'], FILTER_SANITIZE_NUMBER_INT) : false;

            if ($sustancia && $frecuencia_uso && $via_admin) {
                $consumo = new Consumo();
                $consumo->setSustancia($sustancia);
                $consumo->setFrecuenciaUso($frecuencia_uso);
                $consumo->setViaAdmin($via_admin);
                $consumo->setEdadUso($edad_uso);
                $consumo->setActualmente($actualmente);
                $consumo->setEdadSinUso($edad_sin_uso);
                $consumo->setDrogaImpacto($droga_impacto);
                $consumo->setPacienteId($paciente_id);
                if ($_POST['action'] == 'edit') {
                    $id = $_POST['consumo_id'];
                    $consumo->setIdConsumoSust($id);
                    $save = $consumo->edit();
                } elseif ($_POST['action'] == 'create') {
                    $user_id = $_SESSION['identity']->id_usuario;
                    $consumo->setUsuarioId($user_id);
                    $save = $consumo->save();
                }
                if ($save) {
                    $_SESSION['registro'] = 'complete';
                } else {
                    $_SESSION['registro'] = 'failed';
                }
            } else {
                $_SESSION['registro'] = 'failed';
            }
            echo json_encode($save);
        }
    }
}
