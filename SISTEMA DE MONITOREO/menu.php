<?php
    if(isset($_SESSION["rol"])){
        if($_SESSION["rol"] == "Administrador"){
?>
    <ul>
        <li class="dropdown">
            <a href="gestionUsers.php" class="dropbtn">Gesti&oacute;n de Usuarios</a>
            <div class="dropdown-content">
                <a href="agregarUser.php">Agregar Usuario</a>
                <a href="consultarUser.php">Consultar Usuario</a>
                <a href="actualizarUser.php">Actualizar Usuario</a>
                <a href="eliminarUser.php">Eliminar Usuario</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="gestionDisp.php" class="dropbtn">Gesti&oacute;n de Dispositivos</a>
            <div class="dropdown-content">
                <a href="agregarDisp.php">Agregar Dispositivo</a>
                <a href="consultarDisp.php">Consultar Dispositivo</a>
                <a href="actualizarDisp.php">Actualizar Dispositivo</a>
                <a href="eliminarDisp.php">Eliminar Dispositivo</a>
            </div>
        </li>
        <li><a href="monitoring_admin.php">Monitoring</a></li>
        <li><a href="logout.php">Cerrar sesión</a></li>
    </ul>
<?php   }
    if($_SESSION["rol"] == "Usuario"){
?>
        <ul>
            <li><a href="map.php">Home</a></li>
            <li><a href="monitoring.php">Monitoring</a></li>
            <li><a href="#">Report</a></li>
            <li><a href="logout.php">Cerrar sesión</a></li>
            <li><a href=""><?php echo $_SESSION["name"]?></a></li>
        </ul>
<?php   } 
    }
?>