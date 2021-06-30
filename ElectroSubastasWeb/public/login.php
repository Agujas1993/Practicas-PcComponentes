<?php
require "../src/Infrastructure/db/connection.php";
session_start();
if(isset($_SESSION['admin_name']))
{
    header("location:home");
}

if(isset($_POST["login"])) {
    if(!empty($_POST['member_name']) && !empty($_POST['member_password'])) {
        $name=mysqli_real_escape_string($connect,$_POST['member_name']);
        $pass=mysqli_real_escape_string($connect,$_POST['member_password']);
        $sql = "SELECT * FROM usuarios where usuario= '$name' ";
        $result =mysqli_query($connect,$sql);
        $user=mysqli_fetch_array($result);

        if(password_verify($pass,$user['password'])) {


            if(!empty($_POST['remember'])){
                setcookie("member_login", $name, time()+(10 * 365 *24 * 60 * 60));
                setcookie("member_password", $pass, time()+(10 * 365 *24 * 60 * 60));
                $_SESSION['admin_name']=$name;
            } else {
                if(isset($_COOKIE['member_login'])){
                    setcookie("member_login", "");
                    $_SESSION['admin_name']=$name;
                }
                if(isset($_COOKIE['member_password'])){
                    setcookie("member_password", "");
                    $_SESSION['admin_name']=$name;
                }
            }
            header("location:home");
            $_SESSION['admin_name']=$name;
        } else{
            $mensaje="Ingreso incorrecto";
        }
    }
}
else {
    $mensaje="Ambos son campos obligatorios";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Login</title>
    <link rel="stylesheet" href="assets/css/main.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/color.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link  rel="stylesheet" href="assets/css/my1.css">
    </head>
    <body>
        <div class="theme-layout">
            <div class="container-fluid pdng0">
                <div class="row merged">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="login-reg-bg">
                            <div class="log-reg-area sign">
                            <h2 class="log-title" style="text-align: center;">Iniciar Sesión</h2>
                            <p>Todavía no usas nuestra web? <a  href="SignUp.php">Regístrate ya</a></p>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="form-group">
                                <?php if(isset($mensaje)) {echo $mensaje;}?>
                                </div>

                                <div class="form-group">
                                    <input type="email" name="member_name" id="input" value="<?php if(isset($_COOKIE['member_login'])) {
                                        echo $_COOKIE['member_login']; } ?>" required>
                                    <label class="control-label" for="input">Nombre de usuario</label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="member_password" id="inputp"  value="<?php if(isset($_COOKIE['member_password'])) {
                                        echo $_COOKIE['member_password']; } ?>" required>
                                    <label class="control-label" for="inputp">Contraseña</label><i class="mtrl-select"></i>
                                   <img src="assets/mostrar.png" id="button" class="form-group">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"  <?php if(isset($_COOKIE['member_login'])) {
                                            ?>checked <?php 
                                        } ?>><i class="check-box"></i>Recuérdame siempre.
                                    </label>
                                </div>
                                <a href="./recoverPassword.php" class="forgot-pwd">¿Has olvidado la contraseña?</a>
                                <div class="submit-btns">
                                    <button class="mr-btn signup" name="login" type="submit"><span>Iniciar Sesión</span></button>

                    </div>
                </div>
            </div>
       </div>
  </div>

  <script src="assets/js/index.js"></script>
</body>
</html>