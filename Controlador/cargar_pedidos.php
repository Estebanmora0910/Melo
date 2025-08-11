<?php
session_start();
require_once '../Modelo/conexion.php';

if (!isset($_SESSION['id_usuario'])) {
    http_response_code(401);
    echo json_encode(["error" => "Usuario no autenticado"]);
    exit;
}

$id_usuario = $_SESSION['id_usuario'];

try {
    $stmt = $pdo->prepare("
        SELECT 
            p.id_pedido,
            p.ped_fecha_compra,
            p.ped_cantidad_de_unidades,
            pr.pro_nombre AS producto,
            pr.pro_valor AS precio
        FROM pedido p
        JOIN producto pr ON p.id_producto = pr.id_producto
        WHERE p.id_usuario = :id_usuario
        ORDER BY p.ped_fecha_compra DESC
    ");
    $stmt->execute(['id_usuario' => $id_usuario]);
    $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($pedidos);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => "Error al obtener pedidos: " . $e->getMessage()]);
}
