<?php 
	require_once("conexion.php");
	class Usuario extends Conexion{
		
		public function alta($nombre, $tipo, $password){
			$this-> sentencia= "INSERT INTO  usuario VALUES(null, '$nombre', '$tipo', '$password')";
			$this->ejecutarSentencia();
		}

		public function eliminar ($id){
			$this->sentencia = "DELETE FROM usuario WHERE IDusuario=$id";
			$this->ejecutarSentencia();
		}

		public function consulta(){
			$this->sentencia="SELECT * FROM usuario";
			return $this->obtenerSentencia();
		}

		public function buscar($id){
			$this->sentencia="SELECT * FROM usuario WHERE IDusuario=$id";
			return $this->obtenerSentencia();
		}

		public function modificar ($nombre, $tipo, $password){
			$this->sentencia="UPDATE usuario SET nombre='$nombre', tipo='$tipo', password='$password' WHERE IDusuario='$id'";
			$this->ejecutarSentencia();
		}

		public function comprobar($u,$p){
			$this->sentencia="SELECT * FROM usuario WHERE nombre='$u' AND password='$p'";
			$res=$this->obtenerSentencia();
			if ($res->num_rows==1) {
				return true;
			}else{
				return false;
			}
		}
	}

 ?>