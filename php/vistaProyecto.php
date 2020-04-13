<?php 
require_once("proyecto.php");
$obj=new Proyecto();
if(!isset($_POST["modificar"])){ 
 ?>
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
<?php }else{ 
    $res = $obj->buscar($_POST["id"]);
    $fila = $res->fetch_assoc();
    ?>

<form action="" method="post">
<input type="text" name="nombre_pro" placeholder="Nombre del proyecto: " value= '<?php echo $fila["nombre_pro"] ?>'><br>
<input type="text" name="tipo_pro" placeholder="Tipo de proyecto: " value= '<?php echo $fila["tipo_pro"] ?>'><br>
<input type="text" name="IDempleado" placeholder="ID Empleado: " value= '<?php echo $fila["IDempleado"] ?>'><br>
<input type="text" name="fecha_in" placeholder="Fecha de Inicio: " value= '<?php echo $fila["fecha_in"] ?>'><br>
<input type="text" name="fecha_fin" placeholder="Fecha de Fin: " value= '<?php echo $fila["fecha_fin"] ?>'><br>
<input type="text" name="descripcion" placeholder="Descripcion: " value= '<?php echo $fila["descripcion"] ?>'><br>
</select><br>
<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
<input type="submit" name="mod" value="Proyecto Modificado">
</form>
<?php
}
if(isset($_POST["alta"])){
    $nombre_pro=$_POST["nombre_pro"];
    $tipo_pro=$_POST["tipo_pro"];
    $IDempleado=$_POST["IDempleado"];
    $fecha_in=$_POST["fecha_in"];
    $fecha_fin=$_POST["fecha_fin"];
    $descripcion=$_POST["descripcion"];
    $obj->alta($nombre_pro,$tipo_pro,$IDempleado,$fecha_in,$fecha_fin,$descripcion);
    echo"<h2>Proyecto Registrado<h2>";
}
if(isset($_POST["mod"])){
    $nombre_pro=$_POST["nombre_pro"];
    $tipo_pro=$_POST["tipo_pro"];
    $IDempleado=$_POST["IDempleado"];
    $fecha_in=$_POST["fecha_in"];
    $fecha_fin=$_POST["fecha_fin"];
    $descripcion=$_POST["descripcion"];
    $id = $_POST["id"];
    
    $obj->modificar($nombre_pro,$tipo_pro,$IDempleado,$fecha_in,$fecha_fin,$descripcion,$id);
    echo "<h2>Proyecto modificado</h2>";
}

if(isset($_POST["eliminar"])){
    echo "<script>
    var opcion = confirm('¿Deseas eliminar el Proyecto?');
    if(opcion===true){
        window.location.href = 'home.php?sec=pr&el=".$_POST["id"]."';
    }
    </script>";
}
if(isset($_GET["el"])){
    $obj->baja($_GET["el"]);
    echo "<script>
        alert('Proyecto eliminado');
        window.location.href = 'home.php?sec=pr';
    </script>";
}

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
        ?>
         <td>
                <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDproyecto'] ?>" name="id">
                    <input type="submit" name="eliminar" value="Eliminar">
                </form>
            </td>

            <td>
                <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDproyecto'] ?>" name="id">
                    <input type="submit" name="modificar" value="Modificar">
                </form>
            </td>
            <?php
        echo"</tr>";
    }
    ?>
</table>