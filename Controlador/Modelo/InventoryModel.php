<?php
require_once __DIR__ . '/../Modelo/conexion.php';

class InventoryModel {
    private $pdo;

    public function __construct() {
        $this->pdo = $GLOBALS['pdo'];
        if (!$this->pdo) {
            throw new Exception("Error: No se pudo establecer la conexión con la base de datos.");
        }
    }

    public function obtenerInventario() {
        $sql = "SELECT 
            i.id_inventario,
            i.id_producto,
            p.pro_nombre,
            c.tipo_categoria AS categoria,
            i.inv_cantidad_entrada,
            i.inv_cantidad_salida,
            i.inv_cantidad_devueltas,
            i.inv_disponibilidad,
            i.fecha_ingreso,
            i.fecha_salida
        FROM inventario i
        INNER JOIN producto p ON i.id_producto = p.id_producto
        INNER JOIN categoria c ON p.id_categoria = c.id_categoria";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerInventarioFiltrado($categoria) {
        $sql = "SELECT 
            i.id_inventario,
            i.id_producto,
            p.pro_nombre,
            c.tipo_categoria AS categoria,
            i.inv_cantidad_entrada,
            i.inv_cantidad_salida,
            i.inv_cantidad_devueltas,
            i.inv_disponibilidad,
            i.fecha_ingreso,
            i.fecha_salida
        FROM inventario i
        INNER JOIN producto p ON i.id_producto = p.id_producto
        INNER JOIN categoria c ON p.id_categoria = c.id_categoria";

        if (!empty($categoria)) {
            $sql .= " WHERE c.tipo_categoria = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$categoria]);
        } else {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function sincronizarInventarioConProductos() {
        $sql = "SELECT p.id_producto 
                FROM producto p
                LEFT JOIN inventario i ON p.id_producto = i.id_producto
                WHERE i.id_producto IS NULL";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $productos_faltantes = $stmt->fetchAll(PDO::FETCH_COLUMN);

        $insert = $this->pdo->prepare("INSERT INTO inventario 
            (id_producto, id_ventas, inv_ventas, inv_disponibilidad, inv_cantidad_entrada, inv_cantidad_salida, inv_cantidad_devueltas, fecha_ingreso) 
            VALUES (?, 0, 0, 0, 0, 0, 0, NOW())");

        $count = 0;
        foreach ($productos_faltantes as $id_producto) {
            $insert->execute([$id_producto]);
            $count++;
        }
        return $count;
    }

    public function eliminarInventario($id_inventario) {
        try {
            $this->pdo->beginTransaction();

            // Verificar si el registro existe
            $query = "SELECT i.id_producto, i.inv_cantidad_entrada, p.pro_nombre
                      FROM inventario i
                      JOIN producto p ON i.id_producto = p.id_producto
                      WHERE i.id_inventario = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$id_inventario]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$data) {
                throw new Exception("No se encontró el registro con id_inventario: $id_inventario");
            }

            // Eliminar de inventario
            $stmt = $this->pdo->prepare("DELETE FROM inventario WHERE id_inventario = ?");
            $stmt->execute([$id_inventario]);

            if ($stmt->rowCount() === 0) {
                throw new Exception("No se pudo eliminar el registro con id_inventario: $id_inventario");
            }

            // Eliminar de producto para evitar que la sincronización lo recree
            $stmt = $this->pdo->prepare("DELETE FROM producto WHERE id_producto = ?");
            $stmt->execute([$data['id_producto']]);
            if ($stmt->rowCount() === 0) {
                throw new Exception("No se pudo eliminar el producto con id_producto: " . $data['id_producto']);
            }

            // Registrar el movimiento
            $mov = $this->pdo->prepare("INSERT INTO movimientos 
                (id_producto, tipo_movimiento, cantidad, fecha_movimiento, detalle) 
                VALUES (?, 'salida', ?, NOW(), ?)");
            $mov->execute([
                $data['id_producto'],
                $data['inv_cantidad_entrada'],
                'Eliminación de producto: ' . $data['pro_nombre']
            ]);

            $this->pdo->commit();
            return true;
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw new Exception("Error al eliminar el producto: " . $e->getMessage());
        }
    }
}