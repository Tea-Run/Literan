<?php
require_once(__DIR__ . "/../sistema.class.php");

class Libro extends Sistema
{

    function graficarPorCategoria()
    {
        $sql = "SELECT c.categoria, COUNT(l.id_libro) AS cantidad
                FROM categoria c
                LEFT JOIN libro l ON l.id_categoria = c.id_categoria
                GROUP BY c.categoria
                ORDER BY cantidad DESC, c.categoria ASC";

        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function leer()
    {
        $sql = "SELECT l.*, c.categoria, a.nombre AS autor_nombre, a.apellido
                FROM libro l
                INNER JOIN categoria c ON l.id_categoria = c.id_categoria
                INNER JOIN autor a ON l.id_autor = a.id_autor";

        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function leerCategorias()
    {
        $sql = "SELECT id_categoria, categoria FROM categoria";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function leerAutores()
    {
        $sql = "SELECT id_autor, nombre, apellido FROM autor";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function leerUno($id)
    {
        $sql = "SELECT * FROM libro WHERE id_libro = :id_libro";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindParam(":id_libro", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function crear($data)
    {
        if (empty($data['titulo']) || empty($data['id_categoria']) || empty($data['id_autor'])) {
            return 0;
        }

        $imagen = $this->cargarImagen('imagen', 'libros', $data);
        

        $sql = "INSERT INTO libro (titulo, formato, descripcion, id_categoria, id_autor, imagen)
                VALUES (:titulo, :formato, :descripcion, :id_categoria, :id_autor, :imagen)";

        $stmt = $this->getDb()->prepare($sql);

        $stmt->bindParam(":titulo", $data['titulo'], PDO::PARAM_STR);
        $stmt->bindParam(":formato", $data['formato'], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $data['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(":id_categoria", $data['id_categoria'], PDO::PARAM_INT);
        $stmt->bindParam(":id_autor", $data['id_autor'], PDO::PARAM_INT);
        $stmt->bindParam(":imagen", $imagen, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->rowCount();
    }

    function actualizar($id, $data)
    {
        if (empty($data['titulo']) || empty($data['id_categoria']) || empty($data['id_autor'])) {
            return 0;
        }

        $libro = $this->leerUno($id);

        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {

            if ($libro['imagen'] && file_exists(__DIR__ . $libro['imagen'])) {
                unlink(__DIR__ . $libro['imagen']);
            }

            $data['imagen'] = $this->cargarImagen('imagen', 'libros', $data);

        } else {
            $data['imagen'] = $libro['imagen'];
        }

        $sql = "UPDATE libro
                SET titulo = :titulo,
                    formato = :formato,
                    descripcion = :descripcion,
                    id_categoria = :id_categoria,
                    id_autor = :id_autor,
                    imagen = :imagen
                WHERE id_libro = :id_libro";

        $stmt = $this->getDb()->prepare($sql);

        $stmt->bindParam(":titulo", $data['titulo'], PDO::PARAM_STR);
        $stmt->bindParam(":formato", $data['formato'], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $data['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(":id_categoria", $data['id_categoria'], PDO::PARAM_INT);
        $stmt->bindParam(":id_autor", $data['id_autor'], PDO::PARAM_INT);
        $stmt->bindParam(":imagen", $data['imagen'], PDO::PARAM_STR);
        $stmt->bindParam(":id_libro", $id, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->rowCount();
    }

    function borrar($id)
    {
        $libro = $this->leerUno($id);

        if ($libro['imagen'] && file_exists(__DIR__ . $libro['imagen'])) {
            unlink(__DIR__ . $libro['imagen']);
        }

        $sql = "DELETE FROM libro WHERE id_libro = :id_libro";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindParam(":id_libro", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount();
    }
}