<?php
session_start();
require_once '../Modelo/conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(["error" => "No has iniciado sesión"]);
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

// Obtener id_personas desde usuario
$sql = "SELECT p.reg_nombre, p.reg_correo, p.reg_ciudad, p.reg_direccion, p.reg_telefono, p.reg_nombre_usuario
        FROM usuario u
        INNER JOIN personas p ON u.id_personas = p.id_personas
        WHERE u.id_usuario = ?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$usuario_id]);

if ($stmt->rowCount() === 1) {
    $perfil = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($perfil);
} else {
    echo json_encode(["error" => "No se pudo obtener el perfil"]);
}
?>

