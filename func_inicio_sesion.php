<?php 
    include_once "db/conexion.php";
    session_start();

    $_SESSION['rut']=$_POST['rut'];
    $contrasena = $_POST['contrasena'];

    $sentencia = $bd->prepare("SELECT * FROM usuarios WHERE rut = ?");
    $sentencia->execute([$_SESSION['rut']]);
    $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
    if($usuario){
        if($usuario->contrasena == $contrasena){
            if($usuario->tipo_usuario=="admin"){
                header("Location: ./vista_admin.php");
            }else{
                header("Location: ./vista_usuario.php");
            }        
        }else{?>
            <script>alert('Contarena incorrecta');</script>;    
        <?php 
        }
    }else{ ?>
        <script>alert('El usuario no existe');</script>;
    <?php
    }
    
?>