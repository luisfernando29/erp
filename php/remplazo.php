<?php
require_once("conexion.php");
class Remplazo extends Conexion{
    
    public function alta($IDmobiliario,$fecha,$costo,$descripcion){
        $this->sentencia = "INSERT INTO remplazo VALUES (null,'$IDmobiliario','$fecha','$costo','$descripcion')";
        $this->ejecutarSentencia();
    }
    public function eliminar ($id){
        $this->sentencia = "DELETE FROM remplazo WHERE IDremplazo=$id";
        $this->ejecutarSentencia();
    }
    public function consulta(){
        $this->sentencia = "SELECT * FROM remplazo";
        return $this->obtenerSentencia();
    }
}
?>