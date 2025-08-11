<?php
// /melo8-main/Modelo/EditarProductoModel.php
require_once __DIR__ . '/../Modelo/conexion.php';

class EditarProductoModel {
    public static function obtenerProductoPorId($id) {
        global $pdo;
        $sql = "SELECT p.*, i.inv_disponibilidad
                FROM producto p
                JOIN inventario i ON p.id_producto = i.id_producto
                WHERE i.id_inventario = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function obtenerCategorias() {
        global $pdo;
        $sql = "SELECT * FROM categoria";
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function actualizarProducto($producto) {
        global $pdo;

        // Actualizar producto
        $sql = "UPDATE producto SET pro_nombre = :nombre, pro_descripcion = :descripcion, pro_valor = :valor, id_categoria = :categoria WHERE id_producto = :id_producto";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nombre' => $producto['pro_nombre'],
            ':descripcion' => $producto['pro_descripcion'],
            ':valor' => $producto['pro_valor'],
            ':categoria' => $producto['id_categoria'],
            ':id_producto' => $producto['id_producto']
        ]);

        // Actualizar disponibilidad
        $sql2 = "UPDATE inventario SET inv_disponibilidad = :disponibilidad WHERE id_producto = :id_producto";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute([
            ':disponibilidad' => $producto['inv_disponibilidad'],
            ':id_producto' => $producto['id_producto']
        ]);
    }
}
