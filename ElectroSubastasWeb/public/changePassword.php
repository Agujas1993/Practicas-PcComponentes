<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Cambiar contraseña</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/color.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <link  rel="stylesheet" href="css/my.css">

    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="home">Home</a>

        </li>
        <li class="nav-item dropdown">
        <a class="nav-link active" aria-current="page" href="logout.php">Salir</a>

          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="cambiarContraseña.php">Cambiar contraseña</a></li>
            <li><a class="dropdown-item" href="deleteUser.php">Eliminar cuenta</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
        <div class="theme-layout">
            <div class="container-fluid pdng0">
                <div class="row merged">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="login-reg-bg" style="padding:40px;">
                           
                            <h2 class="log-title" style="text-align: center;">Cambia tu contraseña</h2>
<form action="./changePassword.php" method="post">
<?php 
session_start();
require "../src/Application/connection.php";
if(!isset($_SESSION['admin_name']))
{
    header("location:login.php");
}
if(isset($_POST['editar'])) {

    $passActual = mysqli_real_escape_string($connect,$_POST['passActual']);
    $pass1 =  mysqli_real_escape_string($connect,$_POST['pass1']);
    $pass2 =  mysqli_real_escape_string($connect, $_POST['pass2']);

    $sqlA = mysqli_query($connect,"SELECT password FROM usuarios WHERE usuario= '".$_SESSION['admin_name']."'");
    $rowA = mysqli_fetch_array($sqlA);

    if(password_verify($passActual,$rowA['password'] )) {
        
        if($pass1 == $pass2) {
         
            $strong_pass = password_hash($pass1,PASSWORD_DEFAULT);
            $update = mysqli_query($connect,"UPDATE usuarios SET password = '$strong_pass' WHERE usuario= '".$_SESSION['admin_name']."'");
            if($update) {
                echo '
                <script>
                alert("Se ha actualizado tu contraseña.");
                window.location = "./logout.php";
                </script>
                ';
            } else {
                echo "Las dos contraseñas no coinciden.";
            }
        } else {
            echo "Tu contraseña actual no coinciden.";
        }
    } 
}
   ?>
   <br>
   <div>
   <h4>Vas a cambiar la contraseña de <?php echo $_SESSION['admin_name']; ?></h4>
        <br>
        <div><h5>Contraseña Actual</h5></div>
        <input type="password" placeholder="Contraseña actual" name="passActual" required>
    </div>
    <br>
    <div>
        <div><h5>Contraseña nueva</h5></div>
        <input type="password" placeholder="Contraseña nueva" name="pass1" required>
    </div>
    <br>
    <div>
        <div><h5>Escribe otra vez tu contraseña nueva</h5></div>
        <input type="password" placeholder="Confirma tu contraseña" name="pass2" required>
    </div>
    <br>
    <div>
        <input type="submit" value="Cambiar contraseña" name="editar" class="button_blue" style="margin-left:100px;">
    </div>
    <br>
    
    </form>
   
   
</div>
</div>
</div>
</div>
</div>
<script src="index.js"></script>
<body>
    </html>