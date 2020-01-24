<?php 
	require_once("conexion.php");
	class Jornada extends Conexion{
		
		public function alta($hrs_trabajadas, $dias_trabajados, $pago_hora, $horas_extra, $bonos){
			$this-> sentencia= "INSERT INTO  jornada VALUES(null, '$hrs_trabajadas', '$dias_trabajados', '$pago_hora', '$horas_extra', '$bonos')";
			$this->ejecutarSentencia();
		}

		public function eliminar ($id){
			$this->sentencia = "DELETE FROM jornada WHERE IDjornada=$id";
			$this->ejecutarSentencia();
		}

		public function consulta(){
			$this->sentencia="SELECT * FROM jornada";
			return $this->obtenerSentencia();
			
		}

	}


 ?>