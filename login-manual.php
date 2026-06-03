<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

$usuario = trim($_POST['usuario'] ?? '');
$contrasena = $_POST['contrasena'] ?? $_POST['password'] ?? '';

if ($usuario === '' || $contrasena === '') {
    $_SESSION['login_error'] = 'Debes ingresar usuario y contraseña.';
    header('Location: index.php');
    exit();
}

try {
    $sql = "SELECT 
                id_usuario,
                usuario,
                contrasena,
                id_roles,
                id_trabajador
            FROM usuarios
            WHERE usuario = :usuario
            LIMIT 1";

    $stmt = $conexion->prepare($sql);
    $stmt->execute([
        ':usuario' => $usuario
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        $_SESSION['login_error'] = 'Usuario o contraseña incorrectos.';
        header('Location: index.php');
        exit();
    }

    $hashGuardado = $user['contrasena'];

    $passwordCorrecta = password_verify($contrasena, $hashGuardado);

    // Respaldo por si en algún momento guardaste contraseña sin encriptar
    if (!$passwordCorrecta && hash_equals($hashGuardado, $contrasena)) {
        $passwordCorrecta = true;
    }

    if (!$passwordCorrecta) {
        $_SESSION['login_error'] = 'Usuario o contraseña incorrectos.';
        header('Location: index.php');
        exit();
    }

    $_SESSION['logueado'] = true;
    $_SESSION['id_usuario'] = $user['id_usuario'];
    $_SESSION['usuario'] = $user['usuario'];
    $_SESSION['id_roles'] = $user['id_roles'];
    $_SESSION['id_trabajador'] = $user['id_trabajador'];

    // Datos para el topbar del dashboard
    $_SESSION['nombres'] = 'Paola Andrea';
    $_SESSION['nombre'] = 'Paola Andrea';
    $_SESSION['apellidos'] = 'Franco';

    $_SESSION['rol_nombre'] = match ((int)$user['id_roles']) {
        1 => 'Administrador',
        2 => 'Recursos Humanos',
        3 => 'SST',
        default => 'RRHH'
    };

    $_SESSION['rol'] = $_SESSION['rol_nombre'];

    header('Location: views/dashboard/dashboard.php');
    exit();

} catch (PDOException $e) {
    $_SESSION['login_error'] = 'Error en el inicio de sesión: ' . $e->getMessage();
    header('Location: index.php');
    exit();
}