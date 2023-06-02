<?php
$id_lista     = $_POST['id_lista'];
$nombre_lista = $_POST['nombre_lista'];
$id_usuario   = $_POST['id_usuario'];

//Conectamos con la base de datos
include('../config/db_connection.php');

//Realizamos el insert
$query_comprobar_nombre = "SELECT count(*) AS cantidad FROM lista WHERE id_usuario = $id_usuario AND  nombre = '$nombre_lista';";

// Realizamos la consulta y almacenamos la salida en $result
$result_comprobar_nombre = mysqli_query($db, $query_comprobar_nombre);

//Comprobamos si hay algun error
if (!$result_comprobar_nombre) {
    exit(mysqli_error($db));
} else {

    $lista = mysqli_fetch_all($result_comprobar_nombre, MYSQLI_ASSOC);

    foreach ($lista as $fila) {
        $cantidad = $fila['cantidad'];

        if ($cantidad > 0) {
            header("Location: ../tasks.php?id_list=$id_lista&error_nombre_lista");
        } else {
            $query  = "UPDATE lista SET nombre = '$nombre_lista' WHERE id = $id_lista;";
            $result = mysqli_query($db, $query);

            if (!$result) {
                exit(mysqli_error($db));
            }

            header("Location: ../tasks.php?id_list=$id_lista");
        }
    }
}