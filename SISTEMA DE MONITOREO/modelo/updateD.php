<?php
    include_once("conexion.php");

    $sql = "UPDATE dispositivo SET id_dispositivo='".$_REQUEST['datos']."', id_user='".$_REQUEST['propietario']."', 
        nombreDisp='".$_POST["name"]."', modelo='".$_POST["model"]."', direccion='".$_POST["direccion"]."',
        fechaInst='".$_POST["fecha_inst"]."', empresa='".$_POST["empresa"]."', latitud='".$_POST["latitud"]."', longitud='".$_POST["longitud"]."'
        WHERE id_dispositivo='".$_REQUEST['datos']."'";

    $result = mysqli_query($conexion,$sql);

    if($result!=null)
        header('location: ../actualizarDisp.php');
?>