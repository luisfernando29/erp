<form action="" method="post">

	Id materia prima: <br>
	<input type="text" name="IDmateriaPrima" placeholder="id materia prima">
	<br>
	Id compra: <br>
	<input type="text" name="IDcompra" placeholder="Escribe el Id compra"> <br>
	cantidad: <br>
	<input type="text" name="cantidad" placeholder="cantidad"> <br>
	
	<input type="submit" name="alta" value="Guardar detalle de compra"> 
</form> 

<?php 
require_once("detalleCompra.php");
$obj = new detalleCompra();
	if (isset($_POST["alta"])) {
		$IDmateriaPrima=$_POST["IDmateriaPrima"];
		$IDcompra=$_POST["IDcompra"];
		$cantidad=$_POST["cantidad"];
		$obj -> alta($IDmateriaPrima, $IDcompra,$cantidad); 
		echo "<h2>detalle registrado</h2>";
	}
 ?>

 <table>
 	<tr>
 		<th>id materia prima</th>
 		<th>id compra</th>
 		<th>cantidad</th>
 		<th>Eliminar</th>
 		<th>Modificar</th>
 	</tr>

 	<?php 
 		$res= $obj-> consulta();
 		while ($fila=$res->fetch_assoc()) {
 			echo "<tr>";
 			echo "<td>".$fila["IDmateriaPrima"]."</td>";
 			echo "<td>".$fila["IDcompra"]."</td>";
 			echo "<td>".$fila["cantidad"]."</td>";
 		?>	
		<td>
	 		<form action="" method="post">
		 		<input type="hidden" value="<?php echo $fila['IDdetallecompra']?>" name="id">
		 		<input type="submit" name="eliminar" value="eliminar">
	 		</form>
	 	</td>
	 	<td>
	 		<form action="" method="post">
		 		<input type="hidden" value="<?php echo $fila['IDdetallecompra']?>" name="id">
		 		<input type="submit" name="modificar" value="modificar">
	 		</form>
	 	</td>
 	<?php
 			echo "</tr>";
 		}
 	 ?>
 </table>