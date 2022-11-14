<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/login.css?5.0">
        <link rel="stylesheet" href="css/header.css?5.0">
        <title>BIOURBAN LOGIN</title>
    </head>

    <body>
        <header>
            <?php include_once("sections/header.html");?>
        </header>

        <section class="form-login">
            <h2>Session Start</h2>
                <div class="form">
                    <form method="post" action="modelo/login.php" >
                        <label for="User">User: </label>
                        <input class="campos" type="text" name="user" id="user" value="" placeholder="User" required>
                        <label>Password:</label>
                        <input class="campos" type="password" name="password" value="" placeholder="Password" required>
                        <input class="confirm" type="submit" name="enter" value="Ingresar">
                    </form>
                </div>
        </section>
    </body>
</html>