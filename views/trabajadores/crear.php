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
            // DATOS FAMILIARES BÁSICOS
            // =========================
            $tiene_hijos = (int)($_POST['tiene_hijos'] ?? 0);
            $numero_hijos = $tiene_hijos === 1 ? (int)($_POST['numero_hijos'] ?? 0) : 0;
            $tiene_personas_cargo = (int)($_POST['tiene_personas_cargo'] ?? 0);
            $observaciones_familiares = trim($_POST['observaciones_familiares'] ?? '');
            
            // =========================
            // NUEVO CAMPO: ORIENTACIÓN SEXUAL
            // =========================
            $orientacion_sexual = trim($_POST['orientacion_sexual'] ?? '');

            // =========================
    // DOTACIÓN (TALLAS) Y OBSERVACIONES
    // =========================
    $talla_camisa = trim($_POST['talla_camisa'] ?? '') ?: null;
    $talla_pantalon = trim($_POST['talla_pantalon'] ?? '') ?: null;
    $talla_botas = trim($_POST['talla_botas'] ?? '') ?: null;
    $observaciones = trim($_POST['observaciones'] ?? '') ?: null;
            
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
        id_grupos_etnicos,
        tiene_hijos,
        numero_hijos,
        tiene_personas_cargo,
        observaciones_familiares,
        orientacion_sexual,
        talla_camisa,
        talla_pantalon,
        talla_botas,
        observaciones
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
        :grupo,
        :tiene_hijos,
        :numero_hijos,
        :tiene_personas_cargo,
        :observaciones_familiares,
        :orientacion_sexual,
        :talla_camisa,
        :talla_pantalon,
        :talla_botas,
        :observaciones
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
    ':grupo' => $id_grupo_etnico,
    ':tiene_hijos' => $tiene_hijos,
    ':numero_hijos' => $numero_hijos,
    ':tiene_personas_cargo' => $tiene_personas_cargo,
    ':observaciones_familiares' => $observaciones_familiares,
    ':orientacion_sexual' => $orientacion_sexual,
    
    // ═══════════════════════════════════════
    // DOTACIÓN (TALLAS) Y OBSERVACIONES
    // ═══════════════════════════════════════
    ':talla_camisa'   => $talla_camisa,
    ':talla_pantalon' => $talla_pantalon,
    ':talla_botas'    => $talla_botas,
    ':observaciones'  => $observaciones
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