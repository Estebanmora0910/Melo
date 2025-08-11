<?php
session_start();
require_once '../Modelo/conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(["error" => "Usuario no autenticado"]);
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

// Obtener el id_personas desde usuario
$sql = "SELECT id_personas FROM usuario WHERE id_usuario = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$usuario_id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    echo json_encode(["error" => "No se encontró el perfil asociado"]);
    exit;
}

$id_personas = $row['id_personas'];

// Obtener datos del formulario
$nombre    = $_POST['reg_nombre'] ?? '';
$correo    = $_POST['reg_correo'] ?? '';
$ciudad    = $_POST['reg_ciudad'] ?? '';
$direccion = $_POST['reg_direccion'] ?? '';
$telefono  = $_POST['reg_telefono'] ?? '';
$usuario   = $_POST['reg_nombre_usuario'] ?? '';

try {
    $update = $pdo->prepare("UPDATE personas SET 
        reg_nombre = :nombre,
        reg_correo = :correo,
        reg_ciudad = :ciudad,
        reg_direccion = :direccion,
        reg_telefono = :telefono,
        reg_nombre_usuario = :usuario
        WHERE id_personas = :id");

    $update->execute([
        ':nombre'   => $nombre,
        ':correo'   => $correo,
        ':ciudad'   => $ciudad,
        ':direccion'=> $direccion,
        ':telefono' => $telefono,
        ':usuario'  => $usuario,
        ':id'       => $id_personas
    ]);

    echo json_encode(["mensaje" => "Perfil actualizado con éxito"]);

} catch (PDOException $e) {
    echo json_encode(["error" => "Error al actualizar perfil: " . $e->getMessage()]);
}
?>
