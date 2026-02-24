<?php

require_once(__DIR__."/sistema.class.php");
require_once(__DIR__."/models/categoria.php");
$app = new Categoria;

$id = (isset($_GET['id']))?$_GET['id']:null;
$accion = (isset($_GET['accion']))?$_GET['accion']:null;
include_once(__DIR__."/views/header.php");

switch($accion){
    case 'crear':
        if(isset($_POST['categoria'])){
            $data = $_POST;
            $cantidad = $app->crear($data);
            if($cantidad){
                $app->alerta('success','Se creo nuevo categoria');
            }else{
                $app->alerta('warning','Algo salio mal');
            }
            $categorias = $app->leer();
            require(__DIR__."/views/categorias/index.php");
        }else{
            require(__DIR__."/views/categorias/formulario_crear.php");
        }
        break;
    case 'actualizar':
        if(isset($_POST['categoria'])){
            $data = $_POST;
            $cantidad = $app->actualizar($id,$data);
            if($cantidad){
                $app->alerta('success','Se actualizo el registro');
            }else{
                $app->alerta('warning','Algo salio mal');
            }
            $categorias = $app->leer();
            require(__DIR__."/views/categorias/index.php");
        }else{
            $data = $app->leerUno($id);
            require(__DIR__."/views/categorias/formulario_actualizar.php");
        }
        break;
    case 'borrar':
        $cantidad = $app->borrar($id);
        if($cantidad){
                $app->alerta('success','Se borro el regitro');
            }else{
                $app->alerta('warning','Algo salio mal');
            }
        $categorias = $app->leer();
        require(__DIR__."/views/categorias/index.php");
        break;
    case 'leer':
        $categorias = $app->leer();
        require(__DIR__."/views/categorias/index.php");
        break;
    default:
        $categorias = $app->leer();
        require(__DIR__."/views/categorias/index.php");
}

include_once(__DIR__."/views/footer.php");
?>