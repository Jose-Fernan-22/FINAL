<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$host = "MYSQLHOST";
$user = "MYSQLUSER"; // Cambia esto si tienes otra configuración
$pass = "MYSQLPASSWORD";
$db = "MYSQLDATABASE";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die(json_encode(["error" => "Error en conexión: " . $conn->connect_error]));
}

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

$productos = [];
while ($row = $result->fetch_assoc()) {
    $productos[] = $row;
}

echo json_encode($productos);
$conn->close();
?>
