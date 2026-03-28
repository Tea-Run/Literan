<?php
require_once(__DIR__ . "/../sistema.class.php");

class Usuario extends Sistema
{

    // Verifica si ya existe el correo
    function existeCorreo($correo)
    {
        $sql = "SELECT COUNT(*) FROM usuario WHERE correo = :correo";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    // Registrar usuario + cliente
    function registrar($data)
    {
        // Validación básica
        if (
            empty($data['correo']) ||
            empty($data['contrasena']) ||
            empty($data['nombre']) ||
            empty($data['primer_apellido'])
        ) {
            return 0;
        }

        // Verificar si el correo ya existe
        if ($this->existeCorreo($data['correo']) > 0) {
            return -1; // correo duplicado
        }

        try {
            $this->getDb()->beginTransaction();

            $contrasenaHash = md5($data['contrasena']);

            // Insertar en usuario
            $sqlUsuario = "INSERT INTO usuario (correo, contrasena)
                           VALUES (:correo, :contrasena)";

            $stmtUsuario = $this->getDb()->prepare($sqlUsuario);
            $stmtUsuario->bindParam(":correo", $data['correo'], PDO::PARAM_STR);
            $stmtUsuario->bindParam(":contrasena", $contrasenaHash, PDO::PARAM_STR);
            $stmtUsuario->execute();

            // Obtener id del usuario recién creado
            $id_usuario = $this->getDb()->lastInsertId();

            // Insertar en cliente
            $sqlCliente = "INSERT INTO cliente (id_usuario, nombre, primer_apellido, segundo_apellido)
                           VALUES (:id_usuario, :nombre, :primer_apellido, :segundo_apellido)";

            $stmtCliente = $this->getDb()->prepare($sqlCliente);
            $stmtCliente->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
            $stmtCliente->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
            $stmtCliente->bindParam(":primer_apellido", $data['primer_apellido'], PDO::PARAM_STR);
            $stmtCliente->bindParam(":segundo_apellido", $data['segundo_apellido'], PDO::PARAM_STR);
            $stmtCliente->execute();

            $this->getDb()->commit();

            return 1; // éxito

        } catch (Exception $e) {
            $this->getDb()->rollBack();
            return 0; // error
        }
    }

    // Obtener datos del cliente por correo (útil después del login)
    function obtenerPorCorreo($correo)
    {
        $sql = "SELECT u.correo, c.nombre, c.primer_apellido, c.segundo_apellido
                FROM usuario u
                INNER JOIN cliente c ON u.id_usuario = c.id_usuario
                WHERE u.correo = :correo";

        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}