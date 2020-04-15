<?php 
require_once("usuario.php");
$obj = new Usuario();
if(!isset($_POST["modificar"])){ ?>
<form action="" method="post">
	<br>
	<input type="text" name="nombre" placeholder="Nombre: ">
	<br>
	<br>
	<input type="password" name="password" placeholder="Password:"> <br>
	Tipo: <br>
	<select name="tipo">
		<option value="1">Admin</option>
		<option value="2">Usuario</option>
	</select> <br>
	<input type="submit" name="alta" value="Guardar Usuario">
</form>
<?php }else{ 
	$res = $obj->buscar($_POST["id"]);

	$fila = $res->fetch_assoc();
?>

<form action="" method="post">
	<br>
	<input type="text" name="nombre" placeholder="Nombre: " value="<?php  echo $fila['nombre']; ?>" >
	<br>
	<br>
	<input type="password" name="password" placeholder="Password:" value="<?php  echo $fila['password']; ?>" > <br>
	Tipo: <br>
	<select name="tipo">
		<option value="1">Admin</option>
		<option value="2">Usuario</option>
	</select> <br>
	<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
	<input type="submit" name="mod" value="Modificar Usuario">
</form>

<?php 
	}
	if(isset($_POST["alta"])){
		$nombre = $_POST["nombre"];
		$password = $_POST["password"];
		$tipo = $_POST["tipo"];
		$obj->alta($nombre,$tipo,$password);
		echo "<h2>Usuario registrado</h2>";
	}

	if(isset($_POST["mod"])){
		$nombre = $_POST["nombre"];
		$password = $_POST["password"];
		$tipo = $_POST["tipo"];

		$id = $_POST["id"];
	
		$obj->modificar($nombre,$tipo,$password,$id);
		echo "<h2>Usuario modificado</h2>";
	}

	if(isset($_POST["eliminar"])){
		echo "<script>
		var opcion = confirm('¿Deseas eliminar el Usuario?');
		if(opcion===true){
			window.location.href = 'home.php?sec=usu&el=".$_POST["id"]."';
		}
		</script>";
	}
	if(isset($_GET["el"])){
		$obj->baja($_GET["el"]);
		//echo "<h2>Usuario eliminado</h2>";
		echo "<script>
			alert('Usuario eliminado');
			window.location.href = 'home.php?sec=usu';
		</script>";
		//header("Location: index.php");
	}

 ?>
 <table>
 	<tr>
 		<th>Nombre</th>
 		<th>Password</th>
 		<th>Tipo</th>
 		<th>Eliminar</th>
 		<th>Modificar</th>
 	</tr>
 	<?php 
 		$res = $obj->consulta();
 		while($fila = $res->fetch_assoc()){
 			echo "<tr>";
 			echo "<td>".$fila["nombre"]."</td>";
 			echo "<td>*********</td>";
 			echo "<td>".$fila["tipo"]."</td>"; 
 			?>
 			<td>
 				<form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDusuario'] ?>" name="id">
                    <input type="submit" name="eliminar" value="Eliminar">
 				</form>
 			</td>

 			<td>
 				<form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDusuario'] ?>" name="id">
                    <input type="submit" name="modificar" value="Modificar">
 				</form>
 			</td>
 			<?php
 			echo "</tr>";
 		}
 	 ?>
 </table>