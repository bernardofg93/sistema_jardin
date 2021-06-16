<?php
require_once 'models/paciente.php';
require_once 'models/domicilio.php';

class domicilioController
{
    public function paciente(){
        if($_GET['id']){
        $id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) : false;
        $paciente = new Paciente();
        $paciente->setId($id);
        $data = $paciente->getOne();
        $domicilio = new Domicilio();
        $domicilio->setPacienteId($id);
        $dom = $domicilio->getOne();
        require_once 'layout/header.php';
        require_once 'layout/sidebar.php';
        require_once 'views/paciente/domicilio.php';
        }
    }

    public function save(){
        if (isset($_POST)) {
            $calle = isset($_POST['calle']) ? filter_var($_POST['calle'], FILTER_SANITIZE_STRING) : false;
            $numero = isset($_POST['numero']) ? filter_var($_POST['numero'], FILTER_SANITIZE_STRING) : false;
            $colonia = isset($_POST['colonia']) ? filter_var($_POST['colonia'], FILTER_SANITIZE_STRING) : false;
            $municipio = isset($_POST['municipio']) ? filter_var($_POST['municipio'], FILTER_SANITIZE_STRING) : false;
            $telefono = isset($_POST['telefono']) ? filter_var($_POST['telefono'], FILTER_SANITIZE_STRING) : false;
            $nombre_familiar = isset($_POST['nombre_familiar']) ? filter_var($_POST['nombre_familiar'], FILTER_SANITIZE_STRING) : false;
            $telefono_fam = isset($_POST['telefono_fam']) ? filter_var($_POST['telefono_fam'], FILTER_SANITIZE_STRING) : false;
            $tipo_parentes = isset($_POST['tipo_parentes']) ? filter_var($_POST['tipo_parentes'], FILTER_SANITIZE_STRING) : false;
            $domicilio_fam = isset($_POST['domicilio_fam']) ? filter_var($_POST['domicilio_fam'], FILTER_SANITIZE_STRING) : false;
            $paciente_id = isset($_POST['paciente_id']) ? filter_var($_POST['paciente_id'], FILTER_SANITIZE_NUMBER_INT) : false;

            if ($calle && $numero && $colonia) {
                $domicilio = new Domicilio();
                $domicilio->setCalle($calle);
                $domicilio->setNumero($numero);
                $domicilio->setColonia($colonia);
                $domicilio->setMunicipio($municipio);
                $domicilio->setTelefono($telefono);
                $domicilio->setNombreFamiliar($nombre_familiar);
                $domicilio->setTelefonoFam($telefono_fam);
                $domicilio->setTipoParentes($tipo_parentes);
                $domicilio->setDomicilioFam($domicilio_fam);
                $domicilio->setPacienteId($paciente_id);

                if ($_POST['action'] == 'edit') {
                    $save = $domicilio->edit();
                } elseif ($_POST['action'] == 'create') {
                    $user_id = $_SESSION['identity']->id_usuario;
                    $domicilio->setUsuarioId($user_id);
                    $save = $domicilio->save();
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
