<?php
    if(isset($_SESSION['rol'])){
        include_once("conexion.php");

        if(isset($_GET['Buscar'])){
            $busqueda = $_GET['busc'];  
                    
            $sql="SELECT * from users where id_user like '%$busqueda'";
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
                <?php    
            }
        }  
    }else{
        header("Location: ../index.php");
    } 
?>