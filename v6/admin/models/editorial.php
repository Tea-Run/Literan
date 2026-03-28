<?php
require_once(__DIR__ . "/../sistema.class.php");

class Editorial extends Sistema
{

    function leer()
    {
        $sql = "SELECT * FROM editorial";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function leerUno($id)
    {
        $sql = "SELECT * FROM editorial WHERE id_editorial = :id_editorial";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindParam(":id_editorial", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function crear($data)
    {
        if (empty($data['nombre']) || empty($data['razon_social']) || empty($data['rfc'])) {
            return 0;
        }

        $data['rfc'] = strtoupper($data['rfc']);

        $sql = "INSERT INTO editorial (nombre, razon_social, rfc, telefono, correo)
                VALUES (:nombre, :razon_social, :rfc, :telefono, :correo)";

        $stmt = $this->getDb()->prepare($sql);

        $stmt->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":razon_social", $data['razon_social'], PDO::PARAM_STR);
        $stmt->bindParam(":rfc", $data['rfc'], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $data['telefono'], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $data['correo'], PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->rowCount();
    }

    function actualizar($id, $data)
    {
        if (empty($data['nombre']) || empty($data['razon_social']) || empty($data['rfc'])) {
            return 0;
        }

        $data['rfc'] = strtoupper($data['rfc']);

        $sql = "UPDATE editorial
                SET nombre = :nombre,
                    razon_social = :razon_social,
                    rfc = :rfc,
                    telefono = :telefono,
                    correo = :correo
                WHERE id_editorial = :id_editorial";

        $stmt = $this->getDb()->prepare($sql);

        $stmt->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":razon_social", $data['razon_social'], PDO::PARAM_STR);
        $stmt->bindParam(":rfc", $data['rfc'], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $data['telefono'], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $data['correo'], PDO::PARAM_STR);
        $stmt->bindParam(":id_editorial", $id, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->rowCount();
    }

    function borrar($id)
    {
        $sql = "DELETE FROM editorial WHERE id_editorial = :id_editorial";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindParam(":id_editorial", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

}