<?php session_start();
if(isset($_SESSION["id_user"])){
    include_once("modelo/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/gestion.css?5.0">
        <link rel="stylesheet" href="css/footer.css?5.0">
        <link rel="stylesheet" href="css/header.css?30.0">
        <link rel="stylesheet" href="css/menu.css?5.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>Eliminar Dispositivo</title>
        <script type="text/javascript"> 
            function validarFecha(f){
                
                var msg = "";
                var confirm = false;

                if(f != ""){
                    var fecha_inst = new Date(f);
                    var fecha_actual = new Date();

                    if(fecha_inst >= fecha_actual){
                        msg += "La fecha de instalación es mayor a la fecha actual";
                    }
                    if(msg == ""){
                        confirm = true;
                    }
                    else
                        alert(msg);
                }
                else
                    alert("Se requiere colocar fecha de instalación");

                return confirm;
            }
        </script>
    </head>
    <body>
        <header>
            <?php include_once("sections/header.html");?>
        </header>

        <nav>
            <?php include_once("menu.php");?>
        </nav>
        <div class="form-user-div">
            <h1><span>Eliminar Dispositivo</span></h1>
            <div class="iconos">        
                <section id="selected">
                    <a href="eliminarDisp.php"><img src="Img/Iconos/eliminar.png">
                    </a>
                    <h3>Eliminar</h3>
                </section> 
                <section>
                    <a href="actualizarDisp.php"><img src="Img/Iconos/actualizar.png">
                    </a>
                    <h3>Actualizar</h3>
                </section> 
                <section>
                    <a href="consultarDisp.php"><img src="Img/Iconos/consultar.png">
                    </a>
                    <h3>Consultar</h3>
                </section>
                <section>
                    <a href="agregarDisp.php"><img src="Img/Iconos/agregar.png">
                    </a> 
                    <h3>Agregar</h3>
                </section>
            </div>

            <!-- Mensaje de error -->
            <div id="error" class="alert-warning" role="alert"></div>

            <!-- Mensaje de éxito -->
            <div id="success" class="alert-success" role="alert"></div>

            <div class="busqueda">
                <form>
                    <label for="id">Buscar: </label>
                    <input class="campob" type="text" id="buscar" name="id" size="10"  placeholder="Buscar" required>
                    <input class="button" type="submit" id="search" name="Buscar" value="Buscar">
                    <input class="button" type="submit" id="delete" name="Eliminar" value="Eliminar" form="elim-disp"> 
                </form>
            </div>
            <section>
                <table>
                <tr>
                    <td><strong>Id_Disp</strong></td>
                    <td><strong>Propietario</strong></td>
                    <td><strong>Instalaci&oacute;n</strong></td>
                    <td><strong>Direcci&oacute;n</strong></td>
                    <td><strong>Empresa</strong></td>
                    <td><Strong>Latitud/Longitud</Strong></td>
                    <td><strong>Dispositivo</strong></td>
                </tr>
                    <?php include_once("modelo/deleteDisp.php");?>
                </table>
            </section>
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

                $("#search").on('click', function (e) {
                    /* Eliminando espacios en blanco */
                    $busca = $.trim($('#buscar').val());

                    //* Verificando si el nombre se encuentra vacío */
                    if($busca == ''){
                        /* Se muestra el mensaje de error */
                        $("#error").css('display', 'block');
                        $("#error").text('Coloca un identificador a buscar');
                        hideErrorMsg();
                    }
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