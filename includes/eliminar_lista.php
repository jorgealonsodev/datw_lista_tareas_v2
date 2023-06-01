<?php
$id_lista     = $_POST['id_delete_list'];

//Conectamos con la base de datos
include('../config/db_connection.php');


//Realizamos el insert
$query_tareas = "DELETE FROM tarea WHERE id_lista = '$id_lista';";
$query = "DELETE FROM lista WHERE id = '$id_lista';";
// $query2 ="SELECT * FROM lista ORDER BY id ASC LIMIT 1;";

// Realizamos la consulta y almacenamos la salida en $result
$result_tareas = mysqli_query($db, $query_tareas);
$result = mysqli_query($db, $query);
// $result2 = mysqli_query($db, $query2);

//Comprobamos si hay algun error
if (!$result_tareas) {
  exit(mysqli_error($db));
}
if (!$result) {
    exit(mysqli_error($db));
}

// if (!$result2) {
//     exit(mysqli_error($db));
//   }else{
//     $datos_lista = mysqli_fetch_all($result2, MYSQLI_ASSOC);
 
//     foreach ($datos_lista as $fila) {
//       $id_lista = $fila['id'];
//     }
//   }


// Cerramos conexión con la Base de Datos
mysqli_close($db);

// header("Location: ../tasks.php?id_list=$id_lista");
header("Location: ../tasks.php");
