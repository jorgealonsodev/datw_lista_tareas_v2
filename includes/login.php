<?php
$usuario = $_POST['usuario'];
$clave   = $_POST['password'];


// Conexión a la base de datos

include('../config/db_connection.php');

// Consulta

$query = "SELECT * FROM usuario WHERE usuario = '$usuario' AND  contrasena = SHA2('$clave',256);";

// Comprobar errores en la cosulta
$result = mysqli_query($db, $query);

if (!$result) {
    exit(mysqli_error($db));
} else {
    if ($fila = mysqli_fetch_assoc($result)) {
        session_start();
        $_SESSION["usuario"] = $fila['usuario'];
        $_SESSION["nombre"] = $fila['nombre'] . " " . $fila['apellidos'];
        $_SESSION["avatar"] = $fila['avatar'];
        $_SESSION["id"] = $fila['id'];
        $_SESSION["rol"] = $fila['rol'];
        header("Location: ../tasks.php");
    } else {
        header("Location: ../index.php?login-incorrecto");
    }
}