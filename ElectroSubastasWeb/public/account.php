<?php
session_start();
if(!isset($_SESSION['admin_name']))
{
    header("location:account.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Mi cuenta</title>


    <link rel="stylesheet" href="/css/main.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/color.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <link  rel="stylesheet" href="css/my.css">
    <style type="text/css">
</style>
    </head>
    <body>
        <br>
        <h2 style="text-align: center;">Ajustes de <?php echo $_SESSION['admin_name']; ?></h2>
        <br>
<div class="container box">
<p><h4 style="text-align: center;"><a href="changePassword.php">Cambiar Contraseña</a></h4></p>
</div>
<br>
<div class="container box">
<p><h4 style="text-align: center;"><a href="deleteUser.php">Eliminar Cuenta</a></h4></p>
</div>
                            
                  
                            </body>
                            </html>