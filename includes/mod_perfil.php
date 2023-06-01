<?php
session_start();
$usuario    = $_POST['usuario'];
$id_usuario = $_SESSION["id"];
$avatar     = $_FILES['avatar']['name'];


//Conectamos con la base de datos
include('../config/db_connection.php');


if ($avatar == '' && $usuario != '') {
    //Realizamos el insert
    $query = "UPDATE usuario SET usuario ='$usuario' WHERE id = $id_usuario ;";

    // Realizamos la consulta y almacenamos la salida en $result
    $result = mysqli_query($db, $query);

    if (!$result) {
        exit(mysqli_error($db));
    }

    mysqli_close($db);

    $_SESSION["usuario"] = $usuario;


    header("Location: ../configuracion.php?perfil&update_perfil=true");
} elseif ($avatar == '' && $usuario == '') {
    echo "Ni avatar, ni perfil";
    header("Location: ../configuracion.php?perfil");
} elseif ($avatar != '' && $usuario != '') {
    if (isset($_FILES['avatar'])) {
        $nombreArchivo = $_FILES['avatar']['name'];
        // $tipoArchivo   = $_FILES['avatar']['type'];
        // $tamañoArchivo = $_FILES['avatar']['size'];
        $rutaTemporal = $_FILES['avatar']['tmp_name'];

        // Especifica la carpeta de destino para guardar el archivo
        $carpetaDestino = "../assets/img/avatar/";

        $nombreArchivoUniqid = uniqid() . '_' . $nombreArchivo;

        // Crea una ruta única para evitar conflictos de nombres
        $rutaDestino = $carpetaDestino . $nombreArchivoUniqid;

        // Mueve el archivo de la ubicación temporal a la carpeta de destino
        if (move_uploaded_file($rutaTemporal, $rutaDestino)) {

            $query = "UPDATE usuario SET usuario ='$usuario', avatar='$nombreArchivoUniqid' WHERE id = $id_usuario ;";

            // Realizamos la consulta y almacenamos la salida en $result
            $result = mysqli_query($db, $query);

            if (!$result) {
                exit(mysqli_error($db));
            }

            // Cerramos conexión con la Base de Datos
            mysqli_close($db);

            $_SESSION['avatar']  = $nombreArchivoUniqid;
            $_SESSION["usuario"] = $usuario;

            // header("Location: ../tasks.php?id_list=$id_lista");
            header("Location: ../configuracion.php?perfil&update_perfil=true");

        } else {
            echo "Ha ocurrido un error al guardar el avatar.";
        }
    }


} elseif ($avatar != '' && $usuario == '') {
    if (isset($_FILES['avatar'])) {
        $nombreArchivo = $_FILES['avatar']['name'];
        // $tipoArchivo   = $_FILES['avatar']['type'];
        // $tamañoArchivo = $_FILES['avatar']['size'];
        $rutaTemporal = $_FILES['avatar']['tmp_name'];

        // Especifica la carpeta de destino para guardar el archivo
        $carpetaDestino = "../assets/img/avatar/";

        $nombreArchivoUniqid = uniqid() . '_' . $nombreArchivo;

        // Crea una ruta única para evitar conflictos de nombres
        $rutaDestino = $carpetaDestino . $nombreArchivoUniqid;

        // Mueve el archivo de la ubicación temporal a la carpeta de destino
        if (move_uploaded_file($rutaTemporal, $rutaDestino)) {

            $query = "UPDATE usuario SET avatar='$nombreArchivoUniqid' WHERE id = $id_usuario ;";

            // Realizamos la consulta y almacenamos la salida en $result
            $result = mysqli_query($db, $query);

            if (!$result) {
                exit(mysqli_error($db));
            }

            // Cerramos conexión con la Base de Datos
            mysqli_close($db);

            $_SESSION['avatar'] = $nombreArchivoUniqid;

            // header("Location: ../tasks.php?id_list=$id_lista");
            header("Location: ../configuracion.php?perfil&update_perfil=true");

        } else {
            echo "Ha ocurrido un error al guardar el avatar.";
        }
    }


}




/* /* $file = $_FILES['file'];

if (!is_dir("uploads")){
    mkdir("uploads");
}

echo move_uploaded_file($file['tmp_name'], "uploads/". $file['name']);
 */

/* 
// Cerramos conexión con la Base de Datos
mysqli_close($db);

// header("Location: ../tasks.php?id_list=$id_lista");
header("Location: ../configuracion.php?perfil"); */