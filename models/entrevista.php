<?php

class Entrevista
{
    private $id_entrevista;
    private $usuario_id;
    private $paciente_id;
    private $como_llegaste;
    private $consumo_sustancia;
    private $consumo_frecuencia;
    private $inicio_consumo;
    private $porque_consumo;
    private $fam_ciudad;
    private $fam_relacion;
    private $consideracion;
    private $porque_consid;
    private $primera_vez;
    private $veces_programa;
    private $juntas;
    private $recibo_informacion;
    private $constancia_reunion;
    private $fecha_alta_entrevista;
    private $hora_alta_entrevista;
    private $ent_status;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getIdEntrevista()
    {
        return $this->id_entrevista;
    }

    public function setIdEntrevista($id_entrevista)
    {
        $this->id_entrevista = $id_entrevista;
    }

    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    public function getPacienteId()
    {
        return $this->paciente_id;
    }

    public function setPacienteId($paciente_id)
    {
        $this->paciente_id = $paciente_id;

        return $this;
    }

    public function getComoLlegaste()
    {
        return $this->como_llegaste;
    }


    public function setComoLlegaste($como_llegaste)
    {
        $this->como_llegaste = $como_llegaste;
    }

    public function getConsumoSustancia()
    {
        return $this->consumo_sustancia;
    }

    public function setConsumoSustancia($consumo_sustancia)
    {
        $this->consumo_sustancia = $consumo_sustancia;

        return $this;
    }

    public function getConsumoFrecuencia()
    {
        return $this->consumo_frecuencia;
    }

    public function setConsumoFrecuencia($consumo_frecuencia)
    {
        $this->consumo_frecuencia = $consumo_frecuencia;

    }

    public function getInicioConsumo()
    {
        return $this->inicio_consumo;
    }

    public function setInicioConsumo($inicio_consumo)
    {
        $this->inicio_consumo = $inicio_consumo;
    }

    public function getPorqueConsumo()
    {
        return $this->porque_consumo;
    }

    public function setPorqueConsumo($porque_consumo)
    {
        $this->porque_consumo = $porque_consumo;
    }

    public function getFamCiudad()
    {
        return $this->fam_ciudad;
    }

    public function setFamCiudad($fam_ciudad)
    {
        $this->fam_ciudad = $fam_ciudad;
    }

    public function getFamRelacion()
    {
        return $this->fam_relacion;
    }

    public function setFamRelacion($fam_relacion)
    {
        $this->fam_relacion = $fam_relacion;
    }

    public function getConsideracion()
    {
        return $this->consideracion;
    }

    public function setConsideracion($consideracion)
    {
        $this->consideracion = $consideracion;
    }

    public function getPorqueConsid()
    {
        return $this->porque_consid;
    }

    public function setPorqueConsid($porque_consid)
    {
        $this->porque_consid = $porque_consid;
    }

    public function getPrimeraVez()
    {
        return $this->primera_vez;
    }

    public function setPrimeraVez($primera_vez)
    {
        $this->primera_vez = $primera_vez;
    }

    public function getVecesPrograma()
    {
        return $this->veces_programa;
    }

    public function setVecesPrograma($veces_programa)
    {
        $this->veces_programa = $veces_programa;
    }

    public function getJuntas()
    {
        return $this->juntas;
    }

    public function setJuntas($juntas)
    {
        $this->juntas = $juntas;
    }

    public function getReciboInformacion()
    {
        return $this->recibo_informacion;
    }

    public function setReciboInformacion($recibo_informacion)
    {
        $this->recibo_informacion = $recibo_informacion;
    }

    public function getConstanciaReunion()
    {
        return $this->constancia_reunion;
    }

    public function setConstanciaReunion($constancia_reunion)
    {
        $this->constancia_reunion = $constancia_reunion;
    }

    public function getFechaAltaEntrevista()
    {
        return $this->fecha_alta_entrevista;
    }

    public function setFechaAltaEntrevista($fecha_alta_entrevista)
    {
        $this->fecha_alta_entrevista = $fecha_alta_entrevista;
    }

    public function getHoraAltaEntrevista()
    {
        return $this->hora_alta_entrevista;
    }

    public function setHoraAltaEntrevista($hora_alta_entrevista)
    {
        $this->hora_alta_entrevista = $hora_alta_entrevista;
    }

    public function getEntStatus()
    {
        return $this->ent_status;
    }

    public function setEntStatus($ent_status)
    {
        $this->ent_status = $ent_status;
    }

    public function getOne()
    {
        $sql = "SELECT
                *
                FROM entrevista e  
                INNER JOIN paciente p 
                ON e.paciente_id = p.id_paciente     
                WHERE p.id_paciente = {$this->getPacienteId()}";
        $result = $this->db->query($sql);
        return $result->fetch_object();
    }

    public function save()
    {
        $id_user = $this->usuario_id;
        $id_pac = $this->paciente_id;
        $llegaste = $this->como_llegaste;
        $sustancia = $this->consumo_sustancia;
        $frecuencia = $this->consumo_frecuencia;
        $inicio = $this->inicio_consumo;
        $porque = $this->porque_consumo;
        $familia = $this->fam_ciudad;
        $relacion = $this->fam_relacion;
        $consid = $this->consideracion;
        $por_consid = $this->porque_consid;
        $primera = $this->primera_vez;
        $veces = $this->veces_programa;
        $junta = $this->juntas;
        $recibo = $this->recibo_informacion;
        $reunion = $this->constancia_reunion;
        $status = $this->ent_status;

        $sql = "INSERT INTO entrevista VALUES(NULL,"
            . "'$id_user','$id_pac','$llegaste','$sustancia','$frecuencia',"
            . "'$inicio','$porque','$familia','$relacion','$consid','$por_consid',"
            . "'$primera','$veces','$junta','$recibo','$reunion',CURDATE(),CURTIME());";

        $result = $this->db->query($sql);
        if ($result) {
            return array(
                'result' => 'true'
            );
        }
    }

    public function edit()
    {
        $llegaste = $this->como_llegaste;
        $sustancia = $this->consumo_sustancia;
        $frecuencia = $this->consumo_frecuencia;
        $inicio = $this->inicio_consumo;
        $porque = $this->porque_consumo;
        $familia = $this->fam_ciudad;
        $relacion = $this->fam_relacion;
        $consid = $this->consideracion;
        $por_consid = $this->porque_consid;
        $primera = $this->primera_vez;
        $veces = $this->veces_programa;
        $junta = $this->juntas;
        $recibo = $this->recibo_informacion;
        $reunion = $this->constancia_reunion;
        $sql = "UPDATE entrevista 
                SET 
                como_llegaste='$llegaste',consumo_sustancia='$sustancia',consumo_frecuencia='$frecuencia',
                inicio_consumo='$inicio',porque_consumo='$porque',fam_ciudad='$familia',fam_relacion='$relacion',
                consideracion='$consid',porque_consid='$por_consid',primera_vez='$primera',
                veces_programa='$veces',juntas='$junta',recibo_informacion='$recibo',constancia_reunion='$reunion'
                WHERE paciente_id={$this->getPacienteId()} ";

        $result = $this->db->query($sql);

        if ($result) {
            return array(
                'result' => 'true'
            );
        }
    }
}