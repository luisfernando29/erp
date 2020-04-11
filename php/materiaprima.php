<?php
require_once("conexion.php");
class Manriaprima extends Conexion{
    public function alta($nombre,$tipo,$descripcion,$precio,$precio,$stock,$existencias){
        $this->sentencia="INSERT INTO manteriaprima VALUES (null,'$nombre','$tipo','$descripcion','$precio','$precio','$stock','$existencias')";
        $this->ejecutarSentencia();
        
        public function eliminar ($id){
            $this->sentencia = "DELETE FROM materiaprima WHERE IDmateriaprima=$id";
            $this->ejecutarSentencia();
        }
        public function consulta(){
            $this->sentencia = "SELECT * FROM materiaprima";
            return $this->obtenerSentencia();
        }
    }
}
?>