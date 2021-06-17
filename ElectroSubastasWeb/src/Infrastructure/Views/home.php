<?php
session_start();
if(!isset($_SESSION['admin_name']))
{
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <link  rel="stylesheet" href="css/bootstrap.min.css">
    <link  rel="stylesheet" href="css/my.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

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
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mi perfil
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="changePassword.php">Cambiar contraseña</a></li>
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

<title>ElectroSubastas</title>
    <h1 style="padding:20px; text-align:center;">ElectroSubastas</h1>
    <br>
    <div>
    <nav>
<h3 style="text-align: left; padding:20px;">Bienvenid@ <?php echo $_SESSION['admin_name']; ?></h3>
<br>
</nav>

<div class="container my-5">
    <div class="row mb-4">
        <div class="col">
        </div>
        <div class="col">
        </div>
    </div>
    <div id="resultsDiv" class="row row-cols-1 row-cols-md-3 g-4"></div>
</div>
    <div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true" index="">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modalTitle" class="modal-title">
                       
                    </h4>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col pb-3">
                            <div class="card-body d-flex justify-content-between">
                                <div id="descriptionDiv" class="flex-column"></div>
                                <img id="modalImg" src="" alt="item-image" />
                            </div>
                        </div>
                        <div class="col">
                            <h3 id="counter"></h3>
                            <hr/>
                            <p>El precio está en <span id="currentPrice"></span>€</p>
                            <hr/>
                            <p>La siguiente puja está en <span id="nextBidPrice"></span>€</p>
                            <p class="text-secondary">Gastos de envío 9€</p>
                            <hr/>
                            <h5>Puja rápida</h5>
                            <div class="d-flex justify-content-between">
                                <button id="btn1" type="button"></button>
                                <button id="btn2" type="button"></button>
                                <button id="btn3" type="button"></button>
                            </div>
                            <hr />
                            <h5>Puja directa</h5>
                            <form id="directBidForm" class="row">
                                <div class="col">
                                    <input type="text" class="form-control" pattern="^[0-9]+$" placeholder="Ej. 10" required/>
                                </div>
                                <div class="col">
                                    <button type="submit">
                                        Pujar
                                    </button>
                                </div>
                            </form>
                            <hr/>
                            <h5>Pujas realizadas</h5>
                            <table class="table table-striped text-center">
                                <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Cantidad</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="js"></script>
    </body>
</html>
