<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/pagos.css">
</head>
<body>

  <?php include '../../header.php'; ?>

    <!-- Alerta flotante -->
<div id="alerta-contenedor" class="alerta-contenedor"></div>

<!-- Contenedor principal -->
<div class="container">
  <h2 class="mt-4 text-center">Mis pedidos</h2>

  <!-- Contenedor dinámico con flex aplicado -->
  <div id="pedidos-dinamicos" class="pedido-container mt-4">
    <p class="text-center">Cargando pedidos...</p>
  </div>
</div>

<!-- Script para cargar pedidos -->
<script>
fetch("../../Controlador/cargar_pedidos.php")
  .then(res => res.json())
  .then(data => {
    const container = document.getElementById("pedidos-dinamicos");
    container.innerHTML = "";

    if (data.error) {
      container.innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
    } else if (data.length === 0) {
      container.innerHTML = `<div class="alert alert-info">No tienes pedidos aún.</div>`;
    } else {
      data.forEach(pedido => {
        const div = document.createElement("div");
        div.className = "pedido-box mb-4 p-3 border rounded";
        div.innerHTML = `
          <h4 class="text-center">Mi pedido</h4>
          <p><strong>Producto:</strong> ${pedido.producto}</p>
          <p><strong>Unidades:</strong> ${pedido.ped_cantidad_de_unidades}</p>
          <p><strong>Subtotal:</strong> $${(pedido.precio * pedido.ped_cantidad_de_unidades).toLocaleString()}</p>
          <p><strong>Fecha:</strong> ${pedido.ped_fecha_compra}</p>
          <hr>
          <p><strong>Método de pago</strong></p>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="pago_${pedido.id_pedido}" id="nequi_${pedido.id_pedido}">
              <label class="form-check-label" for="nequi_${pedido.id_pedido}">Nequi</label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="pago_${pedido.id_pedido}" id="contra_${pedido.id_pedido}">
              <label class="form-check-label" for="contra_${pedido.id_pedido}">Contraentrega</label>
          </div>
          <hr>
          <p><strong>Total:</strong> $${(pedido.precio * pedido.ped_cantidad_de_unidades).toLocaleString()}</p>
          <button class="btn btn-primary w-100">Pagar</button>
        `;
        container.appendChild(div);
      });
    }
  })
  .catch(() => {
    document.getElementById("pedidos-dinamicos").innerHTML =
      `<div class="alert alert-danger">Error al cargar los pedidos.</div>`;
  });
</script>

<?php include '../../footer.php'; ?>
<script src="../../Controlador/scriptcatalogo.js"></script>
<script src="../../Controlador/carrito.js"></script>
<script src="../../Controlador/navbar_sesion.js"></script>
</body>
</html>
