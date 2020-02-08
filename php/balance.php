<?php 
	require_once("conexion.php");
	class Balance extends Conexion{
		
		public function alta($fechainicio, $fechafin, $total){
			$this-> sentencia= "INSERT INTO  balance VALUES(null, '$fechainicio', '$fechafin', '$total')";
			$this->ejecutarSentencia();
		}

		public function eliminar ($id){
			$this->sentencia = "DELETE FROM balance WHERE IDbalance=$id";
			$this->ejecutarSentencia();
		}

		public function consulta(){
			$this->sentencia="SELECT * FROM balance";
			return $this->obtenerSentencia();
		}

		public function modificar ($fecha,$IDempleado,$hora){
			$this->sentencia= "UPDATE FROM balance SET fechainicio='$fechainicio', fechafin='$fechafin', total='$total' WHERE IDbalance='$id'";
			$this->ejecutarSentencia();
		}

	}


 ?>