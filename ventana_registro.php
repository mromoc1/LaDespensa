<?php include_once "menu.php" ?>

<link href="./css/registro.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="./js/validar_registro.js"></script>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <div class="fadeIn first">
      <img src="./img/login.png" id="icon" alt="User Icon" /><br>
      Casillas con * son obligatorias
    </div>
    <form action="func_registrar_usuario.php" method="POST" onSubmit="return ValidarRegistro()"> 
      <input type="text" class="fadeIn " name="rut" placeholder="Rut*" required>  
      <input type="text" class="fadeIn " name="nombre" placeholder="Nombre*" required>
      <input type="text" class="fadeIn " name="apellido" placeholder="Apellido*" required>
      <input type="text" class="fadeIn " name="correo" placeholder="Correo electronico*" required>
      <input type="text" class="fadeIn " name="direccion" placeholder="Direccion*" required>
      <input type="text" class="fadeIn " name="direccion_op" placeholder="Direccion 2 (opcional)">
      <input type="password" class="fadeIn " name="contrasena" placeholder="Contraseña*" required>
      <input type="password" class="fadeIn " name="contrasena_confirm" placeholder="Confirmar Contraseña*" required>
      <input type="submit" class="fadeIn fourth" value="Confirmar Registro">
    </form>
    <div id="formFooter">
      <a class="underlineHover"></a>
    </div>

  </div>
</div>