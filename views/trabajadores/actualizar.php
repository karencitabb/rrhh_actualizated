<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

function limpiar($valor): string {
    return trim((string)($valor ?? ''));
}

function enteroPositivoONull($valor) {
    $valor = limpiar($valor);
    if ($valor === '') {
        return null;
    }
    $numero = (int)$valor;
    return $numero > 0 ? $numero : null;
}

function fechaONull($valor) {
    $valor = limpiar($valor);
    return $valor !== '' ? $valor : null;
}

$id_trabajador = isset($_POST['id_trabajador']) ? (int)$_POST['id_trabajador'] : 0;

if ($id_trabajador <= 0) {
    header('Location: index.php?mensaje=id_invalido');
    exit;
}

try {
    $stmt = $conexion->prepare("SELECT * FROM trabajadores WHERE id_trabajador = :id LIMIT 1");
    $stmt->bindValue(':id', $id_trabajador, PDO::PARAM_INT);
    $stmt->execute();
    $actual = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$actual) {
        header('Location: index.php?mensaje=no_encontrado');
        exit;
    }

    $numero_documento = limpiar($_POST['numero_documento'] ?? '');

    if ($numero_documento === '') {
        header('Location: editar.php?id=' . $id_trabajador . '&mensaje=documento_requerido');
        exit;
    }

    $stmtDup = $conexion->prepare("SELECT COUNT(*) FROM trabajadores WHERE numero_documento = :numero_documento AND id_trabajador <> :id");
    $stmtDup->bindValue(':numero_documento', $numero_documento, PDO::PARAM_STR);
    $stmtDup->bindValue(':id', $id_trabajador, PDO::PARAM_INT);
    $stmtDup->execute();

    if ((int)$stmtDup->fetchColumn() > 0) {
        header('Location: editar.php?id=' . $id_trabajador . '&mensaje=doc_duplicado');
        exit;
    }

    $columnasStmt = $conexion->query("SHOW COLUMNS FROM trabajadores");
    $columnas = $columnasStmt->fetchAll(PDO::FETCH_COLUMN);

    $datos = [
    'nombres' => limpiar($_POST['nombres'] ?? ''),
    'apellidos' => limpiar($_POST['apellidos'] ?? ''),
    'id_tipos_documentos' => enteroPositivoONull($_POST['id_tipos_documentos'] ?? null) ?? (int)($actual['id_tipos_documentos'] ?? 1),
    'numero_documento' => $numero_documento,
    'id_generos' => enteroPositivoONull($_POST['id_generos'] ?? null) ?? (int)($actual['id_generos'] ?? 1),
    'fecha_nacimiento' => fechaONull($_POST['fecha_nacimiento'] ?? null),
    'lugar_nacimiento' => limpiar($_POST['lugar_nacimiento'] ?? ''),
    'id_nacionalidad' => enteroPositivoONull($_POST['id_nacionalidad'] ?? null) ?? (int)($actual['id_nacionalidad'] ?? 1),
    'id_formacion_educativa' => enteroPositivoONull($_POST['id_formacion_educativa'] ?? null) ?? (int)($actual['id_formacion_educativa'] ?? 1),
    'id_sangre' => enteroPositivoONull($_POST['id_sangre'] ?? null) ?? (int)($actual['id_sangre'] ?? 1),
    'id_estado_civil' => enteroPositivoONull($_POST['id_estado_civil'] ?? null) ?? (int)($actual['id_estado_civil'] ?? 1),
    'id_grupos_etnicos' => enteroPositivoONull($_POST['id_grupos_etnicos'] ?? null) ?? (int)($actual['id_grupos_etnicos'] ?? 1),
    'orientacion_sexual' => limpiar($_POST['orientacion_sexual'] ?? ''),
    'tiene_hijos' => isset($_POST['tiene_hijos']) && (int)$_POST['tiene_hijos'] === 1 ? 1 : 0,
    'numero_hijos' => (int)($_POST['numero_hijos'] ?? 0),
    'tiene_personas_cargo' => isset($_POST['tiene_personas_cargo']) && (int)$_POST['tiene_personas_cargo'] === 1 ? 1 : 0,
    'observaciones_familiares' => limpiar($_POST['observaciones_familiares'] ?? ''),
    'correo_personal' => limpiar($_POST['correo_personal'] ?? ''),
    'celular' => limpiar($_POST['telefono'] ?? ''),
    'id_area' => enteroPositivoONull($_POST['id_area'] ?? null),
    'id_cargo' => enteroPositivoONull($_POST['id_cargo'] ?? null),
    'id_eps' => enteroPositivoONull($_POST['id_eps'] ?? null) ?? (int)($actual['id_eps'] ?? 1),
    'estado' => isset($_POST['estado']) && (int)$_POST['estado'] === 0 ? 0 : 1,
];

    if ($datos['nombres'] === '' || $datos['apellidos'] === '') {
        header('Location: editar.php?id=' . $id_trabajador . '&mensaje=nombre_requerido');
        exit;
    }

    $sets = [];
    $params = [];

    foreach ($datos as $columna => $valor) {
        if (!in_array($columna, $columnas, true)) {
            continue;
        }

        $sets[] = "`$columna` = :$columna";
        $params[":$columna"] = $valor;
    }

    if (in_array('updated_at', $columnas, true)) {
        $sets[] = "`updated_at` = NOW()";
    }

    if (!$sets) {
        header('Location: ver.php?id=' . $id_trabajador . '&mensaje=sin_cambios');
        exit;
    }

    $sql = "UPDATE trabajadores SET " . implode(', ', $sets) . " WHERE id_trabajador = :id_trabajador";
    $stmtUpdate = $conexion->prepare($sql);

    foreach ($params as $key => $valor) {
        if ($valor === null) {
            $stmtUpdate->bindValue($key, null, PDO::PARAM_NULL);
        } elseif (is_int($valor)) {
            $stmtUpdate->bindValue($key, $valor, PDO::PARAM_INT);
        } else {
            $stmtUpdate->bindValue($key, $valor, PDO::PARAM_STR);
        }
    }

    $stmtUpdate->bindValue(':id_trabajador', $id_trabajador, PDO::PARAM_INT);
    $stmtUpdate->execute();

    header('Location: ver.php?id=' . $id_trabajador . '&mensaje=actualizado');
    exit;

} catch (Exception $e) {
    die('Error al actualizar trabajador: ' . $e->getMessage());
}
