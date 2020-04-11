<form action="" method="post">
<input type="text" name="fecha" placeholder="Fecha: "><br>
<input type="text" name="IDcliente" placeholder="IDcliente: "><br>
<input type="text" name="precio" placeholder="Precio: "><br>
<input type="text" name="cantidad" placeholder="Cantidad: "><br>
<input type="text" name="direccion" placeholder="Direccion: "><br>
<input type="text" name="IDproducto" placeholder="IDproducto: "><br>
</select><br>
<input type="submit" name="alta" value="Guardar Pedido">
</form>
<?php
if(isset($_POST["alta"])){
    $fecha=$_POST["fecha"];
    $IDcliente=$_POST["IDcliente"];
    $precio=$_POST["precio"];
    $cantidad=$_POST["cantidad"];
    $direccion=$_POST["direccion"];
    $IDproducto=$_POST["IDproducto"];
    require_once("pedido.php");
    $obj=new Pedido();
    $obj->alta($fecha,$IDcliente,$precio,$cantidad,$direccion,$IDproducto);
    echo"<h2>Pedido Registrado<h2>";
}
require_once("pedido.php");
$obj=new Pedido();
?>
<table>
<tr>
<th>Fecha</th>
<th>IDcliente</th>
<th>Precio</th>
<th>Cantidad</th>
<th>Direccion</th>
<th>IDproducto</th>

</tr>
<?php
    $res = $obj->consulta();
    while($fila = $res->fetch_assoc()){
        echo"<tr>";
        echo"<td>".$fila["fecha"]."</td>";
        echo"<td>".$fila["IDcliente"]."</td>";
        echo"<td>".$fila["precio"]."</td>";
        echo"<td>".$fila["cantidad"]."</td>";
        echo"<td>".$fila["direccion"]."</td>";
        echo"<td>".$fila["IDproducto"]."</td>";
        echo"</tr>";
    }
    ?>
</table>