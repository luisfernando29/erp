<div id="grafica">
    <form action="" method="post">
        <input type="hidden" value="producto" name="tabla">
        <input type="submit" name="grafica" value="Graficar">
        <input type="hidden" value="cantidad" name="dato">
        <input type="hidden" value="nombre" name="encabezado">
    </form>
</div>
<?php 
if(isset($_POST["grafica"])){
    require_once("php/grafica.php");
}
?>

<form action="" method="post">
<input type="text" name="nombre" placeholder="Nombre: "><br>
<input type="text" name="descripcion" placeholder="Descripcion: "><br>
<input type="text" name="preciov" placeholder="Precio Venta: "><br>
<input type="text" name="precioc" placeholder="Precio Compra: "><br>
<input type="text" name="cantidad" placeholder="Cantidad: "><br>
<input type="text" name="cantmin" placeholder="Cantidad Minima: "><br>
<input type="text" name="cantmax" placeholder="Cantidad Maxima: "><br>
<input type="text" name="categoria" placeholder="Categoria: "><br>
</select><br>
<input type="submit" name="alta" value="Guardar Proveedor">
</form>
<?php
if(isset($_POST["alta"])){
    $nombre=$_POST["nombre"];
    $descripcion=$_POST["descripcion"];
    $preciov=$_POST["preciov"];
    $precioc=$_POST["precioc"];
    $cantidad=$_POST["cantidad"];
    $cantmin=$_POST["cantmin"];
    $cantmin=$_POST["cantmin"];
    $cantmax=$_POST["cantmax"];
    $categoria=$_POST["categoria"];
    require_once("producto.php");
    $obj=new Producto();
    $obj->alta($nombre,$descripcion,$preciov,$precioc,$cantidad,$cantmin,$cantmax,$categoria);
    echo"<h2>Producto Registrado<h2>";
}
require_once("producto.php");
$obj=new Producto();
?>

<table>
<tr>
<th>Nombre</th>
<th>Descripcion</th>
<th>Precio Venta</th>
<th>Precio Compra</th>
<th>Cantidad</th>
<th>Cantidad Minima</th>
<th>Cantidad Maxima</th>
<th>Categoria</th>
</tr>

<?php
    $res = $obj->consulta();
    while($fila = $res->fetch_assoc()){
        echo"<tr>";
        echo"<td>".$fila["nombre"]."</td>";
        echo"<td>".$fila["descripcion"]."</td>";
        echo"<td>".$fila["preciov"]."</td>";
        echo"<td>".$fila["precioc"]."</td>";
        echo"<td>".$fila["cantidad"]."</td>";
        echo"<td>".$fila["cantmin"]."</td>";
        echo"<td>".$fila["cantmax"]."</td>";
        echo"<td>".$fila["categoria"]."</td>";
        echo"</tr>";
    }
    ?>
</table>