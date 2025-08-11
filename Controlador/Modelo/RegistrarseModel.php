<?php
require_once 'conexion.php';

class RegistrarseModel {
    private $pdo;

    public function __construct() {
        $this->pdo = $GLOBALS['pdo'];
    }

    public function existeCorreo($correo) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM personas WHERE reg_correo = ?");
        $stmt->execute([$correo]);
        return $stmt->fetchColumn() > 0;
    }

    public function existeUsuario($nombre_usuario) {
        // Removemos la check en 'personas' porque no tiene el campo reg_nombre_usuario
        // Solo verificamos en 'usuario' (donde sí existe usu_nombre_usuario)
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM usuario WHERE usu_nombre_usuario = ?");
        $stmt->execute([$nombre_usuario]);
        return $stmt->fetchColumn() > 0;
    }

    public function registrarPersonaYUsuario($datos) {
        try {
            $this->pdo->beginTransaction();

            // Insert en 'personas' SIN reg_nombre_usuario
            $stmt1 = $this->pdo->prepare("INSERT INTO personas 
                (reg_nombre, reg_correo, reg_contrasena, reg_direccion, reg_ciudad, reg_telefono)
                VALUES (?, ?, ?, ?, ?, ?)");
            $stmt1->execute([
                $datos['nombre'],
                $datos['correo'],
                $datos['contrasena'],
                $datos['direccion'],
                $datos['ciudad'],
                $datos['telefono']
            ]);

            $id_personas = $this->pdo->lastInsertId();

            // Insert en 'usuario' con rol 3 por defecto (como ya tienes)
            $stmt2 = $this->pdo->prepare("INSERT INTO usuario 
                (id_personas, id_rol, usu_nombre_usuario, usu_contrasena)
                VALUES (?, 3, ?, ?)");
            $stmt2->execute([
                $id_personas,
                $datos['nombre_usuario'],
                $datos['contrasena']
            ]);

            $this->pdo->commit();
            return true;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }
}