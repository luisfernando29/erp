<form action="" method="post">

	Fecha de inicio: <br>
	<input type="date" name="fechainicio" placeholder="fecha inicio">
	<br>
	Fecha fin: <br>
	<input type="date" name="fechafin" placeholder="Escribe el Id empleado"> <br>
	total: <br>
	<input type="text" name="total" placeholder="total"> <br>
	
	<input type="submit" name="alta" value="Guardar Balance"> 
</form> 

<?php 
require_once("balance.php");
$obj = new Balance();
	if (isset($_POST["alta"])) {
		$fechainicio=$_POST["fechainicio"];
		$fechafin=$_POST["fechafin"];
		$total=$_POST["total"];
		$obj -> alta($fechainicio, $fechafin,$total); 
		echo "<h2>Registrado</h2>";
	}
 ?>

 <table>
 	<tr>
 		<th>fecha de inicio</th>
 		<th>fecha de fin</th>
 		<th>total</th>
 		<th>Eliminar</th>
 		<th>Modificar</th>
 	<?php 
 		$res= $obj-> consulta();
 		while ($fila=$res->fetch_assoc()) {
 			echo "<tr>";
 			echo "<td>".$fila["fechainicio"]."</td>";
 			echo "<td>".$fila["fechafin"]."</td>";
 			echo "<td>".$fila["total"]."</td>";
 		?>	
		<td>
	 		<form action="" method="post">
		 		<input type="hidden" value="<?php echo $fila['IDbalance']?>" name="id">
		 		<input type="submit" name="eliminar" value="eliminar">
	 		</form>
	 	</td>
	 	<td>
	 		<form action="" method="post">
		 		<input type="hidden" value="<?php echo $fila['IDbalance']?>" name="id">
		 		<input type="submit" name="modificar" value="modificar">
	 		</form>
	 	</td>
 	<?php
 			echo "</tr>";
 		}
 	 ?>
 </table>