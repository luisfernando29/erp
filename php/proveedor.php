<?php
require_once("conexion.php");
class Proveedor extends Conexion{
    public function alta($nombre,$telefono,$direccion,$correo,$rfc){
        $this->sentencia = "INSERT INTO proveedor VALUES (null,'$nombre','$telefono','$direccion','$correo','$rfc')";
        $this->ejecutarSentencia();
    }
    public function baja ($id){
        $this->sentencia = "DELETE FROM proveedor WHERE IDproveedor=$id";
        $this->ejecutarSentencia();
    }
    public function consulta(){
        $this->sentencia = "SELECT * FROM proveedor";
        return $this->obtenerSentencia();
    }
    public function modificar($nombre,$telefono,$direccion,$correo,$rfc,$id){
        $this->sentencia = "UPDATE proveedor SET nombre='$nombre', telefono='$telefono', direccion='$direccion', correo='$correo', rfc='$rfc' WHERE IDproveedor='$id'";
        $this->ejecutarSentencia();
    }
    public function buscar($id){
            $this->sentencia = "SELECT * FROM proveedor WHERE IDproveedor=$id";
            return $this->obtenerSentencia();
        }
}
?>