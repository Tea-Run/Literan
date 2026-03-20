<?php
require_once(__DIR__ . "/sistema.class.php");
require_once(__DIR__ . "/models/edicion.php");

$app = new LibroEdicion();

$id_libro = isset($_GET["id_libro"]) ? $_GET["id_libro"] : null;
$id_editorial = isset($_GET["id_editorial"]) ? $_GET["id_editorial"] : null;
$accion = isset($_GET["accion"]) ? $_GET["accion"] : null;

$libros = $app->leerLibros();
$editoriales = $app->leerEditoriales();
$data = [];

include_once(__DIR__ . '/views/header.php');

if (($accion == 'actualizar' || $accion == 'borrar') && (!is_numeric($id_libro) || !is_numeric($id_editorial))) {
    die("ID inválido");
}

switch ($accion) {

    case 'crear':
        if (isset($_POST['enviar'])) {
            $data = $_POST;

            $crear = $app->crear($data);

            if ($crear) {
                $app->alerta('success', 'Se agregó la edición.');
            } else {
                $app->alerta('danger', 'No se agregó la edición.');
            }

            $ediciones = $app->leer();
            require(__DIR__ . "/views/ediciones/index.php");

        } else {
            require(__DIR__ . "/views/ediciones/formulario.php");
        }
        break;

    case 'actualizar':
        if (isset($_POST['enviar'])) {
            $data = $_POST;

            $cantidad = $app->actualizar($id_libro, $id_editorial, $data);

            if ($cantidad) {
                $app->alerta('success', 'Se actualizó la edición.');
            } else {
                $app->alerta('danger', 'No se actualizó la edición.');
            }

            $ediciones = $app->leer();
            require(__DIR__ . "/views/ediciones/index.php");

        } else {
            $data = $app->leerUno($id_libro, $id_editorial);
            require(__DIR__ . "/views/ediciones/formulario.php");
        }
        break;

    case 'borrar':
        $cantidad = $app->borrar($id_libro, $id_editorial);

        if ($cantidad) {
            $app->alerta('success', 'Se eliminó la edición.');
        } else {
            $app->alerta('danger', 'No se eliminó nada.');
        }

        $ediciones = $app->leer();
        require(__DIR__ . "/views/ediciones/index.php");
        break;

    case 'leer':
    default:
        $ediciones = $app->leer();
        require(__DIR__ . "/views/ediciones/index.php");
        break;
}

include_once(__DIR__ . '/views/footer.php');
?>