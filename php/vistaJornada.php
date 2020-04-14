<form action="" method="post">

	hhrs_trabajadas: <br>
	<input type="text" name="hrs_trabajadas" placeholder="hrs trabajadas">
	<br>
	dias_trabajados: <br>
	<input type="text" name="dias_trabajados" placeholder="dias trabajados"> <br>
	pago_hora: <br>
	<input type="text" name="pago_hora" placeholder="pago por hora"> <br>
	horas_extra: <br>
	<input type="text" name="horas_extra" placeholder="numero de hrs extra"> <br>
	bonos: <br>
	<input type="text" name="bonos" placeholder="bonos"> <br>
	IDempleado: <br>
	<input type="text" name="IDempleado" placeholder="IDempleado"> <br>

	<input type="submit" name="alta" value="Guardar jornada"> 
</form>

<?php 
require_once("jornada.php");
$obj = new jornada();

	if (isset($_POST["alta"])) {
		$hrs_trabajadas=$_POST["hrs_trabajadas"];
		$dias_trabajados=$_POST["dias_trabajados"];
		$pago_hora=$_POST["pago_hora"];
		$horas_extra=$_POST["horas_extra"];
		$bonos=$_POST["bonos"];
		$IDempleado=$_POST["IDempleado"];
		$obj -> alta($hrs_trabajadas,$dias_trabajados,$pago_hora,$horas_extra,$bonos,$IDempleado); 
		echo "<h2>Jornada registrada</h2>";
	}
	if (isset($_POST["mod"])) {
		$hrs_trabajadas=$_POST["hrs_trabajadas"];
		$dias_trabajados=$_POST["dias_trabajados"];
		$pago_hora=$_POST["pago_hora"];
		$horas_extra=$_POST["horas_extra"];
		$bonos=$_POST["bonos"];
		$IDempleado=$_POST["IDempleado"];
		$id=$_POST["id"];
		$obj -> modificar($hrs_trabajadas,$dias_trabajados,$pago_hora,$horas_extra,$bonos,$IDempleado,$id);
		echo "<h2>Jornada modificada</h2>";
	}
	if (isset($_POST["eliminar"])) {
		echo "<script>
		var opcion = confirm('¿Deseas eliminar la Jornada?');
		if(opcion===true){
			window.location.href = 'home.php?sec=".$_POST["id"]."';
		}
		</script>";
	}
	if(isset($_GET["el"])){
		$obj->eliminar($_GET["el"]);
		echo "<script>
        alert('Eliminado');
        window.location.href = 'home.php?sec=prov';
    	</script>";
	}
 ?>

 <table>
 	<tr>
 		<th>hrs_trabajadas</th>
 		<th>dias_trabajados</th>
 		<th>pago_hora</th>
 		<th>horas_extra</th>
 		<th>bonos</th>
 		<th>IDempleado</th>
 		<th>Eliminar</th>
 		<th>Modificar</th>
 	<?php 
 		$res= $obj-> consulta();
 		while ($fila=$res->fetch_assoc()) {
 			echo "<tr>";
 			echo "<td>".$fila["hrs_trabajadas"]."</td>";
 			echo "<td>".$fila["dias_trabajados"]."</td>";
 			echo "<td>".$fila["pago_hora"]."</td>";
 			echo "<td>".$fila["horas_extra"]."</td>";
 			echo "<td>".$fila["bonos"]."</td>";
 			echo "<td>".$fila["IDempleado"]."</td>";
 			?>	
		<td>
	 		<form action="" method="post">
		 		<input type="hidden" value="<?php echo $fila['IDjornada']?>" name="id">
		 		<input type="submit" name="eliminar" value="eliminar">
	 		</form>
	 	</td>
	 	<td>
	 		<form action="" method="post">
		 		<input type="hidden" value="<?php echo $fila['IDjornada']?>" name="id">
		 		<input type="submit" name="modificar" value="modificar">
	 		</form>
	 	</td>
 	<?php
 			echo "</tr>";
 		}
 	 ?>
 </table>