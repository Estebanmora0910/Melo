<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi sitio web</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                <a class="nav-link" href="/melo8-main/Vista/html/contacto.php">Contacto</a>
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
            </nav>
</nav>