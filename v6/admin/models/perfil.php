<?php
require_once(__DIR__ . "/../sistema.class.php");

class Perfil extends Sistema
{
    function obtenerIdUsuarioPorCorreo($correo)
    {
        $sql = "SELECT id_usuario FROM usuario WHERE correo = :correo";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
        $stmt->execute();
        $id = $stmt->fetchColumn();
        return $id ? (int)$id : null;
    }

    function obtenerPerfil($idUsuario)
    {
        $sql = "SELECT u.id_usuario, u.correo, c.nombre, c.primer_apellido, c.segundo_apellido, c.imagen AS imagen_perfil
                FROM usuario u
                LEFT JOIN cliente c ON u.id_usuario = c.id_usuario
                WHERE u.id_usuario = :id_usuario";

        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindParam(":id_usuario", $idUsuario, PDO::PARAM_INT);
        $stmt->execute();

        $perfil = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$perfil) {
            return null;
        }

        return $perfil;
    }

    function actualizarPerfil($idUsuario, $data)
    {
        if (empty($data['correo']) || empty($data['nombre']) || empty($data['primer_apellido'])) {
            return 0;
        }

        if ($this->correoOcupado($idUsuario, $data['correo'])) {
            return -1;
        }

        try {
            $this->getDb()->beginTransaction();

            $sqlUsuario = "UPDATE usuario SET correo = :correo WHERE id_usuario = :id_usuario";
            $stmtUsuario = $this->getDb()->prepare($sqlUsuario);
            $stmtUsuario->bindParam(":correo", $data['correo'], PDO::PARAM_STR);
            $stmtUsuario->bindParam(":id_usuario", $idUsuario, PDO::PARAM_INT);
            $stmtUsuario->execute();

            $sqlExisteCliente = "SELECT COUNT(*) FROM cliente WHERE id_usuario = :id_usuario";
            $stmtExisteCliente = $this->getDb()->prepare($sqlExisteCliente);
            $stmtExisteCliente->bindParam(":id_usuario", $idUsuario, PDO::PARAM_INT);
            $stmtExisteCliente->execute();
            $existeCliente = (int)$stmtExisteCliente->fetchColumn() > 0;

            $perfilActual = $this->obtenerPerfil($idUsuario);
            $rutaImagen = $perfilActual['imagen_perfil'] ?? null;

            if (isset($_FILES['imagen_perfil']) && $_FILES['imagen_perfil']['error'] != 4) {
                $nuevaRuta = $this->cargarImagenPerfil('imagen_perfil', $idUsuario);

                if (!$nuevaRuta) {
                    $this->getDb()->rollBack();
                    return -2;
                }

                $rutaAnterior = __DIR__ . "/../" . ltrim((string)$rutaImagen, '/.');
                if (!empty($rutaImagen) && file_exists($rutaAnterior)) {
                    unlink($rutaAnterior);
                }

                $rutaImagen = $nuevaRuta;
            }

            if ($existeCliente) {
                $sqlCliente = "UPDATE cliente
                               SET nombre = :nombre,
                                   primer_apellido = :primer_apellido,
                                   segundo_apellido = :segundo_apellido,
                                   imagen = :imagen
                               WHERE id_usuario = :id_usuario";
            } else {
                $sqlCliente = "INSERT INTO cliente (id_usuario, nombre, primer_apellido, segundo_apellido, imagen)
                               VALUES (:id_usuario, :nombre, :primer_apellido, :segundo_apellido, :imagen)";
            }

            $stmtCliente = $this->getDb()->prepare($sqlCliente);
            $stmtCliente->bindParam(":id_usuario", $idUsuario, PDO::PARAM_INT);
            $stmtCliente->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
            $stmtCliente->bindParam(":primer_apellido", $data['primer_apellido'], PDO::PARAM_STR);
            $segundoApellido = $data['segundo_apellido'] ?? '';
            $stmtCliente->bindParam(":segundo_apellido", $segundoApellido, PDO::PARAM_STR);
            $stmtCliente->bindParam(":imagen", $rutaImagen, PDO::PARAM_STR);
            $stmtCliente->execute();

            $this->getDb()->commit();
            return 1;

        } catch (Exception $e) {
            $this->getDb()->rollBack();
            return 0;
        }
    }

    private function correoOcupado($idUsuario, $correo)
    {
        $sql = "SELECT COUNT(*)
                FROM usuario
                WHERE correo = :correo
                AND id_usuario <> :id_usuario";

        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario", $idUsuario, PDO::PARAM_INT);
        $stmt->execute();

        return (int)$stmt->fetchColumn() > 0;
    }

}
