<?php
session_start()
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Gestión de Personas</title>
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
    <a href="/melo8-main/Controlador/ListaClientesController.php">Lista de Clientes</a>
    <a href="/melo8-main/Controlador/PersonasController.php" class="active">Gestión de Personas</a>
  </nav>
  <button class="logout-button" onclick="location.href='/melo8-main/logout.php'">Cerrar sesión</button>
</header>

<main class="main-content">
  <h2>Gestión de Personas</h2>

  <?php if (!empty($personas)): ?>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Dirección</th>
          <th>Ciudad</th>
          <th>Tipo</th>
          <th>Teléfono</th>
          <th>Usuario</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($personas as $persona): ?>
          <tr>
            <td><?= htmlspecialchars($persona['id_personas']) ?></td>
            <td><?= htmlspecialchars($persona['reg_nombre']) ?></td>
            <td><?= htmlspecialchars($persona['reg_correo']) ?></td>
            <td><?= htmlspecialchars($persona['reg_direccion']) ?></td>
            <td><?= htmlspecialchars($persona['reg_ciudad']) ?></td>
            <td><?= htmlspecialchars($persona['reg_tipo']) ?></td>
            <td><?= htmlspecialchars($persona['reg_telefono']) ?></td>
            <td><?= htmlspecialchars($persona['usu_nombre_usuario']) ?></td>
            <td>
              <a href="/melo8-main/Controlador/PersonasController.php?id=<?= $persona['id_personas'] ?>" class="btn btn-sm btn-primary">Editar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No hay personas registradas.</p>
  <?php endif; ?>
</main>

</body>
</html>
