<?php 
	include_once "menu_usuario.php";
    include_once "./db/conexion.php";
	session_start();
	$rut = $_SESSION['rut'];
    $sentencia = $bd->query("SELECT * FROM carrito WHERE rut= '$rut'");
    $productoscarrito = $sentencia->fetchAll(PDO::FETCH_OBJ);
	$total_boleta=0;
?>
<link rel="stylesheet" href="./css/fontawesome-all.min.css">
<script src="./js/validar_sacar_carrito.js"></script>
<script type="text/javascript">
    function mostrar_fecha(){
        var cl = document.getElementById("fecha");
        cl.innerHTML = new Date();
    }
</script>>
<script>
	function ValidarCantidad(){
		var cantidad_a_comprar = document.forms["fform"]["cantidad_a_sacar"].value;

		if(Number(cantidad_a_comprar) < 0){
			alert('No puede asignar valores negativos');
			return false;
		}
		return true;
	}
</script>


<div class="col-xs-12">
	<h1>CARRITO DE COMPRAS </h1> <div id="fecha"></div>
				<script type="text/javascript">
				mostrar_fecha();
				setInterval(mostrar_fecha, 1000);
				</script>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Producto</th>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Valor unitario</th>
				<th>Cantidad</th>
				<th>Cantidad a sacar</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($productoscarrito as $producto){ 
				$sentencia2 = $bd->query("SELECT nombre,precio_venta FROM productos WHERE codigo= '$producto->codigo';");
				$datosproducto = $sentencia2->fetch();
				$total_boleta = $total_boleta + ($producto->cantidad *$datosproducto->precio_venta);
			?>
			<tr>
				<form name="fform" action="<?php echo "func_eliminar_producto_carro.php?codigo=".$producto->codigo?>" method="POST"  onsubmit="return ValidarSacarCarrito()">
					<td><img src="./img/productos/<?php echo $producto->codigo?>.png" width="80" height="80"></td>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $datosproducto->nombre ?></td>
					<td><?php echo $datosproducto->precio_venta ?></td>
					<td><?php echo $producto->cantidad ?></td>
					<td><input type="number" name="cantidad_a_sacar" id="cantidad_a_sacar" style="width: 70px;" required></td>
					<td> <input type="submit" class="btn btn-danger" value="SACAR DEL CARRO" onclick="return ValidarCantidad();"></td>
				</form>
			</tr>
			<?php } ?>
		</tbody>
		
	</table>

	<table class="table table-bordered">
		<tr>
			
		</tr>
		<tr>
			<th>TOTAL BOLETA: <?php echo $total_boleta ?></th>
		</tr>
		<tr>
			<th><a class="btn btn-warning" href="">PAGAR</a></td></th>
		</tr>
	</table>
</div>

