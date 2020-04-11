<div id="grafica">
    <form action="" method="post">
        <input type="hidden" value="mobiliario" name="tabla">
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
<input type="text" name="cantidad" placeholder="Cantidad: "><br>
<input type="text" name="nic" placeholder="Nic: "><br>
<input type="text" name="tipo" placeholder="Tipo: "><br>
</select><br>
<input type="submit" name="alta" value="Guardar Mobiliario">
</form>
<?php
if(isset($_POST["alta"])){
    $nombre=$_POST["nombre"];
    $descripcion=$_POST["descripcion"];
    $cantidad=$_POST["cantidad"];
    $nic=$_POST["nic"];
    $tipo=$_POST["tipo"];
    require_once("mobiliario.php");
    $obj=new Mobiliario();
    $obj->alta($nombre,$descripcion,$cantidad,$nic,$tipo);
    echo"<h2>Mobiliario Registrado<h2>";
}
require_once("mobiliario.php");
$obj=new Mobiliario();
?>
<table>
<tr>
<th>Nombre</th>
<th>Descripcion</th>
<th>Cantidad</th>
<th>Nic</th>
<th>Tipo</th>

</tr>
<?php
    $res = $obj->consulta();
    while($fila = $res->fetch_assoc()){
        echo"<tr>";
        echo"<td>".$fila["nombre"]."</td>";
        echo"<td>".$fila["descripcion"]."</td>";
        echo"<td>".$fila["cantidad"]."</td>";
        echo"<td>".$fila["nic"]."</td>";
        echo"<td>".$fila["tipo"]."</td>";
        echo"</tr>";
    }
    ?>
</table>