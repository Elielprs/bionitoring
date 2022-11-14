<?php session_start();

    if(isset($_SESSION["id_user"])){
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/gestion.css?30.0">
        <link rel="stylesheet" href="css/footer.css?5.0">
        <link rel="stylesheet" href="css/header.css?30.0">
        <link rel="stylesheet" href="css/menu.css?5.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>Agregar Usuario</title>
    </head>
    <body>
        <header>
            <?php include_once("sections/header.html");?>
        </header>

        <nav>
            <?php include_once("menu.php");?>
        </nav>
        <div class="form-div">
            <h2><span>Agregar Usuario</span></h2>
            <div class="comp-crud">
                <div class="fun" id="selected">
                    <a href="agregarUser.php"><img class="icono" src="Img/Iconos/agregar.png"></a>
                    <p>Agregar</p>
                </div>
                <div class="fun">
                    <a href="consultarUser.php"><img class="icono" src="Img/Iconos/consultar.png"></a>
                    <p>Consultar</p>
                </div>
                <div class="fun">
                    <a href="actualizarUser.php"><img class="icono" src="Img/Iconos/actualizar.png"></a>
                    <p>Actualizar</p>
                </div>
                <div class="fun">
                    <a href="eliminarUser.php"><img class="icono" src="Img/Iconos/eliminar.png"></a>
                    <p>Eliminar</p>
                </div>
            </div>

            <!-- Mensaje de error -->
            <div id="error" class="alert-warning" role="alert"></div>

            <!-- Mensaje de éxito -->
            <div id="success" class="alert-success" role="alert"></div>

            <div class="register-user">
                <form id="form-user-register" method="post" action="modelo/createUser.php">
                    <div>
                        <label id="label1" for="nombre">Nombre: </label>
                        <input class="campos" type="text" id="name" name="name" size="30" value="" autocomplete="off" required>
                    </div>
                    <div>
                        <label id="label2" for="usuario">Nombre de usuario: </label>
                        <input class="campos" type="text" id="user" name="user" size="20" autocomplete="off" required>
                    </div>
                    <div>
                        <label id="label3" for="contrasena">Contrase&ntilde;a: </label>
                        <input class="campos" type="password" id="password" name="password" size="29" autocomplete="off" required maxlength = "20">
                    </div>
                    <div>
                        <label id="label4" for="rol">Rol: </label>
                        <select class="cat" name="categoria" required>
                            <option>Administrador</option>
                            <option>Usuario</option>
                        </select>
                    </div>
                </form>
            </div>
            <div id="botones">
                <input class="button" id="save" type="submit" name="Guardar" value="Guardar" form="form-user-register">
                <input class="button" id="cancel" type="button" name="Cancelar" value="Cancelar" onclick="location.href='gestionUsers.php'">
            </div>
        </div>
        <footer>
            <?php include_once("sections/footer.html");?>
        </footer>

        <script>
            $(document).ready(function () {

                /* Ocultando el mensaje de error y éxito*/
                $("#error").css('display', 'none');
                $("#success").css('display', 'none');

                /* FUNCIÓN PARA OCULTAR EL MENSAJE DE ERROR */
                function hideErrorMsg() {
                    setTimeout(function(){
                        $("#error").slideUp(2000); 
                    }, 2000);
                }

                /* FUNCIÓN PARA OCULTAR EL MENSAJE DE EXITO */
                function hideSuccessMsg() {
                    setTimeout(function(){
                        $("#success").slideUp(2000); 
                    }, 2000);
                }

                $("#save").on('click', function (e) {
                    /* Eliminando espacios en blanco */
                    $nombre = $.trim($('#name').val());
                    $usuario = $.trim($('#user').val());
                    $contra = $.trim($('#password').val());

                    //* Verificando si el nombre se encuentra vacío */
                    if($nombre == ''){
                        /* Se muestra el mensaje de error */
                        $("#error").css('display', 'block');
                        $("#error").text('El nombre no puede estar vacío.');
                        hideErrorMsg();
                    }else if($usuario == ''){
                        /* Se muestra el mensaje de error */
                        $("#error").css('display', 'block');
                        $("#error").text('El nombre de usuario no puede estar vacío.');
                        hideErrorMsg();
                    }else if($contra == ''){
                        /* Se muestra el mensaje de error */
                        $("#error").css('display', 'block');
                        $("#error").text('La contraseña no puede estar vacía.');
                        hideErrorMsg();
                    }else
                        alert("USUARIO AGREGADO CORRECTAMENTE");
                });
            });
        </script>
    </body>
</html>
<?php
    }else{
        header("Location: ../index.php");
        exit;
    }
?>