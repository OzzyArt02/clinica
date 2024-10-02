<?php
$host = '127.0.0.1';
$db   = 'clinica';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    // Consulta de inserción
    $sql = "INSERT INTO pacientes (nombre, apellido, edad) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['Juan', 'Perez', 30]);

    echo "Paciente agregado exitosamente";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
