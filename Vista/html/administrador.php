<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 1) {
    // Si no es administrador, redirige a la vista cliente
    header('Location: /melo8-main/index.html');
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panel de Administración</title>
  <link rel="stylesheet" href="/melo8-main/Vista/css/administrador.css" />
</head>
<body>
    

  <div class="admin-layout">

    <!-- Sidebar -->
    <aside class="sidebar">
  <div class="sidebar-header">
    <img src="/melo8-main/Vista/img/logo3.png" alt="Logo D.R." class="logo-sidebar" />
    <h2>Productos de Aseo D.R.</h2>
  </div>

  <div class="logout-container">
    <button class="logout-button" onclick="location.href='/melo8-main/logout.php'">Cerrar sesión</button>
  </div>
</aside>


    <!-- Contenido principal -->
    <main class="main-content">
      <div class="welcome-box">
        <h1>¡Bienvenido al Panel de Administración!</h1>
        <p>Desde aquí puedes gestionar productos, inventario, pedidos, clientes y más.</p>
      </div>

      <div class="card-grid">
        <a href="/melo8-main/Controlador/InventoryController.php" class="card">
          <span>📊</span>
          Inventario
        </a>
        <a href="/melo8-main/Controlador/MovimientosController.php" class="card">
          <span>🧾</span>
          Movimientos
        </a>
        </a>
        <a href="/melo8-main/Controlador/ListaClientesController.php" class="card">
          <span>👥</span>
          Lista de Clientes
        </a>
        <a href="/melo8-main/Controlador/PersonasController.php" class="card">
          <span>⚙️</span>
          Gestión de Personas
        </a>
      </div>
    </main>

  </div>

</body>
</html>
