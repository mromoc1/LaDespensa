<?php include_once "menu_admin.php" ?>

<script>
	function ValidacionNuevoProducto(){
		var codigo = document.forms["fform"]["codigo"].value;
		var stock = document.forms["fform"]["stock"].value;
		var precio_compra = document.forms["fform"]["precio_compra"].value;
		var precio_venta = document.forms["fform"]["precio_venta"].value;

		if(Number(codigo) < 0 || Number(stock) < 0 || Number(precio_compra) < 0 || Number(precio_venta) < 0){
			alert('No puede asignar valores negativos');
			return false;
		}else{
			var resp = confirm("Estas seguro que desea agregar un nuevo producto?");
			if(resp == true){
			return true;
			}else{
				return false;
			}
		}
	}
</script>

<div class="col-xs-12">
	<h1>Nuevo producto</h1>
	<form method="post" action="func_agregar_nuevo_producto.php" name="fform" onsubmit="return ValidacionNuevoProducto();">
		
        <label for="codigo">Código de barras:</label>
		<input class="form-control" name="codigo" required type="number" id="codigo" onkeypress="return event.charCode > 47 && event.charCode < 58;" pattern="[0-9]{5}" placeholder="Escribe el código" required>

		<label for="nombre">Nombre del producto:</label>
		<input required id="nombre" name="nombre" type="text" class="form-control" required></input>

        <label for="categoria">Categoria:</label>
		<input required id="categoria" name="categoria" type="text" class="form-control" required></input>

		<label for="precio_venta">Precio de venta:</label>
		<input class="form-control" name="precio_venta" required type="number" id="precio_venta" pattern="^[0-9]+" placeholder="Precio de venta" onkeypress="return event.charCode > 47 && event.charCode < 58;" pattern="[0-9]{5}" required>

		<label for="precio_compra">Precio de compra:</label>
		<input class="form-control" name="precio_compra" required type="number" id="precio_compra" pattern="^[0-9]+" placeholder="Precio de compra" onkeypress="return event.charCode > 47 && event.charCode < 58;" pattern="[0-9]{5}" required>

		<label for="stock">Existencia:</label>
		<input class="form-control" name="stock" required type="number" id="stock" onkeypress="return event.charCode > 47 && event.charCode < 58;" pattern="[0-9]{5}" placeholder="Cantidad o stock" required>
		<br><br><input class="btn btn-info" type="submit" value="Guardar"> <a href="vista_admin_gestionar_productos.php" class="btn btn-warning" >Volver</a> 
	</form>
</div>


