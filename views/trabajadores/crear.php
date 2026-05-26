<?php
session_start();
require_once '../../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Recibimos los datos del formulario
        $num = $_POST['numero_documento'] ?? '000';
        $nom = $_POST['nombres'] ?? 'Sin nombre';
        $ape = $_POST['apellidos'] ?? 'Sin apellido';
        $fec = $_POST['fecha_nacimiento'] ?? '1990-01-01';
        $gen = (int)($_POST['genero'] ?? 1);
        
        // --- ESTO ES LO QUE FALTABA ---
        // Aquí capturamos los IDs numéricos que vienen del <select>
        $id_area = (int)($_POST['id_area'] ?? 0);
        $id_cargo = (int)($_POST['id_cargo'] ?? 0);

        // Preparamos la inserción con las nuevas columnas
        $sql = "INSERT INTO trabajadores 
                (numero_documento, nombres, apellidos, fecha_nacimiento, id_generos, id_area, id_cargo) 
                VALUES (:num, :nom, :ape, :fec, :gen, :area, :cargo)";
        
        $stmt = $conexion->prepare($sql);
        $stmt->execute([
            ':num'   => $num,
            ':nom'   => $nom,
            ':ape'   => $ape,
            ':fec'   => $fec,
            ':gen'   => $gen,
            ':area'  => $id_area,
            ':cargo' => $id_cargo
        ]);

        header("Location: index.php?mensaje=exito");
        exit();
    } catch (Exception $e) {
        die("Error al guardar: " . $e->getMessage());
    }
}
?>