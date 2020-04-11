<div id="grafica">
    <form action="" method="post">
        <input type="hidden" value="venta" name="tabla">
        <input type="hidden" value="total" name="dato">
        <input type="hidden" value="IDventa" name="encabezado">
        <input type="submit" name="grafica" value="Graficar">
        
    </form>
</div>
<?php 
if(isset($_POST["grafica"])){
    require_once("php/grafica.php");
}
?>
<form action="" method="post">
<input type="text" name="fecha" placeholder="Fecha: "><br>
<input type="text" name="IDCliente" placeholder="IDcliente: "><br>
<input type="text" name="total" placeholder="Total "><br>
<input type="text" name="tipo_pago" placeholder="Tipo de pago: "><br>
</select><br>
<input type="submit" name="alta" value="Guardar Venta">
</form>

<?php
require_once("venta.php");
$obj=new Venta();

if(isset($_POST["mod"])){
    $fecha = $_POST["fecha"];
    $IDCliente = $_POST["IDCliente"];
    $total = $_POST["total"];
    $tipo_pago = $_POST["tipo_pago"];

    $obj->modificar($fecha,$IDCliente,$total,$tipo_pago);
    echo "<h2>Usuario modificado</h2>";
}

if(isset($_POST["eliminar"])){
    echo "<script>
    var opcion = confirm ('¿Deseas eliminar la venta?');
    if(opcion===true){
        window.location.href = 'home.php?sec=ven&el=".$_POST["id"]."';
    }
    </script>";
}
if(isset($_GET["el"])){
    $obj->baja($_GET["el"]);
    //echo"<h2>Venta eliminado</h2>";
    echo"<script>
    alert('Venta eliminada'); 
    window.location.href = 'home.php?sec=ven' 
    </script>";
}

if(isset($_POST["alta"])){
    $fecha=$_POST["fecha"];
    $IDCliente=$_POST["IDCliente"];
    $total=$_POST["total"];
    $tipo_pago=$_POST["tipo_pago"];
    require_once("venta.php");
    $obj=new Venta();
    $obj->alta($fecha,$IDCliente,$total,$tipo_pago);
    echo"<h2>Venta Registrado<h2>";
}

?>
<table>
<tr>
<th>fecha</th>
<th>IDCliente</th>
<th>Total</th>
<th>Tipo de Pago</th>
</tr>
<?php
    $res = $obj->consulta();
    while($fila = $res->fetch_assoc()){
        echo"<tr>";
        echo"<td>".$fila["fecha"]."</td>";
        echo"<td>".$fila["IDventa"]."</td>";
        echo"<td>".$fila["total"]."</td>";
        echo"<td>".$fila["tipo_pago"]."</td>";
        echo"</tr>";
        ?>
        <td>
        <form action="" method="post">
              <input type="hidden" name="id" value="<?php echo $fila['IDventa'] ?>">
              <input type="submit" name="eliminar" value="Eliminar">
        </form>
        </td>

 			<td>
 				<form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDventa'] ?>" name="id">
                    <input type="submit" name="modificar" value="Modificar">
 				</form>
 			</td>
        <?php
        echo"</tr>";
    }
    ?>
</table>
