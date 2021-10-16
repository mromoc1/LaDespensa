<?php //PARA NO REPETIR CODIGO ?>

<link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/menu.css" rel="stylesheet">
        <script src="./js/bootstrap.bundle.min.js"></script>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            
            <a class="navbar-brand"><img src="./img/titulo/titulo_icon_2.png" width="40"> LA DESPENSA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li>
                        <a class="nav-link active" aria-current="page" href="vista_usuario.php">HOME</a>
                    </li>
                    <li>
                        <a class="nav-link active" aria-current="page" href="<?php echo "vista_usuario_comprar.php"?>">COMPRAR</a>
                    </li>
                    <li>
                        <a class="nav-link active" aria-current="page" href="<?php echo "vista_usuario_carrito.php"?>">CARRITO</a>
                    </li>
                </ul>
                <div class="d-grid gap-2 d-md-block">
                    <a  href="index.php"><button class="btn btn-primary" type="button" onsubmit="<?php session_destroy(); ?>">Cerrar Sesion</button></a>
                </div> 
            </div>
        </div>
    </nav>