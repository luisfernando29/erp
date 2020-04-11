<form action="" method="post">

	Nombre: <br>
	<input type="text" name="nombre" placeholder="nombre del cliente">
	<br>
	Direccion: <br>
	<input type="text" name="direccion" placeholder="Escribe la direccion del cliente"> <br>
	Telefono: <br>
	<input type="text" name="telefono" placeholder="telefono del cliente"> <br>
	Correo: <br>
	<input type="text" name="correo" placeholder="correo"> <br>
	Apellido Materno: <br>
	<input type="text" name="apematerno" placeholder="Apellido Materno"> <br>
	Apellido Paterno: <br>
	<input type="text" name="apepaterno" placeholder="Apellido Paterno"> <br>
	Sexo: <br>
	<input type="text" name="sexo" placeholder="Sexo"> <br>
	Fecha de nacimiento: <br> <br>
	<input type="date" name="fechanacimiento"> <br>
		
	<br><input type="submit" name="alta" value="Guardar Cliente"> 
</form> 

<?php 
require_once("cliente.php");
$obj = new Cliente();
	if (isset($_POST["alta"])) {
		$nombre=$_POST["nombre"];
		$direccion=$_POST["direccion"];
		$telefono=$_POST["telefono"];
		$correo=$_POST["correo"];
		$apematerno=$_POST["apematerno"];
		$apepaterno=$_POST["apepaterno"];
		$sexo=$_POST["sexo"];
		$fechanacimiento=$_POST["fechanacimiento"];
		$obj -> alta($nombre,$direccion,$telefono,$correo,$apematerno,$apepaterno,$sexo,$fechanacimiento); 
		echo "<h2>Cliente registrado</h2>";
	}
 ?>

 <table>
 	<tr>
 		<th>nombre</th>
 		<th>direccion</th>
 		<th>telefono</th>
 		<th>correo</th>
 		<th>Ap. materno</th>
 		<th>Ap. paterno</th>
 		<th>sexo</th>
 		<th>fecha de nacimiento</th>
 		<th>Eliminar</th>
 		<th>Modificar</th> 
 	</tr>	
 	<?php 
 		$res= $obj-> consulta();
 		while ($fila=$res->fetch_assoc()) {
 			echo "<tr>";
 			echo "<td>".$fila["nombre"]."</td>";
 			echo "<td>".$fila["direccion"]."</td>";
 			echo "<td>".$fila["telefono"]."</td>";
 			echo "<td>".$fila["correo"]."</td>";
 			echo "<td>".$fila["apematerno"]."</td>";
 			echo "<td>".$fila["apepaterno"]."</td>";
 			echo "<td>".$fila["sexo"]."</td>";
 			echo "<td>".$fila["fechanacimiento"]."</td>";
 		?>	
		<td>
	 		<form action="" method="post">
		 		<input type="hidden" value="<?php echo $fila['IDcliente']?>" name="id">
		 		<input type="submit" name="eliminar" value="eliminar">
	 		</form>
	 	</td>
	 	<td>
	 		<form action="" method="post">
		 		<input type="hidden" value="<?php echo $fila['IDcliente']?>" name="id">
		 		<input type="submit" name="modificar" value="modificar">
	 		</form>
	 	</td>
 	<?php
 			echo "</tr>";
 		}
 	 ?>
 </table>