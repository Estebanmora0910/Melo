<?php
session_start()
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de Clientes</title>
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
    <a href="/melo8-main/Controlador/MovimientosController.php">Movimientos</a>
    <a href="/melo8-main/Controlador/ListaClientesController.php" class="active">Lista de Clientes</a>
    <a href="/melo8-main/Controlador/PersonasController.php">Gestión de Personas</a>
  </nav>
  <button class="logout-button" onclick="location.href='/melo8-main/logout.php'">Cerrar sesión</button>
</header>

<main class="main-content">
  <h2>Clientes Registrados</h2>
  <?php if (!empty($clientes)): ?>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Ciudad</th>
          <th>Usuario</th>
          <th>Pedidos</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($clientes as $cliente): ?>
          <tr>
            <td><?= $cliente['id_cliente'] ?></td>
            <td><?= $cliente['nombre'] ?></td>
            <td><?= $cliente['correo'] ?></td>
            <td><?= $cliente['ciudad'] ?></td>
            <td><?= $cliente['usuario'] ?></td>
            <td><?= $cliente['numero_pedidos'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No hay clientes registrados.</p>
  <?php endif; ?>
</main>

</body>
</html>
