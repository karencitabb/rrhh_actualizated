<?php
session_start();

// 1. Proteger la ruta (Seguridad)
if (!isset($_SESSION['logueado']) || !$_SESSION['logueado']) {
    header("Location: ../../index.php");
    exit();
}

// 2. Conectar a la base de datos
require_once '../../config/conexion.php';

// 3. Traer la lista de todos los trabajadores
try {
$sql = "SELECT t.id_trabajador, t.nombres, t.apellidos, t.correo_personal, t.cargo, t.estado, u.id_roles 
            FROM trabajadores t
            LEFT JOIN usuarios u ON t.id_trabajador = u.id_trabajador
            ORDER BY t.id_trabajador DESC";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $lista_trabajadores = $stmt->fetchAll();
} catch (Exception $e) {
    $lista_trabajadores = []; // Si hay error, dejamos la lista vacía para que no se rompa el diseño
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabajadores | PlastyPetco</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;700&display=swap" rel="stylesheet"/>
    <style>
        body { font-family: 'DM Sans', sans-serif; background-color: #f0f4f1; }
        .btn-green { background: linear-gradient(135deg,#2ddf6e 0%,#1a9945 100%); color: #021a08; }
    </style>
</head>
<body class="p-8">

    <div class="max-w-6xl mx-auto flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Gestión de Trabajadores</h1>
            <p class="text-gray-500 mt-1">Administra la información de tu equipo de trabajo.</p>
        </div>
        
        <div class="flex gap-4">
            <a href="../dashboard/dashboard.php" class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-600 font-medium hover:bg-gray-50 transition-colors">
                Volver al Panel
            </a>
            <a href="crear.php" class="btn-green px-5 py-2.5 rounded-xl font-bold shadow-lg hover:shadow-xl transition-shadow flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Nuevo Trabajador
            </a>
        </div>
    </div>

    <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-gray-500 text-sm uppercase tracking-wider">
                        <th class="px-6 py-4 font-semibold">Nombre Completo</th>
                        <th class="px-6 py-4 font-semibold">Correo / Contacto</th>
                        <th class="px-6 py-4 font-semibold">Estado</th>
                        <th class="px-6 py-4 font-semibold text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    
                    <?php if (count($lista_trabajadores) > 0): ?>
                        <?php foreach ($lista_trabajadores as $trabajador): ?>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-800"><?= htmlspecialchars($trabajador['nombres'] . ' ' . $trabajador['apellidos']) ?></div>
                                    <div class="text-xs text-gray-400 mt-0.5">Rol ID: <?= $trabajador['id_roles'] ?></div>
                                </td>
                                <td class="px-6 py-4 text-gray-600"><?= htmlspecialchars($trabajador['correo_personal']) ?></td>
                                <td class="px-6 py-4">
                                    <?php if ($trabajador['estado'] == 1): ?>
                                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 border border-green-200">Activo</span>
                                    <?php else: ?>
                                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700 border border-red-200">Inactivo</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <button class="text-blue-500 hover:text-blue-700 font-medium text-sm mr-3">Editar</button>
                                    <button class="text-red-500 hover:text-red-700 font-medium text-sm">Eliminar</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                                <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                Aún no hay trabajadores registrados en el sistema.
                            </td>
                        </tr>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>

</body>
</html>