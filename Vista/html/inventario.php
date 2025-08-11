<?php
session_start();

// Verificar que el usuario sea administrador
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 1) {
    header("Location: /melo8-main/Vista/html/login.php?mensaje=Acceso denegado. Solo administradores.");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Inventario</title>
  <link rel="stylesheet" href="/melo8-main/Vista/css/admin.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <!-- Encabezado -->
  <header class="admin-header">
    <div class="header-left">
      <img src="/melo8-main/Vista/img/logo3.png" alt="Logo" class="header-logo">
      <h1 class="company-name">Productos de Aseo D.R.</h1>
    </div>
    <nav class="nav-links">
      <a href="/melo8-main/Vista/html/administrador.php">Inicio</a>
      <a href="/melo8-main/Controlador/InventoryController.php" class="active">Inventario</a>
      <a href="/melo8-main/Controlador/MovimientosController.php">Movimientos</a>
      <a href="/melo8-main/Controlador/ListaClientesController.php">Lista de Clientes</a>
      <a href="/melo8-main/Controlador/PersonasController.php">Gestión de Personas</a>
    </nav>
    <button class="logout-button" onclick="location.href='/melo8-main/logout.php'">Cerrar sesión</button>
  </header>

  <!-- Contenido -->
  <main class="main-content">
    <!-- Mostrar mensajes de éxito o error -->
    <?php if (isset($_GET['mensaje'])): ?>
      <div class="alert alert-success"><?php echo htmlspecialchars($_GET['mensaje']); ?></div>
    <?php elseif (isset($_GET['error'])): ?>
      <div class="alert alert-danger"><?php echo htmlspecialchars($_GET['error']); ?></div>
    <?php endif; ?>

    <div class="filtro-wrapper d-flex align-items-center">
      <form method="GET" action="/melo8-main/Controlador/InventoryController.php" class="filtro-inventario me-3">
        <label for="categoria">Categoría:</label>
        <select name="categoria" id="categoria">
          <option value="">-- Todas --</option>
          <option value="Aseo personal" <?= ($_GET['categoria'] ?? '') == 'Aseo personal' ? 'selected' : '' ?>>Aseo personal</option>
          <option value="Aseo industrial" <?= ($_GET['categoria'] ?? '') == 'Aseo industrial' ? 'selected' : '' ?>>Aseo industrial</option>
          <option value="Aseo para el hogar" <?= ($_GET['categoria'] ?? '') == 'Aseo para el hogar' ? 'selected' : '' ?>>Aseo para el hogar</option>
          <option value="Aseo multiusos" <?= ($_GET['categoria'] ?? '') == 'Aseo multiusos' ? 'selected' : '' ?>>Aseo multiusos</option>
          <option value="Otros" <?= ($_GET['categoria'] ?? '') == 'Otros' ? 'selected' : '' ?>>Otros</option>
        </select>
        <button type="submit" class="btn btn-primary btn-sm ms-2">Filtrar</button>
      </form>
      <!-- Botón para sincronizar inventario -->
      <form method="POST" action="/melo8-main/Controlador/InventoryController.php" onsubmit="return confirm('¿Sincronizar el inventario? Esto añadirá productos faltantes.');">
        <input type="hidden" name="action" value="sincronizar">
        <button type="submit" class="btn btn-info btn-sm">Sincronizar Inventario</button>
      </form>
    </div>

    <div class="welcome-box">
      <h2>Inventario de Productos</h2>
      <p>Gestión básica de productos disponibles.</p>
    </div>

    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th class="textth">ID Producto</th>
            <th class="textth">Producto</th>
            <th class="textth">Categoría</th>
            <th class="textth">Disponibilidad</th>
            <th class="textth">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php if (isset($inventario) && is_array($inventario)) : ?>
            <?php foreach ($inventario as $item): ?>
              <tr>
                <td><?= htmlspecialchars($item['id_producto']) ?></td>
                <td><?= htmlspecialchars($item['pro_nombre']) ?></td>
                <td><?= htmlspecialchars($item['categoria']) ?></td>
                <td><?= htmlspecialchars($item['inv_disponibilidad']) ?></td>
                <td>
                  <div class="d-flex gap-1 justify-content-center">
                    <!-- Botón EDITAR -->
                    <a href="/melo8-main/Controlador/EditarProductoController.php?id=<?= htmlspecialchars($item['id_inventario']) ?>" class="btn btn-sm btn-primary">Editar</a>

                    <!-- Botón ELIMINAR -->
                    <form action="/melo8-main/Controlador/InventoryController.php" method="POST" onsubmit="return confirm('¿Eliminar el producto <?= htmlspecialchars($item['pro_nombre']) ?>?');">
                      <input type="hidden" name="action" value="delete">
                      <input type="hidden" name="id_inventario" value="<?= htmlspecialchars($item['id_inventario']) ?>">
                      <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr><td colspan="5">No hay productos disponibles.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div class="text-end mt-3">
      <a href="/melo8-main/Controlador/ProductoController.php" class="btn btn-success">Agregar Producto</a>
    </div>
  </main>

</body>
</html>