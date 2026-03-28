<?php

require_once(__DIR__ . "/config.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

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

    function cargarImagenPerfil($nombre, $idUsuario)
    {
        if (!isset($_FILES[$nombre])) {
            return null;
        }

        if ($_FILES[$nombre]['error'] != 0) {
            return null;
        }

        if (!in_array($_FILES[$nombre]['type'], $this->getExtencionesImagenes())) {
            return null;
        }

        if ($_FILES[$nombre]['size'] > 2000000) {
            return null;
        }

        $origen = $_FILES[$nombre]['tmp_name'];
        $partes = explode('.', $_FILES[$nombre]['name']);
        $extension = strtolower(end($partes));

        $nombreArchivo = uniqid('perfil_') . '_' . (int)$idUsuario;
        $nombre = 'uploads/perfil/' . $nombreArchivo . '.' . $extension;
        $destino = __DIR__ . '/../' . $nombre;

        $directorioDestino = dirname($destino);
        if (!is_dir($directorioDestino)) {
            mkdir($directorioDestino, 0755, true);
        }

        if (move_uploaded_file($origen, $destino)) {
            return $nombre;
        }

        return null;
    }

    function envioCorreo($nombreDestinatario, $destinatario, $asunto, $cuerpo)
    {
        $autoloadPaths = [
            __DIR__ . '/../vendor_old/autoload.php',
            __DIR__ . '/../vendor/autoload.php'
        ];

        $autoloadFound = false;
        foreach ($autoloadPaths as $path) {
            if (file_exists($path)) {
                require_once($path);
                $autoloadFound = true;
                break;
            }
        }

        if (!$autoloadFound) {
            return false;
        }

        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPAuth = true;
            $mail->Username = '22030482@itcelaya.edu.mx';
            $mail->Password = 'nuiskwpahkdgndsp';
            $mail->setFrom('22030482@itcelaya.edu.mx', 'Literan');
            $mail->addAddress($destinatario, $nombreDestinatario);
            $mail->isHTML(true);
            $mail->Subject = $asunto;
            $mail->Body = $cuerpo;

            return $mail->send();
        } catch (Exception $e) {
            return false;
        }
    }

    function getRoles($correo)
    {
        $sql = "SELECT DISTINCT r.rol 
            FROM rol r 
            INNER JOIN usuario_rol ur ON r.id_rol = ur.id_rol 
            INNER JOIN usuario u ON ur.id_usuario = u.id_usuario
            WHERE u.correo = :correo;";

        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    // obtener solo los permisos (sin repetir)
    function getPermisos($correo)
    {
        $sql = "SELECT DISTINCT p.permiso 
            FROM usuario u
            INNER JOIN usuario_rol ur ON u.id_usuario = ur.id_usuario
            INNER JOIN rol_permiso rp ON ur.id_rol = rp.id_rol
            INNER JOIN permiso p ON rp.id_permiso = p.id_permiso
            WHERE u.correo = :correo;";

        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    function login($correo, $contrasena)
    {
        $contrasenaMd5 = md5($contrasena);
        $sql = "SELECT * FROM usuario WHERE correo = :correo AND contrasena = :contrasena;";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $contrasenaMd5, PDO::PARAM_STR);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (isset($usuario['correo'])) {
            $_SESSION['validado'] = true;
            $_SESSION['id_usuario'] = $usuario['id_usuario']; // agregado útil
            $_SESSION['correo'] = $usuario['correo'];
            $_SESSION['roles'] = $this->getRoles($correo);
            $_SESSION['permisos'] = $this->getPermisos($correo);
            return true;
        } else {
            session_destroy();
            return false;
        }
    }

    function logout()
    {
        unset($_SESSION);
        session_destroy();
    }

    function checarRol($rol)
    {
        $rolBuscado = strtolower(trim((string)$rol));

        if (isset($_SESSION['validado']) && $_SESSION['validado'] === true) {
            $roles = isset($_SESSION['roles']) && is_array($_SESSION['roles']) ? $_SESSION['roles'] : [];
            $rolesNormalizados = array_map(function ($r) {
                return strtolower(trim((string)$r));
            }, $roles);

            if (in_array($rolBuscado, $rolesNormalizados, true)) {
                return true;
            }

            // Respaldo: valida rol directamente en BD por si la sesion no trae roles actualizados.
            $sql = "SELECT COUNT(*)
                    FROM rol r
                    INNER JOIN usuario_rol ur ON r.id_rol = ur.id_rol
                    INNER JOIN usuario u ON ur.id_usuario = u.id_usuario
                    WHERE LOWER(TRIM(r.rol)) = :rol
                    AND (u.id_usuario = :id_usuario OR u.correo = :correo)";

            $stmt = $this->getDb()->prepare($sql);
            $idUsuario = $_SESSION['id_usuario'] ?? 0;
            $correo = $_SESSION['correo'] ?? '';
            $stmt->bindParam(":rol", $rolBuscado, PDO::PARAM_STR);
            $stmt->bindParam(":id_usuario", $idUsuario, PDO::PARAM_INT);
            $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
            $stmt->execute();

            if ((int)$stmt->fetchColumn() > 0) {
                $_SESSION['roles'] = $this->getRoles($correo);
                return true;
            }
        }
        require_once(__DIR__ . "/views/login/header_login.php");
        $this->alerta('error', 'No tienes permiso para acceder a esta seccion <a href="login.php" class="text-brand-purple font-bold underline hover:text-brand-red">Iniciar sesión</a>');
        die();
        return false;
    }

    public function validarPermiso($permiso)
    {
        if (isset($_SESSION['validado']) && $_SESSION['validado'] == true) {
            $permisos = $_SESSION['permisos'];

            if (in_array($permiso, $permisos)) {
                return true;
            }
        }
        return false;
    }
};
