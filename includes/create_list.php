<?php 

// Iniciamos sesion para obtener el id de usuario.
session_start();

$id = $_SESSION['id'];
$name_list = $_POST['name_list'];

//Hacemos el include para usar la función

include('./functions.php');


//Ejecutamos la funcion con el usuario y el id;

crearListaTareas($name_list,$id);
$id_lista = obtenerIdLista($id);

//redireccionamos de nuevo a la lista de tareas

header("Location: ../tasks.php?id_list=$id_lista");
