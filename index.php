<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Lista de tareas</title>
</head>

<body class='body'>
    <?php
    // Inicia la sesión
    session_start();

    // Verifica si no se ha iniciado sesión (ajusta esta condición según tu lógica de inicio de sesión)
    if (isset($_SESSION['usuario'])) {
        // Redirecciona al sitio web deseado
        header("Location: ./tasks.php");
        exit(); // Asegura que el código se detenga después de la redirección
    }
    ?>
    <header class="header">
        <div class="titulo">
            <img src="./favicon.ico" alt="logo">
            <h2>TO DO</h2>
        </div>
        <div class="botones">
            <div class="boton">
                <a id='mostrar_login' href="#">Acceder</a>
            </div>
            <div class="boton" id="mostrar_registro">
                <a href="#">Registrarse</a>
            </div>
        </div>
        <?php
        if (isset($_GET['login-incorrecto'])) {
            echo "<div class='login' id='oculto_login'>";
        } else {
            echo "<div class='login ocultar_login' id='oculto_login'>";
        }
        ?>
        <form action="./includes/login.php" method="post">
            <div class="input_login">
                <input class='input_usuario input' type="text" id='usuario' name='usuario' placeholder="Usuario">
                <input class='input_password input' type="password" id='password' name='password'
                    placeholder="Contraseña">
                <!-- Aviso de error -->
                <?php
                if (isset($_GET['login-incorrecto'])) {
                    echo "<p class='error'>Error, el usuario o la contraseña no existe</p>";
                }
                ?>
                <input class='boton_enviar' type="submit" value="Enviar">
            </div>
        </form>
        </div>
        <?php
        if (isset($_GET['usuario-incorrecto'])) {
            echo "<div class='registro' id='oculto_registro'>";
        } else {
            echo "<div class='registro ocultar_registro' id='oculto_registro'>";
        }
        ?>
        <form action="./includes/user_register.php" method="post">
            <div class="input_registro"> <input class='input_nombre input_r' type="text" id='nombre' name='nombre'
                    placeholder="Nombre">
                <input class='input_apellidos input_r' type="text" id='apellidos' name='apellidos'
                    placeholder="Apellidos">
                <input class='input_usuario input_r' type="text" id='usuario' name='usuario' placeholder="Usuario">
                <?php
                if (isset($_GET['usuario-incorrecto'])) {
                    echo "<p class='error'>Error, el usuario ya existe</p>";
                }
                ?>
                <input class='input_password_r input_r' type="password" id='password_r' name='password_r'
                    placeholder="Contraseña" minlength="8" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$"
                    title="La contraseña debe tener al menos 8 caracteres, una letra mayúscula, una letra minúscula y un número"
                    required>
                <div class="boton">
                    <input class='boton_enviar' type="submit" value="Enviar">
                </div>

            </div>
        </form>
        </div>

    </header>
    <script src="./js/ocultar.js"></script>
    <script src="./js/right_menu.js"></script>

</body>

</html>