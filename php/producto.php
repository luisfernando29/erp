<?php
require_once("conexion.php");
class Producto extends Conexion{
    public function nombres($nombre,$campo){
            $this->sentencia = "SELECT $campo FROM $nombre";
            $res = $this->obtenerSentencia();
            $nombres="";
            while($fila = $res->fetch_assoc()){
                $nombres=$nombres."'".$fila[$campo]."',";
            }
            return $nombres;
    }
    public function cantidades($nombre,$campo){
        $this->sentencia = "SELECT $campo FROM $nombre";
        $res = $this->obtenerSentencia();
        $nombres="";
        while($fila = $res->fetch_assoc()){
            $nombres=$nombres."".$fila[$campo].",";
        }
        return $nombres;
}
    public function alta($nombre,$descripcion,$preciov,$precioc,$cantidad,$cantadmin,$cantmax,$categoria){
        $this->sentencia = "INSERT INTO producto VALUES (null,'$nombre','$descripcion','$preciov','$precioc','$cantidad','$cantadmin','$cantmax','$categoria')";
        $this->ejecutarSentencia();
    }
    public function eliminar ($id){
        $this->sentencia = "DELETE FROM producto WHERE Iproveedor=$id";
        $this->ejecutarSentencia();
    }
    public function consulta(){
        $this->sentencia = "SELECT * FROM producto";
        return $this->obtenerSentencia();
    }
    public function modificar($nombre,$descripcion,$preciov,$precioc,$cantidad,$cantmin,$cantmax,$categoria){
        $this->sentencia = "UPDATE FROM producto SET nombre='$nombre', descripcion='$descripcion', preciov='$preciov', precioc='$precioc', cantidad='$cantidad', cantidadmin= '$cantidadmin', cantidadmax='$cantidadmax', categoria='$categoria' WHERE IDproveedor='$id'";
    }
}
?>