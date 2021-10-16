<?php include_once "menu.php" ?>

<link href="./css/sesion.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <div class="fadeIn first">
      <img src="./img/login.png" id="icon" alt="User Icon" />
    </div>
    <form action="func_inicio_sesion.php" method="POST">
      <input type="text" class="fadeIn second" placeholder="Rut" name="rut" required>
      <input type="password" class="fadeIn third" placeholder="Contrasena" name="contrasena" required>
      <input type="submit" class="fadeIn fourth" value="Ingresar">
    </form>
    <div id="formFooter">
      <a class="underlineHover" href="">Olvido su contrasena?</a>
    </div>
  </div>
</div>