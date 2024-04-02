<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>css/style.css">
</head>
<body>
    <div class = "formulario">
        <h1 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Iniciar Sesión</h1>
        <form action="" method="POST" id="formLogin">
            <div class = "username">
                <input type="email" id="txtEmail" name="txtEmail">
                <label>Correo electrónico:</label>
            </div>
            <div class = "username">
                <input type="password" id="txtPassword" name="txtPassword">
                <label>Contraseña</label>
            </div>
            <div class = "recordar">¿Olvidó su contraseña?</div>
            <input type="submit" value="Iniciar">
            <div class = "registrar">
                ¿Aún no tienes una cuenta? <a href="<?=base_url()."register"?>">Regístrate</a>!
                <div id="loginResult"></div> <!-- Para mostrar mensajes de error o éxito -->

            </div>
        </form>
    </div>
</body>
<!-- <script src="<?= media(); ?>js/jquery-3.3.1.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="<?= media(); ?>js/function_login.js"></script>
<script type="text/javascript" src="<?= media();?>/js/plugins/sweetalert.min.js"></script>
</html>