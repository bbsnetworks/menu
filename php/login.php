<?php
session_start();

include 'conexion.php';

if ($conexion->connect_error) {
    header("Location: ../login/index.php?error=conexion");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username'] ?? '');
    $passwordPlano = trim($_POST['password'] ?? '');

    if ($username === '' || $passwordPlano === '') {
        header("Location: ../login/index.php?error=vacio");
        exit;
    }

    $password = sha1($passwordPlano);

    $sql = "SELECT iduser, tipo FROM users WHERE nombre = ? AND password = ? LIMIT 1";
    $stmt = $conexion->prepare($sql);

    if (!$stmt) {
        header("Location: ../login/index.php?error=conexion");
        exit;
    }

    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {

        $row = $result->fetch_assoc();

        $_SESSION['username'] = $username;
        $_SESSION['iduser'] = $row['iduser'];
        $_SESSION['tipo'] = $row['tipo'];

        header("Location: ../index.php");
        exit;

    } else {
        header("Location: ../login/index.php?error=credenciales");
        exit;
    }

} else {
    header("Location: ../login/index.php?error=metodo");
    exit;
}

$conexion->close();
?>