<?php

class Usuario
{
    private $id;
    private $nombre_us;
    private $apellidos_us;
    private $telefono_us;
    private $rol;
    private $email;
    private $password;
    private $status_us;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getId()
    {
        return $this->id;
    }

    public function getNombreUs()
    {
        return $this->nombre_us;
    }

    public function setNombreUs($nombre_us)
    {
        $this->nombre_us = $nombre_us;
    }

    public function getApellidosUs()
    {
        return $this->apellidos_us;
    }

    public function setApellidosUs($apellidos_us)
    {
        $this->apellidos_us = $apellidos_us;
    }

    public function getTelefonoUs()
    {
        return $this->telefono_us;
    }

    public function setTelefonoUs($telefono_us)
    {
        $this->telefono_us = $telefono_us;
    }

    function getRol()
    {
        return $this->rol;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setRol($rol)
    {
        $this->rol = $rol;
    }

    function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);
    }

    function setPassword($password)
    {
        $this->password = $password;
    }

    public function getStatusUs()
    {
        return $this->status_us;
    }

    public function setStatusUs($status_us)
    {
        $this->status_us = $status_us;
    }


    public function save()
    {
        $us_nombre = $this->nombre_us;
        $us_apellidos = $this->apellidos_us;
        $us_telefono = $this->telefono_us;
        $us_rol = $this->rol;
        $us_email = $this->email;
        $us_password = $this->password;

        $sql = "INSERT INTO usuario VALUES(NULL, "
            . "'$us_nombre', '$us_apellidos', '$us_telefono', "
            . "'$us_rol', '$us_email', '{$this->getPassword()}',CURDATE(), NULL, 1);";

        $save = $this->db->query($sql);
        if ($save) {
            return array(
                'result' => 'true',
                'data' => array(
                    'nombre' => $us_nombre,
                    'apellidos' => $us_apellidos,
                    'telefono' => $us_telefono,
                    'rol' => $us_rol,
                    'email' => $us_email,
                    'password' => $us_password,
                    'usuario_id' => $this->db->insert_id
                )
            );
        }
    }

    public function edit()
    {
        $us_nombre = $this->nombre_us;
        $us_apellidos = $this->apellidos_us;
        $us_telefono = $this->telefono_us;
        $us_rol = $this->rol;
        $us_email = $this->email;

        $sql = "UPDATE usuario 
                SET 
                    nombre_us='$us_nombre', 
                    apellidos_us='$us_apellidos', 
                    telefono_us='$us_telefono', 
                    rol='$us_rol', 
                    email='$us_email' 
                WHERE id_usuario = {$this->getId()} ";

        $result = $this->db->query($sql);
        if ($result) {
            return array(
                'result' => 'true'
            );
        }
    }

    public function changePassword()
    {
        $sql = "UPDATE usuario SET password='{$this->getPassword()}' WHERE id_usuario='{$this->getId()}'";
        $result = $this->db->query($sql);
        return array(
            'result' => 'true'
        );
    }

    public function getAll()
    {
        $registros = $this->db->query("SELECT * FROM usuario ORDER BY id_usuario DESC");
        return $registros;
    }

    public function getOne()
    {
        $usuario = $this->db->query("SELECT * FROM usuario WHERE id_usuario = {$this->getId()}");
        return $usuario->fetch_object();
    }


    public function status()
    {
        $status = $this->status_us;

        $sql = "UPDATE usuario 
                SET status_us = '$status'
                WHERE id_usuario = {$this->getId()}";
        $response = $this->db->query($sql);

        if ($response) {
            return [
                'result' => 'true',
                'status' => $status
            ];
        }
    }

    public function login()
    {
        $result = false;
        $email = $this->email;
        $password = $this->password;
        // Comprobar si existe el usuario
        $sql = "SELECT * FROM usuario WHERE email = '$email'";
        $login = $this->db->query($sql);
        var_dump($login);
        if ($login && $login->num_rows == 1) {
            $usuario = $login->fetch_object();
            // Verificar la contraseña
            $verify = password_verify($password, $usuario->password);
            if ($verify) {
                $result = $usuario;
            }
        }
        return $result;
    }
}
