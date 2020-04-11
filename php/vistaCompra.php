<form action="" method="post">

	Fecha: <br>
	<input type="date" name="fecha"> <br>
	Total: <br>
	<input type="text" name="total"> <br>
	Tipo de pago: <br>
	<input type="text" name="tipoPago" placeholder="tipo de pago"> <br>
	Id cliente: <br>
	<input type="text" name="IDcliente" placeholder="ID del cliente"> <br>
	
	<input type="submit" name="alta" value="Guardar Compra"> 
</form> 

<?php 
require_once("compra.php");
$obj = new Compra();
	if (isset($_POST["alta"])) {
		$fecha=$_POST["fecha"];
		$total=$_POST["total"];
		$tipoPago=$_POST["tipoPago"];
		$IDcliente=$_POST["IDcliente"];
		$obj -> alta($fecha,$total,$tipoPago,$IDcliente); 
		echo "<h2>Compra registrada</h2>";
	}
 ?>

 <table>
 	<tr>
 		<th>fecha</th>
 		<th>total</th>
 		<th>tipo de pago</th>
 		<th>Id cliente</th>
 		<th>Eliminar</th>
 		<th>Modificar</th>
 	<?php 
 		$res= $obj-> consulta();
 		while ($fila=$res->fetch_assoc()) {
 			echo "<tr>";
 			echo "<td>".$fila["fecha"]."</td>";
 			echo "<td>".$fila["total"]."</td>";
 			echo "<td>".$fila["tipoPago"]."</td>";
 			echo "<td>".$fila["IDcliente"]."</td>";
 		?>	
		<td>
	 		<form action="" method="post">
		 		<input type="hidden" value="<?php echo $fila['IDcompra']?>" name="id">
		 		<input type="submit" name="eliminar" value="eliminar">
	 		</form>
	 	</td>
	 	<td>
	 		<form action="" method="post">
		 		<input type="hidden" value="<?php echo $fila['IDcompra']?>" name="id">
		 		<input type="submit" name="modificar" value="modificar">
	 		</form>
	 	</td>
 	<?php
 			echo "</tr>";
 		}
 	 ?>
 </table>