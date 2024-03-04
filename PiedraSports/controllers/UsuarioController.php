<?php
class UsuarioModel
{
    private $model;

    public function __construct()
    {
        include_once  "C:/xampp/htdocs/PiedraSports/model/UsuarioModel.php";
        $this->model = new UsuarioModel();
    }

    public function setUsuario($nombre, $contrasena, $rol)
    {
        if ($nombre == null || $contrasena == null || $rol == null) {
            echo'
            <script>alert("Completa los campos para poder registrar el usuario");
            window.location = "../views/interfaces/form-usuario.php";
            </script>
            ';
            exit;
        } else {
            $this->model->setUsuario($nombre, $contrasena, $rol);
            echo'
            <script>alert("Usuario registrado Correctamente");
            window.location = "../views/interfaces/form-usuario.php";
            </script>
            ';
        }
    }

    public function updateUsuario($nombre, $contrasena)
    {
        $this->model->updateUsuario($nombre, $contrasena);
        echo'
        <script>alert("Usuario actualizado Correctamente");
        window.location = "../views/interfaces/form-usuario.php";
        </script>
        ';
    }

    public function ObtenerPorNom($nombre)
    {
        return $this->model->ObtenerPorNom($nombre);
    }

    public function getUsuarios()
    {
        return $this->getUsuarios();
    }

    public function deleteUsuario($nombre)
    {
        $this->model->deleteUsuario($nombre);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $UsuarioController = new UsuarioController();
    if($_GET['action'] == 'Crear') {
        $nombre = $_POST['nombre'];
        $contrasena = $_POST['contrasena'];
        $rol = $_POST['rol'];
        $UsuarioController->setUsuario($nombre, $contrasena);

        exit;
    }

    if($_GET['action'] == 'Modificar') {
        $nombre = $_POST['nombre'];
        $contrasena = $_POST['contrasena'];
        $UsuarioController->updateUsuario($nombre, $contrasena);

        exit;
    }
}

if (!empty($_GET['nombre'])) {
    $UsuarioController = new UsuarioController();
    $resultado = $UsuarioController->deleteUsuario($_GET['nombre']);
    if($resultado != 0) {
        echo'
        <script>alert("Error");
        window.location = "../interfaces/form-usuario.php";
        </script>
        ';
    } else {
        echo'
        <script>alert("Usuario eliminado Correctamente");
        window.location = "../interfaces/form-usuario.php";
        </script>
        ';
    }
}

if (!empty($_GET['nombre'])) {
    $UsuarioController = new UsuarioController();
    $resultado = $UsuarioController->ObtenerPorNom($_GET['nombre']);
}