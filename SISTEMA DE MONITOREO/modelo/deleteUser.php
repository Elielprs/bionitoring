<?php
    if(isset($_SESSION['rol'])){
        include_once("conexion.php");

        if(isset($_GET['Buscar'])){
            $busqueda = $_GET['busc'];

            $sql = "SELECT * FROM users WHERE id_user like '%$busqueda'";
            $result = mysqli_query($conexion,$sql);

            if($mostrar = mysqli_fetch_array($result)){
?>
                <tr>
                    <td><?php echo $mostrar['id_user']?></td>
                    <td><?php echo $mostrar['nombre']?></td>
                    <td><?php echo $mostrar['usuario']?></td>
                    <td><?php echo $mostrar['password']?></td>
                    <td><?php echo $mostrar['roll']?></td>
                </tr>
                <form id="elim-user">
                    <input style="display:none" type="text" name="elim-user" value= <?php echo $mostrar['id_user'] ?>> 
                </form> 
                <?php
            }
        }

        if(isset($_GET['Eliminar'])){
            $busqueda = $_GET['elim-user'];
            $sql = "DELETE FROM users WHERE id_user like '%$busqueda'";
            $result = mysqli_query($conexion,$sql);
            if($result!=null)
                echo "<div id='error' class='alert-warning' role='alert'>¡Usuario eliminado correctamente!</div>";
            else
                print("No se pudo eliminar"); 
        }
    }else{
        header("Location: ../index.php");
    }
?>