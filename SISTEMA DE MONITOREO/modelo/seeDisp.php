<?php
    if(isset($_SESSION['rol'])){
        include_once("conexion.php");
        #$sql = "SELECT * FROM dispositivo";
        $sql = "SELECT dispositivo.*, users.nombre FROM dispositivo INNER JOIN users
                ON dispositivo.id_user = users.id_user";
        $result = mysqli_query($conexion,$sql);
        $numRegistros = $result->num_rows;

        if($numRegistros >0){
    ?>
        <div class="contents">
            <section>
                <table>
                    <tr>
                        <td><strong>Id_Disp</strong></td>
                        <td><strong>Nombre</strong></td>
                        <td><strong>Propietario</strong></td>
                        <td><strong>Direcci&oacute;n</strong></td>
                        <td><strong>Fecha de Instalaci&oacute;n</strong></td>
                        <td><strong>Empresa</strong></td>
                    </tr>
                    <?php while($fila = $result->fetch_array()){?>
                    <tr>
                        <td><?php echo $fila['id_dispositivo']?></td>
                        <td><?php echo $fila['nombreDisp'].' '.$fila['modelo']?></td>
                        <td><?php echo $fila['nombre']?></td>
                        <td><?php echo $fila['direccion']?></td>
                        <td><?php echo $fila['fechaInst']?></td>
                        <td><?php echo $fila['empresa']?></td>
                    </tr>
                <?php 
                    }
                }   
                ?>
                </table>
            </section>
        </div>
<?php }else{
        header("Location: ../index.php");
    } 
?>