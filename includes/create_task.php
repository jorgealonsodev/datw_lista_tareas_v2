<?php
$nombre_tarea      = $_POST['nueva_tarea'];
$descripcion       = $_POST['description_new_tarea'];
$fecha_vencimiento = $_POST['fecha_vencimiento'];
$prioridad         = $_POST['prioridad'];
$id_list           = $_POST['id_list'];
$fecha_creacion    = date('Y-m-d');




//Conectamos con la base de datos
include('../config/db_connection.php');


//Realizamos el insert
if ($fecha_vencimiento == '') {
    $query = "INSERT INTO tarea (nombre,descripcion,prioridad,id_lista) VALUES('$nombre_tarea','$descripcion', '$prioridad','$id_list');";
}else{
    $query = "INSERT INTO tarea (nombre,descripcion,f_vencimiento,prioridad,id_lista) VALUES('$nombre_tarea','$descripcion', '$fecha_vencimiento','$prioridad','$id_list');";
}

    // $query = "INSERT INTO tarea (nombre,descripcion,f_vencimiento,prioridad,id_lista) VALUES('$nombre_tarea','$descripcion', '$fecha_vencimiento','$prioridad','$id_list');";

// Realizamos la consulta y almacenamos la salida en $result
$result = mysqli_query($db, $query);

//Comprobamos si hay algun error
if (!$result) {
    exit(mysqli_error($db));
}

// Cerramos conexión con la Base de Datos
mysqli_close($db);

header("Location: ../tasks.php?id_list=$id_list");