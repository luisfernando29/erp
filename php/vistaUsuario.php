<form action="" method="post">

	Nombre: <br>
	<input type="text" name="Nombre" placeholder="Escribe tu nombre">
	<br>
	Password <br>
	<input type="password" name="Password" placeholder="Escribe tu contraseña"> <br>
	tipo: <br>

	<select name="tipo" placeholder="selecciona una option">
		<option value="1">Admin</option>
		<option value="2">Usuario</option>
	</select> <br>
	<input type="submit" name="alta" value="Guardar Usuario"> 
</form>

<?php 
require_once("usuario.php");
$obj = new Usuario();
	if (isset($_POST["alta"])) {
		$nombre=$_POST["nombre"];
		$password=$_POST["password"];
		$tipo=$_POST["tipo"];
		$obj -> alta($nombre, $tipo, $password);
		echo "<h2>Usuario registrado</h2>";
	}
 ?>

 <table>
 	<tr>
 		<th>Nnombre</th>
 		<th>Password</th>
 		<th>Tipo</th>
 	</tr>
 	<?php 
 		$res= $obj-> consulta();
 		while ($fila=$res->fetch_assoc()) {
 			echo "<tr>";
 			echo "<td>".$fila["nombre"]."</td>";
 			echo "<td>************</td>";
 			echo "<td>".$fila["tipo"]."</td>";
 			echo "</tr>";
 		}
 	 ?>
 </table>