<div id="grafica">
    <form action="" method="post">
        <input type="hidden" value="remplazo" name="tabla">
        
        <input type="hidden" value="costo" name="dato">
        <input type="hidden" value="IDremplazo" name="encabezado">
        <input type="submit" name="grafica" value="Graficar">
    </form>
</div>
<?php 
if(isset($_POST["grafica"])){
    require_once("php/grafica.php");
}
?>

<form action="" method="post">
<input type="text" name="IDmobiliario" placeholder="Mobiliario: "><br>
<input type="text" name="fecha" placeholder="Fecha: "><br>
<input type="text" name="costo" placeholder="Costo: "><br>
<input type="text" name="descripcion" placeholder="Descripcion: "><br>
</select><br>
<input type="submit" name="alta" value="Remplazar">
</form>
<?php
if(isset($_POST["alta"])){
    $IDmobiliario=$_POST["IDmobiliario"];
    $fecha=$_POST["fecha"];
    $costo=$_POST["costo"];
    $descripcion=$_POST["descripcion"];
    require_once("remplazo.php");
    $obj=new Remplazo();
    $obj->alta($IDmobiliario,$fecha,$costo,$descripcion);
    echo"<h2>Remplazo realizado<h2>";
}

require_once("remplazo.php");
$obj=new Remplazo();
?>
<table>
<tr>
<th>IDmobiliario</th>
<th>Fecha</th>
<th>Costo</th>
<th>Descripcion</th>
</tr>


<?php
    $res = $obj->consulta();
    while($fila = $res->fetch_assoc()){
        echo"<tr>";
        echo"<td>".$fila["IDmobiliario"]."</td>";
        echo"<td>".$fila["fecha"]."</td>";
        echo"<td>".$fila["costo"]."</td>";
        echo"<td>".$fila["descripcion"]."</td>";
        echo"</tr>";
    }
    ?>
</table>
