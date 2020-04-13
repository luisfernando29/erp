<?php 
    require_once("pedido.php");
    $obj=new Pedido();
if(!isset($_POST["modificar"])){ 
 ?>
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
<?php }else{ 
    $res = $obj->buscar($_POST["id"]);
    $fila = $res->fetch_assoc();
?>
<form action="" method="post">
<input type="text" name="fecha" placeholder="Fecha: " value= '<?php echo $fila["fecha"] ?>'><br>
<input type="text" name="IDcliente" placeholder="IDcliente: " value= '<?php echo $fila["IDcliente"] ?>'><br>
<input type="text" name="precio" placeholder="Precio: " value= '<?php echo $fila["precio"] ?>'><br>
<input type="text" name="cantidad" placeholder="Cantidad: " value= '<?php echo $fila["cantidad"] ?>'><br>
<input type="text" name="direccion" placeholder="Direccion: " value= '<?php echo $fila["direccion"] ?>'><br>
<input type="text" name="IDproducto" placeholder="IDproducto: " value= '<?php echo $fila["IDproducto"] ?>'><br>
</select><br>
<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
<input type="submit" name="mod" value="Modificar Pedido">
</form>
<?php
}
if(isset($_POST["alta"])){
    $fecha=$_POST["fecha"];
    $IDcliente=$_POST["IDcliente"];
    $precio=$_POST["precio"];
    $cantidad=$_POST["cantidad"];
    $direccion=$_POST["direccion"];
    $IDproducto=$_POST["IDproducto"];

    $obj->alta($fecha,$IDcliente,$precio,$cantidad,$direccion,$IDproducto);
    echo"<h2>Pedido Registrado<h2>";
}
if(isset($_POST["mod"])){
    $fecha=$_POST["fecha"];
    $IDcliente=$_POST["IDcliente"];
    $precio=$_POST["precio"];
    $cantidad=$_POST["cantidad"];
    $direccion=$_POST["direccion"];
    $IDproducto=$_POST["IDproducto"];
    $id = $_POST["id"];
    $obj->modificar($fecha,$IDcliente,$precio,$cantidad,$direccion,$IDproducto,$id);
    echo "<h2>Pedido modificada</h2>";
}

if(isset($_POST["eliminar"])){
    echo "<script>
    var opcion = confirm ('¿Deseas eliminar pedido?');
    if(opcion===true){
        window.location.href = 'home.php?sec=pe&el=".$_POST["id"]."';
    }
    </script>";
}
if(isset($_GET["el"])){
    $obj->baja($_GET["el"]);
    //echo"<h2>Venta eliminado</h2>";
    echo"<script>
    alert('Pedido eliminado'); 
    window.location.href = 'home.php?sec=pe' 
    </script>";
}
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
        ?>
        
        <td>
        <form action="" method="post">
              <input type="hidden" name="id" value="<?php echo $fila['IDpedido'] ?>">
              <input type="submit" name="eliminar" value="Eliminar">
        </form>
        </td>

            <td>
                <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDpedido'] ?>" name="id">
                    <input type="submit" name="modificar" value="Modificar">
                </form>
            </td>
        <?php
        echo"</tr>";
    }
    ?>
</table>