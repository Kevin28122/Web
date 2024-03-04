<?php
class ProductoModel
{
    private $pdo;
    public function __construct()
    {
        require_once("C:/xampp/htdocs/PiedraSports/config/db.php");
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getProductos()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM productos ORDER BY id asc");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function setProducto($nombre, $precio, $marca, $descripcion)
    {
        $stmt = $this->pdo->prepare("INSERT INTO productos VALUES(null, :nombre, :precio, :marca, :descripcion)");
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":marca", $marca);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->execute();
    }
    public function updateProducto($id, $nombre, $precio, $marca, $descripcion)
    {
        $stmt = $this->pdo->prepare("UPDATE productos SET nombre = :nombre, precio = :precio, marca = :marca, descripcion = :descripcion WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":marca", $marca);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->execute();
    }

    public function deleteProducto($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM productos WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}