<?php
session_start();
$mensaje = $_GET['mensaje'] ?? '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/melo8-main/Vista/css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <title>Registrarse - Jabones DR</title>
</head>
<body>
    <!-- HEADER -->



    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="card shadow-lg">
                        <div class="card-body p-4">
                            <h4 class="text-center mb-3">Crear una cuenta</h4>

                            <?php if ($mensaje): ?>
                                <div class="alert alert-danger text-center">
                                    <?= htmlspecialchars($mensaje) ?>
                                </div>
                            <?php endif; ?>

                            <form action="http://localhost:8081/melo8-main/Controlador/registro_controlador.php" method="POST" id="formRegistro">
                                <div class="mb-3">
                                    <label class="form-label">Nombre completo</label>
                                    <input type="text" class="form-control" name="nombre" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Nombre de usuario</label>
                                    <input type="text" class="form-control" name="nombre_usuario" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Correo electrónico</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Confirmar correo</label>
                                    <input type="email" class="form-control" name="confirm-email" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Confirmar contraseña</label>
                                    <input type="password" class="form-control" name="confirm-password" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Dirección</label>
                                    <input type="text" class="form-control" name="direccion">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Ciudad</label>
                                    <input type="text" class="form-control" name="ciudad">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Celular</label>
                                    <input type="text" class="form-control" name="celular">
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                            </form>

                            <div class="text-center mt-3">
                                <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->

    <!-- JS VALIDACIÓN -->
    <!-- <script>
    document.getElementById("formRegistro").addEventListener("submit", function(e) {
        let correo = document.querySelector("input[name='email']").value.trim();
        let confirmCorreo = document.querySelector("input[name='confirm-email']").value.trim();
        let contrasena = document.querySelector("input[name='password']").value;
        let confirmContrasena = document.querySelector("input[name='confirm-password']").value;

        let regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!regexCorreo.test(correo)) {
            alert("El correo electrónico no es válido.");
            e.preventDefault();
            return;
        }
        if (correo.toLowerCase() !== confirmCorreo.toLowerCase()) {
            alert("Los correos no coinciden.");
            e.preventDefault();
            return;
        }
        if (contrasena.length < 8) {
            alert("La contraseña debe tener al menos 8 caracteres.");
            e.preventDefault();
            return;
        }
        if (contrasena !== confirmContrasena) {
            alert("Las contraseñas no coinciden.");
            e.preventDefault();
            return;
        }
    });
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>