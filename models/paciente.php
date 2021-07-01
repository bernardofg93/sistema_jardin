<?php

class Paciente
{
    private $id;
    private $usuario_id;
    private $no_expediente;
    private $nombre_pa;
    private $apellido_paterno;
    private $apellido_materno;
    private $edad;
    private $sexo;
    private $escolaridad;
    private $fecha_nac;
    private $lugar;
    private $nacionalidad;
    private $lugar_recidencia;
    private $edo_civil;
    private $sit_laboral;
    private $religion;
    private $acudio;
    private $status_paciente;
    private $img_paciente;

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

    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    public function getNo_expediente()
    {
        return $this->no_expediente;
    }

    public function setNo_expediente($no_expediente)
    {
        $this->no_expediente = $this->db->real_escape_string($no_expediente);
    }

    public function getNombrePa()
    {
        return $this->nombre_pa;
    }

    public function setNombrePa($nombre_pa)
    {
        $this->nombre_pa = $nombre_pa;
    }

    public function getApellido_paterno()
    {
        return $this->apellido_paterno;
    }

    public function setApellido_paterno($apellido_paterno)
    {
        $this->apellido_paterno = $this->db->real_escape_string($apellido_paterno);
    }

    public function getApellido_materno()
    {
        return $this->apellido_materno;
    }

    public function setApellido_materno($apellido_materno)
    {
        $this->apellido_materno = $this->db->real_escape_string($apellido_materno);
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $this->db->real_escape_string($sexo);
    }

    public function getEscolaridad()
    {
        return $this->escolaridad;
    }

    public function setEscolaridad($escolaridad)
    {
        $this->escolaridad = $this->db->real_escape_string($escolaridad);
    }

    public function getFecha_nac()
    {
        return $this->fecha_nac;
    }

    public function setFecha_nac($fecha_nac)
    {
        $this->fecha_nac = $fecha_nac;
    }

    public function getLugar()
    {
        return $this->lugar;
    }

    public function setLugar($lugar)
    {
        $this->lugar = $this->db->real_escape_string($lugar);
    }

    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }

    public function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $this->db->real_escape_string($nacionalidad);
    }

    public function getLugar_recidencia()
    {
        return $this->lugar_recidencia;
    }

    public function setLugar_recidencia($lugar_recidencia)
    {
        $this->lugar_recidencia = $this->db->real_escape_string($lugar_recidencia);
    }

    public function getEdo_civil()
    {
        return $this->edo_civil;
    }

    public function setEdo_civil($edo_civil)
    {
        $this->edo_civil = $this->db->real_escape_string($edo_civil);
    }

    public function getSit_laboral()
    {
        return $this->sit_laboral;
    }

    public function setSit_laboral($sit_laboral)
    {
        $this->sit_laboral = $this->db->real_escape_string($sit_laboral);
    }

    public function getReligion()
    {
        return $this->religion;
    }

    public function setReligion($religion)
    {
        $this->religion = $this->db->real_escape_string($religion);
    }

    public function getAcudio()
    {
        return $this->acudio;
    }

    public function setAcudio($acudio)
    {
        $this->acudio = $acudio;
    }

    public function getStatus_paciente()
    {
        return $this->status_paciente;
    }

    public function setStatus_paciente($status_paciente)
    {
        $this->status_paciente = $status_paciente;

        return $this;
    }

    public function getImg_paciente()
    {
        return $this->img_paciente;
    }

    public function setImg_paciente($img_paciente)
    {
        $this->img_paciente = $img_paciente;
    }

    public function getOne()
    {
        $sql = "SELECT * FROM paciente WHERE id_paciente = {$this->getId()}";
        $data = $this->db->query($sql);
        return $data->fetch_object();
    }

    public function getAll()
    {
        $registros = $this->db->query("SELECT * FROM paciente ORDER BY id_paciente DESC");
        return $registros;
    }

    public function save()
    {
        $id_user = $this->id;
        $pac_nom = $this->nombre_pa;
        $paterno = $this->apellido_paterno;
        $materno = $this->apellido_materno;
        $pac_edad = $this->edad;
        $pac_sex = $this->sexo;
        $pac_esc = $this->escolaridad;
        $pac_fecha = $this->fecha_nac;
        $pac_lugar = $this->lugar;
        $pac_nac = $this->nacionalidad;
        $pac_rec = $this->lugar_recidencia;
        $edo_civil = $this->edo_civil;
        $laboral = $this->sit_laboral;
        $pac_rel = $this->religion;
        $pac_acudio = $this->acudio;
        $status = $this->status_paciente;

        $sql = "INSERT INTO paciente VALUES(NULL,"
            . "'$id_user',CURDATE(),CURTIME(),'$pac_nom','$paterno','$materno',"
            . "'$pac_edad','$pac_sex','$pac_esc','$pac_fecha','$pac_lugar','$pac_nac',"
            . "'$pac_rec','$edo_civil','$laboral','$pac_rel','$pac_acudio','$status',NULL);";

        $result = $this->db->query($sql);
        if ($result) {
            return array(
                'result' => 'true',
                'paciente_id' => $this->db->insert_id
            );
        }
    }

    public function code()
    {
        $code = "SELECT MAX(id_paciente) AS id FROM paciente";
        $paciente_id = $this->db->query($code);
        $id = $paciente_id->fetch_object()->id;
        $no_expediente = $this->fecha_nac . 'pac' . $id;

        $cod = "UPDATE paciente SET no_expediente = '$no_expediente' WHERE id_paciente = $id";
        $this->db->query($cod);
    }

    public function edit()
    {
        $pac_nom = $this->nombre_pa;
        $paterno = $this->apellido_paterno;
        $materno = $this->apellido_materno;
        $pac_edad = $this->edad;
        $pac_sex = $this->sexo;
        $pac_esc = $this->escolaridad;
        $pac_fecha = $this->fecha_nac;
        $pac_lugar = $this->lugar;
        $pac_nac = $this->nacionalidad;
        $pac_rec = $this->lugar_recidencia;
        $edo_civil = $this->edo_civil;
        $laboral = $this->sit_laboral;
        $pac_rel = $this->religion;
        $pac_acudio = $this->acudio;
        $sql = "UPDATE paciente 
                SET 
                nombre_pa='$pac_nom',apellido_paterno='$paterno',apellido_materno='$materno',
                edad='$pac_edad',sexo='$pac_sex',escolaridad='$pac_esc',fecha_nac='$pac_fecha',
                lugar_nacimiento='$pac_lugar',nacionalidad='$pac_nac',lugar_recidencia='$pac_rec',
                edo_civil='$edo_civil',sit_laboral='$laboral',religion='$pac_rel',acudio='$pac_acudio'
                WHERE id_paciente={$this->getId()} ";

        $result = $this->db->query($sql);
        if ($result) {
            return array(
                'result' => 'true'
            );
        }
    }
}
