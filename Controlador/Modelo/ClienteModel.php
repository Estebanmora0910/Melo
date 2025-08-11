<?php
require_once __DIR__ . '/conexion.php';

class ClienteModel {
    public static function obtenerClientes() {
        global $pdo;

        $sql = "SELECT * FROM vista_clientes_detallado";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
