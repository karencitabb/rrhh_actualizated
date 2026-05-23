<?php
// Iniciamos el sistema de sesiones de PHP
session_start();

// Traemos nuestra conexión segura
require_once 'config/conexion.php';

// Verificamos que los datos vengan del formulario (método POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Capturamos lo que escribió el usuario en el diseño
    $usuario_input = $_POST['usuario'];
    $contrasena_input = $_POST['contrasena'];

    // ── RECORDARME: leemos si el checkbox viene marcado ──
    $remember = isset($_POST['remember']);

    try {
        // Preparamos la consulta inteligente con DOS variables seguras (:input1 e :input2)
        $sql = "SELECT u.id_usuario, u.usuario, u.contrasena, u.id_roles, t.nombres, t.apellidos, t.correo_personal 
                FROM usuarios u
                INNER JOIN trabajadores t ON u.id_trabajador = t.id_trabajador
                WHERE u.usuario = :input1 OR t.correo_personal = :input2 
                LIMIT 1";
        
        $stmt = $conexion->prepare($sql);
        
        // Vinculamos las variables de forma segura
        $stmt->bindParam(':input1', $usuario_input, PDO::PARAM_STR);
        $stmt->bindParam(':input2', $usuario_input, PDO::PARAM_STR);
        $stmt->execute();
        
        $usuario = $stmt->fetch();

        // Verificamos si encontramos a alguien y si la contraseña coincide
        if ($usuario && $usuario['contrasena'] === $contrasena_input) {
            
            // Regeneramos el ID de sesión por seguridad
            session_regenerate_id(true);

            // Guardamos los datos importantes en la sesión
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['nombres']    = $usuario['nombres'];
            $_SESSION['apellidos']  = $usuario['apellidos'];
            $_SESSION['id_roles']   = $usuario['id_roles'];
            $_SESSION['logueado']   = true;

            // ── RECORDARME: guardar o borrar cookie según el checkbox ──
            if ($remember) {
                // Guardamos el usuario en una cookie por 30 días
                $expiry = time() + (30 * 24 * 60 * 60);
                setcookie('plastypetco_usuario', $usuario_input, $expiry, '/', '', false, true);
                // false = no requiere HTTPS (cámbialo a true cuando tengas SSL)
                // true  = httpOnly (JavaScript no puede leerla, más seguro)
            } else {
                // Si no marcó recordarme, eliminamos la cookie si existía
                setcookie('plastypetco_usuario', '', time() - 3600, '/');
            }

            // ¡Aprobado! Redirigimos al Dashboard
            header("Location: views/dashboard/dashboard.php");
            exit();
            
        } else {
            // Credenciales incorrectas: lo devolvemos al index con un aviso de error
            header("Location: index.php?error=1");
            exit();
        }

    } catch (PDOException $e) {
        // Si la base de datos falla, detenemos todo y mostramos por qué
        die("Error crítico en la autenticación: " . $e->getMessage());
    }
} else {
    // Si alguien intenta entrar a este archivo directamente, lo echamos al login
    header("Location: index.php");
    exit();
}
?>