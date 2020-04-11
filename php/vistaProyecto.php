<form action="" method="post">
<input type="text" name="nombre_pro" placeholder="Nombre del proyecto: "><br>
<input type="text" name="tipo_pro" placeholder="Tipo de proyecto: "><br>
<input type="text" name="IDempleado" placeholder="ID Empleado: "><br>
<input type="text" name="fecha_in" placeholder="Fecha de Inicio: "><br>
<input type="text" name="fecha_fin" placeholder="Fecha de Fin: "><br>
<input type="text" name="descripcion" placeholder="Descripcion: "><br>
</select><br>
<input type="submit" name="alta" value="Guardar Proyecto">
</form>
<?php
if(isset($_POST["alta"])){
    $nombre_pro=$_POST["nombre_pro"];
    $tipo_pro=$_POST["tipo_pro"];
    $IDempleado=$_POST["IDempleado"];
    $fecha_in=$_POST["fecha_in"];
    $fecha_fin=$_POST["fecha_fin"];
    $descripcion=$_POST["descripcion"];
    require_once("proyecto.php");
    $obj=new Proyecto();
    $obj->alta($nombre_pro,$tipo_pro,$IDempleado,$fecha_in,$fechafin,$descripcion);
    echo"<h2>Proyecto Registrado<h2>";
}
require_once("proyecto.php");
$obj=new Proyecto();
?>
<table>
<tr>
<th>Nombre del proyecto</th>
<th>Tipo de proyecto</th>
<th>ID empleado</th>
<th>fecha inicio</th>
<th>fecha de fin</th>
<th>descripcion</th>
</tr>
<?php
    $res = $obj->consulta();
    while($fila = $res->fetch_assoc()){
        echo"<tr>";
        echo"<td>".$fila["nombre_pro"]."</td>";
        echo"<td>".$fila["tipo_pro"]."</td>";
        echo"<td>".$fila["IDempleado"]."</td>";
        echo"<td>".$fila["fecha_in"]."</td>";
        echo"<td>".$fila["fecha_fin"]."</td>";
        echo"<td>".$fila["descripcion"]."</td>";
        echo"</tr>";
    }
    ?>
</table>
