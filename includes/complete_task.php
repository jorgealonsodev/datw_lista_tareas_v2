<?php

$id_tarea = $_POST['id_tarea'];
$id_lista = $_POST['id_lista'];
// Conectamos con la base de datos

include('../config/db_connection.php');

// Realizamos la consulta

$query = "UPDATE tarea SET estado = 'completada' WHERE id = '$id_tarea'";


//Comprobamos que no existen errores el la consulta
$result = mysqli_query($db, $query);


if (!$result) {
  exit(mysqli_error($db));
} else {
    header("Location: ../tasks.php?id_list=$id_lista");
}
// Cerramos conexión con la Base de Datos
mysqli_close($db);
