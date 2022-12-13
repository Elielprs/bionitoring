<?php session_start();

    if(isset($_SESSION["id_user"])){
        include_once("modelo/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/monitoring.css?5.0">
        <link rel="stylesheet" href="css/style.css?30.0">
        <link rel="stylesheet" href="css/header.css?5.0">
        <link rel="stylesheet" href="css/footer.css?5.0">
        <link rel="stylesheet" href="css/menu.css?5.0">
        <title>Monitoring</title>
    </head>

    <body>
        <header>
            <?php include_once("sections/header.html");?>
        </header>

        <nav>
            <?php include_once("menu.php");?>
        </nav>

        <div class="busqueda">
            <label id="label4" for="">Dispositivo de monitoreo: </label>
            <select class="cat" name="datos">
                <?php
                    $sql = "SELECT * FROM dispositivo";
                    $result = mysqli_query($conexion,$sql);
                    while($mostrar = mysqli_fetch_array($result)){
                    ?>
                        <option value="<?php echo $mostrar['id_dispositivo'];?>">
                            <?php echo $mostrar["nombreDisp"].' '. $mostrar["modelo"].
                            ', Instalado: '. $mostrar["fechaInst"];?>
                        </option>
                <?php }?>
            </select>                
        </div>
        <article class="indicadores">
            <section class="indicador">
                <div class="titulo">
                    <h2>Medición de CO<sub>2</sub></h2>
                </div>
            </section>
            <section class="indicador">
               <div class="titulo">
                   <h2>Temperatura</h2>
                </div>
            </section>
            <section class="indicador">
                <div class="titulo">
                    <h2>NOX</h2>
                </div>
            </section>
            <section class="indicador">
                <div class="titulo">
                    <h2>Humedad</h2>
                </div>
            </section>
            <section class="indicador">
                <div class="titulo">
                    <h2>PM 2.5</h2>
                </div>
            </section>
            <section class="indicador">
                <div class="titulo">
                    <H2>PM 10</H2>
                </div>
            </section>
        </article>

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