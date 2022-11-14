<?php
    session_start();
    include_once("conexion.php");

    if(isset($_POST['user']) && isset($_POST['password'])){
        $sql = "SELECT * FROM users WHERE usuario = '".$_POST['user']."' AND password = '".$_POST['password']."'";
        $result = mysqli_query($conexion,$sql);

        if($result->num_rows > 0){
            $user = $result->fetch_array();
            
            $_SESSION["id_user"] = $user["id_user"];
            $_SESSION["name"] = $user["nombre"];
            $_SESSION["user"] = $user["usuario"];
            $_SESSION["password"] = $user["password"];
            $_SESSION["rol"] = $user["roll"];

            if($_SESSION["rol"] == "Administrador")
                header('location: ../gestionUsers.php');

            if($_SESSION["rol"] == "Usuario")
                header('location: ../map.php');
        }
        else{
            header('location: ../index.php');
        }
    }
?>