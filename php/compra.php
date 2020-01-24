<?php 
	require_once("conexion.php");
	class Compra extends Conexion{
		
		public function alta($fecha, $total, $tipo_pago){
			$this-> sentencia= "INSERT INTO  compra VALUES(null, '$fecha', '$total', '$tipo_pago')";
			$this->ejecutarSentencia();
		}

		public function eliminar ($id){
			$this->sentencia = "DELETE FROM compra WHERE IDcompra=$id";
			$this->ejecutarSentencia();
		}

		public function consulta(){
			$this->sentencia="SELECT * FROM compra";
			return $this->obtenerSentencia();
			
		}

	}


 ?>