<?php
require_once("conexion.php");
class Proyecto extends Conexion{
    public function alta($IDproyecto,$nombre_pro,$tipo_pro,$IDempleado,$fecha_in,$fechafin,$descripcion){
        $this->sentencia = "INSERT INTO proyecto VALUES (null,'$nombre_pro','$tipo_pro','$IDempleado','$fecha_in','$fechafin','$descripcion')";
        $this->ejecutarSentencia();
    }
    public function eliminar ($id){
        $this->sentencia = "DELETE FROM proyecto WHERE IDproyecto=$id";
        $this->ejecutarSentencia();
    }
    public function consulta(){
        $this->sentencia = "SELECT * FROM proyecto";
        return $this->obtenerSentencia();
    }
    public function modificar(){

    }
}
?>