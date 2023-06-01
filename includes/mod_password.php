<?php
session_start();
$id_usuario              = $_SESSION["id"];
$contrasena_actual       = $_POST['contrasena_actual'];
$contrasena_nueva        = $_POST['contrasena_nueva'];
$contrasena_confirmacion = $_POST['contrasena_confirmacion'];

// echo "$id_usuario";

//Conectamos con la base de datos
include('../config/db_connection.php');

//Realizamos el insert
$query = "SELECT count(*) as cantidad FROM usuario WHERE id ='$id_usuario' AND contrasena = SHA2('$contrasena_actual',256) ;";



// Realizamos la consulta y almacenamos la salida en $result
$result = mysqli_query($db, $query);



//Comprobamos si hay algun error

if (!$result) {
    exit(mysqli_error($db));
} else {

    $lista = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach ($lista as $fila) {
        $cantidad = $fila['cantidad'];

        if ($cantidad == 1) {
            if ($contrasena_nueva != $contrasena_confirmacion) {
                header("Location: ../configuracion.php?seguridad&error_confirmacion");
            } else {
                $query2 = "UPDATE usuario SET contrasena = SHA2('$contrasena_confirmacion',256) WHERE id = $id_usuario;";

                $result2 = mysqli_query($db, $query2);

                if (!$result2) {
                    exit(mysqli_error($db));
                } else {
                    mysqli_close($db);
                    header("Location: ../configuracion.php?seguridad&update_password=true");
                }
                mysqli_close($db);
            }
        } else {
            mysqli_close($db);
            header("Location: ../configuracion.php?seguridad&error_contrasena");

        }

    }



}