<?php
require_once __DIR__ . '/conexion.php';

class MovimientosModel {
    public static function obtenerMovimientos() {
        global $pdo;

        $sql = "SELECT 
                    m.id_movimiento,
                    p.pro_nombre AS producto,
                    m.tipo_movimiento,
                    m.cantidad,
                    m.fecha_movimiento,
                    m.detalle
                FROM movimientos m
                INNER JOIN producto p ON m.id_producto = p.id_producto
                ORDER BY m.fecha_movimiento DESC";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
