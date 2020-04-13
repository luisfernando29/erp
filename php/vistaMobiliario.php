<?php 
    require_once("mobiliario.php");
    $obj=new Mobiliario();
if(!isset($_POST["modificar"])){ 
 ?>
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
<?php }else{ 
    $res = $obj->buscar($_POST["id"]);
    $fila = $res->fetch_assoc();
?>

<form action="" method="post">
<input type="text" name="nombre" placeholder="Nombre: " value= '<?php echo $fila["nombre"] ?>'><br>
<input type="text" name="descripcion" placeholder="Descripcion: " value= '<?php echo $fila["descripcion"] ?>'><br>
<input type="text" name="cantidad" placeholder="Cantidad: " value= '<?php echo $fila["cantidad"] ?>'><br>
<input type="text" name="nic" placeholder="Nic: " value= '<?php echo $fila["nic"] ?>'><br>
<input type="text" name="tipo" placeholder="Tipo: " value= '<?php echo $fila["tipo"] ?>'><br>
</select><br>
<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
<input type="submit" name="mod" value="Mobiliario Modificado">
</form>

<?php
}
if(isset($_POST["alta"])){
    $nombre=$_POST["nombre"];
    $descripcion=$_POST["descripcion"];
    $cantidad=$_POST["cantidad"];
    $nic=$_POST["nic"];
    $tipo=$_POST["tipo"];

    $obj->alta($nombre,$descripcion,$cantidad,$nic,$tipo);
    echo"<h2>Mobiliario Registrado<h2>";
}
if(isset($_POST["mod"])){
    $nombre=$_POST["nombre"];
    $descripcion=$_POST["descripcion"];
    $cantidad=$_POST["cantidad"];
    $nic=$_POST["nic"];
    $tipo=$_POST["tipo"];
    $id = $_POST["id"];
    $obj->modificar($nombre,$descripcion,$cantidad,$nic,$tipo,$id);
    echo "<h2>Mobiliario modificada</h2>";
}

if(isset($_POST["eliminar"])){
    echo "<script>
    var opcion = confirm ('¿Deseas eliminar el mobiliario?');
    if(opcion===true){
        window.location.href = 'home.php?sec=mo&el=".$_POST["id"]."';
    }
    </script>";
}
if(isset($_GET["el"])){
    $obj->baja($_GET["el"]);
    //echo"<h2>Venta eliminado</h2>";
    echo"<script>
    alert('Mobiliario eliminado'); 
    window.location.href = 'home.php?sec=mo' 
    </script>";
}
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
        ?>
        <td>
        <form action="" method="post">
              <input type="hidden" name="id" value="<?php echo $fila['IDmobiliario'] ?>">
              <input type="submit" name="eliminar" value="Eliminar">
        </form>
        </td>

            <td>
                <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDmobiliario'] ?>" name="id">
                    <input type="submit" name="modificar" value="Modificar">
                </form>
            </td>
        <?php
        echo"</tr>";
    }
    ?>
</table>