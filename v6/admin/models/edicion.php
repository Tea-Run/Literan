<?php
require_once(__DIR__ . "/../sistema.class.php");

class LibroEdicion extends Sistema
{

    function leer()
    {
        $sql = "SELECT le.*, l.titulo, e.nombre AS editorial
                FROM libro_edicion le
                INNER JOIN libro l ON le.id_libro = l.id_libro
                INNER JOIN editorial e ON le.id_editorial = e.id_editorial";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function leerLibros()
    {
        $sql = "SELECT id_libro, titulo FROM libro";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function leerEditoriales()
    {
        $sql = "SELECT id_editorial, nombre FROM editorial";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function leerUno($id_libro, $id_editorial)
    {
        $sql = "SELECT * FROM libro_edicion 
                WHERE id_libro = :id_libro AND id_editorial = :id_editorial";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindParam(":id_libro", $id_libro, PDO::PARAM_INT);
        $stmt->bindParam(":id_editorial", $id_editorial, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function crear($data)
    {
        if (empty($data['id_libro']) || empty($data['id_editorial']) || empty($data['precio'])) {
            return 0;
        }

        $sql = "INSERT INTO libro_edicion (id_libro, id_editorial, nombre, precio, descripcion)
                VALUES (:id_libro, :id_editorial, :nombre, :precio, :descripcion)";

        $stmt = $this->getDb()->prepare($sql);

        $stmt->bindParam(":id_libro", $data['id_libro'], PDO::PARAM_INT);
        $stmt->bindParam(":id_editorial", $data['id_editorial'], PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $data['precio']);
        $stmt->bindParam(":descripcion", $data['descripcion'], PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->rowCount();
    }

    function actualizar($id_libro, $id_editorial, $data)
    {
        if (empty($data['precio'])) {
            return 0;
        }

        $sql = "UPDATE libro_edicion
                SET nombre = :nombre,
                    precio = :precio,
                    descripcion = :descripcion
                WHERE id_libro = :id_libro AND id_editorial = :id_editorial";

        $stmt = $this->getDb()->prepare($sql);

        $stmt->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $data['precio']);
        $stmt->bindParam(":descripcion", $data['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(":id_libro", $id_libro, PDO::PARAM_INT);
        $stmt->bindParam(":id_editorial", $id_editorial, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->rowCount();
    }

    function borrar($id_libro, $id_editorial)
    {
        $sql = "DELETE FROM libro_edicion 
                WHERE id_libro = :id_libro AND id_editorial = :id_editorial";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindParam(":id_libro", $id_libro, PDO::PARAM_INT);
        $stmt->bindParam(":id_editorial", $id_editorial, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

}