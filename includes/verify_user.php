<?php 
// Obtenenmos los datatos del formulario mediante el metodo POST

$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Conectamos con la base de datos.

include('../config/db_connection.php');

// Hacemos la consulta

$query = "SELECT * FROM usario WHERE usuario = '$usuario' AND contrasena = SHA2('$password',256);";

// Comprobamos si da error o si nos devuelve algun resultado.

if(!$result = mysqli_query($db, $query)){
    exit(mysqli_error($db));
} else {
    if ($fila = mysqli_fetch_assoc($result)){
        session_start();
        $_SESSION["usuario"] = $usuario;
        header("Location: ../tasks.php");
    }else{
        header("Location: ../index.php?error=true");
    }
}
