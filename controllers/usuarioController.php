<?php
require_once 'models/usuario.php';

class UsuarioController
{
    public function index()
    {
        require_once 'layout/login.php';
    }

    public function home()
    {
        require_once 'layout/header.php';
        require_once 'layout/sidebar.php';
        require_once 'layout/footer.php';
    }

    public function gestion()
    {
        //Utils::IsActive();
        $usuarios = new Usuario();
        $registros = $usuarios->getAll();
        require_once 'layout/header.php';
        require_once 'layout/sidebar.php';
        require_once 'views/personal/gestion.php';
    }

    public function registro()
    {
        require_once 'layout/header.php';
        require_once 'layout/sidebar.php';
        require_once 'views/personal/registro.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? filter_var($_POST['nombre'], FILTER_SANITIZE_STRING) : false;
            $apellidos = isset($_POST['apellidos']) ? filter_var($_POST['apellidos'], FILTER_SANITIZE_STRING) : false;
            $telefono = isset($_POST['telefono']) ? filter_var($_POST['telefono'], FILTER_SANITIZE_STRING) : false;
            $rol = isset($_POST['rol']) ? filter_var($_POST['rol'], FILTER_SANITIZE_STRING) : false;
            $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : false;
            $password = isset($_POST['password']) ? filter_var($_POST['password'], FILTER_SANITIZE_STRING) : false;
            $usuario = new Usuario();
            $usuario->setNombreUs($nombre);
            $usuario->setApellidosUs($apellidos);
            $usuario->setTelefonoUs($telefono);
            $usuario->setRol($rol);
            $usuario->setEmail($email);
            $usuario->setPassword($password);

            if ($_POST['action'] == 'edit') {
                $id = filter_var($_POST['id_usuario'], FILTER_SANITIZE_NUMBER_INT);
                $usuario->setId($id);
                $save = $usuario->edit();
            } elseif ($_POST['action'] == 'create') {
                $save = $usuario->save();
            }
            if ($save) {
                $_SESSION['registro'] = 'complete';
            } else {
                $_SESSION['registro'] = 'failed';
            }

        } else {
            $_SESSION['registro'] = 'failed';
        }
        //header('Location:' . base_url . 'usuario/registros');
        echo json_encode($save);
    }

    public function changePassword()
    {
        if (isset($_POST)) {
            $id = isset($_POST['idUser']) ? filter_var($_POST['idUser'], FILTER_SANITIZE_NUMBER_INT) : false;
            $pass = isset($_POST['pass']) ? filter_var($_POST['pass'], FILTER_SANITIZE_STRING) : false;
            $newpass = isset($_POST['newpass']) ? filter_var($_POST['newpass'], FILTER_SANITIZE_STRING) : false;

            if ($pass == $newpass) {
                $new_pass = new Usuario();
                $new_pass->setId($id);
                $new_pass->setPassword($pass);
                $data = $new_pass->changePassword();
            }
        }
        echo json_encode($data);
    }

    public function editar()
    {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $edit = true;
            $usuario = new Usuario();
            $usuario->setId($id);
            $data = $usuario->getOne();
        } else {
            header('Location:' . base_url . 'usuario/registros');
        }
        require_once 'layout/header.php';
        require_once 'layout/sidebar.php';
        require_once 'views/personal/registro.php';
    }

    public function estado()
    {
        if (isset($_POST['status'])) {
            $status = $_POST['status'];
            $id = $_POST['id'];
            $usuario = new Usuario();
            $usuario->setStatusUs($status);
            $usuario->setId($id);
            $data = $usuario->status();
        }
        echo json_encode($data);
    }

    public function login()
    {
        if (isset($_POST)) {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            $pass = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            $usuario = new Usuario();
            $usuario->setEmail($email);
            $usuario->setPassword($pass);

            $identity = $usuario->login();
            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;

                if ($identity->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
                header('Location:' . base_url . 'usuario/home');
            } else {
                $_SESSION['error_login'] = 'Identificacion fallida';
                header("Location:" . base_url);
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        if (isset($_SESSION['ingreso'])) {
            unset($_SESSION['ingreso']);
        }
        header("Location:" . base_url);
    }
}
