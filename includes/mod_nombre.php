<?php
session_start();
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$id_usuario = $_SESSION["id"];
$_SESSION['nombre'] = $nombre . " " . $apellidos;

//Conectamos con la base de datos
include('../config/db_connection.php');

//Realizamos el insert
$query = "UPDATE usuario SET nombre ='$nombre', apellidos='$apellidos' WHERE id = $id_usuario ;";




// Realizamos la consulta y almacenamos la salida en $result
$result = mysqli_query($db, $query);


//Comprobamos si hay algun error

if (!$result) {
    exit(mysqli_error($db));
}

// Cerramos conexión con la Base de Datos
mysqli_close($db);

// header("Location: ../tasks.php?id_list=$id_lista");
header("Location: ../configuracion.php?datos_personales&update_name=true");
