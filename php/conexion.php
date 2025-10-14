<?php
    $servername = '192.168.99.253:3306';
    //$database = "sysbbs_parquer";
    $database = 'sysbbs';
    $username = 'adminbbs';
    $password = 'Admin_Pinck';
    // Create connection
    $conexion = mysqli_connect($servername, $username, $password, $database);
    mysqli_set_charset($conexion, 'utf8'); //linea a colocar
    // Check connection
    if (!$conexion) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // else{
        // echo "conexion exitosa";
    // }
?>