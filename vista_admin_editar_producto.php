<?php 
	include_once "menu_admin.php";
	if(!isset($_GET["codigo"])) exit();
	$codigo = $_GET["codigo"];
	include_once "db/conexion.php";
	$sentencia = $bd->prepare("SELECT * FROM productos WHERE codigo = ?;");
	$sentencia->execute([$codigo]);
	$producto = $sentencia->fetch(PDO::FETCH_OBJ);
	if($producto === FALSE){
		echo "¡No existe algún producto con ese ID!";
		exit();
	}
?>

<script>
	function ValidarEditarPorducto(){
		var stock = document.forms["fform"]["stock"].value;
		var precio_compra = document.forms["fform"]["precio_compra"].value;
		var precio_venta = document.forms["fform"]["precio_venta"].value;

		if(Number(stock) < 0 || Number(precio_compra) < 0 || Number(precio_venta) < 0){
			alert('No puede asignar valores negativos');
			return false;
		}
		
		var resp = confirm("Estas seguro que desea editar el producto?");
		if(resp == true){
			return true;
		}else{
			return false;
	}
</script>

	<div class="col-xs-12">
		<h1>Editar producto con el ID <?php echo $producto->codigo; ?></h1>
		<form method="post" action="func_guardar_editado.php" onsubmit="return ValidarEditarPorducto();" name="fform">
			<input type="hidden" name="codigo" value="<?php echo $producto->codigo; ?>">
	
			<label for="nombre">Nombre:</label>
			<input value="<?php echo $producto->nombre ?>" class="form-control" name="nombre" required type="text" id="nombre" placeholder="Nombre">

			<label for="categoria">Categoria:</label>
			<input required id="categoria" name="categoria" cols="30" rows="5" class="form-control" value="<?php echo $producto->categoria ?>"></input>

			<label for="precio_venta">Precio de venta:</label>
			<input value="<?php echo $producto->precio_venta ?>" class="form-control" name="precio_venta" required type="number" id="precio_venta" placeholder="Precio de venta">

			<label for="precio_compra">Precio de compra:</label>
			<input value="<?php echo $producto->precio_compra ?>" class="form-control" name="precio_compra" required type="number" id="precio_compra" placeholder="Precio de compra">

			<label for="stock">Existencia:</label>
			<input value="<?php echo $producto->stock ?>" class="form-control" name="stock" required type="number" id="stock" placeholder="Cantidad o existencia">
			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./vista_admin_gestionar_productos.php">Volver</a>
		</form>
	</div>