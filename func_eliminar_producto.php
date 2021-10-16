<?php
    if(!isset($_GET["codigo"])) exit();
    $codigo = $_GET["codigo"];
    include_once "./db/conexion.php";
    $sentencia = $bd->prepare("DELETE FROM productos WHERE codigo = ?;");
    $resultado = $sentencia->execute([$codigo]);

    $sentencia2 = $bd->prepare("DELETE FROM carrito WHERE codigo = ?;");
    $resultado2 = $sentencia2->execute([$codigo]);

    if($resultado === TRUE){
        header("Location: ./vista_admin_gestionar_productos.php");
        exit;
    }
    else echo "Algo salió mal";
?>