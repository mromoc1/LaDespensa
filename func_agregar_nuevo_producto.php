<?php
	include_once "db/conexion.php";

	$codigo = $_POST["codigo"];
	$nombre = $_POST["nombre"];
	$categoria = $_POST["categoria"];
	$precio_venta = $_POST["precio_venta"];
	$precio_compra = $_POST["precio_compra"];
	$stock = $_POST["stock"];


	$sentencia2 = $bd->query("SELECT nombre FROM productos WHERE codigo='$codigo';");
    $existe = $sentencia2->fetch();
	if($existe){
		echo "<script>alert('Algo salió mal. Por favor verifica que el codigo no exista')</script>";
	}else{
		$sentencia = $bd->prepare("INSERT INTO productos(codigo, nombre, categoria, precio_venta, precio_compra, stock) VALUES (?, ?, ?, ?, ?, ?);");
		$resultado = $sentencia->execute([$codigo, $nombre, $categoria, $precio_venta, $precio_compra, $stock]);
		header("Location: ./vista_admin_gestionar_productos.php");
	}
?>