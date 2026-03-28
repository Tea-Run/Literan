<?php
require_once (__DIR__."/../sistema.class.php");
class Categoria extends Sistema{

    function leer(){
        $this->conectar();
        $sql="select * from categoria";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $categoria = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $categoria;
    }

    function leerUno($id){
        $this->conectar();
        $sql="select * from categoria where id_categoria = :id_categoria";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_categoria",$id,PDO::PARAM_INT);
        $stmt->execute();
        $categoria = $stmt->fetch(PDO::FETCH_ASSOC);
        return $categoria;
    }

    function crear($data){
        $this->conectar();
        $sql = "insert into categoria (categoria) values (:categoria)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":categoria",$data['categoria'],PDO::PARAM_STR);
        $resultado = $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;
    }

    function actualizar($id,$data){
        $this->conectar();
        $sql = "update categoria set categoria = :categoria where id_categoria = :id_categoria";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':categoria', $data['categoria'],PDO::PARAM_STR);
        $stmt->bindParam(':id_categoria', $id,PDO::PARAM_INT);
        $stmt->execute ();
        return $stmt->rowCount();
    }

    function borrar($id){
         $this->conectar();
         $sql = "delete from categoria where id_categoria = :id_categoria";
         $stmt = $this->db->prepare($sql);
         $stmt->bindParam(':id_categoria', $id,PDO::PARAM_INT);
         $stmt->execute();
         return $stmt->rowCount();
    }
}