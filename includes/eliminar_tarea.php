<?php
$id_tarea     = $_POST['eliminar_tarea'];
$lista = $_POST['lista'];

//Conectamos con la base de datos
include('../config/db_connection.php');


//Realizamos el insert
$query = "DELETE FROM tarea WHERE id = '$id_tarea';";


// Realizamos la consulta y almacenamos la salida en $result
$result = mysqli_query($db, $query);


//Comprobamos si hay algun error

if (!$result) {
    exit(mysqli_error($db));
}

// Cerramos conexión con la Base de Datos
mysqli_close($db);

// header("Location: ../tasks.php?id_list=$id_lista");
header("Location: ../tasks.php?id_list=$lista");
