<?php

class Utils
{
    public static function validate($data)
    {
        $action = 'create';
        if ($data) {
            $action = 'edit';
        }
        return $action;
    }

    public static function getData($id)
    {
        $paciente = new Paciente();
        $paciente->setId($id);
        $data = $paciente->getOne();
        return $data;
    }

    //ingreso
    public static function getIngreso($idP)
    {
            $paciente = new Paciente();
            $paciente->setId($idP);
            return $ing = $paciente->getOne();
    }

    //domicilio
    public static function getDomicilio($idD)
    {
        require_once '../models/domicilio.php';
        $paciente = new Domicilio();
        $paciente->setPacienteId($idD);
        return $ingDom = $paciente->getOne();
    }
}