<?php 
	include_once "menu_usuario.php";
    include_once "db/conexion.php";
    $sentencia = $bd->query("SELECT * FROM productos;");
    $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<link rel="stylesheet" href="./css/fontawesome-all.min.css">
<script>
	function ValidarCantidad(){
		var cantidad_a_comprar = document.forms["fform"]["cantidad_a_comprar"].value;

		if(Number(cantidad_a_comprar) < 0){
			alert('No puede asignar valores negativos');
			return false;
		}
		return true;
	}
</script>

<div class="col-xs-12">
	<h1>Productos</h1>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Producto</th>
				<th>Nombre</th>
				<th>Categoria</th>
				<th>Stock</th>
				<th>Precio</th>
				<th>Cantidad</th>
				<th>Agregar al carro</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($productos as $producto){ ?>
			<tr>
				<form action="<?php echo "func_agregar_producto_carro.php?codigo=".$producto->codigo?>" method="POST" name="fform" onsubmit="return ValidarCantidad()">
					<td><img src="./img/productos/<?php echo $producto->codigo?>.png" width="80" height="80"></td>
					<td><?php echo $producto->nombre ?></td>
					<td><?php echo $producto->categoria ?></td>
					<td><?php echo $producto->stock ?></td>
					<td><?php echo $producto->precio_venta ?></td>
					<td><input type="number" name="cantidad_a_comprar" id="cantidad_a_comprar" style="width: 70px;" required></td>
					<td><input class="btn btn-danger" type="submit" class="fadeIn fourth" value="AGREGAR A CARRO" ></td>
				</form>
				
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>