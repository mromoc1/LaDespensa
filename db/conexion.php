<?php
    $server="localhost";
    $contraseña = "";
    $usuario = "root";
    $nombre_bd = "market";
    try{
        $bd = new PDO('mysql:host='.$server.';dbname=' . $nombre_bd, $usuario, $contraseña);
        $bd->query("set names utf8;");
        $bd->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }catch(Exception $e){
        die ("<script>alert('Conexion fallida a la base de datos')</script>");
    }
?>