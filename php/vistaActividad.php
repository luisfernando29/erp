<form action="" method="post">

	<!--Registro: <br>
	<input type="text" name="registro" placeholder="Escribe el registro">
	<br>
	Idusuario: <br>
	<input type="text" name="Id usuario" placeholder="Escribe el Id usuario"> <br>
	movimiento actividad: <br>
	<input type="text" name="movimiento_act" placeholder="Escribe el movimiento"> <br>
	movimiento Tabla: <br>
	<input type="text" name="movimiento_tabla" placeholder="Escribe el movimiento"> <br>

	<input type="submit" name="alta" value="Guardar Actividad"> 
</form>

<?php 
require_once("actividad.php");
$obj = new Actividad();
	if (isset($_POST["alta"])) {
		$registro=$_POST["registro"];
		$IDusuario=$_POST["IDusuario"];
		$movimiento_act=$_POST["movimiento_act"];
		$movimiento_tabla=$_POST["$movimiento_tabla"];
		$obj -> alta($registro,$IDusuario,$movimiento_act,$movimiento_tabla); 
		echo "<h2>Actividad registrada</h2>";
	}
 ?>
-->
 <table>
 	<tr>
 		<th>registro</th>
 		<th>id usuario</th>
 		<th>movimiento actividad</th>
 		<th>movimiento tabla</th>
 	</tr>
 	<?php 
 		$res= $obj-> consulta();
 		while ($fila=$res->fetch_assoc()) {
 			echo "<tr>";
 			echo "<td>".$fila["registro"]."</td>";
 			echo "<td>".$fila["IDusuario"]."</td>";
 			echo "<td>".$fila["movimiento_act"]."</td>";
 			echo "<td>".$fila["movimiento_tabla"]."</td>";
 			echo "</tr>";
 		}
 	 ?>
 </table>