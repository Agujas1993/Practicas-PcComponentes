<?php
require "../src/Infrastructure/db/connection.php";
    $user = $_POST['user'];
    $password = $_POST['password'];
    $strong_pass = password_hash($password,PASSWORD_DEFAULT);
    $query = "INSERT INTO usuarios(usuario, password) VALUES('$user', '$strong_pass')";


    $checkUser = mysqli_query($connect, "SELECT * FROM usuarios WHERE usuario='$user' ");
    
    if(mysqli_num_rows($checkUser) > 0) {
        echo '
        <script>
        alert("Este usuario ya se encuentra registrado, inténtalo con otro diferente.");
        window.location = "./SignUp.php";
        </script>
        ';
        exit();
    }
    $ejecutar = mysqli_query($connect, $query);

    if($ejecutar) {
        echo '
        <script>
        alert("Usuario registrado correctamente");
        window.location = "./login.php";
        </script>
        ';
    } else {
        echo '
        <script>
        alert("Usuario no registrado, inténtalo de nuevo, ");
        window.location = "./SignUp.php";
        </script>
        ';
    }

    mysqli_close($connect);
    ?>

