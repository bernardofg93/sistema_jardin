<?php

class domicilio
{
    private $id_domicilio;
    private $usuario_id;
    private $paciente_id;
    private $calle;
    private $numero;
    private $colonia;
    private $municipio;
    private $telefono;
    private $nombre_familiar;
    private $telefono_fam;
    private $tipo_parentes;
    private $domicilio_fam;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getIdDomicilio()
    {
        return $this->id_domicilio;
    }

    public function setIdDomicilio($id_domicilio)
    {
        $this->id_domicilio = $id_domicilio;
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

    public function getCalle()
    {
        return $this->calle;
    }

    public function setCalle($calle)
    {
        $this->calle = $calle;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    public function getColonia()
    {
        return $this->colonia;
    }

    public function setColonia($colonia)
    {
        $this->colonia = $colonia;
    }

    public function getMunicipio()
    {
        return $this->municipio;
    }

    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getNombreFamiliar()
    {
        return $this->nombre_familiar;
    }

    public function setNombreFamiliar($nombre_familiar)
    {
        $this->nombre_familiar = $nombre_familiar;
    }

    public function getTelefonoFam()
    {
        return $this->telefono_fam;
    }

    public function setTelefonoFam($telefono_fam)
    {
        $this->telefono_fam = $telefono_fam;
    }

    public function getTipoParentes()
    {
        return $this->tipo_parentes;
    }

    public function setTipoParentes($tipo_parentes)
    {
        $this->tipo_parentes = $tipo_parentes;
    }

    public function getDomicilioFam()
    {
        return $this->domicilio_fam;
    }

    public function setDomicilioFam($domicilio_fam)
    {
        $this->domicilio_fam = $domicilio_fam;
    }

    public function getOne(){
        $sql = "SELECT
                *
                FROM domicilio d  
                INNER JOIN paciente p 
                ON d.paciente_id = p.id_paciente     
                WHERE p.id_paciente = {$this->getPacienteId()}";
        $result = $this->db->query($sql);
        return $result->fetch_object();
    }

    public function save()
    {
        $id_user = $this->usuario_id;
        $id_pac = $this->paciente_id;
        $calle_d = $this->calle;
        $numero_d = $this->numero;
        $colonia_d = $this->colonia;
        $municipio_d = $this->municipio;
        $telefono_d = $this->telefono;
        $nombre_familiar_d = $this->nombre_familiar;
        $telefono_fam_d = $this->telefono_fam;
        $tipo_parentes_d = $this->tipo_parentes;
        $domicilio_fam_d = $this->domicilio_fam;

        $sql = "INSERT INTO domicilio VALUES(NULL,"
        ."'$id_user','$id_pac','$calle_d','$numero_d','$colonia_d',"
        ."'$municipio_d','$telefono_d','$nombre_familiar_d','$telefono_fam_d',"
        ."'$tipo_parentes_d','$domicilio_fam_d');";
        
        $result = $this->db->query($sql);
        if ($result) {
            return array(
                'result' => 'true'
            );
        }
    }
    
    public function edit()
    {
        $calle_d = $this->calle;
        $numero_d = $this->numero;
        $colonia_d = $this->colonia;
        $municipio_d = $this->municipio;
        $telefono_d = $this->telefono;
        $nombre_familiar_d = $this->nombre_familiar;
        $telefono_fam_d = $this->telefono_fam;
        $tipo_parentes_d = $this->tipo_parentes;
        $domicilio_fam_d = $this->domicilio_fam;
        $sql = "UPDATE domicilio 
                SET 
                calle='$calle_d',numero='$numero_d',colonia='$colonia_d',
                municipio='$municipio_d',telefono='$telefono_d',nombre_familiar='$nombre_familiar_d',
                telefono_fam='$telefono_fam_d',tipo_parentes='$tipo_parentes_d',domicilio_fam='$domicilio_fam_d'
                WHERE paciente_id={$this->getPacienteId()} ";

        $result = $this->db->query($sql);
        if ($result) {
            return array(
        'result' => 'true'
    );
        }
    }
}
