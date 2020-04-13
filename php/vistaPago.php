<?php 
require_once("pago.php");
$obj=new Pago();
if(!isset($_POST["modificar"])){ 
 ?>
<form action="" method="post">
<input type="text" name="IDempleado" placeholder="IDempleado: "><br>
<input type="text" name="sal" placeholder="Salario: "><br>
<input type="text" name="fecha_dep" placeholder="Fecha Deposito: "><br>
<input type="text" name="met_pag" placeholder="Metodo de Pago: "><br>
<input type="text" name="des" placeholder="Descuento: "><br>
</select><br>
<input type="submit" name="alta" value="Guardar Pago">
</form>
<?php }else{ 
    $res = $obj->buscar($_POST["id"]);
    $fila = $res->fetch_assoc();
?>

<form action="" method="post">
<input type="text" name="IDempleado" placeholder="IDempleado: " value= '<?php echo $fila["IDempleado"] ?>'><br>
<input type="text" name="sal" placeholder="Salario: " value= '<?php echo $fila["sal"] ?>'><br>
<input type="text" name="fecha_dep" placeholder="Fecha Deposito: " value= '<?php echo $fila["fecha_dep"] ?>'><br>
<input type="text" name="met_pag" placeholder="Metodo de Pago: " value= '<?php echo $fila["met_pag"] ?>'><br>
<input type="text" name="des" placeholder="Descuento: " value= '<?php echo $fila["des"] ?>'><br>
</select><br>
<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
<input type="submit" name="mod" value="Pago Modificado">
</form>

<?php
}
if(isset($_POST["alta"])){
    $IDempleado=$_POST["IDempleado"];
    $sal=$_POST["sal"];
    $fecha_dep=$_POST["fecha_dep"];
    $met_pag=$_POST["met_pag"];
    $des=$_POST["des"];

    $obj->alta($IDempleado,$sal,$fecha_dep,$met_pag,$des);
    echo"<h2>Pago Registrado<h2>";
}
if(isset($_POST["mod"])){
    $IDempleado=$_POST["IDempleado"];
    $sal=$_POST["sal"];
    $fecha_dep=$_POST["fecha_dep"];
    $met_pag=$_POST["met_pag"];
    $des=$_POST["des"];
    $id=$_POST["id"];
    $obj->modificar($IDempleado,$sal,$fecha_dep,$met_pag,$des,$id);
    echo "<h2>Pago modificado</h2>";
}

if(isset($_POST["eliminar"])){
    echo "<script>
    var opcion = confirm ('¿Deseas eliminar el pago?');
    if(opcion===true){
        window.location.href = 'home.php?sec=pa&el=".$_POST["id"]."';
    }
    </script>";
}
if(isset($_GET["el"])){
    $obj->baja($_GET["el"]);
    //echo"<h2>Venta eliminado</h2>";
    echo"<script>
    alert('Pago eliminado'); 
    window.location.href = 'home.php?sec=pa' 
    </script>";
}
?>
<table>
<tr>
<th>IDempleado</th>
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
        ?>
        <td>
        <form action="" method="post">
              <input type="hidden" name="id" value="<?php echo $fila['IDpago'] ?>">
              <input type="submit" name="eliminar" value="Eliminar">
        </form>
        </td>

            <td>
                <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDpago'] ?>" name="id">
                    <input type="submit" name="modificar" value="Modificar">
                </form>
            </td>
        <?php
        echo"</tr>";
    }
    ?>
</table>