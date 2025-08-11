<?php
require_once __DIR__ . '/conexion.php';

class PersonasModel {
    public static function obtenerPersonas() {
        global $pdo;
        $sql = "SELECT 
                    p.id_personas,
                    p.reg_nombre,
                    p.reg_correo,
                    p.reg_direccion,
                    p.reg_ciudad,
                    p.reg_tipo,
                    p.reg_telefono,
                    u.usu_nombre_usuario
                FROM personas p
                INNER JOIN usuario u ON p.id_personas = u.id_personas";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerPersonaPorId($id) {
        global $pdo;
        $sql = "SELECT * FROM personas WHERE id_personas = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function actualizarPersona($id, $datos) {
        global $pdo;
        $sql = "UPDATE personas SET 
                    reg_nombre = :nombre,
                    reg_correo = :correo,
                    reg_direccion = :direccion,
                    reg_ciudad = :ciudad,
                    reg_tipo = :tipo,
                    reg_telefono = :telefono
                WHERE id_personas = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nombre' => $datos['reg_nombre'],
            'correo' => $datos['reg_correo'],
            'direccion' => $datos['reg_direccion'],
            'ciudad' => $datos['reg_ciudad'],
            'tipo' => $datos['reg_tipo'],
            'telefono' => $datos['reg_telefono'],
            'id' => $id
        ]);
    }
}
