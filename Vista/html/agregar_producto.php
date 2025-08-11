<?php
session_start()
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agregar Producto</title>
  <link rel="stylesheet" href="/melo8-main/Vista/css/agregar_producto.css">
</head>
<body>

<main class="main-content">
  <h2>Agregar Nuevo Producto</h2>
  <form method="POST" action="/melo8-main/Controlador/ProductoController.php">
    
    <label for="pro_nombre">Nombre del producto:</label>
    <input type="text" name="pro_nombre" id="pro_nombre" required>

    <label for="pro_descripcion">Descripción:</label>
    <textarea name="pro_descripcion" id="pro_descripcion" required></textarea>

    <label for="pro_valor">Precio:</label>
    <input type="number" name="pro_valor" id="pro_valor" step="0.01" required>

    <label for="id_categoria">Categoría:</label>
    <select name="id_categoria" id="id_categoria" required>
      <option value="">Selecciona una categoría</option>
      <?php if (!empty($categorias)): ?>
        <?php foreach ($categorias as $cat): ?>
          <option value="<?= htmlspecialchars($cat['id_categoria']) ?>">
            <?= htmlspecialchars($cat['tipo_categoria']) ?>
          </option>
        <?php endforeach; ?>
      <?php else: ?>
        <option value="">No hay categorías disponibles</option>
      <?php endif; ?>
    </select>

    <label for="inv_cantidad_entrada">Cantidad de entrada:</label>
    <input type="number" name="inv_cantidad_entrada" id="inv_cantidad_entrada" min="0" required>

    <label for="inv_disponibilidad">Disponibilidad:</label>
    <input type="number" name="inv_disponibilidad" id="inv_disponibilidad" min="0" required>

    <label for="fecha_ingreso">Fecha de ingreso:</label>
    <input type="date" name="fecha_ingreso" id="fecha_ingreso" required>

    <button type="submit" name="crear_producto">Crear Producto</button>
  </form>
</main>

</body>
</html>
