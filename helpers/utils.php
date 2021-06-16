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
}