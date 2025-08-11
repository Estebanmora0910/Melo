<?php
require_once __DIR__ . '/conexion.php';

class ProductoModel {
    public static function crearProductoConInventario($producto, $inventario) {
        global $pdo;

        try {
            $pdo->beginTransaction();

            // Insertar en producto
            $stmtProducto = $pdo->prepare("INSERT INTO producto (id_producto, pro_nombre, pro_descripcion, pro_valor, id_categoria) VALUES (?, ?, ?, ?, ?)");
            $stmtProducto->execute([
                $producto['id_producto'],
                $producto['pro_nombre'],
                $producto['pro_descripcion'],
                $producto['pro_valor'],
                $producto['id_categoria']
            ]);

            // Insertar en inventario
            $stmtInventario = $pdo->prepare("INSERT INTO inventario (id_producto, inv_cantidad_entrada, inv_disponibilidad, fecha_ingreso) VALUES (?, ?, ?, ?)");
            $stmtInventario->execute([
                $producto['id_producto'],
                $inventario['inv_cantidad_entrada'],
                $inventario['inv_disponibilidad'],
                $inventario['fecha_ingreso']
            ]);

            // Insertar movimiento
            $stmtMovimiento = $pdo->prepare("INSERT INTO movimientos (id_producto, tipo_movimiento, cantidad, fecha_movimiento, detalle) VALUES (?, 'entrada', ?, NOW(), ?)");
            $detalle = "Se agregó el producto '{$producto['pro_nombre']}' con cantidad: {$inventario['inv_cantidad_entrada']}";
            $stmtMovimiento->execute([
                $producto['id_producto'],
                $inventario['inv_cantidad_entrada'],
                $detalle
            ]);

            $pdo->commit();
        } catch (PDOException $e) {
            $pdo->rollBack();
            die("Error al guardar producto: " . $e->getMessage());
        }
    }

    public static function obtenerCategorias() {
        global $pdo;
        $stmt = $pdo->query("SELECT id_categoria, tipo_categoria FROM categoria");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerUltimoIdProducto() {
        global $pdo;
        $stmt = $pdo->query("SELECT MAX(CAST(id_producto AS UNSIGNED)) as ultimo FROM producto");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['ultimo'] ?? 0;
    }
}
