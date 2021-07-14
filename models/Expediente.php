<?php


class Expediente
{
    private $id;
    private $paciente_id;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPacienteId()
    {
        return $this->paciente_id;
    }

    public function setPacienteId($paciente_id)
    {
        $this->paciente_id = $paciente_id;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM expediente WHERE paciente_id = {$this->getId()}";
        return $data = $this->db->query($sql);
    }

    public function code($paciente_id, $expediente_id)
    {
        $no_expediente = 'exp' . $paciente_id . $expediente_id;

        $cod = "UPDATE expediente 
                SET no_expediente = '$no_expediente' 
                WHERE id_expediente = $expediente_id
                AND paciente_id = $paciente_id
                ";
        $res = $this->db->query($cod);
    }

    public function save()
    {
        $sql = "INSERT INTO expediente VALUES(NULL, NULL, {$this->getPacienteId()}, CURDATE(), NULL)";
        $save = $this->db->query($sql);
        return ['res' => 'true', 'expediente_id' => $this->db->insert_id];
    }
}

