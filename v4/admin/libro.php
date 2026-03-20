<?php
require_once(__DIR__ . "/sistema.class.php");
require_once(__DIR__ . "/models/libro.php");

$app = new Libro();


$id = isset($_GET["id"]) ? $_GET["id"] : null;
$accion = isset($_GET["accion"]) ? $_GET["accion"] : null;

$categorias = $app->leerCategorias();
$autores = $app->leerAutores();

$data = [];

include_once(__DIR__ . '/views/header.php');

switch ($accion) {

    case 'crear':
        if (isset($_POST['enviar'])) {
            $data = $_POST;

            $crear = $app->crear($data);

            if ($crear) {
                $app->alerta('success', 'Se agregó el libro.');
            } else {
                $app->alerta('danger', 'No se agregó el libro.');
            }

            $libros = $app->leer();
            require(__DIR__ . "/views/libros/index.php");

        } else {
            require(__DIR__ . "/views/libros/formulario.php");
        }
        break;

    case 'actualizar':
        if (isset($_POST['enviar'])) {
            $data = $_POST;

            $cantidad = $app->actualizar($id, $data);

            if ($cantidad) {
                $app->alerta('success', 'Se actualizó el libro.');
            } else {
                $app->alerta('danger', 'No se actualizó el libro.');
            }

            $libros = $app->leer();
            require(__DIR__ . "/views/libros/index.php");

        } else {
            $data = $app->leerUno($id);
            require(__DIR__ . "/views/libros/formulario.php");
        }
        break;

    case 'borrar':
        $cantidad = $app->borrar($id);

        if ($cantidad) {
            $app->alerta('success', 'Se eliminó el libro.');
        } else {
            $app->alerta('danger', 'No se eliminó nada.');
        }

        $libros = $app->leer();
        require(__DIR__ . "/views/libros/index.php");
        break;

    case 'leer':
    default:
        $libros = $app->leer();
        require(__DIR__ . "/views/libros/index.php");
        break;
}

include_once(__DIR__ . '/views/footer.php');
?>