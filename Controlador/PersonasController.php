<?php
require_once __DIR__ . '/../Modelo/PersonaModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editar_persona'])) {
    $id = $_POST['id_personas'];
    $datos = [
        'reg_nombre' => $_POST['reg_nombre'],
        'reg_correo' => $_POST['reg_correo'],
        'reg_direccion' => $_POST['reg_direccion'],
        'reg_ciudad' => $_POST['reg_ciudad'],
        'reg_tipo' => $_POST['reg_tipo'],
        'reg_telefono' => $_POST['reg_telefono']
    ];
    PersonasModel::actualizarPersona($id, $datos);
    header('Location: /melo8-main/Controlador/PersonasController.php');
    exit;
}

if (isset($_GET['id'])) {
    $persona = PersonasModel::obtenerPersonaPorId($_GET['id']);
    include __DIR__ . '/../Vista/html/editar_persona.php';
    exit;
}

require_once '../Modelo/ProductoModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['crear_producto'])) {
    // Si no viene el id_producto del formulario, generarlo
    if (empty($_POST['id_producto'])) {
        $ultimoId = ProductoModel::obtenerUltimoIdProducto();
        $id_producto = $ultimoId + 1;
    } else {
        $id_producto = $_POST['id_producto'];
    }

    $producto = [
        'id_producto' => $id_producto,
        'pro_nombre' => $_POST['pro_nombre'],
        'pro_descripcion' => $_POST['pro_descripcion'],
        'pro_valor' => $_POST['pro_valor'],
        'id_categoria' => $_POST['id_categoria']
    ];

    $inventario = [
        'inv_cantidad_entrada' => $_POST['inv_cantidad_entrada'],
        'inv_disponibilidad' => $_POST['inv_disponibilidad'],
        'fecha_ingreso' => $_POST['fecha_ingreso']
    ];

    ProductoModel::crearProductoConInventario($producto, $inventario);

    header('Location: ../Controlador/InventoryController.php');
    exit;
}


$personas = PersonasModel::obtenerPersonas();
include __DIR__ . '/../Vista/html/gestion_personas.php';
