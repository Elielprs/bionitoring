<?php
    if(isset($_SESSION["rol"])){

        include_once("conexion.php");

        $sql = "SELECT * FROM users";
        $result = mysqli_query($conexion,$sql);
        $numRegistros = $result->num_rows;

        if($numRegistros >0){
    ?>
        <div class="contents">
            <section>
                <table>
                <tr>
                            <td><strong>Id_Admin</strong></td>
                            <td><strong>Nombre</strong></td>
                            <td><strong>Usuario</strong></td>
                            <td><strong>Rol</strong></td>
                        </tr>
                    <?php while($fila = $result->fetch_array()){?>
                    <tr>
                        <td><?php echo $fila['id_user']?></td>
                        <td><?php echo $fila['nombre']?></td>
                        <td><?php echo $fila['usuario']?></td>
                        <td><?php echo $fila['roll']?></td>
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