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
 ?>

 <table>
 	<tr>
 		<th>fecha</th>
 		<th>id empleado</th>
 		<th>hora</th>
 	</tr>
 	<?php 
 		$res= $obj-> consulta();
 		while ($fila=$res->fetch_assoc()) {
 			echo "<tr>";
 			echo "<td>".$fila["fecha"]."</td>";
 			echo "<td>".$fila["IDempleado"]."</td>";
 			echo "<td>".$fila["hora"]."</td>";
 			echo "</tr>";
 		}
 	 ?>
 </table>