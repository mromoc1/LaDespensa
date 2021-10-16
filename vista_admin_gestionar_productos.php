<?php include_once "menu_admin.php" ?>
<?php
    include_once "db/conexion.php";
    $sentencia = $bd->query("SELECT * FROM productos;");
    $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<link rel="stylesheet" href="./css/fontawesome-all.min.css">
<script src="./js/validar_eliminar_producto.js"></script>

<div class="col-xs-12">
		<h1>Productos</h1>
		<div>
			<a class="btn btn-success" href="./vista_admin_nuevo_producto.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Categoria</th>
					<th>Stock</th>
					<th>Precio de venta</th>
					<th>Precio de compra</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos as $producto){ ?>
				<tr>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->nombre ?></td>
					<td><?php echo $producto->categoria ?></td>
					<td><?php echo $producto->stock ?></td>
					<td><?php echo $producto->precio_venta ?></td>
					<td><?php echo $producto->precio_compra ?></td>
					<td><a class="btn btn-warning" href="<?php echo "vista_admin_editar_producto.php?codigo=" . $producto->codigo?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "func_eliminar_producto.php?codigo=" . $producto->codigo?>" onclick="return ValidarSacarProducto();"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>