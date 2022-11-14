<?php
    include_once("conexion.php");

    $sql = "UPDATE users SET nombre='".$_POST["nombre"]."' ,
        usuario='".$_POST["usuario"]."' , password='".$_POST["contrasena"]."'
        WHERE id_user='".$_POST["idUser"]."'";

    $result = mysqli_query($conexion,$sql);

    if($result!=null)
        header('location: ../actualizarUser.php');
?>