<?php

class Consumo
{
    private $id_consumo_sustancias;
    private $usuario_id;
    private $paciente_id;
    private $sustancia;
    private $frecuencia_uso;
    private $via_admin;
    private $edad_uso;
    private $actualmente;
    private $edad_sin_uso;
    private $droga_impacto;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getIdConsumoSustancias()
    {
        return $this->id_consumo_sustancias;
    }

    public function setIdConsumoSustancias($id_consumo_sustancias)
    {
        $this->id_consumo_sustancias = $id_consumo_sustancias;
    }

    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    public function getPacienteId()
    {
        return $this->paciente_id;
    }

    public function setPacienteId($paciente_id)
    {
        $this->paciente_id = $paciente_id;
    }

    public function getSustancia()
    {
        return $this->sustancia;
    }

    public function setSustancia($sustancia)
    {
        $this->sustancia = $sustancia;
    }

    public function getFrecuenciaUso()
    {
        return $this->frecuencia_uso;
    }

    public function setFrecuenciaUso($frecuencia_uso)
    {
        $this->frecuencia_uso = $frecuencia_uso;
    }

    public function getViaAdmin()
    {
        return $this->via_admin;
    }

    public function setViaAdmin($via_admin)
    {
        $this->via_admin = $via_admin;
    }


    public function getEdadUso()
    {
        return $this->edad_uso;
    }

    public function setEdadUso($edad_uso)
    {
        $this->edad_uso = $edad_uso;
    }

    public function getActualmente()
    {
        return $this->actualmente;
    }

    public function setActualmente($actualmente)
    {
        $this->actualmente = $actualmente;
    }

    public function getEdadSinUso()
    {
        return $this->edad_sin_uso;
    }

    public function setEdadSinUso($edad_sin_uso)
    {
        $this->edad_sin_uso = $edad_sin_uso;
    }

    public function getDrogaImpacto()
    {
        return $this->droga_impacto;
    }

    public function setDrogaImpacto($droga_impacto)
    {
        $this->droga_impacto = $droga_impacto;
    }

    public function getOne()
    {
        $sql = "SELECT
                *
                FROM consumo_sustancias c  
                INNER JOIN paciente p 
                ON c.paciente_id = p.id_paciente     
                WHERE c.id_consumo_sustancias = {$this->getIdConsumoSustancias()}";

        $res = $this->db->query($sql);
        $data = $res->fetch_object();

        $query = false;
        if ($data) {
            return [
                'idConsumo' => $data->id_consumo_sustancias,
                'sustancia' => $data->sustancia,
                'frecuencia' => $data->frecuencia_uso,
                'via' => $data->via_admin,
                'edadUso' => $data->edad_uso,
                'actualmente' => $data->actualmente,
                'edadSin' => $data->edad_sin_uso
            ];
        } else {
            return $query;
        }
    }

    public function getAll()
    {
        $sql = "SELECT * FROM consumo_sustancias       
                WHERE paciente_id = {$this->getPacienteId()}";
        $result = $this->db->query($sql);
        $data = array();
        while ($row = $result->fetch_object()) {
            $data[] = $row;
        }
        return $data;
    }

    public function save()
    {
        $id_pac = $this->paciente_id;
        $sust = $this->sustancia;
        $frec = $this->frecuencia_uso;
        $via = $this->via_admin;
        $edad_de = $this->edad_uso;
        $actual = $this->actualmente;
        $edad_sin = $this->edad_sin_uso;
        $droga = $this->droga_impacto;

        $sql = "INSERT INTO consumo_sustancias VALUES(NULL,"
            . "'$id_pac','$sust','$frec','$via',"
            . "'$edad_de','$actual','$edad_sin');";

        $result = $this->db->query($sql);

        if ($result) {
            return array(
                'result' => 'true',
                'id' => $id_pac,
                'sustancia' => $sust,
                'frecencia' => $frec,
                'via' => $via,
                'edadUso' => $edad_de,
                'actual' => $actual,
                'edadSin' => $edad_sin,
                'consumo_id' => $this->db->insert_id
            );
        } else {
            return ['result' => 'false'];
        }
    }

    public function edit()
    {
        $sust = $this->sustancia;
        $frec = $this->frecuencia_uso;
        $via = $this->via_admin;
        $edad_de = $this->edad_uso;
        $actual = $this->actualmente;
        $edad_sin = $this->edad_sin_uso;
        $sql = "UPDATE consumo_sustancias 
                SET 
                sustancia='$sust',frecuencia_uso='$frec',
                via_admin='$via',edad_uso='$edad_de',
                actualmente='$actual',edad_sin_uso='$edad_sin'
                WHERE id_consumo_sustancias={$this->getIdConsumoSustancias()}";

        $result = $this->db->query($sql);

        if ($result) {
            return array(
                'result' => 'true',
                'sustancia' => $sust,
                'frecencia' => $frec,
                'via' => $via,
                'edadUso' => $edad_de,
                'actual' => $actual,
                'edadSin' => $edad_sin,
            );
        }
    }

    public function delete()
    {
        $sql = "DELETE FROM consumo_sustancias WHERE id_consumo_sustancias = {$this->getIdConsumoSustancias()}";
        $query = $this->db->query($sql);
        if ($query) {
            return ['res' => 'true'];
        }
    }
}