<?php
require_once("conexion.php");
class Pago extends Conexion{
    public function alta($IDempleado,$sal,$fecha_dep,$met_pag,$des){
        $this->sentencia = "INSERT INTO pago VALUES (null,'$IDempleado','$sal','$fecha_dep','$met_dep','$des')";
        $this->ejecutarSentencia();
    }
    public function eliminar ($id){
        $this->sentencia = "DELETE FROM pago WHERE IDpago=$id";
        $this->ejecutarSentencia();
    }
    public function consulta(){
        $this->sentencia = "SELECT * FROM pago";
        return $this->obtenerSentencia();
    }
    public function modificar($IDempleado,$sal,$fecha_dep,$met_pag,$des){
        $this->sentencia = "UPDATE FROM pago SET IDempleado='$IDempleadp', sal='$sal', fecha_dep='$fecha_dep', met_pag='$met_pag', des='$des' WHERE IDpago='$id'";
    }
}
?>