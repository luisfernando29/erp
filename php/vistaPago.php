<form action="" method="post">
<input type="text" name="IDEmpleado" placeholder="IDempleado: "><br>
<input type="text" name="sal" placeholder="Salario: "><br>
<input type="text" name="fecha_dep" placeholder="Fecha Deposito: "><br>
<input type="text" name="met_pag" placeholder="Metodo de Pago: "><br>
<input type="text" name="des" placeholder="Descuento: "><br>
<input type="text" name="cantidad" placeholder="Cantidad: "><br>
</select><br>
<input type="submit" name="alta" value="Guardar Pago">
</form>
<?php
if(isset($_POST["alta"])){
    $IDempleado=$_Post["IDempleado"];
    $sal=$_POST["sal"];
    $fecha_dep=$_POST["fecha_dep"];
    $met_pag=$_POST["met_pag"];
    $des=$_POST["des"];

    require_once("pago.php");
    $obj=new Pago();
    $obj->alta($IDempleado,$sal,$fecha_dep,$met_pag,$des);
    echo"<h2>Pago Registrado<h2>";
}
require_once("pago.php");
$obj=new Pago();
?>
<table>
<tr>
<th>Salario</th>
<th>Fecha de deposito</th>
<th>Metodo de pago</th>
<th>Descripcion</th>
</tr>
<?php
    $res = $obj->consulta();
    while($fila = $res->fetch_assoc()){
        echo"<tr>";
        echo"<td>".$fila["IDempleado"]."</td>";
        echo"<td>".$fila["sal"]."</td>";
        echo"<td>".$fila["fecha_dep"]."</td>";
        echo"<td>".$fila["met_pag"]."</td>";
        echo"<td>".$fila["des"]."</td>";
        echo"</tr>";
    }
    ?>
</table>