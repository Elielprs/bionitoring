<?php
    session_start();

    if(isset($_SESSION['rol'])){
        include_once("conexion.php");

        $sql = "SELECT MAX(id_user) AS id FROM users";
        $result = mysqli_query($conexion,$sql);
        $numRegistros = $result->num_rows;

        if($numRegistros > 0){
            $user = $result->fetch_array();
            $id_user = $user['id'] + 1;
        }
        else
            $id_user = 1;

        $sql = "INSERT INTO users VALUES ('".$id_user."','".$_POST["name"]."','".$_POST["user"]."','".$_POST["password"]."','".$_POST["categoria"]."')";
        $result = mysqli_query($conexion,$sql);

        if($result!=null){
            header('Location: ../gestionUsers.php');
        }
    }else{
        header("Location: ../index.php");
    }
?>