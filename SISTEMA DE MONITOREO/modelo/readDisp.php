<?php
    if(isset($_SESSION['rol'])){
        include_once("conexion.php");

        if(isset($_GET['Buscar'])){
            $busqueda = $_GET['id'];  
                    
            $sql = "SELECT dispositivo.*, users.nombre FROM dispositivo INNER JOIN users
                ON dispositivo.id_user = users.id_user WHERE id_dispositivo LIKE '%$busqueda'";
            $result = mysqli_query($conexion,$sql);
            
            if($mostrar = mysqli_fetch_array($result)){   
?>
                    <tr>
                        <td><?php echo $mostrar['id_dispositivo']?></td>
                        <td><?php echo $mostrar['nombre']?></td>
                        <td><?php echo $mostrar['fechaInst']?></td>
                        <td><?php echo $mostrar['direccion']?></td>
                        <td><?php echo $mostrar['empresa']?></td>
                        <td><?php echo $mostrar['latitud'].', '.$mostrar['longitud']?></td>
                        <td><?php echo $mostrar['nombreDisp'].' '.$mostrar['modelo']?></td>
                    </tr>
                <?php    
            }
        }  
    }else{
        header("Location: ../index.php");
    } 
?>