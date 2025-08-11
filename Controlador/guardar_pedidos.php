<?php
session_start();
require_once '../Modelo/conexion.php';

date_default_timezone_set('America/Bogota'); // ⬅ Ajusta según tu país
$fecha = date("Y-m-d H:i:s");


header('Content-Type: application/json');

if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(["success" => false, "message" => "Usuario no autenticado"]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);
$carrito = $data['carrito'] ?? [];

if (empty($carrito)) {
    echo json_encode(["success" => false, "message" => "Carrito vacío"]);
    exit;
}

try {
    $pdo->beginTransaction();

    $id_usuario = $_SESSION['id_usuario'];
    $fecha = date("Y-m-d H:i:s");

    foreach ($carrito as $item) {
        $stmt = $pdo->prepare("
            INSERT INTO pedido (id_usuario, id_producto, ped_fecha_compra, ped_cantidad_de_unidades)
            VALUES (
                :id_usuario, 
                (SELECT id_producto FROM producto WHERE pro_nombre = :nombre LIMIT 1), 
                :fecha, 
                :cantidad
            )
        ");
        $stmt->execute([
            ":id_usuario" => $id_usuario,
            ":nombre" => $item['nombre'],
            ":fecha" => $fecha,
            ":cantidad" => $item['cantidad']
        ]);
    }

    $pdo->commit();
    echo json_encode(["success" => true]);

} catch (Exception $e) {
    $pdo->rollBack();
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}
