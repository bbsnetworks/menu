<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['username'])) {
    echo json_encode(['error' => 'No autorizado']);
    exit;
}

$sql = "SELECT COUNT(*) AS total FROM eliminacion_pagos WHERE estado = 'pendiente'";
$result = $conexion->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    echo json_encode(['total' => $row['total']]);
} else {
    echo json_encode(['total' => 0]);
}

$conexion->close();
?>
