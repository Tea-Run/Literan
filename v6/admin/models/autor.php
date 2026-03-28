<?php
require_once(__DIR__ . "/../sistema.class.php");

class Autor extends Sistema
{

    function leer()
    {
        $sql = "SELECT * FROM autor";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function leerUno($id)
    {
        $sql = "SELECT * FROM autor WHERE id_autor = :id_autor";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindParam(":id_autor", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function crear($data)
    {
        if (empty($data['nombre'])) {
            return 0;
        }

        $sql = "INSERT INTO autor (nombre, apellido, seudonimo)
                VALUES (:nombre, :apellido, :seudonimo)";

        $stmt = $this->getDb()->prepare($sql);

        $stmt->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $data['apellido'], PDO::PARAM_STR);
        $stmt->bindParam(":seudonimo", $data['seudonimo'], PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->rowCount();
    }

    function actualizar($id, $data)
    {
        if (empty($data['nombre'])) {
            return 0;
        }

        $sql = "UPDATE autor
                SET nombre = :nombre,
                    apellido = :apellido,
                    seudonimo = :seudonimo
                WHERE id_autor = :id_autor";

        $stmt = $this->getDb()->prepare($sql);

        $stmt->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $data['apellido'], PDO::PARAM_STR);
        $stmt->bindParam(":seudonimo", $data['seudonimo'], PDO::PARAM_STR);
        $stmt->bindParam(":id_autor", $id, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->rowCount();
    }

    function borrar($id)
    {
        $sql = "DELETE FROM autor WHERE id_autor = :id_autor";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindParam(":id_autor", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
