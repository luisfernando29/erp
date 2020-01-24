<?php 
	require_once("conexion.php");
	class Actividad extends Conexion{

		public function alta($registro, $movimiento_act, $movimiento_tabla){
			$this-> sentencia= "INSERT INTO  actividad VALUES(null, '$registro', '$movimiento_act', '$pmovimiento_tabla')";
			$this->ejecutarSentencia();
		}

		public function eliminar ($id){
			$this->sentencia = "DELETE FROM actividad WHERE IDactividad=$id";
			$this->ejecutarSentencia();
		}

		public function consulta(){
			$this->sentencia="SELECT * FROM actividad";
			return $this->obtenerSentencia();	
		}

	}
 ?>