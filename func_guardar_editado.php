<?php
include_once "db/conexion.php";

$id = $_POST["codigo"];
$nombre= $_POST["nombre"];
$categoria = $_POST["categoria"];
$precio_compra = $_POST["precio_compra"];
$precio_venta = $_POST["precio_venta"];
$stock = $_POST["stock"];

$sentencia = $bd->prepare("UPDATE productos SET nombre = ?, categoria = ?, precio_compra = ?, precio_venta = ?, stock = ? WHERE codigo = ?;");
$resultado = $sentencia->execute([$nombre, $categoria, $precio_compra, $precio_venta, $stock, $id]);

if($resultado === TRUE){
	header("Location: ./vista_admin_gestionar_productos.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>