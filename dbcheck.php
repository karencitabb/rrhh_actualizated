<?php
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$url = parse_url($_ENV['RAILWAY_URL']);
$dsn = 'mysql:host=' . $url['host'] . ';port=' . $url['port'] . ';dbname=' . substr($url['path'],1) . ';charset=utf8mb4';
$pdo = new PDO($dsn, $url['user'], $url['pass'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
echo "SCHEMA:\n";
foreach ($pdo->query('SHOW COLUMNS FROM trabajadores') as $c) {
    echo $c['Field'] . ' ' . $c['Type'] . ' ' . $c['Null'] . ' ' . $c['Default'] . "\n";
}
echo "\nSAMPLE:\n";
foreach ($pdo->query('SELECT id_trabajador,nombres,apellidos,tiene_hijos,numero_hijos FROM trabajadores ORDER BY id_trabajador DESC LIMIT 10') as $row) {
    echo json_encode($row) . "\n";
}
