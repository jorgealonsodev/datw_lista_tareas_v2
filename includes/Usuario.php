<?php

class Usuario
{
    private $nombre;
    private $apellidos;
    private $usuario;
    private $contrasena;


    function __construct($nombre, $apellidos, $usuario, $contrasena)
    {
        $this->nombre     = $nombre;
        $this->apellidos  = $apellidos;
        $this->usuario    = $usuario;
        $this->contrasena = $contrasena;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getContrasena()
    {
        return $this->contrasena;
    }


    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }


    function comprobarUsuarioDB()
    {
        // Añadimos la conexion con la base de datos
        include('../config/db_connection.php');


        // Comprobamos si existe en la base de datos

        $query = "SELECT usuario FROM usuario WHERE usuario = '$this->usuario';";

        // Comprobamos si la consulta es correcta y al mismo tiempo creamos la variable $result

        if (!$result = mysqli_query($db, $query)) {
            // Mostramos el error
            exit(mysqli_error($db));
        } else {
            if ($fila = mysqli_fetch_assoc($result)) {
                // Guardamos en la variable $usuario el valor que resulta de la consulta
                $usuario = $fila['usuario'];
                // Devolvemos el valor del usuario
                return $usuario;
            }
        }
        // Cerramos conexión con la Base de Datos
        mysqli_close($db);
    }


    function insertarUsuarioDB()
    {
        // Añadimos la conexion con la base de datos
        include('../config/db_connection.php');

        // Realizamos el insert.        
        $query = "INSERT INTO usuario (nombre,apellidos,usuario,contrasena) VALUES ('$this->nombre', '$this->apellidos', '$this->usuario', SHA2('$this->contrasena',256));";

        // Realizamos la consulta y almacenamos la salida en $result
        $result = mysqli_query($db, $query);

        //Comprobamos si hay algun error
        if (!$result) {
            exit(mysqli_error($db));
        }

        // Cerramos conexión con la Base de Datos
        mysqli_close($db);

    }
    


}