<?php

require_once(__DIR__ . "/config.php");

class Sistema
{
    function __construct()
    {
        $this->conectar();
    }
    
    function getDb()
    {
        return $this->db;
    }

    function getExtencionesImagenes()
    {
        return array("image/jpg", "image/jpeg", "image/png");
    }

    var $db;
    function conectar()
    {
        $this->db = new PDO(DBDRIVER . ":host=" . DBHOST . ";port=" . DBPORT . ";dbname=" . DBNAME, DBUSER, DBPASSWORD, [PDO::ATTR_ERRMODE => 1, PDO::ATTR_DEFAULT_FETCH_MODE => 2, PDO::ATTR_EMULATE_PREPARES => false]);
    }

    function alerta($tipo, $mensaje)
    {
        if (!is_null($tipo) && !is_null($mensaje)) {
            $alerta = array();
            $alerta['tipo'] = $tipo;
            $alerta['mensaje'] = $mensaje;
            include(__DIR__ . "/views/alerta.php");
        }
    }

    function cargarImagen($nombre, $path, $data)
{
    if (isset($_FILES[$nombre])) {
        if ($_FILES[$nombre]['error'] == 0) {
            if (in_array($_FILES[$nombre]['type'], $this->getExtencionesImagenes())) {
                if ($_FILES[$nombre]['size'] <= 2000000) {

                    $origen = $_FILES[$nombre]['tmp_name'];
                    $partes = explode('.', $_FILES[$nombre]['name']);
                    $extension = end($partes);

                    $nombreArchivo = uniqid('libro_');
                    $nombre = '/../uploads/' . $path . '/' . $nombreArchivo . '.' . $extension;

                    $destino = __DIR__ . $nombre;

                    if (move_uploaded_file($origen, $destino)) {
                        return $nombre;
                    }
                }
            }
        }
    }
    return null;
}
};
