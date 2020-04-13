<div id="grafica">
	<form action="" method="post">
		<input type="hidden" value"asistencia" name="table">
		<input type="submit" name="grafica" value="Graficar">
	</form>
	
</div>
<?php
if (isset($_POST["grafica"])) {
	require_once("php/grafica.php");
}
?>
<form action="" method="post">

	Fecha: <br>
	<input type="date" name="fecha" placeholder="fecha de asistencia">
	<br>
	Id empleado: <br>
	<input type="text" name="IDempleado" placeholder="Escribe el Id empleado"> <br>
	hora: <br>
	<input type="time" name="hora" placeholder="Hora de entrada"> <br>
	
	<input type="submit" name="alta" value="Guardar Asistencia"> 
</form> 

<?php 
require_once("asistencia.php");
$obj = new Asistencia();

	if (isset($_POST["alta"])) {
		$fecha=$_POST["fecha"];
		$IDempleado=$_POST["IDempleado"];
		$hora=$_POST["hora"];
		$obj -> alta($fecha, $IDempleado,$hora); 
		echo "<h2>Asistencia registrada</h2>";
	}
	if (isset($_POST["mod"])) {
		$fecha=$_POST["fecha"];
		$IDempleado=$_POST["IDempleado"];
		$hora=$_POST["hora"];
		$id=$_POST["id"];
		$obj -> modificar($fecha, $IDempleado,$hora,$id);
		echo "<h2>Asistencia modificada</h2>";
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
 		<th>fecha</th>
 		<th>id empleado</th>
 		<th>hora</th>
 		<th>Eliminar</th>
 		<th>Modificar</th>
 	<?php 
 		$res= $obj-> consulta();
 		while ($fila=$res->fetch_assoc()) {
 			echo "<tr>";
 			echo "<td>".$fila["fecha"]."</td>";
 			echo "<td>".$fila["IDempleado"]."</td>";
 			echo "<td>".$fila["hora"]."</td>";
	 		?>	
			<td>
		 		<form action="" method="post">
			 		<input type="hidden" value="<?php echo $fila['IDasistencia']?>" name="id">
			 		<input type="submit" name="eliminar" value="eliminar">
		 		</form>
		 	</td>
		 	<td>
		 		<form action="" method="post">
			 		<input type="hidden" value="<?php echo $fila['IDasistencia']?>" name="id">
			 		<input type="submit" name="modificar" value="modificar">
		 		</form>
		 	</td>
 		<?php
 			echo "</tr>";
 		}
 	 ?>
 </table>