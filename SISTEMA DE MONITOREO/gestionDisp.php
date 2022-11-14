<?php session_start(); 

if(isset($_SESSION["id_user"])){
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="BIOMONITORING">
        <link rel="stylesheet" href="css/gestion.css?5.0">
        <link rel="stylesheet" href="css/footer.css?5.0">
        <link rel="stylesheet" href="css/header.css?30.0">
        <link rel="stylesheet" href="css/menu.css?5.0">
        <title>Gesti&oacute;n de Dispositivos</title>
    </head>
    <body>
        <header>
            <?php include_once("sections/header.html")?>
        </header>

        <nav>
            <?php include_once("menu.php");?>
        </nav>

        <div class="form-user-div">
            <h1><span>Gesti&oacute;n de Dispositivos</span></h1>
            <div class="iconos">        
                <section>
                    <a href="eliminarDisp.php"><img src="Img/Iconos/eliminar.png">
                    </a>
                    <h3>Eliminar</h3>
                </section> 
                <section>
                    <a href="actualizarDisp.php"><img src="Img/Iconos/actualizar.png">
                    </a>
                    <h3>Actualizar</h3>
                </section> 
                <section>
                    <a href="consultarDisp.php"><img src="Img/Iconos/consultar.png">
                    </a>
                    <h3>Consultar</h3>
                </section>
                <section>
                    <a href="agregarDisp.php"><img src="Img/Iconos/agregar.png">
                    </a> 
                    <h3>Agregar</h3>
                </section>
            </div>
            <?php include_once("modelo/seeDisp.php");?>
        </div>

        <footer>
            <?php include_once("sections/footer.html");?>
        </footer>
    </body>
</html>
<?php
    }else{
        header("Location: ../index.php");
        exit;
    }
?>