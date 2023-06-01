<?php
session_start();
$id_session      = $_SESSION["id"];
$usuario_session = $_SESSION["usuario"];
$avatar_session  = $_SESSION['avatar'];
$nombre_session = $_SESSION['nombre'];
$rol_session = $_SESSION['rol'];


// Si  no iniciamos sesion nos devuelve al index.php
if (!isset($_SESSION['usuario'])) {
  // Redirigir al usuario a la página de inicio de sesión o mostrar un mensaje de error
  header("Location: ./index.php");
  exit(); // Detener la ejecución del script
}


echo "
    <header class='header_tasks'>
        <div class='title_h1'>
        <div class='logo'>
        <img src='./assets/img/logo/logo.png' alt='logo'>
        </div>
        <h1>
        <a href='./tasks.php'>TO DO</a>
        </h1>
        </div>
        <div class='user_box'>
            <div class='avatar'>
            <img src='./assets/img/avatar/$avatar_session' alt='avatar'>
            </div>
            <div class='username'>$nombre_session ($usuario_session)</div>
            <div class='right_menu'>
            <div class='menu'>
              <div class='menu-img'></div>
            <div class='menu-content'>
              <!-- Elementos del menú -->";
              if($rol_session == 'admin'){
                echo "<a href='#'>Administrar</a>";
              }
              echo "
              <a href='./configuracion.php'>Configuración</a>
              <a href='./includes/cerrar_sesion.php'>Cerrar sesión</a>              
            </div>
            </div>  
        </div>
    </header>
";