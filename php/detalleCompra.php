<?php 
	require_once("conexion.php");
	class DetalleCompra extends Conexion{
		
		public function alta($IDmateriaprima,$IDcompra,$cantidad){
			$this-> sentencia= "INSERT INTO  detalle_compra VALUES(null,'$IDmateriaprima','$IDcompra','$cantidad')";
			$this->ejecutarSentencia();
		}

		public function eliminar ($id){
			$this->sentencia = "DELETE FROM detalle_compra WHERE IDdetallecompra=$id";
			$this->ejecutarSentencia();
		}

		public function consulta(){
			$this->sentencia="SELECT * FROM detalle_compra";
			return $this->obtenerSentencia();
		}

		public function modificar ($IDmateriaprima,$IDcompra,$cantidad){
			$this->sentencia= "UPDATE FROM detalle_compra SET IDmateriaprima='$IDmateriaprima',IDcompra='$IDcompra',cantidad='$cantidad' WHERE IDdetallecompra='$id'";
			$this->ejecutarSentencia();
		}

	}


 ?>