<?php 
    include_once "db/conexion.php";
    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $direccion_op = $_POST['direccion_op'];
    $contrasena = $_POST['contrasena'];
    $contrasena_confirm = $_POST['contrasena_confirm'];
    $usuario = 'usuario';

    //Agregar mas condicionales para las demas variables
    //Agregar la verificacion de no registrar si ya existe
    $sentencia1 = $bd->query("SELECT rut FROM usuarios WHERE rut='$rut';");
    $existe = $sentencia1->fetch();
    if($existe->rut){
        echo "<script>alert('Error el rut ya existe, si no recuerda sus datos contacte con el administrador')</script>";
    }else{
        if($contrasena != $contrasena_confirm){
            echo "<script>alert('Error las contrasenas no coinciden')</script>";
        }else{
            $sentencia2 = $bd->prepare("INSERT INTO usuarios(rut, nombre, apellido, correo, direccion, direccion_op, contrasena, tipo_usuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
            $resultado = $sentencia2->execute([$rut, $nombre, $apellido, $correo, $direccion, $direccion_op, $contrasena, $usuario]);
            header("Location: ./ventana_iniciar_sesion.php");
            exit; 
        }
    }
?>