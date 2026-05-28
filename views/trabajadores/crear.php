<?php
session_start();

$conexionFile = __DIR__ . '/../../config/conexion.php';
if (!file_exists($conexionFile)) {
    die('Error crítico: no se encontró el archivo de conexión en ' . htmlspecialchars($conexionFile));
}
require_once $conexionFile;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {

        // =========================
        // DATOS PERSONALES
        // =========================
        $num = $_POST['numero_documento'] ?? '000';
        $nom = $_POST['nombres'] ?? 'Sin nombre';
        $ape = $_POST['apellidos'] ?? 'Sin apellido';
        $fec = $_POST['fecha_nacimiento'] ?? '1990-01-01';
        $lug = $_POST['lugar_nacimiento'] ?? '';

        // TIPO DE DOCUMENTO
        $id_tipo_documento = (int)($_POST['id_tipos_documentos'] ?? 1);

        // GÉNERO
        $gen = (int)($_POST['id_generos'] ?? 1);

        // =========================
        // ÁREA Y CARGO
        // =========================
        $id_area = (int)($_POST['id_area'] ?? 0);
        $id_cargo = (int)($_POST['id_cargo'] ?? 0);

        // =========================
        // CONTACTO
        // =========================
        $correo = $_POST['correo_personal'] ?? '';
        $telefono = $_POST['telefono'] ?? '';

        // =========================
        // CAMPOS COMPLEMENTARIOS
        // =========================
        $id_formacion = (int)($_POST['id_formacion_educativa'] ?? 1);
        $id_nacionalidad = (int)($_POST['id_nacionalidad'] ?? 1);
        $id_sangre = (int)($_POST['id_sangre'] ?? 1);
        $id_estado_civil = (int)($_POST['id_estado_civil'] ?? 1);
        $id_grupo_etnico = (int)($_POST['id_grupos_etnicos'] ?? 1);

        // =========================
        // EPS
        // =========================
        $id_eps = (int)($_POST['id_eps'] ?? 1);

        // =========================
        // INSERTAR TRABAJADOR
        // =========================
        $sql = "INSERT INTO trabajadores (
                    id_tipos_documentos,
                    numero_documento,
                    nombres,
                    apellidos,
                    fecha_nacimiento,
                    lugar_nacimiento,
                    correo_personal,
                    celular,
                    id_generos,
                    id_area,
                    id_cargo,
                    id_formacion_educativa,
                    id_nacionalidad,
                    id_sangre,
                    id_estado_civil,
                    id_eps,
                    id_grupos_etnicos
                ) VALUES (
                    :tipo_documento,
                    :num,
                    :nom,
                    :ape,
                    :fec,
                    :lug,
                    :correo,
                    :telefono,
                    :gen,
                    :area,
                    :cargo,
                    :formacion,
                    :nacionalidad,
                    :sangre,
                    :estado_civil,
                    :eps,
                    :grupo
                )";

        $stmt = $conexion->prepare($sql);

        $stmt->execute([
            ':tipo_documento' => $id_tipo_documento,
            ':num' => $num,
            ':nom' => $nom,
            ':ape' => $ape,
            ':fec' => $fec,
            ':lug' => $lug,
            ':correo' => $correo,
            ':telefono' => $telefono,
            ':gen' => $gen,
            ':area' => $id_area,
            ':cargo' => $id_cargo,
            ':formacion' => $id_formacion,
            ':nacionalidad' => $id_nacionalidad,
            ':sangre' => $id_sangre,
            ':estado_civil' => $id_estado_civil,
            ':eps' => $id_eps,
            ':grupo' => $id_grupo_etnico
        ]);

        header("Location: index.php?mensaje=exito");
        exit();

    } catch (Exception $e) {

        die("Error al guardar: " . $e->getMessage());

    }

} else {

    header("Location: index.php");
    exit();

}
?>