<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>css/style.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://kit.fontawesome.com/3c4b3c6940.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="formulario2">
        <h1 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Crear cuenta</h1>
        <form action="" method="post" name="formRegiter" id="formRegiter">

            <div class="campo">
                <input type="text" name="name" id="name" required>
                <label>Nombre de usuario</label>
            </div>
            <div class="campo">
                <input type="email" name="txtEmail"  id="txtEmail" required>
                <label>Correo electrónico</label>
            </div>
            <div class="campo">
                <input type="password" name="txtPassword" id ="txtPassword" required>
                <label>Contraseña</label>
            </div>
            <div class="campo">
                <input type="password" name="txtPassword2" id="txtPassword2" required >
                <label>Repetir contraseña</label>
            </div>
            
            <h3 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Mascota</h3>
            <div class="mascotas">
                
                <label class="mascota-cat">
                    <input type="checkbox" name="mascotas[]" id="cat" value="cat">
                    <span><i class="fa-solid fa-cat"></i></span>
                </label>
                <label for="dog">
                    <input type="checkbox" name="mascotas[]" id="dog" value="dog">
                    <span><i class="fa-solid fa-dog"></i></span>
                </label>
                <label for="bird">
                    <input type="checkbox" name="mascotas[]" id="bird" value="bird">
                    <span><i class="fa-solid fa-crow"></i></i></span>
                </label>
                <label for="fish">
                    <input type="checkbox" name="mascotas[]" id="fish" value="fish">
                    <span><i class="fa-solid fa-fish-fins"></i></span>
                </label>
            </div>
            <br><br>
            <div class="g-recaptcha" data-sitekey="6Ld0dIspAAAAAB7-D6LtD9vIzmE7BLsy19lFabAq"></div>
            <br>
            <input type="submit" value="Registro">
            <div  id="registeresult">
                
            </div>
            <div class="registro">
                Ya tengo una cuenta. <br>
                <a href="<?=base_url()."login"?>">Iniciar sesión</a>
            </div>
        </form>
    </div>
    <script>const base_url= "<?=base_url();?>"</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= media(); ?>js/function_register.js"></script>
<script type="text/javascript" src="<?= media();?>js/plugins/sweetalert.min.js"></script>
</body>
</html>