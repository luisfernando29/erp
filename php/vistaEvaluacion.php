<form action="" method="post">

	tipo: <br>
	<input type="text" name="tipo" placeholder="Escribe el tipo de respuesta">
	<br>
	pregunta 1: <br>
	<input type="text" name="pregunta1" placeholder="pregunta?"> <br>
	pregunta 2: <br>
	<input type="text" name="pregunta2" placeholder="pregunta?"> <br>
	pregunta 3: <br>
	<input type="text" name="pregunta3" placeholder="pregunta?"> <br>
	pregunta 4: <br>
	<input type="text" name="pregunta4" placeholder="pregunta?"> <br>
	pregunta 5: <br>
	<input type="text" name="pregunta5" placeholder="pregunta?"> <br>
	pregunta 6: <br>
	<input type="text" name="pregunta6" placeholder="pregunta?"> <br>
	pregunta 7: <br>
	<input type="text" name="pregunta7" placeholder="pregunta?"> <br>
	pregunta 8: <br>
	<input type="text" name="pregunta8" placeholder="pregunta?"> <br>
	pregunta 9: <br>
	<input type="text" name="pregunta9" placeholder="pregunta?"> <br>
	pregunta 10: <br>
	<input type="text" name="pregunta10" placeholder="pregunta?"> <br>

	<input type="submit" name="alta" value="Guardar Evaluacion"> 
</form>

<?php 
require_once("evaluacion.php");
$obj = new evaluacion();
	if (isset($_POST["alta"])) {
		$tipo=$_POST["tipo"];
		$pregunta1 =$_POST["pregunta1"];
		$pregunta2 =$_POST["pregunta2"];
		$pregunta3 =$_POST["pregunta3"];
		$pregunta4 =$_POST["pregunta4"];
		$pregunta5 =$_POST["pregunta5"];
		$pregunta6 =$_POST["pregunta6"];
		$pregunta7 =$_POST["pregunta7"];
		$pregunta8 =$_POST["pregunta8"];
		$pregunta9 =$_POST["pregunta9"];
		$pregunta10 =$_POST["pregunta10"];
		$obj -> alta($tipo,$pregunta1,$pregunta2,$pregunta3,$pregunta4,$pregunta5,$pregunta6,$pregunta7,$pregunta8,$pregunta9,$pregunta10); 
		echo "<h2>evaluacion registrada</h2>";
	}
 ?>
-->
 <table>
 	<tr>
 		<th>tipo</th>
 		<th>pregunta1</th>
 		<th>pregunta2</th>
 		<th>pregunta3</th>
 		<th>pregunta4</th>
 		<th>pregunta5</th>
 		<th>pregunta6</th>
 		<th>pregunta7</th>
 		<th>pregunta8</th>
 		<th>pregunta9</th>
 		<th>pregunta10</th>
 		<th>Eliminar</th>
 		<th>Modificar</th>
  	<?php 
 		$res= $obj-> consulta();
 		while ($fila=$res->fetch_assoc()) {
 			echo "<tr>";
 			echo "<td>".$fila["tipo"]."</td>";
 			echo "<td>".$fila["pregunta1"]."</td>";
 			echo "<td>".$fila["pregunta2"]."</td>";
 			echo "<td>".$fila["pregunta3"]."</td>";
 			echo "<td>".$fila["pregunta4"]."</td>";
 			echo "<td>".$fila["pregunta5"]."</td>";
 			echo "<td>".$fila["pregunta6"]."</td>";
 			echo "<td>".$fila["pregunta7"]."</td>";
 			echo "<td>".$fila["pregunta8"]."</td>";
 			echo "<td>".$fila["pregunta9"]."</td>";
 			echo "<td>".$fila["pregunta10"]."</td>";
 			?>	
		<td>
	 		<form action="" method="post">
		 		<input type="hidden" value="<?php echo $fila['IDevaluación']?>" name="id">
		 		<input type="submit" name="eliminar" value="eliminar">
	 		</form>
	 	</td>
	 	<td>
	 		<form action="" method="post">
		 		<input type="hidden" value="<?php echo $fila['IDevaluación']?>" name="id">
		 		<input type="submit" name="modificar" value="modificar">
	 		</form>
	 	</td>
 	<?php
 			echo "</tr>";
 		}
 	 ?>
 </table>