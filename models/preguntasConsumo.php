<?php

class PreguntasConsumo
{
    private $id;
    private $paciente_id;
    private $intravenosa;
    private $droga_impacto;
    private $num_trat;
    private $vih;
    private $sida;
    private $pr_tuberculosis;
    private $hepatitis;
    private $otras;
    private $certificado;
    private $alguna_enf;
    private $lesion;
    private $descripcion_salud;

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

    public function getIntravenosa()
    {
        return $this->intravenosa;
    }

    public function setIntravenosa($intravenosa)
    {
        $this->intravenosa = $intravenosa;
    }

    public function getDrogaImpacto()
    {
        return $this->droga_impacto;
    }

    public function setDrogaImpacto($droga_impacto)
    {
        $this->droga_impacto = $droga_impacto;
    }

    public function getNumTrat()
    {
        return $this->num_trat;
    }

    public function setNumTrat($num_trat)
    {
        $this->num_trat = $num_trat;
    }

    public function getVih()
    {
        return $this->vih;
    }

    public function setVih($vih)
    {
        $this->vih = $vih;
    }

    public function getSida()
    {
        return $this->sida;
    }

    public function setSida($sida)
    {
        $this->sida = $sida;
    }

    public function getPrTuberculosis()
    {
        return $this->pr_tuberculosis;
    }

    public function setPrTuberculosis($pr_tuberculosis)
    {
        $this->pr_tuberculosis = $pr_tuberculosis;
    }

    public function getHepatitis()
    {
        return $this->hepatitis;
    }

    public function setHepatitis($hepatitis)
    {
        $this->hepatitis = $hepatitis;
    }

    public function getOtras()
    {
        return $this->otras;
    }

    public function setOtras($otras)
    {
        $this->otras = $otras;
    }

    public function getCertificado()
    {
        return $this->certificado;
    }

    public function setCertificado($certificado)
    {
        $this->certificado = $certificado;
    }

    function getAlgunaEnf()
    {
        return $this->alguna_enf;
    }

    public function setAlgunaEnf($alguna_enf)
    {
        $this->alguna_enf = $alguna_enf;
    }

    public function getLesion()
    {
        return $this->lesion;
    }

    public function setLesion($lesion)
    {
        $this->lesion = $lesion;
    }

    public function getDescripcionSalud()
    {
        return $this->descripcion_salud;
    }

    public function setDescripcionSalud($descripcion_salud)
    {
        $this->descripcion_salud = $descripcion_salud;
    }

    public function getOne()
    {
        $sql = "SELECT
                *
                FROM preguntas_consumo pc  
                INNER JOIN paciente p 
                ON pc.paciente_id = p.id_paciente     
                WHERE pc.paciente_id = {$this->getId()}";
        $result = $this->db->query($sql);
        return $result->fetch_object();
    }

    public function getAll()
    {
        $registros = $this->db->query("SELECT * FROM preguntas_consumo ORDER BY id_preguntas_consumo DESC");
        return $registros;
    }

    public function save()
    {
        $id_pac = $this->paciente_id;
        $int = $this->intravenosa;
        $droga = $this->droga_impacto;
        $num_trat = $this->num_trat;
        $vih = $this->vih;
        $sida = $this->sida;
        $tuberculosis = $this->pr_tuberculosis;
        $hep = $this->hepatitis;
        $otras = $this->otras;
        $cert = $this->certificado;
        $enf = $this->alguna_enf;
        $lesion = $this->lesion;
        $desc = $this->descripcion_salud;

        $sql = "INSERT INTO preguntas_consumo VALUES(NULL,"
            . "'$id_pac','$int','$droga','$num_trat',"
            . "'$vih','$sida','$tuberculosis', '$hep',"
            . "'$otras','$cert','$enf','$lesion','$desc');";

        $result = $this->db->query($sql);
        if ($result) {
            return [
                'result' => 'true'
            ];
        } else {
            return ['result' => 'false'];
        }
    }

    public function edit()
    {
        $int = $this->intravenosa;
        $droga = $this->droga_impacto;
        $num_trat = $this->num_trat;
        $vih = $this->vih;
        $sida = $this->sida;
        $tuberculosis = $this->pr_tuberculosis;
        $hep = $this->hepatitis;
        $otras = $this->otras;
        $cert = $this->certificado;
        $enf = $this->alguna_enf;
        $lesion = $this->lesion;
        $desc = $this->descripcion_salud;

        $sql = "UPDATE preguntas_consumo 
                SET 
                intravenosa='$int',droga_impacto='$droga',num_trat='$num_trat',
                vih='$vih',sida='$sida',pr_tuberculosis='$tuberculosis',hepatitis='$hep',
                certificado='$cert',descripcion_salud='$desc'";

        if ($this->getAlgunaEnf() != null) {
            $sql .= ", alguna_enf='$enf'";
        }
        if ($this->getLesion() != null) {
            $sql .= ", lesion='$lesion'";
        }
        if ($this->getOtras() != null) {
            $sql .= ", otras='$otras'";
        }

        $sql .= "WHERE id_preguntas_consumo={$this->getId()}";

        $result = $this->db->query($sql);
        if ($result) {
            return array(
                'result' => 'true'
            );
        } else {
            return ['result' => 'false'];
        }
    }

    public function delete()
    {
        $sql = "DELETE FROM preguntas_consumo WHERE id_preguntas_consumo = {$this->getId()}";
        $this->db->query($sql);
    }
}