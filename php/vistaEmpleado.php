<form action="" method="post">

	nombre: <br>
	<input type="text" name="nombre" placeholder="nombre"> <br>
	Ape. paterno: <br>
	<input type="text" name="appaterno" placeholder="Ape paterno"> <br>
	Ape. materno: <br>
	<input type="text" name="apmaterno" placeholder="Ape materno"> <br>
	correo: <br>
	<input type="text" name="correo" placeholder="correo electronico"> <br>
	rfc: <br>
	<input type="text" name="rfc" placeholder="rfc"> <br>
	telefono: <br>
	<input type="text" name="telefono" placeholder="telefono"> <br>
	sexo: <br>
	<input type="text" name="sexo" placeholder="sexo"> <br>
	fecha de ingreso: <br>
	<input type="date" name="fechadeingreso" placeholder="Hora de entrada"> <br>
	cargo: <br>
	<input type="text" name="hora" placeholder="cargo"> <br>
	salario: <br>
	<input type="text" name="hora" placeholder="salario"> <br>
	estado civil: <br>
	<input type="text" name="hora" placeholder="estado civil"> <br>
	Nss: <br>
	<input type="text" name="hora" placeholder="numero de seguro social"> <br>
	
	<input type="submit" name="alta" value="Guardar empleado"> 
</form> 

<?php 
require_once("empleado.php");
$obj = new Empleado();

	if (isset($_POST["alta"])) {
		$nombre =$_POST["nombre"];
		$appaterno =$_POST["appaterno"];
		$apmaterno =$_POST["apmaterno"];
		$correo =$_POST["correo"];
		$rfc =$_POST["rfc"];
		$telefono =$_POST["telefono"];
		$sexo =$_POST["sexo"];
		$fechadeingreso =$_POST["fechadeingreso"];
		$cargo =$_POST["cargo"];
		$salario =$_POST["salario"];
		$estadocivil =$_POST["estadocivil"];
		$nss =$_POST["nss"];
		$obj -> alta($nombre,$appaterno,$apmaterno,$correo,$rfc,$telefono,$sexo,$fechadeingreso,$cargo,$salario,$estadocivil,$nss); 
		echo "<h2>Asistencia registrada</h2>";
	}
	if (isset($_POST["mod"])) {
		$nombre =$_POST["nombre"];
		$appaterno =$_POST["appaterno"];
		$apmaterno =$_POST["apmaterno"];
		$correo =$_POST["correo"];
		$rfc =$_POST["rfc"];
		$telefono =$_POST["telefono"];
		$sexo =$_POST["sexo"];
		$fechadeingreso =$_POST["fechadeingreso"];
		$cargo =$_POST["cargo"];
		$salario =$_POST["salario"];
		$estadocivil =$_POST["estadocivil"];
		$nss =$_POST["nss"];
		$id=$_POST["id"];
		$obj -> modificar($nombre,$appaterno,$apmaterno,$correo,$rfc,$telefono,$sexo,$fechadeingreso,$cargo,$salario,$estadocivil,$nss,$id);
		echo "<h2>Asistencia modificado</h2>";
	}
	if (isset($_POST["eliminar"])) {
		echo "<script>
		var opcion = confirm('¿Deseas eliminar la Asistencia?');
		if(opcion===true){
			window.location.href = 'home.php?sec=".$_POST["id"]."';
		}
		</script>";
	}
	if(isset($_GET["el"])){
		$obj->eliminar($_GET["el"]);
		echo"<script>alert";
	}
 ?>

 <table>
 	<tr>
 		<th>nombre</th>
 		<th>appaterno</th>
 		<th>apmaterno</th>
 		<th>correo</th>
 		<th>rfc</th>
 		<th>telefono</th>
 		<th>sexo</th>
 		<th>fechadeingreso</th>
 		<th>cargo</th>
 		<th>salario</th>
 		<th>estadocivil</th>
 		<th>nss</th>
 		<th>Eliminar</th>
 		<th>Modificar</th>
 	<?php 
 		$res= $obj-> consulta();
 		while ($fila=$res->fetch_assoc()) {
 			echo "<tr>";
 			echo "<td>".$fila["nombre"]."</td>";
 			echo "<td>".$fila["appaterno"]."</td>";
 			echo "<td>".$fila["apmaterno"]."</td>";
 			echo "<td>".$fila["correo"]."</td>";
 			echo "<td>".$fila["rfc"]."</td>";
 			echo "<td>".$fila["telefono"]."</td>";
 			echo "<td>".$fila["sexo"]."</td>";
 			echo "<td>".$fila["fechadeingreso"]."</td>";
 			echo "<td>".$fila["cargo"]."</td>";
 			echo "<td>".$fila["salario"]."</td>";
 			echo "<td>".$fila["estadocivil"]."</td>";
 			echo "<td>".$fila["nss"]."</td>";
 			?>	
		<td>
	 		<form action="" method="post">
		 		<input type="hidden" value="<?php echo $fila['IDempleado']?>" name="id">
		 		<input type="submit" name="eliminar" value="eliminar">
	 		</form>
	 	</td>
	 	<td>
	 		<form action="" method="post">
		 		<input type="hidden" value="<?php echo $fila['IDempleado']?>" name="id">
		 		<input type="submit" name="modificar" value="modificar">
	 		</form>
	 	</td>
 	<?php
 			echo "</tr>";
 		}
 	 ?>
 </table>