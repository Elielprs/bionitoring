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
        <title>Agregar Dispositivo</title>
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
        <div class="form-div">
            <h2><span>Agregar Dispositivo</span></h2>
            <div class="comp-crud">
                <div class="fun" id="selected">
                    <a href="agregarDisp.php"><img class="icono" src="Img/Iconos/agregar.png"></a>
                    <p>Agregar</p>
                </div>
                <div class="fun">
                    <a href="consultarDisp.php"><img class="icono" src="Img/Iconos/consultar.png"></a>
                    <p>Consultar</p>
                </div>
                <div class="fun">
                    <a href="actualizarDisp.php"><img class="icono" src="Img/Iconos/actualizar.png"></a>
                    <p>Actualizar</p>
                </div>
                <div class="fun">
                    <a href="eliminarDisp.php"><img class="icono" src="Img/Iconos/eliminar.png"></a>
                    <p>Eliminar</p>
                </div>
            </div>

            <!-- Mensaje de error -->
            <div id="error" class="alert-warning" role="alert"></div>

            <!-- Mensaje de éxito -->
            <div id="success" class="alert-success" role="alert"></div>

            <div class="register-user">
                <form id="form-user-register" method="post" action="modelo/createDisp.php">
                    <div>
                        <label id="label2" for="nombre">Dispositivo: </label>
                        <input class="campos" type="text" id="name" name="name" size="25" value="" autocomplete="off" required>
                    </div>
                    <div>
                        <label id="label2" for="modelo">Modelo: </label>
                        <input class="campos" type="text" id="model" name="model" size="29" value="" autocomplete="off" maxlength = "5" required>
                    </div>
                    <div>
                        <label id="label2" for="direccion">Direcci&oacute;n: </label>
                        <input class="campos" type="text" id="direccion" name="direccion" size="26" required>
                    </div>
                    <div>
                        <label id="label2" for="fecha_inst">Fecha de Instalaci&oacute;n: </label>
                        <input class="campos" id="iz" type="date" name="fecha_inst" value="">
                    </div>
                    <div>
                        <label id="label3" for="empresa">Empresa: </label>
                        <input class="campos" type="text" id="empresa" name="empresa" size="28" autocomplete="off" required maxlength = "20">
                    </div>
                    <div>
                        <label id="label3" for="lat">Latitud: </label>
                        <input class="campos" type="text" id="latitud" name="latitud" size="29" autocomplete="off" required maxlength = "12">
                    </div>
                    <div>
                        <label id="label3" for="long">Longitud: </label>
                        <input class="campos" type="text" id="longitud" name="longitud" size="28" autocomplete="off" required maxlength = "12">
                    </div>
                    <div>
                        <label id="label4" for="rol">Propietario: </label>
                        <?php
                            $sql = "SELECT id_user, nombre FROM users WHERE roll like 'Usuario'";
                            $result = mysqli_query($conexion,$sql);
                        ?>
                        <select class="cat" name="propietario">
                            <?php while($mostrar = mysqli_fetch_array($result)){
                                ?>
                                <option value="<?php echo $mostrar['id_user'];?>"><?php echo $mostrar["nombre"];?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div>
                        <label class="label4" for="datos">Datos Recibidos: </label>
                        <select class="cat" name="datos">
                            <?php
                                $sql = "SELECT id_data FROM data WHERE id_data 
                                    NOT IN (SELECT id_data FROM data RIGHT JOIN dispositivo 
                                        ON data.id_data = dispositivo.id_dispositivo)";
                                $result = mysqli_query($conexion,$sql);
                                while($mostrar = mysqli_fetch_array($result)){
                                ?>
                                <option value="<?php echo $mostrar['id_data'];?>"><?php echo $mostrar["id_data"];?></option>
                            <?php }?>
                        </select>
                    </div>
                </form>
            </div>
            <div id="botones">
                <input class="button" id="save" type="submit" name="Guardar" value="Guardar" form="form-user-register" onclick="return validarFecha(fecha_inst.value);">
                <input class="button" id="cancel" type="button" name="Cancelar" value="Cancelar" onclick="location.href='gestionDisp.php'">
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
                    $modelo = $.trim($('#model').val());
                    $direccion = $.trim($('#direccion').val());
                    $empresa = $.trim($('#empresa').val());
                    $latitud = $.trim($('#latitud').val());
                    $longitud = $.trim($('#longitud').val());

                    //* Verificando si el nombre se encuentra vacío */
                    if($nombre == ''){
                        /* Se muestra el mensaje de error */
                        $("#error").css('display', 'block');
                        $("#error").text('El nombre no puede estar vacío.');
                        hideErrorMsg();
                    }else if($modelo == ''){
                        /* Se muestra el mensaje de error */
                        $("#error").css('display', 'block');
                        $("#error").text('El modelo no puede estar vacío.');
                        hideErrorMsg();
                    }else if($direccion == ''){
                        /* Se muestra el mensaje de error */
                        $("#error").css('display', 'block');
                        $("#error").text('La dirección no puede estar vacía.');
                        hideErrorMsg();
                    }else if($empresa == ''){
                        /* Se muestra el mensaje de error */
                        $("#error").css('display', 'block');
                        $("#error").text('La Empresa no puede estar vacía.');
                        hideErrorMsg();
                    }else if($latitud == ''){
                        /* Se muestra el mensaje de error */
                        $("#error").css('display', 'block');
                        $("#error").text('La latitud no puede estar vacía.');
                        hideErrorMsg();
                    }else if($longitud == ''){
                        /* Se muestra el mensaje de error */
                        $("#error").css('display', 'block');
                        $("#error").text('La longitud no puede estar vacía.');
                        hideErrorMsg();
                    }else
                        alert("DISPOSITIVO AGREGADO CORRECTAMENTE");
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