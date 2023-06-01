<?php
session_start(); // Inicia la sesión si aún no se ha iniciado

// Limpia todas las variables de sesión
$_SESSION = array();

// Destruye la sesión
session_destroy();


header("Location: ../index.php");
