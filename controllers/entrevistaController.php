<?php
require_once 'models/entrevista.php';
require_once 'models/paciente.php';
class entrevistaController
{
    public function paciente()
    {
        if (isset($_GET['id'])) {
            $id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) : false;
            $data = Utils::getData($id);
            $entrevista = new Entrevista();
            $entrevista->setPacienteId($id);
            $obj = $entrevista->getOne();
        }
        require_once 'layout/header.php';
        require_once 'layout/sidebar.php';
        require_once 'views/paciente/entrevista.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $como_llegaste = isset($_POST['como_llegaste']) ? filter_var($_POST['como_llegaste'], FILTER_SANITIZE_STRING) : false;
            $consumo_sustancia = isset($_POST['consumo_sustancia']) ? filter_var($_POST['consumo_sustancia'], FILTER_SANITIZE_STRING) : false;
            $consumo_frecuencia = isset($_POST['consumo_frecuencia']) ? filter_var($_POST['consumo_frecuencia'], FILTER_SANITIZE_STRING) : false;
            $inicio_consumo = isset($_POST['inicio_consumo']) ? filter_var($_POST['inicio_consumo'], FILTER_SANITIZE_STRING) : false;
            $porque_consumo = isset($_POST['porque_consumo']) ? filter_var($_POST['porque_consumo'], FILTER_SANITIZE_STRING) : false;
            $fam_ciudad = isset($_POST['fam_ciudad']) ? filter_var($_POST['fam_ciudad'], FILTER_SANITIZE_STRING) : false;
            $fam_relacion = isset($_POST['fam_relacion']) ? filter_var($_POST['fam_relacion'], FILTER_SANITIZE_STRING) : false;
            $consideracion = isset($_POST['consideracion']) ? filter_var($_POST['consideracion'], FILTER_SANITIZE_STRING) : false;
            $porque_consid = isset($_POST['porque_consid']) ? filter_var($_POST['porque_consid'], FILTER_SANITIZE_STRING) : false;
            $primera_vez = isset($_POST['primera_vez']) ? filter_var($_POST['primera_vez'], FILTER_SANITIZE_STRING) : false;
            $veces_programa = isset($_POST['veces_programa']) ? filter_var($_POST['veces_programa'], FILTER_SANITIZE_STRING) : false;
            $juntas = isset($_POST['juntas']) ? filter_var($_POST['juntas'], FILTER_SANITIZE_STRING) : false;
            $recibo_informacion = isset($_POST['recibo_informacion']) ? filter_var($_POST['recibo_informacion'], FILTER_SANITIZE_STRING) : false;
            $constancia_reunion = isset($_POST['constancia_reunion']) ? filter_var($_POST['constancia_reunion'], FILTER_SANITIZE_STRING) : false;
            $id = isset($_POST['paciente_id']) ? filter_var($_POST['paciente_id'], FILTER_SANITIZE_NUMBER_INT) : false;

            $entrevista = new Entrevista();
            $entrevista->setComoLlegaste($como_llegaste);
            $entrevista->setConsumoSustancia($consumo_sustancia);
            $entrevista->setConsumoFrecuencia($consumo_frecuencia);
            $entrevista->setInicioConsumo($inicio_consumo);
            $entrevista->setPorqueConsumo($porque_consumo);
            $entrevista->setFamCiudad($fam_ciudad);
            $entrevista->setFamRelacion($fam_relacion);
            $entrevista->setConsideracion($consideracion);
            $entrevista->setPorqueConsid($porque_consid);
            $entrevista->setPrimeraVez($primera_vez);
            $entrevista->setVecesPrograma($veces_programa);
            $entrevista->setJuntas($juntas);
            $entrevista->setReciboInformacion($recibo_informacion);
            $entrevista->setConstanciaReunion($constancia_reunion);
            $entrevista->setPacienteId($id);

            if ($_POST['action'] == 'edit') {
                $id = filter_var($_POST['paciente_id'], FILTER_SANITIZE_NUMBER_INT);
                $entrevista->setPacienteId($id);
                $save = $entrevista->edit();
            } elseif ($_POST['action'] == 'create') {
                $user_id = $_SESSION['identity']->id_usuario;
                $entrevista->setUsuarioId($user_id);
                $save = $entrevista->save();
            }
            if ($save) {
                $_SESSION['registro'] = 'complete';
            } else {
                $_SESSION['registro'] = 'failed';
            }

        }

        echo json_encode($save);
    }

}