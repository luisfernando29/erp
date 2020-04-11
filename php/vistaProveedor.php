<?php 
require_once("proveedor.php");
$obj=new Proveedor();
if(!isset($_POST["modificar"])){ 
 ?>
<form action="" method="post">
<input type="text" name="nombre" placeholder="Nombre: "><br>
<input type="text" name="telefono" placeholder="Telefono: "><br>
<input type="text" name="direccion" placeholder="Direccion: "><br>
<input type="text" name="correo" placeholder="Correo: "><br>
<input type="text" name="rfc" placeholder="RFC: "><br>
</select><br>
<input type="submit" name="alta" value="Guardar Proveedor">
</form>
<?php }else{ 
    $res = $obj->buscar($_POST["id"]);

    $fila = $res->fetch_assoc();
    ?>

<form action="" method="post">
<input type="text" name="nombre" placeholder="Nombre: " value='<?php echo $fila["nombre"] ?>'><br>
<input type="text" name="telefono" placeholder="Telefono: " value='<?php echo $fila["telefono"] ?>'><br>
<input type="text" name="direccion" placeholder="Direccion: " value='<?php echo $fila["direccion"] ?>'><br>
<input type="text" name="correo" placeholder="Correo: " value='<?php echo $fila["correo"] ?>'><br>
<input type="text" name="rfc" placeholder="RFC: " value='<?php echo $fila["rfc"] ?>'><br>
</select><br>
<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
<input type="submit" name="mod" value="Modificar Proveedor">
</form>
<?php
}
if(isset($_POST["alta"])){
    $nombre=$_POST["nombre"];
    $telefono=$_POST["telefono"];
    $direccion=$_POST["direccion"];
    $correo=$_POST["correo"];
    $rfc=$_POST["rfc"];
    $obj->alta($nombre,$telefono,$direccion,$correo,$rfc);
    echo"<h2>Proveedor Registrado<h2>";
}

if(isset($_POST["mod"])){
    $nombre=$_POST["nombre"];
    $telefono=$_POST["telefono"];
    $direccion=$_POST["direccion"];
    $correo=$_POST["correo"];
    $rfc=$_POST["rfc"];

    $id = $_POST["id"];
    
    $obj->modificar($nombre,$telefono,$direccion,$correo,$rfc,$id);
    echo "<h2>Usuario modificado</h2>";
}

if(isset($_POST["eliminar"])){
    echo "<script>
    var opcion = confirm('¿Deseas eliminar el Proveedor?');
    if(opcion===true){
        window.location.href = 'home.php?sec=pro&el=".$_POST["id"]."';
    }
    </script>";
}
if(isset($_GET["el"])){
    $obj->baja($_GET["el"]);
    echo "<script>
        alert('Proveedor eliminado');
        window.location.href = 'home.php?sec=prov';
    </script>";
}
?>
<table>
<tr>
<th>Nombre</th>
<th>Telefono</th>
<th>Direccion</th>
<th>Correo</th>
<th>RFC</th>
<th>Eliminar</th>
<th>Modificar</th>
</tr>
<?php
    $res = $obj->consulta();
    while($fila = $res->fetch_assoc()){
        echo"<tr>";
        echo"<td>".$fila["nombre"]."</td>";
        echo"<td>".$fila["telefono"]."</td>";
        echo"<td>".$fila["direccion"]."</td>";
        echo"<td>".$fila["correo"]."</td>";
        echo"<td>".$fila["rfc"]."</td>";
        ?>
        <td>
                <form action="" method="post">
 <input type="hidden" value="<?php echo $fila['IDproveedor'] ?>" name="id">
 <input type="submit" name="eliminar" value="Eliminar">
                </form>
            </td>

            <td>
                <form action="" method="post">
 <input type="hidden" value="<?php echo $fila['IDproveedor'] ?>" name="id">
 <input type="submit" name="modificar" value="Modificar">
                </form>
            </td>
        <?php
        echo"</tr>";
    }
    ?>
</table>