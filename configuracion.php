<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
   
    <title>To Do</title>
</head>

<body class="body_tasks">
    <?php
    include('./views/header.php');

    ?>
    <div class="contenedor_config">
        <div class="menu_lateral">
            <div class="datos_personales">
                <img class="icon-config" src="./assets/img/icon/perfil-personal.png" alt="icono datos personales">
                <p>
                    <a href="./configuracion.php?datos_personales">Datos personales</a>
                </p>
            </div>
            <div class="perfil">
                <img class="icon-config" src="./assets/img/icon/usuario.png" alt="icono datos personales">
                <p><a href="./configuracion.php?perfil">Perfil</a>
                </p>
            </div>
            <div class="seguridad">
                <img class="icon-config" src="./assets/img/icon/cerrar-con-llave.png" alt="icono datos personales">
                <p>
                    <a href="./configuracion.php?seguridad">Seguridad</a>
                </p>
            </div>
        </div>
        <div class="contenedor_formularios">
            <div class="formularios">
                <div class=" <?php if (isset($_GET['perfil']) || isset($_GET['seguridad'])) {
                    echo "ocultar";
                } ?> formulario_datos_personales">
                    <form action="./includes/mod_nombre.php" method="POST">
                        <div class="nombre_box">
                            <div class="nombre_title">
                                <p>Nombre:</p>
                            </div>
                            <div class="nombre_input">
                                <input type="text" name="nombre" required>
                            </div>
                        </div>
                        <div class="apellidos_box">
                            <div class="apellidos_title">
                                <p>Apellidos:</p>
                            </div>
                            <div class="apellidos_input">
                                <input type="text" name="apellidos" required>
                            </div>
                        </div>
                        <div class="boton_box_datos_personales">
                            <div class="boton_enviar_datos_personales">
                                <input type="submit" value="Enviar">
                            </div>
                        </div>
                        <div class="<?php if (!isset($_GET['update_name'])) {
                            echo "ocultar ";
                        } ?> alerta">
                            <p class>Se han actualizado los datos correctamente</p>
                        </div>
                    </form>
                </div>
                <div class="<?php if (!isset($_GET['perfil'])) {
                    echo "ocultar";
                } ?> formulario_perfil">
                    <form action="./includes/mod_perfil.php" method="POST" enctype="multipart/form-data">
                        <div class="avatar_box">
                            <div class="imagen_avatar_form">
                                <img src="./assets/img/avatar/<?php echo "$avatar_session" ?>" alt="avatar">
                            </div>
                            <div class="input_avatar">
                                <input type="file" name="avatar">
                            </div>
                        </div>
                        <div class="usuario_box">
                            <div class="usuario_title">
                                <p>Usuario</p>
                            </div>
                            <div class="usuario_input">
                                <input type="text" name="usuario">
                            </div>
                        </div>
                        <div class="boton_box_perfil">
                            <div class="boton_enviar_perfil">
                                <input type="submit" value="Enviar">
                            </div>
                        </div>
                        <div class="<?php if (!isset($_GET['update_perfil'])) {
                            echo "ocultar";
                        } ?> alerta">
                            <p class>Se han actualizado los datos correctamente</p>
                        </div>
                    </form>
                </div>
                <div class="<?php if (!isset($_GET['seguridad'])) {
                    echo "ocultar";
                } ?> formulario_seguridad">
                    <form action="./includes/mod_password.php" method="POST">
                        <div class="contrasena_anterior_box">
                            <div class="contrasena_anterior_title">
                                <p>Contraseña Actual</p>
                            </div>
                            <div class="input_contrasena_anterior">
                                <input type="password" minlength="8" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$" name="contrasena_actual" required>
                            </div>
                        </div>
                        <div class="contrasena_nueva_box">
                            <div class="contrasena_nueva_title">
                                <p>Nueva contraseña</p>
                            </div>
                            <div class="input_contrasena_nueva">
                                <input type="password" minlength="8" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$" name="contrasena_nueva" required>
                            </div>
                        </div>
                        <div class="contrasena_nueva_confirmacion_box">
                            <div class="contrasena_nueva_confirmacion_title">
                                <p>Repetir contraseña</p>
                            </div>
                            <div class="input_contrasena_nueva_confirmacion">
                                <input type="password" name="contrasena_confirmacion" minlength="8" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$" required>
                            </div>
                        </div>
                        <div class="boton_box_contrasena">
                            <div class="boton_enviar_contrasena">
                                <input type="submit" value="Enviar">
                            </div>
                        </div>
                        <div class="<?php if (!isset($_GET['update_password'])) {
                            echo "ocultar";
                        } ?> alerta">
                            <p class>Se han actualizado los datos correctamente</p>
                        </div>
                        <div class="<?php if (!isset($_GET['error_confirmacion'])) {
                            echo "ocultar";
                        } ?> alerta">
                            <p class>Error las contraseñas no coinciden</p>
                        </div>
                        <div class="<?php if (!isset($_GET['error_contrasena'])) {
                            echo "ocultar";
                        } ?> alerta">
                            <p class>Error la contraseña actual no es correcta.</p>
                        </div>
                </div>

                </form>
            </div>

        </div>
    </div>
    </div>
</body>