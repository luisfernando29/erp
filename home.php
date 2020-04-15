<?php
	session_start();
	if(!isset($_SESSION["autenticado"])){
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>ERP</title>
	<link rel="stylesheet" href="css/estilos.css">
	<script src="js/Chart.min.js"></script>
</head>
<body>
	<section>
		<nav>
			<h2>Bienvenido: <?php echo $_SESSION["usuario"]; ?></h2>
			<ul>
							<a href="?sec=inicio"><li> Inicio </li></a>
				<a href="?sec=usu"><li>Usuario</li></a>
				<a href="?sec=act"><li>Actividad</li></a>
				<a href="?sec=asis"><li>Asistencia</li></a>
				<a href="?sec=balan"><li>Balance</li></a>
				<a href="?sec=cli"><li>Cliente</li></a>
				<a href="?sec=comp"><li>Compra</li></a>
				<a href="?sec=detComp"><li>Detalles de la compra</li></a>
				<a href="?sec=devol"><li>Devoluciones</li></a>
				<a href="?sec=empl"><li>Empleado</li></a>
				<a href="?sec=evalu"><li>Evaluacion</li></a>
				<a href="?sec=jorn"><li>Jornada</li></a>
				
				<a href="?sec=mobi"><li>Moviliario</li></a>
				<a href="?sec=pago"><li>Pago</li></a>
				<a href="?sec=pedi"><li>Pedido</li></a>
				<a href="?sec=produc"><li>Producto</li></a>
				<a href="?sec=provee"><li>Proveedor</li></a>
				<a href="?sec=proyec"><li>Proyecto</li></a>
				<a href="?sec=rempl"><li>Remplazo</li></a>
				<a href="?sec=venta"><li>Venta</li></a>
				<a href="?sec=report"><li>Reportes</li></a>

				<a href="?sec=cerrar"><li>cerrar sesion</li></a>

			</ul>
		</nav>
		<article>
			<?php
			if (isset($_GET["sec"])) {
				$sec= $_GET["sec"];
				switch ($sec) {
					case 'usu':
						require_once("php/vistaUsuario.php");
						break;
					case 'act':
						require_once("php/vistaActividad.php");
						break;
					case 'asis':
						require_once("php/vistaAsistencia.php");
						break;
					case 'balan':
						require_once("php/vistaBalance.php");
						break;
					case 'cli':
						require_once("php/vistaCliente.php");
						break;
					case 'comp':
						require_once("php/vistaCompra.php");
						break;
					case 'detComp':
						require_once("php/vistaDetalleCompra.php");
						break;
					case 'devol':
						require_once("php/vistaDevoluciones.php");
						break;
					case 'empl':
						require_once("php/vistaEmpleado.php");
						break;
					case 'evalu':
						require_once("php/vistaEvaluacion.php");
						break;
					case 'jorn':
						require_once("php/vistaJornada.php");
						break;

					case 'mobi':
						require_once("php/vistaMobiliario.php");
						break;
					case 'pago':
						require_once("php/vistaPago.php");
						break;
					case 'pedi':
						require_once("php/vistaPedido.php");
						break;
					case 'produc':
						require_once("php/vistaProducto.php");
						break;
					case 'provee':
						require_once("php/vistaProveedor.php");
						break;
					case 'proyec':
						require_once("php/vistaProyecto.php");
						break;
					case 'rempl':
						require_once("php/vistaRemplazo.php");
						break;
					case 'venta':
						require_once("php/vistaVenta.php");
						break;
					case 'report':
						require_once("php/vistaReporte.php");
						break;

					case 'cerrar':
						session_destroy();
						header("Location: index.php");
						break;
					

				}
			}
			?>
		</article>
	</section>
</body>
</html>