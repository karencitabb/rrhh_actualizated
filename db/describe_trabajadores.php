<?php
require __DIR__ . '/../config/conexion.php';
$cols = $conexion->query('DESCRIBE trabajadores')->fetchAll(PDO::FETCH_ASSOC);
foreach ($cols as $col) {
    echo $col['Field'] . "\t" . $col['Type'] . "\n";
}
