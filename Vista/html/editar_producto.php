<?php
session_start()
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Producto</title>
  <link rel="stylesheet" href="/melo8-main/Vista/css/agregar_producto.css">
</head>
<body>
  <main class="main-content">
    <h2>Editar Producto</h2>

    <form method="POST" action="/melo8-main/Controlador/EditarProductoController.php">
      <input type="hidden" name="id_producto" value="<?= htmlspecialchars($producto['id_producto']) ?>">

      <label for="pro_nombre">Nombre del producto:</label>
      <input type="text" name="pro_nombre" id="pro_nombre" value="<?= htmlspecialchars($producto['pro_nombre']) ?>" required>

      <label for="pro_descripcion">Descripción:</label>
      <textarea name="pro_descripcion" id="pro_descripcion" required><?= htmlspecialchars($producto['pro_descripcion']) ?></textarea>

      <label for="pro_valor">Precio:</label>
      <input type="number" name="pro_valor" id="pro_valor" step="0.01" value="<?= htmlspecialchars($producto['pro_valor']) ?>" required>

      <label for="id_categoria">Categoría:</label>
      <select name="id_categoria" id="id_categoria" required>
        <option value="">Selecciona una categoría</option>
        <?php foreach ($categorias as $cat): ?>
          <option value="<?= $cat['id_categoria'] ?>" <?= $cat['id_categoria'] == $producto['id_categoria'] ? 'selected' : '' ?>>
            <?= $cat['tipo_categoria'] ?>
          </option>
        <?php endforeach; ?>
      </select>

      <label for="inv_disponibilidad">Disponibilidad:</label>
      <input type="number" name="inv_disponibilidad" id="inv_disponibilidad" min="0" value="<?= htmlspecialchars($producto['inv_disponibilidad']) ?>" required>

      <button type="submit">Actualizar Producto</button>
    </form>
  </main>
</body>
</html>
