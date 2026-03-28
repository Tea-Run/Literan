<?php
require_once(__DIR__ . "/sistema.class.php");
require_once(__DIR__ . "/models/registro.php");

$app = new Sistema();
$registro = new Usuario();

$id = isset($_GET["id"]) ? $_GET["id"] : null;
$accion = isset($_GET["accion"]) ? $_GET["accion"] : null;

$data = [];

// Header simple para login
include_once(__DIR__ . '/views/login/header_login.php');

switch ($accion) {

    case 'registro':
        if (isset($_POST['enviar'])) {
            $data = [
                'correo' => $_POST['correo'] ?? '',
                'contrasena' => $_POST['contrasena'] ?? '',
                'nombre' => $_POST['nombre'] ?? '',
                'primer_apellido' => $_POST['primer_apellido'] ?? '',
                'segundo_apellido' => $_POST['segundo_apellido'] ?? ''
            ];

            $confirmarContrasena = $_POST['confirmar_contrasena'] ?? '';

            if ($data['contrasena'] !== $confirmarContrasena) {
                $app->alerta('error', 'Las contraseñas no coinciden');
                require(__DIR__ . "/views/registros/index.php");
                break;
            }

            $resultado = $registro->registrar($data);

            if ($resultado === 1) {
                $app->alerta(
                    'success',
                    'Registro exitoso. <a href="login.php" class="text-brand-orange font-bold underline hover:text-brand-red">Iniciar sesión</a>'
                );
                require(__DIR__ . "/views/login/index.php");
                break;
            }

            if ($resultado === -1) {
                $app->alerta('error', 'El correo ya está registrado');
                require(__DIR__ . "/views/registros/index.php");
                break;
            }

            $app->alerta('error', 'No se pudo completar el registro');
            require(__DIR__ . "/views/registros/index.php");
            break;
        }

        require(__DIR__ . "/views/registros/index.php");
        break;

    case 'login':
        if (isset($_POST['enviar'])) {

            $correo = $_POST['correo'] ?? '';
            $contrasena = $_POST['contrasena'] ?? '';

            if ($app->login($correo, $contrasena)) {

                header("Location: index.php");
                exit();

            } else {

                $app->alerta(
                    'error',
                    'Correo o contraseña incorrectos. <a href="login.php" class="text-brand-orange font-bold underline hover:text-brand-red">Iniciar sesión</a>'
                );

                require(__DIR__ . "/views/login/index.php");
            }

        } else {

            require(__DIR__ . "/views/login/index.php");
        }
        break;

    case 'logout':
        $app->logout();
        header("Location: login.php");
        exit();
        break;

    case 'recuperar':
        require(__DIR__ . "/views/login/recuperar.php");
        break;

    default:
        require(__DIR__ . "/views/registros/index.php");
        break;
}

// Footer general (el mismo de todo el sistema)
include_once(__DIR__ . '/views/footer.php');
?>