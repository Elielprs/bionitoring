<?php session_start();

    if(isset($_SESSION["id_user"])){
        include_once("modelo/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css?5.0">
        <link rel="stylesheet" href="css/header.css?5.0">
        <link rel="stylesheet" href="css/footer.css?5.0">
        <link rel="stylesheet" href="css/menu.css?5.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	    <title>BIOURBAN MONITORING</title>
    </head>
    <body>
        <header>
            <?php include_once("sections/header.html");?>
        </header>

        <nav>
            <?php include_once("menu.php");?>
        </nav><br>
        
        <div id="map"></div>
        
        <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCB9o_oJsEnUhoU600qXmaX-43i3fxQcp8&callback=initMap"></script>
        <script>
            const mapDiv = document.getElementById('map');
            // Solo para ejemplificación 
            const coord = {lat: 18.891380 ,lng: -96.947614};
            const coord2 = new Set();
            <?php
                    $sql = "SELECT * FROM dispositivo WHERE id_user like '".$_SESSION['id_user']."'";
                    $result = mysqli_query($conexion,$sql);
                    while($mapa = mysqli_fetch_array($result)){
                ?>
                    coord2.add({Lat: <?php echo $mapa['latitud'];?>,
                                lng: <?php echo $mapa['longitud'];?>});
            
                function initMap(){
                    var map = new google.maps.Map(mapDiv,{
                        center: coord,
                        zoom: 7
                    });
                    const contentString=
                    '<div id="content">' +
                        '<div id="siteNotice">' +
                        "</div>" +
                        '<h1 id="firstHeading" class="firstHeading">'+
                        "<?php echo $mapa['nombreDisp'].' '.$mapa['modelo'];?>" +'</h1>' +
                        '<div id="container">' +
                            "<p><b>Data del sensor...</b></p>" +
                            "<p>Esperando datos...</p>" +
                        "</div>" +
                    "</div>";
                    for (i = 0; i < coord2.size; i++) {
                        const infowindow = new google.maps.InfoWindow({
                            content: contentString,
                            ariaLabel: "voices",
                        });
                        var marker = new google.maps.Marker({
                            position: coord,
                            map: map,
                            title: "<?php echo $mapa['nombreDisp'] ?>",
                        });
                        marker.addListener("click", () => {
                            infowindow.open({
                            anchor: marker,
                            map,
                            });
                        });
                    }
                }
            <?php }?>
        </script>
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