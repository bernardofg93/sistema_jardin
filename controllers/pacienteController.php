<?php
require_once 'models/paciente.php';
require_once 'models/entrevista.php';
require_once 'models/domicilio.php';
require_once 'models/consumo.php';
require_once 'models/Expediente.php';

class pacienteController
{
    public function expediente()
    {
        if ($_GET['id']) {
            $id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) : false;

            //expediente
            $expediente = new Expediente();
            $expediente->setId($id);
            $exp = $expediente->getAll();

            $paciente = new Paciente();
            $paciente->setId($id);
            $data = $paciente->getOne();

            $entrevista = new Entrevista();
            $entrevista->setPacienteId($id);
            $ent = $entrevista->getOne();

            $domicilio = new Domicilio();
            $domicilio->setPacienteId($id);
            $dom = $domicilio->getOne();

            //consumo sustancias
            $sustancia = new Consumo();
            $sustancia->setIdConsumoSustancias($id);
            $res = $sustancia->getOne();
            if ($res) {
                $sust = true;
            } else {
                $sust = false;
            }


            require_once 'layout/header.php';
            require_once 'layout/sidebar.php';
            require_once 'views/paciente/expediente.php';
        }
    }

    public function administracion()
    {
        $paciente = new Paciente();
        $data = $paciente->getAll();
        require_once 'layout/header.php';
        require_once 'layout/sidebar.php';
        require_once 'views/paciente/admin.php';
    }

    public function registro()
    {
        if (isset($_GET['idExp']) && isset($_GET['idPac'])) {
            $id = isset($_GET['idPac']) ? filter_var($_GET['idPac'], FILTER_SANITIZE_NUMBER_INT) : false;
            $paciente = new Paciente();
            $paciente->setId($id);
            $data = $paciente->getOne();
            is_object($data) ? $edit = true : false;
        }
        require_once 'layout/header.php';
        require_once 'layout/sidebar.php';
        require_once 'views/paciente/registro.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? filter_var($_POST['nombre'], FILTER_SANITIZE_STRING) : false;
            $apellido_paterno = isset($_POST['apellido_paterno']) ? filter_var($_POST['apellido_paterno'], FILTER_SANITIZE_STRING) : false;
            $apellido_materno = isset($_POST['apellido_materno']) ? filter_var($_POST['apellido_materno'], FILTER_SANITIZE_STRING) : false;
            $edad = isset($_POST['edad']) ? filter_var($_POST['edad'], FILTER_SANITIZE_NUMBER_INT) : false;
            $sexo = isset($_POST['sexo']) ? filter_var($_POST['sexo'], FILTER_SANITIZE_STRING) : false;
            $escolaridad = isset($_POST['escolaridad']) ? filter_var($_POST['escolaridad'], FILTER_SANITIZE_STRING) : false;
            $fecha_nac = isset($_POST['fecha_nac']) ? filter_var($_POST['fecha_nac'], FILTER_SANITIZE_STRING) : false;
            $lugar = isset($_POST['lugar']) ? filter_var($_POST['lugar'], FILTER_SANITIZE_STRING) : false;
            $nacionalidad = isset($_POST['nacionalidad']) ? filter_var($_POST['nacionalidad'], FILTER_SANITIZE_STRING) : false;
            $lugar_recidencia = isset($_POST['lugar_recidencia']) ? filter_var($_POST['lugar_recidencia'], FILTER_SANITIZE_STRING) : false;
            $edo_civil = isset($_POST['edo_civil']) ? filter_var($_POST['edo_civil'], FILTER_SANITIZE_STRING) : false;
            $sit_laboral = isset($_POST['sit_laboral']) ? filter_var($_POST['sit_laboral'], FILTER_SANITIZE_STRING) : false;
            $religion = isset($_POST['religion']) ? filter_var($_POST['religion'], FILTER_SANITIZE_STRING) : false;
            $acudio = isset($_POST['selectRadio']) ? filter_var($_POST['selectRadio'], FILTER_SANITIZE_STRING) : false;

            if ($nombre && $apellido_paterno && $apellido_materno) {
                $paciente = new Paciente();
                $paciente->setNombrePa($nombre);
                $paciente->setApellido_paterno($apellido_paterno);
                $paciente->setApellido_materno($apellido_materno);
                $paciente->setEdad($edad);
                $paciente->setSexo($sexo);
                $paciente->setEscolaridad($escolaridad);
                $paciente->setFecha_nac($fecha_nac);
                $paciente->setLugar($lugar);
                $paciente->setNacionalidad($nacionalidad);
                $paciente->setLugar_recidencia($lugar_recidencia);
                $paciente->setEdo_civil($edo_civil);
                $paciente->setSit_laboral($sit_laboral);
                $paciente->setReligion($religion);
                $paciente->setAcudio($acudio);

                if ($_POST['action'] == 'edit') {
                    $id = filter_var($_POST['id_paciente'], FILTER_SANITIZE_NUMBER_INT);
                    $paciente->setId($id);
                    $save = $paciente->edit();
                } elseif ($_POST['action'] == 'create') {
                    $user_id = $_SESSION['identity']->id_usuario;
                    $paciente->setId($user_id);
                    $save = $paciente->save();
                    $paciente_id = $save['paciente_id'];
                    if($save) {
                        $expediente = new Expediente();
                        $expediente->setPacienteId($paciente_id);
                        $res = $expediente->save();
                        $expediente_id = $res['expediente_id'];
                        if($res){
                            $expediente->code($paciente_id, $expediente_id);
                        }

                    }
                }

            } else {
                $_SESSION['registro'] = 'failed';
            }
        }
        echo json_encode($save);
    }
}
