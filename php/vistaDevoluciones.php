<form action="" method="post">

	Fecha: <br>
	<input type="text" name="fecha" placeholder="fecha de devolucion">
	<br>
	Cantidad: <br>
	<input type="text" name="cantidad" placeholder="cantidad de producto"> <br>
	Descripcion: <br>
	<input type="text" name="descripcion" placeholder="descripcion"> <br>
	Id producto: <br>
	<input type="text" name="IDproducto" placeholder="ID del producto"> <br>
	
	<input type="submit" name="alta" value="Guardar devolucion"> 
</form> 

<?php 
require_once("devoluciones.php");
$obj = new Devoluciones();

	if (isset($_POST["alta"])) {
		$fecha=$_POST["fecha"];
		$cantidad=$_POST["cantidad"];
		$descripcion=$_POST["descripcion"];
		$IDproducto=$_POST["IDproducto"];
		$obj -> alta($fecha,$cantidad,$descripcion,$IDproducto); 
		echo "<h2>devolucion registrada</h2>";
	}
	if (isset($_POST["mod"])) {
		$fecha=$_POST["fecha"];
		$cantidad=$_POST["cantidad"];
		$descripcion=$_POST["descripcion"];
		$IDproducto=$_POST["IDproducto"];
		$id=$_POST["id"];
		$obj -> modificar($fecha,$cantidad,$descripcion,$IDproducto,$id);
		echo "<h2>Devolucion modificada</h2>";
	}
	if (isset($_POST["eliminar"])) {
		echo "<script>
		var opcion = confirm('¿Deseas eliminar la Devolucion?');
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
 		<th>Fecha</th>
 		<th>cantidad</th>
 		<th>Descripcion</th>
 		<th>id producto</th>
 		<th>Eliminar</th>
 		<th>Modificar</th>
 	<?php 
 		$res= $obj-> consulta();
 		while ($fila=$res->fetch_assoc()) {
 			echo "<tr>";
 			echo "<td>".$fila["fecha"]."</td>";
 			echo "<td>".$fila["cantidad"]."</td>";
 			echo "<td>".$fila["descripcion"]."</td>";
 			echo "<td>".$fila["IDproducto"]."</td>";
 			?>	
		<td>
	 		<form action="" method="post">
		 		<input type="hidden" value="<?php echo $fila['IDdevoluciones']?>" name="id">
		 		<input type="submit" name="eliminar" value="eliminar">
	 		</form>
	 	</td>
	 	<td>
	 		<form action="" method="post">
		 		<input type="hidden" value="<?php echo $fila['IDdevoluciones']?>" name="id">
		 		<input type="submit" name="modificar" value="modificar">
	 		</form>
	 	</td>
 	<?php
 			echo "</tr>";
 		}
 	 ?>
 </table>