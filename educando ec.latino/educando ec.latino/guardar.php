<?php
$conexion = new mysqli("localhost", "root", "", "educando");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$instrumento = $_POST['instrumento'];

$sql = "INSERT INTO personas (cedula, nombre, telefono, instrumento) VALUES (?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssss", $cedula, $nombre, $telefono, $instrumento);

if ($stmt->execute()) {
    echo "Registro guardado correctamente.";
} else {
    echo "Error al guardar: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
