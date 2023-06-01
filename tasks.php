<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>To Do</title>
</head>

<body class="body_tasks">

    <?php
    include('./views/header.php');

    ?>
    <div class="column_box">
        <div class="menu_box">
            <div class="create_list">
                <form action="./includes/create_list.php" method="POST">
                    <div class="create_list_title">Añadir lista de tareas</div>
                    <div class="input_list">
                        <!-- <input class="title_list" type="text" maxlength="25"> -->
                        <textarea class="title_list" id="mensaje" name="name_list" rows="2" cols="50" rows="1"
                            maxlength="100" placeholder=""></textarea>
                        <div class="icon">
                            <button type="submit" class="button_create_list">
                                <img src="./assets/img/icon/boton-circular-plus.png" alt="crear_lista">
                            </button>
                        </div>
                    </div>
                </form>
                <a href=""></a>
            </div>
            <div class="separator_column_box"></div>
            <div class="list_column_box">
                <!-- Introducimos la lista de tareas -->
                <?php
                include('./includes/functions.php');
                $ver_nombres_listas_tareas = verNombreListaTareas($id_session);

                foreach ($ver_nombres_listas_tareas as $fila) {
                    $nombre = $fila['nombre'];
                    $id     = $fila['id'];

                    ?>
                    <div class='name_task_block'>
                        <div class='icon_list_column_box'>
                            <img src='./assets/img/icon/lista_white.png' alt='icono lista'>
                        </div>
                        <div class='lista_column_box'>
                            <p class='p_lista_column_box'>
                                <a href='./tasks.php?id_list=<?php echo "$id"; ?>'>
                                    <?php echo "$nombre"; ?>
                                </a>
                            </p>
                        </div>
                        <form class='form_eliminar_lista' action='./includes/eliminar_lista.php' method='post'>
                            <input class='id_delete_list' name='id_delete_list' value='<?php echo "$id"; ?>'
                                style='display: none'>
                            <button type='submit' class='button_delete_list'>
                                <img src='./assets/img/icon/cerrar-el-simbolo-de-la-cruz-en-un-circulo-gris-2.png'
                                    alt='crear_lista'>
                            </button>
                        </form>
                    </div>
                <?php } ?>
            </div>

        </div>
        <?php if (empty($_GET)) {
            echo "
            <div class='mensaje_seleccion_lista'>
            <div class='seleccionar_lista'>
            <img src='./assets/img/icon/flecha-izquierda.png' alt='flecha izquierda'>
            <h2>Crea o selecciona una lista en el menú lateral</h2>
            </div>
            </div>
            ";
        } ?>

        <div class="<?php if (empty($_GET)) {
            echo "ocultar ";
        } ?>tasks_box ">

            <div class="task_box_list_title">
                <div class="icon_title_list_task_box">
                    <img src="./assets/img/icon/lista.png" alt="">
                </div>
                <div class="titulo_lista_task">
                    <?php
                    if (isset($_GET['id_list'])) {
                        $id_lista = $_GET['id_list'];
                    } else {
                        $id_lista = '';
                    }
                    $id_user = $_SESSION["id"];

                    $nombre_lista = nombreLista($id_session);
                    ?>
                    <form class='formulario_nombre_lista' action='./includes/cambiar_nombre_lista.php' method='POST'>
                        <h2><input type='text' value='<?php echo "$nombre_lista"; ?>' name='nombre_lista'></h2>
                        <input class='ocultar' type='text' value='<?php echo "$id_lista"; ?>' name='id_lista'>
                        <input class='ocultar' type='number' value='<?php echo "$id_user"; ?>' name='id_usuario'>
                        <button type='submit' class='button_update_name_list'>
                            <img src='./assets/img/icon/actualizar-flecha.png' alt='actualizar nombre lista'>
                        </button>
                        <div class=' <?php if (!isset($_GET['error_nombre_lista'])) {
                            echo "ocultar ";
                        } ?>error-nombre-lista'>
                            <p>Ya existe una lista con el mismo nombre</p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="create_task">
                <form action="./includes/create_task.php" method="POST">
                    <div class="nombre_tarea">
                        <input type="text" id="nueva_tarea" name="nueva_tarea" placeholder="Nueva tarea"
                            maxlength="100">
                    </div>
                    <div class="descripcion_tarea">
                        <textarea name="description_new_tarea" id="description_new_tarea" rows="2"
                            placeholder="Descripción de la tarea"></textarea>
                    </div>
                    <div class="opctions_task">
                        <div class="fecha_vecimiento_create_task">
                            <img class="icono_calendario" src="./assets/img/icon/time-and-calendar.png"
                                alt="icono_calendario">
                            <input class="date_input" type="date" name="fecha_vencimiento">
                        </div>
                        <div class="prioridad_create_task">
                            <label class="label_prioridad" for="prioridad">Prioridad</label>
                            <select class="selector_prioridad" name="prioridad" id="prioridad">
                                <option value="normal">Normal</option>
                                <option value="alta">Alta</option>
                                <option value="baja">Baja</option>
                            </select>
                        </div>
                        <div class="enviar_tarea">
                            <input class="id_list" type="text" name="id_list" value='<?php $id_list = $_GET['id_list'];
                            echo "$id_list"; ?>'>
                            <input class="boton_enviar" type="submit" value="Crear">
                        </div>
                    </div>
                </form>
            </div>
            <div class="separador_1_task_box">
                <div class="separador_tareas"></div>
            </div>
            <?php
            if (isset($_GET['id_list'])) {
                $nombres_tareas_pendientes = mostrarTareasPendientes();

                foreach ($nombres_tareas_pendientes as $fila) {
                    $nombre    = $fila['nombre'];
                    $prioridad = $fila['prioridad'];
                    $id_tarea  = $fila['id'];
                    $id_lista  = $fila['id_lista'];


                    //Configuramos el color de la prioridad
                    if ($prioridad == 'normal') {
                        $color     = '#04537d';
                        $prioridad = 'Normal';
                    } else if ($prioridad == 'alta') {
                        $color     = '#c15050';
                        $prioridad = 'Alta';
                    } else if ($prioridad == 'baja') {
                        $color     = '#2f2f2f';
                        $prioridad = 'Baja';
                    }
                    ?>
                    <div class='task_only_title_box'>
                        <form class='tarea_completada_form' action='./includes/complete_task.php' method='post'>
                            <button type='submit' class='boton-circular'>
                                <span class='marca'></span>
                            </button>
                            <input class='nombre_tarea_oculto' type='text' name='id_lista' value='<?php echo "$id_lista"; ?>'>
                            <input class='nombre_tarea_oculto' type='text' name='id_tarea' value='<?php echo "$id_tarea"; ?>'>
                        </form>
                        <a href='./tasks.php?id_list=<?php echo "$id_lista"; ?>&id_tarea=<?php echo "$id_tarea"; ?>'>
                            <div class='ask_only_title'>
                                <p>
                                    <?php echo "$nombre"; ?>
                                </p>
                            </div>
                        </a>
                        <div class='priority' style='background-color: <?php echo "$color"; ?>;color: white;'>
                            <p>
                                <?php echo "$prioridad"; ?>
                            </p>
                        </div>
                        <form class='eliminar_tarea' action='./includes/eliminar_tarea.php' method='POST'>
                            <input type='text' value='<?php echo "$id_tarea"; ?>' name='eliminar_tarea' style='display:none'>
                            <input type='text' value='<?php echo "$id_lista"; ?>' name='lista' style='display:none'>
                            <button type='submit' class='button_delete_task'>
                                <img src='./assets/img/icon/cerrar-el-simbolo-de-la-cruz-en-un-circulo-gris-2.png'
                                    alt='crear_lista'>
                            </button>
                        </form>
                    </div>


                <?php } ?>
            <?php } ?>

            <div class="completed_task">
                <div class="title_task_completed">
                    <?php if (isset($_GET['id_list'])) {
                        echo "<h3>Tareas completadas</h3>";
                    }
                    ?>
                </div>
                <?php
                if (isset($_GET['id_list'])) {
                    $nombres_tareas_completadas = mostrarTareasCompletadas();

                    foreach ($nombres_tareas_completadas as $fila) {
                        $nombre    = $fila['nombre'];
                        $prioridad = $fila['prioridad'];
                        $id_tarea  = $fila['id'];

                        //Configuramos el color de la prioridad
                        if ($prioridad == 'normal') {
                            $color     = '#2f2f2f';
                            $prioridad = 'Normal';
                        } else if ($prioridad == 'alta') {
                            $color     = '#2f2f2f';
                            $prioridad = 'Alta';
                        } else if ($prioridad == 'baja') {
                            $color     = '#2f2f2f';
                            $prioridad = 'Baja';
                        }
                        ?>
                        <div class='task_only_title_box'>
                            <form class='tarea_completada_form' action='./includes/no_complete_task.php' method='post'>
                                <button type='submit' class='boton-circular-completada'>
                                    <span class='marca-completada'></span>
                                </button>
                                <input class='nombre_tarea_oculto' type='text' name='id_lista'
                                    value='<?php echo "$id_lista"; ?>'>
                                <input class='nombre_tarea_oculto' type='text' name='id_tarea'
                                    value='<?php echo "$id_tarea"; ?>'>
                            </form>
                            <a href='./tasks.php?id_list=<?php echo "$id_lista"; ?>&id_tarea=<?php echo "$id_tarea"; ?>'>
                                <div class='ask_only_title'>
                                    <p style='text-decoration: line-through'>
                                        <?php echo "$nombre"; ?>
                                    </p>
                                </div>
                            </a>
                            <div class='priority' style='background-color: <?php echo "$color"; ?>;color: white;'>
                                <p style='text-decoration: line-through'>
                                    <?php echo "$prioridad"; ?>
                                </p>
                            </div>
                            <form class='eliminar_tarea' action='./includes/eliminar_tarea.php' method='POST'>
                                <input type='text' value='<?php echo "$id_tarea"; ?>' name='eliminar_tarea'
                                    style='display:none'>
                                <input type='text' value='<?php echo "$id_lista"; ?>' name='lista' style='display:none'>
                                <button type='submit' class='button_delete_task'>
                                    <img src='./assets/img/icon/cerrar-el-simbolo-de-la-cruz-en-un-circulo-gris-2.png'
                                        alt='crear_lista'>
                                </button>
                            </form>
                        </div>

                    <?php }
                } ?>

            </div>

        </div>
        <div class="description_box <?php if (!isset($_GET['id_tarea'])) {
            echo "description_box_oculto";
        } ?>" id="ocultar_descripcion">

            <?php
            $nombres_tareas_descripcion = mostrarDescripcion();

            foreach ($nombres_tareas_descripcion as $fila) {
                $id            = $fila['id'];
                $id_lista      = $fila['id_lista'];
                $nombre        = $fila['nombre'];
                $descripcion   = $fila['descripcion'];
                $prioridad     = $fila['prioridad'];
                $fecha_en      = $fila['fecha'];
                $fecha_es      = date("d-m-Y", strtotime($fecha_en));
                $f_vencimiento = $fila['f_vencimiento'];
                ?>

                <form class='form_description .form_description_oculto' action='./includes/modificar_tarea.php'
                    method='POST'>
                    <div class='description_name'>
                        <div class='description_h4'>
                            <h4>Nombre:</h4>
                        </div>
                        <div class='nombre_descripcion_box'>
                            <h4><input class='nombre_descripcion' type='text' name='nombre' value='<?php echo "$nombre"; ?>'
                                    </h4>
                        </div>
                    </div>
                    <div class='description_text'>
                        <div class='description_h4'>
                            <h4>Descripción:</h4>
                        </div>
                    </div>
                    <div class='description'>
                        <textarea name='text_area_descripcion' id='text_area_descripcion' cols='30' rows='10' value=''><?php echo "$descripcion"; ?>
                            </textarea>
                    </div>
                    <div class='dates_description'>
                        <div class='init_date_title'>
                            <div class='texto_fecha_creacion'>
                                <p>Fecha de creación:</p>
                            </div>
                            <div class='fecha_creacion'>
                                <p>
                                    <?php echo "$fecha_es"; ?>
                                </p>
                            </div>
                        </div>
                        <div class='finish_date'>
                            <div class='texto_fecha_vencimiento'>
                                <p>Fecha de vencimiento:</p>
                            </div>
                            <div class='fecha_creacion'>
                                <input type='date' name='fecha_vencimiento' value='<?php echo "$f_vencimiento"; ?>'>
                            </div>
                        </div>
                        <div class='prioridad_desc'>
                            <div class='prioridad_text_d'>
                                <p>Prioridad:</p>
                            </div>
                            <?php if ($prioridad == 'alta') { ?>

                                <select class='selector_prioridad_d' name='prioridad' id='prioridad' value='alta'>
                                    <option value='normal'>Normal</option>
                                    <option value='alta' selected>Alta</option>
                                    <option value='baja'>Baja</option>
                                </select>

                            <?php } elseif ($prioridad == 'normal') { ?>

                                <select class='selector_prioridad_d' name='prioridad' id='prioridad' value='alta'>
                                    <option value='normal' selected>Normal</option>
                                    <option value='alta'>Alta</option>
                                    <option value='baja'>Baja</option>
                                </select>

                            <?php } elseif ($prioridad == 'baja') { ?>

                                <select class='selector_prioridad_d' name='prioridad' id='prioridad' value='alta'>
                                    <option value='normal'>Normal</option>
                                    <option value='alta'>Alta</option>
                                    <option value='baja' selected>Baja</option>
                                </select>

                            <?php } ?>

                        </div>
                        <input name='id_tarea' style='display:none;' value='<?php echo "$id"; ?>'>
                        <input name='id_lista' style='display:none;' value='<?php echo "$id_lista"; ?>'>

                    </div>
                    <div class='edit_description'>
                        <div class='buttom_edit_description'>
                            <input class='submit_description' type='submit' value='Actualizar'>
                        </div>
                    </div>
                </form>





            <?php } ?>
        </div>

    </div>
    <script src="./js/mostrar_descripcion.js"></script>
</body>

</html>