<?php
    include_once "db/conexion.php";
    session_start();
    $rut = $_SESSION['rut'];
    $codigo =$_GET["codigo"];
    $cantidad_a_comprar = $_POST["cantidad_a_comprar"];
    
    //verifica si no se esta sobrepasando el stock
    $sentencia1 = $bd->query("SELECT stock FROM productos WHERE codigo = '$codigo';");
    $producto = $sentencia1->fetch();

    if($cantidad_a_comprar > $producto->stock && $cantidad_a_comprar > 0){
        echo "<script>alert('La cantidad solicitada excede las existencias o es invalida')</script>";
    }else{
        //verifica si el producto ya se encuentra en el carro del comprador
        $sentencia2 = $bd->query("SELECT cantidad FROM carrito WHERE rut='$rut' AND codigo='$codigo';");
        $existe = $sentencia2->fetch();
        if(!$existe){
            //si existe lo agrega al carro y disminuye las existencias
            $sentencia3 = $bd->prepare("INSERT INTO carrito(rut, codigo, cantidad) VALUES (?, ?, ?);");
            $resultado3 = $sentencia3->execute([$rut, $codigo, $cantidad_a_comprar]);
            
            $newstock = $producto->stock - $cantidad_a_comprar;
            $sentencia4 = $bd->prepare("UPDATE productos SET stock='$newstock' WHERE codigo='$codigo'");
            $resultado4 = $sentencia4->execute();
        }else{
            $newcant = $existe->cantidad + $cantidad_a_comprar;
            $sentencia5 = $bd->prepare("UPDATE carrito SET cantidad='$newcant' WHERE rut='$rut' AND codigo='$codigo'");
            $resultado5 = $sentencia5->execute();

            $newstock2 = $producto->stock - $cantidad_a_comprar;
            $sentencia6 = $bd->prepare("UPDATE productos SET stock='$newstock2' WHERE codigo='$codigo'");
            $resultado6 = $sentencia6->execute();
        }
        header("Location: ./vista_usuario_comprar.php");
    }
?>
