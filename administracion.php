<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    <title>To Do - Administración</title>
</head>

<body class="body_tasks">
    <?php
    include('./views/header.php');
    ?>
    <div class="contenedor_administracion">
        <div class="contenedor_columnas">
            <div class="contenedor_selector_oculto">
                <div class="selector"></div>
            </div>
            <div class="contenedor_columna_usuario">
                <div class="titulo_columna_usuario">
                    <p>Usuario</p>
                </div>
            </div>
            <div class="contenedor_columna_nombre">
                <div class="titulo_columna_nombre">
                    <p>Nombre</p>
                </div>
            </div>
            <div class="contenedor_columna_apellidos">
                <div class="titulo_columna_apellidos">
                    <p>Apellidos</p>
                </div>
            </div>
            <div class="contenedor_columna_rol">
                <div class="titulo_columna_rol">
                    <p>Rol</p>
                </div>
            </div>
            <div class="contenedor_columna_editar_oculto"></div>
            <div class="contenedor_columna_eliminar_oculto"></div>
        </div>

        <div class="contenedor_datos_usuarios">
            <div class="separador"></div>
            <div class="contenido_contenedor_datos_usuarios">
                <?php 
                include('./includes/functions.php')
                $usuarios = mostrarUsuarios();

                foreach ($usuarios as $fila ){
                    $id_usuario = $fila['id'];
                    $nombre_usuario = $fila['nombre'];
                    $apellidos = $fila['apellidos'];
                    $usuario = $fila['usuario'];
                    $rol = $fila['rol'];
                    $avatar = $fila['avatar'];
                    
                    if($rol == 'user'){
                        $rol = 'Usuario';
                    }elseif($rol == 'admin'){
                        $rol = 'Administrador'
                    }

                    echo "
                    <form class='vista_datos_usuarios'>
                    <div class='contenedor_selector'>
                        <div class='selector'>
                            <input type='checkbox' name='id' value='$id_usuario'>
                        </div>
                    </div>
                    <div class='contenedor_columna_usuario_avatar'>
                        <div class='avatar_usuario_admin'>
                        <img src='./assets/img/avatar/$avatar' alt=''>
                        </div>
                        <div class='nombre_usuario_admin'>
                            <p>$usuario</p>
                        </div>
                    </div>
                    <div class='contenedor_columna_nombre'>
                        <div class='nombre_admin'>
                            <p>Jorge</p>
                        </div>
                    </div>
                    <div class='contenedor_columna_apellidos'>
                        <div class='apellidos_admin'>
                            <p>Alonso Alfonso</p>
                        </div>
                    </div>
                    <div class='contenedor_columna_rol'>
                        <div class='rol_admin'>
                            <p>Administrador</p>
                        </div>
                    </div>
                    <div class='contenedor_columna_editar'>
                        <button>
                            <img src="" alt="">
                        </button>
                    </div>
                    <div class='contenedor_columna_eliminar'>
                        <button>
                            <img src='' alt=''>
                        </button>
                    </div>
                    ";

                }
                ?>
                <form class="vista_datos_usuarios">
                    <div class="contenedor_selector">
                        <div class="selector">
                            <input type="checkbox" name="id" value=" ">
                        </div>
                    </div>
                    <div class="contenedor_columna_usuario_avatar">
                        <div class="avatar_usuario_admin"></div>
                        <div class="nombre_usuario_admin">
                            <p>jorge</p>
                        </div>
                    </div>
                    <div class="contenedor_columna_nombre">
                        <div class="nombre_admin">
                            <p>Jorge</p>
                        </div>
                    </div>
                    <div class="contenedor_columna_apellidos">
                        <div class="apellidos_admin">
                            <p>Alonso Alfonso</p>
                        </div>
                    </div>
                    <div class="contenedor_columna_rol">
                        <div class="rol_admin">
                            <p>Administrador</p>
                        </div>
                    </div>
                    <div class="contenedor_columna_editar">
                        <button>
                            <img src="" alt="">
                        </button>
                    </div>
                    <div class="contenedor_columna_eliminar">
                        <button>
                            <img src="" alt="">
                        </button>
                    </div>
                </form>

                <form class="ocultar editor_datos_usuarios">
                    <div class="contenedor_selector">
                        <div class="selector">
                            <input type="checkbox" name="id" value=" ">
                        </div>
                    </div>
                    <div class="contenedor_columna_usuario">
                        <div class="avatar_usuario_admin"></div>
                        <div class="nombre_usuario_admin">
                            <input type="text" value="">
                        </div>
                    </div>
                    <div class="contenedor_columna_nombre">
                        <div class="nombre_admin">
                            <input type="text" value="">
                        </div>
                    </div>
                    <div class="contenedor_columna_apellidos">
                        <div class="apellidos_admin">
                            <input type="text" value="">
                        </div>
                    </div>
                    <div class="contenedor_columna_rol">
                        <div class="rol_admin">
                            <input type="text" value="">
                        </div>
                    </div>
                    <div class="contenedor_columna_editar_oculto"></div>
                    <div class="contenedor_columna_actualizar">
                        <button>
                            <img src="" alt="">
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>