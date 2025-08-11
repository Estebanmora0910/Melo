<?php
require_once __DIR__ . '/../Modelo/EditarProductoModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $producto = [
        'id_producto' => $_POST['id_producto'],
        'pro_nombre' => $_POST['pro_nombre'],
        'pro_descripcion' => $_POST['pro_descripcion'],
        'pro_valor' => $_POST['pro_valor'],
        'id_categoria' => $_POST['id_categoria'],
        'inv_disponibilidad' => $_POST['inv_disponibilidad']
    ];

    EditarProductoModel::actualizarProducto($producto);

    header('Location: /melo8-main/Controlador/InventoryController.php');
    exit;
}

if (isset($_GET['id'])) {
    $id_inventario = $_GET['id'];
    $producto = EditarProductoModel::obtenerProductoPorId($id_inventario);
    $categorias = EditarProductoModel::obtenerCategorias();

    include __DIR__ . '/../Vista/html/editar_producto.php';
} else {
    echo "ID no proporcionado.";
}
