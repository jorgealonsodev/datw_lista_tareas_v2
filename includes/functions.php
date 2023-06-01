<?php
function crearListaTareas($nombre, $id)
{
  //Conectamos con la base de datos
  include('../config/db_connection.php');

  //Realizamos el insert
  $query = "INSERT INTO lista (nombre,id_usuario) VALUES('$nombre','$id');";

  // Realizamos la consulta y almacenamos la salida en $result
  $result = mysqli_query($db, $query);



  //Comprobamos si hay algun error
  if (!$result) {
    exit(mysqli_error($db));
  }


  // Cerramos conexión con la Base de Datos
  mysqli_close($db);


}

function obtenerIdLista($id)
{
  //Conectamos con la base de datos
  include('../config/db_connection.php');

  $query2 = "SELECT * FROM lista WHERE id_usuario ='$id' ORDER BY id DESC LIMIT 1;";

  $result2 = mysqli_query($db, $query2);

  if (!$result2) {
    exit(mysqli_error($db));
  } else {
    $datos_lista = mysqli_fetch_all($result2, MYSQLI_ASSOC);

    foreach ($datos_lista as $fila) {
      $id_lista = $fila['id'];
      return $id_lista;
    }
  }
  // Cerramos conexión con la Base de Datos
  mysqli_close($db);
}

function verNombreListaTareas($id)
{
  // Conectamos con la base de datos

  include('./config/db_connection.php');

  // Realizamos la consulta

  $query = "SELECT * FROM lista WHERE id_usuario ='$id';";


  //Comprobamos que no existen errores el la consulta
  $result = mysqli_query($db, $query);



  if (!$result) {
    exit(mysqli_error($db));
  } else {

    //para obtener todas las filas del resultado como un arreglo asociativo
    $nombres = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $nombres;

  }
  // Cerramos conexión con la Base de Datos
  mysqli_close($db);
}

function nombreLista($id)
{
  if (!isset($_GET['id_list'])) {
    $nombre_lista = '';
    return $nombre_lista;
  } else {

    $id_lista = $_GET['id_list'];

    // Conectamos con la base de datos

    include('./config/db_connection.php');

    // Realizamos la consulta

    $query = "SELECT nombre FROM lista WHERE id = '$id_lista';";


    //Comprobamos que no existen errores el la consulta
    $result = mysqli_query($db, $query);


    if (!$result) {
      exit(mysqli_error($db));
    } else {
      $fila         = mysqli_fetch_assoc($result);
      $nombre_lista = $fila['nombre'];
    }
    // Cerramos conexión con la Base de Datos
    mysqli_close($db);

    return $nombre_lista;
  }
}

function mostrarTareasPendientes()
{
  // Cojemos el id de la lista de tareas
  $id_lista = $_GET['id_list'];

  // Conectamos con la base de datos

  include('./config/db_connection.php');

  // Realizamos la consulta

  $query = "SELECT * FROM tarea WHERE id_lista ='$id_lista' AND estado = 'por realizar' ORDER BY CASE prioridad WHEN 'alta' THEN 1 WHEN 'normal' THEN 2 WHEN 'baja' THEN 3 ELSE 4 END;";


  //Comprobamos que no existen errores el la consulta
  $result = mysqli_query($db, $query);


  if (!$result) {
    exit(mysqli_error($db));
  } else {

    //para obtener todas las tareas del resultado como un arreglo asociativo
    $nombres_tareas = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $nombres_tareas;

    // Cerramos conexión con la Base de Datos
    mysqli_close($db);
  }
}

function mostrarTareasCompletadas()
{
  // Cojemos el id de la lista de tareas
  $id_lista = $_GET['id_list'];

  // Conectamos con la base de datos

  include('./config/db_connection.php');

  // Realizamos la consulta

  $query = "SELECT * FROM tarea WHERE id_lista ='$id_lista' AND estado = 'completada' ORDER BY CASE prioridad WHEN 'alta' THEN 1 WHEN 'normal' THEN 2 WHEN 'baja' THEN 3 ELSE 4 END;";


  //Comprobamos que no existen errores el la consulta
  $result = mysqli_query($db, $query);


  if (!$result) {
    exit(mysqli_error($db));
  } else {

    //para obtener todas las tareas del resultado como un arreglo asociativo
    $nombres_tareas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $nombres_tareas;

    // Cerramos conexión con la Base de Datos
    mysqli_close($db);
  }

}

function mostrarDescripcion()
{
  // Cojemos el id de la lista de tareas
  $id_lista = $_GET['id_list'];
  $id_tarea = $_GET['id_tarea'];

  // Conectamos con la base de datos

  include('./config/db_connection.php');

  // Realizamos la consulta

  $query = "SELECT * FROM tarea WHERE id_lista ='$id_lista' AND id = '$id_tarea';";


  //Comprobamos que no existen errores el la consulta
  $result = mysqli_query($db, $query);


  if (!$result) {
    exit(mysqli_error($db));
  } else {

    //para obtener todas las tareas del resultado como un arreglo asociativo
    $nombres_tareas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $nombres_tareas;
    // Cerramos conexión con la Base de Datos
    mysqli_close($db);
  }
}

function consultarDatosUsuario()
{

}