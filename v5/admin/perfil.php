<?php
require_once(__DIR__ . "/sistema.class.php");
require_once(__DIR__ . "/models/perfil.php");

$app = new Perfil();

if (!isset($_SESSION['validado']) || $_SESSION['validado'] !== true) {
    header("Location: login.php");
    exit();
}

$accion = isset($_GET['accion']) ? $_GET['accion'] : null;
$idUsuario = isset($_SESSION['id_usuario']) ? (int)$_SESSION['id_usuario'] : 0;

if ($idUsuario <= 0 && isset($_SESSION['correo'])) {
    $idUsuario = $app->obtenerIdUsuarioPorCorreo($_SESSION['correo']);
    if ($idUsuario) {
        $_SESSION['id_usuario'] = $idUsuario;
    }
}

if ($idUsuario <= 0) {
    $app->logout();
    header("Location: login.php");
    exit();
}

$data = [];

include_once(__DIR__ . '/views/header.php');

switch ($accion) {
    case 'actualizar':
        if (isset($_POST['enviar'])) {
            $data = [
                'correo' => $_POST['correo'] ?? '',
                'nombre' => $_POST['nombre'] ?? '',
                'primer_apellido' => $_POST['primer_apellido'] ?? '',
                'segundo_apellido' => $_POST['segundo_apellido'] ?? ''
            ];

            $resultado = $app->actualizarPerfil($idUsuario, $data);

            if ($resultado === 1) {
                $_SESSION['correo'] = $data['correo'];
                $app->alerta('success', 'Perfil actualizado correctamente.');
            } elseif ($resultado === -1) {
                $app->alerta('error', 'El correo ya esta en uso.');
            } elseif ($resultado === -2) {
                $app->alerta('error', 'No se pudo subir la imagen. Verifica formato JPG/JPEG/PNG y tamano maximo de 2MB.');
            } else {
                $app->alerta('error', 'No se pudo actualizar el perfil.');
            }

            $data = $app->obtenerPerfil($idUsuario);
            require(__DIR__ . "/views/perfil/index.php");
        } else {
            $data = $app->obtenerPerfil($idUsuario);
            require(__DIR__ . "/views/perfil/formulario.php");
        }
        break;

    case 'ver':
    default:
        $data = $app->obtenerPerfil($idUsuario);
        require(__DIR__ . "/views/perfil/index.php");
        break;
}

include_once(__DIR__ . '/views/footer.php');
?>
