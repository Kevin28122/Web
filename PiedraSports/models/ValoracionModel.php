<?php
class ValoracionModel
{
    private $pdo;
    public function __construct()
    {
        require_once("C:/xampp/htdocs/PiedraSports/config/db.php");
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getValoraciones()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM valoraciones ORDER BY id asc");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function setValoracion($numero, $descripcion, $pedido)
    {
        $stmt = $this->pdo->prepare("INSERT INTO valoraciones VALUES(null, :numero, :descripcion, :pedido)");
        $stmt->bindParam(":numero", $numero);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":pedido", $pedido);
        $stmt->execute();
    }

    public function updateValoracion($id, $numero, $descripcion, $pedido)
    {
        $stmt = $this->pdo->prepare("UPDATE valoraciones SET numero = :numero, descripcion = :descripcion, pedido = :pedido WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":numero", $numero);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":pedido", $pedido);
        $stmt->execute();
    }

    public function deleteValoracion($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM valoraciones WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}