<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$id_trabajador = isset($_POST['id_trabajador']) ? (int)$_POST['id_trabajador'] : 0;

if ($id_trabajador <= 0) {
    header('Location: index.php?mensaje=id_invalido');
    exit;
}

try {
    $sql = "UPDATE trabajadores
            SET estado = 0
            WHERE id_trabajador = :id_trabajador";

    $stmt = $conexion->prepare($sql);
    $stmt->bindValue(':id_trabajador', $id_trabajador, PDO::PARAM_INT);
    $stmt->execute();

    header('Location: index.php?mensaje=inactivado');
    exit;

} catch (Exception $e) {
    die('Error al inactivar trabajador: ' . $e->getMessage());
}
?>
