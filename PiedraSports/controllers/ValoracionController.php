<?php
class ValoracionModel
{
    private $model;

    public function __construct()
    {
        include_once  "C:/xampp/htdocs/PiedraSports/model/ValoracionModel.php";
        $this->model = new ValoracionModel();
    }

    public function setValoracion($numero, $descripcion, $pedido)
    {
        if($numero == null || $descripcion == null || $pedido == null){
            echo'
            <script>alert("Completa los campos para poder registrar la valoracion");
            window.location = "../views/interfaces/form-valoracion.php";
            </script>
            ';
            exit;
        }else {
            $this->model->setValoracion($numero, $descripcion, $pedido);
            echo'
            <script>alert("Valoracion registrada Correctamente");
            window.location = "../views/interfaces/form-valoracion.php";
            </script>
            ';
        }
    }

    public function updateValoracion($id, $numero, $descripcion, $pedido)
    {
        $this->model->updateValoracion($id, $numero, $descripcion, $pedido);
        echo'
        <script>alert("Valoracion actualizada Correctamente");
        window.location = "../views/interfaces/form-valoracion.php";
        </script>
        ';
    }

    public function getValoracion()
    {
        return $this->getValoracion()
    }

    public function deleteValoracion($id)
    {
        return $this->model->deleteValoracion($id);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ValoracionController = new ValoracionController();
    if($_GET['action'] == 'Crear'){
        $numero = $_POST['numero'];
        $descripcion = $_POST['descripcion'];
        $pedido = $_POST['pedido'];
        $ValoracionController->setValoracion($numero, $descripcion, $pedido);

        exit;
    } 

    if ($_GET['action'] == 'Modificar'){
        $id = $_POST['id'];
        $numero = $_POST['numero'];
        $descripcion = $_POST['descripcion'];
        $pedido = $_POST['pedido'];
        $ValoracionController->setValoracion($id, $numero, $descripcion, $pedido);

        exit;
    }
}

if (!empty($_GET['id'])){
    $ValoracionController = new ValoracionController();
    $resultado = $ValoracionController->deleteValoracion($_GET['id']);
    if ($resultado != 0){
        echo'
        <script>alert("Error");
        window.location = "../interfaces/form-valoracion.php";
        </script>
        ';
    }else {
        echo'
        <script>alert("Valoracion eliminada Correctamente");
        window.location = "../interfaces/form-valoracion.php";
        </script>
        ';
    }
}