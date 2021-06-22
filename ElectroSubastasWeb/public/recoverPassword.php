<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Recuperar Contraseña</title>
        <link rel="stylesheet" href="/css/main.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/color.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <link  rel="stylesheet" href="css/my.css">
    </head>
    <body>
    <div class="theme-layout">
            <div class="container-fluid pdng0">
                <div class="row merged">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="login-reg-bg">
                            <div class="log-reg-area sign">
                            <h2 class="log-title" style="text-align: center;">Recordar contraseña</h2>
        <div class="form-group">
        <form action="recoverPassword.php" method="POST">
            <input type="email" name="email" value="" placeholder="email" required /> <br/>
            <button class="mr-btn signup" value="Email" type="submit"><span>Enviar</span></button>
            <p><a href="login.php" class="forgot-pwd">Inicia sesión </a></p>
        </form>
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
require "connection.php";
//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'electrosubastas58@gmail.com';                     //SMTP username
    $mail->Password   = 'Electrosubastas1890';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    if(isset($_POST['email']) && !empty($_POST['email'])){
        $pass = substr( md5(microtime()), 1, 10);
        $email = $_POST['email'];
        
        // Check connection
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        } 
        
        $sql = "Update usuarios Set password='$pass' Where usuario='$email'";

        if ($connect->query($sql) === TRUE) {
            echo "Ok. ";
        } else {
            echo "Error modificando: " . $connect->error;
        }
        
        $to = $_POST['email'];//"destinatario@email.com";
        $from = "From: " . "ElectroSubastas" ;
        $subject = "Recordar clave de acceso";
        $message = "El sistema le ha asignado la siguiente clave " . $pass;
    //Recipients
    $mail->setFrom('electrosubastas58@gmail.com');
      //Add a recipient
    $mail->addAddress($to);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;

    $mail->send();
    echo 'Contraseña modificada correctamente ';
    }  else {
    
}
} catch (Exception $e) {
    echo "El mensaje no ha sido enviado. Mailer Error: {$mail->ErrorInfo}";
}
?>
</body>
</html>