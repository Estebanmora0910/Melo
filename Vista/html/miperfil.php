<?php
session_start()
?>



<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mi Perfil</title>
  <link rel="stylesheet" href="../css/miperfil.css">
</head>
<body>
  <div class="container">
    <h2>Mi Perfil</h2>
    <form id="form-perfil">
      <div>
        <label>Nombre:</label>
        <input type="text" name="reg_nombre" required>
      </div>
      <div>
        <label>Correo:</label>
        <input type="text" name="reg_correo" required>
      </div>
      <div>
        <label>Ciudad:</label>
        <input type="text" name="reg_ciudad" required>
      </div>
      <div>
        <label>Dirección:</label>
        <input type="text" name="reg_direccion" required>
      </div>
      <div>
        <label>Teléfono:</label>
        <input type="text" name="reg_telefono" required>
      </div>
      <div>
        <label>Nombre de Usuario:</label>
        <input type="text" name="reg_nombre_usuario" required>
      </div>
      
      <button type="submit">Actualizar</button>
    </form>
   

  <!-- Verificación de sesión -->
  <script>
    fetch("../../Controlador/verificar_estado.php")
      .then(res => res.text())
      .then(data => {
        if (data !== "1") {
          alert("Debes iniciar sesión para acceder a tu perfil.");
          window.location.href = "login.php";
        }
      })
      .catch(err => {
        console.error("Error verificando sesión:", err);
        alert("Ocurrió un error al verificar tu sesión.");
        window.location.href = "login.php";
      });
  </script>

  <!-- Actualización y carga -->
  <script>
    document.getElementById("form-perfil").addEventListener("submit", function(e) {
      e.preventDefault();

      const formData = new FormData(this);

      fetch("../../Controlador/actualizar_perfil.php", {
        method: "POST",
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        document.getElementById("mensaje").textContent = data.mensaje || data.error;
      })
      .catch(() => {
        document.getElementById("mensaje").textContent = "Error al actualizar perfil.";
      });
    });

    window.onload = function() {
      fetch("../../Controlador/obtener_perfil.php")
        .then(res => res.json())
        .then(data => {
          if (data.error) {
            document.getElementById("mensaje").textContent = data.error;
          } else {
            for (const key in data) {
              const input = document.querySelector(`[name="${key}"]`);
              if (input) input.value = data[key];
            }
          }
        });
    };
  </script>
  <!-- Aquí van otros scripts si tienes -->

<script>
  fetch("../../Controlador/verificar_estado.php")
    .then(res => res.text())
    .then(data => {
      if (data === "1") {
        const perfilLink = document.getElementById("perfil-link");
        if (perfilLink) {
          perfilLink.classList.remove("d-none");
        }
      }
    })
    .catch(err => {
      console.error("Error al verificar sesión:", err);
    });
</script>

</body>
</html>

</body>
</html>
