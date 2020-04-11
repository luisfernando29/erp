<?php
require_once("conexion.php");
class Pedido extends Conexion{
    public function alta($fecha,$IDcliente,$precio,$cantidad,$direccion,$IDproducto){
        $this->sentencia = "INSERT INTO pedido VALUES (null,'$fecha','$IDcliente','$precio','$direccion','$IDproducto')";
        $this->ejecutarSentencia();
    }
    public function eliminar ($id){
        $this->sentencia = "DELETE FROM pedido WHERE IDpedido=$id";
        $this->ejecutarSentencia();
    }
    public function consulta(){
        $this->sentencia = "SELECT * FROM pedido";
        return $this->obtenerSentencia();
    }
    public function modificar($fecha,$IDcliente,$precio,$direccion,$IDproducto){
        $this->sentencia = "UPDATE FROM pedido SET fecha='$fecha', IDcliente='$IDcliente', precio='$precio', direccion='$direccion', IDproducto='$IDproducto' WHERE IDproveedor='$id'";
    }
}
?>