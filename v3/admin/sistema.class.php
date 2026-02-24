<?php

require_once(__DIR__ . "/config.php");

class Sistema
{
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
};
