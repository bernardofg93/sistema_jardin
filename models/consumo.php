<?php

class Consumo
{
    private $id_consumo_sust;
    private $usuario_id;
    private $paciente_id;
    private $sustancia;
    private $frecuencia_uso;
    private $via_admin;
    private $edad_uso;
    private $actualmente;
    private $edad_sin_uso;
    private $droga_impacto;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getIdConsumoSust()
    {
        return $this->id_consumo_sust;
    }

    public function setIdConsumoSust($id_consumo_sust)
    {
        $this->id_consumo_sust = $id_consumo_sust;
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

    public function getAll(){
        $sql = "SELECT
                *
                FROM consumo_sustancias c  
                INNER JOIN paciente p 
                ON c.paciente_id = p.id_paciente     
                WHERE p.id_paciente = {$this->getPacienteId()}";
        return  $result = $this->db->query($sql);
    }

    public function getOne(){
        $sql = "SELECT * FROM consumo_sustancias       
                WHERE id_consumo_sust = {$this->getIdConsumoSust()}";
        $result = $this->db->query($sql);
         return $result->fetch_object();   
          
    }

    public function save(){
        $id_pac = $this->paciente_id;
        $sust = $this->sustancia;
        $frec = $this->frecuencia_uso;
        $via = $this->via_admin;
        $edad_de = $this->edad_uso;
        $actual = $this->actualmente;
        $edad_sin = $this->edad_sin_uso;
        $droga = $this->droga_impacto;

        $sql = "INSERT INTO consumo_sustancias VALUES(NULL,"
        ."'$id_pac','$sust','$frec','$via',"
        ."'$edad_de','$actual','$edad_sin');";

        $result = $this->db->query($sql);;

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
                'droga' => $droga,
                'consumo_id' => $this->db->insert_id
            );
        }else {
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
        $droga = $this->droga_impacto;
        $sql = "UPDATE consumo_sustancias 
                SET 
                sustancia='$sust',frecuencia_uso='$frec',
                via_admin='$via',edad_uso='$edad_de',
                actualmente='$actual',edad_sin_uso='$edad_sin',
                droga_impacto='$droga'
                WHERE id_consumo_sust={$this->getIdConsumoSust()}";

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
                'droga' => $droga
    );
        }
    }
}