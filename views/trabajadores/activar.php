<?php
require_once __DIR__ . '/../../config/conexion.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php?mensaje=id_invalido");
    exit;
}

$id_trabajador = (int) $_GET['id'];

try {
    $sql = "UPDATE trabajadores 
            SET estado = 1 
            WHERE id_trabajador = :id_trabajador";

    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id_trabajador', $id_trabajador, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: index.php?mensaje=reactivado");
    exit;

} catch (PDOException $e) {
    die("Error al reactivar trabajador: " . $e->getMessage());
}   