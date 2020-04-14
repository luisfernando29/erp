<?php 
require_once("producto.php");
$obj=new Producto();
if(!isset($_POST["modificar"])){ 
 ?>
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
Nombre<br><input type="text" name="nombre" placeholder="escribe el nombre"><br>
Descripcion<br><input type="text" name="descripcion" placeholder="descripcion del producto"><br>
Precio Venta<br><input type="text" name="preciov" placeholder="precio de venta del producto"><br>
Precio Compra<br><input type="text" name="precioc" placeholder="precio de Compra del producto"><br>
Cantidad<br><input type="text" name="cantidad" placeholder="cantidad de productos"><br>
Cantidad Minima<br><input type="text" name="cantmin" placeholder="cantidad de productos"><br>
Cantidad Maxima<br><input type="text" name="cantmax" placeholder="cantidad de productos"><br>
Categoria<br><input type="text" name="categoria" placeholder="categoria del producto"><br>
</select><br>
<input type="submit" name="alta" value="Guardar Producto">
</form>
<?php }else{ 
    $res = $obj->buscar($_POST["id"]);
    $fila = $res->fetch_assoc();
?>

<form action="" method="post">
Nombre<br><input type="text" name="nombre" placeholder="escribe el nombre" value= '<?php echo $fila["nombre"] ?>'><br>
Descripcion<br><input type="text" name="descripcion" placeholder="descripcion del producto" value= '<?php echo $fila["descripcion"] ?>'><br>
Precio Venta<br><input type="text" name="preciov" placeholder="precio de venta del producto" value= '<?php echo $fila["preciov"] ?>'><br>
Precio Compra<br><input type="text" name="precioc" placeholder="precio de Compra del producto" value= '<?php echo $fila["precioc"] ?>'><br>
Cantidad<br><input type="text" name="cantidad" placeholder="cantidad de productos" value= '<?php echo $fila["cantidad"] ?>'><br>
Cantidad Minima<br><input type="text" name="cantmin" placeholder="cantidad de productos" value= '<?php echo $fila["cantmin"] ?>'><br>
Cantidad Maxima<br><input type="text" name="cantmax" placeholder="cantidad de productos" value= '<?php echo $fila["cantmax"] ?>'><br>
Categoria<br><input type="text" name="categoria" placeholder="categoria del producto" value= '<?php echo $fila["categoria"] ?>'><br>
</select><br>
<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
<input type="submit" name="mod" value="Modificar Producto">
</form>

<?php
}
if(isset($_POST["alta"])){
    $nombre=$_POST["nombre"];
    $descripcion=$_POST["descripcion"];
    $preciov=$_POST["preciov"];
    $precioc=$_POST["precioc"];
    $cantidad=$_POST["cantidad"];
    $cantmin=$_POST["cantmin"];
    $cantmax=$_POST["cantmax"];
    $categoria=$_POST["categoria"];

    $obj->alta($nombre,$descripcion,$preciov,$precioc,$cantidad,$cantmin,$cantmax,$categoria);
    echo"<h2>Producto Registrado<h2>";
}
if(isset($_POST["mod"])){
    $nombre=$_POST["nombre"];
    $descripcion=$_POST["descripcion"];
    $preciov=$_POST["preciov"];
    $precioc=$_POST["precioc"];
    $cantidad=$_POST["cantidad"];
    $cantmin=$_POST["cantmin"];
    $cantmax=$_POST["cantmax"];
    $categoria=$_POST["categoria"];
    $id = $_POST["id"];
    $obj->modificar($nombre,$descripcion,$preciov,$precioc,$cantidad,$cantmin,$cantmax,$categoria,$id);
    echo "<h2>Producto modificado</h2>";
}

if(isset($_POST["eliminar"])){
    echo "<script>
    var opcion = confirm ('¿Deseas eliminar el producto?');
    if(opcion===true){
        window.location.href = 'home.php?sec=prod&el=".$_POST["id"]."';
    }
    </script>";
}
if(isset($_GET["el"])){
    $obj->baja($_GET["el"]);
    //echo"<h2>Venta eliminado</h2>";
    echo"<script>
    alert('Producto eliminado'); 
    window.location.href = 'home.php?sec=prod' 
    </script>";
}
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
        ?>
        <td>
        <form action="" method="post">
              <input type="hidden" name="id" value="<?php echo $fila['IDproducto'] ?>">
              <input type="submit" name="eliminar" value="Eliminar">
        </form>
        </td>

            <td>
                <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDproducto'] ?>" name="id">
                    <input type="submit" name="modificar" value="Modificar">
                </form>
            </td>
        <?php
        echo"</tr>";
    }
    ?>
</table>