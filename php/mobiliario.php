<?php
require_once("conexion.php");
class Mobiliario extends Conexion{

    public function alta($nombre,$descripcion,$cantidad,$nic,$tipo){
        $this->sentencia = "INSERT INTO mobiliario VALUES (null,'$nombre','$descripcion','$cantidad','$nic','$tipo')";
        $this->ejecutarSentencia();
    }
    public function eliminar ($id){
        $this->sentencia = "DELETE FROM mobiliario WHERE IDmobiliario=$id";
        $this->ejecutarSentencia();
    }
    public function consulta(){
        $this->sentencia = "SELECT * FROM mobiliario";
        return $this->obtenerSentencia();
    }
    public function modificar($nombre,$descripcion,$cantidad,$nic,$tipo){
        $this->sentencia = "UPDATE FROM mobiliario SET nombre='$nombre', descripcion='$descripcion', cantidad='$cantidad', nic='$nic', tipo='$tipo' WHERE IDmobiliario='$id'";
    }
}
?>