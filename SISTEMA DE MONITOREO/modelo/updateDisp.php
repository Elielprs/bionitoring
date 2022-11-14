<?php
if(isset($_SESSION['rol'])){
    include_once("conexion.php");
    
    if(isset($_GET['Buscar'])){
        $busqueda = $_GET['id'];  
            
        $sql="SELECT * from dispositivo where id_dispositivo like '%$busqueda'";
        $result = mysqli_query($conexion,$sql);
    
        if($mostrar=mysqli_fetch_array($result)){
?>
            
            <div class="register-user">
                <form id="form-user-register" method="post" action="modelo/updateD.php">
                    <div>
                        <label id="label2" for="nombre">Dispositivo: </label>
                        <input class="campos" type="text" id="name" name="name" size="25" value="<?php echo $mostrar['nombreDisp']?>" autocomplete="off" required>
                    </div>
                    <div>
                        <label id="label2" for="modelo">Modelo: </label>
                        <input class="campos" type="text" id="model" name="model" size="29" value="<?php echo $mostrar['modelo']?>" autocomplete="off" maxlength = "5" required>
                    </div>
                    <div>
                        <label id="label2" for="direccion">Direcci&oacute;n: </label>
                        <input class="campos" type="text" id="direccion" name="direccion" size="26" value="<?php echo $mostrar['direccion']?>" required>
                    </div>
                    <div>
                        <label id="label2" for="fecha_inst">Fecha de Instalaci&oacute;n: </label>
                        <input class="campos" id="iz" type="date" name="fecha_inst" value="<?php echo $mostrar['fechaInst']?>">
                    </div>
                    <div>
                        <label id="label3" for="empresa">Empresa: </label>
                        <input class="campos" type="text" id="empresa" name="empresa" size="28" value="<?php echo $mostrar['empresa']?>" autocomplete="off" required maxlength = "20">
                    </div>
                    <div>
                        <label id="label3" for="lat">Latitud: </label>
                        <input class="campos" type="text" id="latitud" name="latitud" size="29" value="<?php echo $mostrar['latitud']?>" autocomplete="off" required maxlength = "12">
                    </div>
                    <div>
                        <label id="label3" for="long">Longitud: </label>
                        <input class="campos" type="text" id="longitud" name="longitud" size="28" value="<?php echo $mostrar['longitud']?>" autocomplete="off" required maxlength = "12">
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
                            <option value="<?php echo $busqueda;?>"><?php echo $busqueda;?></option>
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
        <?php
        }
    }
}else{
    header("Location: ../index.php");
}
?>