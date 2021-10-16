<?php
    include_once "./db/conexion.php";
    session_start();
    
    $codigo = $_GET["codigo"];
    $rut =$_SESSION['rut'];
    $cantidad_a_sacar = $_POST["cantidad_a_sacar"]; 

    $sentencia1 = $bd->query("SELECT cantidad FROM carrito WHERE codigo = '$codigo' AND rut='$rut'");
    $carrito = $sentencia1->fetch();

    if($cantidad_a_sacar > $carrito->cantidad){
        echo "<script>alert('Algo salió mal. Esta intentando sacar mas producto del que posee en carrito')</script>";
    }else{
        $sentencia2 = $bd->query("SELECT stock FROM productos WHERE codigo = '$codigo';");
        $producto = $sentencia2->fetch();

        if($cantidad_a_sacar == $carrito->cantidad){
            $sentencia3 = $bd->prepare("DELETE FROM carrito WHERE codigo = ? AND rut = ?;");
            $resultado3 = $sentencia3->execute([$codigo, $rut]);

            $newstock = $producto->stock + $cantidad_a_sacar;
            $sentencia4 = $bd->prepare("UPDATE productos SET stock='$newstock' WHERE codigo='$codigo'");
            $resultado4 = $sentencia4->execute();

            header("Location: ./vista_usuario_carrito.php");
        }else{
            $newcant =  $carrito->cantidad - $cantidad_a_sacar;
            $sentencia5 = $bd->prepare("UPDATE carrito SET cantidad='$newcant' WHERE codigo='$codigo'");
            $resultado5 = $sentencia5->execute();

            $newstock2 = $producto->stock + $cantidad_a_sacar;
            $sentencia6 = $bd->prepare("UPDATE productos SET stock='$newstock2' WHERE codigo='$codigo'");
            $resultado6 = $sentencia6->execute();
            header("Location: ./vista_usuario_carrito.php");
            
        }
    }
?>