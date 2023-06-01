<?php 
// Conectamos con la base de datos

include('../config/db_conection.php');

// Realizamos la consulta

$query = "SELECT nombre FROM lista;";

 
// Inicializamos el array 

$data = [];

//Comprobamos que no existen errores el la consulta
$result= mysqli_query($db,$query);



if(!$result){
    exit(mysqli_error($db));
} else {
    if ($fila = mysqli_fetch_assoc($result)){
        for($i = 0; $i < count($fila); $i += 1){
            $nombre = $fila[$i];
            echo "<div class='name_task_block'>
            <div class='icon_list_column_box'>
                <img src='./assets/img/icon/lista_white.png' alt='icono lista'>
            </div>
            <div class='lista_column_box'>
                <p class='p_lista_column_box'>$nombre</p>
            </div>";
        }
    }
}