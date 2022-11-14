<?php
    session_start();
    if(isset($_SESSION['rol'])){
        include_once("conexion.php");

        $sql = "INSERT INTO dispositivo VALUES ('".$_REQUEST['datos']."','".$_REQUEST['propietario']."','".$_POST['name']."',
                '".$_POST['model']."','".$_POST['direccion']."','".$_POST['fecha_inst']."','".$_POST['empresa']."',
                '".$_POST['latitud']."','".$_POST['longitud']."')";
        $result = mysqli_query($conexion,$sql);

        if($result!=null){
            header('Location: ../gestionDisp.php');
        }
    }else{
        header("Location: ../index.php");
    }

?>