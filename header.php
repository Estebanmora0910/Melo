<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi sitio web</title>
    <link rel="stylesheet" href="Vista/css/styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html">
            <img src="/melo8-main/Vista/img/logo2.jpg" style="width: 100px;" alt="">
          </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" href="/melo8-main/index.php">Inicio</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/melo8-main/Vista/html/catalogo.php">Catálogo</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/melo8-main/Vista/html/pagos.php">Mis Pedidos</a>
                </li>
                
                <li class="nav-item">
                <a class="nav-link" href="/melo8-main/Vista/html/contacto.html">Contacto</a>
                </li>
            </ul>

            <nav class="navbar">
                    <form class="container-fluid justify-content-start">
                        <a href="/melo8-main/Vista/html/login.php">
                        <button id="btn-login" class="btn btn-outline-custom me-2" type="button">Iniciar Sesión</button>
                        </a>
                        <a href="/melo8-main/Vista/html/registrarse.php">
                        <button id="btn-register" class="btn btn-outline-custom me-2" type="button">Registrarse</button>
                        </a>
                        <a id="perfil-link" href="/melo8-main/Vista/html/miperfil.php" class="btn btn-outline-custom me-2 d-none">Mi Perfil</a>

                        <a href="/melo8-main/Controlador/cerrar_sesion.php" id="btn-logout" class="btn btn-danger">Cerrar sesión</a>

                    </form>
                </nav>            

            <span class="navbar-text ms-auto position-relative">
                <img src="/melo8-main/vista/img/carrocompras.png" class="carrito-boton" style="width: 40px;" alt="carrocompras">
                <span id="contador-carrito" class="contador-carrito">0</span>
                </span>

            <div id="carrito" class="carrito-container" style="display: none;">
                <ul id="carrito-lista"></ul>
                <p id="carrito-total">Total: $0</p>
                <button id="vaciar-carrito" class="btn-vaciar">Vaciar Carrito</button>
                <button id="ir-a-pagar" class="btn-pagar">Ir a pagar</button>
            </div>

        </div>
        </div>
    </nav>
    <hr>
<script src="../../Controlador/navbar_sesion.js"></script>

<script src="../../Controlador/carrito.js"></script>
