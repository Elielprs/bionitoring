<?php
if(isset($_SESSION['rol'])){
    include_once("conexion.php");
    
    if(isset($_GET['Buscar'])){
        $busqueda = $_GET['id'];  
            
        $sql="SELECT * from users where id_user like '%$busqueda'";
        $result = mysqli_query($conexion,$sql);
    
        if($mostrar=mysqli_fetch_array($result)){
?>
    <div class="register-user">
                <form id="form-user-register" method="post" action="modelo/updateUs.php">
                    <input class="campos" type="text" name="idUser" value="<?php echo $_GET['id']?>" style="display: none">
                    <div>
                        <label id="label1" for="nombre">Nombre: </label>
                        <input class="campos" type="text" id="name" name="nombre" size="30" value="<?php echo $mostrar['nombre']?>" autocomplete="off" required>
                    </div>
                    <div>
                        <label id="label2" for="usuario">Nombre de usuario: </label>
                        <input class="campos" type="text" id="user" name="usuario" size="20" value="<?php echo $mostrar['usuario']?>" autocomplete="off" required>
                    </div>
                    <div>
                        <label id="label3" for="contrasena">Contrase&ntilde;a: </label>
                        <input class="campos" type="password" id="password" name="contrasena" size="29" value="<?php echo $mostrar['password']?>" autocomplete="off" required maxlength = "20">
                    </div>
                </form>
            </div>
            <div id="botones">
                <input class="button" id="save" type="submit" name="Guardar" value="Guardar" form="form-user-register">
                <input class="button" id="cancel" type="button" name="Cancelar" value="Cancelar" onclick="location.href='gestionUsers.php'">
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
                        alert("USUARIO ACTUALIZADO CORRECTAMENTE");
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
