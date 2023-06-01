<?php

// Datos del formulario
$nombre     = $_POST['nombre'];
$apellidos  = $_POST['apellidos'];
$usuario    = $_POST['usuario'];
$password_r = $_POST['password_r'];

// Conectamos con la clase Usuario.php

include('./Usuario.php');

// Añadimos al nuevo usuario

$user = new Usuario($nombre, $apellidos, $usuario, $password_r);

if ($user->comprobarUsuarioDB() == $usuario) {
    header("Location: ../index.php?usuario-incorrecto");
} else {
    $user->insertarUsuarioDB();
    // Volvemos a la pagina de login
    header("Location: ../index.php");
}

