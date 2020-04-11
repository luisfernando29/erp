<?php 
	require_once("conexion.php");
	class Jornada extends Conexion{
		
		public function alta($hrs_trabajadas, $dias_trabajados, $pago_hora, $horas_extra, $bonos, $IDempleado){
			$this-> sentencia= "INSERT INTO  jornada VALUES(null, '$hrs_trabajadas', '$dias_trabajados', '$pago_hora', '$horas_extra', '$bonos', '$IDempleado')";
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

		public function modificar ($hrs_trabajadas, $dias_trabajados, $pago_hora, $horas_extra, $bonos, $IDempleado){
			$this->sentencia= "UPDATE FROM jornada SET hrs_trabajadas='$hrs_trabajadas', dias_trabajados='$dias_trabajados', pago_hora='$pago_hora', horas_extra='$horas_extra', bonos='$bonos', IDempleado='$IDempleado' WHERE IDjornada='$id'";
			$this->ejecutarSentencia();
		}

	}


 ?>