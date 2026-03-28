<?php
require_once(__DIR__ . "/sistema.class.php");
require_once(__DIR__ . "/models/editorial.php");

$app = new Editorial();
$app->checarRol('Administrador');


$id = isset($_GET["id"]) ? $_GET["id"] : null;
$accion = isset($_GET["accion"]) ? $_GET["accion"] : null;

$data = [];

include_once(__DIR__ . '/views/header.php');

if (($accion == 'actualizar' || $accion == 'borrar') && !is_numeric($id)) {
    die("ID inválido");
}

switch ($accion) {

    case 'crear':
        if (isset($_POST['enviar'])) {
            $data = $_POST;

            $crear = $app->crear($data);

            if ($crear) {
                $app->alerta('success', 'Se agregó la editorial.');
            } else {
                $app->alerta('danger', 'No se agregó la editorial.');
            }

            $editoriales = $app->leer();
            require(__DIR__ . "/views/editoriales/index.php");

        } else {
            require(__DIR__ . "/views/editoriales/formulario.php");
        }
        break;

    case 'actualizar':
        if (isset($_POST['enviar'])) {
            $data = $_POST;

            $cantidad = $app->actualizar($id, $data);

            if ($cantidad) {
                $app->alerta('success', 'Se actualizó la editorial.');
            } else {
                $app->alerta('danger', 'No se actualizó la editorial.');
            }

            $editoriales = $app->leer();
            require(__DIR__ . "/views/editoriales/index.php");

        } else {
            $data = $app->leerUno($id);
            require(__DIR__ . "/views/editoriales/formulario.php");
        }
        break;

    case 'borrar':
        $cantidad = $app->borrar($id);

        if ($cantidad) {
            $app->alerta('success', 'Se eliminó la editorial.');
        } else {
            $app->alerta('danger', 'No se eliminó nada.');
        }

        $editoriales = $app->leer();
        require(__DIR__ . "/views/editoriales/index.php");
        break;

    case 'leer':
    default:
        $editoriales = $app->leer();
        require(__DIR__ . "/views/editoriales/index.php");
        break;
}

include_once(__DIR__ . '/views/footer.php');
?>