<?php
session_start();
require_once '../../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Obtenemos los datos con valores por defecto si el formulario no los envía
        $datos = [
            ':num' => $_POST['numero_documento'] ?? '000',
            ':nom' => $_POST['nombres'] ?? 'Sin nombre',
            ':ape' => $_POST['apellidos'] ?? 'Sin apellido',
            ':fec' => $_POST['fecha_nacimiento'] ?? '1990-01-01',
            ':lug' => $_POST['lugar_nacimiento'] ?? 'No especificado',
            ':cel' => $_POST['telefono'] ?? '000',
            ':cor' => $_POST['correo_personal'] ?? 'sin@correo.com',
            ':t_doc'=> $_POST['tipo_documento'] ?? 1,
            ':gen'  => $_POST['genero'] ?? 1,
            ':edu'  => 1, ':nac' => 1, ':san' => 1, ':est' => 1, ':eps' => 1, ':etn' => 1
        ];

        $sql = "INSERT INTO trabajadores (numero_documento, nombres, apellidos, fecha_nacimiento, lugar_nacimiento, celular, correo_personal, id_tipos_documentos, id_generos, id_formacion_educativa, id_nacionalidad, id_sangre, id_estado_civil, id_eps, id_grupos_etnicos) 
                VALUES (:num, :nom, :ape, :fec, :lug, :cel, :cor, :t_doc, :gen, :edu, :nac, :san, :est, :eps, :etn)";
        
        $conexion->prepare($sql)->execute($datos);
        header("Location: index.php?mensaje=exito");
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
}
?>