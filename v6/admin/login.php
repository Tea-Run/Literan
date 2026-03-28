<?php // empleado controller
require_once(__DIR__ . "/sistema.class.php");

$app = new Sistema();

$id = isset($_GET["id"]) ? $_GET["id"] : null;
$accion = isset($_GET["accion"]) ? $_GET["accion"] : null;

switch ($accion) {
    case 'login':
        if (isset($_POST['correo']) && isset($_POST['contrasena'])) {
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            if ($app->login($correo, $contrasena)) {
                header("Location: index.php");
                exit();
            } else {
                $app->alerta('error', 'Correo o contraseña incorrectos');
            }
        } else {
            $app->alerta('error', 'Por favor ingresa tu correo y contraseña');
        }
        include_once(__DIR__ . '/views/login/header_login.php');
        require(__DIR__ . "/views/login/index.php");
        break;

    case 'logout':
        $app->logout();
        header("Location: login.php");
        exit();

    case 'recuperar':
        include_once(__DIR__ . '/views/login/header_login.php');
        require(__DIR__ . "/views/login/recuperar.php");
        break;

    default:
        include_once(__DIR__ . '/views/login/header_login.php');
        require(__DIR__ . "/views/login/index.php");
        break;
}

include_once(__DIR__ . '/views/footer.php');