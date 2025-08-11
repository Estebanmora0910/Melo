<?php
require_once __DIR__ . '/../Modelo/InventoryModel.php';

$inventoryModel = new InventoryModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'delete') {
        $id = $_POST['id_inventario'] ?? null;
        if ($id) {
            try {
                $inventoryModel->eliminarInventario($id);
                header('Location: /melo8-main/Controlador/InventoryController.php?mensaje=Producto eliminado correctamente');
                exit;
            } catch (Exception $e) {
                header('Location: /melo8-main/Controlador/InventoryController.php?error=' . urlencode($e->getMessage()));
                exit;
            }
        } else {
            header('Location: /melo8-main/Controlador/InventoryController.php?error=ID de inventario no proporcionado');
            exit;
        }
    } elseif ($action === 'sincronizar') {
        try {
            $count = $inventoryModel->sincronizarInventarioConProductos();
            header('Location: /melo8-main/Controlador/InventoryController.php?mensaje=Sincronización completada. ' . $count . ' productos añadidos');
            exit;
        } catch (Exception $e) {
            header('Location: /melo8-main/Controlador/InventoryController.php?error=' . urlencode($e->getMessage()));
            exit;
        }
    }
}

// Filtro por categoría
$categoria = $_GET['categoria'] ?? '';
$inventario = $inventoryModel->obtenerInventarioFiltrado($categoria);

include __DIR__ . '/../Vista/html/inventario.php';