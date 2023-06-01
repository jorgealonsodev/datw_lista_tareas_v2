<?php
$id_tarea          = $_POST['id_tarea'];
$nombre            = $_POST['nombre'];
$fecha_vencimiento = $_POST['fecha_vencimiento'];
$prioridad         = $_POST['prioridad'];
$descipcion        = $_POST['text_area_descripcion'];
$id_lista          = $_POST['id_lista'];


// Conectamos con la base de datos

include('../config/db_connection.php');

// Realizamos la consulta
if ($fecha_vencimiento == '') {
    $query = "UPDATE tarea SET nombre='$nombre', descripcion ='$descipcion', prioridad = '$prioridad' WHERE id = $id_tarea;";
}else{
    $query = "UPDATE tarea SET nombre='$nombre', descripcion ='$descipcion', f_vencimiento ='$fecha_vencimiento', prioridad = '$prioridad' WHERE id = $id_tarea;";
}

//Comprobamos que no existen errores el la consulta
$result = mysqli_query($db, $query);

//Verificamos errores en la consulta

if (!$result) {
    exit(mysqli_error($db));
} else {
    header("Location: ../tasks.php?id_list=$id_lista&id_tarea=$id_tarea");
}