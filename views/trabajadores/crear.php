<?php
session_start();

// Proteger la ruta
if (!isset($_SESSION['logueado']) || !$_SESSION['logueado']) {
    header("Location: ../../index.php");
    exit();
}

require_once '../../config/conexion.php';

$error = '';

// Procesar el formulario cuando se le da a "Guardar"
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombres   = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo    = $_POST['correo'];
    $cargo     = $_POST['cargo'];
    $id_rol    = $_POST['id_rol'];
    
    $estado = 1; // 1 = Activo por defecto
    $fecha_ingreso = date('Y-m-d');
    $contrasena_temporal = '123456'; // Clave por defecto para el primer ingreso

    try {
        // Iniciamos una transacción para no guardar datos a medias
        $conexion->beginTransaction();

        // 1. Insertar en trabajadores
        $sql_trabajador = "INSERT INTO trabajadores (nombres, apellidos, correo_personal, cargo, estado, fecha_ingreso) 
                           VALUES (:nombres, :apellidos, :correo, :cargo, :estado, :fecha)";
        $stmt_trab = $conexion->prepare($sql_trabajador);
        $stmt_trab->execute([
            ':nombres'   => $nombres,
            ':apellidos' => $apellidos,
            ':correo'    => $correo,
            ':cargo'     => $cargo,
            ':estado'    => $estado,
            ':fecha'     => $fecha_ingreso
        ]);

        $id_nuevo_trabajador = $conexion->lastInsertId();

        // 2. Crear usuario automáticamente
        $sql_usuario = "INSERT INTO usuarios (id_trabajador, usuario, contrasena, id_roles) 
                        VALUES (:id_trab, :usuario, :contrasena, :rol)";
        $stmt_usu = $conexion->prepare($sql_usuario);
        $stmt_usu->execute([
            ':id_trab'    => $id_nuevo_trabajador,
            ':usuario'    => $correo,
            ':contrasena' => $contrasena_temporal,
            ':rol'        => $id_rol
        ]);

        $conexion->commit();

        // Redirigir al index con éxito
        header("Location: index.php?exito=1");
        exit();

    } catch (Exception $e) {
        $conexion->rollBack();
        $error = "Ocurrió un error al guardar: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Trabajador | PlastyPetco</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;700&display=swap" rel="stylesheet"/>
    <style>
        body { font-family: 'DM Sans', sans-serif; background-color: #f0f4f1; }
        .btn-green { background: linear-gradient(135deg,#2ddf6e 0%,#1a9945 100%); color: #021a08; }
        .input-field { width: 100%; padding: 0.75rem 1rem; border-radius: 0.75rem; border: 1px solid #e5e7eb; outline: none; transition: all 0.2s; }
        .input-field:focus { border-color: #2ddf6e; box-shadow: 0 0 0 3px rgba(45,223,110,0.1); }
    </style>
</head>
<body class="p-8">

    <div class="max-w-3xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Añadir Nuevo Trabajador</h1>
            <p class="text-gray-500 mt-1">Completa los datos para registrar a un nuevo integrante en la empresa.</p>
        </div>

        <?php if($error): ?>
            <div class="bg-red-50 text-red-600 p-4 rounded-xl border border-red-200 mb-6">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <form action="crear.php" method="POST">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nombres</label>
                        <input type="text" name="nombres" class="input-field" placeholder="Ej. Carlos Andrés" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Apellidos</label>
                        <input type="text" name="apellidos" class="input-field" placeholder="Ej. Gómez Ruiz" required>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Correo Electrónico (Será su usuario)</label>
                    <input type="email" name="correo" class="input-field" placeholder="carlos@empresa.com" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Cargo</label>
                        <input type="text" name="cargo" class="input-field" placeholder="Ej. Operario de Máquina" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Rol en el Sistema</label>
                        <select name="id_rol" class="input-field bg-white" required>
                            <option value="" disabled selected>Selecciona un nivel de acceso...</option>
                            <option value="1">1 - Administrador</option>
                            <option value="2">2 - Recursos Humanos</option>
                            <option value="3">3 - Coordinador SST</option>
                            <option value="4">4 - Empleado Base</option>
                        </select>
                    </div>
                </div>

                <div class="bg-blue-50 text-blue-800 text-sm p-4 rounded-xl border border-blue-100 mb-8 flex gap-3">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p>Al guardar, el sistema generará automáticamente la contraseña temporal <strong>123456</strong> para este usuario.</p>
                </div>

                <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100">
                    <a href="index.php" class="px-6 py-3 text-gray-500 font-medium hover:bg-gray-50 rounded-xl transition-colors">
                        Cancelar
                    </a>
                    <button type="submit" class="btn-green px-8 py-3 rounded-xl font-bold shadow-lg hover:shadow-xl transition-shadow">
                        Guardar Trabajador
                    </button>
                </div>

            </form>
        </div>
    </div>

</body>
</html>