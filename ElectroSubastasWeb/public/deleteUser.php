
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Eliminar cuenta</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/main.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/color.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
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
                        <div class="login-reg-bg">
                           
                            <h2 class="log-title" style="text-align: center;">Eliminar cuenta</h2>
<form action="./deleteUser.php" method="post">
<?php
require "../src/Infrastructure/db/connection.php";

session_start();
if(!isset($_SESSION['admin_name']))
{
    header("location:login.php");
}
if(isset($_POST['delete'])) {
$eliminar = mysqli_query($connect,"DELETE FROM usuarios WHERE usuario= '".$_SESSION['admin_name']."'");
if($eliminar) {
    echo '
    <script>
    alert("Se ha eliminado la cuenta correctamente.");
    window.location = "./logout.php";
    </script>
    ';
} else {
    echo "No se ha podido eliminar la cuenta";
}
}

?>
<br>
        <div class="container box"><h4 style="padding:20px;">Eliminar la cuenta <?php echo $_SESSION['admin_name']; ?></h4>
        <input type="submit" name="delete" value="Eliminar" class="tb" required>
    </div>
    <script src="assets/js/index.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
    </html>