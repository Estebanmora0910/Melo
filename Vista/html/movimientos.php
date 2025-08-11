<?php
session_start()
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Movimientos</title>
  <link rel="stylesheet" href="/melo8-main/Vista/css/admin.css">
</head>
<body>

  <header class="admin-header">
    <div class="header-left">
      <img src="/melo8-main/Vista/img/logo2.jpg" alt="Logo" class="header-logo">
      <h1 class="company-name">Productos de Aseo D.R.</h1>
    </div>
    <nav class="nav-links">
      <a href="/melo8-main/Vista/html/administrador.php">Inicio</a>
      <a href="/melo8-main/Controlador/InventoryController.php">Inventario</a>
      <a href="/melo8-main/Controlador/MovimientosController.php" class="active">Movimientos</a>
      <a href="/melo8-main/Controlador/ListaClientesController.php">Lista de Clientes</a>
      <a href="/melo8-main/Controlador/PersonasController.php">Gestión de Personas</a>
    </nav>
    <button class="logout-button" onclick="location.href='/melo8-main/logout.php'">Cerrar sesión</button>
  </header>



<main class="main-content">
  

  <div class="welcome-box">
    <h2>Historial de Movimientos</h2>
    <p>Visualiza las entradas y salidas de productos registradas en el sistema.</p>
  </div>

  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Producto</th>
          <th>Tipo</th>
          <th>Cantidad</th>
          <th>Fecha y Hora</th>
          <th>Detalle</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($movimientos)): ?>
          <?php foreach ($movimientos as $mov): ?>
            <tr>
              <td><?= $mov['id_movimiento'] ?></td>
              <td><?= $mov['producto'] ?></td>
              <td><?= ucfirst($mov['tipo_movimiento']) ?></td>
              <td><?= $mov['cantidad'] ?></td>
              <td><?= $mov['fecha_movimiento'] ?></td>
              <td><?= $mov['detalle'] ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="6">No hay movimientos registrados.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</main>

</body>
</html>
